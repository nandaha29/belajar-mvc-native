<?php
// Mengimpor file c_programKerja.php yang berisi definisi class c_programKerja
include_once("c_programKerja.php");

// Membuat objek dari class c_programKerja dan menyimpannya dalam variabel $controller
$controller = new c_programKerja();

// Memanggil method invoke() dari objek $controller untuk memulai alur kerja aplikasi
$controller->invoke();
?>
