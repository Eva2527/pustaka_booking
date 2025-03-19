<table style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif;">
    <?php foreach ($useraktif as $u) { ?> 
        <tr> 
            <th colspan="5" style="background: #2c3e50; color: white; padding: 15px; font-size: 1.2em; text-align: left; border-radius: 10px 10px 0 0;">
                Nama Anggota: <?= $u->nama; ?>
            </th> 
        </tr> 
        <tr> 
            <th colspan="5" style="background: #34495e; color: white; padding: 12px; text-align: left;">Buku Yang Dibooking:</th> 
        </tr> 
    <?php } ?> 
    <tr> 
        <td colspan="5"> 
            <div class="table-responsive"> 
                <table style="width: 100%; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);"> 
                    <tr style="background: #2980b9; color: white;">
                        <th style="padding: 10px;">No.</th> 
                        <th style="padding: 10px;">Buku</th> 
                        <th style="padding: 10px;">Penulis</th> 
                        <th style="padding: 10px;">Penerbit</th> 
                        <th style="padding: 10px;">Tahun</th> 
                    </tr> 
                    <?php $no = 1; foreach ($items as $i) { ?> 
                    <tr style="background: #f9f9f9; text-align: center;">
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;"> <?= $no; ?> </td> 
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;"> <?= $i['judul_buku']; ?> </td> 
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;"> <?= $i['pengarang']; ?> </td> 
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;"> <?= $i['penerbit']; ?> </td> 
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;"> <?= $i['tahun_terbit']; ?> </td>
                    </tr> 
                    <?php $no++; } ?> 
                </table> 
            </div> 
        </td> 
    </tr> 
    <tr> 
        <td colspan="5" style="text-align: center; padding: 15px; font-size: 0.9em; color: #555;">
            <i><?= md5(date('d M Y H:i:s')); ?></i>
        </td> 
    </tr> 
</table>
