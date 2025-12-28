@extends('layouts.public')

@section('content')
    <div class="max-w-4xl mx-auto py-10 px-4">

        <h1 class="text-3xl font-bold mb-6">🛒 Tvoja narudzbina</h1>

        @if (!$order || $order->foods->isEmpty())
            <div class="bg-white border rounded-lg shadow p-6 text-center">
                <p class="text-gray-500 text-lg mb-4">Tvoja korpa je prazna.</p>
                <a href="{{ route('menu') }}"
                    class="inline-block bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-lg transition">
                    ← Nazad na meni
                </a>
            </div>
        @else

            <div class="bg-white border rounded-lg shadow p-6 mb-6">
                @foreach ($order->foods as $food)
                    <div class="flex justify-between items-center border-b py-4 last:border-b-0">
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-800">{{ $food->name }}</h3>
                            @if($food->pivot->quantity > 1)
                                <span class="text-sm text-gray-500">Količina: {{ $food->pivot->quantity }}</span>
                            @endif
                        </div>
                        <div class="text-right">
                            @if($food->pivot->quantity > 1)
                                <div class="text-sm text-gray-500">
                                    {{ $food->price }} RSD × {{ $food->pivot->quantity }}
                                </div>
                            @endif
                            <span class="font-bold text-gray-800">
                                @if($food->pivot->quantity > 1)
                                    {{ $food->price * $food->pivot->quantity }}
                                @else
                                    {{ $food->price }}
                                @endif RSD
                            </span>
                        </div>
                    </div>
                @endforeach

                <div class="flex justify-between text-xl font-bold mt-6 pt-6 border-t">
                    <span>Ukupno:</span>
                    <span class="text-orange-600">{{ $order->total_price }} RSD</span>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-between items-center">
                <a href="{{ route('menu') }}"
                    class="text-gray-600 hover:text-gray-800 font-medium transition">
                    ← Dodaj još jela
                </a>
                
                <form method="POST" action="{{ route('order.confirm') }}" class="w-full sm:w-auto">
                    @csrf
                    <button type="submit"
                        class="w-full bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg text-lg font-semibold transition transform hover:scale-[1.02]">
                        ✅ Potvrdi porudzbinu
                    </button>
                </form>
            </div>

            @if($order->created_at)
                <div class="mt-8 text-center text-gray-500 text-sm">
                    <p>Narudžbina kreirana: {{ $order->created_at->format('d.m.Y H:i') }}</p>
                </div>
            @endif

        @endif
    </div>
@endsection