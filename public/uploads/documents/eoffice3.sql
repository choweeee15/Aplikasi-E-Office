-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2024 at 01:04 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eoffice3`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip_surat`
--

CREATE TABLE `arsip_surat` (
  `id_arsip` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `tanggal_arsip` date NOT NULL,
  `lokasi_arsip` varchar(255) NOT NULL,
  `status` enum('aktif','kadaluarsa') DEFAULT 'aktif',
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arsip_surat`
--

INSERT INTO `arsip_surat` (`id_arsip`, `id_surat`, `jenis_surat`, `tanggal_arsip`, `lokasi_arsip`, `status`, `deskripsi`) VALUES
(2, 3235, '1', '2024-11-13', 'kantorr', 'aktif', 'Surat Keputusan');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `jenis_dokumen` enum('Dokumen Kesiswaan','Dokumen Kepegawaian','Dokumen Akademik') NOT NULL,
  `kategori` enum('Surat Keterangan','Surat Izin','Surat Tugas','Sertifikat','Laporan','Dokumen Lainnya') NOT NULL,
  `departemen` enum('Kesiswaan','Kepegawaian','Akademik') NOT NULL,
  `tanggal_dokumen` date NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `jenis_dokumen`, `kategori`, `departemen`, `tanggal_dokumen`, `file`) VALUES
(6, 'Dokumen Akademik', 'Surat Izin', 'Kesiswaan', '0002-02-22', 'uploads/documents/GLADI RESIK 10NOV_SESI 2_4.pdf'),
(7, 'Dokumen Akademik', 'Dokumen Lainnya', 'Kesiswaan', '2024-11-08', 'uploads/documents/GLADI RESIK 10NOV_SESI 2_5.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_akademik`
--

CREATE TABLE `dokumen_akademik` (
  `id_dokumen` int(11) NOT NULL,
  `nama_dokumen` varchar(255) NOT NULL,
  `kategori` enum('Surat Keterangan','Surat Izin','Surat Tugas','Sertifikat','Laporan','Dokumen Lainnya') NOT NULL,
  `tanggal_upload` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen_akademik`
--

INSERT INTO `dokumen_akademik` (`id_dokumen`, `nama_dokumen`, `kategori`, `tanggal_upload`, `status`, `deskripsi`) VALUES
(1, 'Sertifikat Akreditasi Universitas', 'Dokumen Lainnya', '2024-05-10', 'Aktif', 'Dokumen yang menunjukkan status akreditasi universitas.'),
(2, 'Laporan Penelitian Tahun 2024', 'Laporan', '2024-06-15', 'Diterima', 'Laporan hasil penelitian yang dilakukan pada tahun 2024.'),
(3, 'Proposal Program Studi Baru', 'Laporan', '2024-07-20', 'Proses', 'Proposal untuk membuka program studi baru di fakultas Teknik.'),
(4, 'Dokumen Kurikulum 2024', 'Dokumen Lainnya', '2024-08-05', 'Disetujui', 'Dokumen kurikulum untuk tahun ajaran 2024/2025.');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_kepegawaian`
--

CREATE TABLE `dokumen_kepegawaian` (
  `id_dokumen` int(11) NOT NULL,
  `nama_dokumen` varchar(255) NOT NULL,
  `kategori` enum('Surat Keterangan','Surat Izin','Surat Tugas','Sertifikat','Laporan','Dokumen Lainnya') NOT NULL,
  `tanggal_upload` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen_kepegawaian`
--

INSERT INTO `dokumen_kepegawaian` (`id_dokumen`, `nama_dokumen`, `kategori`, `tanggal_upload`, `status`, `deskripsi`) VALUES
(1, 'Kontrak Kerja 2024', 'Surat Tugas', '2024-01-15', 'Aktif', 'Dokumen kontrak kerja untuk tahun 2024.'),
(2, 'Surat Cuti Tahunan', 'Surat Izin', '2024-03-12', 'Diterima', 'Surat izin cuti tahunan untuk pegawai.'),
(3, 'Kebijakan Kesehatan', 'Laporan', '2023-11-05', 'Aktif', 'Kebijakan kesehatan dan keselamatan kerja.'),
(5, 'Panduan Prosedur', 'Dokumen Lainnya', '2023-10-30', 'Non-aktif', 'Panduan prosedur lama, sudah diperbarui.');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_kesiswaan`
--

CREATE TABLE `dokumen_kesiswaan` (
  `id_dokumen` int(11) NOT NULL,
  `nama_dokumen` varchar(255) NOT NULL,
  `kategori` enum('Surat Keterangan','Surat Izin','Surat Tugas','Sertifikat','Laporan','Dokumen Lainnya') DEFAULT NULL,
  `tanggal_upload` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen_kesiswaan`
--

INSERT INTO `dokumen_kesiswaan` (`id_dokumen`, `nama_dokumen`, `kategori`, `tanggal_upload`, `status`, `deskripsi`) VALUES
(2, 'Formulir Pendaftaran', 'Dokumen Lainnya', '2024-10-25', 'Proses', 'Formulir pendaftaran siswa baru tahun ajaran 2024'),
(3, 'Laporan Tahunan', 'Laporan', '2023-12-15', 'Disetujui', 'Laporan tahunan kegiatan siswa yang disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_keuangan`
--

CREATE TABLE `dokumen_keuangan` (
  `id_dokumen` int(11) NOT NULL,
  `nama_dokumen` varchar(255) NOT NULL,
  `kategori` enum('Surat Keterangan','Surat Izin','Surat Tugas','Sertifikat','Laporan','Dokumen Lainnya') NOT NULL,
  `tanggal_upload` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen_keuangan`
--

INSERT INTO `dokumen_keuangan` (`id_dokumen`, `nama_dokumen`, `kategori`, `tanggal_upload`, `status`, `deskripsi`) VALUES
(1, 'Dokumen Keuangan 1', 'Surat Keterangan', '2024-11-01', 'Aktif', 'Dokumen yang terkait dengan laporan keuangan tahun 2024'),
(2, 'Dokumen Keuangan 2', 'Surat Izin', '2024-11-02', 'Aktif', 'Dokumen izin pengeluaran anggaran keuangan'),
(3, 'Dokumen Keuangan 3', 'Surat Tugas', '2024-11-05', 'Tidak Aktif', 'Surat tugas terkait audit keuangan'),
(4, 'Dokumen Keuangan 4', 'Surat Keterangan', '2024-11-10', 'Aktif', 'Dokumen tambahan untuk laporan keuangan lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_umum_sekolah`
--

CREATE TABLE `dokumen_umum_sekolah` (
  `id_dokumen` int(11) NOT NULL,
  `nama_dokumen` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen_umum_sekolah`
--

INSERT INTO `dokumen_umum_sekolah` (`id_dokumen`, `nama_dokumen`, `kategori`, `tanggal_upload`, `status`, `deskripsi`) VALUES
(1, 'Regulasi Siswa Baru 2024', 'Regulasi', '2024-01-15', 'Aktif', 'Dokumen yang berisi regulasi untuk siswa baru yang diterima di sekolah.'),
(2, 'Jadwal Ujian Semester Genap 2024', 'Jadwal Ujian', '2024-04-10', 'Diterima', 'Dokumen jadwal ujian untuk semester genap tahun ajaran 2023/2024.'),
(3, 'Surat Pengumuman Kegiatan Ekstrakurikuler', 'Pengumuman', '2024-03-01', 'Disetujui', 'Pengumuman tentang kegiatan ekstrakurikuler yang akan dilaksanakan di sekolah.'),
(4, 'Panduan Pendaftaran Siswa 2024', 'Panduan', '2024-06-05', 'Proses', 'Panduan bagi orang tua untuk melakukan pendaftaran siswa baru di sekolah.');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `jabatan` enum('Admin Sistem','Manager','Pegawai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `id_user`, `nama`, `NIK`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_hp`, `jabatan`) VALUES
(1, 1, 'tepung', '1232314', 'tivban', '2024-11-28', 'laki-laki', 'kalimantan', '083521563', 'Manager'),
(2, 0, 'fdwawd', '123', 'ewq', '2024-11-04', 'perempuan', 'dadads', '0832156321', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `nama_surat` varchar(100) NOT NULL,
  `kode_surat` varchar(50) NOT NULL,
  `total_dokumen` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_surat`, `nama_surat`, `kode_surat`, `total_dokumen`) VALUES
(1, 'Surat Panggilan Orang Tua', '1', 4),
(2, 'Surat izin', '2', 11),
(3, 'Surat Pengantar', '3', 5),
(4, 'Surat Pemberitahuan', '4', 9),
(5, 'Surat Lainnya', '5', 9);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_suratkeluar` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_suratkeluar`, `id_surat`, `jumlah`, `tanggal`) VALUES
(1, 3237, 22, '2024-11-27'),
(2, 3238, 111, '2024-11-23'),
(3, 3238, 22, '0001-11-11');

--
-- Triggers `surat_keluar`
--
DELIMITER $$
CREATE TRIGGER `tbk` BEFORE INSERT ON `surat_keluar` FOR EACH ROW UPDATE surat
SET total_dokumen = total_dokumen+new.jumlah
WHERE id_surat=new.id_surat
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_suratmasuk` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_suratmasuk`, `id_surat`, `jumlah`, `tanggal`) VALUES
(1, 0, 0, '0000-00-00'),
(2, 3239, 1, '2024-11-16'),
(3, 0, 0, '0000-00-00'),
(4, 0, 0, '0000-00-00'),
(5, 3237, 22, '0001-11-11'),
(6, 0, 0, '0000-00-00');

--
-- Triggers `surat_masuk`
--
DELIMITER $$
CREATE TRIGGER `jhj` BEFORE INSERT ON `surat_masuk` FOR EACH ROW UPDATE surat
SET total_dokumen = total_dokumen+new.jumlah
WHERE id_surat=new.id_surat
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tbm` AFTER DELETE ON `surat_masuk` FOR EACH ROW UPDATE surat
SET total_dokumen = total_dokumen-old.jumlah
WHERE id_surat=old.id_surat
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` enum('1','2','3','4','5') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(3, 'chichi@gmail', '123', '3'),
(4, 'chelsica@gmail', '123', '4'),
(5, 'evan@gmail', '123', '5'),
(6, 'sim@gmail', '123', '2'),
(3266, 'chloe@gmail', '123', '1'),
(3267, '1', '1', '1'),
(3268, 'ad12131', '2123', '1'),
(3269, 'eqeqeqeqeq', '123', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip_surat`
--
ALTER TABLE `arsip_surat`
  ADD PRIMARY KEY (`id_arsip`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `dokumen_akademik`
--
ALTER TABLE `dokumen_akademik`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `dokumen_kepegawaian`
--
ALTER TABLE `dokumen_kepegawaian`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `dokumen_kesiswaan`
--
ALTER TABLE `dokumen_kesiswaan`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `dokumen_keuangan`
--
ALTER TABLE `dokumen_keuangan`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `dokumen_umum_sekolah`
--
ALTER TABLE `dokumen_umum_sekolah`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_suratkeluar`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_suratmasuk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arsip_surat`
--
ALTER TABLE `arsip_surat`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dokumen_akademik`
--
ALTER TABLE `dokumen_akademik`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dokumen_kepegawaian`
--
ALTER TABLE `dokumen_kepegawaian`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dokumen_kesiswaan`
--
ALTER TABLE `dokumen_kesiswaan`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dokumen_keuangan`
--
ALTER TABLE `dokumen_keuangan`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dokumen_umum_sekolah`
--
ALTER TABLE `dokumen_umum_sekolah`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_suratkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_suratmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
