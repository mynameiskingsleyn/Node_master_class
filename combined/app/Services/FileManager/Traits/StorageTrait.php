<?php

namespace App\Services\FileManager\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

trait StorageTrait
{
    public function getFileFullPath($fileName = null)
    {
        $storagePath = $this->getStoragePath();
        $name = $fileName;
        if (!$name) {
            $name = $this->fileName ?? null;
        }
        return $storagePath . $name;
    }

    public function getStoragePath()
    {
        if ($this->disk) {
            $storagePath = Storage::disk($this->disk)
                            ->getDriver()
                            ->getAdapter()
                            ->getPathPrefix();
        } else {
            $storagePath = Storage::disk()
                            ->getDriver()
                            ->getAdapter()
                            ->getPathPrefix();
        }
        return $storagePath;
    }

    public function saveFile($file, $fileAs = null)
    {
        $fileName = '';
        $storagePath = $this->getStoragePath();
        if ($fileAs) {
            $file->move($storagePath, $fileAs);
            $fileName = $fileAs;
        } else {
            $fileName = $file->getClientOriginalName();
            $file->move($storagePath, $file->getClientOriginalName());
        }
        return $fileName;
    }

    public function removeFile($filename)
    {
        $fullPath = $this->getFileFullPath($filename);
        unlink($fullPath);
    }
}
