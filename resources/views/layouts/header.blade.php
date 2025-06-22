<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
      <img src="assets/img/logo.png" alt="">
      <span class="d-none d-lg-block">{{ env('APP_NAME') }}</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div>

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <!-- Notifications -->
      <li class="nav-item dropdown">
        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-bell"></i>
          <span class="badge bg-primary badge-number">4</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
          <li class="dropdown-header">
            Vous avez 4 nouvelles notifications
            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Tout voir</span></a>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li class="notification-item">
            <i class="bi bi-exclamation-circle text-warning"></i>
            <div>
              <h4>Commande urgente</h4>
              <p>Une commande doit être livrée demain</p>
              <p>Il y a 30 min</p>
            </div>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li class="dropdown-footer">
            <a href="#">Voir toutes les notifications</a>
          </li>
        </ul>
      </li>

      <!-- Messages -->
      <li class="nav-item dropdown">
        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-chat-left-text"></i>
          <span class="badge bg-success badge-number">3</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
          <li class="dropdown-header">
            Vous avez 3 nouveaux messages
            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Tout voir</span></a>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li class="message-item">
            <a href="#">
              <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
              <div>
                <h4>Client VIP</h4>
                <p>Bonjour, j'aimerais modifier la commande...</p>
                <p>Il y a 4h</p>
              </div>
            </a>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li class="dropdown-footer">
            <a href="#">Voir tous les messages</a>
          </li>
        </ul>
      </li>

      <!-- Profil -->
      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
          <span class="d-none d-md-block dropdown-toggle ps-2">{{ ucfirst(Auth::user()->role->value) }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
          <h6>{{ Auth::user()->nom }}</h6>
          <span>{{ ucfirst(Auth::user()->role->value) }}</span>
          </li>
          <li><hr class="dropdown-divider"></li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
              <i class="bi bi-person"></i>
              <span>Mon Profil</span>
            </a>
          </li>
          <li><hr class="dropdown-divider"></li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
              <i class="bi bi-gear"></i>
              <span>Paramètres</span>
            </a>
          </li>
          <li><hr class="dropdown-divider"></li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
              <i class="bi bi-question-circle"></i>
              <span>Aide</span>
            </a>
          </li>
          <li><hr class="dropdown-divider"></li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <i class="bi bi-box-arrow-right"></i>
              <span>Déconnexion</span>
            </a>
          </li>
        </ul>
      </li>

    </ul>
  </nav>

</header>