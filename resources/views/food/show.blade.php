@extends('layouts.public')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Proizvod detaljno</h4>
                        <div class="btn-group">
                            <a href="{{ route('food.index') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Povratak
                            </a>
                            <a href="{{ route('food.edit', $food->id) }}" class="btn btn-outline-warning btn-sm">
                                <i class="fas fa-edit"></i> Izmena
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="h4 mb-3">{{ $food->name }}</h2>
                            
                            <div class="mb-4">
                                <h5 class="h6 text-muted mb-2">Opis</h5>
                                @if($food->description)
                                    <p class="mb-0">{{ $food->description }}</p>
                                @else
                                    <p class="text-muted fst-italic mb-0">Nema opisa</p>
                                @endif
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <h5 class="h6 text-muted mb-2">Kategorija</h5>
                                    @if($food->category)
                                        <span class="badge bg-primary fs-6">
                                            {{ $food->category->name }}
                                        </span>
                                    @else
                                        <span class="text-muted">Bez kategorije</span>
                                    @endif
                                </div>
                                
                                <div class="col-sm-6 mb-3">
                                    <h5 class="h6 text-muted mb-2">Cena</h5>
                                    <div class="d-flex align-items-center">
                                        <span class="fs-4 fw-bold text-success">
                                            {{$food->price}} 
                                        </span>
                                        <span class="text-muted ms-2 fs-6">RSD</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h5 class="h6 text-muted mb-3">Informacije {{$food->name}}</h5>
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2">
                                            <i class="fas fa-hashtag text-secondary me-2"></i>
                                            <strong>ID:</strong> 
                                            <span class="text-muted">#{{ $food->id }}</span>
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-calendar text-secondary me-2"></i>
                                            <strong>Kreirano:</strong> 
                                            <span class="text-muted">
                                                {{ $food->created_at->format('M d, Y') }}
                                            </span>
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-clock text-secondary me-2"></i>
                                            <strong>Azurirano:</strong> 
                                            <span class="text-muted">
                                                {{ $food->updated_at->format('M d, Y') }}
                                            </span>
                                        </li>
                                        @if($food->created_at != $food->updated_at)
                                        <li class="mb-2">
                                            <i class="fas fa-sync text-secondary me-2"></i>
                                            <strong>Poslednje azurirano:</strong> 
                                            <span class="text-muted">
                                                {{ $food->updated_at->diffForHumans() }}
                                            </span>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Delete Button -->
                            <div class="mt-3">
                                <button type="button" 
                                        class="btn btn-outline-danger btn-sm w-100" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#deleteModal">
                                    <i class="fas fa-trash me-2"></i>Obrisi proizvod
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                  </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">
                    <i class="fas fa-exclamation-triangle me-2"></i>Confirm Deletion
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>You are about to delete <strong>"{{ $food->name }}"</strong>. This action is permanent and cannot be undone.</p>
                <p class="text-muted mb-0">All associated data will be permanently removed from the system.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('food.destroy', $food->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Delete Permanently
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .card {
        border: none;
        border-radius: 10px;
    }
    
    .card-header {
        border-bottom: 2px solid #f8f9fa;
    }
    
    .card-footer {
        border-top: 2px solid #f8f9fa;
    }
    
    .badge {
        font-size: 0.9em;
        padding: 0.5em 1em;
    }
    
    .list-unstyled li {
        padding: 0.25rem 0;
    }
    
    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: white;
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
        
        // Focus management for accessibility
        const deleteModal = document.getElementById('deleteModal');
        if (deleteModal) {
            deleteModal.addEventListener('shown.bs.modal', function () {
                this.querySelector('.btn-danger').focus();
            });
        }
    });
</script>
@endpush
