<?php

use Chat\Controller\Chat;

return [
    'routes' => [
        [
            'route' => '/api/read',
            'controller' => Chat::class,
            'function' => 'read',
        ],
        [
            'route' => '/api/write',
            'controller' => Chat::class,
            'function' => 'write',
        ],
    ],
];