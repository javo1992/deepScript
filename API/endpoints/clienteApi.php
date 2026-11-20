<?php
require_once(dirname(__DIR__,2).'/php/modelo/clienteM.php');

class clienteApi extends ApiEndpoint
{
    private $caja;

    function __construct(string $authLevel = 'required')
    {
        parent::__construct($authLevel);
        $this->cliente = new clienteM();
    }

    public function listado_cliente(array $params): array
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);
        $id = false;
        $nombre = false;
        $ci = false;

        if(isset($params['id']) && $params['id']!=0){$id = $params['id'];}
        if(isset($params['query']) && $params['query']!=0){$nombre = $params['query'];}
        if(isset($params['ci']) && $params['ci']!=0){$ci = $params['ci'];}

        return $this->cliente->lista_clientes_all_api($params['id_empresa'],$nombre,$ci,$id);

        print_r($params);die();

        return $this->categoria->lista_categorias($params['id_empresa']);
    }
}