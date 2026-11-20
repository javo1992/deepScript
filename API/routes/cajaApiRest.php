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
        '/ListaCaja/{fechaActual}/{estado}' => ['endpoint' => 'cajaApi','action'   => 'ListaCaja','auth'     => 'required', ],
        '/listaEgresos/{idcaja}' => ['endpoint' => 'cajaApi','action'   => 'listaEgresos','auth'     => 'required', ],
    ],

    'PUT' => [
        '/cajaMontoInicial/{id}' => [  'endpoint' => 'cajaApi',   'action'   => 'cajaMontoInicial',   'auth'     => 'required', ],
    ],

    'DELETE' => [
        '/deleteEgreso/{id}' => [ 'endpoint' => 'cajaApi',    'action'   => 'deleteEgreso',    'auth'     => 'required',],
    ],
];

?>