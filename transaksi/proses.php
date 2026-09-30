<?php
include '../config/koneksi.php';

if(isset($_POST['simpan'])){
    $id_pelanggan = mysqli_real_escape_string($koneksi, $_POST['id_pelanggan']);
    $id_layanan   = mysqli_real_escape_string($koneksi, $_POST['id_layanan']);
    $status_bayar = mysqli_real_escape_string($koneksi, $_POST['status_bayar']);
    mysqli_query($koneksi, "INSERT INTO tabel_transaksi (id_pelanggan, id_layanan, status_bayar) VALUES ('$id_pelanggan', '$id_layanan', '$status_bayar')");
    header("Location: index.php");
    exit;
}

if(isset($_POST['update'])){
    $id           = $_POST['id_transaksi'];
    $id_pelanggan = mysqli_real_escape_string($koneksi, $_POST['id_pelanggan']);
    $id_layanan   = mysqli_real_escape_string($koneksi, $_POST['id_layanan']);
    $status_bayar = mysqli_real_escape_string($koneksi, $_POST['status_bayar']);
    mysqli_query($koneksi, "UPDATE tabel_transaksi SET id_pelanggan='$id_pelanggan', id_layanan='$id_layanan', status_bayar='$status_bayar' WHERE id_transaksi='$id'");
    header("Location: index.php");
    exit;
}
