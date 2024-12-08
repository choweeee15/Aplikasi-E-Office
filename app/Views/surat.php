<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tabel Jenis Surat Office</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Jenis Surat Office</h5>

              <!-- Tombol Tambah Surat -->
              <button class="btn btn-success mb-3">
                <a href="/home/tambahsurat" class="text-white text-decoration-none">Tambah</a>
              </button>

              <!-- Search bar -->
              <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control mb-3" placeholder="Cari di tabel...">

              <!-- Table with stripped and bordered rows -->
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 15%;">ID Surat</th>
                            <th style="width: 25%;">Nama Surat</th>
                            <th style="width: 15%;">Kode Surat</th>
                            <th style="width: 15%;">Total Dokumen</th>
                            <th style="width: 25%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($takdirestui as $surat): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $surat->id_surat ?></td>
                                <td><?= $surat->nama_surat ?></td>
                                <td><?= $surat->kode_surat ?></td>
                                <td><?= $surat->total_dokumen ?></td>
                                <td>
                                    <a href="<?= base_url('home/editsurat/' . $surat->id_surat) ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="<?= base_url('home/hapussurat/' . $surat->id_surat) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus surat ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>

</main><!-- End #main -->

<script>
    function searchTable() {
        let input = document.getElementById("searchInput");
        let filter = input.value.toLowerCase();
        let table = document.querySelector("table");
        let tr = table.getElementsByTagName("tr");

        for (let i = 1; i < tr.length; i++) {
            tr[i].style.display = "none"; // Hide rows initially
            let td = tr[i].getElementsByTagName("td");
            for (let j = 0; j < td.length; j++) {
                if (td[j]) {
                    let txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                        tr[i].style.display = ""; // Show row if match found
                        break;
                    }
                }
            }
        }
    }
</script>
