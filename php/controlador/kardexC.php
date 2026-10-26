<?php 
include('../modelo/kardexM.php');
/**
 * 
 */
$controlador = new kardexC();
if(isset($_GET['lista']))
{
	$parametros = $_POST['parametros'];
	echo json_encode($controlador->lista($parametros));
}


class kardexC
{
	private $modelo;
	function __construct()
	{
		$this->modelo = new kardexM();
		
	}
	function lista($parametros)
	{
		// print_r($parametros);die();
		$datos = $this->modelo->lista($parametros['arti'],$parametros['desde'],$parametros['hasta']);
		$tr = '';
		foreach ($datos as $key => $value) {
			$tr.='<tr>
			<td>'.$value['nombre'].'</td>
			<td>'.$value['fecha'].'</td>
			<td>'.$value['entrada'].'</td>
			<td>'.$value['salida'].'</td>
			<td>'.$value['existencias'].'</td>
			<td>'.number_format(floatval($value['valor_unitario']),2,'.','').'</td>
			<td>'.number_format(floatval($value['total_iva']),2,'.','').'</td>
			<td>'.number_format(floatval($value['subtotal']),2,'.','').'</td>
			<td>'.number_format(floatval($value['valor_total']),2,'.','').'</td>
			<td>'.number_format(floatval($value['costo']),2,'.','').'</td>
			<td>'.$value['Factura'].'</td>
			<td>'.$value['detalle'].'</td>
			</tr>';
		}

		return $tr;
	}
	
}
?>