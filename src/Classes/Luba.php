<?php

namespace GRG\Luba\Classes;

class Luba
{
    /**
     * Returns the Luba's routes.
     * You can call this method in any route file you want.
     */
    public static function routes (String $customPrefix = null, Array $customMiddlewares = null)
    {
        if (config('luba.routes.provider')) return false;
        $middlewares = $customMiddlewares ? $customMiddlewares : [];
        \Route::prefix($customPrefix)
            ->middleware($middlewares)
            ->namespace('\\GRG\\Luba\\Controllers')
            ->group(__DIR__.'/../Routes/web.php');
    }
}
