var score = document.getElementById('points');
export var points = 0;

export function addScore(){
    points +=1;
    score.innerHTML = points; 
}

export function emptyScore(){
    score.innerHTML = '';
}