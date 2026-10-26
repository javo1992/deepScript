<?php 
include(dirname(__DIR__).'/modelo/modulos_paginasM.php');

/**
 * 
 */
$controlador = new modulos_paginasC();
if(isset($_GET['buscar_cliente_x_ci']))
{
	// print_r($_POST);die();
	$query = $_POST['q'];
	echo json_encode($controlador->buscar_cliente_x_ci($query));
}
if(isset($_GET['modulos']))
{
	// $parametros = $_POST['parametros'];
	echo json_encode($controlador->modulos());
}
if(isset($_GET['modulos_ddl']))
{
	// $parametros = $_POST['parametros'];
	echo json_encode($controlador->modulos_ddl());
}
if(isset($_GET['paginas']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->paginas($parametros));
}
if(isset($_GET['guardar_editar']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->guardar_editar($parametros));
}

if(isset($_GET['guardar_editar_pag']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->guardar_editar_pag($parametros));
}

if(isset($_GET['eliminar']))
{
	$id = $_POST['parametros'];
	echo json_encode($controlador->eliminar($id));
}
class modulos_paginasC
{
	private $modelo;
	function __construct()
	{
	  $this->modelo = new modulos_paginasM();
	}

	function modulos()
	{
		$id_empresa = $_SESSION['INICIO']['ID_EMPRESA'];
		$datos = $this->modelo->menu($id_empresa,$menu=1,$submenu=false);
		$tr = '';
		foreach ($datos as $key => $value) {
			$tr.='<tr><td width="2%">
	  					<input value="'.$value['codigo'].'" class="form-control form-control-sm" id="txt_codigo'.$value['id_menu'].'">
	  				</td>
	  				<td>
	  					<input value="'.$value['detalle'].'" class="form-control form-control-sm" id="txt_modulo'.$value['id_menu'].'">
	  				</td>
	  				<td>
	  					<input value="'.$value['link'].'" class="form-control form-control-sm" id="txt_link'.$value['id_menu'].'">
	  				</td>
	  				<td>
	  				<div class="input-group">
                            <input value=\''.str_replace("'",'"',$value['icono']).'\' class="form-control form-control-sm" id="txt_icono'.$value['id_menu'].'">
                            <div class="input-group-append">
                                <button class="btn btn-primary btn-sm" type="button">
                                   '.$value['icono'].'
                                </button>
                            </div>
                        </div>

	  				
	  					
	  				</td>
	  				<td>
	  					<button class="btn btn-sm btn-danger" onclick="delete_datos(\''.$value['id_menu'].'\',\''.$value['codigo'].'\')"><i class="fa fa-trash"></i></button>
	  					<button class="btn btn-sm btn-primary" onclick="guardar_editar(\''.$value['id_menu'].'\')"><i class="fa fa-save"></i></button>
	  				</td>
	  			</tr>';
		}
		return $tr;
	}

						


	function guardar_editar($parametros)
	{
		$id_empresa = $_SESSION['INICIO']['ID_EMPRESA'];
		$menu = $this->modelo->menu($id_empresa,$menu=false,$submenu=false,$parametros['codigo']);

		$datos[0]['campo']='detalle';
		$datos[0]['dato']=$parametros['nombre'];
		$datos[1]['campo']='link';
		$datos[1]['dato']=$parametros['link'];
		$datos[2]['campo']='icono';
		$datos[2]['dato']=str_replace('"',"'",$parametros['icono']);
		$datos[3]['campo']='codigo';
		$datos[3]['dato']=$parametros['codigo'];

		if($parametros['id']=='')
		{
			if(count($menu)==0)
			{
				return $this->modelo->add('menu',$datos);
			}else
			{
				return -2;
			}

		}else
		{
			$where[0]['campo'] = 'id_menu';
			$where[0]['dato'] = $parametros['id'];
			return $this->modelo->update('menu',$datos,$where);

		}
	}

	function guardar_editar_pag($parametros)
	{

		// print_r($parametros);die();
		$id_empresa = $_SESSION['INICIO']['ID_EMPRESA'];
		
	
		$datos[0]['campo']='detalle';
		$datos[0]['dato']=$parametros['nombre'];
		$datos[1]['campo']='link';
		$datos[1]['dato']=$parametros['link'];
		$datos[2]['campo']='codigo';
		$datos[2]['dato']=$parametros['modulo'];

		if($parametros['id']=='')
		{
				$nue = $this->modelo->pagina_max($id_empresa,$parametros['modulo']);
				if($nue[0]['codigo']==0){ $nue[0]['codigo']= $parametros['modulo'];}
				$datos[2]['campo']='codigo';
			    $datos[2]['dato']=number_format($nue[0]['codigo']+0.1,2);

		
				return $this->modelo->add('menu',$datos);
			

		}else
		{
			$menu = $this->modelo->paginas($id_empresa,$menu=false,$submenu=false,$menucodigo=false,$submenulike=false,$id_menu=$parametros['id']);
			if(substr($menu[0]['codigo'],0,1)!=$parametros['modulo'])
			{
				$nue = $this->modelo->pagina_max($id_empresa,$parametros['modulo']);
				if($nue[0]['codigo']==0){ $nue[0]['codigo']= $parametros['modulo'];}
				$datos[2]['campo']='codigo';
			   $datos[2]['dato']=number_format($nue[0]['codigo']+0.1,2);
			}else
			{
				$datos[2]['campo']='codigo';
			   $datos[2]['dato']=$menu[0]['codigo'];
				// print_r($menu);
			}


			$where[0]['campo'] = 'id_menu';
			$where[0]['dato'] = $parametros['id'];

			// print_r($parametros);
			// print_r($datos);die();
			return $this->modelo->update('menu',$datos,$where);

		}
	}

	function eliminar($parametros)
	{
		$id = $parametros['id'];
		if($parametros['cod']=='false')
		{
			return $this->modelo->eliminar($id);
		}else
		{
				$id_empresa = $_SESSION['INICIO']['ID_EMPRESA'];
				$menu = $this->modelo->menu($id_empresa,$menu=false,$submenu=$parametros['cod'],$menu_id =false);
				// print_r($menu);die();
				if(count($menu)==0)
				{
				  return $this->modelo->eliminar($id);
				}else
				{
					return -2;
				}

		}

	}

	function paginas($parametros)
	{
		$id_empresa = $_SESSION['INICIO']['ID_EMPRESA'];
		$tr='';
		$datos = $this->modelo->paginas($id_empresa,$menu=false,$submenu=1,$menu_id=false,$submenuLike=$parametros['modulo']);
		foreach ($datos as $key => $value) {
			$tr.='<tr>
	  				<td><input type="" name="" class="form-control form-control-sm" value="'.$value['detalle'].'" id="txt_pag'.$value['id_menu'].'"></td>
	  				<td>
	  					<select class="form-control-sm form-select" id="ddl_modulos_ddl'.$value['id_menu'].'">
			  				'.$this->modulos_ddl_pag(substr($value['codigo'],0,1)).'
			  			</select>
	  					
	  				</td>
	  				<td><input type="" name="" class="form-control form-control-sm" value="'.$value['link'].'" id="txt_lin'.$value['id_menu'].'"></td>
	  				<td>
	  					<button class="btn btn-danger btn-sm" onclick="delete_datos(\''.$value['id_menu'].'\')"><i class="fa fa-trash"></i></button>
	  					<button class="btn btn-primary btn-sm" onclick="guardar_editar_pag(\''.$value['id_menu'].'\')"><i class="fa fa-save"></i></button>
	  				</td>			  				
	  			</tr>';
		}
		return $tr;
	}

	function modulos_ddl()
	{
		$id_empresa = $_SESSION['INICIO']['ID_EMPRESA'];
		$tr ='<option value="">Seleccione Modulo</option>';
		$datos = $this->modelo->menu($id_empresa,$menu=1,$submenu=false);
		foreach ($datos as $key => $value) {
			$tr.='<option value="'.$value['codigo'].'">'.$value['detalle'].'</option>';
		}
		return $tr;
	}

	function modulos_ddl_pag($codigo)
	{
		$id_empresa = $_SESSION['INICIO']['ID_EMPRESA'];
		$tr ='<option value="">Seleccione Modulo</option>';
		$datos = $this->modelo->menu($id_empresa,$menu=1,$submenu=false);
		foreach ($datos as $key => $value) {
			if($codigo==$value['codigo'])
			{
				$tr.='<option value="'.$value['codigo'].'" selected="">'.$value['detalle'].'</option>';
			}else
			{
				$tr.='<option value="'.$value['codigo'].'">'.$value['detalle'].'</option>';
			}
		}
		return $tr;
	}


}

?>