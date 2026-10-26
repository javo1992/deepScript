<?php 
include('../modelo/estadoM.php');
/**
 * 
 */
$controlador = new estadoC();
if(isset($_GET['lista']))
{
	echo json_encode($controlador->lista_estado($_POST['id']));
}
if(isset($_GET['buscar']))
{
	echo json_encode($controlador->buscar_estado($_POST['buscar']));
}
if(isset($_GET['insertar']))
{
	echo json_encode($controlador->insertar_editar($_POST['parametros']));
}
if(isset($_GET['eliminar']))
{
	echo json_encode($controlador->eliminar($_POST['id']));
}


class estadoC
{
	private $modelo;
	
	function __construct()
	{
		$this->modelo = new estadoM();
		
	}
	function lista_estado($id)
	{
		$datos = $this->modelo->lista_estado($id);
		return $datos;
	}
	function buscar_estado($buscar)
	{
		$datos = $this->modelo->buscar_estado($buscar);
		return $datos;
	}
	function insertar_editar($parametros)
	{
		$datos[0]['campo'] ='CODIGO';
		$datos[0]['dato']= $parametros['cod'];
		$datos[1]['campo'] = 'DESCRIPCION';
		$datos[1]['dato']= $parametros['des'];
		if($parametros['id'] == '')
		{
		$datos = $this->modelo->insertar($datos);
	    }else
	    {
	    	$where[0]['campo']= 'ID_ESTADO';
		    $where[0]['dato'] = $parametros['id'];
	    	$datos = $this->modelo->editar($datos,$where);
	    }

		
		return $datos;

	}
	function eliminar($id)
	{
		$datos[0]['campo']='ID_ESTADO';
		$datos[0]['dato']=$id;
		$datos = $this->modelo->eliminar($datos);		
		return $datos;

	}
}
?>