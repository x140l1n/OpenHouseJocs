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

//Check doodle jump
$stat = $db->connect()->prepare("SELECT * FROM user_game_cycle WHERE id_user = :id_user AND id_game = 2");
$stat->bindParam(":id_user", $id_user);
$stat->execute();

if ($stat->rowCount() == 0) {
  header("Location: ../../views/gameSelect/gameSelect.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Waiting+for+the+Sunrise" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="shortcut icon" href="../../media/iconoPestanya.png" />
    <title>Doodle Jump</title>
</head>

<body>
        <div class="container" id="container">
            <div id="time" class="time"></div>
            <div id="score" class="score"></div>
            <div class="grid" id="grid"></div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/api.js"></script>
    <script type="text/javascript" src="main.js"></script>
    <script type="text/javascript" src="js/display.js"></script>
    <script type="text/javascript" src="js/collision.js"></script>
    <script type="text/javascript" src="js/engine.js"></script>
    <script type="text/javascript" src="js/controller.js"></script>
</body>

</html>