<?php

$cfg  = require __DIR__ . '/../config.php';
$body = json_decode(file_get_contents('php://input'), true) ?? [];

$email    = $body['email']    ?? '';
$password = $body['password'] ?? '';

// Valida contra tu BD. Ejemplo demo:
if ($email !== 'admin@demo.com' || $password !== '123456') {
    http_response_code(401);
    echo json_encode(['success' => false, 'error' => 'Credenciales inválidas']);
    exit;
}

$jwt   = new JWT($cfg['jwt_secret']);
$token = $jwt->encode([
    'sub'   => 1,
    'email' => $email,
    'role'  => 'admin',
], $cfg['jwt_ttl']);

echo json_encode([
    'success'    => true,
    'token'      => $token,
    'expires_in' => $cfg['jwt_ttl'],
]);