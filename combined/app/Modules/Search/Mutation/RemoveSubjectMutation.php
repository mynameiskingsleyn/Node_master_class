<?php

namespace App\Modules\Search\Mutation;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use App\Modules\Shared\Traits\Authorize;
use App\Modules\Search\Operations\RemoveSubject;
use App\Exceptions\Search\RemoveSubjectException;
use App\Exceptions\Search\RemoveSubjectCodes;
use App\Exceptions\Authorization\AuthorizationException;
use App\Exceptions\Authorization\AuthorizationCodes;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Shared\ValidationRules;
use App\Services\ACL\AclService;
use LNWebAPI2\Plugins\MoLog\Log;
use Closure;

class RemoveSubjectMutation extends Mutation
{
    use Authorize;

    /**
    * @var RemoveSubject
    */
    protected $removeSubject;

    protected $aclService;

    protected $attributes = [
        'name' => 'removeSubject',
        'description' => 'Soft delete specific subject'
    ];

    public function __construct(RemoveSubject $removeSubject, AclService $aclService)
    {
        $this->removeSubject = $removeSubject;
        $this->aclService = $aclService;
    }

    public function type(): Type
    {
        return GraphQL::type('SubjectInfoResult');
    }

    public function args(): array
    {
        return [
          'Subject' => [
            'type' => GraphQL::type('RemoveSubjectInput')
          ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        $params = $args['Subject'];
        $response = null;
        if ($this->aclService->canDeleteSubject()) {
            $response = $this->removeSubject->submit($params);
        } else {
            throw new AuthorizationException(
                AuthorizationCodes::ACTION_NOT_ALLOWED,
                AuthorizationCodes::message(AuthorizationCodes::ACTION_NOT_ALLOWED)
            );
        }
        $response = $this->processRemoveSuccess($response, $params);
        return $response;
    }

    private function processRemoveSuccess($response, $params)
    {
        if ($response && isset($response->Status)) {
            if ($response->Status->Success === false) {
                Log::info($response->Status->Description . ': ' . $params['LastName']);
                throw new RemoveSubjectException(
                    RemoveSubjectCodes::REMOVAL_FAILURE,
                    RemoveSubjectCodes::message(RemoveSubjectCodes::REMOVAL_FAILURE)
                );
            }
        }
        return $response;
    }
}
