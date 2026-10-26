<?php
include('../db/db.php');
/**
 * 
 */
class accesosM
{
	private $db;
	function __construct()
	{
		// $this->db = new db();
		$this->db = new db();
	}

	function lista_accesos($empresa,$usuario=false,$modulos=false)
	{
		$sql="SELECT id_accesos_empresa as 'ID',paginas as 'idp',detalle,nombre as 'usuario',SUBSTR(codigo,1,1) as 'menu'
			FROM accesos_empresa AE
			INNER JOIN menu M ON AE.paginas = M.id_menu
			LEFT JOIN usuario U ON AE.usuario = U.id_usuario
			WHERE empresa = '".$empresa."' ";
			if($usuario)
			{
			 $sql.=" AND usuario = '".$usuario."' ";
			} 
			if($modulos)
			{
				$sql.=" AND M.codigo = '".$modulos."'";
			}

			// print_r($sql);die();
		 return $this->db->datos($sql,$empresa);
	}
	function add($tabla,$datos,$empresa)
	{
		return $this->db->inserts($tabla,$datos,$empresa);
	}

	function delete($id,$empresa)
	{
		$sql="DELETE FROM accesos_empresa WHERE id_accesos_empresa = '".$id."'";
		return $this->db->sql_string($sql,$empresa);
	}
	
}


?>