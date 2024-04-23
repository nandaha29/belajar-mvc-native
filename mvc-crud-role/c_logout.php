<?php
// Mulai sesi
session_start();

// Hapus semua data sesi
session_destroy();

// Arahkan kembali ke halaman formcookie6login.php setelah logout
header("Location: v_login.php");
exit;
?>
