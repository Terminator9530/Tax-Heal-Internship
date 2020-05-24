$(document).ready(function () {

  //------------------------------------Opening Change Credentials Modal---------------------------------------//

  document.getElementById("changePassword").onclick = function () {
    $('#staticBackdrop').modal(true);
  }

  //------------------------------------Get all interns applications---------------------------------------//

  $.get('./pages/hrpage.php', function (data, status) {
    if (JSON.parse(data)['status'] != "")
      window.location.replace("./admin.html");
    else {
      JSON.parse(data)['result'].forEach(intern => {
        document.getElementById("records").innerHTML += `
            <div class="col-4">
              <a href="./resume.html?id=${intern[14]}" class="card text-black bg-light mb-3 mr-5"
                style="max-width: 18rem;">
                <div class="card-header">${intern[0]}</div>
                <div class="card-body">
                  <h5 class="card-title">Skills</h5>
                  <p class="card-text">${intern[12]}</p>
                </div>
              </a>
            </div>
          `;
      });
    }
  });

  //------------------------------------LogOut---------------------------------------//

  $("#logout").click(function () {
    $.post('./pages/hrpage.php', {
      submit: document.getElementById("logout").value
    }, function (data, status) {
      if (JSON.parse(data)['status'] != "")
        window.location.replace("./admin.html");
    });
  });

  //------------------------------------Save new Credentials---------------------------------------//

  $("#save").click(function () {
    $.post('./pages/hrpage.php', {
      newUsername: document.getElementById('newUsername').value,
      newPassword: document.getElementById('newPassword').value,
      save: document.getElementById("save").value
    }, function (data, status) {
      if (JSON.parse(data)['err'] != "") {
        document.getElementById("err").innerHTML = `
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          ${JSON.parse(data)['err']}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        `;
        document.getElementById('newUsername').value = "";
        document.getElementById('newPassword').value = "";
        $('#staticBackdrop').modal(false);
      }
    });
  });
});