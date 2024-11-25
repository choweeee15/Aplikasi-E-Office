<main id="main" class="main">
  <div class="pagetitle">
    <h1>Tambah Dokumen</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('home/berkas') ?>">Home</a></li>
        <li class="breadcrumb-item">Dokumen</li>
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

            <form action="<?= base_url('home/simpanBerkas') ?>" method="post" enctype="multipart/form-data">
              
              <!-- Nama Dokumen -->
              <div class="row mb-3">
                <label for="nama_dokumen" class="col-sm-4 col-form-label">Nama Dokumen</label>
                <div class="col-sm-8">
                  <input type="text" name="nama_dokumen" id="nama_dokumen" class="form-control" value="<?= isset($berkas) ? $berkas->nama_dokumen : '' ?>" required>
                </div>
              </div>

              <!-- Nama File -->
              <div class="row mb-3">
                <label for="nama_file" class="col-sm-4 col-form-label">Nama File</label>
                <div class="col-sm-8">
                  <input type="text" name="nama_file" id="nama_file" class="form-control" value="<?= isset($berkas) ? $berkas->nama_file : '' ?>" required>
                </div>
              </div>

              <!-- Jenis File -->
              <div class="row mb-3">
                <label for="jenis_file" class="col-sm-4 col-form-label">Jenis File</label>
                <div class="col-sm-8">
                  <select name="jenis_file" id="jenis_file" class="form-control" required>
                    <option value="PDF" <?= (isset($berkas) && $berkas->jenis_file == 'PDF') ? 'selected' : ''; ?>>PDF</option>
                    <option value="EXCEL" <?= (isset($berkas) && $berkas->jenis_file == 'EXCEL') ? 'selected' : ''; ?>>EXCEL</option>
                  </select>
                </div>
              </div>

              <!-- Jenis Dokumen -->
              <div class="row mb-3">
                <label for="jenis_dokumen" class="col-sm-4 col-form-label">Jenis Dokumen</label>
                <div class="col-sm-8">
                  <select name="jenis_dokumen" id="jenis_dokumen" class="form-control" required>
                    <option value="Surat Keterangan" <?= (isset($berkas) && $dokumen_absensi->jenis_dokumen == 'Surat Keterangan') ? 'selected' : ''; ?>>Surat Keterangan</option>
                    <option value="Surat Izin" <?= (isset($berkas) && $dokumen_absensi->jenis_dokumen == 'Surat Izin') ? 'selected' : ''; ?>>Surat Izin</option>
                    <option value="Surat Tugas" <?= (isset($berkas) && $dokumen_absensi->jenis_dokumen == 'Surat Tugas') ? 'selected' : ''; ?>>Surat Tugas</option>
                    <option value="Sertifikat" <?= (isset($berkas) && $dokumen_absensi->jenis_dokumen == 'Sertifikat') ? 'selected' : ''; ?>>Sertifikat</option>
                    <option value="Laporan" <?= (isset($berkas) && $dokumen_absensi->jenis_dokumen == 'Laporan') ? 'selected' : ''; ?>>Laporan</option>
                    <option value="Dokumen Lainnya" <?= (isset($berkas) && $berkas->jenis_dokumen == 'Dokumen Lainnya') ? 'selected' : ''; ?>>Dokumen Lainnya</option>
                  </select>
                </div>
              </div>

              <!-- Tanggal Dokumen -->
              <div class="row mb-3">
                <label for="tanggal_dokumen" class="col-sm-4 col-form-label">Tberkasanggal Dokumen</label>
                <div class="col-sm-8">
                  <input type="date" name="tanggal_upload" id="tanggal_upload" class="form-control" value="<?= isset($berkas) ? $berkas->tanggal_upload : '' ?>" required>
                </div>
              </div>

              <!-- Status -->
              <div class="row mb-3">
                <label for="status" class="col-sm-4 col-form-label">Status</label>
                <div class="col-sm-8">
                  <select name="status" id="status" class="form-control" required>
                    <option value="Active" <?= (isset($berkas) && $berkas->status == 'Active') ? 'selected' : ''; ?>>Active</option>
                    <option value="Inactive" <?= (isset($berkas) && $berkas->status == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>
                  </select>
                </div>
              </div>

              <!-- Deskripsi -->
              <div class="row mb-3">
                <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                <div class="col-sm-8">
                  <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"><?= isset($dokumen_absensi) ? $berkas->deskripsi : '' ?></textarea>
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
                <a href="<?= base_url('home/berkas') ?>" class="btn btn-secondary">Batal</a>
              </div>
            </form><!-- End Form Tambah Dokumen Absensi -->

          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->
