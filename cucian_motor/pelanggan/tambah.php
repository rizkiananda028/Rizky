<?php
include '../config/koneksi.php';
include '../includes/header.php';
include '../includes/sidebar.php';
?>

<div class="main-content">

<div class="container-fluid">

<div class="card card-custom">

<div class="card-header-custom">

<h3><i class="bi bi-person-plus-fill"></i> Tambah Pelanggan</h3>

</div>

<div class="card-body">

<form action="proses.php" method="POST">

<div class="mb-3">
<label class="form-label">Nama Pemilik</label>
<input type="text" name="nama_pemilik" class="form-control" placeholder="Contoh: Budi Santoso" required>
</div>

<div class="mb-3">
<label class="form-label">No Plat</label>
<input type="text" name="no_plat" class="form-control" placeholder="Contoh: BG 1234 AB" required>
</div>

<div class="mb-3">
<label class="form-label">Jenis Motor</label>
<input type="text" name="jenis_motor" class="form-control" placeholder="Contoh: VARIO, MIO, BEAT" required>
</div>

<button type="submit" name="simpan" class="btn btn-neon">
<i class="bi bi-save"></i> Simpan
</button>

<a href="index.php" class="btn btn-secondary">Kembali</a>

</form>

</div>

</div>

</div>

</div>

<?php include '../includes/footer.php'; ?>
