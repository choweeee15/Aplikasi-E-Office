<main id="main" class="main">

    <div class="pagetitle">
        <h1>Karyawan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
                        <!-- Add and Search Buttons -->
                        <div class="mb-3">
                            <a href="<?= base_url('home/tambahKaryawan') ?>" class="btn btn-success">+Tambah</a>
                        </div>
                        <form class="d-flex mb-3">
                            <input class="form-control me-2" type="text" placeholder="Search">
                            <button class="btn btn-primary" type="button">Search</button>
                        </form>

                        <!-- Table with bordered rows and adjusted width -->
                        <div style="overflow-x: auto;">
                            <table class="table table-bordered" style="min-width: 1200px;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Level</th>
                                        <th>NIK</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>No HP</th>
                                        <th style="width: 150px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($takdirestui as $karyawan): ?>
    <tr>
        <td><?= $karyawan->nama; ?></td>
        <td><?= $karyawan->username; ?></td>
        <td><?= $karyawan->password; ?></td>
        <td><?= $karyawan->level; ?></td>
        <td><?= $karyawan->NIK; ?></td>
        <td><?= $karyawan->tempat_lahir; ?></td>
        <td><?= $karyawan->tanggal_lahir; ?></td>
        <td><?= $karyawan->jenis_kelamin; ?></td>
        <td><?= $karyawan->alamat; ?></td>
        <td><?= $karyawan->no_hp; ?></td>
        <td>
            <a href="<?= base_url('home/editKaryawan/' . $karyawan->id_user); ?>" class="btn btn-info btn-sm">
                <i class="fas fa-edit"></i> Edit
            </a>
        </td>
    </tr>
<?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- End Table with bordered rows -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->