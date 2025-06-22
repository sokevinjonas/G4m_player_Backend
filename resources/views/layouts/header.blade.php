<header id="header" class="header fixed-top d-flex align-items-center">

  <!-- Logo et bouton menu -->
  <div class="d-flex align-items-center justify-content-between">
    <a href="{{ route('welcome_admin') }}" class="logo d-flex align-items-center">
      <img src="{{ asset('assets/img/logo.png') }}" alt="">
      <span class="d-none d-lg-block">{{ env('APP_NAME', 'G4M Player') }}</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div>

  <!-- Navigation droite -->
  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <!-- Notifications (si utile à terme) -->
      <li class="nav-item dropdown">
        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-bell"></i>
          <span class="badge bg-primary badge-number">0</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
          <li class="dropdown-header">
            Aucune notification
          </li>
        </ul>
      </li>

      <!-- Profil utilisateur -->
      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
          <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->nom }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header text-center">
            <h6>{{ Auth::user()->nom }}</h6>
            <span>{{ ucfirst(Auth::user()->role->value ?? 'Admin') }}</span>
          </li>
          <li><hr class="dropdown-divider"></li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <i class="bi bi-person"></i>
              <span>Mon Profil</span>
            </a>
          </li>
          <li><hr class="dropdown-divider"></li>

          <li>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="dropdown-item d-flex align-items-center" type="submit">
                <i class="bi bi-box-arrow-right"></i>
                <span>Déconnexion</span>
              </button>
            </form>
          </li>
        </ul>
      </li>

    </ul>
  </nav>

</header>