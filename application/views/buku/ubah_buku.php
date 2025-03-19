<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Tampilkan flashdata notifikasi -->
    <?= $this->session->flashdata('pesan'); ?>

    <!-- Notifikasi validasi error -->
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <strong>Data buku harus diisi!</strong><br>
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3" style="background: linear-gradient(135deg, #2c3e50, #34495e); color: #ffffff;">
                    <h6 class="m-0 font-weight-bold">Edit Buku</h6>
                </div>
                <div class="card-body" style="background-color: #e5e7eb;">
                    <?php if (!empty($buku)) : ?>
                        <form action="<?= base_url('buku/ubahBuku/' . $buku['id']); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $buku['id']; ?>">

                            <div class="form-group">
                                <label for="judul_buku">Judul Buku</label>
                                <input type="text" class="form-control" id="judul_buku" name="judul_buku" placeholder="Masukkan Judul Buku" value="<?= set_value('judul_buku', $buku['judul_buku']); ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="kategori_id">Kategori</label>
                                <select name="kategori_id" class="form-control">
                                    <?php foreach ($kategori as $k) : ?>
                                        <option value="<?= $k['kategori_id']; ?>" <?= ($buku['kategori_id'] == $k['kategori_id']) ? 'selected' : ''; ?>>
                                            <?= $k['nama_kategori']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="pengarang">Pengarang</label>
                                <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Masukkan nama pengarang" value="<?= set_value('pengarang', $buku['pengarang']); ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukkan nama penerbit" value="<?= set_value('penerbit', $buku['penerbit']); ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="tahun">Tahun Terbit</label>
                                <select name="tahun" class="form-control">
                                    <option value="<?= $buku['tahun_terbit']; ?>"><?= $buku['tahun_terbit']; ?></option>
                                    <?php for ($i = date('Y'); $i > 1500; $i--) : ?>
                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Masukkan ISBN" value="<?= set_value('isbn', $buku['isbn']); ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan nominal stok" value="<?= set_value('stok', $buku['stok']); ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <?php if (isset($buku['gambar'])) : ?>
                                    <input type="hidden" name="old_pict" value="<?= $buku['gambar']; ?>">
                                    <div class="mb-2">
                                        <img src="<?= base_url('assets/img/upload/') . $buku['gambar']; ?>" class="img-thumbnail" width="150" alt="Gambar Buku">
                                    </div>
                                <?php endif; ?>
                                <input type="file" class="form-control-file" id="gambar" name="gambar">
                            </div>
                            
                            <div class="text-center">
                                <button type="button" class="btn btn-dark" onclick="window.history.go(-1)">Kembali</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    <?php else : ?>
                        <div class="alert alert-warning" role="alert">
                            Data buku tidak ditemukan.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
