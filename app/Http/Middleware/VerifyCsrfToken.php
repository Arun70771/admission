<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/panel/payment-success',
        '/payment-success',
        '/sau-payment/success',
        'sau-payment/success',
    ];

    public function handle($request, Closure $next)
    {
        \Log::info('CSRF token in request: ' . $request->input('_token'));
        return parent::handle($request, $next);
    }

}
