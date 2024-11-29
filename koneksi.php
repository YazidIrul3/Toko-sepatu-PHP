<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_toko_sepatu");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>