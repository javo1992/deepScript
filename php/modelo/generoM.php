<?php
if(!class_exists('db'))
{
	include('../db/db.php');
}
/**
 * 
 */
class generoM
{
	private $db;
	
	function __construct()
	{
		$this->db = new db();

	}

	function lista_genero($id='')
	{
		$sql = "SELECT ID_GENERO,CODIGO,DESCRIPCION FROM genero ";
		if($id)
		{
			$sql.= ' WHERE ID_GENERO= '.$id;
		}
		$sql.=" ORDER BY ID_GENERO DESC";
		$datos = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
		return $datos;
	}

	function buscar_genero($buscar)
	{
		$sql = "SELECT ID_GENERO,CODIGO,DESCRIPCION FROM genero WHERE DESCRIPCION +' '+CODIGO LIKE '%".$buscar."%'";
		$datos = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
		return $datos;
	}

	function insertar($datos)
	{
		 $rest = $this->db->inserts('GENERO',$datos,$_SESSION['INICIO']['ID_EMPRESA']);
	   
		return $rest;
	}
	function editar($datos,$where)
	{
		
	    $rest = $this->db->update('GENERO',$datos,$where,$_SESSION['INICIO']['ID_EMPRESA']);
		return $rest;
	}
	function eliminar($datos)
	{
	    $rest = $this->db->delete('GENERO',$datos,$_SESSION['INICIO']['ID_EMPRESA']);
		return $rest;
	}
}

?>