<?php

namespace App\Http\Controllers;

use App\Actions\CreateCategory;
use App\Actions\DeleteCategory;
use App\Actions\EditCategory;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController
{
    /**
     * Display a listing of the categories.
     */
    public function index(): Response
    {
        $categories = Category::all();

        return response([
            $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response(200);
    }

    /**
     * Store category.
     */
    public function store(CategoryRequest $request, CreateCategory $action): RedirectResponse
    {
        $action->handle($request->validated());

        return redirect()->route('categories.index');
    }

    /**
     * Display the list of all posts belongs to category.
     */
    public function show(Category $category)
    {
        return response(status:200);
    }

    /**
     * Show the form for editing category.
     */
    public function edit(Category $category)
    {
        return response(status:200);
    }

    /**
     * Update category.
     */
    public function update(CategoryRequest $request, Category $category, EditCategory $action): RedirectResponse
    {
        $action->handle($category, $request->validated());
        
        return redirect()->route('categories.index');
    }

    /**
     * Delete category.
     */
    public function destroy(Category $category, DeleteCategory $action): RedirectResponse
    {
        $action->handle($category);

        return redirect()->route('categories.index');
    }
}
