<?php
require_once(dirname(__DIR__,1).'/db/db.php');
/**
 * 
 */
class categoriaM
{
	private $db;
	function __construct()
	{
		// $this->db = new db();
		$this->db = new db();
	}

	function add($tabla,$datos,$id_empresa)
	{
		return $this->db->inserts($tabla,$datos,$id_empresa);
	}
	function update($tabla,$datos,$where,$id_empresa)
	{
		return $this->db->update($tabla,$datos,$where,$id_empresa);
	}
	function delete($tabla,$datos,$id_empresa)
	{
		return $this->db->delete($tabla,$datos,$id_empresa);
	}

	function lista_categorias($idempresa,$query=false)
	{
		$sql = "SELECT * 
				FROM categoria 
				WHERE empresa = '".$idempresa."' ";
				if($query)
				{
					$sql.=" AND nombre like '%".$query."%'";
				}

		return $this->db->datos($sql,$idempresa);
	}


	// function datos_empresa($id_empresa)
	// {
	// 	$sql="SELECT * FROM empresa WHERE id_empresa = '".$id_empresa."'";
	// 	return $this->db->datos($sql,$id_empresa);
	// }
	// 	function editar($tabla,$datos,$where)
	// {
	// 	 $rest = $this->db->update($tabla,$datos,$where,$_SESSION['INICIO']['ID_EMPRESA']);
	// 	return $rest;
		
	// }

	// function tipo_usuario()
	// {
	// 	$sql="SELECT id_tipo_usuario as 'id',tipo_usuario as 'detalle' FROM tipo_usuario WHERE empresa = '".$_SESSION['INICIO']['ID_EMPRESA']."'";
	// 	return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	// }
	// function buscar_empresa($id_empresa,$ruc=false,$nombre=false,$razon=false)
	// {
	// 	$sql="SELECT * FROM empresa WHERE 1=1";
	// 	if($ruc)
	// 	{
	// 		$sql.=" AND RUC = '".$ruc."'";
	// 	}
	// 	if($nombre)
	// 	{
	// 		$sql.=" AND Nombre_Comercial = '".$nombre."'";
	// 	}
	// 	if($razon)
	// 	{
	// 		$sql.=" AND Razon_Social = '".$razon."'";
	// 	}

	// 	return $this->db->datos($sql,$id_empresa);
	// }
	
	
}


?>