<main id="main" class="main">
  <div class="pagetitle">
    <h1>Tambah Karyawan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Karyawan</li>
        <li class="breadcrumb-item active">Tambah Karyawan</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Form Tambah Karyawan</h5>

            <form action="<?= base_url('home/simpanKaryawan'); ?>" method="post">
              <div class="row mb-3">
                <label for="nama" class="col-sm-4 col-form-label">Nama Karyawan</label>
                <div class="col-sm-8">
                  <input type="text" name="nama" id="nama" class="form-control" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                  <input type="text" name="email" id="email" class="form-control" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="password" class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                  <input type="password" name="password" id="password" class="form-control" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="level" class="col-sm-4 col-form-label">Level</label>
                <div class="col-sm-8">
                  <input type="number" name="level" id="level" class="form-control" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="NIK" class="col-sm-4 col-form-label">NIK</label>
                <div class="col-sm-8">
                  <input type="text" name="NIK" id="NIK" class="form-control" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="tempat_lahir" class="col-sm-4 col-form-label">Tempat Lahir</label>
                <div class="col-sm-8">
                  <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="tanggal_lahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-8">
                  <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="jenis_kelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-8">
                  <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                <div class="col-sm-8">
                  <input type="text" name="alamat" id="alamat" class="form-control" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="no_hp" class="col-sm-4 col-form-label">Nomor HP</label>
                <div class="col-sm-8">
                  <input type="text" name="no_hp" id="no_hp" class="form-control" required>
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="<?= base_url('home/karyawan') ?>" class="btn btn-secondary">Batal</a>
              </div>
            </form><!-- End Form Tambah Karyawan -->

          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->