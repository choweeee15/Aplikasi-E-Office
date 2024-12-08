<main id="main" class="main" style="min-height: 100vh; display: flex; flex-direction: column; align-items: center; justify-content: center;">
    <div class="pagetitle text-center" style="color: white; margin-bottom: 20px;">
    <h1 style="font-size: 2.5rem;">Dashboard Overview</h1>
    <nav>
        <ol class="breadcrumb justify-content-center" style="background: rgba(255, 255, 255, 0.8); border-radius: 5px; padding: 10px; font-size: 1.2rem;">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->


    <section class="section" style="width: 100%; max-width: 1200px;">
        <div class="row justify-content-center">
            <!-- Surat Masuk Card -->
            <div class="col-md-4 mb-3">
                <div class="card text-white bg-primary text-center" style="border-radius: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">Surat Masuk</h5>
                        <p class="card-text"><?= $suratMasukCount ?> Surat Masuk</p>
                        <!-- Button to view Surat Masuk -->
                        <a href="<?= base_url('home/suratmasuk') ?>" class="btn btn-light btn-sm">Lihat Surat Masuk</a>
                    </div>
                </div>
            </div>

            <!-- Surat Keluar Card -->
            <div class="col-md-4 mb-3">
                <div class="card text-white bg-warning text-center" style="border-radius: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">Surat Keluar</h5>
                        <p class="card-text"><?= $suratKeluarCount ?> Surat Keluar</p>
                        <!-- Button to view Surat Keluar -->
                        <a href="<?= base_url('home/suratkeluar') ?>" class="btn btn-light btn-sm">Lihat Surat Keluar</a>
                    </div>
                </div>
            </div>

            <!-- Cuti Card -->
            <div class="col-md-4 mb-3">
                <div class="card text-white bg-success text-center" style="border-radius: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">Cuti</h5>
                        <p class="card-text"><?= $cutiCount ?> Pengajuan Cuti</p>
                        <!-- Button to view Cuti -->
                        <a href="<?= base_url('home/cuti') ?>" class="btn btn-light btn-sm">Lihat Pengajuan Cuti</a>
                    </div>
                </div>
            </div>
        </div><!-- End Row -->
    </section>
</main><!-- End #main -->
