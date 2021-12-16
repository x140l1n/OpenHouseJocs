/*var arkanoid_modal = new bootstrap.Modal(document.querySelector("#ranking-modal"), {
  keyboard: false
});

myModal.show();*/

document.addEventListener("DOMContentLoaded", init);

/**
 * When the document is loaded.
 * @param {Event} e  Contains a number of properties that describe the event that occurred.
 */
function init(e) {
  //Get the element target (document).
  let document = e.target;

  document.querySelectorAll("button[name='btn-show-more']").forEach((button) =>
    button.addEventListener("click", (e) => {
      showMoreModal(e);
    })
  );
}

function showMoreModal(e) {
  let game = e.target.dataset.game;

  switch (game) {
    case "doodle-jump":
      new bootstrap.Modal(document.querySelector("#modal-doodle-jump"), {
        keyboard: false,
      }).show();

      break;
    case "snake":
      new bootstrap.Modal(document.querySelector("#modal-snake"), {
        keyboard: false,
      }).show();

      break;    
    case "space-invaders":
      new bootstrap.Modal(document.querySelector("#modal-space-invaders"), {
        keyboard: false,
      }).show();

      break;
    case "arkanoid":
      new bootstrap.Modal(document.querySelector("#modal-arkanoid"), {
        keyboard: false,
      }).show();

      break;
  }
}
