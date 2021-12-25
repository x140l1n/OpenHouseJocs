document.addEventListener("DOMContentLoaded", init);

const MODAL_USER = new bootstrap.Modal(
    document.querySelector("#modal-user"),
    {
        backdrop: 'static', keyboard: false,
    }
);

const MODAL_CONFIRM_DELETE = new bootstrap.Modal(
    document.querySelector("#modal-confirm-delete"),
    {
        backdrop: 'static', keyboard: false,
    }
);

const MODAL_CHANGE_PASSWORD = new bootstrap.Modal(
    document.querySelector("#modal-password"),
    {
        backdrop: 'static', keyboard: false,
    }
);

const TOAST_NOTI = new bootstrap.Toast(document.querySelector("#toast-noti"));
const BUTTON_NEW_USER = document.querySelector("#btn-new-user");
const BUTTON_DELETE_USER = document.querySelector("#btn-delete-user");
const TABLE_USERS = document.querySelector("#table-users");
const INPUT_SEARCH = document.querySelector("#input-search");
const SELECT_SEARCH_BY = document.querySelector("#select-search-by");
const SELECT_ROLS = document.querySelector("#select-rols");
const BUTTON_SUBMIT_USER = document.querySelector("#btn-submit-user");
const FORM_PASSWORD = document.querySelector("#form-password");
const FORM_USER = document.querySelector("#form-user");
const SELECT_ROLS_MODAL = document.querySelector("#select-rols-modal");

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
                case "edit-user":
                    show_modal_user(e.target, id_user);
                    break;
                case "password-user":
                    FORM_PASSWORD.dataset.idUser = id_user;
                    MODAL_CHANGE_PASSWORD.show();

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

    document
        .querySelector("#modal-user")
        .addEventListener("hide.bs.modal", function (e) {
            document.querySelectorAll("input[name='password']").forEach((input) => {
                input.setAttribute("type", "password");
                input.parentElement.parentElement.classList.remove("d-none");
                input.required = true;
            });

            document.querySelectorAll("span[name='toggle-password']").forEach((toggle) => {
                toggle.firstChild.classList.add("fa-eye");
                toggle.firstChild.classList.remove("fa-eye-slash");
            });

            SELECT_ROLS_MODAL.innerHTML = "<option value='0'>Selecciona un rol...</option>";

            BUTTON_SUBMIT_USER.innerText = "";

            FORM_USER.dataset.idUser = "-1";
            FORM_USER.reset();
            document.querySelector("#user-label").innerText = "";
        });

    document
        .querySelector("#modal-password")
        .addEventListener("hide.bs.modal", function (e) {
            document.querySelectorAll("span[name='toggle-password']").forEach((toggle) => {
                toggle.firstChild.classList.add("fa-eye");
                toggle.firstChild.classList.remove("fa-eye-slash");
            });

            FORM_PASSWORD.dataset.idUser = "-1";
            FORM_PASSWORD.reset();
        });

    document.querySelector("#toast-noti").addEventListener("hide.bs.toast", function (e) {
        e.target.querySelector("#toast-body").innerHTML = "";
    });

    BUTTON_DELETE_USER.addEventListener("click", function (e) {
        let id_user = e.target.dataset.idUser;

        _delete(id_user);
    });

    INPUT_SEARCH.addEventListener("input", function (e) {
        clearTimeout(timeout_search);

        TABLE_USERS.tBodies[0].innerHTML = `<tr><td colspan='8'><i class='fas fa-spinner fa-spin fa-2x my-3'></i></td></tr>`;

        timeout_search = setTimeout(loadUsers, 200);
    });

    BUTTON_NEW_USER.addEventListener("click", function () {
        FORM_USER.dataset.idUser = "-1";
        FORM_USER.reset();
        document.querySelector("#user-label").innerText = "CREAR NUEVO USUARIO";

        BUTTON_SUBMIT_USER.innerText = "Guardar";

        loadRols(SELECT_ROLS_MODAL);

        MODAL_USER.show();
    });

    FORM_USER.addEventListener("submit", function (e) {
        e.preventDefault();

        let id_user = FORM_USER.dataset.idUser;

        if (id_user == "-1") {
            create();
        } else {
            update(id_user);
        }
    });

    FORM_PASSWORD.addEventListener("submit", function (e) {
        e.preventDefault();

        let id_user = FORM_PASSWORD.dataset.idUser;

        if (id_user != "-1") {
            change_password(id_user);
        }
    });

    SELECT_SEARCH_BY.addEventListener("change", loadUsers);
    SELECT_ROLS.addEventListener("change", loadUsers);

    loadRols(SELECT_ROLS);
    loadUsers();
}

function show_modal_user(target, id_user) {
    let row = target.closest("tr").querySelectorAll("td");

    FORM_USER.dataset.idUser = id_user;

    let nickname = row[1].innerText;
    let firstname = row[2].innerText;
    let lastname = row[3].innerText;
    let email = row[4].innerText;
    let rol = row[5].innerText;

    FORM_USER.querySelector("#input-nickname").value = nickname;
    FORM_USER.querySelector("#input-firstname").value = firstname;
    FORM_USER.querySelector("#input-lastname").value = lastname;
    FORM_USER.querySelector("#input-email").value = email;

    loadRols(SELECT_ROLS_MODAL, rol);

    document.querySelectorAll("input[name='password']").forEach((input) => {
        input.parentElement.parentElement.classList.add("d-none");
        input.required = false;
    });

    document.querySelector("#user-label").innerText = "MODIFICAR USUARIO";

    BUTTON_SUBMIT_USER.innerText = "Modificar";

    MODAL_USER.show();
}

function show_modal_delete(e, id_user) {
    BUTTON_DELETE_USER.dataset.idUser = id_user;
    MODAL_CONFIRM_DELETE.show();
}

function loadRols(select, value_default = -1) {
    get("/rol/all").then((response) => {
        let data = response.data.data;

        let options = "<option value='0'>Selecciona un rol...</option>";

        if (data.length > 0) {
            data.forEach((rol) => {
                if (rol.id == value_default || rol.name == value_default) {
                    options += `<option value="${rol.id}" selected>${rol.name}</option>`;
                } else {
                    options += `<option value="${rol.id}">${rol.name}</option>`;
                }
            });

            select.innerHTML = options;
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
                        <td><a href="mailto:${user.email}">${user.email}</a></td>
                        <td>${user.rol}</td>
                        <td>${user.created_at}</td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm my-1" title="Editar usuario" data-action="edit-user" data-id-user="${user.id}"><i class="fas fa-edit fa-fw"></i></button>
                            <button type="button" class="btn btn-warning btn-sm my-1" title="Cambiar contraseña" data-action="password-user" data-id-user="${user.id}"><i class="fas fa-key fa-fw"></i></button>
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

function _delete(id) {
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

function create() {
    let password = FORM_USER.querySelector("#input-password").value;
    let password_confirm = FORM_USER.querySelector("#input-password-confirm").value;

    if (password == password_confirm) {
        post("/user/add",
            new FormData(FORM_USER),
        ).then((response) => {
            let data = response.data.data;

            if (data == "-1") {
                showNoti("El nickname o el email ya existe, prueba otro.", "bg-danger");
            } else {
                showNoti("Usuario creado correctamente.", "bg-success");
                MODAL_USER.hide();

                loadUsers();
            }
        });
    } else {
        showNoti("La contraseña no coinciden", "bg-danger");
    }
}

function update(id) {
    if (id != -1) {
        if (SELECT_ROLS_MODAL.value != 0) {
            let form_data = new FormData(FORM_USER);
            form_data.append("id", id);

            post("/user/update",
                form_data
            ).then((response) => {
                let data = response.data.data;

                if (data == "-1") {
                    showNoti("El nickname o el email ya existe, prueba otro.", "bg-danger");
                } else {
                    showNoti("Usuario actualizado correctamente.", "bg-success");
                    MODAL_USER.hide();

                    loadUsers();
                }
            });
        } else {
            showNoti("Debes de indicar el rol.", "bg-danger");
        }
    }
}

function change_password(id) {
    let password = FORM_PASSWORD.querySelector("#input-password-change").value;
    let password_confirm = FORM_PASSWORD.querySelector("#input-password-confirm-change").value;

    if (password == password_confirm) {
        if (id != -1) {
            let form_data = new FormData(FORM_PASSWORD);
            form_data.append("id", id);

            post("/user/changepassword",
                form_data
            ).then((response) => {
                let data = response.data.data;

                showNoti("Contraseña cambiado correctamente.", "bg-success");

                MODAL_CHANGE_PASSWORD.hide();

                loadUsers();
            });
        }
    } else {
        showNoti("La contraseña no coinciden", "bg-danger");
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