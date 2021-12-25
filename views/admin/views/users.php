<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
}

if ($_SESSION["id_rol"] != 1 && $_SESSION["id_rol"] != 2) {
    header("Location: logout.php");
} else if ($_SESSION["id_rol"] != 1) {
    header("Location: dashboard.php");
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
        <main class="d-flex flex-column p-2 w-100 h-100 p-4">
            <div class="d-flex justify-content-between">
                <span class="text-uppercase fw-bold fs-4">Usuarios</span>
                <div>
                    <button class="btn btn-secondary text-uppercase" id="btn-refresh"><i class="fas fa-sync me-2 fa-fw"></i>Recargar</button>
                    <button class="btn btn-success text-uppercase text-light" id="btn-new-user"><i class="fas fa-plus me-2 fa-fw"></i>Nuevo usuario</button>
                </div>
            </div>
            <small>Ver usuarios administradores y estudiantes</small>
            <div class="mt-3">
                <div class="row mt-3">
                    <div class="col-lg-3 my-1">
                        <div class="input-group">
                            <span class="input-group-text" id="search-addon"><i class="fas fa-search fa-fw"></i></span>
                            <input type="text" class="form-control" placeholder="Buscar por..." aria-label="Buscar por..." aria-describedby="search-addon" id="input-search">
                        </div>
                    </div>
                    <div class="col-lg-3 my-1">
                        <select class="form-select" aria-label="select-search-by" id="select-search-by">
                            <option value="nickname" selected>Nickname</option>
                            <option value="firstname">Nombre</option>
                            <option value="lastname">Apellidos</option>
                            <option value="email">Email</option>
                        </select>
                    </div>
                    <div class="col-lg-3 my-1">
                        <select class="form-select" aria-label="select-rols" id="select-rols">
                            <option value="0" selected>Selecciona un rol...</option>
                        </select>
                    </div>
                    <div class="col-lg-3 my-1 text-end">
                        <span class="fs-6"><i><strong>Total de registros: </strong><span id="total-records">0</span></i></span>
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
                            <th scope="col">Fecha y hora registro</th>
                            <th scope="col"></th>
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
                            <th scope="col">Rol</th>
                            <th scope="col">Fecha y hora registro</th>
                            <th scope="col"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </main>
    </div>
    <div class="modal fade" id="modal-user" tabindex="-1" aria-labelledby="user-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-secondary text-dark">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-uppercase fw-bold" id="user-label"></h5>
                    <button type="button" class="btn btn-sm btn-transparent" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times fa-2x fa-fw"></i></button>
                </div>
                <div class="modal-body">
                    <form id="form-user" data-id-user="-1">
                        <div class="row">
                            <div class="col-lg-4 mb-3">
                                <div class="form-floating">
                                    <input type="input-nickname" class="form-control form-control-border" id="input-nickname" name="nickname" placeholder="Nickname" required>
                                    <label for="input-nickname">Nickname *</label>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <div class="form-floating">
                                    <input type="input-firstname" class="form-control form-control-border" id="input-firstname" name="firstname" placeholder="Nombre" required>
                                    <label for="input-firstname">Nombre *</label>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <div class="form-floating">
                                    <input type="input-lastname" class="form-control form-control-border" id="input-lastname" name="lastname" placeholder="Apellidos" required>
                                    <label for="input-lastname">Apellidos *</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <div class="form-floating">
                                    <input type="input-email" class="form-control form-control-border" id="input-email" name="email" error-label="#email-error" placeholder="Email" required>
                                    <label for="input-email">Email *</label>
                                    <span id="email-error" class="form-text text-danger invisible">Error.</span>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-floating">
                                    <select class="form-select form-control-border" id="select-rols-modal" name="rol" aria-label="Rol" required>
                                        <option value="0" selected>Selecciona un rol...</option>
                                    </select>
                                    <label for="select-rols">Rol *</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <div class="input-group">
                                    <div class="form-floating flex-grow-1">
                                        <input type="password" class="form-control form-control-border input-password" id="input-password" name="password" placeholder="Contraseña" required>
                                        <label for="input-password">Contraseña *</label>
                                    </div>
                                    <span class="input-group-text toggle-password" name="toggle-password" input-toggle="#input-password"><i class="fas fa-eye fa-fw"></i></span>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="input-group">
                                    <div class="form-floating flex-grow-1">
                                        <input type="password" class="form-control form-control-border input-password-confirm" id="input-password-confirm" name="password" placeholder="Contraseña" required>
                                        <label for="input-password-confirm">Confirmar contraseña *</label>
                                    </div>
                                    <span class="input-group-text toggle-password" name="toggle-password" input-toggle="#input-password-confirm"><i class="fas fa-eye fa-fw"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-grid mt-3">
                                <button type="submit" class="btn btn-primary" id="btn-submit-user">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-password" tabindex="-1" aria-labelledby="password-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-secondary text-dark">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-uppercase fw-bold" id="password-label">Cambiar contraseña</h5>
                    <button type="button" class="btn btn-sm btn-transparent" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times fa-2x fa-fw"></i></button>
                </div>
                <div class="modal-body">
                    <form id="form-password" data-id-user="-1">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <div class="input-group">
                                    <div class="form-floating flex-grow-1">
                                        <input type="password" class="form-control form-control-border input-password" id="input-password-change" name="password" placeholder="Contraseña" required>
                                        <label for="input-password-change">Contraseña *</label>
                                    </div>
                                    <span class="input-group-text toggle-password" name="toggle-password" input-toggle="#input-password-change"><i class="fas fa-eye fa-fw"></i></span>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="input-group">
                                    <div class="form-floating flex-grow-1">
                                        <input type="password" class="form-control form-control-border input-password-confirm" id="input-password-confirm-change" name="password" placeholder="Contraseña" required>
                                        <label for="input-password-confirm-change">Confirmar contraseña *</label>
                                    </div>
                                    <span class="input-group-text toggle-password" name="toggle-password" input-toggle="#input-password-confirm-change"><i class="fas fa-eye fa-fw"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-grid mt-3">
                                <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-confirm-delete" tabindex="-1" aria-labelledby="confirm-delete-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-danger">
                <div class="modal-header text-light border-0">
                    <h5 class="modal-title text-uppercase fw-bold" id="confirm-delete-label">Eliminar usuario</h5>
                    <button type="button" class="btn btn-sm btn-transparent" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times text-light fa-2x fa-fw"></i></button>
                </div>
                <div class="modal-body text-light">
                    ¿Estás seguro que deseas eliminar este usuario?
                </div>
                <div class="modal-footer border-0 ">
                    <button type="button" class="btn btn-primary" id="btn-delete-user" data-id-user="-1">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999; height: 150px;">
        <div id="toast-noti" class="toast hide h-100" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Mensaje</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-light fs-6 fw-bold" id="toast-body">
            </div>
        </div>
    </div>
    <?php
    //Import the scripts js.
    require("partials/scripts.php");
    ?>
    <script type="text/javascript" src="../assets/js/users.js"></script>
</body>

</html> 