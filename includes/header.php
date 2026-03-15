<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="ms-MY">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DFP40443 - Sistem Tempahan Kuih Raya</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
        body { background-color: #f8f9fa; color: #333; line-height: 1.6; }
        .header-wrapper { background-color: #d63384; color: white; padding: 20px; text-align: center; }
        .header-wrapper h1 { margin-bottom: 10px; }
        .nav-menu { background-color: #c2185b; padding: 15px; text-align: center; }
        .nav-menu a { color: white; text-decoration: none; margin: 0 15px; font-weight: bold; }
        .nav-menu a:hover { text-decoration: underline; }
        .container { max-width: 1200px; margin: 20px auto; padding: 0 20px; }
        .product-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-top: 20px; }
        .product-card { background: white; padding: 15px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); text-align: center; }
        .product-card img { width: 100%; height: 200px; object-fit: cover; border-radius: 5px; margin-bottom: 10px; }
        .product-card h3 { color: #d63384; margin-bottom: 10px; }
        .price-tag { color: #28a745; font-weight: bold; }
        .order-form { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-top: 20px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input, .form-group select { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        .btn { background-color: #d63384; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-weight: bold; }
        .btn:hover { background-color: #c2185b; }
        .invoice-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .invoice-table th, .invoice-table td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        .invoice-table th { background-color: #f2f2f2; }
        .total-row { font-weight: bold; background-color: #f8f9fa; }
        @media print {
            .header-wrapper, .nav-menu, .btn, .footer-wrapper { display: none !important; }
            .invoice-table, .invoice-table th, .invoice-table td { border: 2px solid #000 !important; }
        }
        .footer-wrapper { background-color: #333; color: white; padding: 15px; text-align: center; margin-top: 30px; }
    </style>
</head>
<body>
<div class="header-wrapper">
    <h1>Sistem Tempahan Kuih Raya DFP40443</h1>
    <p>Tempahan Kuih Raya Berkualiti | Harga Bersaing</p>
</div>