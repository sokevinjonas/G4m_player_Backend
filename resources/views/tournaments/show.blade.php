@extends('layouts.app')
@section('title', $competition->title)
@push('styles')
  <style>
    .avatar-placeholder {
      font-weight: bold;
      font-size: 1.1rem;
      text-transform: uppercase;
    }
  </style>
@endpush
@section('pageTitle')
<h1>{{ $competition->title }}</h1>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('welcome_admin') }}">Tableau de Bord</a></li>
    <li class="breadcrumb-item"><a href="{{ route('competitions.index') }}">Compétitions</a></li>
    <li class="breadcrumb-item active">{{ $competition->title }}</li>
  </ol>
</nav>
@endsection

@section('content')
<div class="card shadow border-0 rounded-4 mb-4">
  <div class="card-body">
    {{-- Jeu lié --}}
    <div class="d-flex align-items-center mb-4">
      @if($competition->game && $competition->game->logo)
        <img src="{{ asset($competition->game->logo) }}" alt="{{ $competition->game->name }}" class="rounded-circle border border-2 shadow-sm me-3" width="60" height="60" style="object-fit:cover;">
      @endif
      <div>
        <h3 class="mb-0">{{ $competition->title }}</h3>
        <span class="text-muted fs-6"><i class="bi bi-controller"></i> {{ $competition->game?->name }}</span>
      </div>
    </div>

    {{-- Badges d'infos --}}
    <div class="mb-3">
      <span class="badge bg-info me-1">{{ $competition->game?->name }}</span>
      @if($competition->mode)
        <span class="badge bg-secondary me-1">{{ ucfirst($competition->mode) }}</span>
      @endif
      <span class="badge bg-{{ $competition->status === 'upcoming' ? 'info' : ($competition->status === 'ongoing' ? 'warning' : ($competition->status === 'completed' ? 'success' : 'danger')) }} me-1">
        {{ ucfirst($competition->status) }}
      </span>
      <span class="badge bg-light text-dark me-1">
        {{ $competition->is_online ? 'En ligne' : 'Présentiel' }}
      </span>
      <span class="badge bg-primary"><i class="bi bi-calendar-event"></i> {{ \Carbon\Carbon::parse($competition->date)->format('d/m/Y H:i') }}</span>
    </div>

    {{-- Lieu et récompense --}}
    <div class="mb-3">
      @if(!$competition->is_online && $competition->location)
        <span class="me-3"><i class="bi bi-geo-alt"></i> <strong>Lieu :</strong> {{ $competition->location }}</span>
      @endif
      @if($competition->reward)
        <span><i class="bi bi-gift"></i> <strong>Récompense :</strong> {{ $competition->reward }}</span>
      @endif
    </div>

    {{-- Description --}}
    @if($competition->description)
    <div class="mb-4">
      <strong>Description :</strong>
      <div class="border rounded-3 p-3 bg-light mt-1">{{ $competition->description }}</div>
    </div>
    @endif

    {{-- Règles --}}
    @if($competition->rules)
    <div class="mb-4">
      <strong>Règles :</strong>
      <ul class="list-group list-group-flush mt-1">
        @foreach(json_decode($competition->rules, true) as $rule)
          <li class="list-group-item"><i class="bi bi-check-circle text-success me-2"></i>{{ $rule }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    {{-- Contacts --}}
    @if($competition->contact_link)
    <div class="mb-4">
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

    {{-- Participants --}}
    <div class="mb-4">
      <h5 class="mt-4 mb-3">Participants ({{ $competition->players->count() }})</h5>
      @if($competition->players->isEmpty())
        <p class="text-muted">Aucun joueur inscrit pour le moment.</p>
      @else
        <div class="table-responsive">
          <table class="table table-hover align-middle">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Joueur</th>
                <th>Email</th>
                <th>Points</th>
                <th>Badges</th>
              </tr>
            </thead>
            <tbody>
              @foreach($competition->players as $index => $player)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td class="d-flex align-items-center">
                  {{-- Avatar ou initiales --}}
                  @if(isset($player->avatar) && $player->avatar)
                    <img src="{{ asset($player->avatar) }}" alt="{{ $player->name }}" class="rounded-circle me-2" width="36" height="36" style="object-fit:cover;">
                  @else
                    <span class="avatar-placeholder rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center me-2" style="width:36px;height:36px;">
                      {{ strtoupper(substr($player->name,0,1)) }}
                    </span>
                  @endif
                  {{ $player->name }}
                </td>
                <td>{{ $player->email }}</td>
                <td>
                  <span class="badge bg-primary fs-6">{{ $player->pivot->points ?? 0 }}</span>
                </td>
                <td>
                  @if($player->badges && count($player->badges))
                    @foreach($player->badges as $badge)
                      <span class="badge bg-success me-1">{{ $badge->name }}</span>
                    @endforeach
                  @else
                    <span class="text-muted">Aucun</span>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>

    <a href="{{ route('competitions.index') }}" class="btn btn-outline-secondary mt-3">
      <i class="bi bi-arrow-left"></i> Retour à la liste
    </a>
  </div>
</div>

@endsection
