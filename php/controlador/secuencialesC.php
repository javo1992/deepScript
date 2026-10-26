<?php 
include('../modelo/secuencialesM.php');
/**
 * 
 */
$controlador = new secuencialesC();
if(isset($_GET['lista']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->lista_secuenciales($parametros));
}
if(isset($_GET['buscar']))
{
	echo json_encode($controlador->buscar_secuenciales($_POST['buscar']));
}
if(isset($_GET['guardar_editar']))
{
	echo json_encode($controlador->guardar_editar($_POST['parametros']));
}
if(isset($_GET['delete_secuencial']))
{
	echo json_encode($controlador->eliminar($_POST['parametros']));
}
if(isset($_GET['secuenciales']))
{
	$query='';
	if(isset($_GET['q']))
	{
		$query= $_GET['q'];
	}
	echo json_encode($controlador->buscar_secuenciales_auto($query));

}


class secuencialesC
{
	private $modelo;
	
	function __construct()
	{
		$this->modelo = new secuencialesM();
		
	}
	function lista_secuenciales($parametros)
	{
		$datos = $this->modelo->lista_secuenciales();
		$tr = "";
		foreach ($datos as $key => $value) {
			$s1 = '';$s2 = '';$s3 = '';$s4 = '';$s5 = '';
			switch ($value['tipo']) {
				case 'FA': $s1 = 'selected'; break;
				case 'LC': $s2 = 'selected'; break;
				case 'RE': $s3 = 'selected'; break;
				case 'NC': $s4 = 'selected'; break;				
				case 'GR': $s5 = 'selected'; break;
			}
			if($value['Serie']!=''){$serie = explode('-',$value['Serie']);}else{$serie = array('','');}
			$tr.='<tr>
					<td><select class="form-select" id="ddl_tipo_'.$value['id_secuenciales'].'" name="ddl_tipo_'.$value['id_secuenciales'].'">
            				<option value="FA" '.$s1.'>Factura</option>
            				<option value="LC" '.$s2.'>Liquidacion de compras</option>
            				<option value="RE" '.$s3.'>Rerencion</option>
            				<option value="NC" '.$s4.'>Nota de credito</option>
            				<option value="GR" '.$s5.'>Guia de remision</option>
            			</select>
                    </td>
                    <td>'.$value['detalle_secuencial'].'</td>
                    <td>'.$value['Autorizacion'].'</td>
                    <td>
                    	<div class="row">
                    		<div class="col-sm-5" style="padding-left:0px">
                        		<input type="" name="estab_'.$value['id_secuenciales'].'" id="estab_'.$value['id_secuenciales'].'" class="form-control form-control-sm" value="'.$serie[0].'">
                        	</div>
                        	<div class="col-sm-1" style="padding:0px">
                        	-
                        	</div>
                        	<div class="col-sm-5" style="padding-left:0px">
                        		<input type="" name="punto_'.$value['id_secuenciales'].'" id="punto_'.$value['id_secuenciales'].'" class="form-control form-control-sm" value="'.$serie[1].'">
                        	</div>
                        </div>
                    </td>
                    <td><input type="" name="numero_'.$value['id_secuenciales'].'" id="numero_'.$value['id_secuenciales'].'" class="form-control form-control-sm" value="'.$value['numero'].'">
                    </td>
                    <td>
                    <button class="btn btn btn-primary btn-sm" onclick="editar(\''.$value['id_secuenciales'].'\')"><i class="fa fa-save"></i></button>
                    <button class="btn btn btn-danger btn-sm" onclick="eliminar(\''.$value['id_secuenciales'].'\')"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>';
		}
		return $tr;
	}
	function buscar_secuenciales($buscar)
	{
		$datos = $this->modelo->buscar_secuenciales($buscar);
		return $datos;
	}
	
	function eliminar($parametros)
	{
		$datos[0]['campo']='id_secuenciales';
		$datos[0]['dato']=$parametros['id'];
		$datos = $this->modelo->eliminar('codigos_secuenciales',$datos,$_SESSION['INICIO']['ID_EMPRESA']);		
		return $datos;

	}
	function buscar_secuenciales_auto($query)
	{
		$datos = $this->modelo->buscar_secuenciales($query);
		$respuesta = array();
		foreach ($datos as $key => $value) {
			$respuesta[] = array('id'=>$value['ID_secuenciales'],'text'=>$value['DESCRIPCION']);
		}

		return $respuesta;

	}

	function guardar_editar($parametros)
	{
		if($parametros['id']=='')
		{
			$detalle =  $parametros['tipo'].'_SERIE_'.$parametros['estab'].''.$parametros['punto'];
			$veri = $this->modelo->lista_secuenciales($id=false,$detalle);
			if(count($veri)==0)
			{
				$datos[0]['campo']= 'Serie';
				$datos[0]['dato']= $parametros['estab'].'-'.$parametros['punto'];
				$datos[1]['campo']= 'numero';
				$datos[1]['dato']= $parametros['numero'];
				$datos[2]['campo']= 'Autorizacion';
				$datos[2]['dato']= $parametros['autorizacion'];
				$datos[3]['campo']= 'detalle_secuencial';
				$datos[3]['dato']= $detalle;
				$datos[4]['campo']= 'id_empresa';
				$datos[4]['dato']= $_SESSION['INICIO']['ID_EMPRESA'];
				$datos[5]['campo']= 'tipo';
				$datos[5]['dato']= $parametros['tipo'];
				return $this->modelo->add('codigos_secuenciales',$datos,$_SESSION['INICIO']['ID_EMPRESA']);
			}else
			{
				return -2;
			}

		}else
		{
			$datos[0]['campo']= 'Serie';
			$datos[0]['dato']= $parametros['estab'].'-'.$parametros['punto'];
			$datos[1]['campo']= 'numero';
			$datos[1]['dato']= $parametros['numero'];
			$datos[2]['campo']= 'detalle_secuencial';
			$datos[2]['dato']= $parametros['tipo'].'_SERIE_'.$parametros['estab'].''.$parametros['punto'];;
			$datos[3]['campo']= 'tipo';
			$datos[3]['dato']= $parametros['tipo'];
			

			$datosw[0]['campo']= 'id_secuenciales';
			$datosw[0]['dato']= $parametros['id'];
			return $this->modelo->editar('codigos_secuenciales',$datos,$datosw,$_SESSION['INICIO']['ID_EMPRESA']);
		}
		print_r($parametros);die();

	}
}
?>