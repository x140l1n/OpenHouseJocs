<?php
require_once("constants.php");
require_once("database.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["id_user"])) {
    header("Location: ../auth/auth.php");
}

if (isset($_POST["select-cycle"])) {
    $_SESSION["id_cycle"] = $_POST["select-cycle"];
}

$id_user = $_SESSION["id_user"];

$db = new Database();
$stat = $db->connect()->prepare("SELECT id_family FROM user_family WHERE id_user = :id_user");
$stat->bindParam(":id_user", $id_user);
$stat->execute();

$ids_families = $stat->fetchAll(PDO::FETCH_COLUMN);

$all_cycles = array();

foreach ($ids_families as  $id_family) {
    $stat = $db->connect()->prepare("SELECT cycle.id, cycle.name, family.name as family FROM cycle INNER JOIN family ON family.id = cycle.id_family WHERE id_family = :id_family");
    $stat->bindParam(":id_family", $id_family);
    $stat->execute();

    foreach ($stat->fetchAll(PDO::FETCH_ASSOC) as $row) {
        array_push($all_cycles, $row);
    }
}

$select = "";
$first_cycle = true;

foreach ($all_cycles as  $cycle) {
    if ($first_cycle && !isset($_POST["select-cycle"])) {
        $_SESSION["id_cycle"] = $cycle["id"];    
        $first_cycle = false;
    }

    $select .= "<option value='" . $cycle["id"] . "'>" . $cycle["name"] . " (" . $cycle["family"] . ")" . "</option>";
}

$stat = $db->connect()->prepare("SELECT nickname FROM user WHERE id = :id_user");
$stat->bindParam(":id_user", $id_user);
$stat->execute();

$nickname = $stat->fetchColumn();

//Check games.
//Check space invaders
$stat = $db->connect()->prepare("SELECT * FROM user_game_cycle WHERE id_user = :id_user AND id_game = 1");
$stat->bindParam(":id_user", $id_user);
$stat->execute();

$space_invaders_enabled = $stat->rowCount() > 0 ? 1 : 0;

//Check doodle jump
$stat = $db->connect()->prepare("SELECT * FROM user_game_cycle WHERE id_user = :id_user AND id_game = 2");
$stat->bindParam(":id_user", $id_user);
$stat->execute();

$doodle_jump_enabled = $stat->rowCount() > 0 ? 1 : 0;

//Check snake
$stat = $db->connect()->prepare("SELECT * FROM user_game_cycle WHERE id_user = :id_user AND id_game = 3");
$stat->bindParam(":id_user", $id_user);
$stat->execute();

$snake_enabled = $stat->rowCount() > 0 ? 1 : 0;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecciín de juegos</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="gameSelect.css">
    <link rel="shortcut icon" href="../../media/iconoPestanya.png" />
</head>

<body>
    <?php
    //navbar global component
    include __DIR__ . '../../../components/navbar/navbar.php';
    ?>
    <div class="mt-sm-4">
        <img class="gSelect_main mx-auto d-block img-fluid" src="../../media/gameSelect/jugar.gif" alt="">
    </div>

    <div class="title">
        <h2>Benvingut/da, <?php echo $nickname; ?></h2>
        <p>Selecciona un cicle</p>
        <form action="gameSelect.php" method="POST">
            <select name="select-cycle" onchange="this.form.submit()">
                <?php echo $select; ?>
            </select>
        </form>
    </div>

    <div class="justify-content-around row d-flex align-items-center">
        <div class="col-sm-12 col-lg-3 gSelect_img">
            <a href="../../games/Arkanoid/index.php"><img class="gSelect_img" src="../../media/gameSelect/arkanoid_gif.gif" alt=""></a>
        </div>

        <?php if ($space_invaders_enabled === 1) { ?>
            <div class="col-sm-12 col-lg-3 gSelect_img">
                <a href="../../games/SpaceInvaders/index.php"><img class="gSelect_img" src="../../media/gameSelect/space_gif.gif"></a>
            </div>
        <?php }

        if ($doodle_jump_enabled === 1) {
        ?>
            <div class="col-sm-12 col-lg-3 gSelect_img">
                <a href="../../games/DoodleJump/doodle.php"><img class="gSelect_img" src="../../media/gameSelect/platform_gif.gif" alt=""></a>
            </div>
        <?php }

        if ($snake_enabled === 1) {
        ?>
            <div class="col-sm-12 col-lg-3 gSelect_img">
                <img class="gSelect_img" src="../../media/gameSelect/snake_gif.gif" alt="">
            </div>
        <?php } ?>
    </div>

    <script src="../../UI/bootstrap-5.0.2/dist/js/bootstrap.js"></script>
    <script src="switch.js"></script>
    <script src="script.js"></script>
</body>

</html>