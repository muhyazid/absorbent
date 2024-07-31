function openPopup(id, name, image, description) {
    var popup = document.getElementById("popup-" + id);
    document.getElementById("popup-title-" + id).innerText = name;
    document.getElementById("popup-image-" + id).src = image;
    document.getElementById("popup-image-" + id).alt = name;
    document.getElementById("popup-description-" + id).innerText = description;
    popup.style.display = "flex";
}

function closePopup(id) {
    var popup = document.getElementById("popup-" + id);
    popup.style.display = "none";
}

window.onclick = function (event) {
    var popups = document.getElementsByClassName("popup");
    for (var i = 0; i < popups.length; i++) {
        if (event.target == popups[i]) {
            popups[i].style.display = "none";
        }
    }
};
