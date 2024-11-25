<main id="main" class="main">
    <div class="pagetitle">
        <h1>Daftar Dokumen</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                <li class="breadcrumb-item active">Dokumen</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dokumen</h5>

                        
                        <a href="<?= base_url('home/tambahDokumen') ?>" class="btn btn-success mb-3">Tambah Dokumen</a>

                        
                        <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control mb-3" placeholder="Cari di tabel...">

                        
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th style="width: 25%;">Jenis Dokumen</th>
                                        <th style="width: 20%;">Kategori</th>
                                        <th style="width: 15%;">Departemen</th>
                                        <th style="width: 15%;">File</th>
                                        <th style="width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($dokumen as $doc): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $doc->jenis_dokumen ?></td>
                                            <td><?= $doc->kategori ?></td>
                                            <td><?= $doc->departemen ?></td>
                                            <td><a href="<?= base_url($doc->file) ?>" target="_blank">Lihat File</a></td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" onclick="viewData(<?= htmlspecialchars(json_encode($doc)) ?>)">Info</button>
                                                <a href="<?= base_url('home/editDokumen/' . $doc->id_dokumen) ?>" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="<?= base_url('home/hapusDokumen/' . $doc->id_dokumen) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?');" class="btn btn-danger btn-sm">Hapus</a>
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

        
        <div class="modal fade" id="documentDetailModal" tabindex="-1" aria-labelledby="documentDetailModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="documentDetailModalLabel">Detail Dokumen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Jenis Dokumen:</strong> <span id="detailJenisDokumen"></span></p>
                        <p><strong>Kategori:</strong> <span id="detailKategori"></span></p>
                        <p><strong>Departemen:</strong> <span id="detailDepartemen"></span></p>
                        <p><strong>Tanggal Dokumen:</strong> <span id="detailTanggalDokumen"></span></p>
                        <p><strong>Deskripsi:</strong> <span id="detailDeskripsi"></span></p>
                        <p><strong>File:</strong> <a href="#" id="detailFileLink" target="_blank">Lihat File</a></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

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
        document.getElementById("detailJenisDokumen").innerText = dokumen.jenis_dokumen;
        document.getElementById("detailKategori").innerText = dokumen.kategori;
        document.getElementById("detailDepartemen").innerText = dokumen.departemen;
        document.getElementById("detailTanggalDokumen").innerText = dokumen.tanggal_dokumen;
        document.getElementById("detailDeskripsi").innerText = dokumen.deskripsi;

        let fileUrl = "<?= base_url() ?>/" + dokumen.file;
        document.getElementById("detailFileLink").href = fileUrl;

        // Show modal
        var myModal = new bootstrap.Modal(document.getElementById("documentDetailModal"));
        myModal.show();
    }
</script>
