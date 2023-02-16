<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Http\Request;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use App\Http\Formatters\JsonResponse;
use App\Exceptions\Authentication\RestAuthenticationException;
use App\Exceptions\Common\Formatters\ErrorFormatter;
use Illuminate\Http\Response;
use App\Exceptions\Common\CommonCodes;
use LNWebAPI2\Plugins\MoLog\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    private $apiResponse;

    public function __construct(JsonResponse $apiResponse)
    {
        $this->apiResponse = $apiResponse;
    }

    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param \Throwable $exception
     * @return void
     */
    public function report(Throwable $exception)
    {
        $context = [ $exception ];
        if ($exception instanceof NotFoundHttpException) {
            $context[] = request()->url();
        }
        Log::error($exception->getMessage(), $context);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $ex
     * @return Response|Illuminate\Http\JsonResponse
     */
    public function render($request, Throwable $ex)
    {
        switch (true) {
            case $ex instanceof RestAuthenticationException:
                return $this->apiResponse->error(
                    $request,
                    ErrorFormatter::format($ex->getApiCode(), $ex->getMessage()),
                    $ex->getCode()
                );
            default:
                return $this->apiResponse->error(
                    $request,
                    ErrorFormatter::defaultFormat(CommonCodes::UNKNOWN_ERROR, $ex->getMessage()),
                );
        }
    }
}
