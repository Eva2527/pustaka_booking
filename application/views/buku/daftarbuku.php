<?= $this->session->flashdata('pesan'); ?>

<div class="container mt-5">
    <!-- Kotak dengan efek blur -->
    <div class="p-4 shadow-lg"
         style="background: rgba(255, 255, 255, 0.3); 
                backdrop-filter: blur(10px); 
                border-radius: 15px;"> 
        
        <!-- Judul Halaman -->
        <h2 class="text-center font-weight-bold text-dark mb-4">
            📚 Daftar Buku yang Tersedia
        </h2>
        <hr class="bg-dark" style="width: 50%; height: 2px; margin: auto; opacity: 0.8;">

        <div class="row mt-4">
         
            <?php foreach ($buku as $buku) { ?> 
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card shadow-sm border-0 h-100"
                        style="background: rgba(255, 255, 255, 0.7);
                                backdrop-filter: blur(10px);
                                border-radius: 15px;
                                transition: transform 0.3s ease;">
                        
                       
                        <img src="<?= base_url('assets/img/upload/') . $buku->gambar; ?>" 
                             class="card-img-top p-2"
                             style="height: 200px; object-fit: cover; border-radius: 10px;">
                        
                        <div class="card-body d-flex flex-column align-items-center">
                           
                            <h5 class="card-title font-weight-bold text-dark text-center">
                                <?= $buku->judul_buku; ?>
                            </h5>

                          
                            <div style="height: 10px;"></div>

                          
                            <p class="text-muted small">
                                <strong>Penerbit:</strong> <?= $buku->penerbit; ?>
                            </p>
                            <p class="text-muted small">
                                <strong>Tahun:</strong> <?= substr($buku->tahun_terbit, 0, 4); ?>
                            </p>
                        </div>

                        <div class="text-center pb-3">
                            <?php if ($buku->stok < 1) { ?>
                                <button class="btn btn-outline-secondary btn-sm" disabled>
                                    <i class="fas fa-shopping-cart"></i> Booking (0)
                                </button>
                            <?php } else { ?>
                                <a href="<?= base_url('booking/tambahBooking/' . $buku->id); ?>" 
                                   class="btn btn-primary btn-sm">
                                    <i class="fas fa-shopping-cart"></i> Booking
                                </a>
                            <?php } ?>
                            <a href="<?= base_url('home/detailBuku/' . $buku->id); ?>" 
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-search"></i> Detail
                            </a>
                        </div>
                    </div>
                </div> 
            <?php } ?>
          
        </div>
    </div>
</div>


<style>
 .card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

   
    .card-title {
        font-size: 1.1rem;
        font-weight: bold;
        min-height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

  
    .card-body p {
        text-align: center;
        margin: 2px 0;
    }

   
    @media (max-width: 768px) {
        .col-md-3 {
            width: 50%; /* 2 kolom per baris di tablet */
        }
    }

    @media (max-width: 576px) {
        .col-md-3 {
            width: 100%; /* 1 kolom per baris di HP */
        }
    }
</style>
