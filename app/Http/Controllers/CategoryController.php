<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        return view('category.index', [
            'categories' => $categories,
        ]);
    }

    public function create(Request $request)
    {
        return view('category.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);
        
        Category::create($request->all());
        
        return redirect()->route('category.index')
            ->with('success', 'Kategorija kreirana uspesno!');
    }

    public function show(Request $request, Category $category)
    {
        $category->load('food');
        return view('category.show', compact('category'));

    }

    public function edit(Request $request, Category $category)
    {
        return view('category.edit', [
            'category' => $category,
        ]);
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);
        
        $category->update($request->all());
        
        return redirect()->route('category.show', $category->id)
            ->with('success', 'Kategorija uspesno izmenjena!');
    }

    public function destroy(Request $request, Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}
