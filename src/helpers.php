<?php

if (! function_exists('luba_active_route') ) {
    function luba_active_route ($uri, $ifTrue = null, $ifFalse = null) {
        $current = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $route = app('router')->getRoutes()->match(app('request')->create($uri))->getName();
        dump(app('router')->getCurrent(), $current, $route);
        if ($ifTrue && $ifFalse) {
            return $current == $route ? $ifTrue : $ifFalse;
        }
        return $current == $route;
    }
}
