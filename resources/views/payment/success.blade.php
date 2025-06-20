@extends('frontend.inc.main')

@section('title')
    <title>Réservation Confirmée</title>
@endsection

@section('content')
    <div class="container py-5 text-center">
        <h1 class="text-success mb-4">✅ Paiement Réussi</h1>
        <p class="lead">Merci ! Votre réservation a été confirmée.</p>
        <p>Facture : <strong>{{ $transaction->invoice }}</strong></p>
        <p>Chambre : <strong>{{ $transaction->room->no }}</strong></p>
        <p>Check-in : {{ \Carbon\Carbon::parse($transaction->check_in)->isoFormat('D MMM Y') }}</p>
        <p>Check-out : {{ \Carbon\Carbon::parse($transaction->check_out)->isoFormat('D MMM Y') }}</p>
        <p>Montant total : <strong>MAD {{ $payment->price }}</strong></p>

        <a href="/" class="btn btn-primary mt-4">Retour à l’accueil</a>
    </div>
@endsection
