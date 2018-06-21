<?php
return [
    'controllers' => [
        'factories' => [
            'Status\\V1\\Rpc\\Ping\\Controller' => \Status\V1\Rpc\Ping\PingControllerFactory::class,
            'Status\\V2\\Rpc\\Ping\\Controller' => \Status\V2\Rpc\Ping\PingControllerFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'status.rpc.ping' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/ping',
                    'defaults' => [
                        'controller' => 'Status\\V1\\Rpc\\Ping\\Controller',
                        'action' => 'ping',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'status.rpc.ping',
        ],
        'default_version' => 2,
    ],
    'zf-rpc' => [
        'Status\\V1\\Rpc\\Ping\\Controller' => [
            'service_name' => 'Ping',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'status.rpc.ping',
        ],
        'Status\\V2\\Rpc\\Ping\\Controller' => [
            'service_name' => 'Ping',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'status.rpc.ping',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Status\\V1\\Rpc\\Ping\\Controller' => 'Json',
            'Status\\V2\\Rpc\\Ping\\Controller' => 'Json',
        ],
        'accept_whitelist' => [
            'Status\\V1\\Rpc\\Ping\\Controller' => [
                0 => 'application/vnd.status.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Status\\V2\\Rpc\\Ping\\Controller' => [
                0 => 'application/vnd.status.v2+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
        ],
        'content_type_whitelist' => [
            'Status\\V1\\Rpc\\Ping\\Controller' => [
                0 => 'application/vnd.status.v1+json',
                1 => 'application/json',
            ],
            'Status\\V2\\Rpc\\Ping\\Controller' => [
                0 => 'application/vnd.status.v2+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-content-validation' => [
        'Status\\V1\\Rpc\\Ping\\Controller' => [
            'input_filter' => 'Status\\V1\\Rpc\\Ping\\Validator',
        ],
        'Status\\V2\\Rpc\\Ping\\Controller' => [
            'input_filter' => 'Status\\V2\\Rpc\\Ping\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Status\\V1\\Rpc\\Ping\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'ack',
                'description' => 'Acknowledge the request with a timestamp',
            ],
        ],
        'Status\\V2\\Rpc\\Ping\\Validator' => [
            0 => [
                'required' => '1',
                'validators' => [],
                'filters' => [],
                'name' => 'ack',
                'description' => 'Acknowledge the request with a timestamp',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'data',
            ],
        ],
    ],
];
