<?php 
include('../modelo/nota_CreditoM.php');
include('../comprobantes/SRI/autorizar_sri.php');
include('../modelo/loginM.php');
include(dirname(__DIR__,1).'/lib/Reporte_pdf.php');
/**
 * 
 */
$controlador = new nota_CreditoC();

if(isset($_GET['add_articulo']))
{
  // print_r($_POST);die();
    $parametros = $_POST;
    echo json_encode($controlador->add_articulos($parametros));
}

if(isset($_GET['datos_nota_credito']))
{
  // print_r($_POST);die();
    $parametros = $_POST['id'];
    echo json_encode($controlador->datos_nota_credito($parametros));
}
if(isset($_GET['lineas_nota_credito']))
{
  // print_r($_POST);die();
    $parametros = $_POST['id'];
    echo json_encode($controlador->lineas_nota_credito($parametros));
}
if(isset($_GET['eliminar_linea']))
{
  // print_r($_POST);die();
    $parametros = $_POST['id'];
    echo json_encode($controlador->eliminar_linea($parametros));
}
if(isset($_GET['eliminar_nota']))
{
  // print_r($_POST);die();
    $parametros = $_POST['id'];
    echo json_encode($controlador->eliminar_nota($parametros));
}
if(isset($_GET['anular_nota']))
{
  // print_r($_POST);die();
    $parametros = $_POST['id'];
    echo json_encode($controlador->anular_nota($parametros));
}
if(isset($_GET['autorizar_nc']))
{
  // print_r($_POST);die();
    $parametros = $_POST;
    echo json_encode($controlador->autorizar($parametros));
}
if(isset($_GET['lista_nota_credito']))
{
  // print_r($_POST);die();
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->lista_nota_credito($parametros));
}
if(isset($_GET['reporte_nota']))
{   
  $parametros = $_GET;
  echo json_encode($controlador->reporte_nota($parametros));
}




class nota_CreditoC
{
	private $modelo;
	private $login;
	private $sri;	
	private $pdf;
	function __construct()
	{
		$this->modelo = new nota_CreditoM();
		$this->login = new loginM();
		$this->sri = new autorizacion_sri();
    $this->pdf = new Reporte_pdf(); 
	}


  function lista_nota_credito($parametros)
  {
  	$empresa = $_SESSION['INICIO']['ID_EMPRESA'];
    $result = $this->modelo->nota_venta($empresa,$id=false,$parametros['serie'],$parametros['numfac'],$auto_nc=false,$parametros['query'],$parametros['desde'],$parametros['hasta']);
    // print_r($result); die();
    $tr ='';
    foreach($result as $key => $value)
    {
      if(is_object($value['fecha_nc']))
      {
        $value['fecha_nc'] = $value['fecha_nc']->format('Y-m-d');
      }
      $tr.='<tr>
              <td>';
               $tr.='<a class="btn-sm btn btn-primary" href="../controlador/nota_CreditoC.php?reporte_nota=true&empresa='.$_SESSION['INICIO']['ID_EMPRESA'].'&id='.$value['id_nota_credito'].'&usu='.$_SESSION['INICIO']['ID_USUARIO'].'" target="_blank"><i class="fa fa-eye" title="Ver Nota Credito"></i></a>';

              if($value['estado']=='P' || $value['estado']=='')
                {
                  $tr.='<button class="btn-sm btn btn-danger" onclick="eliminar_nota('.$value['id_nota_credito'].')"><i class="fa fa-trash" title="Eliminar"></i></button><button class="btn-sm btn btn-info" onclick="autorizar('.$value['id_nota_credito'].')"><i class="fa fa-paper-plane" title="Autorizar"></i></button>';
                }
                               
                if($value['estado']=='R')
                {
                  $tr.='<button class="btn-sm btn btn-warning" onclick="modal_error_seri(\''.$value['autorizacion_nc'].'\',\'NOTAS_CREDITO\')"><i class="fa fa-exclamation-triangle" title="Descargar xml"></i></button>';
                }
                if($value['estado']=='A')
                {
                  $tr.='<button class="btn-sm btn btn-secondary" onclick="anular_nota(\''.$value['id_nota_credito'].'\',\'NOTAS_CREDITO\')"><i class="fa fa-times-circle" title="Anular"></i></button>';
                }
                
                
              $tr.='</td>
              <td><a href="#" onclick="cargar_detalle(\''.$value['id_nota_credito'].'\',\''.$value['estado'].'\')">'.$value['nombre'].'</a></td>
              <td>'.$value['fecha_nc'].'</td>
              <td>'.$value['numero_nc'].'</td>
              <td>'.$value['serie_nc'].'</td>';

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
		$idnota = $parametros['txt_nota'];
	    if($parametros['txt_nota']=='')
	    {
	    	$codigo = 'NC_SERIE_'.str_replace('-','',$parametros['serie']);
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


	    	$datosN[0]['campo'] = 'numero_nc'; 	    	
	    	$datosN[0]['dato'] =$numero;
	    	$datosN[1]['campo'] = 'fecha_nc';	    	
	    	$datosN[1]['dato'] =$parametros['txt_fecha'];
	    	$datosN[2]['campo'] = 'serie_nc';	    	
	    	$datosN[2]['dato'] =$parametros['serie'];
	    	$datosN[3]['campo'] = 'cliente';	    	
	    	$datosN[3]['dato'] =$parametros['ddl_cliente'];
	    	$datosN[4]['campo'] = 'autorizacion_nc';	    	
	    	$datosN[4]['dato'] =$parametros['autorizacion'];
	    	$datosN[5]['campo'] = 'fecha_doc';	    	
	    	$datosN[5]['dato'] = $parametros['txt_fecha_doc'];
	    	$datosN[6]['campo'] = 'serie_doc';	    	
	    	$datosN[6]['dato'] = $parametros['txt_estab'].'-'.$parametros['txt_punto'];
	    	$datosN[7]['campo'] = 'numero_doc';	    	
	    	$datosN[7]['dato'] = $parametros['txt_num_doc'];
	    	$datosN[8]['campo'] = 'autorizacion_doc';	    	
	    	$datosN[8]['dato'] = $parametros['txt_autorizacion_doc'];
	    	$datosN[9]['campo'] = 'motivo';	    	
	    	$datosN[9]['dato'] = $parametros['txt_motivo'];
	    	$datosN[10]['campo'] = 'empresa';	    	
	    	$datosN[10]['dato'] = $_SESSION['INICIO']['ID_EMPRESA'];
	    	$datosN[11]['campo'] = 'estado';	    	
	    	$datosN[11]['dato'] = 'P';
	    	$datosN[12]['campo'] = 'porc_iva';	    	
	    	$datosN[12]['dato'] = ($_SESSION['INICIO']['IVA']/100);

	    	$this->modelo->add('nota_credito',$datosN,$_SESSION['INICIO']['ID_EMPRESA']);
	    	$nota_credito = $this->modelo->nota_venta($_SESSION['INICIO']['ID_EMPRESA'],$id=false,$serie_nc = $parametros['serie'],$numero,$parametros['autorizacion']);
	    	$idnota = $nota_credito[0]['id_nota_credito'];
	    }else
	    {
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
	    	$where[0]['dato'] = $idnota;

	    	$this->modelo->update('nota_credito',$datosN,$where,$_SESSION['INICIO']['ID_EMPRESA']);
	    	
	    }

	    // $datosA = $this->modelo->articulos_id($parametros['id'],$_SESSION['INICIO']['ID_EMPRESA']);

	    $datos[0]['campo'] = 'detalle';
	    $datos[0]['dato'] = $parametros['txt_articulo']; //$datosA[0]['nombre'];
	    $datos[1]['campo'] = 'cantidad';
	    $datos[1]['dato'] = $parametros['txt_can'];
	    $datos[2]['campo'] = 'pvp';
	    $datos[2]['dato'] = $parametros['txt_pvp'];
	    $datos[3]['campo'] = 'subtotal';
	    $datos[3]['dato'] = number_format($parametros['txt_can']*$parametros['txt_pvp'],2,'.','');
	    $datos[4]['campo'] = 'nota_credito';
	    $datos[4]['dato'] = $idnota;
	    $datos[5]['campo'] = 'descuento';
	    $datos[5]['dato'] = number_format((($parametros['txt_sub']*$parametros['txt_dcto'])/100),2,'.','');
	    $datos[6]['campo'] = 'iva';
	    $datos[6]['dato'] = number_format(floatval($parametros['txt_iva']),2,'.','');
	    $datos[7]['campo'] = 'total';
	    $datos[7]['dato'] = number_format(floatval($parametros['txt_total']),2,'.','');
	    $datos[8]['campo'] = 'porc_descuento';
	    $datos[8]['dato'] = $parametros['txt_dcto'];
	    $datos[9]['campo'] = 'referencia';
	    $datos[9]['dato'] = $parametros['txt_codigo'];    
	    $datos[10]['campo'] = 'serie';
	    $datos[10]['dato'] = $parametros['serie'];
	    if($parametros['txt_iva']!=0){   
	      $datos[11]['campo'] = 'porc_iva';
	      $datos[11]['dato'] = ($_SESSION['INICIO']['IVA']/100);
	    }else
	    {
	      $datos[12]['campo'] = 'porc_iva';
	      $datos[12]['dato'] = 0;
	    }

	    $res = $this->modelo->add('lineas_nota_credito',$datos,$_SESSION['INICIO']['ID_EMPRESA']);

	    return array('respuesta'=>$res,'id'=>$idnota);

  	}

  	function datos_nota_credito($id)
  	{
  		$empresa = $_SESSION['INICIO']['ID_EMPRESA'];
  		return $this->modelo->nota_venta($empresa,$id,$serie_nc = false,$numero_nc=false,$auto_nc=false);
  	}

  	function lineas_nota_credito($id)
  	{
  		$empresa = $_SESSION['INICIO']['ID_EMPRESA'];
  		$nota_credito = $this->modelo->nota_venta($empresa,$id,$serie_nc = false,$numero_nc=false,$auto_nc=false,$cliente=false,$desde=false,$hasta=false);

  		$datos =  $this->modelo->linea_nota_venta($id,$empresa);
  		$tr = '';
  		$dscto = 0; $iva = 0; $sub = 0 ; $total = 0;
  		foreach ($datos as $key => $value) {
  			$dscto+=number_format($value['descuento'],2,'.',''); 
  			$iva+= number_format($value['iva'],2,'.','') ; 
  			$sub+=number_format($value['subtotal'],2,'.',''); 
  			$total+=number_format($value['total'],2,'.','');
  			$tr.='<tr>
  			<td>';
  			if($nota_credito[0]['estado']!='A' && $nota_credito[0]['estado']!='AN')
  			{
  				$tr.='<button type="button" class="btn btn-sm btn-danger" onclick="eliminar_linea(\''.$value['id_nota_credito_linea'].'\')"><i class="fa fa-trash"></i></button>';
  			}
  			$tr.='</td>
  			<td>'.$value['referencia'].'</td>
  			<td>'.$value['detalle'].'</td>
  			<td>'.$value['cantidad'].'</td>
  			<td>'.$value['pvp'].'</td>
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
  	function eliminar_nota($id)
  	{
  		$empresa = $_SESSION['INICIO']['ID_EMPRESA'];
  		$this->modelo->eliminar_linea_nota($id,$empresa);
  		return $this->modelo->eliminar_nota($id,$empresa);
  	}


  	function anular_nota($id)
  	{
  		$empresa = $_SESSION['INICIO']['ID_EMPRESA'];
  		$datos[0]['campo'] = 'estado';
  		$datos[0]['dato'] = 'AN';


  		$datosw[0]['campo'] = 'id_nota_credito';  		
  		$datosw[0]['dato'] = $id;

  		// print_r($id);die();
  		return $this->modelo->update('nota_credito',$datos,$datosw,$empresa);
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
    	if(strlen($parametros['txt_ci'])==13)
    	{
    		$datosC[3]['campo'] = 'TD';
    		$datosC[3]['dato'] = 'R';
    	}else if(strlen($parametros['txt_ci'])==10)
    	{
    		$datosC[3]['campo'] = 'TD';
    		$datosC[3]['dato'] = 'C';
    	}

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
}
?>