<?php

namespace App\Actions;

use App\Models\Category;
use DB;

final class EditCategory{

    public function handle(Category $category, array $attr): bool
    {
        return DB::transaction(function() use ($category,$attr){
            return $category->update($attr);
        });
    }
}