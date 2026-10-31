<?php

require_once(dirname(__DIR__,2).'/php/modelo/lista_articulosM.php');

class ArticuloApi extends ApiEndpoint
{
    private $articulos;

    function __construct(string $authLevel = 'required')
    {
        parent::__construct($authLevel);
        $this->articulos = new lista_articulosM();
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