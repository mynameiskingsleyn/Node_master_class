<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\Export\ExportPdfAbstractService as ExportService;

class HeadlessIp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $ipAddress = filter_var($request->header(ExportService::HEADER_IP), FILTER_VALIDATE_IP);
        if ($ipAddress) {
            $_SERVER['HTTP_X_FORWARDED_FOR'] = $ipAddress;
        }

        return $next($request);
    }
}
