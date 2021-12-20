document.addEventListener("DOMContentLoaded", init);

const MODAL_CONFIRM_DELETE = new bootstrap.Modal(
    document.querySelector("#modal-confirm-delete"),
    {
        keyboard: false,
    }
);

const TOAST_NOTI = new bootstrap.Toast(document.querySelector("#toast-noti"));
const BUTTON_DELETE_USER = document.querySelector("#btn-delete-user");
const TABLE_USERS = document.querySelector("#table-users");
const INPUT_SEARCH = document.querySelector("#input-search");
const SELECT_SEARCH_BY = document.querySelector("#select-search-by");
const SELECT_ROLS = document.querySelector("#select-rols");

let timeout_search = null;

/**
 * When the document is loaded.
 * @param {Event} e  Contains a number of properties that describe the event that occurred.
 */
function init(e) {
    //Get the element target (document).
    let document = e.target;

    document.querySelector("#btn-refresh").addEventListener("click", loadUsers);

    document
        .querySelector("#table-users")
        .addEventListener("click", function (e) {
            let action = e.target.dataset.action;
            let id_user = e.target.dataset.idUser;

            //If clicked in icon of button.
            if (!action) {
                action = e.target.parentElement.dataset.action;
                id_user = e.target.parentElement.dataset.idUser;
            }

            switch (action) {
                case "show-user":
                    show_modal_user(e.target, false, id_user);
                    break;
                case "edit-user":
                    show_modal_user(e.target, true, id_user);
                    break;
                case "delete-user":
                    show_modal_delete(e, id_user);
                    break;
            }
        });

    document
        .querySelector("#modal-confirm-delete")
        .addEventListener("hide.bs.modal", function (e) {
            BUTTON_DELETE_USER.dataset.idUser = "-1";
        });

    document.querySelector("#toast-noti").addEventListener("hide.bs.toast", function (e) {
        e.target.querySelector("#toast-body").innerHTML = "";
    });

    BUTTON_DELETE_USER.addEventListener("click", function (e) {
        let id_user = e.target.dataset.idUser;

        deleteUser(id_user);
    });

    INPUT_SEARCH.addEventListener("input", function (e) {
        clearTimeout(timeout_search);

        TABLE_USERS.tBodies[0].innerHTML = `<tr><td colspan='8'><i class='fas fa-spinner fa-spin fa-2x my-3'></i></td></tr>`;

        timeout_search = setTimeout(loadUsers, 200);
    });

    SELECT_SEARCH_BY.addEventListener("change", loadUsers);
    SELECT_ROLS.addEventListener("change", loadUsers);

    loadRols();
    loadUsers();
}

function show_modal_user(target, is_edit, id_user) {
    let row = target.closest("tr").querySelectorAll("td");

    let nickname = row[1].innerText;
    let nombre = row[2].innerText;
    let apellidos = row[3].innerText;
    let email = row[4].innerText;
    let rol = row[5].innerText;
    let tiempo_jugado = row[6].innerText;
    let fecha_hora_registro = row[7].innerText;

    if (is_edit) {
    }

    /*new bootstrap.Modal(document.querySelector("#modal-user"), {
          keyboard: false,
      }).show();*/
}

function show_modal_delete(e, id_user) {
    BUTTON_DELETE_USER.dataset.idUser = id_user;
    MODAL_CONFIRM_DELETE.show();
}

function loadRols() {
    get("/rol/all").then((response) => {
        let data = response.data.data;

        let options = "<option value='0'>Selecciona un rol...</option>";

        if (data.length > 0) {
            data.forEach((rol) => {
                options += `<option value="${rol.id}">${rol.name}</option>`;
            });

            SELECT_ROLS.innerHTML = options;
        }
    });
}

function loadUsers() {
    let search = INPUT_SEARCH.value;
    let search_by = SELECT_SEARCH_BY.value;
    let id_rol = SELECT_ROLS.value;

    TABLE_USERS.tBodies[0].innerHTML = `<tr><td colspan='8'><i class='fas fa-spinner fa-spin fa-2x my-3'></i></td></tr>`;

    post("/user/all", {
        search: search,
        search_by: search_by,
        id_rol: id_rol,
    }).then((response) => {
        let data = response.data.data;

        document.querySelector("#total-records").innerText = data.length;

        render_table_users(TABLE_USERS.tBodies[0], data);
    });
}

function render_table_users(tbody, data) {
    if (data.length > 0) {
        let _tbody = "";

        data.forEach((user) => {
            _tbody += `<tr>
                        <td>${user.id}</td>
                        <td>${user.nickname}</td>
                        <td>${user.firstname}</td>
                        <td>${user.lastname}</td>
                        <td>${user.email}</td>
                        <td>${user.rol}</td>
                        <td>${user.created_at}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm my-1" title="Ver usuario" data-action="show-user" data-id-user="${user.id}"><i class="fas fa-eye fa-fw"></i></button>
                            <button type="button" class="btn btn-success btn-sm my-1" title="Editar usuario" data-action="edit-user" data-id-user="${user.id}"><i class="fas fa-edit fa-fw"></i></button>
                            <button type="button" class="btn btn-danger btn-sm my-1" title="Eliminar usuario" data-action="delete-user" data-id-user="${user.id}"><i class="fas fa-trash fa-fw"></i></button>
                        </td>
                    </tr>`;
        });

        tbody.innerHTML = _tbody;
    } else {
        tbody.innerHTML =
            "<tr><td colspan='8'>No hay registros con estos parámetros.</td></tr>";
    }
}

function deleteUser(id) {
    if (id != -1) {
        BUTTON_DELETE_USER.disabled = true;
        BUTTON_DELETE_USER.innerText = "Eliminando...";

        setTimeout(() => {
            post("/user/delete", { id: id }).then((response) => {
                let data = response.data.data;
    
                if (data == id) {
                    showNoti("Eliminado correctamente.", "bg-success");
                        
                    MODAL_CONFIRM_DELETE.hide();

                    loadUsers();
                } else {
                    showNoti("No se ha podido eliminar el usuario.", "bg-danger");
                }
    
                BUTTON_DELETE_USER.disabled = false;
                BUTTON_DELETE_USER.innerText = "Eliminar";
            });
        }, 500);
    }
}

function showNoti(text, bg_color) {
    TOAST_NOTI.show();
    document.querySelector("#toast-noti").classList.remove("bg-success", "bg-danger");
    document.querySelector("#toast-noti").classList.add(bg_color);
    document.querySelector("#toast-body").innerText = text;

    setTimeout(() => {
        TOAST_NOTI.hide();
    }, 4000);
}