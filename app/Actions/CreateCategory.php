<?php

namespace App\Actions;

use App\Models\Category;
use DB;

final class CreateCategory{

    public function handle(array $attr)
    {

        $category = DB::transaction(function() use($attr){
            return Category::create($attr);
        });

        return $category;
    }
}