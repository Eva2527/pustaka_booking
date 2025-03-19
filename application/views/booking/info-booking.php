<div class="container mt-4 d-flex justify-content-center align-items-center" style="min-height: 100vh;"> 
    <div class="card shadow-lg border-0"
         style="max-width: 900px; width: 100%;
                background: rgba(255, 255, 255, 0.5);
                backdrop-filter: blur(15px);
                padding: 30px;
                border-radius: 15px;
                box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.15);
                transition: all 0.3s ease-in-out;">

      
        <div class="text-center mb-4">
            <?php foreach ($useraktif as $u) { ?> 
                <h3 class="mb-2 font-weight-bold text-dark">📖 Terima Kasih, <b><?= $u->nama; ?></b>!</h3> 
                <p class="text-muted" style="font-size: 1.1rem;">Buku yang ingin anda pinjam sebagai berikut</p>
            <?php } ?>
        </div>

        <!-- Tabel Buku Minimalis -->
        <div class="table-responsive d-flex justify-content-center">
            <table class="table custom-table" style="max-width: 600px;">
                <thead>
                    <tr>
                        <th>No.</th> 
                        <th>Buku</th> 
                        <th>Penulis</th> 
                        <th>Penerbit</th> 
                        <th>Tahun</th> 
                    </tr> 
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($items as $i) { ?> 
                        <tr> 
                            <td><?= $no; ?></td> 
                            <td> 
                                <img src="<?= base_url('assets/img/upload/' . $i['gambar']); ?>" 
                                     class="rounded shadow-sm book-img"
                                     alt="No Picture">
                            </td> 
                            <td><?= $i['pengarang']; ?></td>
                            <td><?= $i['penerbit']; ?></td>
                            <td><?= $i['tahun_terbit']; ?></td> 
                        </tr> 
                    <?php $no++; } ?> 
                </tbody>
            </table> 
        </div>

      
<div class="text-center mt-4">
    <a class="btn btn-danger custom-btn" 
       onclick="information('Waktu Pengambilan Buku 1x24 jam dari Booking!!!')" 
       href="<?= base_url() . 'booking/exportToPdf/' . $this->session->userdata('user_id'); ?>">
        <i class="far fa-file-pdf"></i> Download PDF
    </a>
</div>


<style>
  
    .custom-table {
        width: 100%;
        max-width: 600px;
        border-collapse: separate;
        border-spacing: 0 8px;
        background: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        font-size: 0.9rem;
    }

   
    .custom-table thead {
        background: linear-gradient(135deg, #2c3e50, #34495e);
        color: white;
        font-size: 1rem;
    }

    .custom-table th {
        padding: 10px;
        text-align: center;
        font-weight: bold;
        border: none;
    }

  
    .custom-table tbody tr {
        background: white;
        transition: 0.2s ease-in-out;
    }

    .custom-table tbody tr:hover {
        background: rgba(0, 123, 255, 0.1);
        transition: 0.2s ease-in-out;
    }

    .custom-table td {
        padding: 10px;
        text-align: center;
        font-size: 0.9rem;
        border: none;
    }

   
    .book-img {
        width: 75px;
        height: 110px;
        object-fit: cover;
        border-radius: 8px;
        transition: 0.2s ease-in-out;
    }

    .book-img:hover {
        transform: scale(1.05);
        transition: 0.2s ease-in-out;
    }

 
    .custom-btn {
        border-radius: 8px;
        font-size: 1rem;
        transition: 0.2s ease-in-out;
    }

    .custom-btn:hover {
        background: #c82333 !important;
        transform: scale(1.03);
    }
      .custom-btn {
        border-radius: 6px;
        font-size: 0.85rem; 
        padding: 6px 12px;  
        transition: 0.2s ease-in-out;
    }

    .custom-btn:hover {
        background: #c82333 !important;
        transform: scale(1.02);
    }
</style>
