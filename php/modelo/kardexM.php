<?php
if(!class_exists('db'))
{
	include('../db/db.php');
}
/**
 * 
 */
class kardexM
{
	private $db;
	
	function __construct()
	{
		$this->db = new db();

	}

	function lista($articulo=false,$desde=false,$hasta=false)
	{
		$sql = "SELECT id_kardex,P.nombre,TK.fecha,entrada,salida,valor_unitario,total_iva,subtotal,valor_total,existencias,costo,Factura,TK.detalle 
		FROM trans_kardex TK
		INNER JOIN productos P ON TK.id_producto = P.id_productos  
		WHERE 1 = 1 AND empresa ='".$_SESSION['INICIO']['ID_EMPRESA']."'";
		if($articulo)
		{
			$sql.= ' AND id_producto= '.$articulo;
		}
		if($desde && $hasta == '')
		{
			$hasta = date('Y-m-d');
			$sql.=" AND fecha BETWEEN '".$desde."' AND '".$hasta."'";
		}
		if($hasta && $desde=='')
		{
			$desde = date('Y-m-d');
			$sql.=" AND fecha BETWEEN '".$desde."' AND '".$hasta."'";
		}
		if($hasta!='' && $desde!='')
		{
			$sql.=" AND fecha BETWEEN '".$desde."' AND '".$hasta."'";
		}

		$sql.=" ORDER BY id_kardex DESC";
		$datos = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
		return $datos;
	}
}

?>