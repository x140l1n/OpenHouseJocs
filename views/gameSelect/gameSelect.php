<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="gameSelect.css">

</head>
<body>    
<?php
    //navbar global component
    include __DIR__ . '../../../components/navbar/navbar.php';
    ?>
    <div class="mt-sm-4">
        <img class="gSelect_main mx-auto d-block img-fluid" src="../../media/gameSelect/jugar.gif" alt="">
    </div>

    <div class="title">
        <h2>Bienvenido, Jugador/a</h2>
        <p>Selecciona ciclo</p>
        <select>
            <option>DAW</option>
            <option>DAM</option>
        </select>
    </div>

    <div class="justify-content-around row d-flex align-items-center">
        <div class="col-sm-12 col-lg-3 gSelect_img">
            <img class="gSelect_img" src="../../media/gameSelect/arkanoid_gif.gif" alt="">
        </div>
        <div class="col-sm-12 col-lg-3 gSelect_img">
            <img class="gSelect_img" src="../../media/gameSelect/platform_gif.gif" alt="">
        </div>
        <div class="col-sm-12 col-lg-3 gSelect_img">
            <img class="gSelect_img" src="../../media/gameSelect/snake_gif.gif" alt="">
        </div>
        <div class="col-sm-12 col-lg-3 gSelect_img">
            <img class="gSelect_img" src="../../media/gameSelect/space_gif.gif">
        </div>
    </div>
   
    <script src="../../UI/bootstrap-5.0.2/dist/js/bootstrap.js"></script>
    <script src="switch.js"></script>
</body>
</html>

