<?php 
include('../modelo/lista_retencionM.php');
include('../modelo/facturacionM.php');
include('../modelo/loginM.php');
include('../comprobantes/SRI/autorizar_sri.php');
include(dirname(__DIR__,1).'/lib/phpmailer/enviar_emails.php');
include(dirname(__DIR__,1).'/lib/Reporte_pdf.php');

/**
 * 
 */
$controlador = new lista_retencionC();
if(isset($_GET['porbienes']))
{   
  // $parametros = $_POST['parametros'];
  echo json_encode($controlador->porbienes());
}
if(isset($_GET['porservicios']))
{   
  // $parametros = $_POST['parametros'];
  echo json_encode($controlador->porservicios());
}
if(isset($_GET['porconcepto']))
{   
  $parametros = $_POST['parametros'];
  echo json_encode($controlador->porconcepto($parametros));
}
if(isset($_GET['lista_retencion']))
{
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->lista_retencion($parametros));
}
if(isset($_GET['detalle_retencion']))
{   
  $parametros = $_POST['parametros'];
  echo json_encode($controlador->detalle_retencion($parametros));
}
if(isset($_GET['lineas_impuestos']))
{   
  $parametros = $_POST['parametros'];
  echo json_encode($controlador->lineas_impuestos($parametros));
}
if(isset($_GET['eliminar_impuesto']))
{   
  $parametros = $_POST['parametros'];
  echo json_encode($controlador->eliminar_impuesto($parametros));
}
if(isset($_GET['impuesto_bienes_servicios']))
{   
  $parametros = $_POST;
  echo json_encode($controlador->impueso_bienes_servicios($parametros));
}

if(isset($_GET['agregar_impuesto2']))
{   
  $parametros = $_POST;
  echo json_encode($controlador->agregar_impuesto2($parametros));
}

if(isset($_GET['autorizarRET']))
{   
  $parametros = $_POST['parametros'];
  echo json_encode($controlador->autorizarRET($parametros));
}

if(isset($_GET['reporte_retencion']))
{   
  $parametros = $_GET;
  echo json_encode($controlador->reporte_retencion($parametros));
}

if(isset($_GET['enviar_email_detalle']))
{   
  $parametros = $_POST;
  $file = $_FILES;
  echo json_encode($controlador->enviar_email_detalle($parametros,$file));
}
if(isset($_GET['eliminar_retencion']))
{
  // print_r($_POST);die();
    $parametros = $_POST['id'];
    echo json_encode($controlador->eliminar_retencion($parametros));
}
if(isset($_GET['anular_retencion']))
{
  // print_r($_POST);die();
    $parametros = $_POST['id'];
    echo json_encode($controlador->anular_retencion($parametros));
}

/**
 * 
 */
class lista_retencionC
{
	
		private $modelo;
    private $sri;
    private $login;
    private $facturacionM;
    private $pdf;
    private $mail;
	function __construct()
	{
		$this->modelo = new lista_retencionM();
		$this->login = new loginM();
	  $this->sri = new autorizacion_sri();
	  $this->facturacionM = new facturacionM();  
	  $this->pdf = new Reporte_pdf();    
    $this->mail = new enviar_emails();
	}


	function porbienes()
	{
		$datos = $this->modelo->porbienes();
		return $datos;
	}
	function porservicios()
	{
		$datos = $this->modelo->porservicios();
		return $datos;
	}
	function porconcepto($parametros)
	{
		$fecha = date('Y-m-d');
		if(isset($parametros['fecha']) && $parametros['fecha']!='')
		{
			$fecha = $parametros['fecha'];
		}
		$datos = $this->modelo->porconcepto($fecha);
		return $datos;
	}


	function lista_retencion($parametros)
  {
    $result = $this->modelo->lista_retencion($parametros);
    $tr ='';
    foreach($result as $key => $value)
    {
      if(is_object($value['fecha']))
      {
        $value['fecha'] = $value['fecha']->format('Y-m-d');
      }
      if(is_object($value['fechafac']))
      {
        $value['fechafac'] = $value['fechafac']->format('Y-m-d');
      }
      $tr.='<tr>
              <td>
                <a class="btn-sm btn btn-primary" href="../controlador/lista_retencionC.php?reporte_retencion=true&empresa='.$_SESSION['INICIO']['ID_EMPRESA'].'&ret='.$value['id'].'&usu='.$_SESSION['INICIO']['ID_USUARIO'].'" target="_blank"><i class="fa fa-eye" title="Ver factura"></i></a>
                ';
                
                if($value['estado']=='P' || $value['estado']=='')
                {
                  $tr.='<button class="btn-sm btn btn-danger" onclick="eliminar_retencion('.$value['id'].')"><i class="fa fa-trash" title="Eliminar"></i></button><button class="btn-sm btn btn-info" onclick="autorizar('.$value['id'].')"><i class="fa fa-paper-plane" title="Autorizar"></i></button>';
                }
                if($value['estado']=='R')
                {
                  $tr.='<button class="btn-sm btn btn-warning" onclick="modal_error_seri(\''.$value['autorizacion'].'\',\'RETENCIONES\')"><i class="fa fa-exclamation-triangle" title="Descargar xml"></i></button>';
                }
                if($value['estado']=='A')
                {
                  $tr.='<button class="btn-sm btn btn-secondary" onclick="anular_retencion(\''.$value['id'].'\',\'RETENCIONES\')"><i class="fa fa-times-circle" title="Anular"></i></button>';
                }
                
              $tr.='</td>
              <td><a href="#" onclick="cargar_detalle(\''.$value['id'].'\',\''.$value['estado'].'\')">'.$value['nombre'].'</a></td>
              <td>'.$value['fecha'].'</td>
              <td>'.$value['num'].'</td>
              <td>'.$value['serie'].'</td>
              <td>'.$value['factura'].'</td>
              <td>'.$value['establecimientoFac'].'-'.$value['puntoventa_Fac'].'</td>              
              <td>'.$value['fechafac'].'</td>';

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

    // print_r($tr);die();
    return $tr;
  }


	function impueso_bienes_servicios($parametros)
	{
		// print_r($parametros);die();
		  $numeroRet = $parametros['NoRet'];
		  $idret = $parametros['txt_idRET'];
		  $serie = str_replace('-','',$parametros['serie']);
		  if($parametros['txt_idRET']=='')
		  {
		  	$serie = str_replace('-','',$parametros['serie']);
    		$codigo = 'RE_SERIE_'.$serie;		  	
		  	$NoRet = $this->login->buscar_codigo_secuencial($codigo);
		  	$numeroRet = $NoRet[0]['numero'];

		  	$datos[0]['campo'] = 'numero';		  	
		  	$datos[0]['dato']  = $NoRet[0]['numero']+1;
		  	$datos[1]['campo'] = 'id_empresa';        
        $datos[1]['dato']  = $_SESSION['INICIO']['ID_EMPRESA'];

		  	$where[0]['campo'] = 'id_secuenciales';
		  	$where[0]['dato'] = $NoRet[0]['id_secuenciales'];
		  	$this->modelo->update('codigos_secuenciales',$datos,$where);


		  	$datosRETCab[0]['campo'] = 'serie';
		  	$datosRETCab[0]['dato'] = $parametros['serie'];
		  	$datosRETCab[1]['campo'] = 'numero';
		  	$datosRETCab[1]['dato'] = $numeroRet;
		  	$datosRETCab[2]['campo'] = 'IdProveedor';
		  	$datosRETCab[2]['dato'] =  $parametros['txt_idCli'];
		  	$datosRETCab[3]['campo'] = 'codigoUsuario';
		  	$datosRETCab[3]['dato'] = $_SESSION['INICIO']['ID_USUARIO'];
		  	$datosRETCab[4]['campo'] = 'autorizacion';
		  	$datosRETCab[4]['dato'] = $parametros['AutoRET'];
		  	$datosRETCab[5]['campo'] = 'fechaEmision';
		  	$datosRETCab[5]['dato'] = $parametros['txt_fecha'];		  	


		  	$datosRETCab[6]['campo'] = 'establecimientoFac';
		  	$datosRETCab[6]['dato'] =$parametros['TxtNumSerieUno'];
		  	$datosRETCab[7]['campo'] = 'puntoventa_Fac';
		  	$datosRETCab[7]['dato'] = $parametros['TxtNumSerieDos'];
		  	$datosRETCab[8]['campo'] = 'numeroFac';
		  	$datosRETCab[8]['dato'] = $parametros['TxtNumSerietres'];
		  	$datosRETCab[9]['campo'] = 'autorizacionFac';
		  	$datosRETCab[9]['dato'] =  $parametros['TxtNumAutor'];
		  	$datosRETCab[10]['campo'] = 'emisionFac';
		  	$datosRETCab[10]['dato'] = $parametros['MBFechaEmi'];		  	
		  	$datosRETCab[11]['campo'] = 'registroFac';
		  	$datosRETCab[11]['dato'] = $parametros['MBFechaRegis'];		  	
		  	$datosRETCab[12]['campo'] = 'vencimientoFac';
		  	$datosRETCab[12]['dato'] = $parametros['MBFechaCad'];		  	
		  	$datosRETCab[13]['campo'] = 'No_IVA';
		  	$datosRETCab[13]['dato'] = $parametros['TxtBaseImpoNoObjIVA'];		  	
		  	$datosRETCab[14]['campo'] = 'tarifa0';
		  	$datosRETCab[14]['dato'] = $parametros['TxtBaseImpo'];		  	
		  	$datosRETCab[15]['campo'] = 'tarifa12';
		  	$datosRETCab[15]['dato'] = $parametros['TxtBaseImpoGrav'];	  	
		  	$datosRETCab[16]['campo'] = 'valor_ICE';
		  	$datosRETCab[16]['dato'] = $parametros['TxtBaseImpoIce'];		  	
		  	$datosRETCab[17]['campo'] = 'id_empresa';
		  	$datosRETCab[17]['dato'] = $_SESSION['INICIO']['ID_EMPRESA'];
		  	$datosRETCab[18]['campo'] = 'estadoRet';
		  	$datosRETCab[18]['dato'] = 'P';	  			  			  	
		  	$datosRETCab[19]['campo'] = 'montoIva';
		  	$datosRETCab[19]['dato'] = $parametros['txt_Valor_iva'];	
		  	$datosRETCab[20]['campo'] = 'PagoLocExt';
		  	$datosRETCab[20]['dato'] = $parametros['DCTipoPago'];	 
				$this->modelo->add('retenciones',$datosRETCab);

				$idret = $this->modelo->retencion($id=false,$parametros['serie'],$numeroRet);
				$idret = $idret[0]['id_retenciones'];

		  }else
		  {
		  	 $ret = $this->modelo->retencion($id=false,$parametros['serie'],$numeroRet);
		  	 if($ret[0]['montoIva'] != $parametros['txt_Valor_iva'] )
		  	 {
		  	 	$this->modelo->delete_impuestos($id=false,$parametros['serie'],$numeroRet);
		  	 }

		  	$datosRETCab[1]['campo'] = 'fechaEmision';
		  	$datosRETCab[1]['dato'] = $parametros['txt_fecha'];		  	

		  	$datosRETCab[2]['campo'] = 'establecimientoFac';
		  	$datosRETCab[2]['dato'] =$parametros['TxtNumSerieUno'];
		  	$datosRETCab[3]['campo'] = 'puntoventa_Fac';
		  	$datosRETCab[3]['dato'] = $parametros['TxtNumSerieDos'];
		  	$datosRETCab[4]['campo'] = 'numeroFac';
		  	$datosRETCab[4]['dato'] = $parametros['TxtNumSerietres'];
		  	$datosRETCab[5]['campo'] = 'autorizacionFac';
		  	$datosRETCab[5]['dato'] =  $parametros['TxtNumAutor'];
		  	$datosRETCab[6]['campo'] = 'emisionFac';
		  	$datosRETCab[6]['dato'] = $parametros['MBFechaEmi'];		  	
		  	$datosRETCab[7]['campo'] = 'registroFac';
		  	$datosRETCab[7]['dato'] = $parametros['MBFechaRegis'];		  	
		  	$datosRETCab[8]['campo'] = 'vencimientoFac';
		  	$datosRETCab[8]['dato'] = $parametros['MBFechaCad'];		  	
		  	$datosRETCab[9]['campo'] = 'No_IVA';
		  	$datosRETCab[9]['dato'] = $parametros['TxtBaseImpoNoObjIVA'];		  	
		  	$datosRETCab[10]['campo'] = 'tarifa0';
		  	$datosRETCab[10]['dato'] = $parametros['TxtBaseImpo'];		  	
		  	$datosRETCab[11]['campo'] = 'tarifa12';
		  	$datosRETCab[11]['dato'] = $parametros['TxtBaseImpoGrav'];	  	
		  	$datosRETCab[12]['campo'] = 'valor_ICE';
		  	$datosRETCab[12]['dato'] = $parametros['TxtBaseImpoIce'];		  	
		  	$datosRETCab[13]['campo'] = 'id_empresa';
		  	$datosRETCab[13]['dato'] = $_SESSION['INICIO']['ID_EMPRESA'];
		  	$datosRETCab[14]['campo'] = 'estadoRet';
		  	$datosRETCab[14]['dato'] = 'P';	  			  			  	
		  	$datosRETCab[15]['campo'] = 'montoIva';
		  	$datosRETCab[15]['dato'] = $parametros['txt_Valor_iva'];	

		  	$datosRETCab[16]['campo'] = 'PagoLocExt';
		  	$datosRETCab[16]['dato'] = $parametros['DCTipoPago'];	 

		  	$datosRETCabWhere[0]['campo'] = 'id_retenciones'; 
		  	$datosRETCabWhere[0]['dato'] = $idret;

				$this->modelo->update('retenciones',$datosRETCab,$datosRETCabWhere);


		  }
		  // print_r($parametros);die();
      if(isset($parametros['rbl_bienes']) && $parametros['rbl_bienes']=='on')
      {
				$datosRET[0]['campo'] = 'detalle_impuesto';			
				$datosRET[0]['dato'] = $parametros['detalle_bienes'];
				$datosRET[1]['campo'] = 'base_imponible';			
				$datosRET[1]['dato'] = $parametros['txtbaseimpobienes'];
				$datosRET[2]['campo'] = 'porcentajeRet';			
				$datosRET[2]['dato'] = $parametros['ddl_porbienes'];
				$datosRET[3]['campo'] = 'valorRetenido';			
				$datosRET[3]['dato'] = $parametros['txtvalorRetBie'];
				$datosRET[4]['campo'] = 'SerieRet';			
				$datosRET[4]['dato'] = $parametros['serie'];
				$datosRET[5]['campo'] = 'NoRetencion';			
				$datosRET[5]['dato'] = $numeroRet;
				$datosRET[6]['campo'] = 'AutorizacionRet';			
				$datosRET[6]['dato'] = $parametros['AutoRET'];
				$datosRET[7]['campo'] = 'FechaRet';			
				$datosRET[7]['dato'] = $parametros['txt_fecha'];
				$datosRET[8]['campo'] = 'FacturaEstab';			
				$datosRET[8]['dato'] = $parametros['TxtNumSerieUno'];
				$datosRET[9]['campo'] = 'FacturaPunto';			
				$datosRET[9]['dato'] = $parametros['TxtNumSerieDos'];
				$datosRET[10]['campo'] = 'NoFactura';			
				$datosRET[10]['dato'] = $parametros['TxtNumSerietres'];
				$datosRET[11]['campo'] = 'IdProveedor';			
				$datosRET[11]['dato'] = $parametros['txt_idCli'];
				$datosRET[12]['campo'] = 'codigoUsuario';			
				$datosRET[12]['dato'] = $_SESSION['INICIO']['ID_USUARIO'];
				$datosRET[13]['campo'] = 'bienes_servicios';			
				$datosRET[13]['dato'] = '1';	
		  	$datosRET[14]['campo'] = 'id_empresa';
		  	$datosRET[14]['dato'] = $_SESSION['INICIO']['ID_EMPRESA'];

		  	$datosRET[15]['campo'] = 'PagoLocExt';
		  	$datosRET[15]['dato'] = '01';		  	
		  	$datosRET[16]['campo'] = 'por_bienes';
		  	$datosRET[16]['dato'] = '1';
		  	$datosRET[17]['campo'] = 'por_servicios';
		  	$datosRET[17]['dato'] = '0';

				$this->modelo->add('retenciones_impuestos',$datosRET);
				// $datosRET[0]['campo'] = 'Cta_retencion';			
				// $datosRET[0]['dato'] = $parametros[''];
			}

			 if(isset($parametros['rbl_servicios']) &&  $parametros['rbl_servicios']=='on')
      {
				$datosRET[0]['campo'] = 'detalle_impuesto';			
				$datosRET[0]['dato'] = $parametros['detalle_servicios'];
				$datosRET[1]['campo'] = 'base_imponible';			
				$datosRET[1]['dato'] = $parametros['txtbaseimposervicios'];
				$datosRET[2]['campo'] = 'porcentajeRet';			
				$datosRET[2]['dato'] = $parametros['ddl_porservicios'];
				$datosRET[3]['campo'] = 'valorRetenido';			
				$datosRET[3]['dato'] = $parametros['txtvalorRetSer'];
				$datosRET[4]['campo'] = 'SerieRet';			
				$datosRET[4]['dato'] = $parametros['serie'];
				$datosRET[5]['campo'] = 'NoRetencion';			
				$datosRET[5]['dato'] = $numeroRet;
				$datosRET[6]['campo'] = 'AutorizacionRet';			
				$datosRET[6]['dato'] = $parametros['AutoRET'];
				$datosRET[7]['campo'] = 'FechaRet';			
				$datosRET[7]['dato'] = $parametros['txt_fecha'];
				$datosRET[8]['campo'] = 'FacturaEstab';			
				$datosRET[8]['dato'] = $parametros['TxtNumSerieUno'];
				$datosRET[9]['campo'] = 'FacturaPunto';			
				$datosRET[9]['dato'] = $parametros['TxtNumSerieDos'];
				$datosRET[10]['campo'] = 'NoFactura';			
				$datosRET[10]['dato'] = $parametros['TxtNumSerietres'];
				$datosRET[11]['campo'] = 'IdProveedor';			
				$datosRET[11]['dato'] = $parametros['txt_idCli'];
				$datosRET[12]['campo'] = 'codigoUsuario';			
				$datosRET[12]['dato'] = $_SESSION['INICIO']['ID_USUARIO'];
				$datosRET[13]['campo'] = 'bienes_servicios';			
				$datosRET[13]['dato'] = '1';					
		  	$datosRET[14]['campo'] = 'id_empresa';
		  	$datosRET[14]['dato'] = $_SESSION['INICIO']['ID_EMPRESA'];
		  	$datosRET[15]['campo'] = 'PagoLocExt';
		  	$datosRET[15]['dato'] = '01';		  	
		  	$datosRET[16]['campo'] = 'por_bienes';
		  	$datosRET[16]['dato'] = '0';
		  	$datosRET[17]['campo'] = 'por_servicios';
		  	$datosRET[17]['dato'] = '1';
		  	
		  	$this->modelo->add('retenciones_impuestos',$datosRET);
				

				// $datosRET[0]['campo'] = 'Cta_retencion';			
				// $datosRET[0]['dato'] = $parametros[''];
			}

			return array('IDRET'=>$idret,'NoRET'=>$numeroRet);
	}

	function agregar_impuesto2($parametros)
	{
		// print_r($parametros);die();
		  $numeroRet = $parametros['NoRet'];
		  $idret = $parametros['txt_idRET'];
		  $serie = str_replace('-','',$parametros['serie']);
		  if($parametros['txt_idRET']=='')
		  {
		  	$serie = str_replace('-','',$parametros['serie']);
    		$codigo = 'RE_SERIE_'.$serie;		  	
		  	$NoRet = $this->login->buscar_codigo_secuencial($codigo);
		  	$numeroRet = $NoRet[0]['numero'];

		  	$datos[0]['campo'] = 'numero';		  	
		  	$datos[0]['dato']  = $NoRet[0]['numero']+1;

		  	$where[0]['campo'] = 'id_secuenciales';
		  	$where[0]['dato'] = $NoRet[0]['id_secuenciales'];
		  	$this->modelo->update('codigos_secuenciales',$datos,$where);


		  	$datosRETCab[0]['campo'] = 'serie';
		  	$datosRETCab[0]['dato'] = $parametros['serie'];
		  	$datosRETCab[1]['campo'] = 'numero';
		  	$datosRETCab[1]['dato'] = $numeroRet;
		  	$datosRETCab[2]['campo'] = 'IdProveedor';
		  	$datosRETCab[2]['dato'] =  $parametros['txt_idCli'];
		  	$datosRETCab[3]['campo'] = 'codigoUsuario';
		  	$datosRETCab[3]['dato'] = $_SESSION['INICIO']['ID_USUARIO'];
		  	$datosRETCab[4]['campo'] = 'autorizacion';
		  	$datosRETCab[4]['dato'] = $parametros['AutoRET'];
		  	$datosRETCab[5]['campo'] = 'fechaEmision';
		  	$datosRETCab[5]['dato'] = $parametros['txt_fecha'];		  	


		  	$datosRETCab[6]['campo'] = 'establecimientoFac';
		  	$datosRETCab[6]['dato'] =$parametros['TxtNumSerieUno'];
		  	$datosRETCab[7]['campo'] = 'puntoventa_Fac';
		  	$datosRETCab[7]['dato'] = $parametros['TxtNumSerieDos'];
		  	$datosRETCab[8]['campo'] = 'numeroFac';
		  	$datosRETCab[8]['dato'] = $parametros['TxtNumSerietres'];
		  	$datosRETCab[9]['campo'] = 'autorizacionFac';
		  	$datosRETCab[9]['dato'] =  $parametros['TxtNumAutor'];
		  	$datosRETCab[10]['campo'] = 'emisionFac';
		  	$datosRETCab[10]['dato'] = $parametros['MBFechaEmi'];		  	
		  	$datosRETCab[11]['campo'] = 'registroFac';
		  	$datosRETCab[11]['dato'] = $parametros['MBFechaRegis'];		  	
		  	$datosRETCab[12]['campo'] = 'vencimientoFac';
		  	$datosRETCab[12]['dato'] = $parametros['MBFechaCad'];		  	
		  	$datosRETCab[13]['campo'] = 'No_IVA';
		  	$datosRETCab[13]['dato'] = $parametros['TxtBaseImpoNoObjIVA'];		  	
		  	$datosRETCab[14]['campo'] = 'tarifa0';
		  	$datosRETCab[14]['dato'] = $parametros['TxtBaseImpo'];		  	
		  	$datosRETCab[15]['campo'] = 'tarifa12';
		  	$datosRETCab[15]['dato'] = $parametros['TxtBaseImpoGrav'];	  	
		  	$datosRETCab[16]['campo'] = 'valor_ICE';
		  	$datosRETCab[16]['dato'] = $parametros['TxtBaseImpoIce'];		
		  	$datosRETCab[17]['campo'] = 'id_empresa';
		  	$datosRETCab[17]['dato'] = $_SESSION['INICIO']['ID_EMPRESA'];	
		  	$datosRETCab[18]['campo'] = 'estadoRet';
		  	$datosRETCab[18]['dato'] = 'P';	  			  	
		  	$datosRETCab[19]['campo'] = 'montoIva';
		  	$datosRETCab[19]['dato'] = $parametros['txt_Valor_iva'];	

		  	$datosRETCab[20]['campo'] = 'PagoLocExt';
		  	$datosRETCab[20]['dato'] = $parametros['DCTipoPago'];	   	
				$this->modelo->add('retenciones',$datosRETCab);

				$idret = $this->modelo->retencion($id=false,$parametros['serie'],$numeroRet);
				$idret = $idret[0]['id_retenciones'];
		  }else
		  {
		  	// print_r($parametros);die();
		  	 $ret = $this->modelo->retencion($id=false,$parametros['serie'],$numeroRet);
		  	 if($ret[0]['montoIva'] != $parametros['txt_Valor_iva'] )
		  	 {
		  	 	$this->modelo->delete_impuestos($id=false,$parametros['serie'],$numeroRet);
		  	 }

		  	$datosRETCab[1]['campo'] = 'fechaEmision';
		  	$datosRETCab[1]['dato'] = $parametros['txt_fecha'];		  	

		  	$datosRETCab[2]['campo'] = 'establecimientoFac';
		  	$datosRETCab[2]['dato'] =$parametros['TxtNumSerieUno'];
		  	$datosRETCab[3]['campo'] = 'puntoventa_Fac';
		  	$datosRETCab[3]['dato'] = $parametros['TxtNumSerieDos'];
		  	$datosRETCab[4]['campo'] = 'numeroFac';
		  	$datosRETCab[4]['dato'] = $parametros['TxtNumSerietres'];
		  	$datosRETCab[5]['campo'] = 'autorizacionFac';
		  	$datosRETCab[5]['dato'] =  $parametros['TxtNumAutor'];
		  	$datosRETCab[6]['campo'] = 'emisionFac';
		  	$datosRETCab[6]['dato'] = $parametros['MBFechaEmi'];		  	
		  	$datosRETCab[7]['campo'] = 'registroFac';
		  	$datosRETCab[7]['dato'] = $parametros['MBFechaRegis'];		  	
		  	$datosRETCab[8]['campo'] = 'vencimientoFac';
		  	$datosRETCab[8]['dato'] = $parametros['MBFechaCad'];		  	
		  	$datosRETCab[9]['campo'] = 'No_IVA';
		  	$datosRETCab[9]['dato'] = $parametros['TxtBaseImpoNoObjIVA'];		  	
		  	$datosRETCab[10]['campo'] = 'tarifa0';
		  	$datosRETCab[10]['dato'] = $parametros['TxtBaseImpo'];		  	
		  	$datosRETCab[11]['campo'] = 'tarifa12';
		  	$datosRETCab[11]['dato'] = $parametros['TxtBaseImpoGrav'];	  	
		  	$datosRETCab[12]['campo'] = 'valor_ICE';
		  	$datosRETCab[12]['dato'] = $parametros['TxtBaseImpoIce'];		  	
		  	$datosRETCab[13]['campo'] = 'id_empresa';
		  	$datosRETCab[13]['dato'] = $_SESSION['INICIO']['ID_EMPRESA'];
		  	$datosRETCab[14]['campo'] = 'estadoRet';
		  	$datosRETCab[14]['dato'] = 'P';	  			  			  	
		  	$datosRETCab[15]['campo'] = 'montoIva';
		  	$datosRETCab[15]['dato'] = $parametros['txt_Valor_iva'];

		  	$datosRETCab[16]['campo'] = 'PagoLocExt';
		  	$datosRETCab[16]['dato'] = $parametros['DCTipoPago'];	 	 

		  	$datosRETCabWhere[0]['campo'] = 'id_retenciones'; 
		  	$datosRETCabWhere[0]['dato'] = $idret;

				$this->modelo->update('retenciones',$datosRETCab,$datosRETCabWhere);


		  }
		  // print_r($parametros);die();

		    $detalle = explode('-',$parametros['concepto']);
				$datosRET[0]['campo'] = 'detalle_impuesto';			
				$datosRET[0]['dato'] = trim($detalle[1]);
				$datosRET[1]['campo'] = 'base_imponible';			
				$datosRET[1]['dato'] = $parametros['txt_base_ret'];
				$datosRET[2]['campo'] = 'porcentajeRet';			
				$datosRET[2]['dato'] = $parametros['ddl_porconcepto'];
				$datosRET[3]['campo'] = 'valorRetenido';			
				$datosRET[3]['dato'] = $parametros['TxtValConA'];
				$datosRET[4]['campo'] = 'SerieRet';			
				$datosRET[4]['dato'] = $parametros['serie'];
				$datosRET[5]['campo'] = 'NoRetencion';			
				$datosRET[5]['dato'] = $numeroRet;
				$datosRET[6]['campo'] = 'AutorizacionRet';			
				$datosRET[6]['dato'] = $parametros['AutoRET'];
				$datosRET[7]['campo'] = 'FechaRet';			
				$datosRET[7]['dato'] = $parametros['txt_fecha'];
				$datosRET[8]['campo'] = 'FacturaEstab';			
				$datosRET[8]['dato'] = $parametros['TxtNumSerieUno'];
				$datosRET[9]['campo'] = 'FacturaPunto';			
				$datosRET[9]['dato'] = $parametros['TxtNumSerieDos'];
				$datosRET[10]['campo'] = 'NoFactura';			
				$datosRET[10]['dato'] = $parametros['TxtNumSerietres'];
				$datosRET[11]['campo'] = 'IdProveedor';			
				$datosRET[11]['dato'] = $parametros['txt_idCli'];
				$datosRET[12]['campo'] = 'codigoUsuario';			
				$datosRET[12]['dato'] = $_SESSION['INICIO']['ID_USUARIO'];
				$datosRET[13]['campo'] = 'codigo_retencion';			
				$datosRET[13]['dato'] = trim($detalle[0]);	
		  	$datosRET[14]['campo'] = 'id_empresa';
		  	$datosRET[14]['dato'] = $_SESSION['INICIO']['ID_EMPRESA'];
		  	$datosRET[15]['campo'] = 'PagoLocExt';
		  	$datosRET[15]['dato'] = '01';		  	
		  	$datosRET[16]['campo'] = 'por_bienes';
		  	$datosRET[16]['dato'] = '0';
		  	$datosRET[17]['campo'] = 'por_servicios';
		  	$datosRET[17]['dato'] = '0';
		  	$datosRET[18]['campo'] = 'bienes_servicios';
		  	$datosRET[18]['dato'] = '0';

				$this->modelo->add('retenciones_impuestos',$datosRET);
			

			return array('IDRET'=>$idret,'NoRET'=>$numeroRet);
	}

	function detalle_retencion($parametros)
	{
		$ret = $this->modelo->retencion($parametros['id']);
		return $ret;
	}

	function lineas_impuestos($parametros)
	{
		$ret = $this->modelo->retencion($parametros['id']);
		$detalle = $this->modelo->impuestos_retencion($ret[0]['numero'],$ret[0]['serie']);
		return $detalle;
	}


	function eliminar_impuesto($parametros)
	{
		 $datos[0]['campo'] = 'id_impuesto';
		 $datos[0]['dato'] = $parametros['id'];
		 return $this->modelo->delete($tabla = 'retenciones_impuestos',$datos);
	}

	function autorizarRET($parametros)
  {

    	$datos[0]['campo'] = 'fechaEmision';
    	$datos[0]['dato'] = $parametros['fecha'];
    	$datos[1]['campo'] = 'PagoLocExt';
    	$datos[1]['dato'] = $parametros['pago'];
    	$datos[2]['campo'] = 'emisionFac';
    	$datos[2]['dato'] = $parametros['fecha'];
    	$datos[3]['campo'] = 'registroFac';
    	$datos[3]['dato'] = $parametros['fecha'];
    	$datos[4]['campo'] = 'VencimientoFac';
    	$datos[4]['dato'] = $parametros['fecha'];


    	$datosw[0]['campo'] = 'id_retenciones';
    	$datosw[0]['dato'] = $parametros['ret'];
    	$this->modelo->update('retenciones',$datos,$datosw);
    if($_SESSION['INICIO']['F_Electronica']==1)
    {
      return  $this->sri->Autorizar_retencion($parametros);
    }else
    {
      return array('respuesta'=>4);
    }
  }

  function reporte_retencion($parametros)
  {
    $empresa = $this->facturacionM->datos_empresa_sucursal_usuario($parametros['usu'],$parametros['empresa']);
    // print_r($empresa);die();
    $cliente_retencion = $this->modelo->retencion($parametros['ret'],$serie=false,$numero=false);
    $lineas = $this->modelo->impuestos_retencion($cliente_retencion[0]['numero'],$_SESSION['INICIO']['SERIE']);
    $rimpe = $this->sri->tipo_contribuyente($empresa[0]['RUC']);
    if($cliente_retencion[0]['PagoLocExt']=='.' || $cliente_retencion[0]['PagoLocExt']=='')
    {
      $cliente_retencion[0]['PagoLocExt'] = $parametros['pago'];
    }
    $tipo_pago = $this->facturacionM->DCTipoPago($id=false,$cliente_retencion[0]['PagoLocExt'],$descripcion=false);
    // print_r($tipo_pago);die();
    $cliente_retencion[0]['tipo_pago_des'] = $tipo_pago[0]['CTipoPago'];
    // print_r($rimpe);die();
    $doc =  $this->pdf->retencion_pdf($cliente_retencion,$lineas,$empresa,$rimpe,true,false);
    // print_r($doc);die();
    return $doc;
  }

  function enviar_email_detalle($parametros,$file)
  {
    $ruta='../TEMP/';//ruta carpeta donde queremos copiar las imágenes
    if (!file_exists($ruta)) {
       mkdir($ruta, 0777, true);
    }
    $emp = $this->facturacionM->datos_empresa($_SESSION['INICIO']['ID_EMPRESA']);
    $cliente_retencion = $this->modelo->retencion($parametros['txt_fac_ema'],$serie=false,$numero=false);
    if($cliente_retencion[0]['PagoLocExt']=='.' || $cliente_retencion[0]['PagoLocExt']=='')
    {
      $cliente_retencion[0]['PagoLocExt'] = $parametros['pago'];
    }
    $tipo_pago = $this->facturacionM->DCTipoPago($id=false,$cliente_retencion[0]['PagoLocExt'],$descripcion=false);
    $cliente_retencion[0]['tipo_pago_des'] = $tipo_pago[0]['CTipoPago'];
   
    //dd
    $nombre = $emp[0]['email'];
    $to_correo = substr($parametros['txt_to'],0,-1);
    $cuerpo_correo = $parametros['txt_texto'];
    $titulo_correo = 'Comprobante electronico';
    // $correo_respaldo = $emp[0]['email'];
    $archivos = array();
    //subir archivo de file

    // print_r($file);die();
    if($file['file_adjunto']['name']!='')
    {
      // print_r('ddd');
          $uploadfile_temporal=$file['file_adjunto']['tmp_name']; 
          $nuevo_nom=$ruta.$file['file_adjunto']['name'];
           if (is_uploaded_file($uploadfile_temporal))
           {
             move_uploaded_file($uploadfile_temporal,$nuevo_nom);            
           }
           else
           {
             return -1;
           }       
          $archivos[0] = $file['file_adjunto']['name'];
    }
    //cracion de opdf de la factura
    if($parametros['cbx_factura']=='on')
    {

      $empresa = $this->facturacionM->datos_empresa_sucursal_usuario($_SESSION['INICIO']['ID_USUARIO'],$_SESSION['INICIO']['ID_EMPRESA']);
      $lineas = $this->modelo->impuestos_retencion($parametros['txt_fac_ema'],$_SESSION['INICIO']['SERIE']);
     	$rimpe = $this->sri->tipo_contribuyente($empresa[0]['RUC']);
      $doc =  $this->pdf->retencion_pdf($cliente_retencion,$lineas,$empresa,$rimpe,false,false);

      $can = count($archivos);
      if($can>0)
      {
        $archivos[1] = $cliente_retencion[0]['autorizacion'].'.pdf';
        $archivos[2] = $cliente_retencion[0]['autorizacion'].'.xml';
      }else
      {
         $archivos[0] = $cliente_retencion[0]['autorizacion'].'.pdf';
         $archivos[1] = $cliente_retencion[0]['autorizacion'].'.xml';
      }
    }
    $HTML = true;
      // print_r('ddd');die();
    $res =  $this->mail->enviar_email($emp,$to_correo,$cuerpo_correo,$titulo_correo,$correo_respaldo=false,$archivos,$nombre,$HTML);
    if($res==1)
    {
      return 1;
    }else
    {
      return -1;
    }
  }

  function eliminar_retencion($id)
  	{
  		$empresa = $_SESSION['INICIO']['ID_EMPRESA'];
  		$this->modelo->delete_impuestos($id,$serie=false,$retencion=false);
  		return $this->modelo->delete_retencion($id);
  	}


  	function anular_retencion($id)
  	{
  		$datos[0]['campo'] = 'estadoRet';
  		$datos[0]['dato'] = 'AN';

  		$datosw[0]['campo'] = 'id_retenciones';  		
  		$datosw[0]['dato'] = $id;

  		// print_r($id);die();
  		return $this->modelo->update('retenciones',$datos,$datosw);
  	}



}
?>