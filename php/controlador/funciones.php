<?php
include('../modelo/loginM.php');
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
if(isset($_GET['notificaciones']))
{
    // $parametros = $_POST['parametros'];
    echo json_encode($controlador->notificaciones());
}

if(isset($_GET['notificado_leido']))
{
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->notificado_leido($parametros));
}

if(isset($_GET['ver_notificado']))
{
    $parametros = $_POST['parametros'];
    echo json_encode($controlador->ver_notificado($parametros));
}

class funcionesC
{
	private $modelo;
	function __construct()
	{
		$this->modelo = new loginM();
	}
	

  function session($parametros)
    {
      $result = $this->modelo->usuario_exist($parametros);
      if($result==true)
      {
        $datos = $this->modelo->usuario_datos($parametros);
        return array('res'=>$result,'datos'=>$datos);
      }
      return array('res'=>$result,'datos'=>'');
    }

  function notificaciones()
  {
    $usuario = $this->modelo->notificaciones_usuario(1,0);
    $noti_all = $this->modelo->notificaciones_usuario();


    $noti = '';
    $num = 0;
    // print_r($usuario);die();
    foreach ($noti_all as $key => $value) {
    if(is_object($value['fecha']))
    {
        $value['fecha'] = $value['fecha']->format('Y-m-d');
    }
        $noti.= '
        <a class="dropdown-item preview-item" onclick="ver_notificado('.$value['id_noti'].')">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">'.$value['titulo'].'</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    '.$value['fecha'].'
                  </p>
                </div>
              </a>';
            $num=$num+1;
    }

    $datos = array('noti'=>$noti,'num'=>$num,'data'=>$usuario);
    return $datos;

  }

  function notificado_leido($parametros)
  {
     return $this->modelo->notificaciones_leida($parametros['id']);
  } 

  function ver_notificado($parametros)
  {
     $data =  $this->modelo->notificaciones_usuario(0,0,$parametros['id']);
     // print_r($data);die();
     return $data;
  }

}

?>