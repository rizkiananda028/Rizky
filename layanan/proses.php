<?php

include '../config/koneksi.php';

/* =======================
SIMPAN
======================= */

if(isset($_POST['simpan'])){

$nama=mysqli_real_escape_string($koneksi,$_POST['nama_layanan']);

$harga=mysqli_real_escape_string($koneksi,$_POST['harga']);

mysqli_query($koneksi,

"INSERT INTO tabel_layanan

(nama_layanan,harga)

VALUES

('$nama','$harga')");

header("Location:index.php");

exit;

}

/* =======================
UPDATE
======================= */

if(isset($_POST['update'])){

$id=$_POST['id_layanan'];

$nama=mysqli_real_escape_string($koneksi,$_POST['nama_layanan']);

$harga=mysqli_real_escape_string($koneksi,$_POST['harga']);

mysqli_query($koneksi,

"UPDATE tabel_layanan SET

nama_layanan='$nama',

harga='$harga'

WHERE id_layanan='$id'");

header("Location:index.php");

exit;

}