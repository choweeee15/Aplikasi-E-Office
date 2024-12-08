<main id="main" class="main">
    <div class="pagetitle">
        <h1>Verifikasi Data Cuti</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home/dashboard">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Verifikasi Cuti</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Verifikasi Data Cuti</h5>

                        <form action="/home/updatecuti/<?= $cuti->id_cuti; ?>" method="post">
                            <div class="row mb-3">
                                <label for="jenis_cuti" class="col-sm-2 col-form-label">Jenis Cuti</label>
                                <div class="col-sm-10">
                                    <select name="jenis_cuti" id="jenis_cuti" class="form-control" readonly>
                                        <option value="Sakit" <?= $cuti->jenis_cuti == 'Sakit' ? 'selected' : ''; ?>>Sakit</option>
                                        <option value="Alasan Penting" <?= $cuti->jenis_cuti == 'Alasan Penting' ? 'selected' : ''; ?>>Alasan Penting</option>
                                        <option value="Melahirkan" <?= $cuti->jenis_cuti == 'Melahirkan' ? 'selected' : ''; ?>>Melahirkan</option>
                                        <option value="Tahunan" <?= $cuti->jenis_cuti == 'Tahunan' ? 'selected' : ''; ?>>Tahunan</option>
                                        <option value="Cuti Besar" <?= $cuti->jenis_cuti == 'Cuti Besar' ? 'selected' : ''; ?>>Cuti Besar</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tanggal_mulai" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" value="<?= $cuti->tanggal_mulai; ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tanggal_sampai" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tanggal_sampai" id="tanggal_sampai" class="form-control" value="<?= $cuti->tanggal_sampai; ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="alasan" class="col-sm-2 col-form-label">Alasan</label>
                                <div class="col-sm-10">
                                    <textarea name="alasan" id="alasan" class="form-control" readonly><?= $cuti->alasan; ?></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" id="status" class="form-control">
                                        <option value="Menunggu Verifikasi" <?= $cuti->status == 'Menunggu Verifikasi' ? 'selected' : ''; ?>>Menunggu Verifikasi</option>
                                        <option value="Disetujui" <?= $cuti->status == 'Disetujui' ? 'selected' : ''; ?>>Disetujui</option>
                                        <option value="Ditolak" <?= $cuti->status == 'Ditolak' ? 'selected' : ''; ?>>Ditolak</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="komentar" class="col-sm-2 col-form-label">Komentar</label>
                                <div class="col-sm-10">
                                    <textarea name="komentar" id="komentar" class="form-control"><?= $cuti->komentar; ?></textarea>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="/home/cuti" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form><!-- End Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>