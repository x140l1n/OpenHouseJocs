/////////////////////////////
//         VARIABLES       //
////////////////////////////

let platforms = [];
let newPlatform;

let goodThings = [];
let badThings = [];

let scoreFinal = 0;

let minute = 2;
let seconds = 0;
let time;

/////////////////////////////
//          DOODLER         //
////////////////////////////

//doodler creation with it's style
function createDoodler() {
  GRID.appendChild(DOODLER);
  DOODLER.classList.add("doodler");
  //so that doodler won't go anywhere
  doodlerLeftSpace = platforms[0].left;
  DOODLER.style.left = doodlerLeftSpace + "px";
  DOODLER.style.bottom = doodlerBottomSpace + "px";
  DOODLER.src = "images/doodler.png";
}

/////////////////////////////
//        PLATFORM         //
////////////////////////////

//this is the platforms with it's style
class Platform {
  constructor(newPlatformBottom) {
    this.bottom = newPlatformBottom;
    this.left = Math.random() * (GRIDWIDTH - platformWidth);
    this.visual = document.createElement("div");

    const visual = this.visual;
    visual.classList.add("platform");
    visual.style.left = this.left + "px";
    visual.style.bottom = this.bottom + "px";
    GRID.appendChild(visual);
  }
}

// this will create all the platforms
function createPlatfoms() {
  for (let i = 0; i < platformCount; i++) {
    let platformGap = GRIDHEIGHT / platformCount;
    let newPlatformBottom = 100 + i * platformGap;
    let newPlatform = new Platform(newPlatformBottom);
    platforms.push(newPlatform); //pushing newly created platform into this array
  }
}

/////////////////////////////
//          THINGS         //
////////////////////////////

//random
function createThing(min, max) {
  return Math.floor(Math.random() * (max - min + 1) + min);
}

//goodThing style
class Thing {
  constructor(thingPos, num) {
    this.bottom = thingPos.bottom + 15;
    this.left = thingPos.left + 15; //grid width - platform width
    this.visual = document.createElement("div");
//depending on a random number it will create a platform with or without special things
    let visual = this.visual;
    switch (num) {
      case 1:
        visual.classList.add("goodThing");
        visual.id = "goodThing";
        let numpos = createThing(0, job_oportunities.length - 1);
        visual.style.color = "white";
        visual.style.fontSize = "20px";
        visual.innerHTML = job_oportunities[numpos].job;
        break;
      case 2:
        visual.classList.add("badThing");
        visual.style.color = "pink";
        visual.style.fontSize = "25px";
        visual.innerHTML = "-2";
        break;
      default:
        break;
    }

    visual.style.left = this.left + "px";
    visual.style.bottom = this.bottom + "px";
    visual.style.animation = "appear 0.4s";
    visual.style.margin = "0";

    GRID.appendChild(visual);
  }
}
//create new thing
function createNewThing(newPlatform, random) {
  switch (random) {
    case 1:
      let newGoodThing = new Thing(newPlatform, random);
      goodThings.push(newGoodThing);
      break;
    case 2:
      let newBadThing = new Thing(newPlatform, random);
      badThings.push(newBadThing);
      break;
    default:
      break;
  }
}
/////////////////////////////
//          SCORE          //
////////////////////////////

//score
function countScore(score) {
  document.getElementById("score").innerHTML = "PUNTS: " + score;
}

//final score
function displayFinalScreen() {
  //Calculation of final score
  if (score === 0) {
    minute = 0;
    seconds = 0;
    result = 0;
  } else if (score != 0 && (minute != 0 || seconds != 0)) {
    result = score + (120 - (minute * 60 + seconds));
  } else {
    result = score + (120 - (minute * 60 + seconds)) + 200;
  }
  scoreFinal = result;

  GRID.innerHTML = "game over <br>" + scoreFinal;
  GRID.style.color = "white";
  GRID.style.fontSize = "50px";

  let home = document.createElement("button");
  let playAgain = document.createElement("button");

  home.innerHTML = "Tornar";
  home.className = "home";
  home.style.animation = "appear 0.4s";
  home.addEventListener("click", homePage);

  playAgain.innerHTML = "Tornar a jugar";
  playAgain.className = "again";
  playAgain.style.animation = "appear 0.4s";
  playAgain.addEventListener("click", start);

  //displaying all all ciclos
  let contText = document.createElement("div");
  let cycle_title = document.createElement("h1");
  let cycle_descripion = document.createElement("p");

  contText.style.margin = "0 1rem 0 1rem";
  contText.style.borderStyle = "dashed solid";
  contText.style.borderColor = "grey";

  cycle_title.className = "cycle";
  cycle_title.innerHTML = cyclesdesc[0].cicle + ":";
  cycle_title.style.fontWeight = "bold";
  contText.appendChild(cycle_title);

  cycle_descripion.className = "cycle";
  cycle_descripion.innerHTML = cyclesdesc[0].description;
  cycle_descripion.style.fontWeight = "100";
  contText.appendChild(cycle_descripion);

  //displaying all job oportunities
  for (let index = 0; index < job_oportunities.length; index++) {
    let job_title = document.createElement("h1");
    let job_descripion = document.createElement("p");

    job_title.className = "cycle";
    job_title.innerHTML = job_oportunities[index].job + ":";
    job_title.style.fontWeight = "bold";
    contText.appendChild(job_title);

    job_descripion.className = "cycle";
    job_descripion.innerHTML = job_oportunities[index].description;
    job_descripion.style.fontWeight = "100";
    contText.appendChild(job_descripion);
  }

  GRID.appendChild(contText);
  GRID.appendChild(home);
  GRID.appendChild(playAgain);
}

/////////////////////////////
//          TIME           //
////////////////////////////

function timedCount() {
  //start time
  time = setTimeout(timedCount, 1000);
  if (seconds > 0) {
    seconds -= 1;
  } else if (seconds == 0 && minute > 0) {
    minute -= 1;
    seconds = 59;
  } else if (minute == 0 && seconds == 0) {
    gameOver();
  }
//format time to 00:00
  let formattedMinute = ("0" + minute).slice(-2);
  let formattedSeconds = ("0" + seconds).slice(-2);
  document.getElementById("time").innerHTML =
    "TEMPS: " + formattedMinute + ":" + formattedSeconds;
}

/////////////////////////////
//        HOME PAGE        //
////////////////////////////

function homePage() {
  //stops doodler + platform

  isGameOver = false;
//delete all children
  while (GRID.firstChild) {
    GRID.removeChild(GRID.firstChild);
  }
//time and score invisible
  document.getElementById("time").innerHTML = " ";
  document.getElementById("score").innerHTML = " ";

//creation of homapge btn (jugar, instrucció, ranking)
  let box = document.createElement("div");
  let play = document.createElement("button");
  let instruction = document.createElement("button");
  let scoreBoard = document.createElement("button");
  let menuBackBtn = document.createElement("button");
  let text = document.createElement("p");

  text.className = "anim-typewriter";
  text.style.fontSize = "100px";
  text.style.color = "white";
  text.textContent = "DOODLE JUMP";

  box.className = "boxBtn";

  play.className = "buttons";
  play.id = "play";
  play.innerHTML = "Jugar!";
  play.style.margin = "0";
  play.addEventListener("click", start);

  instruction.className = "buttons";
  instruction.id = "instruction";
  instruction.innerHTML = "Instrucció";
  instruction.addEventListener("click", displayInstruccions);

  scoreBoard.className = "buttons";
  scoreBoard.id = "scoreBoard";
  scoreBoard.innerHTML = "Ranking";
  scoreBoard.addEventListener("click", displayRank);

  menuBackBtn.className = "buttons";
  menuBackBtn.style.width = "auto";
  menuBackBtn.id = "menuBackBtn";
  menuBackBtn.innerHTML = "Tornar al menú";
  menuBackBtn.addEventListener(
    "click", function () {
      window.location.href =
        "../../views/gameSelect/gameSelect.php";
    }
  );

  GRID.appendChild(text);
  GRID.appendChild(box);
  box.appendChild(play);
  box.appendChild(instruction);
  box.appendChild(scoreBoard);
  box.appendChild(menuBackBtn);
}

/////////////////////////////
//          Modal          //
////////////////////////////

function displayInstruccions() {
  Swal.fire({
    allowOutsideClick: false,
    title: "Instrucció",
    html:
      "<div class= 'left'> <span style='padding-top: 10px'> PREMEU EL SPACEBAR PER COMENÇAR A SALTAR!!! </span> </div> " +
      "<div class= 'left'> <img src='images/left.png' alt='left arrow' height='42' width='42'> <span style='padding-top: 10px'> per moure a l'esquerra </span> </div> " +
      "<div class= 'left'> <img src='images/right.png' alt='left arrow' height='42' width='42'> <span style='padding-top: 10px'> per moure a la dreta </span> </div> " +
      "<div class= 'left'> <span style='padding-top: 10px'> * text : +2pts </span> </div> " +
      "<div class= 'left'> <span style='padding-top: 10px'> * -2 : -2pts </span> </div> " +
      "<div class= 'left'> <span style='padding-top: 10px'> * platformas: 1pt </span> </div> " +
      "<div class= 'left'> <p style='padding-top: 10px; font-weight: bold'> * Puntuació Total: el temps + els punts (si et qeudas sense temps et sumará 200pts en el total) </p> </div> " +
      "<div class= 'left'> <p style='padding-top: 10px; font-weight: bold'> * Pots travessar les parets  </p> </div> ",
    icon: "question",
    showCancelButton: true,

    confirmButtonColor: "#f6e7d1",
    cancelButtonColor: "#d308087d",

    confirmButtonText: "Començar a jugar!",
    cancelButtonText: "Tornar",
  }).then((result) => {
    if (result.isConfirmed) {
      start();
    } else {
      homePage();
    }
  });
}

function displayRank() {
  //delete all children
  while (GRID.firstChild) {
    GRID.removeChild(GRID.firstChild);
  }
//create table for ranking
  let table = document.createElement("table");
  let home = document.createElement("button");

  home.innerHTML = "tornar";
  home.className = "home";
  home.style.animation = "appear 0.4s";
  home.addEventListener("click", homePage);
  GRID.innerHTML = "Ranking";
  GRID.style.color = "white";
  table.style.margin = "auto";
  table.style.marginTop = "2rem";

  get_ranking(table, id_game, user_id, cycle_id);

  GRID.appendChild(home);
  GRID.appendChild(table);
}
