<?php

return [
    'base_path'  => '/deepScript/API',
    'jwt_secret' => $_ENV['JWT_SECRET'] ?? 'Deep_script19*_apikeyDeep_script19*_apikey',
    'jwt_ttl'    => 3600,
    'debug'      => true, // ($_ENV['APP_DEBUG'] ?? 'false') === 'true',
];

?>