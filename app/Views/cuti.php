<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tabel Data Cuti</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home/dashboard">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Data Cuti</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Cuti</h5>

                        <?php if (session()->get('level') != 1 && session()->get('level') != 2): ?>
                            <button class="btn btn-success mb-3">
                                <a href="/home/tambahcuti" class="text-white">Tambah</a>
                            </button>
                        <?php endif; ?>


                        <div class="table-responsive">
                            <!-- Table with stripped rows -->
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th style="width: 20%;">Nama</th>
                                        <th style="width: 20%;">Jenis Cuti</th>
                                        <th style="width: 15%;">Tanggal Mulai</th>
                                        <th style="width: 15%;">Tanggal Selesai</th>
                                        <th style="width: 25%;">Alasan</th>
                                        <th style="width: 20%;">Pengganti</th>
                                        <th style="width: 10%;">Status</th>
                                        <th style="width: 10%;">Komentar</th>
                                        <th style="width: 10%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($cuti)): ?>
                                        <?php $no = 1;
                                        foreach ($cuti as $row): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row->nama; ?></td>
                                                <td><?= $row->jenis_cuti; ?></td>
                                                <td><?= date('d-m-Y', strtotime($row->tanggal_mulai)); ?></td>
                                                <td><?= date('d-m-Y', strtotime($row->tanggal_sampai)); ?></td>
                                                <td><?= $row->alasan; ?></td>
                                                <td><?= $row->guru_pengganti; ?><?php if ($row->status_pengganti == 'Menunggu Verifikasi'): ?>
                                                    <span class="badge bg-warning text-dark"><?= $row->status_pengganti; ?></span>
                                                <?php elseif ($row->status_pengganti == 'Disetujui'): ?>
                                                    <span class="badge bg-success"><?= $row->status_pengganti; ?></span>
                                                <?php elseif ($row->status_pengganti == 'Ditolak'): ?>
                                                    <span class="badge bg-danger"><?= $row->status_pengganti; ?></span>
                                                <?php else: ?>
                                                    <span class="badge bg-secondary"><?= $row->status_pengganti; ?></span>
                                                <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($row->status == 'Menunggu Verifikasi'): ?>
                                                        <span class="badge bg-warning text-dark"><?= $row->status; ?></span>
                                                    <?php elseif ($row->status == 'Disetujui'): ?>
                                                        <span class="badge bg-success"><?= $row->status; ?></span>
                                                    <?php elseif ($row->status == 'Ditolak'): ?>
                                                        <span class="badge bg-danger"><?= $row->status; ?></span>
                                                    <?php else: ?>
                                                        <span class="badge bg-secondary"><?= $row->status; ?></span>
                                                    <?php endif; ?>
                                                </td>

                                                <td><?= $row->komentar ? $row->komentar : '-'; ?></td>
                                                <td>
                                                    <?php if ($row->status == 'Disetujui'): ?>
                                                        <a href="/home/printcuti/<?= $row->id_cuti; ?>" class="btn btn-primary btn-sm">Print</a>
                                                    <?php elseif ($row->status == 'Menunggu Verifikasi'): ?>
                                                        <?php if (session()->get('level') == 2 || session()->get('level') == 1): ?>
                                                            <a href="/home/verifikasicuti/<?= $row->id_cuti; ?>" class="btn btn-success btn-sm">Verifikasi</a>
                                                        <?php else: ?>
                                                            <a href="/home/editcuti/<?= $row->id_cuti; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                            <a href="/home/hapuscuti/<?= $row->id_cuti; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="9" class="text-center">Tidak ada data cuti.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->