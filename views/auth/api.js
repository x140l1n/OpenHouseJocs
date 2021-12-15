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
      console.log(data.data)
    })
    .catch((error) => console.error(error));
}



/**
 * Get cycle of job oportunities
 * @param {Element} table The table to insert records.
 */
function get_cycles(id_family) {
  let data = new FormData();
  data.append("action", "get_all_cycles");
  data.append("id_cycle_family", id_family);

  fetch("./backend/index.php", {
    method: "POST",
    cache: "no-cache",
    body: data,
  })
    .then((response) => response.json())
    .then((data) => {
      cycles = data.data;
      console.log(data.data)
    })
    .catch((error) => console.error(error));
}
