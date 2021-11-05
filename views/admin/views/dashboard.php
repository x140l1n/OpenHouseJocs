<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    //Import the head.
    require("partials/head.php");
    ?>
    <title>Dashboard - Panel Admin</title>
</head>

<body class="vh-100">
    <?php
    //Import the head.
    require("partials/navbar.php");
    ?>
    <div class="container-fluid d-flex container-wrapper h-100">
        <?php
            //Import the sidebar.
            require("partials/sidebar.php");
        ?>
        <main class="p-2 w-100 h-100 p-4">
            <span class="text-uppercase fw-bold fs-4">Dashboard</span>
        </main>
    </div>
    <script type="text/javascript" src="../assets/js/functions.js"></script>
</body>

</html>