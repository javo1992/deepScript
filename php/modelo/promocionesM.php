<?php 
include('../db/db.php');
/**
 * 
 */
class promocionesM
{
	
		private $db;
	function __construct()
	{
		// $this->db = new db();
		$this->db = new db();
	}

	function add($tabla,$datos)
	{
		return $this->db->inserts($tabla,$datos,$_SESSION['INICIO']['ID_EMPRESA']);
	}
	function update($tabla,$datos,$where,$id_empresa)
	{
		return $this->db->update($tabla,$datos,$where,$_SESSION['INICIO']['ID_EMPRESA']);
	}
	function delete($tabla,$datos,$id_empresa)
	{
		return $this->db->delete($tabla,$datos,$_SESSION['INICIO']['ID_EMPRESA']);
	}

	function lista_categorias()
	{
		$sql="SELECT id_promos,C.nombre,P.id_categorias FROM promos P
		INNER JOIN categoria C ON P.id_categorias = C.id_categoria
		WHERE id_categoria<>''";
		return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}
	function lista_productos()
	{
		$sql="SELECT id_promos,PR.nombre,PR.precio_uni FROM promos P
		INNER JOIN productos PR on P.id_producto = PR.id_productos
		WHERE id_producto<>''";
		return $this->db->datos($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}

	function eliminar_promo($id)
	{
		$sql="DELETE from promos WHERE id_promos = '".$id."'";
		return $this->db->sql_string($sql,$_SESSION['INICIO']['ID_EMPRESA']);
	}


	

}
?>