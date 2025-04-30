<?php

namespace App\Http\Controllers;

use App\Actions\CreateCategory;
use App\Actions\DeleteCategory;
use App\Actions\EditCategory;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class CategoryController
{
    public function index(): Response
    {
        $categories = Category::all();

        return response([
            $categories
        ]);
    }

    public function create()
    {
        return response(200);
    }

    public function store(CategoryRequest $request, CreateCategory $action): RedirectResponse
    {
        $action->handle($request->validated());

        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        return response(status:200);
    }

    public function edit(Category $category)
    {
        return response(status:200);
    }

    public function update(CategoryRequest $request, Category $category, EditCategory $action): RedirectResponse
    {
        $action->handle($category, $request->validated());
        
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category, DeleteCategory $action): RedirectResponse
    {
        $action->handle($category);

        return redirect()->route('categories.index');
    }
}
