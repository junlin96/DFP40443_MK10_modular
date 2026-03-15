<?php
require_once 'data/product_data.php';
require_once 'includes/header.php';
require_once 'includes/nav.php';

if (isset($_SESSION['error_msg'])) {
    echo "<div style='color: red; font-weight: bold;'>{$_SESSION['error_msg']}</div>";
    unset($_SESSION['error_msg']);
}

echo "<h2>Form Tempahan Kuih Raya</h2>";
echo "<form method='POST' action='process/process_tempah.php' class='order-form'>";

echo "<div class='form-group'>";
echo "<label for='nama_pelanggan'>Nama Pelanggan:</label>";
echo "<input type='text' id='nama_pelanggan' name='nama_pelanggan' required>";
echo "</div>";

echo "<div class='form-group'>";
echo "<label for='no_tel'>No. Telefon:</label>";
echo "<input type='tel' id='no_tel' name='no_tel' required>";
echo "</div>";

echo "<h3>Pilih Produk & Kuantiti</h3>";
foreach ($produk_list as $produk) {
    echo "<div class='form-group'>";
    echo "<h4>{$produk['nama']}</h4>";
    
    foreach ($produk['harga'] as $saiz => $harga) {
        $saiz_label = ucwords(str_replace('_', ' ', $saiz));
        echo "<label>";
        echo "{$saiz_label} (RM " . number_format($harga, 2) . "): ";
        echo "<input type='number' name='tempahan[{$produk['id']}][{$saiz}]' class='quantity-input' data-price='{$harga}' min='0' value='0'>";
        echo "</label><br>";
    }
    echo "</div>";
}

echo "<div class='form-group'>";
echo "<label>Jumlah Keseluruhan:</label>";
echo "<span id='total-price' class='price-tag'>RM 0.00</span>";
echo "</div>";

echo "<button type='submit' class='btn'>Hantar Tempahan</button>";
echo "</form>";
?>

<!-- 计算总价的JS，移到表单后、footer前（正确位置） -->
<script>
const quantityInputs = document.querySelectorAll('.quantity-input');
const totalPriceEl = document.getElementById('total-price');
function calculateTotal() {
    let total = 0;
    quantityInputs.forEach(input => {
        const quantity = parseInt(input.value, 10) || 0;
        const price = parseFloat(input.dataset.price) || 0;
        total += quantity * price;
    });
    totalPriceEl.textContent = new Intl.NumberFormat('ms-MY', { 
        style: 'currency', 
        currency: 'MYR' 
    }).format(total);
}
if (quantityInputs.length > 0) {
    quantityInputs.forEach(input => {
        input.addEventListener('input', calculateTotal);
    });
    calculateTotal();
}
</script>

<?php
require_once 'includes/footer.php';
?>