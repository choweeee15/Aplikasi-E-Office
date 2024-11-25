<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tabel Arsip Surat</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Arsip Surat</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Arsip Surat</h5>

                        
                        <button class="btn btn-success mb-3">
                            <a href="<?= base_url('home/tambahArsipSurat'); ?>" class="text-white">Tambah Arsip Surat</a>
                        </button>

                        
                        <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control mb-3" placeholder="Cari di tabel...">

                        
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="3%">No</th>
                                        <th>ID Arsip</th>
                                        <th>Jenis Surat</th>
                                        <th>Tanggal Arsip</th>
                                        <th>Lokasi Arsip</th>
                                        <th>Deskripsi</th>
                                        <th>Penerima Disposisi</th>
                                        <th style="width: 150x;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $ms = 1; ?>
                                    <?php foreach ($arsip_surat as $arsip): ?>
                                        <tr>
                                            <td><?= $ms++ ?></td>
                                            <td><?= $arsip->id_arsip; ?></td>
                                            <td><?= $arsip->jenis_surat; ?></td>
                                            <td><?= $arsip->tanggal_arsip; ?></td>
                                            <td><?= $arsip->lokasi_arsip; ?></td>
                                            <td><?= $arsip->deskripsi; ?></td>
                                            <td><?= $arsip->penerima_disposisi; ?></td>
                                            <td>
                                                <a href="<?= base_url('home/EditArsipSurat/' . $arsip->id_arsip); ?>" class="btn btn-warning">Edit</a> | 
                                                <a href="<?= base_url('home/hapusArsipSurat/' . $arsip->id_arsip); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
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
