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

const nameDiv = document.getElementById("nameDiv");
const surNameDiv = document.getElementById("surnameDiv");
const cicloDiv = document.getElementById("cicloDiv");

const emailPattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

//this will be deleted
let emailUser = "example@example.com";

// To  create dropdown and populate
function myFormacions(myArray, myId) {
    let parent = document.getElementById(myId);
    let idName;

    if (myArray == formacions) {
        idName = "formacions";
    } else if(myArray == ciclo) {
        idName = "ciclo";
    }

    for (let i = 0; i < myArray.length; i++) {
        let list = document.createElement("li");
        let input = document.createElement("input"); 
        let label = document.createElement("label");

        input.type = "checkbox";
        input.setAttribute("value", myArray[i]);
        input.setAttribute("class", "m-2");
        input.setAttribute("id", idName + i);
        input.setAttribute("name", idName);

        label.appendChild(document.createTextNode(myArray[i]));
        label.setAttribute("for", i);

        list.setAttribute("class", "mx-2 py-1");
        
        parent.appendChild(list);
        list.appendChild(input);
        list.appendChild(label);
    }
}

//this function will test if email pattern is correct and will return a boolean.
function validateEmail(email) {
    let emailTest = emailPattern.test(email.value);
    if (emailTest == false) {
        email.setAttribute("class", "form-control is-invalid");
    } else if (emailTest == true) {
        email.setAttribute("class", "form-control is-valid");
        if (email.value !== emailUser) {
            nameDiv.style.display = "block";
            surNameDiv.style.display = "block";
            cicloDiv.style.display = "block";
        } else {
            nameDiv.style.display = "none";
            surNameDiv.style.display = "none";
            cicloDiv.style.display = "none";
        }
    }

    return emailTest;
}

//this will validate input for name and surname
function validateInput(inputId) {

    if (inputId.value == "" || inputId.value == null || inputId.value == undefined) {
        inputId.setAttribute("class", "form-control is-invalid");
    } else {
        inputId.setAttribute("class", "form-control is-valid");
    }

}

//this is when form is sent and will save user with it's information.
 function myForm() {
    
    let email = document.getElementById("emailInput").value;
    let myDropdownF = document.getElementsByName("formacions");

    if (email == emailUser) {
        for (let checkboxF of myDropdownF) {  
            if (checkboxF.checked)  
              document.body.append(checkboxF.value + ' ');  
          } 
    } else if(email !== emailUser) {
        let nameInput = document.getElementById("nameInput").value;
        let surNameInput = document.getElementById("surnameInput").value;
        let myDropdownC = document.getElementsByName("ciclo");

        for (let checkboxF of myDropdownF) {  
            if (checkboxF.checked)  
            document.body.append(checkboxF.value + ' ');  
        } 

        for (let checkboxC of myDropdownC) {  
            if (checkboxC.checked)  
              document.body.append(checkboxC.value + ' ');  
          } 
        }
}



// wait for window to load before calling and loading functions
window.onload = function() {
    nameDiv.style.display = "none";
    surNameDiv.style.display = "none";
    cicloDiv.style.display = "none";
    myFormacions(formacions, formacionDropdown);
    myFormacions(ciclo, cicloDropdown);
}
