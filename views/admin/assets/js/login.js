document.addEventListener("DOMContentLoaded", init);

/**
 * When the document is loaded.
 * @param {Event} e  Contains a number of properties that describe the event that occurred
 */
function init(e) {
    //Get the element target.
    let document = e.target;

    //Fire the event switch dark mode when clicked the icon.
    let iconDarkMode = document.querySelector("#switchDarkMode + i");
    iconDarkMode.addEventListener("click", function (e) {
        document.querySelector("#switchDarkMode").click();
    });

    //Check the input email.
    let inputEmail = document.querySelector("#input-email");
    inputEmail.addEventListener("input", function (e) {
        let input = e.target;
        let errorLabel = document.querySelector(input.getAttribute("error-label"));

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

        let inputPassword = document.querySelector(element.getAttribute("input-toggle"));

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
}

