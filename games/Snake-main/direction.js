//  input - direccion actual         //
//  lastInput - direccion anterior   //
let rotation = 0;
let lastRotation = 0;


let input = { x: 0, y: 0 }
let lastInput = { x: 0, y: 0 }

//  añadimos un eventListener para ver qué teclas clica el usuario

window.addEventListener('keydown', e => {
    switch (e.key) {
        //  Caso arriba, abajo, izquierda, derecha
        case 'ArrowUp' :


            rotation = 180;
            
            //  Sólo hace caso si la serpiente va en horizontal                 //
            //                                                                  //
            //  Si ya iba ya hacia arriba, sigue y si pulsasa abajo no          //
            //  hace caso de la flecha hacia abajo y así en el resto de casos   //
            if (lastInput.y !== 0) break
            input = { x: 0, y: -1 }
            break
        case 'ArrowDown' :

            rotation = 0;

            if (lastInput.y !== 0) break
            input = { x: 0, y: 1 }
            break
        case 'ArrowLeft' :

            rotation = 90;

            if (lastInput.x !== 0) break
            input = { x: -1, y: 0 }
            break
        case 'ArrowRight' :

            rotation = -90;

            if (lastInput.x !== 0) break
            input = { x: 1, y: 0 }
            break
        }
        

        if(rotation == 360){rotation = 0} return;
        
})

export function getTailRotation(){
    return rotation+90;
}

export function getRotation(){
    lastRotation = rotation;
    return rotation;
}

//  Ahora nuestro nuevo input pasa a ser el antiguo
//  Devuelve el valor x e y en input
export function getDirection() {
    lastInput = input
    return input
}