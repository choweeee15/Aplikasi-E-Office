<main id="main" class="main">
    <div class="pagetitle">
        <h1>Daftar Dokumen-dokumen</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('home'); ?>">Home</a></li>
                <li class="breadcrumb-item">Berkas Dokumen</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Berkas Dokumen</h5>
                        <a href="<?= base_url('home/tambahBerkas'); ?>" class="btn btn-success mb-3">Tambah</a>
                        <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control mb-3" placeholder="Cari di tabel...">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tableToPrint">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th style="width: 20%;">Nama Dokumen</th>
                                        <th style="width: 15%;">Nama File</th>
                                        <th style="width: 15%;">Jenis File</th>
                                        <th style="width: 20%;">Jenis Dokumen</th>
                                        <th style="width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($berkas as $dokumen): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $dokumen->nama_dokumen ?></td>
                                            <td><?= $dokumen->nama_file ?></td>
                                            <td><?= $dokumen->jenis_file ?></td>
                                            <td><?= $dokumen->jenis_dokumen ?></td>
                                            <td>
                                                <div class="d-flex flex-wrap gap-2">
                                                    <button type="button" class="btn btn-info btn-sm" onclick="viewData(<?= htmlspecialchars(json_encode($dokumen)) ?>)">Info</button>
                                                    <a href="<?= base_url('home/editBerkas/' . $dokumen->id_dokumen) ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="<?= base_url('home/hapusBerkas/' . $dokumen->id_dokumen) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?')">Hapus</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Dokumen</h5>
                        <div id="dokumenDetails" class="d-none">
                            <p><strong>Nama Dokumen:</strong> <span id="detailNamaDokumen"></span></p>
                            <p><strong>Nama File:</strong> <span id="detailNamaFile"></span></p>
                            <p><strong>Jenis File:</strong> <span id="detailJenisFile"></span></p>
                            <p><strong>Jenis Dokumen:</strong> <span id="detailJenisDokumen"></span></p>
                            <p><strong>Status:</strong> <span id="detailStatus"></span></p>
                            <p><strong>Tanggal Upload:</strong> <span id="detailTanggalUpload"></span></p>
                            <p><strong>File:</strong> <a href="#" id="detailFileLink" target="_blank">Lihat File</a></p>
                            <p><strong>Deskripsi:</strong> <span id="detailDeskripsi"></span></p>
                        </div>
                        <div id="noDocSelected" class="text-center">
                            <p>Pilih sebuah dokumen untuk melihat detailnya.</p>
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
            tr[i].style.display = "none"; 
            let td = tr[i].getElementsByTagName("td");
            for (let j = 0; j < td.length; j++) {
                if (td[j]) {
                    let txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                        tr[i].style.display = ""; 
                        break;
                    }
                }
            }
        }
    }

    function viewData(dokumen) {
    document.getElementById("dokumenDetails").classList.remove("d-none");
    document.getElementById("noDocSelected").classList.add("d-none");

    document.getElementById("detailNamaDokumen").innerText = dokumen.nama_dokumen;
    document.getElementById("detailNamaFile").innerText = dokumen.nama_file;
    document.getElementById("detailJenisFile").innerText = dokumen.jenis_file;
    document.getElementById("detailJenisDokumen").innerText = dokumen.jenis_dokumen;
    document.getElementById("detailStatus").innerText = dokumen.status;
    document.getElementById("detailTanggalUpload").innerText = dokumen.tanggal_upload;
    document.getElementById("detailDeskripsi").innerText = dokumen.deskripsi;

    // Mengatur href link file berdasarkan path yang disimpan di database
    let fileUrl = "<?= base_url() ?>/" + dokumen.file; // Path file yang disimpan

    // Set link file untuk detail dokumen
    document.getElementById("detailFileLink").href = fileUrl;

    // Jika ingin membuka file di tab baru (untuk PDF atau jenis file lainnya)
    document.getElementById("detailFileLink").target = "_blank";
}

</script>
