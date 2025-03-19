<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <title>Pustaka-Booking </title> 
    <link href="<?= base_url('assets/'); ?>perpustakaan.png" rel="icon">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>user/css/bootstrap.css">
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>datatable/datatables.css" rel="stylesheet">
    
    <style>
        body { 
            background: url('<?= base_url("assets/img/1.jpg"); ?>') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        
        /* Navbar dengan efek transparan */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.5); /* Transparan */
            backdrop-filter: blur(10px); /* Efek blur */
            padding: 10px 0;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand, .nav-link {
            color: black !important; /* Warna teks agar kontras */
            font-weight: bold;
            font-size: 1.1rem;
        }

        .nav-link:hover {
            text-decoration: underline;
        }

        .nav-item {
            margin: 0 10px;
        }
    </style>
</head>
<body> 

<!-- Navbar dengan Kotak Putih Transparan -->
<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <div class="container"> 
        <a class="navbar-brand" href="<?= base_url(); ?>">📚 Pustaka</a> 
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="<?= base_url(); ?>">Beranda</a> 
                <?php if (!empty($this->session->userdata('email'))) { ?> 
                  <a class="nav-item nav-link" href="<?=base_url('booking');?>">Booking <b><?=$this->ModelBooking->getDataWhere('temp',['email_user' => $this->session->userdata('email')])->num_rows();?></b> Buku</a>


                    <a class="nav-item nav-link" href="<?= base_url('member/myprofil'); ?>">Profil Saya</a> 

                    <a class="nav-item nav-link" href="<?= base_url('member/logout'); ?>">
                        <i class="fas fa-sign-out-alt"></i> Log out
                    </a> 
                <?php } else { ?> 
                    <a class="nav-item nav-link" data-toggle="modal" data-target="#daftarModal" href="#">
                        <i class="fas fa-user-plus"></i> Daftar
                    </a> 
                    <a class="nav-item nav-link" data-toggle="modal" data-target="#loginModal" href="#">
                        <i class="fas fa-sign-in-alt"></i> Log in
                    </a> 
                <?php } ?> 
                <span class="nav-item nav-link font-weight-bold">👋 Selamat Datang, <b><?= $user; ?></b></span>
            </div>
        </div>
    </div>
</nav>

<script src="<?= base_url('assets/'); ?>user/js/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>user/js/bootstrap.bundle.min.js"></script>
</body>
</html>
