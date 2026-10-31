<?php 
return [
'POST' => [  
        '/ordenesTrabajo' => [  'endpoint' => 'ordenesTrabajoApi', 'action' => 'addOrdenes', 'auth'       => 'required',],
        '/addLineasOrdenes/{orden}'=> [  'endpoint' => 'ordenesTrabajoApi', 'action' => 'addLineasOrdenes', 'auth' => 'required',],
    ],

'GET' => [
    '/ordenesTrabajo' => [ 'endpoint' => 'ordenesTrabajoApi', 'action'   => 'listarOrdenes', 'auth'     => 'required', ],  
    '/detalleOrdenes/{id}/{placa}' =>[ 'endpoint' => 'ordenesTrabajoApi', 'action'   => 'detalleOrdenes','auth'     => 'required', ],
    '/lineasOrdenes/{orden}' =>[ 'endpoint' => 'ordenesTrabajoApi', 'action'   => 'lineasOrdenes','auth'     => 'required', ],
    '/finalizarOrden/{orden}/{tipoPago}' =>[ 'endpoint' => 'ordenesTrabajoApi', 'action'   => 'finalizarOrden','auth'     => 'required', ],  
    ],

    'PUT' => [
        '/articulo/{id}' => [
            'endpoint' => 'ArticuloUpdate', //<===archivo
            'action'   => 'update',   //<==== funcion
            'auth'     => 'required',  
        ],
    ],

    'DELETE' => [
        '/deleteLineaOrden/{id}' => [
            'endpoint' => 'ordenesTrabajoApi',
            'action'   => 'destroy',
            'auth'     => 'required',
        ],
    ],
];

?>