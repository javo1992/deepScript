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
        '/Arti' => [
            'endpoint' => 'ArticuloApi', 
            'action'   => 'Arti',
            'auth'     => 'required',
        ],

    ],

    'GET' => [
        '/articulo/{id}/{servicio}/{categoria}/{articulo}/{referencia}' => [
            'endpoint' => 'ArticuloApi',
            'action'   => 'lista_articulos',
            'auth'     =>  'required',
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