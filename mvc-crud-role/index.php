<?php
// // Mulai sesi
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Jika pengguna belum login, alihkan ke halaman login
    header("Location: v_login.php");
    exit;
}

// Jika pengguna sudah login, lanjutkan ke halaman utama
// Mengimpor file c_programKerja.php yang berisi definisi class c_programKerja
include_once("c_programKerja.php");

// Membuat objek dari class c_programKerja dan menyimpannya dalam variabel $controller
$controller = new c_programKerja();

// Memanggil method invoke() dari objek $controller untuk memulai alur kerja aplikasi
$controller->invoke();
?>
