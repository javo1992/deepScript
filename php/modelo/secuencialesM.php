<?php 
require_once(dirname(__DIR__,1).'/db/db.php');
/**
 * 
 */
class secuencialesM
{
	private $db;
	
	function __construct()
	{
		$this->db = new db();

	}

	function lista_secuenciales($id=false,$detalle =false)
	{
		$sql = "SELECT * FROM codigos_secuenciales 
		WHERE id_empresa = '".$_SESSION['INICIO']['ID_EMPRESA']."'";
		if($id)
		{
			$sql.= ' AND id_secuenciales= '.$id;
		}
		if($detalle)
		{
			$sql.= " AND detalle_secuencial= '".$detalle."'";
		}
		$sql.=" ORDER BY id_secuenciales DESC";
		$datos = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
		return $datos;
	}
	function buscar_secuenciales($buscar)
	{
		$sql = "SELECT ID_secuenciales,CODIGO,DESCRIPCION FROM secuenciales WHERE DESCRIPCION +' '+CODIGO LIKE '%".$buscar."%'";
		$datos = $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
		return $datos;
	}

	function add($tabla,$datos,$empresa)
	{
		 $rest = $this->db->inserts($tabla,$datos,$empresa);
	   
		return $rest;
	}
	function editar($table,$datos,$where,$empresa)
	{
		
	    $rest = $this->db->update($table,$datos,$where,$empresa);
		return $rest;
	}
	function eliminar($tabla,$datos,$empresa)
	{
	    $rest = $this->db->delete($tabla,$datos,$empresa);
		return $rest;
	}
	function numero_secuencial($id_empresa,$query,$tipo,$aumentar=false)
	{
		$sql = "SELECT * 
				FROM codigos_secuenciales 
				WHERE detalle_secuencial = '".$query."' 
				AND id_empresa = '".$id_empresa."'";

		$datos = $this->db->datos($sql,$id_empresa);
		if(count($datos)>0)
		{
			if($aumentar)
			{
				$datos = $this->db->datos($sql,$id_empresa);
				$numero = $datos[0]['numero']+1;
				$datos = array( array('campo'=>'numero','dato'=>$numero),
						);

				$where = array( array('campo'=>'detalle_secuencial','dato'=>$query),
								array('campo'=>'id_empresa','dato'=>$id_empresa)
						);
				$this->db->update('codigos_secuenciales',$datos,$where,$id_empresa);

			}
			
		}else{
			$datos = array( array('campo'=>'numero','dato'=>1),
							array('campo'=>'id_empresa','dato'=>$id_empresa),
							array('campo'=>'detalle_secuencial','dato'=>$query),
							array('campo'=>'tipo','dato'=>$tipo),
						);

			 $rest = $this->db->inserts('codigos_secuenciales',$datos,$id_empresa);
		}
		
		$datos = $this->db->datos($sql,$id_empresa);
		return $datos;
	}
}

?>