<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" href="dashboard">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="cuti">
        <i class="bi bi-book"></i>
        <span>Pengajuan Cuti</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <?php if (session()->get('level') == 1 || session()->get('level') == 2) { ?>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-server"></i><span>Manajemen Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="dokumen">
              <i class="bi bi-circle"></i><span>Dokumen</span>
            </a>
          </li>
          <li>
            <a href="surat">
              <i class="bi bi-circle"></i><span>Surat</span>
            </a>
          </li>
          <li>
            <a href="karyawan">
              <i class="bi bi-circle"></i><span>Pegawai</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
    <?php } ?>

    <?php if (session()->get('level') == 1 || session()->get('level') == 2) { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bxs-folder-open"></i><span>Berkas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="berkas">
              <i class="bi bi-circle"></i><span>Dokumen-dokumen</span>
            </a>
          </li>
          <li>
            <a href="surat">
              <i class="bi bi-circle"></i><span>Pemasukan Surat</span>
            </a>
          </li>
        </ul>
      </li>
    <?php } ?>



    <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3) { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bxs-file"></i><span>Laporan Surat</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="lsm">
              <i class="bi bi-circle"></i><span>Laporan Surat Masuk Office</span>
            </a>
          </li>
          <li>
            <a href="lsk">
              <i class="bi bi-circle"></i><span>Laporan Surat Keluar Office</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
    <?php } ?>

    <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bxs-collection"></i><span>Penerimaan Surat</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="suratmasuk">
              <i class="bi bi-circle"></i><span>Surat Masuk Office</span>
            </a>
          </li>
          <li>
            <a href="suratkeluar" class="active">
              <i class="bi bi-circle"></i><span>Surat Keluar Office</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
    <?php } ?>

    <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3 || session()->get('level') == 4) { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bx-briefcase-alt-2"></i><span>Arsip Dokumen</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="arsipSurat">
              <i class="bi bi-circle"></i><span>Arsip Surat</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
    <?php } ?>

    <li class="nav-heading">Halaman</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="logout">
        <i class="bi bi-door-open-fill"></i>
        <span>Logout</span>
      </a>
    </li><!-- End Blank Page Nav -->

  </ul>

</aside><!-- End Sidebar-->




<!-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      
      
      <?php if (session()->get('level') == 1) { ?>
      </li>
      <li class="nav-item">
      <li class="nav-item">
          <a class="nav-link" href="dashboard">
            <i class="fas fa-house-user"></i>
          Home</a>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
          <i class="fas fa-project-diagram"></i>
          Data Master</a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="barang">Barang</a></li>
              <li><a class="dropdown-item" href="karyawan">Karyawan</a></li>
              <li><a class="dropdown-item" href="reset">Reset Password</a></li>
          </ul>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
          <i class="fas fa-scroll"></i>
          Laporan</a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="lbm">Barang Masuk</a></li>
              <li><a class="dropdown-item" href="lbk">Barang Keluar</a></li>
              <li><a class="dropdown-item" href="lbr">Barang Rusak</a></li>
              <li><a class="dropdown-item" href="lb">Barang</a></li>
          </ul>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <i class="fas fa-wallet"></i>
          Transaksi</a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="barangmasuk">Barang Masuk</a></li>
              <li><a class="dropdown-item" href="barangkeluar">Barang Keluar</a></li>
          </ul>
      </li> 
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <i class="fas fa-table"></i>
          Penerimaan</a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="barangmasuk">Barang Masuk</a></li>
              <li><a class="dropdown-item" href="barangrusak">Barang Rusak</a></li>
          </ul>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="barangkeluar">
            <i class="fas fa-truck"></i>
          Barang Keluar</a>
      </li>
      <li class="nav-item">
      <li class="nav-item">
          <a class="nav-link" href="logout">Logout</a>
      </li>
      <?php } ?>

      
      <?php if (session()->get('level') == 2) { ?>
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Laporan</a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="lbm">Barang Masuk</a></li>
              <li><a class="dropdown-item" href="lbk">Barang Keluar</a></li>
              <li><a class="dropdown-item" href="lb">Barang</a></li>
          </ul>
      <li class="nav-item">
          <a class="nav-link" href="logout">Logout</a>
      </li>
      <?php } ?>

      
      <?php if (session()->get('level') == 3) { ?>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Transaksi</a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="barangmasuk">Barang Masuk</a></li>
              <li><a class="dropdown-item" href="barangkeluar">Barang Keluar</a></li>
          </ul>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="logout">Logout</a>
      </li>
      <?php } ?>

      
      <?php if (session()->get('level') == 4) { ?>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Penerimaan</a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="barangmasuk">Barang Masuk</a></li>
              <li><a class="dropdown-item" href="barangrusak">Barang Rusak</a></li>
          </ul>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="logout">Logout</a>
      </li>
      <?php } ?>

      
      <?php if (session()->get('level') == 5) { ?>
      <li class="nav-item">
          <a class="nav-link" href="barangkeluar">Barang Keluar</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="logout">Logout</a>
      </li>
      <?php } ?>

    </ul>
  </div>
</nav>
 -->