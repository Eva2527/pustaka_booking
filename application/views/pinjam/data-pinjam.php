<div class="container mt-4">
    <div class="card">
        <div class="card-header text-white small" style="background: linear-gradient(135deg, #2c3e50, #34495e); color: #ffffff;">
          
        </div>
        <div class="card-body small">
            <div class="table-responsive">
                <table class="table table-hover table-sm">
                  <thead>
    <tr>
        <th>No Pinjam</th>
        <th>Nama Peminjam</th>
        <th>Tanggal Pinjam</th>
        <th>Judul Buku</th>
        <th>Tanggal Kembali</th>
        <th>Tanggal Pengembalian</th> <!-- Tambahan kolom -->
        <th>Terlambat</th>
        <th>Denda per Hari</th>
        <th>Status</th>
        <th>Total Denda</th>
        <th>Pilihan</th>
    </tr>
</thead>
<tbody>
    <?php 
    date_default_timezone_set("Asia/Jakarta");
    foreach ($pinjam as $p) { ?>
        <tr>
            <td><?= $p['no_pinjam']; ?></td>
            <td><?= isset($p['nama_pengguna']) ? $p['nama_pengguna'] : 'Nama tidak ditemukan'; ?></td>
            <td><?= $p['tgl_pinjam']; ?></td>
            <td><?= isset($p['judul_buku']) ? $p['judul_buku'] : 'Judul tidak ditemukan'; ?></td>
            <td><?= $p['tgl_kembali']; ?></td>
            <td><?= isset($p['tgl_pengembalian']) ? $p['tgl_pengembalian'] : '-'; ?></td> <!-- Menampilkan tgl_pengembalian -->
            <td>
                <?php
                    $tgl_kembali = DateTime::createFromFormat('Y-m-d', $p['tgl_kembali']);
                    $tgl_pengembalian = isset($p['tgl_pengembalian']) ? DateTime::createFromFormat('Y-m-d', $p['tgl_pengembalian']) : new DateTime(); 
                    $terlambat = 0;

                    if ($tgl_pengembalian > $tgl_kembali) {
                        $terlambat = $tgl_pengembalian->diff($tgl_kembali)->days;
                    }

                    echo $terlambat . ' Hari';
                ?>
            </td>
            <td>Rp <?= number_format($p['denda'], 0, ',', '.'); ?></td>
            <td>
                <?php 
                    $statusColor = ($p['status'] == "Pinjam") ? "success" : "secondary";
                ?>
                <span class="badge bg-<?= $statusColor; ?> text-white"><?= $p['status']; ?></span>
            </td>
            <td>
                <?php 
                    $total_denda = ($terlambat > 0) ? $terlambat * $p['denda'] : 0;
                ?>
                Rp <?= number_format($total_denda, 0, ',', '.'); ?>
            </td>
            <td nowrap>
                <?php if ($p['status'] == "Kembali") { ?>
                    <button class="btn btn-sm btn-secondary text-white" disabled>
                        <i class="fas fa-fw btn-sm fa-edit"></i> Ubah Status
                    </button>
                <?php } else { ?>
                    <a class="btn btn-sm btn-success text-white" href="<?= base_url('pinjam/ubahStatus/' . $p['buku_id'] . '/' . $p['no_pinjam']); ?>">
                        <i class="fas fa-fw btn-sm fa-edit"></i> Ubah Status
                    </a>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
</tbody>

                </table>
            </div>
        </div>
    </div>
</div>
