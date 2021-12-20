<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
}

if ($_SESSION["id_rol"] != 1 && $_SESSION["id_rol"] != 2) {
    header("Location: logout.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    //Import the head.
    require("partials/head.php");
    ?>
    <title>Dashboard - Panel Administrador OpenHouseJocs</title>
</head>

<body class="h-100">
    <?php
    //Import the header.
    require("partials/navbar.php");
    ?>
    <div class="container-fluid d-flex container-wrapper h-100">
        <?php
        //Import the sidebar.
        require("partials/sidebar.php");
        ?>
        <main class="d-flex flex-column w-100 h-100 p-4">
            <div class="d-flex justify-content-between">
                <span class="text-uppercase fw-bold fs-4">Dashboard</span>
                <button class="btn btn-secondary text-uppercase" id="btn-refresh"><i class="fas fa-sync me-2 fa-fw"></i>Recargar</button>
            </div>
            <div class="my-2 fst-italic text-end" id="last-update-datetime">Última actualización: 17-02-2021 13:36</div>
            <small>Ver estadísticas generales</small>
            <div class="mt-3">
                <span class="fs-6"><i>Total de estudiantes interesados/as en:</i></span>
                <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1 g-2 mt-1">
                    <div class="col d-flex">
                        <div class="card w-100 align-items-stretch rounded-3 bg-danger">
                            <div class="card-body text-center text-light">
                                <h6 class="card-title">Comercio y Marketing</h6>
                                <div class="card-text my-4"><i class="fas fa-lightbulb fa-2x fa-fw"></i></div>
                                <div class="card-footer p-0 border-0 bg-transparent"><span id="count-1">0</span> personas</div>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card w-100 align-items-stretch rounded-3 bg-warning">
                            <div class="card-body text-center text-light">
                                <h6 class="card-title">Informática y Comunicaciones</h6>
                                <div class="card-text my-4"><i class="fas fa-code fa-2x fa-fw"></i></div>
                                <div class="card-footer p-0 border-0 bg-transparent"><span id="count-2">0</span> personas</div>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card w-100 align-items-stretch rounded-3 bg-purple">
                            <div class="card-body text-center text-light">
                                <h6 class="card-title">Hoteleria y Turismo</h6>
                                <div class="card-text my-4"><i class="fas fa-plane fa-2x fa-fw"></i></div>
                                <div class="card-footer p-0 border-0 bg-transparent"><span id="count-3">0</span> personas</div>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card w-100 align-items-stretch rounded-3 bg-success">
                            <div class="card-body text-center text-light text-center">
                                <h6 class="card-title">Administración y Gestión</h6>
                                <div class="card-text my-4"><i class="fas fa-file-invoice-dollar fa-2x fa-fw"></i></div>
                                <div class="card-footer p-0 border-0 bg-transparent"><span id="count-4">0</span> personas</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 d-flex flex-column flex-fill">
                <div class="d-flex justify-content-between">
                    <span class="fs-6"><i>Últimos 20 estudiantes registrados:</i></span>
                    <span class="fs-6"><i><strong>Total de estudiantes registrados:</strong> <span id="total-students"></span></i></span>
                </div>
                <div class="row h-100 mt-3">
                    <div class="col">
                        <div class="card w-100 align-items-stretch bg-info card-480">
                            <div class="card-body">
                                <table class="table table-hover bg-light border-0 m-0 align-middle text-center" id="table-students">
                                    <thead class="bg-turquoise">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nickname</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Apellidos</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Fecha y hora registro</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot class="bg-turquoise position-sticky bottom-0">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nickname</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Apellidos</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Fecha y hora registro</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <?php
        //Import the scripts js.
        require("partials/scripts.php");
    ?>
    <script type="text/javascript" src="../assets/js/dashboard.js"></script>
</body>

</html>