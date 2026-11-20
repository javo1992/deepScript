<?php 
return [
'POST' => [  
    '/ordenesTrabajo' => [  'endpoint' => 'ordenesTrabajoApi', 'action' => 'addOrdenes', 'auth'       => 'required',],
    '/addLineasOrdenes/{orden}'=> [  'endpoint' => 'ordenesTrabajoApi', 'action' => 'addLineasOrdenes', 'auth' => 'required',],
    '/finalizarOrdenFac/{orden}/{tipoPago}/{caja}' =>[ 'endpoint' => 'ordenesTrabajoApi', 'action'   => 'finalizarOrdenFac','auth' => 'required', ], 
     '/finalizarOrdenFacTemp/{orden}/{tipoPago}/{caja}' =>[ 'endpoint' => 'ordenesTrabajoApi', 'action'   => 'finalizarOrdenFacTemp','auth' => 'required', ], 
    '/addDetalleExtraOrdenes/{orden}'=> [  'endpoint' => 'ordenesTrabajoApi', 'action' => 'addDetalleExtraOrdenes', 'auth' => 'required',],
    '/addObservacionOrdenes/{orden}'=> [  'endpoint' => 'ordenesTrabajoApi', 'action' => 'addObservacionOrdenes', 'auth' => 'required',],
    '/addfoto/{orden}'=> [  'endpoint' => 'ordenesTrabajoApi', 'action' => 'addfoto', 'auth' => 'required',],
    ],

'GET' => [
    '/ordenesTrabajo' => [ 'endpoint' => 'ordenesTrabajoApi', 'action'   => 'listarOrdenes', 'auth'     => 'required', ], 
    '/ordenesTrabajoF/{fecha}/{placa}/{estado}' => [ 'endpoint' => 'ordenesTrabajoApi', 'action'   => 'listarOrdenes_finalizadas', 'auth'     => 'required', ],  
    '/ordenesTrabajoAll/{orden}' => [ 'endpoint' => 'ordenesTrabajoApi', 'action'   => 'ordenesTrabajoAll', 'auth'     => 'required', ], 
    '/detalleOrdenes/{id}/{placa}/{fecha}' =>[ 'endpoint' => 'ordenesTrabajoApi', 'action'   => 'detalleOrdenes','auth'     => 'required', ],
    '/lineasOrdenes/{orden}/{TC}' =>[ 'endpoint' => 'ordenesTrabajoApi', 'action'   => 'lineasOrdenes','auth'     => 'required', ],
    '/finalizarOrden/{orden}/{tipoPago}/{caja}' =>[ 'endpoint' => 'ordenesTrabajoApi', 'action'   => 'finalizarOrden','auth'     => 'required', ],  
     '/finalizarOrdenTemp/{orden}/{tipoPago}/{caja}' =>[ 'endpoint' => 'ordenesTrabajoApi', 'action'   => 'finalizarOrdenTemp','auth'     => 'required', ],  
    '/detalleExtraOrdenes/{orden}' =>[ 'endpoint' => 'ordenesTrabajoApi', 'action'   => 'detalleExtraOrdenes','auth'     => 'required', ],
    '/observacionesOrdenes/{orden}' =>[ 'endpoint' => 'ordenesTrabajoApi', 'action'   => 'observacionesOrdenes','auth'     => 'required', ],
    '/fotosOrdenes/{orden}' =>[ 'endpoint' => 'ordenesTrabajoApi', 'action'   => 'fotosOrdenes','auth'     => 'required', ],
    ],

    'PUT' => [
        '/ordenesTrabajo/{id}' => [
            'endpoint' => 'ArticuloUpdate', //<===archivo
            'action'   => 'update',   //<==== funcion
            'auth'     => 'required',  
        ],
    ],

    'DELETE' => [
        '/deleteLineaOrden/{id}' => ['endpoint' => 'ordenesTrabajoApi','action'   => 'destroy','auth'     => 'required', ],
        '/deleteOrden/{id}' => ['endpoint' => 'ordenesTrabajoApi','action'   => 'destroyOrden','auth'     => 'required', ],
        '/deleteDetalleOrden/{id}' => ['endpoint' => 'ordenesTrabajoApi','action'   => 'deleteDetalleOrden','auth'     => 'required', ],
        '/deleteObservacionOrden/{id}' => ['endpoint' => 'ordenesTrabajoApi','action'   => 'deleteObservacionOrden','auth'     => 'required', ],
        '/deleteFotoOrden/{id}' => ['endpoint' => 'ordenesTrabajoApi','action'   => 'deleteFotoOrden','auth'     => 'required', ],
    ],
];

?>