<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_inventory";

// isi nama host, username mysql, dan password mysql anda
$koneksi = mysqli_connect($host,$username,$password,$database);

if (!$koneksi) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>