<h2>Edit Surat Masuk</h2>
<form action="<?= base_url('home/update_suratmasuk/' . $suratmasuk->id_suratmasuk); ?>" method="post">
    <div class="form-group">
        <label for="id_surat">Select Surat:</label>
        <select name="id_surat" id="id_surat" class="form-control" required>
            <?php foreach ($surat as $item): ?>
                <option value="<?= $item->id_surat; ?>" <?= ($item->id_surat == $suratmasuk->id_surat) ? 'selected' : ''; ?>>
                    <?= $item->nama_surat; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" id="jumlah" class="form-control" value="<?= $suratmasuk->jumlah; ?>" required>
    </div>
    <div class="form-group">
        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $suratmasuk->tanggal; ?>" required>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
