<main id="main" class="main">
  <div class="pagetitle">
    <h1>Edit Dokumen</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('home/dokumen') ?>">Dokumen</a></li>
        <li class="breadcrumb-item active">Edit Dokumen</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Form Edit Dokumen</h5>

            <form action="<?= base_url('home/updateDokumen/' . $dokumen->id_dokumen) ?>" method="post" enctype="multipart/form-data">
              <!-- Menyimpan file lama agar tidak hilang jika tidak diubah -->
              <input type="hidden" name="existing_file" value="<?= $dokumen->file; ?>">

              <div class="row mb-3">
                <label for="jenis_dokumen" class="col-sm-4 col-form-label">Jenis Dokumen</label>
                <div class="col-sm-8">
                  <input type="text" name="jenis_dokumen" id="jenis_dokumen" class="form-control" value="<?= $dokumen->jenis_dokumen ?>" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
                <div class="col-sm-8">
                  <select name="kategori" id="kategori" class="form-control" required>
                    <option value="Surat Keterangan" <?= $dokumen->kategori == 'Surat Keterangan' ? 'selected' : ''; ?>>Surat Keterangan</option>
                    <option value="Surat Izin" <?= $dokumen->kategori == 'Surat Izin' ? 'selected' : ''; ?>>Surat Izin</option>
                    <option value="Surat Tugas" <?= $dokumen->kategori == 'Surat Tugas' ? 'selected' : ''; ?>>Surat Tugas</option>
                    <option value="Sertifikat" <?= $dokumen->kategori == 'Sertifikat' ? 'selected' : ''; ?>>Sertifikat</option>
                    <option value="Laporan" <?= $dokumen->kategori == 'Laporan' ? 'selected' : ''; ?>>Laporan</option>
                    <option value="Dokumen Lainnya" <?= $dokumen->kategori == 'Dokumen Lainnya' ? 'selected' : ''; ?>>Dokumen Lainnya</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="departemen" class="col-sm-4 col-form-label">Departemen</label>
                <div class="col-sm-8">
                  <select name="departemen" id="departemen" class="form-control" required>
                    <option value="Kesiswaan" <?= $dokumen->departemen == 'Kesiswaan' ? 'selected' : ''; ?>>Kesiswaan</option>
                    <option value="Kepegawaian" <?= $dokumen->departemen == 'Kepegawaian' ? 'selected' : ''; ?>>Kepegawaian</option>
                    <option value="Akademik" <?= $dokumen->departemen == 'Akademik' ? 'selected' : ''; ?>>Akademik</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="tanggal_dokumen" class="col-sm-4 col-form-label">Tanggal Dokumen</label>
                <div class="col-sm-8">
                  <input type="date" name="tanggal_dokumen" id="tanggal_dokumen" class="form-control" value="<?= $dokumen->tanggal_dokumen ?>" required>
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
                  <input type="file" name="file" id="file" class="form-control">
                  <?php if (!empty($dokumen->file)): ?>
                    <a href="<?= base_url($dokumen->file) ?>" target="_blank">Lihat File Lama</a>
                  <?php endif; ?>
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('home/dokumen') ?>" class="btn btn-secondary">Batal</a>
              </div>
            </form><!-- End Form Edit Dokumen -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->
