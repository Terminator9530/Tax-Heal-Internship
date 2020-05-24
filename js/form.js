$(document).ready(function () {
    document.querySelectorAll("nav ul li a")[1].style.color = "#c7c4c3";

    //--------------------------------Submitting form--------------------------------------//
    
    $("#submit").click(function () {
        var info1 = document.getElementById("info1").value;
        var info2 = document.getElementById("info2").value;
        var info3 = document.getElementById("info3").value;
        var info4 = document.getElementById("info4").value;
        var info5 = document.getElementById("info5").value;
        var info6 = document.getElementById("info6").value;
        var submit = document.getElementById("submit").value;
        var info = {
            info1: info1,
            info2: info2,
            info3: info3,
            info4: info4,
            info5: info5,
            info6: info6,
            submit: submit
        };
        $.post('./pages/form.php', info, function (data, status) {
            console.log(JSON.parse(data));
            const err = JSON.parse(data)["err"];
            const stat = JSON.parse(data)["status"];
            console.log(err, stat);
            if (err != "") {
                document.getElementById("err").innerHTML = `<div class="alert alert-success alert-dismissible fade show" role="alert">
            ${err}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>`;
            }
        });
    });
});