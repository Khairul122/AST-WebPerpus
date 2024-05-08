-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Mei 2022 pada 12.35
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(100) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `level`, `nama_lengkap`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'perpus', 'perpus', 'perpus', 'Adm. Perpus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nis` varchar(25) NOT NULL,
  `nm_anggota` varchar(50) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tglreg` date NOT NULL DEFAULT '0000-00-00',
  `username` varchar(100) NOT NULL,
  `password` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id_anggota`, `nis`, `nm_anggota`, `kelas`, `alamat`, `jenis_kelamin`, `tgl_lahir`, `tglreg`, `username`, `password`) VALUES
(21, '1310001', 'Novariyolla Putri', 'XII Seni Teater', 'Cangkeh Nan XX, Kec. Lubuk Begalung, Kota Padang', 'laki-laki', '2001-06-22', '2022-05-23', 'putri', 12345),
(22, '13416121', 'Fadilla Arahma', 'XII Seni Tari Minang', 'Penggambiran, Kec. Lubuku Begalung, Kota Padang', 'perempuan', '2000-07-04', '2022-05-23', 'dilla', 12345),
(23, '1345322', 'Fitri Indah Mayang Sari', 'XI Seni Tari Minang', 'Kp. Jua Nan XX, Kec. Lubuk Begalung, Kota Padang', 'perempuan', '2003-07-06', '2022-05-23', 'fitri', 12345),
(24, '1346211', 'Jhery Prasetya', 'XI Seni Teater', 'Kp. Jua Nan XX, Kec. Lubuk Begalung, Kota Padang', 'laki-laki', '2003-07-02', '2022-05-23', 'jeri', 12345),
(25, '1362511', 'Afifah Ayunda', 'XI Kecantikan Rambut', 'Penggambiran, Kec. Lubuku Begalung, Kota Padang', 'perempuan', '2003-07-01', '2022-05-23', 'afifah', 12345),
(26, '131051411', 'Yessi Alfiani', 'XI Seni Teater', 'Jln. Kp Jua Nan XX, Kec. Lubuk Begalung, Kota Pada', 'perempuan', '2005-03-08', '2022-05-23', 'yessi', 1234);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `kd_buku` varchar(20) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `judul_buku` varchar(90) NOT NULL,
  `nomor_rak` int(11) NOT NULL,
  `nm_pengarang` varchar(50) NOT NULL,
  `nm_penerbit` varchar(50) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `stok` int(5) NOT NULL,
  `gambar` text NOT NULL,
  `tglinput` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`kd_buku`, `id_kategori`, `kelas`, `judul_buku`, `nomor_rak`, `nm_pengarang`, `nm_penerbit`, `tahun_terbit`, `stok`, `gambar`, `tglinput`) VALUES
('KB0001', 14, 'XII', 'Bahasa Inggris', 2, 'Pengarang UTAMI WIDIATI, DKK', 'Penerbit Kemdikbud RI ', 2017, 43, 'bahasa inggirs.jpg', '2021-07-23 04:06:59'),
('KB0002', 14, 'X', 'Bahasa Inggris', 2, 'UTAMI WIDIATI, DKK', 'Kemdikbud RI', 2017, 32, '12.jpg', '2021-07-23 04:08:43'),
('KB0003', 12, 'X', ' Buku Siswa - PPKn Kelas X', 1, 'UTAMI WIDIATI, DKK', 'Depdiknas', 2017, 100, 'PPKN.jpg', '2021-07-23 04:11:00'),
('KB0004', 13, 'X', 'Bahasa Indonesia', 3, 'UTAMI WIDIATI, DKK', 'Kementerian Pendidikan dan Kebudayaan Republik Ind', 2017, 100, 'bi.jpg', '2021-07-23 04:14:23'),
('KB0005', 11, 'X', 'Buku Siswa Kelas 10 Pendidikan Agama Islam', 4, 'Nelty Khairiyah dan Endi Suhendi Zen.', 'usat Kurikulum dan Perbukuan, Balitbang, Kemendikb', 2017, 98, 'PAI.jpg', '2021-07-23 04:16:40'),
('KB0006', 16, '-', 'ANAK RANTAU A FUADI', 5, 'A. FUADI', 'FALCON PUBLISHING', 2017, 19, 'AA.jpg', '2021-07-23 04:18:26'),
('KB0007', 16, '-', 'Buku Novel kita pernah salah', 5, '@fuadbakh & @ariashinta ', 'wahyuqalbu', 2018, 100, 'XX.jpg', '2021-07-23 04:19:45'),
('KB0008', 16, '-', 'Dikta dan Hukum', 5, 'Dhian Farah', 'Loveable', 2018, 29, 'zz.jpg', '2021-07-23 04:27:55'),
('KB0009', 16, '-', 'Pelangi Indah', 3, 'Jajang ', 'Istana Cinta', 2021, 20, 'DATA.JPG', '2021-07-29 10:25:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nm_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nm_kategori`) VALUES
(11, 'Pendidikan Agama Islam'),
(12, 'PPKN'),
(13, 'Bahasa Indonesia'),
(14, 'Bahasa Inggris'),
(15, 'Cerpen'),
(16, 'Novel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `kd_sewa` varchar(100) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Tunggu Konfirmasi dari Admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`kd_sewa`, `id_anggota`, `jumlah`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
('P-20220523113920', 26, 2, '2022-05-23', '2022-05-26', 'DI KEMBALIKAN'),
('P-20220523113954', 24, 1, '2022-05-23', '2022-05-26', 'Di Pinjam'),
('P-20220523114027', 25, 1, '2022-05-23', '2022-05-26', 'Di Pinjam'),
('P-20220523121553', 22, 1, '2022-05-23', '2022-05-26', 'DI KEMBALIKAN'),
('P-20220523122441', 22, 2, '2022-05-23', '2022-05-26', 'Di Pinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengembalian`
--

CREATE TABLE `tbl_pengembalian` (
  `kd_pengembalian` varchar(100) NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `kd_sewa` varchar(100) NOT NULL,
  `jml_item` int(11) NOT NULL,
  `telat` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengembalian`
--

INSERT INTO `tbl_pengembalian` (`kd_pengembalian`, `tanggal_kembali`, `id_anggota`, `kd_sewa`, `jml_item`, `telat`, `denda`, `status`) VALUES
('F-20220523121754', '2022-05-23', 26, 'P-20220523113920', 2, 0, 0, 'DI KEMBALIKAN'),
('F-20220523121800', '2022-05-23', 22, 'P-20220523121553', 1, 0, 0, 'DI KEMBALIKAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengembalian_detail`
--

CREATE TABLE `tbl_pengembalian_detail` (
  `kd_pengembalian` varchar(100) NOT NULL,
  `kd_sewa` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `kd_buku` varchar(20) NOT NULL,
  `jumlah_kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengembalian_detail`
--

INSERT INTO `tbl_pengembalian_detail` (`kd_pengembalian`, `kd_sewa`, `tanggal`, `kd_buku`, `jumlah_kembali`) VALUES
('F-20220523121754', 'P-20220523113920', '2022-05-23', 'KB0005', 1),
('F-20220523121754', 'P-20220523113920', '2022-05-23', 'KB0002', 1),
('F-20220523121800', 'P-20220523121553', '2022-05-23', 'KB0007', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pinjam_detail`
--

CREATE TABLE `tbl_pinjam_detail` (
  `kd_sewa` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `kd_buku` varchar(100) NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pinjam_detail`
--

INSERT INTO `tbl_pinjam_detail` (`kd_sewa`, `tanggal`, `kd_buku`, `jumlah_pinjam`) VALUES
('P-20220523113920', '2022-05-23', 'KB0005', 1),
('P-20220523113920', '2022-05-23', 'KB0002', 1),
('P-20220523113954', '2022-05-23', 'KB0005', 1),
('P-20220523114027', '2022-05-23', 'KB0002', 1),
('P-20220523121553', '2022-05-23', 'KB0007', 1),
('P-20220523122441', '2022-05-23', 'KB0002', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pinjam_tmp`
--

CREATE TABLE `tbl_pinjam_tmp` (
  `id_pinjam` int(11) NOT NULL,
  `kd_buku` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`kd_buku`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`kd_sewa`);

--
-- Indexes for table `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  ADD PRIMARY KEY (`kd_pengembalian`);

--
-- Indexes for table `tbl_pinjam_tmp`
--
ALTER TABLE `tbl_pinjam_tmp`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_pinjam_tmp`
--
ALTER TABLE `tbl_pinjam_tmp`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
