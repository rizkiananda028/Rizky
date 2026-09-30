<?php
include '../config/koneksi.php';
include '../includes/header.php';
include '../includes/sidebar.php';

// Total pendapatan dari transaksi lunas
$q_pendapatan = mysqli_query($koneksi, "
    SELECT SUM(l.harga) as total
    FROM tabel_transaksi t
    INNER JOIN tabel_layanan l ON t.id_layanan = l.id_layanan
    WHERE t.status_bayar = 'lunas'
");
$pendapatan = mysqli_fetch_assoc($q_pendapatan);
$total_pendapatan = $pendapatan['total'] ? $pendapatan['total'] : 0;

// Hitung per status
$q_lunas = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tabel_transaksi WHERE status_bayar='lunas'");
$total_lunas = mysqli_fetch_assoc($q_lunas)['total'];

$q_belum = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tabel_transaksi WHERE status_bayar='belum bayar'");
$total_belum = mysqli_fetch_assoc($q_belum)['total'];

// Layanan terpopuler
$q_populer = mysqli_query($koneksi, "
    SELECT l.nama_layanan, COUNT(*) as jumlah, l.harga
    FROM tabel_transaksi t
    INNER JOIN tabel_layanan l ON t.id_layanan = l.id_layanan
    GROUP BY t.id_layanan
    ORDER BY jumlah DESC
");

// Semua transaksi lengkap
$q_semua = mysqli_query($koneksi, "
    SELECT t.id_transaksi, t.status_bayar,
           p.nama_pemilik, p.no_plat, p.jenis_motor,
           l.nama_layanan, l.harga
    FROM tabel_transaksi t
    INNER JOIN tabel_pelanggan p ON t.id_pelanggan = p.id_pelanggan
    INNER JOIN tabel_layanan l ON t.id_layanan = l.id_layanan
    ORDER BY t.id_transaksi DESC
");
?>

<div class="main-content">
<div class="container-fluid">

<!-- Summary Cards -->
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card card-custom text-center">
            <div class="card-body py-4">
                <i class="bi bi-cash-stack fs-1 text-success"></i>
                <h6 class="mt-2 text-secondary">Total Pendapatan</h6>
                <h3 class="fw-bold text-success">Rp <?= number_format($total_pendapatan, 0, ',', '.'); ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-custom text-center">
            <div class="card-body py-4">
                <i class="bi bi-check-circle-fill fs-1 text-info"></i>
                <h6 class="mt-2 text-secondary">Transaksi Lunas</h6>
                <h3 class="fw-bold"><?= $total_lunas; ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-custom text-center">
            <div class="card-body py-4">
                <i class="bi bi-clock-fill fs-1 text-warning"></i>
                <h6 class="mt-2 text-secondary">Belum Bayar</h6>
                <h3 class="fw-bold text-warning"><?= $total_belum; ?></h3>
            </div>
        </div>
    </div>
</div>

<!-- Layanan Terpopuler -->
<div class="card card-custom mb-4">
    <div class="card-header-custom">
        <h5 class="page-title mb-0"><i class="bi bi-bar-chart-fill"></i> Layanan Terpopuler</h5>
    </div>
    <div class="card-body">
        <table class="table table-custom table-hover">
            <thead>
                <tr>
                    <th>Nama Layanan</th>
                    <th>Harga</th>
                    <th>Jumlah Transaksi</th>
                </tr>
            </thead>
            <tbody>
            <?php if(mysqli_num_rows($q_populer) > 0): while($r = mysqli_fetch_assoc($q_populer)): ?>
                <tr>
                    <td><?= htmlspecialchars($r['nama_layanan']); ?></td>
                    <td>Rp <?= number_format($r['harga'], 0, ',', '.'); ?></td>
                    <td><span class="badge-info-custom"><?= $r['jumlah']; ?> transaksi</span></td>
                </tr>
            <?php endwhile; else: ?>
                <tr><td colspan="3" class="text-center">Belum ada data</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Riwayat Semua Transaksi -->
<div class="card card-custom">
    <div class="card-header-custom">
        <h5 class="page-title mb-0"><i class="bi bi-receipt"></i> Riwayat Semua Transaksi</h5>
    </div>
    <div class="card-body p-0">
        <table class="table table-custom table-hover align-middle mb-0">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Pemilik</th>
                    <th>Motor</th>
                    <th>Paket</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            if(mysqli_num_rows($q_semua) > 0):
                while($row = mysqli_fetch_assoc($q_semua)):
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td class="fw-bold"><?= htmlspecialchars($row['nama_pemilik']); ?></td>
                    <td><?= htmlspecialchars($row['jenis_motor']); ?><br><small class="text-info"><?= htmlspecialchars($row['no_plat']); ?></small></td>
                    <td><?= htmlspecialchars($row['nama_layanan']); ?></td>
                    <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                    <td>
                        <?php if($row['status_bayar'] == 'lunas'): ?>
                            <span class="badge-lunas">Lunas</span>
                        <?php else: ?>
                            <span class="badge-belum">Belum Bayar</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; else: ?>
                <tr><td colspan="6" class="text-center py-4">Belum ada transaksi</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</div>
</div>

<?php include '../includes/footer.php'; ?>
