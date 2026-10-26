<?php 
include(dirname(__DIR__).'/modelo/clienteM.php');

/**
 * 
 */
$controlador = new cliente();
if(isset($_GET['buscar_cliente']))
{
	$query='';
	if(isset($_GET['q']))
	{
		$query = $_GET['q'];
	}
	$idempresa = $_GET['emp'];
	$tipo = $_GET['tipo'];
	echo json_encode($controlador->buscar_cliente($query,$tipo,$idempresa));
}

if(isset($_GET['buscar_proveedor']))
{
	$query='';
	if(isset($_GET['q']))
	{
		$query = $_GET['q'];
	}
	$idempresa = $_GET['emp'];
	$tipo = $_GET['tipo'];
	echo json_encode($controlador->buscar_proveedor($query,$tipo,$idempresa));
}

if(isset($_GET['cliente']))
{
	$parametros = $_POST;
	$idempresa = $_GET['empresa'];
	echo json_encode($controlador->editar_cliente($parametros,$idempresa));
}

if(isset($_GET['proveedor']))
{
	$parametros = $_POST;
	$idempresa = $_GET['empresa'];
	echo json_encode($controlador->editar_proveedor($parametros,$idempresa));
}

if(isset($_GET['detalle_all']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->detalle_all($parametros));
}
class cliente
{
	private $modelo;
	function __construct()
	{
	  $this->modelo = new clienteM();
	}

	// function datos_factura($id)
	// {
	// 	$query = $id;
 //        $lineas = $this->modelo->linea_facturas($query);
 //        return  $lineas;

	// }
	// function factura_cliente($id)
	// {
	// 	$query = $id;
 //        $cliente =  $this->modelo->cliente_factura($query);
 //        return  $cliente;

	// }

	function editar_cliente($parametros,$empresa)
	{
		$datos[0]['campo']='nombre';
		$datos[0]['dato']=$parametros['txt_cliente'];
		$datos[1]['campo']='telefono';
		$datos[1]['dato']=$parametros['txt_telefono'];
		$datos[2]['campo']='mail';
		$datos[2]['dato']=$parametros['txt_email'];
		$datos[3]['campo']='direccion';
		$datos[3]['dato']=$parametros['txt_direccion'];		
		$datos[4]['campo']=	'ci_ruc';
		$datos[4]['dato']=$parametros['txt_ci'];		
		$datos[5]['campo']=	'id_empresa';
		$datos[5]['dato']=$empresa;	
		$datos[6]['campo']=	'Razon_Social';
		$datos[6]['dato']=$parametros['txt_cliente'];	
		$datos[7]['campo']=	'tipo';
		$datos[7]['dato']='C';

		if($parametros['txt_id']!='')
		{
		    $where[0]['campo']='id_cliente';
		    $where[0]['dato']=$parametros['txt_id'];
            $this->modelo->update($tabla='cliente',$datos,$where,$empresa);
            return $parametros['txt_id'];

       //      if(isset($parametros['id_factura']) && $parametros['id_factura']!='')
       //      {
			    // $datos1[0]['campo'] = 'id_cliente';
			    // $datos1[0]['dato'] = $parametros['idC'];
			    // $where1[0]['campo'] = 'id_factura';
			    // $where1[0]['dato']= $parametros['id_factura']; 
       //      	return $this->modelo->update('facturas',$datos1,$where1);
       //      }else if(isset($parametros['id_factura']) && $parametros['id_factura']=='')
       //      {

       //      }

		}else
		{
		   $this->modelo->add($tabla='cliente',$datos,$empresa);
		   $dato = $this->modelo->lista_clientes_app($empresa,false,$datos[4]['dato']);
		   return $dato[0]['id'];
		}
	}

function editar_proveedor($parametros,$empresa)
	{
		$datos[0]['campo']='nombre';
		$datos[0]['dato']=$parametros['txt_cliente'];
		$datos[1]['campo']='telefono';
		$datos[1]['dato']=$parametros['txt_telefono'];
		$datos[2]['campo']='mail';
		$datos[2]['dato']=$parametros['txt_email'];
		$datos[3]['campo']='direccion';
		$datos[3]['dato']=$parametros['txt_direccion'];		
		$datos[4]['campo']=	'ci_ruc';
		$datos[4]['dato']=$parametros['txt_ci'];		
		$datos[5]['campo']=	'id_empresa';
		$datos[5]['dato']=$empresa;	
		$datos[6]['campo']=	'Razon_Social';
		$datos[6]['dato']=$parametros['txt_cliente'];	
		$datos[7]['campo']=	'tipo';
		$datos[7]['dato']='P';

		if($parametros['txt_id']!='')
		{
		    $where[0]['campo']='id_cliente';
		    $where[0]['dato']=$parametros['txt_id'];
            $this->modelo->update($tabla='cliente',$datos,$where,$empresa);
            return $parametros['txt_id'];

       //      if(isset($parametros['id_factura']) && $parametros['id_factura']!='')
       //      {
			    // $datos1[0]['campo'] = 'id_cliente';
			    // $datos1[0]['dato'] = $parametros['idC'];
			    // $where1[0]['campo'] = 'id_factura';
			    // $where1[0]['dato']= $parametros['id_factura']; 
       //      	return $this->modelo->update('facturas',$datos1,$where1);
       //      }else if(isset($parametros['id_factura']) && $parametros['id_factura']=='')
       //      {

       //      }

		}else
		{
		   $this->modelo->add($tabla='cliente',$datos,$empresa);
		   $dato = $this->modelo->lista_proveedor_app($empresa,false,$datos[4]['dato']);
		   return $dato[0]['id'];
		}
	}


	function buscar_cliente($query,$tipo,$idempresa)
	{

		// print_r($tipo);die();
		$lista =array();
		if($tipo==1)
		{
			$nombres = $this->modelo->lista_clientes_app($idempresa,$query);
			foreach ($nombres as $key => $value) {
				$lista[] = array('id'=>$value['id'],'text'=>$value['nombre'],'data'=>array('id'=>$value['id'],'nombre'=>$value['nombre'],'telefono'=>$value['telefono'],'email'=>$value['mail'],'direccion'=>$value['direccion'],'ci'=>$value['ci_ruc']));
			}
	    }else
	    {
	    	$nombres = $this->modelo->lista_clientes_app($idempresa,false,$query);
			foreach ($nombres as $key => $value) {
				$lista[] = array('id'=>$value['id'],'text'=>$value['ci_ruc'],'data'=>array('id'=>$value['id'],'nombre'=>$value['nombre'],'telefono'=>$value['telefono'],'email'=>$value['mail'],'direccion'=>$value['direccion'],'ci'=>$value['ci_ruc']));
			}
	    }
		// print_r($lista);die();
        return  $lista;
	}

	function buscar_proveedor($query,$tipo,$idempresa)
	{

		// print_r($tipo);die();
		$lista =array();
		if($tipo==1)
		{
			$nombres = $this->modelo->lista_proveedor_app($idempresa,$query);
			foreach ($nombres as $key => $value) {
				$lista[] = array('id'=>$value['id'],'text'=>$value['nombre'],'data'=>array('id'=>$value['id'],'nombre'=>$value['nombre'],'telefono'=>$value['telefono'],'email'=>$value['mail'],'direccion'=>$value['direccion'],'ci'=>$value['ci_ruc']));
			}
	    }else
	    {
	    	$nombres = $this->modelo->lista_proveedor_app($idempresa,false,$query);
			foreach ($nombres as $key => $value) {
				$lista[] = array('id'=>$value['id'],'text'=>$value['ci_ruc'],'data'=>array('id'=>$value['id'],'nombre'=>$value['nombre'],'telefono'=>$value['telefono'],'email'=>$value['mail'],'direccion'=>$value['direccion'],'ci'=>$value['ci_ruc']));
			}
	    }
		// print_r($lista);die();
        return  $lista;
	}

	function detalle_all($parametros)
	{

		// print_r($parametros);
		if($parametros['tipo']=='C')
		{
		   $cliente = $this->modelo->lista_clientes_app($parametros['empresa'],$query=false,$ci=false,$parametros['cliente']);
		}else
		{
		   $cliente = $this->modelo->lista_proveedor_app($parametros['empresa'],$query=false,$ci=false,$parametros['cliente']);			
		}
		// print_r($cliente);
		$sri = $this->validar_sri($cliente[0]['ci_ruc']);
		if($sri['res']==1)
		{
			return array('datos'=>$cliente[0],'sri'=>$sri['tbl']);
		}else
		{
			return array('datos'=>$cliente[0],'sri'=>'<table><tr><td>No existen datos en el SRI</td></tr></table>');
		}

		// print_r($cliente);
		// print_r($sri);

		// die();

	}

	function validar_sri($ci)
	{
		$url = "https://srienlinea.sri.gob.ec/sri-catastro-sujeto-servicio-internet/rest/ConsolidadoContribuyente/existePorNumeroRuc?numeroRuc=".$ci;
		$url_sri = "https://srienlinea.sri.gob.ec/facturacion-internet/consultas/publico/ruc-datos2.jspa?accion=siguiente&ruc=".$ci;
		$res = $this->getRemoteFile($url);
		$r = array('res'=>2,'tbl'=>'');
		if($res=='true')
		{
			$r = array('res'=>2,'tbl'=>'');
			$datos = $this->getRemoteFile($url_sri);
			if($datos!= false)
			{
			$sp = '<table class="formulario">';
            $tbl = explode($sp, $datos);
            $tbl =  explode('</table>',$tbl[1]);
            $html  = str_replace('<tr>
				<td colspan="2" class="lineaSep" />
			</tr>','',$tbl[0]);
			// $html  = str_replace('<tr>
			// 	<td colspan="2"></td>
			// </tr>','',$html);
			$html = str_replace('&oacute;','o',$html);
			$html = str_replace('&nbsp;','',$html);
			// $html = str_replace('U+FFFD','',$html);
            $tbl =strval('<table style="font-size:10.5px">'.utf8_encode($html).'</table>');
            $r = array('res'=>1,'tbl'=>$tbl);
           }

		}
		// print_r($tbl);die();
		return $r;
	}

	function getRemoteFile($url, $timeout = 10) {
	  $ch = curl_init();
	  curl_setopt ($ch, CURLOPT_URL, $url);
	  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	  curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	  $file_contents = curl_exec($ch);
	  curl_close($ch);
	  return ($file_contents) ? $file_contents : FALSE;
	}



	// function buscar_articulo($query,$idempresa)
	// {
	// 	$nombres = $this->modelo->articulos($query,$idempresa);
 //        return  $nombres;
	// }

	// function Sri($id,$idempresa)
	// {
	// 	$parametros = array('empresa'=>$idempresa,'fac'=>$idempresa);
	// 	return  $this->sri->Autorizar($parametros);
	// }
	// function factura_pdf($id)
	// {
	// 	$datos = array();
	// 	$this->pdf->factura_pdf($datos);
	// }

	// function lista_facturas($query,$empresa)
	// {
	// 	$result = $this->modelo->lista_facturas($query,$empresa);
	// 	return $result;
	// }

	// function enviar_Email($empresa)
	// {
	// 	$to_correo = 'javier.farinango92@gmail.com';
	// 	$cuerpo_correo = '<b>hola mail</b>';
	// 	$titulo_correo = 'correo de prueba';
	// 	$correo_respaldo = 'example@example.com';
	// 	$archivos = array('1804202101070216417900110010010000000011234567813.xml','2004202101070216417900110010010000000041234567817.xml');
	// 	$HTML = true;
	// 	$this->mail->enviar_email($empresa,$to_correo,$cuerpo_correo,$titulo_correo,$correo_respaldo,$archivos,$nombre='Email envio',$HTML);
	// }

	// function eliminar_linea($id)
	// {
	// 	$datos[0]['campo']='id_lineas';
	// 	$datos[0]['dato']= $id;
 //        return  $this->modelo->delete('lineas_factura',$datos);
	// }

}

?>