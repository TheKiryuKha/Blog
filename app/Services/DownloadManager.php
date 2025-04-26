<?php

namespace App\Services;

use File;
use Http;

class DownloadManager{

    public function save(string $url, string $filename): void
    {  
        Http::sink(storage_path($filename))
            ->get($url);
    }

    public function delete(string $path): void
    {
        unlink($path);
    }
}