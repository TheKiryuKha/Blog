<?php

namespace App\Traits;

trait HandlesCategories
{
    protected function extractCategories(array &$attributes): array
    {
        $categories = $attributes['categories'] ?? [];
        unset($attributes['categories']);
        return $categories; 
    }
}