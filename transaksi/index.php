<?php
include '../config/koneksi.php';
include '../includes/header.php';
include '../includes/sidebar.php';
?>

<div class="main-content">

<div class="container-fluid">

<div class="card card-custom">

<div class="card-header-custom d-flex justify-content-between align-items-center">

<h4 class="page-title mb-0">
<i class="bi bi-cash-coin"></i>
Antrean & Transaksi Aktif
</h4>

<a href="tambah.php" class="btn btn-neon">
<i class="bi bi-plus-circle"></i> Transaksi Baru
</a>

</div>

<div class="card-body p-0">

<table class="table table-custom table-hover align-middle mb-0">

<thead>
<tr class="text-center">
<th>No</th>
<th>Nama Pemilik</th>
<th>Motor</th>
<th>Paket</th>
<th>Total Harga</th>
<th>Status</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

<?php

$no = 1;

$sql = "
SELECT
    t.id_transaksi,
    t.status_bayar,
    p.nama_pemilik,
    p.no_plat,
    p.jenis_motor,
    l.nama_layanan,
    l.harga
FROM tabel_transaksi t
INNER JOIN tabel_pelanggan p ON t.id_pelanggan = p.id_pelanggan
INNER JOIN tabel_layanan l ON t.id_layanan = l.id_layanan
ORDER BY t.id_transaksi DESC
";

$query = mysqli_query($koneksi, $sql);

if (!$query) {
    echo '<tr><td colspan="7" class="text-center text-danger">Error: ' . mysqli_error($koneksi) . '</td></tr>';
} elseif (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
?>

<tr>

<td><?= $no++; ?></td>

<td class="fw-bold"><?= htmlspecialchars($row['nama_pemilik']); ?></td>

<td>
<?= htmlspecialchars($row['jenis_motor']); ?><br>
<small class="text-info"><?= htmlspecialchars($row['no_plat']); ?></small>
</td>

<td><?= htmlspecialchars($row['nama_layanan']); ?></td>

<td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>

<td>
<?php if ($row['status_bayar'] == 'lunas'): ?>
<span class="badge-lunas">Lunas</span>
<?php else: ?>
<span class="badge-belum">Belum Bayar</span>
<?php endif; ?>
</td>

<td class="text-center">
<a href="edit.php?id=<?= $row['id_transaksi']; ?>" class="btn btn-warning btn-sm">
<i class="bi bi-pencil-square"></i>
</a>
<a href="hapus.php?id=<?= $row['id_transaksi']; ?>" class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus transaksi ini?')">
<i class="bi bi-trash"></i>
</a>
</td>

</tr>

<?php
    }
} else {
?>

<tr>
<td colspan="7" class="text-center py-5">
<i class="bi bi-database-fill-x display-5 text-secondary"></i>
<h5 class="mt-3">Belum ada transaksi</h5>
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

<?php include '../includes/footer.php'; ?>
