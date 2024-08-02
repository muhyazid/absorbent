// POP UP UNTUK BENEIFT

// Get the modal
var modal = document.getElementById("benefitModal");

// Get the button that opens the modal
var btn = document.getElementById("readMoreBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function (event) {
    event.preventDefault(); // Prevent the default action of the link
    modal.style.display = "flex";
    document.body.classList.add("modal-open"); // Disable scrolling of the main content
    document.documentElement.classList.add("modal-open"); // Disable scrolling of the main content
};

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
    document.body.classList.remove("modal-open"); // Restore scrolling of the main content
    document.documentElement.classList.remove("modal-open"); // Restore scrolling of the main content
};

// When the user clicks anywhere outside of the modal, close it
document.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
        document.body.classList.remove("modal-open"); // Restore scrolling of the main content
        document.documentElement.classList.remove("modal-open"); // Restore scrolling of the main content
    }
};

// pop up barang
// Function to open popup
function openPopup(popupId) {
    var popup = document.getElementById(popupId);
    popup.style.display = "flex";
    document.body.classList.add("no-scroll");
}

// Function to close popup
function closePopup(popupId) {
    var popup = document.getElementById(popupId);
    popup.style.display = "none";
    document.body.classList.remove("no-scroll");
}

// Close popup when clicking outside
window.onclick = function (event) {
    var popups = document.getElementsByClassName("popup");
    for (var i = 0; i < popups.length; i++) {
        if (event.target === popups[i]) {
            popups[i].style.display = "none";
            document.body.classList.remove("no-scroll");
        }
    }
};

document.addEventListener("DOMContentLoaded", function () {
    const carouselTrack = document.querySelector(".carousel-track");
    const items = Array.from(carouselTrack.children);

    items.forEach((item) => {
        const clone = item.cloneNode(true);
        carouselTrack.appendChild(clone);
    });
});

// scrolling agar smooth
document.addEventListener("DOMContentLoaded", function () {
    // Smooth scroll for navigation tabs
    const navLinks = document.querySelectorAll(".nav-tabs .nav-link");
    navLinks.forEach((link) => {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            document.querySelector(link.getAttribute("href")).scrollIntoView({
                behavior: "smooth",
            });
        });
    });

    // Load More functionality
    document
        .querySelector(".load-more button")
        .addEventListener("click", function () {
            // Logic to load more products goes here
        });
});

// js untuk login registrasi
// document.querySelectorAll(".toggle-password").forEach(function (toggle) {
//     toggle.addEventListener("click", function (e) {
//         const passwordField = document.querySelector(
//             toggle.getAttribute("toggle")
//         );
//         const passwordFieldType =
//             passwordField.getAttribute("type") === "password"
//                 ? "text"
//                 : "password";
//         passwordField.setAttribute("type", passwordFieldType);

//         const eyeIcon = toggle.querySelector("svg");
//         if (passwordFieldType === "password") {
//             eyeIcon.innerHTML = `
//                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
//                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
//             `;
//         } else {
//             eyeIcon.innerHTML = `
//                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
//                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
//                 <line x1="3" y1="3" x2="21" y2="21" style="stroke:currentColor;stroke-width:2" />
//             `;
//         }
//     });
// });
