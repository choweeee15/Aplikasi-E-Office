<h3>Edit Surat Keluar</h3>
<form action="<?= base_url('home/simpansuratkeluar/' . $takdirestui->id_suratkeluar) ?>" method="POST">
    <div class="mb-3">
        <label for="id_surat" class="form-label">ID surat: </label>
        <input type="text" class="form-control" id="id_surat" name="id_surat" value="<?= $takdirestui->id_surat ?>" readonly>
    </div>
    <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah: </label>
        <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= $takdirestui->jumlah ?>"> 
    </div>
    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal: </label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $takdirestui->tanggal !== '0000-00-00' ? $takdirestui->tanggal : date('Y-m-d') ?>">
    </div>

    <input type="hidden" name="id" value="<?= $takdirestui->id_suratkeluar ?>">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
