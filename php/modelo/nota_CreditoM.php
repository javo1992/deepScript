<?php 
if(!class_exists('db'))
{
	include('../db/db.php');
}
/**
 * 
 */
class nota_CreditoM
{
	private $db;
	
	function __construct()
	{
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
	function nota_venta($empresa,$id=false,$serie_nc = false,$numero_nc=false,$auto_nc=false,$cliente=false,$desde=false,$hasta=false)
	{
		$sql = "SELECT N.*,C.nombre,C.ci_ruc,C.direccion,C.telefono,C.TD,C.tipo,C.mail,C.Razon_Social,C.id_cliente FROM nota_credito N
		LEFT JOIN cliente C ON N.cliente = C.id_cliente
		WHERE empresa = '".$empresa."'";
		if($id)
		{
			$sql.=" AND id_nota_credito = '".$id."'";
		}
		if($serie_nc)
		{
			$sql.=" AND serie_nc = '".$serie_nc."'";
		}
		if($numero_nc)
		{
			$sql.=" AND numero_nc = '".$numero_nc."'";
		}
		if($auto_nc)
		{
			$sql.=" AND autorizacion_nc = '".$auto_nc."'";
		}
		if($cliente)
		{
			$sql.=" AND nombre = '%".$cliente."%'";
		}
		if($desde!='' &&  $hasta!='')
		{			
			$sql.=" AND fecha_nc BETWEEN '".$desde."' AND '".$hasta."'";
		}

		$sql.=" ORDER BY fecha_nc,id_nota_credito DESC";
		
		return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);

	}
	
	function linea_nota_venta($nota_credito,$empresa)
	{
		$sql = "SELECT * FROM lineas_nota_credito WHERE nota_credito = '".$nota_credito."'";		
		return $this->db->datos($sql,$empresa);
	}
	
	function eliminar_linea($id,$empresa)
	{
		$sql = "DELETE FROM lineas_nota_credito WHERE id_nota_credito_linea='".$id."'";
		return $this->db->sql_string($sql,$empresa);
	}
	function eliminar_linea_nota($id,$empresa)
	{
		$sql = "DELETE FROM lineas_nota_credito WHERE nota_credito='".$id."'";
		return $this->db->sql_string($sql,$empresa);
	}
	function eliminar_nota($id,$empresa)
	{
		$sql = "DELETE FROM nota_credito WHERE id_nota_credito='".$id."'";
		return $this->db->sql_string($sql,$empresa);
	}
	function datos_empresa_sucursal_usuario($idUsuario,$id_empresa)
	{
		$sql = "SELECT * FROM usuario U
		INNER JOIN empresa E ON U.id_empresa = E.id_empresa
		LEFT JOIN sucursales S ON U.sucursal = S.id_sucursal 
		WHERE id_usuario = '".$idUsuario."'";
		// print_r($sql);die();
		$result = $this->db->datos($sql,$id_empresa);
	    return $result;

	}
}

?>