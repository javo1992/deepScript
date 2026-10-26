<?php 
if(!class_exists('db'))
{
 include('../db/db.php');
}
/**
 * 
 */
class estadoM
{
	private $db;
	
	function __construct()
	{
		$this->db = new db();

	}

	function lista_estado($id='')
	{
		$sql = "SELECT ID_ESTADO,CODIGO,DESCRIPCION FROM estado ";
		if($id)
		{
			$sql.= ' WHERE ID_ESTADO= '.$id;
		}
		$sql.=" ORDER BY ID_ESTADO DESC";
		$datos = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
		return $datos;
	}

	function buscar_estado($buscar)
	{
		$sql = "SELECT ID_ESTADO,CODIGO,DESCRIPCION FROM estado WHERE DESCRIPCION +' '+CODIGO LIKE '%".$buscar."%'";
		$datos = $this->db->datos($sql);
		return $datos;
	}

	function insertar($datos)
	{
		 $rest = $this->db->inserts('ESTADO',$datos,$_SESSION['INICIO']['ID_EMPRESA']);
	   
		return $rest;
	}
	function editar($datos,$where)
	{
		
	    $rest = $this->db->update('ESTADO',$datos,$where,$_SESSION['INICIO']['ID_EMPRESA']);
		return $rest;
	}
	function eliminar($datos)
	{
	    $rest = $this->db->delete('ESTADO',$datos,$_SESSION['INICIO']['ID_EMPRESA']);
		return $rest;
	}
}

?>