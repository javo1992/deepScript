<?php
if(isset($_SESSION['INICIO']))
{   
  @session_start();
}else
{
     session_start();


// $_SESSION['INICIO']['ID_EMPRESA'] = '1';
// $_SESSION['INICIO']['IVA'] = 12;
// $_SESSION['INICIO']['N_MESAS'] = 30;
// $_SESSION['INICIO']['SERIE'] = '001-002';
// $_SESSION['INICIO']['ID_USUARIO'] = 1;
// $_SESSION['INICIO']['TIPO_BASE'] = 'MYSQL';
// $_SESSION['INICIO']['SOLICITUD'] = 'SYSTEMA';

}
include('../modelo/facturacionM.php');
include('../modelo/mesaM.php');
include('../modelo/alimentar_stockM.php');
include('../modelo/lista_articulosM.php');
include('../comprobantes/SRI/autorizar_sri.php');
include(dirname(__DIR__,1).'/lib/phpmailer/enviar_emails.php');
include(dirname(__DIR__,1).'/lib/Reporte_pdf.php');
/**
 * 
 */
$controlador = new mesasC();

if(isset($_GET['generar_mesas']))
{
    echo json_encode($controlador->generar_mesas());
}
if(isset($_GET['generar_comanda']))
{
    echo json_encode($controlador->generar_comanda());
}
if(isset($_GET['mesas_dispo']))
{
    // $parametros = $_POST['parametros'];
    echo json_encode($controlador->mesas_disponibles());
}

if(isset($_GET['cambiar_mesa']))
{
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->cambiar_mesa($parametros));
}

if(isset($_GET['pagos_agregados']))
{
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->pagos_agregados($parametros));
}
if(isset($_GET['borrar_pago']))
{
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->borrar_pagos($parametros));
}
if(isset($_GET['cargar_mesa']))
{
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->lineas_mesa($parametros));
}
if(isset($_GET['cargar_mesa_super']))
{
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->lineas_mesa_super($parametros));
}
if(isset($_GET['buscar_ci']))
{
    $query = $_GET['q1'];
    echo json_encode($controlador->buscar_ci($query));
}
if(isset($_GET['buscar_cliente_select2']))
{
    $query = '';
    if(isset($_GET['q']))
    {
     $query = $_GET['q'];
    }
    echo json_encode($controlador->buscar_cliente_select2($query));
}
if(isset($_GET['buscar_articulo']))
{
  // print_r($_POST);die();
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->articulos($parametros));
}

if(isset($_GET['buscar_articulos_select2']))
{
  // print_r($_POST);die();
    $query = '';
    if(isset($_GET['q']))
    {
     $query = $_GET['q'];
    }
    echo json_encode($controlador->buscar_articulos_select2($query));
}

if(isset($_GET['add_mesa']))
{
  // print_r($_POST);die();
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->add_mesa($parametros));
}
if(isset($_GET['add_mesa_super']))
{
  // print_r($_POST);die();
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->add_mesa_super($parametros));
}
if(isset($_GET['add_adi_mesa']))
{
  // print_r($_POST);die();
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->add_adi_mesa($parametros));
}
if(isset($_GET['add_caja']))
{
  // print_r($_POST);die();
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->add_caja($parametros));
}
if(isset($_GET['agregar_pago']))
{
  // print_r($_POST);die();
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->agregar_pago($parametros));
}
if(isset($_GET['formas_pago']))
{
    // $parametros = $_POST['parametros'];
    echo json_encode($controlador->formas_pago());
}
if(isset($_GET['eliminar_linea']))
{
  // print_r($_POST);die();
    $parametros = $_POST['linea'];
    echo json_encode($controlador->delete_linea($parametros));
}
if(isset($_GET['limpiar_mesa']))
{
  // print_r($_POST);die();
    $parametros = $_POST['mesa'];
    echo json_encode($controlador->limpiar_mesa($parametros));
}
if(isset($_GET['facturar_mesa']))
{
  // print_r($_POST);die();
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->facturar($parametros));
}
if(isset($_GET['facturar_app_store']))
{
  // print_r($_POST);die();
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->facturar_APP_STORE($parametros));
}
if(isset($_GET['lista_facturas']))
{
  $parametros = $_POST['parametros'];
  echo json_encode($controlador->lista_facturas($parametros));
}

if(isset($_GET['reimprimir']))
{
  $id = $_GET['factura'];
  // echo json_encode(
  $controlador->reimprimir($id);
}
if(isset($_GET['categorias']))
{   
  $parametros = $_POST['parametros'];
  echo json_encode($controlador->categorias($parametros));
}
if(isset($_GET['servir_producto']))
{   
  $parametros = $_POST['parametros'];
  echo json_encode($controlador->servir_producto($parametros));
}

if(isset($_GET['procesar_manual']))
{   
  $parametros = $_POST['parametros'];
  echo json_encode($controlador->procesar_manual($parametros));
}

if(isset($_GET['envios']))
{   
  $parametros = ''; //$_POST['parametros'];
  echo json_encode($controlador->envios($parametros));
}
if(isset($_GET['envios_asignados']))
{   
  $parametros = ''; //$_POST['parametros'];
  echo json_encode($controlador->envios_asignados($parametros));
}

if(isset($_GET['envios_entregados']))
{   
  $parametros = ''; //$_POST['parametros'];
  echo json_encode($controlador->envios_entregados($parametros));
}

if(isset($_GET['envios_ruta']))
{   
  $parametros = ''; //$_POST['parametros'];
  echo json_encode($controlador->envios_ruta($parametros));
}
if(isset($_GET['generar_ruta']))
{   
  $parametros = $_POST['parametros'];
  echo json_encode($controlador->generar_ruta($parametros));
}
if(isset($_GET['asignar_motorizado']))
{   
  $parametros = $_POST['parametros'];
  echo json_encode($controlador->asignar_motorizado($parametros));
}

if(isset($_GET['entregado_cli']))
{   
  $parametros = $_POST['parametros'];
  echo json_encode($controlador->entregado_cli($parametros));
}

if(isset($_GET['revisar_caja_inicio']))
{   
  echo json_encode($controlador->revisar_caja_inicio());
}
if(isset($_GET['total_caja']))
{   
  echo json_encode($controlador->total_caja());
}
if(isset($_GET['transacciones_caja']))
{   
  $parametros = $_POST['parametros'];
  echo json_encode($controlador->transacciones_caja($parametros));
}
if(isset($_GET['cuadre_caja_save']))
{   
  $parametros = $_POST;
  echo json_encode($controlador->cuadre_caja_save($parametros));
}
if(isset($_GET['valida_cierre']))
{   
  echo json_encode($controlador->validar_cierre());
}

if(isset($_GET['cargar_adicionales']))
{   
    $parametros = $_POST['parametros'];
  echo json_encode($controlador->cargar_adicionales($parametros));
}

if(isset($_GET['add_new_cliente']))
{   
    $parametros = $_POST;
    echo json_encode($controlador->add_new_cliente($parametros));
}
if(isset($_GET['numero_factura']))
{   
   echo json_encode($controlador->numero_factura());
}


// if(isset($_GET['enviar_email']))
// {   
//   $parametros = $_POST['parametros'];
//   echo json_encode($controlador->enviar_email($parametros));
// }

// if(isset($_GET['reporte_factura']))
// {   
//   $parametros = $_GET;
//   echo json_encode($controlador->reporte_factura($parametros));
// }

class mesasC
{
	private $modelo;
  	private $sri;
    private $mesa;
    private $stock;
    private $articulo;
	function __construct()
	{
		$this->modelo = new facturacionM();
        $this->mesa = new mesaM();
		$this->sri = new autorizacion_sri();
        $this->stock = new alimentar_stockM();
        $this->articulos = new lista_articulosM();
		$this->mail = new enviar_emails();
		$this->pdf = new Reporte_pdf(); 
	}
	

function generar_mesas()
{
   $cantidad_mesas = $_SESSION['INICIO']['N_MESAS'];
   $mesa = '';
    for ($i = 1; $i < $cantidad_mesas+1; $i++) {
        $existe = $this->mesa->mesa_ocupada($i);
        if($existe==true)
        {
             $mesa.='<div class="col-lg-2 mb-3" onclick="modal_peido('.$i.')"><div class="card bg-warning text-white shadow"><div class="card-body">MESA '.$i.'<div class="text-white-50 small">#1cc88a</div></div></div></div>';   
        }else
        {
             $mesa.='<div class="col-lg-2 mb-3" onclick="modal_peido('.$i.')"><div class="card bg-success text-white shadow"><div class="card-body">MESA '.$i.'<div class="text-white-50 small">#1cc88a</div></div></div></div>';   
        }   
    }
  return array('mesas'=>$mesa,'n_mesas'=>$cantidad_mesas);
}

function numero_factura()
{
    $NUM_FA = $this->mesa->numero_factura($_SESSION['INICIO']['ID_EMPRESA']);
    // print_r($NUM_FA);die();
    return $NUM_FA+1;
}



function generar_comanda()
{
    $comandas = $this->mesa->comanda_mesas();
    // print_r($comandas);die();
    $cantidad_comandas= count($comandas);
    $mesa='';
    foreach($comandas as $key =>$value) {

        $mesa.='<div class="col-sm-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col mt-0">
                                                        <h5 class="card-title">Numero de mesa</h5>
                                                    </div>

                                                    <div class="col-auto">
                                                        <div class="stat text-primary">
                                                           <b>'.$value['mesa'].'</b>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-0">';
                                                $lineas = $this->mesa->comanda_mesas_lineas($value['mesa']);
                       foreach ($lineas as $key2 => $value2) {
                        $mesa.='<hr><div class="d-flex align-items-start" id="linea'.$value2['id_mesa'].'" onclick="servir(\''.$value2['id_mesa'].'\')" >
                                        <h1>'.$value2['cantidad'].'</h1>
                                        <div class="flex-grow-1">
                                        <h4>'.$value2['producto'].'</h4>
                                            <small class="float-end text-navy"><i class="fas fa-clipboard-list fa-2x text-gray-300" id="icono'.$value2['id_mesa'].'"></i></small>';
                                            if($value2['llevar']==1)
                                            {
                                             $mesa.='<small class="text-danger">Para llevar</small>';
                                         }
                                        $mesa.='</div>
                                    </div>';

                        

                     
                       }

                    $mesa.='</div>
                </div>
            </div>                                       
        </div>';
           
    }
  return array('mesas'=>$mesa,'n_comandas'=>$cantidad_comandas);
}

function mesas_disponibles()
{    
   $cantidad_mesas = $_SESSION['INICIO']['N_MESAS'];
   $mesa = '<option value="">Mesas disponibles</option>';
    for ($i = 1; $i < $cantidad_mesas+1; $i++) {
        $existe = $this->mesa->mesa_ocupada($i);
        if($existe==true)
        {
             $mesa.='<option value="'.$i.'" disabled="" class="bg-warning text-white">Mesa '.$i.'</option>';   
        }else
        {             
             $mesa.='<option value="'.$i.'">Mesa '.$i.'</option>';   
        }   
    }
  return $mesa;
}

function cambiar_mesa($parametros)
{    
   $datos[0]['campo']='mesa';
   $datos[0]['dato']=$parametros['cambio'];

   $where[0]['campo']='mesa';
   $where[0]['dato']=$parametros['mesa'];
   return $this->mesa->update('mesa',$datos,$where);
}


  function lista_facturas($parametros)
  {
    $query = $parametros['nombre'];
    $num = $parametros['numfac'];
    $empresa = $_SESSION['INICIO']['ID_EMPRESA'];
    $result = $this->mesa->lista_facturas($query,$num,$empresa);
    // print_r($result);die();
    $tr ='';
    foreach($result as $key => $value)
    {
      if($value['estado_factura']!='R')
      {
      //   $tr.='<tr onclick="cargar_detalle(\''.$value['id'].'\',\''.$value['estado_factura'].'\')" class="table-success"><th width="50px">'.$value['num'].'</th><td width="100px">'.$value['fecha'].'</td><td>'.$value['nombre'].'</td></tr>';
      // }else if($value['estado_factura']=='R')
      // {
      //   $tr.='<tr onclick="cargar_detalle(\''.$value['id'].'\',\''.$value['estado_factura'].'\')" class="table-danger"><th width="50px">'.$value['num'].'</th><td width="100px">'.$value['fecha'].'</td><td>'.$value['nombre'].'</td></tr>';
      // }else
      // {
        $tr.='<tr class=""><th width="50px">'.$value['num'].'</th><td width="100px">'.$value['fecha'].'</td><td>'.$value['nombre'].'</td><td><button class="btn btn-primary btn-sm" onclick="imprimir(\''.$value['id'].'\')"><i class="fa fa-print"></i></button>
            <button class="btn btn-primary btn-sm" onclick="pdf_factura(\''.$value['id'].'\')"><i class="fa fa-file-pdf"></i></button></td></tr>'; 
      }
    }
    return $tr;
  }

  function lineas_mesa($parametros)
  {
    $query = $parametros['mesa'];
    $result = $this->mesa->linea_facturas($query);
    // print_r($result);die();
    $tr ='';
    $total = 0;
    $iva = 0; 
    $sub = 0;
    $des = 0;
    $sin_iva =0;
    $con_iva=0 ;
    foreach($result as $key => $value)
    {
        $tr.='<tr>
        <td>'.$value['cantidad'].'</td>';
        if($value['procesar']==1)
        {
            if($value['llevar']==1)
            {
                $tr.='<td>'.$value['producto'].'<span class="badge bg-warning">Para llevar</span></td>';
            }else
            {
                 $tr.='<td>'.$value['producto'].'</td>';
            }
        }else
        {  if($value['llevar']==1)
            {
                $tr.='<td>'.$value['producto'].'<br><span class="badge bg-danger">Sin procesar</span><span class="badge bg-warning">Para llevar</span></td>';
            }else
            {
                $tr.='<td>'.$value['producto'].'<br><span class="badge bg-danger">Sin procesar</span></td>';
            }
        }
        $tr.='<td>'.number_format($value['precio_uni'],2,'.','').'</td>
        <td>'.$value['total'].'</td>
        <td>';
        if($value['servido']==0)
        {
           $tr.='<button class="btn btn-sm btn-danger" onclick="eliminar_linea(\''.$value['id_mesa'].'\', \''.$query.'\')"><i class="fa fa-trash"></i></button>';
        }
        $tr.='</td>
        </tr>';
     $iva+=floatval($value['iva']);
     $total+=floatval($value['total']);
     $sub+=floatval($value['subtotal']);
     $des+=floatval($value['descuento']);

    }
    $tbl_totales ='<table class="table table-responsive">
                        <tr class="text-primary">
                            <td></td>
                            <td>Descuento</td>
                            <td>Subtotal</td>
                            <td>Iva</td>
                            <td>Total</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td id="txt_descuento">'.number_format($des,2,'.','').'</td>
                            <td id="txt_subtotal">'.number_format($sub,2,'.','').'</td>
                            <td id="txt_iva">'.number_format($iva,2,'.','').'</td>
                            <td id="txt_total">'.number_format($total,2,'.','').'</td>
                        </tr>
                    </table>';
    return array('tbl'=>$tr,'totales'=>$tbl_totales);
  }

   function lineas_mesa_super($parametros)
  {
    $query = $parametros['mesa'];
    $result = $this->mesa->linea_facturas($query);
    // print_r($result);die();
    $tr ='';
    $total = 0;
    $iva = 0; 
    $sub = 0;
    $des = 0;
    $sin_iva =0;
    $con_iva=0 ;
    foreach($result as $key => $value)
    {
        $tr.='<tr>
        <td>'.$value['cantidad'].'</td>
        <td>'.$value['producto'].'</td>
        <td>'.number_format($value['precio_uni'],2,'.','').'</td>
        <td>'.number_format($value['descuento'],2,'.','').'</td>
        <td>'.number_format($value['iva'],2,'.','').'</td>
        <td>'.number_format($value['subtotal'],2,'.','').'</td>
        <td>'.$value['total'].'</td>
        <td>';
        if($value['servido']==0)
        {
           $tr.='<button class="btn btn-sm btn-danger" onclick="eliminar_linea(\''.$value['id_mesa'].'\', \''.$query.'\')"><i class="fa fa-trash"></i></button>';
        }
        $tr.='</td>
        </tr>';
     $iva+=floatval($value['iva']);
     $total+=floatval($value['total']);
     $sub+=floatval($value['subtotal']);
     $des+=floatval($value['descuento']);

    }
    $tbl_totales =array('descuento'=>number_format($des,2,'.',''),'subtotal'=>number_format($sub,2,'.',''),'iva'=>number_format($iva,2,'.',''),'total'=>number_format($total,2,'.',''));
    return array('tbl'=>$tr,'totales'=>$tbl_totales);
  }

  function articulos($parametros)
  {
    $datos = $this->modelo->articulos($parametros['query'],$_SESSION['INICIO']['ID_EMPRESA'],$parametros['cate']);
    $arti = '';
    foreach ($datos as $key => $value) {
    	// print_r($value);die();
      // $arti.='<div class="card mb-4 py-3 border-bottom-warning col-sm-12" onclick="modal_cantidad(\''.$value['id'].'\')">
      //                          <div class="card-body" style="padding:2px;">
      //                               <div class="row no-gutters align-items-center">
      //                                   <div class="col mr-2">
      //                                       <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
      //                                          '.$value['nombre'].'</div>
      //                                       <div class="h5 mb-0 font-weight-bold text-gray-800">$'.number_format($value['precio_uni'],2).'</div>
      //                                   </div>
      //                                   <div class="col-auto">
      //                                       <img src="'.$value['foto'].'" style="width: 30%;" class="fa-2x text-gray-300">
      //                                   </div>
      //                               </div>
      //                           </div>
      //                       </div>';
          $arti.='<div class="d-flex align-items-start" onclick="modal_cantidad(\''.$value['id'].'\')">
                                        <img src="'.$value['foto'].'" width="80" height="80" class="rounded-circle me-2" alt="Vanessa Tucker">
                                        <div class="flex-grow-1">';
                                        if($value['iva']==1)
                                        {
                                            $arti.='<small class="float-end text-navy text-danger">lleva iva</small>';
                                        }
                                         $arti.='<strong>'.$value['nombre'].'</strong><br>
                                            <small class=""><b>$'.number_format($value['precio_uni'],2).'</b></small><br>

                                        </div>
                                    </div><hr>';
    }
    return $arti;
  }

  function buscar_articulos_select2($query)
  {
    $datos = $this->modelo->articulos2($query,$_SESSION['INICIO']['ID_EMPRESA']);
    $arti = array();
    foreach ($datos as $key => $value) {
        $arti[] = array('id'=>$value['id'],'text'=>$value['referencia'].' - '.$value['nombre'],'data'=>$value);
    }
  
    return $arti;
  }


  function add_mesa($parametros)
  {
    $datosA = $this->modelo->articulos_id($parametros['articulo'],$_SESSION['INICIO']['ID_EMPRESA']);
    // print_r($parametros);die();

    $datos[0]['campo'] = 'producto';
    $datos[0]['dato'] = $datosA[0]['nombre'];
    $datos[1]['campo'] = 'cantidad';
    $datos[1]['dato'] = $parametros['cantidad'];
    $datos[2]['campo'] = 'precio_uni';
    $datos[2]['dato'] = $datosA[0]['precio_uni'];
    $datos[3]['campo'] = 'subtotal';
    $datos[3]['dato'] = number_format($parametros['cantidad']*$datosA[0]['precio_uni'],2,'.','');
    $datos[4]['campo'] = 'mesa';
    $datos[4]['dato'] = $parametros['mesa'];
    $datos[5]['campo'] = 'descuento';
    $datos[5]['dato'] = 0;
    $datos[6]['campo'] = 'iva';
    $datos[6]['dato'] = number_format(floatval($datos[3]['dato'])*floatval((floatval($_SESSION['INICIO']['IVA'])/100)),2,'.','');
     if($datosA[0]['iva']==0)
    {        
        $datos[6]['campo'] = 'iva';
        $datos[6]['dato'] = 0;
    }

    $datos[7]['campo'] = 'total';
    $datos[7]['dato'] = number_format(floatval($datos[3]['dato'])+ floatval($datos[6]['dato']),2,'.','');
    $datos[8]['campo'] = 'porc_descuento';
    $datos[8]['dato'] = 0;
    $datos[9]['campo'] = 'referencia';
    $datos[9]['dato'] = $datosA[0]['referencia'];
    $datos[10]['campo'] = 'porc_iva';
    $datos[10]['dato'] = 0;
    if($_SESSION['INICIO']['IVA']!=0 && $datosA[0]['iva']==1){   
        $datos[10]['campo'] = 'porc_iva';
        $datos[10]['dato'] = ($_SESSION['INICIO']['IVA']/100);
    }
    

    $datos[11]['campo'] = 'empresa';
    $datos[11]['dato'] = $_SESSION['INICIO']['ID_EMPRESA'];
    if($_SESSION['INICIO']['PROCESAR_AUTO']==1)
    {
        $datos[12]['campo'] = 'procesar';
        $datos[12]['dato'] = 1;
    }
    $datos[13]['campo'] = 'llevar';
    $datos[13]['dato'] = $parametros['llevar'];

    // print_r($datos);die();

   return  $this->modelo->add('mesa',$datos,$_SESSION['INICIO']['ID_EMPRESA']);

  }

  function add_mesa_super($parametros)
  {
    $datosA = $this->modelo->articulos_id($parametros['articulo'],$_SESSION['INICIO']['ID_EMPRESA']);
    // print_r($parametros);die();

    $datos[0]['campo'] = 'producto';
    $datos[0]['dato'] = $datosA[0]['nombre'];
    $datos[1]['campo'] = 'cantidad';
    $datos[1]['dato'] = $parametros['cantidad'];
    $datos[2]['campo'] = 'precio_uni';
    $datos[2]['dato'] = $datosA[0]['precio_uni'];
    if($parametros['pvp']!= $datosA[0]['precio_uni'])
    {
        $datos[2]['campo'] = 'precio_uni';
        $datos[2]['dato'] =$parametros['pvp'];
    }   
    $datos[3]['campo'] = 'subtotal';
    $datos[3]['dato'] = number_format($parametros['cantidad']*$datos[2]['dato'],2,'.','');
    $datos[4]['campo'] = 'mesa';
    $datos[4]['dato'] = $parametros['mesa'];
    $datos[5]['campo'] = 'descuento';
    $datos[5]['dato'] = 0;
    $datos[6]['campo'] = 'iva';
    $datos[6]['dato'] = number_format(floatval($datos[3]['dato'])*floatval((floatval($_SESSION['INICIO']['IVA'])/100)),2,'.','');
     if($datosA[0]['iva']==0)
    {        
        $datos[6]['campo'] = 'iva';
        $datos[6]['dato'] = 0;
    }

    $datos[7]['campo'] = 'total';
    $datos[7]['dato'] = number_format(floatval($datos[3]['dato'])+ floatval($datos[6]['dato']),2,'.','');
    $datos[8]['campo'] = 'porc_descuento';
    $datos[8]['dato'] = 0;
    $datos[9]['campo'] = 'referencia';
    $datos[9]['dato'] = $datosA[0]['referencia'];
    $datos[10]['campo'] = 'porc_iva';
    $datos[10]['dato'] = 0;
    if($_SESSION['INICIO']['IVA']!=0 && $datosA[0]['iva']==1){   
        $datos[10]['campo'] = 'porc_iva';
        $datos[10]['dato'] = ($_SESSION['INICIO']['IVA']/100);
    }
    

    $datos[11]['campo'] = 'empresa';
    $datos[11]['dato'] = $_SESSION['INICIO']['ID_EMPRESA'];
    if($_SESSION['INICIO']['PROCESAR_AUTO']==1)
    {
        $datos[12]['campo'] = 'procesar';
        $datos[12]['dato'] = 1;
    }
    $datos[13]['campo'] = 'llevar';
    $datos[13]['dato'] = $parametros['llevar'];

    // print_r($datos);
    $existe = $this->mesa->linea_facturas($parametros['mesa'],$datosA[0]['referencia']);
    if(count($existe)>0)
    {
        $datos[1]['dato'] = $existe[0]['cantidad']+$datos[1]['dato']; //cantidad 
        $datos[3]['dato'] = $existe[0]['subtotal']+$datos[3]['dato']; //subtotal
        $datos[6]['dato'] = $existe[0]['iva']+$datos[6]['dato']; //iva
        $datos[7]['dato'] = $existe[0]['total']+$datos[7]['dato']; //total

        $where[0]['campo'] = 'id_mesa'; 
        $where[0]['dato'] = $existe[0]['id_mesa'];
        return  $this->modelo->update('mesa',$datos,$where,$_SESSION['INICIO']['ID_EMPRESA']);

    }

    // print_r($datos);die();

   return  $this->modelo->add('mesa',$datos,$_SESSION['INICIO']['ID_EMPRESA']);

  }

  function add_adi_mesa($parametros)
  {
    $datosA = $this->modelo->articulos_id($parametros['articulo'],$_SESSION['INICIO']['ID_EMPRESA']);
    // print_r($parametros);die();

    $datos[0]['campo'] = 'producto';
    $datos[0]['dato'] = $datosA[0]['nombre'];
    $datos[1]['campo'] = 'cantidad';
    $datos[1]['dato'] = $parametros['cantidad'];
    $datos[2]['campo'] = 'precio_uni';
    $datos[2]['dato'] = 0;
    $datos[3]['campo'] = 'subtotal';
    $datos[3]['dato'] = 0;
    $datos[4]['campo'] = 'mesa';
    $datos[4]['dato'] = $parametros['mesa'];
    $datos[5]['campo'] = 'descuento';
    $datos[5]['dato'] = 0;
    $datos[6]['campo'] = 'iva';
    $datos[6]['dato'] = 0;
    $datos[7]['campo'] = 'total';
    $datos[7]['dato'] = 0;
    $datos[8]['campo'] = 'porc_descuento';
    $datos[8]['dato'] = 0;
    $datos[9]['campo'] = 'referencia';
    $datos[9]['dato'] = $datosA[0]['referencia'];
    if($_SESSION['INICIO']['IVA']!=0){   
    $datos[10]['campo'] = 'porc_iva';
    $datos[10]['dato'] = ($_SESSION['INICIO']['IVA']/100);
    }
    $datos[11]['campo'] = 'empresa';
    $datos[11]['dato'] = $_SESSION['INICIO']['ID_EMPRESA'];
    if($_SESSION['INICIO']['PROCESAR_AUTO']==1)
    {
        $datos[12]['campo'] = 'procesar';
        $datos[12]['dato'] = 1;
    }
    $datos[13]['campo'] = 'llevar';
    $datos[13]['dato'] = $parametros['llevar'];

   return  $this->modelo->add('mesa',$datos,$_SESSION['INICIO']['ID_EMPRESA']);

  }

  function add_caja($parametros)
  {
    $datos[0]['campo'] = 'inicial';
    $datos[0]['dato'] = 1;
    $datos[1]['campo'] = 'valor_pago';
    $datos[1]['dato'] = $parametros['valor'];
    $datos[2]['campo'] = 'detalle';
    $datos[2]['dato'] = 'INICIO DE CAJA';
    $datos[3]['campo'] = 'fecha';
    $datos[3]['dato'] = date('Y-m-d');
    return  $this->modelo->add('pagos_caja',$datos,$_SESSION['INICIO']['ID_EMPRESA']);
  }

//   function editar_linea($parametros)
//   {
//     // print_r($parametros);die();
//     $datos[0]['campo'] = 'precio_uni';
//     $datos[0]['dato'] = $parametros['pre'];
//     $datos[1]['campo'] = 'cantidad';
//     $datos[1]['dato'] = $parametros['cant'];
//     $datos[2]['campo'] = 'total';
//     $datos[2]['dato'] = number_format($parametros['tot'],2);    
//     $datos[3]['campo'] = 'descuento';
//     $datos[3]['dato'] = $parametros['vald'];
//     $datos[4]['campo'] = 'iva';
//     $datos[4]['dato'] = $parametros['iva'];
//     $datos[5]['campo'] = 'subtotal';
//     $datos[5]['dato'] = $parametros['sub'];
//     $datos[6]['campo'] = 'porc_descuento';
//     $datos[6]['dato'] = $parametros['pord'];
//     $datos[10]['campo'] = 'porc_iva';
//     $datos[10]['dato'] = 0;
//     if($parametros['iva']!=0){   
//       $datos[10]['campo'] = 'porc_iva';
//       $datos[10]['dato'] = number_format($parametros['p_iva']/100,2);
//       }

//     $where[0]['campo']='id_lineas';
//     $where[0]['dato']=$parametros['id'];
//    return  $this->modelo->update('lineas_factura',$datos,$where);

//   }
//   function cargar_linea($parametros)
//   {
//     return $this->modelo->linea_detalle($parametros['id']);
//   }

  function delete_linea($parametros)
  {
    $datos[0]['campo']='id_mesa';
    $datos[0]['dato']=$parametros;
    return $this->modelo->delete('mesa',$datos,$_SESSION['INICIO']['ID_EMPRESA']);
  }

  function limpiar_mesa($parametros)
  {
    $datos[0]['campo']='mesa';
    $datos[0]['dato']=$parametros;
    return $this->modelo->delete('mesa',$datos,$_SESSION['INICIO']['ID_EMPRESA']);
  }

  function facturar($parametros)
  {
   
     // ACTUALIZAMOS O AGREGAMOS
    // print_r($parametros);die();
     $this->cliente($parametros);
     $NUM_FA = $this->mesa->numero_factura($_SESSION['INICIO']['ID_EMPRESA']);
     if($parametros['idc']=='')
     {
        $cliente = $this->mesa->buscar_cliente(false,$_SESSION['INICIO']['ID_EMPRESA'],$parametros['ci']);
        $parametros['idc'] = $cliente[0]['id_cliente'];
     }
     // print_r($cliente);die();

    $datosF[0]['campo'] ='num_factura';
    $datosF[0]['dato'] = $NUM_FA+1;
    $datosF[1]['campo'] ='id_empresa';
    $datosF[1]['dato'] = $_SESSION['INICIO']['ID_EMPRESA'];
    $datosF[2]['campo'] = 'serie';
    $datosF[2]['dato'] = $_SESSION['INICIO']['SERIE'];
    $datosF[3]['campo'] = 'id_cliente';
    $datosF[3]['dato'] = $parametros['idc'];
    $datosF[4]['campo'] = 'id_usuario';
    $datosF[4]['dato'] = $_SESSION['INICIO']['ID_USUARIO'];
    $datosF[5]['campo'] = 'fecha';
    $datosF[5]['dato'] = date('Y-m-d');
    $datosF[6]['campo'] = 'subtotal';
    $datosF[6]['dato'] = number_format($parametros['sub'],2,'.','');
    $datosF[7]['campo'] = 'descuento';
    $datosF[7]['dato'] = $parametros['des'];
    $datosF[8]['campo'] = 'iva';
    $datosF[8]['dato'] = number_format($parametros['iva'],2,'.','');
    $datosF[9]['campo'] = 'total';
    $datosF[9]['dato'] = number_format($parametros['tot'],2,'.','');
    $datosF[10]['campo'] = 'Porc_IVA';
    $datosF[10]['dato'] = ($_SESSION['INICIO']['IVA']/100);

    // print_r($datosF);die();

    $fac = $this->mesa->add('facturas',$datosF);

    
    // print_r($fac);
    //agrega las lienas a la factura
    $id = $this->mesa->buscar_facturas($_SESSION['INICIO']['ID_EMPRESA'],$datosF[0]['dato']);
    // print_r($id);die();
    if($fac==1)
    {
        $con_iva = 0;
        $sin_iva = 0;
        $lineas = $this->mesa->linea_facturas($parametros['mesa']);
        // print_r($lineas);die();
        foreach ($lineas as $key => $value) {
           // print_r($value);die();
            $datos[0]['campo'] = 'producto';
            $datos[0]['dato'] = $value['producto'];
            $datos[1]['campo'] = 'cantidad';
            $datos[1]['dato'] = $value['cantidad'];
            $datos[2]['campo'] = 'precio_uni';
            $datos[2]['dato'] = $value['precio_uni'];
            $datos[3]['campo'] = 'subtotal';
            $datos[3]['dato'] = number_format($value['subtotal'],2,'.','');
            $datos[4]['campo'] = 'id_factura';
            $datos[4]['dato'] = $id[0]['id'];
            $datos[5]['campo'] = 'descuento';
            $datos[5]['dato'] = $value['descuento'];
            $datos[6]['campo'] = 'iva';
            $datos[6]['dato'] = number_format($value['iva'],2,'.','');
            $datos[7]['campo'] = 'total';
            $datos[7]['dato'] = number_format($value['total'],2,'.','');
            $datos[8]['campo'] = 'porc_descuento';
            $datos[8]['dato'] = 0;
            $datos[9]['campo'] = 'referencia';
            $datos[9]['dato'] = $value['referencia'];
            if($_SESSION['INICIO']['IVA']!=0){   
            $datos[10]['campo'] = 'porc_iva';
            $datos[10]['dato'] = ($_SESSION['INICIO']['IVA']/100);
            }
            if($value['iva']!=0)
            {
                $con_iva+=number_format(floatval($value['subtotal']),2,'.','');
            }else
            {
                $sin_iva+=number_format(floatval($value['subtotal']),2,'.','');
            }
            // print_r($datos);die();
            $this->mesa->add('lineas_factura',$datos);
            //reducir stock
            $this->reducir_stock($value,$id[0]['num'],$parametros['idc']);
            //eliminar lines de mesa
            $this->delete_linea($value['id_mesa']);

        }
        $where[0]['campo'] = 'num_factura'; 
        $where[0]['dato'] = $datosF[0]['dato']; 
        $datosFA[0]['campo'] = 'Sin_Iva';
        $datosFA[0]['dato'] = $sin_iva;
        $datosFA[1]['campo'] = 'Con_IVA';
        $datosFA[1]['dato'] = $con_iva;
        $this->modelo->update('facturas',$datosFA,$where,$_SESSION['INICIO']['ID_EMPRESA']);

        //agregar formas de pago a factura
    $pagos = $this->mesa->pagos_agregados($parametros['mesa']);

    $total = $id[0]['total'];
    foreach ($pagos as $key => $value) {
        $val = $total-$value['valor'];
        if($val<0)
        {
            $pago = $value['valor']+$val;
        }else
        {
            $pago = $value['valor'];
        }

       $datosP[0]['campo'] = 'id_factura';
       $datosP[0]['dato'] =  $id[0]['id'];
       $datosP[1]['campo'] = 'mesa';
       $datosP[1]['dato'] =  $parametros['mesa'];
       $datosP[2]['campo'] = 'valor_pago';
       $datosP[2]['dato'] =  $pago;      
       $datosP[3]['campo'] = 'estado';
       $datosP[3]['dato'] =  1;

       $whereP[0]['campo'] ='id_pagos';
       $whereP[0]['dato'] =  $value['id'];
       $this->mesa->update('pagos_caja',$datosP,$whereP);
       $total = $val;
    }



    
    return  $id[0]['id'];
  }
}

function facturar_APP_STORE($parametros)
  {
    $_SESSION['INICIO']['ID_EMPRESA'] = $parametros['empresa'];
     // ACTUALIZAMOS O AGREGAMOS
    // print_r($parametros);die();
     $empresa = $this->mesa->datos_empresa($parametros['empresa']);
     $serie = $this->mesa->datos_empresa_serie($parametros['empresa'],$parametros['sucursal']);
     $NUM_FA = $this->mesa->numero_factura($parametros['empresa']);
     $cliente = $this->mesa->buscar_cliente(false,$parametros['empresa'],false,$parametros['idc']);

        $nu = $this->numero_pedido($parametros);
        $mesaf = 'APP'.$parametros['idc'];
        if($nu!='')
        {
            $mesaf = 'APP'.$parametros['idc'].'-'.$nu;
        }


     // print_r($empresa);die();

    $datosF[0]['campo'] ='num_factura';
    $datosF[0]['dato'] = $NUM_FA+1;
    $datosF[1]['campo'] ='id_empresa';
    $datosF[1]['dato'] = $parametros['empresa'];
    $datosF[2]['campo'] = 'serie';
    $datosF[2]['dato'] = $serie[0]['serie_s'];
    $datosF[3]['campo'] = 'id_cliente';
    $datosF[3]['dato'] = $parametros['idc'];
    $datosF[4]['campo'] = 'id_usuario';
    $datosF[4]['dato'] = $serie[0]['id_usuario'];
    $datosF[5]['campo'] = 'fecha';
    $datosF[5]['dato'] = date('Y-m-d');
    $datosF[6]['campo'] = 'subtotal';
    $datosF[6]['dato'] = 0;
    $datosF[7]['campo'] = 'descuento';
    $datosF[7]['dato'] = 0;
    $datosF[8]['campo'] = 'iva';
    $datosF[8]['dato'] = 0;
    $datosF[9]['campo'] = 'total';
    $datosF[9]['dato'] = 0;
    $datosF[10]['campo'] = 'Porc_IVA';
    $datosF[10]['dato'] = ($empresa[0]['valor_iva']/100);
    $datosF[11]['campo'] = 'id_pedido';
    $datosF[11]['dato'] = $mesaf;

    $fac = $this->mesa->add('facturas',$datosF,$parametros['empresa']);

    //agregar formas de pago a factura
    $pagos = $this->mesa->pagos_agregados('APP'.$parametros['idc']);
    foreach ($pagos as $key => $value) {
       $datosP[0]['campo'] = 'id_factura';
       $datosP[0]['dato'] = $NUM_FA+1;
       $datosP[1]['campo'] = 'mesa';
       $datosP[1]['dato'] = $mesaf;

       $whereP[0]['campo'] ='id_pagos';
       $whereP[0]['dato'] =  $value['id'];
        $this->mesa->update('pagos_caja',$datosP,$whereP,$parametros['empresa']);
    }

    // print_r($NUM_FA);die();
    //agrega las lienas a la factura
    $id = $this->mesa->buscar_facturas($parametros['empresa'],$datosF[0]['dato']);
    if($fac==1)
    {
        $con_iva = 0;
        $sin_iva = 0;
        $sub = 0;$iva=0;
        $tot =0;$des=0;
        $lineas = $this->mesa->linea_facturas($mesaf);
        foreach ($lineas as $key => $value) {
           // print_r($value);die();
            $datos[0]['campo'] = 'producto';
            $datos[0]['dato'] = $value['producto'];
            $datos[1]['campo'] = 'cantidad';
            $datos[1]['dato'] = $value['cantidad'];
            $datos[2]['campo'] = 'precio_uni';
            $datos[2]['dato'] = $value['precio_uni'];
            $datos[3]['campo'] = 'subtotal';
            $datos[3]['dato'] = number_format($value['subtotal'],2,'.','');
            $datos[4]['campo'] = 'id_factura';
            $datos[4]['dato'] = $id[0]['id'];
            $datos[5]['campo'] = 'descuento';
            $datos[5]['dato'] = $value['descuento'];
            $datos[6]['campo'] = 'iva';
            $datos[6]['dato'] = number_format($value['iva'],2,'.','');
            $datos[7]['campo'] = 'total';
            $datos[7]['dato'] = number_format($value['total'],2,'.','');
            $datos[8]['campo'] = 'porc_descuento';
            $datos[8]['dato'] = 0;
            $datos[9]['campo'] = 'referencia';
            $datos[9]['dato'] = $value['referencia'];
            if($empresa[0]['valor_iva']!=0){   
            $datos[10]['campo'] = 'porc_iva';
            $datos[10]['dato'] = ($empresa[0]['valor_iva']/100);
            }
            if($value['iva']!=0)
            {
                $con_iva+=number_format($value['subtotal'],2,'.','');
            }else
            {
                $sin_iva+=number_format($value['subtotal'],2,'.','');
            }
            // print_r($datos);die();
            $this->mesa->add('lineas_factura',$datos,$parametros['empresa']);
            $datosL[0]['campo'] = 'facturado'; 
            $datosL[0]['dato'] = '1';
            $whereL[0]['campo'] = 'id_mesa'; 
            $whereL[0]['dato'] = $value['id_mesa'];
            $this->mesa->update('mesa',$datosL,$whereL,$parametros['empresa']);
            // $this->delete_linea($value['id_mesa']);

             $sub+= number_format($value['subtotal'],2,'.',''); $iva+=number_format($value['iva'],2,'.','');
             $tot+= number_format($value['total'],2,'.',''); $des+=number_format($value['descuento'],2,'.','');;
        }
        $where[0]['campo'] = 'num_factura'; 
        $where[0]['dato'] = $datosF[0]['dato']; 
        $datosFA[0]['campo'] = 'Sin_Iva';
        $datosFA[0]['dato'] = $sin_iva;
        $datosFA[1]['campo'] = 'Con_IVA';
        $datosFA[1]['dato'] = $con_iva;            
        $datosFA[2]['campo'] = 'subtotal';
        $datosFA[2]['dato'] = $sub;
        $datosFA[3]['campo'] = 'descuento';
        $datosFA[3]['dato'] = $des;
        $datosFA[4]['campo'] = 'iva';
        $datosFA[4]['dato'] = $iva;
        $datosFA[5]['campo'] = 'total';
        $datosFA[5]['dato'] = $tot;
        $this->modelo->update('facturas',$datosFA,$where,$parametros['empresa']);

    
    return  $id[0]['id'];
  }
}

  // function cliente_factura($parametros)
  // {
  //   // print_r($parametros);die();
  //   return $this->modelo->cliente_factura($parametros['fac']);
  // }

  function buscar_ci($ci)
  {
    // print_r($parametros);die();
    $datos = $this->mesa->buscar_cliente(false,$_SESSION['INICIO']['ID_EMPRESA'],$ci);
    $cuenta = array();
    foreach ($datos as $key => $value) {
       $cuenta[] = array('value'=>$value['id_cliente'],'label'=>$value['ci_ruc'],'nombre'=>$value['nombre'],'ci'=>$value['ci_ruc'],'dir'=>$value['direccion'],'tel'=>$value['telefono'],'mail'=>$value['mail']);
        }
    return  $cuenta;
  }
  function buscar_cliente_select2($query)
  {

    $cuenta = array();
    if(is_numeric($query) && $query!='')
    {
        $query = substr($query,0,13);
        $datos = $this->mesa->buscar_cliente(false,$_SESSION['INICIO']['ID_EMPRESA'],$query);
        foreach ($datos as $key => $value) {
            $cuenta[] = array('id'=>$value['id_cliente'],'text'=>$value['nombre'].' - '.$value['ci_ruc'],'data'=>$value);
        }
    }else
    {
        $datos = $this->mesa->buscar_cliente($query,$_SESSION['INICIO']['ID_EMPRESA'],false);
         foreach ($datos as $key => $value) {
            $cuenta[] = array('id'=>$value['id_cliente'],'text'=>$value['nombre'],'data'=>$value);
        }
    }
    // print_r($parametros);die();
  
    return  $cuenta;
  }

  function add_new_cliente($parametros)
  {
    $datos['idc'] = $parametros['txt_id_cliente_n'];
    $datos['ci'] = $parametros['txt_ci_modal_n'];
    $datos['nom'] = $parametros['txt_nombre_modal_n'];
    $datos['tel'] = $parametros['txt_telefono_modal_n'];
    $datos['ema'] = $parametros['txt_email_modal_n'];
    $datos['raz'] = $parametros['txt_razon_modal_n'];
    $datos['dir'] = $parametros['txt_direccion_modal_n'];
    return $this->cliente($datos);
  }


  function cliente($parametros)
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

    $datos[5]['campo'] = 'id_empresa';
    $datos[5]['dato'] =$_SESSION['INICIO']['ID_EMPRESA'];

    $datos[6]['campo'] = 'Razon_Social';
    $datos[6]['dato'] =$parametros['raz'];
  
    $where[0]['campo'] = 'id_cliente';
    $where[0]['dato']= $parametros['idc'];
   if($parametros['idc']!='')
    {
      return $this->modelo->update('cliente',$datos,$where,$_SESSION['INICIO']['ID_EMPRESA']);
    }else
    {
         return $this->modelo->add('cliente',$datos,$_SESSION['INICIO']['ID_EMPRESA']);
    }
   

  }

  function categorias($parametros)
  {
    // print_r($_SESSION['INICIO']);die();
    $datos = $this->modelo->categorias($_SESSION['INICIO']['ID_EMPRESA'],$parametros['query']);
    // print_r($datos);die();
    $op = '';
    foreach ($datos as $key => $value) {
        // <div class="d-flex align-items-start">
        //                                 <img src="img/avatars/avatar-4.jpg" width="36" height="36" class="rounded-circle me-2" alt="Christina Mason">
        //                                 <div class="flex-grow-1">
        //                                     <small class="float-end text-navy">1d ago</small>
        //                                     <strong>Christina Mason</strong> posted a new blog<br>
        //                                     <small class="text-muted">Yesterday 2:43 pm</small>
        //                                 </div>
        //                             </div>

     // $op.='<div class="col-sm-2 col-md-6 mb-2" onclick="productos(\''.$value['id'].'\')">
     //            <div class="card border-left-primary shadow h-100 py-2">
     //                <div class="card-body">
     //                    <div class="row no-gutters align-items-center">
     //                         <div class="col mr-2">
     //                             <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
     //                                 '.$value['nombre'].'
     //                             </div>
     //                         </div>
     //                         <div class="col-auto">
     //                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
     //                         </div>
     //                     </div>
     //                </div>
     //            </div>
     //        </div>';

        $op.='<div class="col-12 col-md-6 col-xl" onclick="productos(\''.$value['id'].'\')" >
                            <div class="card flex-fill" style="border:1px solid">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <img src="'.$value['imagen'].'" width="46" height="46" class="rounded-circle me-2" alt="Christina Mason">
                                        <div class="flex-grow-1">
                                            <strong> '.$value['nombre'].'</strong>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>';
    }
    return $op;
  }

  function formas_pago()
  {
    $datos = $this->mesa->formas_pago($_SESSION['INICIO']['ID_EMPRESA']);
    $op = '<option value="">FORMA DE PAGO</option>';
    foreach ($datos as $key => $value) {
        $op.= '<option value="'.$value['id'].'">'.$value['nombre'].'</option>';
    }
    return $op;
  }

  function agregar_pago($parametros)
  {

    // print_r($parametros);die();
    $datos[0]['campo'] = 'mesa';
    $datos[0]['dato'] = $parametros['mesa'];
    $datos[1]['campo'] = 'valor_pago';
    $datos[1]['dato'] = $parametros['valor'];
    $datos[2]['campo'] ='id_forma_pago' ;
    $datos[2]['dato'] = $parametros['forma'];
    $datos[3]['campo'] ='fecha' ;
    $datos[3]['dato'] = date('Y-m-d');
    $datos[4]['campo'] ='inicial' ;
    $datos[4]['dato'] = false;

    // print_r($datos);die();
    return $this->modelo->add('pagos_caja',$datos,$_SESSION['INICIO']['ID_EMPRESA']);


  }

  function pagos_agregados($parametros)
  {
    $datos= $this->mesa->pagos_agregados($parametros['mesa']);
    $tr='';
    $total = 0;
    foreach ($datos as $key => $value) {
        $tr.='<tr><td>'.$value['pago'].'</td><td>'.$value['valor'].'</td><td><button class="btn btn-danger btn-sm" onclick="borrar_pago(\''.$value['id'].'\',\''.$parametros['mesa'].'\')"><i class="fa fa-trash"></i></button></td><tr>';
        $total = $total+$value['valor'];
    }
    return array('tr'=>$tr,'total'=>$total);

  }

   function borrar_pagos($parametros)
  {
    return $this->mesa->eliminar_pago($parametros);
  }

  function reimprimir($id)
  {
    $datosFactura = $this->mesa->cliente_factura($id);
    $lineas = $this->mesa->linea_facturas_all($id);
 // print_r($id);
    // print_r($lineas);die();

    
    $cabe = '<pre>
Transaccion (FACTURA): No. '.$datosFactura[0]['serie'].'-'.$datosFactura[0]['num_factura'].'
Autorizacion:
'.$datosFactura[0]['Autorizacion'].'
Fecha: '.$datosFactura[0]['fecha'].'
Cliente: <br>'.$datosFactura[0]['nombre'].'
R.U.C/C.I.: '.$datosFactura[0]['ci_ruc'].'
Cajero: '.$datosFactura[0]['usuario'].'
Telefono: '.$datosFactura[0]['telefono'].'
Direccion: '.$datosFactura[0]['direccion'].'
---------------------------------------</pre>';
$cabe.='
<table>
<tr>
  <td>PRODUCTO   .</td>
  <td>CANT  .</td>
  <td>PVP   .</td>
  <td>TOTAL .</td>
</tr>';
foreach ($lineas as $key => $value) {
    $cabe.='<tr>
  <td>'.$value['producto'].'</td>
  <td>'.$value['cantidad'].'</td>
  <td>'.number_format($value['precio_uni'],2,'.','').'</td>
  <td>'.number_format($value['total'],2,'.','').'</td>
</tr>';
}
$cabe.='</table>';
   $cabe.= "<pre>
                   SUBTOTAL:  ".number_format($datosFactura[0]['subtotal'],2,'.','') ."
                  I.V.A 12%:   ".number_format($datosFactura[0]['iva'],2,'.','') ."
              TOTAL FACTURA:  ".number_format($datosFactura[0]['total'],2,'.','')."
----------------------------------------</pre>";
$cabe.= "<pre>
Email: ".$datosFactura[0]['mail']."
         Fue un placer atenderle 
          Gracias por su compra
 </pre>";
 echo $cabe;
}

function servir_producto($parametros)
{
    // print_r($parametros);die();
    $datos[0]['campo'] = 'servido';
    $datos[0]['dato'] = 1;
    $where[0]['campo'] = 'id_mesa';
    $where[0]['dato'] = $parametros['id'];    
    return $this->mesa->update('mesa',$datos,$where);

}

function procesar_manual($parametros)
{
    // print_r($parametros);die();
    $datos[0]['campo'] = 'procesar';
    $datos[0]['dato'] = 1;
    $where[0]['campo'] = 'mesa';
    $where[0]['dato'] = $parametros['mesa'];    
    return $this->mesa->update('mesa',$datos,$where);

}

function  envios($parametros)
{
    $datos = $this->mesa->envios();
    $tr = '';
    foreach ($datos as $key => $value) {
        $tr.='<tr><td><b>'.$value['pedido'].'</b></td><td>'.$value['nombre'].'</td><td>'.$value['fecha'].'</td><td><select class="select2 form-control"  id="ddl_moto'.$value['id'].'"><option value="">Seleccione motorizado</option>'.$this->lista_motorizados().'</select></td>
        <td>
         <button class="btn-sm btn btn-primary" onclick="asignar('.$value['id'].')"><i class="fa fa-save"></i></button>         
         <button class="btn-sm btn btn-default" onclick="ver_factura('.$value['idF'].')"><i class="fa fa-eye"></i></button>
        </td>
        </tr>';
    }
    return $tr;

}


function  envios_asignados($parametros)
{
    $datos = $this->mesa->envios(false,true);
    $tr = '';
    foreach ($datos as $key => $value) {
        $tr.='<tr>
        <td><b>'.$value['pedido'].'</b></td>
        <td>'.$value['nombre'].'</td>
        <td>'.$value['fecha'].'</td>
        <td>
         <span class="badge badge-danger-light">Sin entregar</span>
        </td>
        </tr>';
    }
    return $tr;

}

function  envios_entregados($parametros)
{
    $datos = $this->mesa->envios(false,true,true);
    $tr = '';
    foreach ($datos as $key => $value) {
        $tr.='<tr>
        <td><b>'.$value['pedido'].'</b></td>
        <td>'.$value['nombre'].'</td>
        <td>'.$value['fecha'].'</td>
        <td>
         <span class="badge badge-success-light">Entregado</span>
        </td>
        </tr>';
    }
    return $tr;

}



function lista_motorizados()
{
    $lista = $this->mesa->lista_motorizados();
    $op='';
    foreach ($lista as $key => $value) {
       $op.='<option value="'.$value['id'].'">'.$value['nombre'].'</option>'; 
    }
    return $op;

}

function  envios_ruta($parametros)
{
    $datos = $this->mesa->envios(false,true,false,$_SESSION['INICIO']['ID_USUARIO']);
    $tr = '<option value="">Seleccione pedido</option>';
    foreach ($datos as $key => $value) {
        $tr.='<option value="'.$value['id'].'">'.$value['pedido'].' '.$value['nombre'].'</option>';
    }
    return $tr;

}
function  generar_ruta($parametros)
{
    // print_r($parametros);die();
    if($parametros['envio']!='')
    {
        $datos = $this->mesa->envios($parametros['envio'],true,false);    
        return $datos;
    }else
    {
        return -1;
    }

}

function asignar_motorizado($parametros)
{
    // print_r($parametros);die();
    $datos[0]['campo'] = 'responsable';
    $datos[0]['dato'] = $parametros['moto'];
    


    $where[0]['campo'] = 'id_localizacion';
    $where[0]['dato'] = $parametros['id'];    
    return $this->mesa->update('entregas',$datos,$where);

}

function entregado_cli($parametros)
{
    // print_r($parametros);die();
    $datos[0]['campo'] = 'entregado';
    $datos[0]['dato'] = 1;
    $where[0]['campo'] = 'id_localizacion';
    $where[0]['dato'] = $parametros['envio'];    
    return $this->mesa->update('entregas',$datos,$where);

}

function revisar_caja_inicio()
{
    $datos = $this->mesa->revisar_caja_inicio();
    if(count($datos)>0)
    {
        return 1;
    }else
    {
        return -1;
    }
}

function total_caja()
{
    $ini = $this->mesa->revisar_caja_inicio();
    $total = $this->mesa->total_caja();
    $total_retiro = $this->mesa->total_retiros();

    $total_dia = number_format($ini[0]['valor_pago']+$total[0]['total']+$total_retiro[0]['total'],2,'.','');

    // print_r($total_dia);die();

    return array('inicio'=>number_format($ini[0]['valor_pago'],2,'.',''),'total_ingreso'=>number_format($total[0]['total'],2,'.',''),'total_retiro'=>number_format($total_retiro[0]['total'],2,'.',''),'total_dia'=>$total_dia);
}
function transacciones_caja($parametros)
{
    if($parametros['tipo']=='R')
    {
        $parametros['monto'] = -1*$parametros['monto'];
    }
    $datos[0]['campo'] = 'valor_pago';
    $datos[0]['dato'] = $parametros['monto'];
    $datos[1]['campo'] = 'detalle';
    $datos[1]['dato'] = $parametros['detalle'];    
    $datos[2]['campo'] = 'fecha';
    $datos[2]['dato'] = date('Y-m-d');
    return $this->modelo->add('pagos_caja',$datos,$_SESSION['INICIO']['ID_EMPRESA']);
}

function cuadre_caja_save($parametros)
{
    // print_r($parametros);die();
    $datos[0]['campo'] = 'billetes_100';
    $datos[0]['dato'] = 0;
    $datos[1]['campo'] = 'billetes_50';
    $datos[1]['dato'] = 0;
    $datos[2]['campo'] = 'billetes_20';
    $datos[2]['dato'] = $parametros['txt_20'];
    $datos[3]['campo'] = 'billetes_10';
    $datos[3]['dato'] = $parametros['txt_10'];
    $datos[4]['campo'] = 'billetes_5';
    $datos[4]['dato'] = $parametros['txt_5'];
    $datos[5]['campo'] = 'billetes_1';
    $datos[5]['dato'] = $parametros['txt_1'];
    $datos[6]['campo'] = 'centavos_50';
    $datos[6]['dato'] = $parametros['txt_50c'];
    $datos[7]['campo'] = 'centavos_25';
    $datos[7]['dato'] = $parametros['txt_25c'];
    $datos[8]['campo'] = 'centavos_10';
    $datos[8]['dato'] = $parametros['txt_10c'];
    $datos[9]['campo'] = 'centavos_5';
    $datos[9]['dato'] = $parametros['txt_5c'];
    $datos[10]['campo'] = 'centavos_1';
    $datos[10]['dato'] = $parametros['txt_1c'];    
    $datos[11]['campo'] = 'responsable';
    $datos[11]['dato'] = $_SESSION['INICIO']['ID_USUARIO'];
    $datos[12]['campo'] = 'faltante';
    $datos[12]['dato'] = $parametros['txt_faltante'];
    $datos[13]['campo'] = 'sobrante';
    $datos[13]['dato'] = $parametros['txt_sobrante'];     
    $datos[14]['campo'] = 'total_dia';
    $datos[14]['dato'] = $parametros['txt_total_dia'];   
    $datos[15]['campo'] = 'total_retiros';
    $datos[15]['dato'] = $parametros['txt_total_dia_re'];   
    $datos[16]['campo'] = 'total_caja';
    $datos[16]['dato'] = $parametros['txt_total_caja'];   
    $datos[17]['campo'] = 'total_ingresos';
    $datos[17]['dato'] = $parametros['txt_total_ing'];   
    $datos[18]['campo'] = 'fecha';
    $datos[18]['dato'] = date('Y-m-d');
    $datos[19]['campo'] = 'tarjetas';
    $datos[19]['dato'] = $parametros['txt_tarjeta'];

    // print_r($_SESSION['INICIO']);die();
    $res =  $this->modelo->add('cierre_caja',$datos,$_SESSION['INICIO']['ID_EMPRESA']);

    if($res==1)
    {
        return $this->mesa->eliminar_pagos_caja();
    }
    return -1;
}

function validar_cierre()
{
    $lineas = $this->mesa->lineas_mesa_all();
    if(count($lineas)>0)
    {
        return -1;
    }else
    {
        return 1;
    }
}
function numero_pedido($parametros)
{
    // print_r($parametros);die();      
    $datos = $this->mesa->numero_pedido($parametros['idc'],$parametros['empresa']);
    if(count($datos)>0)
    {
        return count($datos)+1;
    }else
    {
        return '';
    }
}

function cargar_adicionales($parametros)
{
    // print_r($parametros);die();
    $datos = $this->mesa->cargar_adicionales($parametros['idarticulo'],$_SESSION['INICIO']['ID_EMPRESA']);
    if(count($datos)>0)
    {
        $adi = '';
        if($parametros['canti']>1)
        {
           $adi.= '<div class="row"><div class="col-sm-3"><b>Cantidad Pedida</b></div><div class="col-sm-2"><input id="txt_canti_adi" class="form-control form-control-sm" value="'.$parametros['canti'].'" readonly></div><div class="col-sm-4"><b>Cantidad Seleccionada</b></div><div class="col-sm-2">
                  <input id="txt_total_adi" class="form-control form-control-sm" value="0" readonly></div></div>';
            foreach ($datos as $key => $value) {           
                $adi.='
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card">

                        <img class="card-img-top" src="'.$value['foto'].'" alt="Unsplash">
                        <div class="card-header px-2 pt-2">     
                            <label><input type="checkbox" name="rbl_adi" id="rbl_adi_'.$value['idadd'].'" value="'.$value['idadd'].'" onclick="lista_check('.$value['idadd'].')" >  '.$value['adicional'].'</label>               
                            <input type="number" class="form-control form-control-sm" value="0" readonly="" id="txt_adi_'.$value['idadd'].'" onblur="cantidad_selec()">                     
                        </div>                            
                    </div>
                </div>';
            }
        }else
        {
           
            $adi.= '<input type="hidden" id="txt_canti_adi" class="form-control form-control-sm" value="'.$parametros['canti'].'">';
            foreach ($datos as $key => $value) {
                if($key==0)
                {
                    $che = 'checked';
                }
                $adi.='
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card">
                        <img class="card-img-top" src="'.$value['foto'].'" alt="Unsplash">
                        <div class="card-header px-2 pt-2">     
                            <label><input type="radio" name="rbl_adi" value="'.$value['idadd'].'" '.$che.'>  '.$value['adicional'].'</label>                           
                        </div>                            
                    </div>
                </div>';
            }

        }
      return $adi;
    }else
    {
        return -1;
    }
}

function reducir_stock($parametros,$factura,$cliente)
{
    $fecha = date('Y-m-d');
    $datos = $this->stock->costo_stock($parametros['idp'],$fecha);

    if(count($datos)==0)
    {      
        $dato = $this->stock->producto_all($parametros['idp']);
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
        $this->mesa->add($tabla='trans_kardex',$datos);
     }
    $pro = $this->stock->producto_all($parametros['idp']);

    if($pro[0]['producto_terminado']==0 && $pro[0]['inventario']==1)
    {
        $costo = $this->stock->costo_stock($parametros['idp'],date('Y-m-d'));
        $datos[0]['campo'] = 'id_producto';
        $datos[0]['dato']  = $parametros['idp'];
        $datos[1]['campo'] = 'salida';
        $datos[1]['dato']  = $parametros['cantidad'];
        $datos[2]['campo'] = 'valor_unitario';
        $datos[2]['dato']  = $parametros['precio_uni'];
        $datos[3]['campo'] = 'costo';
        $datos[3]['dato']  = $parametros['precio_uni'];
        $datos[4]['campo'] = 'Detalle';
        $datos[4]['dato']  = 'SALIDA DE STOCK FACTURA: '.$factura;
        $datos[5]['campo'] = 'TP';
        $datos[5]['dato']  = 'CD';
        $datos[6]['campo'] = 'fecha';
        $datos[6]['dato']  = date('Y-m-d');
        $datos[7]['campo'] = 'usuario';
        $datos[7]['dato']  = $_SESSION['INICIO']['ID_USUARIO'];
        $datos[8]['campo'] = 'empresa';
        $datos[8]['dato']  = $_SESSION['INICIO']['ID_EMPRESA'];
        $datos[9]['campo'] = 'valor_total';
        $datos[9]['dato']  =  $parametros['total'];
        $datos[10]['campo'] = 'existencias';
        $datos[10]['dato'] = $costo[0]['existencias']-$parametros['cantidad'];
        $datos[11]['campo'] = 'fecha_Fab';
        $datos[11]['dato']  = date('Y-m-d');
        $datos[12]['campo'] = 'fecha_Exp';
        $datos[12]['dato']  = date('Y-m-d');
        $datos[13]['campo'] = 'cliente';
        $datos[13]['dato']  = $cliente;
        $datos[14]['campo'] = 'factura';
        $datos[14]['dato']  = $factura;
        $datos[15]['campo'] = 'serie';
        $datos[15]['dato']  = $_SESSION['INICIO']['SERIE'];
        $datos[16]['campo'] = 'subtotal';
        $datos[16]['dato']  = $parametros['subtotal'];            
        $datos[17]['campo'] = 'total_iva';
        $datos[17]['dato']  = $parametros['iva'];   
        $this->mesa->add($tabla='trans_kardex',$datos);

        $datosP[0]['campo'] = 'stock';
        $datosP[0]['dato'] = $datos[10]['dato'];
        $where[0]['campo'] = 'id_productos';
        $where[0]['dato'] =  $parametros['idp'];
        return $this->mesa->update($tabla='productos',$datosP,$where);
    }else if($pro[0]['producto_terminado']==1 && $pro[0]['inventario']==0)
    {
        $mate = $this->articulos->kit_materia_prima($parametros['idp']);
        foreach ($mate as $key => $value) {

            //inserta registro inicial en caso de no encontrar costos y stock
            $datos = $this->stock->costo_stock($value['id_materia_prima'],$fecha);
            if(count($datos)==0)
            {      
                $dato = $this->stock->producto_all($value['id_materia_prima']);
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
                $datos[9]['dato']  =  $dato[0]['stock']*$dato[0]['precio_uni'];
                $datos[10]['campo'] = 'existencias';
                $datos[10]['dato']  = $dato[0]['stock'];
                $this->mesa->add($tabla='trans_kardex',$datos);
            }

            $porcantidad = $value['cantidad'];
            if($value['cantidad']==0)
            {
                $porcantidad = $value['peso'];
            }


            //reduccion de stock de materia prima
            $pro = $this->stock->producto_all($value['id_materia_prima']);
            $costo = $this->stock->costo_stock($value['id_materia_prima'],date('Y-m-d'));
            $datos[0]['campo'] = 'id_producto';
            $datos[0]['dato']  = $value['id_materia_prima'];
            $datos[1]['campo'] = 'salida';
            $datos[1]['dato']  = $parametros['cantidad']*$porcantidad;
            $datos[2]['campo'] = 'valor_unitario';
            $datos[2]['dato']  = $parametros['precio_uni'];
            $datos[3]['campo'] = 'costo';
            $datos[3]['dato']  = $parametros['precio_uni'];
            $datos[4]['campo'] = 'Detalle';
            $datos[4]['dato']  = 'SALIDA DE STOCK FACTURA: '.$factura;
            $datos[5]['campo'] = 'TP';
            $datos[5]['dato']  = 'CD';
            $datos[6]['campo'] = 'fecha';
            $datos[6]['dato']  = date('Y-m-d');
            $datos[7]['campo'] = 'usuario';
            $datos[7]['dato']  = $_SESSION['INICIO']['ID_USUARIO'];
            $datos[8]['campo'] = 'empresa';
            $datos[8]['dato']  = $_SESSION['INICIO']['ID_EMPRESA'];
            $datos[9]['campo'] = 'valor_total';
            $datos[9]['dato']  =  $parametros['total'];
            $datos[10]['campo'] = 'existencias';
            $datos[10]['dato'] = $costo[0]['existencias']-($parametros['cantidad']*$porcantidad);
            $datos[11]['campo'] = 'fecha_Fab';
            $datos[11]['dato']  = date('Y-m-d');
            $datos[12]['campo'] = 'fecha_Exp';
            $datos[12]['dato']  = date('Y-m-d');
            $datos[13]['campo'] = 'cliente';
            $datos[13]['dato']  = $cliente;
            $datos[14]['campo'] = 'factura';
            $datos[14]['dato']  = $factura;
            $datos[15]['campo'] = 'serie';
            $datos[15]['dato']  = $_SESSION['INICIO']['SERIE'];
            $datos[16]['campo'] = 'subtotal';
            $datos[16]['dato']  = $parametros['subtotal'];            
            $datos[17]['campo'] = 'total_iva';
            $datos[17]['dato']  = $parametros['iva'];   
            $this->mesa->add($tabla='trans_kardex',$datos);

            $datosP[0]['campo'] = 'stock';
            $datosP[0]['dato'] = $datos[10]['dato'];
            $where[0]['campo'] = 'id_productos';
            $where[0]['dato'] =  $parametros['idp'];     
            return $this->mesa->update($tabla='productos',$datosP,$where);      
        }

        // return 1;

    }else if($pro[0]['producto_terminado']==1 && $pro[0]['inventario']==1)
    {
        $costo = $this->stock->costo_stock($parametros['idp'],date('Y-m-d'));
        $datos[0]['campo'] = 'id_producto';
        $datos[0]['dato']  = $parametros['idp'];
        $datos[1]['campo'] = 'salida';
        $datos[1]['dato']  = $parametros['cantidad'];
        $datos[2]['campo'] = 'valor_unitario';
        $datos[2]['dato']  = $parametros['precio_uni'];
        $datos[3]['campo'] = 'costo';
        $datos[3]['dato']  = $parametros['precio_uni'];
        $datos[4]['campo'] = 'Detalle';
        $datos[4]['dato']  = 'SALIDA DE STOCK FACTURA: '.$factura;
        $datos[5]['campo'] = 'TP';
        $datos[5]['dato']  = 'CD';
        $datos[6]['campo'] = 'fecha';
        $datos[6]['dato']  = date('Y-m-d');
        $datos[7]['campo'] = 'usuario';
        $datos[7]['dato']  = $_SESSION['INICIO']['ID_USUARIO'];
        $datos[8]['campo'] = 'empresa';
        $datos[8]['dato']  = $_SESSION['INICIO']['ID_EMPRESA'];
        $datos[9]['campo'] = 'valor_total';
        $datos[9]['dato']  =  $parametros['total'];
        $datos[10]['campo'] = 'existencias';
        $datos[10]['dato'] = $costo[0]['existencias']-$parametros['cantidad'];
        $datos[11]['campo'] = 'fecha_Fab';
        $datos[11]['dato']  = date('Y-m-d');
        $datos[12]['campo'] = 'fecha_Exp';
        $datos[12]['dato']  = date('Y-m-d');
        $datos[13]['campo'] = 'cliente';
        $datos[13]['dato']  = $cliente;
        $datos[14]['campo'] = 'factura';
        $datos[14]['dato']  = $factura;
        $datos[15]['campo'] = 'serie';
        $datos[15]['dato']  = $_SESSION['INICIO']['SERIE'];
        $datos[16]['campo'] = 'subtotal';
        $datos[16]['dato']  = $parametros['subtotal'];            
        $datos[17]['campo'] = 'total_iva';
        $datos[17]['dato']  = $parametros['iva'];   
        $this->mesa->add($tabla='trans_kardex',$datos);

        $datosP[0]['campo'] = 'stock';
        $datosP[0]['dato'] = $datos[10]['dato'];
        $where[0]['campo'] = 'id_productos';
        $where[0]['dato'] =  $parametros['idp'];
        return $this->mesa->update($tabla='productos',$datosP,$where);

    }

            // die();

}


  // function enviar_email($parametros)
  // {
  //   // print_r($parametros);die();
  //   $emp = $this->modelo->datos_empresa( $parametros['empresa']);
  //   $cliente_factura = $this->modelo->cliente_factura($parametros['fac']);
  //   $nombre = $emp[0]['email'];
  //   $to_correo = 'javier.farinango92@gmail.com';
  //   $cuerpo_correo = '<b>Comprobante electronico</b>';
  //   $titulo_correo = 'Comprobante electronico';
  //   $correo_respaldo = 'example@example.com';
  //   $archivos[0] = $cliente_factura[0]['Autorizacion'].'.pdf';
  //   $HTML = true;

  //   $empresa = $this->modelo->datos_empresa_sucursal_usuario($parametros['usu']);
  //   $lineas = $this->modelo->linea_facturas_all($parametros['fac']);
  //   $this->pdf->factura_pdf($cliente_factura,$lineas,$empresa,false,$descargar=false);


  //   $this->mail->enviar_email($emp,$to_correo,$cuerpo_correo,$titulo_correo,$correo_respaldo,$archivos,$nombre,$HTML);
  // }

  // function reporte_factura($parametros)
  // {
  //   $empresa = $this->modelo->datos_empresa_sucursal_usuario($parametros['usu']);
  //   $cliente_factura = $this->modelo->cliente_factura($parametros['fac']);
  //   $lineas = $this->modelo->linea_facturas_all($parametros['fac']);
  //   $doc =  $this->pdf->factura_pdf($cliente_factura,$lineas,$empresa,false,true);
  //   // print_r($doc);die();
  //   return $doc;
  // }
}

?>