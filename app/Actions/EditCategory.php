<?php

namespace App\Actions;

use App\Models\Category;
use DB;

final class EditCategory{

    public function handle(Category $category, array $attr): Category
    {
        DB::transaction(function() use ($category,$attr){
            $category->update($attr);
        });

        return $category;
    }
}