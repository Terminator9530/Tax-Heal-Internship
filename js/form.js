$(document).ready(function () {
    document.querySelectorAll("nav ul li a")[1].style.color = "#c7c4c3";

    //--------------------------------Submitting form--------------------------------------//

    $("#submit").click(function (e) {
        e.preventDefault();
        var $myForm = $("#myForm");
        $myForm[0].checkValidity();
        $myForm[0].reportValidity();
        if($myForm[0].checkValidity()&&$myForm[0].reportValidity()){
            var name=document.getElementById("name").value;
            var email=document.getElementById("email").value;
            var phone_no=parseInt(document.getElementById("phone_no").value);
            var city=document.getElementById("city").value;
            var grad_per=parseInt(document.getElementById("grad_per").value);
            var grad_ins=document.getElementById("grad_ins").value;
            var senior_per=parseInt(document.getElementById("senior_per").value);
            var senior_ins=document.getElementById("senior_ins").value;
            var senior_board=document.getElementById("senior_board").value;
            var secon_per=parseInt(document.getElementById("secon_per").value);
            var secon_ins=document.getElementById("secon_ins").value;
            var secon_board=document.getElementById("secon_board").value;
            var skills=document.getElementById("skills").value;
            var github=document.getElementById("github").value;
            var submit=document.getElementById("submit").value;
            var info = {
                name:name,
                email:email,
                phone_no:phone_no,
                city:city,
                grad_per:grad_per,
                grad_ins:grad_ins,
                senior_per:senior_per,
                senior_ins:senior_ins,
                senior_board:senior_board,
                secon_per:secon_per,
                secon_ins:secon_ins,
                secon_board:secon_board,
                skills:skills,
                github:github,
                submit: submit
            };
            $.post('./pages/form.php', info, function (data, status) {
                const err = JSON.parse(data)["err"];
                if (err != "") {
                    document.getElementById("err").innerHTML = `<div class="alert alert-${err=="Form Submitted"?"success":"danger"} alert-dismissible fade show" role="alert">
                ${err}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>`;
                }
            });
        }
    });
});