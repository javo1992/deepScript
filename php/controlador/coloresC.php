<?php 
include('../modelo/coloresM.php');
/**
 * 
 */
$controlador = new coloresC();
if(isset($_GET['lista']))
{
	echo json_encode($controlador->lista_colores($_POST['id']));
}
if(isset($_GET['buscar']))
{
	echo json_encode($controlador->buscar_colores($_POST['buscar']));
}
if(isset($_GET['insertar']))
{
	echo json_encode($controlador->insertar_editar($_POST['parametros']));
}
if(isset($_GET['eliminar']))
{
	echo json_encode($controlador->eliminar($_POST['id']));
}
if(isset($_GET['colores']))
{
	$query='';
	if(isset($_GET['q']))
	{
		$query= $_GET['q'];
	}
	echo json_encode($controlador->buscar_colores_auto($query));

}


class coloresC
{
	private $modelo;
	
	function __construct()
	{
		$this->modelo = new coloresM();
		
	}
	function lista_colores($id)
	{
		$datos = $this->modelo->lista_colores($id);
		return $datos;
	}
	function buscar_colores($buscar)
	{
		$datos = $this->modelo->buscar_colores($buscar);
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
	    	$where[0]['campo']= 'ID_COLORES';
		    $where[0]['dato'] = $parametros['id'];
	    	$datos = $this->modelo->editar($datos,$where);
	    }

		
		return $datos;

	}
	function eliminar($id)
	{
		$datos[0]['campo']='ID_COLORES';
		$datos[0]['dato']=$id;
		$datos = $this->modelo->eliminar($datos);		
		return $datos;

	}
	function buscar_colores_auto($query)
	{
		$datos = $this->modelo->buscar_colores($query);
		$respuesta = array();
		foreach ($datos as $key => $value) {
			$respuesta[] = array('id'=>$value['ID_COLORES'],'text'=>$value['DESCRIPCION']);
		}

		return $respuesta;

	}
}
?>