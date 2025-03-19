<div class="container-fluid">
   
    <?php if ($this->session->flashdata('pesan')): ?>
        <div class="alert alert-success" role="alert" style="font-size: 0.85rem;">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    <?php endif; ?>

  
    <?php if (validation_errors()): ?>
        <div class="alert alert-danger" role="alert">
            <strong>Data kategori harus diisi!</strong><br>
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3" style="background: linear-gradient(135deg, #2c3e50, #34495e); color: #ffffff;">
                    <h6 class="m-0 font-weight-bold">Ubah Kategori</h6>
                </div>
                <div class="card-body" style="background-color: #e5e7eb;">
                  
                    <form action="<?= base_url('buku/updateKategori/' . $kategori['kategori_id']); ?>" method="post">
                        <input type="hidden" name="id_kategori" value="<?= $kategori['kategori_id']; ?>">
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan Nama Kategori" value="<?= set_value('nama_kategori', $kategori['nama_kategori']); ?>">
                            <?= form_error('nama_kategori', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group text-center">
                            <a href="<?= base_url('buku/kategori'); ?>" class="btn btn-dark col-lg-3 mt-3">Kembali</a>
                            <button type="submit" class="btn btn-primary col-lg-3 mt-3">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

