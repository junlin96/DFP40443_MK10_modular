<?php
require_once '../data/product_data.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_pelanggan = htmlspecialchars($_POST['nama_pelanggan'] ?? '');
    $no_tel = htmlspecialchars($_POST['no_tel'] ?? '');
    $tempahan_input = $_POST['tempahan'] ?? [];

    if (empty($nama_pelanggan) || empty($no_tel) || empty($tempahan_input)) {
        $_SESSION['error_msg'] = "Sila isi semua maklumat dan pilih sekurang-kurangnya satu produk!";
        header('Location: ../tempah.php');
        exit;
    }

    $item_tempahan = [];
    $jumlah_besar = 0;

    foreach ($tempahan_input as $produk_id => $saiz_list) {
        $produk_detail = null;
        foreach ($produk_list as $p) {
            if ($p['id'] == $produk_id) {
                $produk_detail = $p;
                break;
            }
        }
        if (!$produk_detail) continue;

        foreach ($saiz_list as $saiz => $kuantiti) {
            $kuantiti = (int)$kuantiti;
            if ($kuantiti > 0 && isset($produk_detail['harga'][$saiz])) {
                $harga_seunit = $produk_detail['harga'][$saiz];
                $jumlah_harga = $kuantiti * $harga_seunit;
                $jumlah_besar += $jumlah_harga;

                $item_tempahan[] = [
                    'nama_produk' => $produk_detail['nama'],
                    'saiz' => ucwords(str_replace('_', ' ', $saiz)),
                    'kuantiti' => $kuantiti,
                    'harga_seunit' => $harga_seunit,
                    'jumlah_harga' => $jumlah_harga
                ];
            }
        }
    }

    $_SESSION['invois_data'] = [
        'nama_pelanggan' => $nama_pelanggan,
        'no_tel' => $no_tel,
        'item_tempahan' => $item_tempahan,
        'jumlah_besar' => $jumlah_besar,
        'tarikh' => date('d/m/Y H:i:s')
    ];

    header('Location: ../invois.php');
    exit;
}
?>