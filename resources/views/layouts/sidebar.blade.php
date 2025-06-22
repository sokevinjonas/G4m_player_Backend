<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="{{ route('welcome_admin') }}">
        <i class="bi bi-grid"></i>
        <span>Tableau de Bord</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('clients_par_compartiment') }}">
        <i class="bi bi-people"></i>
        <span>Clients</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('prise-mesures.create') }}">
        <i class="bi bi-rulers"></i>
        <span>Prises de mesures</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('employes.index') }}">
        <i class="bi bi-person-badge"></i>
        <span>Employés / Couturiers</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="commandes.html">
        <i class="bi bi-bag-check"></i>
        <span>Commandes</span>
      </a>
    </li>

    {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="tenues.html">
        <i class="bi bi-scissors"></i>
        <span>Tenues</span>
      </a>
    </li> --}}

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('articles.index') }}">
        <i class="bi bi-scissors"></i>
        <span>Articles</span>
      </a>
    </li>

    {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="tissus.html">
        <i class="bi bi-palette"></i>
        <span>Tissus</span>
      </a>
    </li> --}}

    <li class="nav-item">
      <a class="nav-link collapsed" href="ventes.html">
        <i class="bi bi-chat-left-text me-1"></i>
        <span>Avis & Retours</span>
      </a>
    </li>

    {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="caisses.html">
        <i class="bi bi-cash-coin"></i>
        <span>Gestion de Caisse</span>
      </a>
    </li> --}}

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('state') }}">
        <i class="bi bi-bar-chart-line"></i>
        <span>Rapport</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="notifications.html">
        <i class="bi bi-bell"></i>
        <span>Notifications</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-pc-display-horizontal"></i><span>Paramètres</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="settings-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('compartiments.index') }}">
            <i class="bi bi-circle"></i><span>Gestion Compartiments</span>
          </a>
        </li>
        <li>
          <a href="{{ route('types-mesures.index') }}">
            <i class="bi bi-circle"></i><span>Gestion des Types de Mesure</span>
          </a>
        </li>
        <li>
          <a href="equipments-stock.html">
            <i class="bi bi-circle"></i><span>Gestion des Droits d'accès</span>
          </a>
        </li>
      </ul>
    </li>
  </ul>

</aside>
