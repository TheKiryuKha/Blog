<?php

namespace App\Actions;

use App\Models\Category;
use DB;

final class DeleteCategory{

    public function handle(Category $category): bool
    {
        DB::transaction(function()use ($category){
            
            $category->delete();
        });

        return true;
    }
}