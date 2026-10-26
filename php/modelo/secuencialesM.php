<?php 
if(!class_exists('db'))
{
 include('../db/db.php');
}
/**
 * 
 */
class secuencialesM
{
	private $db;
	
	function __construct()
	{
		$this->db = new db();

	}

	function lista_secuenciales($id=false,$detalle =false)
	{
		$sql = "SELECT * FROM codigos_secuenciales 
		WHERE id_empresa = '".$_SESSION['INICIO']['ID_EMPRESA']."'";
		if($id)
		{
			$sql.= ' AND id_secuenciales= '.$id;
		}
		if($detalle)
		{
			$sql.= " AND detalle_secuencial= '".$detalle."'";
		}
		$sql.=" ORDER BY id_secuenciales DESC";
		$datos = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
		return $datos;
	}
	function buscar_secuenciales($buscar)
	{
		$sql = "SELECT ID_secuenciales,CODIGO,DESCRIPCION FROM secuenciales WHERE DESCRIPCION +' '+CODIGO LIKE '%".$buscar."%'";
		$datos = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
		return $datos;
	}

	function add($tabla,$datos,$empresa)
	{
		 $rest = $this->db->inserts($tabla,$datos,$empresa);
	   
		return $rest;
	}
	function editar($table,$datos,$where,$empresa)
	{
		
	    $rest = $this->db->update($table,$datos,$where,$empresa);
		return $rest;
	}
	function eliminar($tabla,$datos,$empresa)
	{
	    $rest = $this->db->delete($tabla,$datos,$empresa);
		return $rest;
	}
}

?>