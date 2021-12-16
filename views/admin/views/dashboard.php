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
    <title>Dashboard - Panel Administrador OpenHouseJocs</title>
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
        <main class="d-flex flex-column p-2 w-100 h-100 p-4">
            <div class="d-flex justify-content-between">
                <span class="text-uppercase fw-bold fs-4">Dashboard</span>
                <button class="btn btn-secondary text-uppercase"><i class="fas fa-sync me-2 fa-fw"></i>Recargar</button>
            </div>
            <small>Ver estadísticas generales</small>
            <div class="mt-3">
                <span class="fs-6"><i>Total de personas interesados/as en:</i></span>
                <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1 g-2 mt-1">
                    <div class="col d-flex">
                        <div class="card w-100 align-items-stretch rounded-3 bg-danger">
                            <div class="card-body text-center text-light">
                                <h6 class="card-title">Comercio y Marketing</h6>
                                <div class="card-text my-4"><i class="fas fa-lightbulb fa-2x fa-fw"></i></div>
                                <div class="card-footer p-0 border-0 bg-transparent">80 personas</div>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card w-100 align-items-stretch rounded-3 bg-warning">
                            <div class="card-body text-center text-light">
                                <h6 class="card-title">Informática y Comunicaciones</h6>
                                <div class="card-text my-4"><i class="fas fa-code fa-2x fa-fw"></i></div>
                                <div class="card-footer p-0 border-0 bg-transparent">50 personas</div>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card w-100 align-items-stretch rounded-3 bg-purple">
                            <div class="card-body text-center text-light">
                                <h6 class="card-title">Hoteleria y Turismo</h6>
                                <div class="card-text my-4"><i class="fas fa-plane fa-2x fa-fw"></i></div>
                                <div class="card-footer p-0 border-0 bg-transparent">100 personas</div>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card w-100 align-items-stretch rounded-3 bg-success">
                            <div class="card-body text-center text-light text-center">
                                <h6 class="card-title">Administración y Gestión</h6>
                                <div class="card-text my-4"><i class="fas fa-file-invoice-dollar fa-2x fa-fw"></i></div>
                                <div class="card-footer p-0 border-0 bg-transparent">250 personas</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 d-flex flex-column flex-fill">
                <div class="d-flex justify-content-between">
                    <span class="fs-6"><i>Últimos 20 personas registrados:</i></span>
                    <span class="fs-6"><i><strong>Total de personas registrados:</strong> 11</i></span>
                </div>
                <div class="row h-100 mt-3">
                    <div class="col">
                        <div class="card w-100 align-items-stretch bg-info card-480">
                            <div class="card-body">
                                <table class="table table-hover bg-light border-0 m-0 align-middle text-center">
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
                                        <tr>
                                            <td>1</th>
                                            <td>x140l1n</td>
                                            <td>Xiaolin</td>
                                            <td>JinLin</td>
                                            <td>xjinl67@cepnet.net</td>
                                            <td>08/12/2021 20:36:00</td>
                                        </tr>
                                        <tr>
                                            <td>2</th>
                                            <td>x140l1n</td>
                                            <td>Xiaolin</td>
                                            <td>JinLin</td>
                                            <td>xjinl67@cepnet.net</td>
                                            <td>08/12/2021 20:36:00</td>
                                        </tr>
                                        <tr>
                                            <td>3</th>
                                            <td>x140l1n</td>
                                            <td>Xiaolin</td>
                                            <td>JinLin</td>
                                            <td>xjinl67@cepnet.net</td>
                                            <td>08/12/2021 20:36:00</td>
                                        </tr>
                                        <tr>
                                            <td>4</th>
                                            <td>x140l1n</td>
                                            <td>Xiaolin</td>
                                            <td>JinLin</td>
                                            <td>xjinl67@cepnet.net</td>
                                            <td>08/12/2021 20:36:00</td>
                                        </tr>
                                        <tr>
                                            <td>5</th>
                                            <td>x140l1n</td>
                                            <td>Xiaolin</td>
                                            <td>JinLin</td>
                                            <td>xjinl67@cepnet.net</td>
                                            <td>08/12/2021 20:36:00</td>
                                        </tr>
                                        <tr>
                                            <td>6</th>
                                            <td>x140l1n</td>
                                            <td>Xiaolin</td>
                                            <td>JinLin</td>
                                            <td>xjinl67@cepnet.net</td>
                                            <td>08/12/2021 20:36:00</td>
                                        </tr>
                                        <tr>
                                            <td>7</th>
                                            <td>x140l1n</td>
                                            <td>Xiaolin</td>
                                            <td>JinLin</td>
                                            <td>xjinl67@cepnet.net</td>
                                            <td>08/12/2021 20:36:00</td>
                                        </tr>
                                        <tr>
                                            <td>8</th>
                                            <td>x140l1n</td>
                                            <td>Xiaolin</td>
                                            <td>JinLin</td>
                                            <td>xjinl67@cepnet.net</td>
                                            <td>08/12/2021 20:36:00</td>
                                        </tr>
                                        <tr>
                                            <td>9</th>
                                            <td>x140l1n</td>
                                            <td>Xiaolin</td>
                                            <td>JinLin</td>
                                            <td>xjinl67@cepnet.net</td>
                                            <td>08/12/2021 20:36:00</td>
                                        </tr>
                                        <tr>
                                            <td>10</th>
                                            <td>x140l1n</td>
                                            <td>Xiaolin</td>
                                            <td>JinLin</td>
                                            <td>xjinl67@cepnet.net</td>
                                            <td>08/12/2021 20:36:00</td>
                                        </tr>
                                        <tr>
                                            <td>11</th>
                                            <td>x140l1n</td>
                                            <td>Xiaolin</td>
                                            <td>JinLin</td>
                                            <td>xjinl67@cepnet.net</td>
                                            <td>08/12/2021 20:36:00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script type="text/javascript" src="../assets/js/index.js"></script>
    <script type="text/javascript" src="../assets/js/config.js"></script>
    <script type="text/javascript" src="../assets/js/functions.js"></script>
</body>

</html>