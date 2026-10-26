<?php 
if(!class_exists('db'))
{
 include('../db/db.php');
}
/**
 * 
 */
class modulos_paginasM
{
	private $db;
	
	function __construct()
	{
		$this->db = new db();

	}

	function add($tabla ,$datos)
	{

		$id_empresa = $_SESSION['INICIO']['ID_EMPRESA'];
		return $this->db->inserts($tabla,$datos,$id_empresa);

	}
	function update($tabla ,$datos,$where)
	{
		$id_empresa = $_SESSION['INICIO']['ID_EMPRESA'];
		return $this->db->update($tabla,$datos,$where,$id_empresa);

	}

	function eliminar($id)
	{
		$id_empresa = $_SESSION['INICIO']['ID_EMPRESA'];
		// $sql = "DELETE FROM menu WHERE id_menu='".$id."'";
		$datos[0]['campo'] = 'id_menu';
		$datos[0]['dato']  = $id;
		return $this->db->delete('menu',$datos,$id_empresa);
	}

	function menu($id_empresa,$menu=false,$submenu=false,$menu_id=false)
    {
    	$sql = "SELECT * FROM menu 
    	WHERE  1=1 ";
    	if($menu)
    	{
    	  $sql.=" AND LENGTH(codigo)=1";
    	}
    	if($menu_id)
    	{
    	  $sql.=" AND codigo='".$menu_id."'";
    	}
    	if($submenu)
    	{
    		$sql.=" AND codigo like '".$submenu.".%'";
    	}
    	$sql.=" ORDER BY codigo"; 
    	// print_r($sql);die();
    	$result = $this->db->datos($sql,$id_empresa);
        return $result;

    }

    function paginas($id_empresa,$menu=false,$submenu=false,$menucodigo=false,$submenulike=false,$id_menu=false)
    {
    	$sql = "SELECT * FROM menu 
    	WHERE  1=1 ";
    	if($menu)
    	{
    	  $sql.=" AND LENGTH(codigo)=1";
    	}
    	if($id_menu)
    	{
    	  $sql.=" AND id_menu='".$id_menu."'";
    	}
    	if($menucodigo)
    	{
    	  $sql.=" AND codigo='".$menucodigo."'";
    	}
    	if($submenu)
    	{
    		$sql.=" AND LENGTH(codigo)>1";
    	}
    	if($submenulike)
    	{
    		$sql.=" AND codigo like '".$submenulike.".%'";
    	}
    	$sql.=" ORDER BY codigo"; 
    	// print_r($sql);die();
    	$result = $this->db->datos($sql,$id_empresa);
        return $result;

    }


    function pagina_max($id_empresa,$submenulike=false)
    {
    	$sql = "SELECT MaX(codigo) as 'codigo' FROM menu 
    	WHERE  1=1 ";
    	
    	if($submenulike)
    	{
    		$sql.=" AND codigo like '".$submenulike.".%'";
    	}
    	$sql.=" ORDER BY codigo"; 
    	// print_r($sql);die();
    	$result = $this->db->datos($sql,$id_empresa);
        return $result;

    }


}

?>