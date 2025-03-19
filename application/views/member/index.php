<!-- Begin Page Content --> 
<div class="container-fluid d-flex align-items-center justify-content-center" style="min-height: 100vh; margin-top: -20px;"> 
    <div class="row justify-content-center"> 
        <div class="col-lg-10"> <!-- Lebarkan tampilan kartu -->

            <?= $this->session->flashdata('pesan'); ?> 

            <div class="card shadow-lg border-0"
                 style="max-width: 850px; width: 100%;
                        background: rgba(255, 255, 255, 0.5);
                        backdrop-filter: blur(12px);
                        padding: 35px;
                        border-radius: 20px;
                        box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.2);">

                <div class="row no-gutters align-items-center">
                    <div class="col-md-5 text-center p-4">
                        <img src="<?= base_url('assets/img/profile/') . $gambar; ?>" 
                             class="rounded-circle img-fluid shadow-lg profile-img" 
                             style="width: 250px; height: 250px; object-fit: cover; border: 5px solid white;">
                    </div>

                    <div class="col-md-7">
                        <div class="card-body text-center">
                            <h3 class="card-title font-weight-bold text-dark mb-2"> <?= $user; ?> </h3>
                            <p class="card-text text-muted mb-3"> <?= $email; ?> </p>
                            
                            <a href="<?= base_url('member/ubahprofil'); ?>" 
                               class="btn btn-lg btn-info px-4 py-2 shadow-sm custom-btn">
                                <i class="fas fa-user-edit"></i> Ubah Profil
                            </a> 
                        </div>
                    </div>
                </div>

            </div>

        </div> 
    </div> 
</div> 
<!-- /.container-fluid --> 

<!-- CSS Tambahan -->
<style>
    .container-fluid {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: -20px; /* Naikkan sedikit */
    }

    .card {
        max-width: 850px;
        width: 100%;
    }

    .profile-img {
        transition: 0.3s ease-in-out;
    }

    .profile-img:hover {
        transform: scale(1.05);
    }

    .custom-btn {
        border-radius: 10px;
        font-size: 1.2rem;
        transition: 0.3s ease-in-out;
    }

    .custom-btn:hover {
        background: #17a2b8 !important;
        transform: scale(1.05);
    }
</style>
