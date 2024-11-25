<main id="main" class="main">
  <div class="pagetitle">
    <h1>Edit Berkas Dokumen</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('home/berkas') ?>">Berkas Dokumen</a></li>
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

            <form action="<?= base_url('home/updateBerkas/' . $berkas->id_dokumen); ?>" method="post" enctype="multipart/form-data">
              
              <!-- Nama Dokumen -->
              <div class="row mb-3">
                <label for="nama_dokumen" class="col-sm-4 col-form-label">Nama Dokumen</label>
                <div class="col-sm-8">
                  <input type="text" name="nama_dokumen" id="nama_dokumen" class="form-control" value="<?= $berkas->nama_dokumen; ?>" required>
                </div>
              </div>

              <!-- Nama File -->
              <div class="row mb-3">
                <label for="nama_file" class="col-sm-4 col-form-label">Nama File</label>
                <div class="col-sm-8">
                  <input type="text" name="nama_file" id="nama_file" class="form-control" value="<?= $berkas->nama_file; ?>" required>
                </div>
              </div>

              <!-- Jenis File -->
              <div class="row mb-3">
                <label for="jenis_file" class="col-sm-4 col-form-label">Jenis File</label>
                <div class="col-sm-8">
                  <select name="jenis_file" id="jenis_file" class="form-control" required>
                    <option value="PDF" <?= $berkas->jenis_file == 'PDF' ? 'selected' : ''; ?>>PDF</option>
                    <option value="EXCEL" <?= $berkas->jenis_file == 'EXCEL' ? 'selected' : ''; ?>>EXCEL</option>
                  </select>
                </div>
              </div>

              <!-- Jenis Dokumen -->
              <div class="row mb-3">
                <label for="jenis_dokumen" class="col-sm-4 col-form-label">Jenis Dokumen</label>
                <div class="col-sm-8">
                  <select name="jenis_dokumen" id="jenis_dokumen" class="form-control" required>
                    <option value="Surat Keterangan" <?= $berkas->jenis_dokumen == 'Surat Keterangan' ? 'selected' : ''; ?>>Surat Keterangan</option>
                    <option value="Surat Izin" <?= $berkas->jenis_dokumen == 'Surat Izin' ? 'selected' : ''; ?>>Surat Izin</option>
                    <option value="Surat Tugas" <?= $berkas->jenis_dokumen == 'Surat Tugas' ? 'selected' : ''; ?>>Surat Tugas</option>
                    <option value="Sertifikat" <?= $berkas->jenis_dokumen == 'Sertifikat' ? 'selected' : ''; ?>>Sertifikat</option>
                    <option value="Laporan" <?= $berkas->jenis_dokumen == 'Laporan' ? 'selected' : ''; ?>>Laporan</option>
                    <option value="Dokumen Lainnya" <?= $berkas->jenis_dokumen == 'Dokumen Lainnya' ? 'selected' : ''; ?>>Dokumen Lainnya</option>
                  </select>
                </div>
              </div>

              <!-- Status -->
              <div class="row mb-3">
                <label for="status" class="col-sm-4 col-form-label">Status</label>
                <div class="col-sm-8">
                  <select name="status" id="status" class="form-control" required>
                    <option value="Active" <?= $berkas->status == 'Active' ? 'selected' : ''; ?>>Active</option>
                    <option value="Inactive" <?= $berkas->status == 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
                  </select>
                </div>
              </div>

              <!-- Tanggal Upload -->
              <div class="row mb-3">
                <label for="tanggal_upload" class="col-sm-4 col-form-label">Tanggal Upload</label>
                <div class="col-sm-8">
                  <input type="date" name="tanggal_upload" id="tanggal_upload" class="form-control" value="<?= $berkas->tanggal_upload; ?>" required>
                </div>
              </div>

              <!-- Deskripsi -->
              <div class="row mb-3">
                <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                <div class="col-sm-8">
                  <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4"><?= $berkas->deskripsi; ?></textarea>
                </div>
              </div>

              <div class="row mb-3">
    <label for="file" class="col-sm-4 col-form-label">File</label>
    <div class="col-sm-8">
        <input type="file" name="file" id="file" class="form-control">
        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah file.</small>
    </div>
</div>


              <div class="form-group mt-4">
                <input type="hidden" name="id_dokumen" value="<?= $berkas->id_dokumen; ?>">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('home/hapusBerkas/' . $berkas->id_dokumen) ?>" class="btn btn-danger">Hapus</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->
