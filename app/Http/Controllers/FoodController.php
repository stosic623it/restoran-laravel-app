<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodStoreRequest;
use App\Http\Requests\FoodUpdateRequest;
use App\Models\Food;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FoodController extends Controller
{


    public function index(Request $request): Response
    {
        $food = Food::all();

        return view('food.index', [
            'food' => $food,
        ]);
    }

    public function create(Request $request): Response
    {
        return view('food.create');
    }

    public function store(FoodStoreRequest $request): Response
    {
        $food = Food::create($request->validated());

        $request->session()->flash('food.id', $food->id);

        return redirect()->route('food.index');
    }

    public function show(Request $request, Food $food): Response
    {
        return view('food.show', [
            'food' => $food,
        ]);
    }

    public function edit(Request $request, Food $food): Response
    {
        return view('food.edit', [
            'food' => $food,
        ]);
    }

    public function update(FoodUpdateRequest $request, Food $food): Response
    {
        $food->update($request->validated());

        $request->session()->flash('food.id', $food->id);

        return redirect()->route('food.index');
    }

    public function destroy(Request $request, Food $food): Response
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
