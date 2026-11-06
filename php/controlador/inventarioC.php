<?php
include('../modelo/inventarioM.php');

$controlador = new inventarioC();

if(isset($_GET['listar_inventario']))
{
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->listar_inventario($parametros));
}

class inventarioC
{
    private $modelo;

    function __construct()
    {
        $this->modelo = new inventarioM();
    }

    function listar_inventario($parametros)
    {
        $result = $this->modelo->listar_inventario($parametros);
        $tr = '';

        foreach ($result as $fila) {
            $tr .= '<tr>';
            foreach ($fila as $campo => $valor){
                $tr .= '<td>' .
                    htmlspecialchars((string)($valor ?? ''), ENT_QUOTES, 'UTF-8') .
                    '</td>'; 
            }

            $tr .= '</tr>';
        }
        return $tr;
    }
}

?>