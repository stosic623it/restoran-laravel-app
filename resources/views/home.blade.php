<x-app-layout>
    <div class="max-w-4xl mx-auto py-16 px-4">

        <!-- NASLOV -->
        <h1 class="text-4xl font-bold text-center mb-20">
            Dobrodošli u restoran <br>
            <span class="italic text-orange-600">„Ukusni Zalogaj"</span>
        </h1>

        <!-- ISTAKNUTA JELA -->
        <div class="space-y-24">
            @foreach ($istaknutaJela as $jelo)
                <div class="bg-white rounded-2xl shadow-md p-10 transition-all duration-300 hover:shadow-lg">
                    
                    <!-- NASLOV JELA -->
                    <div class="text-center mb-10">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-orange-100 rounded-full mb-6">
                            <span class="text-2xl">🍽️</span>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">
                            {{ $jelo->name }}
                        </h2>
                        
                    </div>

                    <!-- OPIS JELA -->
                    <div class="mb-10">
                        <p class="text-gray-700 text-lg leading-relaxed text-center max-w-3xl mx-auto">
                            {{ $jelo->description }}
                        </p>
                    </div>

                    <!-- INFORMACIJE -->
                    <div class="flex flex-col md:flex-row justify-between items-center gap-6 mt-12 pt-10 border-t border-gray-100">
                        @if($jelo->price)
                            <div class="text-3xl font-bold text-orange-600">
                                {{ $jelo->price }} RSD
                            </div>
                        @endif
                        
                    </div>

                </div>
            @endforeach
        </div>

        <!-- DUGME MENI -->
        <div class="text-center mt-28">
            <div class="mb-8">
                <p class="text-gray-600 text-lg">
                    Otkrijte još mnogo ukusnih jela u našem kompletnom meniju
                </p>
            </div>
            <a href="{{ route('menu') }}"
               class="inline-flex items-center bg-orange-600 hover:bg-orange-700 text-white
                      px-16 py-5 text-xl font-bold rounded-xl shadow-lg
                      transition duration-300 transform hover:scale-[1.02]">
                <span class="mr-4 text-2xl">📜</span>
                PREGLEDAJ CELI MENI
                <span class="ml-4 text-2xl">→</span>
            </a>
        </div>

    </div>
</x-app-layout>