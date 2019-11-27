<?php

return [
    'uri' => 'http://' . getenv('CONSUL_CONSUL_SERVER_SERVICE_HOST') . ':'
            . getenv('CONSUL_CONSUL_SERVER_SERVICE_PORT'),
];
