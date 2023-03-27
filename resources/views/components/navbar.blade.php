<nav class="navbar navbar-expand-lg bg-success p-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">MaPresto</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('announcements.index')}}">Annunci</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorie</a>
            <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                @foreach ($categories as $category)
                    <li><a class="dropdown-item" href="{{route('categoryShow', compact('category'))}}">{{($category->name)}}</a></li>
                @endforeach
            </ul>
          </li>
          @guest
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Account 
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
              <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{route('announcements.create')}}">Crea Annuncio</a>
          </li>
          @if (Auth::user()->is_revisor)
            <li class="nav-item" >
              <a class="nav-link btn btn-outline-success btn-sm position-relative" aria-current="page" href="{{route('revisor.index')}}">
                Area Revisore <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  {{App\Models\Announcement::toBeRevisionedCount()}}
                  <span class="visually-hidden">unread messages</span>
                </span>
              </a>
            </li>
          @endif
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Benvenuto: {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#" onclick="event.preventDefault();document.querySelector('#logout-form').submit();">Logout</a></li>
              <form id="logout-form" class="d-none" method="POST" action="{{route('logout')}}">
                @csrf
              </form>
            </ul>
          </li>
          @endguest
          <li class="nav-item">
            <x-_locale lang="it" />
          </li>
          <li class="nav-item">
            <x-_locale lang="en" />
          </li>
          <li class="nav-item">
            <x-_locale lang="de" />
          </li>
        </ul>
      </div>
    </div>
  </nav>