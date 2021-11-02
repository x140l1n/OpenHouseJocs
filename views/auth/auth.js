let formacions = [
    "Comerç i Màrqueting",
    "Hoteleria i Turisme",
    "Informàtica i Comunicacions",
    "Administració i Gestió"
];

let ciclo = [
    "Grau mitjà activitats comercials",
    "Grau superior màrqueting i publicitat",
    "Grau superior comerç internacional",
    "Grau superior agències de viatges i gestió d’esdeveniments",
    "Grau superior desenvolupament aplicacions multiplataforma",
    "Grau superior desenvolupament aplicacions web",
    "Grau mitjà gestió administrativa",
    "Grau superior administració i finances",
    "Grau superior assistència a la direcció"
];

let formacionDropdown = "dropdownFormacionButton";
let cicloDropdown = "dropdownCicloButton";

// Es para crear y rellenar menú desplegable
function myFormacions(myArray, myId) {
    let parent = document.getElementById(myId);
    for (let i = 0; i < myArray.length; i++) {
        let list = document.createElement("li");
        let input = document.createElement("input"); 
        let label = document.createElement("label");

        input.type = "checkbox";
        input.setAttribute("value", myArray[i]);
        input.setAttribute("class", "m-2");
        input.setAttribute("id", i);

        label.appendChild(document.createTextNode(myArray[i]));
        label.setAttribute("for", i);

        list.setAttribute("class", "mx-2 py-1");
        
        parent.appendChild(list);
        list.appendChild(input);
        list.appendChild(label);
    }
}

window.onload = function() {
    myFormacions(formacions, formacionDropdown);
    myFormacions(ciclo, cicloDropdown);
}