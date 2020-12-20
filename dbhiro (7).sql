-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Des 2020 pada 04.42
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbhiro`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `barang_masuk` int(11) NOT NULL,
  `foto` text NOT NULL,
  `stok` int(11) NOT NULL,
  `terjual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `harga_jual`, `tanggal`, `barang_masuk`, `foto`, `stok`, `terjual`) VALUES
('1111', 'fdsfdsd', 0, NULL, 0, '', 0, 0),
('aol', 'dsfsd', 1200, '2020-12-08', 12, 'dp shopee.jpg', 0, 0),
('Array', 'fds', 221334, '2020-12-01', 12, 'dp shopee.jpg', 12, 0),
('asass', 'wqe', 2121, '2020-12-02', 21, 'gfdfd.PNG', 21, 0),
('das', 'sada', 1200, '2020-12-17', 12, 'dsfsd.PNG', 12, 0),
('dfg', 'baju aja', 12000, '2020-12-07', 12, 'gfdg.PNG', 12, 0),
('asq', 'sadas', 12, '2020-12-04', 12, 'dp shopee.jpg', 12, 0),
('qqqq', 'adsa', 12000, '2020-12-02', 1, 'gfdfd.PNG', 1, 0),
('addd', 'sdad', 12, '2020-12-04', 3, 'gfdg.PNG', 3, 0),
('y', 'y', 12, '2020-12-03', 12, 'gfgd.PNG', 12, 0),
('s', 's', 12, '2020-12-03', 12, 'dp shopee.jpg', 12, 0),
('z', 'z', 3, '2020-12-04', 34, 'gfdfd.PNG', 34, 0),
('t', 't', 32, '2020-12-12', 12, 'gfdg.PNG', -4, 4),
('u', 'u', 12, '2020-12-02', 120, 'fsf.PNG', 117, 0),
('i', 'k', 120, '2020-12-05', 12, 'gfgd.PNG', 11, 0),
('bokj', 'tedday', 12000, '2020-12-03', 12, 'fasra.PNG', -34, 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_pembelian`
--

CREATE TABLE `item_pembelian` (
  `no` int(11) NOT NULL,
  `nomor_beli` varchar(40) NOT NULL,
  `kode_barang` varchar(15) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `item_pembelian`
--

INSERT INTO `item_pembelian` (`no`, `nomor_beli`, `kode_barang`, `qty`) VALUES
(1, 'B000020', 'bake', 3),
(2, 'B000021', 'bake', 12),
(3, 'B000022', 'bake', 88),
(4, 'B000023', 'bake', 155),
(5, 'B000024', 'bake', 162),
(6, 'B000025', 'bcv', 7),
(7, 'B000026', 'bake', 171),
(8, 'B000027', 'bcv', 15),
(9, 'B000028', 'bake', 73),
(10, 'B000029', 'bcv', 58),
(11, 'B000030', 'bake', 85),
(12, 'B000031', 'bake', 174),
(13, 'B000032', 'bcv', 114),
(14, 'B000033', 'bake', 180),
(15, 'B000034', 'bake', 184),
(16, 'P000012', 'bake', 172),
(17, 'P000012', '', 0),
(18, 'P000013', 'bake', 171),
(19, 'P000013', '', 0),
(20, 'P000013', 'baf', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_transaksi`
--

CREATE TABLE `item_transaksi` (
  `no_nota` varchar(20) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `diskon` decimal(10,0) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `item_transaksi`
--

INSERT INTO `item_transaksi` (`no_nota`, `kode_barang`, `nama_barang`, `jumlah`, `harga_jual`, `diskon`, `total`, `tanggal`) VALUES
('P000000', '', '', 0, 0, '0', 0, NULL),
('P000002', 'bake', 'baju kecil', 1, 22000, '5', 21000, '2009-10-20'),
('P000002', 'bcv', 'frfsd', 12, 2880000, '31', 2000000, '2009-10-20'),
('P000002', '', '', 0, 0, '0', 0, '2009-10-20'),
('P000003', '', '', 0, 0, '0', 0, '2009-10-20'),
('P000003', 'bcv', 'frfsd', 21, 10080000, '50', 5050000, '2009-10-20'),
('P000004', 'bake', 'baju kecil', 12, 264000, '5', 250000, '2011-10-20'),
('P000006', 'bake', 'baju kecil', 12, 264000, '5', 250000, '2011-10-20'),
('P000008', 'bake', 'baju kecil', 1, 22000, '5', 21000, '2011-10-20'),
('P000010', 'bake', 'baju kecil', 12, 264000, '5', 250000, '2011-10-20'),
('P000010', '', '', 0, 0, '0', 0, '2020-10-16'),
('P000009', '', '', 0, 0, '0', 0, '2020-10-16'),
('P000011', 'bake', 'baju kecil', 4, 88000, '8', 81000, '2020-10-16'),
('P000011', '', '', 0, 0, '0', 0, '2020-10-16'),
('P000012', 'bake', 'baju kecil', 12, 264000, '9', 240001, '2020-10-17'),
('P000012', '', '', 0, 0, '0', 0, '2020-10-17'),
('P000013', 'bake', 'baju kecil', 1, 22000, '5', 21000, '2020-10-17'),
('P000013', '', '', 0, 0, '0', 0, '2020-10-22'),
('P000013', 'baf', 'bajuuuu', 0, 1200000, '0', 0, '2020-12-06'),
('P000013', 't', 't', 1, 32, '0', 0, '2020-12-12'),
('P000014', 't', 't', 2, 32, '0', 61, '2020-12-12'),
('P000015', 't', 't', 2, 32, '5', 61, '2020-12-12'),
('P000016', 't', 't', 1, 32, '5', 30, '2020-12-12'),
('P000017', 't', 't', 3, 32, '5', 91, '2020-12-12'),
('P000018', 't', 't', 1, 32, '4', 31, '2020-12-12'),
('P000019', 't', 't', 1, 32, '3', 29, '2020-12-13'),
('P000019', '', '', 0, 0, '0', 0, '2020-12-13'),
('P000020', 't', 't', 1, 32, '3', 31, '2020-12-13'),
('P000020', 'u', 'u', 3, 12, '5', 34, '2020-12-13'),
('P000020', 'i', 'k', 1, 120, '5', 114, '2020-12-13'),
('P000021', 'bokj', 'tedday', 3, 12000, '5', 34200, '2020-12-13'),
('P000020', '', '', 0, 0, '0', 0, '2020-12-13'),
('P000021', '', '', 0, 0, '0', 0, '2020-12-13'),
('P000022', 'bokj', 'tedday', 4, 12000, '3', 46560, '2020-12-14'),
('P000023', 'bokj', 'tedday', 4, 12000, '4', 46080, '2020-12-14'),
('P000024', 'bokj', 'tedday', 4, 12000, '5', 45600, '2020-12-14'),
('P000025', 'bokj', 'tedday', 4, 12000, '5', 45600, '2020-12-14'),
('P000026', 'bokj', 'tedday', 5, 12000, '3', 58200, '2020-12-14'),
('P000027', 'bokj', 'tedday', 7, 12000, '6', 78960, '2020-12-14'),
('P000028', 'bokj', 'tedday', 6, 12000, '6', 67680, '2020-12-14'),
('P000030', 'bokj', 'tedday', 5, 12000, '12', 52272, '2020-12-14'),
('P000031', 't', 't', 4, 32, '3', 124, '2020-12-15'),
('P000031', '', '', 0, 0, '0', 0, '2020-12-15'),
('P000032', 'bokj', 'tedday', 4, 12000, '5', 45600, '2020-12-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas`
--

CREATE TABLE `kas` (
  `no` int(11) NOT NULL,
  `no_transaksi` varchar(11) NOT NULL,
  `tanggal` date NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kas`
--

INSERT INTO `kas` (`no`, `no_transaksi`, `tanggal`, `debit`, `kredit`, `keterangan`) VALUES
(1, 'Tambah', '2020-11-04', 90000, 0, ''),
(2, 'Tambah', '2020-11-04', 90000, 0, ''),
(3, 'Ambil', '2020-11-20', 0, 10000, 'beli gunting'),
(4, 'Ambil', '2020-11-20', 0, 9000, ''),
(5, 'Ambil', '2020-11-20', 0, 90000, 'setoran'),
(6, 'Ambil', '2020-11-20', 0, 90000, 'setoran'),
(7, 'P000021', '2013-12-20', 34200, 0, ''),
(8, 'P000021', '2013-12-20', 34200, 0, ''),
(9, 'P000021', '2013-12-20', 34200, 0, ''),
(10, 'P000021', '2013-12-20', 34200, 0, ''),
(11, 'P000031', '2015-12-20', 124, 0, ''),
(12, 'P000032', '2015-12-20', 45600, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode1`
--

CREATE TABLE `kode1` (
  `no` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `arti` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kode1`
--

INSERT INTO `kode1` (`no`, `kode`, `arti`) VALUES
(4, 'C', 'fsfs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode2`
--

CREATE TABLE `kode2` (
  `no` int(11) NOT NULL,
  `kode` varchar(3) NOT NULL,
  `arti` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kode2`
--

INSERT INTO `kode2` (`no`, `kode`, `arti`) VALUES
(2, 'E', 'nnnjhh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode3`
--

CREATE TABLE `kode3` (
  `no` int(11) NOT NULL,
  `kode` varchar(3) NOT NULL,
  `arti` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kode3`
--

INSERT INTO `kode3` (`no`, `kode`, `arti`) VALUES
(1, 'd', 'rytryddddd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `kode_beli` varchar(50) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `kode_supplier` varchar(4) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`kode_beli`, `kode_barang`, `kode_supplier`, `jumlah`, `harga`, `tanggal`) VALUES
('B000001', 'bake', '', 2, 0, '2020-10-14'),
('B000002', 'bake', 'dah', 10, 0, '2020-10-14'),
('B000003', 'bake', 'dah', 20, 0, '2020-10-14'),
('B000004', 'bake', 'dah', 4, 0, '2020-10-14'),
('B000005', 'bcv', '11', 10, 0, '2020-10-14'),
('B000006', 'bcv', 'dah', 100, 0, '2020-10-14'),
('B000007', 'bake', 'dah', 100, 0, '2020-10-14'),
('B000008', 'bcv', '11', 210, 0, '2020-10-14'),
('B000009', 'bake', 'dah', 200, 0, '2020-10-14'),
('B000010', 'bake', '11', 6, 0, '2020-10-14'),
('B000011', 'bake', 'dah', 6, 0, '2020-10-14'),
('B000012', 'bake', '11', 5, 0, '2020-10-14'),
('B000013', 'bake', 'dah', 7, 0, '2020-10-14'),
('B000014', 'bake', 'uiyi', 50, 0, '2020-10-14'),
('B000015', 'bake', '11', 3, 0, '2020-10-14'),
('B000016', 'bake', 'uiyi', 6, 0, '2020-10-14'),
('B000017', 'bake', 'dah', 5, 0, '2020-10-14'),
('B000018', 'bake', 'dah', 12, 240000, '2020-10-14'),
('B000019', 'bake', '', 12, 0, '2020-10-15'),
('B000020', 'bake', 'uiyi', 3, 60000, '2020-10-17'),
('B000021', 'bake', 'dah', 9, 180000, '2020-10-17'),
('B000022', 'bake', 'dah', 76, 115520000, '2020-10-17'),
('B000023', 'bake', '11', 67, 8040000, '2020-10-17'),
('B000024', 'bake', 'dah', 7, 140000, '2020-10-17'),
('B000025', 'bcv', 'dah', 7, 840000, '2020-10-17'),
('B000026', 'bake', '11', 9, 180000, '2020-10-17'),
('B000027', 'bcv', 'uiyi', 8, 960000, '2020-10-17'),
('B000028', 'bake', 'uiyi', 45, 40500000, '2020-10-17'),
('B000029', 'bcv', 'dah', 45, 21600000, '2020-10-17'),
('B000030', 'bake', '11', 12, 240000, '2020-10-17'),
('B000031', 'bake', '11', 89, 14240000, '2020-10-17'),
('B000032', 'bcv', 'dah', 56, 33600000, '2020-10-17'),
('B000033', 'bake', 'dah', 6, 120000, '2020-10-17'),
('B000034', 'bake', '11', 4, 80000, '2020-10-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `password`, `level`, `foto`) VALUES
('31', 'owner', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', 'BUJ-EO.jpg'),
('2', 'Sepra Dewita', '827ccb0eea8a706c4c34a16891f84e7b', 'Karyawan', 'dp shopee.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` varchar(30) NOT NULL,
  `nama_supplier` varchar(40) NOT NULL,
  `alamat_supplier` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `nama_supplier`, `alamat_supplier`) VALUES
('A', 'Toko1', 'tarok dipo'),
('B', 'babak', 'puhun kabun'),
('C', 'narji', 'amerika'),
('D', 'sule', 'jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_bayar`
--

CREATE TABLE `transaksi_bayar` (
  `no` int(10) NOT NULL,
  `no_nota` varchar(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_bayar`
--

INSERT INTO `transaksi_bayar` (`no`, `no_nota`, `tanggal`, `total_bayar`, `bayar`, `kembalian`) VALUES
(1, 'P000012', '2017-10-20', 25000, 30000, 5000),
(2, 'P000012', '2017-10-20', 25000, 30000, 5000),
(3, '', '2017-10-20', 21000, 300000, 50000),
(4, '', '2017-10-20', 21000, 0, 0),
(5, '', '2017-10-20', 21000, 0, 0),
(6, '', '2017-10-20', 21000, 0, 0),
(7, '', '2017-10-20', 21000, 0, 0),
(8, '', '2017-10-20', 21000, 0, 0),
(9, '', '2017-10-20', 21000, 0, 0),
(10, '', '2017-10-20', 21000, 0, 0),
(11, '', '2017-10-20', 21000, 0, 0),
(12, '', '2017-10-20', 21000, 0, 0),
(13, '', '2017-10-20', 21000, 0, 0),
(14, '', '2017-10-20', 21000, 0, 0),
(15, '', '2017-10-20', 21000, 0, 0),
(16, '', '2017-10-20', 21000, 0, 0),
(17, '', '2017-10-20', 21000, 0, 0),
(18, '', '2017-10-20', 21000, 0, 0),
(19, 'P000021', '2013-12-20', 34200, 50000, 15800),
(20, 'P000031', '2015-12-20', 124, 500, 376),
(21, 'P000032', '2015-12-20', 45600, 50000, 4400);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran`
--

CREATE TABLE `ukuran` (
  `no` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `ukuranb` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ukuran`
--

INSERT INTO `ukuran` (`no`, `kode_barang`, `ukuranb`, `jumlah`) VALUES
(3, 't', '12', 8),
(2, 't', '13', 0),
(3, 't', '4', 6),
(1, 'u', 's', 9),
(2, 'u', 'e', 2),
(3, 'u', 'r', 3),
(4, 'u', 'j', 1),
(1, 'i', 'y', 1),
(2, 'i', 'u', 12),
(1, 'bokj', '120', -4),
(2, 'bokj', '12', -18),
(3, 'bokj', 's', 12);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `item_pembelian`
--
ALTER TABLE `item_pembelian`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `kode1`
--
ALTER TABLE `kode1`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `kode2`
--
ALTER TABLE `kode2`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `kode3`
--
ALTER TABLE `kode3`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `transaksi_bayar`
--
ALTER TABLE `transaksi_bayar`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `item_pembelian`
--
ALTER TABLE `item_pembelian`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `kas`
--
ALTER TABLE `kas`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kode1`
--
ALTER TABLE `kode1`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kode2`
--
ALTER TABLE `kode2`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kode3`
--
ALTER TABLE `kode3`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi_bayar`
--
ALTER TABLE `transaksi_bayar`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
