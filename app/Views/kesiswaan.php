<!-- app/Views/dokumen/kesiswaan.php -->
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Dokumen Kesiswaan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item">Dokumen</li>
          <li class="breadcrumb-item active">Kesiswaan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Dokumen Kesiswaan</h5>

              <button class="btn btn-success mb-3">
                <a href="/dokumen_kesiswaan/tambah" class="text-white">Tambah Dokumen</a>
              </button>

              <!-- Search bar -->
              <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control mb-3" placeholder="Cari dokumen...">

              <table class="table datatable">
                <thead>
                  <tr>
                    <th width="3%">No</th>
                    <th>ID Dokumen</th>
                    <th>Nama Dokumen</th>
                    <th>Kategori</th>
                    <th>Tanggal Upload</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($dokumen_kesiswaan as $dokumen): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $dokumen['id_dokumen'] ?></td>
                      <td><?= $dokumen['nama_dokumen'] ?></td>
                      <td><?= $dokumen['kategori'] ?></td>
                      <td><?= $dokumen['tanggal_upload'] ?></td>
                      <td>
                        <a href="/dokumen_kesiswaan/edit/<?= $dokumen['id_dokumen'] ?>" class="btn btn-warning">Edit</a>
                        <a href="/dokumen_kesiswaan/hapus/<?= $dokumen['id_dokumen'] ?>" class="btn btn-danger">Hapus</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>
