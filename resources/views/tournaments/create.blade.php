@extends('layouts.app')
@section('title', 'Créer une Compétition')
@section('pageTitle')
<h1>Créer une Compétition</h1>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome_admin') }}">Tableau de Board</a></li>
        <li class="breadcrumb-item"><a href="{{ route('competitions.index') }}">Compétitions</a></li>
        <li class="breadcrumb-item active">Créer</li>
    </ol>
</nav>
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card shadow-sm border-0 rounded-4">
    <div class="card-body">
        <form action="{{ route('competitions.store') }}" method="POST" id="competitionForm">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="game_id" class="form-label">Jeu</label>
                    <select name="game_id" id="game_id" class="form-control" required>
                        <option value="">Sélectionner</option>
                        @foreach($games as $game)
                            <option value="{{ $game->id }}" {{ old('game_id') == $game->id ? 'selected' : '' }}>{{ $game->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="date" class="form-label">Date & Heure</label>
                    <input type="datetime-local" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="mode" class="form-label">Mode</label>
                    <select name="mode" id="mode" class="form-control">
                        <option value="">--</option>
                        <option value="solo" {{ old('mode') == 'solo' ? 'selected' : '' }}>Solo</option>
                        <option value="duo" {{ old('mode') == 'duo' ? 'selected' : '' }}>Duo</option>
                        <option value="squad" {{ old('mode') == 'squad' ? 'selected' : '' }}>Squad</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="status" class="form-label">Statut</label>
                    <input type="text" name="status" id="status" class="form-control" value="upcoming" disabled>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="is_online" class="form-label">En ligne ?</label>
                    <select name="is_online" id="is_online" class="form-control" required>
                        <option value="1" {{ old('is_online') == '1' ? 'selected' : '' }}>Oui</option>
                        <option value="0" {{ old('is_online') == '0' ? 'selected' : '' }}>Non</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="location" class="form-label">Lieu (si hors ligne)</label>
                    <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="reward" class="form-label">Récompense</label>
                    <input type="text" name="reward" id="reward" class="form-control" value="{{ old('reward') }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Règles (une par ligne)</label>
                    <textarea name="rules[]" class="form-control" rows="2" placeholder="Règle 1">{{ old('rules.0') }}</textarea>
                    <textarea name="rules[]" class="form-control mt-2" rows="2" placeholder="Règle 2">{{ old('rules.1') }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Contacts</label>
                    <div id="contacts-list">
                        <div class="input-group mb-2">
                            <input type="text" name="contact_link[0][type]" class="form-control" placeholder="Type (ex: Discord)">
                            <input type="text" name="contact_link[0][url]" class="form-control" placeholder="Lien">
                            <button type="button" class="btn btn-outline-secondary add-contact">+</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" id="submitBtn" class="btn btn-success">
                <span id="spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                Enregistrer
            </button>
        </form>
    </div>
</div>
<script>
    let contactIndex = 1;
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('add-contact')) {
            e.preventDefault();
            const contactsList = document.getElementById('contacts-list');
            const div = document.createElement('div');
            div.className = 'input-group mb-2';
            div.innerHTML = `
                <input type="text" name="contact_link[${contactIndex}][type]" class="form-control" placeholder="Type (ex: Discord)">
                <input type="text" name="contact_link[${contactIndex}][url]" class="form-control" placeholder="Lien">
                <button type="button" class="btn btn-outline-danger remove-contact">-</button>
            `;
            contactsList.appendChild(div);
            contactIndex++;
        }
        if (e.target.classList.contains('remove-contact')) {
            e.preventDefault();
            e.target.closest('.input-group').remove();
        }
    });

    document.getElementById('competitionForm').addEventListener('submit', function() {
        document.getElementById('spinner').classList.remove('d-none');
        document.getElementById('submitBtn').setAttribute('disabled', 'disabled');
    });
</script>
@endsection