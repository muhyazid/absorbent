// Fungsi untuk membuka popup dan mengatur konten sesuai produk yang dipilih
function openPopup(id, name, image, description, category) {
    const popup = document.getElementById(`popup-${id}`);
    document.getElementById(`popup-title-${id}`).innerText = name;
    document.getElementById(`popup-image-${id}`).src = image;
    document.getElementById(`popup-image-${id}`).alt = name;
    document.getElementById(`popup-description-${id}`).innerText = description;

    // Reset konten textarea dan jumlah produk saat membuka popup
    document.getElementById(`product-added-${id}`).value = "";
    document.getElementById(`product-quantity-${id}`).value = 0;

    // Tampilkan elemen khusus jika kategori adalah "Custom Spill Kit"
    if (category === "Custom Spill Kit") {
        document.getElementById(`custom-elements-${id}`).style.display =
            "block";
        document.getElementById(`orderButton-${id}`).style.display =
            "inline-block";
        document.getElementById(`orderButton-${id}-all`).style.display = "none";
        $.ajax({
            url: "/frontend/products/custom-spill-kit-products",
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
        document.getElementById(`orderButton-${id}`).style.display = "none";
        document.getElementById(`orderButton-${id}-all`).style.display =
            "inline-block";
    }
    popup.style.display = "flex";
    document.body.classList.add("modal-open"); // Tambahkan kelas modal-open ke body
}

// Fungsi untuk memeriksa status login pengguna sebelum membuka popup pesanan
function checkLoginStatus(productId, productName) {
    if (isLoggedIn) {
        openOrderPopup(productId, productName);
    } else {
        showWarningPopup();
    }
}

// Fungsi untuk menutup popup dan mereset konten textarea serta jumlah produk
function closePopup(id) {
    const popup = document.getElementById(id);
    popup.style.display = "none";
    document.body.classList.remove("modal-open"); // Hapus kelas modal-open dari body

    // Reset konten textarea dan jumlah produk ke 0
    document.getElementById(`product-added-${id}`).value = "";
    document.getElementById(`product-quantity-${id}`).value = 0;

    // Reset juga combo box produk ke pilihan pertama
    const select = document.getElementById(`product-select-${id}`);
    if (select) {
        select.selectedIndex = 0;
    }
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

    // Cek apakah produk sudah ada di textarea
    const existingText = addedInput.value.split("\n");
    const productExists = existingText.some((item) =>
        item.includes(productName)
    );

    if (productExists) {
        alert("Produk ini sudah ada dalam daftar.");
        return; // Hentikan proses jika produk sudah ada
    }

    // Tambahkan produk ke textarea jika jumlahnya lebih dari 0
    if (quantity > 0) {
        const newText = `${quantity} x ${productName}`;
        if (addedInput.value.trim() === "") {
            addedInput.value = newText;
        } else {
            addedInput.value = `${addedInput.value}\n${newText}`;
        }
        document.getElementById(`product-quantity-${productId}`).value = 0; // Reset jumlah produk ke 0
    } else {
        alert("Jumlah produk harus lebih dari 0");
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
