@extends('layouts.app')
@section('title', 'Ajouter un Jeu')
@section('pageTitle')
<h1>Ajouter un Jeu</h1>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome_admin') }}">Tableau de Board</a></li>
        <li class="breadcrumb-item"><a href="{{ route('games.index') }}">Jeux</a></li>
        <li class="breadcrumb-item active">Ajouter</li>
    </ol>
</nav>
@endsection

@section('content')
@include('layouts.messages_flash')
<div class="container-fluid">
    <div class="row">
        {{-- @dump($errors->all()) --}}
        <!-- Formulaire Jeu -->
        <div class="col-lg-7">
            <div class="card mb-4 shadow-sm border-0 rounded-4 mt-3">
                <div class="card-body p-4">
                    <form id="gameForm" action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom du jeu <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name" required>
                            @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="type_game_id" class="form-label">Type de jeu <span class="text-danger">*</span></label>
                            <select class="form-control" id="type_game_id" name="type_game_id" required>
                                <option value="">Sélectionner</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}" {{ old('type_game_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                @endforeach
                            </select>
                            @error('type_game_id')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo (Image) <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="logo" name="logo" value="{{ old('logo') }}" accept="image/*">
                            @error('logo')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contacts</label>
                            <div id="contacts-list">
                                <div class="input-group mb-2">
                                    <input type="text" name="contact_link[0][type]" class="form-control" value="{{ old('contact_link.0.type') }}" placeholder="Type (ex: Discord)">
                                    <input type="text" name="contact_link[0][url]" class="form-control" value="{{ old('contact_link.0.url') }}" placeholder="Lien">
                                    <button type="button" class="btn btn-outline-secondary add-contact">+</button>
                                </div>
                                @error('contact_link.0.type')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                                @error('contact_link.0.url')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" id="submitBtn" class="btn btn-success">
                            <span id="spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            Enregistrer le jeu
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Formulaire Type de Jeu -->
        <div class="col-lg-5">
            <div class="card mb-4 shadow-sm border-0 rounded-4 mt-3">
                <div class="card-body p-4">
                    <form action="{{ route('types_games.store') }}" method="POST" id="typeGameForm">
                        @csrf
                        <div class="mb-3">
                            <label for="type_name" class="form-label">Nouveau type de jeu <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="type_name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter le type</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JS pour contacts dynamiques et spinner -->
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

    document.getElementById('gameForm').addEventListener('submit', function() {
        document.getElementById('spinner').classList.remove('d-none');
        document.getElementById('submitBtn').setAttribute('disabled', 'disabled');
    });
</script>
@endsection