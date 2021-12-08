let formacions = [
  "Comerç i Màrqueting",
  "Hoteleria i Turisme",
  "Informàtica i Comunicacions",
  "Administració i Gestió",
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
  "Grau superior assistència a la direcció",
];

//this will be deleted
let emailUser = "example@example.com";
//---------

const emailPattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

let nameDiv = document.getElementById("nameDiv");
let surNameDiv = document.getElementById("surnameDiv");
let cicloDiv = document.getElementById("cicloDiv");

let email = document.getElementById("emailInput");
let nameInput = document.getElementById("nameInput");
let surNameInput = document.getElementById("surnameInput");
let myDropdownF = document.getElementsByName("formacions");
let myDropdownC = document.getElementsByName("ciclo");

let userInfo = [];
let fselect = [];
let cselect = [];

// To  create dropdown and populate
function myFormacions(myArray, myId) {
  let parent = document.getElementById(myId);
  let idName;

  if (myArray == formacions) {
    idName = "formacions";
  } else if (myArray == ciclo) {
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

//this will validate inputs and check if email pattern is correct
function validateInput(inputId) {
  if (inputId.type == "text") {
    if (
      inputId.value == "" ||
      inputId.value == null ||
      inputId.value == undefined
    ) {
      inputId.setAttribute("class", "form-control is-invalid");
    } else {
      inputId.setAttribute("class", "form-control is-valid");
    }
  } else if (inputId.type == "email") {
    let emailTest = emailPattern.test(inputId.value);

    if (emailTest == false) {
      inputId.setAttribute("class", "form-control is-invalid");
    } else if (emailTest == true) {
      inputId.setAttribute("class", "form-control is-valid");
      if (inputId.value !== emailUser) {
        nameDiv.style.display = "block";
        surNameDiv.style.display = "block";
        cicloDiv.style.display = "block";
      } else {
        nameDiv.style.display = "none";
        surNameDiv.style.display = "none";
        cicloDiv.style.display = "none";
      }
    }
  }
}

//this will check and push checkbox selected value in array;
function reviewCheckBox(myCheckbox, selected) {
  let total = myCheckbox.length;
  for (let i = 0; i < total; i++) {
    if (myCheckbox[i].checked) {
      selected.push(myCheckbox[i].value);
    } else {
      i++;
    }
  }

  return selected;
}

//this is when form is sent and will save user with it's information.
function submitForm() {
  if (email.value == emailUser && email.value !== "") {
    reviewCheckBox(myDropdownF, fselect);
    userInfo["email"] = email.value;
    userInfo["formacions"] = fselect;
  } else {
    reviewCheckBox(myDropdownF, fselect);
    reviewCheckBox(myDropdownC, cselect);

    userInfo["email"].push(email.value);
    userInfo["name"].push(nameInput.value);
    userInfo["surname"].push(surNameInput.value);
    userInfo["formacions"].push(fselect);
    userInfo["ciclo"].push(cselect);
  }
}

//this will check if an input is empty or not
function checkInput() {
  if (email.value == emailUser) {
    if (
      (email.value !== null || email.value !== "") &&
      myDropdownF.checked !== ""
    ) {
      submitForm();
    }
  } else if (
    (email.value !== null || email.value !== "") &&
    (nameInput.value !== null || nameInput.value !== "") &&
    (surNameInput.value !== null || surNameInput.value !== "") &&
    myDropdownF.checked !== "" &&
    myDropdownC.checked !== ""
  ) {
    submitForm();
  }
}

// wait for window to load before calling and loading functions
window.onload = function () {
  nameDiv.style.display = "none";
  surNameDiv.style.display = "none";
  cicloDiv.style.display = "none";
  myFormacions(formacions, "dropdownFormacionButton");
  myFormacions(ciclo, "dropdownCicloButton");
  reviewCheckBox(myDropdownF, fselect);
};
