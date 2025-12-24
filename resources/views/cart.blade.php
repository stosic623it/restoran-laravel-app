<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-4">

        <h1 class="text-3xl font-bold mb-6">🛒 Your Order</h1>

        @if (!$order || $order->foods->isEmpty())
        <p class="text-gray-500">Your cart is empty.</p>
        <a href="{{ route('menu') }}"
            class="inline-block mt-4 text-blue-600 hover:underline">
            ← Back to menu
        </a>
        @else

        <div class="bg-white border rounded-lg shadow p-6 mb-6">
            @foreach ($order->foods as $food)
            <div class="flex justify-between border-b py-3">
                <span>{{ $food->name }}</span>
                <span class="font-semibold">{{ $food->price }} RSD</span>
            </div>
            @endforeach

            <div class="flex justify-between text-xl font-bold mt-4">
                <span>Total:</span>
                <span>{{ $order->total_price }} RSD</span>
            </div>
        </div>

        <form method="POST" action="{{ route('order.confirm') }}">
            @csrf
            <button
                class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg text-lg font-semibold">
                Confirm Order
            </button>
        </form>

        @endif
    </div>
</x-app-layout>