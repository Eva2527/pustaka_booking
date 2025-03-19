<!-- Begin Page Content -->
<div class="container-fluid d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-lg-12"> <!-- Lebarkan form supaya lebih panjang ke samping -->

            <div class="card shadow-lg border-0"
                 style="background: rgba(255, 255, 255, 0.6);
                        backdrop-filter: blur(10px);
                        padding: 30px;
                        border-radius: 15px;
                        max-width: 900px;"> <!-- Tambahkan max-width agar lebih melebar -->
                
                <div class="card-body">
                    <h4 class="text-center font-weight-bold text-dark">✏️ Ubah Profil</h4>
                    <hr>

                    <?= form_open_multipart('member/ubahprofil'); ?> 

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">📧 Email</label> 
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $email; ?>" readonly> 
                        </div> 
                    </div> 

                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">👤 Nama</label> 
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user; ?>"> 
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?> 
                        </div> 
                    </div> 

                    <div class="form-group row align-items-center">
                        <label class="col-sm-2 col-form-label">🖼 Foto</label> 
                        <div class="col-sm-4">
                            <img src="<?= base_url('assets/img/profile/') . $gambar; ?>" 
                                 class="rounded img-thumbnail" 
                                 style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                        <div class="col-sm-6">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                <label class="custom-file-label" for="gambar">Pilih file...</label> 
                            </div>
                        </div>
                    </div> 

                    <div class="form-group text-center mt-4">
                        <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan</button> 
                        <button type="button" class="btn btn-dark px-4" onclick="window.history.go(-1)">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </button>
                    </div> 

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /.container-fluid --> 

<!-- CSS Tambahan -->
<style>
    .custom-file-label {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: block;
        max-width: 100%;
    }

    .custom-file-label::after {
        content: "Pilih";
    }

    .btn i {
        margin-right: 5px;
    }

    .container-fluid {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card {
        width: 100%;
        max-width: 900px;
    }
</style>

<!-- JavaScript -->
<script>
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
