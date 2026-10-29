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
				where fecha = '".$fecha."' ";
				if($placa)
				{
					$sql.=" AND PLACA like '".$placa."%'";
				}

		return $this->db->datos($sql,$idempresa);
	}

	
}


?>