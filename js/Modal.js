// MODAL FOR FACEBOOK
var modalfb = document.getElementById("myModalFB");
var btnfb = document.getElementById("myBtnFB");
var spanfb = document.querySelector("#myModalFB .close");

btnfb.onclick = function () {
    modalfb.style.display = "block";
};

spanfb.onclick = function () {
    modalfb.style.display = "none";
};

// MODAL FOR GITHUB
var modalgh = document.getElementById("myModalGH");
var btngh = document.getElementById("myBtnGH");
var spangh = document.querySelector("#myModalGH .close");

btngh.onclick = function () {
    modalgh.style.display = "block";
};

spangh.onclick = function () {
    modalgh.style.display = "none";
};

// MODAL FOR INSTAGRAM
var modalig = document.getElementById("myModalIG");
var btnig = document.getElementById("myBtnIG");
var spanig = document.querySelector("#myModalIG .close");

btnig.onclick = function () {
    modalig.style.display = "block";
};

spanig.onclick = function () {
    modalig.style.display = "none";
};

// Close modals when clicking outside
window.onclick = function (event) {
    if (event.target == modalfb) {
        modalfb.style.display = "none";
    } else if (event.target == modalgh) {
        modalgh.style.display = "none";
    } else if (event.target == modalig) {
        modalig.style.display = "none";
    }
};
