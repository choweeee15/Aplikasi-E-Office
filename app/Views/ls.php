<main id="main" class="main">

    <div class="pagetitle">
        <h1>Lampiran Tabel Surat Office</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Laporan</li>
                <li class="breadcrumb-item active">Surat</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <!-- Laporan Print Surat -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Print Surat</h5>
                        <form action="<?= base_url('home/laps'); ?>" method="post">
                            <div class="form-group">
                                <label for="tanggalawal">Tanggal Awal:</label>
                                <input type="date" name="tanggalawal" class="form-control" id="tanggalawal">
                            </div>
                            <div class="form-group">
                                <label for="tanggalakhir">Tanggal Akhir:</label>
                                <input type="date" name="tanggalakhir" class="form-control" id="tanggalakhir">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" style="width: 100px;">
                                    <i class="fas fa-print"></i> PRINT
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Laporan TCPDF Surat -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laporan TCPDF Surat</h5>
                        <form action="<?= base_url('home/pdfs'); ?>" method="post" target="_blank">
                            <div class="form-group" style="margin-top: 20px;">
                                <label for="tanggalawal">Tanggal Awal:</label>
                                <input type="date" name="tanggalawal" class="form-control" id="tanggalawal">
                            </div>
                            <div class="form-group">
                                <label for="tanggalakhir">Tanggal Akhir:</label>
                                <input type="date" name="tanggalakhir" class="form-control" id="tanggalakhir">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger" style="width: 100px;">
                                    <i class="fas fa-pdf"></i> TCPDF
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Laporan DOMPDF Surat -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laporan DOMPDF Surat</h5>
                        <form action="<?= base_url('home/dompdf'); ?>" method="post" target="_blank">
                            <div class="form-group" style="margin-top: 20px;">
                                <label for="tanggalawal">Tanggal Awal:</label>
                                <input type="date" name="tanggalawal" class="form-control" id="tanggalawal">
                            </div>
                            <div class="form-group">
                                <label for="tanggalakhir">Tanggal Akhir:</label>
                                <input type="date" name="tanggalakhir" class="form-control" id="tanggalakhir">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger" style="width: 100px;">
                                    <i class="fas fa-print"></i> DOMPDF
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Laporan Excel Surat -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Excel Surat</h5>
                        <form action="<?= base_url('home/excels'); ?>" method="post">
                            <div class="form-group" style="margin-top: 20px;">
                                <label for="tanggalawal">Tanggal Awal:</label>
                                <input type="date" name="tanggalawal" class="form-control" id="tanggalawal">
                            </div>
                            <div class="form-group">
                                <label for="tanggalakhir">Tanggal Akhir:</label>
                                <input type="date" name="tanggalakhir" class="form-control" id="tanggalakhir">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success" style="width: 100px;">
                                    <i class="fas fa-file-excel"></i> Excel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->




<!-- <h2>Laporan Print Surat</h2>
<form action="<?= base_url('home/lapb'); ?>" method="post">
    <div class="form-group">
        <label for="nama">Tanggal Awal:</label>
        <input type="date" name="tanggalawal" class="form-control">
    </div>
    <div class="form-group">
        <label for="NIK">Tanggal Akhir:</label>
        <input type="date" name="tanggalakhir" class="form-control">
    </div>
    <div class="col d-flex align-items-end" class="form-control">
      <button type="print" class="btn btn-primary" style="width: 100px;">
        <i class="fas fa-print"></i>
        Print
      </button>
    </div>
  </form>

<h2>Laporan TCPDF Surat</h2>
<form action="<?= base_url('home/pdfb'); ?>" method="post" target="_blank">
    <div class="form-group" style="margin-top: 20px;">
        <label for="nama">Tanggal Awal:</label>
        <input type="date" name="tanggalawal" class="form-control">
    </div>
    <div class="form-group">
        <label for="NIK">Tanggal Akhir:</label>
        <input type="date" name="tanggalakhir" class="form-control">
    </div>
    <div class="col d-flex align-items-end" class="form-control">
      <button type="submit" class="btn btn-danger" style="width: 100px;">
        <i class="fas fa-pdf"></i>
        TCPDF
      </button>
    </div>
  </form>

<h2>Laporan DOMPDF Surat</h2>
<form action="<?= base_url('home/dompdfb'); ?>" method="post" target="_blank">
    <div class="form-group" style="margin-top: 20px;">
        <label for="nama">Tanggal Awal:</label>
        <input type="date" name="tanggalawal" class="form-control">
    </div>
    <div class="form-group">
        <label for="NIK">Tanggal Akhir:</label>
        <input type="date" name="tanggalakhir" class="form-control">
    </div>
    <div class="col d-flex align-items-end" class="form-control">
      <button type="print" class="btn btn-danger" style="width: 100px;">
        <i class="fas fa-print"></i>
        DOMPDF
      </button>
    </div>
  </form>

<h2>Laporan Excel Surat</h2>
<form action="<?= base_url('home/excelb'); ?>" method="post">
    <div class="form-group" style="margin-top: 20px;">
        <label for="nama">Tanggal Awal:</label>
        <input type="date" name="tanggalawal" class="form-control">
    </div>
    <div class="form-group">
        <label for="NIK">Tanggal Akhir:</label>
        <input type="date" name="tanggalakhir" class="form-control">
    </div>
    <div class="col d-flex align-items-end" class="form-control">
      <button type="print" class="btn btn-success" style="width: 100px;">
        <i class="fas fa-print"></i>
        Excel
      </button>
    </div>
  </form>
 -->