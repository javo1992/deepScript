<?php 
return [
    // ---------- Auth ----------
    'POST' => [
        // ---------- Articulo ----------
        '/articulo' => [
            'endpoint' => 'ArticuloCreate',
            'action'   => 'store',
            'auth'     => 'required',
        ],
    ],

    'GET' => [
        '/articulo' => [
            'endpoint' => 'ArticuloList',
            'action'   => 'index',
            'auth'     => 'optional',   // público, pero si hay token lo expone
        ],
        '/articulo/{id}' => [
            'endpoint' => 'ArticuloShow',
            'action'   => 'show',
            'auth'     => 'optional',
        ],
    ],

    'PUT' => [
        '/articulo/{id}' => [
            'endpoint' => 'ArticuloUpdate',
            'action'   => 'update',
            'auth'     => 'required',
        ],
    ],

    'DELETE' => [
        '/articulo/{id}' => [
            'endpoint' => 'ArticuloDelete',
            'action'   => 'destroy',
            'auth'     => 'required',
        ],
    ],
];

?>