<?php 
include('../modelo/generoM.php');
/**
 * 
 */
$controlador = new generoC();
if(isset($_GET['lista']))
{
	echo json_encode($controlador->lista_genero($_POST['id']));
}
if(isset($_GET['buscar']))
{
	echo json_encode($controlador->buscar_genero($_POST['buscar']));
}
if(isset($_GET['insertar']))
{
	echo json_encode($controlador->insertar_editar($_POST['parametros']));
}
if(isset($_GET['eliminar']))
{
	echo json_encode($controlador->eliminar($_POST['id']));
}
if(isset($_GET['genero']))
{
	$query='';
	if(isset($_GET['q']))
	{
		$query= $_GET['q'];
	}
	echo json_encode($controlador->buscar_genero_auto($query));
}


class generoC
{
	private $modelo;
	
	function __construct()
	{
		$this->modelo = new generoM();
		
	}
	function lista_genero($id)
	{
		$datos = $this->modelo->lista_genero($id);
		return $datos;
	}
	function buscar_genero($buscar)
	{
		$datos = $this->modelo->buscar_genero($buscar);
		return $datos;
	}
	function insertar_editar($parametros)
	{
		$datos[0]['campo'] ='CODIGO';
		$datos[0]['dato']=strval( $parametros['cod']);
		$datos[1]['campo'] = 'DESCRIPCION';
		$datos[1]['dato']= $parametros['des'];
		if($parametros['id'] == '')
		{
		$datos = $this->modelo->insertar($datos);
	    }else
	    {
	    	$where[0]['campo']= 'ID_GENERO';
		    $where[0]['dato'] = $parametros['id'];
	    	$datos = $this->modelo->editar($datos,$where);
	    }

		
		return $datos;

	}
	function eliminar($id)
	{
		$datos[0]['campo']='ID_GENERO';
		$datos[0]['dato']=$id;
		$datos = $this->modelo->eliminar($datos);		
		return $datos;

	}
	function buscar_genero_auto($query)
	{
		$datos = $this->modelo->buscar_genero($query);
		$respuesta = array();
		foreach ($datos as $key => $value) {
			$respuesta[] = array('id'=>$value['ID_GENERO'],'text'=>$value['DESCRIPCION']);
		}

		return $respuesta;

	}
}
?>