<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            
            <div class="card small">
                <div class="card-header py-3" style="background: linear-gradient(135deg, #2c3e50, #34495e); color: #ffffff;">
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="<?= base_url('laporan/cetak_laporan_buku'); ?>" class="btn btn-primary">
                            <i class="fas fa-print"></i> Print
                        </a>
                        <a href="<?= base_url('laporan/laporan_buku_pdf'); ?>" class="btn btn-danger">
                            <i class="far fa-file-pdf"></i> PDF
                        </a>
                        <a href="<?= base_url('laporan/export_excel'); ?>" class="btn btn-success">
                            <i class="far fa-file-excel"></i>Excel
                        </a>
                    </div>
                   <div class="card-body" >
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead >
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Pengarang</th>
                                    <th scope="col">Penerbit</th>
                                    <th scope="col">Tahun Terbit</th>
                                    <th scope="col">ISBN</th>
                                    <th scope="col">Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1; foreach ($buku as $b) { ?>
                                    <tr>
                                        <th scope="row"><?= $a++; ?></th>
                                        <td><?= $b['judul_buku']; ?></td>
                                        <td><?= $b['pengarang']; ?></td>
                                        <td><?= $b['penerbit']; ?></td>
                                        <td><?= $b['tahun_terbit']; ?></td>
                                        <td><?= $b['isbn']; ?></td>
                                        <td><?= $b['stok']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
