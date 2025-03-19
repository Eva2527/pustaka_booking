<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header text-center text-white" style="background: linear-gradient(135deg, #2c3e50, #34495e);">
         
        </div>
          <div class="card-body small" >
                    <div class="table-responsive">
                        <table class="table table-hover">
                        <tr>
                            <th>No.</th>
                            <th>ID Booking</th>
                            <th>Tanggal Booking</th>
                            <th>ID User</th>
                            <th>Aksi</th>
                            <th>Denda / Buku / Hari</th>
                            <th>Lama Pinjam</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($pinjam as $p) { ?>
                            <tr class="align-middle">
                                <td class="text-center"><?= $no; ?></td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-outline-primary" href="<?= base_url('pinjam/bookingDetail/' . $p['booking_id']); ?>">
                                        <?= $p['booking_id']; ?>
                                    </a>
                                </td>
                                <td class="text-center"><?= $p['tgl_booking']; ?></td>
                            <td class="text-center"><?= !empty($p['nama']) ? $p['nama'] : 'Nama tidak ditemukan'; ?></td>


                                <td class="text-center sm-2">
                                    <form action="<?= base_url('pinjam/pinjamAct/' . $p['booking_id']); ?>" method="post">
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="fas fa-cart-plus "></i> Pinjam
                                        </button>
                                </td>
                                <td class="text-center">
                                    <input class="form-control form-control-sm text-center" style="max-width: 100px;" type="text" name="denda" id="denda" value="5000">
                                    <?= form_error(); ?>
                                </td>
                                <td class="text-center">
                                    <input class="form-control form-control-sm text-center" style="max-width: 100px;" type="text" name="lama" id="lama" value="3">
                                    <?= form_error(); ?>
                                </td>
                                </form>
                            </tr>
                        <?php $no++; } ?>
                    </tbody>
                </table>
            </div>

            <!-- Tombol Refresh -->
           <div class="text-center">
    <a href="<?= base_url('pinjam/daftarBooking'); ?>" class="btn btn-outline-dark btn-sm">
        <i class="fas fa-sync-alt"></i> Refresh
    </a>
</div>

        </div>
    </div>
</div>
