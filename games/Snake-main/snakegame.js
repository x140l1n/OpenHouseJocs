import { update as updateSnake, draw as drawSnake, speed, snakeHead, snakeIntersection } from './snake.js';
import { update as updateFood, draw as drawFood } from './food.js';
import { outsideBoard, drawBoard } from './grid.js';
import { points } from './score.js';
/*import { rankPlayer } from './ranking,js';
import {points} from './score';*/


//  lastRender - Segons abans d'actual·litzar   //
//  gameOver - Controla fi del joc              //
//  board - 'Tauler' de joc                 //
let lastRender = 0;
let gameOver = false;
//let playerName = 'Rodolfo';
const btnJugar = document.getElementById('play');
const btnRank = document.getElementById('rank');
const btnInstr = document.getElementById('instr');
const btnTornar1 = document.getElementById('tornar1');
const btnTornar2 = document.getElementById('tornar2');

var score = document.getElementById('score');
var instr = document.getElementById('instructions');
var rank = document.getElementById('ranking');
var board = document.getElementById('board');
var menu = document.getElementById('menu');
var menus = document.querySelectorAll('.menu');

btnJugar.addEventListener('click', ()=>{
    score.style.display = 'flex';
    board.style.display = 'grid';
    menus.forEach(menu=>{
        menu.style.display = 'none';
    })

})

btnRank.addEventListener('click', ()=>{
    menus.forEach(menu=>{
        menu.style.display = 'none';
    })
    rank.style.display = 'flex';

})

btnInstr.addEventListener('click', ()=>{
    menus.forEach(menu=>{
        menu.style.display = 'none';
    })
    instr.style.display = 'block';

})

btnTornar1.addEventListener('click', ()=>{
    menu.style.display = 'flex';
    rank.style.display = 'none';
})

btnTornar2.addEventListener('click', ()=>{
    menu.style.display = 'flex';
    instr.style.display = 'none';
})
//Funció amb el bucle principal
function main(currentTime) {

    //  Mensaje de final de juego
    if (gameOver) {
        //rankPlayer(playerName, points);

        if (confirm('Has conseguido '+ points + ' puntos')) {
            window.location = './index.html';
        }return
        
    }
    window.requestAnimationFrame(main);

    //  lastRenderTime - segundos desde el último render    //
    //  currentTime - 'timestamps' del pc                   //
    const lastRenderTime = (currentTime - lastRender) / 1000;

    //  Fijamos la velocidad de la serpiente
    if (lastRenderTime < 1 / speed) return

    //  Diferencia de tiempos
    lastRender = currentTime;
    
    //  Se ejecutarán en bucle
    update();
    draw();
}

window.requestAnimationFrame(main);

//  Actualiza el cuerpo de la comida, la serpiente y comprueba si ha muerto
function update() {
    updateSnake();
    updateFood();
    checkDeath();
}

// Borra el tablero y diuja la serpiente con los datos actualizados
function draw() {
    board.innerHTML = '';
    drawSnake(board);
    drawBoard(board);
    drawFood(board);
}

// Comprueba fin del juego
function checkDeath() {
    if(outsideBoard(snakeHead()) || snakeIntersection()){
        gameOver = true;
    }    
}