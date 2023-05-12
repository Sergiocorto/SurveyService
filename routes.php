<?php

$routes = [
    'myCabinet' =>
    [
        'controller' => 'Controllers\CabinetController',
        'actions' =>
        [
            '/' =>
                [
                    'GET' => 'getProfileView'
                ]
        ]
    ],
    'auth' =>
        [
            'controller' => 'Controllers\AuthController',
            'actions' =>
                [
                    'login' =>
                    [
                        'GET' => 'getLoginView',
                        'POST' => 'login'
                    ],
                    'logout' =>
                    [
                        'GET' => 'logout'
                    ],
                    'registration' =>
                    [
                        'GET' => 'getRegistrationView',
                        'POST' => 'registration'
                    ],
                ]
        ],
    'survey' =>
        [
            'controller' => 'Controllers\SurveyController',
            'actions' =>
                [
                    'add' =>
                        [
                            'POST' => 'addSurvey'
                        ],
                    'edit' =>
                        [
                            'POST' => 'editSurvey'
                        ],
                    'sortByDate' =>
                        [
                            'GET' => 'sortByDate'
                        ],
                    'sortByTitle' =>
                        [
                            'GET' => 'sortByTitle'
                        ],
                    'sortByPublished' =>
                        [
                            'GET' => 'sortByPublished'
                        ],
                    'sortByUnpublished' =>
                        [
                            'GET' => 'sortByUnpublished'
                        ],
                    'delete' =>
                        [
                            'GET' => 'deleteSurvey'
                        ]
                ]
        ],
    'appi' =>
        [
            'controller' => 'Controllers\SurveyController',
            'actions' =>
            [
                'getSurvey' =>
                    [
                        'GET' => 'getRandomSurvey'
                    ]
            ]

        ]
];