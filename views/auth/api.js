/**
 * Get all jobs oportunities from
 * @param {Element} table The table to insert records.
 */
function get_jobs() {
  let data = new FormData();
  data.append("action", "get_jobs_oportunities");
  data.append("id_cycle", 18);

  fetch("./backend/index.php", {
    method: "POST",
    cache: "no-cache",
    body: data,
  })
    .then((response) => response.json())
    .then((data) => {
      job_oportunities = data.data;
    })
    .catch((error) => console.error(error));
}

/**
 * Get all jobs oportunities from
 * @param {Element} table The table to insert records.
 */
function get_family() {
  let data = new FormData();
  data.append("action", "get_all_family");

  fetch("./backend/index.php", {
    method: "POST",
    cache: "no-cache",
    body: data,
  })
    .then((response) => response.json())
    .then((data) => {
      family = data.data;

      let objKeys = Object.keys(family);
      let objValues = Object.values(family);

      let parent = document.getElementById("dropdownFormacionButton");

      for (let i = 0; i < objKeys.length; i++) {
        let list = document.createElement("li");
        let input = document.createElement("input");
        let label = document.createElement("label");

        input.type = "checkbox";
        input.setAttribute("value", objValues[i].name);
        input.setAttribute("class", "m-2");
        input.setAttribute("id", objValues[i].id);
        input.setAttribute("name", objValues[i].name);
        input.setAttribute("onchange", "reviewCheckBox()");

        //label.appendChild(document.createTextNode(objValues[i].name));
        label.textContent = objValues[i].name;
        label.setAttribute("for", objValues[i]);

        list.setAttribute("class", "mx-2 py-1");

        parent.appendChild(list);
        list.appendChild(input);
        list.appendChild(label);
      }
    })
    .catch((error) => console.error(error));
}

/**
 * Get cycle of job oportunities
 * @param {Element} table The table to insert records.
 */
function get_cycles() {
  let data = new FormData();
  data.append("action", "get_all_cycles");

  fetch("./backend/index.php", {
    method: "POST",
    cache: "no-cache",
    body: data,
  })
    .then((response) => response.json())
    .then((data) => {
      cycles = data.data;
    })
    .catch((error) => console.error(error));
}

/**
 * Submit form
 * @param {Element} table The table to insert records.
 */
function get_users() {
  let data = new FormData();
  data.append("action", "get_all_users");

  fetch("./backend/index.php", {
    method: "POST",
    cache: "no-cache",
    body: data,
  })
    .then((response) => response.json())
    .then((data) => {
      userInfo = data.data;
    })
    .catch((error) => console.error(error));
}

/**
 * Submit form
 * @param {Element} table The table to insert records.
 */
function insert_user_info(email, firstname, lastname, nickname) {
  let data = new FormData();
  data.append("action", "insert_user");
  data.append("email", email);
  data.append("firstname", firstname);
  data.append("lastname", lastname);
  data.append("nickname", nickname);
  data.append("id_rol", 3);

  fetch("./backend/index.php", {
    method: "POST",
    cache: "no-cache",
    body: data,
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data.data);
    })
    .catch((error) => console.error(error));
}

function insert_family(email, id_family) {
  let data = new FormData();
  data.append("action", "insert_formation");
  data.append("email", email);
  data.append("id_family", id_family);

  fetch("./backend/index.php", {
    method: "POST",
    cache: "no-cache",
    body: data,
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
    })
    .catch((error) => console.error(error));
}
