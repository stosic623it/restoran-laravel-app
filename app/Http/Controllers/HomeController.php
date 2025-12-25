<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(): View
    {
        $istaknutaJela = Food::where('featured', true)->take(3)->get();

        return view('home', compact('istaknutaJela'));
    }
}
