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
}

/** Add one or more listeners to an element
 * @param {DOMElement} element - DOM element to add listeners to
 * @param {String} eventNames - space separated list of event names, e.g. 'click change'
 * @param {Function} listener - function to attach for each event as a listener
 */
function addListenerMulti(element, eventNames, listener) {
    var events = eventNames.split(" ");
    for (var i = 0, iLen = events.length; i < iLen; i++) {
        element.addEventListener(events[i], listener, false);
    }
}
