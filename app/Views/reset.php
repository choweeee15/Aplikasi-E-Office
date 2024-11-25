<h2>Reset</h2>
<form action="<?= base_url('home/aksireset/' . $barangmasuk->id_barangmasuk); ?>" method="post">
    <div class="form-group">
        <label for="nama">Tanggal Awal:</label>
        <input type="date" name="tanggalawal" id="tanggalakhir" class="form-control" value="<?= $karyawan->nama; ?>" required>
    </div>
    <div class="form-group">
        <label for="NIK">Tanggal Akhir:</label>
        <input type="date" name="tanggalakhir" id="tanggalakhir" class="form-control" value="<?= $karyawan->NIK; ?>" required>
    <div>
    <button type="submit" class="btn btn-primary" style="margin-top: 20px;">
        <i class="fas fa-print"></i></button>
    </div>
</form>