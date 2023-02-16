<?php

namespace App\Services\ACL;

use App\Services\User\AccountService;
use App\Services\Report\ReportTypesConstant;
use Illuminate\Support\Facades\App;

class AclService
{
    /**
     * @var string
     */
    private $defaultToken;

    // Only added to pass Git Code analysis
    public function __construct()
    {
    }

    public function accessPublicRecord(): bool
    {
        $prEnabled = $this->getPermissionValue(config('acl.permissions.public_record_fcra'));
        return $prEnabled && $prEnabled === '1';
    }

    public function accessNonFcraPublicRecord(): bool
    {
        $nrEnabled = $this->getPermissionValue(config('acl.permissions.public_record_nonfcra'));
        return $nrEnabled && $nrEnabled === '1';
    }

    public function accessCreditReport(): bool
    {
        $crEnabled = $this->getPermissionValue(config('acl.permissions.credit_report'));
        return $crEnabled && $crEnabled === '1';
    }

    public function canByPassLexIdCheck(): bool
    {
        // proper NVP will be defined for this feature
        // for now distinct between non-monitoring agencies
        $monitoring = $this->getPermissionValue(config('acl.permissions.monitoring'));
        return !$monitoring || $monitoring !== '1';
    }

    public function smallNoRecordReport(): bool
    {
        $smallNoRecordReport = $this->getPermissionValue(config('acl.permissions.no_record_report_small'));
        return $smallNoRecordReport && $smallNoRecordReport === '1';
    }

    public function disabledCreditNotes(): bool
    {
        $disabledCrNotes = $this->getPermissionValue(config('acl.permissions.disable_credit_notes'));
        return $disabledCrNotes && $disabledCrNotes === '1';
    }

    public function showAgencySubjectId(): bool
    {
        $showAgencySubjectId = $this->getPermissionValue(config('acl.permissions.show_agency_subject_id'));
        return $showAgencySubjectId && $showAgencySubjectId === '1';
    }

    public function allowedReports(): array
    {
        $allowed = [];
        if ($this->accessPublicRecord()) {
            array_push($allowed, ReportTypesConstant::PUBLIC_RECORD);
        }
        if ($this->accessCreditReport()) {
            array_push($allowed, ReportTypesConstant::CREDIT_REPORT);
        }
        if ($this->accessNonFcraPublicRecord()) {
            array_push($allowed, ReportTypesConstant::NONFCRA_PUBLIC_RECORD);
        }
        return $allowed;
    }

    public function setDefaultToken($token)
    {
        $this->defaultToken = $token;
    }

    public function canDeleteSubject(): bool
    {
        $deleteReport = $this->getPermissionValue(config('acl.permissions.soft_delete'));
        return $deleteReport && $deleteReport === '1';
    }

    public function canUpdateVerification(): bool
    {
        $updateVerification = $this->hasRole(config('acl.permissions.can_verify'));
        return $updateVerification;
    }

    private function getPermissionValue($permission)
    {
        return App::make(AccountService::class)->getAccount($this->defaultToken)
            ->getUser()
            ->getNvp($permission);
    }

    private function hasRole($name)
    {
        $roles = App::make(AccountService::class)->getAccount($this->defaultToken)
        ->getUser()->getRoles();
        foreach ($roles as $role) {
            if ($role->getCode() === $name) {
                return true;
            }
        }
        return false;
    }
}
