<!DOCTYPE html>
<html lang="ca">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap.css">
  <link rel="stylesheet" href="landingPage.css">
  <link rel="shortcut icon" href="../../media/iconoPestanya.png" />
  <title>OpenHouseJocs</title>
</head>

<body>
  <?php //Inclueixo la barra de navegació que la hem fet en un arxiu a part (és un global), ja que la utilitzarem per altres pagines i així no hem de duplicar codi.
  include __DIR__ . '../../../components/navbar/navbar.php';
  ?>
  <!--CARROUSEL DE IMAGENES-->
  <div id="carouselExampleIndicators" class="carousel slide no-dark-mode" data-bs-ride="carousel">

      <div class="carousel-indicators no-dark-mode">
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
        <span class="visually-hidden">Tornar</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Següent</span>
      </button>
  </div>

  <!--CARDS INFORMATIVAS-->
  <div class="cards">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
      <div class="col d-flex align-items-stretch">
        
        <div class="card">
        <a href="https://politecnics.barcelona/el-centre/">
          <img src="../../media/landingPage/quiSom.png" class="card-img-top" alt="Representació de l'apartat Qui som.">
          <div class="card-body">
            <h5 class="card-title">Qui som?</h5>
            <p class="card-text">Que es el centre d'estudis politecnics de Barcelona?</p>
          </div>
          </a>
        </div>
      </div>
      <div class="col d-flex align-items-stretch">
          <div class="card">
          <a href="https://politecnics.barcelona/el-centre/projecte-educatiu-de-centre/">
            <img src="../../media/landingPage/frase.png" class="card-img-top" alt="Representació de la metodologia del centre FRASE.">
            <div class="card-body">
              <h5 class="card-title">Projecte educatiu del centre</h5>
              <p class="card-text">T'ensenyem el nostre model d'ensenyament - aprenentatge.</p>
            </div>
            </a>
          </div>
      </div>
      <div class="col d-flex align-items-stretch">
        <div class="card">
        <a href="https://politecnics.barcelona/el-centre/qualitat-al-politecnics/">
          <img src="../../media/landingPage/innovacio.png" class="card-img-top" alt="Innovació.">
          <div class="card-body">
            <h5 class="card-title">Qualitat al politècnics</h5>
            <p class="card-text">Servei de compromís amb una bona acció educativa i garantia d’èxit</p>
          </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!--IMATGE JOC I RUTA AUTH-->
  <div>
    <a href="#" id="../auth/auth" onclick="document.location=this.id+'.php';return false;">
      <img src="../../media/landingPage/jugar.gif" class="img-fluid" alt="Prémer per jugar">
    </a>
  </div>

  <!--FOOTER-->
  <?php
  include __DIR__ . '../../../components/footer/footer.php';
  ?>
  <script src="../../UI/bootstrap-5.0.2/dist/js/bootstrap.js"></script>
  <script src="switch.js"></script>
</body>

</html>