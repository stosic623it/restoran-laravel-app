@extends('layouts.public')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Narudzbine</h1>
        <a href="{{ route('order.create') }}" class="btn btn-primary">
            + Nova narudzbina
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($orders->isEmpty())
        <div class="alert alert-info">
            Narudzbina nije pronadjena.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Ukupna cena</th>
                        <th>Status</th>
                        <th>Kreirano</th>
                        <th>Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>User #{{ $order->user_id }}</td>
                            <td>{{$order->total_price}} RSD</td>
                            <td>
                                <span class="badge bg-{{ 
                                    $order->status == 'completed' ? 'success' : 
                                    ($order->status == 'pending' ? 'warning' : 
                                    ($order->status == 'cancelled' ? 'danger' : 'secondary')) 
                                }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>{{ $order->created_at->format('M d, Y') }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('order.show', $order->id) }}" class="btn btn-sm btn-info">
                                        View
                                    </a>
                                    <a href="{{ route('order.edit', $order->id) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('order.destroy', $order->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this order?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($orders->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $orders->links() }}
            </div>
        @endif
    @endif
</div>
@endsection