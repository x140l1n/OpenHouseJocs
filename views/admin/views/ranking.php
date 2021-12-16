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
    <title>Ranking - Panel Administrador OpenHouseJocs</title>
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
                <span class="text-uppercase fw-bold fs-4">Ranking</span>
                <button class="btn btn-secondary text-uppercase"><i class="fas fa-sync me-2 fa-fw"></i>Recargar</button>
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
                                <span class="fs-6"><i>Top 10 jugadores:</i></span>
                                <div class="table-responsive mt-2">
                                    <table class="table table-hover bg-light border-0 m-0 align-middle text-center">
                                        <thead class="bg-turquoise">
                                            <tr>
                                                <th scope="col">Posición</th>
                                                <th scope="col">Nickname</th>
                                                <th scope="col">Tiempo</th>
                                                <th scope="col">Puntuación</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="../assets/img/medal_1.png" width="30" /></th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                            <tr>
                                                <td><img src="../assets/img/medal_2.png" width="30" /></th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                            <tr>
                                                <td><img src="../assets/img/medal_3.png" width="30" /></th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                            <tr>
                                                <td>4</th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                            <tr>
                                                <td>5</th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                            <tr>
                                                <td>6</th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                        </tbody>
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
                                <span class="fs-6"><i>Top 10 jugadores:</i></span>
                                <div class="table-responsive mt-2">
                                    <table class="table table-hover bg-light border-0 m-0 align-middle text-center">
                                        <thead class="bg-turquoise">
                                            <tr>
                                                <th scope="col">Posición</th>
                                                <th scope="col">Nickname</th>
                                                <th scope="col">Tiempo</th>
                                                <th scope="col">Puntuación</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="../assets/img/medal_1.png" width="30" /></th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                            <tr>
                                                <td><img src="../assets/img/medal_2.png" width="30" /></th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                            <tr>
                                                <td><img src="../assets/img/medal_3.png" width="30" /></th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                            <tr>
                                                <td>4</th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                            <tr>
                                                <td>5</th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                            <tr>
                                                <td>6</th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                        </tbody>
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
                                <span class="fs-6"><i>Top 10 jugadores:</i></span>
                                <div class="table-responsive mt-2">
                                    <table class="table table-hover bg-light border-0 m-0 align-middle text-center">
                                        <thead class="bg-turquoise">
                                            <tr>
                                                <th scope="col">Posición</th>
                                                <th scope="col">Nickname</th>
                                                <th scope="col">Tiempo</th>
                                                <th scope="col">Puntuación</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="../assets/img/medal_1.png" width="30" /></th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                            <tr>
                                                <td><img src="../assets/img/medal_2.png" width="30" /></th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                            <tr>
                                                <td><img src="../assets/img/medal_3.png" width="30" /></th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                            <tr>
                                                <td>4</th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                            <tr>
                                                <td>5</th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                            <tr>
                                                <td>6</th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                        </tbody>
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
                                <span class="fs-6"><i>Top 10 jugadores:</i></span>
                                <div class="table-responsive mt-2">
                                    <table class="table table-hover bg-light border-0 m-0 align-middle text-center">
                                        <thead class="bg-turquoise">
                                            <tr>
                                                <th scope="col">Posición</th>
                                                <th scope="col">Nickname</th>
                                                <th scope="col">Tiempo</th>
                                                <th scope="col">Puntuación</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="../assets/img/medal_1.png" width="30" /></th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                            <tr>
                                                <td><img src="../assets/img/medal_2.png" width="30" /></th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                            <tr>
                                                <td><img src="../assets/img/medal_3.png" width="30" /></th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                            <tr>
                                                <td>4</th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                            <tr>
                                                <td>5</th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                            <tr>
                                                <td>6</th>
                                                <td>x140l1n</td>
                                                <td>00:50</td>
                                                <td>6500</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="modal fade" id="modal-doodle-jump" tabindex="-1" aria-labelledby="doodle-jump-label" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content bg-danger">
                <div class="modal-header text-light border-0">
                    <div class="d-flex justify-content-between w-100">
                        <h5 class="modal-title text-uppercase fw-bold" id="doodle-jump-label">Doodle jump</h5>
                        <button class="btn btn-secondary text-uppercase mx-2 btn-sm"><i class="fas fa-sync me-2 fa-fw"></i>Recargar</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-transparent" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times text-light fa-2x fa-fw"></i></button>
                </div>
                <div class="modal-body text-light">
                    <label class="fs-6">Categoría ciclos</label>
                    <div class="row mt-3">
                        <div class="col-lg-3 my-1">
                            <div class="input-group">
                                <span class="input-group-text" id="search-nickname-addon"><i class="fas fa-search fa-fw"></i></span>
                                <input type="text" class="form-control" placeholder="Buscar por nickname" aria-label="Buscar por nickname" aria-describedby="search-nickname-addon">
                            </div>
                        </div>
                        <div class="col-lg-3 my-1">
                            <select class="form-select" aria-label="select-family">
                                <option selected>Selecciona una família</option>
                            </select>
                        </div>
                        <div class="col-lg-3 my-1">
                            <select class="form-select" aria-label="select-cycle">
                                <option selected>Selecciona un ciclo</option>
                            </select>
                        </div>
                        <div class="col-lg-3 my-1 text-end">
                            <span class="fs-6"><i><strong>Total de registros:</strong> 400</i></span>
                        </div>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table table-hover bg-light border-0 m-0 align-middle text-center">
                            <thead class="bg-turquoise">
                                <tr>
                                    <th scope="col">Posición</th>
                                    <th scope="col">Nickname</th>
                                    <th scope="col">Tiempo</th>
                                    <th scope="col">Puntuación</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="../assets/img/medal_1.png" width="30" /></th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                                <tr>
                                    <td><img src="../assets/img/medal_2.png" width="30" /></th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                                <tr>
                                    <td><img src="../assets/img/medal_3.png" width="30" /></th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                                <tr>
                                    <td>4</th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                                <tr>
                                    <td>5</th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                                <tr>
                                    <td>6</th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-snake" tabindex="-1" aria-labelledby="snake-label" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content bg-warning">
                <div class="modal-header text-light border-0">
                    <div class="d-flex justify-content-between w-100">
                        <h5 class="modal-title text-uppercase fw-bold" id="snake-label">Snake</h5>
                        <button class="btn btn-secondary text-uppercase mx-2 btn-sm"><i class="fas fa-sync me-2 fa-fw"></i>Recargar</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-transparent" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times text-light fa-2x fa-fw"></i></button>
                </div>
                <div class="modal-body text-light">
                    <label class="fs-6">Categoría ciclos</label>
                    <div class="row mt-3">
                        <div class="col-lg-3 my-1">
                            <div class="input-group">
                                <span class="input-group-text" id="search-nickname-addon"><i class="fas fa-search fa-fw"></i></span>
                                <input type="text" class="form-control" placeholder="Buscar por nickname" aria-label="Buscar por nickname" aria-describedby="search-nickname-addon">
                            </div>
                        </div>
                        <div class="col-lg-3 my-1">
                            <select class="form-select" aria-label="select-family">
                                <option selected>Selecciona una família</option>
                            </select>
                        </div>
                        <div class="col-lg-3 my-1">
                            <select class="form-select" aria-label="select-cycle">
                                <option selected>Selecciona un ciclo</option>
                            </select>
                        </div>
                        <div class="col-lg-3 my-1 text-end">
                            <span class="fs-6"><i><strong>Total de registros:</strong> 400</i></span>
                        </div>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table table-hover bg-light border-0 m-0 align-middle text-center">
                            <thead class="bg-turquoise">
                                <tr>
                                    <th scope="col">Posición</th>
                                    <th scope="col">Nickname</th>
                                    <th scope="col">Tiempo</th>
                                    <th scope="col">Puntuación</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="../assets/img/medal_1.png" width="30" /></th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                                <tr>
                                    <td><img src="../assets/img/medal_2.png" width="30" /></th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                                <tr>
                                    <td><img src="../assets/img/medal_3.png" width="30" /></th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                                <tr>
                                    <td>4</th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                                <tr>
                                    <td>5</th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                                <tr>
                                    <td>6</th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-space-invaders" tabindex="-1" aria-labelledby="space-invaders-label" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content bg-purple">
                <div class="modal-header text-light border-0">
                    <div class="d-flex justify-content-between w-100">
                        <h5 class="modal-title text-uppercase fw-bold" id="space-invaders-label">Space invaders</h5>
                        <button class="btn btn-secondary text-uppercase mx-2 btn-sm"><i class="fas fa-sync me-2 fa-fw"></i>Recargar</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-transparent" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times text-light fa-2x fa-fw"></i></button>
                </div>
                <div class="modal-body text-light">
                    <label class="fs-6">Categoría ciclos</label>
                    <div class="row mt-3">
                        <div class="col-lg-3 my-1">
                            <div class="input-group">
                                <span class="input-group-text" id="search-nickname-addon"><i class="fas fa-search fa-fw"></i></span>
                                <input type="text" class="form-control" placeholder="Buscar por nickname" aria-label="Buscar por nickname" aria-describedby="search-nickname-addon">
                            </div>
                        </div>
                        <div class="col-lg-3 my-1">
                            <select class="form-select" aria-label="select-family">
                                <option selected>Selecciona una família</option>
                            </select>
                        </div>
                        <div class="col-lg-3 my-1">
                            <select class="form-select" aria-label="select-cycle">
                                <option selected>Selecciona un ciclo</option>
                            </select>
                        </div>
                        <div class="col-lg-3 my-1 text-end">
                            <span class="fs-6"><i><strong>Total de registros:</strong> 400</i></span>
                        </div>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table table-hover bg-light border-0 m-0 align-middle text-center">
                            <thead class="bg-turquoise">
                                <tr>
                                    <th scope="col">Posición</th>
                                    <th scope="col">Nickname</th>
                                    <th scope="col">Tiempo</th>
                                    <th scope="col">Puntuación</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="../assets/img/medal_1.png" width="30" /></th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                                <tr>
                                    <td><img src="../assets/img/medal_2.png" width="30" /></th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                                <tr>
                                    <td><img src="../assets/img/medal_3.png" width="30" /></th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                                <tr>
                                    <td>4</th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                                <tr>
                                    <td>5</th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                                <tr>
                                    <td>6</th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-arkanoid" tabindex="-1" aria-labelledby="arkanoid-label" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content bg-success">
                <div class="modal-header text-light border-0">
                    <div class="d-flex justify-content-between w-100">
                        <h5 class="modal-title text-uppercase fw-bold" id="arkanoid-label">Arkanoid</h5>
                        <button class="btn btn-secondary text-uppercase mx-2 btn-sm"><i class="fas fa-sync me-2 fa-fw"></i>Recargar</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-transparent" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times text-light fa-2x fa-fw"></i></button>
                </div>
                <div class="modal-body text-light">
                    <label class="fs-6">Categoría FRASE</label>
                    <div class="row mt-3">
                        <div class="col-lg-6 my-1">
                            <div class="input-group">
                                <span class="input-group-text" id="search-nickname-addon"><i class="fas fa-search fa-fw"></i></span>
                                <input type="text" class="form-control" placeholder="Buscar por nickname" aria-label="Buscar por nickname" aria-describedby="search-nickname-addon">
                            </div>
                        </div>
                        <div class="col-lg-6 my-1 text-end">
                            <span class="fs-6"><i><strong>Total de registros:</strong> 400</i></span>
                        </div>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table table-hover bg-light border-0 m-0 align-middle text-center">
                            <thead class="bg-turquoise">
                                <tr>
                                    <th scope="col">Posición</th>
                                    <th scope="col">Nickname</th>
                                    <th scope="col">Tiempo</th>
                                    <th scope="col">Puntuación</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="../assets/img/medal_1.png" width="30" /></th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                                <tr>
                                    <td><img src="../assets/img/medal_2.png" width="30" /></th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                                <tr>
                                    <td><img src="../assets/img/medal_3.png" width="30" /></th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                                <tr>
                                    <td>4</th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                                <tr>
                                    <td>5</th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                                <tr>
                                    <td>6</th>
                                    <td>x140l1n</td>
                                    <td>00:50</td>
                                    <td>6500</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../../../UI/bootstrap-5.0.2/dist/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="../assets/js/index.js"></script>
    <script type="text/javascript" src="../assets/js/config.js"></script>
    <script type="text/javascript" src="../assets/js/functions.js"></script>
    <script type="text/javascript" src="../assets/js/ranking.js"></script>
</body>

</html>