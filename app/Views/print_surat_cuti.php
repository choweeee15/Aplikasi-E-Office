<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Surat Cuti</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            /* Garis bawah pada header */
            padding-bottom: 10px;
        }

        .logo {
            width: 100px;
            height: auto;
        }

        .header h3 {
            font-size: 24px;
            margin: 0;
            text-align: center;
            flex-grow: 1;
        }

        .header p {
            font-size: 14px;
            margin: 5px 0;
            text-align: center;
        }

        .content {
            margin-top: 30px;
            padding: 0 20px;
            font-size: 16px;
        }

        .content p {
            text-align: justify;
        }

        .details {
            margin-top: 20px;
        }

        .details p {
            margin: 8px 0;
        }

        .footer {
            text-align: right;
            /* Menempatkan nama di kanan bawah */
            margin-top: 50px;
            font-size: 16px;
        }

        .footer p {
            font-size: 16px;
            margin-top: 20px;
        }

        .signature {
            margin-top: 80px;
            text-align: center;
        }

        .signature p {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="<?= base_url('foto1kelas/logoogph_1_-removebg-preview.png'); ?>" alt="Logo" class="logo">
        <h3>SURAT KETERANGAN CUTI <br>NOMOR: KP.08.2/<?= date('m'); ?>/<?= date('Y'); ?></h3>
        <br>
        <p></p>
    </div>

    <div class="content">
        <p>Diberikan izin <?= $cuti->jenis_cuti; ?> sebagai berikut:</p>
        <div class="details">
            <p><strong>Nama:</strong> <?= $cuti->nama; ?></p>
            <p><strong>NIK:</strong> <?= $nik; ?></p>
            <p><strong>Jabatan:</strong> <?= $level == 1 ? 'Karyawan' : 'Pimpinan'; ?></p>
            <p><strong>Dari tanggal:</strong> <?= date('d-m-Y', strtotime($cuti->tanggal_mulai)); ?> <strong>sampai</strong> <?= date('d-m-Y', strtotime($cuti->tanggal_sampai)); ?></p>
        </div>

        <p>Demikian surat ini dibuat untuk dipergunakan sebagaimana mestinya.</p>
    </div>

    <div class="footer">
        <p>Jakarta, <?= date('d-m-Y'); ?></p>
        <p>Kepala Sekolah</p>
    </div>

    <div class="signature">
        <p>____________________</p>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>