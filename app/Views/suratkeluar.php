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

                        <!-- Button -->
                        <button class="btn btn-success mb-3">
                            <a href="/home/tambahsuratkeluar" class="text-white">Tambah</a>
                        </button>

                        <!-- Search bar -->
                        <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control mb-3" placeholder="Cari di tabel...">

                        <div class="table-responsive">
                            <!-- Table -->
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th style="width: 22%;">ID Surat Keluar</th>
                                        <th style="width: 25%;">Nama Surat</th>
                                        <th style="width: 22%;">Jumlah Lampiran</th>
                                        <th style="width: 20%;">Tanggal</th>
                                        <th style="width: 10%;">Status</th>
                                        <th style="width: 10%;">File</th> <!-- New File column -->
                                        <th style="width: 10%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ms = 1;
                                    foreach ($takdirestui as $item): ?>
                                        <tr>
                                            <td><?= $ms++ ?></td>
                                            <td><?= $item->id_suratkeluar; ?></td>
                                            <td><?= $item->nama_surat; ?></td>
                                            <td><?= $item->jumlah; ?></td>
                                            <td><?= $item->tanggal; ?></td>
                                            <td>
                                                <?php if ($item->penerima == session()->get('nama')): ?>
                                                    <?php if ($item->status == "Belum Dibaca"): ?>
                                                        <a href="<?= base_url('home/updateStatusSuratKeluar/' . $item->id_suratkeluar) ?>"
                                                           class="btn btn-primary btn-sm">Baca</a>
                                                    <?php else: ?>
                                                        <span>Sudah Dibaca</span>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <span><?= $item->status; ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if (!empty($item->file)): ?>
                                                    <a href="<?= base_url('uploads/' . $item->file); ?>" class="btn btn-success btn-sm" download>
                                                        <i class="fas fa-download"></i> Download
                                                    </a>
                                                <?php else: ?>
                                                    <span>No File</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-wrap gap-2">
                                                    <a href="<?= base_url('home/update_suratkeluar/' . $item->id_suratkeluar) ?>"
                                                       class="btn btn-danger btn-sm" title="Hapus">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <button class="btn btn-info btn-sm" onclick="viewData(<?= htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8') ?>)">
                                                        Info
                                                    </button>
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
        </div>

        <!-- Modal for Document Details -->
        <div class="modal fade" id="documentDetailModal" tabindex="-1" aria-labelledby="documentDetailModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="documentDetailModalLabel">Detail Dokumen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Pengirim:</strong> <span id="detailPengirim"></span></p>
                        <p><strong>Penerima:</strong> <span id="detailPenerima"></span></p>
                        <p><strong>Nama Surat:</strong> <span id="detailNamaSurat"></span></p>
                        <p><strong>Jumlah Lampiran:</strong> <span id="detailJumlah"></span></p>
                        <p><strong>Tanggal:</strong> <span id="detailTanggal"></span></p>
                        <p><strong>Status:</strong> <span id="detailStatus"></span></p>
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
        document.getElementById("detailPengirim").innerText = dokumen.pengirim;
        document.getElementById("detailPenerima").innerText = dokumen.penerima;
        document.getElementById("detailNamaSurat").innerText = dokumen.nama_surat;
        document.getElementById("detailJumlah").innerText = dokumen.jumlah;
        document.getElementById("detailTanggal").innerText = dokumen.tanggal;
        document.getElementById("detailStatus").innerText = dokumen.status;

        if (dokumen.file) {
            document.getElementById("detailFileLink").href = "<?= base_url() ?>/uploads/" + dokumen.file;
        } else {
            document.getElementById("detailFileLink").innerText = "No file available";
            document.getElementById("detailFileLink").href = "#";
        }

        var myModal = new bootstrap.Modal(document.getElementById("documentDetailModal"));
        myModal.show();
    }
</script>
