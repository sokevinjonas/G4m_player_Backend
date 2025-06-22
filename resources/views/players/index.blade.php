@extends('layouts.app')
@section('title', 'Tableau de Board')
@section('pageTitle')
<h1>Liste des Joueurs</h1>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome_admin') }}">Tableau de Board</a></li>
        <li class="breadcrumb-item active">Liste des Joueurs</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="container-fluid">

    @include('layouts.messages_flash')
    
</div>
@endsection