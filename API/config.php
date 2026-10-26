<?php

return [
    'base_path'  => '/deep-script/deep_script/API',
    'jwt_secret' => $_ENV['JWT_SECRET'] ?? 'Deep_script19*_apikeyDeep_script19*_apikey',
    'jwt_ttl'    => 3600,
    'debug'      => ($_ENV['APP_DEBUG'] ?? 'false') === 'true',
];

?>