<?php

namespace App\Services\FileManager;

use App\Services\Filemanager\Traits\StorageTrait;

class FileManagerService
{
    use StorageTrait;

    protected $fileName;

    protected $disk;

    public function __construct()
    {
    }

    public function setFileName(string $name)
    {
        $this->fileName = $name;
    }

    public function setDisk(string $disk)
    {
        $this->disk = $disk;
    }

    public function getDisk(): string
    {
        return $this->disk;
    }
}
