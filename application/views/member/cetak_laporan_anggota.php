<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Anggota</title>
</head>
<body>
    <h2 style="text-align: center;">Laporan Data Anggota</h2>
    <table border="1" cellspacing="0" cellpadding="5" width="100%">
        <tr>
            <th>#</th>
            <th>Nama Anggota</th>
            <th>Email</th>
        </tr>
        <?php $a = 1; foreach ($laporan as $l) { ?>
        <tr>
            <td><?= $a++; ?></td>
            <td><?= $l['nama']; ?></td>
            <td><?= $l['email']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <script>
        window.print();
    </script>
</body>
</html>
