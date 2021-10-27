<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    //Import links.
    require("./partials/links.html");
    ?>
    <title>Login - Panel Admin</title>
</head>

<body class="vh-100">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-lg-6 d-md-none d-lg-block login-background"></div>
            <div class="col-lg-6 col-md-12 p-4">
                <div class="row col">
                    <div class="form-check form-switch form-switch-lg">
                        <div class="form-switch-wrap position-relative float-end">
                            <input class="form-check-input my-auto mx-auto" type="checkbox" id="switchDarkMode" checked/>
                            <i class="fas text-light"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/login.js"></script>
</body>

</html>