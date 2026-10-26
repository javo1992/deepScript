<?php
if(!class_exists('db'))
{
	include('../db/db.php');
}
/**
 * 
 */
class empresaM
{
	private $db;
	function __construct()
	{
		// $this->db = new db();
		$this->db = new db();
	}

	function datos_empresa($id_empresa)
	{
		$sql="SELECT * FROM empresa WHERE id_empresa = '".$id_empresa."'";
		return $this->db->datos($sql,$id_empresa);
	}
		function editar($tabla,$datos,$where)
	{
		 $rest = $this->db->update($tabla,$datos,$where,$_SESSION['INICIO']['ID_EMPRESA']);
		return $rest;
		
	}

	function tipo_usuario()
	{
		$sql="SELECT id_tipo_usuario as 'id',tipo_usuario as 'detalle' FROM tipo_usuario WHERE empresa = '".$_SESSION['INICIO']['ID_EMPRESA']."'";
		return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}
	function buscar_empresa($id_empresa,$ruc=false,$nombre=false,$razon=false)
	{
		$sql="SELECT * FROM empresa WHERE 1=1";
		if($ruc)
		{
			$sql.=" AND RUC = '".$ruc."'";
		}
		if($nombre)
		{
			$sql.=" AND Nombre_Comercial = '".$nombre."'";
		}
		if($razon)
		{
			$sql.=" AND Razon_Social = '".$razon."'";
		}

		return $this->db->datos($sql,$id_empresa);
	}
	
	
}


?>