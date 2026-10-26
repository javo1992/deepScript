<?php
include('../modelo/loginM.php');
include('../modelo/empresaM.php');

@session_start();
/**
 * 
 */
$controlador = new funcionesC();
if(isset($_GET['lista']))
{
	$query = '';
	$datos = $controlador->lista_bodega($query);
	echo json_encode($datos);
}
if(isset($_GET['login']))
{
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->session($parametros));
}
if(isset($_GET['buscar_empresa']))
{
    $parametros = $_POST['ruc'];
    echo json_encode($controlador->buscar_empresa($parametros));
}
if(isset($_GET['cerrar_session']))
{
    // $parametros = $_POST['parametros'];
    echo json_encode($controlador->cerrar_session());
}
if(isset($_GET['notificaciones']))
{
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->notificaciones($parametros));
}

if(isset($_GET['buscar_codigo_secuencial']))
{
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->buscar_codigo_secuencial($parametros));
}
if(isset($_GET['lista_series']))
{
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->lista_series($parametros));
}
if(isset($_GET['serie_selected']))
{
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->serie_selected($parametros));
}
if(isset($_GET['nueva_empresa']))
{
    $parametros = $_GET;
    $foto = $_FILES;
    echo json_encode($controlador->nueva_empresa($parametros,$foto));
}


// if(isset($_GET['menu_lateral']))
// {
//     $parametros = $_POST['parametros'];
//     echo json_encode($controlador->menu_lateral($parametros));
// }

if(isset($_GET['menu_lateral_empresa']))
{
    $parametros = $_POST['parametros'];
    if($_SESSION['INICIO']['TIPO_USUARIO']=='dba' || $_SESSION['INICIO']['TIPO_USUARIO']=='DBA')
    {
      echo json_encode($controlador->menu_lateral_dba($parametros));
    }else
    {
        echo json_encode($controlador->menu_lateral_empresa($parametros));
    }
}

if(isset($_GET['cantidad_documentos']))
{
    echo json_encode($controlador->cantidad_documentos());
}

if(isset($_GET['saldo_empresa']))
{
    echo json_encode($controlador->saldo_empresa());
}

if(isset($_GET['carga_masiva']))
{
    $parametros = $_FILES;
    echo json_encode($controlador->carga_masiva($parametros));
}


class funcionesC
{
	private $modelo;
    private $empresa;
	function __construct()
	{
		$this->modelo = new loginM();
        $this->empresa = new empresaM();
	}
	

  function session($parametros)
    {
    	// print_r($parametros);die();
      $result = $this->modelo->usuario_exist($parametros);
      if($result==true)
      {
        $datos = $this->modelo->usuario_datos($parametros);
           $_SESSION['INICIO']['RUC_EMPRESA']=$datos[0]['RUC'];
	       $_SESSION['INICIO']['ID_EMPRESA']=$datos[0]['id_empresa'];
	       $_SESSION['INICIO']['EMPRESA']=$datos[0]['Nombre_Comercial'];
	       $_SESSION['INICIO']['USUARIO']=$datos[0]['nick'];
	       $_SESSION['INICIO']['ID_USUARIO']=$datos[0]['id_usuario'];
	       $_SESSION['INICIO']['PASS']=$datos[0]['pass'];
	       $_SESSION['INICIO']['IVA']=$datos[0]['valor_iva'];
	       $_SESSION['INICIO']['BASE']=$datos[0]['TIPO_BASE'];
	       $_SESSION['INICIO']['SERIE']=$datos[0]['serie'];
           $_SESSION['INICIO']['SUCURSAL']=$datos[0]['sucursal'];
           $_SESSION['INICIO']['N_MESAS']=$datos[0]['N_MESAS'];
           $_SESSION['INICIO']['F_Electronica']=$datos[0]['facturacion_electronica'];
           $_SESSION['INICIO']['PROCESAR_AUTO']=$datos[0]['procesar_automatico'];  //opcion para restaurante
           $_SESSION['INICIO']['TIPO_USUARIO']=$datos[0]['tipo_usuario'];
           $_SESSION['INICIO']['ID_TIPO_USUARIO']=$datos[0]['id_tipo'];
           $_SESSION['INICIO']['MOTORIZADOS']=$datos[0]['encargado_envios'];
           $_SESSION['INICIO']['AMBIENTE']=$datos[0]['ambiente'];
        return array('res'=>$result,'datos'=>$datos);
      }
      return array('res'=>$result,'datos'=>'');
    }

   function cerrar_session()
   {
   	 session_destroy();
   	 return 1;
   }

  function notificaciones($parametros)
  {
    $usuario = $this->modelo->notificaciones_usuario($parametros['empresa'],$parametros['usuario']);

    $noti = '<h6 class="dropdown-header">
                Centro de alertas
            </h6>';
    $num = 0;
    foreach ($usuario as $key => $value) {
    if(is_object($value['fecha']))
    {
        $value['fecha'] = $value['fecha']->format('Y-m-d');
    }
      $noti.= '
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">'.$value['fecha'].'</div>
                    <span class="font-weight-bold">'.$value['titulo'].'</span>
                </div>
            </a>';
            $num=$num+1;
    }

    $datos = array('noti'=>$noti,'num'=>$num);
    return $datos;

  } 


  function buscar_empresa($ruc)
  {
    $datos = $this->modelo->buscar_empresa($ruc);
    return $datos;
  }

  function menu_lateral_empresa($parametros)
  {
    // print_r($parametros);die();
     $item = '';
    $menus = $this->modelo->menu_lateral_empresa($_SESSION['INICIO']['ID_EMPRESA'],$menu=true,$submenu=false);
    $perimitido = $this->modelo-> menu_lateral_empresa($_SESSION['INICIO']['ID_EMPRESA'],$menu=false,$submenu=false);
    foreach ($menus as $key => $value) {
        $submenus = $this->modelo->menu_lateral_empresa($_SESSION['INICIO']['ID_EMPRESA'],$menu=false,$value['codigo']);
        if(count($submenus)==0)
        {
             $item.='<li class="nav-item">
                         <a class="nav-link p-1" href="'.$value['link'].'">
                         '.$value['icono'].'
                            <span class="menu-title">'.$value['detalle'].'</span></a>
                    </li>';
        }else
        {
              $item.=' <li class="nav-item">
                <a class ="nav-link p-1" data-target="#'.str_replace(' ','_',$value['detalle']).'" data-toggle="collapse">               
                '.$value['icono'].'
                     <span class="menu-title">'.$value['detalle'].'</span>
                     <i class="menu-arrow"></i>

                     </a>
                </a>
                <div class="collapse" id="'.str_replace(' ','_',$value['detalle']).'">
                <ul  class="nav flex-column sub-menu" data-bs-parent="#sidebar" style="padding-left: 26px;">';
                        foreach ($submenus as $key2 => $value2) {
                           foreach ($perimitido as $key3 => $value3) {
                               if($value2['codigo']==$value3['codigo'])
                               {
                                 $item.='<li class="nav-item"><a class="nav-link" href="'.$value2['link'].'">'.$value2['detalle'].'</a></li>';
                               }
                           }
                       }
                    $item.='
                </ul>      
                </div>   
            </li>';
        }
    }
    return $item;


  }

  function menu_lateral_dba($parametros)
  {
    // print_r('expre');die();
    $item = '';
    $menus = $this->modelo->menu_lateral_dba($parametros['empresa'],$menu=true,$submenu=false);
    foreach ($menus as $key => $value) {
        $submenus = $this->modelo->menu_lateral_dba($parametros['empresa'],$menu=false,$value['codigo']);
        if(count($submenus)==0)
        {
            $item.='<li class="sidebar-item active">
                         <a class="sidebar-link" href="'.$value['link'].'">
                         '.$value['icono'].'
                            <span>'.$value['detalle'].'</span></a>
                    </li>';


        }else
        {
             $item.=' <li class="sidebar-item">
                <a data-bs-target="#'.str_replace(' ','_',$value['detalle']).'" data-bs-toggle="collapse" class="sidebar-link collapsed">            
                    '.$value['icono'].'
                     <span>'.$value['detalle'].'</span></a>
                </a>
                <ul id="'.str_replace(' ','_',$value['detalle']).'" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item">';
                        foreach ($submenus as $key2 => $value2) {
                           $item.=' <a class="sidebar-link" href="'.$value2['link'].'">'.$value2['detalle'].'</a>';
                        }
                    $item.='</li>
                </ul>             
            </li>';

        }
    }
    return $item;

  } 


  function buscar_codigo_secuencial($parametros)
  {
    $serie = str_replace('-','',$_SESSION['INICIO']['SERIE']);
    $codigo = $parametros['tipo'].'_SERIE_'.$serie;
    $num = $this->modelo->buscar_codigo_secuencial($codigo);
    // print_r($num);die();

    return array('numero'=>$num[0]['numero'],'autorizacion'=>$num[0]['Autorizacion']);
  }

 function lista_series($parametros)
  {
    $num = $this->modelo->buscar_codigo_secuencial($detalle=false,$parametros['tipo'],$serie=false);
    return $num;
  }
   function serie_selected($parametros)
  {
    $num = $this->modelo->buscar_codigo_secuencial($detalle=false,$parametros['tipo'],$parametros['serie']);
    return $num[0];
  }

  function nueva_empresa($parametros,$file)
  {
     //-------------------sube imagen----------------------------------
    $nombre = str_replace(' ','_',$parametros['txt_nom_comercial']);
    if(count($file)>0)
    {
    if (($file['file']["type"] == "image/pjpeg") || ($file['file']["type"] == "image/jpeg") || ($file['file']["type"] == "image/png") || ($file['file']["type"] == "image/gif"))
        {
            $tipo = explode('/', $file['file']["type"]);
            $tipo = $tipo[1];
            $nombre = $nombre.'.'.$tipo;
            if (move_uploaded_file($file['file']["tmp_name"], "../img/clientes/".$nombre)) 
            {
                
            } else {
                return -1;
            }
        } else {
            return 2;
        }
    }

    //--------------------------crea empresa---------------------------
        $db = $this->modelo->base_principar();
        $datos[0]['campo'] = 'Razon_Social';
        $datos[0]['dato'] = $parametros['txt_razon'];
        $datos[1]['campo'] = 'Nombre_Comercial';
        $datos[1]['dato'] = $parametros['txt_nom_comercial'];
        $datos[2]['campo'] = 'RUC';
        $datos[2]['dato'] = $parametros['txt_ci_ruc'];
        $datos[3]['campo'] = 'Direccion';
        $datos[3]['dato'] = $parametros['txt_direccion'];
        $datos[4]['campo'] = 'telefono';
        $datos[4]['dato'] = $parametros['txt_telefono'];
        $datos[5]['campo'] = 'email';
        $datos[5]['dato'] = $parametros['txt_Email'];
        $datos[6]['campo'] = 'logo';
        $datos[6]['dato'] =  '../img/empresa/'.$nombre;
        $datos[7]['campo'] = 'IP_VPN';
        $datos[7]['dato'] = $db['server'];
        $datos[8]['campo'] = 'BASE';
        $datos[8]['dato'] = $db['database'];
        $datos[9]['campo'] = 'TIPO_BASE';
        $datos[9]['dato'] = $db['tipobase'];
        $datos[10]['campo'] = 'USUARIO';
        $datos[10]['dato'] = $db['usuario'];
        $datos[11]['campo'] = 'PASSWORD';
        $datos[11]['dato'] = $db['password'];
        $datos[12]['campo'] = 'PUERTO';
        $datos[12]['dato'] = $db['puerto'];
        $datos[13]['campo'] = 'Ambiente';
        $datos[13]['dato'] = '1';
        $datos[14]['campo'] = 'obligadoContabilidad';
        $datos[14]['dato'] = '0';
        $datos[15]['campo'] = 'valor_iva';
        $datos[15]['dato'] = $parametros['txt_iva'];
        $datos[16]['campo'] = 'facturacion_electronica';
        $datos[16]['dato'] = '1';

        $this->modelo->add('empresa',$datos,$db['id_principal']);
        $empresa = $this->empresa->buscar_empresa($db['id_principal'],$parametros['txt_ci_ruc'],$nombre=false,$razon=false);
        // print_r($empresa);die();
    //--------------------------crea una sucursal----------------------
        $datos1[0]['campo'] = 'telefono_s';
        $datos1[0]['dato'] = $parametros['txt_telefono'];
        $datos1[1]['campo'] = 'direccion_s';
        $datos1[1]['dato'] = $parametros['txt_direccion'];
        $datos1[2]['campo'] = 'serie_s';
        $datos1[2]['dato'] = '001-001';
        $datos1[3]['campo'] = 'empresa';
        $datos1[3]['dato'] = $empresa[0]['id_empresa'];
        $datos1[4]['campo'] = 'email_s';
        $datos1[4]['dato'] = $parametros['txt_Email'];
        $datos1[5]['campo'] = 'nombre_sucursal';
        $datos1[5]['dato'] = 'SUCURSAL PRINCIPAL';
        $this->modelo->add('sucursales',$datos1,$db['id_principal']);       
    //--------------------------crea un usuario -----------------------

        $datos2[0]['campo'] = 'nick';
        $datos2[0]['dato'] = $empresa[0]['RUC'];
        $datos2[1]['campo'] = 'pass';
        $datos2[1]['dato'] = $empresa[0]['RUC'];
        $datos2[2]['campo'] = 'serie';
        $datos2[2]['dato'] = '001-001';
        $datos2[3]['campo'] = 'id_empresa';
        $datos2[3]['dato'] = $empresa[0]['id_empresa'];
        $datos2[4]['campo'] = 'foto';
        $datos2[4]['dato'] = '../img/sistema/sin_imagen.jpg';
        $datos2[5]['campo'] = 'tipo_usuario';
        $datos2[5]['dato'] = '10';        

        $this->modelo->add('usuario',$datos2,$db['id_principal']);
        $usuario = $this->modelo->usuario_empresa($empresa[0]['id_empresa'],false,$empresa[0]['RUC'],$empresa[0]['RUC']);

        // print_r($usuario);die();

    //--------------------------crea secuenciales----------------------
        $tip = array('FA','RE','NC','GR','LC');
        foreach ($tip as $key => $value) {
            $datos3[0]['campo'] = 'detalle_secuencial';
            $datos3[0]['dato'] = $value.'_SERIE_001001';
            $datos3[1]['campo'] = 'numero';
            $datos3[1]['dato'] = 1;
            $datos3[2]['campo'] = 'Serie';
            $datos3[2]['dato'] = '001-001';
            $datos3[3]['campo'] = 'Autorizacion';
            $datos3[3]['dato'] = $empresa[0]['RUC'];
            $datos3[4]['campo'] = 'tipo';
            $datos3[4]['dato'] = $value;
            $datos3[5]['campo'] = 'id_empresa';
            $datos3[5]['dato'] = $empresa[0]['id_empresa'];
            $this->modelo->add('codigos_secuenciales',$datos3,$db['id_principal']);            
        }
    //--------------------------crea consumidor final------------------
        $datos4[0]['campo'] = 'nombre';
        $datos4[0]['dato'] =  'CONSUMIDOS FINAL';       
        $datos4[1]['campo'] = 'telefono';
        $datos4[1]['dato'] = '99999999';
        $datos4[2]['campo'] = 'mail';
        $datos4[2]['dato'] = 'consumidos@final.com';
        $datos4[3]['campo'] = 'direccion';
        $datos4[3]['dato'] = 'consumidos final';
        $datos4[4]['campo'] = 'id_empresa';
        $datos4[4]['dato'] = $empresa[0]['id_empresa'];
        $datos4[5]['campo'] = 'ci_ruc';
        $datos4[5]['dato'] = '999999999999';
        $datos4[6]['campo'] = 'Razon_Social';
        $datos4[6]['dato'] = 'CONSUMIDOR FINAL';
        $datos4[7]['campo'] = 'tipo';
        $datos4[7]['dato'] = 'C';
        $datos4[8]['campo'] = 'TD';
        $datos4[8]['dato'] = 'C';
        $datos4[9]['campo'] = 'estado';
        $datos4[9]['dato'] = 'A';
        $this->modelo->add('cliente',$datos4,$db['id_principal']); 

        //---------------------------------accessos-------------------//

        // print_r($usuario);die();

        $pag = array(1,2,3,26,37,45,46,47,48,49,51,52,55);
        foreach ($pag as $key => $value) {
            $datos5[0]['campo'] = 'paginas';
            $datos5[0]['dato'] = $value;
            $datos5[1]['campo'] = 'empresa';
            $datos5[1]['dato'] = $empresa[0]['id_empresa'];
            $datos5[2]['campo'] = 'usuario';
            $datos5[2]['dato'] = $usuario[0]['id_usuario'];
        $this->modelo->add('accesos_empresa',$datos5,$db['id_principal']);
            
        }

        

       
       return 1;
  }


function cantidad_documentos()
{
    $f = $this->modelo->facturas();
    $r = $this->modelo->retenciones();
    $g = $this->modelo->guia_remision();
    $n = $this->modelo->nota_credito();
    $ruc = $_SESSION['INICIO']['RUC_EMPRESA'];
    $datos = $this->modelo->buscar_empresa($ruc);
    $saldo = 'Ilimiatado';
    if($datos['pvpDoc']!='.')
    {
        $saldo = '$'.$datos['Plan'];
    }
    // print_r($datos);die();

    return array('f'=>$f[0]['cant'],'r'=>$r[0]['cant'],'n'=>$n[0]['cant'],'g'=>$g[0]['cant'],'saldo'=>$saldo);
}

function saldo_empresa()
{    
    $ruc = $_SESSION['INICIO']['RUC_EMPRESA'];
    $datos = $this->modelo->buscar_empresa($ruc);
    $saldo = 'Ilimiatado';
    $pvp = 0;
    $bloquear = 0;
    // print_r($datos);die();
    if($datos['pvpDoc']!='.')
    {
        $saldo = $datos['Plan'];
        $pvp = $datos['pvpDoc'];
    }
    $bloquear = $datos['bloquear'];

    return array('saldo'=>$saldo,'pvpdoc'=>$pvp,'bloquear'=>$bloquear);

}

function carga_masiva($file)
{
    print_r($file);die();

}
  // function menu_lateral_dba($parametros)
  // {
  //   // print_r($parametros);die();
  //    $item = '<a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.html">
  //               <div class="sidebar-brand-icon rotate-n-15">
  //                   <i class="fas fa-laugh-wink"></i>
  //               </div>
  //               <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
  //           </a>
  //           <hr class="sidebar-divider my-0">';
  //   $menus = $this->modelo->menu_lateral_dba($_SESSION['INICIO']['ID_EMPRESA'],$menu=1,$submenu=false);
  //   foreach ($menus as $key => $value) {
  //       $submenus = $this->modelo->menu_lateral_dba($_SESSION['INICIO']['ID_EMPRESA'],$menu=false,$value['codigo']);
  //       if(count($submenus)==0)
  //       {
  //           $item.='<li class="nav-item">
  //                       <a class="nav-link" href="'.$value['link'].'">
  //                           '.$value['icono'].'
  //                           <span>'.$value['detalle'].'</span></a>
  //                   </li>';


  //       }else
  //       {
  //            $item.='<li class="nav-item active">
  //               <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#'.str_replace(' ','_',$value['detalle']).'" aria-expanded="true"
  //                   aria-controls="collapsePages">
  //                     '.$value['icono'].'                    
  //                    <span>'.$value['detalle'].'</span></a>
  //               </a>
  //               <div id="'.str_replace(' ','_',$value['detalle']).'" class="collapse" aria-labelledby="headingPages"
  //                   data-parent="#accordionSidebar">
  //                   <div class="bg-white py-2 collapse-inner rounded">';
  //                       foreach ($submenus as $key2 => $value2) {
  //                          foreach ($perimitido as $key3 => $value3) {
  //                              if($value2['codigo']==$value3['codigo'])
  //                              {
  //                                $item.='<a class="collapse-item" href="'.$value2['link'].'">'.$value2['detalle'].'</a>';
  //                              }
  //                          }
  //                       }
  //                   $item.='</div>
  //               </div>             
  //           </li>';

  //       }
  //   }
  //   return $item;


  // }


}

?>