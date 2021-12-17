<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <div class="container-fluid">

    <a class="navbar-brand" href="/OpenHouseJocs/views/landingPage/index.php">
      <img id="logo" src="/OpenHouseJocs/media/landingPage/logo.png" alt="" width="200" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">

        <p class="pt-2 pr-2">
          <span class="adminIcon">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
              <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
            </svg>
          </span>

        </p>

        <li class="nav-item dropdown mx-2">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Idiomas
          </a>
          <ul id="nav-dropdown" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

            <li><a class="dropdown-item" href="?dummy=cat#cat" data-reload>Catalá</a></li>
            <li><a class="dropdown-item" href="?dummy=es#es" data-reload>Castellano</a></li>
            <li><a class="dropdown-item" href="?dummy=en#en" data-reload>English</a></li>
          </ul>
        </li>
        <div class="form-check form-switch form-switch-md pt-2" style="padding-left: 0;">
          <div class="form-switch-wrap position-relative float-end">
            <input class="form-check-input my-auto mx-auto" type="checkbox" id="switchDarkMode" checked />
            <i class="fas text-light"></i>
          </div>
        </div>
      </ul>
    </div>

  </div>

</nav>