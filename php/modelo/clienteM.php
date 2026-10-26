<?php
require_once('../db/db.php');
/**
 * 
 */
class clienteM
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

	function lista_clientes_all($query=false,$ci=false,$id=false)
	{

		$sql = "SELECT id_cliente as 'id',nombre,ci_ruc,telefono,mail,direccion,Razon_Social as 'razon',foto,estado FROM cliente WHERE id_empresa='".$_SESSION['INICIO']['ID_EMPRESA']."' ";
		if($id)
		{
			$sql.=" AND id_cliente = '".$id."'";
		}
		if($query)
		{
			$sql.=" and nombre LIKE '%".$query."%'";
		}
		if($ci)
		{
			$sql.=" and ci_ruc LIKE '%".$ci."%'";
		}
		$sql.=' ORDER by id_cliente DESC';
		// print_r($sql);die();
		return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}
	
	function lista_clientes($query=false,$ci=false,$id=false,$tipo='C')
	{

		$sql = "SELECT id_cliente as 'id',nombre,ci_ruc,telefono,mail,direccion,Razon_Social as 'razon',foto,estado FROM cliente WHERE id_empresa='".$_SESSION['INICIO']['ID_EMPRESA']."' AND tipo = '".$tipo."' ";
		if($id)
		{
			$sql.=" AND id_cliente = '".$id."'";
		}
		if($query)
		{
			$sql.=" and nombre LIKE '%".$query."%'";
		}
		if($ci)
		{
			$sql.=" and ci_ruc LIKE '%".$ci."%'";
		}
		$sql.=' ORDER by id_cliente DESC';
		// print_r($sql);die();
		return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}

	function lista_proveedores($query=false,$ci=false,$id=false)
	{

		$sql = "SELECT id_cliente as 'id',nombre,ci_ruc,telefono,mail,direccion,Razon_Social as 'razon',estado,foto FROM cliente WHERE id_empresa='".$_SESSION['INICIO']['ID_EMPRESA']."' AND tipo = 'P' ";
		if($query)
		{
			$sql.=" and nombre LIKE '%".$query."%'";
		}
		if($ci)
		{
			$sql.=" and ci_ruc LIKE '%".$ci."%'";
		}
		if($id)
		{
			$sql.=" and id_cliente = '".$id."'";
		}
		$sql.=' ORDER by id_cliente DESC';
		// print_r($sql);die();
		return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}
	function lista_clientes_app($empresa,$query=false,$ci=false,$id=false)
	{

		$sql = "SELECT id_cliente as 'id',nombre,ci_ruc,telefono,mail,direccion,Razon_Social as 'razon' FROM cliente WHERE 1=1 and id_empresa='".$empresa."' AND tipo = 'C' ";
		if($query)
		{
			$sql.=" and nombre LIKE '%".$query."%'";
		}
		if($ci)
		{
			$sql.=" and ci_ruc LIKE '%".$ci."%'";
		}
		if($id)
		{
			$sql.=" and id_cliente='".$id."'";
		}			
		$sql.=' ORDER by id_cliente DESC';
		// print_r($sql);die();
		return $this->db->datos($sql,$empresa);
	}

	function lista_proveedor_app($empresa,$query=false,$ci=false,$id=false)
	{

		$sql = "SELECT id_cliente as 'id',nombre,ci_ruc,telefono,mail,direccion,Razon_Social as 'razon' FROM cliente WHERE 1=1 and id_empresa='".$empresa."' AND tipo = 'P' ";
		if($query)
		{
			$sql.=" and nombre LIKE '%".$query."%'";
		}
		if($ci)
		{
			$sql.=" and ci_ruc LIKE '%".$ci."%'";
		}
		if($id)
		{
			$sql.=" and id_cliente='".$id."'";
		}		
		$sql.=' ORDER by id_cliente DESC';
		// print_r($sql);die();
		return $this->db->datos($sql,$empresa);
	}
	
}


?>