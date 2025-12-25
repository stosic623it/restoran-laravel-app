@extends('layouts.public')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Narudzbina #{{ $order->id }}</h4>
                <div class="btn-group">
                    <a href="{{ route('order.index') }}" class="btn btn-secondary">
                        Nazad
                    </a>
                    <a href="{{ route('order.edit', $order->id) }}" class="btn btn-warning">
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
                        <h5>Informacije o narudzbini</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>Narudzbina ID:</th>
                                <td>#{{ $order->id }}</td>
                            </tr>
                            <tr>
                                <th>User ID:</th>
                                <td>User #{{ $order->user_id }}</td>
                            </tr>
                            <tr>
                                <th>Ukupna cena:</th>
                                <td class="fw-bold">{{$order->total_price}} RSD</td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>
                                    <span class="badge bg-{{ 
                                        $order->status == 'completed' ? 'success' : 
                                        ($order->status == 'pending' ? 'warning' : 
                                        ($order->status == 'cancelled' ? 'danger' : 'secondary')) 
                                    }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Kreirano:</th>
                                <td>{{ $order->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Izmenjeno:</th>
                                <td>{{ $order->updated_at->format('M d, Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <form action="{{ route('order.destroy', $order->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this order?')">
                    Obrisi narudzbinu
                </button>
            </form>
        </div>
    </div>
</div>
@endsection