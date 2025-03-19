<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <?= form_open_multipart('user/ubahprofil'); ?>

            <!-- Notifikasi Flashdata -->
            <?= $this->session->flashdata('pesan'); ?>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img id="preview" src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>?t=<?= time(); ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar" onchange="previewImage(event)">
                                <label class="custom-file-label" for="gambar">Pilih file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <button type="button" class="btn btn-dark" onclick="window.history.go(-1)">Kembali</button>
                </div>
            </div>

            <?= form_close(); ?>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<!-- Tambahkan CSS -->
<style>
.img-thumbnail {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 10px;
}
</style>

<!-- Tambahkan JavaScript -->
<script>
// Preview gambar sebelum upload
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('preview');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

// Ubah label file input saat memilih gambar
document.querySelector("#gambar").addEventListener("change", function(){
    if (this.files.length > 0) {
        var fileName = this.files[0].name;
        var label = this.nextElementSibling;

        // Jika nama file lebih dari 20 karakter, potong dan tambahkan "..."
        label.innerText = fileName.length > 20 ? fileName.substring(0, 17) + "..." : fileName;

        // Tambahkan title untuk melihat nama lengkap saat hover
        label.setAttribute("title", fileName);
    }
});
</script>
