<?php 
if(!class_exists('db'))
{
	include(dirname(__DIR__).'/db/db.php');
}

/**
 * 
 */
class lista_retencionM
{
	
	private $db;
	function __construct()
	{
		// $this->db = new db();
		$this->db = new db();
	}


	function add($tabla,$datos)
	{
		$id_empresa = $_SESSION['INICIO']['ID_EMPRESA'];
		return $this->db->inserts($tabla,$datos,$id_empresa);
	}

	function update($tabla,$datos,$where)
	{
		$id_empresa = $_SESSION['INICIO']['ID_EMPRESA'];
		return $this->db->update($tabla,$datos,$where,$id_empresa); 
	}

	function delete($tabla,$datos)
	{
		$id_empresa = $_SESSION['INICIO']['ID_EMPRESA'];
		return $this->db->delete($tabla,$datos,$id_empresa);
	}

	function lista_retencion($parametros)
	{
		$sql = "SELECT id_retenciones as 'id',numero as 'num',fechaEmision as 'fecha',C.nombre,serie,estadoRet as 'estado',numeroFac as 'factura',EmisionFac as 'fechafac',establecimientoFac,puntoventa_Fac,autorizacion 
 
				FROM retenciones R
				INNER JOIN cliente C ON R.idproveedor  = C.id_cliente
				WHERE R.id_empresa = '".$_SESSION['INICIO']['ID_EMPRESA']."'"; 

		if($parametros['query'])
		{			
			$sql.=" AND C.nombre LIKE '%".$parametros['query']."%'";
		}
		if($parametros['numfac'])
		{
			if(is_numeric($parametros['numfac']))
			{
				$sql.=" AND numero LIKE '%".$parametros['numfac']."%'";
			}
		}
		if($parametros['desde']!='' &&  $parametros['hasta']!='')
		{			
			$sql.=" AND fechaEmision BETWEEN '".$parametros['desde']."' AND '".$parametros['hasta']."'";
		}

		if($parametros['serie'])
		{			
			$sql.=" AND serie = '".$parametros['serie']."'";
		}		
		$sql.=" ORDER BY Serie,numero DESC";

		// print_r($sql);die();
		$result = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	    return $result;
	}

	function delete_impuestos($id=false,$serie=false,$retencion=false)
	{
		$sql = "DELETE from retenciones_impuestos WHERE  id_empresa = '".$_SESSION['INICIO']['ID_EMPRESA']."'";
		if($id)
		{
			$sql.=" AND id_impuesto = '".$id."'";
		}
		if($serie)
		{
			$sql.=" AND serieRet = '".$serie."'";
		}
		if($retencion)
		{
			$sql.=" AND NoRetencion = '".$retencion."'";
		}
		return $this->db->sql_string($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}
	
	function delete_retencion($id=false)
	{
		$sql = "DELETE from retenciones WHERE  id_empresa = '".$_SESSION['INICIO']['ID_EMPRESA']."'";
		if($id)
		{
			$sql.=" AND id_retenciones = '".$id."'";
		}
		
		return $this->db->sql_string($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}
	
	function porbienes()
	{
		$sql = "SELECT * FROM tipo_retencion WHERE bienes = '1'";
		return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}

	function porservicios()
	{
		$sql = "SELECT * FROM tipo_retencion WHERE servicios = '1'";
		return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}

	function porconcepto($fecha)
	{
		$sql = "SELECT * 
           FROM Tipo_Concepto_Retencion 
           WHERE Codigo <> '.' 
           AND Fecha_Inicio <= '".$fecha."' 
           AND Fecha_Final >= '".$fecha."' 
           ORDER BY Codigo ";
           // print_r($sql);die();
		return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}

	function retencion($id=false,$serie=false,$numero=false)
	{
		$sql = 'SELECT * 
		FROM retenciones R
		INNER JOIN Cliente C on R.idproveedor = C.id_cliente
		WHERE 1 =1 ';
		if($id)
		{
			$sql.=" AND id_retenciones='".$id."'";
		}
		if($serie)
		{
			$sql.=" AND serie = '".$serie."' ";
		}
		if($numero)
		{
			$sql.=" AND numero ='".$numero."'";
		}
		return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}

	function impuestos_retencion($numero,$serie)
	{
		$sql = "SELECT * 
		FROM retenciones_impuestos 
		WHERE NoRetencion = '".$numero."'
		AND serieRet = '".$serie."'
		AND id_empresa = '".$_SESSION['INICIO']['ID_EMPRESA']."'";
		return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}

	function datos_empresa($idempresa)
	{
		$sql = "SELECT * FROM empresa WHERE  id_empresa = '".$idempresa."'";
		$result = $this->db->datos($sql,$idempresa);
	    return $result;

	}

}
?>