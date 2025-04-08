<?php 
header("Content-type: application/vnd-ms-excel"); 
header("Content-Disposition: attachment; filename=$title.xls"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 
?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <style>
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }
        .table-data th, .table-data td {
            border: 1px solid black;
            font-size: 11pt;
            font-family: Verdana, sans-serif;
            padding: 10px;
            text-align: center;
        }
        .table-data th {
            background-color: grey;
            color: white;
        }
        h3 {
            font-family: Verdana, sans-serif;
            text-align: center;
        }
    </style>
</head>
<body>

    <h3>LAPORAN DATA PEMINJAMAN BUKU</h3>
    <br/>

    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
              
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1; 
            foreach ($laporan as $l): 
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($l['nama']); ?></td>
                <td><?= htmlspecialchars($l['judul_buku']); ?></td>
                <td><?= htmlspecialchars($l['tgl_pinjam']); ?></td>
                <td><?= htmlspecialchars($l['tgl_kembali']); ?></td>
              
                <td><?= htmlspecialchars($l['status']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
