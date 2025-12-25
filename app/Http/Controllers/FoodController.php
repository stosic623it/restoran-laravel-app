<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodStoreRequest;
use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(Request $request)
    {
        $food = Food::all();

        return view('food.index', [
            'food' => $food,
        ]);
    }

    public function create(Request $request)
    {
        $categories = \App\Models\Category::all();

        return view('food.create', compact('categories'));
    }

    public function store(FoodStoreRequest $request)
    {
        $food = Food::create($request->all());

        $request->session()->flash('food.id', $food->id);

        return redirect()->route('food.index');
    }

    public function show(Request $request, Food $food)
    {
        return view('food.show', [
            'food' => $food,
        ]);
    }

    public function edit(Food $food)
    {
        $categories = \App\Models\Category::all();

        return view('food.edit', compact('food', 'categories'));
    }

    public function update(Request $request, Food $food)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'description' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $food->update($request->all());

        return redirect()->route('food.show', $food->id)
            ->with('success', 'Proizvod je uspesno izmenjen!');
    }

    public function destroy(Request $request, Food $food)
    {
        $food->delete();

        return redirect()->route('food.index');
    }

    // USE CASE
    public function menu(Request $request)
    {
        $categories = Category::all();

        $foods = Food::with('category');

        if ($request->category) {
            $foods->where('category_id', $request->category);
        }

        return view('menu', [
            'foods' => $foods->get(),
            'categories' => $categories,
        ]);
    }
}
