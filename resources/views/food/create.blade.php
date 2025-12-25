@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Dodaj novi proizvod</h4>
                </div>

                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('food.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Naziv proizvoda *</label>
                            <input type="text" 
                                   class="form-control" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   placeholder="Upisi naziv proizvoda" 
                                   required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Kategorija *</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                <option value="">Izaberi kategoriju</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="price" class="form-label">Cena *</label>
                            <input type="number" 
                                   class="form-control" 
                                   id="price" 
                                   name="price" 
                                   value="{{ old('price') }}" 
                                   placeholder="Upisi cenu u dinarima" 
                                   min="0" 
                                   required>
                            <small class="text-muted">Primer: 999 RSD</small>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Opis</label>
                            <textarea class="form-control" 
                                      id="description" 
                                      name="description" 
                                      rows="4" 
                                      placeholder="Upisi opis proizvoda">{{ old('description') }}</textarea>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('food.index') }}" class="btn btn-secondary">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Dodaj novi porizvod
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
