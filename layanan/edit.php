<?php
include '../config/koneksi.php';

$id=$_GET['id'];

$data=mysqli_query($koneksi,"SELECT * FROM tabel_layanan WHERE id_layanan='$id'");

$row=mysqli_fetch_assoc($data);

include '../includes/header.php';
include '../includes/sidebar.php';
?>

<div class="main-content">

<div class="container-fluid">

<div class="card card-custom">

<div class="card-header-custom">

<h3>

<i class="bi bi-pencil-square"></i>

Edit Layanan

</h3>

</div>

<div class="card-body">

<form action="proses.php" method="POST">

<input
type="hidden"
name="id_layanan"
value="<?= $row['id_layanan']; ?>">

<div class="mb-3">

<label>Nama Layanan</label>

<input

type="text"

name="nama_layanan"

class="form-control"

value="<?= htmlspecialchars($row['nama_layanan']); ?>"

required>

</div>

<div class="mb-3">

<label>Harga</label>

<input

type="number"

name="harga"

class="form-control"

value="<?= $row['harga']; ?>"

required>

</div>

<button

type="submit"

name="update"

class="btn btn-warning">

<i class="bi bi-check-circle"></i>

Update

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