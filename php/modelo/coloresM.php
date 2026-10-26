<?php 
if(!class_exists('db'))
{
 include('../db/db.php');
}
/**
 * 
 */
class coloresM
{
	private $db;
	
	function __construct()
	{
		$this->db = new db();

	}

	function lista_colores($id='')
	{
		$sql = "SELECT ID_COLORES,CODIGO,DESCRIPCION FROM colores ";
		if($id)
		{
			$sql.= ' WHERE ID_COLORES= '.$id;
		}
		$sql.=" ORDER BY ID_COLORES DESC";
		$datos = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
		return $datos;
	}
	function buscar_colores($buscar)
	{
		$sql = "SELECT ID_COLORES,CODIGO,DESCRIPCION FROM colores WHERE DESCRIPCION +' '+CODIGO LIKE '%".$buscar."%'";
		$datos = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
		return $datos;
	}

	function insertar($datos)
	{
		 $rest = $this->db->inserts('COLORES',$datos,$_SESSION['INICIO']['ID_EMPRESA']);
	   
		return $rest;
	}
	function editar($datos,$where)
	{
		
	    $rest = $this->db->update('COLORES',$datos,$where,$_SESSION['INICIO']['ID_EMPRESA']);
		return $rest;
	}
	function eliminar($datos)
	{
	    $rest = $this->db->delete('COLORES',$datos,$_SESSION['INICIO']['ID_EMPRESA']);
		return $rest;
	}
}

?>