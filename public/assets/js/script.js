let icon = document.querySelector("#ponerse");
icon.addEventListener("click", mostrar);

nav = document.getElementById("nav");

let quitarlo = document.getElementById("quitarse");
quitarlo.addEventListener("click", tapar)

let items = document.querySelectorAll(".lin");

items.forEach((item) => {
    item.addEventListener("click", tapar);
})

function mostrar() {
    nav.style.left = "0px";
    icon.style.display = "none";
    quitarlo.style.display = "block";
}

function tapar() {
    nav.style.left = "-200%";
    icon.style.display = "block";
    quitarlo.style.display = "none";

}

