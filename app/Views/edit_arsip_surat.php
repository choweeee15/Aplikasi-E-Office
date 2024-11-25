<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Arsip Surat</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Edit Arsip Surat</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Edit Arsip Surat</h5>

                        <form action="<?= base_url('home/updateArsipSurat/' . $arsip_surat->id_arsip); ?>" method="POST">

                            <div class="mb-3">
                                <label for="jenis_surat" class="form-label">Jenis Surat</label>
                                <input type="text" id="jenis_surat" name="jenis_surat" class="form-control" value="<?= $arsip_surat->jenis_surat; ?>" required>
                            </div>

<div class="mb-3">
    <label for="penerima_khusus" class="form-label">Penerima Khusus</label>
    <select id="penerima_khusus" name="penerima_khusus" class="form-control" required>
        <option value="Kepala Sekolah" <?= ($arsip_surat->penerima_disposisi == 'Kepala Sekolah') ? 'selected' : ''; ?>>Kepala Sekolah</option>
        <option value="Wakil Kepala Sekolah" <?= ($arsip_surat->penerima_disposisi == 'Wakil Kepala Sekolah') ? 'selected' : ''; ?>>Wakil Kepala Sekolah</option>
        <!-- Tambahkan pilihan lain sesuai kebutuhan -->
    </select>
</div>


                            <div class="mb-3">
                                <label for="tanggal_arsip" class="form-label">Tanggal Arsip</label>
                                <input type="date" id="tanggal_arsip" name="tanggal_arsip" class="form-control" value="<?= $arsip_surat->tanggal_arsip; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="lokasi_arsip" class="form-label">Lokasi Arsip</label>
                                <input type="text" id="lokasi_arsip" name="lokasi_arsip" class="form-control" value="<?= $arsip_surat->lokasi_arsip; ?>" required>
                            </div>
                            

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control" required><?= $arsip_surat->deskripsi; ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
</main><!-- End #main -->
