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

    // Tambahkan nama produk yang dipilih di bagian awal field "Barang"
    const initialText = `Nama Produk yang dipilih: ${productName}\n\n`;
    itemsTextarea.value = initialText + addedInput.value;

    orderPopup.style.display = "block";
    orderPopup.style.zIndex = 2000; // Ensure it is on top of the previous popup
    document.body.classList.add("modal-open"); // Tambahkan kelas modal-open ke body
}

// Fungsi untuk menutup popup order
function closeOrderPopup() {
    const orderPopup = document.getElementById("orderPopup");
    orderPopup.style.display = "none";
    document.body.classList.add("modal-open"); // Tambahkan kelas modal-open ke body
}

// Fungsi untuk submit form order
function submitOrderForm() {
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const address = document.getElementById("address").value;
    const company = document.getElementById("company").value;
    const items = document.getElementById("items").value;

    const whatsappNumber = "62895331266187"; // Ganti dengan nomor WhatsApp sales Anda
    const message = `Nama: ${name}\nEmail: ${email}\nNo Tlp: ${phone}\nAlamat: ${address}\nNama Perusahaan: ${company}\nBarang:\n${items}`;

    const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(
        message
    )}`;
    window.open(whatsappURL, "_blank");
    document.body.classList.add("modal-open"); // Tambahkan kelas modal-open ke body
}
