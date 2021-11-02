<?php 

session_start();

if (isset($_SESSION['id'])) {
    header("Location: dashboard.php");
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" coadd ntent="width=device-width, initial-scale=1.0">
    <?php
    //Import links.
    require("./partials/links.html");
    ?>
    <title>Login - Panel Admin</title>
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
                            <i class="fas text-light"></i>
                        </div>
                    </div>
                </div>
                <div class="flex-fill d-flex flex-column">
                    <div class="my-auto">
                        <div class="row col mb-4">
                            <div class="d-flex justify-content-center">
                                <img src="../../media/admin/logo.png" class="logo me-2 my-auto" />
                                <span class="fs-5 fw-bold title">Panel administración <br>OpenHouseJocs</span>
                            </div>
                            <small class="fw-bold text-center mt-5">Rellena todos los campos para acceder.</small>
                        </div>
                        <div class="row col">
                            <form>
                                <div class="form-floating mb-3">
                                    <input type="input-email" class="form-control" id="input-email" placeholder="Email" error-label="#email-error" required>
                                    <label for="email">Email</label>
                                    <span id="email-error" class="form-text text-danger invisible">Error.</span>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="form-floating flex-grow-1">
                                        <input type="password" class="form-control input-password" id="input-password" placeholder="Contraseña" error-label="#password-error" required>
                                        <label for="input-password">Contraseña</label>
                                    </div>
                                    <span class="input-group-text" id="toggle-password" input-toggle="#input-password"><i class="fas fa-eye"></i></span>
                                    <span id="password-error" class="form-text text-danger invisible w-100">Error.</span>
                                </div>
                                <span id="message-error" class="fw-bold text-danger">Ha ocurrido un error inesperado.</span>
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
    <script type="text/javascript" src="assets/js/functions.js"></script>
    <script type="text/javascript" src="assets/js/login.js"></script>
</body>

</html>