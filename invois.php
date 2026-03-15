<?php
require_once 'process/process_invois.php';
require_once 'includes/header.php';
require_once 'includes/nav.php';

if (!$invois_data) {
    echo "<div style='color: red; font-weight: bold;'>Tiada data invois! Sila tempah produk dahulu.</div>";
} else {
    echo "<h2>Invois Tempahan Kuih Raya</h2>";
    echo "<button onclick='printInvoice()' class='btn'>Cetak Invois</button>";
    
    echo "<div style='margin: 20px 0;'>";
    echo "<p><strong>Nama Pelanggan:</strong> {$invois_data['nama_pelanggan']}</p>";
    echo "<p><strong>No. Telefon:</strong> {$invois_data['no_tel']}</p>";
    echo "<p><strong>Tarikh Tempahan:</strong> {$invois_data['tarikh']}</p>";
    echo "</div>";
    
    echo "<table class='invoice-table'>";
    echo "<tr><th>Nama Produk</th><th>Saiz</th><th>Kuantiti</th><th>Harga/Unit (RM)</th><th>Jumlah (RM)</th></tr>";
    
    foreach ($invois_data['item_tempahan'] as $item) {
        echo "<tr>";
        echo "<td>{$item['nama_produk']}</td>";
        echo "<td>{$item['saiz']}</td>";
        echo "<td>{$item['kuantiti']}</td>";
        echo "<td>" . number_format($item['harga_seunit'], 2) . "</td>";
        echo "<td>" . number_format($item['jumlah_harga'], 2) . "</td>";
        echo "</tr>";
    }
    
    echo "<tr class='total-row'>";
    echo "<td colspan='4'><strong>Jumlah Keseluruhan</strong></td>";
    echo "<td><strong>" . number_format($invois_data['jumlah_besar'], 2) . "</strong></td>";
    echo "</tr>";
    echo "</table>";
}

require_once 'includes/footer.php';
?>