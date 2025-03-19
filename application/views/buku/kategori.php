<!-- Begin Page Content -->
<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
    <div class="row w-100">
        <div class="col-lg-12 ">
            <div class="card  border-0 rounded-lg">
                <div class="card-header text-white text-center" style="background: linear-gradient(135deg, #2c3e50, #34495e); color: #ffffff;">
                   
                </div>
                <div class="card-body">
                    
                    <!-- Menampilkan Pesan Validasi -->
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Menampilkan Pesan Flash Data -->
                    <?= $this->session->flashdata('pesan'); ?>

                    <div class="mb-3">
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#bukuBaruModal">
                            <i class="fas fa-file-alt"></i> Kategori Buku Baru
                        </a>
                    </div>
                 <div class="card-body" >
                    <div class="table-responsive">
                        <table class="table table-hover">
                        <thead >
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $a = 1; foreach ($kategori as $k) : ?>
                                <tr>
                                    <th scope="row"><?= $a++; ?></th>
                                    <td><?= $k['nama_kategori']; ?></td>
                                    <td>
                                        <a href="<?= base_url('buku/updateKategori/') . $k['kategori_id']; ?>" class="badge badge-info">
                                            <i class="fas fa-edit"></i> Ubah
                                        </a>
                                        <a href="<?= base_url('buku/hapusKategori/') . $k['kategori_id']; ?>" 
                                           onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $k['nama_kategori']; ?>?');" 
                                           class="badge badge-danger">
                                            <i class="fas fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Modal Tambah Kategori Baru -->
<div class="modal fade" id="bukuBaruModal" tabindex="-1" role="dialog" aria-labelledby="bukuBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kategoriBaruModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('buku/kategori'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control <?= form_error('nama_kategori') ? 'is-invalid' : ''; ?>" 
                               name="nama_kategori" placeholder="Masukkan Nama Kategori" value="<?= set_value('nama_kategori'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('nama_kategori'); ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-ban"></i> Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
