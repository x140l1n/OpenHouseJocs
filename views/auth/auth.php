<!DOCTYPE html>
<html lang="cat">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="auth.css">
    <link rel="stylesheet" href="../../components/navbar/navbar.css">
    <link rel="stylesheet" href="../../components/footer/footer.css">
    <title>Login game</title>
</head>

<body class="h-100">
    <?php
    //navbar global component
    include __DIR__ . '../../../components/navbar/navbar.php';
    ?>
    <div class="container-fluid mt-lg-3 mt-md-3 mt-sm-0">
        <div class="card">
            <div class="row g-0">

                <div class="col-lg-7 col-md col-sm">
                    <img class="d-none d-lg-block bg-image img-fluid h-100" src="../../media/landingPage/acces.png" alt="acces logo">
                </div>

                <div class="col-lg-5 col-md-12 col-sm-12 px-md-0 px-sm-0 ">
                    <div class="card-body my-lg-2 my-md-1 my-sm-0 d-flex align-items-center h-100">

                        <div class="col-md-9 col-lg-8 mx-auto">
                            <h1 class="login-heading mb-4 mx-auto fw-bold text-center" id="welcomeLogin">
                                Abans de jugar
                            </h1>

                            <form id="myForm" class="needs-validation">

                                <div class="mb-3 position-relative">
                                    <label id="emialLabel" for="emailInput" class="form-label fw-bold"> Email: </label>
                                    <input type="email" class="form-control" id="emailInput" placeholder="example@example.com" required onblur="validateInput(emailInput)">
                                    <div class="invalid-feedback" id="emailValid">
                                        Perfavor introdueix un email valid.
                                    </div>
                                    <div class="valid-feedback" id="validFeedback">
                                        Perfecte!
                                    </div>
                                </div>
                                <div class="mb-3" id="nameDiv">
                                    <label id="nameLabel" for="nameInput" class="form-label fw-bold"> Nom: </label>
                                    <input type="text" class="form-control" id="nameInput" required onblur="validateInput(nameInput)" placeholder="Emily">
                                    <div class="invalid-feedback" id="nameValid">
                                        Perfavor introduiex un el teu.
                                    </div>
                                    <div class="valid-feedback" id="validFeedback">
                                        Perfecte!
                                    </div>
                                </div>
                                <div class="mb-3" id="surnameDiv">
                                    <label id="surnameLabel" for="surnameInput" class="form-label fw-bold"> Cognom: </label>
                                    <input type="text" class="form-control" id="surnameInput" required onblur="validateInput(surnameInput)" placeholder="Dickinson">
                                    <div class="invalid-feedback" id="surnameValid">
                                        Perfavor introduiex el teu cognom.
                                    </div>
                                    <div class="valid-feedback" id="validFeedback">
                                        Perfecte!
                                    </div>
                                </div>

                                <div class="dropdown">
                                    <label for="dropdownFormacionButton" class="form-label fw-bold" id="dropdownLabel">
                                        Selecciona les formacions que estas interessat: </label>
                                    <br>
                                    <button id="btnFormacion" class="btn btn-secondary dropdown-toggle" type="button" aria-labelledby="dropdownFormacionButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Formacions:
                                    </button>
                                    <ul class="dropdown-menu" name="dropdownFormacionButton" id="dropdownFormacionButton" aria-labelledby="dropdownFormacionButton"></ul>
                                </div>

                                <div class="dropdown" id="cicloDiv">
                                    <label id="dbcycle" for="dropdownCicloButton" class="form-label fw-bold"> Selecciona els cicles que estas interessat: </label>
                                    <br>
                                    <button id="dbname" class="btn btn-secondary dropdown-toggle" type="button" aria-labelledby="dropdownCicloButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Cicle
                                    </button>
                                    <ul class="dropdown-menu" name="dropdownCicloButton" id="dropdownCicloButton" aria-labelledby="dropdownCicloButton" style="display: inline-block;"></ul>
                                </div>

                                <div class="d-grid mt-3">
                                    <button class="btn btn-lg btn-primary text-uppercase mb-2" type="button" value="submit" id="submitBtn">
                                        Enviar
                                    </button>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--FOOTER-->
    <?php
    include __DIR__ . '../../../components/footer/footer.php';
    ?>

    <!--Script js-->
    <script src="api.js"></script>
    <script src="auth.js"></script>
    <script src="../../UI/bootstrap-5.0.2/dist/js/bootstrap.bundle.js"></script>
    <script src="../../lang/translateAuth.js"></script>
    <script src="../../lang/translate.js"></script>
</body>

</html>