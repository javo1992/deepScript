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
            );

            $resp = $this->caja->add('caja',$data,$params['id_empresa']);
            if($resp)
            {
                return $this->caja->buscar_caja_abierta($params['id_empresa'],$params['fecha']);
            }else{
                return -1;
            }

        }else{
            return $caja;
        }
    }

    public function Arti(array $params): array
    {

        print_r($params);die();
        // Aquí tu consulta PDO / ORM
        return [
            ['id' => 1, 'titulo' => 'Primer artículo'],
            ['id' => 2, 'titulo' => 'Segundo artículo'],
        ];
    }
}