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
        document.getElementById(`orderButton-${id}`).style.display = "block";
        document.getElementById(`orderButtonNonCustom-${id}`).style.display =
            "none";
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
        document.getElementById(`orderButtonNonCustom-${id}`).style.display =
            "block";
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

// Fungsi untuk membuka popup pesanan dan mengatur konten form sesuai produk yang dipilih
function openOrderPopup(productId, productName) {
    const orderPopup = document.getElementById("orderPopup");
    const itemsInput = document.getElementById("items");
    itemsInput.value = `Nama Produk yang dipilih: ${productName}`;

    // Tampilkan input jumlah jika produk bukan kategori "Custom Spill Kit"
    const quantityGroup = document.getElementById("quantity-group");
    if (productName !== "Custom Spill Kit") {
        quantityGroup.style.display = "block";
    } else {
        quantityGroup.style.display = "none";
    }

    orderPopup.style.display = "flex";
    document.body.classList.add("modal-open"); // Tambahkan kelas modal-open ke body
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
    const existingProducts = addedInput.value.split("\n");
    const productExists = existingProducts.some((item) =>
        item.includes(productName)
    );

    // Tambahkan produk ke textarea jika jumlahnya lebih dari 0 dan produk belum ada
    if (quantity > 0 && !productExists) {
        const existingText = addedInput.value;
        const newText = `${quantity} x ${productName}`;
        if (existingText.trim() === "") {
            addedInput.value = newText;
        } else {
            addedInput.value = `${existingText}\n${newText}`;
        }
        document.getElementById(`product-quantity-${productId}`).value = 0; // Reset jumlah produk ke 0
    } else {
        alert(
            "Jumlah produk harus lebih dari 0 dan produk tidak boleh duplikat"
        );
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

function showNotification(message) {
    const notificationMessage = document.getElementById("notificationMessage");
    notificationMessage.innerText = message;
    const notificationPopup = document.getElementById("notificationPopup");
    notificationPopup.style.display = "block"; // Use "block" to show the modal
    document.body.classList.add("modal-open"); // Optionally prevent scrolling
}

function closeNotificationPopup() {
    const notificationPopup = document.getElementById("notificationPopup");
    notificationPopup.style.display = "none"; // Hide the modal
    document.body.classList.remove("modal-open"); // Re-enable scrolling
}
