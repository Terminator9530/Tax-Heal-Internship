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
            document.getElementById("intern").innerHTML += `info1 : ${intern['info1']}<br>`;
            document.getElementById("intern").innerHTML += `info2 : ${intern['info2']}<br>`;
            document.getElementById("intern").innerHTML += `info3 : ${intern['info3']}<br>`;
            document.getElementById("intern").innerHTML += `info4 : ${intern['info4']}<br>`;
            document.getElementById("intern").innerHTML += `info5 : ${intern['info5']}<br>`;
            document.getElementById("intern").innerHTML += `info6 : ${intern['info6']}`;
        }
    });
});