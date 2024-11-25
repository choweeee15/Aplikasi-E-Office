<main id="main" class="main">
  <div class="pagetitle">
    <h1>Tambah Dokumen</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('home/dokumen') ?>">Dokumen</a></li>
        <li class="breadcrumb-item active">Tambah Dokumen</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Form Tambah Dokumen</h5>

            <form action="<?= base_url('home/simpanDokumen') ?>" method="post" enctype="multipart/form-data">
              <div class="row mb-3">
                <label for="jenis_dokumen" class="col-sm-4 col-form-label">Jenis Dokumen</label>
                <div class="col-sm-8">
                  <input type="text" name="jenis_dokumen" id="jenis_dokumen" class="form-control" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
                <div class="col-sm-8">
                  <select name="kategori" id="kategori" class="form-control" required>
                    <option value="Surat Keterangan">Surat Keterangan</option>
                    <option value="Surat Izin">Surat Izin</option>
                    <option value="Surat Tugas">Surat Tugas</option>
                    <option value="Sertifikat">Sertifikat</option>
                    <option value="Laporan">Laporan</option>
                    <option value="Dokumen Lainnya">Dokumen Lainnya</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="departemen" class="col-sm-4 col-form-label">Departemen</label>
                <div class="col-sm-8">
                  <select name="departemen" id="departemen" class="form-control" required>
                    <option value="Kesiswaan">Kesiswaan</option>
                    <option value="Kepegawaian">Kepegawaian</option>
                    <option value="Akademik">Akademik</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="tanggal_dokumen" class="col-sm-4 col-form-label">Tanggal Dokumen</label>
                <div class="col-sm-8">
                  <input type="date" name="tanggal_dokumen" id="tanggal_dokumen" class="form-control" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                <div class="col-sm-8">
                  <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"><?= isset($dokumen) ? $dokumen->deskripsi : '' ?></textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label for="file" class="col-sm-4 col-form-label">File</label>
                <div class="col-sm-8">
                  <input type="file" name="file" id="file" class="form-control" required>
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="<?= base_url('home/dokumen') ?>" class="btn btn-secondary">Batal</a>
              </div>
            </form><!-- End Form Tambah Dokumen -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->
