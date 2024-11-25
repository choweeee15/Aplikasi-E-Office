<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Arsip Surat</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Tambah Arsip Surat</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Tambah Arsip Surat</h5>

                        <form method="post" action="<?= base_url('home/simpanArsipSurat') ?>">

                            <div class="mb-3">
                                <label for="jenis_surat" class="form-label">Jenis Surat</label>
                                <input type="text" id="jenis_surat" name="jenis_surat" class="form-control" required>
                            </div>

                            <div class="mb-3">
    <label for="penerima_khusus" class="form-label">Penerima Khusus</label>
    <select id="penerima_khusus" name="penerima_khusus" class="form-control" required>
        <option value="">-- Pilih Penerima --</option>
        <?php foreach ($penerima_khusus as $user): ?>
            <option value="<?= $user->username; ?>"><?= $user->username; ?> (Level: <?= $user->level; ?>)</option>
        <?php endforeach; ?>
    </select>
</div>


                            <div class="mb-3">
                                <label for="tanggal_arsip" class="form-label">Tanggal Arsip</label>
                                <input type="date" id="tanggal_arsip" name="tanggal_arsip" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="lokasi_arsip" class="form-label">Lokasi Arsip</label>
                                <input type="text" id="lokasi_arsip" name="lokasi_arsip" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
