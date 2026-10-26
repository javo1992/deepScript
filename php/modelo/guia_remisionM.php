<?php 
if(!class_exists('db'))
{
	include('../db/db.php');
}
/**
 * 
 */
class guia_remisionM
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
	function guia_remision($empresa,$id=false,$serie_gr = false,$numero_gr=false,$auto_gr=false,$cliente=false,$desde=false,$hasta=false)
	{
		$sql = "SELECT G.*,F.*,G.id_cliente as 'clienteGR',G.Autorizacion as 'AutorizacionGR_F',C.nombre,C.ci_ruc,C.direccion FROM guia_remision G
		LEFT JOIN cliente C ON G.id_cliente = C.id_cliente
		LEFT JOIN facturas F ON G.id_fac_interna = F.id_factura
		WHERE G.id_empresa = '".$empresa."'";
		if($id)
		{
			$sql.=" AND ID = '".$id."'";
		}
		if($serie_gr)
		{
			$sql.=" AND Serie_GR = '".$serie_gr."'";
		}
		if($numero_gr)
		{
			$sql.=" AND Remision = '".$numero_gr."'";
		}
		if($auto_gr)
		{
			$sql.=" AND Autorizacion_GR = '".$auto_gr."'";
		}
		if($cliente)
		{
			$sql.=" AND nombre = '%".$cliente."%'";
		}
		if($desde!='' &&  $hasta!='')
		{			
			$sql.=" AND FechaGRE BETWEEN '".$desde."' AND '".$hasta."'";
		}

		// print_r($sql);die();
		$sql.=" ORDER BY FechaGRE,ID DESC";
		
		return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);

	}
	
	function lineas_guia_remision($guia,$empresa)
	{
		$sql = "SELECT * FROM lineas_factura WHERE id_guiaRemi = '".$guia."'";	
		// print_r($sql);die();	
		return $this->db->datos($sql,$empresa);
	}
	
	function eliminar_linea($id,$empresa)
	{
		$sql = "DELETE FROM lineas_factura WHERE id_lineas='".$id."'";
		return $this->db->sql_string($sql,$empresa);
	}
	function eliminar_linea_guia($id,$empresa)
	{
		$sql = "DELETE FROM lineas_factura WHERE id_guiaRemi='".$id."'";
		return $this->db->sql_string($sql,$empresa);
	}
	function eliminar_guia($id,$empresa)
	{
		$sql = "DELETE FROM guia_remision WHERE ID='".$id."'";
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
	function DCTipoPago($id=false,$codigo=false,$descripcion=false)
	{
   	  $sql = "SELECT Codigo,CONCAT(Codigo,' ',Descripcion) As CTipoPago
         FROM tabla_referenciales_sri
         WHERE Tipo_Referencia = 'FORMA DE PAGO'";
         if($codigo)
         {
         	$sql.=" AND Codigo = '".$codigo."'";
         }
         $sql.=" ORDER BY Codigo ";

	      $result = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	         // print_r($result);die();
	        $datos =  array();
	        foreach ($result as $key => $value) {	        		
			$datos[] =array('Codigo'=>$value['Codigo'],'CTipoPago'=>$value['CTipoPago']);	
			 // $datos[] = $row;
		   }
	      return $datos;
	}

	function facturas($empresa,$numero=false,$serie=false,$auto=false,$id=false)
	{
		$sql = "SELECT * FROM facturas WHERE id_empresa = '".$empresa."'";
		if($id)
		{
			$sql.=" AND id_factura='".$id."' ";
		}
		if($numero)
		{
			$sql.=" AND num_factura = '".$numero."'";
		}
		if($serie)
		{
			$sql.=" AND serie = '".$serie."'";
		}
		if($auto)
		{
			$sql.=" AND Autorizacion = '".$auto."'";
		}
		return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	      
	}
}

?>