import { getDirection, getRotation, getTailRotation } from "./direction.js";

//  speed - velocidad de la serpiente   //
//  snakeBody - cuerpo                  //
export var speed = 15;
const snakeBody =[{x: 11, y: 11}];
let newSnakePart = 0;


export function update() {

    //  Añadimos partes en caso de haber comido una pieza
    addParts();

    //  direction - guardamos los datos de x e y
    const direction = getDirection();
    const rotation = getRotation();

    //  Igualamos la cabeza de la serpiente al resto de partes del cuerpo   //
    //  para que la dirección afecte por orden al resto del cuerpo          //
    for (let i = snakeBody.length - 2; i >= 0; i--) {
        snakeBody[i + 1] = { ...snakeBody[i] }
    }
    snakeBody[0].x += direction.x;
    snakeBody[0].y += direction.y;


}


//  Dibuja la serpiente en el tablero
export function draw(board) {
    snakeBody.forEach(segment => {
        const rotation = getRotation();
        const snakeElement = document.createElement('div');       
 
        snakeElement.style.gridRowStart = segment.y
        snakeElement.style.gridColumnStart = segment.x

        if (segment == snakeBody[0]) {
            snakeElement.classList.add('snake-head');
            snakeElement.style.transform = 'rotate('+rotation+'deg)';  
        }else if(segment == snakeBody[snakeBody.length-1] && snakeBody.length > 1){
            snakeElement.classList.add('snake-tail');
            //snakeElement.style.transform = 'rotate('+getTailRotation()+'deg)';
        }else{
            snakeElement.classList.add('snake-body');    
        }
        snakeElement.classList.add('snake');

 
        snakeElement.style.zIndex = '50';
        
        board.appendChild(snakeElement);
    })
}

//  Añade una parte a la serpiente
export function expandSnake() {
    newSnakePart += 1;
}

//  Comprueba si la posición de la serpiente coincide con otro elemento
export function onSnake(position, ignoreHead = false ) {
    return snakeBody.some((segment, index) => {
        if (ignoreHead && index === 0) return false
        return equalPositions(segment, position)
    })
}

export function snakeHead() {
    return snakeBody[0]
}

//  Comprueba si hay alguna parte de la serpiente (cabeza) que coincida consigo misma
export function snakeIntersection() {
    return onSnake(snakeBody[0], { ignoreHead: true })
}

//  Iguala dos posiciones
function equalPositions(pos1, pos2) {
    return pos1.x === pos2.x && pos1.y === pos2.y
}

export function addSpeed(){
    speed+=1;
}


//  Añade la nueva parte dela serpiente
function addParts() {
    for (let i = 0; i < newSnakePart; i++) {
        snakeBody.push({ ...snakeBody[snakeBody.length - 1] })
    }
    newSnakePart = 0
}