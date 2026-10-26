<?php 
include('../modelo/sucursalesM.php');
/**
 * 
 */
$controlador = new sucursalesC();

if(isset($_GET['sucursales']))
{
	$query='';
	if(isset($_GET['q']))
	{
		$query= $_GET['q'];
	}
	echo json_encode($controlador->buscar_sucursal_auto($query));

}


class sucursalesC
{
	private $modelo;
	
	function __construct()
	{
		$this->modelo = new sucursalesM();
		
	}

	function buscar_sucursal_auto($query)
	{
		$datos = $this->modelo->lista_sucursales($query,$_SESSION['INICIO']['ID_EMPRESA']);
		$respuesta = array();
		foreach ($datos as $key => $value) {
			$respuesta[] = array('id'=>$value['id'],'text'=>$value['nombre']);
		}

		return $respuesta;

	}
}
?>