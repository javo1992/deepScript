<?php
require_once(dirname(__DIR__,1).'/db/db.php');
/**
 * 
 */
class cajaM
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

	function buscar_caja_abierta($idempresa,$fecha,$estado=1)
	{
		$sql = "SELECT * 
				FROM caja 
				WHERE id_empresa = '".$idempresa."' 
				AND fecha_caja = '".$fecha."' 
				AND estado_caja = '".$estado."'";

		return $this->db->datos($sql,$idempresa);
	}

	function buscar_caja_abierta_anteriores($idempresa,$fecha=false,$estado=1)
	{
		$sql = "SELECT c.id_caja,c.id_usuario,fecha_caja,valor_inicial,valor_final,faltante_caja,sobrante_caja,total_egresos,total_efectivo,total_transferencias,observacion,c.id_empresa,estado_caja,nombre,COALESCE(SUM(p.valor_pago), 0) AS total
				FROM caja c
				INNER JOIN usuario u ON c.id_usuario = u.id_usuario 
				LEFT JOIN pagos_caja p ON c.id_caja = p.id_caja AND p.id_empresa = c.id_empresa
				WHERE c.id_empresa = '".$idempresa."' ";
				if($fecha!=0)
				{
					$sql.=" AND fecha_caja <> '".$fecha."' ";
				}
				$sql.=" AND estado_caja = '".$estado."'
				GROUP BY 
			    c.id_caja,
			    c.id_usuario,
			    c.fecha_caja,
			    c.valor_inicial,
			    c.valor_final,
			    c.faltante_caja,
			    c.sobrante_caja,
			    c.total_egresos,
			    c.total_efectivo,
			    c.total_transferencias,
			    c.observacion,
			    c.id_empresa,
			    c.estado_caja,
			    u.nombre;
			    ";

				// print_r($sql);die();

		return $this->db->datos($sql,$idempresa);
	}

	function buscar_caja($idempresa,$fecha=false,$estado='all')
	{
		$sql = "SELECT c.id_caja as id,c.id_usuario,fecha_caja as fechaApertura,valor_inicial as montoInicial,valor_final,faltante_caja,sobrante_caja,total_egresos,total_efectivo,total_transferencias,observacion,c.id_empresa,estado_caja as estado,nombre as responsable,COALESCE(SUM(p.valor_pago), 0) AS totalCaja
				FROM caja c
				INNER JOIN usuario u ON c.id_usuario = u.id_usuario 
				LEFT JOIN pagos_caja p ON c.id_caja = p.id_caja AND p.id_empresa = c.id_empresa
				WHERE c.id_empresa = '".$idempresa."' ";
				if($fecha!=0)
				{
					$sql.=" AND fecha_caja <> '".$fecha."' ";
				}
				if($estado!='all')
				{
					$sql.=" AND estado_caja = '".$estado."' ";
				}
				$sql.="GROUP BY 
			    c.id_caja,
			    c.id_usuario,
			    c.fecha_caja,
			    c.valor_inicial,
			    c.valor_final,
			    c.faltante_caja,
			    c.sobrante_caja,
			    c.total_egresos,
			    c.total_efectivo,
			    c.total_transferencias,
			    c.observacion,
			    c.id_empresa,
			    c.estado_caja,
			    u.nombre
			    ORDER BY c.id_caja DESC";

				// print_r($sql);die();

		return $this->db->datos($sql,$idempresa);
	}


	function lista_pagos($idempresa,$caja=false)
	{
		$sql = "SELECT id_pagos,valor_pago,id_factura,forma_pago,fecha,mesa,detalle,inicial,estado,id_orden,id_caja,id_usuario,id_empresa
				FROM pagos_caja 
				WHERE id_empresa = '".$idempresa."' 
				AND estado= 1 ";
				if($caja)
				{
					$sql.=" AND id_caja = '".$caja."'";
				}
				// print_r($sql);die();

		return $this->db->datos($sql,$idempresa);
	}

	function lista_egresos($idempresa,$caja=false)
	{
		$sql = "SELECT id_pagos,valor_pago,id_factura,forma_pago,fecha,mesa,detalle,inicial,estado,id_orden,id_caja,id_usuario,id_empresa
				FROM egresos_caja 
				WHERE id_empresa = '".$idempresa."' 
				AND estado= 1 ";
				if($caja)
				{
					$sql.=" AND id_caja = '".$caja."'";
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