<?php

namespace App\Modules\Verify\Mutation;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use App\Modules\Shared\Traits\Authorize;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\UploadType;
use App\Services\ACL\AclService;
use App\Services\CsvProcessor\Services\CsvService;
use App\Services\CsvProcessor\Models\CourtIdentifierCsvModel;
use App\Services\Verification\VerificationService;
use App\Exceptions\Verification\VerificationException;
use App\Exceptions\Verification\VerificationCodes;
use App\Logging\Writer;
use Closure;

class UploadIntervalFileMutation extends Mutation
{
    use Authorize;

    protected $csvService;
    private $aclService;
    private $verificationService;

    protected $attributes = [
        'name' => 'uploadIntervalFile',
        'description' => 'Upload the Court Interval csv file'
    ];

    public function __construct(
        AclService $aclService,
        CourtIdentifierCsvModel $model,
        VerificationService $verificationService
    ) {
        $this->aclService = $aclService;
        $this->verificationService = $verificationService;
    }

    public function type(): Type
    {
        return GraphQL::type('FileUploadResult');
    }

    public function args(): array
    {
        return [
          'file' => [
              'type' => GraphQL::type('Upload'),
              'rules' => ['required']
          ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        $file = $args['file'];
        if ($this->aclService->canUpdateVerification()) {
            return $this->verificationService->uploadFile($file, 'court_interval.csv');
        } else {
            $message = VerificationCodes::message(VerificationCodes::AUTHORIZATION_ERROR);
            Writer::queryError(__METHOD__, $message);
            throw new VerificationException(VerificationCodes::AUTHORIZATION_ERROR, $message);
        }
    }
}
