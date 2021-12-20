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
    <title>Ranking - Panel Administrador OpenHouseJocs</title>
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
                <span class="text-uppercase fw-bold fs-4">Ranking</span>
                <button class="btn btn-secondary text-uppercase" id="btn-refresh"><i class="fas fa-sync me-2 fa-fw"></i>Recargar</button>
            </div>
            <small>Ver el ranking de cada juego</small>
            <div class="mt-3">
                <div class="row row-cols-xl-2 row-cols-md-1 g-2 mt-1">
                    <div class="col d-flex">
                        <div class="card w-100 align-items-stretch rounded-3 bg-danger card-480">
                            <div class="card-body text-light">
                                <div class="card-title fw-bold text-uppercase d-flex justify-content-between">
                                    Doodle jump
                                    <button class="btn btn-secondary text-uppercase btn-sm" data-game="doodle-jump" name="btn-show-more">Ver más</button>
                                </div>
                                <div class="fs-6 my-2"><strong>Categoría ciclos</strong></div>
                                <div class="fs-6"><i>Top 10 estudiantes:</i></div>
                                <div class="table-responsive mt-2 table-340">
                                    <table id="table-doodle-jump" name="card-tables" class="table table-hover bg-light border-0 m-0 align-middle text-center">
                                        <thead class="bg-turquoise">
                                            <tr>
                                                <th scope="col">Posición</th>
                                                <th scope="col">Nickname</th>
                                                <th scope="col">Ciclo</th>
                                                <th scope="col">Puntuación</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot class="bg-turquoise position-sticky bottom-0">
                                            <tr>
                                                <th scope="col">Posición</th>
                                                <th scope="col">Nickname</th>
                                                <th scope="col">Ciclo</th>
                                                <th scope="col">Puntuación</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card w-100 align-items-stretch rounded-3 bg-warning card-480">
                            <div class="card-body text-light">
                                <div class="card-title fw-bold text-uppercase d-flex justify-content-between">
                                    Snake
                                    <button class="btn btn-secondary text-uppercase btn-sm" data-game="snake" name="btn-show-more">Ver más</button>
                                </div>
                                <div class="fs-6 my-2"><strong>Categoría FRASE</strong></div>
                                <div class="fs-6"><i>Top 10 estudiantes:</i></div>
                                <div class="table-responsive mt-2 table-340">
                                    <table id="table-snake" name="card-tables" class="table table-hover bg-light border-0 m-0 align-middle text-center">
                                        <thead class="bg-turquoise">
                                            <tr>
                                                <th scope="col">Posición</th>
                                                <th scope="col">Nickname</th>
                                                <th scope="col">Puntuación</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot class="bg-turquoise position-sticky bottom-0">
                                            <tr>
                                                <th scope="col">Posición</th>
                                                <th scope="col">Nickname</th>
                                                <th scope="col">Puntuación</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card w-100 align-items-stretch rounded-3 bg-purple card-480">
                            <div class="card-body text-light">
                                <div class="card-title fw-bold text-uppercase d-flex justify-content-between">
                                    Space invaders
                                    <button class="btn btn-secondary text-uppercase btn-sm" data-game="space-invaders" name="btn-show-more">Ver más</button>
                                </div>
                                <div class="fs-6 my-2"><strong>Categoría ciclos</strong></div>
                                <div class="fs-6"><i>Top 10 estudiantes:</i></div>
                                <div class="table-responsive mt-2 table-340">
                                    <table id="table-space-invaders" name="card-tables" class="table table-hover bg-light border-0 m-0 align-middle text-center">
                                        <thead class="bg-turquoise">
                                            <tr>
                                                <th scope="col">Posición</th>
                                                <th scope="col">Nickname</th>
                                                <th scope="col">Ciclo</th>
                                                <th scope="col">Puntuación</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot class="bg-turquoise position-sticky bottom-0">
                                            <tr>
                                                <th scope="col">Posición</th>
                                                <th scope="col">Nickname</th>
                                                <th scope="col">Ciclo</th>
                                                <th scope="col">Puntuación</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card w-100 align-items-stretch rounded-3 bg-success card-480">
                            <div class="card-body text-light">
                                <div class="card-title fw-bold text-uppercase d-flex justify-content-between">
                                    Arkanoid
                                    <button class="btn btn-secondary text-uppercase btn-sm" data-game="arkanoid" name="btn-show-more">Ver más</button>
                                </div>
                                <div class="fs-6 my-2"><strong>Categoría FRASE</strong></div>
                                <div class="fs-6"><i>Top 10 estudiantes:</i></div>
                                <div class="table-responsive mt-2 table-340">
                                    <table id="table-arkanoid" name="card-tables" class="table table-hover bg-light border-0 m-0 align-middle text-center">
                                        <thead class="bg-turquoise">
                                            <tr>
                                                <th scope="col">Posición</th>
                                                <th scope="col">Nickname</th>
                                                <th scope="col">Puntuación</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot class="bg-turquoise position-sticky bottom-0">
                                            <tr>
                                                <th scope="col">Posición</th>
                                                <th scope="col">Nickname</th>
                                                <th scope="col">Puntuación</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="modal fade" id="modal-doodle-jump" name="modal-ranking" tabindex="-1" aria-labelledby="doodle-jump-label" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content bg-danger">
                <div class="modal-header text-light border-0">
                    <div class="d-flex justify-content-between w-100">
                        <h5 class="modal-title text-uppercase fw-bold" id="doodle-jump-label">Doodle jump</h5>
                        <button class="btn btn-secondary text-uppercase mx-2 btn-sm" name="btn-refresh-modal" name="btn-refresh-ranking"><i class="fas fa-sync me-2 fa-fw"></i>Recargar</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-transparent" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times text-light fa-2x fa-fw"></i></button>
                </div>
                <div class="modal-body text-light">
                    <label class="fs-6">Categoría ciclos</label>
                    <div class="row mt-3">
                        <div class="col-lg-3 my-1">
                            <div class="input-group">
                                <span class="input-group-text" id="search-nickname-addon"><i class="fas fa-search fa-fw"></i></span>
                                <input type="text" class="form-control" placeholder="Buscar por nickname" name="input-search-nickname" aria-label="Buscar por nickname" aria-describedby="search-nickname-addon">
                            </div>
                        </div>
                        <div class="col-lg-3 my-1">
                            <select class="form-select" aria-label="select-family" name="select-family">
                                <option value="0" selected>Selecciona una familia...</option>
                            </select>
                        </div>
                        <div class="col-lg-4 my-1">
                            <select class="form-select" aria-label="select-cycle" name="select-cycle">
                                <option value="0" selected>Selecciona un ciclo...</option>
                            </select>
                        </div>
                        <div class="col-lg-2 my-1 text-end">
                            <span class="fs-6"><i><strong>Total de registros: </strong><span name="total-records-modal-ranking">0</span></i></span>
                        </div>
                    </div>
                    <div class="table-responsive mt-2 table-340">
                        <table class="table table-hover bg-light border-0 m-0 align-middle text-center">
                            <thead class="bg-turquoise">
                                <tr>
                                    <th scope="col">Posición</th>
                                    <th scope="col">Nickname</th>
                                    <th scope="col">Puntuación</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td colspan='3'>No hay registros con estos parámetros.</td></tr>
                            </tbody>
                            <tfoot class="bg-turquoise position-sticky bottom-0">
                                <tr>
                                    <th scope="col">Posición</th>
                                    <th scope="col">Nickname</th>
                                    <th scope="col">Puntuación</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-snake" name="modal-ranking" tabindex="-1" aria-labelledby="snake-label" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content bg-warning">
                <div class="modal-header text-light border-0">
                    <div class="d-flex justify-content-between w-100">
                        <h5 class="modal-title text-uppercase fw-bold" id="snake-label">Snake</h5>
                        <button class="btn btn-secondary text-uppercase mx-2 btn-sm" name="btn-refresh-modal"><i class="fas fa-sync me-2 fa-fw"></i>Recargar</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-transparent" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times text-light fa-2x fa-fw"></i></button>
                </div>
                <div class="modal-body text-light">
                    <label class="fs-6">Categoría FRASE</label>
                    <div class="row mt-3">
                        <div class="col-lg-6 my-1">
                            <div class="input-group">
                                <span class="input-group-text" id="search-nickname-addon"><i class="fas fa-search fa-fw"></i></span>
                                <input type="text" class="form-control" placeholder="Buscar por nickname" name="input-search-nickname" aria-label="Buscar por nickname" aria-describedby="search-nickname-addon">
                            </div>
                        </div>
                        <div class="col-lg-6 my-1 text-end">
                            <span class="fs-6"><i><strong>Total de registros: </strong><span name="total-records-modal-ranking">0</span></i></span>
                        </div>
                    </div>
                    <div class="table-responsive mt-2 table-340">
                        <table class="table table-hover bg-light border-0 m-0 align-middle text-center">
                            <thead class="bg-turquoise">
                                <tr>
                                    <th scope="col">Posición</th>
                                    <th scope="col">Nickname</th>
                                    <th scope="col">Puntuación</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot class="bg-turquoise position-sticky bottom-0">
                                <tr>
                                    <th scope="col">Posición</th>
                                    <th scope="col">Nickname</th>
                                    <th scope="col">Puntuación</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-space-invaders" name="modal-ranking" tabindex="-1" aria-labelledby="space-invaders-label" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content bg-purple">
                <div class="modal-header text-light border-0">
                    <div class="d-flex justify-content-between w-100">
                        <h5 class="modal-title text-uppercase fw-bold" id="space-invaders-label">Space invaders</h5>
                        <button class="btn btn-secondary text-uppercase mx-2 btn-sm" name="btn-refresh-modal"><i class="fas fa-sync me-2 fa-fw"></i>Recargar</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-transparent" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times text-light fa-2x fa-fw"></i></button>
                </div>
                <div class="modal-body text-light">
                    <label class="fs-6">Categoría ciclos</label>
                    <div class="row mt-3">
                        <div class="col-lg-3 my-1">
                            <div class="input-group">
                                <span class="input-group-text" id="search-nickname-addon"><i class="fas fa-search fa-fw"></i></span>
                                <input type="text" class="form-control" placeholder="Buscar por nickname" name="input-search-nickname" aria-label="Buscar por nickname" aria-describedby="search-nickname-addon">
                            </div>
                        </div>
                        <div class="col-lg-3 my-1">
                            <select class="form-select" aria-label="select-family" name="select-family">
                                <option value="0" selected>Selecciona una familia...</option>
                            </select>
                        </div>
                        <div class="col-lg-4 my-1">
                            <select class="form-select" aria-label="select-cycle" name="select-cycle">
                                <option value="0" selected>Selecciona un ciclo...</option>
                            </select>
                        </div>
                        <div class="col-lg-2 my-1 text-end">
                            <span class="fs-6"><i><strong>Total de registros: </strong><span name="total-records-modal-ranking">0</span></i></span>
                        </div>
                    </div>
                    <div class="table-responsive mt-2 table-340">
                        <table class="table table-hover bg-light border-0 m-0 align-middle text-center">
                            <thead class="bg-turquoise">
                                <tr>
                                    <th scope="col">Posición</th>
                                    <th scope="col">Nickname</th>
                                    <th scope="col">Puntuación</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td colspan='3'>No hay registros con estos parámetros.</td></tr>
                            </tbody>
                            <tfoot class="bg-turquoise position-sticky bottom-0">
                                <tr>
                                    <th scope="col">Posición</th>
                                    <th scope="col">Nickname</th>
                                    <th scope="col">Puntuación</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-arkanoid" name="modal-ranking" tabindex="-1" aria-labelledby="arkanoid-label" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content bg-success">
                <div class="modal-header text-light border-0">
                    <div class="d-flex justify-content-between w-100">
                        <h5 class="modal-title text-uppercase fw-bold" id="arkanoid-label">Arkanoid</h5>
                        <button class="btn btn-secondary text-uppercase mx-2 btn-sm" name="btn-refresh-modal"><i class="fas fa-sync me-2 fa-fw"></i>Recargar</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-transparent" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times text-light fa-2x fa-fw"></i></button>
                </div>
                <div class="modal-body text-light">
                    <label class="fs-6">Categoría FRASE</label>
                    <div class="row mt-3">
                        <div class="col-lg-6 my-1"> 
                            <div class="input-group">
                                <span class="input-group-text" id="search-nickname-addon"><i class="fas fa-search fa-fw"></i></span>
                                <input type="text" class="form-control" placeholder="Buscar por nickname" name="input-search-nickname" aria-label="Buscar por nickname" aria-describedby="search-nickname-addon">
                            </div>
                        </div>
                        <div class="col-lg-6 my-1 text-end">
                            <span class="fs-6"><i><strong>Total de registros: </strong><span name="total-records-modal-ranking">0</span></i></span>
                        </div>
                    </div>
                    <div class="table-responsive mt-2 table-340">
                        <table class="table table-hover bg-light border-0 m-0 align-middle text-center">
                            <thead class="bg-turquoise">
                                <tr>
                                    <th scope="col">Posición</th>
                                    <th scope="col">Nickname</th>
                                    <th scope="col">Puntuación</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot class="bg-turquoise position-sticky bottom-0">
                                <tr>
                                    <th scope="col">Posición</th>
                                    <th scope="col">Nickname</th>
                                    <th scope="col">Puntuación</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    //Import the scripts js.
    require("partials/scripts.php");
    ?>
    <script type="text/javascript" src="../assets/js/ranking.js"></script>
</body>

</html>