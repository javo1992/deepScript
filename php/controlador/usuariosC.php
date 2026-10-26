<?php 
include('../modelo/usuariosM.php');
include('../modelo/sucursalesM.php');

// include('../db/codigos_globales.php');
/**
 * 
 */
$controlador = new usuariosC();
if(isset($_GET['lista']))
{
	$query = '';
	if(isset($_GET['q']))
	{
		$query = $_GET['q'];
	}
	echo json_encode($controlador->lista_custodio($query));
}
if(isset($_GET['buscar']))
{
	$query=$_POST['parametros'];
	echo json_encode($controlador->buscar_custodio($query));
}
if(isset($_GET['insertar']))
{
	echo json_encode($controlador->insertar_editar($_POST['parametros']));
}
if(isset($_GET['eliminar']))
{
	echo json_encode($controlador->eliminar($_POST['id']));
}
if(isset($_GET['listar']))
{
	$parametros = $_POST['parametros'];	
	echo json_encode($controlador->buscar_custodio($parametros));
}

if(isset($_GET['listar_todo']))
{
	$query = $_POST['id'];	
	echo json_encode($controlador->buscar_custodio_todo($query));
}

if(isset($_GET['cargar_imagen']))
{
   echo json_encode($controlador->guardar_foto($_FILES,$_POST));
}
if(isset($_GET['sucursales']))
{
	// $query = $_POST['id'];	
	echo json_encode($controlador->sucursales());
}
if(isset($_GET['tipo_usuario']))
{
	// $query = $_POST['id'];	
	echo json_encode($controlador->tipo_usuario());
}

if(isset($_GET['add_tipo_usu']))
{
	$parametros = $_POST['parametros'];	
	echo json_encode($controlador->add_tipo_usu($parametros));
}
class usuariosC
{
	private $modelo;
	private $sucursales;
	
	function __construct()
	{
		$this->modelo = new custodioM();
		$this->sucursales = new sucursalesM();
		
	}
	function lista_custodio($query)
	{
		$cambio = [];
		$lista = $this->modelo->lista_custodio($query);
		foreach ($lista as $key => $value) {
			$cambio[] =['id'=>$value['ID_PERSON'],'text'=>utf8_encode($value['PERSON_NOM'])];
		}
		return $cambio;
		
	}
	function buscar_custodio($parametros)
	{	  
			
	    $lista = $this->modelo->lista_custodio($parametros['buscar'],$parametros['id']);
	    return $lista;

	
	
	}

	function buscar_custodio_todo($buscar)
	{
		$lista = $this->modelo->buscar_custodio_todo($buscar);
		$lista = array_map(array($this->cod_global, 'transformar_array_encode'), $lista);		
		return $lista;
		 
	}
	function insertar_editar($parametros)
	{

		// print_r($parametros);die();
		$datos[0]['campo'] ='nombre';
		$datos[0]['dato']= $parametros['nombre'];
		$datos[1]['campo'] = 'ci_ruc';
		$datos[1]['dato']= strval($parametros['ci']);
		$datos[2]['campo'] = 'email';
		$datos[2]['dato']= $parametros['email'];
		$datos[3]['campo'] = 'nick';
		$datos[3]['dato']= $parametros['nick'];
		$datos[4]['campo'] = 'pass';
		$datos[4]['dato']= $parametros['pass'];
		$datos[5]['campo'] = 'sucursal';
		$datos[5]['dato']= $parametros['suc'];
		$datos[6]['campo'] = 'telefono';
		$datos[6]['dato']= strval($parametros['tel']);
		$datos[7]['campo'] = 'direccion';
		$datos[7]['dato']= $parametros['dir'];		
		$datos[8]['campo'] = 'id_empresa';
		$datos[8]['dato']= $_SESSION['INICIO']['ID_EMPRESA'];
		$suc = $this->sucursales->buscar_sucursales($_SESSION['INICIO']['ID_EMPRESA'],$query=false,$parametros['suc']);
		$datos[9]['campo'] = 'serie';
		$datos[9]['dato']= $suc[0]['serie_s'];
		$datos[10]['campo'] = 'tipo_usuario';
		$datos[10]['dato']= $parametros['tip'];
		
		if($parametros['id'] == '')
		{
			if(count($this->modelo->lista_custodio($query=false,$id=false,$parametros['ci']))==0)
			 {
			 	$datos = $this->modelo->insertar($datos);
			 	$clie = $this->modelo->lista_custodio($query=false,$id=false,$parametros['ci']);
			 	return $clie[0]['id'];
		        // $movimiento='Insertado nuevo registro en CUSTODIO ('.$parametros['nombre'].')';
			 }else
			 {
			 	$datos = -2;
			 }
	    }else
	    {
	    	$where[0]['campo']= 'id_usuario';
		    $where[0]['dato'] = $parametros['id'];
	    	$datos = $this->modelo->editar($datos,$where);
	    }
		
		return $datos;

	}

	function compara_datos($parametros)
	{
		$text ='';
		$marca = $this->modelo->buscar_custodio($parametros['id']);
		if($marca[0]['PERSON_NO']!=$parametros['per'])
		{
			$text.=' Se modifico CODIGO en CUSTODIO de '.$marca[0]['PERSON_NO'].' a '.$parametros['per'];
		}
		if ($marca[0]['PERSON_NOM']!= $parametros['nombre']) {
			$text.=' Se modifico NOMBRE en CUSTODIO de '.$marca[0]['PERSON_NOM'].' a '.$parametros['nombre'];
		}
		if ($marca[0]['PERSON_CI']!= $parametros['ci']) {
			$text.=' Se modifico CI en CUSTODIO de '.$marca[0]['PERSON_CI'].' a '.$parametros['ci'];
		}
		if ($marca[0]['PERSON_CORREO']!= $parametros['email']) {
			$text.=' Se modifico CORREO en CUSTODIO de '.$marca[0]['PERSON_CORREO'].' a '.$parametros['email'];
		}
		if ($marca[0]['PUESTO']!= $parametros['puesto']) {
			$text.=' Se modifico PUESTO en CUSTODIO de '.$marca[0]['PUESTO'].' a '.$parametros['puesto'];
		}
		if ($marca[0]['UNIDAD_ORG']!= $parametros['unidad']) {
			$text.=' Se modifico UNIDAD en CUSTODIO de '.$marca[0]['UNIDAD_ORG'].' a '.$parametros['unidad'];
		}

		return $text;
		
	}

	function eliminar($id)
	{
		$datos[0]['campo']='id_usuario';
		$datos[0]['dato']=$id;
		$datos = $this->modelo->eliminar($datos);		
		return $datos;		

	}

	function guardar_foto($file,$post)
	 {
	    $ruta='../img/usuarios/';//ruta carpeta donde queremos copiar las imágenes
	    if (!file_exists($ruta)) {
	       mkdir($ruta, 0777, true);
	    }
	    if($this->validar_formato_img($file)==1)
	    {
	         $uploadfile_temporal=$file['file_img']['tmp_name'];
	         $tipo = explode('/', $file['file_img']['type']);
	         $nombre = $post['id'].'.'.$tipo[1];	        
	         $nuevo_nom=$ruta.$nombre;
	         if (is_uploaded_file($uploadfile_temporal))
	         {
	           move_uploaded_file($uploadfile_temporal,$nuevo_nom);
	          
	              $datosI[0]['campo']='foto';
	              $datosI[0]['dato'] = $nuevo_nom;
	              $where[0]['campo'] = 'id_usuario';
	              $where[0]['dato'] = $post['id'];
	              $base = $this->modelo->editar($datosI,$where);
	           if($base==1)
	           {
	            return 1;
	           }else
	           {
	            return -1;
	           }

	         }
	         else
	         {
	           return -1;
	         } 
	     }else
	     {
	      return -2;
	     }

	  }
 function validar_formato_img($file)
  {
    switch ($file['file_img']['type']) {
      case 'image/jpeg':
      case 'image/pjpeg':
      case 'image/gif':
      case 'image/png':
         return 1;
        break;      
      default:
        return -1;
        break;
    }

  }

  function sucursales()
  {
  	$datos = $this->sucursales->lista_sucursales($query=false,$_SESSION['INICIO']['ID_EMPRESA']);
  	$op = '<option value="">Seleccione sucursal</option>';
  	foreach ($datos as $key => $value) {
  		$op.= '<option value="'.$value['id'].'">'.$value['nombre'].'</option>';
  	}
  	return $op;
  }

  function tipo_usuario()
  {
  	 $datos = $this->modelo->tipo_usuario();
  	 return $datos;
  }
  function add_tipo_usu($parametros)
  {
  	$datos[0]['campo'] ='tipo_usuario';
		$datos[0]['dato']= $parametros['tipo'];
		$datos[1]['campo'] = 'empresa';
		$datos[1]['dato']= $_SESSION['INICIO']['ID_EMPRESA'];
		return $this->modelo->insertar_all('tipo_usuario',$datos);

  }


}
?>