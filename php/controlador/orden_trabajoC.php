<?php
include('../modelo/ordenTrabajoM.php');


$controlador = new orden_trabajoC();

if(isset($_GET['lista_ordenes_trabajo']))
{
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->lista_ordenes_trabajo($parametros));
}

class orden_trabajoC
{
    private $modelo;

    function __contruct()
    {
        $this->modelo = new ordenTrabajoM();
    }
}

function lista_ordenes_trabajo($parametros)
{
    $result = $this->modelo->lista($parametros);
    print_r($result);
    $tr = '';
    foreach($result as $key => $value)
    {

    }
}
?>