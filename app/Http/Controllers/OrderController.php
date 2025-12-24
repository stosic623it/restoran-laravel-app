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

    public function index(Request $request): Response
    {
        $orders = Order::all();

        return view('order.index', [
            'orders' => $orders,
        ]);
    }

    public function create(Request $request): Response
    {
        return view('order.create');
    }

    public function store(OrderStoreRequest $request): Response
    {
        $order = Order::create($request->validated());

        $request->session()->flash('order.id', $order->id);

        return redirect()->route('orders.index');
    }

    public function show(Request $request, Order $order): Response
    {
        return view('order.show', [
            'order' => $order,
        ]);
    }

    public function edit(Request $request, Order $order): Response
    {
        return view('order.edit', [
            'order' => $order,
        ]);
    }

    public function update(OrderUpdateRequest $request, Order $order): Response
    {
        $order->update($request->validated());

        $request->session()->flash('order.id', $order->id);

        return redirect()->route('orders.index');
    }

    public function destroy(Request $request, Order $order): Response
    {
        $order->delete();

        return redirect()->route('orders.index');
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
