<?php
include '../config/koneksi.php';
include '../includes/header.php';
include '../includes/sidebar.php';
?>

<div class="main-content">

<div class="container-fluid">

<div class="card card-custom">

<div class="card-header-custom">

<h3><i class="bi bi-plus-circle"></i> Transaksi Baru</h3>

</div>

<div class="card-body">

<form action="proses.php" method="POST">

<div class="mb-3">
<label class="form-label">Pilih Pelanggan</label>
<select name="id_pelanggan" class="form-select" required>
    <option value="">-- Pilih Pelanggan --</option>
    <?php
    $p_res = mysqli_query($koneksi, "SELECT * FROM tabel_pelanggan ORDER BY nama_pemilik");
    while($p = mysqli_fetch_assoc($p_res)){
        echo "<option value='".$p['id_pelanggan']."'>"
            .htmlspecialchars($p['nama_pemilik'])
            ." (".htmlspecialchars($p['jenis_motor'])
            ." - ".htmlspecialchars($p['no_plat']).")</option>";
    }
    ?>
</select>
</div>

<div class="mb-3">
<label class="form-label">Pilih Layanan</label>
<select name="id_layanan" class="form-select" required>
    <option value="">-- Pilih Layanan --</option>
    <?php
    $l_res = mysqli_query($koneksi, "SELECT * FROM tabel_layanan ORDER BY harga");
    while($l = mysqli_fetch_assoc($l_res)){
        echo "<option value='".$l['id_layanan']."'>"
            .htmlspecialchars($l['nama_layanan'])
            ." - Rp ".number_format($l['harga'],0,',','.')."</option>";
    }
    ?>
</select>
</div>

<div class="mb-3">
<label class="form-label">Status Bayar</label>
<select name="status_bayar" class="form-select" required>
    <option value="belum bayar">Belum Bayar</option>
    <option value="lunas">Lunas</option>
</select>
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
