<?php
include('../modelo/facturacionM.php');
include('../comprobantes/SRI/autorizar_sri.php');
include('../modelo/loginM.php');
include(dirname(__DIR__,1).'/lib/phpmailer/enviar_emails.php');
include(dirname(__DIR__,1).'/lib/Reporte_pdf.php');
/**
 * 
 */
$controlador = new facturacion();

if(isset($_GET['generar_factura']))
{
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->session($parametros));
}

if(isset($_GET['lista_facturas']))
{
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->lista_facturas($parametros));
}
if(isset($_GET['lineas_facturas']))
{
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->lineas_facturas($parametros));
}
if(isset($_GET['cliente_factura']))
{
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->cliente_factura($parametros));
}
if(isset($_GET['buscar_articulo']))
{
  // print_r($_POST);die();
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->articulos($parametros));
}
if(isset($_GET['add_articulo']))
{
  // print_r($_POST);die();
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->add_articulos($parametros));
}
if(isset($_GET['editar_linea']))
{
  // print_r($_POST);die();
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->editar_linea($parametros));
}
if(isset($_GET['cargar_linea']))
{
  // print_r($_POST);die();
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->cargar_linea($parametros));
}
if(isset($_GET['delete_linea']))
{
  // print_r($_POST);die();
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->delete_linea($parametros));
}
if(isset($_GET['facturar']))
{
  // print_r($_POST);die();
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->facturar($parametros));
}
if(isset($_GET['autorizar_guia']))
{
  // print_r($_POST);die();
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->autorizar_guia($parametros));
}
if(isset($_GET['editar_cliente']))
{
  $parametros = $_POST['parametros'];
  echo json_encode($controlador->editar_cliente($parametros));
}

if(isset($_GET['nueva_factura']))
{
  $parametros = $_POST['parametros'];
  echo json_encode($controlador->nueva_factura($parametros));
}
if(isset($_GET['categorias']))
{   
  $parametros = $_POST['parametros'];
  echo json_encode($controlador->categorias($parametros));
}

if(isset($_GET['enviar_email']))
{   
  $parametros = $_POST['parametros'];
  echo json_encode($controlador->enviar_email($parametros));
}

if(isset($_GET['enviar_email_detalle']))
{   
  $parametros = $_POST;
  $file = $_FILES;
  echo json_encode($controlador->enviar_email_detalle($parametros,$file));
}

if(isset($_GET['reporte_factura']))
{   
  $parametros = $_GET;
  echo json_encode($controlador->reporte_factura($parametros));
}
if(isset($_GET['reporte_liquidacion']))
{   
  $parametros = $_GET;
  echo json_encode($controlador->reporte_liquidacion($parametros));
}


if(isset($_GET['DCCiudadF']))
{
   //$parametros = $_POST['parametros'];
   $query = '';
   if(isset($_GET['q']))
   {
      $query = $_GET['q'];
   }
   echo json_encode($controlador->DCCiudad($query));
}

if(isset($_GET['DCCiudadI']))
{
   //$parametros = $_POST['parametros'];
   $query = '';
   if(isset($_GET['q']))
   {
      $query = $_GET['q'];
   }
   echo json_encode($controlador->DCCiudad($query));
}

if(isset($_GET['DCRazonSocial']))
{
   //$parametros = $_POST['parametros'];
   $query = '';
   if(isset($_GET['q']))
   {
      $query = $_GET['q'];
   }
   echo json_encode($controlador->AdoPersonas($query));
}

if(isset($_GET['DCEmpresaEntrega']))
{
   //$parametros = $_POST['parametros'];
   $query = '';
   if(isset($_GET['q']))
   {
      $query = $_GET['q'];
   }
   echo json_encode($controlador->AdoPersonas($query));
}

if(isset($_GET['detalle_guia']))
{
   $parametros = $_POST['parametros'];  
   echo json_encode($controlador->detalle_guia($parametros));
}



if(isset($_GET['guardar_guia']))
{
    $datos = $_POST;  
   echo json_encode($controlador->add_guia($datos));
}


if(isset($_GET['numero_guia']))
{   
  echo json_encode($controlador->numero_guia());
}



class facturacion
{
	private $modelo;
  private $sri;
  private $login;

	function __construct()
	{
		$this->modelo = new facturacionM();
    $this->sri = new autorizacion_sri();
    $this->mail = new enviar_emails();
    $this->pdf = new Reporte_pdf(); 
    $this->login = new loginM();
	}
	

function session($parametros)
  {
    $result = $this->modelo->usuario_exist($parametros);
    return $result;
  }

  function lista_facturas($parametros)
  {
    $query = $parametros['query'];
    $empresa = $parametros['empresa'];
    $result = $this->modelo->lista_facturas($query,$empresa);
    $tr ='';
    foreach($result as $key => $value)
    {
      if(is_object($value['fecha']))
      {
        $value['fecha'] = $value['fecha']->format('Y-m-d');
      }
      if($value['estado_factura']=='A')
      {
        // $tr.='<tr onclick="cargar_detalle(\''.$value['id'].'\',\''.$value['estado_factura'].'\')" class="table-success"><th width="50px">'.$value['num'].'</th><td width="100px">'.$value['fecha'].'</td><td>'.$value['nombre'].'</td></tr>';


        $tr.=' <div class="col-xl-3 col-md-6 mb-4" onclick="cargar_detalle(\''.$value['id'].'\',\''.$value['estado_factura'].'\')">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">'.$value['nombre'].'</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$'.number_format($value['total'],2,'.','').'</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> AUTORIZADO</span>
                        <span>'.$value['fecha'].'</span>
                      </div>
                    </div>
                    <div class="col-auto">
                    '.$value['num'].'
                      <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>';





      }else if($value['estado_factura']=='R')
      {
        // $tr.='<tr onclick="cargar_detalle(\''.$value['id'].'\',\''.$value['estado_factura'].'\')" class="table-danger"><th width="50px">'.$value['num'].'</th><td width="100px">'.$value['fecha'].'</td><td>'.$value['nombre'].'</td></tr>';

        $tr.=' <div class="col-xl-3 col-md-6 mb-4" onclick="cargar_detalle(\''.$value['id'].'\',\''.$value['estado_factura'].'\')">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">'.$value['nombre'].'</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$'.number_format($value['total'],2,'.','').'</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-danger mr-2"><i class="fa fa-arrow-up"></i> RECHAZADA</span>
                        <span>'.$value['fecha'].'</span>
                      </div>
                    </div>
                    <div class="col-auto">
                    '.$value['num'].'
                      <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>';
      }else
      {
        // $tr.='<tr onclick="cargar_detalle(\''.$value['id'].'\',\''.$value['estado_factura'].'\')" class=""><th width="50px">'.$value['num'].'</th><td width="100px">'.$value['fecha'].'</td><td>'.$value['nombre'].'</td></tr>'; 

        $tr.=' <div class="col-xl-3 col-md-6 mb-4" onclick="cargar_detalle(\''.$value['id'].'\',\''.$value['estado_factura'].'\')">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">'.$value['nombre'].'</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$'.number_format($value['total'],2,'.','').'</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-primary mr-2"><i class="fa fa-arrow-up"></i> PENDIENTE</span>
                        <span>'.$value['fecha'].'</span>
                      </div>
                    </div>
                    <div class="col-auto">
                    '.$value['num'].'
                      <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>';
      }
    }
    return $tr;
  }

  function lineas_facturas($parametros)
  {
    $query = $parametros['fac'];
    $id_empresa = $parametros['idEmp'];
    $result = $this->modelo->linea_facturas($query,$id_empresa);
    $estado_fac = $this->modelo->cliente_factura($query,$id_empresa);

    $tr ='';
    $total = 0;
    $iva = 0; 
    $sub = 0;
    $des = 0;
    $sin_iva =0;
    $con_iva=0 ;
    $lineas = '';
    foreach($result as $key => $value)
    {
      $editar = '';
      if($estado_fac[0]['estado_factura']!='A')
      {
        $editar = ' onclick="editar(\''.$value['id_lineas'].'\')" ';
      }
       $lineas.='<tr onclick="opciones(\''.$value['id_lineas'].'\')">
                    <td>'.$value['cantidad'].'</td> 
                    <td>'.$value['producto'].'</td> 
                    <td>$'.number_format($value['precio_uni'],2).'</td> 
                    <td>'.$value['total'].'</td> 
                </tr>';
      // $lineas.= '<div class="card shadow mb-12m col-sm-12">
                   
      //               <!-- Card Body -->
      //               <div class="card-body" style="padding: 0px 0px 0px 0px;">
      //                   <div class="row no-gutters align-items-center">
      //                       <div class="col mr-2">
      //                           <img src="ruta_img/'.$value['foto'].'">
      //                       </div>
      //                       <div class="col mr-2" '.$editar.' >
      //                           <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
      //                              '.$value['producto'].'</div>
      //                           <div class="h5 mb-0 font-weight-bold text-gray-800">$'.number_format($value['precio_uni'],2).'</div>';
      //                           if($value['iva']>0)
      //                           {
      //                           $lineas.='<div class="text-xs font-weight-bold text-danger">iva: '.number_format($value['iva'],2).'</div>';
      //                           }
                                
      //                       $lineas.='</div>
      //                       <div class="col-auto col-1">
      //                          '.$value['cantidad'].'
      //                       </div>                            
      //                       <div class="col-auto">';
      //                       if($estado_fac[0]['estado_factura']!='A')
      //                       {
      //                        $lineas.='<button class="btn btn-danger btn-sm" onclick="eliminar(\''.$value['id_lineas'].'\')"><i class="fas fa-trash"></i></button>';
      //                       }
      //                     $lineas.='</div>
      //                   </div>                                   
      //               </div>
      //           </div>';

        // $tr.='<tr onmousedown="opciones(\''.$value['id_lineas'].'\')">
        // <td width="50px">'.$value['cantidad'].'</td>
        // <td>'.$value['producto'].'</td>
        // <td width="55px">'.$value['precio_uni'].'</td>
        // <td width="55px">'.$value['total'].'</td>
        // </tr>';
        
        $total+=$value['total'];
        if($value['iva']==0)
        {
          $sin_iva +=$value['subtotal'];

        }else
        {
          $con_iva +=$value['subtotal'];

        }
        $iva +=$value['iva'];
        $des+= $value['descuento'];
        $sub+=$value['subtotal'];
    }
    $iva = number_format($iva,2);
    $tota= number_format($total,2);
    $sub = number_format($sub,2);
    $des = number_format($des,2);

    $datos[0]['campo'] = 'subtotal';
    $datos[0]['dato'] = $sub;
    $datos[1]['campo'] = 'descuento';
    $datos[1]['dato'] = $des;
    $datos[2]['campo'] = 'iva';
    $datos[2]['dato'] = $iva;
    $datos[3]['campo'] = 'total';
    $datos[3]['dato'] = $tota;

      $datos[4]['campo'] = 'Sin_Iva';
      $datos[4]['dato'] = $sin_iva;   
      $datos[5]['campo'] = 'Con_Iva';
      $datos[5]['dato'] =  $con_iva;

    
    
    

    $where[0]['campo'] = 'id_factura';
    $where[0]['dato'] = $query;

    $this->modelo->update('facturas',$datos,$where,$id_empresa);
    $dat = array('tr'=>$lineas,'total'=>$tota,'sub'=>$sub,'iva'=>$iva,'des'=>$des);
    return $dat;
  }

  function articulos($parametros)
  {
    $datos = $this->modelo->articulos($parametros['query'],$parametros['empresa'],$parametros['cate']);
    $arti = '';
    foreach ($datos as $key => $value) {

      $arti.='
      <div class="col-xl-3 col-md-6 mb-2" onclick="add_articulo(\''.$value['id'].'\',\''.number_format($value['precio_uni'],2,'.','').'\',\''.$value['iva'].'\')">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1" id="lbl_art_'.$value['id'].'">'.$value['nombre'].'</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">$'.number_format($value['precio_uni'],2,'.','').'</div>
                      <div class="mt-2 mb-0 text-muted text-xs">';
                       if($value['iva']==1)
                        {
                         $arti.='<span class="text-danger mr-2"> lleva iva</span>';
                        }               
                        $arti.='
                      </div>
                    </div>
                    <div class="col-auto">
                    <i class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img class="img-profile rounded-circle" src="ruta_img/'.$value['foto'].'" style="max-width: 60px">
                          <span class="ml-2 d-none d-lg-inline text-white small">Maman Ketoprak</span>
                        </a>              
                      </i>
                      ';
                      $arti.='</i>
                    </div>
                  </div>
                </div>
              </div>
            </div>';

      // $arti.='<div class="card shadow mb-12m col-sm-12">                   
      //               <!-- Card Body -->
      //               <div class="card-body" style="padding: 0px;">
      //                   <div class="row no-gutters align-items-center">
      //                       <div class="col mr-2">
      //                           <img src="ruta_img/'.$value['foto'].'">
      //                       </div>
      //                       <div class="col mr-2">
      //                           <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
      //                              '.$value['nombre'].'</div>
      //                           <div class="h5 mb-0 font-weight-bold text-gray-800" id="txt_pre_'.$value['id'].'">$'.number_format($value['precio_uni'],2).'</div>';
      //                           if($value['iva']==1)
      //                           {
      //                            $arti.='<div class="text-xs font-weight-bold text-danger">lleva iva</div>';
      //                           }
      //                       $arti.='</div>
      //                       <div class="col-2" style="margin-right: 5px">
      //                         <input type="number" name="txt_cant_'.$value['id'].'" id="txt_cant_'.$value['id'].'" value="1" class="form-control form-control-sm">
      //                       </div>                            
      //                       <div class="col-auto">
      //                           <button class="btn btn-primary btn-sm" onclick="add(\''.$value['id'].'\')"><i class="fas fa-cart-plus"></i></button>
      //                       </div>
      //                   </div>                                   
      //               </div>
      //           </div>';
    }
     // $d[] = array('value'=>$value['id_productos'],'label'=>$value['nombre'],'precio'=>number_format($value['precio_uni'],2),'iva'=>$value['iva'],'ref'=>$value['referencia']);
    return $arti;
  }

  function add_articulos($parametros)
  {
    $datosA = $this->modelo->articulos_id($parametros['id'],$parametros['empresa']);

    $datos[0]['campo'] = 'producto';
    $datos[0]['dato'] = $datosA[0]['nombre'];
    $datos[1]['campo'] = 'cantidad';
    $datos[1]['dato'] = $parametros['cant'];
    $datos[2]['campo'] = 'precio_uni';
    $datos[2]['dato'] = $datosA[0]['precio_uni'];
    $datos[3]['campo'] = 'subtotal';
    $datos[3]['dato'] = number_format($parametros['cant']* $datosA[0]['precio_uni'],2);
    $datos[4]['campo'] = 'id_factura';
    $datos[4]['dato'] = $parametros['fac'];
    $datos[5]['campo'] = 'descuento';
    $datos[5]['dato'] =  number_format($parametros['des'],2,'.','');
    $datos[6]['campo'] = 'iva';
    $datos[6]['dato'] = number_format(floatval($datos[3]['dato'])*floatval((floatval($parametros['iva'])/100)),2);
    $datos[7]['campo'] = 'total';
    $datos[7]['dato'] = number_format(floatval($datos[3]['dato'])+ floatval($datos[6]['dato']),2);
    $datos[8]['campo'] = 'porc_descuento';
    $datos[8]['dato'] =  number_format($parametros['por'],2,'.','');
    $datos[9]['campo'] = 'referencia';
    $datos[9]['dato'] = $datosA[0]['referencia'];
    if($parametros['iva']!=0){   
    $datos[10]['campo'] = 'porc_iva';
    $datos[10]['dato'] = ($parametros['iva']/100);
    }

   return  $this->modelo->add('lineas_factura',$datos,$parametros['empresa']);

  }

  function editar_linea($parametros)
  {
    // print_r($parametros);die();
    $datos[0]['campo'] = 'precio_uni';
    $datos[0]['dato'] = $parametros['pre'];
    $datos[1]['campo'] = 'cantidad';
    $datos[1]['dato'] = $parametros['cant'];
    $datos[2]['campo'] = 'total';
    $datos[2]['dato'] = number_format($parametros['tot'],2);    
    $datos[3]['campo'] = 'descuento';
    $datos[3]['dato'] = $parametros['vald'];
    $datos[4]['campo'] = 'iva';
    $datos[4]['dato'] = $parametros['iva'];
    $datos[5]['campo'] = 'subtotal';
    $datos[5]['dato'] = $parametros['sub'];
    $datos[6]['campo'] = 'porc_descuento';
    $datos[6]['dato'] = $parametros['pord'];
    $datos[10]['campo'] = 'porc_iva';
    $datos[10]['dato'] = 0;
    if($parametros['iva']!=0){   
      $datos[10]['campo'] = 'porc_iva';
      $datos[10]['dato'] = number_format($parametros['p_iva']/100,2);
      }

    $where[0]['campo']='id_lineas';
    $where[0]['dato']=$parametros['id'];
   return  $this->modelo->update('lineas_factura',$datos,$where,$parametros['idEmp']);

  }
  function cargar_linea($parametros)
  {
    // print_r($parametros);die();
    return $this->modelo->linea_detalle($parametros['id'],$parametros['idEmp']);
  }

  function delete_linea($parametros)
  {
    // print_r($parametros);die();
    $datos[0]['campo']='id_lineas';
    $datos[0]['dato']=$parametros['id'];
    return $this->modelo->delete('lineas_factura',$datos,$parametros['idEmp']);
  }
  function facturar($parametros)
  {
    $datos[0]['campo'] = 'Tipo_pago';
    $datos[0]['dato'] = $parametros['tipopago'];
    $datos[1]['campo'] = 'fecha';
    $datos[1]['dato'] = $parametros['fecha'];
    $datos[2]['campo'] = 'datos_adicionales';
    $datos[2]['dato'] = $parametros['adicionales'];

    $where[0]['campo'] = 'id_factura';
    $where[0]['dato'] = $parametros['fac'];
    $id_empresa = $_SESSION['INICIO']['ID_EMPRESA'];
    // print_r($datos);die();
    if(isset($parametros['tc']) && $parametros['tc']=='LC')
    {
      $this->modelo->update('liquidacion_compras',$datos,$where,$id_empresa);
    }else
    {
      $this->modelo->update('facturas',$datos,$where,$id_empresa);      
    }

    // print_r('ssss');die();
    if($_SESSION['INICIO']['F_Electronica']==1)
    {
      $resp =  $this->sri->Autorizar_factura_o_liquidacion($parametros);

      // $resp = json_decode($resp,true);         
      // print_r($resp);die();
      return $resp;
    }else
    {
      return array('0'=>4);
    }
  }

  function autorizar_guia($parametros)
  {
   
    if($_SESSION['INICIO']['F_Electronica']==1)
    {
      return  $this->sri->Autorizar_guia_remision($parametros);
    }else
    {
      return array('respuesta'=>4);
    }
  }

  function cliente_factura($parametros)
  {
    // print_r($parametros);die();
    return $this->modelo->cliente_factura($parametros['fac'],$parametros['idEmp']);
  }

  function editar_cliente($parametros)
  {
    //print_r($parametros);die();
    $datos[0]['campo'] = 'nombre';
    $datos[0]['dato'] = $parametros['nom'];
    $datos[1]['campo'] = 'telefono';
    $datos[1]['dato'] = $parametros['tel'];
    $datos[2]['campo'] ='mail' ;
    $datos[2]['dato'] = $parametros['ema'];
    $datos[3]['campo'] = 'direccion';
    $datos[3]['dato'] = $parametros['dir'];
    $datos[4]['campo'] = 'ci_ruc';
    $datos[4]['dato'] =$parametros['ci'];

  
    $where[0]['campo'] = 'id_cliente';
    $where[0]['dato']= $parametros['id'];
   
    return $this->modelo->update('cliente',$datos,$where,$parametros['idEmp']);
   

  }

  function nueva_factura($parametros)
  {
    $numero = $this->modelo->numero_factura($parametros['empresa']);
    $new_num = $numero+1;
    $datos[0]['campo']='id_empresa';
    $datos[0]['dato']=$parametros['empresa'];
    $datos[1]['campo']='id_cliente';
    $datos[1]['dato']=$parametros['cliente'];
    $datos[2]['campo']='id_usuario';
    $datos[2]['dato']=$parametros['usuario'];
    $datos[3]['campo']='serie';
    $datos[3]['dato']=$parametros['serie'];    
    $datos[4]['campo']='num_factura';
    $datos[4]['dato']=$new_num;   
    $datos[5]['campo']='fecha';
    $datos[5]['dato']=date('Y-m-d');    
    $datos[6]['campo']='Porc_IVA';
    $datos[6]['dato']='0.12';
    $datos[7]['campo']='Autorizacion';
    $datos[7]['dato']='123456789123456789123456789'.$new_num;

    // print_r($datos);die();

    $this->modelo->add('facturas',$datos,$parametros['empresa']);
    $FA = $this->modelo->buscar_facturas($parametros['empresa'],$new_num);
    return $FA;
        
  }
  function categorias($parametros)
  {
    $datos = $this->modelo->categorias($parametros['empresa']);
    $op = ' <option value="">Seleccione categoria</option>';
    foreach ($datos as $key => $value) {
      $op.=' <option value="'.$value['id'].'">'.$value['nombre'].'</option>';
    }
    return $op;
  }

  function enviar_email($parametros)
  {
    // print_r($parametros);die();
    $emp = $this->modelo->datos_empresa($parametros['empresa']);
    $cliente_factura = $this->modelo->cliente_factura($parametros['fac'],$parametros['empresa']);
    $tipo_pago = $this->modelo->DCTipoPago($id=false,$cliente_factura[0]['Tipo_pago'],$descripcion=false);
    $cliente_factura[0]['tipo_pago_des'] = $tipo_pago[0]['CTipoPago'];
    $nombre = $emp[0]['email'];
    $to_correo = $cliente_factura[0]['mail'];
    $cuerpo_correo = '<b>Comprobante electronico</b>';
    $titulo_correo = 'Comprobante electronico';
    $correo_respaldo = 'example@example.com';
    $archivos[0] = $cliente_factura[0]['Autorizacion'].'.pdf';
    $HTML = true;

    $empresa = $this->modelo->datos_empresa_sucursal_usuario($parametros['usu'],$parametros['empresa']);
    // print_r($cliente_factura[0]['Autorizacion']);die();
    $lineas = $this->modelo->linea_facturas_all($parametros['fac'],$parametros['empresa']);
    $this->pdf->factura_pdf($cliente_factura,$lineas,$empresa,false,$descargar=false);


   return $this->mail->enviar_email($emp,$to_correo,$cuerpo_correo,$titulo_correo,$correo_respaldo,$archivos,$nombre,$HTML);
  }

  function reporte_factura($parametros)
  {
    $empresa = $this->modelo->datos_empresa_sucursal_usuario($parametros['usu'],$parametros['empresa']);
    $cliente_factura = $this->modelo->cliente_factura($parametros['fac'],$parametros['empresa']);
    $lineas = $this->modelo->linea_facturas_all($parametros['fac'],$parametros['empresa']);
    $rimpe = $this->sri->tipo_contribuyente($empresa[0]['RUC']);
    if($cliente_factura[0]['Tipo_pago']=='.' || $cliente_factura[0]['Tipo_pago']=='')
    {
      $cliente_factura[0]['Tipo_pago'] = $parametros['pago'];
    }
    $tipo_pago = $this->modelo->DCTipoPago($id=false,$cliente_factura[0]['Tipo_pago'],$descripcion=false);
    $guia = 0;
    $guia_remision = $this->modelo->guia_remision_x_factura($parametros['fac']);
    if(count($guia_remision)>0)
    {
      $guia = 1;
    }

    // print_r($tipo_pago);die();
    $cliente_factura[0]['tipo_pago_des'] = $tipo_pago[0]['CTipoPago'];
    $cliente_factura[0]['Guia_Remision'] = $guia;
    $cliente_factura[0]['TC'] = 'FA';
    // print_r($rimpe);die();
    $doc =  $this->pdf->factura_pdf($cliente_factura,$lineas,$empresa,$rimpe,true,false);
    // print_r($doc);die();
    return $doc;
  }

  function reporte_liquidacion($parametros)
  {
    $empresa = $this->modelo->datos_empresa_sucursal_usuario($parametros['usu'],$parametros['empresa']);
    $cliente_factura = $this->modelo->cliente_liquidacion($parametros['fac'],$parametros['empresa']);
    $lineas = $this->modelo->linea_liquidacion_all($parametros['fac'],$parametros['empresa']);
    $rimpe = $this->sri->tipo_contribuyente($empresa[0]['RUC']);
    if($cliente_factura[0]['Tipo_pago']=='.' || $cliente_factura[0]['Tipo_pago']=='')
    {
      $cliente_factura[0]['Tipo_pago'] = $parametros['pago'];
    }
    $tipo_pago = $this->modelo->DCTipoPago($id=false,$cliente_factura[0]['Tipo_pago'],$descripcion=false);
    $guia = 0;
    // $guia_remision = $this->modelo->guia_remision_x_factura($parametros['fac']);
    // if(count($guia_remision)>0)
    // {
    //   $guia = 1;
    // }

    // print_r($tipo_pago);die();
    $cliente_factura[0]['tipo_pago_des'] = $tipo_pago[0]['CTipoPago'];
    $cliente_factura[0]['Guia_Remision'] = $guia;
    $cliente_factura[0]['TC'] = 'LC';
    // print_r($rimpe);die();
    $doc =  $this->pdf->factura_pdf($cliente_factura,$lineas,$empresa,$rimpe,true,false);
    // print_r($doc);die();
    return $doc;
  }


  

  function enviar_email_detalle($parametros,$file)
  {
    $ruta='../TEMP/';//ruta carpeta donde queremos copiar las imágenes
    if (!file_exists($ruta)) {
       mkdir($ruta, 0777, true);
    }
    $emp = $this->modelo->datos_empresa($_SESSION['INICIO']['ID_EMPRESA']);
    $cliente_factura = $this->modelo->cliente_factura($parametros['txt_fac_ema'],$_SESSION['INICIO']['ID_EMPRESA']);
    $lineas = $this->modelo->linea_facturas_all($parametros['txt_fac_ema'],$_SESSION['INICIO']['ID_EMPRESA']);
    $tipo_pago = $this->modelo->DCTipoPago($id=false,$cliente_factura[0]['Tipo_pago'],$descripcion=false);
    $cliente_factura[0]['tipo_pago_des'] = $tipo_pago[0]['CTipoPago'];
    //dd
    $nombre = $emp[0]['email'];
    $to_correo = substr($parametros['txt_to'],0,-1);
    $cuerpo_correo = $parametros['txt_texto'];
    $titulo_correo = 'Comprobante electronico';
    // $correo_respaldo = $emp[0]['email'];
    $archivos = array();
    //subir archivo de file
    $guia = 0;
    $guia_remision = $this->modelo->guia_remision_x_factura($cliente_factura[0]['num_factura']);
    if(count($guia_remision)>0)
    {
      $guia = 1;
    }

    $total_factura = 0;
    foreach ($lineas as $key => $value) {
      $total_factura+= number_format($value['total'],2,'.','');
    }

    // print_r($tipo_pago);die();
    $cliente_factura[0]['Guia_Remision'] = $guia;
    $cliente_factura[0]['TC'] = 'FA';

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

      $empresa = $this->modelo->datos_empresa_sucursal_usuario($_SESSION['INICIO']['ID_USUARIO'],$_SESSION['INICIO']['ID_EMPRESA']);
      $rimpe = $this->sri->tipo_contribuyente($empresa[0]['RUC']);
      $doc =  $this->pdf->factura_pdf($cliente_factura,$lineas,$empresa,$rimpe,false,false);
      $can = count($archivos);
      if($can>0)
      {
        $archivos[1] = $cliente_factura[0]['Autorizacion'].'.pdf';
        $archivos[2] = $cliente_factura[0]['Autorizacion'].'.xml';
      }else
      {
         $archivos[0] = $cliente_factura[0]['Autorizacion'].'.pdf';
         $archivos[1] = $cliente_factura[0]['Autorizacion'].'.xml';
      }
    }

     $cuerpo_correo = $this->html_de_correo($cliente_factura[0]['nombre'],$cliente_factura[0]['serie'].'-'.str_repeat('0',7).$cliente_factura[0]['num_factura'],$cliente_factura[0]['fecha'], $total_factura);
     // print_r($cuerpo_correo);die();
    $res =  $this->mail->enviar_email($emp,$to_correo,$cuerpo_correo,$titulo_correo,$correo_respaldo=false,$archivos,$nombre,$HTML=true);
    if($res==1)
    {
      return 1;
    }else
    {
      return -1;
    }
  }

  function numero_guia()
  {
      $serie = str_replace('-','',$_SESSION['INICIO']['SERIE']);
      $codigo = 'GR_SERIE_'.$serie;       
      $NoGR = $this->login->buscar_codigo_secuencial($codigo);
      if(count($NoGR)>1)
      {
        $numeroRet = $NoGR[0]['numero'];
      }else
      {
        $datos[0]['campo'] = 'numero';        
        $datos[0]['dato']  = 1;
        $datos[1]['campo'] = 'detalle_secuencial';        
        $datos[1]['dato']  = 'GR_SERIE_'.$serie;
        $datos[2]['campo'] = 'id_empresa';        
        $datos[2]['dato']  = $_SESSION['INICIO']['ID_EMPRESA'];
        $this->modelo->add('codigos_secuenciales',$datos,$_SESSION['INICIO']['ID_EMPRESA']);
        $numeroRet = 1;
      }

    return $numeroRet; 
  }

  function DCCiudad($query)
  { 
    $datos = $this->modelo->DCCiudad($query);
    $lista[] =array();
     foreach ($datos as $key => $value) {
          $lista[] = array('id'=>$value['Descripcion_Rubro'],'text'=>$value['Descripcion_Rubro']);
       }     
       return $lista;     
  }

  function AdoPersonas($query)
  {  
    $datos = $this->modelo->AdoPersonas($query);
    $lista[] =array();
     foreach ($datos as $key => $value) {
          $lista[] = array('id'=>$value['ci_ruc'],'text'=>$value['nombre']);
       }     
       return $lista;
     
  }

  function add_guia($parametros)
  {   

     //print_r($parametros);die();   
     $factura = $this->modelo->cliente_factura($parametros['fac'],$_SESSION['INICIO']['ID_EMPRESA']);

      $serie = str_replace('-','',$_SESSION['INICIO']['SERIE']);
      $codigo = 'GR_SERIE_'.$serie;       
      $NoRet = $this->login->buscar_codigo_secuencial($codigo);
      $numeroRet = $NoRet[0]['numero'];

      $datos[0]['campo'] = 'numero';        
      $datos[0]['dato']  = $NoRet[0]['numero']+1;
      $datos[1]['campo'] = 'id_empresa';        
      $datos[1]['dato']  = $_SESSION['INICIO']['ID_EMPRESA'];

      $where[0]['campo'] = 'id_secuenciales';
      $where[0]['dato'] = $NoRet[0]['id_secuenciales'];
      $this->modelo->update('codigos_secuenciales',$datos,$where,$_SESSION['INICIO']['ID_EMPRESA']);


     $datos[0]['campo'] = 'id_empresa';
     $datos[0]['dato'] = $_SESSION['INICIO']['ID_EMPRESA'];
     $datos[1]['campo'] = 'TC';
     $datos[1]['dato'] = 'FA';
     $datos[2]['campo'] = 'Serie';
     $datos[2]['dato'] = $factura[0]['serie'];
     $datos[3]['campo'] = 'Factura';
     $datos[3]['dato'] = $factura[0]['num_factura'];
     $datos[4]['campo'] = 'Autorizacion';
     $datos[4]['dato'] = $factura[0]['Autorizacion'];
     $datos[5]['campo'] = 'Fecha';
     $datos[5]['dato'] = $factura[0]['fecha'];
     $datos[6]['campo'] = 'id_cliente';
     $datos[6]['dato'] = $factura[0]['id_cliente'];
     $datos[7]['campo'] = 'Comercial';
     $datos[7]['dato'] = $parametros['RazonSocial'];
     $datos[8]['campo'] = 'CIRUC_comercial';
     $datos[8]['dato'] = $parametros['DCRazonSocial'];
     $datos[9]['campo'] = 'Entrega';
     $datos[9]['dato'] = $parametros['entrega'];
     $datos[10]['campo'] = 'CIRUC_Entrega';
     $datos[10]['dato'] = $parametros['DCEmpresaEntrega'];
     $datos[11]['campo'] = 'CiudadGRI';
     $datos[11]['dato'] = $parametros['DCCiudadI'];
     $datos[12]['campo'] = 'CiudadGRF'; 
     $datos[12]['dato'] = $parametros['DCCiudadF'];
     $datos[13]['campo'] = 'Placa_Vehiculo';
     $datos[13]['dato'] = $parametros['TxtPlaca'];
     $datos[14]['campo'] = 'FechaGRI';
     $datos[14]['dato'] = $parametros['MBoxFechaGRI'];
     $datos[15]['campo'] = 'FechaGRF';
     $datos[15]['dato'] = $parametros['MBoxFechaGRF'];
     $datos[16]['campo'] = 'Lugar_Entrega';
     $datos[16]['dato'] = $parametros['TxtLugarEntrega'];
     $datos[17]['campo'] = 'Pedido';
     $datos[17]['dato'] = $parametros['TxtPedido'];
     $datos[18]['campo'] = 'Serie_GR';
     $datos[18]['dato'] = $_SESSION['INICIO']['SERIE'];
     $datos[19]['campo'] = 'FechaGRE';
     $datos[19]['dato'] = $parametros['MBoxFechaGRE'];
     $datos[20]['campo'] = 'Zona';
     $datos[20]['dato'] = $parametros['TxtZona'];
     $datos[21]['campo'] = 'Remision';
     $datos[21]['dato'] = $numeroRet;

     return $this->modelo->add('guia_remision',$datos,$_SESSION['INICIO']['ID_EMPRESA']);
  }


  function detalle_guia($parametros)
  {
    $guia = $this->modelo->guia_remision($parametros['serie'],$parametros['factura']);
    return $guia;
  }


  function html_de_correo($cliente,$numFactura,$fecha,$valor)
  {
    $empresa = $this->modelo->datos_empresa($_SESSION['INICIO']['ID_EMPRESA']);
    // print_r($empresa);die();
    $logo = '';
    $file = dirname(__DIR__).str_replace('..','', $empresa[0]['logo']);
    if(file_exists($file))
    {
        $logo = "www.deep-script.com/php".str_replace('..','', $empresa[0]['logo']);
    }

    $dateTime = new DateTime($fecha);
    setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'esp');
    $fecha_larga = strftime('%d de %B de %Y', $dateTime->getTimestamp());

    $html = '
<html>
<head></head>
<body>
<div style="background-color:#ffffff;margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;height:100%;background-color:#ffffff;width:100%!important">
<table bgcolor="#f5f7f9" border="0" cellspacing="0" style="margin:0;padding:0px;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;border-collapse:collapse;border-spacing:0;width:100%;color:#58595b">
<tbody>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td align="center" style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<table bgcolor="#f5f7f9" border="0" cellpadding="0" cellspacing="0" style="margin:0;padding:0px;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;border-collapse:collapse;border-spacing:0;width:auto;color:#58595b">
<tbody>
<tr style="margin-top:2px;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
<td height="50" style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
<td style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
</tr>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td></td>

<td></td>
</tr>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
<td bgcolor="#FFFFFF" style="margin:0 auto!important;padding:10px 30px;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;border-width:0;border-style:solid;border-color:transparent;display:block!important;max-width:540px!important;clear:both!important">
<div style="margin:0 auto;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;max-width:600px;display:block">
<table style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;border-collapse:collapse;border-spacing:0;width:100%">
<tbody>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td align="center" style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<table style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;border-collapse:collapse;border-spacing:0;width:100%">
<tbody>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td style="margin:0;padding:35px 0 0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;text-align:center;color:#98a1ac">
<div style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<p style="margin:0;padding:0;font-family:\'Avenir LT W01_85 Heavy\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:18px;line-height:1.6;margin-bottom:10px;font-weight:normal;text-transform:uppercase;color:#98a1ac">
'.strtoupper($cliente).'</p>
<p style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:18px;line-height:1.6;margin-bottom:10px;font-weight:normal">
Has recibido una Factura de </p>
</div>
</td>
</tr>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td style="margin:0;padding:15px 0 3px;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.0;text-align:center">
';
if($logo!='')
{
  $html.='<img alt="empresa-logo" src="'.$logo.'" style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.0;max-width:100%;border:0;height:95px;max-height:95px;width:auto" data-image-whitelisted="" class="CToWUd" data-bit="iit">';
}
 if($empresa[0]['Razon_Social']!=$empresa[0]['Nombre_Comercial'] )
  {

      $html.='
       <p style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:18px;line-height:1.6;margin-bottom:10px;font-weight:normal">Razon Social:</p>
      <p style="margin:0;padding:0;font-family:\'Avenir LT W01_85 Heavy\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:18px;line-height:1.6;margin-bottom:10px;font-weight:normal;text-transform:uppercase;color:#98a1ac">'.strtoupper($empresa[0]['Razon_Social']).'</p>
       <p style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:18px;line-height:1.6;margin-bottom:10px;font-weight:normal">Nombre Comercial:</p>
    <p style="margin:0;padding:0;font-family:\'Avenir LT W01_85 Heavy\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:18px;line-height:1.6;margin-bottom:10px;font-weight:normal;text-transform:uppercase;color:#98a1ac">'.strtoupper($empresa[0]['Nombre_Comercial']).'</p>';
  }else
  {
    $html.='
    <p style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:18px;line-height:1.6;margin-bottom:10px;font-weight:normal">Razon Social:</p>
    <p style="margin:0;padding:0;font-family:\'Avenir LT W01_85 Heavy\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:18px;line-height:1.6;margin-bottom:10px;font-weight:normal;text-transform:uppercase;color:#98a1ac">
    '.strtoupper($empresa[0]['Razon_Social']).'</p>';
  }
$html.='
</td>
</tr>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td height="25" style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
</tr>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td height="0" style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;border-bottom:1px solid #d2d9dd;height:0">
</td>
</tr>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td height="25" style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
</tr>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:16px;line-height:1.6;text-align:center">
<div style="margin:0;padding:0;font-family:\'Avenir LT W01_65 Medium\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:2.1">
<b>FACTURA '.$numFactura.'</b></div>
</td>
</tr>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td height="25" style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</td>
<td style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
</tr>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
<td bgcolor="#e4e8ea" height="" valign="middle" style="border:0;margin:0 auto!important;padding:10px 30px;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;border-width:0;border-style:solid;border-color:transparent;display:block!important;max-width:540px!important;clear:both!important">
<div style="margin:0 auto;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;max-width:600px;display:block">
<div style="margin:0;padding:0;font-family:\'Avenir LT W01_65 Medium\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:15px;line-height:1.6;text-align:center;border:0">'.$fecha_larga.'</div>
</div>
</td>
<td style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
</tr>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
<td bgcolor="#FFFFFF" style="margin:0 auto!important;padding:10px 30px;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;border-width:0;border-style:solid;border-color:transparent;display:block!important;max-width:540px!important;clear:both!important">
<div style="margin:0 auto;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;max-width:600px;display:block">
<table style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;border-collapse:collapse;border-spacing:0;width:100%">
<tbody>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td height="35" style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
</tr>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:16px;line-height:1.6;text-align:center">
<div style="margin:0;padding:0;font-family:\'Avenir LT W01_65 Medium\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:2.1">
Por el valor de: </div>
<div style="margin:0;padding:0;font-family:\'Avenir LT W01_85 Heavy\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:48px;line-height:1.0;text-align:center"> $'.$valor.'  </div>
</td>
</tr>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td height="55" style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
</tr>
</tbody>
</table>
</div>
</td>
<td style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
</tr>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
<td bgcolor="#FFFFFF">
<div style="margin:0 auto;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;max-width:600px;display:block">
<table border="0" cellpadding="0" cellspacing="0" style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;border-collapse:collapse;border-spacing:0;width:100%">
<tbody>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td align="center" style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;text-align:center">

<table style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;border-collapse:collapse;border-spacing:0;width:100%">
<tbody>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td align="center" style="margin:0;padding:10px 0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;text-align:center">
<p style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:15px;line-height:1.6;margin-bottom:10px;font-weight:normal;text-align:center">
</p>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</td>
<td style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
</tr>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
<td bgcolor="#FFFFFF" style="margin:0 auto!important;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;border-right:none;border-bottom:none;border-left:none;text-align:center;border-width:0;border-style:solid;border-color:transparent;border-top:1px solid #d2d9dd!important;display:block!important;max-width:540px!important;clear:both!important">
<div style="margin:0 auto;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;max-width:600px;display:block">
<table border="0" cellpadding="0" cellspacing="0" style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;border-collapse:collapse;border-spacing:0;width:100%">
<tbody>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td align="center" style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;text-align:center">
<table style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;border-collapse:collapse;border-spacing:0;width:100%">
<tbody>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td align="center" style="margin:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;text-align:center">
<p style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:15px;line-height:1.6;font-weight:normal;text-align:center"></p>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</td>
<td style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
</tr>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
<td bgcolor="#DCE4E4" style="margin:0 auto!important;padding:20px 30px!important;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:13px;line-height:1.6;border-right:none;border-bottom:none;border-left:none;text-align:center;border-width:0;border-style:solid;border-color:transparent;border-top:1px solid #d2d9dd!important;display:block!important;max-width:540px!important;clear:both!important">
<div style="margin:0 auto;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;max-width:600px;display:block">
<table border="0" cellpadding="0" cellspacing="0" style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;border-collapse:collapse;border-spacing:0;width:100%">
<tbody>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td align="center" style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;text-align:center">

<div style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;text-align:center"> <p style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:14px;line-height:1.6;margin-bottom:10px;font-weight:normal;color:#6f7f8c">
  ---------    Generado por deep-script. Visitanos en 
  <a href="https://deep-script.com/" style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;color:#6f7f8c" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://contifico.com/&amp;source=gmail&amp;ust=1747926865599000&amp;usg=AOvVaw2mugY6TqRR3VWiFN4H40Br">deep-script.com </a>    ---------
  </p>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</td>
<td style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
</tr>
</tbody>
</table>
<table bgcolor="#f5f7f9" style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;border-collapse:collapse;border-spacing:0;width:auto;clear:both!important">
<tbody>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
<td style="margin:0 auto!important;padding:10px 30px;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;border-width:0;border-style:solid;border-color:transparent;display:block!important;max-width:540px!important;clear:both!important">
<div style="margin:0 auto;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;max-width:600px;display:block">
<table style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;border-collapse:collapse;border-spacing:0;width:100%">
<tbody>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td align="center" style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<table style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6;border-collapse:collapse;border-spacing:0;width:100%">
<tbody>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td align="center" style="margin:0;padding:10px 0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">

</td>
</tr>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td align="center" style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
</tr>
<tr style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
<td height="10" style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</td>
<td style="margin:0;padding:0;font-family:\'Avenir LT W01_35 Light\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:100%;line-height:1.6">
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</body>
</html>';

  
          return $html;
  }

  

}

?>