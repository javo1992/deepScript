<?php 
include('../modelo/promocionesM.php');
include('../modelo/lista_articulosM.php');
/**
 * 
 */
$controlador = new promocionesC();
if(isset($_GET['lista_cate']))
{
	// $parametros = $_POST['parametros'];
	echo json_encode($controlador->lista_categorias());
}
if(isset($_GET['lista_productos']))
{
	// $parametros = $_POST['parametros'];
	echo json_encode($controlador->lista_productos());
}
if(isset($_GET['eliminar']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->eliminar($parametros));
}

if(isset($_GET['add_productos']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->add_productos($parametros));
}
if(isset($_GET['add_categoria']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->add_categoria($parametros));
}

class promocionesC 
{
	private $modelo;	
	private $articulos;
	function __construct()
	{
		$this->modelo = new promocionesM();
		$this->articulos = new lista_articulosM();

	}

	function lista_categorias()
	{
		$id_empresa = $_SESSION['INICIO']['ID_EMPRESA'];
		$datos = $this->modelo->lista_categorias();		
		$html = '';
		foreach ($datos as $key => $value) {
			$html.='<tr>
			<td colspan="2"><b>'.$value['nombre'].'</b></td>
			<td><button class="btn btn-sm btn-danger" onclick="eliminar_reg('.$value['id_promos'].')"><i class="fa fa-trash"></i></button></td>
			</tr>';
		     $datos1 = $this->articulos->detalle_articulos_all_busqueda($id_empresa,$id=false,$query=false,$value['id_categorias']);
		     foreach ($datos1 as $key1 => $value1) {
		     	$html.='<tr>
		     	<td width="10px"></td>
				<td>'.$value1['nombre'].'</td>
				<td>'.$value1['precio'].'</td>
				</tr>';
		      } 				
		}

		return $html;
		
	}
	function lista_productos()
	{
		$datos = $this->modelo->lista_productos();
		$tr='';
		foreach ($datos as $key => $value) {
			$tr.='<tr>
			<td>'.$value['nombre'].'</td>
			<td>'.$value['precio_uni'].'</td>
			<td><button class="btn btn-sm btn-danger" onclick="eliminar_reg('.$value['id_promos'].')"><i class="fa fa-trash"></i></button></td>
			</tr>';
		}
		return $tr;
	}

	function eliminar($parametros)
	{
		$id = $parametros['id'];
		return $this->modelo->eliminar_promo($id);
	}
	function add_categoria($parametros)
	{
		$datos[0]['campo'] = 'id_categorias';
		$datos[0]['dato']  = $parametros['id'];
		return $this->modelo->add($tabla = 'promos',$datos);

	}
	function add_productos($parametros)
	{
		$datos[0]['campo'] = 'id_producto';
		$datos[0]['dato']  = $parametros['id'];
		return $this->modelo->add($tabla = 'promos',$datos);
	}

}
?>