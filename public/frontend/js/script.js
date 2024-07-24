// scripts.js

// Get the modal
var modal = document.getElementById("benefitModal");

// Get the button that opens the modal
var btn = document.getElementById("readMoreBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function(event) {
    event.preventDefault(); // Prevent the default action of the link
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


// pop up barang
function openPopup(popupId) {
    document.getElementById(popupId).style.display = "block";
    document.body.classList.add("no-scroll");
}

function closePopup(popupId) {
    document.getElementById(popupId).style.display = "none";
    document.body.classList.remove("no-scroll");
}

window.onclick = function(event) {
    var popups = document.getElementsByClassName('popup');
    for (var i = 0; i < popups.length; i++) {
        if (event.target == popups[i]) {
            popups[i].style.display = "none";
            document.body.classList.remove("no-scroll");
        }
    }
}


    $(document).ready(function() {
        $('#brandCarousel').carousel({
            interval: 3000,
            pause: false
        });
    });

