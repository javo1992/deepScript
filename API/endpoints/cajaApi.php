<?php
require_once(dirname(__DIR__,2).'/php/modelo/cajaM.php');

class cajaApi extends ApiEndpoint
{
    private $caja;

    function __construct(string $authLevel = 'required')
    {
        parent::__construct($authLevel);
        $this->caja = new cajaM();
    }

    public function index(array $params): array
    {

        print_r($params);die();
        // Aquí tu consulta PDO / ORM
        return [
            ['id' => 1, 'titulo' => 'Primer artículo'],
            ['id' => 2, 'titulo' => 'Segundo artículo'],
        ];
    }


    public function addCaja(array $params): array
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);

        $caja = $this->caja->buscar_caja_abierta($params['id_empresa'],$params['fecha']);
        if(count($caja)==0)
        {
            $data = array(
                    array('campo'=>'id_empresa','dato'=>$params['id_empresa']),
                    array('campo'=>'valor_inicial','dato'=>$params['inicio']),
                    array('campo'=>'fecha_caja','dato'=>$params['fecha']),
                    array('campo'=>'estado_caja','dato'=>1),
                    array('campo'=>'observacion','dato'=>$params['observacion']),
                    array('campo'=>'id_usuario','dato'=>$params['id_usuario']),
            );

            $resp = $this->caja->add('caja',$data,$params['id_empresa']);

            if($resp)
            {
                $cajaA =  $this->caja->buscar_caja_abierta($params['id_empresa'],$params['fecha']);
                $dataInicio = array(
                        array('campo'=>'id_empresa','dato'=>$params['id_empresa']),
                        array('campo'=>'valor_pago','dato'=>$params['inicio']),
                        array('campo'=>'fecha','dato'=>$params['fecha']),
                        array('campo'=>'estado','dato'=>1),
                        array('campo'=>'detalle','dato'=>'INICIO CAJA'),
                        array('campo'=>'id_caja','dato'=>$cajaA[0]['id_caja']),
                        array('campo'=>'id_usuario','dato'=>$params['id_usuario']),
                        array('campo'=>'forma_pago','dato'=>'01'),
                        array('campo'=>'inicial','dato'=>1),
                );

                $resp = $this->caja->add('pagos_caja',$dataInicio,$params['id_empresa']);


                return $cajaA;
            }else{
                return -1;
            }

        }else{
            return $caja;
        }
    }

    public function ListaCajaAbiertasAnteriores(array $params): array
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);
        // print_r($params);die();
        $caja = $this->caja->buscar_caja_abierta_anteriores($params['id_empresa'],$params['fechaActual']);
        if(count($caja)>0)
        {
            if($params['fechaActual']!=0)
            {
                return array('respuesta'=>1,'fecha'=>$caja[0]['fecha_caja']);
            }else{
                return $caja;
            }
        }else{
            return array('respuesta'=>0,'fecha'=>'');
        }
    }

    public function ListaCaja(array $params): array
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);
        $con_estado = 1;
        // if($params['estado']=='all') { $params['estado'] = 0; $con_estado = 0;} 
        // print_r($params);die();
        $caja = $this->caja->buscar_caja($params['id_empresa'],$params['fechaActual'],$params['estado'],$con_estado);
        // if(count($caja)>0)
        // {
        //     if($params['fechaActual']!=0)
        //     {
        //         return array('respuesta'=>1,'fecha'=>$caja[0]['fecha_caja']);
        //     }else{
                return $caja;
        //     }
        // }else{
        //     return array('respuesta'=>0,'fecha'=>'');
        // }
    }


    public function cajaDetalle(array $params): array
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);

        // print_r($params);die();
        $caja = $this->caja->buscar_caja_abierta($params['id_empresa'],$params['fechaActual'],$params['estado']);
        return $caja;
    }


    public function addpago(array $params)
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);

        // print_r($params);die();
        $fac = null;
        if(isset($params['factura']) && $params['factura']!='' && $params['factura'] !=null) { $fac = $params['factura']; } 

        // $caja = $this->caja->buscar_caja_abierta($params['id_empresa'],$params['fecha']);
        // if(count($caja)==0)
        // {
            $data = array(
                    array('campo'=>'id_empresa','dato'=>$params['id_empresa']),
                    array('campo'=>'valor_pago','dato'=>$params['valor']),
                    array('campo'=>'fecha','dato'=>$params['fecha']),
                    array('campo'=>'estado','dato'=>1),
                    array('campo'=>'detalle','dato'=>$params['detalle']),
                    array('campo'=>'id_caja','dato'=>$params['caja']),
                    array('campo'=>'id_usuario','dato'=>$params['id_usuario']),
                    array('campo'=>'id_factura','dato'=>$fac),
                    array('campo'=>'id_orden','dato'=>$params['orden']),
            );

            $resp = $this->caja->add('pagos_caja',$data,$params['id_empresa']);
            return $resp;
    }

    public function CajadetalleCierre(array $params): array
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);

        // print_r($params);die();
        try {
            
       
            $total_inicio = 0;
            $total_efectivo = 0;
            $total_transferencias = 0;
            $total_otros = 0;
            $pagos = $this->caja->lista_pagos($params['id_empresa'],$params['idcaja']);

             // print_r($pagos);die();

            foreach ($pagos as $key => $value) {
                if($value['inicial']==1)
                {
                    $total_inicio+=$value['valor_pago'];
                }else{
                    if($value['forma_pago']=='01')
                    {
                        $total_efectivo+=$value['valor_pago'];

                    }else if($value['forma_pago']=='20'){
                        $total_transferencias+=$value['valor_pago'];
                    }else{
                        $total_otros+=$value['valor_pago'];
                    }
                }
            }

            $total_egresos = 0;
            $egresos = $this->caja->lista_egresos($params['id_empresa'],$params['idcaja']);
            foreach ($egresos as $key => $value) {
                 $total_egresos+=$value['valor_pago'];
            }


            $total_caja = ($total_inicio +$total_efectivo +$total_transferencias +$total_otros) - $total_egresos;
            $total_efectivo_dia = ($total_efectivo+$total_inicio) -$total_egresos;

            $data =  array('caja_inicial'=>$total_inicio,'total_efectivo'=>number_format($total_efectivo,2,'.',''),'total_transferencias'=>number_format($total_transferencias,2,'.',''),'total_otros'=>number_format($total_otros,2,'.',''),'total_egresos'=>number_format($total_egresos,2,'.',''),'total_caja'=>number_format($total_caja,2,'.',''),'total_efectivo_dia'=>number_format($total_efectivo_dia,2,'.',''));

            return $data;
         } catch (Exception $e) {

            return $e;
            
        }
    }


    public function cierrecaja(array $params)
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);

        // print_r($params);die();
        // $fac = null;
        if(!isset($params['idcaja'])) { return "Caja no encontrada"; } 

        // $caja = $this->caja->buscar_caja_abierta($params['id_empresa'],$params['fecha']);
        // if(count($caja)==0)
        // {

        $faltante = 0;
        $sobrante = 0;
        if(($params['total_caja']-$params['conteo'])>0)
        {
            $faltante = $params['total_caja']-$params['conteo'];
            $sobrante = 0;
        }else{
            $faltante = 0;
            $sobrante = $params['conteo']-$params['total_caja'];
        }

        $total_ingresos = $params['total_caja']-$params['inicio_caja'];
        $tarjeta = $params['total_caja']-$params['total_efectivo'];

            $data = array(
                    array('campo'=>'id_empresa','dato'=>$params['id_empresa']),
                    array('campo'=>'faltante','dato'=>$faltante),
                    array('campo'=>'sobrante','dato'=>$sobrante),
                    array('campo'=>'total_dia','dato'=>$params['total_caja']),
                    array('campo'=>'total_retiros','dato'=>$params['total_egresos']),
                    array('campo'=>'total_caja','dato'=>$params['total_caja']),
                    array('campo'=>'total_ingresos','dato'=>$total_ingresos),
                    array('campo'=>'tarjetas','dato'=>$tarjeta),
                    array('campo'=>'fecha','dato'=>date('Y-m-d')),
                    array('campo'=>'id_usuario','dato'=>$params['id_usuario']),
            );

            $resp = $this->caja->add('cierre_caja',$data,$params['id_empresa']);

            // edita caja pagos y egresos
            $datoscaja =  array(
                            array('campo'=>'estado_caja','dato'=>false),
                            array('campo'=>'valor_final','dato'=>$params['total_caja']),
                            array('campo'=>'faltante_caja','dato'=>$faltante),
                            array('campo'=>'sobrante_caja','dato'=>$sobrante),
                            array('campo'=>'total_egresos','dato'=>$params['total_egresos']),
                            array('campo'=>'total_efectivo','dato'=>$params['total_efectivo']),
                            array('campo'=>'total_transferencias','dato'=>$tarjeta),
                        );
            $where =  array(array('campo'=>'id_caja','dato'=>$params['idcaja']),array('campo'=>'id_usuario','dato'=>$params['id_usuario']),);
            $resp = $this->caja->update('caja',$datoscaja,$where,$params['id_empresa']);

             $datoscaja =  array(
                            array('campo'=>'estado','dato'=>false),
                        );
            $where =  array(array('campo'=>'id_caja','dato'=>$params['idcaja']),array('campo'=>'id_usuario','dato'=>$params['id_usuario']),);
            $resp = $this->caja->update('pagos_caja',$datoscaja,$where,$params['id_empresa']);
            return $this->caja->update('egresos_caja',$datoscaja,$where,$params['id_empresa']);
    }

    public function addegreso(array $params)
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);

        // print_r($params);die();
        $fac = null;
        if(isset($params['factura']) && $params['factura']!='' && $params['factura'] !=null) { $fac = $params['factura']; } 

        // $caja = $this->caja->buscar_caja_abierta($params['id_empresa'],$params['fecha']);
        // if(count($caja)==0)
        // {
            $data = array(
                    array('campo'=>'id_empresa','dato'=>$params['id_empresa']),
                    array('campo'=>'valor_pago','dato'=>$params['valor']),
                    array('campo'=>'fecha','dato'=>$params['fecha']),
                    array('campo'=>'estado','dato'=>1),
                    array('campo'=>'detalle','dato'=>$params['detalle']),
                    array('campo'=>'id_caja','dato'=>$params['caja']),
                    array('campo'=>'id_usuario','dato'=>$params['id_usuario']),
                    array('campo'=>'forma_pago','dato'=>$params['tipo'])
            );

            $resp = $this->caja->add('egresos_caja',$data,$params['id_empresa']);
            return $resp;
    }

}