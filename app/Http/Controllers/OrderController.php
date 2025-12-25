<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Food;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        $orders = Order::latest()->paginate(10);
        return view('order.index', compact('orders'));
    }

    public function create(Request $request)
    {
        return view('order.create');
    }

    public function store(OrderStoreRequest $request)
    {
         $request->validate([
            'user_id' => 'required|integer|min:1',
            'total_price' => 'required|integer|min:0',
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);
        
        $order = Order::create($request->all());
        
        return redirect()->route('order.show', $order->id)
            ->with('success', 'Narudzbina uspesno kreirana!');
    }

    public function show(Request $request, Order $order)
    {
        return view('order.show', [
            'order' => $order,
        ]);
    }

    public function edit(Request $request, Order $order)
    {
        return view('order.edit', [
            'order' => $order,
        ]);
    }

    public function update(OrderUpdateRequest $request, Order $order)
    {
       $request->validate([
            'user_id' => 'required|integer|min:1',
            'total_price' => 'required|integer|min:0',
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);
        
        $order->update($request->all());
        
        return redirect()->route('order.show', $order->id)
            ->with('success', 'Narudzbina uspesno izmenjena!');
    }

    public function destroy(Request $request, Order $order)
    {
        $order->delete();
        
        return redirect()->route('order.index')
            ->with('success', 'Narudzbina obrisana uspesno!');
    }

    // USE CASE - dodavanje hrane u porudzbinu
    public function add(Food $food)
    {
        $order = Order::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'status' => 'created',
            ],
            [
                'total_price' => 0,
            ]
    );

        $order->foods()->attach($food->id);
        $order->total_price += $food->price;
        $order->save();

        return back()->with('success', 'Hrana dodata u porudzbinu');
    }

    // USE CASE - potvrda porudzbine
    public function confirm()
    {
        $order = Order::where('user_id', Auth::id())
            ->where('status', 'created')
            ->firstOrFail();

        $order->status = 'confirmed';
        $order->save();

        return redirect()->route('menu')->with('success', 'Porudzbina potvrdjena');
    }

    // Korpa
    public function cart()
    {
        $order = Order::with('foods')
            ->where('user_id', Auth::id())
            ->where('status', 'created')
            ->first();

        return view('cart', compact('order'));
    }


}
