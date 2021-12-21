document.addEventListener("DOMContentLoaded", init);

/**
 * When the document is loaded.
 * @param {Event} e  Contains a number of properties that describe the event that occurred.
 */
function init(e) {
  //Get the element target (document).
  let document = e.target;
  let cards = document.querySelectorAll(".card");
  //Fire the event switch dark mode when clicked at the icon.
  let iconDarkMode = document.querySelector("#switchDarkMode + i");
  iconDarkMode.addEventListener("click", function (e) {
    document.querySelector("#switchDarkMode").click();
  });

  let switchDarkMode = document.querySelector("#switchDarkMode");
  switchDarkMode.addEventListener("change", function (e) {

    if(!switchDarkMode.checked) {
      localStorage.setItem("dark-mode", "1");
      document.body.classList.remove("dark-mode");
      document.body.classList.add("dark-mode");
      document.getElementById("navbar").className = "navbar navbar-expand-lg navbar-dark bg-dark sticky-top";
      document.getElementById("nav-dropdown").className = "dropdown-menu dropdown-menu-dark";
      for(let carta of cards){
        carta.classList.add("text-white","bg-secondary");
      }
      document.getElementById("logo").src = "/OpenHouseJocs/media/landingPage/logoBlanc.png";
    } else {
      localStorage.setItem("dark-mode", "-1");
      document.body.classList.remove("dark-mode");
      document.getElementById("navbar").className = "navbar navbar-expand-lg navbar-light bg-light sticky-top";
      document.getElementById("nav-dropdown").className = "dropdown-menu";
      for(let carta of cards){
        carta.className = "card my-auto";
      }
      document.getElementById("logo").src = "/OpenHouseJocs/media/landingPage/logo.png";
    }
  });

  let dark_mode = localStorage.getItem("dark-mode");
    
  if (dark_mode == "1") {
      switchDarkMode.checked = false;
      document.body.classList.remove("dark-mode");
      document.body.classList.add("dark-mode");
      document.getElementById("navbar").className = "navbar navbar-expand-lg navbar-dark bg-dark sticky-top";
      document.getElementById("nav-dropdown").className = "dropdown-menu dropdown-menu-dark";
      for(let carta of cards){
        carta.classList.add("text-white","bg-secondary");
      }
      document.getElementById("logo").src = "/OpenHouseJocs/media/landingPage/logoBlanc.png";
  } else {
      switchDarkMode.checked = true;
      document.body.classList.remove("dark-mode");
      document.getElementById("navbar").className = "navbar navbar-expand-lg navbar-light bg-light sticky-top";
      document.getElementById("nav-dropdown").className = "dropdown-menu";
      for(let carta of cards){
        carta.className = "card my-auto";
      }
      document.getElementById("logo").src = "/OpenHouseJocs/media/landingPage/logo.png";
  }
}
