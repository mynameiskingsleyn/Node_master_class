<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BeforeRender
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $response->header('X-Frame-Options', 'DENY');
        $response->header('X-XSS-Protection', '1');
        $response->header('X-Content-Type-Options', 'nosniff');
        $response->header('Strict-Transport-Security', 'max-age=31536000');
        $response->header('Content-Security-Policy', "default-src 'self'; frame-ancestors 'none'");
        $response->header('X-Permitted-Cross-Domain-Policies', 'none');
        $response->header('Pragma', 'no-cache');
        $response->header('Expires', 'Mon, 01 Jan 1990 00:00:00 GMT');
        $response->header('Cache-control', 'no-store');

        return $response;
    }
}
