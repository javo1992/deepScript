<?php 
return [
    'POST' => [  '/caja' => [   'endpoint' => 'cajaApi', 'action'   => 'addCaja', 'auth'     => 'required',  ],
     '/addpago/{caja}' => [   'endpoint' => 'cajaApi', 'action'   => 'addpago', 'auth'     => 'required',  ],
    '/cierrecaja/{idcaja}'=> [  'endpoint' => 'cajaApi', 'action' => 'cierrecaja', 'auth' => 'required',],
     '/addegreso/{caja}' => [   'endpoint' => 'cajaApi', 'action'   => 'addegreso', 'auth'     => 'required',  ],
    ],

    'GET' => [ '/ListaCajaAbiertasAnteriores/{fechaActual}' => ['endpoint' => 'cajaApi','action'  => 'ListaCajaAbiertasAnteriores','auth'     => 'required',],
        '/cajaDetalle/{fechaActual}/{estado}' => ['endpoint' => 'cajaApi','action'   => 'cajaDetalle','auth'     => 'required', ],
        '/CajadetalleCierre/{idcaja}' => ['endpoint' => 'cajaApi','action'   => 'CajadetalleCierre','auth'     => 'required', ],
    ],

    'PUT' => [
        '/caja/{id}' => [
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