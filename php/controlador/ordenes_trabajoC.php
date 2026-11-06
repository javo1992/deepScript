<?php
include('../modelo/ordenTrabajoM.php');


$controlador = new orden_trabajoC();

if(isset($_GET['lista_ordenes_trabajo']))
{
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->listar_ordenes_trabajo($parametros));
}

if(isset($_GET['cargar_orden']))
{
    $parametros = $_POST['parametros'];
    $datos = $controlador->cargar_orden($parametros);
    echo json_encode($datos[0]);
    echo json_encode($controlador->cargar_orden($parametros));
}

class orden_trabajoC
{
    private $modelo;

    function __construct()
    {
        $this->modelo = new ordenTrabajoM();
    }

    
    function listar_ordenes_trabajo($parametros)
    {
        $result = $this->modelo->listar_ordenes_rango($parametros);
        $tr = '';

        foreach ($result as $fila) {
            $tr .= '<tr>';
            foreach ($fila as $campo => $valor){
                
                if ($campo === 'num_orden'){
                    $num_orden = (int)$valor;

                    $tr .= '<td>
                        <a class="text-primary text-decoration-underline"
                        onclick="detalle_orden_trabajo('.$num_orden.')">
                        '.$num_orden.'
                    </td>';
                } else {
                   // Formatear decimales
                    if (in_array($campo, ['subtotal', 'descuento', 'iva', 'total'], true)
                        && $valor !== null && $valor !== '') {
                        $valor = number_format((float)$valor, 2, '.', '');
                    }

                    $tr .= '<td>' .
                        htmlspecialchars((string)($valor ?? ''), ENT_QUOTES, 'UTF-8') .
                        '</td>'; 
                }
            
                
            }

            $tr .= '</tr>';
        }
        return $tr;
    }

    function cargar_orden($parametros)
    {
        $result = $this->modelo->detalle_orden($_SESSION['INICIO']['ID_EMPRESA'],$parametros['nro_orden']);
        return $result;
    }
}
?>