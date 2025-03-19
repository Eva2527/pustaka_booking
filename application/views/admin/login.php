<!-- Begin Login Page -->
<div class="container-fluid d-flex justify-content-center align-items-center vh-100"
    style="background: linear-gradient(135deg, #2c3e50, #34495e); color: #ffffff;">
    <div class="col-lg-5">
        <div class="card shadow-lg border-0 rounded-lg" style="background: rgba(255, 255, 255, 0.9);">
            <div class="card-body p-5">
                <div class="text-center">
                    <h1 class="h4 text-dark mb-4 font-weight-bold">Halaman Login Admin</h1>
                </div>

                <?= $this->session->flashdata('pesan'); ?>

                <form class="user" method="post" action="<?= base_url('autentifikasi'); ?>">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user bg-light text-dark border-0 shadow-sm"
                            value="<?= set_value('email'); ?>" id="email" placeholder="Masukkan Alamat Email"
                            name="email">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control form-control-user bg-light text-dark border-0 shadow-sm"
                            id="password" placeholder="Masukkan Password" name="password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <!-- Tombol Masuk -->
                    <button type="submit" class="btn btn-danger btn-user btn-block font-weight-bold shadow-sm">
                        Masuk sebagai Admin
                    </button>

                    <!-- Tombol Kembali ke Home (Dibawah tombol login) -->
                    <a href="<?= base_url(); ?>" class="btn btn-secondary btn-user btn-block shadow-sm mt-3">
                        ⬅ Kembali ke Home
                    </a>
                </form>

                <hr>

                <p class="text-center text-dark">Hanya admin yang dapat mengakses halaman ini.</p>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<style>
    body, html {
        height: 100%;
        margin: 0;
        padding: 0;
        background: linear-gradient(135deg, #2c3e50, #34495e);
        color: #ffffff;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.3);
    }

    .btn-user {
        border-radius: 10px;
    }
</style>
