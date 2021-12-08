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

/**
 * Check if email is valid
 * @param {String} email The email to check.
 * @return {Boolean} Return true if the email is valid, otherwise, false.
 */
function validateEmail(email) {
  const re =
    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

/**
 * Case insensitive values comparison.
 * @param {String} value1 The value1 to compare.
 * @param {String} value2 The value2 to comapre.
 * @return {Boolean} Return true if the two values is equals, otherwise, false.
 */
function equalsIgnoreCase(value1, value2) {
  value1 = value1.toLowerCase();
  value2 = value2.toLowerCase();

  return value1 === value2;
}
