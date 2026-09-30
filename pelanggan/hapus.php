<?php

include '../config/koneksi.php';

$id=$_GET['id'];

mysqli_query($koneksi,"DELETE FROM tabel_pelanggan WHERE id_pelanggan='$id'");

header("Location:index.php");

exit;