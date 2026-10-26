<?php 
include('../modelo/guia_remisionM.php');
include('../comprobantes/SRI/autorizar_sri.php');
include('../modelo/loginM.php');
include('../modelo/facturacionM.php');
include(dirname(__DIR__,1).'/lib/Reporte_pdf.php');
/**
 * 
 */
$controlador = new guia_remisionC();

if(isset($_GET['add_articulo']))
{
  // print_r($_POST);die();
    $parametros = $_POST;
    echo json_encode($controlador->add_articulos($parametros));
}

if(isset($_GET['datos_guia_remision']))
{
  // print_r($_POST);die();
    $parametros = $_POST['id'];
    echo json_encode($controlador->datos_guia_remision($parametros));
}
if(isset($_GET['lineas_guia_remision']))
{
  // print_r($_POST);die();
    $parametros = $_POST['id'];
    echo json_encode($controlador->lineas_guia_remision($parametros));
}
if(isset($_GET['eliminar_linea']))
{
  // print_r($_POST);die();
    $parametros = $_POST['id'];
    echo json_encode($controlador->eliminar_linea($parametros));
}
if(isset($_GET['eliminar_guia']))
{
  // print_r($_POST);die();
    $parametros = $_POST['id'];
    echo json_encode($controlador->eliminar_guia($parametros));
}
if(isset($_GET['anular_guia']))
{
  // print_r($_POST);die();
    $parametros = $_POST['id'];
    echo json_encode($controlador->anular_guia($parametros));
}
if(isset($_GET['autorizar_nc']))
{
  // print_r($_POST);die();
    $parametros = $_POST;
    echo json_encode($controlador->autorizar($parametros));
}
if(isset($_GET['lista_guia_remision']))
{
  // print_r($_POST);die();
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->lista_guia_remision($parametros));
}

if(isset($_GET['generar_guia']))
{
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->generar_guia($parametros));
}

if(isset($_GET['generar_guia_fac']))
{
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->generar_guia_fac($parametros));
}
if(isset($_GET['reporte_guia']))
{   
  $parametros = $_GET;
  echo json_encode($controlador->reporte_guia($parametros));
}




class guia_remisionC
{
	private $modelo;
	private $login;
	private $sri;	
	private $pdf;
	private $facturacion;
	function __construct()
	{
		$this->modelo = new guia_remisionM();
		$this->login = new loginM();
		$this->sri = new autorizacion_sri();
    $this->pdf = new Reporte_pdf();
    $this->facturacion = new facturacionM(); 
	}


  function lista_guia_remision($parametros)
  {
  	$empresa = $_SESSION['INICIO']['ID_EMPRESA'];
    $result = $this->modelo->guia_remision($empresa,$id=false,$parametros['serie'],$parametros['numfac'],$auto_nc=false,$parametros['query'],$parametros['desde'],$parametros['hasta']);
    // print_r($result); die();
    $tr ='';
    foreach($result as $key => $value)
    {
      if(is_object($value['FechaGRE']))
      {
        $value['FechaGRE'] = $value['FechaGRE']->format('Y-m-d');
      }
      $tr.='<tr>
              <td>';
               $tr.='<a class="btn-sm btn btn-primary" href="../controlador/nota_CreditoC.php?reporte_nota=true&empresa='.$_SESSION['INICIO']['ID_EMPRESA'].'&id='.$value['ID'].'&usu='.$_SESSION['INICIO']['ID_USUARIO'].'" target="_blank"><i class="fa fa-eye" title="Ver Guia de remision"></i></a>';

              if($value['estado']=='P' || $value['estado']=='')
                {
                  $tr.='<button class="btn-sm btn btn-danger" onclick="eliminar_guia('.$value['ID'].')"><i class="fa fa-trash" title="Eliminar"></i></button><button class="btn-sm btn btn-info" onclick="autorizar('.$value['ID'].')"><i class="fa fa-paper-plane" title="Autorizar"></i></button>';
                }
                               
                if($value['estado']=='R')
                {
                  $tr.='<button class="btn-sm btn btn-warning" onclick="modal_error_seri(\''.$value['Autorizacion_GR'].'\',\'GUIA_REMISION\')"><i class="fa fa-exclamation-triangle" title="Descargar xml"></i></button>';
                }
                if($value['estado']=='A')
                {
                  $tr.='<button class="btn-sm btn btn-secondary" onclick="anular_guia(\''.$value['ID'].'\',\'GUIA_REMISION\')"><i class="fa fa-times-circle" title="Anular"></i></button>';
                }
                
                
              $tr.='</td>
              <td><a href="#" onclick="cargar_detalle(\''.$value['ID'].'\',\''.$value['estado'].'\')">'.$value['nombre'].'</a></td>
              <td>'.$value['FechaGRE'].'</td>
              <td>'.$value['Remision'].'</td>
              <td>'.$value['Serie_GR'].'</td>';

      if($value['estado']=='A')
      {
        $tr.='<td class="table-success">'.$value['estado'].'</td>';
      }else if($value['estado']=='R')
      {
        $tr.='<td  class="table-danger">'.$value['estado'].'</td>';
      }else if($value['estado']=='AN')
      {
        $tr.='<td  class="table-warning">'.$value['estado'].'</td>';
      }else
      {
        $tr.='<td>'.$value['estado'].'</td>';
      }
      $tr.='</tr>';
    }
    return $tr;
  }

	function add_articulos($parametros)
	{
		// print_r($parametros);die();
		$idguia = $parametros['txt_guia'];
	    if($parametros['txt_guia']=='')
	    {
	    	$codigo = 'GR_SERIE_'.str_replace('-','',$parametros['serie']);
	    	$num = $this->login->buscar_codigo_secuencial($codigo);

	    	// print_r($num);die();

	    	$datos[0]['campo'] = 'numero';
	    	$datos[0]['dato'] = $num[0]['numero']+1;

	    	$datosW[0]['campo'] = 'id_empresa';
	    	$datosW[0]['dato'] = $_SESSION['INICIO']['ID_EMPRESA'];
	    	$datosW[1]['campo'] = 'detalle_secuencial';
	    	$datosW[1]['dato'] = $codigo;
	    	$res = $this->modelo->update('codigos_secuenciales',$datos,$datosW,$_SESSION['INICIO']['ID_EMPRESA']);
	    	$numero = $num[0]['numero'];

	    	 $datos[0]['campo'] = 'id_empresa';
		     $datos[0]['dato'] = $_SESSION['INICIO']['ID_EMPRESA'];
		     $datos[1]['campo'] = 'TC';
		     $datos[1]['dato'] = 'GR';
		     $datos[2]['campo'] = 'id_cliente';
		     $datos[2]['dato'] = $parametros['ddl_cliente'];
		     $datos[3]['campo'] = 'Comercial';
		     $datos[3]['dato'] = $parametros['RazonSocial'];
		     $datos[4]['campo'] = 'CIRUC_comercial';
		     $datos[4]['dato'] = $parametros['DCRazonSocial'];
		     $datos[5]['campo'] = 'Entrega';
		     $datos[5]['dato'] = $parametros['RazonSocial'];
		     $datos[6]['campo'] = 'CIRUC_Entrega';
		     $datos[6]['dato'] = $parametros['DCEmpresaEntrega'];
		     $datos[7]['campo'] = 'CiudadGRI';
		     $datos[7]['dato'] = $parametros['DCCiudadI'];
		     $datos[8]['campo'] = 'CiudadGRF'; 
		     $datos[8]['dato'] = $parametros['DCCiudadF'];
		     $datos[9]['campo'] = 'Placa_Vehiculo';
		     $datos[9]['dato'] = $parametros['TxtPlaca'];
		     $datos[10]['campo'] = 'FechaGRI';
		     $datos[10]['dato'] = $parametros['MBoxFechaGRI'];
		     $datos[11]['campo'] = 'FechaGRF';
		     $datos[11]['dato'] = $parametros['MBoxFechaGRF'];
		     $datos[12]['campo'] = 'Lugar_Entrega';
		     $datos[12]['dato'] = $parametros['TxtLugarEntrega'];
		     $datos[13]['campo'] = 'Pedido';
		     $datos[13]['dato'] = $parametros['TxtPedido'];
		     $datos[14]['campo'] = 'Serie_GR';
		     $datos[14]['dato'] = $parametros['serie'];
		     $datos[15]['campo'] = 'FechaGRE';
		     $datos[15]['dato'] = $parametros['MBoxFechaGRE'];
		     $datos[16]['campo'] = 'Zona';
		     $datos[16]['dato'] = $parametros['TxtZona'];
		     $datos[17]['campo'] = 'Remision';
		     $datos[17]['dato'] = $numero;		     
		     $datos[18]['campo'] = 'Autorizacion_GR';
		     $datos[18]['dato'] = $parametros['autorizacion'];
		     $datos[19]['campo'] = 'estado';
		     $datos[19]['dato'] = 'P';

		     // print_r($datos);die();

		    $this->modelo->add('guia_remision',$datos,$_SESSION['INICIO']['ID_EMPRESA']);
	    	$guia = $this->modelo->guia_remision($_SESSION['INICIO']['ID_EMPRESA'],$id=false,$serie_nc = $parametros['serie'],$numero,$parametros['autorizacion']);
	    	$idguia = $guia[0]['ID'];
	    }else
	    {
	    	 $datos[0]['campo'] = 'id_cliente';
		     $datos[0]['dato'] = $parametros['ddl_cliente'];
		     $datos[1]['campo'] = 'Comercial';
		     $datos[1]['dato'] = $parametros['RazonSocial'];
		     $datos[2]['campo'] = 'CIRUC_comercial';
		     $datos[2]['dato'] = $parametros['DCRazonSocial'];
		     $datos[3]['campo'] = 'Entrega';
		     $datos[3]['dato'] = $parametros['RazonSocial'];
		     $datos[4]['campo'] = 'CIRUC_Entrega';
		     $datos[4]['dato'] = $parametros['DCEmpresaEntrega'];
		     $datos[5]['campo'] = 'CiudadGRI';
		     $datos[5]['dato'] = $parametros['DCCiudadI'];
		     $datos[6]['campo'] = 'CiudadGRF'; 
		     $datos[6]['dato'] = $parametros['DCCiudadF'];
		     $datos[7]['campo'] = 'Placa_Vehiculo';
		     $datos[7]['dato'] = $parametros['TxtPlaca'];
		     $datos[8]['campo'] = 'FechaGRI';
		     $datos[8]['dato'] = $parametros['MBoxFechaGRI'];
		     $datos[9]['campo'] = 'FechaGRF';
		     $datos[9]['dato'] = $parametros['MBoxFechaGRF'];
		     $datos[10]['campo'] = 'Lugar_Entrega';
		     $datos[10]['dato'] = $parametros['TxtLugarEntrega'];
		     $datos[11]['campo'] = 'Pedido';
		     $datos[11]['dato'] = $parametros['TxtPedido'];
		     $datos[12]['campo'] = 'Serie_GR';
		     $datos[12]['dato'] = $parametros['serie'];
		     $datos[13]['campo'] = 'FechaGRE';
		     $datos[13]['dato'] = $parametros['MBoxFechaGRE'];
		     $datos[14]['campo'] = 'Zona';
		     $datos[14]['dato'] = $parametros['TxtZona'];
		     $datos[19]['campo'] = 'estado';
		     $datos[19]['dato'] = 'P';
		     
	    	$where[0]['campo'] = 'ID';
	    	$where[0]['dato'] = $idguia;

	    	$this->modelo->update('nota_credito',$datos,$where,$_SESSION['INICIO']['ID_EMPRESA']);
	    	
	    }

	    // $datosA = $this->modelo->articulos_id($parametros['id'],$_SESSION['INICIO']['ID_EMPRESA']);

	    $datosA[0]['campo'] = 'producto';
	    $datosA[0]['dato'] = $parametros['txt_articulo']; //$datosAA[0]['nombre'];
	    $datosA[1]['campo'] = 'cantidad';
	    $datosA[1]['dato'] = $parametros['txt_can'];
	    $datosA[2]['campo'] = 'precio_uni';
	    $datosA[2]['dato'] = $parametros['txt_pvp'];
	    $datosA[3]['campo'] = 'subtotal';
	    $datosA[3]['dato'] = number_format($parametros['txt_can']*$parametros['txt_pvp'],2,'.','');
	    $datosA[4]['campo'] = 'id_guiaRemi';
	    $datosA[4]['dato'] = $idguia;
	    $datosA[5]['campo'] = 'descuento';
	    $datosA[5]['dato'] = number_format((($parametros['txt_sub']*$parametros['txt_dcto'])/100),2,'.','');
	    $datosA[6]['campo'] = 'iva';
	    $datosA[6]['dato'] = number_format(floatval($parametros['txt_iva']),2,'.','');
	    $datosA[7]['campo'] = 'total';
	    $datosA[7]['dato'] = number_format(floatval($parametros['txt_total']),2,'.','');
	    $datosA[8]['campo'] = 'porc_descuento';
	    $datosA[8]['dato'] = $parametros['txt_dcto'];
	    $datosA[9]['campo'] = 'referencia';
	    $datosA[9]['dato'] = $parametros['txt_codigo'];    
	    $datosA[10]['campo'] = 'Serie_No';
	    $datosA[10]['dato'] = $parametros['serie'];
	    if($parametros['txt_iva']!=0){   
	      $datosA[11]['campo'] = 'porc_iva';
	      $datosA[11]['dato'] = ($_SESSION['INICIO']['IVA']/100);
	    }else
	    {
	      $datosA[12]['campo'] = 'porc_iva';
	      $datosA[12]['dato'] = 0;
	    }

	    $res = $this->modelo->add('lineas_factura',$datosA,$_SESSION['INICIO']['ID_EMPRESA']);

	    return array('respuesta'=>$res,'id'=>$idguia);

  	}

  	function datos_guia_remision($id)
  	{
  		$empresa = $_SESSION['INICIO']['ID_EMPRESA'];
  		return $this->modelo->guia_remision($empresa,$id,$serie_nc = false,$numero_nc=false,$auto_nc=false);
  	}

  	function lineas_guia_remision($id)
  	{
  		$empresa = $_SESSION['INICIO']['ID_EMPRESA'];
  		$guia = $this->modelo->guia_remision($empresa,$id,$serie_nc = false,$numero_nc=false,$auto_nc=false,$cliente=false,$desde=false,$hasta=false);

  		$datos =  $this->modelo->lineas_guia_remision($id,$empresa);
  		// print_r($datos);die();
  		$tr = '';
  		$dscto = 0; $iva = 0; $sub = 0 ; $total = 0;
  		foreach ($datos as $key => $value) {
  			$dscto+=number_format($value['descuento'],2,'.',''); 
  			$iva+= number_format($value['iva'],2,'.','') ; 
  			$sub+=number_format($value['subtotal'],2,'.',''); 
  			$total+=number_format($value['total'],2,'.','');
  			$tr.='<tr>
  			<td>';
  			if($guia[0]['estado']!='A' && $guia[0]['estado']!='AN')
  			{
  				$tr.='<button type="button" class="btn btn-sm btn-danger" onclick="eliminar_linea(\''.$value['id_lineas'].'\')"><i class="fa fa-trash"></i></button>';
  			}
  			$tr.='</td>
  			<td>'.$value['referencia'].'</td>
  			<td>'.$value['producto'].'</td>
  			<td>'.$value['cantidad'].'</td>
  			<td>'.$value['precio_uni'].'</td>
  			<td>'.$value['descuento'].'</td>
  			<td>'.$value['iva'].'</td>
  			<td>'.$value['subtotal'].'</td>
  			<td>'.$value['total'].'</td>
  			</tr>';
  		}

  		return array('tr'=>$tr,'descuento'=>$dscto,'iva'=>$iva,'sub'=>$sub,'total'=>$total);
  	}

  	function eliminar_linea($id)
  	{
  		$empresa = $_SESSION['INICIO']['ID_EMPRESA'];
  		return $this->modelo->eliminar_linea($id,$empresa);
  	}
  	function eliminar_guia($id)
  	{
  		$empresa = $_SESSION['INICIO']['ID_EMPRESA'];
  		$this->modelo->eliminar_linea_guia($id,$empresa);
  		return $this->modelo->eliminar_guia($id,$empresa);
  	}


  	function anular_guia($id)
  	{
  		$empresa = $_SESSION['INICIO']['ID_EMPRESA'];
  		$datos[0]['campo'] = 'estado';
  		$datos[0]['dato'] = 'AN';


  		$datosw[0]['campo'] = 'ID';  		
  		$datosw[0]['dato'] = $id;

  		// print_r($id);die();
  		return $this->modelo->update('guia_remision',$datos,$datosw,$empresa);
  	}

  	function autorizar($parametros)
  	{
  		if(isset($parametros['txt_ci']) && strlen($parametros['txt_ci'])<13)
  		{
  			return 6;
  		}
  		// actualiza nota de credito
  		$datosN[0]['campo'] = 'fecha_nc';	    	
    	$datosN[0]['dato'] =$parametros['txt_fecha'];
    	$datosN[1]['campo'] = 'cliente';	    	
    	$datosN[1]['dato'] =$parametros['ddl_cliente'];
    	$datosN[2]['campo'] = 'fecha_doc';	    	
    	$datosN[2]['dato'] = $parametros['txt_fecha_doc'];
    	$datosN[3]['campo'] = 'serie_doc';	    	
    	$datosN[3]['dato'] = $parametros['txt_estab'].'-'.$parametros['txt_punto'];
    	$datosN[4]['campo'] = 'numero_doc';	    	
    	$datosN[4]['dato'] = $parametros['txt_num_doc'];
    	$datosN[5]['campo'] = 'autorizacion_doc';	    	
    	$datosN[5]['dato'] = $parametros['txt_autorizacion_doc'];
    	$datosN[6]['campo'] = 'motivo';	    	
    	$datosN[6]['dato'] = $parametros['txt_motivo'];
    	$where[0]['campo'] = 'id_nota_credito';
    	$where[0]['dato'] = $parametros['txt_nota'];
    	$this->modelo->update('nota_credito',$datosN,$where,$_SESSION['INICIO']['ID_EMPRESA']);

    	// actualiza cliente

    	$datosC[0]['campo'] = 'mail';
    	$datosC[0]['dato'] = $parametros['txt_email'];
    	$datosC[1]['campo'] = 'telefono';
    	$datosC[1]['dato'] = $parametros['txt_telefono'];
    	$datosC[2]['campo'] = 'direccion';
    	$datosC[2]['dato'] = $parametros['txt_direccion'];

    	$datosCW[0]['campo'] = 'ci_ruc';
    	$datosCW[0]['dato'] = $parametros['txt_ci'];    	
    	$this->modelo->update('cliente',$datosC,$datosCW,$_SESSION['INICIO']['ID_EMPRESA']);

    	//genera el xml

    	 return $this->sri->nota_de_credito($parametros);
  		// print_r($parametros);die();
  	}	

  	function reporte_nota($parametros)
	  {
	    $empresa = $this->modelo->datos_empresa_sucursal_usuario($parametros['usu'],$parametros['empresa']);
	    $cliente_factura = $this->modelo->nota_venta($parametros['empresa'],$id=$parametros['id'],$serie_nc = false,$numero_nc=false,$auto_nc=false,$cliente=false,$desde=false,$hasta=false);
	    $lineas = $this->modelo->linea_nota_venta($parametros['id'],$parametros['empresa']);
	    $rimpe = $this->sri->tipo_contribuyente($empresa[0]['RUC']);
	    $doc =  $this->pdf->nota_credito_pdf($cliente_factura,$lineas,$empresa,$rimpe,true,false);
	    // print_r($doc);die();
	    return $doc;
	  }
	function generar_guia($parametros)
	{
		$datos[0]['campo'] = 'Fecha';
		$datos[0]['dato'] = $parametros['fecha'];
		$datos[1]['campo'] = 'Factura';
		$datos[1]['dato'] = $parametros['factura'];
		$datos[2]['campo'] = 'Serie';
		$datos[2]['dato'] = $parametros['estab'].'-'.$parametros['punto'];
		$datos[3]['campo'] = 'Autorizacion';
		$datos[3]['dato'] = $parametros['auto_fac'];
	  $datos[4]['campo'] = 'estado';
	  $datos[4]['dato'] = 'P';
	  $datos[5]['campo'] = 'FechaGRE';
	  $datos[5]['dato'] = $parametros['fecha_guia'];
	  $datos[6]['campo'] = 'FechaGRI';
	  $datos[6]['dato'] = $parametros['fecha_inicio'];
	  $datos[7]['campo'] = 'FechaGRF';
	  $datos[7]['dato'] = $parametros['fecha_fin'];


		$datosW[0]['campo'] = 'ID';
		$datosW[0]['dato'] = $parametros['guia'];
		$datosW[1]['campo'] = 'id_empresa';
		$datosW[1]['dato'] = $_SESSION['INICIO']['ID_EMPRESA'];

		$this->modelo->update('guia_remision',$datos,$datosW,$_SESSION['INICIO']['ID_EMPRESA']);

		return $this->sri->Autorizar_guia_remision($parametros);
		
		print_r($parametros);die();

	}

	function generar_guia_fac($parametros)
	{
		$empresa = $_SESSION['INICIO']['ID_EMPRESA'];
		$guia = $this->modelo->guia_remision($empresa,$parametros['guia'],$serie_gr = false,$numero_gr=false,$auto_gr=false,$cliente=false,$desde=false,$hasta=false);
		$lineas = $this->modelo->lineas_guia_remision($parametros['guia'],$empresa);

		// print_r($guia);die();
		$sub = 0;$descuento = 0;$iva=0;$total = 0;$con_iva=0;$sin_iva = 0;
		foreach ($lineas as $key => $value) {
			$sub+= number_format($value['subtotal'],2,'.','');
			$descuento+= number_format($value['descuento'],2,'.','');
			$iva+= number_format($value['iva'],2,'.','');
			$total+= number_format($value['total'],2,'.','');
			if($value['iva']==0)
			{
				$sin_iva+= number_format($value['subtotal'],2,'.','');
			}else{
				$con_iva+= number_format($value['subtotal'],2,'.','');	
			}		
		}

		$codigo = 'FA_SERIE_'.str_replace('-','',$parametros['serie']);
    	$num = $this->login->buscar_codigo_secuencial($codigo);

		  $datosF[0]['campo']='id_empresa';
	    $datosF[0]['dato']=$empresa;
	    $datosF[1]['campo']='id_cliente';
	    $datosF[1]['dato']=$guia[0]['clienteGR'];
	    $datosF[2]['campo']='id_usuario';
	    $datosF[2]['dato']=$_SESSION['INICIO']['ID_USUARIO'];
	    $datosF[3]['campo']='serie';
	    $datosF[3]['dato']=$_SESSION['INICIO']['SERIE'];    
	    $datosF[4]['campo']='num_factura';
	    $datosF[4]['dato']=$num[0]['numero'];   
	    $datosF[5]['campo']='fecha';
	    $datosF[5]['dato']=$guia[0]['FechaGRE'] ;    
	    $datosF[6]['campo']='Porc_IVA';
	    $datosF[6]['dato']='0.12';
	    $datosF[7]['campo']='Autorizacion';
	    $datosF[7]['dato']=$num[0]['Autorizacion'];
	    $datosF[8]['campo']='subtotal';
	    $datosF[8]['dato']=$sub;
	    $datosF[9]['campo']='descuento';
	    $datosF[9]['dato']=$descuento;
	    $datosF[10]['campo']='iva';
	    $datosF[10]['dato']=$iva;
	    $datosF[11]['campo']='total';
	    $datosF[11]['dato']=$total;
	    $datosF[12]['campo']='Sin_Iva';
	    $datosF[12]['dato']=$sin_iva;
	    $datosF[13]['campo']='Con_Iva';
	    $datosF[13]['dato']=$con_iva;
	    $datosF[14]['campo']='Tipo_pago';
	    $datosF[14]['dato']=$parametros['pago'];
	    $datosF[15]['campo']='estado_factura';
	    $datosF[15]['dato']='P';

	    // print_r($datosF);die();

	    $res = $this->modelo->add('facturas',$datosF,$_SESSION['INICIO']['ID_EMPRESA']);
	    if($res==1)
	    {
	    	$datos[0]['campo'] = 'numero';
	    	$datos[0]['dato'] = $num[0]['numero']+1;

	    	$datosW[0]['campo'] = 'id_empresa';
	    	$datosW[0]['dato'] = $_SESSION['INICIO']['ID_EMPRESA'];
	    	$datosW[1]['campo'] = 'detalle_secuencial';
	    	$datosW[1]['dato'] = $codigo;
	    	$res = $this->modelo->update('codigos_secuenciales',$datos,$datosW,$_SESSION['INICIO']['ID_EMPRESA']);
	    }

	    $fac = $this->modelo->facturas($_SESSION['INICIO']['ID_EMPRESA'],$num[0]['numero'],$parametros['serie'],$num[0]['Autorizacion']);

	    if(count($fac)>0)
	    {
	    	$datosL[0]['campo'] = 'id_factura';
	    	$datosL[0]['dato'] = $fac[0]['id_factura'];

	    	$datosWL[0]['campo'] = 'id_guiaRemi';
	    	$datosWL[0]['dato'] = $parametros['guia'];
	    	$res = $this->modelo->update('lineas_factura',$datosL,$datosWL,$_SESSION['INICIO']['ID_EMPRESA']);

	    	$datosGG[0]['campo'] = 'id_fac_interna';
	    	$datosGG[0]['dato'] = $fac[0]['id_factura'];

	    	$datosWG[0]['campo'] = 'ID';
	    	$datosWG[0]['dato'] = $parametros['guia'];
	    	$res = $this->modelo->update('guia_remision',$datosGG,$datosWG,$_SESSION['INICIO']['ID_EMPRESA']);
	    }
	    // COMENZAR AUTORIZACION DE FACTURA Y ACTUALIZAR EN GUAI DE REMISION LO DE FACTURA SERIE 
	    $parametrosfac['fac'] = $fac[0]['id_factura'];
	    $parametrosfac['empresa'] = $_SESSION['INICIO']['ID_EMPRESA'];
	    $resp = $this->sri->Autorizar_factura_o_liquidacion($parametrosfac);
	    if($resp==1)
	    {
	    	$fac = $this->modelo->facturas($empresa,$numero=false,$serie=false,$auto=false,$fac[0]['id_factura']);
	    	$datosG2[0]['campo'] = 'Factura';
	    	$datosG2[0]['dato'] = $fac[0]['num_factura'];
	    	$datosG2[1]['campo'] = 'Serie';
	    	$datosG2[1]['dato'] = $fac[0]['serie'];
	    	$datosG2[2]['campo'] = 'Autorizacion';
	    	$datosG2[2]['dato'] = $fac[0]['Autorizacion'];
	    	$datosG2[3]['campo'] = 'Fecha';
	    	$datosG2[3]['dato'] = $fac[0]['fecha'];

	    	$datosWG2[0]['campo'] = 'ID';
	    	$datosWG2[0]['dato'] = $parametros['guia'];
	    	$res = $this->modelo->update('guia_remision',$datosG2,$datosWG2,$_SESSION['INICIO']['ID_EMPRESA']);
	    }

			$respG =  $this->sri->Autorizar_guia_remision($parametros);

			return array('factura'=>$resp,'guia'=>$respG);
		
		print_r($parametros);die();

	}
	function reporte_guia($parametros)
	{
	    // print_r($parametros);die();
	    $cliente_factura = array();
	    $empresa = $this->modelo->datos_empresa_sucursal_usuario($parametros['usu'],$parametros['empresa']);
	    $lineas = $this->modelo->lineas_guia_remision($parametros['guia'],$parametros['empresa']);
	    $rimpe = $this->sri->tipo_contribuyente($empresa[0]['RUC']);
	    $guia = $this->modelo->guia_remision($parametros['empresa'],$parametros['guia'],$serie_gr = false,$numero_gr=false,$auto_gr=false,$cliente=false,$desde=false,$hasta=false);
	    if(count($guia)>0 && $guia[0]['id_fac_interna']!='')
	    {
	    	$cliente_factura = $this->facturacion->cliente_factura($guia[0]['id_fac_interna'],$parametros['empresa']);
	    }

	    $cliente_factura[0] = array_merge($guia[0],$cliente_factura[0]);

	    // print_r($cliente_factura);die();

	    if(isset($cliente_factura[0]['Tipo_pago']) && $cliente_factura[0]['Tipo_pago']=='.' || isset($cliente_factura[0]['Tipo_pago']) && $cliente_factura[0]['Tipo_pago']=='')
	    {
	    	$cliente_factura[0]['Tipo_pago'] = '01';
	    	if(isset($parametros['pago']))
	    	{
	      		$cliente_factura[0]['Tipo_pago'] = $parametros['pago'];
	      	}
	    }else
	    {
	    	$cliente_factura[0]['Tipo_pago'] = '01';
	    }
	    $tipo_pago = $this->modelo->DCTipoPago($id=false,$cliente_factura[0]['Tipo_pago'],$descripcion=false);
	    // print_r($tipo_pago);die();
	    $cliente_factura[0]['tipo_pago_des'] = $tipo_pago[0]['CTipoPago'];
	    // print_r($rimpe);die();
	    $doc =  $this->pdf->guia_pdf($cliente_factura,$lineas,$empresa,$rimpe,true,false);
	    // print_r($doc);die();
	    return $doc;
	}

}
?>