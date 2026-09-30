<?php
include '../config/koneksi.php';

$id = $_GET['id'];
$transaksi = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tabel_transaksi WHERE id_transaksi='$id'"));

include '../includes/header.php';
include '../includes/sidebar.php';
?>

<div class="main-content">

<div class="container-fluid">

<div class="card card-custom">

<div class="card-header-custom">

<h3><i class="bi bi-pencil-square"></i> Edit Transaksi</h3>

</div>

<div class="card-body">

<form action="proses.php" method="POST">

<input type="hidden" name="id_transaksi" value="<?= $transaksi['id_transaksi']; ?>">

<div class="mb-3">
<label class="form-label">Pelanggan</label>
<select name="id_pelanggan" class="form-select" required>
    <?php
    $p_res = mysqli_query($koneksi, "SELECT * FROM tabel_pelanggan ORDER BY nama_pemilik");
    while($p = mysqli_fetch_assoc($p_res)){
        $sel = ($p['id_pelanggan'] == $transaksi['id_pelanggan']) ? 'selected' : '';
        echo "<option value='".$p['id_pelanggan']."' $sel>"
            .htmlspecialchars($p['nama_pemilik'])
            ." (".htmlspecialchars($p['jenis_motor']).")</option>";
    }
    ?>
</select>
</div>

<div class="mb-3">
<label class="form-label">Paket Layanan</label>
<select name="id_layanan" class="form-select" required>
    <?php
    $l_res = mysqli_query($koneksi, "SELECT * FROM tabel_layanan ORDER BY harga");
    while($l = mysqli_fetch_assoc($l_res)){
        $sel = ($l['id_layanan'] == $transaksi['id_layanan']) ? 'selected' : '';
        echo "<option value='".$l['id_layanan']."' $sel>"
            .htmlspecialchars($l['nama_layanan'])
            ." - Rp ".number_format($l['harga'],0,',','.')."</option>";
    }
    ?>
</select>
</div>

<div class="mb-3">
<label class="form-label">Status Pembayaran</label>
<select name="status_bayar" class="form-select" required>
    <option value="lunas" <?= ($transaksi['status_bayar']=='lunas') ? 'selected' : '' ?>>Lunas</option>
    <option value="belum bayar" <?= ($transaksi['status_bayar']=='belum bayar') ? 'selected' : '' ?>>Belum Bayar</option>
</select>
</div>

<button type="submit" name="update" class="btn btn-warning">
<i class="bi bi-check-circle"></i> Update
</button>

<a href="index.php" class="btn btn-secondary">Kembali</a>

</form>

</div>

</div>

</div>

</div>

<?php include '../includes/footer.php'; ?>
