    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Iskandar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link {{$active === "Home" ? "active" : ""}}" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{$active === "About" ? "active" : ""}}" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{$active === "Posts" ? "active" : ""}}" href="/posts">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{$active === "Categories" ? "active" : ""}}" href="/categories">Categories</a>
        </li>
      </ul>
      <ul class = "navbar-nav ms-auto">
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome back, {{auth()->user()->name}}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action = "logout" method = "post">
                @csrf
                <button class ="dropdown-item" type="submit" name = "logout"><i class="bi bi-box-arrow-left"></i> Logout</button>
              </form>
            </li>
          </ul>
        </li>
        @endauth
        @guest
        <li class = "nav-item">
          <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>