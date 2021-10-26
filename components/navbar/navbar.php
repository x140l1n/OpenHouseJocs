<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="navbar.css">
  <title>OpenhouseJocsNavbar</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">

      <a class="navbar-brand" href="#">
        <img src="../../media/landingPage/logo.png" alt="" width="200" height="55" class="d-inline-block align-text-top">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            
            <p class="pt-2 pr-2">
              <span class="adminIcon">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                </svg>
              </span>
              
            </p>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Idiomas
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Catalá</a></li>
                <li><a class="dropdown-item" href="#">Español</a></li>
                <li><a class="dropdown-item" href="#">English</a></li>
              </ul>
            </li>
            <div class="form-check form-switch pt-2 pl-2">
              <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
              <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
              <label class="form-check-label" for="flexSwitchCheckChecked">mode</label>
            </div>
          </ul>
      </div>

    </div>
  </nav>

 
</body>

</html>

