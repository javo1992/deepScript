<?php 
// print_r(dirname(__DIR__));die();
include(dirname(__DIR__).'/modelo/facturacionM.php');
include(dirname(__DIR__).'/comprobantes/SRI/autorizar_sri.php');
include(dirname(__DIR__,2).'/lib/Reporte_pdf.php');
include(dirname(__DIR__,2).'/lib/phpmailer/enviar_emails.php');

/**
 * 
 */
class facturar_app
{
	private $modelo;
    private $sri;
    private $pdf;
    private $mail;
	function __construct()
	{
	  $this->modelo = new facturacionM();
      $this->sri = new autorizacion_sri();
      $this->pdf = new Reporte_pdf(); 
      $this->mail = new enviar_emails();
	}

	function datos_factura($id)
	{
		$query = $id;
        $lineas = $this->modelo->linea_facturas($query);
        return  $lineas;

	}
	function factura_cliente($id)
	{
		$query = $id;
        $cliente =  $this->modelo->cliente_factura($query);
        return  $cliente;

	}

	function editar_cliente($parametros)
	{
		$datos[0]['campo']='nombre';
		$datos[0]['dato']=$parametros['nombre'];
		$datos[1]['campo']='telefono';
		$datos[1]['dato']=$parametros['telefono'];
		$datos[2]['campo']='mail';
		$datos[2]['dato']=$parametros['email'];
		$datos[3]['campo']='direccion';
		$datos[3]['dato']=$parametros['direccion'];		
		$datos[4]['campo']=	'ci_ruc';
		$datos[4]['dato']=$parametros['ci'];
		if($parametros['idC']!='')
		{
		    $where[0]['campo']='id_cliente';
		    $where[0]['dato']=$parametros['idC'];
            $this->modelo->update($tabla='cliente',$datos,$where);

			    $datos1[0]['campo'] = 'id_cliente';
			    $datos1[0]['dato'] = $parametros['idC'];
			    $where1[0]['campo'] = 'id_factura';
			    $where1[0]['dato']= $parametros['id_factura']; 
            return $this->modelo->update('facturas',$datos1,$where1);

		}else
		{
		    return $this->modelo->inserts($tabla='cliente',$datos);
		}
	}

	function buscar_cliente($query,$idempresa)
	{
		$nombres = $this->modelo->buscar_cliente($query,$idempresa);
        return  $nombres;
	}

	function buscar_articulo($query,$idempresa)
	{
		$nombres = $this->modelo->articulos($query,$idempresa);
        return  $nombres;
	}

	function Sri($id,$idempresa)
	{
		$parametros = array('empresa'=>$idempresa,'fac'=>$idempresa);
		return  $this->sri->Autorizar($parametros);
	}
	function factura_pdf($id)
	{
		$datos = array();
		$this->pdf->factura_pdf($datos);
	}

	function lista_facturas($query,$empresa)
	{
		$result = $this->modelo->lista_facturas($query,$empresa);
		return $result;
	}

	function enviar_Email($empresa)
	{
		$to_correo = 'javier.farinango92@gmail.com';
		$cuerpo_correo = '<b>hola mail</b>';
		$titulo_correo = 'correo de prueba';
		$correo_respaldo = 'example@example.com';
		$archivos = array('1804202101070216417900110010010000000011234567813.xml','2004202101070216417900110010010000000041234567817.xml');
		$HTML = true;
		$this->mail->enviar_email($empresa,$to_correo,$cuerpo_correo,$titulo_correo,$correo_respaldo,$archivos,$nombre='Email envio',$HTML);
	}

	function eliminar_linea($id)
	{
		$datos[0]['campo']='id_lineas';
		$datos[0]['dato']= $id;
        return  $this->modelo->delete('lineas_factura',$datos);
	}

}

?>