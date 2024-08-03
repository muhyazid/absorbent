// Fungsi untuk membuka popup order
function openOrderPopup(productId, productName) {
    const orderPopup = document.getElementById("orderPopup");
    const itemsTextarea = document.getElementById("items");
    const addedInput = document.getElementById(`product-added-${productId}`);

    // Pre-fill form fields with user data
    document.getElementById("name").value = user.name;
    document.getElementById("email").value = user.email;
    document.getElementById("phone").value = user.phone || "";
    document.getElementById("address").value = user.address || "";
    document.getElementById("company").value = user.company || "";

    const initialText = `Nama Produk yang dipilih: ${productName}\n\n`;
    itemsTextarea.value = initialText + addedInput.value;

    // Ensure it is on top of the previous popup

    // Set product name
    document.getElementById("product-name").innerText = productName;

    // Tambahkan nama produk yang dipilih di bagian awal field "Barang"
    itemsTextarea.value = addedInput.value;

    orderPopup.style.display = "block";
    orderPopup.style.zIndex = 2000; // Ensure it is on top of the previous popup

    document.body.classList.add("modal-open");
}

function closeOrderPopup() {
    const orderPopup = document.getElementById("orderPopup");
    orderPopup.style.display = "none";

    // ini eror git yazid
    // document.body.classList.add("modal-open"); // Tambahkan kelas modal-open ke body

    // Reset quantity input to 1 when popup is closed
    document.getElementById("quantity").value = 1;
    document.body.classList.remove("modal-open");
}

// Fungsi untuk submit form order
function submitOrderForm() {
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const address = document.getElementById("address").value;
    const company = document.getElementById("company").value;
    const items = document.getElementById("items").value;
    const productName = document.getElementById("product-name").innerText;
    const quantity = document.getElementById("quantity").value;

    const whatsappNumber = "62895331266187"; // Ganti dengan nomor WhatsApp sales Anda
    const message = `Nama: ${name}\nEmail: ${email}\nNo Tlp: ${phone}\nAlamat: ${address}\nNama Perusahaan: ${company}\nNama Produk yang dipilih: ${productName}\nBarang:\n${items}\nJumlah: ${quantity}`;

    const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(
        message
    )}`;
    window.open(whatsappURL, "_blank");
    document.body.classList.add("modal-open"); // Tambahkan kelas modal-open ke body
}

function increaseValue2() {
    const quantityInput = document.getElementById("quantity");
    quantityInput.value = Number.parseInt(quantityInput.value) + 1;
}

// Fungsi untuk mengurangi nilai quantity
function decreaseValue2() {
    const quantityInput = document.getElementById("quantity");
    if (quantityInput.value > 1) {
        quantityInput.value = Number.parseInt(quantityInput.value) - 1;
    }
}
