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
