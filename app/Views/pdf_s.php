<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan PDF Surat Lampiran</title>

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
        .header {
            margin-bottom: 20px;
        }
        .logo {
            width: 25%;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-top: 10px;
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
        <img src="<?= base_url('foto1kelas/logoogph_1_-removebg-preview.png');?>" class="logo" alt="Logo">
        <div class="title">Gudang Sekolah Permata Harapan</div>
    </div>

    <h2>Laporan TCPDF Surat</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Surat</th>
                <th>Nama Surat</th>
                <th>Kode Surat</th>
                <th>Total Dokumen</th>
            </tr>
        </thead>
        <tbody>
            <?php $ms = 1;
            foreach ($takdirestui as $rusak): ?>
                <tr>
                    <td><?= $ms++ ?></td>
                    <td><?= $rusak->id_surat; ?></td>
                    <td><?= $rusak->nama_surat; ?></td>
                    <td><?= $rusak->kode_surat; ?></td>
                    <td><?= $rusak->stok; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
