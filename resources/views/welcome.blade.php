@extends('layouts.app')
@section('title', 'Tableau de Board')
@section('pageTitle')
    <h1>Tableau de Board</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Tableau de Board</a></li>
          <li class="breadcrumb-item active">Tableau de Board</li>
        </ol>
      </nav>
@endsection

@section('content')
<div class="row">

  <!-- Indicateurs principaux -->
  <div class="col-lg-8">
    <div class="row">

      <!-- Commandes du jour -->
      <div class="col-xxl-4 col-md-6">
        <div class="card info-card sales-card">
          <div class="card-body">
            <h5 class="card-title">Commandes du jour</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-bag-check"></i>
              </div>
              <div class="ps-3">
                <h6>12</h6>
                <span class="text-success small pt-1 fw-bold">+3</span> 
                <span class="text-muted small pt-2 ps-1">vs hier</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Recette nette -->
      <div class="col-xxl-4 col-md-6">
        <div class="card info-card revenue-card">
          <div class="card-body">
            <h5 class="card-title">Recette nette</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-currency-dollar"></i>
              </div>
              <div class="ps-3">
                <h6>85,000 FCFA</h6>
                <span class="text-success small pt-1 fw-bold">+12%</span> 
                <span class="text-muted small pt-2 ps-1">cette semaine</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Clients actifs -->
      <div class="col-xxl-4 col-xl-12">
        <div class="card info-card customers-card">          
          <div class="card-body">
            <h5 class="card-title">Clients actifs</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-people"></i>
              </div>
              <div class="ps-3">
                <h6>320</h6>
                <span class="text-success small pt-1 fw-bold">+8%</span> 
                <span class="text-muted small pt-2 ps-1">depuis le mois dernier</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Top produits -->
      <div class="col-12">
        <div class="card top-selling overflow-auto">
          <div class="card-body pb-0">
            <h5 class="card-title">Top Tenues</h5>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th>Tenue</th>
                  <th>Prix</th>
                  <th>Commandes</th>
                  <th>Recette</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Robe Wax</td>
                  <td>15,000 FCFA</td>
                  <td>40</td>
                  <td>600,000 FCFA</td>
                </tr>
                <tr>
                  <td>Costume 3 pièces</td>
                  <td>25,000 FCFA</td>
                  <td>25</td>
                  <td>625,000 FCFA</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Commandes récentes -->
      <div class="col-12">
        <div class="card recent-sales overflow-auto">
          <div class="card-body">
            <h5 class="card-title">Commandes récentes</h5>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Client</th>
                  <th>Tenue</th>
                  <th>Montant</th>
                  <th>Statut</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>#0012</td>
                  <td>Aïcha Traoré</td>
                  <td>Robe Wax</td>
                  <td>15,000 FCFA</td>
                  <td><span class="badge bg-success">Livrée</span></td>
                </tr>
                <tr>
                  <td>#0013</td>
                  <td>Yacouba Ouédraogo</td>
                  <td>Costume</td>
                  <td>25,000 FCFA</td>
                  <td><span class="badge bg-warning">En cours</span></td>
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
            <div class="activite-label">Il y a 15 min</div>
            <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
            <div class="activity-content">
              Nouvelle commande de <b>Rokia Diallo</b> (Robe)
            </div>
          </div>
          <div class="activity-item d-flex">
            <div class="activite-label">Il y a 1h</div>
            <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
            <div class="activity-content">
              Paiement en attente pour <b>#0013</b>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Alertes stock -->
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Tissus faibles en stock</h5>
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Wax jaune
            <span class="badge bg-danger rounded-pill">5m</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Satin blanc
            <span class="badge bg-warning rounded-pill">8m</span>
          </li>
        </ul>
      </div>
    </div>

  </div>
</div>
@endsection