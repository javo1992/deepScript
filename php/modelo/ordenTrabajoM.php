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
<<<<<<< HEAD
	}	

	function detalleExtraOrdenes($idempresa,$orden,$id=false)
	{
		$sql = "SELECT id_detalle_extra,detalle_extra,fecha_detalle_extra,id_empresa,id_orden,id_usuario,valor,id_factura
				FROM detalles_extras 
				where id_orden = ".$orden;
				if($id)
				{
					$sql.=" AND id_detalle_extra = '".$id."'";
				}
		$sql.=" order by id_detalle_extra desc";

		// print_r($sql);die();

		return $this->db->datos($sql,$idempresa);
	}	

	function observacionesOrdenes($idempresa,$orden,$id=false)
	{
		$sql = "SELECT id_observacion_orden,detalle_observacion,fecha_observacion,id_empresa,id_usuario,id_orden
				FROM observacion_orden_trabajo 
				where id_orden = ".$orden;
				if($id)
				{
					$sql.=" AND id_observacion_orden = '".$id."'";
				}
		$sql.=" order by id_observacion_orden desc";

		// print_r($sql);die();

		return $this->db->datos($sql,$idempresa);
	}	

	function fotosOrdenes($idempresa,$orden,$id=false)
	{
		$sql = "SELECT id_fotos_orden,id_orden,CONCAT(ruta_img,'?',RAND()) as ruta_img,id_empresa,id_usuario,posicion_foto
				FROM fotos_orden_trabajo 
				where id_orden = ".$orden;
				if($id)
				{
					$sql.=" AND id_fotos_orden = '".$id."'";
				}
		$sql.=" order by id_fotos_orden desc";

		// print_r($sql);die();

		return $this->db->datos($sql,$idempresa);
	}	
=======
	}

	function detalle_orden($idempresa,$orden)
	{
		$sql = "SELECT * 
				FROM ordenes_trabajo 
				where id_empresa = '".$idempresa."' AND num_orden = '".$orden."'";

		return $this->db->datos($sql,$idempresa);
	}
>>>>>>> 2993cb78ec1296124cc52de1a95ae4ec22c64013
}


?>