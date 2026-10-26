<?php 
include(dirname(__DIR__).'/modelo/accesosM.php');
include(dirname(__DIR__).'/modelo/modulos_paginasM.php');
include(dirname(__DIR__).'/modelo/usuariosM.php');

/**
 * 
 */
$controlador = new accesosC();
if(isset($_GET['buscar_cliente_x_ci']))
{
	// print_r($_POST);die();
	$query = $_POST['q'];
	echo json_encode($controlador->buscar_cliente_x_ci($query));
}
if(isset($_GET['usuarios']))
{
	echo json_encode($controlador->usuarios());
}
if(isset($_GET['modulos']))
{
	echo json_encode($controlador->modulos());
}
if(isset($_GET['modulos_codigo']))
{
	echo json_encode($controlador->modulos_codigo());
}
if(isset($_GET['paginas']))
{ 
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->paginas($parametros));
}
if(isset($_GET['lista_accesos']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->lista_accesos($parametros));
}

if(isset($_GET['add_acceso']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->guardar_accesos($parametros));
}
if(isset($_GET['delete_acceso']))
{
	$id = $_POST['id'];
	echo json_encode($controlador->delete_accesos($id));
}
class accesosC
{
	private $modelo;
	private $modulos;
	function __construct()
	{
	  $this->modelo = new accesosM();
	  $this->modulos = new modulos_paginasM();
	  $this->usuarios = new custodioM();
	}


	function lista_accesos($parametros)
	{
		$empresa = $_SESSION['INICIO']['ID_EMPRESA'];
		$usuario = $parametros['usuario'];
		$modulos = $parametros['modulo'];
		$datos = $this->modelo->lista_accesos($empresa,$usuario);
		$tr='';
		foreach ($datos as $key => $value) {
			$m = $this->modulos->menu($empresa,$menu=false,$submenu=false,$value['menu']);
			$tr.='<tr>
			<td>'.$value['usuario'].'</td>
			<td>'.$value['detalle'].'</td>
			<td>'.$m[0]['detalle'].'</td>
			<td><button class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="eliminar_acceso(\''.$value['ID'].'\')"></i></button></td>
			</tr>';
		}
		return $tr;

		print_r($datos);die();
	}

	function usuarios()
	{
		$usu = $this->usuarios->lista_custodio($query=false,$id=false,$ci=false);
		$op = '<option value="">Seleccione un usuario</option>';
		foreach ($usu as $key => $value) {
			$op.='<option value="'.$value['id'].'">'.$value['nombre'].'</option>';			
		}
		return $op;
	}

	function modulos()
	{
		$empresa = $_SESSION['INICIO']['ID_EMPRESA'];
		$usu = $this->modulos->menu($empresa,1,$submenu=false,false);
		$op = '<option value="">Seleccione modulo</option>';
		foreach ($usu as $key => $value) {
			$op.='<option value="'.$value['id_menu'].'">'.$value['detalle'].'</option>';			
		}
		return $op;
	}

	function modulos_codigo()
	{
		$empresa = $_SESSION['INICIO']['ID_EMPRESA'];
		$usu = $this->modulos->menu($empresa,1,$submenu=false,false);
		$op = '<option value="">Seleccione modulo</option>';
		foreach ($usu as $key => $value) {
			$op.='<option value="'.$value['codigo'].'">'.$value['detalle'].'</option>';			
		}
		return $op;
	}
	function paginas($parametros)
	{	$empresa = $_SESSION['INICIO']['ID_EMPRESA'];

		$usu = $this->modulos->paginas($empresa,$menu=false,$submenu=1,false,$parametros['modulo'],$id_menu=false);
		$op = '<option value="">Seleccione paginas</option>';
		foreach ($usu as $key => $value) {
			$op.='<option value="'.$value['id_menu'].'">'.$value['detalle'].'</option>';			
		}
		return $op;
	}

	function guardar_accesos($parametros)
	{

		// print_r($parametros);die();
		$datos[0]['campo'] = 'paginas';
		$datos[0]['dato'] = $parametros['paginas'];
		$datos[1]['campo'] = 'empresa';
		$datos[1]['dato'] = $_SESSION['INICIO']['ID_EMPRESA'];
		$datos[2]['campo'] = 'usuario';
		$datos[2]['dato'] = $parametros['usuario'];
		return $this->modelo->add('accesos_empresa',$datos,$_SESSION['INICIO']['ID_EMPRESA']);

	}

	function delete_accesos($id)
	{
		return $this->modelo->delete($id,$_SESSION['INICIO']['ID_EMPRESA']);
	}



}

?>