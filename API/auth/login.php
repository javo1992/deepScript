<?php
// require_once(dirname(__DIR__,2).'/php/db/db.php');
// require_once(dirname(__DIR__,2).'/php/modelo/empresaM.php');
require_once(dirname(__DIR__,2).'/php/modelo/loginM.php');

$login = new login();
$body = json_decode(file_get_contents('php://input'), true) ?? [];

$company    = $body['empresa']    ?? '';
$username    = $body['usuario']    ?? '';
$password = $body['password'] ?? '';

 $resp = $login->validar_credenciales($company,$username,$password);
 echo json_encode($resp);


/**
 * 
 */
class login
{
    private $login;
    private $cfg;
    function __construct()
    {
        $this->login = new loginM();
        $this->cfg  = require __DIR__ . '/../config.php';
    }

    function validar_credenciales($company,$username,$password)
    {    

        // Valida contra tu BD. Ejemplo demo:
        $empresa = $this->login->buscar_empresa($company);
        if(count($empresa)>0)
        {
            // print_r($empresa);die();
            $data = $this->login->login_empresa_api($empresa['id_empresa'],$company,$username,$password);
            if(count($data)>0)
            {

                $jwt   = new JWT($this->cfg['jwt_secret']);
                $token = $jwt->encode([
                    'sub'   => 1,
                    'email' => $data[0]['email'],
                    'company' => $data[0]['email'],
                    'id_empresa' => $data[0]['id_empresa'],
                    'iva_val' => $data[0]['valor_iva'],
                    'usuario' => $username,
                    'role'  => 'admin',
                ], $this->cfg['jwt_ttl']);

                return [
                    'success'    => true,
                    'token'      => $token,
                    'expires_in' => $this->cfg['jwt_ttl'],
                ];

            }else{
                // if ($email !== 'admin@demo.com' || $password !== '123456') {
                    http_response_code(401);
                    return ['success' => false, 'error' => 'Credenciales inválidas'];
                // }
            }      
        }

    }
}

