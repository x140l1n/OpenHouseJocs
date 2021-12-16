document.addEventListener("DOMContentLoaded", init);

/**
 * When the document is loaded.
 * @param {Event} e  Contains a number of properties that describe the event that occurred.
 */
function init(e) {
    //Get the element target (document).
    let document = e.target;

    document.querySelector("#table-users").addEventListener("click", function (e) {
        let action = e.target.dataset.action;

        //If clicked in icon of button.
        if (!action) {
            action = e.target.parentElement.dataset.action;
        }

        switch (action) {
            case "show-user":
                show_modal_user(e.target, false);
                break;
            case "edit-user":
                show_modal_user(e.target, true);
                break;
            case "delete-user":
                show_modal_delete(e);
                break;
        }
    });
}

function show_modal_user(target, isEdit) {
    let row = target.closest("tr").querySelectorAll("td");

    let id = row[0].innerText;
    let nickname = row[1].innerText;
    let nombre = row[2].innerText;
    let apellidos = row[3].innerText;
    let email = row[4].innerText;
    let rol = row[5].innerText;
    let tiempo_jugado = row[6].innerText;
    let fecha_hora_registro = row[7].innerText;

 
    if (isEdit) {

    }

    /*new bootstrap.Modal(document.querySelector("#modal-user"), {
        keyboard: false,
    }).show();*/
}

function show_modal_delete(e) {
    let id = target.closest("tr").querySelectorAll("td")[0].innerText;

   /* new bootstrap.Modal(document.querySelector("#modal-user"), {
        keyboard: false,
    }).show();*/
}