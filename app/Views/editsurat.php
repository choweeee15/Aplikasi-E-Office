<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Surat</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Surat</li>
                <li class="breadcrumb-item active">Edit Surat</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Edit Surat</h5>

                        <form action="<?= base_url('home/updatesurat/' . $surat->id_surat); ?>" method="post">
                            <div class="form-group">
                                <label for="nama_surat" class="form-label">Nama Surat:</label>
                                <input type="text" name="nama_surat" class="form-control" value="<?= $surat->nama_surat ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="kode_surat" class="form-label">Kode Surat:</label>
                                <input type="text" name="kode_surat" class="form-control" value="<?= $surat->kode_surat ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="stok" class="form-label">Total Dokumen:</label>
                                <input type="number" name="total_dokumen" class="form-control" value="<?= $surat->total_dokumen ?>" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
