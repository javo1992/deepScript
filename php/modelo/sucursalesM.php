<?php 
if(!class_exists('db'))
{
 include('../db/db.php');
}
/**
 * 
 */
class sucursalesM
{
	private $db;
	
	function __construct()
	{
		$this->db = new db();

	}

	function lista_sucursales($query=false,$id_empresa)
	{
		$sql = "SELECT id_sucursal as 'id',nombre_sucursal as 'nombre' FROM sucursales WHERE empresa = '".$id_empresa."'";
		if($query)
		{
			$sql.= " nombre_sucursal like '%".$id."%'";
		}
		$datos = $this->db->datos($sql,$id_empresa);
		return $datos;
	}

	function buscar_sucursales($id_empresa,$query=false,$id=false)
	{
		$sql = "SELECT * FROM sucursales WHERE empresa = '".$id_empresa."'";
		if($query)
		{
			$sql.= " AND nombre_sucursal like '%".$id."%'";
		}
		if($query)
		{
			$sql.= " AND id_sucursal='".$id."'";
		}
		$datos = $this->db->datos($sql,$id_empresa);
		return $datos;
	}
	
}

?>