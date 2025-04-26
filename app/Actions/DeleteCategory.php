<?php

namespace App\Actions;

use App\Models\Category;
use DB;

final class DeleteCategory{

    public function handle(Category $category): bool
    {
        return DB::transaction(function()use ($category){            
            return $category->delete();
        });
    }
}