/////////////////////////////
//      WINDOW LOADED      //
////////////////////////////
document.addEventListener("DOMContentLoaded", () => {
  get_jobs(cycle_id);
  get_cycles(cycle_id);
  get_ranking();
  Swal.fire({
    allowOutsideClick: false,
    title: "En que consisteix:",
    icon: "info",
    text: "En aquest joc aprendreu quins sortides professionals els quals podeu optar, per aixo haurieu de jugar i agafar-les",
    confirmButtonText: "Perfecte!",
  }).then((result) => {
    if (result.isConfirmed) {
      homePage();
    }
  });
});

/////////////////////////////
//         VARIABLES       //
////////////////////////////

const GRID = document.querySelector(".grid");
const DOODLER = document.createElement("img");
const GRIDWIDTH = GRID.clientWidth;
const GRIDHEIGHT = GRID.clientHeight;
let velocityPlatform = 25;
let velocityJump = 25;
let velocityFall = 13;
let velocityLeft = 30;
let velocityRight = 30;

let startPoint = 400;
let doodlerLeftSpace = 50;
let platformWidth = 85;
let platformCount = 5;
let doodlerBottomSpace = startPoint;

let isGameOver = false;
let isJumping = true;
let platformTimerId;

let score;
let job_oportunities;
let cyclesdesc;
let user_id = 1;
let cycle_id = 11;
let id_game = 3

/////////////////////////////
//        GAME OVER        //
////////////////////////////

//game over
function gameOver() {
  isGameOver = true;
  //stops game
  while (GRID.firstChild) {
    GRID.removeChild(GRID.firstChild);
  }
  //stops doodler + platform
  clearInterval(upTimerId);
  clearInterval(downTimerId);
  clearInterval(leftTimerId);
  clearInterval(rightTimerId);
  clearInterval(platformTimerId);

  platforms = [];
  goodThings = [];
  badThings = [];

  displayFinalScreen(); //show final screen with info
  //stop timer
  stopCount();
  send_score(scoreFinal, id_game, user_id, cycle_id);
}

/////////////////////////////
//        START GAME       //
////////////////////////////

//start game

  function start() {
    while (GRID.firstChild) {
      GRID.removeChild(GRID.firstChild);
    }
    if (!isGameOver) {
      minute = 2;
      seconds = 0;
      score = 0;
      doodlerBottomSpace = 400;
      createPlatfoms();
      createDoodler();

      platformTimerId = setInterval(movePlatforms, velocityPlatform); //every 25/1000
      jump();
      countScore(score);
      startCountTime();
      document.addEventListener("keydown", control);
      document.addEventListener("keyup", stopControl);
    }
  }
