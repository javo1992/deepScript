<?php
declare(strict_types=1);

$config = require __DIR__ . '/config.php';

// ---------- CORS ----------
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: ' . ($_SERVER['HTTP_ORIGIN'] ?? '*'));
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

// ---------- Manejo global de errores ----------
set_exception_handler(function (Throwable $e) use ($config) {
    $code = ($e->getCode() >= 400 && $e->getCode() < 600) ? $e->getCode() : 500;
    http_response_code($code);
    echo json_encode([
        'success' => false,
        'error'   => $e->getMessage(),
        'debug'   => $config['debug'] ? $e->getTraceAsString() : null,
    ]);
});

// ---------- Parseo de la URL ----------
$uri      = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';
$method   = strtoupper($_SERVER['REQUEST_METHOD']);
$basePath = rtrim($config['base_path'], '/');

if (!str_starts_with($uri, $basePath)) {
    http_response_code(404);
    echo json_encode(['success' => false, 'error' => "Fuera de la API: $uri"]);
    exit;
}

$relative = trim(substr($uri, strlen($basePath)), '/');   // 'articulo/5'
$parts    = $relative === '' ? [] : explode('/', $relative);
$route    = '/' . ($parts[0] ?? '');
$id       = $parts[1] ?? null;

// ---------- Buscar en routes.php ----------
$routes = require __DIR__ . '/routes.php';
$match  = $routes[$method][$route] ?? null;

if (!$match) {
    // 405 si la ruta existe con otros métodos, 404 si no existe
    $allowed = array_keys(array_filter(
        $routes,
        fn(array $list) => isset($list[$route])
    ));

    if ($allowed) {
        header('Allow: ' . implode(', ', $allowed));
        http_response_code(405);
        echo json_encode([
            'success' => false,
            'error'   => "Método $method no permitido en $route",
        ]);
    } else {
        http_response_code(404);
        echo json_encode([
            'success' => false,
            'error'   => "Ruta $method $route no encontrada",
        ]);
    }
    exit;
}


// ---------- Cargar clases ----------
require_once __DIR__ . '/core/ApiEndpoint.php';
require_once __DIR__ . '/core/JWT.php';

// ---------- Atajo login (no pasa por endpoints) ----------
if (($match['handler'] ?? null) === 'auth') {
    require __DIR__ . '/auth/login.php';
    exit;
}


$endpointFile  = __DIR__ . '/endpoints/' . ($match['file'] ?? $match['endpoint']) . '.php';
$endpointClass = $match['endpoint'];

if (!file_exists($endpointFile)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => "Endpoint no registrado: $endpointClass"]);
    exit;
}

require_once $endpointFile;

// ---------- Construir params ----------
$contentType = $_SERVER['CONTENT_TYPE'] ?? '';
$isMultipart = str_contains($contentType, 'multipart/form-data');
$isJson      = str_contains($contentType, 'application/json');

$body = match (true) {
    in_array($method, ['GET', 'DELETE'], true) => $_GET,
    $isMultipart                               => $_POST,
    $isJson                                    => json_decode(file_get_contents('php://input'), true) ?? [],
    default                                    => $_POST + $_GET,
};

if ($id !== null && $id !== '') {
    $body['id'] = $id;   // el id de la URL siempre manda
}

// ---------- Ejecutar ----------
$authLevel = $match['auth'] ?? 'required';   // required | optional | none
(new $endpointClass($authLevel))->handle($match['action'] ?? '__invoke', $body);