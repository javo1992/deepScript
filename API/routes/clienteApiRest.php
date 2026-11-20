<?php 
return [
    
    'POST' => [ '/cliente' => ['endpoint' => 'clienteApi','action'   => '','auth'     => 'required',   ],
                '/cliente/{id}' => ['endpoint' => 'clienteApi','action'   => '','auth'     => 'required',   ],    
    ],
    'GET' => [
        '/cliente/{id}/{query}/{ci}' => ['endpoint' => 'clienteApi','action'  => 'listado_cliente','auth'     =>  'required', ],
    ],

    'PUT' => [
        '/cliente/{id}' => ['endpoint' => 'clienteApi','action'   => '','auth'     => 'required', ],
    ],

    'DELETE' => [ '/cliente/{id}' => [ 'endpoint' => 'ArticuloDelete', 'action'   => 'destroy', 'auth'     => 'required', ],
    ],
];

?>