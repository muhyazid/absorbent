// Fungsi untuk menampilkan notifikasi
function showNotification(message, productId) {
    const notificationMessage = document.getElementById("notificationMessage");
    notificationMessage.innerText = message;
    const notificationPopup = document.getElementById("notificationPopup");
    const productPopup = document.getElementById(`popup-${productId}`);

    if (!productPopup.contains(notificationPopup)) {
        productPopup.appendChild(notificationPopup);
    }
    notificationPopup.style.display = "block";
}

// Fungsi untuk menutup notifikasi
function closeNotificationPopup() {
    const notificationPopup = document.getElementById("notificationPopup");
    notificationPopup.style.display = "none";
    document.body.appendChild(notificationPopup);
}

// Fungsi untuk membuka popup dan mengatur konten sesuai produk yang dipilih
function openPopup(id, name, image, description, category) {
    const popup = document.getElementById(`popup-${id}`);
    document.getElementById(`popup-title-${id}`).innerText = name;
    document.getElementById(`popup-image-${id}`).src = image;
    document.getElementById(`popup-image-${id}`).alt = name;

    const formattedDescription = description.replace(/\r?\n/g, "<br>");
    document.getElementById(`popup-description-${id}`).innerHTML =
        formattedDescription;

    document.getElementById(`product-added-${id}`).value = "";
    document.getElementById(`product-quantity-${id}`).value = 0;

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
                select.innerHTML = "";
                data.forEach((product) => {
                    const option = document.createElement("option");
                    option.value = product.id;
                    option.text = product.name;
                    option.setAttribute("data-volume", product.size); // Gunakan 'size' untuk volume
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
    document.body.classList.add("modal-open");
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

    const quantityGroup = document.getElementById("quantity-group");
    if (productName !== "Custom Spill Kit") {
        quantityGroup.style.display = "block";
    } else {
        quantityGroup.style.display = "none";
    }

    orderPopup.style.display = "flex";
    document.body.classList.add("modal-open");
}

// Fungsi untuk menutup popup dan mereset konten textarea serta jumlah produk
function closePopup(id) {
    const popup = document.getElementById(id);
    popup.style.display = "none";

    document.body.classList.remove("modal-open");

    document.getElementById(`product-added-${id}`).value = "";
    document.getElementById(`product-quantity-${id}`).value = 0;

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
    const quantity = Number.parseInt(
        document.getElementById(`product-quantity-${productId}`).value
    );
    const addedInput = document.getElementById(`product-added-${productId}`);
    const productName = select.options[select.selectedIndex].text;
    const productVolume = Number.parseInt(
        select.options[select.selectedIndex].getAttribute("data-volume")
    );

    const existingProducts = addedInput.value.split("\n");
    const productExists = existingProducts.some((item) =>
        item.includes(productName)
    );

    // Hitung total volume produk yang sudah ditambahkan
    let totalVolume = productVolume * quantity;
    existingProducts.forEach((item) => {
        const volumeMatch = item.match(/(\d+) x .+ \((\d+) volume\)/);
        if (volumeMatch) {
            totalVolume +=
                Number.parseInt(volumeMatch[1]) *
                Number.parseInt(volumeMatch[2]);
        }
    });

    // Tentukan batas volume berdasarkan jenis produk
    const maxVolume = getMaxVolumeForProduct(productId);
    if (totalVolume > maxVolume) {
        showNotification(
            `Total volume produk tidak boleh lebih dari ${maxVolume} liter`,
            productId
        );
        return;
    }

    // Tambahkan produk ke textarea jika jumlahnya lebih dari 0
    if (quantity > 0) {
        const newText = `${quantity} x ${productName} (${productVolume} volume)`;
        addedInput.value =
            existingProducts.length > 0
                ? `${addedInput.value}\n${newText}`
                : newText;
        document.getElementById(`product-quantity-${productId}`).value = 0;
    } else {
        showNotification("Jumlah produk harus lebih dari 0", productId);
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

// Fungsi untuk mendapatkan batas volume berdasarkan jenis produk
function getMaxVolumeForProduct(productId) {
    const productTitle = document.getElementById(
        `popup-title-${productId}`
    ).innerText;
    if (productTitle.includes("10 Liter")) {
        return 10;
    } else if (productTitle.includes("20 Liter")) {
        return 20;
    } else if (productTitle.includes("30 Liter")) {
        return 30;
    }
    return 0;
}
