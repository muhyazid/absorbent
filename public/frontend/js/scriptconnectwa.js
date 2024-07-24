
  document.addEventListener('DOMContentLoaded', function() {
    var sendButton = document.getElementById('sendButton');
    var nameInput = document.getElementById('name');
    var emailInput = document.getElementById('email');
    var phoneInput = document.getElementById('phone');
    var messageInput = document.getElementById('message');

    sendButton.addEventListener('click', function() {
      // Get values from inputs
      var name = nameInput.value.trim();
      var email = emailInput.value.trim();
      var phone = phoneInput.value.trim();
      var message = messageInput.value.trim();

      // Check if all fields are filled
      if (name && email && phone && message) {
        // Format the message
        var text = `Hai, saya ${name}. ${message}`;

        // Construct the WhatsApp URL
        var whatsappUrl = `https://wa.me/6281330205567?text=${encodeURIComponent(text)}`;
        console.log(whatsappUrl)
        // Redirect to WhatsApp
        window.location.href = whatsappUrl;
      } else {
        // Alert if any field is empty
        alert('Please fill in all fields.');
      }
    });
  });
