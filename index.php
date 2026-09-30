<?php
include 'config/koneksi.php';
include 'includes/header.php';
include 'includes/sidebar.php';

$total_layanan   = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tabel_layanan"));
$total_pelanggan = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tabel_pelanggan"));
$total_transaksi = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tabel_transaksi"));
?>

<div class="main-content">
<div class="container-fluid">

<div class="hero-banner mb-4">
    <h1 class="display-6 mb-2">Sistem Informasi Cucian Motor</h1>
    <p class="fs-5 mb-0">Aplikasi manajemen kasir cucian motor premium — cepat, rapi, dan elegan.</p>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="stat-card h-100">
            <i class="bi bi-gear-fill"></i>
            <h6>Paket Layanan</h6>
            <h2><?= $total_layanan ?></h2>
            <a href="layanan/index.php" class="btn btn-neon btn-sm">Kelola</a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card h-100">
            <i class="bi bi-people-fill"></i>
            <h6>Pelanggan</h6>
            <h2><?= $total_pelanggan ?></h2>
            <a href="pelanggan/index.php" class="btn btn-neon btn-sm">Kelola</a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card h-100">
            <i class="bi bi-cash-coin"></i>
            <h6>Total Transaksi</h6>
            <h2><?= $total_transaksi ?></h2>
            <a href="transaksi/index.php" class="btn btn-neon btn-sm">Kelola</a>
        </div>
    </div>
</div>

</div>
</div>

<?php include 'includes/footer.php'; ?>
