<?php

$routes = [
    // ---------- Auth ----------
    'POST' => [  
        '/login'    => ['handler'  => 'auth'],
    ],   
];

foreach (glob(__DIR__ . '/routes/*.php') as $routeFile) {
    $moduleRoutes = require $routeFile;
    foreach ($moduleRoutes as $httpMethod => $methodRoutes) {
        $routes[$httpMethod] = array_merge($routes[$httpMethod] ?? [], $methodRoutes);
    }
}

return $routes;
