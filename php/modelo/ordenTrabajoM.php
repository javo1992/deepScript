<?php
require_once(dirname(__DIR__,1).'/db/db.php');
/**
 * 
 */
class ordenTrabajoM
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

	function lista_ordenes_trabajo($idempresa,$fecha,$placa=false)
	{
		$sql = "SELECT * 
				FROM ordenes_trabajo 
				where fecha = '".$fecha."' 
				AND estado_orden <> 'F'";
				if($placa)
				{
					$sql.=" AND placa like '".$placa."%'";
				}

		return $this->db->datos($sql,$idempresa);
	}

	function listar_ordenes_rango($parametros){
		$sql = "SELECT num_orden, fecha, encargado, telefono_encargado, subtotal, descuento, iva, total, serie, estado_orden, placa, estado_pago 
				FROM ordenes_trabajo
				where fecha >= '".$parametros['desde']."'";
				if($parametros['hasta'] != ''){
					$sql.=" AND fecha <= '".$parametros['hasta']."'";
				}
				if (!empty($parametros['placa']))
				{
					$sql.=" AND placa like '".$parametros['placa']."%'";
				}
				$sql.=" AND id_empresa = '".$_SESSION['INICIO']['ID_EMPRESA']."'";
		return $this->db->datos($sql, $_SESSION['INICIO']['ID_EMPRESA']);
	}

	function detalle_ordenes_trabajo($idempresa,$id=false,$placa=false)
	{
		$sql = "SELECT * 
				FROM ordenes_trabajo 
				where estado_orden <> 'F' ";
				if($id)
				{
					$sql.=" AND id_orden = '".$id."'";
				}

				if($placa)
				{
					$sql.=" AND PLACA like '".$placa."%'";
				}

		// print_r($sql);die();

		return $this->db->datos($sql,$idempresa);
	}

	function lineas_orden_trabajo($idempresa,$orden,$id=false)
	{
		$sql = "SELECT L.*,C.nombre as categoria
				FROM lineas_orden_trabajo L 
				INNER JOIN productos P ON L.referencia = P.referencia
				INNER JOIN categoria C ON P.categoria = C.id_categoria
				where id_orden = ".$orden." ";
				if($id)
				{
					$sql.=" AND id_lineas = '".$id."'";
				}
		$sql.=" order by id_lineas desc";

		// print_r($sql);die();

		return $this->db->datos($sql,$idempresa);
	}

	function detalle_orden($idempresa,$orden)
	{
		$sql = "SELECT * 
				FROM ordenes_trabajo 
				where id_empresa = '".$idempresa."' AND num_orden = '".$orden."'";

		return $this->db->datos($sql,$idempresa);
	}
}


?>