@extends('layouts.app')
@section('title', $competition->title)
@section('pageTitle')
<h1>{{ $competition->title }}</h1>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome_admin') }}">Tableau de Board</a></li>
        <li class="breadcrumb-item"><a href="{{ route('competitions.index') }}">Compétitions</a></li>
        <li class="breadcrumb-item active">{{ $competition->title }}</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="card shadow-sm border-0 rounded-4 mb-4">
    <div class="card-body">
        <h3 class="mb-3">{{ $competition->title }}</h3>
        <div class="mb-2">
            <span class="badge bg-info">{{ $competition->game?->name }}</span>
            <span class="badge bg-secondary">{{ ucfirst($competition->mode) }}</span>
            <span class="badge bg-{{ 
                $competition->status === 'upcoming' ? 'info' : 
                ($competition->status === 'ongoing' ? 'warning' : 
                ($competition->status === 'completed' ? 'success' : 'danger')) 
            }}">
                {{ ucfirst($competition->status) }}
            </span>
            <span class="badge bg-light text-dark">
                {{ $competition->is_online ? 'En ligne' : 'Présentiel' }}
            </span>
        </div>
        <p class="text-muted mb-1"><i class="bi bi-calendar-event"></i> {{ \Carbon\Carbon::parse($competition->date)->format('d/m/Y H:i') }}</p>
        @if(!$competition->is_online && $competition->location)
            <p class="mb-1"><i class="bi bi-geo-alt"></i> {{ $competition->location }}</p>
        @endif
        @if($competition->reward)
            <p class="mb-1"><i class="bi bi-gift"></i> <strong>Récompense :</strong> {{ $competition->reward }}</p>
        @endif
        <div class="mb-3">
            <strong>Description :</strong>
            <div class="border rounded-3 p-2 bg-light mt-1">{{ $competition->description }}</div>
        </div>
        @if($competition->rules)
            <div class="mb-3">
                <strong>Règles :</strong>
                <ul class="list-group list-group-flush mt-1">
                    @foreach(json_decode($competition->rules, true) as $rule)
                        <li class="list-group-item">{{ $rule }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if($competition->contact_link)
            <div class="mb-3">
                <strong>Contacts :</strong>
                <ul class="list-group list-group-flush mt-1">
                    @foreach(json_decode($competition->contact_link, true) as $contact)
                        <li class="list-group-item">
                            <i class="bi bi-link-45deg"></i>
                            <strong>{{ $contact['type'] ?? '' }} :</strong>
                            <a href="{{ $contact['url'] ?? '#' }}" target="_blank" class="link-primary text-decoration-underline">Lien</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <a href="{{ route('competitions.index') }}" class="btn btn-outline-secondary mt-3">
            <i class="bi bi-arrow-left"></i> Retour à la liste
        </a>
    </div>
</div>
@endsection