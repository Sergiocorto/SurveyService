<?php

$routes = [
    'myCabinet' =>
    [
        'controller' => 'Controllers\UserController',
        'actions' =>
        [
            '/' => [
                       'GET' => 'getProfileView'
                       ]
        ]
    ],
    'auth' =>
        [
            'controller' => 'Controllers\AuthController',
            'actions' =>
                [
                    'login' => [
                        'GET' => 'getLoginView',
                        'POST' => 'login'
                    ],
                    'logout' => [
                        'GET' => 'logout'

                    ],
                    'registration' => [
                        'GET' => 'getRegistrationView',
                        'POST' => 'registration'
                    ],
                ]
        ],
];