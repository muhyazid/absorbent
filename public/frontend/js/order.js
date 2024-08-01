document.addEventListener('DOMContentLoaded', function () {
    const closeButton = document.querySelector('.close');
    const orderForm = document.querySelector('#orderForm');
    const itemsTextArea = document.querySelector('#items');
    const isLoggedIn = {{ auth()->check() ? 'true' : 'false' }}; // Periksa status login dari Laravel

    closeButton.addEventListener('click', function () {
        document.querySelector('#orderPopup').style.display = 'none';
    });

    orderForm.addEventListener('submit', function (event) {
        event.preventDefault();
        // Logika untuk mengirim data form ke server
        console.log('Form submitted');
        // Redirect ke halaman home setelah form disubmit
        window.location.href = '/home';
    });

    window.onclick = function (event) {
        if (event.target == document.querySelector('#orderPopup')) {
            document.querySelector('#orderPopup').style.display = 'none';
        }
    };

    window.orderProduct = function (productId) {
        if (!isLoggedIn) {
            alert('Anda harus login terlebih dahulu!');
            window.location.href = '/login';
        } else {
            itemsTextArea.value = document.querySelector(`#product-added-${productId}`).value;
            document.querySelector('#orderPopup').style.display = 'block';
        }
    };

    window.openPopup = function(id, name, image, description, category) {
        var popup = document.getElementById("popup-" + id);
        document.getElementById("popup-title-" + id).innerText = name;
        document.getElementById("popup-image-" + id).src = image;
        document.getElementById("popup-image-" + id).alt = name;
        document.getElementById("popup-description-" + id).innerText = description;

        if (category === "Custom Spill Kit") {
            document.getElementById("custom-elements-" + id).style.display = "block";
            $.ajax({
                url: "/frontend/products/custom-spill-kit-products",
                method: "GET",
                success: function (data) {
                    var select = document.getElementById("product-select-" + id);
                    select.innerHTML = "";
                    data.forEach(function (product) {
                        var option = document.createElement("option");
                        option.value = product.id;
                        option.text = product.name;
                        select.appendChild(option);
                    });
                },
            });
        } else {
            document.getElementById("custom-elements-" + id).style.display = "none";
        }

        popup.style.display = "flex";
    };

    window.closePopup = function(id) {
        var popup = document.getElementById(id);
        popup.style.display = "none";
    };

    window.increaseValue = function(productId) {
        var quantityInput = document.getElementById("product-quantity-" + productId);
        quantityInput.value = parseInt(quantityInput.value) + 1;
    };

    window.decreaseValue = function(productId) {
        var quantityInput = document.getElementById("product-quantity-" + productId);
        if (quantityInput.value > 0) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
        }
    };

    window.addProduct = function(productId) {
        var select = document.getElementById("product-select-" + productId);
        var quantity = document.getElementById("product-quantity-" + productId).value;
        var addedInput = document.getElementById("product-added-" + productId);
        var productName = select.options[select.selectedIndex].text;

        var existingText = addedInput.value;
        var newText = quantity + " x " + productName;

        if (existingText.trim() === "") {
            addedInput.value = newText;
        } else {
            addedInput.value = existingText + "\n" + newText;
        }
    };

    window.removeLastProduct = function(productId) {
        var addedInput = document.getElementById("product-added-" + productId);
        var existingText = addedInput.value.trim().split("\n");

        if (existingText.length > 0) {
            existingText.pop();
            addedInput.value = existingText.join("\n");
        }
    };
});
