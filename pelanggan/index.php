<?php
include '../config/koneksi.php';
include '../includes/header.php';
include '../includes/sidebar.php';
?>

<div class="main-content">

<div class="container-fluid">

<div class="card card-custom">

<div class="card-header-custom d-flex justify-content-between align-items-center">

<h3><i class="bi bi-people-fill"></i> Data Pelanggan</h3>

<a href="tambah.php" class="btn btn-neon">
<i class="bi bi-plus-circle"></i> Tambah Pelanggan
</a>

</div>

<div class="card-body">

<table class="table table-custom table-hover">

<thead>
<tr>
<th width="70">No</th>
<th>Nama Pemilik</th>
<th>No Plat</th>
<th>Jenis Motor</th>
<th width="170">Aksi</th>
</tr>
</thead>

<tbody>

<?php

$no = 1;

$query = mysqli_query($koneksi, "SELECT * FROM tabel_pelanggan ORDER BY id_pelanggan DESC");

if (!$query) {
    echo '<tr><td colspan="5" class="text-center text-danger">Error: ' . mysqli_error($koneksi) . '</td></tr>';
} elseif (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
?>

<tr>
<td><?= $no++; ?></td>
<td><?= htmlspecialchars($row['nama_pemilik']); ?></td>
<td><?= htmlspecialchars($row['no_plat']); ?></td>
<td><span class="badge-info-custom"><?= htmlspecialchars($row['jenis_motor']); ?></span></td>
<td>
<a href="edit.php?id=<?= $row['id_pelanggan']; ?>" class="btn btn-warning btn-sm">
<i class="bi bi-pencil-square"></i>
</a>
<a href="hapus.php?id=<?= $row['id_pelanggan']; ?>" class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus pelanggan?')">
<i class="bi bi-trash"></i>
</a>
</td>
</tr>

<?php
    }
} else {
?>
<tr>
<td colspan="5" class="text-center">Belum ada data pelanggan.</td>
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

<?php include '../includes/footer.php'; ?>
