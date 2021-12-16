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
    <title>Usuarios - Panel Administrador OpenHouseJocs</title>
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
                <span class="text-uppercase fw-bold fs-4">Usuarios</span>
                <div>
                    <button class="btn btn-secondary text-uppercase"><i class="fas fa-sync me-2 fa-fw"></i>Recargar</button>
                    <button class="btn btn-success text-uppercase text-light"><i class="fas fa-plus me-2 fa-fw"></i>Nuevo usuario</button>
                </div>
            </div>
            <small>Ver usuarios administradores y jugadores</small>
            <div class="mt-3">
                <div class="row mt-3">
                    <div class="col-lg-3 my-1">
                        <div class="input-group">
                            <span class="input-group-text" id="search-addon"><i class="fas fa-search fa-fw"></i></span>
                            <input type="text" class="form-control" placeholder="Buscar por..." aria-label="Buscar por..." aria-describedby="search-addon">
                        </div>
                    </div>
                    <div class="col-lg-3 my-1">
                        <select class="form-select" aria-label="select-search-by">
                            <option value="nickname" selected>Nickname</option>
                            <option value="name">Nombre</option>
                            <option value="lastname">Apellidos</option>
                        </select>
                    </div>
                    <div class="col-lg-3 my-1">
                        <select class="form-select" aria-label="select-rol">
                            <option value="0" selected>Selecciona un rol</option>
                            <option value="1">Superadministrador</option>
                            <option value="2">Administrador</option>
                            <option value="3">Estudiante</option>
                        </select>
                    </div>
                    <div class="col-lg-3 my-1 text-end">
                        <span class="fs-6"><i><strong>Total de registros:</strong> 11</i></span>
                    </div>
                </div>
                <table class="table table-hover bg-light border-0 m-0 align-middle text-center mt-2" id="table-users">
                    <thead class="bg-turquoise">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nickname</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Email</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Tiempo jugado (mm:ss)</th>
                            <th scope="col">Fecha y hora registro</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>x140l1n</td>
                            <td>Xiaolin</td>
                            <td>JinLin</td>
                            <td>xjinl67@cepnet.net</td>
                            <td>Superadministrador</td>
                            <td>09:30</td>
                            <td>08/12/2021 20:36:00</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm my-1" title="Ver usuario" data-action="show-user"><i class="fas fa-eye fa-fw"></i></button>
                                <button type="button" class="btn btn-success btn-sm my-1" title="Editar usuario" data-action="edit-user"><i class="fas fa-edit fa-fw"></i></button>
                                <button type="button" class="btn btn-danger btn-sm my-1" title="Eliminar usuario" data-action="delete-user"><i class="fas fa-trash fa-fw"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>x140l1n</td>
                            <td>Xiaolin</td>
                            <td>JinLin</td>
                            <td>xjinl67@cepnet.net</td>
                            <td>Superadministrador</td>
                            <td>09:30</td>
                            <td>08/12/2021 20:36:00</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm my-1" title="Ver usuario" data-action="show-user"><i class="fas fa-eye fa-fw"></i></button>
                                <button type="button" class="btn btn-success btn-sm my-1" title="Editar usuario" data-action="edit-user"><i class="fas fa-edit fa-fw"></i></button>
                                <button type="button" class="btn btn-danger btn-sm my-1" title="Eliminar usuario" data-action="delete-user"><i class="fas fa-trash fa-fw"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>x140l1n</td>
                            <td>Xiaolin</td>
                            <td>JinLin</td>
                            <td>xjinl67@cepnet.net</td>
                            <td>Superadministrador</td>
                            <td>09:30</td>
                            <td>08/12/2021 20:36:00</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm my-1" title="Ver usuario" data-action="show-user"><i class="fas fa-eye fa-fw"></i></button>
                                <button type="button" class="btn btn-success btn-sm my-1" title="Editar usuario" data-action="edit-user"><i class="fas fa-edit fa-fw"></i></button>
                                <button type="button" class="btn btn-danger btn-sm my-1" title="Eliminar usuario" data-action="delete-user"><i class="fas fa-trash fa-fw"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>x140l1n</td>
                            <td>Xiaolin</td>
                            <td>JinLin</td>
                            <td>xjinl67@cepnet.net</td>
                            <td>Superadministrador</td>
                            <td>09:30</td>
                            <td>08/12/2021 20:36:00</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm my-1" title="Ver usuario" data-action="show-user"><i class="fas fa-eye fa-fw"></i></button>
                                <button type="button" class="btn btn-success btn-sm my-1" title="Editar usuario" data-action="edit-user"><i class="fas fa-edit fa-fw"></i></button>
                                <button type="button" class="btn btn-danger btn-sm my-1" title="Eliminar usuario" data-action="delete-user"><i class="fas fa-trash fa-fw"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>x140l1n</td>
                            <td>Xiaolin</td>
                            <td>JinLin</td>
                            <td>xjinl67@cepnet.net</td>
                            <td>Superadministrador</td>
                            <td>09:30</td>
                            <td>08/12/2021 20:36:00</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm my-1" title="Ver usuario" data-action="show-user"><i class="fas fa-eye fa-fw"></i></button>
                                <button type="button" class="btn btn-success btn-sm my-1" title="Editar usuario" data-action="edit-user"><i class="fas fa-edit fa-fw"></i></button>
                                <button type="button" class="btn btn-danger btn-sm my-1" title="Eliminar usuario" data-action="delete-user"><i class="fas fa-trash fa-fw"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>x140l1n</td>
                            <td>Xiaolin</td>
                            <td>JinLin</td>
                            <td>xjinl67@cepnet.net</td>
                            <td>Superadministrador</td>
                            <td>09:30</td>
                            <td>08/12/2021 20:36:00</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm my-1" title="Ver usuario" data-action="show-user"><i class="fas fa-eye fa-fw"></i></button>
                                <button type="button" class="btn btn-success btn-sm my-1" title="Editar usuario" data-action="edit-user"><i class="fas fa-edit fa-fw"></i></button>
                                <button type="button" class="btn btn-danger btn-sm my-1" title="Eliminar usuario" data-action="delete-user"><i class="fas fa-trash fa-fw"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>x140l1n</td>
                            <td>Xiaolin</td>
                            <td>JinLin</td>
                            <td>xjinl67@cepnet.net</td>
                            <td>Superadministrador</td>
                            <td>09:30</td>
                            <td>08/12/2021 20:36:00</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm my-1" title="Ver usuario" data-action="show-user"><i class="fas fa-eye fa-fw"></i></button>
                                <button type="button" class="btn btn-success btn-sm my-1" title="Editar usuario" data-action="edit-user"><i class="fas fa-edit fa-fw"></i></button>
                                <button type="button" class="btn btn-danger btn-sm my-1" title="Eliminar usuario" data-action="delete-user"><i class="fas fa-trash fa-fw"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>x140l1n</td>
                            <td>Xiaolin</td>
                            <td>JinLin</td>
                            <td>xjinl67@cepnet.net</td>
                            <td>Superadministrador</td>
                            <td>09:30</td>
                            <td>08/12/2021 20:36:00</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm my-1" title="Ver usuario" data-action="show-user"><i class="fas fa-eye fa-fw"></i></button>
                                <button type="button" class="btn btn-success btn-sm my-1" title="Editar usuario" data-action="edit-user"><i class="fas fa-edit fa-fw"></i></button>
                                <button type="button" class="btn btn-danger btn-sm my-1" title="Eliminar usuario" data-action="delete-user"><i class="fas fa-trash fa-fw"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>x140l1n</td>
                            <td>Xiaolin</td>
                            <td>JinLin</td>
                            <td>xjinl67@cepnet.net</td>
                            <td>Superadministrador</td>
                            <td>09:30</td>
                            <td>08/12/2021 20:36:00</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm my-1" title="Ver usuario" data-action="show-user"><i class="fas fa-eye fa-fw"></i></button>
                                <button type="button" class="btn btn-success btn-sm my-1" title="Editar usuario" data-action="edit-user"><i class="fas fa-edit fa-fw"></i></button>
                                <button type="button" class="btn btn-danger btn-sm my-1" title="Eliminar usuario" data-action="delete-user"><i class="fas fa-trash fa-fw"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>x140l1n</td>
                            <td>Xiaolin</td>
                            <td>JinLin</td>
                            <td>xjinl67@cepnet.net</td>
                            <td>Superadministrador</td>
                            <td>09:30</td>
                            <td>08/12/2021 20:36:00</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm my-1" title="Ver usuario" data-action="show-user"><i class="fas fa-eye fa-fw"></i></button>
                                <button type="button" class="btn btn-success btn-sm my-1" title="Editar usuario" data-action="edit-user"><i class="fas fa-edit fa-fw"></i></button>
                                <button type="button" class="btn btn-danger btn-sm my-1" title="Eliminar usuario" data-action="delete-user"><i class="fas fa-trash fa-fw"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>x140l1n</td>
                            <td>Xiaolin</td>
                            <td>JinLin</td>
                            <td>xjinl67@cepnet.net</td>
                            <td>Superadministrador</td>
                            <td>09:30</td>
                            <td>08/12/2021 20:36:00</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm my-1" title="Ver usuario" data-action="show-user"><i class="fas fa-eye fa-fw"></i></button>
                                <button type="button" class="btn btn-success btn-sm my-1" title="Editar usuario" data-action="edit-user"><i class="fas fa-edit fa-fw"></i></button>
                                <button type="button" class="btn btn-danger btn-sm my-1" title="Eliminar usuario" data-action="delete-user"><i class="fas fa-trash fa-fw"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <div class="modal fade" id="modal-user" tabindex="-1" aria-labelledby="user-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-secondary">
                <div class="modal-header text-light border-0">
                    <h5 class="modal-title text-uppercase fw-bold" id="user-label">Modificar usuario</h5>
                    <button type="button" class="btn btn-sm btn-transparent" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times text-light fa-2x fa-fw"></i></button>
                </div>
                <div class="modal-body text-light">

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-confirm-delete" tabindex="-1" aria-labelledby="confirm-delete-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-secondary">
                <div class="modal-header text-light border-0">
                    <h5 class="modal-title text-uppercase fw-bold" id="confirm-delete-label">Eliminar usuario</h5>
                    <button type="button" class="btn btn-sm btn-transparent" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times text-light fa-2x fa-fw"></i></button>
                </div>
                <div class="modal-body text-light">
    
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../../../UI/bootstrap-5.0.2/dist/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="../assets/js/index.js"></script>
    <script type="text/javascript" src="../assets/js/config.js"></script>
    <script type="text/javascript" src="../assets/js/functions.js"></script>
    <script type="text/javascript" src="../assets/js/users.js"></script>
</body>

</html>