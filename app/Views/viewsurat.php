<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Details</title>
</head>
<body>
    <h1>Detail Surat</h1>
    
    <?php if (isset($surat)): ?>
        <p><strong>ID Surat:</strong> <?= $surat['id_surat'] ?></p>
        <p><strong>Nama Surat:</strong> <?= $surat['nama_surat'] ?></p>
        <p><strong>Kode Surat:</strong> <?= $surat['kode_surat'] ?></p>
        <p><strong>Total Dokumen:</strong> <?= $surat['total_dokumen'] ?></p>
        <p><strong>Deskripsi:</strong> <?= $surat['deskripsi'] ?></p>
        <!-- Add other fields as needed -->
    <?php else: ?>
        <p>No data available for this document.</p>
    <?php endif; ?>

    <!-- Link to go back to the previous page -->
    <a href="<?= base_url('home') ?>">Back to List</a>
</body>
</html>
