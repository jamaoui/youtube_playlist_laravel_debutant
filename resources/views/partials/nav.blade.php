<nav class="navbar navbar-expand-lg navbar-light bg-light px-2">
    <a class="navbar-brand" href="#">Social network</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link"  href="{{ route('homepage') }}">Accueil</a>
          </li>

          @guest
          <li class="nav-item">
            <a class="nav-link"  href="{{ route('login.show') }}">Se connecter</a>
          </li>
          @endguest
        
            <li class="nav-item">
              <a class="nav-link"  href="{{ route('profiles.index') }}">Tous les profils</a> 
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="{{ route('profiles.create') }}">Ajouter profile</a>
        </li>
                  <li class="nav-item">
            <a class="nav-link"  href="{{ route('publications.index') }}">Publications</a>
        </li>
      </ul>
      @auth
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link"  href="{{ route('publications.create') }}">Ajouter publication</a>
      </li>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    
        <span class="nav-link">{{ auth()->user()->email }}</span>
        <a class="nav-link btn btn-danger"  href="{{ route('login.logout') }}">Déconnexion</a>
      </ul>
      @endauth
    </div>
  </nav>
