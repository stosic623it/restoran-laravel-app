@extends('layouts.public')

@section('content')

<div class="container py-5">

    <!-- NASLOV -->
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">
            Dobrodošli u restoran <br>
            <span class="text-warning fst-italic">Ukusni Zalogaj</span>
        </h1>
        <p class="text-muted mt-3">
            Izdvajamo neka od naših najpopularnijih jela
        </p>
    </div>

    <!-- ISTAKNUTA JELA -->
    @foreach ($istaknutaJela as $jelo)
        <div class="card mb-5 shadow-sm border-0">
            <div class="row g-0 align-items-center">

                <!-- SLIKA -->
                <div class="col-md-5">
                    <img 
                        src="{{ asset('images/' . $jelo->image) }}" 
                        class="img-fluid rounded-start"
                        alt="{{ $jelo->name }}"
                        style="object-fit: cover; height: 100%;"
                    >
                </div>

                <!-- SADRŽAJ -->
                <div class="col-md-7">
                    <div class="card-body p-4">

                        <h2 class="card-title fw-bold mb-3">
                            {{ $jelo->name }}
                        </h2>

                        <p class="card-text text-muted mb-4">
                            {{ $jelo->description }}
                        </p>

                        @if($jelo->price)
                            <div class="fs-3 fw-bold text-warning">
                                {{ $jelo->price }} RSD
                            </div>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    @endforeach

    <!-- DUGME MENI -->
    <div class="text-center mt-5">
        <p class="text-muted mb-4">
            Pogledajte kompletnu ponudu jela i pića
        </p>

        <a href="{{ route('menu') }}" class="btn btn-warning btn-lg px-5 fw-bold">
            📜 Pogledaj ceo meni
        </a>
    </div>

</div>

@endsection
