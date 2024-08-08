// Fungsi untuk menampilkan notifikasi
function showNotification(message, productId) {
    const notificationMessage = document.getElementById("notificationMessage");
    notificationMessage.innerText = message;
    const notificationPopup = document.getElementById("notificationPopup");
    const productPopup = document.getElementById(`popup-${productId}`);

    // Pastikan hanya ada satu instance notifikasi di dalam popup produk
    if (!productPopup.contains(notificationPopup)) {
        productPopup.appendChild(notificationPopup);
    }
    notificationPopup.style.display = "block"; // Tampilkan notifikasi
}

// Fungsi untuk menutup notifikasi
function closeNotificationPopup() {
    const notificationPopup = document.getElementById("notificationPopup");
    notificationPopup.style.display = "none"; // Sembunyikan notifikasi
    document.body.appendChild(notificationPopup); // Kembalikan notifikasi ke tempat asalnya
}

// Fungsi untuk membuka popup dan mengatur konten sesuai produk yang dipilih
function openPopup(id, name, image, description, category) {
    const popup = document.getElementById(`popup-${id}`);
    document.getElementById(`popup-title-${id}`).innerText = name; // Set judul produk di popup
    document.getElementById(`popup-image-${id}`).src = image; // Set gambar produk di popup
    document.getElementById(`popup-image-${id}`).alt = name;

    // Format deskripsi agar tampil sebagai daftar
    const formattedDescription = description.replace(/\r?\n/g, "<br>");
    document.getElementById(`popup-description-${id}`).innerHTML =
        formattedDescription;

    // Reset konten textarea dan jumlah produk saat membuka popup
    document.getElementById(`product-added-${id}`).value = "";
    document.getElementById(`product-quantity-${id}`).value = 0;

    // Jika kategori adalah "Custom Spill Kit", tampilkan elemen khusus
    if (category === "Custom Spill Kit") {
        document.getElementById(`custom-elements-${id}`).style.display =
            "block";
        document.getElementById(`orderButton-${id}`).style.display = "block";
        document.getElementById(`orderButtonNonCustom-${id}`).style.display =
            "none";
        // Ambil produk yang dapat dipilih untuk "Custom Spill Kit"
        $.ajax({
            url: "/frontend/products/custom-spill-kit-products",
            method: "GET",
            success: (data) => {
                const select = document.getElementById(`product-select-${id}`);
                select.innerHTML = ""; // Kosongkan combo box
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
        // Sembunyikan elemen khusus jika bukan "Custom Spill Kit"
        document.getElementById(`custom-elements-${id}`).style.display = "none";
        document.getElementById(`orderButton-${id}`).style.display = "none";
        document.getElementById(`orderButtonNonCustom-${id}`).style.display =
            "block";
    }
    popup.style.display = "flex"; // Tampilkan popup
    document.body.classList.add("modal-open"); // Tambahkan kelas modal-open ke body
}

// Fungsi untuk memeriksa status login pengguna sebelum membuka popup pesanan
function checkLoginStatus(productId, productName) {
    if (isLoggedIn) {
        openOrderPopup(productId, productName);
    } else {
        showWarningPopup(); // Tampilkan popup peringatan jika belum login
    }
}

// Fungsi untuk membuka popup pesanan dan mengatur konten form sesuai produk yang dipilih
function openOrderPopup(productId, productName) {
    const orderPopup = document.getElementById("orderPopup");
    const itemsInput = document.getElementById("items");
    itemsInput.value = `Nama Produk yang dipilih: ${productName}`; // Set nama produk di form

    // Tampilkan input jumlah jika produk bukan kategori "Custom Spill Kit"
    const quantityGroup = document.getElementById("quantity-group");
    if (productName !== "Custom Spill Kit") {
        quantityGroup.style.display = "block";
    } else {
        quantityGroup.style.display = "none";
    }

    orderPopup.style.display = "flex"; // Tampilkan popup pesanan
    document.body.classList.add("modal-open"); // Tambahkan kelas modal-open ke body
}

// Fungsi untuk menutup popup dan mereset konten textarea serta jumlah produk
function closePopup(id) {
    const popup = document.getElementById(id);
    popup.style.display = "none"; // Sembunyikan popup

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
    quantityInput.value = Number.parseInt(quantityInput.value) + 1; // Tambah nilai quantity
}

// Fungsi untuk mengurangi nilai quantity
function decreaseValue(productId) {
    const quantityInput = document.getElementById(
        `product-quantity-${productId}`
    );
    if (quantityInput.value > 0) {
        quantityInput.value = Number.parseInt(quantityInput.value) - 1; // Kurangi nilai quantity
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

    // Cek apakah produk sudah ada di textarea
    const existingProducts = addedInput.value.split("\n");
    const productExists = existingProducts.some((item) =>
        item.includes(productName)
    );

    // Tambahkan produk ke textarea jika jumlahnya lebih dari 0 dan produk belum ada
    if (quantity > 0 && !productExists) {
        const newText = `${quantity} x ${productName}`;
        addedInput.value =
            existingProducts.length > 0
                ? `${addedInput.value}\n${newText}`
                : newText;
        document.getElementById(`product-quantity-${productId}`).value = 0; // Reset jumlah produk ke 0
    } else {
        showNotification(
            "Jumlah produk harus lebih dari 0 dan produk tidak boleh duplikat",
            productId
        );
    }
}

// Fungsi untuk menghapus input terakhir dari textarea
function removeLastProduct(productId) {
    const addedInput = document.getElementById(`product-added-${productId}`);
    const existingText = addedInput.value.trim().split("\n");

    if (existingText.length > 0) {
        existingText.pop(); // Hapus input terakhir
        addedInput.value = existingText.join("\n");
    }
}
