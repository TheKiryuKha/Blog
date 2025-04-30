<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin_panel')->middleware('auth')->group(function(){
    
    Route::controller(CategoryController::class)->group(function(){ 
        Route::get('/categories', 'index')
            ->can('is_admin')
            ->name('categories.index');

        Route::get('/categories/create', 'create')
            ->can('is_admin')   
            ->name('categories.create');

        Route::post('/categories', 'store')
            ->can('is_admin')    
            ->name('categories.store');

        Route::get('/categories/{category}/edit', 'edit')
            ->can('is_admin')    
            ->name('categories.edit');

        Route::patch('/categories/{category}', 'update')
            ->can('is_admin')    
            ->name('categories.update');

        Route::delete('/categories/{category}', 'destroy')
            ->can('is_admin')    
            ->name('categories.destroy');

    });
});

Route::get('/categories/{category}', [CategoryController::class, 'show'])
    ->middleware('auth')
    ->name('categories.show');