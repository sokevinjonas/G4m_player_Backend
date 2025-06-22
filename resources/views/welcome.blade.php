@extends('layouts.app')
@section('title', 'Tableau de bord')
@section('pageTitle')
  <h1>Tableau de bord</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Admin</a></li>
      <li class="breadcrumb-item active">Tableau de bord</li>
    </ol>
  </nav>
@endsection

@section('content')
<div class="row">

  <!-- Indicateurs -->
  <div class="col-lg-8">
    <div class="row">

      <!-- Tournois en cours -->
      <div class="col-xxl-4 col-md-6">
        <div class="card info-card sales-card">
          <div class="card-body">
            <h5 class="card-title">Tournois en cours</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-trophy"></i>
              </div>
              <div class="ps-3">
                <h6>3</h6>
                <span class="text-success small pt-1 fw-bold">+1</span> 
                <span class="text-muted small pt-2 ps-1">cette semaine</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Joueurs inscrits -->
      <div class="col-xxl-4 col-md-6">
        <div class="card info-card revenue-card">
          <div class="card-body">
            <h5 class="card-title">Joueurs inscrits</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-controller"></i>
              </div>
              <div class="ps-3">
                <h6>1,240</h6>
                <span class="text-success small pt-1 fw-bold">+5%</span> 
                <span class="text-muted small pt-2 ps-1">ce mois</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Jeux disponibles -->
      <div class="col-xxl-4 col-xl-12">
        <div class="card info-card customers-card">
          <div class="card-body">
            <h5 class="card-title">Jeux disponibles</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-joystick"></i>
              </div>
              <div class="ps-3">
                <h6>6</h6>
                <span class="text-success small pt-1 fw-bold">+2</span> 
                <span class="text-muted small pt-2 ps-1">nouveaux jeux ajoutés</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Top Jeux -->
      <div class="col-12">
        <div class="card top-selling overflow-auto">
          <div class="card-body pb-0">
            <h5 class="card-title">Top Jeux</h5>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th>Jeu</th>
                  <th>Participants</th>
                  <th>Tournois</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>PUBG Mobile</td>
                  <td>540</td>
                  <td>5</td>
                </tr>
                <tr>
                  <td>Call of Duty Mobile</td>
                  <td>410</td>
                  <td>3</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Inscriptions récentes -->
      <div class="col-12">
        <div class="card recent-sales overflow-auto">
          <div class="card-body">
            <h5 class="card-title">Inscriptions récentes</h5>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Joueur</th>
                  <th>Jeu</th>
                  <th>Tournoi</th>
                  <th>Statut</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>#T001</td>
                  <td>Alpha Gaming</td>
                  <td>PUBG</td>
                  <td>WarZone Arena</td>
                  <td><span class="badge bg-success">Confirmé</span></td>
                </tr>
                <tr>
                  <td>#T002</td>
                  <td>Ghost COD</td>
                  <td>COD Mobile</td>
                  <td>Call Clash</td>
                  <td><span class="badge bg-warning">En attente</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Colonne de droite -->
  <div class="col-lg-4">

    <!-- Activité récente -->
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Activité récente</h5>
        <div class="activity">
          <div class="activity-item d-flex">
            <div class="activite-label">Il y a 10 min</div>
            <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
            <div class="activity-content">
              Nouveau joueur inscrit : <b>GamerX</b>
            </div>
          </div>
          <div class="activity-item d-flex">
            <div class="activite-label">Il y a 1h</div>
            <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
            <div class="activity-content">
              Nouvelle compétition <b>"Duel Clash COD"</b> publiée
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Groupes à modérer -->
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Groupes récents</h5>
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Discord - PUBG Elite
            <span class="badge bg-primary rounded-pill">65 membres</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            WhatsApp - Clash Squad
            <span class="badge bg-secondary rounded-pill">42 membres</span>
          </li>
        </ul>
      </div>
    </div>

  </div>

</div>
@endsection