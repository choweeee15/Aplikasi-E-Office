<main id="main" class="main">
  <div class="pagetitle">
    <h1>Tambah Surat</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Surat</li>
        <li class="breadcrumb-item active">Tambah Surat</li>
      </ol>
    </nav>
  </div>
  
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Form Tambah Surat</h5>

            <form action="<?= base_url('home/simpansurat') ?>" method="post">
              <div class="row mb-3">
                <label for="nama_surat" class="col-sm-3 col-form-label">Nama Surat:</label>
                <div class="col-sm-9">
                  <input type="text" name="nama_surat" class="form-control" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="kode_surat" class="col-sm-3 col-form-label">Kode Surat:</label>
                <div class="col-sm-9">
                  <input type="text" name="kode_surat" class="form-control" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="total_dokumen" class="col-sm-3 col-form-label">Total Dokumen:</label>
                <div class="col-sm-9">
                  <input type="number" name="total_dokumen" class="form-control" required>
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form><!-- End Form Tambah Surat -->

          </div>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->



<!-- <h2>Tambah Barang</h2>

<form action="<?= base_url('home/simpanbarang') ?>" method="post">
    <div class="form-group">
        <label for="nama_barang">Nama Barang:</label>
        <input type="text" name="nama_barang" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="kode_barang">Kode Barang:</label>
        <input type="text" name="kode_barang" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="stok">Stok:</label>
        <input type="number" name="stok" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form> -->
