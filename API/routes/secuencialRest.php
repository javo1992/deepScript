<?php 
return [
    
    'POST' => [ '/addsecuencial' => ['endpoint' => 'secuencialesApi','action'   => 'addsecuencial','auth'     => 'required',   ],
                '/numsecuencial' => ['endpoint' => 'secuencialesApi','action'   => 'numsecuencial','auth'     => 'required',   ],
                // '/secuenciales/{id}' => ['endpoint' => 'ArticuloApi','action'   => 'aliStock','auth'     => 'required',   ],
    
    ],
    'GET' => [
        '/secuenciales/{id}/{detalle}/' => 
                            ['endpoint' => 'secuencialesApi','action'   => 'lista_secuenciales','auth'     =>  'required', ],
    ],

    'PUT' => [
        '/secuenciales/{id}' => ['endpoint' => 'secuencialesApi','action'   => 'update','auth'     => 'required', ],
    ],

    'DELETE' => [
        '/secuenciales/{id}' => [
            'endpoint' => 'secuencialesApi',
            'action'   => 'destroy',
            'auth'     => 'required',
        ],
    ],
];

?>