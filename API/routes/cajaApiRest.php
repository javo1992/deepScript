<?php 
return [
    'POST' => [  '/caja' => [   'endpoint' => 'cajaApi', 'action'   => 'addCaja', 'auth'     => 'required',  ],
    ],

    'GET' => [
        '/caja' => [
            'endpoint' => 'cajaApi',
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