<?php

namespace App\Actions;

use App\Models\Category;
use DB;

final class CreateCategory{

    public function handle(array $attr): Category
    {
        return DB::transaction(function() use($attr){
            return Category::create($attr);
        });
    }
}