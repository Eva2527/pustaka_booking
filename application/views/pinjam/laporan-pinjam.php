<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>

    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>

            <div class="card shadow-lg rounded-lg">
                <div class="card-header bg-dark text-white text-center">
                    
                </div>

                <div class="card-body">
                    <div class=" mb-3">
                        <a href="<?= base_url('laporan/cetak_laporan_pinjam'); ?>" class="btn btn-primary">
                            <i class="fas fa-print"></i>Print
                        </a>
                        <a href="<?= base_url('laporan/laporan_pinjam_pdf'); ?>" class="btn btn-danger">
                            <i class="far fa-file-pdf"></i>PDF
                        </a>
                        <a href="<?= base_url('laporan/export_excel_pinjam'); ?>" class="btn btn-success">
                            <i class="far fa-file-excel"></i>Excel
                        </a>
                    </div>
 <div class="card-body small"  >
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead >
                                <tr>
                                    <th>#</th>
                                    <th>Nama Anggota</th>
                                    <th>Judul Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                   
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $a = 1; 
                                foreach ($laporan as $l) { ?>
                                    <tr>
                                        <td><?= $a++; ?></td>
                                        <td><?= $l['nama']; ?></td>
                                        <td><?= $l['judul_buku']; ?></td>
                                        <td><?= $l['tgl_pinjam']; ?></td>
                                        <td><?= $l['tgl_kembali']; ?></td>
                                      
                                       
                                      <td>

                                     <?php 
                                          if ($l['status'] == "Kembali") {
                                           $badgeClass = "badge-secondary"; 
                                                   } else {
                                          $badgeClass = "badge-success"; 
                                                  }
                                              ?>
                               <span class="badge <?= $badgeClass; ?>"><?= $l['status']; ?></span>
                                          </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <small class="text-muted">© <?= date('Y'); ?> Perpustakaan Digital</small>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
