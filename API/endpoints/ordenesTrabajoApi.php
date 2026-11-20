<?php
require_once(dirname(__DIR__,2).'/php/modelo/ordenTrabajoM.php');
require_once(dirname(__DIR__,2).'/php/modelo/secuencialesM.php');
require_once(dirname(__DIR__,2).'/php/modelo/lista_articulosM.php');
require_once(dirname(__DIR__,2).'/php/modelo/clienteM.php');
require_once(dirname(__DIR__,2).'/php/modelo/lista_facturaM.php');

class ordenesTrabajoApi extends ApiEndpoint
{
    private $ordenT;
    private $secuenciales;
    private $articulos;
    private $cliente;
    private $facturas;

    function __construct(string $authLevel = 'required')
    {
        parent::__construct($authLevel);
        $this->ordenT = new ordenTrabajoM();
        $this->secuenciales = new secuencialesM();
        $this->articulos = new lista_articulosM();
        $this->cliente = new clienteM();
        $this->facturas = new lista_facturaM();
    }

    public function listarOrdenes(array $params): array
    {

        $fecha = date('Y-m-d');
        $placa = '';

        if(isset($params['fecha']) && $params['fecha']!=''){ $fecha = $params['fecha']; }
        if(isset($params['placa']) && $params['placa']!=''){ $placa = $params['placa']; }

        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);
        return $this->ordenT->lista_ordenes_trabajo($params['id_empresa'],'F',$fecha,$placa);

    }

    public function listarOrdenes_finalizadas(array $params): array
    {

        $fecha = date('Y-m-d');
        $placa = '';
        $estado = false;

        if(isset($params['fecha']) && $params['fecha']!=''){ $fecha = $params['fecha']; }
        if(isset($params['placa']) && $params['placa']!=''){ $placa = $params['placa']; }
        if(isset($params['estado']) && $params['estado']!=''){ $estado = $params['estado']; }

        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);
        return $this->ordenT->lista_ordenes_trabajo_all($params['id_empresa'],$estado,$fecha,$placa);

    }

    public function ordenesTrabajoAll(array $params): array
    {

        $fecha = date('Y-m-d');
        $placa = '';
        $estado = false;

        if(isset($params['fecha']) && $params['fecha']!=''){ $fecha = $params['fecha']; }
        if(isset($params['placa']) && $params['placa']!=''){ $placa = $params['placa']; }
        if(isset($params['estado']) && $params['estado']!=''){ $estado = $params['estado']; }

        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);
        $lineas = $this->ordenT->lineas_orden_trabajo($params['id_empresa'],$params['orden']);
        $detalle = $this->ordenT->detalleExtraOrdenes($params['id_empresa'],$params['orden'],$id=false);
        $observaciones = $this->ordenT->observacionesOrdenes($params['id_empresa'],$params['orden'],$id=false);
        $fotos = $this->ordenT->fotosOrdenes($params['id_empresa'],$params['orden'],$id=false);
        $orden =  $this->ordenT->lista_ordenes_trabajo_all($params['id_empresa'],false,false,false,$params['orden']);


        return array('orden'=>$orden,'lineas'=>$lineas,'detalles'=>$detalle,'observaciones'=>$observaciones,'fotos'=>$fotos);

    }

    public function detalleOrdenes(array $params): array
    {
        if(!isset($params['id'])){ return 'no se encontro el id'; }
        $tokenData = $this->requireUser();
        // print_r($params);die();
        $params = array_merge($params, $tokenData);
        $id = false;
        $placa = false;
        $fecha = false;

        if($params['id']!=0) {$id = $params['id'];} 
        if($params['placa']!=0) {$placa = $params['placa'];} 
        if($params['fecha']!=0) {$fecha = $params['fecha'];} 

        // print_r($params);die();
        return $this->ordenT->detalle_ordenes_trabajo($params['id_empresa'],$id,$placa,$fecha);

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
            $data = $this->secuenciales->numero_secuencial($params['id_empresa'],'OR_SERIE_001001','OR',$params['serie'],1);
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
                            array('campo'=>"TC",'dato'=>'OR'),
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
                        array('campo'=>"TC",'dato'=>isset($params['TC']) ? $params['TC'] : 'OR'),
                    );
        return $this->ordenT->add('lineas_orden_trabajo',$datos,$params['id_empresa']);
        // print_r($params);die();
    }

    public function addDetalleExtraOrdenes(array $params)
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);

        $datos = array( 
                        array('campo'=>"detalle_extra",'dato'=>$params['detalle']),
                        array('campo'=>"valor",'dato'=>$params['valor']),
                        array('campo'=>"fecha_detalle_extra",'dato'=>$params['fecha']),
                        array('campo'=>"id_orden",'dato'=>$params['orden']),
                        array('campo'=>"id_empresa",'dato'=>$params['id_empresa']),
                        array('campo'=>"id_usuario",'dato'=>$params['id_usuario']),
                    );
        return $this->ordenT->add('detalles_extras',$datos,$params['id_empresa']);
        // print_r($params);die();
    }

    public function addObservacionOrdenes(array $params)
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);

        $datos = array( 
                        array('campo'=>"detalle_observacion",'dato'=>$params['detalle']),
                        array('campo'=>"fecha_observacion",'dato'=>$params['fecha']),
                        array('campo'=>"id_orden",'dato'=>$params['orden']),
                        array('campo'=>"id_empresa",'dato'=>$params['id_empresa']),
                        array('campo'=>"id_usuario",'dato'=>$params['id_usuario']),
                    );
        return $this->ordenT->add('observacion_orden_trabajo',$datos,$params['id_empresa']);
        // print_r($params);die();
    }

    public function lineasOrdenes(array $params)
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);

        return $this->ordenT->lineas_orden_trabajo($params['id_empresa'],$params['orden']);

        print_r($params);die();
    }

    public function detalleExtraOrdenes(array $params):array
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);
        // print_r($params);die();

        return $this->ordenT->detalleExtraOrdenes($params['id_empresa'],$params['orden']);

        print_r($params);die();
    }

    public function observacionesOrdenes(array $params)
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);

        return $this->ordenT->observacionesOrdenes($params['id_empresa'],$params['orden']);

        print_r($params);die();
    }


    public function fotosOrdenes(array $params)
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);
        $data =  $this->ordenT->fotosOrdenes($params['id_empresa'],$params['orden']);

        return $data;

        // print_r($data);die();
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

    public function destroyOrden(array $params)
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);
        // print_r($params);die();   
        $datos = array( 
                        array('campo'=>"id_orden",'dato'=>$params['id']),
                    );

        $this->ordenT->delete('lineas_orden_trabajo',$datos,$params['id_empresa']);    
        return $this->ordenT->delete('ordenes_trabajo',$datos,$params['id_empresa']);     
    }

    public function deleteDetalleOrden(array $params)
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);
        // print_r($params);die();   
        $datos = array( 
                        array('campo'=>"id_detalle_extra",'dato'=>$params['id']),
                    );
        return $this->ordenT->delete('detalles_extras',$datos,$params['id_empresa']);     
    }

    public function deleteObservacionOrden(array $params)
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);
        // print_r($params);die();   
        $datos = array( 
                        array('campo'=>"id_observacion_orden",'dato'=>$params['id']),
                    );
        return $this->ordenT->delete('observacion_orden_trabajo',$datos,$params['id_empresa']);     
    }

    public function deleteFotoOrden(array $params)
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);
        // print_r($params);die();   
        $datos = array( 
                        array('campo'=>"id_fotos_orden",'dato'=>$params['id']),
                    );
        return $this->ordenT->delete('fotos_orden_trabajo',$datos,$params['id_empresa']);     
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
                //ingresa el pago 

                $data = array(
                        array('campo'=>'id_empresa','dato'=>$params['id_empresa']),
                        array('campo'=>'valor_pago','dato'=>$total),
                        array('campo'=>'fecha','dato'=>date('Y-m-d')),
                        array('campo'=>'estado','dato'=>1),
                        array('campo'=>'detalle','dato'=>'Pago orden de vehiculo con placa :'.$ordenDet[0]['placa']),
                        array('campo'=>'id_caja','dato'=>$params['caja']),
                        array('campo'=>'id_usuario','dato'=>$params['id_usuario']),
                        array('campo'=>'id_factura','dato'=>null),
                        array('campo'=>'id_orden','dato'=>$params['orden']),
                        array('campo'=>'forma_pago','dato'=>$params['tipoPago']),
                );

                $resp = $this->ordenT->add('pagos_caja',$data,$params['id_empresa']);

                
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
                        array('campo'=>'usuario','dato'=>$params['id_usuario']),
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
    }

     public function finalizarOrdenTemp(array $params)
    {
        if(!isset($params['orden'])) { return 'enviar numero de orden';}
        if(!isset($params['tipoPago'])) { return 'enviar tipoPago de la orden';}
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);

        // print_r($params);die();

        try {
               $numsec = $this->secuenciales->numero_secuencial($params['id_empresa'],'OR_SERIE_'.str_replace('-','',$params['serie']),'OR',$params['serie'],1);

               $lineas = $this->ordenT->lineas_orden_trabajo($params['id_empresa'],$params['orden'],false,'ORT');
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
                                array('campo'=>'Tipo_pago','dato'=>$params['tipoPago']),
                                array('campo'=>'id_empresa','dato'=>$params['id_empresa']),
                                array('campo'=>'id_usuario','dato'=>$params['id_usuario']),
                                array('campo'=>'num_orden','dato'=>$numsec[0]['numero']),
                                array('campo'=>'fecha','dato'=>date('Y-m-d')),
                                array('campo'=>'TC','dato'=>'ORT')
                            );
                $resp = $this->ordenT->add('ordenes_trabajo',$datos,$params['id_empresa']);

                $ordenDet = $this->ordenT->detalle_ordenes_trabajo_finalizadas($params['id_empresa'],false,false,$numsec[0]['numero']);

                $lineaData = array(
                                array('campo'=>'id_orden','dato'=>$ordenDet[0]['id_orden']),
                                array('campo'=>'TC','dato'=>'OR'),
                            );
                $lineasWhere = array(
                                array('campo'=>'id_orden','dato'=>$params['orden']),
                                array('campo'=>'TC','dato'=>'ORT'),
                            );
                $this->ordenT->update('lineas_orden_trabajo',$lineaData,$lineasWhere,$params['id_empresa']);


                $data = array(
                        array('campo'=>'id_empresa','dato'=>$params['id_empresa']),
                        array('campo'=>'valor_pago','dato'=>$total),
                        array('campo'=>'fecha','dato'=>date('Y-m-d')),
                        array('campo'=>'estado','dato'=>1),
                        array('campo'=>'detalle','dato'=>'Pago orden rapida :'.$numsec[0]['numero']),
                        array('campo'=>'id_caja','dato'=>$params['caja']),
                        array('campo'=>'id_usuario','dato'=>$params['id_usuario']),
                        array('campo'=>'id_factura','dato'=>null),
                        array('campo'=>'id_orden','dato'=>$params['orden']),
                        array('campo'=>'forma_pago','dato'=>$params['tipoPago']),
                );

                $resp = $this->ordenT->add('pagos_caja',$data,$params['id_empresa']);

                
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
                        array('campo'=>'usuario','dato'=>$params['id_usuario']),
                        array('campo'=>'proveedor','dato'=>''),
                        array('campo'=>'cliente','dato'=>''),
                        array('campo'=>'serie','dato'=>''),
                        array('campo'=>'empresa','dato'=>$params['id_empresa']),
                        array('campo'=>'id_ordenTrabajo','dato'=>$ordenDet[0]['id_orden']),
                    );

                    $this->ordenT->add('trans_kardex',$datos,$params['id_empresa']);
                }

                return array('respuesta'=>1,'mensaje'=>'orden finalizada');  
            } catch (Exception $e) {

                return array('respuesta'=>-1,'mensaje'=>$e);        
        
        }
    }

    public function finalizarOrdenFac(array $params)
    {
        if(!isset($params['orden'])) { return 'enviar numero de orden';}
        if(!isset($params['tipoPago'])) { return 'enviar tipoPago de la orden';}
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);

        // print_r($params);die();

        try {

                $cliente = $this->cliente->lista_clientes_all_api($params['id_empresa'],false,$params['CI'],false);
                if(count($cliente)>0)
                {
                    $datosCli =  array(
                                array('campo'=>'nombre','dato'=>$params['nombre']),
                                array('campo'=>'Razon_Social','dato'=>$params['nombre']),
                                array('campo'=>'tipo','dato'=>'C'),
                                array('campo'=>'telefono','dato'=>$params['telefono']),
                                array('campo'=>'mail','dato'=>$params['email']),
                                array('campo'=>'direccion','dato'=>$params['direccion']),
                                array('campo'=>'id_empresa','dato'=>$params['id_empresa']),
                                array('campo'=>'estado','dato'=>'A'),
                            );

                    $where =  array(array('campo'=>'ci_ruc','dato'=>$params['CI']),array('campo'=>'id_empresa','dato'=>$params['id_empresa']));
                    $resp = $this->ordenT->update('cliente',$datosCli,$where,$params['id_empresa']);

                }else{
                    $datosCli =  array(
                                array('campo'=>'nombre','dato'=>$params['nombre']),
                                array('campo'=>'ci_ruc','dato'=>$params['CI']),
                                array('campo'=>'Razon_Social','dato'=>$params['nombre']),
                                array('campo'=>'tipo','dato'=>'C'),
                                array('campo'=>'telefono','dato'=>$params['telefono']),
                                array('campo'=>'mail','dato'=>$params['email']),
                                array('campo'=>'direccion','dato'=>$params['direccion']),
                                array('campo'=>'id_empresa','dato'=>$params['id_empresa']),
                                array('campo'=>'estado','dato'=>'A'),
                            );
                    $resp = $this->ordenT->add('cliente',$datosCli,$params['id_empresa']);
                }            

                $cliente = $this->cliente->lista_clientes_all_api($params['id_empresa'],false,$params['CI'],false);

               // print_r($cliente);die();

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
                $datosOrd =  array(
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
                $resp = $this->ordenT->update('ordenes_trabajo',$datosOrd,$where,$params['id_empresa']);
                // print_r('expression');die();
                // generar factura
                $numsec = $this->secuenciales->numero_secuencial($params['id_empresa'],'FA_SERIE_'.str_replace('-','',$params['serie']),'FA',$params['serie'],1);
                $datosFac = array(
                            array('campo'=>'Sin_iva','dato'=>$sin_iva),
                            array('campo'=>'Porc_IVA','dato'=>($params['iva_val']/100)),
                            array('campo'=>'Con_IVA','dato'=>$con_iva),
                            array('campo'=>'total','dato'=>$total),
                            array('campo'=>'subtotal','dato'=>$subtotal),
                            array('campo'=>'iva','dato'=>$valor_iva),
                            array('campo'=>'Tipo_pago','dato'=>$params['tipoPago']),
                            array('campo'=>'num_factura','dato'=>$numsec[0]['numero'] ),
                            array('campo'=>'id_empresa','dato'=>$params['id_empresa']),
                            array('campo'=>'id_usuario','dato'=>$params['id_usuario']),
                            array('campo'=>'fecha','dato'=>date('Y-m-d')),
                            array('campo'=>'id_cliente','dato'=>$cliente[0]['id'] ),
                            array('campo'=>'serie','dato'=>$params['serie']),
                            array('campo'=>'Autorizacion','dato'=>'123456789'),
                            array('campo'=>'Propina','dato'=>0),
                            array('campo'=>'Clave_Acceso','dato'=>'123456789'),
                            array('campo'=>'estado_factura','dato'=>'P'),
                            array('campo'=>'id_pedido','dato'=>$params['orden']),
                            array('campo'=>'datos_adicionales','dato'=>''),
                            array('campo'=>'estado_pago','dato'=>1),
                        );


                $this->ordenT->add('facturas',$datosFac,$params['id_empresa']);
                $parametros = array('numfac'=>$numsec[0]['numero'],'serie'=>$params['serie'],'id_empresa'=>$params['id_empresa']);
                $fact = $this->facturas->lista_facturas_api($parametros);

            // print_r($fact);die();


                  //ingresa el pago 

                $data = array(
                        array('campo'=>'id_empresa','dato'=>$params['id_empresa']),
                        array('campo'=>'valor_pago','dato'=>$total),
                        array('campo'=>'fecha','dato'=>date('Y-m-d')),
                        array('campo'=>'estado','dato'=>1),
                        array('campo'=>'detalle','dato'=>'Pago orden de vehiculo con placa :'.$ordenDet[0]['placa']),
                        array('campo'=>'id_caja','dato'=>$params['caja']),
                        array('campo'=>'id_usuario','dato'=>$params['id_usuario']),
                        array('campo'=>'id_factura','dato'=>$fact[0]['id']),
                        array('campo'=>'id_orden','dato'=>$params['orden']),
                        array('campo'=>'forma_pago','dato'=>$params['tipoPago']),
                );

                $resp = $this->ordenT->add('pagos_caja',$data,$params['id_empresa']);


                
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
                        array('campo'=>'id_factura','dato'=>$fact[0]['id']),
                        array('campo'=>'detalle','dato'=>'SALIDA DE STOCK POR FACTURA:'.$params['serie'].' - '.$numsec[0]['numero']),
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


                    // para lista de facturas
                    $datos =  array(
                            array('campo'=>'producto','dato'=>$producto[0]['nombre']),
                            array('campo'=>'cantidad','dato'=>$value['cantidad']),
                            array('campo'=>'precio_uni','dato'=>$value['precio_uni']),
                            array('campo'=>'porc_descuento','dato'=>0),
                            array('campo'=>'descuento','dato'=>0),
                            array('campo'=>'iva','dato'=>$value['iva']),
                            array('campo'=>'total','dato'=>$value['total']),
                            array('campo'=>'id_factura','dato'=>$fact[0]['id']),
                            array('campo'=>'referencia','dato'=>$producto[0]['referencia']),
                            array('campo'=>'porc_iva','dato'=>($params['iva_val']/100)),
                            array('campo'=>'Serie_No','dato'=>$params['serie']),
                            array('campo'=>'subtotal','dato'=>$value['subtotal']),
                            array('campo'=>'id_guiaRemi','dato'=>''),
                            array('campo'=>'observacion' ,'dato'=>''),
                        );
                    $this->ordenT->add('lineas_factura',$datos,$params['id_empresa']);

                }

                return array('respuesta'=>1,'mensaje'=>'orden finalizada');  
            } catch (Exception $e) {

                return array('respuesta'=>-1,'mensaje'=>$e);        
        
        }
    }

    public function finalizarOrdenFacTemp(array $params)
    {
        if(!isset($params['orden'])) { return 'enviar numero de orden';}
        if(!isset($params['tipoPago'])) { return 'enviar tipoPago de la orden';}
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);
        // print_r($params);die();

        try {

                $cliente = $this->cliente->lista_clientes_all_api($params['id_empresa'],false,$params['CI'],false);
                if(count($cliente)>0)
                {
                    $datosCli =  array(
                                array('campo'=>'nombre','dato'=>$params['nombre']),
                                array('campo'=>'Razon_Social','dato'=>$params['nombre']),
                                array('campo'=>'tipo','dato'=>'C'),
                                array('campo'=>'telefono','dato'=>$params['telefono']),
                                array('campo'=>'mail','dato'=>$params['email']),
                                array('campo'=>'direccion','dato'=>$params['direccion']),
                                array('campo'=>'id_empresa','dato'=>$params['id_empresa']),
                                array('campo'=>'estado','dato'=>'A'),
                            );

                    $where =  array(array('campo'=>'ci_ruc','dato'=>$params['CI']),array('campo'=>'id_empresa','dato'=>$params['id_empresa']));
                    $resp = $this->ordenT->update('cliente',$datosCli,$where,$params['id_empresa']);

                }else{
                    $datosCli =  array(
                                array('campo'=>'nombre','dato'=>$params['nombre']),
                                array('campo'=>'ci_ruc','dato'=>$params['CI']),
                                array('campo'=>'Razon_Social','dato'=>$params['nombre']),
                                array('campo'=>'tipo','dato'=>'C'),
                                array('campo'=>'telefono','dato'=>$params['telefono']),
                                array('campo'=>'mail','dato'=>$params['email']),
                                array('campo'=>'direccion','dato'=>$params['direccion']),
                                array('campo'=>'id_empresa','dato'=>$params['id_empresa']),
                                array('campo'=>'estado','dato'=>'A'),
                            );
                    $resp = $this->ordenT->add('cliente',$datosCli,$params['id_empresa']);
                }            

                $cliente = $this->cliente->lista_clientes_all_api($params['id_empresa'],false,$params['CI'],false);

               // print_r($cliente);die();

                $numsec = $this->secuenciales->numero_secuencial($params['id_empresa'],'OR_SERIE_'.str_replace('-','',$params['serie']),'OR',$params['serie'],1);
                

                // $ordenDet = $this->ordenT->detalle_ordenes_trabajo($params['id_empresa'],$params['orden']);
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
                $datosOrd =  array(
                                array('campo'=>'estado_pago','dato'=>1),
                                array('campo'=>'estado_orden','dato'=>'F'),
                                array('campo'=>'Sin_iva','dato'=>$sin_iva),
                                array('campo'=>'Porc_IVA','dato'=>($params['iva_val']/100)),
                                array('campo'=>'Con_IVA','dato'=>$con_iva),
                                array('campo'=>'total','dato'=>$total),
                                array('campo'=>'subtotal','dato'=>$subtotal),
                                array('campo'=>'iva','dato'=>$valor_iva),
                                array('campo'=>'Tipo_pago','dato'=>$params['tipoPago']),
                                array('campo'=>'id_empresa','dato'=>$params['id_empresa']),
                                array('campo'=>'id_usuario','dato'=>$params['id_usuario']),
                                array('campo'=>'num_orden','dato'=>$numsec[0]['numero']),
                                array('campo'=>'fecha','dato'=>date('Y-m-d')),
                                array('campo'=>'TC','dato'=>'ORT')
                            );
                $resp = $this->ordenT->add('ordenes_trabajo',$datosOrd,$params['id_empresa']);

                $ordenDet = $this->ordenT->detalle_ordenes_trabajo_finalizadas($params['id_empresa'],false,false,$numsec[0]['numero']);

                $lineaData = array(
                                array('campo'=>'id_orden','dato'=>$ordenDet[0]['id_orden']),
                                array('campo'=>'TC','dato'=>'OR'),
                            );
                $lineasWhere = array(
                                array('campo'=>'id_orden','dato'=>$params['orden']),
                                array('campo'=>'TC','dato'=>'ORT'),
                            );
                $this->ordenT->update('lineas_orden_trabajo',$lineaData,$lineasWhere,$params['id_empresa']);



                // print_r('expression');die();
                // generar factura
                $numsec = $this->secuenciales->numero_secuencial($params['id_empresa'],'FA_SERIE_'.str_replace('-','',$params['serie']),'FA',$params['serie'],1);
                $datosFac = array(
                            array('campo'=>'Sin_iva','dato'=>$sin_iva),
                            array('campo'=>'Porc_IVA','dato'=>($params['iva_val']/100)),
                            array('campo'=>'Con_IVA','dato'=>$con_iva),
                            array('campo'=>'total','dato'=>$total),
                            array('campo'=>'subtotal','dato'=>$subtotal),
                            array('campo'=>'iva','dato'=>$valor_iva),
                            array('campo'=>'Tipo_pago','dato'=>$params['tipoPago']),
                            array('campo'=>'num_factura','dato'=>$numsec[0]['numero'] ),
                            array('campo'=>'id_empresa','dato'=>$params['id_empresa']),
                            array('campo'=>'id_usuario','dato'=>$params['id_usuario']),
                            array('campo'=>'fecha','dato'=>date('Y-m-d')),
                            array('campo'=>'id_cliente','dato'=>$cliente[0]['id'] ),
                            array('campo'=>'serie','dato'=>$params['serie']),
                            array('campo'=>'Autorizacion','dato'=>'123456789'),
                            array('campo'=>'Propina','dato'=>0),
                            array('campo'=>'Clave_Acceso','dato'=>'123456789'),
                            array('campo'=>'estado_factura','dato'=>'P'),
                            array('campo'=>'id_pedido','dato'=>$params['orden']),
                            array('campo'=>'datos_adicionales','dato'=>''),
                            array('campo'=>'estado_pago','dato'=>1),
                        );


                $this->ordenT->add('facturas',$datosFac,$params['id_empresa']);
                $parametros = array('numfac'=>$numsec[0]['numero'],'serie'=>$params['serie'],'id_empresa'=>$params['id_empresa']);
                $fact = $this->facturas->lista_facturas_api($parametros);

// print_r($fact);die();


                  //ingresa el pago 

                $data = array(
                        array('campo'=>'id_empresa','dato'=>$params['id_empresa']),
                        array('campo'=>'valor_pago','dato'=>$total),
                        array('campo'=>'fecha','dato'=>date('Y-m-d')),
                        array('campo'=>'estado','dato'=>1),
                        array('campo'=>'detalle','dato'=>'Pago  venta rapida :'.$ordenDet[0]['num_orden']),
                        array('campo'=>'id_caja','dato'=>$params['caja']),
                        array('campo'=>'id_usuario','dato'=>$params['id_usuario']),
                        array('campo'=>'id_factura','dato'=>$fact[0]['id']),
                        array('campo'=>'id_orden','dato'=>$params['orden']),
                        array('campo'=>'forma_pago','dato'=>$params['tipoPago']),
                );

                $resp = $this->ordenT->add('pagos_caja',$data,$params['id_empresa']);


                
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
                        array('campo'=>'id_factura','dato'=>$fact[0]['id']),
                        array('campo'=>'detalle','dato'=>'SALIDA DE STOCK POR FACTURA:'.$params['serie'].' - '.$numsec[0]['numero']),
                        array('campo'=>'fecha_Fab','dato'=>date('Y-m-d')),
                        array('campo'=>'fecha_Exp','dato'=>date('Y-m-d')),
                        array('campo'=>'usuario','dato'=>1),
                        array('campo'=>'proveedor','dato'=>''),
                        array('campo'=>'cliente','dato'=>''),
                        array('campo'=>'serie','dato'=>''),
                        array('campo'=>'empresa','dato'=>$params['id_empresa']),
                        array('campo'=>'id_ordenTrabajo','dato'=>$ordenDet[0]['id_orden']),
                    );
                    $this->ordenT->add('trans_kardex',$datos,$params['id_empresa']);


                    // para lista de facturas
                    $datos =  array(
                            array('campo'=>'producto','dato'=>$producto[0]['nombre']),
                            array('campo'=>'cantidad','dato'=>$value['cantidad']),
                            array('campo'=>'precio_uni','dato'=>$value['precio_uni']),
                            array('campo'=>'porc_descuento','dato'=>0),
                            array('campo'=>'descuento','dato'=>0),
                            array('campo'=>'iva','dato'=>$value['iva']),
                            array('campo'=>'total','dato'=>$value['total']),
                            array('campo'=>'id_factura','dato'=>$fact[0]['id']),
                            array('campo'=>'referencia','dato'=>$producto[0]['referencia']),
                            array('campo'=>'porc_iva','dato'=>($params['iva_val']/100)),
                            array('campo'=>'Serie_No','dato'=>$params['serie']),
                            array('campo'=>'subtotal','dato'=>$value['subtotal']),
                            array('campo'=>'id_guiaRemi','dato'=>''),
                            array('campo'=>'observacion' ,'dato'=>''),
                        );
                    $this->ordenT->add('lineas_factura',$datos,$params['id_empresa']);

                }

                return array('respuesta'=>1,'mensaje'=>'orden finalizada');  
            } catch (Exception $e) {

                return array('respuesta'=>-1,'mensaje'=>$e);        
        
        }
    }

    public function addfoto(array $params)
    {
        if(!isset($params['orden'])) { return 'enviar numero de orden';}
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);


        $directorioDestino =  dirname(__DIR__,2)."/php/img/ordenesImg/";
        $rutaRelativa = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/deepScript/php/img/ordenesImg/';

        // print_r($_SERVER);die();

        // Verificar si la carpeta existe, si no, crearla
        if (!file_exists($directorioDestino)) {
            mkdir($directorioDestino, 0777, true);
        }

        // print_r($params);
        // print_r($_FILES);die();

        // Comprobar si se ha enviado un archivo con el campo 'foto' (el mismo nombre que usaste en FormData.append('foto', ...))
        if (isset($_FILES['foto'])) {
            $archivo = $_FILES['foto'];
            
            // Validar errores de subida
            if ($archivo['error'] === UPLOAD_ERR_OK) {
                $nombreTemporal = $archivo['tmp_name'];
                $nombreOriginal = explode('.',basename($archivo['name']));
                
                // Opcional: Generar un nombre único para evitar que se sobrescriban archivos con el mismo nombre
                $nombreUnico = $params['tipoFoto'].'_'.$params['orden']. "." . $nombreOriginal[1];
                $rutaCompleta = $directorioDestino . $nombreUnico;
                $rutaCompletaRela = $rutaRelativa.$nombreUnico;

                // Mover el archivo desde la ruta temporal del servidor a tu carpeta definitiva
                if (move_uploaded_file($nombreTemporal, $rutaCompleta)) {
                    // Éxito al guardar

                     $datosFo =  array(
                            array('campo'=>'id_orden','dato'=>$params['orden']),
                            array('campo'=>'ruta_img','dato'=>$rutaCompletaRela),
                            array('campo'=>'id_empresa','dato'=>$params['id_empresa']),
                            array('campo'=>'id_usuario','dato'=>$params['id_usuario']),
                            array('campo'=>'posicion_foto','dato'=>$params['tipoFoto']),
                        );
                    $this->ordenT->add('fotos_orden_trabajo',$datosFo,$params['id_empresa']);



                    return array("respuesta" => 1,"mensaje" => "Imagen guardada correctamente", "ruta" => $rutaCompleta);
                } else {
                    // Error al mover el archivo
                    return array("respuesta" =>-1, "mensaje" => "Error al mover la imagen al directorio de destino.");
                }
            } else {
               return array("respuesta" => -1,"mensaje" => "Error en la subida del archivo. Código de error: " . $archivo['error']);
            }
        } else {
           return array("respuesta" => -1, "mensaje" => "No se encontró ninguna imagen en la petición (campo 'foto').");
        }
        // print_r($params);die();
    }
}