<?php 
if(!class_exists('db'))
{
	include('../db/db.php');
}
/**
 * 
 */
class marcasM
{
	private $db;
	
	function __construct()
	{
		$this->db = new db();

	}

	function lista_marcas($id='',$pag=false )
	{
		// $sql = "SELECT ID_MARCA,CODIGO,DESCRIPCION FROM marcas ";

		$sql = "SELECT ID_MARCA,CODIGO,DESCRIPCION FROM marcas ";
		if($id)
		{
			$sql.= ' WHERE ID_MARCA= '.$id;
		}
		$sql.=" ORDER BY ID_MARCA ";
		if($pag)
		{
			$pagi = explode('-',$pag);
			$ini =$pagi[0];
			$fin = $pagi[1];
			$sql.= "LIMIT  ".$ini.",".$fin;

		}
		// print_r($sql);die(); 
		$datos = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
		return $datos;
	}
	function lista_marcas_pag()
	{
		$sql = "SELECT ID_MARCA,CODIGO,DESCRIPCION FROM marcas ";
		// $sql = "SELECT TOP() ID_MARCA,CODIGO,DESCRIPCION FROM marcas ";
		// if($id)
		// {
		// 	$sql.= ' WHERE ID_MARCA= '.$id;
		// }
		$sql.=" ORDER BY ID_MARCA DESC";
		$datos = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
		return $datos;
	}

	function buscar_marcas($buscar)
	{
		$sql = "SELECT ID_MARCA,CODIGO,DESCRIPCION FROM marcas WHERE DESCRIPCION +' '+CODIGO LIKE '%".$buscar."%'  ORDER BY ID_MARCA  OFFSET 0 ROWS FETCH NEXT 10 ROWS ONLY;";
		$datos = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
		return $datos;
	}

	function insertar($datos)
	{
		 $rest = $this->db->inserts('MARCAS',$datos,$_SESSION['INICIO']['ID_EMPRESA']);
	   
		return $rest;
	}
	function editar($datos,$where)
	{
		
	    $rest = $this->db->update('MARCAS',$datos,$where,$_SESSION['INICIO']['ID_EMPRESA']);
		return $rest;
	}
	function eliminar($datos)
	{
	    $rest = $this->db->delete('MARCAS',$datos,$_SESSION['INICIO']['ID_EMPRESA']);
		return $rest;
	}
}

?>