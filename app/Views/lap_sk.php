<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Surat Lampiran Keluar</title>

    <style type="text/css">
        body {
            text-align: center;
        }

        table {
            margin: 0 auto;
            border: 1px solid black;
            border-collapse: collapse;
            width: 80%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        @media print {
            body {
                margin: 20px;
            }
            h2 {
                margin-bottom: 20px;
            }
            button {
                display: none;
            }
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="<?= base_url('foto1kelas/logoogph_1_-removebg-preview.png');?>" class="logo" alt="Logo" style="width: 20%;">
        <div class="title" style="font-size: 24px; font-weight: bold; margin-top: 10px;">Gudang Sekolah Permata Harapan</div>
    </div>

    <h2>Laporan Surat Keluar</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Surat Keluar</th>
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
                    <td><?= $item->id_suratkeluar; ?></td>
                    <td><?= $item->nama_surat; ?></td>
                    <td><?= $item->jumlah; ?></td>
                    <td><?= $item->tanggal; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script type="text/javascript">window.print();</script>

</body>
</html>
