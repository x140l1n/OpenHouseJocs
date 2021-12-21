<?php
require_once("backend/constants.php");
require_once("backend/database.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["id_user"]) && !isset($_SESSION["id_cycle"]) ) {
  header("Location: ../../views/gameSelect/gameSelect.php");
}

$id_user = $_SESSION["id_user"];
$id_cycle = $_SESSION["id_cycle"];

$db = new Database();

//Check space invaders
$stat = $db->connect()->prepare("SELECT * FROM user_game_cycle WHERE id_user = :id_user AND id_game = 1");
$stat->bindParam(":id_user", $id_user);
$stat->execute();

if ($stat->rowCount() == 0) {
  header("Location: ../../views/gameSelect/gameSelect.php");
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="shortcut icon" href="img/icono.png" type="image/x-icon" />
    <title>Space Invaders</title>
  </head>
  <body>
    <!--INTERFAZ DEL JUEGO-->
    <div class="juego" id="juego" style="display: none">
      <h2 id="resultados" class="resultados">0</h2>
      <div class="grid"></div>
    </div>
    <!--INTERFAZ DEL MENÚ-->
    <div class="menu" id="menu" style="display: flex">
      <div class="gridMenu">
        <div class="titolMenu">
          <h1>
            <span data-z data-z-event="pointer">Space</span><br />
            <span data-z data-z-event="pointer">Invaders</span>
          </h1>
        </div>
        <div class="menuButtons">
          <button id="jugar" class="botoJugar1">Jugar</button>
          <button id="controls" class="botoJugar2">Controls</button>
          <button id="ranking" class="botoJugar3">Ranking</button>
          <button id="gameSelect" class="botoJugar4">Tornar al menú</button>
        </div>
      </div>
    </div>
    <!--INTERFAZ DEL RANKING-->
    <div class="rankingMenu" id="rankingMenu" style="display: none">
      <div class="gridMenu">
        <div class="titolMenu">
          <h1>
            <span data-z data-z-event="pointer">Ranking</span>
          </h1>
        </div>
        <div class="rankingList" id="rankingList"></div>
        <div class="menuButtons">
          <button id="inici" class="botoJugar" style="margin-bottom: 30px">
            INICI
          </button>
        </div>
      </div>
    </div>
    <!--INTERFAZ DEL MENU DE INSTRUCCIONES-->
    <div class="controles" id="controles" style="display: none">
      <div class="gridMenu">
        <div class="titolMenu">
          <h1>
            <span data-z data-z-event="pointer">Controls</span>
          </h1>
        </div>
        <div class="imatgeControls">
          <img src="img/controles.png" alt="Controles" />
        </div>
        <div class="menuButtons">
          <button id="inici2" class="botoJugar" style="margin-bottom: 30px">
            INICI
          </button>
        </div>
      </div>
    </div>
    <!--HAS GUANYAT!-->
    <div class="hasGuanyat" id="hasGuanyat" style="display: none">
      <div class="gridMenu">
        <div class="titolGuanyat">
          <h1>
            <span data-z data-z-event="none">Has guanyat!</span><br>
            <span data-z data-z-event="none" class="puntuacioGuanyat" id="puntuacioGuanyat"></span>
          </h1>
        </div>
        <div class="imatgeControls">
          <h3 id="titolCicle"></h3><br>
          <p id="descripcioCicle"></p>
        </div>
        <div class="menuButtons">
          <button id="inici3" class="botoJugar" style="margin-bottom: 30px">
            INICI
          </button>
        </div>
      </div>
    </div>

    <!--GAME OVER-->
    <div class="gameOver" id="gameOver" style="display: none">
      <div class="gridMenu">
        <div class="titolPerdut">
          <h1>
            <span data-z data-z-event="none">Game Over</span><br>
            <span data-z data-z-event="none" class="puntuacioPerdut" id="puntuacioPerdut"></span>
          </h1>
        </div>
        <div class="menuButtons">
          <button id="inici4" class="botoJugar" style="margin-bottom: 30px">
            INICI
          </button>
        </div>
      </div>
    </div>
    <script src="js/sweetalert2@11.js"></script>
    <script src="js/ztext.min.js"></script>
    <script src="js/api.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
