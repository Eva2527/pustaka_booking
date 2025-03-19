<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            
            <div class="card  mb-4">
                <div class="card-header py-3" style="background: linear-gradient(135deg, #2c3e50, #34495e); color: #ffffff;">
                    <h6 class="m-0 "></h6>
                </div>
                <div class="card-body" >
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($anggota as $a) { ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $a['nama']; ?></td>
                                        <td><?= $a['email']; ?></td>
                                       
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
