-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2021 pada 02.59
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_data`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_iduka`
--

CREATE TABLE `tbl_iduka` (
  `id` int(11) NOT NULL,
  `iduka` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `email_website` varchar(128) NOT NULL,
  `telp_instansi` varchar(128) NOT NULL,
  `nama_pembimbing_instansi` varchar(128) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `hp_pembimbing` varchar(128) NOT NULL,
  `email_pembimbing` varchar(128) NOT NULL,
  `jurusan` varchar(128) NOT NULL,
  `tp` varchar(25) NOT NULL,
  `guru` varchar(128) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_iduka`
--

INSERT INTO `tbl_iduka` (`id`, `iduka`, `alamat`, `email_website`, `telp_instansi`, `nama_pembimbing_instansi`, `nip`, `jabatan`, `hp_pembimbing`, `email_pembimbing`, `jurusan`, `tp`, `guru`, `active`) VALUES
(1, 'Adit Motor', 'Jl. Semin - Cawas Pandanan, Putuk, Sumberejo, Semin', '', '', '', '', '', '', '', '1', '2020/2021', 'Edi Prabowo, S.T', 'Non Aktif'),
(2, 'Al- H. Rally Auto Car', 'Jl. Wonosari Yogya Km 3 Siyono', '', '', '', '', '', '', '', '1', '2020/2021', 'Edi Prabowo, S.T', 'Aktif'),
(3, 'Bares Motor', 'Munggi Pasar, 04/31 Semanu, Semanu', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(4, 'BAS AUTO SERVICE', 'Jl. Karangmojo Semin Km 1 Gunungkidul', '', '', 'Basuki rahmat', '-', 'Personalia', '87710655600', '', '1', '2020/2021', 'Ita Purnamasari, S.Pd.I', 'Aktif'),
(5, 'Bengkel Adi', 'Jl Ario Putro  No 60 Rt 002/03 Sarua Indah Ciputat', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(6, 'Bengkel Latanza Auto', 'Jl Sumber Agung, Tawarsari 02/18, Wonosari,  Gunungkidul, Yogyakarta', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(7, 'Bengkel Mitra Aston', 'Kajar II  RT.03/09', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(8, 'Bengkel Morris', 'Jl. Pleret Km 1 Besalen Bantul', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(9, 'Bengkel Wistara Performnce', 'Jl Godean Km 4 Yogyakarta', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(10, 'Bengkel Mobil Art Garage', 'Jl. Jetis, Jetis, Wedomartani, Ngemplak, Sleman', '', '', 'Hartanto Sulisno A.Md', '-', 'Owner', '082137315456', 'hartantosulisno64@yahoo.com', '1', '2020/2021', 'Muhas Rahmanta, S.Pd', 'Aktif'),
(11, 'Bengkel Mobil Ditto Motor', 'Wanujoyo Kidul, Srimartani, Piyungan Bantul', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(12, 'Bengkel Mobil Galang Motor', 'Tawarsari Wonosari', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(13, 'Bengkel Mobil Jaya Motor', 'Karangduwet, Karangrejek Wonosari', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(14, 'Bengkel Mobil Maranata ', 'Cendolan Pundungsari Semin', '', '', 'Pramono', '-', 'Mekanik', '85643349124', '', '1', '2020/2021', '', '0'),
(15, 'Bengkel Mobil Puspa Indah', 'Karangmojo I Karangmojo Gunungkidul', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(16, 'Bengkel Mobil Sedyo Rukun', 'Jl. Tentara Pelajar No. 40 Wonosari Gk', '', '', 'Sudi Setiyono', '-', 'Personalia', '818267463', '', '1', '2020/2021', '', '0'),
(17, 'Bengkel Mobil. Gotrek Auto', 'Jl. Kyai Legi Kepek Wonosari Gunungkidul', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(18, 'Bengkel Mobil Mbah Rud', 'JL. Karangmojo-Ponjong, Karangmojo 1, Karangmojo, Gunungkidul', '', '', 'Rudito', '-', 'Pimpinan Bengkel', '08174124946', '-', '1', '2020/2021', '', '0'),
(19, 'Bengkel Mobil Mitra Auto Car Service', 'Jl. Raya Bakungan, No 46, Wedomertani, Ngemplak, Sleman', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(20, 'Bengkel Mobil Setia Motor', 'Jl. Kyai Legi Siyono Wetan Logandeng Playen, Gunungkidul', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(21, 'Bengkel Mobil SS Auto', 'Clorot Semanu Gunungkidul', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(22, 'DHEA MOTOR', 'Keringan Kidul Bulurejo Semin', '', '', 'Triyono', '-', 'Mekanik', '81931797454', '', '1', '2020/2021', 'Hadi Nur Setyawan, S.Pd.I', 'Aktif'),
(23, 'Gembong Jaya Vw', 'Sendari Tirtoadi Mlati Sleman', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(24, 'Heru Bintang Motor', 'Jambe Rt 02/01 MlopoharjoWuryantoro Wonogiri', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(25, 'Humam Motor', 'Sambeng II SAMBIREJO Ngawen GK', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(26, 'Hyunday Yogyakarta', 'PT SUMBER BARU CITRA MOBIL  YK', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(27, 'Kencana Motor Wonogiri', 'Jl Jendral Sudirman 111Wonogiri', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(28, 'Maestro Bengkel', 'Jl raya Janti No 263 Yogyakarta', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(29, 'Maju Mapan Auto Car', 'Jl. Ring Rood Selatan Seneng Siraman Wonosari Gk', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(30, 'Nissan Datsun Mlati', 'Jl. Magelang Km 10, Bangunrejo, Tridadi, Sleman, Yogyakarta', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(31, 'PT. Calindo', 'Jl, Wonosari Baron, Km 15, Jenglot Pucanganom Rongkop', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(32, 'PT. Rosalia Indah', 'Jl Raya Semin Gunungkidul', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(33, 'PT. Sanoh Indonesia', 'Jl Inti IIBlok C-4, N0.10 Kawasan Industri HYUNDAY ', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(34, 'PT. Sumber Baru Trada ', 'Jl Ringroad Aselatan Sewon Bantul', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(36, 'Sabar Baru Motor', 'Keringan Lor Semin Gunungkidul', '', '', 'Anton', '-', '', '', '', '1', '2020/2021', '', '0'),
(37, 'Sahabat Motor ', 'Watukelir Sukoharjo', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(38, 'Sarino Motor', 'Jl Wonogiri Baturetno Wonogiri', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(39, 'Tibo Urip Transport', 'Jl. Ring Rood Selatan, Wonosari', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(40, 'Vikky Jaya', 'Karangmojo 1 Karangmojo Gunungkidul', '', '', 'Sugiyono', '-', 'Mekanik', '-', 'ekocahyanto007@gmail.com', '1', '2020/2021', 'Fajar Nurharyati, S.Pd', 'Aktif'),
(41, 'Yulia Mobilindo Perkasa', 'Jl. Sisingamangaraja No 70 Yogyakarta', '', '', '', '', '', '', '', '1', '2020/2021', '', '0'),
(42, 'BALAI PEMASYARAKATAN KELAS II WONOSARI', 'Jl. Mgr Soegiyo Pranoto No. 37 Wonosari, Gunungkidul', 'bapaswonosari@yahoo.co.id', '(0274) 392929', 'WISNU PRIYO BUDI UTOMO, A.Md', '197906102000 03 1001', 'Kepala Urusan Tata Usaha', '0812 2990 339', 'mazwisnu79@gmail.com', '3', '2020/2021', 'Annisa Ruhayati, S.Pd', 'Aktif'),
(43, 'Bank Mini Moeka', 'SMK Muhammadiyah Karangmojo', '', '', 'Nurfitri Herlinamurti, S.Pd', '', 'Pimpinan', '', '', '3', '2020/2021', '-', '0'),
(44, 'BMT Dana Insani Ponjong', 'Kerjo II Genjahan Ponjong, Gunungkidul', '', '', 'Jumari', '-', 'Kepala Cabang BMT Dana Insani Ponjong', '85896149661', '', '3', '2020/2021', '-', '0'),
(45, 'BMT Mandiri', 'Jl. Wonosari Semin Jlantir Gedangrejo', '', '', '', '', '', '', '', '3', '2020/2021', 'Yeni Prihantini, S.Pd', 'Aktif'),
(46, 'BMT Mitra Amanah ', 'Semanu Semanu Gunungkidul', '', '', '', '', '', '', '', '3', '2020/2021', '-', '0'),
(47, 'BPN Kabupaten Gunungkidul', 'Jl. Kidemang Wonopawiro Lingkar Utara Piyaman , Gunungkidul', '', '', '', '', '', '', '', '3', '2020/2021', '-', '0'),
(48, 'Dinas Kebudayaan Kabupaten Gunungkidul', 'Komplek Bangsal Sewoko Projo Wonosari', '', '', '', '', '', '', '', '3', '2020/2021', '-', '0'),
(49, 'Diperindag ', 'Jl Brigjen Katamso No 1 Wonosari ', '', '', '', '', '', '', '', '3', '2020/2021', '-', '0'),
(50, 'Kantor Pos Wonosari Yogyakarta', 'Jl. Brigjen Katamso No 12 Wonosari Gunungkidul', '', '', '', '', '', '', '', '3', '2020/2021', '-', '0'),
(51, 'KJKS BMT Mandiri', 'Jl. Wonosari - Semin Jlantir 1 Gedangrejo Karangmojo, Gunungkidul', 'mandiribmt01@yahoo.co.id', '0878 39992 7160', 'Fika Framantika, S.Sos', '-', 'Manager', '0878 3938 3566', 'fikaframantika@gmail.com', '3', '2020/2021', '-', '0'),
(52, 'Koperasi Jasa Keuangan Syariah Permata', 'Jl Karangmojo Wonosari Km 2 Wiladeg Karangmojo', '', '(0274) 2901637', 'Tukiyat, SE', '-', 'Manager', '087739339908', 'jaudamastoeboy@gmail.com', '3', '2020/2021', 'Nurfitri Herlinamurti, S.Pd', 'Aktif'),
(54, 'Koperasi Unit Desa Bhina Rejeki', 'Plumbungan Gedangrejo Karangmojo, Gunungkidul', '', '', 'Sutikad Haryanto', '-', 'Ketua', '81904143909', '', '3', '2020/2021', '-', '0'),
(55, 'KP-RI Tegak  Karangmojo,Gunungkidul', 'Jln. Karangmojo-Semin, KM. 1 Gedangan,Gedangrejo,Karangmojo, Gunungkidul', 'KPRI&quot;TEGAK&quot;karangmojo@gmail.com', '0877 1910 6001', 'KURUNA SUJATI PITAYA NIAWATI, S.Pd.', '340 390691 272 0003', 'Ketua KPRI Tegak Karangmojo', '0878 3831 8777', 'kurnia29saliyem@gmail.com', '3', '2020/2021', 'Dra. Siti Zandaroh Sausana', 'Aktif'),
(56, 'KP-RI Bangun Wonosari', 'Jl. Kol. Sugiono No 5 Wonosari Gunungkidul', '', '(0274) 391156 / 391164', 'Paimun, M.Pd', '19670806 199103 1 010', 'Ketua 1', '0812 2591 4570', '', '3', '2020/2021', 'Erni Setyaningsih, S.Pd', 'Aktif'),
(57, 'KSU Jabal Tarik', 'Jl. Karangmojo Ponjong Km 0.5 Karangmojo Gunungkidul', '', '0274394037', 'Pamuji Pamungkas', '01014018', 'Manager', '081328596888', '', '3', '2020/2021', 'Luthfi Inas Afifah, S.Pd', 'Aktif'),
(58, 'PKP-RI Kabupaten Gunungkidul', 'Jl. Pramuka Gg.Pudak No. 16 Wonosari, Gunungkidul', '', '', '', '', '', '', '', '3', '2020/2021', '-', '0'),
(59, 'PRIMKOP Kartika B-08', 'Jl. Kesatrian no .3 Wonosari Gk', 'primkopkartikab@gmail.com', '(0274) 394141', 'Timotius Subanu', '2910126720669', 'Ketua', '0812 2623 9747', '', '3', '2020/2021', '-', '0'),
(60, 'PT. BPRS Mam  Cab. Wonosari', 'Jl. Kh. Agus Salim No 74 Kepek wonosari, Gunungkidul', '', '', '', '', '', '', '', '3', '2020/2021', '-', '0'),
(61, 'Sekretariat DPRD Kabupaten Gunungkidul', 'Jl. Brigjen Katamso No 12 Wonosari Gunungkidul', '', '', '', '', '', '', '', '3', '2020/2021', '-', '0'),
(62, 'UDP PPM Kapanewon Ponjong, Gunungkidul', 'Jl. Jendral Sudirman Kerjo 1, Genjahan Ponjong Gunungkidul', 'upk_ponjong@gmail.com', '(0274) 3950099', 'Drs. H. Kapeyono', '-', 'Ketua PPM', '0823 3153 7578', '', '3', '2020/2021', '-', '0'),
(63, 'UPK Makmur Kapanewon Karangmojo', 'Jl.Karangmojo -Ponjong Km 0,5 , Karangmojo 1, Karangmojo, Gunungkidul', 'upk_karangmojo@gmail.com', '085 228 313 388', 'Agus Purnama, ST', '-', 'Ketua UPK', '85228313388', 'simoeh_gk@yahoo.co.id', '3', '2020/2021', 'Dwi Ana Noviani, S.Pd', 'Aktif'),
(64, 'UPK Ponjong', 'Jl. Jendral Sudirman, Kerjo Genjahan Ponjong', '', '', '', '', '', '', '', '3', '2020/2021', 'Wulandari, S.Si', 'Aktif'),
(65, 'Dinas Kesehatan Kabupaten Gunungkidul', 'Jl. Kolonel Sugiyono No 17 Wonosari, Gunungkidul', '', '', 'dr. Dewi Irawaty, M.Kes', '19651228 199603 2 002', 'Kepala Dinas Kesehatan', '', '', '4', '2020/2021', 'Ahsan Fauzi, S.Pd', 'Aktif'),
(66, 'Dinas Pekerjaan Umum, Perumahan Rakyat Dan Kawasan Permukiman', 'Jl. Brigjen Katamso NO. 2, Wonosari, Gunungkidul', '', '', 'Ir. Eddy Prapto, M.Si', '19650517 199303 1 007', 'Kepala Dinas PUPRKP Kab. Gunungkidul', '', '', '4', '2020/2021', '', '0'),
(67, 'Dinas Penanaman Modal Dan Pelayanan Terpadu Gunungkidul', 'Jl. Kesatrian No 38 Wonosari, Gunungkidul', '', '', 'Drs.IRAWAN JAMIKO, MSi', '19660326198021000', 'Kepala Dinas ', '', '', '4', '2020/2021', '', '0'),
(68, 'Dinas Pendidikan Pemuda Dan Olahraga Kabupaten Gunungkidul', 'Jl Pemuda No. 32 Baleharjo Wonosari, Gunungkidul', '', '', 'Bahron Rasyid, S.Pd., M.M.', '19601126 197912 1 001', 'Kepala Dinas', '', '', '4', '2020/2021', '', '0'),
(69, 'Dinas Perpustakaan Dan Kearsipan', 'Jl. Kolonel Sugiyono No. 35 Wonosari, Gunungkidul', 'dpk@gunungkidulkab.go.id', '(0274) 394194', 'Drs.ALI RIDLO, MM', '19620207 198903 1 009', 'Kepala Dinas ', '', '', '4', '2020/2021', 'Hana Mitsalina, S.Hum', 'Aktif'),
(70, 'DPUPRKP', 'Jl. Brigjen katamso No 2 Wonosari', '', '', '', '', '', '', '', '4', '2020/2021', '', '0'),
(71, 'Kapanewon Karangmojo', 'Plumbungan, Gedangrejo, Karangmojo', 'karangmojo@gunungkidulkab.go.id', '(0274) 391018', 'Drs. Marwatahadi, M.Si', '19670308 198602 1 002', 'Panewu Kapanewon Karangmojo', '0818 0411 1424', 'marwatahadidrs@gmail.com', '4', '2020/2021', 'Dra. Sri Sudiyati', 'Non Aktif'),
(72, 'Kapanewon Ponjong', 'Sumber Kidul, Ponjong, Ponjong, Gunungkidul', 'ponjong.gunungkidulkab.go.id', '(0274) 3950002', 'Drs. Witanto', '19661121 198602 1 001', 'Plt. Panewu', '0878 3933 0706', '', '4', '2020/2021', 'Dra. Suratmiyati', 'Aktif'),
(73, 'Kantor Pos Ponjong', 'Jl. Sultan Agung No.46.Kerjo II Genjahan Ponjong, Gunungkidul', '', '', '', '', '', '', '', '4', '2020/2021', '', '0'),
(74, 'Kantor Pos Semin Kabupaten Gunungkidul', 'Jl Semin - Wonosari, Semin Gunungkidul', '', '', '', '', '', '', '', '4', '2020/2021', '', '0'),
(75, 'Kantor Sekretariat Daerah Kabupaten Gunungkidul', 'Jl. Brigjen Katamso 1 Wonosari, Gunungkidul', '', '', '', '', '', '', '', '4', '2020/2021', '', '0'),
(76, 'Kantor Urusan Agama Kapanewon Semanu', 'Ngebrak Barat, Semanu Kabupaten , Gunungkidul', '', '', 'H. Arif Munandar Thohar, S.Ag.MA', '19680629 199903 1 001', 'Kepala KUA', '', '', '4', '2020/2021', '', '0'),
(78, 'Kapanewon Semanu', 'Jl Jendral Sudirman No 4 Semanu Gunungkidul', 'semanu@gunungkidulkab.go.id', '(0274) 391025', 'Drs. Marwatahadi, M.Si', '19670308 198602 1 002', 'Plt. Panewu Semanu', '', '', '4', '2020/2021', 'Anik Nur Khayati, S.Pd', 'Aktif'),
(79, 'Kejaksaan Negeri Wonosari Gunungkidul', 'Jl. Mgr. Sugiyo Pranoto No. 10 Wonosari Gunungkidul', '', '', '', '', '', '', '', '4', '2020/2021', '', '0'),
(80, 'Kementerian Agama Kabupaten Gunungkidul', 'Jl. Brigjen Katamso 13 Wonosari Gunungkidul', '-', '-', 'H.AIDI JOHANSYAH,S.Ag.MM', '1.96907101995031E+017', 'KEPALA KANTOR KEMENTRIAN AGAMA KABUPATEN GUNUNGKIDUL', '-', '-', '4', '2020/2021', '', '0'),
(81, 'Korwilcam Bid.Pendidikan Karangmojo', 'Plumbungan Gedangrejo Karangmojo, Gunungkidul', '', '', '', '', '', '', '', '4', '2020/2021', '', '0'),
(82, 'KPAD Kab Gunungkidul', 'Wonosari Wonosari Gunungkidul', '', '', '', '', '', '', '', '4', '2020/2021', '', '0'),
(83, 'Kantor Urusan Agama Kapanewon Ponjong', 'Ponjong, RT. 04/RW. 04, Ponjong, Kabupaten Gunung Kidul, Daerah Istimewa Yogyakarta 55892', '', '', 'AHMAD MUN\'IM, SHI', '', 'Kepala KUA', '', '', ' Otomatisasi dan Tata Kelola Perkantoran', '2020/2021', '', '0'),
(84, 'Pengadilan Negeri Wonosari Kelas Ii', 'Jl Taman Bhakti No 01 Wonosari Gk', '', '', '', '', '', '', '', '4', '2020/2021', '', '0'),
(86, 'Puskesmas Karamojo I', 'Jl Wonosari Karangmojo Km 8,1Krmojo', '', '', '', '', '', '', '', '4', '2020/2021', '', '0'),
(87, 'UPT Puskesmas Ponjong I', 'Jl. Sultan Agung No 62 Kerjo Genjahan Ponjong', '', '', '', '', '', '', '', '4', '2020/2021', '', '0'),
(88, 'UPT Puskesmas Semanu', 'Jl Jendral Sudirman No 10 Semanu', '', '', '', '', '', '', '', '4', '2020/2021', 'Ahsan Fauzi, S.Pd', 'Aktif'),
(89, 'AMALIA SWALAYAN', 'Jl. Tambakromo No.17 Pati, Genjahan, Ponjong', 'ariswinotoponjong@fmail.com', '087738562243', 'Ariswinata SKM.,MM.', '-', 'Pimpinan', '087738562243', 'ariswinotoponjong@gmail.com', '5', '2020/2021', 'Yarudin, S.Pd.I', 'Aktif'),
(90, 'Amanah Sri Raharjo', 'Warung 02/09, Gedangrejo Karangmojo', '-', '081804123268', 'Jumadi', '-', 'Owner Toko Amanah', '081804123268', '-', '5', '2020/2021', 'Ferida Eka Pratiwi MH., S.Pd', 'Aktif'),
(91, 'Diva Swalayan Karangmojo', 'Plumbungan Gedangrejo Karangmojo', '', '', '', '', '', '', '', '5', '2020/2021', '-', '0'),
(92, 'DIVA SWALAYAN PONJONG', 'Susukan 2,RT.01/RW.06, Genjahan, Ponjong, Gunungkidul', '', '0895 3450 78521', 'Dias Nur Sasongko', '-', 'Manager', '0813 2846 0320', '', '5', '2020/2021', 'Hj. Lina Supartiningsih, B.Sc.', 'Aktif'),
(93, 'Jumadi Swalayan', 'Warung, Gedangrejo Karangmojo', '', '', '', '', '', '', '', '5', '2020/2021', '-', '0'),
(95, 'Moeka Mart', 'SMK MUH KARANGMOJO', '', '', 'Ferida Eka Pratiwi MH, S.E.', '', 'Pimpinan', '', '', '5', '2020/2021', 'Ferida Eka Pratiwi MH., S.Pd', 'Aktif'),
(96, 'RX Distro', 'Selang Jl Karangmojo Wonosari km 2,5 Selang', '', '', '', '', '', '', '', '5', '2020/2021', '-', '0'),
(97, 'Toko ', 'Pati Genjahan Ponjong', '', '', '', '', '', '', '', '5', '2020/2021', '-', '0'),
(98, 'Toko Andika Putra', 'Jl Raya Eromoko Wonogiri', '-', '0274 5329281', 'Novi Nur Widayati, S.E', '-', 'Personalia', '-', '-', '5', '2020/2021', '-', '0'),
(99, 'Toko Istana', 'Jl Sumarwi 17 Wonosari Gunungkidul.', '-', '-', 'Tri Supadmi', '-', 'Personalia', '-', '-', '5', '2020/2021', '-', '0'),
(100, 'Toko Istana 7', 'Jl . Pangarsan No 1 Purbosari Wonosari Gunungkidul.', 'idpt.istana@gmail.com', '0274 391678', 'Agus Susanto', '-', 'Personalia', '87739802480', '-', '5', '2020/2021', '-', '0'),
(101, 'Dika Motor', 'Gedangan 3 Gedangrejo Karangmojo', '', '', 'Ibnu Setyo Gunawan', '-', 'Personalia', '83125469285', '', '2', '2020/2021', '-', '0'),
(102, 'Adi Jaya Motor', 'Selang Wetan Bendungan Karangmojo', '', '', 'Rahmat Abriana Kurniadi', '-', 'Personalia', '81804407830', '', '2', '2020/2021', '-', '0'),
(104, 'A Queen Motor', 'Kayu walang Kelor Karangmojo', '', '', 'Budi Hartanto', '-', 'Personalia', '87738912020', '', '2', '2020/2021', '-', '0'),
(105, 'Bengkel Bejo', 'Gunungsari Semin Semin', '', '', 'Bejo Suwiji', '-', 'Mekanik', '81328559111', '', '2', '2020/2021', '-', '0'),
(106, 'BMW ( Bengkel Mas Wardi )', 'Ngepung Rt 03/14 Karangmojo Karangmojo', '', '', '', '', '', '', '', '2', '2020/2021', 'Hanif Muhamad Luthfi, S.T', 'Aktif'),
(107, 'Budi Jaya Motor', 'Jl. Taman Bakti Km 2 Wonosari', '', '', 'Budi Wijayanto', '-', 'Mekanik', '81804095485', '', '2', '2020/2021', '-', '0'),
(108, 'Eva Mandiri', 'Sogo, Semanu, Semanu', '', '', '', '', '', '', '', '2', '2020/2021', '-', '0'),
(109, 'HAR Motor', 'Jl. Raya Karangmojo Wonosari', '', '', 'Suhardi, A.Md', '-', 'Personalia', '85876228799', '', '2', '2020/2021', '-', '0'),
(110, 'Hayden Motor', 'Jetis Kulon Semanu Gunungkidul', '', '', '', '', '', '', '', '2', '2020/2021', '-', '0'),
(111, 'Pratama Jaya Motor', 'Besari Siraman Wonosari', '', '', 'Septa Eko Wibowo', '-', 'Personalia', '', '', '2', '2020/2021', '-', '0'),
(112, 'Sumber Baru Motor Wonosari', 'Jl. KH Agus Salim No 197 Kranon Kepek Wonosari', '', '', 'Mudi Ristanto', '-', 'Service Advisor', '8882747800', 'mudny82@gmail.com', '2', '2020/2021', '-', '0'),
(113, 'Sumber Baru Motor Karangmojo', 'Jl Karangmojo - Wonosari KM 1, Karangmojo', '', '', 'Danang Setyawan', '-', 'Service Advisor', '87838393430', '', '2', '2020/2021', 'Muharam Nur Achsany, S.Pd', 'Aktif'),
(114, 'Surya Motor', 'Jl. Karangmojo - Semin,  Candi, Jatiayu, Karangmojo', '', '', 'Surya Baharani Tri Atmaja', '-', '082220776100', '', '', '2', '2020/2021', 'Arif Kurniawan, S.Pd', 'Aktif'),
(115, 'Bengkel Rudjito', 'Karangmojo', '', '', '', '', '', '', '', '1', '2020/2021', 'Devi Vetriyanta, S.Pd.Jas', 'Aktif'),
(118, 'Fany Motor Ahass 09034 Gading', 'Jl. Jogja - Wonosari KM 7 Gading, Playen, Gunungkidul', 'fany_09034@yahoo.co.id', '', 'Wiyono', '-', 'Service Advisor', '087838559069', 'fany_09034@yahoo.co.id', '2', '2020/2021', '-', '0'),
(119, 'BMT An Nur', 'Jl. Karangmojo - Semanu KM 1, Munggur', '', '', '', '', '', '', '', '3', '2020/2021', 'Iwing Vinisyanti, M.Sc', 'Aktif'),
(120, 'Kodim 0730 Gunungkidul', 'Jl. Kesatrian Wonosari', '', '', '', '', '', '', '', '3', '2020/2021', 'Ahsan Fauzi, S.Pd', 'Aktif'),
(121, 'BUKP Ponjong', 'Karangijo Wetan 02/02, Ponjong, Ponjong, Kunungkidul', 'bukp_ponjong@yahoo.co.id', '0819 0415 9830', 'ARIS TRIYANTI, A.Md', '018 900 274', 'Kepala', '0819 0415 9830', 'aristriyanti@gmail.com', '3', '2020/2021', 'Nurfitri Herlinamurti, S.Pd', 'Aktif'),
(122, 'Rio Motor', 'Jirak, Semin, Semin', '', '', 'Osman Prasetyo', '-', 'Kepala Bengkel', '082323130482', '-', '2', '2020/2021', 'Dilyan Eka Saputra, S.Pd', 'Aktif'),
(123, 'Kantor Urusan Agama Kapanewon Semin', 'Jl. Semin - Wonosari KM 12, Semin', '', '', 'Harsono, S.Ag., M.S.I.', '19720124 200501 1 002', 'Kepala KUA', '', '', '4', '2020/2021', 'Yesi Sovi Yulita, S.Pd', 'Aktif'),
(124, 'KP-RI Bangun Wonosari', 'Jl. Kol. Sugiono No 5 Wonosari Gunungkidul', '', '(0274) 391156 / 391164', 'Paimun, M.Pd', '', 'Ketua 1', '0812 2591 4570', '', '5', '2020/2021', 'Erni Setyaningsih, S.Pd', 'Non Aktif'),
(126, 'KP-RI Meter', 'jl. Karangmojo - Semanu No. 16, Munggi, Semanu', '', '', 'Sutrisna, M.Pd', '1965 1113198 91 210001', 'Ketua', '0878 3926 1165', 'sutristrisna65@gmail.com', '3', '2020/2021', 'Anna Revi Nurutami, S.Pd', 'Aktif'),
(127, 'Salim Motor', 'Ganang, Ngawis, Karangmojo', '-', '-', 'Agus Salim', '-', 'Pemilik Bengkel', '088216210340', '-', '2', '2020/2021', 'Muktiyani, S.Pd', 'Aktif'),
(128, 'Maharani Motor', 'Jl. Tambakromo - Ponjong, Ponjong', '', '', 'Puja Istanto', '-', '-', '-', '-', '2', '2020/2021', 'Muharam Nur Achsany, S.Pd', 'Aktif'),
(129, 'Wahyu Widodo Motor', 'jl. Semin - Ngawen KM 3', '', '', 'Widodo', '-', 'Owner', '085643598874', 'widodomas398@gmail.com', '2', '2020/2021', 'Hadi Nur Setyawan, S.Pd.I', 'Aktif'),
(130, 'Palung Motor', 'Sambirejo, Sidorejo, Ponjong', '', '', '', '', '', '', '', '2', '2020/2021', 'Ika Budi Saryati, S.Pd', 'Aktif'),
(131, 'Bengkel Mobil Cronyoz', 'Jl. Eromoko - Bulu KM 2, Eromoko, Wonogiri, Jawa Tengah', '', '', 'Didik Pujianto', '-', 'Kepala Mekanik', '082297027766', '-', '1', '2020/2021', 'Saiman, S.Pd.Jas', 'Aktif'),
(132, 'Dhea Motor', 'Keringan Kidul Bulurejo Semin', '', '', '', '', '', '', '', '2', '2020/2021', 'Hadi Nur Setyawan, S.Pd.I', 'Aktif'),
(133, 'Pilar Motor', 'Karangmojo', '', '', 'Haryadi', '-', 'Owner', '', '', '2', '2020/2021', 'Dilyan Eka Saputra, S.Pd', 'Aktif'),
(135, 'Bengkel Armada Motor', 'Jl. Agus SAlim 15A, Kepek, Wonosari, Gunungkidul', '-', '-', 'Ferry Endrawan, S.H.', '-', 'Pemilik', '-', '-', '1', '2020/2021', 'Muh. Nurudin, S.Pd.I', 'Aktif'),
(136, 'BMT Bus Ponjong', 'jl. Ponjong - Tambakromo, Ponjong', '', '', '', '', '', '', '', '3', '2020/2021', '-', '0'),
(138, 'PT. Sejahtera Sunindo Trada', 'Jl. Diponegoro No.222 Ungaran', '', '', '', '', '', '', '', '1', '2020/2021', 'Kanifathoni Bagaskara, S.Pd', 'Aktif'),
(139, 'KSPPS Giri Arta Syariah Cabang Semin', 'Jl. Ngawen, Widoro Kidul, Bendung, Semin', '', '0877 3952 8688', 'MURYANI, S.E', '', 'MANAGER', '0877 3644 1883', '', '3', '2020/2021', 'Tri Novianti Utami, S.Pd', 'Aktif'),
(140, 'Bengkel Mobil Gapuro Motor', 'Siyono Tengah, RT/RW 37/07, Logandeng, Playen, Gunungkidul', '', '', 'Eko Setiawan', '', 'Pimpinan', '0818026 99512', '', '1', '2020/2021', 'Muh. Nurudin, S.Pd.I', 'Aktif'),
(141, 'Pengadilan Agama Wonosari', 'Jl. KRT. Judoningrat, Siraman, Wonosari', 'pa.wonosari@gmal.com', '(0274) 391325', 'Rogaiyah, S.Ag.', '19760424 200003 2 001', 'Ketua Pengadilan Agama Wonosari', '', '', '4', '2020/2021', 'Sari Retno Wulan, S.Pd', 'Aktif'),
(142, 'Kalurahan Ngandong', 'Ngandong, Eromoko, Wonogiri', '', '', 'Eko Supriyanto', '331208070571002', 'Kepala Desa', '0812 3949 7190', '', '4', '2020/2021', 'Saiman, S.Pd.Jas', 'Aktif'),
(143, 'Kalurahan Semanu', 'Jln. Beringin No.23, Semanu,Semanu', 'semanudesa@gmail.com', '(0274) 393331', 'Drs. Harto Muadzan, M.Si.', '', 'Lurah', '', '', '4', '2020/2021', 'Karmila, S.Pd.I', 'Aktif'),
(144, 'Dinas Pertanahan Nasional Kabupaten Gunungkidul', 'Piyaman Wonosari', '', '', '', '', '', '', '', '4', '2020/2021', 'Ratna Esa Kuswati, S.Pd', 'Aktif'),
(145, 'JD Auto Servis', 'Pranti, Pundong, Srihardono', '', '', '', '', '', '', '', '2', '2020/2021', 'Kanifathoni Bagaskara, S.Pd', 'Aktif'),
(147, 'Ilham Motor', 'Surodadi, Umbulrejo, Ponjong', '', '', '', '', '', '', '', '2', '2020/2021', 'Hanif Muhamad Luthfi, S.T', 'Aktif'),
(148, 'Surya Motor Ponjong', 'Warung Ayu, Ponjong', '', '', '', '', '', '', '', '2', '2020/2021', 'Arif Kurniawan, S.Pd', 'Aktif'),
(149, 'Wijaya Motor', 'Pengkol 3 02/03 Jatiayu, Karangmojo, Gunungkidul', '', '', 'Reza Bobby Partama', '-', 'Owner', '', '-', '2', '2020/2021', 'Muktiyani, S.Pd', 'Aktif'),
(151, 'Putra Jaya Karangmojo', 'Gedangan I, Gedangrejo, Karangmojo', '', '', 'Linda Desvitasari, S.Pd', '-', 'Personalia', '81329422111', 'linda_desvitasari@yahoo.com', '1', '2020/2021', 'Devi Vetriyanta, S.Pd.Jas', 'Aktif'),
(153, 'iduka', 'alamat', 'email_website', 'telp_instansi', 'nama_pembimbing_instansi', 'nip', 'jabatan', 'hp_pembimbing', 'email_pembimbing', 'jurusan', 'tp', 'guru', 'active'),
(154, 'Hendra Motor', 'Jl. Blutak-Semin Gunungkidul', '', '', 'Hendra', '-', 'Kepala Mekanik', '085643233661', '', '2', '', '', ''),
(155, 'Dinas Sosial Kabupaten Gunungkidul', 'Jl. KH. Agus Salim 125, Kepek, Wonosari, Gunungkidul', '', '', 'Dra. Siwi Iriyanti, M.Si', '19621129 198903 2 002', 'Kepala Dinas Sosial', '0274 394226', 'siwiiriyanti@gmail.com', '4', '', '', ''),
(156, 'KSPP Syariah BMT Dana Insani', 'Jl. Tentara Pelajar No. 71, Tegalmulyo, Kepek, Wonosari', '', '', 'Jumari', '-', 'Kepala Cabang BMT Dana Insani Ponjong', '85896149661', '', '3', '', '', ''),
(157, 'Graha Taman Bunga', 'Jl. Pramuka No. 02 Wonosari', '', '', 'Amri Dwi Sucahya', '-', 'Direktur', '-', '', '3', '', '', ''),
(158, 'BM. Mulya Mandiri', 'Mulyosari, Baleharjo 04/02, Wonosari, Gunungkidul', '', '', 'Sugeng Purwanto', '-', '', '81804114123', '', '1', '2020/2021', '', ''),
(159, 'BM. Wulansar', 'Gedangsari, Wonosari', '', '', 'Widodo', '-', 'Personalia', '', '', '1', '2020/2021', '', ''),
(160, 'H.D Motor', 'Gudang, Kampung, Ngawen, Gunungkidul', '', '', 'Riswanto', '-', 'Personalia', '81328566966', '', '1', '2020/2021', '', ''),
(161, 'CV. Central Cemerlang', 'Jl. Wonosari KM. 06, Banguntapan, Bantul, Yogyakarta', '', '', 'Nuryono', '-', 'Koordinator Mekanik', '0274 451087', '', '1', '2020/2021', '', ''),
(162, 'BM. Ismanto', 'Jl. Karangmojo', '', '', '', '', '', '', '', '1', '2020/2021', '', ''),
(163, 'Bintang Motor', 'Jl. RM Said No. 1, Brimbing, Wonogiri', '', '', 'Andrew Novianto Chandra', '-', 'Personalia', '', '', '1', '2020/2021', '', ''),
(164, 'Terapi Motor', '-', '', '', 'Yohanes Sugito', '-', 'Personalia', '87834971845', '', '1', '2020/2021', '', ''),
(165, 'Bengkel Motor Epa Mandiri', 'Pasar Hewan Munggi', '', '', 'Aris Nanto', '-', 'Pimpinan', '88220225866', '', '2', '', '', ''),
(169, 'Kantor Urusan Agama Kepanewon Ponjong', 'Ponjong, RT. 04/RW. 04, Ponjong, Kabupaten Gunung Kidul, Daerah Istimewa Yogyakarta 55892', '', '', 'Ahmad Mun\'im, SHI', '-', 'Kepala KUA', '', '', '4', '', '', ''),
(172, 'HONDA SUMBER CILACAP', 'Jl. Perintis, Kemerdekaan, No.39 Rejanegara,Gumilir, Kec. Cilacap Utara, Jawa Tengah', '', '', 'Alex Cahyo Susanto', '', 'Kepala Bengkel', '', '', '1', '2020/2021', '', ''),
(173, 'PT Maju Lancar Prima', 'Siyono Wetan Logandeng, Playen', '', '', '', '', '', '', '', ' Teknik Kendaraan Ringan Otomotif', '', '', ''),
(174, 'Bengkel Wardoyo Motor', 'Siraman 2, Siraman, Wonosari', '', '', '', '', '', '', '', '1', '2020/2021', '', ''),
(175, 'Dimas Bengkel', 'Jetis Wetan, Pacarejo Semanu, Gunungkidul', '', '', '', '', '', '', '', '1', '2020/2021', '', ''),
(176, 'Bengkel Plat AD Solo Raya', 'Jl. Raya gedongan no.05 Gedongan,Colomadu, Karanganyar, Jawa Tengah', '', '', '', '', '', '', '', ' Teknik Kendaraan Ringan Otomotif', '', '', ''),
(177, 'Yogi Speed', 'Koripan, Eromoko, Wonogiri', '', '', '', '', '', '', '', '1', '2020/2021', '', ''),
(179, 'Bengkel Plat AD Solo Raya', 'Jl. Raya gedongan no.05 Gedongan,Colomadu, Karanganyar, Jawa Tengah', '', '', '', '', '', '', '', '1', '2020/2021', '', ''),
(180, 'Bengkel Ponijo', 'Jl. Sunan Ampel No. 96, Trimulyo 2 Kepek, Wonosari', '', '', '', '', '', '', '', '1', '2020/2021', '', ''),
(181, 'BUKP KARANGMOJO', 'Jl.Raya Karangmojo-Semin', '', '', '', '', '', '', '', '3', '', '', ''),
(182, 'BUKP SEMIN', 'Semin, Kabupaten Gunung Kidul, Daerah Istimewa Yogyakarta 55854', '', '', '', '', '', '', '', '3', '', '', ''),
(183, 'Bengkel GMC', 'Jl.Sukoharjo Watukleir, Pindan, Sukoharjo', '', '', '', '', '', '', '', '1', '2020/2021', '', ''),
(184, 'Kapanewon Semin', 'Jl Semin - Wonosari, Semin, Gunungkidul', '', '', '', '', '', '', '', '4', '', '', ''),
(185, 'Kantor Pos Wonosari', 'Trimulyo I, Kepek, Kec. Wonosari, Kabupaten Gunung Kidul, Daerah Istimewa Yogyakarta', '', '', '', '', '', '', '', '4', '', '', ''),
(186, 'Gajah Mada Auto Service', 'Jl. Kesehatan No. 52 Yogyakarta', '', '', 'Deni Rohmadi, S.Pd.T, M.T', '2010 12 017', 'Manager', '08112653838', 'denirohmadi@gmail.com', '1', '2020/2021', '', ''),
(187, 'Njero Ndeso Auto Service', 'Pranti RT 03, Srihardono, Pundong, Bantul', '', '', 'Nuryadi', '-', 'Pimpinan Bengkel', '087739858300', '-', '1', '2020/2021', '', ''),
(188, 'CV.  Sakura', 'Jl. Rd. Tohir Mangkudijoyo-Karawang ( Jalan Baru Karanganyar- Jatirasa )', '', '', '', '', '', '', '', '1', '2020/2021', '', ''),
(189, 'Bengkel Grand Racing Official', 'Jl. Laksda adisucipto no 18 Demangan, Gondokusuman Yogyakarta', '', '', '', '', '', '', '', '1', '2020/2021', '', ''),
(190, 'Bims Auto Service', 'Cranon 01/06 Kepek Wonosari', '', '', '', '', '', '', '', '1', '2020/2021', '', ''),
(191, 'Bengkel BAZ', 'Prebutan, Semin, Gunungkidul', '', '', '', '', '', '', '', '2', '', '', ''),
(192, 'Bengkel Ilham Motor', 'Turi, Pucung, Eromoko, Wonogiri', '', '', '', '', '', '', '', '2', '', '', ''),
(193, 'Bengkel Sobat Autoparts', 'Karangijo Wetan, Ponjong, Gunugkidul', '', '', '', '', '', '', '', '2', '', '', ''),
(194, 'Istana Kado Ulya', 'Jl. Raya Semin, Semin, Gunungkidul', '', '', '', '', '', '', '', '5', '', '', ''),
(195, 'DUTA MOTOR', 'Jl. Ring Road Timur, Balearjo, Wonosari', '', '', '', '', '', '', '', '1', '2020/2021', '', ''),
(196, 'Bengkel Puspa Indah', 'Jl.Karangmojo-ponjong, Karangmojo', '', '', '', '', '', '', '', '1', '2020/2021', '', ''),
(197, 'Bengkel Mas Baip', 'Mendongan, Bandung Playen', '', '', '', '', '', '', '', '1', '2020/2021', '', ''),
(198, 'Ardi Bengkel', 'Nggebang, Kalitekuk, Semin', '', '', '', '', '', '', '', '1', '2020/2021', '', ''),
(199, 'Kapanewon Karangmojo', 'Jln. Karangmojo-Ponjong KM.0,1,Plumbungan,Karangmojo,Karangmojo', 'karangmojo@gunungkidulkab.go.id', '0274391018', 'Drs. Marwatahadi, M.Si', '19670308 198602 1 002', 'Panewu Kapanewon Karangmojo', '0818 0411 1424', 'marwatahadidrs@gmail.com', '3', '', '', ''),
(200, 'KOPONTREN AN-NUR', 'Komplek Pondok Pesantren An-Nur srimpi Karangmojo,Gunungkidul', 'annur.bmt@gmail.com', '(0274) 4390091', 'RIBATUL MUFASIRIN', '-', 'Manager', '0819 0414 3939', '', '3', '', '', ''),
(202, 'Kantor Urusan Agama Kapanewon Karangmojo', 'Jln. Srimpi, Karangmojo 1, Karangmojo, Karangmojo, Gunungkidul', 'gkkuakarangmojo@gmail.com', '(0274) 4390140', 'Ahmad Djajuli, S.Ag.', '197007011998031002', 'Kepala', '0813 2832 1508', 'ahmad010770@gmail.com', '4', '', '', ''),
(203, 'Kantor ATR/BPN Gunungkidul', 'Jln. Ki Demang Wonopawiro No. 10, Ngrebah 1, Piyaman, Kec. Wonosari, Gunungkidul', 'bpngunungkidul@gmail.com', '(0274) 391376', 'Achmad Suraya, SE', '19640514 198903 1 003', 'Kepala Kantor', '', '', '4', '', '', ''),
(204, 'KPRI Meter Semanu', 'Jl. Karangmojo Semanu No.16, Munggi, Semanu, Kec. Semanu, Kabupaten Gunung Kidul, Daerah Istimewa Yogyakarta 55893', '', '', '', '', '', '', '', ' Akuntansi dan Keuangan Lembaga', '', '', ''),
(205, 'USUL MOTOR', 'Semuluh, Semanu, Gunungkidul', '', '', '', '', '', '', '', '1', '2020/2021', '', ''),
(206, 'Garuda Motor', 'Jl. Karangmojo-Semin Km 05 Karangmojo', '', '', '', '', '', '', '', '2', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_iduka`
--
ALTER TABLE `tbl_iduka`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_iduka`
--
ALTER TABLE `tbl_iduka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
