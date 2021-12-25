<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }  
      
    if (isset($_SESSION["id"])) {
        header("Location: dashboard.php");
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php 
        //Import the header.
        require("partials/head.php");
    ?>
    <title>Login - Panel Administrador OpenHouseJocs</title>
</head>

<body class="vh-100">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-lg-6 d-none d-lg-block login-background"></div>
            <div class="d-flex flex-column col-lg-6 col-md-12 p-lg-5 py-2">
                <div class="mb-2">
                    <div class="form-check form-switch form-switch-md">
                        <div class="form-switch-wrap position-relative float-end">
                            <input class="form-check-input my-auto mx-auto" type="checkbox" id="switchDarkMode" checked />
                            <i class="fas text-light fa-fw"></i>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column flex-fill">
                    <div class="my-auto">
                        <div class="row col mb-4">
                            <a href="../../landingPage/index.php" class="text-decoration-none">
                                <div class="d-flex justify-content-center">
                                    <img src="../../../media/admin/logo.png" class="logo me-2 my-auto" />
                                    <span class="fs-5 fw-bold title">Panel Administrador <br>OpenHouseJocs</span>
                                </div>
                            </a>
                            <small class="fw-bold text-center mt-5">Rellena todos los campos para acceder.</small>
                        </div>
                        <div class="row col">
                            <form name="form-login" class="text-dark">
                                <div class="form-floating mb-3">
                                    <input type="input-email" class="form-control form-control-border" id="input-email" name="email" placeholder="Email" error-label="#email-error" required>
                                    <label for="input-email">Email</label>
                                    <span id="email-error" class="form-text text-danger invisible">Error.</span>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="form-floating flex-grow-1">
                                        <input type="password" class="form-control form-control-border input-password" id="input-password" name="password" placeholder="Contraseña" required>
                                        <label for="input-password">Contraseña</label>
                                    </div>
                                    <span class="input-group-text toggle-password" name="toggle-password" input-toggle="#input-password"><i class="fas fa-eye fa-fw"></i></span>
                                </div>
                                <span id="message-error" class="fw-bold text-danger invisible">Ha ocurrido un error inesperado.</span>
                                <div class="d-grid mt-3">
                                    <button type="submit" class="btn btn-success text-uppercase text-light">Acceder</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        //Import the scripts js.
        require("partials/scripts.php");
    ?>
    <script type="text/javascript" src="../assets/js/login.js"></script>
</body>

</html>