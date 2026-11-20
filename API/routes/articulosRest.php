<?php 
return [
    
    'POST' => [ '/articulo' => ['endpoint' => 'ArticuloApi','action'   => 'addArticulo','auth'     => 'required',   ],
                '/aliStock/{id}' => ['endpoint' => 'ArticuloApi','action'   => 'aliStock','auth'     => 'required',   ],
                '/addfotoArt/{id}' => ['endpoint' => 'ArticuloApi','action'   => 'addfotoArt','auth'     => 'required',   ],
    
    ],
    'GET' => [
        '/articulo/{id}/{servicio}/{categoria}/{articulo}/{referencia}' => 
                            ['endpoint' => 'ArticuloApi','action'   => 'lista_articulos','auth'     =>  'required', ],
    ],

    'PUT' => [
        '/articulo/{id}' => ['endpoint' => 'ArticuloApi','action'   => 'update','auth'     => 'required', ],
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