<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>

<aside class="d-flex flex-column p-3">
    <div class="text-center">
        <span class="text-light fs-5"><i>Bienvenido/a <?php echo $_SESSION["firstname"];?></i></span>
    </div>
    <hr />
    <ul class="nav nav-pills d-flex flex-column flex-fill" id="menu-options">
        <li>
            <a href="dashboard.php" class="nav-link d-flex align-items-center bg-secondary mb-2 text-dark text-uppercase fw-bold">
                <i class="fas fa-th-large fa-fw"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="ranking.php" class="nav-link d-flex align-items-center bg-secondary mb-2 text-dark text-uppercase fw-bold">
                <i class="fas fa-medal fa-fw"></i>
                Ranking
            </a>
        </li>
        <li>
            <a href="users.php" class="nav-link d-flex align-items-center bg-secondary mb-2 text-dark text-uppercase fw-bold">
                <i class="fas fa-users fa-fw"></i>
                Usuarios
            </a>
        </li>
        <li class="mt-auto">
            <a href="logout.php" class="nav-link d-flex align-items-center bg-secondary text-dark text-uppercase fw-bold">
                <i class="fas fa-sign-out-alt fa-fw"></i>
                Cerrar sesión
            </a>
        </li>
    </ul>
</aside>