<?php
require_once(dirname(__DIR__,1).'/db/db.php');



class inventarioM
{
    private $db;
    function __construct()
    {
        $this->db = new db();
    }

    function listar_inventario($parametros)
    {
        $sql = "SELECT fecha, valor_unitario, total_iva, subtotal, existencias, costo,
                    valor_total, detalle, fecha_Fab, fecha_Exp, serie
                FROM trans_kardex
                WHERE fecha >= '".$parametros['desde']."'";
        if ($parametros['hasta'] != '') {
            $sql .= " AND fecha <= '".$parametros['hasta']."'";
        }
        $sql .= " AND empresa = '".$_SESSION['INICIO']['ID_EMPRESA']."'";
		return $this->db->datos($sql, $_SESSION['INICIO']['ID_EMPRESA']);
    }
}
?>