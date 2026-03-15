<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$invois_data = $_SESSION['invois_data'] ?? null;
?>