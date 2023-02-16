<?php

namespace App\Http\Formatters;

use Illuminate\Http\Request;
use App\Http\Formatters\ApiResponseTrait;

class JsonResponse
{
    use ApiResponseTrait;

    const RESPONSE_DATA_KEY = 'data';
    const RESPONSE_ERROR_KEY = 'errors';

    /**
     * Returns a successful json response for REST API calls
     * @param Request $request
     * @param mixed $data
     * @param int $code
     */
    public function success(Request $request, $data, int $code = 200)
    {
        $jData = array_merge($this->basicResponse($request), [self::RESPONSE_DATA_KEY => $data]);
        return response()->json($jData, $code);
    }

    /**
     * Returns an error json response for REST API calls
     * @param Request $request
     * @param mixed $data
     * @param int $code
     */
    public function error(Request $request, $data, int $code = 500)
    {
        $jData = array_merge($this->basicResponse($request), [self::RESPONSE_ERROR_KEY => [$data]]);
        return response()->json($jData, $code);
    }
}
