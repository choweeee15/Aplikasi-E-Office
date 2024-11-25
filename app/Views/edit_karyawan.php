<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Karyawan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('home/karyawan') ?>">Karyawan</a></li>
                <li class="breadcrumb-item active">Edit Karyawan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Edit Karyawan</h5>

                        <form action="<?= base_url('home/updateKaryawan/' . $karyawan->id_karyawan); ?>" method="post">
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="<?= $karyawan->nama; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="NIK">NIK:</label>
                                <input type="text" name="NIK" id="NIK" class="form-control" value="<?= $karyawan->NIK; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir:</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?= $karyawan->tempat_lahir; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir:</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?= $karyawan->tanggal_lahir; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin:</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                    <option value="Laki-laki" <?= $karyawan->jenis_kelamin == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                                    <option value="Perempuan" <?= $karyawan->jenis_kelamin == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $karyawan->alamat; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">Nomor HP:</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control" value="<?= $karyawan->no_hp; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="id_user">ID User:</label>
                                <input type="text" name="id_user" id="id_user" class="form-control" value="<?= $karyawan->id_user; ?>" required>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <a href="<?= base_url('home/hapus_karyawan/'.$karyawan->id_karyawan) ?>" class="btn btn-danger">Hapus</a>
                            </div>
                        </form><!-- End Form Edit Karyawan -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
