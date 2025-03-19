<div class="container mt-5 mb-5 d-flex justify-content-center"> <!-- Tambah mb-5 -->
    <div class="card shadow-lg border-0"
         style="background: rgba(255, 255, 255, 0.4);
                backdrop-filter: blur(10px);
                padding: 30px;
                border-radius: 15px;
                width: 1000px;
                max-width: 95vw;
                display: flex; flex-direction: row; align-items: center;">
        
       
        <div class="text-center" style="flex: 1; padding-right: 20px;">
            <img src="<?= base_url('assets/img/upload/') . $gambar; ?>"
                 class="rounded"
                 style="width: 200px; height: 270px; object-fit: cover;">
        </div>

       
        <div style="flex: 2;">
            <h5 class="text-center font-weight-bold text-dark"><?= $pengarang ?></h5>

            <table class="table table-borderless mt-3" style="width: 100%;">
                <tr>
                    <th>Judul Buku</th> <td><?= $judul; ?></td>
                </tr>
                <tr>
                    <th>Kategori</th> <td><?= $kategori ?></td>
                </tr>
                <tr>
                    <th>Penerbit</th> <td><?= $penerbit ?></td>
                </tr>
                <tr>
                    <th>Tahun Terbit</th> <td><?= substr($tahun, 0, 4) ?></td>
                </tr>
                <tr>
                    <th>ISBN</th> <td><?= $isbn ?></td>
                </tr>
                <tr>
                    <th>Dipinjam</th> <td><?= $dipinjam ?></td>
                </tr>
                <tr>
                    <th>Dibooking</th> <td><?= $dibooking ?></td>
                </tr>
                <tr>
                    <th>Tersedia</th> <td><?= $stok ?></td>
                </tr>
            </table>

           
            <div class="text-center mt-3">
                <a href="<?= base_url('booking/tambahBooking/' . $id); ?>"
                   class="btn btn-primary btn-sm">
                   <i class="fas fa-shopping-cart"></i> Booking
                </a>
                <button class="btn btn-secondary btn-sm"
                        onclick="window.history.go(-1)">
                    <i class="fas fa-reply"></i> Kembali
                </button>
            </div>
        </div>
    </div>
</div>

<style>
   
    .card {
        transition: box-shadow 0.3s ease;
    }

   
    .card:hover {
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

  
    th {
        width: 45%;
        text-align: left;
    }

    td {
        text-align: right;
    }

    
    body {
        padding-bottom: 30px;
    }
</style>
