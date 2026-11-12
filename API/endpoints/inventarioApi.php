<?php
require_once(dirname(__DIR__,2).'/php/modelo/alimentar_stockM.php');

class inventarioApi extends ApiEndpoint
{
    private $inventario;

    function __construct(string $authLevel = 'required')
    {
        parent::__construct($authLevel);
        $this->inventario = new alimentar_stockM();
    }

    public function listaInventario(array $params): array
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);

        // print_r($params);die();
        $query=false;
        $categoria=false;
        $servicio=0;
        $referencia=false;
        $id=false;

        if(isset($params['query']) && $params['query']!= 0){  $query = $params['query'];}
        if(isset($params['categoria']) && $params['categoria']!= 0){  $categoria = $params['categoria'];}
        if(isset($params['servicio']) && $params['servicio']!= 0){  $servicio = $params['servicio'];}
        if(isset($params['referencia']) && $params['referencia']!= 0){  $referencia = $params['referencia'];}
        if(isset($params['idproducto']) && $params['idproducto']!= 0){  $id = $params['idproducto'];}


        return $this->inventario->lista_articulos_stock($params['id_empresa'],$query,$categoria,$servicio,$referencia,$id);
    }

    public function listaKardex(array $params): array
    {
        $tokenData = $this->requireUser();
        $params = array_merge($params, $tokenData);

        // print_r($params);die();
        $query=false;
        $categoria=false;
        $servicio=0;
        $referencia=false;
        $id=false;
        $entradas = false;

        if(isset($params['query']) && $params['query']!= 0){  $query = $params['query'];}
        if(isset($params['categoria']) && $params['categoria']!= 0){  $categoria = $params['categoria'];}
        if(isset($params['servicio']) && $params['servicio']!= 0){  $servicio = $params['servicio'];}
        if(isset($params['referencia']) && $params['referencia']!= 0){  $referencia = $params['referencia'];}
        if(isset($params['idproducto']) && $params['idproducto']!= 0){  $id = $params['idproducto'];}
        if(isset($params['entradas']) && $params['entradas']!= 0){  $entradas = $params['entradas'];}


        return $this->inventario->lista_kardex($params['id_empresa'],$query,$categoria,$servicio,$referencia,$id,$entradas);
    }



}