function openPopup(id, name, image, description, categoryId) {
    var popup = document.getElementById("popup-" + id);
    document.getElementById("popup-title-" + id).innerText = name;
    document.getElementById("popup-image-" + id).src = image;
    document.getElementById("popup-image-" + id).alt = name;
    document.getElementById("popup-description-" + id).innerText = description;

    // Ambil semua produk untuk combo box
    $.ajax({
        url: "/frontend/products/all", // Endpoint untuk mendapatkan semua produk
        method: "GET",
        success: function (data) {
            var select = document.getElementById("product-select-" + id);
            select.innerHTML = ""; // Kosongkan combo box

            data.forEach(function (product) {
                var option = document.createElement("option");
                option.value = product.id;
                option.text = product.name;
                select.appendChild(option);
            });
        },
    });

    popup.style.display = "flex";
}

function closePopup(id) {
    var popup = document.getElementById(id);
    popup.style.display = "none";
}

function increaseValue(productId) {
    var quantityInput = document.getElementById(
        "product-quantity-" + productId
    );
    quantityInput.value = parseInt(quantityInput.value) + 1;
}

function decreaseValue(productId) {
    var quantityInput = document.getElementById(
        "product-quantity-" + productId
    );
    if (quantityInput.value > 0) {
        quantityInput.value = parseInt(quantityInput.value) - 1;
    }
}

function addProduct(productId) {
    var select = document.getElementById("product-select-" + productId);
    var quantity = document.getElementById(
        "product-quantity-" + productId
    ).value;
    var addedInput = document.getElementById("product-added-" + productId);
    var productName = select.options[select.selectedIndex].text;

    var existingText = addedInput.value;
    var newText = quantity + " x " + productName;

    if (existingText.trim() === "") {
        addedInput.value = newText;
    } else {
        addedInput.value = existingText + "\n" + newText;
    }
}
