<?php
require_once 'data/product_data.php';
require_once 'includes/header.php';
require_once 'includes/nav.php';
?>

<?php
if (isset($_SESSION['error_msg'])) {
    echo "<div style='color: red; font-weight: bold;'>{$_SESSION['error_msg']}</div>";
    unset($_SESSION['error_msg']);
}
?>

<h2>Form Tempahan Kuih Raya</h2>
<form method="POST" action="process/process_tempah.php" class="order-form">
<div class="form-group">
    <label for="nama_pelanggan">Nama Pelanggan:</label>
    <input type="text" id="nama_pelanggan" name="nama_pelanggan" required>
</div>

<div class="form-group">
    <label for="no_tel">No. Telefon:</label>
    <input type="tel" id="no_tel" name="no_tel" required>
</div>

<h3>Pilih Produk & Kuantiti</h3>
<?php foreach ($produk_list as $produk): ?>
<div class="form-group">
    <h4><?= $produk['nama'] ?></h4>
    <?php foreach ($produk['harga'] as $saiz => $harga): ?>
        <?php $saiz_label = ucwords(str_replace('_', ' ', $saiz)); ?>
        <label>
            <?= $saiz_label ?> (RM <?= number_format($harga, 2) ?>):
            <input type="number" name="tempahan[<?= $produk['id'] ?>][<?= $saiz ?>]" class="quantity-input" data-price="<?= $harga ?>" min="0" value="0">
        </label><br>
    <?php endforeach; ?>
</div>
<?php endforeach; ?>

<div class="form-group">
    <label>Jumlah Keseluruhan:</label>
    <span id="total-price" class="price-tag">RM 0.00</span>
</div>

<button type="submit" class="btn">Hantar Tempahan</button>
</form>

<?php
require_once 'includes/footer.php';
?>