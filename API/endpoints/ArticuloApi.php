<?php

require_once(dirname(__DIR__,2).'/php/modelo/lista_articulosM.php');
require_once(dirname(__DIR__,2).'/php/modelo/sucursalesM.php');

class ArticuloApi extends ApiEndpoint
{
    private $articulos;
    private $sucursal;

    function __construct(string $authLevel = 'required')
    {
        parent::__construct($authLevel);
        $this->articulos = new lista_articulosM();
        $this->sucursal = new sucursalesM();
    }

    public function lista_articulos(array $params): array
    {

        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);
        $id=false;
        if(isset($params['id']) && $params['id']!=0) { $id = $params['id']; }
        $query=false;
        if(isset($params['articulo']) && $params['articulo']!=0) { $query = $params['articulo']; }
        $referencia=false;
        if(isset($params['referencia']) && $params['referencia']!=0) { $referencia = $params['referencia']; }
        $servicio=0;
        if(isset($params['servicio']) ) { $servicio = $params['servicio']; }
        $categoria = false;
        if(isset($params['categoria']) ) { $categoria = $params['categoria']; }
        

        return $this->articulos->articulo_stock_precio_venta($params['id_empresa'],$query,$categoria,$servicio,$referencia,$id);
    }

    public function addArticulo(array $params): array
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);

        try {
            
        
            $producto = $this->articulos->buscar_producto($params['id_empresa'],$params['producto'],$categoria=false,$servicio=0,$referencia=false,$id=false);
            if(count($producto)>0)
            {
                return array("respuesta"=>-1,"mensaje"=>"El nombre del articulo ya esta registrado");
            }else{
                $producto = $this->articulos->buscar_producto($params['id_empresa'],false,$categoria=false,$servicio=0,$params['referencia'],$id=false);
                if(count($producto)>0)
                {
                    return array("respuesta"=>-1,"mensaje"=>"la referencia del articulo ya esta registrado");
                }
            }

            $sucursal = $this->sucursal->lista_sucursales($query=false,$params['id_empresa']);

            $data = array(
                    array('campo'=>'referencia','dato'=>(string)$params['referencia']),
                    array('campo'=>'nombre','dato'=>$params['producto']),
                    array('campo'=>'precio_uni','dato'=>$params['precio']),
                    array('campo'=>'iva','dato'=>$params['iva']),
                    array('campo'=>'stock','dato'=>$params['cantidad']),
                    array('campo'=>'servicio','dato'=>$params['tipo']==1 ? 0:1),
                    array('campo'=>'inventario','dato'=> $params['tipo']==1 ? 1:0 ),
                    array('campo'=>'producto_terminado','dato'=>$params['tipo']==1 ? 1:0),
                    array('campo'=>'peso','dato'=>0),
                    array('campo'=>'categoria','dato'=>$params['categoria']),
                    array('campo'=>'codigo_aux','dato'=>'.'),
                    array('campo'=>'codigo_bar','dato'=>'.'),
                    array('campo'=>'id_empresa','dato'=>$params['id_empresa']),
                    array('campo'=>'marca','dato'=>1),
                    array('campo'=>'modelo','dato'=>1),
                    array('campo'=>'uni_medida','dato'=>$params['unidad']),
                    array('campo'=>'color','dato'=>1),
                    array('campo'=>'genero','dato'=>1),
                    array('campo'=>'estado','dato'=>1),
                    array('campo'=>'sucursal','dato'=>$sucursal[0]['id']),
                    array('campo'=>'RFID','dato'=>'.'),
                    array('campo'=>'fecha_creacion','dato'=>(string)date('Y-m-d')),
                    array('campo'=>'descripcion2','dato'=>$params['descripcion']),
                    array('campo'=>'max','dato'=>$params['max']),
                    array('campo'=>'min','dato'=>$params['min']),
                    array('campo'=>'serie_pro','dato'=>'.'),
                    array('campo'=>'promocion','dato'=>0),
                    array('campo'=>'materia_prima','dato'=>0),
                    array('campo'=>'paquetes','dato'=>0),
                    array('campo'=>'xpaquetes','dato'=>0),
                    array('campo'=>'sueltos','dato'=>0),
            );

                $resp = $this->articulos->insertar($data,'productos',$params['id_empresa']);
                if($resp)
                {
                    if($params['tipo']=="1")
                    {
                        // ingresa en kardex
                        $producto = $this->articulos->articulo_stock_precio_venta($params['id_empresa'],$query=false,$categoria=false,$servicio=0,$params['referencia'],$id=false);
                        $datosT =  array(
                            array('campo'=>'id_producto','dato'=>$producto[0]['id_productos']),
                            array('campo'=>'fecha','dato'=>date('Y-m-d')),
                            array('campo'=>'TP','dato'=>'CD'),
                            array('campo'=>'entrada','dato'=>$params['cantidad']),
                            array('campo'=>'salida','dato'=>0),
                            array('campo'=>'valor_unitario','dato'=>$params['precio']),
                            array('campo'=>'total_iva','dato'=>0),
                            array('campo'=>'subtotal','dato'=> number_format($params['cantidad']*$params['precio'],2,'.','')),
                            array('campo'=>'existencias','dato'=>$params['cantidad']),
                            array('campo'=>'costo','dato'=>$params['precio']),
                            array('campo'=>'valor_total','dato'=>number_format($params['cantidad']*$params['precio'],2,'.','')),
                            array('campo'=>'id_factura','dato'=>'0'),
                            array('campo'=>'detalle','dato'=>'INGRESO INICIAL DE STOCK'),
                            array('campo'=>'fecha_Fab','dato'=>date('Y-m-d')),
                            array('campo'=>'fecha_Exp','dato'=>date('Y-m-d')),
                            array('campo'=>'usuario','dato'=>$params['id_usuario']),
                            array('campo'=>'proveedor','dato'=>''),
                            array('campo'=>'cliente','dato'=>''),
                            array('campo'=>'serie','dato'=>''),
                            array('campo'=>'empresa','dato'=>$params['id_empresa']),
                            array('campo'=>'id_ordenTrabajo','dato'=>'0'),
                        );
                        // print_r($datos);die();

                        $resp = $this->articulos->insertar($datosT,'trans_kardex',$params['id_empresa']);
                    }
                    return array('respuesta'=>1,'mensaje'=>"articulo agregado");
                }
                else{
                    return array('respuesta'=>-1,'mensaje'=>"error articulo agregado");
                }        
        } catch (Exception $e) {
            return array('respuesta'=>-1,'mensaje'=>$e);            
        }
    }

    public function update(array $params): array
    {
        // print_r($params);die();
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);

        $sucursal = $this->sucursal->lista_sucursales($query=false,$params['id_empresa']);

        $data = array(
                // array('campo'=>'referencia','dato'=>(string)$params['referencia']),
                array('campo'=>'nombre','dato'=>$params['producto']),
                array('campo'=>'precio_uni','dato'=>$params['precio']),
                array('campo'=>'iva','dato'=>$params['iva']),
                // array('campo'=>'stock','dato'=>$params['cantidad']),
                array('campo'=>'servicio','dato'=>$params['tipo']=="1" ? 0:1),
                array('campo'=>'inventario','dato'=> $params['tipo']=="1" ? 1:0 ),
                array('campo'=>'producto_terminado','dato'=>$params['tipo']=="1" ? 1:0),
                array('campo'=>'peso','dato'=>0),
                array('campo'=>'categoria','dato'=>$params['categoria']),
                array('campo'=>'codigo_aux','dato'=>'.'),
                array('campo'=>'codigo_bar','dato'=>'.'),
                array('campo'=>'id_empresa','dato'=>$params['id_empresa']),
                array('campo'=>'marca','dato'=>1),
                array('campo'=>'modelo','dato'=>1),
                array('campo'=>'uni_medida','dato'=>$params['unidad']),
                array('campo'=>'color','dato'=>1),
                array('campo'=>'genero','dato'=>1),
                array('campo'=>'estado','dato'=>1),
                array('campo'=>'sucursal','dato'=>$sucursal[0]['id']),
                array('campo'=>'RFID','dato'=>'.'),
                array('campo'=>'fecha_creacion','dato'=>(string)date('Y-m-d')),
                array('campo'=>'descripcion2','dato'=>$params['descripcion']),
                array('campo'=>'max','dato'=>$params['max']),
                array('campo'=>'min','dato'=>$params['min']),
                array('campo'=>'serie_pro','dato'=>'.'),
                array('campo'=>'promocion','dato'=>0),
                array('campo'=>'materia_prima','dato'=>0),
                array('campo'=>'paquetes','dato'=>0),
                array('campo'=>'xpaquetes','dato'=>0),
                array('campo'=>'sueltos','dato'=>0),
        );

        $where = array( array('campo'=>'id_productos','dato'=>$params['id']),);
        $resp = $this->articulos->update($data,'productos',$where,$params['id_empresa']);
        if($resp==1)
        {
            return array('respuesta'=>1,'mensaje'=>"articulo editado");
        }else{
            print_r($resp);
            return array('respuesta'=>-1,'mensaje'=>"no se pudo editar ");
        }
    }

    public function aliStock(array $params): array
    {
        if(!isset($params['id'])) { return 'id de producto necesario'; } 
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);

        try {
                   
            $producto = $this->articulos->articulo_stock_precio_venta($params['id_empresa'],$query=false,$categoria=false,$servicio=0,false,$params['id']);
            if($params['tipo']==0)
            {
                $entrada = 0;
                $salida = 0;
                if($producto[0]['stock']>0)
                {
                    $salida = $producto[0]['stock'];

                }else if($producto[0]['stock']<0)
                {
                    $entrada = $producto[0]['stock']*-1;
                }
                $datosT =  array(
                    array('campo'=>'id_producto','dato'=>$params['id']),
                    array('campo'=>'fecha','dato'=>date('Y-m-d')),
                    array('campo'=>'TP','dato'=>'CD'),
                    array('campo'=>'entrada','dato'=>$entrada),
                    array('campo'=>'salida','dato'=>$salida),
                    array('campo'=>'valor_unitario','dato'=>$producto[0]['costo']),
                    array('campo'=>'total_iva','dato'=>0),
                    array('campo'=>'subtotal','dato'=> number_format($producto[0]['stock']*$producto[0]['costo'],2,'.','')),
                    array('campo'=>'existencias','dato'=>$producto[0]['stock']),
                    array('campo'=>'costo','dato'=>$producto[0]['costo']),
                    array('campo'=>'valor_total','dato'=>number_format($producto[0]['stock']*$producto[0]['costo'],2,'.','')),
                    array('campo'=>'id_factura','dato'=>'0'),
                    array('campo'=>'detalle','dato'=>'REAJUSTE DE STOCK'),
                    array('campo'=>'fecha_Fab','dato'=>date('Y-m-d')),
                    array('campo'=>'fecha_Exp','dato'=>date('Y-m-d')),
                    array('campo'=>'usuario','dato'=>$params['id_usuario']),
                    array('campo'=>'proveedor','dato'=>''),
                    array('campo'=>'cliente','dato'=>''),
                    array('campo'=>'serie','dato'=>''),
                    array('campo'=>'empresa','dato'=>$params['id_empresa']),
                    array('campo'=>'id_ordenTrabajo','dato'=>'0'),
                );
                $resp = $this->articulos->insertar($datosT,'trans_kardex',$params['id_empresa']);
            }
            $datosT =  array(
                array('campo'=>'id_producto','dato'=>$params['id']),
                array('campo'=>'fecha','dato'=>date('Y-m-d')),
                array('campo'=>'TP','dato'=>'CD'),
                array('campo'=>'entrada','dato'=>$params['cantidad']),
                array('campo'=>'salida','dato'=>0),
                array('campo'=>'valor_unitario','dato'=>$params['costo']),
                array('campo'=>'total_iva','dato'=>0),
                array('campo'=>'subtotal','dato'=> number_format($params['cantidad']*$params['costo'],2,'.','')),
                array('campo'=>'existencias','dato'=>$params['cantidad']),
                array('campo'=>'costo','dato'=>$params['precio']),
                array('campo'=>'valor_total','dato'=>number_format($params['cantidad']*$params['costo'],2,'.','')),
                array('campo'=>'id_factura','dato'=>'0'),
                array('campo'=>'detalle','dato'=>'INGRESO DE STOCK'),
                array('campo'=>'fecha_Fab','dato'=>date('Y-m-d')),
                array('campo'=>'fecha_Exp','dato'=>date('Y-m-d')),
                array('campo'=>'usuario','dato'=>$params['id_usuario']),
                array('campo'=>'proveedor','dato'=>''),
                array('campo'=>'cliente','dato'=>''),
                array('campo'=>'serie','dato'=>''),
                array('campo'=>'empresa','dato'=>$params['id_empresa']),
                array('campo'=>'id_ordenTrabajo','dato'=>'0'),
            );
            // print_r($datos);die();

            $resp = $this->articulos->insertar($datosT,'trans_kardex',$params['id_empresa']);
            if($resp==1)
            {
                return array('respuesta'=>1,'mensaje'=>'Stock Actualizado');
            }else{

                return array('respuesta'=>-1,'mensaje'=>'no se pudo Actualizado');
            }

         } catch (Exception $e) {
                return array('respuesta'=>-1,'mensaje'=>$e);            
        }
    }

}