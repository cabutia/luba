<?php

if (! function_exists('luba_active_route') ) {
    function luba_active_route ($uri) {
        $current = \Route::getCurrentRoute()->getName();
        $route = app('router')->getRoutes()->match(app('request')->create($uri))->getName();
        return $current == $route;
    }
}
