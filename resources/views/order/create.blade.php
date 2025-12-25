@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Kreiraj novu narudzbinu</h4>
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

                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="user_id" class="form-label">User ID *</label>
                            <input type="number" 
                                   class="form-control" 
                                   id="user_id" 
                                   name="user_id" 
                                   value="{{ old('user_id') }}" 
                                   placeholder="Upisi user ID" 
                                   min="1" 
                                   required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="total_price" class="form-label">Ukupna cena *</label>
                            <input type="number" 
                                   class="form-control" 
                                   id="total_price" 
                                   name="total_price" 
                                   value="{{ old('total_price') }}" 
                                   placeholder="Upisi ukupnu cenu u RSD" 
                                   min="0" 
                                   required>
                            <small class="text-muted">Primer: 9999 RSD</small>
                        </div>
                        
                        <div class="mb-3">
                            <label for="status" class="form-label">Status *</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="">Odaberi Status</option>
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Na cekanju</option>
                                <option value="processing" {{ old('status') == 'processing' ? 'selected' : '' }}>U procesu</option>
                                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Zavrsena</option>
                                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Otkazana</option>
                            </select>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('order.index') }}" class="btn btn-secondary">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Kreiraj narudzbinu
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
