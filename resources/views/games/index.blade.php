@extends('layouts.app')
@section('title', 'Liste des Jeux')
@push('styles')
    <style>
        .game-card:hover {
            box-shadow: 0 0.5rem 1.5rem rgba(0,0,0,0.12);
            transform: translateY(-4px) scale(1.02);
            transition: all 0.2s;
        }
    </style>
@endpush
@section('pageTitle')
<h1>Liste des Jeux</h1>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome_admin') }}">Tableau de Board</a></li>
        <li class="breadcrumb-item active">Jeux</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <a href="{{ route('games.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Ajouter un jeu
        </a>
    </div>
</div>
<div class="row">
    @foreach($games as $game)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex align-items-stretch">
            <div class="card shadow-sm border-0 rounded-4 h-100 game-card transition" style="width: 100%;">
                <img src="{{ $game->logo ?? 'https://via.placeholder.com/300x180?text=No+Logo' }}" class="card-img-top rounded-top-4" alt="Logo du jeu" style="height:180px;object-fit:cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title mb-1">{{ $game->name }}</h5>
                    <span class="badge bg-info mb-2" style="width:max-content;">{{ $game->typeGame?->name }}</span>
                    <p class="card-text text-muted small flex-grow-1">{{ Str::limit($game->description, 80) }}</p>
                </div>
                @if($game->contact_link)
                <ul class="list-group list-group-flush">
                    @foreach(json_decode($game->contact_link, true) as $contact)
                        <li class="list-group-item py-2">
                            <i class="bi bi-link-45deg"></i>
                            <strong>{{ $contact['type'] ?? '' }}:</strong>
                            <a href="{{ $contact['url'] ?? '#' }}" target="_blank" class="link-primary text-decoration-underline">Rejoindre</a>
                        </li>
                    @endforeach
                </ul>
                @endif
                <div class="card-body pt-2">
                    <a href="#" class="btn btn-outline-primary w-100">
                        <i class="bi bi-eye"></i> Voir
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection