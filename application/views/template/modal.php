<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <title>Pustaka-Booking | <?= $judul; ?></title> 
    <link href="<?= base_url('assets/'); ?>perpustakaan.png" rel="icon">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>user/css/bootstrap.css">
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>datatable/datatables.css" rel="stylesheet">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
        body {
            background: url('<?= base_url("assets/img/1.jpg"); ?>') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            color: #333;
        }
        
        /* Animasi dan efek modal */
        .modal-content {
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3);
        }
        .modal-header {
            background: linear-gradient(135deg, #2c3e50, #34495e); color: #ffffff;
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .modal-body {
            padding: 30px;
        }
        .modal-footer {
            border-top: none;
            padding-bottom: 20px;
        }
        .form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            transition: all 0.3s ease-in-out;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0px 0px 8px rgba(0, 123, 255, 0.5);
        }
        .btn-custom {
            background: linear-gradient(135deg, #2c3e50, #34495e); color: #ffffff;
            color: white;
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            background: linear-gradient(135deg, #2c3e50, #34495e); color: #ffffff;
          
            transform: scale(1.05);
        }
    </style>
</head>
<body> 

<!-- Modal Login -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span> 
                </button> 
            </div> 
            <form action="<?= base_url('member'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Alamat Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button> 
                    <button type="submit" class="btn btn-custom">Log in</button> 
                </div>
            </form> 
        </div>
    </div>
</div>

<!-- Modal Daftar -->
<div class="modal fade" id="daftarModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Daftar Anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span> 
                </button> 
            </div> 
            <form action="<?= base_url('member/daftar'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Alamat Email">
                    </div>
                    <div class="form-group">
                        <label for="password1">Password</label>
                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="password2">Ulangi Password</label>
                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi Password">
                    </div>
                </div>
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button> 
                    <button type="submit" class="btn btn-custom">Simpan</button> 
                </div>
            </form> 
        </div>
    </div>
</div>

<script src="<?= base_url('assets/'); ?>user/js/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>user/js/bootstrap.bundle.min.js"></script>
</body>
</html>
