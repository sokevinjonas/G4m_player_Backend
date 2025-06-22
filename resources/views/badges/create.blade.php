@extends('layouts.app')
@section('title', 'Créer un Badge')
@section('pageTitle')
<h1>Créer un Badge</h1>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('badges.index') }}">Badges</a></li>
        <li class="breadcrumb-item active">Créer</li>
    </ol>
</nav>
@endsection

@section('content')
@include('layouts.messages_flash')
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
        <form action="{{ route('badges.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nom du badge <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" placeholder="Entrez le nom du badge Ex: Badge de participation" class="form-control" required value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="icon" class="form-label">Icône (image <span class="text-danger">*</span>)</label>
                <input type="file" name="icon" id="icon" class="form-control" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" placeholder="Entrez une description">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="grade" class="form-label">Grade <span class="text-danger">*</span></label>
                <select name="grade" id="grade" class="form-control" required>
                    <option value="">Sélectionner un grade</option>
                    <option value="Bronze" {{ old('grade') == 'Bronze' ? 'selected' : '' }}>Bronze</option>
                    <option value="Silver" {{ old('grade') == 'Silver' ? 'selected' : '' }}>Silver</option>
                    <option value="Gold" {{ old('grade') == 'Gold' ? 'selected' : '' }}>Gold</option>
                    <option value="Platinum" {{ old('grade') == 'Platinum' ? 'selected' : '' }}>Platinum</option>
                    <option value="Diamond" {{ old('grade') == 'Diamond' ? 'selected' : '' }}>Diamond</option>
                    <option value="Crown" {{ old('grade') == 'Crown' ? 'selected' : '' }}>Crown</option>
                    <option value="Ace" {{ old('grade') == 'Ace' ? 'selected' : '' }}>Ace</option>
                    <option value="Ace Master" {{ old('grade') == 'Ace Master' ? 'selected' : '' }}>Ace Master</option>
                    <option value="Ace Dominator" {{ old('grade') == 'Ace Dominator' ? 'selected' : '' }}>Ace Dominator</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="is_active" class="form-label">Actif ? <span class="text-danger">*</span></label>
                <select name="is_active" id="is_active" class="form-control" required>
                    <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>Oui</option>
                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Non</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Critères de déblocage <span class="text-danger">*</span></label>
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <input type="number" min="0" name="required_points" class="form-control" placeholder="Le nombre de points" value="{{ old('required_points') }}">
                        @error('required_points')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            
                        @enderror
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="number" min="0" name="required_wins" placeholder="Le nombre de victoires" class="form-control" value="{{ old('required_wins') }}">
                        @error('required_wins')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="number" min="0" name="required_participations" placeholder="Le nombre de participations" class="form-control" value="{{ old('required_participations') }}">
                        @error('required_participations')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-2">
                        <input type="number" min="0" name="required_top3" placeholder="Le nombre de top 3" class="form-control" value="{{ old('required_top3') }}">
                        @error('required_top3')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">
                <span id="spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                Enregistrer le badge
            </button>
        </form>
    </div>
</div>
<script>
    document.querySelector('form').addEventListener('submit', function() {
        document.getElementById('spinner').classList.remove('d-none');
    });
</script>
@endsection