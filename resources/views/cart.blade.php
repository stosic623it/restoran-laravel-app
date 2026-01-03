@extends('layouts.public')

@section('content')

<div class="container py-5">

    <h1 class="fw-bold mb-4">🛒 Tvoja narudžbina</h1>

    @if (!$order || $order->foods->isEmpty())
        <p class="text-muted">Tvoja korpa je prazna.</p>

        <a href="{{ route('menu') }}" class="btn btn-link px-0">
            ← Nazad na meni
        </a>
    @else

        <!-- LISTA PROIZVODA -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">

                @foreach ($order->foods as $food)
                    <div class="row align-items-center border-bottom py-3">

                        <!-- SLIKA -->
                        <div class="col-3 col-md-2">
                            <img
                                src="{{ $food->image 
                                    ? asset('images/' . $food->image) 
                                    : 'https://via.placeholder.com/150' }}"
                                class="img-fluid rounded"
                                alt="{{ $food->name }}"
                                style="object-fit: cover;"
                            >
                        </div>

                        <!-- NAZIV -->
                        <div class="col-6 col-md-6">
                            <h5 class="mb-1">{{ $food->name }}</h5>
                            <small class="text-muted">
                                Cena: {{ $food->price }} RSD
                            </small>
                        </div>

                        <!-- KOLIČINA (FIKSNA) -->
                        <div class="col-3 col-md-2 text-center">
                            <span class="badge bg-secondary">
                                x 1
                            </span>
                        </div>

                        <!-- UKUPNO PO PROIZVODU -->
                        <div class="col-md-2 text-end fw-bold">
                            {{ $food->price }} RSD
                        </div>

                    </div>
                @endforeach

            </div>
        </div>

        <!-- UKUPNA CENA -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Ukupno:</h4>
            <h4 class="fw-bold text-success mb-0">
                {{ $order->total_price }} RSD
            </h4>
        </div>

        <!-- POTVRDA -->
        <form method="POST" action="{{ route('order.confirm') }}">
            @csrf
            <button class="btn btn-success btn-lg px-5">
                ✔ Potvrdi porudžbinu
            </button>
        </form>

    @endif

</div>

@endsection
