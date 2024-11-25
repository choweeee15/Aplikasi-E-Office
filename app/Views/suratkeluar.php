<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tabel Surat Keluar Office</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Surat Keluar Office</h5>

              <button class="btn btn-success mb-3">
                <a href="/home/tambahsuratkeluar" class="text-white">Tambah</a>
              </button>

              <!-- Search bar -->
              <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control mb-3" placeholder="Cari di tabel...">

              <!-- Table -->
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <thead class="thead-dark">
                    <tr>
                      <th width="3%">No</th>
                      <th>Surat Keluar Office</th>
                      <th>Nama Surat</th>
                      <th width="5%">Jumlah Lampiran</th>
                      <th>Tanggal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $ms = 1;
                    foreach ($takdirestui as $key => $value): ?>
                      <tr>
                        <td><?= $ms++ ?></td>
                        <td><?= $value->id_suratkeluar ?></td>
                        <td><?= $value->nama_surat ?></td>
                        <td><?= $value->jumlah ?></td>
                        <td><?= $value->tanggal ?></td>
                        <td>
                          <a href="<?= base_url('home/hapus_surattt/' . $value->id_suratkeluar) ?>" class="btn btn-danger">Hapus</a>
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
        let input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toLowerCase();
        table = document.querySelector("table");
        tr = table.getElementsByTagName("tr");

        for (i = 1; i < tr.length; i++) {
            tr[i].style.display = "none"; // Hide rows initially
            td = tr[i].getElementsByTagName("td");
            for (let j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                        tr[i].style.display = ""; // Show row if match found
                        break;
                    }
                }
            }
        }
    }
</script>
