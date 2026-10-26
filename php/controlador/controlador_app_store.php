<?php 
include('../modelo/modelo_app_store.php');
/**
 * 
 */
$controlador = new StoreC();
if(isset($_GET['categorias']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->categorias($parametros));
}
if(isset($_GET['buscar_articulo']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->buscar_articulo($parametros));
}
if(isset($_GET['detalle_art']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->detalle_articulo($parametros));
}
if(isset($_GET['promociones']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->promociones($parametros));
}
if(isset($_GET['colocar_puntos']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->colocar_puntos($parametros));
}
if(isset($_GET['colocar_puntos_ruta']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->colocar_puntos_ruta($parametros));
}
if(isset($_GET['mis_pedidos']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->mis_pedidos($parametros));
}
if(isset($_GET['mis_rutas_moto']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->mis_rutas_moto($parametros));
}
if(isset($_GET['agregar_carrito']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->agregar_carrito($parametros));
}
if(isset($_GET['registrar']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->registrar($parametros));
}
if(isset($_GET['registrar_perfil']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->registrar_perfil($parametros));
}
if(isset($_GET['login']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->login($parametros));
}
if(isset($_GET['lista_pedido']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->lista_pedido($parametros));
}
if(isset($_GET['eliminar_pedido']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->eliminar_pedido($parametros));
}
if(isset($_GET['procesar_envio']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->procesar_envio($parametros));
}
if(isset($_GET['editar_pedido']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->editar_pedido($parametros));
}
if(isset($_GET['canti_carrito']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->canti_carrito($parametros));
}

if(isset($_GET['procesar']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->procesar($parametros));
}
if(isset($_GET['articulo_tama']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->articulo_tama($parametros));
}
if(isset($_GET['articulo_adi']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->articulo_adi($parametros));
}

if(isset($_GET['articulo_promo']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->articulo_promo($parametros));
}
if(isset($_GET['guardar_mi_punto']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->guardar_mi_punto($parametros));
}
if(isset($_GET['generar_entregar']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->generar_entregar($parametros));
}

if(isset($_GET['datos_usuario']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->datos_usuario($parametros));
}
if(isset($_GET['numero_pedido']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->numero_pedido($parametros));
}
class StoreC 
{
	private $modelo;	
	function __construct()
	{
		$this->modelo = new StoreM();

	}

	function categorias($parametros)
	{
		$empresa = $parametros['empresa'];
		$datos = $this->modelo->categorias($empresa);
		$op='<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*" onclick=" categoria_select()">Todos</li>';
		foreach ($datos as $key => $value) {
			
				$op.='<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".women" onclick=" categoria_select('.$value['ID'].')">'.$value['NOMBRE'].'</li>';			
		}
		return '<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">'.$op.'</ul>
		<script src="js/custom.js"></script>';
	}
	function buscar_articulo($parametros)
	{
		$empresa = $parametros['empresa'];
		$datos = $this->modelo->buscar_articulo($empresa,$parametros['query'],$parametros['categoria'],false);
		$lista = '';
		foreach ($datos as $key => $value) {
			// print_r($value);die();
            $lista.='	<div class="product-item men">
							<div class="product discount product_filter">
								<div class="product_image">
									<img src="ruta_img/'.$value['FOTO'].'" alt="">
								</div>	
								<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center" style="width:auto;"><span style=" margin: 0px 7px 0px 7px;">'.$value['CATEGORIA'].'</span></div>							
								<div class="product_info">
									<h2><a href="detalle_art.html?id='.$value['ID'].'" style="color:black;">'.$value['NOMBRE'].'</a></h2>
									<div class="product_price">$'.number_format($value['PVP'],2).'</div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="detalle_art.html?id='.$value['ID'].'">Agregar a carrito</a></div>
						</div>';
		}
		return '<div class="product-grid" style="margin-top: 10px;">'.$lista.'</div><script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>';
	}
	function detalle_articulo($parametros)
	{
		$id = $parametros['articulo'];
		$empresa = $parametros['empresa'];
		$datos = $this->modelo->buscar_articulo($empresa,$query=false,$categoria=false,$id);
		return $datos;
		// print_r($datos);die();

	}
	function promociones($parametros)
	{
		$empresa = $parametros['empresa'];
		$datos = $this->modelo->buscar_articulo($empresa,$query=false,$categoria=false,$id=false,$promociones=1);
		$slide='';
		foreach ($datos as $key => $value) {
			$slide.='<div class="owl-item product_slider_item">
						<div class="product-item">
							<div class="product discount">
								<div class="product_image">
									<img src="ruta_img/'.$value['FOTO'].'" alt="">
								</div>
								<div class="favorite favorite_left"></div>
									<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center" style="width:auto;"><span style=" margin: 0px 7px 0px 7px;">'.$value['CATEGORIA'].'</span></div>		
								<div class="product_info">
									<h2><a href="detalle_art.html?id='.$value['ID'].'" style="color:black;">'.$value['NOMBRE'].'</a></h2>
									<div class="product_price">$'.number_format($value['PVP'],2).'</div>
								</div>
							</div>
						</div>
					</div>';
		}
		if(isset($parametros['home']))
		{
			$slide.='<script src="js/custom.js"></script>';
		}
		// print_r($parametros);die();
		return $slide;

		print_r($carusel);die();
	}

	function colocar_puntos($parametros)
	{
		$pedido = 'APP'.$parametros['ID'];
		$datos = $this->modelo->mis_pedidos($parametros['empresa'],$pedido,$parametros['factura']);

		// print_r($datos);die();
		return $datos;

	}

	function colocar_puntos_ruta($parametros)
	{
		$moto = $parametros['ID'];
		$datos = $this->modelo->mis_rutas_moto($parametros['empresa'],$moto,$parametros['factura']);
		// print_r($datos);die();
		return $datos;

	}

	function mis_pedidos($parametros)
	{
		$pedido = 'APP'.$parametros['ID'];
		$datos = $this->modelo->mis_pedidos($parametros['empresa'],$pedido);
		// print_r($datos);die();
		$tr='';
		$pendiente = false;
		$factura = '';
		foreach ($datos as $key => $value) {
			if($value['entregado']==0)
			{
				$en = '<span class="badge bg-danger text-white">Pendi..</span>';
				$pendiente = true;
				$factura = $value['idF'];
				$num = $value['num_factura'];
			}else
			{
				$en = '<span class="badge badge-success text-white">Entre..</span>';
			}
			$tr.="<tr style='height:auto'>
			<td>".$value['num_factura']."</td>
			<td>".$value['fecha']."</td>
			<td>".$en."</td>";
			if($value['entregado']==0)
			{
			 $tr.="<td><button class='btn btn-default' onclick='cambiar_mapa(".$value['idF'].",".$value['num_factura'].")'><i class='fa fa-eye'></i></button></td>";
			}else
			{
				$tr.="<td></td>";
			}
			$tr.="</tr>";
		}
		return array('tabla'=>$tr,'pendiente'=>$pendiente,'factura'=>$factura,'num_factura'=>$num);

	}

	function mis_rutas_moto($parametros)
	{
		$moto = $parametros['ID'];
		$datos = $this->modelo->mis_rutas_moto($parametros['empresa'],$moto);
		// print_r($datos);die();
		$tr='';
		$pendiente = false;
		$factura = '';
		foreach ($datos as $key => $value) {
			if($value['entregado']==0)
			{
				$en = '<span class="badge bg-danger text-white">Pendiente</span>';
				$pendiente = true;
				$factura = $value['idF'];
				$num = $value['num_factura'];
			}else
			{
				$en = '<span class="badge badge-success text-white">Entregado</span>';
			}
			$tr.="<tr style='height:auto'>
			<td>".$value['num_factura']."</td>
			<td>".$value['fecha']."</td>
			<td>".$en."</td>";
			if($value['entregado']==0)
			{
			 $tr.="<td><button class='btn btn-default' onclick='cambiar_mapa(".$value['idF'].",".$value['num_factura'].")'><i class='fa fa-eye'></i></button></td>";
			}else
			{
				$tr.="<td></td>";
			}
			$tr.="</tr>";
		}
		
		return array('tabla'=>$tr,'pendiente'=>$pendiente,'factura'=>$factura,'num_factura'=>$num);

	}
	function agregar_carrito($parametros)
	{
		// print_r($parametros);die();
		$producto = $this->modelo->buscar_articulo($parametros['empresa'],$query=false,$categoria=false,$parametros['articulo']);
		$nuevo_precio = number_format($producto[0]['PVP']*$parametros['cantidad'],2);
		$pvp_uni = $producto[0]['PVP'];
		$producto_name = $producto[0]['NOMBRE'];
		if($parametros['tamano_pvp']!='')
		{
			$nuevo_precio = number_format($parametros['tamano_pvp']*$parametros['cantidad'],2);
			$pvp_uni = number_format($parametros['tamano_pvp'],2);
			$producto_name = $producto_name.'('.$parametros['tamano'].')';
		}
		
		if(isset($parametros['adicional']) and $parametros['adicional']!='undefined')
		{
			$adi =  $this->modelo->adicionales($parametros['empresa'],$id=false,$nombre=false,$parametros['adicional']);
		 	$producto_name = $producto_name.'('.$adi[0]['cate'].': '.$parametros['adicional'].')';
		} 

		$mesa = 'APP'.$parametros['id_cliente'];
		if($parametros['num_ped']!='')
		{
			$mesa = 'APP'.$parametros['id_cliente'].'-'.$parametros['num_ped'];
		}
		// print_r($nuevo_precio);die();

		$datos[0]['campo'] = 'cantidad';
		$datos[0]['dato'] = $parametros['cantidad'];
		$datos[1]['campo'] = 'empresa';
		$datos[1]['dato'] = $parametros['empresa'];
		$datos[2]['campo'] = 'precio_uni';
		$datos[2]['dato'] =  $pvp_uni;
		$datos[3]['campo'] = 'subtotal';
		$datos[3]['dato'] = $nuevo_precio;
		$datos[4]['campo'] = 'APP_CLIENTE';
		$datos[4]['dato'] = $parametros['id_cliente'];
		$datos[5]['campo'] = 'mesa';
		$datos[5]['dato'] = $mesa;
		$datos[6]['campo'] = 'Producto';
		$datos[6]['dato'] = $producto_name;
		$datos[7]['campo'] = 'referencia';
		$datos[7]['dato'] = $producto[0]['REFERENCIA'];		
		if($producto[0]['IVA']==1)
		{
		  $empresa = $this->modelo->empresa($parametros['empresa']);
		  $datos[8]['campo'] = 'porc_iva';
		  $datos[8]['dato'] = number_format($empresa[0]['valor_iva']/100,2); 
		  $datos[9]['campo'] = 'iva';
		  $datos[9]['dato'] = number_format(($datos[8]['dato']*$nuevo_precio)-$nuevo_precio,2);
		}else
		{
		   $datos[8]['campo'] = 'porc_iva';
		   $datos[8]['dato'] = 0;
		   $datos[9]['campo'] = 'iva';
		   $datos[9]['dato'] = 0;
		}
		 $datos[10]['campo'] = 'total';
		 $datos[10]['dato'] = number_format($datos[9]['dato']+$datos[3]['dato'],2);
		 $datos[11]['campo'] = 'llevar';
		 $datos[11]['dato'] = 1;
		// print_r($datos);die();
		 return $this->modelo->add('mesa',$datos,$parametros['empresa']);

		print_r($datos);die();
	}

	function registrar($parametros)
	{
		$datos[0]['campo'] = 'nombre';
		$datos[0]['dato'] = $parametros['nombre'];
		$datos[1]['campo'] = 'telefono';
		$datos[1]['dato'] = $parametros['tel'];
		$datos[2]['campo'] = 'mail';
		$datos[2]['dato'] = $parametros['email'];
		$datos[3]['campo'] = 'direccion';
		$datos[3]['dato'] = $parametros['dir'];
		$datos[4]['campo'] = 'ci_ruc';
		$datos[4]['dato'] = $parametros['ci'];
		$datos[5]['campo'] = 'password';
		$datos[5]['dato'] = $parametros['pass'];
		$datos[6]['campo'] = 'id_empresa';
		$datos[6]['dato'] = $parametros['empresa'];
		$datos[7]['campo'] = 'Razon_Social';
		$datos[7]['dato'] = $parametros['nombre'];

		if($this->modelo->add('cliente',$datos,$parametros['empresa'])==1)
		{
			return $this->modelo->buscar_cliente($parametros['email'],$parametros['pass'],$parametros['empresa']);
		}else
		{
			return -1;
		}
	}

	function registrar_perfil($parametros)
	{
		if($parametros['moto']==1)
		{
			$datos[0]['campo'] = 'nombre';
			$datos[0]['dato'] = $parametros['nombre'];
			$datos[1]['campo'] = 'telefono';
			$datos[1]['dato'] = $parametros['tel'];
			$datos[2]['campo'] = 'nick';
			$datos[2]['dato'] = $parametros['email'];
			$datos[3]['campo'] = 'ci_ruc';
			$datos[3]['dato'] = $parametros['ci'];
			$datos[4]['campo'] = 'pass';
			$datos[4]['dato'] = $parametros['pass'];
			$where[0]['campo'] = 'id_usuario';
			$where[0]['dato'] = $parametros['id'];
			$where[1]['campo'] = 'id_empresa';
			$where[1]['dato'] = $parametros['empresa'];

		$resp = $this->modelo->update($tabla='usuario',$datos,$where, $parametros['empresa']);
		}else
		{
			$datos[0]['campo'] = 'nombre';
			$datos[0]['dato'] = $parametros['nombre'];
			$datos[1]['campo'] = 'telefono';
			$datos[1]['dato'] = $parametros['tel'];
			$datos[2]['campo'] = 'mail';
			$datos[2]['dato'] = $parametros['email'];
			$datos[3]['campo'] = 'ci_ruc';
			$datos[3]['dato'] = $parametros['ci'];
			$datos[3]['campo'] = 'password';
			$datos[3]['dato'] = $parametros['pass'];
			$datos[6]['campo'] = 'Razon_Social';
			$datos[6]['dato'] = $parametros['nombre'];
			$where[0]['campo'] = 'id_cliente';
			$where[0]['dato'] = $parametros['id'];
			$where[1]['campo'] = 'id_empresa';
			$where[1]['dato'] = $parametros['empresa'];

		$resp = $this->modelo->update($tabla='cliente',$datos,$where, $parametros['empresa']);

		}

		if($resp==1)
		{
			return 1;
		}else
		{
			return -1;
		}
	}

	function login($parametros)
	{
		$pos = strpos($parametros['usu'],'@');
		if ($pos === false) {
		   $datos = $this->modelo->buscar_motorizado($parametros['usu'],$parametros['pass'],$parametros['empresa']);
		   // print_r($datos);die();
		   $datos[0]['moto'] = '1';
		} else {
			$datos = $this->modelo->buscar_cliente($parametros['usu'],$parametros['pass'],$parametros['empresa']);
			$datos[0]['moto'] = '0';
		}
		if(count($datos)>0)
		{
			return $datos;
		}else
		{			
			return -1;
		}

	}


	function lista_pedido($parametros)
	{   
		$parametros['idc'] = $parametros['cliente'];
		// print_r($parametros);die();
		$nu = $this->numero_pedido($parametros);
		$mesa = 'APP'.$parametros['idc'];
		if($nu!='')
		{
			$mesa = 'APP'.$parametros['idc'].'-'.$nu;
		}
		$lista = $this->modelo->lista_carrito($parametros['empresa'],$mesa);
		$tr='';
		$sub=0;
		$total =0;
		foreach ($lista as $key => $value) {
			$sub+=number_format($value['total'],2);
			$total+=number_format($value['total'],2);
			$tr.='<tr>
					<td style="width:35%">'.$value['producto'].'<br>
						<img src="ruta_img/'.$value['foto'].'" style="width:100%"> <br>
						<span class="product_price">$'.number_format($value['precio_uni'],2).'</span>
					</td>
					<td class="text-center" style="vertical-align: middle;">
					   <input type="hidden" name="txt_pvp_'.$value['ID'].'" id="txt_pvp_'.$value['ID'].'" value="'.$value['precio_uni'].'">
						<input type="" name="txt_cant_'.$value['ID'].'" id="txt_cant_'.$value['ID'].'" value="'.$value['cantidad'].'" class="form-control form-control-sm" onblur="editar_numero(\''.$value['ID'].'\')">

					</td>
					<td style="vertical-align:middle;">$'.number_format($value['total'],2).'</td>
					<td style="vertical-align:middle">
						<li class="d-inline-flex flex-column justify-content-center align-items-center" onclick="eliminar(\''.$value['ID'].'\')">
							<div id="hour" class="timer_num">x</div>
							<div class="timer_unit">Borrar</div>
						</li>
					</td>
				</tr>';
		}
		// print_r($lista);die();
		// print_r($parametros);die();
		return array('tr'=>$tr,'sub'=>$sub,'total'=>$total);

	}

	function eliminar_pedido($parametros)
	{
		return $this->modelo->delete_pedido($parametros['empresa'],$parametros['id']);
		// print_r($parametros);die();
	}
	function procesar_envio($parametros)
	{
		// print_r($parametros);die();

		//------------inserta la localizacion a entregar-----------
		$datos[0]['campo'] = 'latitud';
		$datos[0]['dato'] = $parametros['lat'];
		$datos[1]['campo'] = 'longitud';
		$datos[1]['dato'] = $parametros['lon'];
		$datos[2]['campo'] = 'direccion';
		$datos[2]['dato'] = $parametros['dir'];
		$datos[3]['campo'] = 'telefono';
		$datos[3]['dato'] = $parametros['tel'];
		$datos[4]['campo'] = 'pedido';
		$datos[4]['dato'] = 'APP'.$parametros['cliente'];
		$datos[5]['campo'] = 'empresa';
		$datos[5]['dato'] = $parametros['empresa'];
		$datos[6]['campo'] = 'principal';
		$datos[6]['dato'] = $parametros['pri'];
		$datos[7]['campo'] = 'secundario';
		$datos[7]['dato'] = $parametros['sec'];
		$datos[8]['campo'] = 'numero_casa';
		$datos[8]['dato'] = $parametros['num'];		
		$datos[9]['campo'] = 'id_factura';
		$datos[9]['dato'] = $parametros['factura'];


		$resp = $this->modelo->add('entregas',$datos,$parametros['empresa']);


    //----------------actualiza para que se haga visible la preparacion-----------//
		$datosM[0]['campo'] = 'procesar';
		$datosM[0]['dato'] = 1;
		$where[0]['campo']='APP_CLIENTE';
		$where[0]['dato']=$parametros['cliente'];
		$where[1]['campo']='empresa';
		$where[1]['dato']=$parametros['empresa'];
		$resp1 = $this->modelo->update('mesa',$datosM,$where,$parametros['empresa']);
		if($resp1==1 && $resp==1)
		{

			return 1;
		}else
		{
			return 1;
		}
	}

	function editar_pedido($parametros)
	{
		$datosM[0]['campo'] = 'cantidad';
		$datosM[0]['dato'] = $parametros['cant'];
		$datosM[1]['campo'] = 'subtotal';
		$datosM[1]['dato'] = number_format($parametros['cant']*$parametros['pvp'],2);
		$datosM[2]['campo'] = 'total';
		$datosM[2]['dato'] = number_format($parametros['cant']*$parametros['pvp'],2);

		$where[0]['campo']='id_mesa';
		$where[0]['dato']=$parametros['id'];
		return $this->modelo->update('mesa',$datosM,$where,$parametros['empresa']);
	}

	function canti_carrito($parametros)
	{
		$nu = $this->numero_pedido($parametros);
		$mesa = 'APP'.$parametros['idc'];
		if($nu!='')
		{
			$mesa = 'APP'.$parametros['idc'].'-'.$nu;
		}
	    $can = $this->modelo->canti_carrito($parametros['empresa'],$mesa);
	    // print_r($can);die();
	    if($can[0]['CANT']!=0)
	    {
	    	return $can[0]['CANT'];
	    }else
	    {
	    	return '';
	    }
	}

	function procesar($parametros)
	{
		// print_r($parametros);die();
		$parametros['idc'] = $parametros['cliente'];
		// print_r($parametros);die();
		$nu = $this->numero_pedido($parametros);
		$mesa = 'APP'.$parametros['idc'];
		if($nu!='')
		{
			$mesa = 'APP'.$parametros['idc'].'-'.$nu;
		}

		$datosM[0]['campo'] = 'procesar';
		$datosM[0]['dato'] = 1;
		

		$where[0]['campo']='empresa';
		$where[0]['dato']=$parametros['empresa'];
		$where[0]['campo']='mesa';
		$where[0]['dato']=$mesa;
		return $this->modelo->update('mesa',$datosM,$where,$parametros['empresa']);

	}

	function articulo_tama($parametros)
	{
		 $datos = $this->modelo->tamanio($parametros['articulo'],$parametros['empresa']);
		 return $datos;
		// print_r($datos);die();

	}
	function articulo_adi($parametros)
	{
		$datos = $this->modelo->adicionales($parametros['empresa'],$parametros['articulo']);
		$op = '';
		foreach ($datos as $key => $value) {
			// print_r($value);die();
			$che = '';
			if($key==0){$che = 'checked';}
			$op.='<div class="item"><label><img src="ruta_img/'.$value['foto'].'"><input type="radio" name="rbl_adi" value="'.$value['nombre'].'" '.$che.'> '.$value['nombre'].'</label></div>';
		}
		$js = '<script src="js/owl.carousel.min.js"></script><script  src="js/carousel_new_promo.js"></script>';

		return array('op'=>$op,'js'=>$js);
	
	}

	function articulo_promo($parametros)
	{
		// print_r($parametros);die();
		$datos = $this->modelo->promos_articulos($parametros['empresa']);
		$cate = $this->modelo->promos_categoria($parametros['empresa']);
		$op = '<div class="carousel-wrap">
				<h2>Productos Promo</h2>
					  <div class="owl-carousel">';
		foreach ($datos as $key => $value) {
			$op.='<div class="item" onclick="detalle_ar('.$value['id'].')"><img src="ruta_img/'.$value['foto'].'">
			<div class="product_info">
									<h5>'.$value['nombre'].'</h5>
									<div class="product_price" style="font-size:14px">$30.00</div>
								</div>
							</div>';
		}
		$op.='</div></div>';

		$ca = '';
		foreach ($cate as $key => $value) {
			$ca.='<hr><div class="carousel-wrap">
				<h2>Promo en '.$value['nombre'].'</h2>
					  <div class="owl-carousel">';
					  $pro = $this->modelo->buscar_articulo($parametros['empresa'],false,$value['id'],$id=false,$promociones=false);
					  foreach ($pro as $key2 => $value2) {
					  	$ca.='<div class="item" onclick="detalle_ar('.$value2['ID'].')"><img src="ruta_img/'.$value2['FOTO'].'"><div class="product_info">
									<h5>'.$value2['NOMBRE'].'</h5>
									<div class="product_price" style="font-size:14px">$30.00</div>
								</div>
							</div>';					  	
					  }

		$ca.='</div></div>';

			
		}

		$js = '<script src="js/owl.carousel.min.js"></script><script  src="js/carousel_new_promo.js"></script>';

		return array('op'=>$op.$ca,'js'=>$js);
	
	}


	function guardar_mi_punto($parametros)
	{
		// print_r($parametros);
		$datos[0]['campo']='lat_responsable';
		$datos[0]['dato']=$parametros['lat'];
		$datos[1]['campo']='lon_responsable';
		$datos[1]['dato']=$parametros['lon'];

		$where[0]['campo']='responsable';
		$where[0]['dato']=$parametros['ID'];
		$where[1]['campo']='entregado';		
		$where[1]['dato']='0';
		 return $this->modelo->update('entregas',$datos,$where,$parametros['empresa']);
	}

	function generar_entregar($parametros)
	{
		$datos[0]['campo']='entregado';
		$datos[0]['dato']=1;

		$where[0]['campo']='responsable';
		$where[0]['dato']=$parametros['moto'];
		$where[1]['campo']='id_factura';		
		$where[1]['dato']=$parametros['fac'];
		 return $this->modelo->update('entregas',$datos,$where,$parametros['empresa']);
	}

	function datos_usuario($parametros)
	{
		if($parametros['moto']==1)
		{
			$datos = $this->modelo->buscar_motorizado_datos($parametros['empresa'],$parametros['idusu']);
		}else
		{
			 $datos = $this->modelo->buscar_cliente_datos($parametros['empresa'],$parametros['idusu']);
		}

		$datos1 = array('nombre'=>$datos[0]['nombre'],'usuario'=>$datos[0]['usuario'],'pass'=>$datos[0]['pass'],'email'=>$datos[0]['email'],'telefono'=>$datos[0]['telefono'],'NDI'=>$datos[0]['ci']);

		return $datos1;
	}

	function numero_pedido($parametros)
	{
		// print_r($parametros);die();		
		$datos = $this->modelo->numero_pedido($parametros['idc'],$parametros['empresa']);
		if(count($datos)>0)
		{
			return count($datos)+1;
		}else
		{
			return '';
		}
	}
}
?>