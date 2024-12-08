<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Cuti</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item">Cuti</li>
                <li class="breadcrumb-item active">Tambah Cuti</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Tambah Cuti</h5>

                        <form action="<?= base_url('home/simpancuti'); ?>" method="post">
                            <input type="text" name="id_user" id="id_user" class="form-control" value="<?= session()->get('id'); ?>" hidden>
                            <div class="row mb-3">
                                <label for="jenis_cuti" class="col-sm-4 col-form-label">Jenis Cuti:</label>
                                <div class="col-sm-8">
                                    <select name="jenis_cuti" id="jenis_cuti" class="form-control" required>
                                        <option value="">Pilih Jenis Cuti</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Alasan Penting">Alasan Penting</option>
                                        <option value="Melahirkan">Melahirkan</option>
                                        <option value="Tahunan">Tahunan</option>
                                        <option value="Cuti Besar">Cuti Besar</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tanggal_mulai" class="col-sm-4 col-form-label">Tanggal Mulai:</label>
                                <div class="col-sm-8">
                                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tanggal_sampai" class="col-sm-4 col-form-label">Tanggal Sampai:</label>
                                <div class="col-sm-8">
                                    <input type="date" name="tanggal_sampai" id="tanggal_sampai" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="alasan" class="col-sm-4 col-form-label">Alasan:</label>
                                <div class="col-sm-8">
                                    <textarea name="alasan" id="alasan" class="form-control" rows="3" required></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="alamat_cuti" class="col-sm-4 col-form-label">Alamat Cuti:</label>
                                <div class="col-sm-8">
                                    <textarea name="alamat_cuti" id="alamat_cuti" class="form-control" rows="2" required></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="guru_pengganti" class="col-sm-4 col-form-label">Guru Pengganti:</label>
                                <div class="col-sm-8">
                                    <select name="guru_pengganti" id="guru_pengganti" class="form-control" required>
                                        <option value="">Pilih Guru Pengganti</option>
                                        <?php foreach ($karyawan as $item): ?>
                                            <option value="<?= $item->nama; ?>"><?= $item->nama; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form><!-- End Form Tambah Cuti -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->