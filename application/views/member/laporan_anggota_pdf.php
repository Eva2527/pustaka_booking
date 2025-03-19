
    <title>Laporan Anggota PDF</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
    </style>

    <h2 style="text-align: center;">Laporan Data Anggota</h2>
    <table>
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

