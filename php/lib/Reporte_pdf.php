<?php 
include('pdf/cabecera_pdf.php');
include('pdf/factura_pdf.php');
/**
 * 
 */
$reporte = new Reporte_pdf();

class Reporte_pdf
{
	private $pdf;
	private $factura_pdf;
	function __construct()
	{
		$this->pdf = new cabecera_pdf();
		$this->factura_pdf = new factura_pdf();
	}

	function nota_credito_pdf($datos=false,$lineas=false,$empresa=false,$rimpe=false,$mostrar=true,$descargar=false)
	{


		// print_r($datos);
		// print_r($lineas);
		// print_r($empresa);
		// print_r($rimpe);
		// die();
		if(is_object($datos[0]['fecha_nc']))
		{
			$datos[0]['fecha_nc'] = $datos[0]['fecha_nc']->format('Y-m-d');
		}
		$logo = $empresa[0]['logo'];
		$rin = '';

		if(count($rimpe)>0)
		{
			if($rimpe['microempresa']!='.' && $rimpe['microempresa']!='' )
			{
				$rin =utf8_decode($rimpe['microempresa']);
			}			
		}




		$tablaHTML = array();
		$tablaHTML[0]['medidas']=array(45,70);
		$tablaHTML[0]['alineado']=array('L','L');
		$tablaHTML[0]['datos']=array('<b>CI/RUC:'.$empresa[0]['RUC'],$rin);
		$tablaHTML[0]['altoRow'] = 5;
		$tablaHTML[0]['Size'] = 9;
		// $tablaHTML[0]['borde'] = 1;
		$pos = 1;

		if(count($rimpe)>0)
		{			
			if($rimpe['agente']!='.' && $rimpe['agente']!='')
			{
				$tablaHTML[1]['medidas']=array(100);
				$tablaHTML[1]['alineado']=array('L');
				$tablaHTML[1]['datos']=array('Agente de Retencion Resolucion:'.$rimpe['agente']);
				$tablaHTML[1]['altoRow'] = 3;
				$tablaHTML[1]['Size'] = 7;
				// $tablaHTML[1]['borde'] = 1;
				$pos = $pos+1;
			}
		}

		$tablaHTML[$pos]['medidas']=array(70,30);
		$tablaHTML[$pos]['alineado']=array('L','L');
		$tablaHTML[$pos]['datos']=array('<b>NOTA DE CREDITO:',$datos[0]['serie_nc'].' '.$this->generar_ceros($datos[0]['numero_nc'],9));
		$tablaHTML[$pos]['altoRow'] = 3;
		$tablaHTML[$pos]['Size'] = 7;
		// $tablaHTML[$pos]['borde'] = 1;
		$pos = $pos+1;

		// $tablaHTML[$pos]['medidas']=array(100);
		// $tablaHTML[$pos]['alineado']=array('L');
		// $tablaHTML[$pos]['datos']=array('<B>NUMERO DE AUTORIZACION');
		// $tablaHTML[$pos]['altoRow'] = 5;
		// $pos = $pos+1;

		// $tablaHTML[$pos]['medidas']=array(100);
		// $tablaHTML[$pos]['alineado']=array('L');
		// $tablaHTML[$pos]['datos']=array(': '.$datos[0]['Autorizacion'].'');
		// $tablaHTML[$pos]['altoRow'] = 5;
		// // $tablaHTML[$pos]['borde'] = 1;
		// $pos = $pos+1;

		$tablaHTML[$pos]['medidas']=array(70,30);
		$tablaHTML[$pos]['alineado']=array('L','L');
		$tablaHTML[$pos]['datos']=array('<B>FECHA Y HORA DE AUTORIZACION: ',$datos[0]['fecha_nc']);
		$tablaHTML[$pos]['altoRow'] = 3;
		// $tablaHTML[$pos]['borde'] = 1;
		$pos = $pos+1;
		
		$tablaHTML[$pos]['medidas']=array(70,30);
		$tablaHTML[$pos]['alineado']=array('L','L');

		$auto = substr($datos[0]['autorizacion_nc'],23,1);
		// print_r($auto);die();
		if($auto=='2')
		{
			$tablaHTML[$pos]['datos']=array('<b>AMBIENTE:','PRODUCCION');
		}else
		{
			$tablaHTML[$pos]['datos']=array('<b>AMBIENTE:','PRUEBA');
		}
		$tablaHTML[$pos]['altoRow'] = 3;
		// $tablaHTML[4]['borde'] = 1;

		$pos = $pos+1;


		$tablaHTML[$pos]['medidas']=array(70,30);
		$tablaHTML[$pos]['alineado']=array('L','L');
		$tablaHTML[$pos]['datos']=array('<b>EMISION:','NORMAL');
		$tablaHTML[$pos]['altoRow'] = 3;
		// $tablaHTML[$pos]['borde'] = 1;
		$pos = $pos+1;

		$tablaHTML[$pos]['medidas']=array(100);
		$tablaHTML[$pos]['alineado']=array('L');
		$tablaHTML[$pos]['datos']=array('<B>NUMERO DE AUTORIZACION Y CLAVE DE ACCESO ');
		$tablaHTML[$pos]['altoRow'] = 9;

		//-----------------------cuadro izquierda-----------------//
		$altoRow = 3;
		$tablaHTML2 = array();
		$pos = 0;
		if($empresa[0]['Razon_Social']!=$empresa[0]['Nombre_Comercial'])
		{
			$tablaHTML2[$pos]['medidas']=array(86);
			$tablaHTML2[$pos]['alineado']=array('L');
			$tablaHTML2[$pos]['datos']=array($empresa[0]['Razon_Social']);
			// $tablaHTML2[$pos]['borde'] = 1;
			$tablaHTML2[$pos]['altoRow'] = 4;
			$tablaHTML2[$pos]['Size'] = 8;
			$pos = $pos+1;

			$tablaHTML2[$pos]['medidas']=array(86);
			$tablaHTML2[$pos]['alineado']=array('L');
			$tablaHTML2[$pos]['datos']=array($empresa[0]['Nombre_Comercial']);
			// $tablaHTML2[$pos]['borde'] = 1;
			$tablaHTML2[$pos]['altoRow'] = 4;
			$tablaHTML2[$pos]['Size'] = 8;
			$pos = $pos+1;
		}else
		{
			$tablaHTML2[$pos]['medidas']=array(86);
			$tablaHTML2[$pos]['alineado']=array('L');
			$tablaHTML2[$pos]['datos']=array('');
			// $tablaHTML2[$pos]['borde'] = 1;
			$tablaHTML2[$pos]['altoRow'] = 4;
			$tablaHTML2[$pos]['Size'] = 8;
			$pos = $pos+1;

			$tablaHTML2[$pos]['medidas']=array(86);
			$tablaHTML2[$pos]['alineado']=array('L');
			$tablaHTML2[$pos]['datos']=array($empresa[0]['Razon_Social']);
			// $tablaHTML2[$pos]['borde'] = 1;
			$tablaHTML2[$pos]['altoRow'] = 4;
			$tablaHTML2[$pos]['Size'] = 8;
			$pos = $pos+1;

		}

		$tablaHTML2[$pos]['medidas']=array(86);
		$tablaHTML2[$pos]['alineado']=array('L');
		$tablaHTML2[$pos]['datos']=array('<b>Direccion Matriz');
		// $tablaHTML2[$pos]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$tablaHTML2[$pos]['Size'] = 7;
		$pos = $pos+1;

		$tablaHTML2[$pos]['medidas']=array(86);
		$tablaHTML2[$pos]['alineado']=array('L');
		$tablaHTML2[$pos]['datos']=array($empresa[0]['Direccion']);
		// $tablaHTML2[$pos]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;

		if($empresa[0]['sucursal']!='' && $empresa[0]['direccion_s']!='' && $empresa[0]['direccion_s']!='.')
		{
		$tablaHTML2[$pos]['medidas']=array(86);
		$tablaHTML2[$pos]['alineado']=array('L');
		$tablaHTML2[$pos]['datos']=array('<b>Direccion Sucursal');
		// $tablaHTML2[$pos]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;

		$tablaHTML2[$pos]['medidas']=array(86);
		$tablaHTML2[$pos]['alineado']=array('L');		
		$tablaHTML2[$pos]['datos']=array($empresa[0]['direccion_s']);	    	    
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		// $tablaHTML2[4]['borde'] = 1;
		$pos = $pos+1;
		}else
		{
			$tablaHTML2[$pos]['medidas']=array(86);
			$tablaHTML2[$pos]['alineado']=array('L');		
			$tablaHTML2[$pos]['datos']=array('');	    	    
			$tablaHTML2[$pos]['altoRow'] = $altoRow;
			// $tablaHTML2[4]['borde'] = 1;
			$pos = $pos+1;
		}

		$tablaHTML2[$pos]['medidas']=array(30,56);
		$tablaHTML2[$pos]['alineado']=array('L'.'L');
		$tablaHTML2[$pos]['datos']=array('<b>Telefono',$empresa[0]['telefono']);
		if($empresa[0]['sucursal']!='')
		{
		  $tablaHTML2[$pos]['datos']=array('<b>Telefono',$empresa[0]['telefono_s']);
	    }
		// $tablaHTML2[5]['borde'] = 1;

		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;

		$tablaHTML2[$pos]['medidas']=array(30,56);
		$tablaHTML2[$pos]['alineado']=array('L','L');
		$tablaHTML2[$pos]['datos']=array('<b>Email',$empresa[0]['email']);
		if($empresa[0]['sucursal']!='')
		{
		 $tablaHTML2[$pos]['datos']=array('<b>Email',$empresa[0]['email_s']);
	    }
		// $tablaHTML2[6]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;

		$tablaHTML2[$pos]['medidas']=array(50,36);
		$tablaHTML2[$pos]['alineado']=array('L','L');
		$tablaHTML2[$pos]['datos']=array('<b>Contribuyente especial Nro',$empresa[0]['contribuyenteEspecial']);
		// $tablaHTML2[$pos]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;
		$conta = 'NO';
		if($empresa[0]['obligadoContabilidad']==1){$conta='SI';}
		$tablaHTML2[$pos]['medidas']=array(70,16);
		$tablaHTML2[$pos]['alineado']=array('L','L');
		$tablaHTML2[$pos]['datos']=array('<b>OBLIGADO A LLEVAR CONTABILIDAD',$conta);
		// $tablaHTML2[$pos]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;

		// $tablaHTML2[$pos]['medidas']=array(86);
		// $tablaHTML2[$pos]['alineado']=array('C');
		// $tablaHTML2[$pos]['datos']=array('****CONTRIBUYENTE REGIMEN MICRO EMPRESA*****');
		// // $tablaHTML2[$pos]['borde'] = 1;
		// $tablaHTML2[$pos]['altoRow'] = $altoRow;
		// $pos = $pos+1;

		//----------------------------datos personales---------------------

		$altoRow = 3;
		$tablaHTML3 = array();
		$tablaHTML3[0]['medidas']=array(55,85,50);
		$tablaHTML3[0]['alineado']=array('L','L','L');
		$tablaHTML3[0]['datos']=array('<b>Razon Social / Nombre y Apellido','','<b>Identificacion');
		// $tablaHTML3[0]['borde'] = 1;
		$tablaHTML3[0]['altoRow'] = $altoRow;

		$tablaHTML3[1]['medidas']=array(55,85,50);
		$tablaHTML3[1]['alineado']=array('L','L','L');
		$tablaHTML3[1]['datos']=array($datos[0]['nombre'],'',$datos[0]['ci_ruc']);
		// $tablaHTML3[0]['borde'] = 1;
		$tablaHTML3[1]['altoRow'] = $altoRow;

		$tablaHTML3[2]['medidas']=array(55,85,55);
		$tablaHTML3[2]['alineado']=array('L','L','L');
		$tablaHTML3[2]['datos']=array('<b>Telefono:','<b>Email:','<b>Fecha Emision');
		// $tablaHTML3[1]['borde'] = 1;
		$tablaHTML3[2]['altoRow'] = $altoRow;

		$tablaHTML3[3]['medidas']=array(55,85,55);
		$tablaHTML3[3]['alineado']=array('L','L','L');
		$tablaHTML3[3]['datos']=array($datos[0]['telefono'],$datos[0]['mail'],$datos[0]['fecha_nc']);
		$tablaHTML3[3]['altoRow'] = $altoRow;

		$tablaHTML3[4]['medidas']=array(25,115,50);
		$tablaHTML3[4]['alineado']=array('L','L','L');
		$tablaHTML3[4]['datos']=array('<b>Direccion:',$datos[0]['direccion'],'');
		// $tablaHTML3[5]['borde'] = 1;
		$tablaHTML3[4]['altoRow'] = $altoRow;

		$tablaHTML3[5]['medidas']=array(55,50,60,25);
		$tablaHTML3[5]['alineado']=array('L','L','L');
		$tablaHTML3[5]['datos']=array('<b>Comprobante que se Modifica, Factura No.:',$datos[0]['serie_doc'].'-'.$this->generar_ceros($datos[0]['numero_doc'],9),'<b>Fecha Emision (Comprobante a Modificar):',$datos[0]['fecha_doc']);
		$tablaHTML3[5]['altoRow'] = $altoRow;

		$tablaHTML3[6]['medidas']=array(50,110,50);
		$tablaHTML3[6]['alineado']=array('L','L','L');
		$tablaHTML3[6]['datos']=array('<b>Razon de la modificacion:',$datos[0]['motivo'],'');
		// $tablaHTML3[4]['borde'] = 1;
		$tablaHTML3[6]['altoRow'] = $altoRow;

		

		//-------------------------------------lineas de facturas-------------------///

		$altoRow = 5;
		$pos = 1;
		$sub=0;
		$total=0;
		$iva = 0;
		$des = 0;		
		$con_iva = 0;
		$sin_iva = 0;

		$tablaHTML4 = array();
		$tablaHTML4[0]['medidas']=array(25,15,80,27,20,23);
		$tablaHTML4[0]['alineado']=array('L','L','L','R','R','R');
		$tablaHTML4[0]['datos']=array('<b>Cod.Principal','<b>Cant','<b>Descripcion','<b>Precio Unitario','<b>Descuento','<b>Precio Total');
		$tablaHTML4[0]['borde'] = 1;
		$tablaHTML4[0]['altoRow'] = $altoRow;
// print_r($lineas);die();
		foreach ($lineas as $key => $value) {
			// print_r($value);die();
			$tablaHTML4[$pos]['medidas']=$tablaHTML4[0]['medidas'];
		    $tablaHTML4[$pos]['alineado']=$tablaHTML4[0]['alineado'];
		    $tablaHTML4[$pos]['datos']=array($value['referencia'],$value['cantidad'],$value['detalle'],number_format($value['pvp'],6,'.',''),$value['descuento'],$value['total']);
		    $tablaHTML4[$pos]['borde'] = 1;
		    $tablaHTML4[$pos]['altoRow'] = $altoRow;
		    $pos+=1;

		// print_r($value['iva']);die();
		    $sub+=$value['subtotal'];
		    $total+=$value['total'];
		    $iva+= $value['iva'];
		    $des+=$value['descuento'];	
		    if($value['iva']==0){$sin_iva+=$value['subtotal'];}else{$con_iva+=$value['subtotal'];}	
		}


		//-----------------------------fin de lineas -------------------------------------//
		// -----------------------------------tabla totales-------------------------------//

		$altoRow = 5;
		$pos = 1;
		$tablaHTML5 = array();
		$tablaHTML5[0]['medidas']=array(47,23);
		$tablaHTML5[0]['alineado']=array('L','R');
		$tablaHTML5[0]['datos']=array('<b>SUBTOTAL '.$_SESSION['INICIO']['IVA'].'%',number_format($con_iva,2,'.',''));
		$tablaHTML5[0]['borde'] = 1;
		$tablaHTML5[0]['altoRow'] = $altoRow;

		$tablaHTML5[1]['medidas']=$tablaHTML5[0]['medidas'];
		$tablaHTML5[1]['alineado']=$tablaHTML5[0]['alineado'];
		$tablaHTML5[1]['datos']=array('<b>SUB TOTAL 0%',number_format($sin_iva,2,'.',''));
		$tablaHTML5[1]['borde'] = 1;
		$tablaHTML5[1]['altoRow'] = $altoRow;

		$tablaHTML5[2]['medidas']=$tablaHTML5[0]['medidas'];
		$tablaHTML5[2]['alineado']=$tablaHTML5[0]['alineado'];
		$tablaHTML5[2]['datos']=array('<b>SUBTOTAL SIN IMPUESTOS', number_format($sub,2,'.',''));
		$tablaHTML5[2]['borde'] = 1;
		$tablaHTML5[2]['altoRow'] = $altoRow;

		$tablaHTML5[3]['medidas']=$tablaHTML5[0]['medidas'];
		$tablaHTML5[3]['alineado']=$tablaHTML5[0]['alineado'];
		$tablaHTML5[3]['datos']=array('<b>DESCUENTOS', number_format($des,2,'.',''));
		$tablaHTML5[3]['borde'] = 1;
		$tablaHTML5[3]['altoRow'] = $altoRow;

		$tablaHTML5[4]['medidas']=$tablaHTML5[0]['medidas'];
		$tablaHTML5[4]['alineado']=$tablaHTML5[0]['alineado'];
		$tablaHTML5[4]['datos']=array('<b>IVA '.$_SESSION['INICIO']['IVA'].'%',$iva);
		$tablaHTML5[4]['borde'] = 1;
		$tablaHTML5[4]['altoRow'] = $altoRow;

		$tablaHTML5[5]['medidas']=$tablaHTML5[0]['medidas'];
		$tablaHTML5[5]['alineado']=$tablaHTML5[0]['alineado'];
		$tablaHTML5[5]['datos']=array('<b>VALOR TOTAL', number_format($total,2,'.',''));
		$tablaHTML5[5]['borde'] = 1;
		$tablaHTML5[5]['altoRow'] = $altoRow;

		// print_r($tablaHTML5);die();

		//-------------------------fin de totales-------------------------//
		//--------------------------forma de pago--------------------------//
		$altoRow = 5;
		$pos = 1;
		$tablaHTML6 = array();
		$tablaHTML6[0]['medidas']=array(100);
		$tablaHTML6[0]['alineado']=array('L');
		$tablaHTML6[0]['datos']=array('<b>INFORMACION ADICIONAL');
		$tablaHTML6[0]['borde'] = 1;
		$tablaHTML6[0]['altoRow'] = $altoRow;

		$forma = '01 SIN UTILIZACION DEL SISTEMA FINANCIERO';
		// print_r($datos);die();
		

		$tablaHTML6[1]['medidas']=array(100);
		$tablaHTML6[1]['alineado']=array('L');
		$tablaHTML6[1]['datos']=array($forma);
		$tablaHTML6[1]['borde'] = 1;
		$tablaHTML6[1]['altoRow'] = $altoRow;

		// print_r($_SESSION['INICIO']);die();

		$doc = $this->factura_pdf->nota_credito($tablaHTML,$tablaHTML2,$tablaHTML3,$tablaHTML4,$tablaHTML5,$tablaHTML6,$logo,$datos[0]['autorizacion_nc'],$mostrar,$descargar,$datos[0]['numero_nc']);
		// print_r($doc);die(); 
		return $doc;
	

	}


	function retencion_pdf($datos=false,$lineas=false,$empresa=false,$rimpe=false,$mostrar=true,$descargar=false)
	{



		// print_r($datos);
		// print_r($lineas);
		// print_r($empresa);
		// print_r($rimpe);
		// die();
		if(is_object($datos[0]['fechaEmision']))
		{
			$datos[0]['fechaEmision'] = $datos[0]['fechaEmision']->format('Y-m-d');
		}
		$logo = $empresa[0]['logo'];
		$rin = '';

		if(count($rimpe)>0)
		{
			if($rimpe['microempresa']!='.' && $rimpe['microempresa']!='' )
			{
				$rin =utf8_decode($rimpe['microempresa']);
			}			
		}




		$tablaHTML = array();
		$tablaHTML[0]['medidas']=array(45,70);
		$tablaHTML[0]['alineado']=array('L','L');
		$tablaHTML[0]['datos']=array('<b>CI/RUC:'.$empresa[0]['RUC'],$rin);
		$tablaHTML[0]['altoRow'] = 5;
		$tablaHTML[0]['Size'] = 9;
		// $tablaHTML[0]['borde'] = 1;
		$pos = 1;

		if(count($rimpe)>0)
		{			
			if($rimpe['agente']!='.' && $rimpe['agente']!='')
			{
				$tablaHTML[1]['medidas']=array(100);
				$tablaHTML[1]['alineado']=array('L');
				$tablaHTML[1]['datos']=array('Agente de Retencion Resolucion:'.$rimpe['agente']);
				$tablaHTML[1]['altoRow'] = 3;
				$tablaHTML[1]['Size'] = 7;
				// $tablaHTML[1]['borde'] = 1;
				$pos = $pos+1;
			}
		}

		$tablaHTML[$pos]['medidas']=array(70,30);
		$tablaHTML[$pos]['alineado']=array('L','L');
		$tablaHTML[$pos]['datos']=array('<b>RETENCION:',$datos[0]['serie'].' '.$this->generar_ceros($datos[0]['numero'],9));
		$tablaHTML[$pos]['altoRow'] = 3;
		$tablaHTML[$pos]['Size'] = 7;
		// $tablaHTML[$pos]['borde'] = 1;
		$pos = $pos+1;

		// $tablaHTML[$pos]['medidas']=array(100);
		// $tablaHTML[$pos]['alineado']=array('L');
		// $tablaHTML[$pos]['datos']=array('<B>NUMERO DE AUTORIZACION');
		// $tablaHTML[$pos]['altoRow'] = 5;
		// $pos = $pos+1;

		// $tablaHTML[$pos]['medidas']=array(100);
		// $tablaHTML[$pos]['alineado']=array('L');
		// $tablaHTML[$pos]['datos']=array(': '.$datos[0]['Autorizacion'].'');
		// $tablaHTML[$pos]['altoRow'] = 5;
		// // $tablaHTML[$pos]['borde'] = 1;
		// $pos = $pos+1;

		$tablaHTML[$pos]['medidas']=array(70,30);
		$tablaHTML[$pos]['alineado']=array('L','L');
		$tablaHTML[$pos]['datos']=array('<B>FECHA Y HORA DE AUTORIZACION: ',$datos[0]['fechaEmision']);
		$tablaHTML[$pos]['altoRow'] = 3;
		// $tablaHTML[$pos]['borde'] = 1;
		$pos = $pos+1;
		
		$tablaHTML[$pos]['medidas']=array(70,30);
		$tablaHTML[$pos]['alineado']=array('L','L');

		$auto = substr($datos[0]['autorizacion'],23,1);
		// print_r($auto);die();
		if($auto=='2')
		{
			$tablaHTML[$pos]['datos']=array('<b>AMBIENTE:','PRODUCCION');
		}else
		{
			$tablaHTML[$pos]['datos']=array('<b>AMBIENTE:','PRUEBA');
		}
		$tablaHTML[$pos]['altoRow'] = 3;
		// $tablaHTML[4]['borde'] = 1;

		$pos = $pos+1;


		$tablaHTML[$pos]['medidas']=array(70,30);
		$tablaHTML[$pos]['alineado']=array('L','L');
		$tablaHTML[$pos]['datos']=array('<b>EMISION:','NORMAL');
		$tablaHTML[$pos]['altoRow'] = 3;
		// $tablaHTML[$pos]['borde'] = 1;
		$pos = $pos+1;

		$tablaHTML[$pos]['medidas']=array(100);
		$tablaHTML[$pos]['alineado']=array('L');
		$tablaHTML[$pos]['datos']=array('<B>NUMERO DE AUTORIZACION Y CLAVE DE ACCESO ');
		$tablaHTML[$pos]['altoRow'] = 9;

		//-----------------------cuadro izquierda-----------------//
		$altoRow = 3;
		$tablaHTML2 = array();
		$pos = 0;
		if($empresa[0]['Razon_Social']!=$empresa[0]['Nombre_Comercial'])
		{
			$tablaHTML2[$pos]['medidas']=array(86);
			$tablaHTML2[$pos]['alineado']=array('L');
			$tablaHTML2[$pos]['datos']=array($empresa[0]['Razon_Social']);
			// $tablaHTML2[$pos]['borde'] = 1;
			$tablaHTML2[$pos]['altoRow'] = 4;
			$tablaHTML2[$pos]['Size'] = 8;
			$pos = $pos+1;

			$tablaHTML2[$pos]['medidas']=array(86);
			$tablaHTML2[$pos]['alineado']=array('L');
			$tablaHTML2[$pos]['datos']=array($empresa[0]['Nombre_Comercial']);
			// $tablaHTML2[$pos]['borde'] = 1;
			$tablaHTML2[$pos]['altoRow'] = 4;
			$tablaHTML2[$pos]['Size'] = 8;
			$pos = $pos+1;
		}else
		{
			$tablaHTML2[$pos]['medidas']=array(86);
			$tablaHTML2[$pos]['alineado']=array('L');
			$tablaHTML2[$pos]['datos']=array('');
			// $tablaHTML2[$pos]['borde'] = 1;
			$tablaHTML2[$pos]['altoRow'] = 4;
			$tablaHTML2[$pos]['Size'] = 8;
			$pos = $pos+1;

			$tablaHTML2[$pos]['medidas']=array(86);
			$tablaHTML2[$pos]['alineado']=array('L');
			$tablaHTML2[$pos]['datos']=array($empresa[0]['Razon_Social']);
			// $tablaHTML2[$pos]['borde'] = 1;
			$tablaHTML2[$pos]['altoRow'] = 4;
			$tablaHTML2[$pos]['Size'] = 8;
			$pos = $pos+1;

		}

		$tablaHTML2[$pos]['medidas']=array(86);
		$tablaHTML2[$pos]['alineado']=array('L');
		$tablaHTML2[$pos]['datos']=array('<b>Direccion Matriz');
		// $tablaHTML2[$pos]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$tablaHTML2[$pos]['Size'] = 7;
		$pos = $pos+1;

		$tablaHTML2[$pos]['medidas']=array(86);
		$tablaHTML2[$pos]['alineado']=array('L');
		$tablaHTML2[$pos]['datos']=array($empresa[0]['Direccion']);
		// $tablaHTML2[$pos]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;

		if($empresa[0]['sucursal']!='' && $empresa[0]['direccion_s']!='' && $empresa[0]['direccion_s']!='.')
		{
		$tablaHTML2[$pos]['medidas']=array(86);
		$tablaHTML2[$pos]['alineado']=array('L');
		$tablaHTML2[$pos]['datos']=array('<b>Direccion Sucursal');
		// $tablaHTML2[$pos]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;

		$tablaHTML2[$pos]['medidas']=array(86);
		$tablaHTML2[$pos]['alineado']=array('L');		
		$tablaHTML2[$pos]['datos']=array($empresa[0]['direccion_s']);	    	    
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		// $tablaHTML2[4]['borde'] = 1;
		$pos = $pos+1;
		}else
		{
			$tablaHTML2[$pos]['medidas']=array(86);
			$tablaHTML2[$pos]['alineado']=array('L');		
			$tablaHTML2[$pos]['datos']=array('');	    	    
			$tablaHTML2[$pos]['altoRow'] = $altoRow;
			// $tablaHTML2[4]['borde'] = 1;
			$pos = $pos+1;
		}

		$tablaHTML2[$pos]['medidas']=array(30,56);
		$tablaHTML2[$pos]['alineado']=array('L'.'L');
		$tablaHTML2[$pos]['datos']=array('<b>Telefono',$empresa[0]['telefono']);
		if($empresa[0]['sucursal']!='')
		{
		  $tablaHTML2[$pos]['datos']=array('<b>Telefono',$empresa[0]['telefono_s']);
	    }
		// $tablaHTML2[5]['borde'] = 1;

		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;

		$tablaHTML2[$pos]['medidas']=array(30,56);
		$tablaHTML2[$pos]['alineado']=array('L','L');
		$tablaHTML2[$pos]['datos']=array('<b>Email',$empresa[0]['email']);
		if($empresa[0]['sucursal']!='')
		{
		 $tablaHTML2[$pos]['datos']=array('<b>Email',$empresa[0]['email_s']);
	    }
		// $tablaHTML2[6]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;

		$tablaHTML2[$pos]['medidas']=array(50,36);
		$tablaHTML2[$pos]['alineado']=array('L','L');
		$tablaHTML2[$pos]['datos']=array('<b>Contribuyente especial Nro',$empresa[0]['contribuyenteEspecial']);
		// $tablaHTML2[$pos]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;
		$conta = 'NO';
		if($empresa[0]['obligadoContabilidad']==1){$conta='SI';}
		$tablaHTML2[$pos]['medidas']=array(70,16);
		$tablaHTML2[$pos]['alineado']=array('L','L');
		$tablaHTML2[$pos]['datos']=array('<b>OBLIGADO A LLEVAR CONTABILIDAD',$conta);
		// $tablaHTML2[$pos]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;

		// $tablaHTML2[$pos]['medidas']=array(86);
		// $tablaHTML2[$pos]['alineado']=array('C');
		// $tablaHTML2[$pos]['datos']=array('****CONTRIBUYENTE REGIMEN MICRO EMPRESA*****');
		// // $tablaHTML2[$pos]['borde'] = 1;
		// $tablaHTML2[$pos]['altoRow'] = $altoRow;
		// $pos = $pos+1;

		//----------------------------datos personales---------------------

		$altoRow = 3;
		$tablaHTML3 = array();
		$tablaHTML3[0]['medidas']=array(45,80,40,25);
		$tablaHTML3[0]['alineado']=array('L','L','L','L');
		$tablaHTML3[0]['datos']=array('<b>Razon Social / Nombre y Apellido',$datos[0]['nombre'],'<b>Identificacion (RUC/C.C):',$datos[0]['ci_ruc']);
		// $tablaHTML3[0]['borde'] = 1;
		$tablaHTML3[0]['altoRow'] = $altoRow;


		$tablaHTML3[1]['medidas']=array(25,100,40,25);
		$tablaHTML3[1]['alineado']=array('L','L','L','L');
		$tablaHTML3[1]['datos']=array('<b>Direccion:',$datos[0]['direccion'],'<b>Periodo fiscal:',$datos[0]['fechaEmision']);
		// $tablaHTML3[1]['borde'] = 1;
		$tablaHTML3[1]['altoRow'] = $altoRow;

		$tablaHTML3[2]['medidas']=array(45,80,40,25);
		$tablaHTML3[2]['alineado']=array('L','L','L','L');
		$tablaHTML3[2]['datos']=array('<b>Documento tipo Factura No:',$datos[0]['numeroFac'],'<b>Fecha de emision:',$datos[0]['fechaEmision']);
		// $tablaHTML3[2]['borde'] = 1;
		$tablaHTML3[2]['altoRow'] = $altoRow;

		/*$tablaHTML3[3]['medidas']=array(45,80,40,25);
		$tablaHTML3[3]['alineado']=array('L','L','L','L');
		$tablaHTML3[3]['datos']=array('<b>Razon Social / Nombre y Apellido',$datos[0]['nombre'],'<b>Identificacion (RUC/C.C):',$datos[0]['ci_ruc']);
		$tablaHTML3[3]['borde'] = 1;
		$tablaHTML3[3]['altoRow'] = $altoRow;*/

		//-------------------------------------lineas de facturas-------------------///

		$altoRow = 5;
		$pos = 1;
		$total=0;

		$tablaHTML4 = array();
		$tablaHTML4[0]['medidas']=array(15,80,27,23,23,23);
		$tablaHTML4[0]['alineado']=array('L','L','L','R','R','R');
		$tablaHTML4[0]['datos']=array('<b>Impuesto','<b>Descripcion','<b>Codigo retencion','<b>Base imponible','<b>% Retenido','<b>Valor retenido');
		$tablaHTML4[0]['borde'] = 1;
		$tablaHTML4[0]['altoRow'] = $altoRow;

		foreach ($lineas as $key => $value) {
			if($value['bienes_servicios']==0)
			{
				$tablaHTML4[$pos]['medidas']=$tablaHTML4[0]['medidas'];
			    $tablaHTML4[$pos]['alineado']=$tablaHTML4[0]['alineado'];
			    $tablaHTML4[$pos]['datos']=array('.',$value['detalle_impuesto'],$value['codigo_retencion'],$value['base_imponible'],$value['porcentajeRet'],$value['valorRetenido']);
			    $tablaHTML4[$pos]['borde'] = 1;
			    $tablaHTML4[$pos]['altoRow'] = $altoRow;
			    $pos+=1;

			// print_r($value['iva']);die();
			    $total+=$value['valorRetenido'];
			}
		    
		}


		//-----------------------------fin de lineas -------------------------------------//
		// -----------------------------------tabla totales-------------------------------//

		$altoRow = 5;
		$pos = 1;
		$tablaHTML5 = array();
		$tablaHTML5[0]['medidas']=array(47,23);
		$tablaHTML5[0]['alineado']=array('L','R');		
		$tablaHTML5[0]['datos']=array('<b>VALOR TOTAL', number_format($total,2,'.',''));
		$tablaHTML5[0]['borde'] = 1;
		$tablaHTML5[0]['altoRow'] = $altoRow;

		// print_r($tablaHTML5);die();

		//-------------------------fin de totales-------------------------//
		//--------------------------forma de pago--------------------------//
		$altoRow = 5;
		$pos = 1;
		$tablaHTML6 = array();
		$tablaHTML6[0]['medidas']=array(118);
		$tablaHTML6[0]['alineado']=array('L');
		$tablaHTML6[0]['datos']=array('<b>INFORMACION ADICIONAL');
		$tablaHTML6[0]['borde'] = 1;
		$tablaHTML6[0]['altoRow'] = $altoRow;

		$forma = '01 SIN UTILIZACION DEL SISTEMA FINANCIERO';
		// print_r($datos);die();
		if($datos[0]['PagoLocExt']!='.' && $datos[0]['PagoLocExt']!='')
		{
			$forma = $datos[0]['tipo_pago_des'];
		}

		$tablaHTML6[1]['medidas']=array(118);
		$tablaHTML6[1]['alineado']=array('L');
		$tablaHTML6[1]['datos']=array($forma);
		$tablaHTML6[1]['borde'] = 1;
		$tablaHTML6[1]['altoRow'] = $altoRow;
		//--------------------------fin de pago--------------------------//

		//--------------------------forma de pago--------------------------//
		$altoRow = 5;
		$pos = 1;
		$tablaHTML7 = array();
		$tablaHTML7[0]['medidas']=array(100,18);
		$tablaHTML7[0]['alineado']=array('C','R');
		$tablaHTML7[0]['datos']=array('<b>FORMA DE PAGO','VALOR');
		$tablaHTML7[0]['borde'] = 1;
		$tablaHTML7[0]['altoRow'] = $altoRow;

		$forma = '01 SIN UTILIZACION DEL SISTEMA FINANCIERO';
		// print_r($datos);die();
		if($datos[0]['PagoLocExt']!='.' && $datos[0]['PagoLocExt']!='')
		{
			$forma = $datos[0]['tipo_pago_des'];
		}
		$tablaHTML7[1]['medidas']=array(100,18);
		$tablaHTML7[1]['alineado']=array('L','R');
		$tablaHTML7[1]['datos']=array($forma ,number_format($total,2,'.',''));
		$tablaHTML7[1]['borde'] = 1;
		$tablaHTML7[1]['altoRow'] = $altoRow;
		//--------------------------fin de pago--------------------------//

		// print_r($_SESSION['INICIO']);die();

		$doc = $this->factura_pdf->retencion($tablaHTML,$tablaHTML2,$tablaHTML3,$tablaHTML4,$tablaHTML5,$tablaHTML6,$tablaHTML7,$logo,$datos[0]['autorizacion'],$mostrar,$descargar,$datos[0]['numero']);
		// print_r($doc);die(); 
		return $doc;

	}




	function factura_pdf($datos=false,$lineas=false,$empresa=false,$rimpe=false,$mostrar=true,$descargar=false)
	{

		// print_r($datos);
		// print_r($lineas);
		// print_r($empresa);
		// print_r($rimpe);
		// die();
		if(is_object($datos[0]['fecha']))
		{
			$datos[0]['fecha'] = $datos[0]['fecha']->format('Y-m-d');
		}
		$logo = $empresa[0]['logo'];
		$rin = '';

		if(count($rimpe)>0)
		{
			if($rimpe['microempresa']!='.' && $rimpe['microempresa']!='' )
			{
				$rin =utf8_decode($rimpe['microempresa']);
			}			
		}




		$tablaHTML = array();
		$tablaHTML[0]['medidas']=array(45,70);
		$tablaHTML[0]['alineado']=array('L','L');
		$tablaHTML[0]['datos']=array('<b>CI/RUC:'.$empresa[0]['RUC'],'');
		$tablaHTML[0]['altoRow'] = 5;
		$tablaHTML[0]['Size'] = 9;
		// $tablaHTML[0]['borde'] = 1;
		$pos = 1;

		if(count($rimpe)>0)
		{			
			if($rimpe['agente']!='.' && $rimpe['agente']!='')
			{
				$tablaHTML[1]['medidas']=array(100);
				$tablaHTML[1]['alineado']=array('L');
				$tablaHTML[1]['datos']=array('Agente de Retencion Resolucion:'.$rimpe['agente']);
				$tablaHTML[1]['altoRow'] = 3;
				$tablaHTML[1]['Size'] = 7;
				// $tablaHTML[1]['borde'] = 1;
				$pos = $pos+1;
			}
		}

		$tablaHTML[$pos]['medidas']=array(70,30);
		$tablaHTML[$pos]['alineado']=array('L','L');
		if($datos[0]['TC']=='FA')
		{
			$tablaHTML[$pos]['datos']=array('<b>FACTURA:',$datos[0]['serie'].' '.$this->generar_ceros($datos[0]['num_factura'],9));
		}else
		{
			$tablaHTML[$pos]['datos']=array('<b>LIQUIDACION DE COMPRA:',$datos[0]['serie'].' '.$this->generar_ceros($datos[0]['num_factura'],9));
		}
		$tablaHTML[$pos]['altoRow'] = 3;
		$tablaHTML[$pos]['Size'] = 7;
		// $tablaHTML[$pos]['borde'] = 1;
		$pos = $pos+1;

		// $tablaHTML[$pos]['medidas']=array(100);
		// $tablaHTML[$pos]['alineado']=array('L');
		// $tablaHTML[$pos]['datos']=array('<B>NUMERO DE AUTORIZACION');
		// $tablaHTML[$pos]['altoRow'] = 5;
		// $pos = $pos+1;

		// $tablaHTML[$pos]['medidas']=array(100);
		// $tablaHTML[$pos]['alineado']=array('L');
		// $tablaHTML[$pos]['datos']=array(': '.$datos[0]['Autorizacion'].'');
		// $tablaHTML[$pos]['altoRow'] = 5;
		// // $tablaHTML[$pos]['borde'] = 1;
		// $pos = $pos+1;

		$tablaHTML[$pos]['medidas']=array(70,30);
		$tablaHTML[$pos]['alineado']=array('L','L');
		$tablaHTML[$pos]['datos']=array('<B>FECHA Y HORA DE AUTORIZACION: ',$datos[0]['fecha']);
		$tablaHTML[$pos]['altoRow'] = 3;
		// $tablaHTML[$pos]['borde'] = 1;
		$pos = $pos+1;
		
		$tablaHTML[$pos]['medidas']=array(70,30);
		$tablaHTML[$pos]['alineado']=array('L','L');

		$auto = substr($datos[0]['Autorizacion'],23,1);
		// print_r($auto);die();
		if($auto=='2')
		{
			$tablaHTML[$pos]['datos']=array('<b>AMBIENTE:','PRODUCCION');
		}else
		{
			$tablaHTML[$pos]['datos']=array('<b>AMBIENTE:','PRUEBA');
		}
		$tablaHTML[$pos]['altoRow'] = 3;
		// $tablaHTML[4]['borde'] = 1;

		$pos = $pos+1;


		$tablaHTML[$pos]['medidas']=array(70,30);
		$tablaHTML[$pos]['alineado']=array('L','L');
		$tablaHTML[$pos]['datos']=array('<b>EMISION:','NORMAL');
		$tablaHTML[$pos]['altoRow'] = 3;
		// $tablaHTML[$pos]['borde'] = 1;
		$pos = $pos+1;

		$tablaHTML[$pos]['medidas']=array(100);
		$tablaHTML[$pos]['alineado']=array('L');
		$tablaHTML[$pos]['datos']=array('<B>NUMERO DE AUTORIZACION Y CLAVE DE ACCESO ');
		$tablaHTML[$pos]['altoRow'] = 9;

		//-----------------------cuadro izquierda-----------------//
		$altoRow = 3;
		$tablaHTML2 = array();
		$pos = 0;
		if($empresa[0]['Razon_Social']!=$empresa[0]['Nombre_Comercial'])
		{
			$tablaHTML2[$pos]['medidas']=array(86);
			$tablaHTML2[$pos]['alineado']=array('L');
			$tablaHTML2[$pos]['datos']=array($empresa[0]['Razon_Social']);
			// $tablaHTML2[$pos]['borde'] = 1;
			$tablaHTML2[$pos]['altoRow'] = 4;
			$tablaHTML2[$pos]['Size'] = 8;
			$pos = $pos+1;

			$tablaHTML2[$pos]['medidas']=array(86);
			$tablaHTML2[$pos]['alineado']=array('L');
			$tablaHTML2[$pos]['datos']=array($empresa[0]['Nombre_Comercial']);
			// $tablaHTML2[$pos]['borde'] = 1;
			$tablaHTML2[$pos]['altoRow'] = 4;
			$tablaHTML2[$pos]['Size'] = 8;
			$pos = $pos+1;
		}else
		{
			$tablaHTML2[$pos]['medidas']=array(86);
			$tablaHTML2[$pos]['alineado']=array('L');
			$tablaHTML2[$pos]['datos']=array('');
			// $tablaHTML2[$pos]['borde'] = 1;
			$tablaHTML2[$pos]['altoRow'] = 4;
			$tablaHTML2[$pos]['Size'] = 8;
			$pos = $pos+1;

			$tablaHTML2[$pos]['medidas']=array(86);
			$tablaHTML2[$pos]['alineado']=array('L');
			$tablaHTML2[$pos]['datos']=array($empresa[0]['Razon_Social']);
			// $tablaHTML2[$pos]['borde'] = 1;
			$tablaHTML2[$pos]['altoRow'] = 4;
			$tablaHTML2[$pos]['Size'] = 8;
			$pos = $pos+1;

		}

		$tablaHTML2[$pos]['medidas']=array(86);
		$tablaHTML2[$pos]['alineado']=array('L');
		$tablaHTML2[$pos]['datos']=array('<b>Direccion Matriz');
		// $tablaHTML2[$pos]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$tablaHTML2[$pos]['Size'] = 7;
		$pos = $pos+1;

		$tablaHTML2[$pos]['medidas']=array(86);
		$tablaHTML2[$pos]['alineado']=array('L');
		$tablaHTML2[$pos]['datos']=array($empresa[0]['Direccion']);
		// $tablaHTML2[$pos]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;

		if($empresa[0]['sucursal']!='' && $empresa[0]['direccion_s']!='' && $empresa[0]['direccion_s']!='.')
		{
		$tablaHTML2[$pos]['medidas']=array(86);
		$tablaHTML2[$pos]['alineado']=array('L');
		$tablaHTML2[$pos]['datos']=array('<b>Direccion Sucursal');
		// $tablaHTML2[$pos]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;

		$tablaHTML2[$pos]['medidas']=array(86);
		$tablaHTML2[$pos]['alineado']=array('L');		
		$tablaHTML2[$pos]['datos']=array($empresa[0]['direccion_s']);	    	    
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		// $tablaHTML2[4]['borde'] = 1;
		$pos = $pos+1;
		}else
		{
			$tablaHTML2[$pos]['medidas']=array(86);
			$tablaHTML2[$pos]['alineado']=array('L');		
			$tablaHTML2[$pos]['datos']=array('');	    	    
			$tablaHTML2[$pos]['altoRow'] = $altoRow;
			// $tablaHTML2[4]['borde'] = 1;
			$pos = $pos+1;
		}

		$tablaHTML2[$pos]['medidas']=array(30,56);
		$tablaHTML2[$pos]['alineado']=array('L'.'L');
		$tablaHTML2[$pos]['datos']=array('<b>Telefono',$empresa[0]['telefono']);
		if($empresa[0]['sucursal']!='')
		{
		  $tablaHTML2[$pos]['datos']=array('<b>Telefono',$empresa[0]['telefono_s']);
	    }
		// $tablaHTML2[5]['borde'] = 1;

		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;

		$tablaHTML2[$pos]['medidas']=array(30,56);
		$tablaHTML2[$pos]['alineado']=array('L','L');
		$tablaHTML2[$pos]['datos']=array('<b>Email',$empresa[0]['email']);
		if($empresa[0]['sucursal']!='')
		{
		 $tablaHTML2[$pos]['datos']=array('<b>Email',$empresa[0]['email_s']);
	    }
		// $tablaHTML2[6]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;

		$tablaHTML2[$pos]['medidas']=array(50,36);
		$tablaHTML2[$pos]['alineado']=array('L','L');
		$tablaHTML2[$pos]['datos']=array('<b>Contribuyente especial Nro',$empresa[0]['contribuyenteEspecial']);
		// $tablaHTML2[$pos]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;
		$conta = 'NO';
		if($empresa[0]['obligadoContabilidad']==1){$conta='SI';}
		$tablaHTML2[$pos]['medidas']=array(70,16);
		$tablaHTML2[$pos]['alineado']=array('L','L');
		$tablaHTML2[$pos]['datos']=array('<b>OBLIGADO A LLEVAR CONTABILIDAD',$conta);
		// $tablaHTML2[$pos]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;

		$tablaHTML2[$pos]['medidas']=array(86);
		$tablaHTML2[$pos]['alineado']=array('C');
		$tablaHTML2[$pos]['datos']=array('****'.$rin.'*****');
		// $tablaHTML2[$pos]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;

		//----------------------------datos personales---------------------

		$altoRow = 3;
		$tablaHTML3 = array();
		if($datos[0]['Guia_Remision']==1)
		{
			$tablaHTML3[0]['medidas']=array(55,85,50);
			$tablaHTML3[0]['alineado']=array('L','L','L');
			$tablaHTML3[0]['datos']=array('<b>Razon Social / Nombre y Apellido',$datos[0]['nombre'],'<b>Guia de remision');
		}else
		{	
			$tablaHTML3[0]['medidas']=array(55,85);
			$tablaHTML3[0]['alineado']=array('L','L');
			$tablaHTML3[0]['datos']=array('<b>Razon Social / Nombre y Apellido',$datos[0]['nombre']);
		}
		// $tablaHTML3[0]['borde'] = 1;
		$tablaHTML3[0]['altoRow'] = $altoRow;

		$tablaHTML3[1]['medidas']=array(23,117,50);
		$tablaHTML3[1]['alineado']=array('L','L','L');
		$tablaHTML3[1]['datos']=array('<b>Telefono:',$datos[0]['telefono'],'');
		// $tablaHTML3[1]['borde'] = 1;
		$tablaHTML3[1]['altoRow'] = $altoRow;

		$tablaHTML3[2]['medidas']=array(20,120,50);
		$tablaHTML3[2]['alineado']=array('L','L','L');
		$tablaHTML3[2]['datos']=array('<b>Email:',$datos[0]['mail'],'');
		// $tablaHTML3[2]['borde'] = 1;
		$tablaHTML3[2]['altoRow'] = $altoRow;

		$tablaHTML3[3]['medidas']=array(45,95,50);
		$tablaHTML3[3]['alineado']=array('L','L','L');
		$tablaHTML3[3]['datos']=array('<b>Identificacion (RUC/C.C):',$datos[0]['ci_ruc'],'');
		// $tablaHTML3[3]['borde'] = 1;
		$tablaHTML3[3]['altoRow'] = $altoRow;

		$tablaHTML3[4]['medidas']=array(30,110,50);
		$tablaHTML3[4]['alineado']=array('L','L','L');
		$tablaHTML3[4]['datos']=array('<b>Fecha Emision',$datos[0]['fecha'],'');
		// $tablaHTML3[4]['borde'] = 1;
		$tablaHTML3[4]['altoRow'] = $altoRow;

		$tablaHTML3[5]['medidas']=array(25,115,50);
		$tablaHTML3[5]['alineado']=array('L','L','L');
		$tablaHTML3[5]['datos']=array('<b>Direccion:',$datos[0]['direccion'],'');
		// $tablaHTML3[5]['borde'] = 1;
		$tablaHTML3[5]['altoRow'] = $altoRow;

		//-------------------------------------lineas de facturas-------------------///

		$altoRow = 5;
		$pos = 1;
		$sub=0;
		$total=0;
		$iva = 0;
		$des = 0;		
		$con_iva = 0;
		$sin_iva = 0;

		$tablaHTML4 = array();
		$tablaHTML4[0]['medidas']=array(25,15,80,27,20,23);
		$tablaHTML4[0]['alineado']=array('L','L','L','R','R','R');
		$tablaHTML4[0]['datos']=array('<b>Cod.Principal','<b>Cant','<b>Descripcion','<b>Precio Unitario','<b>Descuento','<b>Precio Total');
		$tablaHTML4[0]['borde'] = 1;
		$tablaHTML4[0]['altoRow'] = $altoRow;

		foreach ($lineas as $key => $value) {
			// print_r($value);die();
			$tablaHTML4[$pos]['medidas']=$tablaHTML4[0]['medidas'];
		    $tablaHTML4[$pos]['alineado']=$tablaHTML4[0]['alineado'];
		    $tablaHTML4[$pos]['datos']=array($value['referencia'],$value['cantidad'],$value['producto'],number_format($value['precio_uni'],6,'.',''),$value['descuento'],$value['total']);
		    $tablaHTML4[$pos]['borde'] = 1;
		    $tablaHTML4[$pos]['altoRow'] = $altoRow;
		    $pos+=1;

		// print_r($value['iva']);die();
		    $sub+=$value['subtotal'];
		    $total+=$value['total'];
		    $iva+= $value['iva'];
		    $des+=$value['descuento'];	
		    if($value['iva']==0){$sin_iva+=$value['subtotal'];}else{$con_iva+=$value['subtotal'];}	
		}


		//-----------------------------fin de lineas -------------------------------------//
		// -----------------------------------tabla totales-------------------------------//

		$altoRow = 5;
		$pos = 1;
		$tablaHTML5 = array();
		$tablaHTML5[0]['medidas']=array(47,23);
		$tablaHTML5[0]['alineado']=array('L','R');
		$tablaHTML5[0]['datos']=array('<b>SUBTOTAL '.$_SESSION['INICIO']['IVA'].'%',number_format($con_iva,2,'.',''));
		$tablaHTML5[0]['borde'] = 1;
		$tablaHTML5[0]['altoRow'] = $altoRow;

		$tablaHTML5[1]['medidas']=$tablaHTML5[0]['medidas'];
		$tablaHTML5[1]['alineado']=$tablaHTML5[0]['alineado'];
		$tablaHTML5[1]['datos']=array('<b>SUB TOTAL 0%',number_format($sin_iva,2,'.',''));
		$tablaHTML5[1]['borde'] = 1;
		$tablaHTML5[1]['altoRow'] = $altoRow;

		$tablaHTML5[2]['medidas']=$tablaHTML5[0]['medidas'];
		$tablaHTML5[2]['alineado']=$tablaHTML5[0]['alineado'];
		$tablaHTML5[2]['datos']=array('<b>SUBTOTAL SIN IMPUESTOS', number_format($sub,2,'.',''));
		$tablaHTML5[2]['borde'] = 1;
		$tablaHTML5[2]['altoRow'] = $altoRow;

		$tablaHTML5[3]['medidas']=$tablaHTML5[0]['medidas'];
		$tablaHTML5[3]['alineado']=$tablaHTML5[0]['alineado'];
		$tablaHTML5[3]['datos']=array('<b>DESCUENTOS', number_format($des,2,'.',''));
		$tablaHTML5[3]['borde'] = 1;
		$tablaHTML5[3]['altoRow'] = $altoRow;

		$tablaHTML5[4]['medidas']=$tablaHTML5[0]['medidas'];
		$tablaHTML5[4]['alineado']=$tablaHTML5[0]['alineado'];
		$tablaHTML5[4]['datos']=array('<b>IVA '.$_SESSION['INICIO']['IVA'].'%',$iva);
		$tablaHTML5[4]['borde'] = 1;
		$tablaHTML5[4]['altoRow'] = $altoRow;

		$tablaHTML5[5]['medidas']=$tablaHTML5[0]['medidas'];
		$tablaHTML5[5]['alineado']=$tablaHTML5[0]['alineado'];
		$tablaHTML5[5]['datos']=array('<b>VALOR TOTAL', number_format($total,2,'.',''));
		$tablaHTML5[5]['borde'] = 1;
		$tablaHTML5[5]['altoRow'] = $altoRow;

		// print_r($tablaHTML5);die();

		//-------------------------fin de totales-------------------------//
		//--------------------------forma de pago--------------------------//
		$altoRow = 5;
		$pos = 1;
		$tablaHTML6 = array();
		$tablaHTML6[0]['medidas']=array(87,23);
		$tablaHTML6[0]['alineado']=array('C','R');
		$tablaHTML6[0]['datos']=array('<b>FORMA DE PAGO','VALOR');
		$tablaHTML6[0]['borde'] = 1;
		$tablaHTML6[0]['altoRow'] = $altoRow;

		$forma = '01 SIN UTILIZACION DEL SISTEMA FINANCIERO';
		// print_r($datos);die();
		if($datos[0]['Tipo_pago']!='.' && $datos[0]['Tipo_pago']!='')
		{
			$forma = $datos[0]['tipo_pago_des'];
		}

		$tablaHTML6[1]['medidas']=array(87,23);
		$tablaHTML6[1]['alineado']=array('L','R');
		$tablaHTML6[1]['datos']=array($forma ,number_format($total,2,'.',''));
		$tablaHTML6[1]['borde'] = 1;
		$tablaHTML6[1]['altoRow'] = $altoRow;

		// print_r($_SESSION['INICIO']);die();

		//--------------------------forma de pago--------------------------//
		$altoRow = 5;
		$pos = 1;
		$tablaHTML7 = array();
		$tablaHTML7[0]['medidas']=array(110);
		$tablaHTML7[0]['alineado']=array('L');
		$tablaHTML7[0]['datos']=array('<b>Datos Adicionales');
		$tablaHTML7[0]['borde'] = 1;
		$tablaHTML7[0]['altoRow'] = $altoRow;

		
		$tablaHTML7[1]['medidas']=array(110);
		$tablaHTML7[1]['alineado']=array('L');
		$tablaHTML7[1]['datos']=array($datos[0]['datos_adicionales']);
		$tablaHTML7[1]['borde'] = 1;
		$tablaHTML7[1]['altoRow'] = $altoRow;

		// print_r($_SESSION['INICIO']);die();


		$doc = $this->factura_pdf->factura($tablaHTML,$tablaHTML2,$tablaHTML3,$tablaHTML4,$tablaHTML5,$tablaHTML6,$tablaHTML7,$logo,$datos[0]['Autorizacion'],$mostrar,$descargar,$datos[0]['num_factura']);
		// print_r($doc);die(); 
		return $doc;
	}


	function guia_pdf($datos=false,$lineas=false,$empresa=false,$rimpe=false,$mostrar=true,$descargar=false)
	{

		// print_r($datos);
		// print_r($lineas);
		// print_r($empresa);
		// print_r($rimpe);
		// die();
		if(isset($datos[0]['fecha']) && is_object($datos[0]['fecha']))
		{
			$datos[0]['fecha'] = $datos[0]['fecha']->format('Y-m-d');
		}
		if(isset($datos[0]['Fecha']) && is_object($datos[0]['Fecha']))
		{
			$datos[0]['Fecha'] = $datos[0]['Fecha']->format('Y-m-d');
		}

		if(!isset($datos[0]['fecha']))
		{
			$datos[0]['fecha'] = $datos[0]['Fecha'];
		}
		if(!isset($datos[0]['serie']))
		{
			$datos[0]['serie'] = $datos[0]['Serie'];
		}
		if(!isset($datos[0]['num_factura']))
		{
			$datos[0]['num_factura'] = $datos[0]['Factura'];
		}
		$logo = $empresa[0]['logo'];
		$rin = '';

		if(count($rimpe)>0)
		{
			if($rimpe['microempresa']!='.' && $rimpe['microempresa']!='' )
			{
				$rin =utf8_decode($rimpe['microempresa']);
			}			
		}




		$tablaHTML = array();
		$tablaHTML[0]['medidas']=array(45,70);
		$tablaHTML[0]['alineado']=array('L','L');
		$tablaHTML[0]['datos']=array('<b>CI/RUC:'.$empresa[0]['RUC'],$rin);
		$tablaHTML[0]['altoRow'] = 5;
		$tablaHTML[0]['Size'] = 9;
		// $tablaHTML[0]['borde'] = 1;
		$pos = 1;

		if(count($rimpe)>0)
		{			
			if($rimpe['agente']!='.' && $rimpe['agente']!='')
			{
				$tablaHTML[1]['medidas']=array(100);
				$tablaHTML[1]['alineado']=array('L');
				$tablaHTML[1]['datos']=array('Agente de Retencion Resolucion:'.$rimpe['agente']);
				$tablaHTML[1]['altoRow'] = 3;
				$tablaHTML[1]['Size'] = 7;
				// $tablaHTML[1]['borde'] = 1;
				$pos = $pos+1;
			}
		}

		$tablaHTML[$pos]['medidas']=array(70,30);
		$tablaHTML[$pos]['alineado']=array('L','L');
		$tablaHTML[$pos]['datos']=array('<b>GUIA DE REMISION:',$datos[0]['Serie_GR'].' '.$this->generar_ceros($datos[0]['Remision'],9));
		$tablaHTML[$pos]['altoRow'] = 3;
		$tablaHTML[$pos]['Size'] = 7;
		// $tablaHTML[$pos]['borde'] = 1;
		$pos = $pos+1;

		// $tablaHTML[$pos]['medidas']=array(100);
		// $tablaHTML[$pos]['alineado']=array('L');
		// $tablaHTML[$pos]['datos']=array('<B>NUMERO DE AUTORIZACION');
		// $tablaHTML[$pos]['altoRow'] = 5;
		// $pos = $pos+1;

		// $tablaHTML[$pos]['medidas']=array(100);
		// $tablaHTML[$pos]['alineado']=array('L');
		// $tablaHTML[$pos]['datos']=array(': '.$datos[0]['Autorizacion'].'');
		// $tablaHTML[$pos]['altoRow'] = 5;
		// // $tablaHTML[$pos]['borde'] = 1;
		// $pos = $pos+1;

		$tablaHTML[$pos]['medidas']=array(70,30);
		$tablaHTML[$pos]['alineado']=array('L','L');
		$tablaHTML[$pos]['datos']=array('<B>FECHA Y HORA DE AUTORIZACION: ',$datos[0]['fecha']);
		$tablaHTML[$pos]['altoRow'] = 3;
		// $tablaHTML[$pos]['borde'] = 1;
		$pos = $pos+1;
		
		$tablaHTML[$pos]['medidas']=array(70,30);
		$tablaHTML[$pos]['alineado']=array('L','L');

		$auto = substr($datos[0]['Autorizacion'],23,1);
		// print_r($auto);die();
		if($auto=='2')
		{
			$tablaHTML[$pos]['datos']=array('<b>AMBIENTE:','PRODUCCION');
		}else
		{
			$tablaHTML[$pos]['datos']=array('<b>AMBIENTE:','PRUEBA');
		}
		$tablaHTML[$pos]['altoRow'] = 3;
		// $tablaHTML[4]['borde'] = 1;

		$pos = $pos+1;


		$tablaHTML[$pos]['medidas']=array(70,30);
		$tablaHTML[$pos]['alineado']=array('L','L');
		$tablaHTML[$pos]['datos']=array('<b>EMISION:','NORMAL');
		$tablaHTML[$pos]['altoRow'] = 3;
		// $tablaHTML[$pos]['borde'] = 1;
		$pos = $pos+1;

		$tablaHTML[$pos]['medidas']=array(100);
		$tablaHTML[$pos]['alineado']=array('L');
		$tablaHTML[$pos]['datos']=array('<B>NUMERO DE AUTORIZACION Y CLAVE DE ACCESO ');
		$tablaHTML[$pos]['altoRow'] = 9;

		//-----------------------cuadro izquierda-----------------//
		$altoRow = 3;
		$tablaHTML2 = array();
		$pos = 0;
		if($empresa[0]['Razon_Social']!=$empresa[0]['Nombre_Comercial'])
		{
			$tablaHTML2[$pos]['medidas']=array(86);
			$tablaHTML2[$pos]['alineado']=array('L');
			$tablaHTML2[$pos]['datos']=array($empresa[0]['Razon_Social']);
			// $tablaHTML2[$pos]['borde'] = 1;
			$tablaHTML2[$pos]['altoRow'] = 4;
			$tablaHTML2[$pos]['Size'] = 8;
			$pos = $pos+1;

			$tablaHTML2[$pos]['medidas']=array(86);
			$tablaHTML2[$pos]['alineado']=array('L');
			$tablaHTML2[$pos]['datos']=array($empresa[0]['Nombre_Comercial']);
			// $tablaHTML2[$pos]['borde'] = 1;
			$tablaHTML2[$pos]['altoRow'] = 4;
			$tablaHTML2[$pos]['Size'] = 8;
			$pos = $pos+1;
		}else
		{
			$tablaHTML2[$pos]['medidas']=array(86);
			$tablaHTML2[$pos]['alineado']=array('L');
			$tablaHTML2[$pos]['datos']=array('');
			// $tablaHTML2[$pos]['borde'] = 1;
			$tablaHTML2[$pos]['altoRow'] = 4;
			$tablaHTML2[$pos]['Size'] = 8;
			$pos = $pos+1;

			$tablaHTML2[$pos]['medidas']=array(86);
			$tablaHTML2[$pos]['alineado']=array('L');
			$tablaHTML2[$pos]['datos']=array($empresa[0]['Razon_Social']);
			// $tablaHTML2[$pos]['borde'] = 1;
			$tablaHTML2[$pos]['altoRow'] = 4;
			$tablaHTML2[$pos]['Size'] = 8;
			$pos = $pos+1;

		}

		$tablaHTML2[$pos]['medidas']=array(86);
		$tablaHTML2[$pos]['alineado']=array('L');
		$tablaHTML2[$pos]['datos']=array('<b>Direccion Matriz');
		// $tablaHTML2[$pos]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$tablaHTML2[$pos]['Size'] = 7;
		$pos = $pos+1;

		$tablaHTML2[$pos]['medidas']=array(86);
		$tablaHTML2[$pos]['alineado']=array('L');
		$tablaHTML2[$pos]['datos']=array($empresa[0]['Direccion']);
		// $tablaHTML2[$pos]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;

		if($empresa[0]['sucursal']!='' && $empresa[0]['direccion_s']!='' && $empresa[0]['direccion_s']!='.')
		{
		$tablaHTML2[$pos]['medidas']=array(86);
		$tablaHTML2[$pos]['alineado']=array('L');
		$tablaHTML2[$pos]['datos']=array('<b>Direccion Sucursal');
		// $tablaHTML2[$pos]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;

		$tablaHTML2[$pos]['medidas']=array(86);
		$tablaHTML2[$pos]['alineado']=array('L');		
		$tablaHTML2[$pos]['datos']=array($empresa[0]['direccion_s']);	    	    
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		// $tablaHTML2[4]['borde'] = 1;
		$pos = $pos+1;
		}else
		{
			$tablaHTML2[$pos]['medidas']=array(86);
			$tablaHTML2[$pos]['alineado']=array('L');		
			$tablaHTML2[$pos]['datos']=array('');	    	    
			$tablaHTML2[$pos]['altoRow'] = $altoRow;
			// $tablaHTML2[4]['borde'] = 1;
			$pos = $pos+1;
		}

		$tablaHTML2[$pos]['medidas']=array(30,56);
		$tablaHTML2[$pos]['alineado']=array('L'.'L');
		$tablaHTML2[$pos]['datos']=array('<b>Telefono',$empresa[0]['telefono']);
		if($empresa[0]['sucursal']!='')
		{
		  $tablaHTML2[$pos]['datos']=array('<b>Telefono',$empresa[0]['telefono_s']);
	    }
		// $tablaHTML2[5]['borde'] = 1;

		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;

		$tablaHTML2[$pos]['medidas']=array(30,56);
		$tablaHTML2[$pos]['alineado']=array('L','L');
		$tablaHTML2[$pos]['datos']=array('<b>Email',$empresa[0]['email']);
		if($empresa[0]['sucursal']!='')
		{
		 $tablaHTML2[$pos]['datos']=array('<b>Email',$empresa[0]['email_s']);
	    }
		// $tablaHTML2[6]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;

		$tablaHTML2[$pos]['medidas']=array(50,36);
		$tablaHTML2[$pos]['alineado']=array('L','L');
		$tablaHTML2[$pos]['datos']=array('<b>Contribuyente especial Nro',$empresa[0]['contribuyenteEspecial']);
		// $tablaHTML2[$pos]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;
		$conta = 'NO';
		if($empresa[0]['obligadoContabilidad']==1){$conta='SI';}
		$tablaHTML2[$pos]['medidas']=array(70,16);
		$tablaHTML2[$pos]['alineado']=array('L','L');
		$tablaHTML2[$pos]['datos']=array('<b>OBLIGADO A LLEVAR CONTABILIDAD',$conta);
		// $tablaHTML2[$pos]['borde'] = 1;
		$tablaHTML2[$pos]['altoRow'] = $altoRow;
		$pos = $pos+1;

		// $tablaHTML2[$pos]['medidas']=array(86);
		// $tablaHTML2[$pos]['alineado']=array('C');
		// $tablaHTML2[$pos]['datos']=array('****CONTRIBUYENTE REGIMEN MICRO EMPRESA*****');
		// // $tablaHTML2[$pos]['borde'] = 1;
		// $tablaHTML2[$pos]['altoRow'] = $altoRow;
		// $pos = $pos+1;

		//----------------------------datos personales---------------------

		$altoRow = 3;
		$tablaHTML3 = array();
		$tablaHTML3[0]['medidas']=array(55,85,30,20);
		$tablaHTML3[0]['alineado']=array('L','L','','');
		$tablaHTML3[0]['datos']=array('<b>Razon Social / Nombre y Apellido',$datos[0]['nombre'],'Identificacion',$datos[0]['ci_ruc']);
		// $tablaHTML3[0]['borde'] = 1;
		$tablaHTML3[0]['altoRow'] = $altoRow;

		$tablaHTML3[1]['medidas']=array(25,115,50);
		$tablaHTML3[1]['alineado']=array('L','L','L');
		$tablaHTML3[1]['datos']=array('<b>Direccion:',$datos[0]['direccion'],'Motivo de traslado: Venta');
		// $tablaHTML3[1]['borde'] = 1;
		$tablaHTML3[1]['altoRow'] = $altoRow;

// print_r($datos);die();
		$tablaHTML3[2]['medidas']=array(25,75,20,30,25,20);
		$tablaHTML3[2]['alineado']=array('L','L','L','L','L','L');
		$tablaHTML3[2]['datos']=array('<b>Autorizacion:',$datos[0]['AutorizacionGR_F'],'<b>Factura No:',$datos[0]['serie'].'-'.$this->generar_ceros($datos[0]['num_factura'],9),'<b>Fecha Emision:',$datos[0]['fecha']);
		// $tablaHTML3[2]['borde'] = 1;
		$tablaHTML3[2]['altoRow'] = $altoRow;

		//-------------------------------------lineas de facturas-------------------///

		$altoRow = 5;
		$pos = 1;
		$sub=0;
		$total=0;
		$iva = 0;
		$des = 0;		
		$con_iva = 0;
		$sin_iva = 0;

		$tablaHTML4 = array();
		$tablaHTML4[0]['medidas']=array(25,15,80,27,20,23);
		$tablaHTML4[0]['alineado']=array('L','L','L','R','R','R');
		$tablaHTML4[0]['datos']=array('<b>Cod.Principal','<b>Cant','<b>Descripcion','<b>Precio Unitario','<b>Descuento','<b>Precio Total');
		$tablaHTML4[0]['borde'] = 1;
		$tablaHTML4[0]['altoRow'] = $altoRow;

		foreach ($lineas as $key => $value) {
			// print_r($value);die();
			$tablaHTML4[$pos]['medidas']=$tablaHTML4[0]['medidas'];
		    $tablaHTML4[$pos]['alineado']=$tablaHTML4[0]['alineado'];
		    $tablaHTML4[$pos]['datos']=array($value['referencia'],$value['cantidad'],$value['producto'],number_format($value['precio_uni'],6,'.',''),$value['descuento'],$value['total']);
		    $tablaHTML4[$pos]['borde'] = 1;
		    $tablaHTML4[$pos]['altoRow'] = $altoRow;
		    $pos+=1;

		// print_r($value['iva']);die();
		    $sub+=$value['subtotal'];
		    $total+=$value['total'];
		    $iva+= $value['iva'];
		    $des+=$value['descuento'];	
		    if($value['iva']==0){$sin_iva+=$value['subtotal'];}else{$con_iva+=$value['subtotal'];}	
		}


		//-----------------------------fin de lineas -------------------------------------//
		// -----------------------------------tabla trans-------------------------------//

		$altoRow = 3;
		$tablaHTML5 = array();
		$tablaHTML5[0]['medidas']=array(65,85,20,20);
		$tablaHTML5[0]['alineado']=array('L','L','','');
		$tablaHTML5[0]['datos']=array('<b>Razon Social / Nombre y Apellido :(Transportista)',$datos[0]['Comercial'],'Identificacion',$datos[0]['CIRUC_Comercial']);
		// $tablaHTML5[0]['borde'] = 1;
		$tablaHTML5[0]['altoRow'] = $altoRow;

		$tablaHTML5[1]['medidas']=array(50,50,50,50);
		$tablaHTML5[1]['alineado']=array('C','C','C','C');
		$tablaHTML5[1]['datos']=array('<b>Punto de Partida','<b>Fecha inicio','<b>Fecha fin','<b>Placa');
		// $tablaH5ML5[1]['borde'] = 1;
		$tablaHTML5[1]['altoRow'] = $altoRow;

		$tablaHTML5[2]['medidas']=array(50,50,50,50);
		$tablaHTML5[2]['alineado']=array('C','C','C','C');
		$tablaHTML5[2]['datos']=array($datos[0]['CiudadGRI'],$datos[0]['FechaGRI'],$datos[0]['FechaGRF'],$datos[0]['Placa_Vehiculo']);
		// $tablaH5ML5[2]['borde'] = 1;
		$tablaHTML5[2]['altoRow'] = $altoRow;


		// print_r($tablaHTML5);die();

		//-------------------------fin de totales-------------------------//
		//--------------------------tabla llegada--------------------------//
		// print_r($datos[0]);die();
		$altoRow = 3;
		$tablaHTML6 = array();
		$tablaHTML6[0]['medidas']=array(65,85,20,20);
		$tablaHTML6[0]['alineado']=array('L','L','L','L');
		$tablaHTML6[0]['datos']=array('<b>Razon Social / Nombre y Apellido :(Punto de llegada)',$datos[0]['Entrega'],'Identificacion',$datos[0]['CIRUC_Entrega']);
		// $tablaHTML6[0]['borde'] = 1;
		$tablaHTML6[0]['altoRow'] = $altoRow;

		$tablaHTML6[1]['medidas']=array(30,170);
		$tablaHTML6[1]['alineado']=array('L','L');
		$tablaHTML6[1]['datos']=array('<b>Destino:',$datos[0]['CiudadGRF']);
		// $tablaH5ML6[1]['borde'] = 1;
		$tablaHTML6[1]['altoRow'] = $altoRow;


		//--------------------------tabla llegada--------------------------//
		// print_r($datos[0]);die();
		$altoRow = 3;
		$tablaHTML7 = array();
		$tablaHTML7[0]['medidas']=array(190);
		$tablaHTML7[0]['alineado']=array('L');
		$tablaHTML7[0]['datos']=array('<b>INFORMACION ADICIONAL adicional');
		$tablaHTML7[0]['borde'] = 1;
		$tablaHTML7[0]['altoRow'] = $altoRow;

		$tablaHTML7[1]['medidas']=array(190);
		$tablaHTML7[1]['alineado']=array('L');
		$tablaHTML7[1]['datos']=array('');
		$tablaHTML7[1]['borde'] = 1;
		$tablaHTML7[1]['altoRow'] = $altoRow;


				

		// print_r($_SESSION['INICIO']);die();


		$doc = $this->factura_pdf->guia_remision($tablaHTML,$tablaHTML2,$tablaHTML3,$tablaHTML4,$tablaHTML5,$tablaHTML6,$tablaHTML7,$logo,$datos[0]['Autorizacion_GR'],$mostrar,$descargar,$datos[0]['num_factura']);
		// print_r($doc);die(); 
		return $doc;
	}

	function piezas_compradas($datos=false,$cabecera=false)
	{
		// print_r($cabecera);die();
		$tablaHTML = array();
		$tablaHTML[0]['medidas']=array(18,120);
		$tablaHTML[0]['alineado']=array('L','L');
		$tablaHTML[0]['datos']=array('<b>Cliente:',$cabecera[0]['nombre']);
		$tablaHTML[0]['altoRow'] = 5;
		$tablaHTML[0]['borde'] = 'B';

		$tablaHTML[1]['medidas']=array(25,113);
		$tablaHTML[1]['alineado']=array('L','L');
		$tablaHTML[1]['datos']=array('<b>Dir. Domicilio:',$cabecera[0]['direccion']);
		$tablaHTML[1]['altoRow'] = 5;
		$tablaHTML[1]['borde'] = 'B';

		$tablaHTML[2]['medidas']=array(25,54,20,39);
		$tablaHTML[2]['alineado']=array('L','L','L','L');
		$tablaHTML[2]['datos']=array('<b>Empresa:',$cabecera[0]['nombre_empresa'],'<b>Email:',$cabecera[0]['email']);
		$tablaHTML[2]['altoRow'] = 5;
		$tablaHTML[2]['borde'] = 'B';

		$tablaHTML[3]['medidas']=array(28,110);
		$tablaHTML[3]['alineado']=array('L','L');
		$tablaHTML[3]['datos']=array('<b>dir. Empresa:','');
		$tablaHTML[3]['altoRow'] = 5;
		$tablaHTML[3]['borde'] = 'B';

		 // -----------------TABLA DE TELEFONOS-----------------------


		$tablaHTML2 = array();
		$tablaHTML2[0]['medidas']=array(18,35);
		$tablaHTML2[0]['alineado']=array('L');
		$tablaHTML2[0]['datos']=array(utf8_decode('<b>Cédula'),$cabecera[0]['ci_ruc']);
		$tablaHTML2[0]['altoRow'] = 5;
		$tablaHTML2[0]['borde'] = 'B';


		$tablaHTML2[1]['medidas']=array(20,33);
		$tablaHTML2[1]['alineado']=array('L','L');
		$tablaHTML2[1]['datos']=array('<b>Tel. Dom:',$cabecera[0]['telefono']);
		$tablaHTML2[1]['altoRow'] = 5;
		$tablaHTML2[1]['borde'] = 'B';

		$tablaHTML2[2]['medidas']=array(25,28);
		$tablaHTML2[2]['alineado']=array('L','L');
		$tablaHTML2[2]['datos']=array('<b>Tel. Empresa:','');
		$tablaHTML2[2]['altoRow'] = 5;
		$tablaHTML2[2]['borde'] = 'B';

		$tablaHTML2[3]['medidas']=array(23,30);
		$tablaHTML2[3]['alineado']=array('L','L');
		$tablaHTML2[3]['datos']=array('<b>Tel. Celular:','');
		$tablaHTML2[3]['altoRow'] = 5;
		$tablaHTML2[3]['borde'] = 'B';

		$tablaHTML2[4]['medidas']=array(33,20);
		$tablaHTML2[4]['alineado']=array('L','L');
		$tablaHTML2[4]['datos']=array(utf8_decode('<b>Fecha Cumpleaños:'),'');
		$tablaHTML2[4]['altoRow'] = 5;
		$tablaHTML2[4]['borde'] = 'B';

		$tablaHTML2[5]['medidas']=array(33,20);
		$tablaHTML2[5]['alineado']=array('L','L');
		$tablaHTML2[5]['datos']=array('<b>Fecha Aniversario:','');
		$tablaHTML2[5]['altoRow'] = 5;
		$tablaHTML2[5]['borde'] = 'B';

		// $tablaHTML2[6]['medidas']=array(190);
		// $tablaHTML2[6]['alineado']=array('C');
		// $tablaHTML2[6]['datos']=array('<b>PIEZAS COMPRADAS');
		// $tablaHTML2[6]['altoRow'] = 7;
		// $tablaHTML2[6]['borde'] = 1;
		// $tablaHTML2[6]['color'] ='si';

		
		

		//-------------------------------------lineas de facturas-------------------///

		$altoRow = 5;
		$pos = 1;
		$sub=0;
		$total=0;
		$iva = 0;
		$des = 0;
		$tablaHTML4 = array();
		$tablaHTML4[0]['medidas']=array(10,25,60,25,17);
		$tablaHTML4[0]['alineado']=array('C','L','L','L','R');
		$tablaHTML4[0]['datos']=array('No','<b>FECHA','<b>ITEM','<b>CODIGO','<b>VALOR');
		$tablaHTML4[0]['borde'] = 1;
		$tablaHTML4[0]['altoRow'] = $altoRow;
		$tablaHTML4[0]['color']='si';
		$con = 1;
		foreach ($datos as $key => $value) {
			// print_r($value);die()
			$tablaHTML4[$pos]['medidas']=$tablaHTML4[0]['medidas'];
		    $tablaHTML4[$pos]['alineado']=$tablaHTML4[0]['alineado'];
		    $tablaHTML4[$pos]['datos']=array($con,'2021-05-20',$value['producto'],$value['codigo'],$value['total']);
		    $tablaHTML4[$pos]['borde'] = 1;
		    $tablaHTML4[$pos]['altoRow'] = $altoRow;
		    $pos+=1;

		    $sub+=$value['subtotal'];
		    $total+=$value['total'];
		    $iva+= $value['iva'];
		    $des+=$value['descuento'];
		    $con+=1;			
		}

		//-----------------------------fin de lineas -------------------------------------//
		
		//--------------------------forma de pago--------------------------//
		$altoRow = 5;
		$pos = 1;
		$tablaHTML6 = array();
		$tablaHTML6[0]['medidas']=array(47,23);
		$tablaHTML6[0]['alineado']=array('C','R');
		$tablaHTML6[0]['datos']=array('<b>FORMA DE PAGO','VALOR');
		$tablaHTML6[0]['borde'] = 1;
		$tablaHTML6[0]['altoRow'] = $altoRow;

		$this->factura_pdf->piezas_compradas($tablaHTML,$tablaHTML2,$tablaHTML4,$tablaHTML6);
	}

	function reporte_trabajo($datos,$estado)
	{
		// print_r($datos);
		// print_r($estado);die();
		$tablaHTML = array();
		
		$tablaHTML[0]['medidas']=array(40,57,40,58);
		$tablaHTML[0]['alineado']=array('L','L','L','L');
		$tablaHTML[0]['datos']=array('<b>CODIGO DE JOLLA',$datos[0]['cod'],'<b>FECHA DE INGRESO:',$datos[0]['fecha']->format('Y-m-d'));
		$tablaHTML[0]['borde'] = 1;
		

		$tablaHTML[1]['medidas']=array(50,145);
		$tablaHTML[1]['alineado']=array('L','L');
		$tablaHTML[1]['datos']=array('<B>NOMBRE DEL CLIENTE:',$datos[0]['cliente']);
		$tablaHTML[1]['borde'] = 1;
		// $tablaHTML[0]['estilo']='BI';

		$tablaHTML[2]['medidas']=array(30,165);
		$tablaHTML[2]['alineado']=$tablaHTML[1]['alineado'];
		$tablaHTML[2]['datos']=array('<B>JOLLA:',$datos[0]['nombre']);
		$tablaHTML[2]['borde'] = 1;
		// $tablaHTML[1]['estilo']='I';

		// $tablaHTML[4]['estilo']='BI';

		$tablaHTML[3]['medidas']=array(35,55,30,40,20,15);
		$tablaHTML[3]['alineado']=array('L','L','L','L','L','L');
		$tablaHTML[3]['datos']=array('<b>TIPO DE JOLLA',$datos[0]['tipo'],'<B>MATERIAL',$datos[0]['material'],'<b>PESO',$datos[0]['peso'].'Kg');
		$tablaHTML[3]['borde'] = 1;
		// $tablaHTML[3]['estilo']='I';


		$tablaHTML[4]['medidas']=array(195);
		$tablaHTML[4]['alineado']=array('L');
		$tablaHTML[4]['datos']=array('TRABAJO A REALIZAR:');
		$tablaHTML[4]['estilo']='BI';
		$tablaHTML[4]['borde'] = 1;

		$tablaHTML[5]['medidas']=$tablaHTML[4]['medidas'];
		$tablaHTML[5]['alineado']=$tablaHTML[4]['alineado'];
		$tablaHTML[5]['datos']=array($datos[0]['trabajo']);
		$tablaHTML[5]['estilo']='I';
		$tablaHTML[5]['borde'] = 1;

		$tablaHTML[6]['medidas']=array(195);
		$tablaHTML[6]['alineado']=array('L');
		$tablaHTML[6]['datos']=array('PROCESOS REALIZADOS:');
		$tablaHTML[6]['estilo']='BI';
		// $tablaHTML[6]['borde'] = 1;

		$co = 7;
		foreach ($estado as $key => $value) {
			$tablaHTML[$co]['medidas']=array(40,40,115);
		    $tablaHTML[$co]['alineado']=array('L','L','L');
		    $tablaHTML[$co]['datos']=array($value['fecha']->format('Y-m-d'),$value['estado'],$value['observacion']);
		    $tablaHTML[$co]['estilo']='I';	
		    $tablaHTML[$co]['borde'] = 'B';
		    $co+=1;		
		}

		// $tablaHTML[9]['medidas']=$tablaHTML[0]['medidas'];
		// $tablaHTML[9]['alineado']=$tablaHTML[0]['alineado'];
		// $tablaHTML[9]['datos']=array($datos[0]['trabajo']);
		// $tablaHTML[9]['estilo']='I';

		// $tablaHTML[8]['medidas']=array(195);
		// $tablaHTML[8]['alineado']=array('L');
		// $tablaHTML[8]['datos']=array('TRABAJO REALIZADO AL INICIAR:');
		// $tablaHTML[8]['estilo']='BI';

		// $tablaHTML[9]['medidas']=$tablaHTML[0]['medidas'];
		// $tablaHTML[9]['alineado']=$tablaHTML[0]['alineado'];
		// $tablaHTML[9]['datos']=array('obseservacion de prueba');
		// $tablaHTML[9]['estilo']='I';


		$this->pdf->cabecera_reporte_MC($titulo='INFORME DE TRABAJO REALIZADO',$tablaHTML,$contenido=false,$image=false,false,false,$sizetable=9,true,$sal_hea_body=30);
	}

	function detalle_de_transaccion($datos)
	{
		$tablaHTML = array();
// 		Codigo	24
// Fecha	03/09/12
// Descripcion	COMPRA PROVEEDOR NRO 15
// Tipo Movimiento	INGRESO BODEGA
// USUARIO	mpaz
// USUARIO	Monica Paz
// Bodega	CARMEN ELENA PEÑA
// Transferencia Codigo	0
// Transferencia Descripcion	

// print_r($datos['documento_datos']);die();

		
		$tablaHTML[0]['medidas']=array(50,50);
		$tablaHTML[0]['alineado']=array('L','L');
		$tablaHTML[0]['datos']=array('<b>CODIGO DE JOLLA','');
		// $tablaHTML[0]['borde'] = 1;
		$tablaHTML[1]['medidas']=array(40,50);
		$tablaHTML[1]['alineado']=array('L','L');
		$tablaHTML[1]['datos']=array('<b>Fecha',$datos['documento_datos'][0]['fecha_factura']->format('Y-m-d'));
		// $tablaHTML[0]['borde'] = 1;
		$tablaHTML[2]['medidas']=array(40,200);
		$tablaHTML[2]['alineado']=array('L','L');
		$tablaHTML[2]['datos']=array('<b>Descripcion',$datos['documento_datos'][0]['documento'].' '.$datos['documento_datos'][0]['nombre']);
		// $tablaHTML[0]['borde'] = 1;
		$tablaHTML[3]['medidas']=array(40,50);
		$tablaHTML[3]['alineado']=array('L','L');
		$tablaHTML[3]['datos']=array('<b>Tipo de movimiento',$datos['documento_datos'][0]['detalle_transaccion']);
		// $tablaHTML[0]['borde'] = 1;
		$tablaHTML[4]['medidas']=array(40,200);
		$tablaHTML[4]['alineado']=array('L','L');
		$tablaHTML[4]['datos']=array('<b>usuario',$_SESSION['INICIO']['USUARIO_LOG']);
		// $tablaHTML[0]['borde'] = 1;
		$tablaHTML[5]['medidas']=array(40,70,40,70);
		$tablaHTML[5]['alineado']=array('L','L','L','L');
		$tablaHTML[5]['datos']=array('<b>Bodega salida',$datos['documento_datos'][0]['salida'],'<b>Bodega Entrada',$datos['documento_datos'][0]['entrada']);
		// $tablaHTML[0]['borde'] = 1;
		$tablaHTML[6]['medidas']=array(40,40,20,50,20,20);
		$tablaHTML[6]['alineado']=array('L','L','L','L','R','R');
		$tablaHTML[6]['datos']=array('CODIGO DE JOYA','NOTA','PESO','FOTO','PVP','Precio');
		$tablaHTML[6]['borde'] = 1;
		$tablaHTML[6]['estilo'] = 'B';

		$con = 7;

// print_r($datos['lines_documentos']);die();
		foreach ($datos['lines_documentos'] as $key => $value) {
			$tablaHTML[$con]['medidas']=$tablaHTML[6]['medidas'];
		    $tablaHTML[$con]['alineado']=$tablaHTML[6]['alineado'];
		    $tablaHTML[$con]['datos']=array($value['codigo_ref'],$value['producto'],$value['peso'],$value['foto'],$value['precio_uni'],$value['precio_uni']);
		    $tablaHTML[$con]['borde'] = 1;
		    $tablaHTML[$con]['tipo'] = array('CON_IMAGEN',array('4','2')); // SEGUNDO PARAMETRO LA POSICION DE LA IMAGEN;

		    $tablaHTML[$con]['altoRow'] = 40;
		    $con=$con+1;

		}
		

		$this->pdf->cabecera_reporte_MC($titulo='TRANSACCION REALIZADA',$tablaHTML,$contenido=false,$image=false,false,false,$sizetable=10,true,$sal_hea_body=30);

	}

	function orden_trabajo_nuevo($cabecera,$detalle,$detalle_di = false)
	{
		 if($cabecera[0]['boceto']==0)
		 {
		 	$titulo='Orden de trabajo Producto terminado';
		 }
		 else
		 {
		 	$titulo= utf8_decode('Orden de trabajo (Nuevo Diseño)');
		 }
  	// print_r($detalle_di);die();
		$tablaHTML[0]['medidas']=array(19,30,30,50,33,25);
		$tablaHTML[0]['alineado']=array('L','L','L','L','L','L');
		$tablaHTML[0]['datos']=array('<b>CODIGO',$cabecera[0]['codigo'],'<b>RESPONSABLE',$cabecera[0]['Encargado'],'<b>FECHA INGRESO',$cabecera[0]['fecha_orden']->format('Y-m-d'));
		$tablaHTML[0]['altoRow'] = 5;

		$tablaHTML[0]['borde']=1;
		$tablaHTML[1]['medidas']=array(19,30,30,50,33,25);
		$tablaHTML[1]['alineado']=array('L','L','L','L','L','L');
		$tablaHTML[1]['datos']=array('<b>DESDE',$cabecera[0]['nombre_punto'],'<b>PARA MAESTRO',$cabecera[0]['maestro'],'<b>FECHA ENTREGA',$cabecera[0]['fecha_exp']->format('Y-m-d'));
		$tablaHTML[1]['borde']=1;
		$tablaHTML[1]['altoRow'] = 5;

		if($cabecera[0]['boceto']==1)
		{
		$tablaHTML[2]['medidas']=array(25,68,25,69);
		$tablaHTML[2]['alineado']=array('L','L','L','L');
		$tablaHTML[2]['datos']=array('<b>MODELO',$detalle_di[0]['modelo'],'<b>MATERIAL',$detalle_di[0]['nombre_material']);
		$tablaHTML[2]['borde']=1;
		$tablaHTML[2]['altoRow'] = 5;

		$tablaHTML[3]['medidas']=array(25,25,35,102);
		$tablaHTML[3]['alineado']=array('L','L','L','L');
		$tablaHTML[3]['datos']=array('<b>MEDIA',$detalle_di[0]['medida'],'<b>OBSERVACIONES',$detalle_di[0]['observacion']);
		$tablaHTML[3]['borde']=1;
		$tablaHTML[3]['altoRow'] = 5;

		$tablaHTML[4]['medidas']=array(187);
		$tablaHTML[4]['alineado']=array('L');
		$tablaHTML[4]['datos']=array('');
		

		$tablaHTML[5]['medidas']=array(93,94,);
		$tablaHTML[5]['alineado']=array('L','L');
		$tablaHTML[5]['datos']=array($detalle_di[0]['foto1'],$detalle_di[0]['foto2']);
		$tablaHTML[5]['borde']=1;
		$tablaHTML[5]['tipo'] = array('CON_IMAGEN',array('1','1')); // SEGUNDO PARAMETRO LA POSICION DE LA IMAGEN;
		$tablaHTML[5]['altoRow'] = 85;

		if($detalle_di[0]['foto3']!='' || $detalle_di[0]['foto4']!='')
		{
		   $tablaHTML[6]['medidas']=array(93,94,);
		   $tablaHTML[6]['alineado']=array('L','L');
		   $tablaHTML[6]['datos']=array($detalle_di[0]['foto3'],$detalle_di[0]['foto4']);
		   $tablaHTML[6]['borde']=1;
		   $tablaHTML[6]['tipo'] = array('CON_IMAGEN',array('1','1')); // SEGUNDO PARAMETRO LA POSICION DE LA IMAGEN;
		   $tablaHTML[6]['altoRow'] = 85;
	    }

	    if($detalle_di[0]['foto5']!='' || $detalle_di[0]['foto6']!='')
		{
		   $tablaHTML[7]['medidas']=array(93,94,);
		   $tablaHTML[7]['alineado']=array('L','L');
		   $tablaHTML[7]['datos']=array($detalle_di[0]['foto6'],$detalle_di[0]['foto6']);
		   $tablaHTML[7]['borde']=1;
		   $tablaHTML[7]['tipo'] = array('CON_IMAGEN',array('1','1')); // SEGUNDO PARAMETRO LA POSICION DE LA IMAGEN;
		   $tablaHTML[7]['altoRow'] = 94;
	    } 


	    }



		$pos =count($tablaHTML);
		foreach ($detalle as $key => $value) {
			$tablaHTML[$pos]['medidas']=array(187);
		    $tablaHTML[$pos]['alineado']=array('L');
		    $tablaHTML[$pos]['datos']=array('<b>PRODUCTO:'.$value['producto']);
		    $tablaHTML[$pos]['borde']=1;
		    $tablaHTML[$pos]['altoRow'] = 8;
		    $pos+=1;
		    $tablaHTML[$pos]['medidas']=array(93,94);
		    $tablaHTML[$pos]['alineado']=array('L','L');
		    $tablaHTML[$pos]['datos']=array('<b>CODIGO REF: '.$value['codigo_ref'],'<B>OBSERVACIONES');
		    $tablaHTML[$pos]['borde']=1;
		    $tablaHTML[$pos]['altoRow'] = 8;
		    $pos+=1;
			// print_r($value);die();
			$tablaHTML[$pos]['medidas']=array(93,94);
		    $tablaHTML[$pos]['alineado']=array('L','L');
		    $tablaHTML[$pos]['datos']=array($value['foto'],$value['linea_detalle']);
		    $tablaHTML[$pos]['tipo'] = array('CON_IMAGEN',array('1','1')); // SEGUNDO PARAMETRO LA POSICION DE LA IMAGEN;

		    // $tablaHTML[0]['estilo']='BI';
		    $tablaHTML[$pos]['borde'] = '1';
		    $tablaHTML[$pos]['altoRow'] = 80;

		    $pos+=1;
			
		}



		$this->pdf->cabecera_reporte_MC($titulo,$tablaHTML,$contenido=false,$image=false,false,false,$sizetable=false,true);
	}

	function trabajo_joya_nuevo($cabecera,$detalle)
	{
		 
  	   // print_r($cabecera);
       // print_r($detalle);
  	   // die();
	   $tablaHTML[0]['medidas']=array(19,30,30,50,33,25);
		$tablaHTML[0]['alineado']=array('L','L','L','L','L','L');
		$tablaHTML[0]['datos']=array('<b>CODIGO',$cabecera[0]['referencia_producto'],'<b>CLIENTE',$cabecera[0]['nombre'],'<b>FECHA INGRESO',$cabecera[0]['fecha_ingreso']->format('Y-m-d'));
		$tablaHTML[0]['borde']=1;
		$tablaHTML[0]['altoRow'] = 5;

		$tablaHTML[1]['medidas']=array(25,30,25,49,33,25);
		$tablaHTML[1]['alineado']=array('L','L','L','L','L','L');
		$tablaHTML[1]['datos']=array('<b>PUNTO VENTA',$cabecera[0]['nombre_punto'],'<b>PARA BODEGA',$cabecera[0]['detalle_bodega'],'<b>FECHA ENTREGA','');
		$tablaHTML[1]['borde']=1;
		$tablaHTML[1]['altoRow'] = 5;

		$tablaHTML[2]['medidas']=array(25,68,25,69);
		$tablaHTML[2]['alineado']=array('L','L','L','L');
		$tablaHTML[2]['datos']=array('<b>MODELO',$cabecera[0]['detalle_producto'],'<b>MATERIAL',$cabecera[0]['detalle_material']);
		$tablaHTML[2]['borde']=1;
		$tablaHTML[2]['altoRow'] = 5;

		$tablaHTML[3]['medidas']=array(25,25,35,102);
		$tablaHTML[3]['alineado']=array('L','L','L','L');
		$tablaHTML[3]['datos']=array('<b>ESTADO',$cabecera[0]['detalle_estado'],'<b>OBSERVACIONES',$cabecera[0]['descripcion_trabajo']);
		$tablaHTML[3]['borde']=1;
		$tablaHTML[3]['altoRow'] = 5;

		$tablaHTML[4]['medidas']=array(187);
		$tablaHTML[4]['alineado']=array('L');
		$tablaHTML[4]['datos']=array('');

		$tablaHTML[5]['medidas']=array(93,94,);
		$tablaHTML[5]['alineado']=array('L','L');
		$tablaHTML[5]['datos']=array($cabecera[0]['foto_producto'],$cabecera[0]['foto1']);
		$tablaHTML[5]['borde']=1;
		$tablaHTML[5]['tipo'] = array('CON_IMAGEN',array('1','1')); // SEGUNDO PARAMETRO LA POSICION DE LA IMAGEN;
		$tablaHTML[5]['altoRow'] = 85;

		if($cabecera[0]['foto2']!='' || $cabecera[0]['foto3']!='' )
		{

		$tablaHTML[6]['medidas']=array(93,94,);
		$tablaHTML[6]['alineado']=array('L','L');
		$tablaHTML[6]['datos']=array($cabecera[0]['foto2'],$cabecera[0]['foto3']);
		$tablaHTML[6]['borde']=1;
		$tablaHTML[6]['tipo'] = array('CON_IMAGEN',array('1','1')); // SEGUNDO PARAMETRO LA POSICION DE LA IMAGEN;
		$tablaHTML[6]['altoRow'] = 85;

		}
		if($cabecera[0]['foto4']!='' || $cabecera[0]['foto5']!='' )
		{

		$tablaHTML[7]['medidas']=array(93,94,);
		$tablaHTML[7]['alineado']=array('L','L');
		$tablaHTML[7]['datos']=array($cabecera[0]['foto4'],$cabecera[0]['foto5']);
		$tablaHTML[7]['borde']=1;
		$tablaHTML[7]['tipo'] = array('CON_IMAGEN',array('1','1')); // SEGUNDO PARAMETRO LA POSICION DE LA IMAGEN;
		$tablaHTML[7]['altoRow'] = 85;

		}
		
		$this->pdf->cabecera_reporte_MC('Trabajo en joyas',$tablaHTML,$contenido=false,$image=false,false,false,$sizetable=7,true);
	}

	function generar_ceros($num,$long)
	{
		$num_l = strlen($num);
		$num_C = $long-$num_l;
		$ceros = str_repeat('0', $num_C);
		return $ceros.$num;

	}
}
?>