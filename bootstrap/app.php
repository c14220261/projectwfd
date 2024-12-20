<?php

use App\Http\Middleware\CheckRoleMiddleware;
use App\Http\Middleware\Test2Middleware;
use App\Http\Middleware\TestMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        //add global TestMiddleware
        //$middleware->append(TestMiddleware::class);

        //group web
        // $middleware->web(append: [
        //     TestMiddleware::class,
        // ]);
        
        //alias
        $middleware->alias([
            'check' => TestMiddleware::class,
            'check2' => Test2Middleware::class,
            'role'=>CheckRoleMiddleware::class,
        ]);

        // $middleware->priority([
        //     \App\Http\Middleware\Test2Middleware::class,
        //     \App\Http\Middleware\TestMiddleware::class
        // ]);

        $middleware->redirectGuestsTo('/login');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
