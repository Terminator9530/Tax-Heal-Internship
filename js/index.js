document.querySelectorAll(".card a").forEach(element => {
    element.addEventListener("mouseover",function(e){
        e.stopPropagation();
        e.target.classList.add("anim");
    });
    element.addEventListener("mouseout",function(e){
        e.stopPropagation();
        e.target.classList.remove("anim");
    });
});