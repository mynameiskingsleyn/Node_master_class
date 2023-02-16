<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use LNWebAPI2\Framework\Responses\ResponseCodes;
use App\Http\Formatters\JsonResponse;
use LNWebAPI2\Framework\Responses\Result;
use LNWebAPI2\Framework\Responses\IResult;

class Controller extends BaseController
{
    protected $jsonResponse;

    public function __construct(JsonResponse $jsonResponse)
    {
        $this->jsonResponse = $jsonResponse;
    }

    /**
     * Verify if the request validates again the rules
     * @param Request $request
     * @param array $rules set of rules to be validated
     * @param array $messages override the default message per each attribute
     * @throws ValidationException
     *
     * @return mixed
     */
    protected function validateRequest(Request $request, array $rules, array $messages = [])
    {
        self::buildResponseUsing(function ($request, $errors) {
            return $this->jsonResponse->error($request, $errors, 422);
        });

        self::formatErrorsUsing(function ($validator) {
            $errors = [];

            foreach ($validator->errors()->getMessages() as $message) {
                $errors[] = $this->jsonResponse->getData(ResponseCodes::INVALID_PARAMETER, array_pop($message));
            }

            return $errors;
        });

        $this->validate($request, $rules, $messages);
    }
}
