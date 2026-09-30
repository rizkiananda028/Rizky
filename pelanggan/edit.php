<?php
include '../config/koneksi.php';

$id=$_GET['id'];

$data=mysqli_query($koneksi,"SELECT * FROM tabel_pelanggan WHERE id_pelanggan='$id'");

$row=mysqli_fetch_assoc($data);

include '../includes/header.php';
include '../includes/sidebar.php';
?>

<div class="main-content">

<div class="container-fluid">

<div class="card card-custom">

<div class="card-header-custom">

<h3>

Edit Pelanggan

</h3>

</div>

<div class="card-body">

<form action="proses.php" method="POST">

<input
type="hidden"
name="id_pelanggan"
value="<?= $row['id_pelanggan']; ?>">

<div class="mb-3">

<label>Nama Pemilik</label>

<input
type="text"
name="nama_pemilik"
class="form-control"
value="<?= htmlspecialchars($row['nama_pemilik']); ?>"
required>

</div>

<div class="mb-3">

<label>No Plat</label>

<input
type="text"
name="no_plat"
class="form-control"
value="<?= htmlspecialchars($row['no_plat']); ?>"
required>

</div>

<div class="mb-3">

<label>Jenis Motor</label>

<input
type="text"
name="jenis_motor"
class="form-control"
value="<?= htmlspecialchars($row['jenis_motor']); ?>"
required>

</div>

<button
type="submit"
name="update"
class="btn btn-warning">

Update

</button>

<a href="index.php"

class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

</div>

<?php include '../includes/footer.php'; ?>