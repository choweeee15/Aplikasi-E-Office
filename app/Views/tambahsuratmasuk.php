<main id="main" class="main">
  <div class="pagetitle">
    <h1>Tambah Surat Masuk</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Surat</li>
        <li class="breadcrumb-item active">Tambah Surat Masuk</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Form Tambah Surat Masuk</h5>

            <form action="<?= base_url('home/simpansuratmasuk'); ?>" method="post" enctype="multipart/form-data">
              <div class="row mb-3">
                <label for="pengirim" class="col-sm-4 col-form-label">Pengirim:</label>
                <div class="col-sm-8">
                  <input type="text" name="pengirim" id="pengirim" class="form-control" value="<?= session()->get('nama'); ?>" readonly required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="penerima1" class="col-sm-4 col-form-label">Penerima Pertama:</label>
                <div class="col-sm-8">
                  <select name="penerima1" id="penerima1" class="form-control" required>
                    <option value="">Pilih Penerima ke-1</option>
                    <?php foreach ($karyawan as $item): ?>
                      <option value="<?= $item->nama; ?>"><?= $item->nama; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="penerima2" class="col-sm-4 col-form-label">Penerima ke-2:</label>
                <div class="col-sm-8">
                  <select name="penerima2" id="penerima2" class="form-control">
                    <option value="">Pilih Penerima ke-2</option>
                    <?php foreach ($karyawan as $item): ?>
                      <option value="<?= $item->nama; ?>"><?= $item->nama; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="penerima3" class="col-sm-4 col-form-label">Penerima ke-3:</label>
                <div class="col-sm-8">
                  <select name="penerima3" id="penerima3" class="form-control">
                    <option value="">Pilih Penerima ke-3</option>
                    <?php foreach ($karyawan as $item): ?>
                      <option value="<?= $item->nama; ?>"><?= $item->nama; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="penerima4" class="col-sm-4 col-form-label">Penerima ke-4:</label>
                <div class="col-sm-8">
                  <select name="penerima4" id="penerima4" class="form-control">
                    <option value="">Pilih Penerima ke-4</option>
                    <?php foreach ($karyawan as $item): ?>
                      <option value="<?= $item->nama; ?>"><?= $item->nama; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="penerima5" class="col-sm-4 col-form-label">Penerima ke-5:</label>
                <div class="col-sm-8">
                  <select name="penerima5" id="penerima5" class="form-control">
                    <option value="">Pilih Penerima ke-5</option>
                    <?php foreach ($karyawan as $item): ?>
                      <option value="<?= $item->nama; ?>"><?= $item->nama; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="id_surat" class="col-sm-4 col-form-label">Select Surat:</label>
                <div class="col-sm-8">
                  <select name="id_surat" id="id_surat" class="form-control" required>
                    <option value="">Select an item</option>
                    <?php foreach ($surat as $item): ?>
                      <option value="<?= $item->id_surat; ?>"><?= $item->nama_surat; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="jumlah" class="col-sm-4 col-form-label">Jumlah Lampiran:</label>
                <div class="col-sm-8">
                  <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="tanggal" class="col-sm-4 col-form-label">Tanggal:</label>
                <div class="col-sm-8">
                  <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="file" class="col-sm-4 col-form-label">File:</label>
                <div class="col-sm-8">
                  <input type="file" name="file" id="file" class="form-control" required>
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-success">Simpan</button>
              </div>
            </form><!-- End Form Tambah Surat Masuk -->

          </div>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->