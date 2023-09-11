<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand" href="#">DifaRifaldi</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link "  href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link "  href="/allPost">Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link "  href="/allRole">Role</a>
          </li>
          <li class="nav-item">
            <a class="nav-link "  href="/allProfile">Data User</a>
          </li>
        
 
          
        </ul>
        <ul class="navbar-nav ms-auto">
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome Back, {{ auth()->user()->username }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/profile"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                  </form>
                 
              </ul>
            </li>
          @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Login
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/loginUser"><i class="bi bi-people"></i> Login User</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/loginAdmin"><i class="bi bi-person-gear"></i> Login Admin</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/user/create"><i class="bi bi-person-add "></i> Buat Akun</a></li>
               
            </ul>
          </li>
         
          @endauth
        </ul>
      </div>
    </div>
  </nav>