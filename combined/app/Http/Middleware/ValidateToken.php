<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Formatters\JsonResponse;
use LNWebAPI2\Framework\Services\Modules\Factories\AuthService;
use LNWebAPI2\Framework\Responses\ResponseCodes;
use Symfony\Component\HttpFoundation\Response;
use LNWebAPI2\Framework\Services\Modules\IAuthService;
use Illuminate\Http\Request;

class ValidateToken
{
    /**
     * @var IAuthService
     */
    private $service;
    /**
     * @var JsonResponse
     */
    private $response;

    public function __construct(AuthService $factory, JsonResponse $response)
    {
        $this->service = $factory->getService();
        $this->response = $response;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $result = $this->service->validate();

        if ($result->getCode() !== ResponseCodes::SUCCESS) {
            $data = $this->response->getData($result->getCode(), $result->getMessage());
            return $this->response->error($request, $data, Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
