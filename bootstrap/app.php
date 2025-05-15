<?php

use App\Http\Middleware\CheckRoleMiddleware;
use App\Http\Middleware\TestMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use PHPUnit\Event\Code\Test;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware)
    {
        //
        // $middleware->append((TestMiddleware::class));
        // $middleware ->append(CheckRoleMiddleware::class);





        // $middleware->appendToGroup('goup_middleware',[
        //     TestMiddleware::class,
        //     CheckRoleMiddleware::class,
        // ]);


        // $middleware->alias(['test' => TestMiddleware::class]);
        $middleware->alias(['test'=>CheckRoleMiddleware::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
