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