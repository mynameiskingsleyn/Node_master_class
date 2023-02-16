<?php

namespace App\Http\Formatters;

use Illuminate\Http\Request;
use App\Services\Common\MaskingService;
use Illuminate\Support\Facades\App;

trait ApiResponseTrait
{
    /**
     * Creates the basic response which will be merged to the rest of the response
     * @param Request $request
     * @return array
     */
    protected function basicResponse(Request $request): array
    {
        return [
            'request' => [
                'timestamp' => round(microtime(true) - LUMEN_START, 2, PHP_ROUND_HALF_EVEN), // time in seconds
                'params' => App::make(MaskingService::class)->sanitizeRespParams($this->getParameters($request)),
            ],
        ];
    }

    /**
     * Returns the parameters for REST and GraphQL requests
     * @param Request $request
     * @return array
     */
    protected function getParameters(Request $request): array
    {
        if ($request->has('query')) {
            $paramKey = config('graphql.params_key', 'variables');
            $parameters = $request->only($paramKey);
            if (!empty($parameters[$paramKey])) {
                $variables = $parameters[$paramKey];
                if (!$this->hasMultipleKeys($variables)) {
                    $argsKey = array_key_first($variables);
                    return is_array($variables[$argsKey]) ? $variables[$argsKey] : [$argsKey => $variables[$argsKey]];
                }
                return $variables;
            }
            return $parameters;
        }
        return $request->all();
    }

    /**
     * Checks if the variables in the request comes with no 'input' => [] structure
     * @param array $variables
     * @return bool
     */
    private function hasMultipleKeys(array $variables): bool
    {
        return count(array_keys($variables)) > 1;
    }
}
