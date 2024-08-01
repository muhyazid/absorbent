// Fungsi untuk membuka popup dan memuat produk kecuali kategori "Spill Kit" dan "Custom Spill Kit"
function openPopup(id, name, image, description, category) {
    var popup = document.getElementById("popup-" + id);
    document.getElementById("popup-title-" + id).innerText = name;
    document.getElementById("popup-image-" + id).src = image;
    document.getElementById("popup-image-" + id).alt = name;
    document.getElementById("popup-description-" + id).innerText = description;

    // Tampilkan elemen khusus hanya untuk kategori 'Custom Spill Kit'
    if (category === "Custom Spill Kit") {
        document.getElementById("custom-elements-" + id).style.display =
            "block";

        // Ambil semua produk untuk combo box kecuali kategori 'Spill Kit' dan 'Custom Spill Kit'
        $.ajax({
            url: "/frontend/products/custom-spill-kit-products", // Endpoint untuk mendapatkan semua produk kecuali 'Spill Kit' dan 'Custom Spill Kit'
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
    } else {
        document.getElementById("custom-elements-" + id).style.display = "none";
    }

    popup.style.display = "flex";
}

// Fungsi untuk menutup popup
function closePopup(id) {
    var popup = document.getElementById(id);
    popup.style.display = "none";
}

// Fungsi untuk menambah nilai quantity
function increaseValue(productId) {
    var quantityInput = document.getElementById(
        "product-quantity-" + productId
    );
    quantityInput.value = parseInt(quantityInput.value) + 1;
}

// Fungsi untuk mengurangi nilai quantity
function decreaseValue(productId) {
    var quantityInput = document.getElementById(
        "product-quantity-" + productId
    );
    if (quantityInput.value > 0) {
        quantityInput.value = parseInt(quantityInput.value) - 1;
    }
}

// Fungsi untuk menambahkan produk ke dalam textarea
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

// Fungsi untuk menghapus input terakhir dari textarea
function removeLastProduct(productId) {
    var addedInput = document.getElementById("product-added-" + productId);
    var existingText = addedInput.value.trim().split("\n");

    if (existingText.length > 0) {
        existingText.pop();
        addedInput.value = existingText.join("\n");
    }
}
