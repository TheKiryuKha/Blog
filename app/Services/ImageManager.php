<?php

namespace App\Services;

use File;
use Http;

class ImageManager{

    public function save(string $url): string
    {  
        $name = 'images/' . uniqid() . '.' . 'png';

        Http::sink(storage_path($name))
            ->get($url);
        
        return $name;
    }

    public function update(string $path, string $url): string
    {
        $this->delete($path);
        return $this->save($url);
    }

    public function delete(string $path): void
    {
        unlink($path);
    }
}