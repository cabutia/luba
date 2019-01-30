<?php

return [
    'database' => [
        'prefix' => 'luba_',
        'suffix' => ''
    ],
    'routes' => [
        'provider' => true,
        'prefix' => 'luba',
        'middlewares' => [
            'web', 'auth'
        ]
    ],
    'assets' => [
        'css' => '/vendor/luba/app.css',
        'vendor_css' => '/vendor/luba/vendor.css',
        'js' => '/vendor/luba/app.js',
        'vendor_js' => '/vendor/luba/vendor.js'
    ],
    'ui' => [
        'preloader' => false
    ]
];
