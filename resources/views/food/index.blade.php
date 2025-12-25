@extends('layouts.public')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Svi proizvodi</h1>
        <a href="{{ route('food.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Dodaj novi proizvod
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($food->isEmpty())
        <div class="alert alert-info">
            Proizvod nije pronadjen. <a href="{{ route('food.create') }}" class="alert-link">Dodaj tvoj prvi porizvod</a>.
        </div>
    @else
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Naziv</th>
                                <th>Kategorija</th>
                                <th>Cena</th>
                                <th>Opis</th>
                                <th>Akcije</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($food as $f)
                                <tr>
                                    <td class="align-middle">{{ $f->id }}</td>
                                    <td class="align-middle">
                                        <strong>{{ $f->name }}</strong>
                                    </td>
                                    <td class="align-middle">
                                        @if($f->category)
                                            <span class="badge bg-secondary">
                                                {{ $f->category->name }}
                                            </span>
                                        @else
                                            <span class="text-muted">Nema kategoriju</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <span class="fw-bold">{{$f->price}} RSD</span>
                                    </td>
                                    <td class="align-middle">
                                        @if($f->description)
                                            <small class="text-muted">
                                                {{ Str::limit($f->description, 50) }}
                                            </small>
                                        @else
                                            <span class="text-muted">Nema opisa</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('food.show', $f->id) }}" 
                                               class="btn btn-sm btn-outline-info" 
                                               title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('food.edit', $f->id) }}" 
                                               class="btn btn-sm btn-outline-warning" 
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" 
                                                    class="btn btn-sm btn-outline-danger" 
                                                    title="Delete"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#deleteModal{{ $f->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal{{ $f->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Potvrdi brisanje</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Da li si siguran da zelis obrisati ovaj proizvod? <strong>{{ $f->name }}</strong>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('food.destroy', $f->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Obrisi</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        
    @endif
</div>
@endsection

@section('styles')
<style>
    .table th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        border-top: none;
    }
    
    .table td {
        vertical-align: middle;
        padding: 1rem 0.75rem;
    }
    
    .btn-group .btn {
        border-radius: 0.25rem !important;
        margin: 0 2px;
    }
    
    .badge {
        font-size: 0.75em;
        padding: 0.35em 0.65em;
    }
</style>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-dismiss alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    });
</script>
@endpush