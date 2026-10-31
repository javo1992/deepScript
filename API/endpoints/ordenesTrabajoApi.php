<?php
require_once(dirname(__DIR__,2).'/php/modelo/ordenTrabajoM.php');
require_once(dirname(__DIR__,2).'/php/modelo/secuencialesM.php');
require_once(dirname(__DIR__,2).'/php/modelo/lista_articulosM.php');

class ordenesTrabajoApi extends ApiEndpoint
{
    private $ordenT;
    private $secuenciales;
    private $articulos;

    function __construct(string $authLevel = 'required')
    {
        parent::__construct($authLevel);
        $this->ordenT = new ordenTrabajoM();
        $this->secuenciales = new secuencialesM();
        $this->articulos = new lista_articulosM();
    }

    public function listarOrdenes(array $params): array
    {
        $fecha = date('Y-m-d');
        $placa = '';

        if(isset($params['fecha']) && $params['fecha']!=''){ $fecha = $params['fecha']; }
        if(isset($params['placa']) && $params['placa']!=''){ $placa = $params['placa']; }

        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);
        return $this->ordenT->lista_ordenes_trabajo($params['id_empresa'],$fecha,$placa);

    }

    public function detalleOrdenes(array $params): array
    {
        if(!isset($params['id'])){ return 'no se encontro el id'; }
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);
        $id = false;
        $placa = false;

        if($params['id']!=0) {$id = $params['id'];} 
        if($params['placa']!=0) {$placa = $params['placa'];} 

        // print_r($params);die();
        return $this->ordenT->detalle_ordenes_trabajo($params['id_empresa'],$id,$placa);

    }

    public function addOrdenes(array $params)
    {
        if(!isset($params['placa'])){return "placa necesaria";}
        if(!isset($params['modelo'])){return "modelo necesario";}
        if(!isset($params['propietario'])){return "propietario necesario";}
        if(!isset($params['telefono'])){return "telefono necesario";}
        if(!isset($params['fecha'])){return "fecha necesaria";}
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);


        $placa = $this->ordenT->lista_ordenes_trabajo($params['id_empresa'],$params['fecha'],$params['placa']);
        if(count($placa)==0)
        {
            $data = $this->secuenciales->numero_secuencial($params['id_empresa'],'OR_SERIE_001001','OR',1);
            $datos = array( 
                            array('campo'=>"placa",'dato'=>$params['placa']),
                            array('campo'=>"fecha",'dato'=>$params['fecha']),
                            array('campo'=>"id_empresa",'dato'=>$params['id_empresa']),
                            array('campo'=>"estado_pago",'dato'=>0),
                            array('campo'=>"estado_orden",'dato'=>'P'),
                            array('campo'=>"num_orden",'dato'=>$data[0]['numero']),
                            array('campo'=>"encargado",'dato'=>$params['propietario']),
                            array('campo'=>"telefono_encargado",'dato'=>$params['telefono']),
                            array('campo'=>"modelo_marca",'dato'=>$params['modelo']),
                        );
            $dat = $this->ordenT->add('ordenes_trabajo',$datos,$params['id_empresa']);
            return $dat;
        }else{
            return "Placa ya registrada en este dia";
        }
    }

    public function addLineasOrdenes(array $params)
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);

        $total = $params['subtotal'];
        $iva = 0;
        $porceIva = 0;
        $descuento = 0;
        if($params['iva']==1)
        {
            $iva_val = 15;
            if(isset($params['iva_val'])){  $iva_val = $params['iva_val'];  }
            $val_iva = ($iva_val/100)+1;
            $total = number_format($params['subtotal']*$val_iva,2,'.','');
            $iva = $total-$params['subtotal'];
            $porceIva = $iva_val;
        }

        // print_r($params);die();   
        $datos = array( 
                        array('campo'=>"producto",'dato'=>$params['producto']),
                        array('campo'=>"cantidad",'dato'=>$params['cantidad']),
                        array('campo'=>"precio_uni",'dato'=>$params['precio_uni']),
                        array('campo'=>"subtotal",'dato'=>$params['subtotal']),
                        array('campo'=>"total",'dato'=>$total),
                        array('campo'=>"iva",'dato'=>$iva),
                        array('campo'=>"porc_descuento",'dato'=>$params['porceDesc']),
                        array('campo'=>"porc_iva",'dato'=>$porceIva),
                        array('campo'=>"id_orden",'dato'=>$params['orden']),
                        array('campo'=>"referencia",'dato'=>$params['referencia']),
                        array('campo'=>"descuento",'dato'=>$descuento),
                    );
        return $this->ordenT->add('lineas_orden_trabajo',$datos,$params['id_empresa']);
        // print_r($params);die();
    }


    public function lineasOrdenes(array $params)
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);

        return $this->ordenT->lineas_orden_trabajo($params['id_empresa'],$params['orden']);

        print_r($params);die();
    }

    public function destroy(array $params)
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);
        // print_r($params);die();   
        $datos = array( 
                        array('campo'=>"id_lineas",'dato'=>$params['id']),
                    );

        return $this->ordenT->delete('lineas_orden_trabajo',$datos,$params['id_empresa']);     
    }

    public function finalizarOrden(array $params)
    {
        if(!isset($params['orden'])) { return 'enviar numero de orden';}
        if(!isset($params['tipoPago'])) { return 'enviar tipoPago de la orden';}
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);

        try {
            
                $ordenDet = $this->ordenT->detalle_ordenes_trabajo($params['id_empresa'],$params['orden']);
                // print_r($ordenDet);die();
                $lineas = $this->ordenT->lineas_orden_trabajo($params['id_empresa'],$params['orden']);
               // print_r($params);die();
                $total = 0; $subtotal = 0; $valor_iva = 0;
                $sin_iva = 0;
                $con_iva = 0;
                foreach ($lineas as $key => $value) {

                    $total+= $value['total'];
                    $subtotal+= $value['subtotal'];
                    $valor_iva+=$value['iva'];

                    if($value['iva']==0)
                    {
                        $sin_iva+= $value['subtotal'];
                    }else{
                        $con_iva+= $value['subtotal'];
                    }
                }


                // edita orden de trabajo y finaliza
                $datos =  array(
                                array('campo'=>'estado_pago','dato'=>1),
                                array('campo'=>'estado_orden','dato'=>'F'),
                                array('campo'=>'Sin_iva','dato'=>$sin_iva),
                                array('campo'=>'Porc_IVA','dato'=>($params['iva_val']/100)),
                                array('campo'=>'Con_IVA','dato'=>$con_iva),
                                array('campo'=>'total','dato'=>$total),
                                array('campo'=>'subtotal','dato'=>$subtotal),
                                array('campo'=>'iva','dato'=>$valor_iva),
                                array('campo'=>'Tipo_pago','dato'=>$params['tipoPago'])
                            );

                $where =  array(array('campo'=>'id_orden','dato'=>$params['orden']));
                $resp = $this->ordenT->update('ordenes_trabajo',$datos,$where,$params['id_empresa']);
                
                // ingresa kardex de salida
                foreach ($lineas as $key => $value) {
                    // print_r($value);die();
                    $producto = $this->articulos->articulo_stock_precio_venta($params['id_empresa'],$query=false,$categoria=false,$servicio=0,$value['referencia'],$id=false);
                    $datos =  array(
                        array('campo'=>'id_producto','dato'=>$producto[0]['id_productos']),
                        array('campo'=>'fecha','dato'=>date('Y-m-d')),
                        array('campo'=>'TP','dato'=>'CD'),
                        array('campo'=>'entrada','dato'=>0),
                        array('campo'=>'salida','dato'=>$value['cantidad']),
                        array('campo'=>'valor_unitario','dato'=>$value['precio_uni']),
                        array('campo'=>'total_iva','dato'=>$value['iva']),
                        array('campo'=>'subtotal','dato'=>$value['subtotal']),
                        array('campo'=>'existencias','dato'=>($producto[0]['stock']-1)),
                        array('campo'=>'costo','dato'=>$value['precio_uni']),
                        array('campo'=>'valor_total','dato'=>$value['total']),
                        array('campo'=>'id_factura','dato'=>'.'),
                        array('campo'=>'detalle','dato'=>'SALIDA DE STOCK POR ORDEN DE TRABAJO:'.$ordenDet[0]['num_orden']),
                        array('campo'=>'fecha_Fab','dato'=>date('Y-m-d')),
                        array('campo'=>'fecha_Exp','dato'=>date('Y-m-d')),
                        array('campo'=>'usuario','dato'=>1),
                        array('campo'=>'proveedor','dato'=>''),
                        array('campo'=>'cliente','dato'=>''),
                        array('campo'=>'serie','dato'=>''),
                        array('campo'=>'empresa','dato'=>$params['id_empresa']),
                        array('campo'=>'id_ordenTrabajo','dato'=>$params['orden']),
                    );

                    $this->ordenT->add('trans_kardex',$datos,$params['id_empresa']);
                }

                return array('respuesta'=>1,'mensaje'=>'orden finalizada');  
            } catch (Exception $e) {

                return array('respuesta'=>-1,'mensaje'=>$e);        
        
        }




        print_r($total.'-'.$subtotal.'-'.$valor_iva.'-'.$sin_iva.'-'.$con_iva.'-');die();

        print_r($lineas);die();

        print_r($params);die();

    }
}