// Fungsi untuk membuka popup dan memuat produk kecuali kategori "Spill Kit" dan "Custom Spill Kit"
function openPopup(id, name, image, description, category) {
    const popup = document.getElementById(`popup-${id}`);
    document.getElementById(`popup-title-${id}`).innerText = name;
    document.getElementById(`popup-image-${id}`).src = image;
    document.getElementById(`popup-image-${id}`).alt = name;
    document.getElementById(`popup-description-${id}`).innerText = description;


    // Tampilkan elemen khusus hanya untuk kategori 'Custom Spill Kit'
    if (category === "Custom Spill Kit") {
        document.getElementById(`custom-elements-${id}`).style.display =
            "block";

        // Ambil semua produk untuk combo box kecuali kategori 'Spill Kit' dan 'Custom Spill Kit'
        $.ajax({
            url: "/frontend/products/custom-spill-kit-products", // Endpoint untuk mendapatkan semua produk kecuali 'Spill Kit' dan 'Custom Spill Kit'
            method: "GET",
            success: (data) => {
                const select = document.getElementById(`product-select-${id}`);
                select.innerHTML = ""; // Kosongkan combo box

                // biome-ignore lint/complexity/noForEach: <explanation>
                data.forEach((product) => {
                    const option = document.createElement("option");
                    option.value = product.id;
                    option.text = product.name;
                    select.appendChild(option);
                });
            },
        });
    } else {
        document.getElementById(`custom-elements-${id}`).style.display = "none";
    }
    document.getElementById(`orderButton-${id}`).setAttribute("onclick", `openOrderPopup(${id})`);
    popup.style.display = "flex";
}

// Fungsi untuk menutup popup
function closePopup(id) {
    const popup = document.getElementById(id);
    popup.style.display = "none";
}

// Fungsi untuk menambah nilai quantity
function increaseValue(productId) {
    const quantityInput = document.getElementById(
        `product-quantity-${productId}`
    );
    quantityInput.value = Number.parseInt(quantityInput.value) + 1;
}

// Fungsi untuk mengurangi nilai quantity
function decreaseValue(productId) {
    const quantityInput = document.getElementById(
        `product-quantity-${productId}`
    );
    if (quantityInput.value > 0) {
        quantityInput.value = Number.parseInt(quantityInput.value) - 1;
    }
}

// Fungsi untuk menambahkan produk ke dalam textarea
function addProduct(productId) {
    const select = document.getElementById(`product-select-${productId}`);
    const quantity = document.getElementById(
        `product-quantity-${productId}`
    ).value;
    const addedInput = document.getElementById(`product-added-${productId}`);
    const productName = select.options[select.selectedIndex].text;

    const existingText = addedInput.value;
    const newText = `${quantity} x ${productName}`;

    if (existingText.trim() === "") {
        addedInput.value = newText;
    } else {
        addedInput.value = `${existingText}\n${newText}`;
    }
}

// Fungsi untuk menghapus input terakhir dari textarea
function removeLastProduct(productId) {
    const addedInput = document.getElementById(`product-added-${productId}`);
    const existingText = addedInput.value.trim().split("\n");

    if (existingText.length > 0) {
        existingText.pop();
        addedInput.value = existingText.join("\n");
    }
}


function openOrderPopup(productId) {
    const orderPopup = document.getElementById("orderPopup");
    const itemsTextarea = document.getElementById("items");
    const addedInput = document.getElementById(`product-added-${productId}`);

    itemsTextarea.value = addedInput.value;
    orderPopup.style.display = "block";
}

// Fungsi untuk menutup popup order
function closeOrderPopup() {
    const orderPopup = document.getElementById("orderPopup");
    orderPopup.style.display = "none";
}

// Fungsi untuk submit form order
document.getElementById('orderForm').addEventListener('submit', (e) => {
    e.preventDefault();
    // Tambahkan logika submit di sini, misalnya dengan menggunakan AJAX
    alert('Order submitted!');
    closeOrderPopup();
});
