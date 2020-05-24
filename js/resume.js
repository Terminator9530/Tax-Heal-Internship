function getUrlVars() {
    var vars = [],
        hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for (var i = 0; i < hashes.length; i++) {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}
$(document).ready(function () {

    //-------------------------------search intern by id-------------------------------------//
    
    var id = getUrlVars()['id'];
    $.get(`./pages/resume.php?id=${id}`, function (data, status) {
        if (JSON.parse(data)['status'] != "")
            window.location.replace("./admin.html");
        else {
            var intern = JSON.parse(data)['intern'];
            console.log(intern);
            document.getElementById("intern").innerHTML += `Name : ${intern['intern_name']}<br>`;
            document.getElementById("intern").innerHTML += `Email : ${intern['email']}<br>`;
            document.getElementById("intern").innerHTML += `City : ${intern['city']}<br>`;
            document.getElementById("intern").innerHTML += `GitHub : ${intern['github']}<br>`;
            document.getElementById("intern").innerHTML += `Skills : ${intern['skills']}<br>`;
            document.getElementById("intern").innerHTML += `Phone Number : ${intern['phone_no']}<br>`;
            document.getElementById("intern").innerHTML += `Graduation Percentage : ${intern['graduation_per']}<br>`;
            document.getElementById("intern").innerHTML += `Graduation Institution : ${intern['graduation_ins']}<br>`;
            document.getElementById("intern").innerHTML += `Senior Secondary Percentage : ${intern['senior_per']}<br>`;
            document.getElementById("intern").innerHTML += `Senior Secondary Institution : ${intern['senior_ins']}<br>`;
            document.getElementById("intern").innerHTML += `Senior Secondary Board : ${intern['senior_board']}<br>`;
            document.getElementById("intern").innerHTML += `Secondary Percentage : ${intern['secondary_per']}<br>`;
            document.getElementById("intern").innerHTML += `Secondary Institution : ${intern['secondary_ins']}<br>`;
            document.getElementById("intern").innerHTML += `Secondary Board : ${intern['secondary_board']}`;
        }
    });
});