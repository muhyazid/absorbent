<!-- popup.blade.php -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<div id="popup-{{ $product->id }}" class="popup">
    <div class="popup-content">
        <div class="popup-body">
            <span class="close" onclick="closePopup('popup-{{ $product->id }}')">&times;</span>
            <div class="left-column">
                <img src="" alt="" id="popup-image-{{ $product->id }}" class="rounded-image">
                <h2 class="judul-popup" id="popup-title-{{ $product->id }}"></h2>
            </div>
            <div class="right-column text-container">
                <p class="key-feature"><strong>Description:</strong></p>
                <p class="tulisan-popup" id="popup-description-{{ $product->id }}"></p>
                <div id="custom-elements-{{ $product->id }}" style="display: none;">
                    <div class="form-group">
                        <label for="product-select-{{ $product->id }}"><strong>Produk:</strong></label>
                        <select id="product-select-{{ $product->id }}"></select>
                    </div>
                    <div class="form-group">
                        <label for="product-quantity-{{ $product->id }}"><strong>Jumlah:</strong></label>
                        <div class="input-group">
                            <button class="btn btn-outline-secondary" type="button"
                                onclick="decreaseValue({{ $product->id }})">-</button>

                            <input type="number" class="form-control" id="product-quantity-{{ $product->id }}"
                                value="0" min="0">

                            <button class="btn btn-outline-secondary" type="button"
                                onclick="increaseValue({{ $product->id }})">+</button>
                        </div>
                    </div>
                    <button class="btn btn-primary" onclick="addProduct({{ $product->id }})">Tambah</button>
                    <button class="btn btn-danger" onclick="removeLastProduct({{ $product->id }})">Hapus</button>
                    <textarea class="form-control mt-2 fixed-size-textarea" style="height: 4cm" id="product-added-{{ $product->id }}"
                        readonly></textarea>
                    <button id="orderButton-{{ $product->id }}" class="btn btn-success mt-2"
                        onclick="checkLoginStatus({{ $product->id }}, '{{ $product->name }}')">Pesan</button>
                </div>
                <button id="orderButtonNonCustom-{{ $product->id }}" class="btn btn-success mt-2"
                    onclick="checkLoginStatus({{ $product->id }}, '{{ $product->name }}')">Pesan</button>
            </div>
        </div>
        <div id="notificationPopup" class="notification-popup">
            <p id="notificationMessage"></p>
            <button class="close-btn" onclick="closeNotificationPopup()">Tutup</button>
        </div>
    </div>
</div>

<!-- Popup Form Order -->
<div id="orderPopup" class="popuporder">
    <div class="popup-contentorder">
        <span class="close" onclick="closeOrderPopup()">&times;</span>
        <h2 class="order-title">Form Order</h2>
        <form id="orderForm">
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="company">Nama Perusahaan:</label>
                <input type="text" id="company" name="company" required>
            </div>
            <div class="form-group">
                <label for="phone">No Tlp:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="address">Alamat:</label>
                <textarea id="address" name="address" required></textarea>
            </div>
            <div class="form-group">
                <label for="product">Nama Produk yang dipilih:</label>
                <p id="product-name"></p>
            </div>
            <div class="form-group">
                <label for="items">Isi Barang:</label>
                <textarea id="items" name="items" readonly></textarea>
            </div>
            <div class="form-group" id="quantity-group">
                <label for="quantity">Jumlah:</label>
                <div class="input-group2">
                    <input type="number" class="form-control text-center" id="quantity" name="quantity"
                        value="1" min="1">
                </div>
            </div>
            <button type="button" onclick="submitOrderForm('6287853460577')">WhatsApp Admin 1</button>
            <button type="button" onclick="submitOrderForm('6287814507778')">WhatsApp Admin 2</button>
        </form>
    </div>
</div>

<!-- Warning Popup harus login dulu sebelum pesan -->
<div id="warningPopup" class="popupwarning">
    <div class="popup-contentwarning">
        <span class="close" onclick="closeWarningPopup()">&times;</span>
        <p>Anda harus login terlebih dahulu untuk membuat pesanan.</p>
        <button onclick="redirectToLogin()">Login</button>
    </div>
</div>

<!-- Popup notifikasi jika produk ditambahkan lebih dari satu kali atau jumlah 0 -->
<div id="notificationPopup" class="notification-popup">
    <p id="notificationMessage"></p>
    <button class="close-btn" onclick="closeNotificationPopup()">Tutup</button>
</div>
