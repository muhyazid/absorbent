// POP UP UNTUK BENEIFT

// Get the modal
var modal = document.getElementById("benefitModal");

// Get the button that opens the modal
var btn = document.getElementById("readMoreBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function(event) {
    event.preventDefault(); // Prevent the default action of the link
    modal.style.display = "flex";
    document.body.classList.add("modal-open"); // Disable scrolling of the main content
    document.documentElement.classList.add("modal-open"); // Disable scrolling of the main content
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
    document.body.classList.remove("modal-open"); // Restore scrolling of the main content
    document.documentElement.classList.remove("modal-open"); // Restore scrolling of the main content
}

// When the user clicks anywhere outside of the modal, close it
document.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        document.body.classList.remove("modal-open"); // Restore scrolling of the main content
        document.documentElement.classList.remove("modal-open"); // Restore scrolling of the main content
    }
}





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
  window.onclick = function(event) {
    var popups = document.getElementsByClassName('popup');
    for (var i = 0; i < popups.length; i++) {
      if (event.target === popups[i]) {
        popups[i].style.display = "none";
        document.body.classList.remove("no-scroll");
      }
    }
  }
  
  
  document.addEventListener('DOMContentLoaded', function () {
    const carouselTrack = document.querySelector('.carousel-track');
    const items = Array.from(carouselTrack.children);
    
    items.forEach(item => {
      const clone = item.cloneNode(true);
      carouselTrack.appendChild(clone);
    });
  });
  
  