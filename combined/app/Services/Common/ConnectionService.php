<?php

namespace App\Services\Common;

use LNWebAPI2\Framework\Services\Modules\Factories\AuthService;

class ConnectionService
{
    private $authService;

    /**
     * The application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    protected $defaultConnection = null;

    protected $connectionMap = [
        ProductModules::FBI     => 'portfolio_fbi',
        ProductModules::ICE     => 'portfolio_ice',
        ProductModules::FLETC   => 'portfolio_flet',
        ProductModules::CBP     => 'portfolio_dcbp',
        ProductModules::USCIS   => 'portfolio_dcis',
        ProductModules::USCG1   => 'portfolio_dcg1',
        ProductModules::USCG2   => 'portfolio_dcg2',
        ProductModules::FPS     => 'portfolio_dfps',
        ProductModules::CSO     => 'portfolio_dcso',
        ProductModules::FEMA    => 'portfolio_fema',
        ProductModules::TSA     => 'portfolio_dtsa',
        ProductModules::USSS    => 'portfolio_usss',
        ProductModules::CISA    => 'portfolio_cisa',
        ProductModules::USAID   => 'portfolio_uaid',
    ];

    public function __construct($app, AuthService $authService)
    {
        $this->authService = $authService->getService();
        $this->app = $app;
    }

    public function portfolioConnection(): string
    {
        $activeModule = $this->authService->identity()
            ->getData()
            ->getUser()
            ->getNvp(config('app.active_module'));
        return $this->getActiveConnection($activeModule);
    }

    private function getActiveConnection(string $module): string
    {
        $module = strtolower($module);
        return 'portfolio_' . $module;
    }

    public function setConnection()
    {
        if ($this->authService->identity()->getData()) {
            $this->app['db']->setDefaultConnection($this->portfolioConnection());
        }
    }
}
