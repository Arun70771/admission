<?php

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
		$middleware->validateCsrfTokens(except: [
			'https://admissions.sau.ac.in/sau-payment/success',
		]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Add exception handlers if needed
    })
    ->withBindings([
        Illuminate\Contracts\Http\Kernel::class => App\Http\Kernel::class,
    ])
    ->create();
