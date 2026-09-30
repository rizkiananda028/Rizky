<?php

include '../config/koneksi.php';

$id=$_GET['id'];

mysqli_query($koneksi,"DELETE FROM tabel_layanan WHERE id_layanan='$id'");

header("Location:index.php");

exit;