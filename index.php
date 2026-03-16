<?php
require_once 'data/product_data.php';
require_once 'includes/header.php';
require_once 'includes/nav.php';

echo "<h2>Selamat Datang ke Sistem Tempahan Kuih Raya</h2>";
echo "<p>Pilih kuih raya kegemaran anda dan tempah dengan mudah!</p>";

echo "<div class='product-grid'>";
foreach ($produk_list as $produk) {
    echo "<div class='product-card'>";
    echo "<img src='{$produk['gambar']}' alt='{$produk['nama']}'>";
    echo "<h3>{$produk['nama']}</h3>";
    echo "<p class='price-tag'>Pek Mini: RM " . number_format($produk['harga']['pek_mini'], 2) . "</p>";
    echo "<p class='price-tag'>Bungkusan Kecil: RM " . number_format($produk['harga']['kecil'], 2) . "</p>";
    echo "<p class='price-tag'>Bungkusan Besar: RM " . number_format($produk['harga']['besar'], 2) . "</p>";
    echo "</div>";
}
echo "</div>";

require_once 'includes/footer.php';
?>