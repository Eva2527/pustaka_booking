<div class="container mt-4 d-flex justify-content-center">
    <div class="card shadow-lg border-0"
         style="background: rgba(255, 255, 255, 0.5);
                backdrop-filter: blur(12px);
                padding: 25px;
                border-radius: 15px;
                width: 100%;
                max-width: 900px;
                box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.15);">
        
        <div class="card-body">
            <h4 class="text-center font-weight-bold text-dark">🛒 Keranjang Buku</h4>
            <p class="text-center text-muted" style="font-size: 1rem;">Berikut adalah daftar buku yang telah Anda pilih.</p>

            <div class="table-responsive">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Buku</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($temp as $t) { ?> 
                        <tr>
                            <td><?= $no; ?></td> 
                            <td>
                                <img src="<?= base_url('assets/img/upload/' . $t['gambar']); ?>" 
                                     class="rounded shadow-sm book-img"
                                     alt="No Picture">
                            </td>
                            <td><?= $t['penulis']; ?></td> 
                            <td><?= $t['penerbit']; ?></td> 
                            <td><?= substr($t['tahun_terbit'], 0, 4); ?></td> 
                            <td>
                                <a href="<?= base_url('booking/hapusbooking/' . $t['buku_id']); ?>" 
                                   onclick="return confirm('Yakin tidak jadi booking <?= $t['judul_buku']; ?>?')"
                                   class="btn btn-outline-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td> 
                        </tr> 
                        <?php $no++; } ?> 
                    </tbody>
                </table>
            </div>

            <div class="text-center mt-4">
                <a class="btn btn-outline-primary custom-btn" href="<?= base_url(); ?>">
                   <i class="fas fa-play"></i> Lanjutkan Booking
                </a>
                <a class="btn btn-outline-success custom-btn" href="<?= base_url() . 'booking/bookingSelesai/' . $this->session->userdata('user_id'); ?>">
                   <i class="fas fa-check"></i> Selesaikan Booking
                </a>
            </div>
        </div>
    </div>
</div>

<!-- CSS Modern -->
<style>
    /* Tabel Estetik */
    .custom-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 10px;
        background: rgba(255, 255, 255, 0.85);
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
    }

    .custom-table thead {
        background: linear-gradient(135deg, #2c3e50, #34495e);
        color: white;
        font-size: 1rem;
    }

    .custom-table th, .custom-table td {
        padding: 12px;
        text-align: center;
        border: none;
    }

    .custom-table tbody tr {
        background: white;
        transition: 0.3s ease-in-out;
    }

    .custom-table tbody tr:hover {
        background: rgba(0, 123, 255, 0.1);
        transform: scale(1.02);
    }

    /* Gambar Buku */
    .book-img {
        width: 80px;
        height: 100px;
        object-fit: cover;
        border-radius: 10px;
        transition: 0.3s ease-in-out;
    }

    .book-img:hover {
        transform: scale(1.1);
    }

    /* Tombol */
    .custom-btn {
        font-size: 1rem;
        padding: 8px 16px;
        border-radius: 10px;
        transition: 0.2s ease-in-out;
    }

    .custom-btn:hover {
        transform: scale(1.05);
    }
</style>
