@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Izmeni narudzbinu #{{ $order->id }}</h4>
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

                    <form action="{{ route('order.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="user_id" class="form-label">User ID *</label>
                            <input type="number" 
                                   class="form-control" 
                                   id="user_id" 
                                   name="user_id" 
                                   value="{{ old('user_id', $order->user_id) }}" 
                                   min="1" 
                                   required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="total_price" class="form-label">Ukupna cena *</label>
                            <input type="number" 
                                   class="form-control" 
                                   id="total_price" 
                                   name="total_price" 
                                   value="{{ old('total_price', $order->total_price) }}" 
                                   min="0" 
                                   required>
                            <small class="text-muted">Primer: 9999 RSD</small>
                        </div>
                        
                        <div class="mb-3">
                            <label for="status" class="form-label">Status *</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="pending" {{ old('status', $order->status) == 'pending' ? 'selected' : '' }}>Na cekanju</option>
                                <option value="processing" {{ old('status', $order->status) == 'processing' ? 'selected' : '' }}>U procesu</option>
                                <option value="completed" {{ old('status', $order->status) == 'completed' ? 'selected' : '' }}>Zavrsena</option>
                                <option value="cancelled" {{ old('status', $order->status) == 'cancelled' ? 'selected' : '' }}>Otkazana</option>
                            </select>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('order.show', $order->id) }}" class="btn btn-secondary">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Sacuvaj izmene
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
