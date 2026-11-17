<?php
require_once(dirname(__DIR__,2).'/php/modelo/secuencialesM.php');

class secuencialesApi extends ApiEndpoint
{
    private $secuenciales;

    function __construct(string $authLevel = 'required')
    {
        parent::__construct($authLevel);
        $this->secuenciales = new secuencialesM();
    }

    public function lista_secuenciales(array $params): array
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);

        if($params['detalle']=='0' && $params['id']=='0')
        {
            $numero  = $this->secuenciales->lista_secuencial($params['id_empresa']);         
        }
        
        if($params['id']!='' && $params['id']!='0')
        {
            $numero  = $this->secuenciales->lista_secuencial($params['id_empresa'],$params['id']);
        }

        if($params['detalle']!='' && $params['detalle']!='0')
        {
            $numero  = $this->secuenciales->lista_secuencial($params['id_empresa'],false,$params['detalle']);
        }

        if($params['detalle']!='' && $params['detalle']!='0' && $params['id']!='' && $params['id']!='0')
        {
            $numero  = $this->secuenciales->lista_secuencial($params['id_empresa'],$params['id'],$params['detalle']);
        }

        return $numero;      
    }

    public function addsecuencial(array $params): array
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);

        if(!isset($params['detalle']) || $params['detalle']==''){ return array('respuesta'=>-1, 'msj'=>"Falta la variable detalle");}
        if(!isset($params['newserie']) || $params['newserie']==''){ return array('respuesta'=>-1, 'msj'=>"Falta la variable serie");}
        if(!isset($params['tipo']) || $params['tipo']==''){ return array('respuesta'=>-1, 'msj'=>"Falta la variable tipo");}

        $data = $this->secuenciales->lista_secuencial($params['id_empresa'],$id=false,$params['detalle'],$params['newserie']);
        if(count($data)==0)
        {                
             $datos = array( array('campo'=>'numero','dato'=>1),
                             array('campo'=>'id_empresa','dato'=>$params['id_empresa']),
                             array('campo'=>'detalle_secuencial','dato'=>$params['detalle']),
                             array('campo'=>'Serie','dato'=>$params['newserie']),
                             array('campo'=>'tipo','dato'=>$params['tipo']),
                         );

              $rest = $this->secuenciales->add('codigos_secuenciales',$datos,$params['id_empresa']);
              $data = $this->secuenciales->lista_secuencial($params['id_empresa'],$id=false,$params['detalle'],$params['newserie']);
              return $data;
        }else{
            return array('respuesta'=>-1, 'msj'=>"ya existe una serie con esos datos");
        }
    }

    public function numsecuencial(array $params): array
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);

        if(!isset($params['detalle']) || $params['detalle']==''){ return array('respuesta'=>-1, 'msj'=>"Falta la variable detalle");}
        $data = $this->secuenciales->numero_secuencial($params['id_empresa'],$params['detalle'],$params['tipo'],$params['newserie'],1);
        return $data;      
    }
}