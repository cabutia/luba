<?php

return [
    [
        'title' => 'home',
        'href' => '/',
        'auth' => false
    ],
    [
        'title' => 'projects',
        'auth' => true,
        'childs' => [
            [
                'title' => 'projects_all',
                'auth' => true,
                'route' => 'luba::projects.index'
            ],
            [
                'title' => 'projects_add',
                'auth' => true,
                'route' => 'luba::projects.add'
            ],
            [
                'title' => 'projects_management',
                'auth' => true,
                'route' => 'luba::projects.management'
            ]
        ]
    ]
];
