$(document).ready(function () {

    // -----------------------Setting Active Link Color--------------------------- //

    document.querySelectorAll("nav ul li a")[0].style.color = "#c7c4c3";

    // -----------------------Authentication--------------------------- //

    $.get('./pages/admin.php', function (data, status) {
        const err = JSON.parse(data)["err"];
        const stat = JSON.parse(data)["status"];
        if (err != "") {
            document.getElementById("err").innerHTML = `
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            ${err}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>`;
        }
        if (stat != "") {
            window.location.replace("./hrpage.html");
        }
    });
    $("#login").click(function () {
        $.post('./pages/admin.php', {
            username: document.getElementById("username").value,
            password: document.getElementById("password").value,
            submit: document.getElementById("login").value
        }, function (data, status) {
            const err = JSON.parse(data)["err"];
            const stat = JSON.parse(data)["status"];
            if (err != "") {
                document.getElementById("err").innerHTML = `
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
            ${err}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>`;
            }
            if (stat != "") {
                window.location.replace("./hrpage.html");
            }
        });
    });
});