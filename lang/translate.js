//Define language via window hash
if (window.location.hash) {
  if (window.location.hash === "#es") {
    drawValue(language.es);
  } else if (window.location.hash === "#en") {
    drawValue(language.en);
  } else if (window.location.hash === "#cat") {
    drawValue(language.cat);
  }
}

function drawValue(objectValue) {
  let objKey = Object.keys(objectValue);
  let objValue = Object.values(objectValue);

  for (let i = 0; i < objKey.length; i++) {
    document.getElementById(objKey[i]).textContent = objValue[i];
  }
}
