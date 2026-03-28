<?php
require_once 'process/process_invois.php';
require_once 'includes/header.php';
require_once 'includes/nav.php';
?>

<?php if (!$invois_data): ?>
    <div style='color: red; font-weight: bold;'>Tiada data invois! Sila tempah produk dahulu.</div>
<?php else: ?>
    <h2>Invois Tempahan Kuih Raya</h2>
    <button onclick='printInvoice()' class='btn'>Cetak Invois</button>
    
    <div style='margin: 20px 0;'>
        <p><strong>Nama Pelanggan:</strong> <?= $invois_data['nama_pelanggan'] ?></p>
        <p><strong>No. Telefon:</strong> <?= $invois_data['no_tel'] ?></p>
        <p><strong>Tarikh Tempahan:</strong> <?= $invois_data['tarikh'] ?></p>
    </div>
    
    <table class='invoice-table'>
        <tr>
            <th>Nama Produk</th>
            <th>Saiz</th>
            <th>Kuantiti</th>
            <th>Harga/Unit (RM)</th>
            <th>Jumlah (RM)</th>
        </tr>
        <?php foreach ($invois_data['item_tempahan'] as $item): ?>
        <tr>
            <td><?= $item['nama_produk'] ?></td>
            <td><?= $item['saiz'] ?></td>
            <td><?= $item['kuantiti'] ?></td>
            <td><?= number_format($item['harga_seunit'], 2) ?></td>
            <td><?= number_format($item['jumlah_harga'], 2) ?></td>
        </tr>
        <?php endforeach; ?>
        <tr class='total-row'>
            <td colspan='4'><strong>Jumlah Keseluruhan</strong></td>
            <td><strong><?= number_format($invois_data['jumlah_besar'], 2) ?></strong></td>
        </tr>
    </table>
<?php endif; ?>

<?php
require_once 'includes/footer.php';
?>