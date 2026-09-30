<?php
// Deteksi folder halaman aktif untuk highlight menu
$current = basename(dirname($_SERVER['PHP_SELF']));
if ($current === 'cucian_motor') { $current = 'dashboard'; }
?>
<!-- Sidebar -->
<div class="sidebar">

    <div class="logo">
        <i class="bi bi-droplet-half"></i>
        <span>Ezyy CarWash</span>
    </div>

    <ul class="menu">

        <li>
            <a href="<?= BASE_URL ?>index.php" class="<?= $current === 'dashboard' ? 'active' : '' ?>">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="<?= BASE_URL ?>layanan/index.php" class="<?= $current === 'layanan' ? 'active' : '' ?>">
                <i class="bi bi-card-checklist"></i>
                <span>Data Layanan</span>
            </a>
        </li>

        <li>
            <a href="<?= BASE_URL ?>pelanggan/index.php" class="<?= $current === 'pelanggan' ? 'active' : '' ?>">
                <i class="bi bi-people-fill"></i>
                <span>Data Pelanggan</span>
            </a>
        </li>

        <li>
            <a href="<?= BASE_URL ?>transaksi/index.php" class="<?= $current === 'transaksi' ? 'active' : '' ?>">
                <i class="bi bi-cash-stack"></i>
                <span>Transaksi</span>
            </a>
        </li>

        <li>
            <a href="<?= BASE_URL ?>laporan/index.php" class="<?= $current === 'laporan' ? 'active' : '' ?>">
                <i class="bi bi-bar-chart-fill"></i>
                <span>Laporan</span>
            </a>
        </li>

    </ul>

    <div class="sidebar-footer">
        Premium Detailing
    </div>

</div>
