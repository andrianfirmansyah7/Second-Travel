-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Apr 2018 pada 00.42
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_pemillik` varchar(60) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `nama_pemillik`, `level`) VALUES
(1, 'admin', 'admin', 'Admin', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bandara`
--

CREATE TABLE `bandara` (
  `id_bandara` int(11) NOT NULL,
  `kode_bandara` varchar(5) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `nama_bandara` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bandara`
--

INSERT INTO `bandara` (`id_bandara`, `kode_bandara`, `kota`, `nama_bandara`) VALUES
(1, 'CGK', 'Jakarta', 'Soekarno - Hatta'),
(2, 'BDO', 'Bandung', 'Husein Sastranegara'),
(3, 'JOG', 'Yogyakarta', 'Adi Sutjipto'),
(4, 'SUB', 'Surabaya', 'Juanda'),
(5, 'DPS', 'Denpasar', 'Ngurah Rai'),
(6, 'KOE', 'Kupang', 'El Tari'),
(7, 'KNO', 'Medan', 'Kualanamu'),
(8, 'PLM', 'Palembang', 'Sultan Mahmud Badaruddin II'),
(9, 'TXE', 'Takengon', 'Takengon Rembele'),
(10, 'BPN', 'Balikpapan', 'Sepinggan'),
(11, 'DJJ', 'Jayapura', 'Sentani'),
(12, 'UPG', 'Makassar', 'Hasanuddin'),
(13, 'PDG', 'Padang', 'Minangkabau'),
(14, 'PKU', 'Pekanbaru', 'Sultan Syarif Kasim II'),
(15, 'TKG', 'Bandar Lampung', 'Raden Inten II'),
(16, 'HLP', 'Jakarta', 'Halim Perdanakusuma'),
(17, 'SOC', 'Solo', 'Adisumarmo'),
(18, 'SRG', 'Semarang', 'Ahmad Yani'),
(19, 'PNK', 'Pontianak', 'Supardio'),
(20, 'MDC', 'Manado', 'Sam Ratulangi'),
(21, 'AMQ', 'Ambon', 'Pattimura');

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking_pesawat`
--

CREATE TABLE `booking_pesawat` (
  `id_booking` varchar(15) NOT NULL,
  `costumer` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tanggal_booking` date NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `booking_pesawat`
--

INSERT INTO `booking_pesawat` (`id_booking`, `costumer`, `email`, `tanggal_booking`, `total_biaya`, `status`) VALUES
('B201804110001', 'Killer', 'sgg@khk.cc', '2018-04-20', 300000, 'Belum Dibayar'),
('B201804110002', 'Killer', 'sgg@khk.cc', '2018-04-20', 300000, 'Belum Dibayar'),
('B201804110003', 'Killer', 'sgg@khk.cc', '2018-04-20', 300000, 'Belum Dibayar'),
('B201804110004', 'H. Mi Mashite', 'kaka@kiki.co', '2018-04-20', 285000, 'Belum Dibayar'),
('B201804110005', 'Fajar Fauzan Rizki Alfian Mahe', 'gaga@gmail.com', '2018-04-14', 600000, 'Belum Dibayar'),
('B201804110006', 'jjj', 'jajajajaj@gmail.com', '2018-04-13', 750000, 'Belum Dibayar'),
('B201804110007', 'df', 'fidelia@gmail.com', '2018-04-13', 300000, 'Belum Dibayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `costumer_pesawat`
--

CREATE TABLE `costumer_pesawat` (
  `id` int(11) NOT NULL,
  `no_tiket` varchar(20) NOT NULL,
  `nama_costumer` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `no_penerbangan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `costumer_pesawat`
--

INSERT INTO `costumer_pesawat` (`id`, `no_tiket`, `nama_costumer`, `jk`, `no_penerbangan`) VALUES
(1, '201804110001', 'kl', 'MR', ''),
(2, '201804110002', 'll', 'MRS', ''),
(3, 'GA201804110003', 'H. Mi Mashite', 'MR', 'GA-125'),
(4, 'QZ201804111001', 'Fajar Fauzan Rizki Alfian Mahesa Putra Palermo', 'MR', 'QZ-403'),
(5, 'QZ201804111101', 'Shavira Triani Saptarini', 'MRS', 'QZ-403'),
(6, 'QZ201804111111', 'jjj', 'Miss', 'QZ-520'),
(7, 'QZ201804111112', 'jjj', 'MR', 'QZ-520'),
(8, 'QZ201804111112', 'jjj', 'MR', 'QZ-520'),
(9, '201804111112', 'gjk', 'Miss', ''),
(10, '201804111112', 'gh', 'MR', ''),
(11, '201804111112', 'k', 'MRS', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_kereta`
--

CREATE TABLE `harga_kereta` (
  `id_harga` int(11) NOT NULL,
  `kereta` varchar(5) NOT NULL,
  `harga_ekse` int(11) NOT NULL,
  `harga_eko` int(11) NOT NULL,
  `harga_bis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_pesawat`
--

CREATE TABLE `harga_pesawat` (
  `id_harga` int(11) NOT NULL,
  `no_penerbangan` varchar(10) NOT NULL,
  `harga_bis` int(11) NOT NULL,
  `harga_eko` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `harga_pesawat`
--

INSERT INTO `harga_pesawat` (`id_harga`, `no_penerbangan`, `harga_bis`, `harga_eko`) VALUES
(1, 'GA-125', 400000, 285000),
(2, 'QZ-520', 380000, 300000),
(3, 'QZ-403', 400000, 300000),
(4, 'QZ-255', 300000, 250000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_kereta`
--

CREATE TABLE `jadwal_kereta` (
  `id` int(11) NOT NULL,
  `stasiun_awal` varchar(3) NOT NULL,
  `stasiun_tujuan` varchar(3) NOT NULL,
  `waktu_berangkat` datetime NOT NULL,
  `waktu_tiba` datetime NOT NULL,
  `no_kereta` varchar(10) NOT NULL,
  `id_kereta` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pesawat`
--

CREATE TABLE `jadwal_pesawat` (
  `id_penerbangan` int(11) NOT NULL,
  `nomer_penerbangan` varchar(15) NOT NULL,
  `dari` int(11) NOT NULL,
  `menuju` int(11) NOT NULL,
  `waktu_berangkat` time NOT NULL,
  `waktu_tiba` time NOT NULL,
  `maskapai` varchar(5) NOT NULL,
  `pesawat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_pesawat`
--

INSERT INTO `jadwal_pesawat` (`id_penerbangan`, `nomer_penerbangan`, `dari`, `menuju`, `waktu_berangkat`, `waktu_tiba`, `maskapai`, `pesawat`) VALUES
(1, 'GA-125', 7, 13, '14:00:00', '18:00:00', '2', 1),
(2, 'QZ-403', 1, 5, '08:00:00', '12:00:00', '1', 4),
(3, 'QZ-520', 7, 13, '07:30:00', '11:30:00', '1', 2),
(6, 'QZ-255', 0, 0, '14:00:00', '22:00:00', 'QZ', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kereta`
--

CREATE TABLE `kereta` (
  `id_kereta` int(11) NOT NULL,
  `nama_kereta` varchar(30) NOT NULL,
  `jumlah_ekse` int(11) NOT NULL,
  `jumlah_eko` int(11) NOT NULL,
  `jumlah_bis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kereta`
--

INSERT INTO `kereta` (`id_kereta`, `nama_kereta`, `jumlah_ekse`, `jumlah_eko`, `jumlah_bis`) VALUES
(1, 'Argo Bromo Anggrek', 30, 20, 10),
(2, 'Argo Wilis', 20, 50, 30),
(3, 'Argo Lawu', 20, 40, 10),
(4, 'Argo Dwipangga', 15, 35, 20),
(5, 'Argo Parahyangan', 30, 50, 20),
(6, 'Gajayana', 35, 55, 20),
(7, 'Sebrani', 25, 45, 15),
(8, 'Turangga', 15, 25, 15),
(9, 'Taksaka', 15, 25, 15),
(10, 'Bangunkarta', 15, 25, 15),
(11, 'Lodaya', 15, 45, 25),
(12, 'Ciremai Express', 20, 40, 15),
(13, 'Malabar', 30, 50, 20),
(14, 'Malioboro Express', 30, 40, 20),
(15, 'Mutiara Selatan', 30, 50, 20),
(16, 'Gumarang', 25, 55, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `maskapai`
--

CREATE TABLE `maskapai` (
  `id_maskapai` int(11) NOT NULL,
  `kode_maskapai` varchar(5) NOT NULL,
  `nama_maskapai` varchar(50) NOT NULL,
  `foto_maskapai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `maskapai`
--

INSERT INTO `maskapai` (`id_maskapai`, `kode_maskapai`, `nama_maskapai`, `foto_maskapai`) VALUES
(1, 'QZ', 'AirAsia', 'airasia.png'),
(2, 'GA', 'Garuda Indonesia', 'garuda.png'),
(3, 'QG', 'Citilink', 'citi.png'),
(4, 'JT', 'Lion Air', 'lion.ng'),
(5, 'ID', 'Batik Air', 'batik.png'),
(6, 'IW', 'Wings Air', 'wings.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penumpang`
--

CREATE TABLE `penumpang` (
  `id_penumpang` int(11) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(25) NOT NULL,
  `no_pengenal` varchar(20) NOT NULL,
  `titel` varchar(5) NOT NULL,
  `warganegara` varchar(20) NOT NULL,
  `tipe` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesawat`
--

CREATE TABLE `pesawat` (
  `id_pesawat` int(11) NOT NULL,
  `nama_pesawat` varchar(30) NOT NULL,
  `jumlah_bis` int(11) NOT NULL,
  `jumlah_eko` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesawat`
--

INSERT INTO `pesawat` (`id_pesawat`, `nama_pesawat`, `jumlah_bis`, `jumlah_eko`) VALUES
(1, 'Boeing 737-300', 40, 84),
(2, 'Airbus A340-300', 67, 200),
(3, 'Airbus A230', 30, 60),
(4, 'Boeing 777-300ER', 30, 70),
(5, 'Airbus A330-300', 50, 100),
(6, 'Boeing 747-400', 30, 70);

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `id_promo` int(11) NOT NULL,
  `no_transportasi` int(11) NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rute_kereta`
--

CREATE TABLE `rute_kereta` (
  `id_rute` int(11) NOT NULL,
  `start_rute` varchar(5) NOT NULL,
  `finish_rute` varchar(5) NOT NULL,
  `urutan` int(11) NOT NULL,
  `waktu_berangkat` datetime NOT NULL,
  `waktu_tiba` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stasiun`
--

CREATE TABLE `stasiun` (
  `id_stasiun` int(11) NOT NULL,
  `kode_stasiun` varchar(5) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `nama_stasiun` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stasiun`
--

INSERT INTO `stasiun` (`id_stasiun`, `kode_stasiun`, `kota`, `nama_stasiun`) VALUES
(1, 'GMR', 'Jakarta', 'Gambir'),
(2, 'SBI', 'Surabaya', 'Pasarturi'),
(3, 'BD', 'Bandung', 'Bandung'),
(4, 'SLO', 'Solo', 'Solo Balapan'),
(5, 'CN', 'Cirebon', 'Cirebon'),
(6, 'YK', 'Yogyakarta', 'Yogyakarta'),
(7, 'SMT', 'Semarang', 'Tawang'),
(8, 'ML', 'Malang', 'Malang'),
(9, 'SGU', 'Surabaya', 'Gubeng'),
(10, 'TG', 'Tegal', 'Tegal'),
(11, 'PSE', 'Jakarta', 'Pasar Senen'),
(12, 'BOO', 'Bogor', 'Bogor'),
(13, 'LPN', 'Yogyakarta', 'Lempuyangan'),
(14, 'KAC', 'Bandung', 'Kiaracondong'),
(15, 'KD', 'Kediri', 'Kediri'),
(16, 'JR', 'Jember', 'Jember'),
(17, 'PWT', 'Purwokerto', 'Purwokerto'),
(18, 'BW', 'Banyuwangi', 'Banyuwangi Baru'),
(19, 'CP', 'Cilacap', 'Cilacap'),
(20, 'CJ', 'Cianjur', 'Cianjur'),
(21, 'SI', 'Sukabumi', 'Sukabumi'),
(22, 'KTA', 'Kutoarjo', 'Kutoarjo'),
(23, 'SMC', 'Semarang', 'Poncol'),
(24, 'MLK', 'Malang', 'Kotalama'),
(25, 'SB', 'Surabaya', 'Surabaya Kota');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `bandara`
--
ALTER TABLE `bandara`
  ADD PRIMARY KEY (`id_bandara`);

--
-- Indexes for table `booking_pesawat`
--
ALTER TABLE `booking_pesawat`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `costumer_pesawat`
--
ALTER TABLE `costumer_pesawat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `harga_kereta`
--
ALTER TABLE `harga_kereta`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `harga_pesawat`
--
ALTER TABLE `harga_pesawat`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `jadwal_kereta`
--
ALTER TABLE `jadwal_kereta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_pesawat`
--
ALTER TABLE `jadwal_pesawat`
  ADD PRIMARY KEY (`id_penerbangan`),
  ADD KEY `FK1_dari` (`dari`),
  ADD KEY `FK2_menuju` (`menuju`);

--
-- Indexes for table `kereta`
--
ALTER TABLE `kereta`
  ADD PRIMARY KEY (`id_kereta`);

--
-- Indexes for table `maskapai`
--
ALTER TABLE `maskapai`
  ADD PRIMARY KEY (`id_maskapai`);

--
-- Indexes for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`id_penumpang`);

--
-- Indexes for table `pesawat`
--
ALTER TABLE `pesawat`
  ADD PRIMARY KEY (`id_pesawat`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indexes for table `rute_kereta`
--
ALTER TABLE `rute_kereta`
  ADD PRIMARY KEY (`id_rute`);

--
-- Indexes for table `stasiun`
--
ALTER TABLE `stasiun`
  ADD PRIMARY KEY (`id_stasiun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bandara`
--
ALTER TABLE `bandara`
  MODIFY `id_bandara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `costumer_pesawat`
--
ALTER TABLE `costumer_pesawat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `harga_kereta`
--
ALTER TABLE `harga_kereta`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `harga_pesawat`
--
ALTER TABLE `harga_pesawat`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jadwal_kereta`
--
ALTER TABLE `jadwal_kereta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jadwal_pesawat`
--
ALTER TABLE `jadwal_pesawat`
  MODIFY `id_penerbangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kereta`
--
ALTER TABLE `kereta`
  MODIFY `id_kereta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `maskapai`
--
ALTER TABLE `maskapai`
  MODIFY `id_maskapai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `penumpang`
--
ALTER TABLE `penumpang`
  MODIFY `id_penumpang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pesawat`
--
ALTER TABLE `pesawat`
  MODIFY `id_pesawat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rute_kereta`
--
ALTER TABLE `rute_kereta`
  MODIFY `id_rute` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stasiun`
--
ALTER TABLE `stasiun`
  MODIFY `id_stasiun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
