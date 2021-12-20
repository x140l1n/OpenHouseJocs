document.addEventListener("DOMContentLoaded", init);

/**
 * When the document is loaded.
 * @param {Event} e  Contains a number of properties that describe the event that occurred.
 */
function init(e) {
    //Get the element target (document).
    let document = e.target;

    //Fire the event switch dark mode when clicked at the icon.
    let iconDarkMode = document.querySelector("#switchDarkMode + i");
    iconDarkMode.addEventListener("click", function (e) {
        document.querySelector("#switchDarkMode").click();
    });

    let menuOptions = document.querySelector("#menu-options");

    if (menuOptions)
        menuOptions.querySelectorAll("a").forEach((element) => {
            if (element.href == window.location.href) {
                element.classList.add("active");
            } else {
                element.classList.remove("active");
            }
        });

    //Check the input email when typing.
    let inputEmail = document.querySelector("#input-email");

    if (inputEmail) {
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
    }

    //Event toggle password.
    let togglePassword = document.querySelectorAll("span[name='toggle-password']");

    if (togglePassword) {
        togglePassword.forEach((toggle) => {
            toggle.addEventListener("click", function (e) {
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
        })
    }
}