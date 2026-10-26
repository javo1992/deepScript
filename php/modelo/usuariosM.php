<?php 
if(!class_exists('db'))
{
	include('../db/db.php');
}
/**
 * 
 */
class custodioM
{
	private $db;
	
	function __construct()
	{
		$this->db = new db();

	}

	function lista_custodio($query=false,$id=false,$ci=false)
	{
		$sql = "SELECT id_usuario as 'id',nombre,direccion,ci_ruc as 'ci',nick,pass,direccion,sucursal AS 'ids',S.nombre_sucursal as 'sucursal',foto,email,U.telefono,S.serie_s as 'serie',U.tipo_usuario as 'idt',T.tipo_usuario
		FROM usuario U
		LEFT JOIN sucursales S ON U.sucursal = S.id_sucursal
		LEFT JOIN tipo_usuario T ON U.tipo_usuario = T.id_tipo_usuario
		WHERE 1=1 AND id_empresa='".$_SESSION['INICIO']['ID_EMPRESA']."'";
		if($query)
		{ 
		  $sql.=" AND nombre LIKE '%".$query."%' ";
		}
		if($id)
		{ 
		  $sql.=" AND id_usuario= '".$id."' ";
		}

		if($ci)
		{ 
		  $sql.=" AND ci_ruc = '".$ci."' ";
		}

		$sql.=" ORDER BY id_usuario DESC ";		
		// print_r($sql);die();
		$datos = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
		return $datos;
	}
	function lista_custodio_count($query=false)
	{
		$sql = "SELECT count (ID_PERSON) as 'cant' FROM PERSON_NO WHERE 1=1";
		if($query)
		{
		 $sql.=" AND PERSON_NOM LIKE '%".$query."%';";	
		}	
		$datos = $this->db->datos($sql);
		return $datos;
	}

	function buscar_custodio($buscar)
	{
		$sql = "SELECT ID_PERSON,PERSON_NO,PERSON_NOM,PERSON_CI,PERSON_CORREO,PUESTO,UNIDAD_ORG,DIRECCION,TELEFONO,FOTO FROM PERSON_NO WHERE ESTADO='A' and ID_PERSON ='".$buscar."'";
		// print_r($sql);die();		
		$datos = $this->db->datos($sql);
		return $datos;
	}
	function buscar_custodio_todo($id=false,$person_no=false,$person_nom=false)
	{
		$sql = "SELECT ID_PERSON,PERSON_NO,PERSON_NOM,PERSON_CI,PERSON_CORREO,PUESTO,UNIDAD_ORG,ESTADO FROM PERSON_NO WHERE 1=1 ";
		if($id)
		{
			$sql.=" and ID_PERSON = '".$id."'";
		}
		if($person_no)
		{
			$sql.=" and PERSON_NO = '".$person_no."'";
		}
		// print_r($sql);die();		
		$datos = $this->db->datos($sql);
		return $datos;
	}


	function buscar_custodio_($buscar)
	{
		$sql = "SELECT ID_PERSON,PERSON_NOM,PERSON_CI,PERSON_CORREO,PUESTO,UNIDAD_ORG FROM PERSON_NO WHERE PERSON_NO LIKE '".$buscar."'";
		// print_r($sql);die();		
		$datos = $this->db->datos($sql);
		return $datos;
	}

	function insertar_all($tabla,$datos)
	{
		 $rest = $this->db->inserts($tabla,$datos,$_SESSION['INICIO']['ID_EMPRESA']);	   
		return $rest;
		
	}


	function insertar($datos)
	{
		 $rest = $this->db->inserts('usuario',$datos,$_SESSION['INICIO']['ID_EMPRESA']);	   
		return $rest;
		
	}

	function editar($datos,$where)
	{
		 $rest = $this->db->update('usuario',$datos,$where,$_SESSION['INICIO']['ID_EMPRESA']);
		return $rest;
		
	}
	function eliminar($datos)
	{
		// $sql = "DELETE FROM usuario  WHERE ".$datos[0]['campo']."='".$datos[0]['dato']."';";
		$datos = $this->db->delete('usuario',$datos,$_SESSION['INICIO']['ID_EMPRESA']);
		return $datos;

		//$rest = $this->db->delete('PERSON_NO',$datos);
		//return $rest;	   
	}
	function tipo_usuario()
	{
		$sql = "SELECT *  FROM tipo_usuario  WHERE empresa='".$_SESSION['INICIO']['ID_EMPRESA']."' ";
		$datos = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
		return $datos;

		//$rest = $this->db->delete('PERSON_NO',$datos);
	}
}

?>