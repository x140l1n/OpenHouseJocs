//  Tamaño del Grid, a cambiar en 'style.css lin 16-17'
const GD_Size = 21;

export function drawBoard(gameBoard){

    
    var lightPositions = getLightPositions();
    var darkPositions = getDarkPositions();
    var gameBorder = getBoardBorder();

    lightPositions.forEach((pos)=>{
        var green = document.createElement('div');
        green.style.gridColumnStart = pos.x;
        green.style.gridRowStart = pos.y;
        green.classList.add('cesped1');
        gameBoard.appendChild(green);
    })
    
    darkPositions.forEach((pos)=>{
        var green = document.createElement('div');
        green.style.gridColumnStart = pos.x;
        green.style.gridRowStart = pos.y;
        green.classList.add('cesped2');
        gameBoard.appendChild(green); 
    }) 

    gameBorder.forEach((pos)=>{
        var green = document.createElement('div');
        green.style.gridColumnStart = pos.x;
        green.style.gridRowStart = pos.y;
        green.classList.add('green');
        gameBoard.appendChild(green); 
    }) 

}

function getLightPositions(){
    var positions = [];
    var pos;

    for (let i = 2; i < GD_Size; i+=2) {
        for (let j = 2; j < GD_Size; j+=2) {
            pos = {x: j, y: i}
            positions.push(pos);
        }   
    }

    for (let i = 3; i < GD_Size; i+=2) {
        for (let j = 3; j < GD_Size; j+=2) {
            pos = {x: j, y: i}
            positions.push(pos);
        }   
    }

    return positions;
}

function getBoardBorder(){

    var positions = [];

    for (let i = 0; i < GD_Size; i++) {
        
        var pos={x:i, y:1}
        positions.push(pos);
        
        var pos1={x:1, y:i}
        positions.push(pos1);
        
        var pos2 = {x:GD_Size, y:i};
        positions.push(pos2);

        var pos3 = {x:i, y:GD_Size};
        positions.push(pos3);
        
    }
    

    return positions;
}

function getDarkPositions(){
    var positions = [];
    var pos;

    for (let i = 3; i < GD_Size; i+=2) {
        for (let j = 2; j < GD_Size; j+=2) {
            pos = {x: j, y: i}
            positions.push(pos);
        }   
    }
    
    for (let i = 2; i < GD_Size; i+=2) {
        for (let j = 3; j < GD_Size; j+=2) {
            pos = {x: j, y: i}
            positions.push(pos);
        }   
    }

    return positions;

}

//  Devuelve una posición random entera para la comida
export function randomGridPosition() {
    var pos = {
        x: Math.floor(Math.random() * 25-1),
        y: Math.floor(Math.random() * 25-1)
    };
    
    if (pos.x <=1 || pos.x >= GD_Size || pos.y <=1 || pos.y >= GD_Size) {
        pos.x = Math.floor(Math.random()* 18 + 2);
        pos.y = Math.floor(Math.random()* 18 + 2);
        
    }else{
        return pos;
    }    
}

//  Devuelve true si está fuera del grid
export function outsideBoard(position) {
    
    if (position.x <= 1 || position.x > GD_Size-1 || position.y <= 1 || position.y > GD_Size-1) {
        return true;
    }else{return false;}
}