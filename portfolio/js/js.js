//animations
function reveal() {
    let reveals = document.querySelectorAll(".reveal");

    for (let i = 0; i < reveals.length; i++) {
        let windowHeight = window.innerHeight;
        let elementTop = reveals[i].getBoundingClientRect().top;

        if (elementTop <= windowHeight - 110) {
            reveals[i].classList.add("active");
        } else if (elementTop >= windowHeight) {
            reveals[i].classList.remove("active");
        }
    }
}

window.addEventListener("scroll", reveal);
window.addEventListener("DOMContentLoaded", (event) => {
    reveal()
    header_problem()
});

//ajuste hauteur body
window.addEventListener("resize", (event) => {
    header_problem()
});

function header_problem(){
    let header = document.getElementById("header_id");
    let header_height = header.offsetHeight;
    let body = document.getElementById("body_id");
    body.style.marginTop = ((-45 - header_height).toString()) + "px";
    //header.style.marginBottom = ((40 - header_height).toString()) + "px";
}