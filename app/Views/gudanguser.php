  <!DOCTYPE html>
  <html>
  <head>
      <title>Formulir Pengguna</title>
      <link rel="stylesheet" type="text/css" href="<?=base_url('css/bootstrap.min.css')?>">
      <script src="<?= base_url('js/bootstrap.bundle.min.js')?>" type="text/javascript"></script>
  </head>
  <body>
  <div class="container mt-3">
    <h3>User</h3>

    <form action="" method="POST">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama:</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama kamu">
      </div>

    <div class="mb-3">
      <label for="password" class="form-label">Kata Sandi:</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata sandi anda">
    </div>

    <div class="mb-3">
      <label for="id_user" class="form-label">ID Pengguna:</label>
      <input type="number" class="form-control" id="id_user" name="id_user" placeholder="Masukkan ID anda">
    </div>

    <div class="mb-3">
      <label for="tanggal" class="form-label">Tanggal:</label>
      <input type="date" class="form-control" id="tanggal" name="tanggal">
    </div>

    <div class="mb-3">
      <label class="form-label">Jenis Kelamin:</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" id="jk_l" name="jk" value="Laki-laki">
        <label class="form-check-label" for="jk_l">Laki-laki</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" id="jk_p" name="jk" value="Perempuan">
        <label class="form-check-label" for="jk_p">Perempuan</label>
      </div>
    </div>

    <div class="mb-3">
      <label for="jabatan" class="form-label">Jabatan:</label>
      <select class="form-select" id="jabatan" name="jabatan">
        <option value="Manager">Manajer</option>
        <option value="Staff">Staf</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat:</label>
      <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat anda"></textarea>
    </div>

    <div class="mb-3">
      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
      <button type="button" class="btn btn-info">Kembali</button>
    </div>
  </form>
</div>

</body>
</html>
