@extends('layouts.public')

@section('content')

<div class="container py-5">

    <!-- NASLOV -->
    <div class="text-center mb-5">
        <h1 class="fw-bold display-5">🍽️ Meni restorana "Ukusni Zalogaj"</h1>
        <p class="text-muted mt-2">
            Ukusna hrana, kvalitetno gostoprimstvo i brzo naručivanje
        </p>
    </div>

    <!-- KORPA -->
    @auth
        <div class="text-end mb-4">
            <a href="{{ route('cart') }}" class="btn btn-dark">
                🛒 Korpa
            </a>
        </div>
    @endauth

    <!-- SUCCESS PORUKA -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">

        <!-- SIDEBAR -->
        <aside class="col-lg-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Kategorije</h5>

                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="{{ route('menu') }}" class="text-decoration-none text-dark">
                                Sve
                            </a>
                        </li>

                        @foreach($categories as $category)
                            <li class="mb-2">
                                <a href="{{ route('menu', ['category' => $category->id]) }}"
                                   class="text-decoration-none text-dark">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </aside>

        <!-- MENI -->
        <main class="col-lg-9">
            <div class="row g-4">

                @foreach ($foods as $food)
                    <div class="col-sm-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0">

                            <div class="card-body d-flex flex-column">

                                <!-- KATEGORIJA -->
                                <span class="text-muted small mb-1">
                                    {{ $food->category->name ?? 'Food' }}
                                </span>

                                <!-- NAZIV -->
                                <h5 class="fw-bold mb-2">
                                    {{ $food->name }}
                                </h5>

                                <!-- MALA SLIKA -->
                                <img
                                    src="{{ asset('images/' . $food->image) }}"
                                    alt="{{ $food->name }}"
                                    class="img-fluid rounded mb-3"
                                    style="height: 120px; object-fit: cover;"
                                >

                                <!-- OPIS -->
                                <p class="text-muted small flex-grow-1">
                                    {{ $food->description }}
                                </p>

                                <!-- CENA + DUGME -->
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="fw-bold">
                                        {{ $food->price }} RSD
                                    </span>

                                    @auth
                                        <form method="POST" action="{{ route('order.add', $food) }}">
                                            @csrf
                                            <button class="btn btn-primary btn-sm">
                                                Dodaj
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-muted small">
                                            Prijavi se
                                        </span>
                                    @endauth
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </main>

    </div>
</div>

@endsection
