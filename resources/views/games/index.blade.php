@extends('layouts.app')
@section('title', 'Liste des Jeux')
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
<div class="row">
    <div class="col-12 mb-3">
        <a href="{{ route('games.create') }}" class="btn btn-primary">Ajouter un jeu</a>
    </div>
    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="card-body">
                <h5 class="card-title">Liste des Jeux</h5>
                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Logo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($games as $game)
                            <tr>
                                <td>{{ $game->id }}</td>
                                <td>{{ $game->name }}</td>
                                <td>{{ $game->typeGame?->name }}</td>
                                <td>{{ $game->description }}</td>
                                <td>
                                    @if($game->logo)
                                        <img src="{{ $game->logo }}" alt="Logo" width="40">
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection