document.addEventListener("DOMContentLoaded", init);

const DOODLE_JUMP_MODAL = new bootstrap.Modal(document.querySelector("#modal-doodle-jump"), {
    keyboard: false,
});

const SNAKE_MODAL = new bootstrap.Modal(document.querySelector("#modal-snake"), {
    keyboard: false,
});

const SPACE_INVADERS_MODAL = new bootstrap.Modal(document.querySelector("#modal-space-invaders"), {
    keyboard: false,
});

const ARKANOID_MODAL = new bootstrap.Modal(document.querySelector("#modal-arkanoid"), {
    keyboard: false,
});

let timeout_search = null;

/**
 * When the document is loaded.
 * @param {Event} e  Contains a number of properties that describe the event that occurred.
 */
function init(e) {
    //Get the element target (document).
    let document = e.target;

    document.querySelectorAll("button[name='btn-show-more']").forEach((button) =>
        button.addEventListener("click", (e) => {
            showRankingModal(e);
        })
    );

    document.querySelectorAll("div[name='modal-ranking']").forEach((modal) => modal.addEventListener("show.bs.modal", loadDataModalRanking));
    document.querySelectorAll("div[name='modal-ranking']").forEach((modal) => modal.addEventListener("hide.bs.modal", cleanDataModalRanking));

    document.querySelector("#btn-refresh").addEventListener("click", loadAllData);

    loadAllData();
}

function showRankingModal(e) {
    let game = e.target.dataset.game;

    switch (game) {
        case "doodle-jump": DOODLE_JUMP_MODAL.show(); break;
        case "snake": SNAKE_MODAL.show(); break;
        case "space-invaders": SPACE_INVADERS_MODAL.show(); break;
        case "arkanoid": ARKANOID_MODAL.show(); break;
    }
}

function loadDataModalRanking(e) {
    let select_family = e.target.querySelector("select[name='select-family']");
    let select_cycle = e.target.querySelector("select[name='select-cycle']");
    let button_refresh_ranking_modal = e.target.querySelector("button[name='btn-refresh-modal']");
    let input_search_nickname = e.target.querySelector("input[name='input-search-nickname']");
    let tbody = e.target.querySelector("table > tbody");
    
    //If select cycle and select family is not undefined or not null is category cycle, otherwise, category FRASE.
    if (select_cycle && select_family) {
        loadSelectFamily(select_family);

        if (select_family.getAttribute('listener') !== 'true') {
            select_family.addEventListener("change", () => loadSelectCycle(select_cycle, select_family.value));
            select_family.setAttribute('listener', 'true');
        }
    }

    switch (e.target.id) {
        case "modal-arkanoid":
            if (button_refresh_ranking_modal.getAttribute('listener') !== 'true') {
                button_refresh_ranking_modal.addEventListener("click", () => loadRanking(tbody, 1, null, input_search_nickname.value));
                button_refresh_ranking_modal.setAttribute('listener', 'true');
            }

            if (input_search_nickname.getAttribute('listener') !== 'true') {
                input_search_nickname.addEventListener('input', function (e) {
                    clearTimeout(timeout_search);

                    tbody.innerHTML = `<tr><td colspan='${tbody.parentElement.rows[0].cells.length}'><i class='fas fa-spinner fa-spin fa-2x my-3'></i></td></tr>`;

                    timeout_search = setTimeout(() => {
                        loadRanking(tbody, 1, null, input_search_nickname.value);
                    }, 200);
                });
        
                input_search_nickname.setAttribute('listener', 'true');
            }

            loadRanking(tbody, 1, null, input_search_nickname.value);

            break;
        case "modal-space-invaders":
            if (button_refresh_ranking_modal.getAttribute('listener') !== 'true') {
                button_refresh_ranking_modal.addEventListener("click", () => loadRanking(tbody, 2, select_cycle.value, input_search_nickname.value));
                button_refresh_ranking_modal.setAttribute('listener', 'true');
            }
            
            if (select_cycle.getAttribute('listener') !== 'true') {
                select_cycle.addEventListener("change", () => loadRanking(tbody, 2, select_cycle.value, input_search_nickname.value));
                select_cycle.setAttribute('listener', 'true');
            }

            if (input_search_nickname.getAttribute('listener') !== 'true') {
                input_search_nickname.addEventListener('input', function (e) {
                    clearTimeout(timeout_search);
        
                    tbody.innerHTML = `<tr><td colspan='${tbody.parentElement.rows[0].cells.length}'><i class='fas fa-spinner fa-spin fa-2x my-3'></i></td></tr>`;

                    timeout_search = setTimeout(() => {
                        loadRanking(tbody, 2, select_cycle.value, input_search_nickname.value);
                    }, 200);
                });
        
                input_search_nickname.setAttribute('listener', 'true');
            }

            break;
        case "modal-doodle-jump":
            if (button_refresh_ranking_modal.getAttribute('listener') !== 'true') {
                button_refresh_ranking_modal.addEventListener("click", () => loadRanking(tbody, 3, select_cycle.value, input_search_nickname.value));
                button_refresh_ranking_modal.setAttribute('listener', 'true');
            }

            if (select_cycle.getAttribute('listener') !== 'true') {
                select_cycle.addEventListener("change", () => loadRanking(tbody, 3, select_cycle.value, input_search_nickname.value));
                select_cycle.setAttribute('listener', 'true');
            }

            if (input_search_nickname.getAttribute('listener') !== 'true') {
                input_search_nickname.addEventListener('input', function (e) {
                    clearTimeout(timeout_search);
        
                    tbody.innerHTML = `<tr><td colspan='${tbody.parentElement.rows[0].cells.length}'><i class='fas fa-spinner fa-spin fa-2x my-3'></i></td></tr>`;

                    timeout_search = setTimeout(() => {
                        loadRanking(tbody, 3, select_cycle.value, input_search_nickname.value);
                    }, 200);
                });
        
                input_search_nickname.setAttribute('listener', 'true');
            }

            break;
        case "modal-snake":
            if (button_refresh_ranking_modal.getAttribute('listener') !== 'true') {
                button_refresh_ranking_modal.addEventListener("click", () => loadRanking(tbody, 4, null, input_search_nickname.value));
                button_refresh_ranking_modal.setAttribute('listener', 'true');
            }

            if (input_search_nickname.getAttribute('listener') !== 'true') {
                input_search_nickname.addEventListener('input', function (e) {
                    clearTimeout(timeout_search);
        
                    tbody.innerHTML = `<tr><td colspan='${tbody.parentElement.rows[0].cells.length}'><i class='fas fa-spinner fa-spin fa-2x my-3'></i></td></tr>`;

                    timeout_search = setTimeout(() => {
                        loadRanking(tbody, 4, null, input_search_nickname.value);
                    }, 200);
                });
        
                input_search_nickname.setAttribute('listener', 'true');
            }

            loadRanking(tbody, 4, null, input_search_nickname.value);

            break;
    }
}

function loadRanking(tbody, id_game, id_cycle, nickname) {
    tbody.innerHTML = `<tr><td colspan='${tbody.parentElement.rows[0].cells.length}'><i class='fas fa-spinner fa-spin fa-2x my-3'></i></td></tr>`;

    post("/ranking/allByIdGameIdCycle", { nickname: nickname, id_game: id_game, id_cycle: id_cycle }).then((response) => {
        let data = response.data.data;

        tbody.parentElement.parentElement.parentElement.querySelector("span[name='total-records-modal-ranking']").innerText = data.length;

        render_table_ranking(tbody, data);
    });
}

function loadSelectFamily(select) {
    get("/family/all").then((response) => {
        let data = response.data.data;

        let options = "<option value='0'>Selecciona una familia...</option>";

        if (data.length > 0) {

            data.forEach((family) => {
                options += `<option value="${family.id}">${family.name}</option>`;
            });

            select.innerHTML = options;
        }
    });
}

function loadSelectCycle(select, id_family) {
    post("/cycle/all", { id_family: id_family }).then((response) => {
        let data = response.data.data;

        let options = "<option value='0'>Selecciona un ciclo...</option>";

        if (data.length > 0) {
            data.forEach((cycle) => {
                options += `<option value="${cycle.id}">${cycle.name}</option>`;
            });

        }

        select.innerHTML = options;
    });
}

function cleanDataModalRanking(e) {
    e.target.querySelector("table > tbody").innerHTML = "<tr><td colspan='3'>No hay registros con estos parámetros.</td></tr>";
    e.target.querySelector("span[name='total-records-modal-ranking']").innerText = "";
    e.target.querySelector("input[name='input-search-nickname']").value = "";

    let select_family = e.target.querySelector("select[name='select-family']");
    let select_cycle = e.target.querySelector("select[name='select-cycle']");

    if (select_family) select_family.innerHTML = "<option selected>Selecciona una familia...</option>";
    if (select_cycle) select_cycle.innerHTML = "<option selected>Selecciona un ciclo...</option>";
}

function loadAllData() {
    document
        .querySelectorAll("table[name='card-tables'] > tbody")
        .forEach(
            (tbody) =>
            (tbody.innerHTML =
                `<tr><td colspan='${tbody.parentElement.rows[0].cells.length}'><i class='fas fa-spinner fa-spin fa-2x my-3'></i></td></tr>`)
        );

    //Load all ranking top 10.
    get("/ranking/allTopTen").then((response) => {
        let data = response.data.data;

        if (data.length === 4) {
            let ranking_doodle_jump = data[0];
            let ranking_snake = data[1];
            let ranking_space_invaders = data[2];
            let ranking_arkanoid = data[3];

            render_table_ranking(
                document.querySelector("#table-doodle-jump > tbody"),
                ranking_doodle_jump
            );
            render_table_ranking(
                document.querySelector("#table-snake > tbody"),
                ranking_snake
            );
            render_table_ranking(
                document.querySelector("#table-space-invaders > tbody"),
                ranking_space_invaders
            );
            render_table_ranking(
                document.querySelector("#table-arkanoid > tbody"),
                ranking_arkanoid
            );
        } else {
            console.error("An error ocurren to get all ranking top 10.");
        }
    });
}

function render_table_ranking(tbody, data) {
    if (data.length > 0) {
        let _tbody = "";

        data.forEach((ranking, index) => {
            let position = index + 1;

            switch (position) {
                case 1: position = `<img src="../assets/img/medal_${position}.png" width="30" />`; break;
                case 2: position = `<img src="../assets/img/medal_${position}.png" width="30" />`; break;
                case 3: position = `<img src="../assets/img/medal_${position}.png" width="30" />`; break;
            }

            if (tbody.parentElement.rows[0].cells.length === 3) {
                _tbody += `<tr>
                                <td>${position}</th>
                                <td>${ranking.nickname}</td>
                                <td>${ranking.points}</td>
                            </tr>`;
            } else {
                _tbody += `<tr>
                                <td>${position}</th>
                                <td>${ranking.nickname}</td>
                                <td>${ranking.cycle}</td>
                                <td>${ranking.points}</td>
                            </tr>`;
            }
        });

        tbody.innerHTML = _tbody;
    } else {
        tbody.innerHTML = "<tr><td colspan='3'>No hay registros con estos parámetros.</td></tr>";
    }
}
