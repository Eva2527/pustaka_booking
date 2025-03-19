<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Row UX -->
    <div class="row">
        <!-- Jumlah Anggota -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-3">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-4x text-primary mb-2"></i>
                    <h5 class="text-gray-800">Jumlah Anggota</h5>
                    <h2 class="font-weight-bold text-dark">
                        <?=$this->ModelUser->getUserWhere(['role_id' => 2])->num_rows();?>
                    </h2>
                </div>
            </div>
        </div>

        <!-- Stok Buku Terdaftar -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-3">
                <div class="card-body text-center">
                    <i class="fas fa-book fa-4x text-warning mb-2"></i>
                    <h5 class="text-gray-800">Stok Buku Terdaftar</h5>
                    <h2 class="font-weight-bold text-dark">
                        <?php $where = ['stok != 0']; echo $this->ModelBuku->total('stok', $where); ?>
                    </h2>
                </div>
            </div>
        </div>

        <!-- Buku yang Dipinjam -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-3">
                <div class="card-body text-center">
                    <i class="fas fa-user-tag fa-4x text-danger mb-2"></i>
                    <h5 class="text-gray-800">Buku yang Dipinjam</h5>
                    <h2 class="font-weight-bold text-dark">
                        <?php $where = ['dipinjam != 0']; echo $this->ModelBuku->total('dipinjam', $where); ?>
                    </h2>
                </div>
            </div>
        </div>

        <!-- Buku yang Dibooking -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-3">
                <div class="card-body text-center">
                    <i class="fas fa-shopping-cart fa-4x text-success mb-2"></i>
                    <h5 class="text-gray-800">Buku yang Dibooking</h5>
                    <h2 class="font-weight-bold text-dark">
                        <?php $where = ['dibooking != 0']; echo $this->ModelBuku->total('dibooking', $where); ?>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row UX -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Grafik Statistik -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 text-white" style="background: linear-gradient(135deg, #2c3e50, #34495e); color: #ffffff;">
                    <h6 class="m-0 font-weight-bold">Statistik Perpustakaan</h6>
                </div>
                <div class="card-body">
                    <canvas id="chartStatistik"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- End Grafik Statistik -->
</div>
<!-- End of Main Content -->

<!-- Script untuk Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('chartStatistik').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Anggota', 'Buku Tersedia', 'Dipinjam', 'Dibooking'],
            datasets: [{
                label: 'Jumlah',
                data: [
                    <?=$this->ModelUser->getUserWhere(['role_id' => 2])->num_rows();?>,
                    <?=$this->ModelBuku->total('stok', ['stok != 0']);?>,
                    <?=$this->ModelBuku->total('dipinjam', ['dipinjam != 0']);?>,
                    <?=$this->ModelBuku->total('dibooking', ['dibooking != 0']);?>
                ],
                backgroundColor: ['#007bff', '#ffc107', '#dc3545', '#28a745']
            }]
        }
    });
</script>
