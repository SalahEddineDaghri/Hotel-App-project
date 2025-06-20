@extends('frontend.inc.main')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- En-tête -->
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bold text-primary mb-3">Confirmer votre paiement</h1>
                <div class="d-flex justify-content-center">
                    <div class="w-25 border-top border-3 border-primary"></div>
                </div>
            </div>

            <!-- Carte de réservation -->
            <div class="card border-0 shadow-lg mb-5 overflow-hidden">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0"><i class="fas fa-calendar-check me-2"></i> Détails de la réservation</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-light-primary rounded-circle p-3 me-3">
                                    <i class="fas fa-door-open text-primary fs-4"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-muted">Chambre</p>
                                    <h6 class="mb-0">{{ $room->no }} ({{ $room->type->name }})</h6>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-light-primary rounded-circle p-3 me-3">
                                    <i class="fas fa-user-friends text-primary fs-4"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-muted">Capacité</p>
                                    <h6 class="mb-0">{{ $room->capacity }} personne(s)</h6>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-light-primary rounded-circle p-3 me-3">
                                    <i class="fas fa-tag text-primary fs-4"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-muted">Prix par jour</p>
                                    <h6 class="mb-0">MAD {{ number_format($room->price) }}</h6>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-light-primary rounded-circle p-3 me-3">
                                    <i class="fas fa-sign-in-alt text-primary fs-4"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-muted">Check-in</p>
                                    <h6 class="mb-0">{{ \Carbon\Carbon::parse($data['check_in'])->isoFormat('D MMMM YYYY') }}</h6>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-light-primary rounded-circle p-3 me-3">
                                    <i class="fas fa-sign-out-alt text-primary fs-4"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-muted">Check-out</p>
                                    <h6 class="mb-0">{{ \Carbon\Carbon::parse($data['check_out'])->isoFormat('D MMMM YYYY') }}</h6>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-light-primary rounded-circle p-3 me-3">
                                    <i class="fas fa-receipt text-primary fs-4"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-muted">Prix total</p>
                                    <h4 class="mb-0 text-primary">MAD {{ number_format($data['total_price']) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulaire de paiement -->
            <div class="text-center">
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow">
                        <i class="fas fa-lock me-2"></i> Payer maintenant
                    </button>
                </form>
                
                <p class="text-muted mt-3">
                    <small><i class="fas fa-shield-alt text-primary me-2"></i> Paiement sécurisé SSL</small>
                </p>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-light-primary {
        background-color: rgba(13, 110, 253, 0.1);
    }
    .card {
        border-radius: 15px;
        transition: transform 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .rounded-circle {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<!-- Ajoutez ces liens dans votre layout principal si ce n'est pas déjà fait -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

@endsection