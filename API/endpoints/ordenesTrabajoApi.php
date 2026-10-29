<?php
require_once(dirname(__DIR__,2).'/php/modelo/ordenTrabajoM.php');
require_once(dirname(__DIR__,2).'/php/modelo/secuencialesM.php');

class ordenesTrabajoApi extends ApiEndpoint
{
    private $ordenT;
    private $secuenciales;

    function __construct(string $authLevel = 'required')
    {
        parent::__construct($authLevel);
        $this->ordenT = new ordenTrabajoM();
        $this->secuenciales = new secuencialesM();
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
                            array('campo'=>"estado_orden",'dato'=>0),
                            array('campo'=>"num_orden",'dato'=>$data[0]['numero'])
                        );
            $dat = $this->ordenT->add('ordenes_trabajo',$datos,$params['id_empresa']);
            return $dat;
        }else{
            return "Placa ya registrada en este dia";
        }

    }
}