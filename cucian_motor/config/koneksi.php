<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "cucian_motor";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi Database Gagal : " . mysqli_connect_error());
}

date_default_timezone_set('Asia/Jakarta');

// BASE_URL: alamat dasar website (dipakai untuk link CSS & menu)
// - Kalau website ada di ROOT domain (misal: cuciantzy.my.id langsung), pakai: '/'
// - Kalau website ada di SUBFOLDER (misal: localhost/cucian_motor/), pakai: '/cucian_motor/'
define('BASE_URL', '/');
