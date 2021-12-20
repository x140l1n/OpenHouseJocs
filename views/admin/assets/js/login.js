document.addEventListener("DOMContentLoaded", init);

/**
 * When the document is loaded.
 * @param {Event} e  Contains a number of properties that describe the event that occurred.
 */
function init(e) {
  //Get the element target (document).
  let document = e.target;

  //Check the input email when typing.
  let inputEmail = document.querySelector("#input-email");
  inputEmail.addEventListener("input", function (e) {
    let input = e.target;
    let errorLabel = document.querySelector(input.getAttribute("error-label"));

    //If the value is not empty.
    if (input.value.trim()) {
      //From functions.js.
      if (validateEmail(input.value)) {
        input.classList.remove("border-danger");
        input.classList.add("border-success");
        errorLabel.classList.add("invisible");
        errorLabel.innerText = "Error";
      } else {
        input.classList.add("border-danger");
        input.classList.remove("border-success");
        errorLabel.classList.remove("invisible");
        errorLabel.innerText = "El email no es válido.";
      }
    } else {
      input.classList.remove("border-success");
      input.classList.remove("border-danger");
      errorLabel.classList.add("invisible");
      errorLabel.innerText = "Error";
    }
  });

  //Event toggle password.
  let togglePassword = document.querySelector("#toggle-password");
  togglePassword.addEventListener("click", function (e) {
    let element = e.currentTarget;

    let inputPassword = document.querySelector(
      element.getAttribute("input-toggle")
    );

    if (equalsIgnoreCase(inputPassword.getAttribute("type"), "password")) {
      inputPassword.setAttribute("type", "text");
      element.firstChild.classList.toggle("fa-eye");
      element.firstChild.classList.toggle("fa-eye-slash");
    } else {
      inputPassword.setAttribute("type", "password");
      element.firstChild.classList.toggle("fa-eye");
      element.firstChild.classList.toggle("fa-eye-slash");
    }
  });

  //Form submit event
  let formLogin = document.forms["form-login"];
  formLogin.addEventListener("submit", function (e) {
    e.preventDefault();

    let form = e.target;

    let email = document.querySelector("#input-email").value;

    //Validate the email.
    if (validateEmail(email)) {
      //Add login animation and disable button submit.
      form.querySelector("button[type='submit']").innerHTML = "<i class='fas fa-spinner fa-spin'></i>";
      form.querySelector("button[type='submit']").disabled = true;

      //Login and process the promise.
      post("/user/login", new FormData(e.target)).then(function (response) {
        //Remove login animation and disable button submit.
        form.querySelector("button[type='submit']").innerHTML = "Acceder";
        form.querySelector("button[type='submit']").disabled = false;

        //If the status code is 200. Login successful.
        if (response.status === 200) {
          //Remove message error.
          form.querySelector("#message-error").classList.add("invisible");
          form.querySelector("#message-error").innerText = "Error";

          window.location.href = `${BASE_URL}/views/dashboard.php`;
        } else {
          //Display message error.
          form.querySelector("#message-error").classList.remove("invisible");

          if (response.status === 401) {
            form.querySelector("#message-error").innerText = "Usuario o contraseña incorrecta.";
          } else {
            form.querySelector("#message-error").innerText = "Ha ocurrido un error inesperado...";
          }
        }
      });
    }
  });
}