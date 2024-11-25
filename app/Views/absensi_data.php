<main id="main" class="main">
    <div class="pagetitle">
        <h1>Daftar Absensi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('home'); ?>">Home</a></li>
                <li class="breadcrumb-item">Absensi</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Absensi</h5>

                        <!-- Tombol Tambah Data -->
                        <a href="<?= base_url('absensi/tambah'); ?>" class="btn btn-success mb-3">Tambah Data</a>

                        <!-- Tombol Cetak -->
                        <a href="<?= base_url('absensi/print'); ?>" target="_blank" class="btn btn-primary mb-3 text-white">Cetak</a>

                        <!-- Search bar -->
                        <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control mb-3" placeholder="Cari di tabel...">

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th style="width: 20%;">Nama</th>
                                        <th style="width: 15%;">Tanggal</th>
                                        <th style="width: 15%;">Status</th>
                                        <th style="width: 15%;">Keterangan</th>
                                        <th style="width: 10%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($absensi as $item): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $item->nama ?></td>
                                            <td><?= $item->tanggal ?></td>
                                            <td><?= $item->status ?></td>
                                            <td><?= $item->keterangan ?></td>
                                            <td>
                                                <a href="<?= base_url('absensi/edit/' . $item->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="<?= base_url('absensi/hapus/' . $item->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus absensi ini?')">Hapus</a>
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
