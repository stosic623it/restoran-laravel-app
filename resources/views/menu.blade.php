<x-app-layout>
    <div class="max-w-6xl mx-auto py-10 px-4">

        <!-- Naziv restorana -->
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-800">🍽️ Restaurant Menu</h1>
            <p class="text-gray-500 mt-2">
                Fresh food, quality ingredients, fast service
            </p>
        </div>

        @auth
            <div class="text-right mb-6">
                <a href="{{ route('cart') }}"
                class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-900">
                    🛒 View Cart
                </a>
            </div>
        @endauth


        <!-- Poruka uspeha -->
        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Grid proizvoda -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($foods as $food)
                <div class="bg-white border rounded-lg shadow hover:shadow-lg transition p-5 flex flex-col">
                    
                    <div class="mb-3">
                        <span class="text-sm text-gray-500">
                            {{ $food->category->name ?? 'Food' }}
                        </span>
                        <h2 class="text-xl font-semibold text-gray-800">
                            {{ $food->name }}
                        </h2>
                    </div>

                    <p class="text-gray-600 flex-grow">
                        {{ $food->description }}
                    </p>

                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-lg font-bold text-gray-800">
                            {{ $food->price }} RSD
                        </span>

                        @auth
                            <form method="POST" action="{{ route('order.add', $food) }}">
                                @csrf
                                <button
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
                                    Add
                                </button>
                            </form>
                        @else
                            <span class="text-sm text-gray-400">
                                Login to order
                            </span>
                        @endauth
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>
