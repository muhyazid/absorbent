function showWarningPopup() {
    const warningPopup = document.getElementById("warningPopup");
    warningPopup.style.display = "block";
}

function closeWarningPopup() {
    const warningPopup = document.getElementById("warningPopup");
    warningPopup.style.display = "none";
}

function redirectToLogin() {
    window.location.href = "/login"; // Adjust this URL to your actual login route
}
