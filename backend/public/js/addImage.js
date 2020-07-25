function textChange() {
    var x = document.getElementById("txtWrite");
    var prev = document.getElementById("txtPrev");
    prev.innerHTML = x.value;
}

function sizeChange() {
    var x = document.getElementById("sizeSelect").value;
    var prev = document.getElementById("txtPrev");
    prev.style.fontSize = x + 'px';
}
function fontChange() {
    var x = document.getElementById("fontSelect").value;
    var prev = document.getElementById("txtPrev");
    prev.style.fontFamily = x;
}
function weightChange() {
    var x = document.getElementById("weightSelect").value;
    var prev = document.getElementById("txtPrev");
    if (x == "italic") {
        prev.style.fontStyle = x;
        prev.style.fontWeight = 400;
    } else {
        prev.style.fontWeight = x;
        prev.style.fontStyle = "normal";
    }
}
function orientationChange() {
    var x = document.getElementById("orientationSelect").value;
    var prev = document.getElementById("txtPrev");
    prev.style.textAlign = x;
}
function animationChange() {
    var x = document.getElementById("animationSelect").value;
    var prev = document.getElementById("txtPrev");
    prev.className = "";
    prev.classList.add("animate__animated");
    prev.classList.add(x);
}

function imageChange() {
    var preview = document.querySelector('img');
    var file = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();

    if (file) {
        reader.onloadend = function () {
            preview.className = "";
            preview.src = reader.result;
        }
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
        preview.classList.add("hide");
    }
}