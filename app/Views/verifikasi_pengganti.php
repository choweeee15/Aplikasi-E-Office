<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tabel Data Cuti</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home/dashboard">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Data Guru Pengganti</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Guru Pengganti</h5>
                        <div class="table-responsive">
                            <!-- Table with stripped rows -->
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <!-- <th style="width: 20%;">Nama</th> -->
                                        <th style="width: 20%;">Jenis Cuti</th>
                                        <th style="width: 15%;">Tanggal Mulai</th>
                                        <th style="width: 15%;">Tanggal Selesai</th>
                                        <th style="width: 20%;">Pengganti</th>
                                        <th style="width: 10%;">Status Pengganti</th>
                                        <th style="width: 10%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($cuti)): ?>
                                        <?php $no = 1;
                                        foreach ($cuti as $row): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>

                                                <td><?= $row->jenis_cuti; ?></td>
                                                <td><?= date('d-m-Y', strtotime($row->tanggal_mulai)); ?></td>
                                                <td><?= date('d-m-Y', strtotime($row->tanggal_sampai)); ?></td>
                                                <td><?= $row->guru_pengganti; ?></td>
                                                <td>
                                                    <?php if ($row->status_pengganti == 'Menunggu Verifikasi'): ?>
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

                                                    <?php if ($row->status_pengganti == 'Menunggu Verifikasi'): ?>
                                                        <?php if (session()->get('nama') == $row->guru_pengganti): ?>
                                                            <a href="/home/updatestatuspengganti/<?= $row->id_cuti; ?>" class="btn btn-success btn-sm">Setuju</a>
                                                            <a href="/home/updatestatuspengganti2/<?= $row->id_cuti; ?>" class="btn btn-danger btn-sm">Tolak</a>
                                                        <?php else: ?>
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