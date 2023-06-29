<?php

use Chat\Controller\Chat;

return [
    'routes' => [
        [
            'route' => '/read',
            'controller' => Chat::class,
            'function' => 'read',
        ],
        [
            'route' => '/write',
            'controller' => Chat::class,
            'function' => 'write',
        ],
    ],
];