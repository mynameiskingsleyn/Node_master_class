<?php

namespace App\Bootstrap;

use Laravel\Lumen\Bootstrap\LoadEnvironmentVariables;
use Illuminate\Support\Env;
use Dotenv\Dotenv;

class LoadEnvironment extends LoadEnvironmentVariables
{
    private $defaultPath;

    private $envPaths = [
        '/etc/httpd/conf/apps/insider-threat/',
        '/etc/httpd/conf/apps/insider-threat/secrets/'
    ];

    private $envFilenames = [
        '.env',
        '.env.secrets'
    ];

    public function __construct($defaultPath)
    {
        $this->defaultPath = $defaultPath;
        $this->checkPaths();
        parent::__construct($this->envPaths, $this->envFilenames);
    }

    /**
     * Create a Dotenv instance.
     *
     * @return \Dotenv\Dotenv
     */
    protected function createDotenv()
    {
        return Dotenv::create(
            Env::getRepository(),
            $this->envPaths,
            $this->envFilenames,
            false
        );
    }

    protected function checkPaths()
    {
        $paths = [];
        foreach ($this->envPaths as $path) {
            if (is_dir($path)) {
                $paths[] = $path;
            }
        }

        $this->envPaths = $paths ? $paths : $this->getDefaultPath();
    }

    protected function getDefaultPath()
    {
        return $this->defaultPath;
    }
}
