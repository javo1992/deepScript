<?php 
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;




use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;


use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

use PhpOffice\PhpSpreadsheet\RichText\RichText;
use PhpOffice\PhpSpreadsheet\Style\Color;

use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
// use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\Style;
// use PhpOffice\PhpSpreadsheet\Style\Font;
// use PhpOffice\PhpSpreadsheet\Style\Protection;
use PhpOffice\PhpSpreadsheet\Cell\DataType;




include('../modelo/lista_articulosM.php');
// include('../modelo/localizacionM.php');
// include('../modelo/marcasM.php');
// include('../modelo/custodioM.php');
// include('../modelo/proyectosM.php');
// include('../modelo/estadoM.php');
// include('../modelo/generoM.php');
// include('../modelo/coloresM.php');
// include('../modelo/kardexM.php');
include('../modelo/clienteM.php');

/**
 * 
 */
$reporte = new Reporte_excel();
// if(isset($_GET['reporte_sap']))
// {
// 	$reporte->Reporte_sap($_GET['query'],$_GET['loc'],$_GET['cus'],$_GET['desde'],$_GET['hasta']);
// 	// $reporte-> ejemplo();
// }
// if(isset($_GET['reporte_normal']))
// {
// 	$reporte->Reporte_normal($_GET['query'],$_GET['loc'],$_GET['cus']);
// 	// $reporte-> ejemplo();
// }
// if(isset($_GET['reporte_emplazamiento']))
// {
// 	$reporte->reporte_localizacion();
// 	// $reporte-> ejemplo();
// }
// if(isset($_GET['reporte_marca']))
// {
// 	$reporte->reporte_marca();
// 	// $reporte-> ejemplo();
// }
// if(isset($_GET['reporte_custodio']))
// {
// 	$reporte->reporte_custodio();
// 	// $reporte-> ejemplo();
// }
if(isset($_GET['ListaArticulos']))
{
	$reporte->ListaArticulos();
	// $reporte-> ejemplo();
}
if(isset($_GET['ListaCliente']))
{
	$reporte->ListaCliente();
	// $reporte-> ejemplo();
}
// if(isset($_GET['reporte_genero']))
// {
// 	$reporte->reporte_genero();
// 	// $reporte-> ejemplo();
// }
// if(isset($_GET['reporte_colores']))
// {
// 	$reporte->reporte_color();
// 	// $reporte-> ejemplo();
// }

// if(isset($_GET['reporte_kardex']))
// {
// 	$parametros = $_GET;
// 	$reporte->reporte_kardex($parametros);
// 	// $reporte-> ejemplo();
// }


class Reporte_excel
{
	private $articulos;
	private $cliente;
	
	function __construct()
	{
		$this->articulos = new lista_articulosM();
		// $this->localizacion = new localizacionM();
		// $this->marcas = new marcasM();
		// $this->custodio = new custodioM();
		// $this->proyectos = new proyectosM();

		// $this->estado = new estadoM();
		// $this->genero = new generoM();
		// $this->colores = new coloresM();
		// $this->kardex = new kardexM();		

		$this->cliente = new clienteM();
	}

	function Reporte_sap($query,$loc,$cus,$desde,$hasta)
	{
		//$tipoString = \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING;
		$ruta='';
		if($query == 'null')
		{
			$query ='';
		}
		if($loc == 'null')
		{
			$loc ='';
		}
		if($cus == 'null')
		{
			$cus ='';
		}
		

		$datos = $this->articulos->lista_articulos_sap_codigos($query,$loc,$cus,false,false,1,$desde,$hasta);
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->getStyle('W')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
		$sheet->getStyle('I')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
		
		$sheet->setCellValue('A1','BUKRS');
		$sheet->setCellValue('B1','ANLN1');
		$sheet->setCellValue('C1','ANLN2');
		$sheet->setCellValue('D1','TXT50');
		$sheet->setCellValue('E1','TXTA50');
		$sheet->setCellValue('F1','ANLHTXT');		
		$sheet->setCellValue('G1','SERNR');		
		$sheet->setCellValue('H1','INVNR');
		$sheet->setCellValue('I1','IVDAT');
		$sheet->setCellValue('J1','MERGE');
		$sheet->setCellValue('K1','MEINS');
		$sheet->setCellValue('L1','STORT');
		$sheet->setCellValue('M1','KTEXT');
		$sheet->setCellValue('N1','PERNR');
		$sheet->setCellValue('O1','PERNP_TXT');
		$sheet->setCellValue('P1','ORD41');
		$sheet->setCellValue('Q1','ORD42');
		$sheet->setCellValue('R1','ORD43');
		$sheet->setCellValue('S1','ORD44');
		$sheet->setCellValue('T1','GDLGRP');
		$sheet->setCellValue('U1','ANLUE');
		$sheet->setCellValue('V1','AIBN1');
		$sheet->setCellValue('W1','AKTIV');
		$sheet->setCellValue('X1','URWRT');
		$sheet->setCellValue('Y1','');		
		$sheet->setCellValue('Z1','NOTE1');
		$sheet->setCellValue('AA1','IMAGEN');
		$sheet->setCellValue('AB1','ACTUALIZADO POR');
		$count = 2;

		foreach ($datos as $key => $value) {
			//print_r($value);die();
		// $fecha = $value['FECHA_INV_DATE']->format('Y-m-d');
		    $fecha='';
			if($value['FECHA_INV_DATE'] !='')
			{
				$fecha =$value['FECHA_INV_DATE']->format('Y-m-d');
				$fecha = new DateTime($fecha);
				$fecha = \PhpOffice\PhpSpreadsheet\Shared\Date::PHPToExcel($fecha);
			}
			$fechaC='';
			if($value['ORIG_ACQ_YR'] !='')
			{
				$fechaC =$value['ORIG_ACQ_YR']->format('Y-m-d'); 
				$fechaC = new DateTime($fechaC);
				$fechaC = \PhpOffice\PhpSpreadsheet\Shared\Date::PHPToExcel($fechaC);

			}


		$sheet->setCellValue('A'.$count,$value['COMPANYCODE']);
		$sheet->setCellValue('B'.$count,$value['TAG_SERIE']);
		$sheet->setCellValue('C'.$count,$value['SUBNUMBER']);
		$sheet->setCellValue('D'.$count,utf8_decode($value['DESCRIPT']));
		$sheet->setCellValue('E'.$count,$value['DESCRIPT2']);
		$sheet->setCellValue('F'.$count,$value['MODELO']);		
		$sheet->setCellValue('G'.$count,$value['SERIE']);		
		$sheet->setCellValue('H'.$count,$value['TAG_UNIQUE']);
		$sheet->setCellValue('I'.$count,$fecha);
		$sheet->setCellValue('J'.$count,$value['QUANTITY']);
		$sheet->setCellValue('K'.$count,$value['BASE_UOM']);
		$sheet->setCellValue('L'.$count,$value['EMPLAZAMIENTO']);
		$sheet->setCellValue('M'.$count,utf8_encode($value['DENOMINACION']));
		$sheet->setCellValue('N'.$count,$value['PERSON_NO']);
		$sheet->setCellValue('O'.$count,utf8_decode($value['PERSON_NOM']));
		$sheet->setCellValue('P'.$count,$value['marca']);
		$sheet->setCellValue('Q'.$count,$value['estado']);
		$sheet->setCellValue('R'.$count,$value['genero']);
		$sheet->setCellValue('S'.$count,$value['color']);
		$sheet->setCellValue('T'.$count,$value['criterio']);
		$sheet->setCellValue('U'.$count,$value['ASSETSUPNO']);
		$sheet->setCellValue('V'.$count,$value['ORIG_ASSET']);
		$sheet->setCellValue('W'.$count,$fechaC);
		$sheet->setCellValue('X'.$count,$value['ORIG_VALUE']);
		$sheet->setCellValue('Y'.$count,$value['OBSERVACION']);		
		$sheet->setCellValue('Z'.$count,utf8_decode($value['CARACTERISTICA']));
		$sheet->setCellValue('AA'.$count,$value['IMAGEN']);
		$sheet->setCellValue('AB'.$count,$value['ACTU_POR']);
		$count = $count+1;
	  }


	    $write = new Xlsx($spreadsheet);
		$write->save('Reporte_activos.xlsx');
		echo "<meta http-equiv='refresh' content='0;url=Reporte_activos.xlsx'/>";
		exit;
		
		

	      // NOMBRE DEL ARCHIVO Y CHARSET
	      //header("Content-type: application/vnd.ms-excel");
         // header("Content-Disposition: attachment; filename=INVENTARIO.xls");
         // header("Pragma: no-cache");
          //header("Expires: 0");


          // $salida=fopen('php://output', 'w');

    }


	function Reporte_normal($query,$loc,$cus)
	{
		if($query == 'null')
		{
			$query ='';
		}
		if($loc == 'null')
		{
			$loc ='';
		}
		if($cus == 'null')
		{
			$cus ='';
		}

	  // NOMBRE DEL ARCHIVO Y CHARSET
	    header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=INVENTARIO.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

          // $salida=fopen('php://output', 'w');

          $salida = '<table class="table table-striped">
	  <thead>
		<th>Tag</th>
		<th>Decripcion</th>
		<th>Modelo</th>
		<th>Serie</th>
		<th>Localizacion</th>
		<th>Custodio</th>
		<th>Marca</th>
		<th>Estado</th>
		<th>Genero</th>
		<th>Color</th>
		<th>Observacion</th>
		<th>Fecha inventario</th>
	  </thead>
	  <tbody>';
	  $datos =  $this->articulos->lista_articulos($query,$loc,$cus);
	  // print_r($datos);die();
	  foreach ($datos as $key => $value) {
		// $fecha = $value['FECHA_INV_DATE']->format('Y-m-d');
		$fecha='';
			if($value['fecha_in'] !='')
			{
				$fecha =$value['fecha_in']->format('Y-m-d'); 
			}

	  $salida.='<tr><td>'.$value['tag'].'</td>'.
	  '<td>'.$value['nom'].'</td>'.
	  '<td>'.$value['modelo'].'</td>'.
	  '<td>'.$value['serie'].'</td>'.
	  '<td>'.$value['localizacion'].'</td>'.
	  '<td>'.$value['custodio'].'</td>'.
	  '<td>'.$value['marca'].'</td>'.
	  '<td>'.$value['estado'].'</td>'.
	  '<td>'.$value['genero'].'</td>'.
	  '<td>'.$value['color'].'</td>'.
	  '<td>'.$value['OBSERVACION'].'</td>'.
	  '<td>'.$fecha.'</td>';
	  }
	  $salida.='</tbody>
       </table>';
      echo $salida;
    }

    function reporte_localizacion()
    {
    	$datos = $this->localizacion->lista_localizacion_todo();
    	//print_r($datos);die();
    	$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1','Centro');
		$sheet->setCellValue('B1','Emplazamiento');
		$sheet->setCellValue('C1','Denominacion');
		$count = 2;
		foreach ($datos as $key => $value) {
			$sheet->setCellValue('A'.$count,$value['CENTRO']);
		    $sheet->setCellValue('B'.$count,$value['EMPLAZAMIENTO']);
		    $sheet->setCellValue('C'.$count,$value['DENOMINACION']);
		    $count = $count+1;
		}
		 $write = new Xlsx($spreadsheet);
		 $write->save('Reporte_emplazamiento.xlsx');
		 echo "<meta http-equiv='refresh' content='0;url=Reporte_emplazamiento.xlsx'/>";
		 exit;
		


    }

     function reporte_marca()
    {
    	$datos = $this->marcas->lista_marcas();
    	//print_r($datos);die();
    	$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1','CODIGO SAP');
		$sheet->setCellValue('B1','DESCRIPCION SAP');
		$count = 2;
		foreach ($datos as $key => $value) {
			$sheet->setCellValue('A'.$count,$value['CODIGO']);
		    $sheet->setCellValue('B'.$count,$value['DESCRIPCION']);
		    $count = $count+1;
		}
		 $write = new Xlsx($spreadsheet);
		 $write->save('Reporte_MARCAS.xlsx');
		 echo "<meta http-equiv='refresh' content='0;url=Reporte_MARCAS.xlsx'/>";
		 exit;
		


    }

     function reporte_custodio()
    {
    	$datos = $this->custodio->buscar_custodio_todo();
    	//print_r($datos);die();
    	$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->setCellValue('A1','ID Externo del Personal');
		$sheet->setCellValue('B1','Numero de Identificacion');
		$sheet->setCellValue('C1','Apellidos y Nombres');
		$sheet->setCellValue('D1','Codigo de Puesto (Label)');
		$sheet->setCellValue('E1','Unidad Organizacional (Label)');
		$sheet->setCellValue('F1','Correo Electronico');
		$count = 2;
		foreach ($datos as $key => $value) {
			$sheet->setCellValue('A'.$count,$value['PERSON_NO']);
		    $sheet->setCellValue('B'.$count,$value['PERSON_CI']);
		    $sheet->setCellValue('C'.$count,$value['PERSON_NOM']);
		    $sheet->setCellValue('D'.$count,$value['PUESTO']);
		    $sheet->setCellValue('E'.$count,$value['UNIDAD_ORG']);
		    $sheet->setCellValue('F'.$count,$value['PERSON_CORREO']);
		    $count = $count+1;
		}
		 $write = new Xlsx($spreadsheet);
		 $write->save('Reporte_CUSTODIO.xlsx');
		 echo "<meta http-equiv='refresh' content='0;url=Reporte_CUSTODIO.xlsx'/>";
		 exit;
		


    }

    function ListaArticulos()
    {
    	$datos = $this->articulos->detalle_articulos_all_busqueda($_SESSION['INICIO']['ID_EMPRESA'],$id=false,$query=false,$categoria=false,0);
    	// print_r($datos);die();
    	$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		// $sheet->getStyle('E')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
		// $sheet->getStyle('F')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
		// $sheet->getStyle('G')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->setCellValue('A1','Referencia');
		$sheet->setCellValue('B1','Articulo');
		$sheet->setCellValue('C1','Precio');
		$sheet->setCellValue('D1','Lleva iva');
		$sheet->setCellValue('E1','Stock');
		$sheet->setCellValue('F1','es Servicio');
		$sheet->setCellValue('G1','Lleva inventario');
		$sheet->setCellValue('H1','producto final');
		$sheet->setCellValue('I1','peso');
		$sheet->setCellValue('J1','categoria');
		$sheet->setCellValue('K1','cod_auxiliar');
		$sheet->setCellValue('L1','codigo barras');
		$sheet->setCellValue('M1','marca');
		$sheet->setCellValue('N1','modelo');
		$sheet->setCellValue('O1','serie');
		$sheet->setCellValue('P1','estado');
		$sheet->setCellValue('Q1','genero');
		$sheet->setCellValue('R1','unidad medida');
		$sheet->setCellValue('S1','RFID');
		$sheet->setCellValue('T1','Description');
		$count = 2;
		foreach ($datos as $key => $value) {
				$sheet->setCellValue('A'.$count,$value['referencia']);
		    $sheet->setCellValue('B'.$count,$value['nombre']);
		    $sheet->setCellValue('C'.$count,$value['precio']);
		    $sheet->setCellValue('D'.$count,$value['iva']);
		    $sheet->setCellValue('E'.$count,$value['stock']);
		    $sheet->setCellValue('F'.$count,$value['servicio']);
		    $sheet->setCellValue('G'.$count,$value['inventario']);
		    $sheet->setCellValue('H'.$count,$value['producto_terminado']);
		    $sheet->setCellValue('I'.$count,$value['peso']);
		    $sheet->setCellValue('J'.$count,$value['categoria']);
		    $sheet->setCellValue('K'.$count,$value['codigo_aux']);
		    $sheet->setCellValue('L'.$count,$value['codigo_bar']);
		    $sheet->setCellValue('M'.$count,$value['marca']);
		    $sheet->setCellValue('N'.$count,$value['modelo']);
		    $sheet->setCellValue('O'.$count,$value['serie_pro']);
		    $sheet->setCellValue('P'.$count,$value['estado']);
		    $sheet->setCellValue('Q'.$count,$value['genero']);
		    $sheet->setCellValue('R'.$count,$value['uni_medida']);
		    $sheet->setCellValue('W'.$count,$value['RFID']);
		    $sheet->setCellValue('T'.$count,$value['des2']);
		    $count = $count+1;
		}
		 $write = new Xlsx($spreadsheet);
		 $write->save('ListaArticulos.xlsx');
		 echo "<meta http-equiv='refresh' content='0;url=ListaArticulos.xlsx'/>";
		 exit;
		


    }

     function ListaCliente()
    {

    	$datos = $this->cliente->lista_clientes($query=false,$ci=false,$id=false,$tipo='C');

    	// print_r($datos);die();
    	$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();			
    	$sheet->getStyle('C')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);
    	$sheet->getStyle('D')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);

			$sheet->getColumnDimension('A:F')->setAutoSize(true);
			$sheet->setCellValue('A1','NOMBRE');
			$sheet->setCellValue('B1','RAZON SOCIAL');
			$sheet->setCellValue('C1','CEDULA');
			$sheet->setCellValue('D1','TELEFONO');
			$sheet->setCellValue('E1','EMAIL');
			$sheet->setCellValue('F1','DIRECCION');
			$count = 2;
			foreach ($datos as $key => $value) {
					$sheet->setCellValue('A'.$count,$value['nombre']);
			    $sheet->setCellValue('B'.$count,$value['Razon_Social']);

  				$sheet->setCellValueExplicit('C'.$count, (string)$value['ci_ruc'], DataType::TYPE_STRING);
        	$sheet->setCellValueExplicit('D'.$count, (string)$value['telefono'], DataType::TYPE_STRING);
        

			    $sheet->setCellValue('E'.$count,$value['mail']);
			    $sheet->setCellValue('F'.$count,$value['direccion']);
			    $count = $count+1;
			}

			 foreach (range('A', $sheet->getHighestColumn()) as $column) {
        $sheet->getColumnDimension($column)->setAutoSize(true);
    }

			 $write = new Xlsx($spreadsheet);
			 $write->save('LISTACLIENTE.xlsx');
			 echo "<meta http-equiv='refresh' content='0;url=LISTACLIENTE.xlsx'/>";
			 exit;
    }

     function reporte_color()
    {
    	$datos = $this->colores-> lista_colores();
    	//print_r($datos);die();
    	$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1','CODIGO');
		$sheet->setCellValue('B1','DESCRIPCION');
		$count = 2;
		foreach ($datos as $key => $value) {
			$sheet->setCellValue('A'.$count,$value['CODIGO']);
		    $sheet->setCellValue('B'.$count,$value['DESCRIPCION']);
		    $count = $count+1;
		}
		 $write = new Xlsx($spreadsheet);
		 $write->save('Reporte_color.xlsx');
		 echo "<meta http-equiv='refresh' content='0;url=Reporte_color.xlsx'/>";
		 exit;
		


    }

     function reporte_genero()
    {
    	$datos = $this->genero->lista_genero();
    	//print_r($datos);die();
    	$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1','CODIGO');
		$sheet->setCellValue('B1','DESCRIPCION');
		$count = 2;
		foreach ($datos as $key => $value) {
			$sheet->setCellValue('A'.$count,$value['CODIGO']);
		    $sheet->setCellValue('B'.$count,$value['DESCRIPCION']);
		    $count = $count+1;
		}
		 $write = new Xlsx($spreadsheet);
		 $write->save('Reporte_genero.xlsx');
		 echo "<meta http-equiv='refresh' content='0;url=Reporte_genero.xlsx'/>";
		 exit;
		


    }

    function reporte_kardex($parametros)
    {

    	$datos = $this->kardex->lista($parametros['ddl_materia'],$parametros['txt_desde'],$parametros['txt_hasta']);

    	$estilo_subcabecera = array('font' => ['bold' => true,],
								'alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT,],
								'borders' => ['top' => ['borderStyle' => Border::BORDER_THIN,],],
								'fill' => ['fillType' =>  Fill::FILL_GRADIENT_LINEAR,'rotation' => 90,'startColor' => ['rgb' => '436BEE', ], 'endColor' => ['rgb' => 'FFFFFF', ], ],);

		 	//print_r($datos);die();
    	$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('A1','NOMBRE');
			$sheet->setCellValue('B1','FECHA');
			$sheet->setCellValue('C1','ENTRADA');
			$sheet->setCellValue('D1','SALIDA');
			$sheet->setCellValue('E1','EXISTENCIAS');
			$sheet->setCellValue('F1','VALOR UNITARIO');
			$sheet->setCellValue('G1','VALOR IVA');
			$sheet->setCellValue('H1','SUBTOTAL');
			$sheet->setCellValue('I1','TOTAL');
			$sheet->setCellValue('J1','COSTO');
			$sheet->setCellValue('K1','FACTURA');
			$sheet->setCellValue('L1','DETALLE');
			$sheet->getColumnDimension('L')->setWidth('30');
			$sheet->getColumnDimension('A')->setWidth('30');
			$sheet->getColumnDimension('B')->setWidth('25');
			$sheet->getStyle('A1:L1')->applyFromArray($estilo_subcabecera);
			$count = 2;
			foreach ($datos as $key => $value) {
				$sheet->setCellValue('A'.$count,$value['nombre']);
			  $sheet->setCellValue('B'.$count,$value['fecha']);
			  $sheet->setCellValue('C'.$count,$value['entrada']);
			  $sheet->setCellValue('D'.$count,$value['salida']);
			  $sheet->setCellValue('E'.$count,$value['existencias']);
			  $sheet->setCellValue('F'.$count,number_format(floatval($value['valor_unitario']),2,'.',''));
				$sheet->setCellValue('G'.$count,number_format(floatval($value['total_iva']),2,'.',''));
				$sheet->setCellValue('H'.$count,number_format(floatval($value['subtotal']),2,'.',''));
				$sheet->setCellValue('I'.$count,number_format(floatval($value['valor_total']),2,'.',''));
				$sheet->setCellValue('J'.$count,number_format(floatval($value['costo']),2,'.',''));
			  $sheet->setCellValue('K'.$count,$value['Factura']);
			  $sheet->setCellValue('L'.$count,$value['detalle']);
			  $count = $count+1;
			}
		 $write = new Xlsx($spreadsheet);
		 $write->save('Reporte_Karex.xlsx');
		 echo "<meta http-equiv='refresh' content='0;url=Reporte_Karex.xlsx'/>";
		 exit;
		


    }




 


}
?>
