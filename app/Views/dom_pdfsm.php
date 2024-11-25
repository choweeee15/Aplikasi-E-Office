<!DOCTYPE html>
<html>
<head>
    <title>Laporan DOMPDF Surat Masuk</title>
    <style>
        /* Tambahkan CSS sesuai kebutuhan */
    </style>
</head>
<body>
    <h1>Laporan DOMPDF Barang Masuk</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Surat Masuk</th>
                <th>Nama Surat</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php $ms = 1;
            foreach ($takdirestui as $item): ?>
                <tr>
                    <td><?= $ms++ ?></td>
                    <td><?= $item->id_suratmasuk; ?></td>
                    <td><?= $item->nama_surat; ?></td>
                    <td><?= $item->jumlah; ?></td>
                    <td><?= $item->tanggal; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>