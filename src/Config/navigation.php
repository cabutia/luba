<?php

return [
    [
        'title' => 'Home',
        'href' => '/',
        'auth' => false
    ],
    [
        'title' => 'Projects',
        'auth' => true,
        'childs' => [
            [
                'title' => 'All projects',
                'auth' => true,
                'route' => 'projects.index'
            ],
            [
                'title' => 'Add project',
                'auth' => true,
                'route' => 'projects.add'
            ]
        ]
    ]
];
