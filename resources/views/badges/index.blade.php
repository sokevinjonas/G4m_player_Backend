@extends('layouts.app')
@section('title', 'Liste des Badges')
@section('pageTitle')
<h1>Liste des Badges</h1>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Badges</li>
    </ol>
</nav>
@endsection

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="mb-3">
    <a href="{{ route('badges.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Nouveau badge
    </a>
</div>
<div class="row">
    @forelse($badges as $badge)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex align-items-stretch">
            <div class="card shadow-sm border-0 rounded-4 w-100">
                @if($badge->icon)
                    <img src="{{ asset($badge->icon) }}" class="card-img-top p-3" alt="{{ $badge->name }}" style="height:120px;object-fit:contain;">
                @endif
                <div class="card-body">
                    <h5 class="card-title mb-1">{{ $badge->name }}</h5>
                    <span class="badge bg-secondary mb-2">{{ $badge->grade }}</span>
                    <p class="card-text text-muted small">{{ $badge->description }}</p>
                    <ul class="list-group list-group-flush mb-2">
                        @if($badge->required_points)
                            <li class="list-group-item">Points requis : <strong>{{ $badge->required_points }}</strong></li>
                        @endif
                        @if($badge->required_wins)
                            <li class="list-group-item">Victoires requises : <strong>{{ $badge->required_wins }}</strong></li>
                        @endif
                        @if($badge->required_participations)
                            <li class="list-group-item">Participations requises : <strong>{{ $badge->required_participations }}</strong></li>
                        @endif
                        @if($badge->required_top3)
                            <li class="list-group-item">Top 3 requis : <strong>{{ $badge->required_top3 }}</strong></li>
                        @endif
                    </ul>
                    <span class="badge bg-{{ $badge->is_active ? 'success' : 'danger' }}">
                        {{ $badge->is_active ? 'Actif' : 'Inactif' }}
                    </span>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info">Aucun badge pour le moment.</div>
        </div>
    @endforelse
</div>
@endsection