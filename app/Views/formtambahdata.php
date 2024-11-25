    <!DOCTYPE html>
<html>
<head>
    <title>Form Penginputan Barang</title>
    <link rel="stylesheet" type="text/css" href="<?=base_url('css/bootstrap.min.css')?>">
    <script src="<?= base_url('js/bootstrap.bundle.min.js')?>" type="text/javascript"></script>
</head>
<body>
<div class="container mt-3">
    <h2>Form Penginputan Barang</h2>
    <form action="/action_page.php" method="POST">
        <div class="mb-3">
            <label for="nama_barang">Nama Barang:</label>
            <input type="text" class="form-control" id="nama_barang" placeholder="Masukkan nama barang" name="nama_barang">
        </div>
        <div class="mb-3">
            <label for="barang_masuk">Barang Masuk:</label>
            <input type="number" class="form-control" id="barang_masuk" placeholder="Jumlah barang masuk" name="barang_masuk">
        </div>
        <div class="mb-3">
            <label for="barang_keluar">Barang Keluar:</label>
            <input type="number" class="form-control" id="barang_keluar" placeholder="Jumlah barang keluar" name="barang_keluar">
        </div>
        <div class="mb-3">
            <label for="barang_rusak">Barang Rusak:</label>
            <input type="number" class="form-control" id="barang_rusak" placeholder="Jumlah barang rusak" name="barang_rusak">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>
