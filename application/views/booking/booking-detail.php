<div class="container"> 
    <div class="card">
                      <div class="card-header py-3" style="background: linear-gradient(135deg, #2c3e50, #34495e); color: #ffffff;">
                    <h6 class="m-0 "></h6>
                </div>
                <div class="card-body" >
               
                            <thead>
            <center> 
                <table class="table"> 
                    <?php foreach ($agt_booking as $ab) { ?> 
                    <tr> 
                        <td>Data Anggota</td> 
                        <td>:</td> 
                        <th><?= $ab['nama']; ?></th> 
                    </tr> 
                    <tr> 
                        <td>ID Booking</td> 
                        <td>:</td> 
                        <th><?= $ab['booking_id']; ?></th> 
                    </tr> 
                    <?php } ?> 
                   
                    <tr> 
                        <td colspan="3"> 
                                <div class="table-responsive">
                        <table class="table table-hover">
                                    <tr> 
                                        <th>No.</th> 
                                        <th>Judul Buku</th> 
                                        <th>Pengarang</th> 
                                        <th>Penerbit</th> 
                                        <th>Tahun</th> 
                                    </tr> 
                                    <?php $no = 1; foreach ($detail as $d) { ?>
                                    <tr> 
                                        <td><?= $no; ?></td> 
                                        <td><?= $d['judul_buku']; ?></td> 
                                        <td><?= $d['pengarang']; ?></td> 
                                        <td><?= $d['penerbit']; ?></td> 
                                        <td><?= $d['tahun_terbit']; ?></td> 
                                    </tr> 
                                    <?php $no++; } ?> 
                                </table> 
                            </div> 
                        </td> 
                    </tr> 
                    <tr> 
                        <td align="center" colspan="3">
                            <a href="#" onclick="window.history.go(-1)" class="btn btn-outline-dark">
                                <i class="fas fa-fw fa-reply"></i> Kembali
                            </a>
                        </td> 
                    </tr> 
                </table> 
            </center> 
        </div>
    </div>
</div>
