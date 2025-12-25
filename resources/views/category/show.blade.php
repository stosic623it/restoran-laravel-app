@extends('layouts.public')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Kategorija: {{ $category->name }}</h4>
                <div class="btn-group">
                    <a href="{{ route('category.index') }}" class="btn btn-secondary">
                        Nazad
                    </a>
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">
                        Izmeni
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-4">
                        <h5>Informacije o kategoriji</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>ID:</th>
                                <td>{{ $category->id }}</td>
                            </tr>
                            <tr>
                                <th>Naziv:</th>
                                <td>{{ $category->name }}</td>
                            </tr>
                            <tr>
                                <th>Kreirana:</th>
                                <td>{{ $category->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Izmenjeno:</th>
                                <td>{{ $category->updated_at->format('M d, Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-4">
                        <h5>Proizvodi u ovoj kategoriji</h5>
                        @if($category->food && $category->food->count() > 0)
                            <ul class="list-group">
                                @foreach($category->food as $food)
                                    <li class="list-group-item">
                                        {{ $food->name }} - {{$food->price}} RSD
                                    </li>
                                @endforeach
                            </ul>
                            <p class="mt-2">Ukupno: {{ $category->food->count() }} proizvoda</p>
                        @else
                            <p class="text-muted">Nema proizvoda u ovoj kategoriji.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this category? This will also delete all food items in it.')">
                    Obrisi 
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
