<?php
include '../config/koneksi.php';
include '../includes/header.php';
include '../includes/sidebar.php';
?>

<div class="main-content">

<div class="container-fluid">

<div class="card card-custom">

<div class="card-header-custom">

<h3><i class="bi bi-plus-circle"></i> Tambah Layanan</h3>

</div>

<div class="card-body">

<form action="proses.php" method="POST">

<div class="mb-3">

<label class="form-label">Nama Layanan</label>

<input
type="text"
name="nama_layanan"
class="form-control"
placeholder="Contoh : Cuci Premium"
required>

</div>

<div class="mb-3">

<label class="form-label">Harga</label>

<input
type="number"
name="harga"
class="form-control"
placeholder="50000"
required>

</div>

<button
type="submit"
name="simpan"
class="btn btn-neon">

<i class="bi bi-save"></i>

Simpan

</button>

<a
href="index.php"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

</div>

<?php
include '../includes/footer.php';
?>