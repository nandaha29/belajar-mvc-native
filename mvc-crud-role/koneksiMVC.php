<?php
// sesuaikan username dan password
// $mysqli = new mysqli("localhost", "root", "", "belajar-mvc");

$server = "localhost";
$user = "root";
$pass = "";
$database = "belajar-mvc";
$mysqliconn = mysqli_connect($server, $user, $pass, $database);
if (!$mysqliconn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>