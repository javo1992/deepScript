<?php 
include('../modelo/marcasM.php');
/**
 * 
 */
$controlador = new marcasC();
if(isset($_GET['lista']))
{
	$id='';
	if(isset($_POST['id']))
		{	
			$id = $_POST['id'];
        }
	echo json_encode($controlador->lista_marcas($id,"0-15"));
}
if(isset($_GET['buscar']))
{
	echo json_encode($controlador->buscar_marcas($_POST['buscare']));
}
if(isset($_GET['insertar']))
{
	echo json_encode($controlador->insertar_editar($_POST['parametros']));
}
if(isset($_GET['eliminar']))
{
	echo json_encode($controlador->eliminar($_POST['id']));
}
if(isset($_GET['paginacion']))
{
	echo json_encode($controlador->lista_marcas_pag());
}
if(isset($_GET['marca']))
{
	$query='';
	if(isset($_GET['q']))
	{
		$query= $_GET['q'];
	}
	echo json_encode($controlador->buscar_marca_auto($query));
}




class marcasC
{
	private $modelo;
	
	function __construct()
	{
		$this->modelo = new marcasM();
		
	}
	function lista_marcas($id,$pag)
	{
		$datos = $this->modelo->lista_marcas($id,$pag);
		// print_r(count($datos));
		// $resultado =  array('datos' => $datos,'num'=>count($datos));
		return $datos;
	}
	function lista_marcas_pag()
	{
		$datos = $this->modelo->lista_marcas_pag();
		$datos = count($datos);
		// print_r($datos);
		return $datos;
	}
	function buscar_marcas($buscar)
	{
		$datos = $this->modelo->buscar_marcas($buscar);
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
	    	$where[0]['campo']= 'ID_MARCA';
		    $where[0]['dato'] = $parametros['id'];
	    	$datos = $this->modelo->editar($datos,$where);
	    }

		
		return $datos;

	}
	function eliminar($id)
	{
		$datos[0]['campo']='ID_MARCA';
		$datos[0]['dato']=$id;
		$datos = $this->modelo->eliminar($datos);		
		return $datos;

	}

	function buscar_marca_auto($query)
	{
		$datos = $this->modelo->buscar_marcas($query);
		$respuesta = array();
		foreach ($datos as $key => $value) {
			$respuesta[] = array('id'=>$value['ID_MARCA'],'text'=>$value['DESCRIPCION']);
		}

		return $respuesta;

	}
}
?>