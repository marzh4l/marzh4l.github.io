-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 29 Agu 2018 pada 03.41
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id3472255_pkm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `nm_admin` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`nm_admin`, `username`, `password`, `foto`) VALUES
('Marsal', 'admin', 'admin', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `id_kontingen` int(7) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `file_data` varchar(100) NOT NULL,
  `ss` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`id_kontingen`, `foto`, `file_data`, `ss`) VALUES
(2018001, 'berkas/foto/sekolah1.jpg', 'berkas/file/14540005_khs.pdf', 'berkas/ss/dikti 1.png'),
(2018002, 'berkas/foto/arya2.jpg', 'berkas/file/contoh.pdf', 'berkas/ss/dikti 2.png'),
(2018003, 'berkas/foto/foto3.jpg', 'berkas/file/contoh3.pdf', 'berkas/ss/dikti 3.png'),
(2018004, 'berkas/foto/foto4.jpg', 'berkas/file/KHS_Semester1.pdf', 'berkas/ss/dikti 4.png'),
(2018005, 'berkas/foto/14540005_kontingen.jpg', 'berkas/file/KHS_Semester2.pdf', 'berkas/ss/14540005_dikti.png'),
(2018006, 'berkas/foto/download.png', 'berkas/file/v114540166_0001-Libur.pdf', 'berkas/ss/v114540166_yudisium.jpg'),
(2018007, 'berkas/foto/12345678_kontingen.jpg', 'berkas/file/12345678_asuransi.pdf', 'berkas/ss/12345678_dikti 2.png'),
(2018008, 'berkas/foto/14530011_kontingen.jpg', 'berkas/file/14530011_khs.pdf', 'berkas/ss/14530011_dikti 3.png'),
(2018009, 'berkas/foto/14530013_logo-FIX.jpg', 'berkas/file/14530013_8-23-1-PB.pdf', 'berkas/ss/14530013_logo-FIX.jpg'),
(2018010, 'berkas/foto/14540012_kontingen.jpg', 'berkas/file/14540012_KTM11.pdf', 'berkas/ss/14540012_dikti 2.png'),
(2018011, 'berkas/foto/14540013_kontingen.jpg', 'berkas/file/14540013_KTM11.pdf', 'berkas/ss/14540013_dikti 2.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabang_lomba`
--

CREATE TABLE `cabang_lomba` (
  `id_cablom` varchar(6) NOT NULL,
  `id_ptki` varchar(6) NOT NULL,
  `nm_lomba` varchar(31) NOT NULL,
  `peserta_lomba` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cabang_lomba`
--

INSERT INTO `cabang_lomba` (`id_cablom`, `id_ptki`, `nm_lomba`, `peserta_lomba`) VALUES
('CBL001', 'URFP01', 'MUSABAQAH TILAWATIL QURAN', 'Putra'),
('CBL003', 'URFP01', 'MUSABAQAH HIFDZIL QURAN 10 JUZ', 'Putri'),
('CBL004', 'UARA02', 'TAKRAW DOUBLE', 'Putra'),
('CBL005', 'UARA02', 'BADMINTON GANDA', 'Putra'),
('CBL006', 'URFP01', 'FILM PENDEK', 'Putra'),
('CBL007', 'URFP01', 'BADMINTON GANDA', 'Putra'),
('CBL008', 'IANM11', 'BADMINTON GANDA', 'Putra'),
('CBL010', 'IANM11', 'CATUR SPEED', 'Putra'),
('CBL011', 'IANM11', 'DEBAT BAHASA ARAB', 'Putra'),
('CBL012', 'IANM11', 'BADMINTON TUNGGAL', 'Putra'),
('CBL013', 'IANM11', 'DEBAT BAHASA INGGRIS', 'Putra'),
('CBL015', 'IANM11', 'CATUR KLASIK', 'Putra'),
('CBL016', 'IANM11', 'MUSABAQAH TILAWATIL QURAN', 'Putra'),
('CBL017', 'STSA17', 'DEBAT BAHASA ARAB', 'Putra'),
('CBL018', 'STSA17', 'MUSABAQAH SYARHIL QURAN', 'Putra'),
('CBL019', 'STSA17', 'VOLLEY BALL', 'Putra'),
('CBL020', 'STSA17', 'CATUR KLASIK BEREGU', 'Putra'),
('CBL021', 'STSA17', 'CATUR KILAT BEREGU', 'Putra'),
('CBL022', 'STSA17', 'TAKRAW BEREGU', 'Putri'),
('CBL023', 'STSA17', 'TAKRAW DOUBLE', 'Putri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_medali`
--

CREATE TABLE `data_medali` (
  `id_data` int(2) NOT NULL,
  `nm_medali` varchar(8) NOT NULL,
  `nm_ptki` varchar(50) NOT NULL,
  `nm_kontingen` varchar(50) NOT NULL,
  `nm_lomba` varchar(26) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `nm_jadwal` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nm_lomba` int(31) NOT NULL,
  `peserta_lomba` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ketua_kon`
--

CREATE TABLE `ketua_kon` (
  `id_ketua` int(2) NOT NULL,
  `id_ptki` varchar(6) NOT NULL,
  `nm_ketua` varchar(50) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `jenis_kelamin` varchar(9) NOT NULL,
  `tgl` date NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ketua_kon`
--

INSERT INTO `ketua_kon` (`id_ketua`, `id_ptki`, `nm_ketua`, `nip`, `no_hp`, `jenis_kelamin`, `tgl`, `jabatan`, `foto`) VALUES
(1, 'URFP01', 'Muhammad Fatah', '199510312010011801', '0812345567', 'Laki-laki', '1993-08-17', 'Dekan', 'berkas/ketua/profile.jpg'),
(2, 'UARA02', 'Salman ', '2147483647', '087645123', 'Laki-laki', '1994-04-13', 'Dekan3', 'berkas/ketua/2.png'),
(3, 'IANM11', 'Freddy', '011328834932', '083672828474', 'Laki-laki', '1970-08-19', 'WR3', 'berkas/ketua/011328834932_tes9.jpg'),
(4, 'STSA17', 'Abdullah Faiz', '199510312010011855', '08124409890', 'Laki-laki', '1976-08-25', '', 'berkas/ketua/199510312010011855_ketua.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontingen`
--

CREATE TABLE `kontingen` (
  `id_kontingen` int(7) NOT NULL,
  `id_cablom` varchar(6) NOT NULL,
  `nm_kontingen` varchar(50) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `jenis_kelamin` varchar(9) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `status` set('TRUE','FALSE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontingen`
--

INSERT INTO `kontingen` (`id_kontingen`, `id_cablom`, `nm_kontingen`, `nim`, `no_hp`, `jenis_kelamin`, `jurusan`, `tgl`, `status`) VALUES
(2018001, 'CBL001', 'Marwan Rifai', '14540002', '08124409880', 'Laki-laki', 'Sistem Informasi', '1994-04-13', 'TRUE'),
(2018002, 'CBL003', 'Fulana', '14540001', '0812334566', 'Perempuan', 'Sistem Informasi', '1993-08-19', 'FALSE'),
(2018003, 'CBL004', 'Isnan', '14540003', '08124409880', 'Laki-laki', 'Sistem Informasi', '1995-04-25', 'TRUE'),
(2018004, 'CBL004', 'Fulan Ahmad', '14540004', '08124409880', 'Laki-laki', 'Sistem Informasi', '1997-04-15', 'TRUE'),
(2018005, 'CBL005', 'Ahmad Prayoga', '14540005', '08124409880', 'Laki-laki', 'Sistem Informasi', '1994-11-29', ''),
(2018006, 'CBL008', 'Tri Akhyari', '14540166', '08984409880', 'Laki-laki', 'Sistem Informasi', '1970-01-01', ''),
(2018007, 'CBL010', 'M. Alhadi', '12345678', '081256790', 'Laki-laki', 'Sistem Informasi', '1995-08-09', ''),
(2018008, 'CBL016', 'Ahman Hafidz', '14530011', '089912345678', 'Laki-laki', 'PAI', '1995-08-16', ''),
(2018009, 'CBL015', 'Kurniawan', '14530013', '087712455676', 'Laki-laki', 'PAI', '1994-08-11', ''),
(2018010, 'CBL017', 'Abdurrahman Faiz', '14540012', '08124409120', 'Laki-laki', 'PAI', '1993-09-23', 'TRUE'),
(2018011, 'CBL017', 'Udin', '14540013', '08984409660', 'Laki-laki', 'PAI', '1993-09-17', 'FALSE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lomba`
--

CREATE TABLE `lomba` (
  `id_lomba` int(2) NOT NULL,
  `nm_lomba` varchar(31) NOT NULL,
  `putra` int(2) NOT NULL,
  `putri` int(2) NOT NULL,
  `jumlah` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lomba`
--

INSERT INTO `lomba` (`id_lomba`, `nm_lomba`, `putra`, `putri`, `jumlah`) VALUES
(1, 'MUSABAQAH TILAWATIL QURAN', 1, 1, 2),
(2, 'MUSABAQAH HIFDZIL QURAN 5 JUZ', 1, 1, 2),
(3, 'MUSABAQAH HIFDZIL QURAN 10 JUZ', 1, 1, 2),
(4, 'MUSABAQAH KARYA TULIS QURAN', 1, 1, 2),
(5, 'MUSABAQAH SYARHIL QURAN', 3, 3, 3),
(6, 'KALIGRAFI NASKAH', 1, 1, 2),
(7, 'KALIGRAFI DEKORASI', 1, 1, 2),
(8, 'POP SOLO ISLAMI', 0, 0, 1),
(9, 'PUITISASI AL-QURAN', 1, 1, 1),
(10, 'KARYA INOVASI', 0, 0, 1),
(11, 'DEBAT BAHASA ARAB', 2, 2, 2),
(12, 'DEBAT BAHASA INGGRIS', 2, 2, 2),
(13, 'FILM PENDEK', 0, 0, 1),
(14, 'CATUR KLASIK', 1, 1, 2),
(15, 'CATUR KILAT', 1, 1, 2),
(16, 'CATUR SPEED', 1, 1, 2),
(17, 'TENIS MEJA TUNGGAL', 1, 1, 2),
(18, 'TENIS MEJA GANDA', 2, 2, 4),
(19, 'BADMINTON TUNGGAL', 1, 1, 2),
(20, 'BADMINTON GANDA', 2, 2, 4),
(21, 'FUTSAL', 10, 0, 10),
(22, 'TAKRAW DOUBLE', 2, 2, 2),
(23, 'TAKRAW BEREGU', 3, 3, 3),
(24, 'KARATE KATA BEREGU', 1, 1, 2),
(25, 'KARATE KATA TUNGGAL', 1, 1, 2),
(26, 'PANJAT DINDING LEAD', 1, 1, 2),
(27, 'PANJAT DINDING SPEED', 1, 1, 2),
(28, 'TAE KWON DO SENI GANDA', 1, 1, 2),
(29, 'TAE KWON DO SENI TUNGGAL', 1, 1, 2),
(30, 'VOLLEY BALL', 12, 12, 24),
(31, 'PENCAK SILAT SENI TUNGGAL', 1, 1, 2),
(32, 'PENCAK SILAT SENI GANDA', 2, 2, 4),
(33, 'PENCAK SILAT SENI BEREGU', 3, 3, 6),
(34, 'CATUR KLASIK BEREGU', 4, 4, 4),
(35, 'CATUR SPEED BEREGU', 4, 4, 4),
(36, 'CATUR KILAT BEREGU', 4, 4, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `medali`
--

CREATE TABLE `medali` (
  `id_medali` int(1) NOT NULL,
  `nm_medali` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `medali`
--

INSERT INTO `medali` (`id_medali`, `nm_medali`) VALUES
(1, 'Emas'),
(2, 'Perak'),
(3, 'Perunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `official`
--

CREATE TABLE `official` (
  `id_official` varchar(6) NOT NULL,
  `id_cablom` varchar(6) NOT NULL,
  `nm_official` varchar(50) NOT NULL,
  `nip` int(12) NOT NULL,
  `no_hp` int(13) NOT NULL,
  `jenis_kelamin` varchar(9) NOT NULL,
  `tgl` date NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `official`
--

INSERT INTO `official` (`id_official`, `id_cablom`, `nm_official`, `nip`, `no_hp`, `jenis_kelamin`, `tgl`, `foto`) VALUES
('OFC001', 'CBL001', 'Anang S', 2147483647, 2147483647, 'Laki-laki', '1994-05-03', 'berkas/official/home.png'),
('OFC002', 'CBL003', 'Santiwati', 2147483647, 2147483647, 'Perempuan', '1991-06-18', 'berkas/official/muslimah1.jpg'),
('OFC003', 'CBL006', 'Akbar Maulana', 2147483647, 2147483647, 'Laki-laki', '1964-08-13', 'berkas/official/199702221234562015_official.jpg'),
('OFC004', 'CBL017', 'Jumai', 2147483647, 2147483647, 'Laki-laki', '1963-09-04', 'berkas/official/1995103120100118091_official.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pnt_koor`
--

CREATE TABLE `pnt_koor` (
  `id_koor` varchar(6) NOT NULL,
  `nm_koor` varchar(30) NOT NULL,
  `koordinator` varchar(20) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(9) NOT NULL,
  `tgl` date NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pnt_koor`
--

INSERT INTO `pnt_koor` (`id_koor`, `nm_koor`, `koordinator`, `nip`, `no_hp`, `jenis_kelamin`, `tgl`, `jabatan`, `foto`) VALUES
('KOOR01', 'Dr. Muhammad, MA', 'Sarpras & Transporta', '123456789100101201', '08984409880', 'Laki-laki', '2018-08-26', 'Dekan', '../img/panitia/koordinator/1234567891001012010_ketua.jpg'),
('KOOR02', 'Indah', 'Sekretariat', '199510312010011801', '08984409880', 'Perempuan', '1973-08-22', 'Dekan', '../img/panitia/koordinator/199510312010011801_ketua.jpg'),
('KOOR03', 'Dr. Wawan, MA', 'Pendataan Peserta', '199010312011011805', '08124409880', 'Laki-laki', '1968-08-21', 'Dekan', '../img/panitia/koordinator/199010312011011805_ketua.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pnt_lo`
--

CREATE TABLE `pnt_lo` (
  `id_lo` varchar(5) NOT NULL,
  `nm_lo` varchar(30) NOT NULL,
  `lomba_lo` varchar(31) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(9) NOT NULL,
  `tgl` date NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pnt_lo`
--

INSERT INTO `pnt_lo` (`id_lo`, `nm_lo`, `lomba_lo`, `nim`, `no_hp`, `jenis_kelamin`, `tgl`, `jurusan`, `foto`) VALUES
('LO01', 'Wanda', 'MUSABAQAH TILAWAH AL-QURAN', '14150002', '08124409880', 'Perempuan', '1995-05-18', 'Sistem Informasi', '../img/panitia/lo/14150002_foto5.jpg'),
('LO02', 'Arjuna', 'FILM PENDEK', '14150001', '08124409880', 'Laki-laki', '1995-05-11', 'Sistem Informasi', '../img/panitia/lo/14150001_foto5.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pnt_lomba`
--

CREATE TABLE `pnt_lomba` (
  `id_panitia` varchar(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nm_lomba` varchar(31) NOT NULL,
  `nm_panitia` varchar(30) NOT NULL,
  `nim` int(10) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(9) NOT NULL,
  `tgl` date NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pnt_lomba`
--

INSERT INTO `pnt_lomba` (`id_panitia`, `username`, `password`, `nm_lomba`, `nm_panitia`, `nim`, `no_hp`, `jenis_kelamin`, `tgl`, `jurusan`, `foto`) VALUES
('PNT01', '14540173', '14540173', 'MUSABAQAH TILAWAH AL-QURAN', 'fulan bin fulan', 14540173, '081244098854', 'Laki-laki', '1995-10-31', 'Sistem Informasi', '../img/panitia/lomba/foto1.jpg'),
('PNT02', '14540501', '14540501', 'BADMINTON GANDA', 'Ahmad', 14540501, '+6281244098854', 'Laki-laki', '1995-05-17', 'Sistem Informasi', '../img/panitia/lomba/14540501_foto3.jpg'),
('PNT03', '14540601', '14540601', 'FILM PENDEK', 'Suchi', 14540601, '081244098854', 'Perempuan', '1997-05-21', 'Sistem Informasi', '../img/panitia/lomba/14540601_foto3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ptki`
--

CREATE TABLE `ptki` (
  `id_ptki` varchar(6) NOT NULL DEFAULT '',
  `nm_ptki` varchar(50) NOT NULL,
  `nm_adm` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `logo_ptki` varchar(50) NOT NULL,
  `aktivasi` set('TRUE','FALSE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ptki`
--

INSERT INTO `ptki` (`id_ptki`, `nm_ptki`, `nm_adm`, `username`, `password`, `email`, `logo_ptki`, `aktivasi`) VALUES
('IANB08', 'IAIN Bengkulu', 'Zaza Nur', 'zaza', 'IANB08', 'zaza1234@localhost', 'img/ptki/alfatah.jpg', 'TRUE'),
('IANM11', 'IAIN Metro', 'Ruliansyah', 'ruli', 'IANM11', 'ruli@radenfatah.ac.id', 'img/ptki/itb.bmp', 'TRUE'),
('IANP10', 'IAIN Padang Sidempuan Tapanuli', 'Siti Fatimah', 'fatimah', 'IANP10', 'sitifatimah@localhost', 'img/ptki/muba.jpg', 'TRUE'),
('IANT09', 'IAIN Bukittinggi', 'Admin', 'adm', 'admin', 'admn@gmai.com', 'img/ptki/home2.png', 'TRUE'),
('STCR14', 'IAIN Curup', 'Suci Andara', 'suci', 'STCR14', 'suci1996@localhost', 'img/ptki/phonegap-logo.png', 'TRUE'),
('STSA17', 'IAIN Syaikh Abdurrahman SIddik Bangka', 'Abdurrahman', 'rahman', 'STSA17', 'abdurrahman@localhost', 'img/ptki/LOGO-KEMENTERIAN-PENDIDIKAN-NASIONAL.png', 'TRUE'),
('STTD18', 'STAIN Teungku Dirundeng Meulaboh', 'Muhammad Rahman', 'rahman', 'STTD18', 'yogamarz@gmail.com', 'img/ptki/logot_tdm.png', 'TRUE'),
('UARA02', 'UIN Ar-Raniry Banda Aceh', 'Salman Faiz', 'faiz_salma', 'salman01', 'faiz@gmail.com', 'img/ptki/ar-raniry.png', 'TRUE'),
('URFP01', 'UIN Raden Fatah Palembang', 'Yoga Marsal', 'marsal', 'marsal31', 'marsal@gmail.com', 'img/ptki/uin.png', 'TRUE'),
('USTS03', 'UIN Sultan Thaha Saifuddin Jambi', 'Muhammad Thaha', 'thaha', 'USTS03', 'thaha1867@localhost', 'img/ptki/instagram_PNG10.png', 'TRUE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ptkin_sumatera`
--

CREATE TABLE `ptkin_sumatera` (
  `id_ptkin` int(2) NOT NULL,
  `kategori` varchar(5) NOT NULL,
  `nm_ptki` varchar(50) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `kode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ptkin_sumatera`
--

INSERT INTO `ptkin_sumatera` (`id_ptkin`, `kategori`, `nm_ptki`, `kota`, `kode`) VALUES
(1, 'UIN', 'UIN Raden Fatah Palembang', 'Palembang', 'URFP01'),
(2, 'UIN', 'UIN Ar-Raniry Banda Aceh', 'Aceh', 'UARA02'),
(3, 'UIN', 'UIN Sultan Thaha Saifuddin Jambi', 'Jambi', 'USTS03'),
(4, 'UIN', 'UIN Sutan Syarif Kasim Pekan Baru', 'Pekan Baru', 'USSK04'),
(5, 'UIN', 'UIN Sumatera Utara Medan', 'Medan', 'USUM05'),
(6, 'UIN', 'UIN Imam Bonjol Padang', 'Padang', 'UIBP06'),
(7, 'UIN', 'UIN Raden Intan Lampung', 'Lampung', 'URIL07'),
(8, 'IAIN', 'IAIN Bengkulu', 'Bengkulu', 'IANB08'),
(9, 'IAIN', 'IAIN Bukittinggi', 'Padang', 'IANT09'),
(10, 'IAIN', 'IAIN Padang Sidempuan Tapanuli', 'Medan', 'IANP10'),
(11, 'IAIN', 'IAIN Metro', 'Lampung', 'IANM11'),
(12, 'IAIN', 'IAIN Zawiyah Cot Kala Langsa', 'Aceh', 'IANZ12'),
(13, 'IAIN', 'IAIN Batusangkar', 'Padang', 'IANS13'),
(14, 'IAIN', 'IAIN Curup', 'Bengkulu', 'STCR14'),
(15, 'STAIN', 'STAIN Gajah Putih', 'Aceh', 'STGP15'),
(16, 'IAIN', 'IAIN Malikussaleh Lhoukseumawe', 'Aceh', 'STML16'),
(17, 'IAIN', 'IAIN Syaikh Abdurrahman Siddik Bangka Belitung', 'Bangka', 'STSA17'),
(18, 'STAIN', 'STAIN Teungku Dirundeng Meulaboh', 'Aceh', 'STTD18'),
(19, 'STAIN', 'STAIN Bengkalis', 'Riau', 'STBK19'),
(20, 'IAIN', 'IAIN Kerinci Jambi', 'Jambi', 'IANKJ2'),
(21, 'STAIN', 'STAIN Kepulauan Riau', 'Riau', 'STKR15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_kontingen`);

--
-- Indeks untuk tabel `cabang_lomba`
--
ALTER TABLE `cabang_lomba`
  ADD PRIMARY KEY (`id_cablom`),
  ADD KEY `id_ptki` (`id_ptki`),
  ADD KEY `nm_lomba` (`nm_lomba`);

--
-- Indeks untuk tabel `data_medali`
--
ALTER TABLE `data_medali`
  ADD PRIMARY KEY (`id_data`);

--
-- Indeks untuk tabel `ketua_kon`
--
ALTER TABLE `ketua_kon`
  ADD PRIMARY KEY (`id_ketua`),
  ADD KEY `id_ptki` (`id_ptki`);

--
-- Indeks untuk tabel `kontingen`
--
ALTER TABLE `kontingen`
  ADD PRIMARY KEY (`id_kontingen`),
  ADD KEY `id_cablom` (`id_cablom`),
  ADD KEY `id_cablom_2` (`id_cablom`);

--
-- Indeks untuk tabel `lomba`
--
ALTER TABLE `lomba`
  ADD PRIMARY KEY (`id_lomba`),
  ADD KEY `nm_lomba` (`nm_lomba`);

--
-- Indeks untuk tabel `medali`
--
ALTER TABLE `medali`
  ADD PRIMARY KEY (`id_medali`);

--
-- Indeks untuk tabel `official`
--
ALTER TABLE `official`
  ADD PRIMARY KEY (`id_official`),
  ADD KEY `id_cablom` (`id_cablom`);

--
-- Indeks untuk tabel `pnt_koor`
--
ALTER TABLE `pnt_koor`
  ADD PRIMARY KEY (`id_koor`);

--
-- Indeks untuk tabel `pnt_lo`
--
ALTER TABLE `pnt_lo`
  ADD PRIMARY KEY (`id_lo`);

--
-- Indeks untuk tabel `pnt_lomba`
--
ALTER TABLE `pnt_lomba`
  ADD PRIMARY KEY (`id_panitia`);

--
-- Indeks untuk tabel `ptki`
--
ALTER TABLE `ptki`
  ADD PRIMARY KEY (`id_ptki`);

--
-- Indeks untuk tabel `ptkin_sumatera`
--
ALTER TABLE `ptkin_sumatera`
  ADD PRIMARY KEY (`id_ptkin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_medali`
--
ALTER TABLE `data_medali`
  MODIFY `id_data` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ketua_kon`
--
ALTER TABLE `ketua_kon`
  MODIFY `id_ketua` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `lomba`
--
ALTER TABLE `lomba`
  MODIFY `id_lomba` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `medali`
--
ALTER TABLE `medali`
  MODIFY `id_medali` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ptkin_sumatera`
--
ALTER TABLE `ptkin_sumatera`
  MODIFY `id_ptkin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
