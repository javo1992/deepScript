<?php 
return [
    'POST' => [  '/caja' => [   'endpoint' => 'cajaApi', 'action'   => 'addCaja', 'auth'     => 'required',  ],
    ],

    'GET' => [ 

    '/listaInventario/{query}/{categoria}/{servicio}/{referencia}/{idproducto}'=> ['endpoint' =>'inventarioApi','action'=>'listaInventario','auth'=>'required',],
    '/listaKardex/{query}/{categoria}/{servicio}/{referencia}/{idproducto}/{entradas}' =>    ['endpoint' =>'inventarioApi','action'=>'listaKardex','auth'=>'required',],
    ],

    'PUT' => [ '/categoria/{id}' => ['endpoint' => 'ArticuloUpdate','action'   => 'update','auth'     => 'required',  ],
    ],

    'DELETE' => [  '/articulo/{id}' => ['endpoint' => 'ArticuloDelete','action'   => 'destroy','auth'     => 'required',    ],
    ],
];

?>