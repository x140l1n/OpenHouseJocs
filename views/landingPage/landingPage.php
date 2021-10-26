<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="landingPage.css">
    <script defer src="../../UI/bootstrap-5.0.2/dist/js/bootstrap.js"></script>
    <link rel="shortcut icon" href="../../media/iconoPestanya.png" />
    <link rel="stylesheet" href="../../components/navbar/navbar.css">
    <title>OpenHouseJocs</title>
</head>
<body>
  <?php
    include __DIR__. '../../../components/navbar/navbar.php';
  ?>
    <!--CARROUSEL DE IMAGENES-->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../../media/carousel/1.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="../../media/carousel/2.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="../../media/carousel/3.png" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    
    <!--CARDS INFORMATIVAS-->
    <div class="cards">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        <div class="col d-flex align-items-stretch">
          <div class="card">
            <img src="../../media/landingPage/quiSom.png" class="card-img-top" alt="Representació de l'apartat Qui som.">
            <div class="card-body">
              <h5 class="card-title">Quim som?</h5>
              <p class="card-text">Que es el centre d'estudis politecnics de Barcelona?</p>
            </div>
          </div>
        </div>
        <div class="col d-flex align-items-stretch">
          <div class="card">
            <img src="../../media/landingPage/frase.png" class="card-img-top" alt="Representació de la metodologia del centre FRASE.">
            <div class="card-body">
              <h5 class="card-title">Projecte educatiu del centre</h5>
              <p class="card-text">T'ensenyem el nostre model d'ensenyament - aprenentatge.</p>
            </div>
          </div>
        </div>
        <div class="col d-flex align-items-stretch">
          <div class="card">
            <img src="../../media/landingPage/innovacio.png" class="card-img-top" alt="Innovació.">
            <div class="card-body">
              <h5 class="card-title">Innovació</h5>
              <p class="card-text">Innovació pedagògica al Centre d'Estudis Politècnics.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!--IMATGE JOC-->
    <div>
      <img src="../../media/landingPage/jugar.gif" class="img-fluid" alt="Prémer per jugar">
    </div>
</body>
</html>