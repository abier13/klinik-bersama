-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 01, 2021 at 01:41 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuliah_tugas_weblanjut`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` varchar(150) NOT NULL,
  `nama_dokter` varchar(200) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `spesialis` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `jenis_kelamin`, `spesialis`, `alamat`, `no_telp`) VALUES
('10dbb9ca-a528-4f07-bbd8-2c0cbf6f6236', 'dr. Mariyetty Kemuning, Sp.JP', 'Wanita', 'Penyakit Dalam', 'Kota Medan', '0822111232132'),
('7e77d8f0-e951-11eb-8b4a-c85b76b5353c', 'dr. Adila Rossa Amanda Malik, Sp.OG, FFAG', 'Wanita', 'Kandungan dan Ginekologi', 'Jakarta', '08221111111'),
('7e77e4ce-e951-11eb-8b4a-c85b76b5353c', 'dr. Ade Indrisari, Sp.A., M.Kes', 'Wanita', 'Anak', 'Jl. Raya Jogja Sleman', '0822149105'),
('7e77ee81-e951-11eb-8b4a-c85b76b5353c', 'dr. Linardi Widjaja, Sp.S (K)', 'Pria', 'Saraf', 'Surabaya', '08222111111'),
('7e77f9fd-e951-11eb-8b4a-c85b76b5353c', 'dr. Hermansyah, Sp.M', 'Pria', 'Mata', 'Jakarta', '0822112312'),
('7e780431-e951-11eb-8b4a-c85b76b5353c', 'dr. Herlina, Sp.A', 'Wanita', 'Kulit dan Kelamin', 'Jakarta Selatan', '082221213131');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` varchar(100) NOT NULL,
  `nama_obat` varchar(200) NOT NULL,
  `jenis_obat` varchar(50) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `jenis_obat`, `satuan`, `harga`, `keterangan`) VALUES
('1a7a162a-fbf0-4a77-a053-93fd297fab63', 'Aclidinium', 'Bronkodilator', 'Infusa', '7500', 'Meredakan gejala PPOK'),
('3d1d84a5-397d-4ac6-8f18-2d7aaaa9eb13', 'Acitretin', 'Retinoid', 'Kapsul', '13500', 'Meredakan gejala psoriasis yang parah, lichen planus, iktiosis kongenital, dan penyakit Darier\r\n'),
('6f59c5ee-4ba5-426b-b5f4-0bd506013b27', 'Acetylcysteine', 'Obat mukolitik', 'Tablet', '11200', 'Mengencerkan dahak dan mengobati keracunan paracetamol'),
('ad271000-0987-41be-baf1-db659156b3e8', 'Adalimumab', 'Imunosupresan', 'Injeksi', '35700', 'Meredakan gejala peradangan pada penyakit rheumatoid arthritis, juvenile idiopathic arthritis, artritis psoriasis, plak psoriasis, spondylitis ankilosa, kolitis ulseratif, penyakit Crohn, hidradenitis suppurativa, dan uveitis.'),
('bcf04296-e715-11eb-a5ea-c85b76b5353c', 'Acarbose', 'Antidiabetes', 'Tablet', '10000', 'Obat untuk menurunkan kadar gula darah pada penderita diabetes tipe 2'),
('bcf05127-e715-11eb-a5ea-c85b76b5353c', 'Bacitracin', 'Antibiotik polipetida', 'Krim', '25000', 'Obat antibiotik untuk mengobati luka ringan di kulit'),
('bcf0572d-e715-11eb-a5ea-c85b76b5353c', 'Caladine Lotion', 'Obat bebas', 'Losion', '18000', 'Mengatasi rasa gatal di kulit akibat biang keringat dan gigitan serangga'),
('bcf05ca5-e715-11eb-a5ea-c85b76b5353c', 'Dapsone', 'Antibiotik golongan sulfone', 'Gel', '39500', 'Mengobati kusta, dermatitis herpetiformis, dan jerawat'),
('bcf06200-e715-11eb-a5ea-c85b76b5353c', 'Enervon C', 'Multivitamin', 'Tablet', '70400', 'Bermanfaat untuk membantu menjaga daya tahan tubuh');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` varchar(150) NOT NULL,
  `nama_pasien` varchar(200) NOT NULL,
  `dok_identitas` enum('KTP','SIM','Paspor','Kitas') NOT NULL,
  `nomor_identitas` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nama_pasien`, `dok_identitas`, `nomor_identitas`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
('15ca1e5a-f06b-462c-a975-d099db22f3fc', 'Nabila', 'KTP', '3210194209454', 'Wanita', 'Kranggan', '0825408250'),
('3f38a840-89e6-428a-bd69-83ac60006809', 'Ramadhan', 'KTP', '32019348573813', 'Pria', 'Jl. Raya jakarta bogor, cibinong', '08221384572058'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4555', 'Dani', 'KTP', '3201999104384', 'Pria', 'Jalan TB. Simatupang Kav 1, Cilandak Timur, Jakarta Selatan, Indonesia, 12560', '0833242'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4556', 'Hadi', 'KTP', '320100294097906', 'Pria', 'Sukaraja', '08223244852'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4557', 'Rachman', 'KTP', '320100294101699', 'Pria', 'Citeureup', '08223244853'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4558', 'Rahman', 'KTP', '320100294099395', 'Pria', 'Cilincing', '08223244854'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4559', 'Rifai', 'KTP', '320100294101311', 'Pria', 'Sukamiskin', '08223244855'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4560', 'Slam', 'KTP', '320100294100411', 'Pria', 'Pancoran Mas', '08223244856'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4561', 'Maulana', 'KTP', '320100294099300', 'Pria', 'Sukaraja', '08223244857'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4562', 'Ckasinta', 'KTP', '320100294105697', 'Wanita', 'Citeureup', '08223244858'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4563', 'Nadya', 'KTP', '320100294097066', 'Wanita', 'Cilincing', '08223244859'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4564', 'Feggy', 'KTP', '320100294100399', 'Wanita', 'Sukamiskin', '08223244860'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4565', 'Peter', 'KTP', '320100294103467', 'Pria', 'Pancoran Mas', '08223244861'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4566', 'Armelia', 'KTP', '320100294104630', 'Wanita', 'Sukaraja', '08223244862'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4567', 'Arya', 'KTP', '320100294099257', 'Pria', 'Citeureup', '08223244863'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4568', 'Ahmad', 'KTP', '320100294100368', 'Pria', 'Cilincing', '08223244864'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4570', 'Lucky', 'KTP', '320100294105007', 'Pria', 'Pancoran Mas', '08223244866'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4571', 'Gracia', 'KTP', '320100294105317', '', 'Sukaraja', '08223244867'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4572', 'Yolanda', 'KTP', '320100294104064', 'Wanita', 'Citeureup', '08223244868'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4573', 'Hazana', 'KTP', '320100294099283', 'Wanita', 'Cilincing', '08223244869'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4574', 'Aulia', 'KTP', '320100294099077', 'Wanita', 'Sukamiskin', '08223244870'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4575', 'Rida', 'KTP', '320100294099599', 'Wanita', 'Pancoran Mas', '08223244871'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4576', 'Denis', 'KTP', '320100294104529', 'Pria', 'Sukaraja', '08223244872'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4577', 'sinta', 'KTP', '320100294100085', 'Wanita', 'Citeureup', '08223244873'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4578', 'Putri', 'KTP', '320100294103328', 'Wanita', 'Cilincing', '08223244874'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4579', 'Widi', 'KTP', '320100294104237', 'Wanita', 'Sukamiskin', '08223244875'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4581', 'Ichsan', 'KTP', '320100294104235', 'Pria', 'Sukaraja', '08223244877'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4582', 'Meisa', 'KTP', '320100294103182', 'Wanita', 'Citeureup', '08223244878'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4583', 'Dita', 'KTP', '320100294104217', 'Wanita', 'Cilincing', '08223244879'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4584', 'Rosyanda', 'KTP', '320100294104264', 'Pria', 'Sukamiskin', '08223244880'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4585', 'Muhammad', 'KTP', '320100294107925', 'Wanita', 'Pancoran Mas', '08223244881'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4586', 'Rizky', 'KTP', '320100294098267', 'Pria', 'Sukaraja', '08223244882'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4587', 'Ita', 'KTP', '320100294331067', 'Wanita', 'Citeureup', '08223244883'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4588', 'Rendi', 'KTP', '320100294096084', 'Pria', 'Cilincing', '08223244884'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4589', 'Annisa', 'KTP', '320100294138357', 'Wanita', 'Sukamiskin', '08223244885'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4591', 'Khansa', 'KTP', '320100294096489', 'Wanita', 'Sukaraja', '08223244887'),
('68d46ff0-f2bb-4bb6-a045-fb81936e4592', 'Mita', 'KTP', '320100294100559', 'Pria', 'Citeureup', '08223244888'),
('c4319a72-f44c-4f54-a92d-a138716c5526', 'Septianti', 'SIM', '99923529985', 'Wanita', 'Cibungbulan', '08231131413'),
('d24e457d-3902-4a31-bc89-b0b04f296fa2', 'Danita', 'KTP', '3201910492924', 'Wanita', 'Bojong Nangka', '0823134142456'),
('d3fb3864-e95e-11eb-8b4a-c85b76b5353c', 'Ilham', 'KTP', '32010111112312', 'Pria', 'Sentul, Bogor', '08221312'),
('f1bb779a-a6c9-4242-9bfb-4ba210f7575e', 'Basyar', 'KTP', '321092952903605', 'Pria', 'Cinangneng', '0833223425');

-- --------------------------------------------------------

--
-- Table structure for table `tb_poliklinik`
--

CREATE TABLE `tb_poliklinik` (
  `id_poli` varchar(100) NOT NULL,
  `nama_poli` varchar(200) NOT NULL,
  `lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_poliklinik`
--

INSERT INTO `tb_poliklinik` (`id_poli`, `nama_poli`, `lokasi`) VALUES
('053b88c6-b707-4a9c-b2a5-55daf0241906', 'Kulit dan Kelamin', 'Ruang 4'),
('1aee5e89-fedd-4229-b442-2138710e905e', 'Mata', 'Ruang 6'),
('4e9eefc9-d6af-4cca-8f33-d1831846e176', 'Anak', 'Ruang 1'),
('796fe574-e964-11eb-8b4a-c85b76b5353c', 'Penyakit Dalam', 'Ruang 3'),
('811f291e-5910-44e4-98cb-f9f38305e899', 'Kandungan dan Ginekologi', 'Ruang 2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekam_medis`
--

CREATE TABLE `tb_rekam_medis` (
  `id_rm` varchar(100) NOT NULL,
  `id_pasien` varchar(100) NOT NULL,
  `id_dokter` varchar(100) NOT NULL,
  `id_poli` varchar(100) NOT NULL,
  `keluhan` text NOT NULL,
  `diagnosa` text NOT NULL,
  `tgl_periksa` date NOT NULL,
  `jenis_pembayaran` enum('BPJS','Cash') DEFAULT NULL,
  `total_pembayaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekam_medis`
--

INSERT INTO `tb_rekam_medis` (`id_rm`, `id_pasien`, `id_dokter`, `id_poli`, `keluhan`, `diagnosa`, `tgl_periksa`, `jenis_pembayaran`, `total_pembayaran`) VALUES
('0d9fa972-9f02-4634-b71e-654998b12091', '68d46ff0-f2bb-4bb6-a045-fb81936e4555', '7e77d8f0-e951-11eb-8b4a-c85b76b5353c', '1aee5e89-fedd-4229-b442-2138710e905e', 'as', 'as', '2021-07-25', 'Cash', '56200'),
('5caa4912-78ab-4d98-975d-2cd9d8ff1264', '15ca1e5a-f06b-462c-a975-d099db22f3fc', '7e77d8f0-e951-11eb-8b4a-c85b76b5353c', '811f291e-5910-44e4-98cb-f9f38305e899', 'Mual-mual', 'Hormon kehamilan', '2021-07-25', 'Cash', '80700'),
('77925622-0d2e-4c29-986d-6c86875c6fef', 'd3fb3864-e95e-11eb-8b4a-c85b76b5353c', '7e77ee81-e951-11eb-8b4a-c85b76b5353c', '4e9eefc9-d6af-4cca-8f33-d1831846e176', 'Demam', 'Demam', '2021-07-20', 'BPJS', '0'),
('d9220812-5939-42b5-85cf-c10cd85200fb', '68d46ff0-f2bb-4bb6-a045-fb81936e4555', '10dbb9ca-a528-4f07-bbd8-2c0cbf6f6236', '053b88c6-b707-4a9c-b2a5-55daf0241906', 'Mual', 'Lambung', '2021-07-21', 'Cash', '55000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rm_obat`
--

CREATE TABLE `tb_rm_obat` (
  `id_rm_obat` int(11) NOT NULL,
  `id_rm` varchar(100) NOT NULL,
  `id_obat` varchar(100) NOT NULL,
  `catatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rm_obat`
--

INSERT INTO `tb_rm_obat` (`id_rm_obat`, `id_rm`, `id_obat`, `catatan`) VALUES
(1, '4b06bca4-16d4-4a7b-b84e-7e967d80ebe5', 'bcf0572d-e715-11eb-a5ea-c85b76b5353c', 'Balurin'),
(2, '77925622-0d2e-4c29-986d-6c86875c6fef', 'bcf05ca5-e715-11eb-a5ea-c85b76b5353c', '3x1 Sebelum Makan'),
(3, '77925622-0d2e-4c29-986d-6c86875c6fef', 'bcf05127-e715-11eb-a5ea-c85b76b5353c', '3x1 Sesudah Makan'),
(5, '190e1098-64e7-46e8-80d4-bc04613e2346', 'bcf0572d-e715-11eb-a5ea-c85b76b5353c', 'asdad'),
(6, 'd9220812-5939-42b5-85cf-c10cd85200fb', 'bcf04296-e715-11eb-a5ea-c85b76b5353c', '3x1'),
(7, '5caa4912-78ab-4d98-975d-2cd9d8ff1264', 'ad271000-0987-41be-baf1-db659156b3e8', '3x1 Sebelum Makan'),
(8, '3d7d46f6-d9b8-4cc7-9441-3524f342e24f', '1a7a162a-fbf0-4a77-a053-93fd297fab63', '3x1 Sesudah Makan'),
(9, '0d9fa972-9f02-4634-b71e-654998b12091', '6f59c5ee-4ba5-426b-b5f4-0bd506013b27', 'as');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(150) NOT NULL,
  `nama_user` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` enum('superadmin','dokter','apoteker') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
('c33a3189-e6c5-11eb-a69b-c85b76b5353c', 'Administrator', 'superadmin', '889a3a791b3875cfae413574b53da4bb8a90d53e', 'superadmin'),
('d728559a-0a17-405b-93eb-9d220ec96440', 'Apoteker', 'apoteker', '8e30c3e6d50e5d7c02e7eaffa5954b04d4a3afaf', 'apoteker'),
('f428069e-4e34-42ec-ada9-dabf282222a1', 'Dokter Budi', 'dokter_budi', '30a96cdbc1205b1ed4ae399350fe8f6d839f32cc', 'dokter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD UNIQUE KEY `nomor_identitas` (`nomor_identitas`);

--
-- Indexes for table `tb_poliklinik`
--
ALTER TABLE `tb_poliklinik`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `tb_rekam_medis`
--
ALTER TABLE `tb_rekam_medis`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_dokter_2` (`id_dokter`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indexes for table `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  ADD PRIMARY KEY (`id_rm_obat`),
  ADD KEY `id_rm` (`id_rm`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_rm_2` (`id_rm`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  MODIFY `id_rm_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_rekam_medis`
--
ALTER TABLE `tb_rekam_medis`
  ADD CONSTRAINT `rm_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rm_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rm_poli` FOREIGN KEY (`id_poli`) REFERENCES `tb_poliklinik` (`id_poli`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  ADD CONSTRAINT `rmobat_obat` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
