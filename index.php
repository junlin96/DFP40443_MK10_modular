<?php
require_once 'data/product_data.php';
require_once 'includes/header.php';
require_once 'includes/nav.php';
?>

<h2>Selamat Datang ke Sistem Tempahan Kuih Raya</h2>
<p>Pilih kuih raya kegemaran anda dan tempah dengan mudah!</p>

<div class='product-grid'>
    <?php foreach ($produk_list as $produk): ?>
    <div class='product-card'>
        <img src='<?= $produk['gambar'] ?>' alt='<?= $produk['nama'] ?>'>
        <h3><?= $produk['nama'] ?></h3>
        <p class='price-tag'>Pek Mini: RM <?= number_format($produk['harga']['pek_mini'], 2) ?></p>
        <p class='price-tag'>Bungkusan Kecil: RM <?= number_format($produk['harga']['kecil'], 2) ?></p>
        <p class='price-tag'>Bungkusan Besar: RM <?= number_format($produk['harga']['besar'], 2) ?></p>
    </div>
    <?php endforeach; ?>
</div>

<?php
require_once 'includes/footer.php';
?>