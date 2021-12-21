<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/ball.png" type="image/png">
    <link rel="stylesheet" href="assets/css/normalize.css" />
    <link rel="stylesheet" href="libraries/fontawesome-free-5.15.4-web/css/all.min.css" />
    <link rel="stylesheet" href="libraries/nes.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Arkanoid</title>
</head>

<body>
    <div class="content">
        <div class="game">
            <div id="stats" class="stats">
                <table>
                    <tr>
                        <td class="img-timer"><img src="assets/img/timer.png" /> </td>
                        <td class="timer">
                            <span id="timer">00:00</span>
                        </td>
                        <td class="points">
                            <span id="points">0p</span>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="board" class="board">
                <div id="board-menu" class="board-menu">
                    <div id="main-menu" class="main menu">
                        <div id="logo" class="logo">
                            <div class="logo-1">
                                ARKAN
                            </div>
                            <div class="logo-2">
                                <img src="assets/img/ball.png" />
                            </div>
                            <div class="logo-3">
                                ID
                            </div>
                        </div>
                        <div id="menu-options" class="menu-options">
                            <button type="button" class="nes-btn is-success play" data-action="play">Jugar</button>
                            <button type="button" class="nes-btn is-primary instructions"
                                data-action="instructions">Instruccions</button>
                            <button type="button" class="nes-btn is-warning ranking"
                                data-action="ranking">Ranking</button>
                            <a href="../../views/gameSelect/gameSelect.php" class="nes-btn"
                                data-action="ranking">Tornar al menú</a>
                        </div>
                        <div id="menu-footer" class="menu-footer">
                            <p>
                                Creat per Xiaolin Jin Lin DAW2.
                                <br />
                                <a href="https://github.com/x140l1n" target="_blank">Visita al meu GitHub.</a>
                            </p>
                        </div>
                    </div>
                    <div id="instructions-menu" class="menu">
                        <div class="menu-header">
                            <button type="button" class="nes-btn go-back" data-action="go-back">Tornar</button>
                            <div class="title">Instruccións</div>
                        </div>
                        <div id="content-instructions" class="content-instructions" data-current-page="1">
                            <div name="page" data-page="1" data-page-name='Concepte'>
                                <u><strong>Concepte</strong></u>
                                <p><br />En aquest joc hauràs de controlar una plataforma que impedeix que una bola
                                    surti de la zona de joc, fent-la rebotar. </p>
                                <p>A la part superior hi ha uns quants blocs, que es destrueix en ser tocats per la
                                    bola.</p>
                                <p>Una vegada destruït tots el blocs, descobriràs el significat de la famosa
                                    <u><strong><span class="text-red">F</span><span class="text-orange">R</span><span class="text-purple">A</span><span class="text-green">S</span><span class="text-cyan">E</span></strong></u> que
                                    s'utilitza molt en aquest centre.
                                </p>
                            </div>
                            <div name="page" data-page="2" data-page-name='Objectiu'>
                                <u><strong>Objectiu</strong></u>
                                <p><br />El objectiu del joc es destruir tots els blocs en menys <u><strong>d'1
                                            minut</strong></u> y obtenir el <u><strong>maxim de punts</strong></u>. Si
                                    et queda poc temps
                                    se't posarà la vora del joc en vermell.</p>
                                <p>Cada bloc que es destrueix es sumarà <u><strong>100 punts</strong></u>. Si la bola
                                    surt de la zona del joc perdràs <u><strong>200 punts</strong></u>.</p>
                                <p class="text-red"><strong>Si guanyes el joc et sumará 500 punts d'extra!</strong></p>
                                <p>Durant el joc et trobaràs <u><strong>objectes</strong></u> que t'ajudarà a sumar
                                    punts y guanyar la partida.</p>
                                <div class="instructions-image">
                                    <div class="image-text">
                                        <img src="assets/img/100p.png" />
                                        Sumar 100 punts.
                                    </div>
                                    <div class="image-text">
                                        <img src="assets/img/timer_plus_15.png" />
                                        Augmentar 15 segons.
                                    </div>
                                </div>
                            </div>
                            <div name="page" data-page="3" data-page-name='Controls'>
                                <u><strong>Controls</strong></u>
                                <div class="controls">
                                    <div>
                                        <div class="control">
                                            <img src="assets/img/key_up.png" />
                                            Apuntar la bola a l'esquerra.
                                        </div>
                                        <div class="control">
                                            <img src="assets/img/key_down.png" />
                                            Apuntar la bola a la dreta.
                                        </div>
                                    </div>
                                    <div>
                                        <div class="control">
                                            <img src="assets/img/key_left.png" />
                                            Moure a l'esquerra.
                                        </div>
                                        <div class="control">
                                            <img src="assets/img/key_right.png" />
                                            Moure a la dreta.
                                        </div>
                                    </div>
                                    <div>
                                        <div class="control">
                                            <img src="assets/img/spacebar.png" />
                                            Disparar la bola.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="instructions-footer">
                            <button type="button" class="nes-btn go-back btn-page" data-action="go-back-page"></button>
                            <button type="button" class="nes-btn go-next btn-page" data-action="go-next-page"></button>
                        </div>
                    </div>
                    <div id="ranking-menu" class="menu">
                        <div class="menu-header">
                            <button type="button" class="nes-btn go-back" data-action="go-back">Tornar</button>
                            <div class="title">Ranking (Top 10)</div>
                        </div>
                        <div class="wrap-table-ranking">
                            <table id="table-ranking" class="table-ranking">
                                <tbody>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="board-game" class="board-game">
                </div>
                <div id="board-game-finish" class="board-game-finish">
                    <div id="content-game-finish"    class="content-game-finish">
                        <div id="text-game-finish"></div>
                        <div>La teva puntuació és:</div>
                        <div id="points-game-finish"></div>
                        <div>
                            <button class="nes-btn is-primary" data-action="play-again">Tornar a jugar</button>
                            <button class="nes-btn is-secondary" data-action="back-menu">Tornar al menú</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/index.js"></script>
    <script type="text/javascript" src="assets/js/game.js"></script>
</body>

</html>