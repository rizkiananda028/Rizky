<?php

include '../config/koneksi.php';

/* SIMPAN */

if(isset($_POST['simpan'])){

$nama=mysqli_real_escape_string($koneksi,$_POST['nama_pemilik']);

$plat=mysqli_real_escape_string($koneksi,$_POST['no_plat']);

$motor=mysqli_real_escape_string($koneksi,$_POST['jenis_motor']);

mysqli_query($koneksi,

"INSERT INTO tabel_pelanggan

(nama_pemilik,no_plat,jenis_motor)

VALUES

('$nama','$plat','$motor')");

header("Location:index.php");

exit;

}

/* UPDATE */

if(isset($_POST['update'])){

$id=$_POST['id_pelanggan'];

$nama=mysqli_real_escape_string($koneksi,$_POST['nama_pemilik']);

$plat=mysqli_real_escape_string($koneksi,$_POST['no_plat']);

$motor=mysqli_real_escape_string($koneksi,$_POST['jenis_motor']);

mysqli_query($koneksi,

"UPDATE tabel_pelanggan SET

nama_pemilik='$nama',

no_plat='$plat',

jenis_motor='$motor'

WHERE id_pelanggan='$id'");

header("Location:index.php");

exit;

}