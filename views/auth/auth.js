const EMAILPATTERN =
  /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

let nameDiv = document.getElementById("nameDiv");
let surNameDiv = document.getElementById("surnameDiv");
let nicknameDiv = document.getElementById("nicknameDiv");
let cicloDiv = document.getElementById("cicloDiv");

let email = document.getElementById("emailInput");
let nameInput = document.getElementById("nameInput");
let surNameInput = document.getElementById("surnameInput");
let nicknameInput = document.getElementById("nicknameInput");
let myDropdownF = document.getElementsByName("formacions");
let myDropdownC = document.getElementsByName("ciclo");

let userInfo;

let family;
let cycles;
let checkedCB = [];
let checkedCBCycles = [];
let userExist = true;

//this will validate inputs and check if email pattern is correct
function validateInput(inputId) {
  let found = false;
  let objKey = Object.keys(userInfo);
  let objValue = Object.values(userInfo);

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
    let emailTest = EMAILPATTERN.test(inputId.value);

    if (emailTest == false) {
      inputId.setAttribute("class", "form-control is-invalid");
    } else if (emailTest == true) {
      inputId.setAttribute("class", "form-control is-valid");

      for (let i = 0; i < objKey.length; i++) {
        if (inputId.value === objValue[i].email) {
          nameDiv.style.display = "none";
          surNameDiv.style.display = "none";
          cicloDiv.style.display = "none";
          nicknameDiv.style.display = "none";
          userExist = true;
          found = true;
        }
        
      }

      if (found === false) {
         nameDiv.style.display = "block";
         surNameDiv.style.display = "block";
         cicloDiv.style.display = "block";
        nicknameDiv.style.display = "block";
        userExist = false;
      }
    }
  }
}

//this will check and push checkbox selected value in array;
function reviewCheckBox() {
  let objKeys = Object.keys(family);
  let objValues = Object.values(family);
  checkedCB = [];

  for (let j = 0; j < objKeys.length; j++) {
    if (document.getElementById(objValues[j].id).checked) {
      checkedCB.push(objValues[j]);
      console.log(checkedCB);
      itChecked = true;
    }
  }
  myDropdown();
}

//this will check and push checkbox selected value in array;
function reviewCheckBoxCycle() {
  let objKeys = Object.keys(cycles);
  let objValues = Object.values(cycles);

  for (let j = 0; j < objKeys.length; j++) {
    if (document.getElementById(objValues[j].id).checked) {
      checkedCBCycles.push(objValues[j]);
      console.log(checkedCBCycles);
      itChecked = true;
    }
  }
}

// To  create dropdown and populate
function myDropdown() {
  let parent = document.getElementById("dropdownCicloButton");
  while (parent.firstChild) {
    parent.removeChild(parent.lastChild);
  }

  for (let i = 0; i < checkedCB.length; i++) {
    let objKeys = Object.keys(cycles);
    for (let j = 0; j < objKeys.length; j++) {
      let objValues = Object.values(cycles);

      if (checkedCB[i].id === objValues[j].id_family) {
        let list = document.createElement("li");
        let input = document.createElement("input");
        let label = document.createElement("label");
        input.type = "checkbox";
        input.setAttribute("value", objValues[j].name);
        input.setAttribute("class", "m-2");
        input.setAttribute("id", objValues[j].id);
        input.setAttribute("name", objValues[j].name);
        //input.setAttribute("onchange", "reviewCheckBoxCycle()");

        label.setAttribute("for", objValues[j].id);
        label.textContent = objValues[j].name;

        list.setAttribute("class", "mx-2 py-1");

        parent.appendChild(list);
        list.appendChild(input);
        list.appendChild(label);
      }
    }
  }
}

//this is when form is sent and will save user with it's information.
function submitForm() {
  if (!userExist) {
    insert_user_info(
      email.value,
      nameInput.value,
      surNameInput.value,
      nicknameInput.value
    );
    window.location.href = "../gameSelect/gameSelect.php";
  } else if (userExist) {
    window.location.href = "../gameSelect/gameSelect.php";
  } else {
    alert("ERROR");
  }
}

//this will check if an input is empty or not
function checkInput() {
  console.log(checkedCB.length)
  console.log(checkedCBCycles.length);
  if (userExist) {
    if ((email.value !== null || email.value !== "") && checkedCB.length != 0) {
      submitForm();
    }
  } else if (
    (email.value !== null || email.value !== "") &&
    (nameInput.value !== null || nameInput.value !== "") &&
    (surNameInput.value !== null || surNameInput.value !== "") &&
    (nicknameInput.value !== null || nicknameInput.value !== "") &&
    checkedCB.length != 0 //&&
    //checkedCBCycles.length !== 0
  ) {
    submitForm();
  }
}

// wait for window to load before calling and loading functions
window.onload = function () {
  get_family();
  get_cycles();
  get_users();
  nameDiv.style.display = "none";
  surNameDiv.style.display = "none";
  cicloDiv.style.display = "none";
  nicknameDiv.style.display = "none";
  //document.getElementById("submitBtn").disabled = true;
};
