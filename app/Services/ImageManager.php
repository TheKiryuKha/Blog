<?php

namespace App\Services;

use File;
use Http;

class ImageManager{

    public function save(string $url): string
    {  
        $name = uniqid() . '.' . 'png';

        Http::sink(storage_path($name))
            ->get($url);
        
        return $name;
    }

    public function delete(string $path): void
    {
        unlink($path);
    }
}