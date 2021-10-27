document.addEventListener("DOMContentLoaded", init);

/**
 * When the document is loaded.
 * @param {Event} e  Contains a number of properties that describe the event that occurred
 */
function init(e) {
    //Fire the event switch darkMode when clicked the icon.
    let element = e.target;
    let iconDarkMode = element.querySelector("#switchDarkMode + i");
    iconDarkMode.addEventListener("click", function () {
        element.querySelector("#switchDarkMode").click();
    });
}