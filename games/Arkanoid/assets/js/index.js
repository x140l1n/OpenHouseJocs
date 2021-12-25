document.addEventListener("DOMContentLoaded", init_menu);

const BOARD_WIDTH = 800;
const BOARD_HEIGHT = 700;
const BORDER_WIDTH = 20;

const BOARD_ELEMENT = document.querySelector("#board");

const BOARD_MENU_ELEMENT = BOARD_ELEMENT.querySelector("#board-menu");

const RANKING_MENU_ELEMENT = BOARD_MENU_ELEMENT.querySelector("#ranking-menu");
const TABLE_RANKING_ELEMENT = RANKING_MENU_ELEMENT.querySelector("#table-ranking");

const MAIN_MENU_ELEMENT = BOARD_MENU_ELEMENT.querySelector("#main-menu");

const INSTRUCCIONS_MENU_ELEMENT = BOARD_MENU_ELEMENT.querySelector("#instructions-menu");
const CONTENT_INSTRUCTIONS_ELEMENT = INSTRUCCIONS_MENU_ELEMENT.querySelector("#content-instructions");
const ARRAY_PAGES = CONTENT_INSTRUCTIONS_ELEMENT.querySelectorAll("div[name='page']");

const BOARD_GAME_ELEMENT = BOARD_ELEMENT.querySelector("#board-game");
const BOARD_GAME_FINISH_ELEMENT = BOARD_ELEMENT.querySelector("#board-game-finish");

const STATS_ELEMENT = document.querySelector("#stats");

let controller = null;
let signal = null;

function init_menu() {    
    //Set style board.
    BOARD_ELEMENT.style.borderWidth = `${BORDER_WIDTH}px`;
    BOARD_ELEMENT.style.width = `${BOARD_WIDTH}px`;
    BOARD_ELEMENT.style.height = `${BOARD_HEIGHT}px`;

    //Start all transitions css.
    start_transitions();

    //Add event click listener to board menu and detect which button is clicked.
    BOARD_MENU_ELEMENT.addEventListener("click", (e) => {
        let action = e.target.dataset.action;

        switch (action) {
            case "play":
                BOARD_MENU_ELEMENT.style.display = "none";

                setTimeout(init_game, 1000);

                break;
            case "instructions":
                MAIN_MENU_ELEMENT.style.display = "none";

                INSTRUCCIONS_MENU_ELEMENT.style.display = "flex";

                var content_instructions = CONTENT_INSTRUCTIONS_ELEMENT;
                content_instructions.dataset.currentPage = "1";

                var current_page = Number.parseInt(
                    content_instructions.dataset.currentPage
                );

                render_page_button(current_page);

                break;
            case "ranking":
                controller = new AbortController(); //Abort one or more request.
                signal = controller.signal;

                MAIN_MENU_ELEMENT.style.display = "none";

                RANKING_MENU_ELEMENT.style.display = "flex";

                get_ranking(signal);

                break;
            case "go-back":
                //Display none all menus except main menu.
                [].slice.call(BOARD_MENU_ELEMENT.children).forEach((element) => {
                    if (element !== MAIN_MENU_ELEMENT) {
                        element.style.display = "none";
                    } else {
                        element.style.display = "flex";
                    }
                });

                if (controller != null) {
                    controller.abort(); //Abort the request ranking.
                    controller = null;
                }

                break;
            case "go-back-page":
                var content_instructions = CONTENT_INSTRUCTIONS_ELEMENT;
                var current_page = Number.parseInt(
                    content_instructions.dataset.currentPage
                );

                current_page--;

                if (current_page <= ARRAY_PAGES.length && current_page > 0) {
                    content_instructions.dataset.currentPage = current_page.toString();

                    render_page_button(current_page);
                }

                break;
            case "go-next-page":
                var content_instructions = CONTENT_INSTRUCTIONS_ELEMENT;
                var current_page = Number.parseInt(
                    content_instructions.dataset.currentPage
                );

                current_page++;

                if (current_page <= ARRAY_PAGES.length && current_page > 0) {
                    content_instructions.dataset.currentPage = current_page.toString();

                    render_page_button(current_page);
                }

                break;
        }
    });

    //Add event click listener to game over and detect which button is clicked.
    BOARD_GAME_FINISH_ELEMENT.addEventListener("click", (e) => {
        let action = e.target.dataset.action;

        switch (action) {
            case "play-again":
                BOARD_GAME_ELEMENT.innerHTML = "";
                BOARD_GAME_FINISH_ELEMENT.style.display = "none";
                BOARD_GAME_FINISH_ELEMENT.querySelectorAll("#content-game-finish > div").forEach(element => element.style.visibility = "hidden");

                setTimeout(init_game, 1000);

                break;
            case "back-menu":
                BOARD_GAME_ELEMENT.innerHTML = "";
                BOARD_GAME_FINISH_ELEMENT.style.display = "none";
                BOARD_GAME_FINISH_ELEMENT.querySelectorAll("#content-game-finish > div").forEach(element => element.style.visibility = "hidden");
                STATS_ELEMENT.style.display = "none";
                BOARD_MENU_ELEMENT.style.display = "flex";

                break;
        }
    });
}

function start_transitions() {
    let menu_options = MAIN_MENU_ELEMENT.querySelector("#menu-options");
    [].slice
        .call(menu_options.children)
        .forEach((element) => (element.style.left = 0));

    let logo = MAIN_MENU_ELEMENT.querySelector("#logo");
    logo = [].slice.call(logo.children);
    logo[0].style.left = 0;
    logo[1].style.top = 0;
    logo[2].style.right = 0;

    let menu_footer = MAIN_MENU_ELEMENT.querySelector("#menu-footer");
    menu_footer.firstElementChild.style.left = 0;
}

function render_page_button(num_page) {
    ARRAY_PAGES.forEach((page) => {
        if (page.dataset.page === num_page.toString()) {
            page.style.display = "block";
        } else {
            page.style.display = "none";
        }
    });

    let current_page_element = INSTRUCCIONS_MENU_ELEMENT.querySelector(
        `div[data-page='${num_page}']`
    );

    let go_back_page_element = INSTRUCCIONS_MENU_ELEMENT.querySelector(
        "button[data-action='go-back-page']"
    );
    let go_next_page_element = INSTRUCCIONS_MENU_ELEMENT.querySelector(
        "button[data-action='go-next-page']"
    );

    if (current_page_element.previousElementSibling !== null) {
        let previous_page_name =
            current_page_element.previousElementSibling.dataset.pageName;
        go_back_page_element.innerText = previous_page_name;
    } else {
        go_back_page_element.innerText = "";
    }

    if (current_page_element.nextElementSibling !== null) {
        let next_page_name =
            current_page_element.nextElementSibling.dataset.pageName;
        go_next_page_element.innerText = next_page_name;
    } else {
        go_next_page_element.innerText = "";
    }

    go_back_page_element.style.display = "block";
    go_back_page_element.style.display = "block";

    go_next_page_element.style.display = "block";
    go_next_page_element.style.display = "block";

    if (num_page === 1) {
        go_back_page_element.style.display = "none";
    } else if (num_page === ARRAY_PAGES.length) {
        go_next_page_element.style.display = "none";
    }
}

function get_ranking(signal) {
    let data = new FormData();
    data.append("action", "get");
    data.append("id_game", 1);
    data.append("top", 10);

    TABLE_RANKING_ELEMENT.style.height = "100%";

    let body = TABLE_RANKING_ELEMENT.tBodies[0];

    let footer = TABLE_RANKING_ELEMENT.tFoot;

    body.innerHTML = "";
    footer.innerHTML = "";

    let row_wait = document.createElement("tr");
    let cell_wait = document.createElement("td");
    cell_wait.innerText = "Un moment...";
    row_wait.appendChild(cell_wait);
    body.appendChild(row_wait);

    fetch("./backend/ranking.php", {
        method: "POST",
        cache: "no-cache",
        body: data,
        signal: signal,
    })
        .then((response) => response.json())
        .then((data) => {
            TABLE_RANKING_ELEMENT.style.height = "";

            render_ranking(body, footer, data, data.data_user ? data.data_user.id_user :  -1);
        })
        .catch((error) => console.error(error));
}

function render_ranking(body, footer, data, id_user) {
    body.innerHTML = "";

    if (data.data.length > 0) {
        let isTop = false; //If the user is in the top 10.

        data.data.forEach((item, index) => {
            let position = index + 1;
            let nickname =
                Number.parseInt(item.id) === id_user ? "Tu" : item.nickname;
            let points = item.points;

            let row = document.createElement("tr");

            if (nickname === "Tu") {
                row.style.backgroundColor = "#1b61a7";
                isTop = true;
            }

            let cell_position = document.createElement("td");

            if (position >= 1 && position <= 3) {
                let position_medal = document.createElement("img");
                position_medal.src = `./assets/img/${position}.png`;
                position_medal.width = 30;

                cell_position.appendChild(position_medal);
            } else {
                cell_position.innerText = position;
            }

            let cell_nickname = document.createElement("td");
            cell_nickname.innerText = nickname;

            let cell_points = document.createElement("td");
            cell_points.innerText = `${points}p`;

            row.appendChild(cell_position);
            row.appendChild(cell_nickname);
            row.appendChild(cell_points);

            body.appendChild(row);
        });

        //Add user ranking in footer of table if there is not in the top 10.
        if (!isTop && data.data_user !== null) {
            let row = document.createElement("tr");
            row.style.backgroundColor = "#1b61a7";

            let cell_position = document.createElement("td");
            cell_position.innerText = "-";

            let cell_nickname = document.createElement("td");
            cell_nickname.innerText = "Tu";

            let cell_points = document.createElement("td");
            cell_points.innerText = `${data.data_user.points}p`;

            row.appendChild(cell_position);
            row.appendChild(cell_nickname);
            row.appendChild(cell_points);

            footer.appendChild(row);
        }
    }
}
