<main id="main" class="main">

    <div class="pagetitle">
        <h1>Lampiran Tabel Surat Keluar Office</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Laporan</li>
                <li class="breadcrumb-item active">Surat Keluar</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <!-- Laporan Print Surat Keluar -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Print Surat Keluar</h5>
                        <form action="<?= base_url('home/lapsk'); ?>" method="post">
                            <div class="row mb-3">
                                <label for="tanggalawal" class="col-sm-4 col-form-label">Tanggal Awal:</label>
                                <div class="col-sm-8">
                                    <input type="date" name="tanggalawal" class="form-control" id="tanggalawal">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tanggalakhir" class="col-sm-4 col-form-label">Tanggal Akhir:</label>
                                <div class="col-sm-8">
                                    <input type="date" name="tanggalakhir" class="form-control" id="tanggalakhir">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" style="width: 100px;">
                                    <i class="fas fa-print"></i> PRINT
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Laporan TCPDF Surat Keluar -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laporan TCPDF Surat Keluar</h5>
                        <form action="<?= base_url('home/pdfsk'); ?>" method="post" target="_blank">
                            <div class="row mb-3">
                                <label for="tanggalawal" class="col-sm-4 col-form-label">Tanggal Awal:</label>
                                <div class="col-sm-8">
                                    <input type="date" name="tanggalawal" class="form-control" id="tanggalawal">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tanggalakhir" class="col-sm-4 col-form-label">Tanggal Akhir:</label>
                                <div class="col-sm-8">
                                    <input type="date" name="tanggalakhir" class="form-control" id="tanggalakhir">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger" style="width: 100px;">
                                    <i class="fas fa-file-pdf"></i> TCPDF
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Laporan DOMPDF Surat Keluar -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laporan DOMPDF Surat Keluar</h5>
                        <form action="<?= base_url('home/dompdfsk'); ?>" method="post" target="_blank">
                            <div class="row mb-3">
                                <label for="tanggalawal" class="col-sm-4 col-form-label">Tanggal Awal:</label>
                                <div class="col-sm-8">
                                    <input type="date" name="tanggalawal" class="form-control" id="tanggalawal">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tanggalakhir" class="col-sm-4 col-form-label">Tanggal Akhir:</label>
                                <div class="col-sm-8">
                                    <input type="date" name="tanggalakhir" class="form-control" id="tanggalakhir">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger" style="width: 100px;">
                                    <i class="fas fa-print"></i> DOMPDF
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Laporan Excel Surat Keluar -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Excel Surat Keluar</h5>
                        <form action="<?= base_url('home/excelsk'); ?>" method="post">
                            <div class="row mb-3">
                                <label for="tanggalawal" class="col-sm-4 col-form-label">Tanggal Awal:</label>
                                <div class="col-sm-8">
                                    <input type="date" name="tanggalawal" class="form-control" id="tanggalawal">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tanggalakhir" class="col-sm-4 col-form-label">Tanggal Akhir:</label>
                                <div class="col-sm-8">
                                    <input type="date" name="tanggalakhir" class="form-control" id="tanggalakhir">
                                </div>
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




<!-- <h2>Laporan Print Barang Keluar</h2>
<form action="<?= base_url('home/lapbk'); ?>" method="post">
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

<h2>Laporan TCPDF Barang Keluar</h2>
<form action="<?= base_url('home/pdfbk'); ?>" method="post" target="_blank">
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
        TCPDF
      </button>
    </div>
  </form>

<h2>Laporan DOMPDF Barang Keluar</h2>
<form action="<?= base_url('home/dompdfbk'); ?>" method="post" target="_blank">
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

<h2>Laporan Excel Barang Keluar</h2>
<form action="<?= base_url('home/excelbk'); ?>" method="post">
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



<h2>Laporan Print Barang Keluar</h2>
<form action="<?= base_url('home/lapbk'); ?>" method="post">
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

<h2>Laporan TCPDF Barang Keluar</h2>
<form action="<?= base_url('home/pdfbk'); ?>" method="post" target="_blank">
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
        TCPDF
      </button>
    </div>
  </form>

<h2>Laporan DOMPDF Barang Keluar</h2>
<form action="<?= base_url('home/dompdfbk'); ?>" method="post" target="_blank">
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

<h2>Laporan Excel Barang Keluar</h2>
<form action="<?= base_url('home/excelbk'); ?>" method="post">
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
  </form> -->