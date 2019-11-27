<?php

$registry  = [
    'protocol' => 'consul',
    'address'  => 'http://' . getenv('CONSUL_CONSUL_SERVER_SERVICE_HOST') . ':'
                  . getenv('CONSUL_CONSUL_SERVER_SERVICE_PORT'),
];

return [
    'consumers' => [
        [
            'name'          => 'UserService',
            'service'       => \App\Service\UserServiceInterface::class,
            'id'            => \App\Service\UserServiceInterface::class,
            'protocol'      => 'jsonrpc',
            'load_balancer' => 'random',
            'registry'      => $registry,
        ]
    ],
];

