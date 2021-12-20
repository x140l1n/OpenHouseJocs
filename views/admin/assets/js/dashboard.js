document.addEventListener("DOMContentLoaded", init);

/**
 * When the document is loaded.
 * @param {Event} e  Contains a number of properties that describe the event that occurred.
 */
function init(e) {
  //Get the element target (document).
  let document = e.target;

  document.querySelector("#btn-refresh").addEventListener("click", loadAllData);

  loadAllData();
}

function loadAllData() {
  //Get all counts of families interested.
  get("/family/countUserFamilyAll").then((response) => {
    let data = response.data.data;

    if (data.length === 4) {
      document.querySelector("#count-1").innerText = data[0];
      document.querySelector("#count-2").innerText = data[1];
      document.querySelector("#count-3").innerText = data[2];
      document.querySelector("#count-4").innerText = data[3];
    } else {
      document.querySelector("#count-1").innerText = 0;
      document.querySelector("#count-2").innerText = 0;
      document.querySelector("#count-3").innerText = 0;
      document.querySelector("#count-4").innerText = 0;

      console.error("An error ocurred to get all counts of families interested.");
    }
  });

  document.querySelector("#table-students > tbody").innerHTML = "<tr><td colspan='6'><i class='fas fa-spinner fa-spin fa-2x my-3'></i></td></tr>";

  post("/user/lastStudents", {limit: 20}).then((response) => {
    let data = response.data.data;

    if (data.length > 0) {
        let tbody = "";
                
        data.forEach((student) => {
            tbody += `  <tr>
                            <td>${student.id}</th>
                            <td>${student.nickname}</td>
                            <td>${student.firstname}</td>
                            <td>${student.lastname}</td>
                            <td><a href="mailto:${student.email}">${student.email}</a></td>
                            <td>${student.created_at}</td>
                        </tr>`;
        });

        document.querySelector("#table-students > tbody").innerHTML = tbody;
    }
  });

  document.querySelector("#last-update-datetime").innerText = "Última actualización: " +
    new Intl.DateTimeFormat("es-ES", {
      dateStyle: "short",
      timeStyle: "medium",
    }).format(new Date());
}

               