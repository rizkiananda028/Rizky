<?php
include '../config/koneksi.php';
include '../includes/header.php';
include '../includes/sidebar.php';
?>

<div class="main-content">

<div class="container-fluid">

<div class="card card-custom">

<div class="card-header-custom d-flex justify-content-between align-items-center">

<h3>

<i class="bi bi-card-checklist"></i>

Data Layanan

</h3>

<a href="tambah.php" class="btn btn-neon">

<i class="bi bi-plus-circle"></i>

Tambah Layanan

</a>

</div>

<div class="card-body">

<table class="table table-custom table-hover">

<thead>

<tr>

<th width="80">No</th>

<th>Nama Layanan</th>

<th>Harga</th>

<th width="180">Aksi</th>

</tr>

</thead>

<tbody>

<?php

$no=1;

$query=mysqli_query($koneksi,"SELECT * FROM tabel_layanan ORDER BY id_layanan DESC");

if(mysqli_num_rows($query)>0){

while($row=mysqli_fetch_assoc($query)){

?>

<tr>

<td><?= $no++; ?></td>

<td>

<strong>

<?= htmlspecialchars($row['nama_layanan']); ?>

</strong>

</td>

<td>

Rp <?= number_format($row['harga'],0,',','.'); ?>

</td>

<td>

<a href="edit.php?id=<?= $row['id_layanan']; ?>"

class="btn btn-warning btn-sm">

<i class="bi bi-pencil-square"></i>

</a>

<a href="hapus.php?id=<?= $row['id_layanan']; ?>"

class="btn btn-danger btn-sm"

onclick="return confirm('Yakin ingin menghapus layanan ini?')">

<i class="bi bi-trash"></i>

</a>

</td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="4"

class="text-center">

Belum ada data layanan.

</td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>

</div>

</div>

</div>

<?php
include '../includes/footer.php';
?>