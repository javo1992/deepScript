<?php 
@session_start();
/**
 * 
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


class enviar_emails
{
	// private $mail;
  private $modelo;
	function __construct()
	{
    $this->modelo = new facturacionM();
		
	}


  function enviar_email($empresa,$to_correo,$cuerpo_correo,$titulo_correo,$correo_respaldo='',$archivos=false,$nombre='Email envio',$HTML=false)
  {
    $respuesta = 1;
    $datos_smtp = $empresa;
    $host = 'smtp.gmail.com';
    $port =  587;
    $pass = 'txfk ptgq euph srgr' ;
    $user =  'facturaciondeep.script@gmail.com';
    $secure = 'tls';
    $respuesta = true;
    if($correo_respaldo=='')
    {
      $correo_respaldo = $user;
    }

    // print_r($to_correo);die();

    if(count($datos_smtp)>0)
    {
      if($datos_smtp[0]['smtp_host']!='' && $datos_smtp[0]['smtp_pass'] !='' && $datos_smtp[0]['smtp_usuario'] !='' && $datos_smtp[0]['smtp_secure']!='')
      {
         $host =$datos_smtp[0]['smtp_host'] ;
         $pass =$datos_smtp[0]['smtp_pass'] ;
         $user =$datos_smtp[0]['smtp_usuario'] ;
         $secure = $datos_smtp[0]['smtp_secure'];
         if($datos_smtp[0]['smtp_secure']=='tls')
         {
           $port = 587;
         }else
         {
           $port = 486;
         }
      }
    }


    //Instantiation and passing `true` enables exceptions
    try{
        $to =explode(',', $to_correo);
        foreach ($to as $key => $value) 
        {    
          $mail = new PHPMailer(true);
          $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );


           //Server settings
           // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
           $mail->isSMTP();                                           
           $mail->Host       = $host;
           $mail->SMTPAuth   = true;                             
           $mail->SMTPSecure = $secure;      
           $mail->Port       = $port;  
           $mail->Username   = $user;   
           $mail->Password   = $pass;

          //Recipients

          $mail->setFrom($correo_respaldo, $titulo_correo);
          $mail->addAddress($value);     //Add a recipient
          // $mail->addAddress('ellen@example.com');               //Name is optional
          // $mail->addReplyTo('info@example.com', 'Information');
          // $mail->addCC('cc@example.com');
          // $mail->addBCC('bcc@example.com');

          //Attachments
           if($archivos)
           {
            foreach ($archivos as $key => $value) {
              // print_r(dirname(__DIR__,2).'/TEMP/'.$value);die();
             if(file_exists(dirname(__DIR__,2).'/TEMP/'.$value))
              {
                  $mail->AddAttachment(dirname(__DIR__,2).'/TEMP/'.$value);
              }
              
              //facturas
              if(file_exists(dirname(__DIR__,2).'/comprobantes/entidades/entidad_'.$_SESSION['INICIO']['ID_EMPRESA'].'/CE'.$_SESSION['INICIO']['ID_EMPRESA'].'/FACTURAS/Autorizados/'.$value))
              {
                  $mail->AddAttachment(dirname(__DIR__,2).'/comprobantes/entidades/entidad_'.$_SESSION['INICIO']['ID_EMPRESA'].'/CE'.$_SESSION['INICIO']['ID_EMPRESA'].'/FACTURAS/Autorizados/'.$value);
              } 


              //retenciones
              if(file_exists(dirname(__DIR__,2).'/comprobantes/entidades/entidad_'.$_SESSION['INICIO']['ID_EMPRESA'].'/CE'.$_SESSION['INICIO']['ID_EMPRESA'].'/RETENCIONES/Autorizados/'.$value))
              {
                  $mail->AddAttachment(dirname(__DIR__,2).'/comprobantes/entidades/entidad_'.$_SESSION['INICIO']['ID_EMPRESA'].'/CE'.$_SESSION['INICIO']['ID_EMPRESA'].'/RETENCIONES/Autorizados/'.$value);
              }  

            }         
          }

           $mail->Subject = $titulo_correo;
           if($HTML)
           {
            $mail->isHTML(true);
           
           }

          //Content                                //Set email format to HTML
          $mail->Subject = $titulo_correo.' '.$nombre;
          if($cuerpo_correo!='')
          {
            $mail->Body =$cuerpo_correo; // Mensaje a enviar
          }else
          {
             $mail->Body = $titulo_correo; // Mensaje a enviar
          }

            if(!$mail->send())
            {
              $respuesta =-1;
            }
        }
    }catch (Exception $e) {
      // print_r($mail);
      // print_r($e);
      // die();
        return -1;
    } 

    return 1;
 

  }


	function enviar_email2($empresa,$to_correo,$cuerpo_correo,$titulo_correo,$correo_respaldo='',$archivos=false,$nombre='Email envio',$HTML=false)
	{
    $datos_smtp = $empresa;
    $nombre = $empresa[0]['Nombre_Comercial'];
    $host = 'smtp.office365.com';
    $port =  587;
    $pass = '19071992' ;
    $user =  'ejfc_omoshiroi@hotmail.com';
    $secure = 'tls';
    $respuesta = true;
    if($correo_respaldo=='')
    {
      $correo_respaldo = $user;
    }

    // print_r($datos_smtp);die();

    if(count($datos_smtp)>0)
    {
      if($datos_smtp[0]['smtp_host']!='' && $datos_smtp[0]['smtp_pass'] !='' && $datos_smtp[0]['smtp_usuario'] !='' && $datos_smtp[0]['smtp_secure']!='')
      {
         $host =$datos_smtp[0]['smtp_host'] ;
         $pass =$datos_smtp[0]['smtp_pass'] ;
         $user =$datos_smtp[0]['smtp_usuario'] ;
         $secure = $datos_smtp[0]['smtp_secure'];
         if($datos_smtp[0]['smtp_secure']=='tls')
         {
           $port = 587;
         }else
         {
           $port = 486;
         }
      }
    }

		$to =explode(',', $to_correo);

    // print_r($host);
    // print_r($port);
    // print_r($pass);
    // print_r($user);
    // print_r($secure); die();


    // print_r($to);die();
     try {

     foreach ($to as $key => $value) {
  		   $mail = new PHPMailer();
         $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output                  
         $mail->SMTPOptions = array(
              'ssl' => array(
                  'verify_peer' => false,
                  'verify_peer_name' => false,
                  'allow_self_signed' => true
              )
          );
         $mail->isSMTP();                                           
         $mail->Host       = $host;
         $mail->SMTPAuth   = true;                             
         $mail->SMTPSecure = $secure;      
         $mail->Port       = $port;  
         $mail->Username   = $user;   
	       $mail->Password   = $pass;
	       $mail->setFrom('ejfc_omoshiroi@hotmail.com','comprobantes');
         $mail->addAddress($value);
         $mail->Subject = $titulo_correo;
         if($HTML)
         {
          $mail->isHTML(true);
         }
         $mail->Body = $cuerpo_correo; // Mensaje a enviar
         
         if($archivos)
         {
          foreach ($archivos as $key => $value) {
            // print_r(dirname(__DIR__,2).'/TEMP/'.$value);die();
           if(file_exists(dirname(__DIR__,2).'/TEMP/'.$value))
            {
                $mail->AddAttachment(dirname(__DIR__,2).'/TEMP/'.$value);
            }
            if(file_exists(dirname(__DIR__,2).'/comprobantes/entidades/entidad_'.$_SESSION['INICIO']['ID_EMPRESA'].'/CE'.$_SESSION['INICIO']['ID_EMPRESA'].'/Autorizados/'.$value))
            {
                $mail->AddAttachment(dirname(__DIR__,2).'/comprobantes/entidades/entidad_'.$_SESSION['INICIO']['ID_EMPRESA'].'/CE'.$_SESSION['INICIO']['ID_EMPRESA'].'/Autorizados/'.$value);
            }          
          }         
        }
        // print_r($mail);die();

          if ($mail->send()) 
          {
          	$respuesta = 1;
     	    }

    }
    } catch (Exception $e) {
              // print_r($mail);
              // print_r($e);
              // die();
                return -1;
            } 

    return $respuesta;
  }  

}
?>