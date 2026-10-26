<?php 
include('../modelo/alimentar_stockM.php');
/**
 * 
 */
$controlador = new alimentar_stockC();
if(isset($_GET['listar']))
{
	echo json_encode($controlador->listar_kardex());
}
if(isset($_GET['costo_stock']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->costo_stock($parametros));
}
if(isset($_GET['add_ingreso']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->add_ingreso($parametros));
}

if(isset($_GET['add_articulo']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->add_articulo($parametros));
}

if(isset($_GET['add_proveedor']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->add_proveedor($parametros));
}
if(isset($_GET['eliminar']))
{
	echo json_encode($controlador->eliminar($_POST['id']));
}
if(isset($_GET['prove']))
{
	$query='';
	if(isset($_GET['q']))
	{
		$query= $_GET['q'];
	}
	echo json_encode($controlador->listar_proveedor($query));

}

if(isset($_GET['generar_ingresos']))
{
	echo json_encode($controlador->generar_ingresos());
}


class alimentar_stockC
{
	private $modelo;
	
	function __construct()
	{
		$this->modelo = new alimentar_stockM();
	}

	function listar_kardex()
	{
		$datos = $this->modelo->listar_kardex();
		$html='';
		foreach ($datos as $key => $value) {
			$html.='<tr>
			<td>'.$value['referencia'].'</td>
			<td>'.$value['nombre'].'</td>
			<td>'.$value['entrada'].'</td>
			<td>'.$value['valor_unitario'].'</td>
			<td>'.$value['total_iva'].'</td>
			<td>'.$value['subtotal'].'</td>
			<td>'.$value['valor_total'].'</td>
			<td><button onclick="eliminar_adicionales('.$value['id_kardex'].')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
			</tr>';
		}
		return $html;
	}

	function listar_proveedor($query)
	{
		$datos = $this->modelo->listar_proveedor($query);
		$lis = array();
		foreach ($datos as $key => $value) {
			$lis[] = array('id'=>$value['id'],'text'=>$value['Razon_Social'],'data'=>$value);
		}
		return $lis;
	}

	function costo_stock($parametros)
	{
		$fecha=date('Y-m-d');
		$dato = $this->modelo->costo_stock($parametros['id'],$fecha);
		if(count($dato)>0)
		{			
			return array('stock'=> $dato[0]['existencias'],'precio'=> $dato[0]['costo']);
		}else
		{
			$dato = $this->modelo->producto_all($parametros['id']);
			$datos[0]['campo'] = 'id_producto';
			$datos[0]['dato']  = $dato[0]['id_productos'];
			$datos[1]['campo'] = 'entrada';
			$datos[1]['dato']  = $dato[0]['stock'];
			$datos[2]['campo'] = 'valor_unitario';
			$datos[2]['dato']  = $dato[0]['precio_uni'];
			$datos[3]['campo'] = 'costo';
			$datos[3]['dato']  = $dato[0]['precio_uni'];
			$datos[4]['campo'] = 'Detalle';
			$datos[4]['dato']  = 'INGRESO INICIAL DE STOCK';
			$datos[5]['campo'] = 'TP';
			$datos[5]['dato']  = 'CD';
			$datos[6]['campo'] = 'fecha';
			$datos[6]['dato']  = date('Y-m-d');
			$datos[7]['campo'] = 'usuario';
			$datos[7]['dato']  = $_SESSION['INICIO']['ID_USUARIO'];
			$datos[8]['campo'] = 'empresa';
			$datos[8]['dato']  = $_SESSION['INICIO']['ID_EMPRESA'];
			$datos[9]['campo'] = 'valor_total';
			$datos[9]['dato']  =  $dato[0]['stock']*$dato[0]['precio_uni']; //  number_format(floatval($dato[0]['stock']*$dato[0]['precio_uni']),'.','');
			$datos[10]['campo'] = 'existencias';
			$datos[10]['dato']  = $dato[0]['stock'];
			$this->modelo->insert($tabla='trans_kardex',$datos);

			return array('stock'=>$dato[0]['stock'],'precio'=> $dato[0]['precio_uni']);

		}
	}

	function add_ingreso($parametros)
	{
		$fecha=date('Y-m-d');
		$kardex = $this->modelo->costo_stock($parametros['mat'],$fecha);		
		$producto = $this->modelo->producto_all($parametros['mat']);

		// print_r($dato);die();
			$datos[0]['campo'] = 'id_producto';
			$datos[0]['dato']  = $parametros['mat'];
			$datos[1]['campo'] = 'entrada';
			$datos[1]['dato']  = $parametros['can'];
			$datos[2]['campo'] = 'valor_unitario';
			$datos[2]['dato']  = $parametros['pre'];
			$datos[3]['campo'] = 'costo';
			$datos[3]['dato']  = $producto[0]['precio_uni'];
			$datos[4]['campo'] = 'Detalle';
			$datos[4]['dato']  = 'INGRESO STOCK';
			$datos[5]['campo'] = 'TP';
			$datos[5]['dato']  = 'CD';
			$datos[6]['campo'] = 'fecha';
			$datos[6]['dato']  = $parametros['fec'];
			$datos[7]['campo'] = 'usuario';
			$datos[7]['dato']  = $_SESSION['INICIO']['ID_USUARIO'];
			$datos[8]['campo'] = 'empresa';
			$datos[8]['dato']  = $_SESSION['INICIO']['ID_EMPRESA'];
			$datos[9]['campo'] = 'valor_total';
			$datos[9]['dato']  =  $parametros['tot'];
			$datos[10]['campo'] = 'existencias';
			$datos[10]['dato']  = $kardex[0]['existencias']+$parametros['can'];
			$datos[11]['campo'] = 'fecha_Fab';
			$datos[11]['dato']  = $parametros['fef'];
			$datos[12]['campo'] = 'fecha_Exp';
			$datos[12]['dato']  = $parametros['fee'];
			$datos[13]['campo'] = 'proveedor';
			$datos[13]['dato']  = $parametros['pro'];
			$datos[14]['campo'] = 'factura';
			$datos[14]['dato']  = $parametros['fac'];
			$datos[15]['campo'] = 'serie';
			$datos[15]['dato']  = $parametros['ser'];
			$datos[16]['campo'] = 'subtotal';
			$datos[16]['dato']  = $parametros['sub'];			
			$datos[17]['campo'] = 'total_iva';
			$datos[17]['dato']  = $parametros['iva'];	
			return $this->modelo->insert($tabla='kardex_temp',$datos);

	}


	function add_proveedor($parametros)
	{
		// print_r($dato);die();
			$datos[0]['campo'] = 'nombre';
			$datos[0]['dato']  = $parametros['nom'];
			$datos[1]['campo'] = 'telefono';
			$datos[1]['dato']  = $parametros['tel'];
			$datos[2]['campo'] = 'mail';
			$datos[2]['dato']  = $parametros['ema'];
			$datos[3]['campo'] = 'direccion';
			$datos[3]['dato']  = $parametros['dir'];
			$datos[4]['campo'] = 'ci_ruc';
			$datos[4]['dato']  = $parametros['ci'];
			$datos[5]['campo'] = 'Razon_Social';
			$datos[5]['dato']  = $parametros['raz'];
			$datos[6]['campo'] = 'tipo';
			$datos[6]['dato']  = 'P';			
			$datos[7]['campo'] = 'id_empresa';
			$datos[7]['dato']  = $_SESSION['INICIO']['ID_EMPRESA'];
			
			return $this->modelo->insert($tabla='cliente',$datos);

	}


	function add_articulo($parametros)
	{
		$iva = 0;$inventario = 0;
	  if($parametros['iva']=='si'){$iva = 1;}
	  if($parametros['inv']=='si'){$inventario = 1;}
	  $datos[0]['campo'] = 'referencia';
      $datos[0]['dato'] = $parametros['ref'];
      $datos[1]['campo'] = 'nombre';
      $datos[1]['dato'] = $parametros['pro'];
      $datos[2]['campo'] = 'precio_uni';
      $datos[2]['dato'] = $parametros['pre'];
      $datos[3]['campo'] = 'iva';
      $datos[3]['dato'] = $iva;     
      $datos[4]['campo'] = 'inventario';
      $datos[4]['dato'] = $inventario; 
      $datos[5]['campo'] = 'categoria';
      $datos[5]['dato'] = $parametros['cat'];
      $datos[6]['campo'] = 'uni_medida';
      $datos[6]['dato'] = $parametros['med'];
      $datos[7]['campo'] = 'sucursal';
      $datos[7]['dato'] = $_SESSION['INICIO']['SUCURSAL'];
      $datos[8]['campo'] = 'max';
      $datos[8]['dato'] = $parametros['max'];
      $datos[9]['campo'] = 'min';
      $datos[9]['dato'] = $parametros['min'];
      $datos[10]['campo'] = 'id_empresa';
      $datos[10]['dato'] = $_SESSION['INICIO']['ID_EMPRESA'];
      $datos[11]['campo'] = 'fecha_creacion';
      $datos[11]['dato'] = date('Y-m-d');
      $base = $this->modelo->insert('productos',$datos);
      // $datos = $this->modelo->detalle_articulos_ref($parametros['referencia'],$_SESSION['INICIO']['ID_EMPRESA']);
      return $base;

	}


	function eliminar($id)
	{
		return  $this->modelo->eliminar($id);
	}

	function generar_ingresos()
	{
		$datos = $this->modelo->listar_kardex();
		foreach ($datos as $key => $value) {
			$pro = $this->modelo->producto_all($value['idp']);
			$costo = $this->modelo->costo_stock($value['idp'],date('Y-m-d'));

			$datos[0]['campo'] = 'id_producto';
			$datos[0]['dato']  = $datos[0]['idp'];
			$datos[1]['campo'] = 'entrada';
			$datos[1]['dato']  = $datos[0]['entrada'];
			$datos[2]['campo'] = 'valor_unitario';
			$datos[2]['dato']  = $datos[0]['valor_unitario'];
			$datos[3]['campo'] = 'costo';
			$datos[3]['dato']  = $pro[0]['precio_uni'];
			$datos[4]['campo'] = 'Detalle';
			$datos[4]['dato']  = 'INGRESO STOCK';
			$datos[5]['campo'] = 'TP';
			$datos[5]['dato']  = 'CD';
			$datos[6]['campo'] = 'fecha';
			$datos[6]['dato']  = date('Y-m-d');
			$datos[7]['campo'] = 'usuario';
			$datos[7]['dato']  = $_SESSION['INICIO']['ID_USUARIO'];
			$datos[8]['campo'] = 'empresa';
			$datos[8]['dato']  = $_SESSION['INICIO']['ID_EMPRESA'];
			$datos[9]['campo'] = 'valor_total';
			$datos[9]['dato']  =  $datos[0]['valor_total'];
			$datos[10]['campo'] = 'existencias';
			$datos[10]['dato'] = $costo[0]['existencias']+$datos[0]['entrada'];
			$datos[11]['campo'] = 'fecha_Fab';
			$datos[11]['dato']  = $datos[0]['fecha_Fab'];
			$datos[12]['campo'] = 'fecha_Exp';
			$datos[12]['dato']  = $datos[0]['fecha_Exp'];
			$datos[13]['campo'] = 'proveedor';
			$datos[13]['dato']  = $datos[0]['proveedor'];
			$datos[14]['campo'] = 'factura';
			$datos[14]['dato']  = $datos[0]['Factura'];
			$datos[15]['campo'] = 'serie';
			$datos[15]['dato']  = $datos[0]['serie'];
			$datos[16]['campo'] = 'subtotal';
			$datos[16]['dato']  = $datos[0]['subtotal'];			
			$datos[17]['campo'] = 'total_iva';
			$datos[17]['dato']  = $datos[0]['total_iva'];	
			$this->modelo->insert($tabla='trans_kardex',$datos);
			$this->modelo->eliminar($datos[0]['id_kardex']);

			$datosP[0]['campo'] = 'stock';
			$datosP[0]['dato'] = $datos[10]['dato'];
			$where[0]['campo'] = 'id_productos';
			$where[0]['dato'] =  $datos[0]['idp'];
			return $this->modelo->update($tabla='productos',$datosP,$where);
		}

		print_r($datos);die();
	}

}
?>