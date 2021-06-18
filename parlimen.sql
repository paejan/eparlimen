-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 02:57 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parlimen`
--

-- --------------------------------------------------------

--
-- Table structure for table `ahliparlimen`
--

CREATE TABLE `ahliparlimen` (
  `id_ap` int(11) NOT NULL,
  `nama_ap` varchar(100) CHARACTER SET utf8 NOT NULL,
  `no_kp_ap` varchar(14) CHARACTER SET utf8 DEFAULT NULL,
  `kod_kaw_ap` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `kawasan_ap` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `status_ap` tinyint(4) DEFAULT 0,
  `gambar` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `type` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `tempoh` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `tkh_mula` date DEFAULT NULL,
  `tkh_tamat` date DEFAULT NULL,
  `parti` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0,
  `delete_by` varchar(32) DEFAULT NULL,
  `delete_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ahliparlimen`
--

INSERT INTO `ahliparlimen` (`id_ap`, `nama_ap`, `no_kp_ap`, `kod_kaw_ap`, `kawasan_ap`, `status_ap`, `gambar`, `type`, `tempoh`, `tkh_mula`, `tkh_tamat`, `parti`, `is_deleted`, `delete_by`, `delete_dt`) VALUES
(95, 'Y.B. Tuan Mohd Nasir bin Zakaria', NULL, 'P.007', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(96, 'YB DATO\' MAHFUZ BIN HAJI OMAR', NULL, 'P.008', NULL, 0, 'p.008-pokok_sena.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(98, 'Y.B. Tuan Haji Ahmad bin Kasim', NULL, 'P.010', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(99, 'Y.B. Dr. Haji Mohd Hayati bin Othman', NULL, 'P.011', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(100, 'Y.B. Tuan Mohd Firdaus bin Jaafar', NULL, 'P.012', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(101, 'Y.B. Tuan Che Uda bin Che Nik', NULL, 'P.013', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(103, 'YB DATO\' JOHARI BIN ABDUL', NULL, 'P.015', NULL, 0, 'p.015-sungai_petani.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(104, 'Y.B. Tuan Taib Azamudden bin Md Taib', NULL, 'P.016', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(105, 'Y.B. Tuan Gobalakrishnan a/l Nagapan', NULL, 'P.017', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(106, 'Y.B. Tuan Zulkifli bin Noordin', NULL, 'P.018', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(111, 'YB PUAN HAJAH SITI ZAILAH BINTI MOHD YUSOFF', NULL, 'P.023', NULL, 0, 'p.023-rantau_panjang.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(112, 'Y.B. Tuan Salahuddin bin Haji Ayub', NULL, 'P.024', NULL, 1, NULL, 'AP', '', '2013-05-01', '2013-05-06', NULL, 0, NULL, NULL),
(113, 'Y.B. Tuan Haji Nasharudin bin Mat Isa', NULL, 'P.025', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(114, 'Y.B. Tuan Haji Ab Aziz bin Ab Kadir', NULL, 'P.026', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(115, 'Y.B. Tuan Amran bin Ab Ghani', NULL, 'P.027', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(116, 'YB DR. NIK MUHAMMAD ZAWAWI BIN HAJI SALLEH', NULL, 'P.028', NULL, 0, 'p.028-pasir_puteh.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(117, 'Y.B. Tuan Saifuddin Nasution bin Ismail', NULL, 'P.029', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(119, 'YB TUAN ABDUL LATIFF BIN ABDUL RAHMAN', NULL, 'P.031', NULL, 0, 'p.031-kuala_krai.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(120, 'YB TENGKU RAZALEIGH HAMZAH', NULL, 'P.032', NULL, 0, 'p032.jpg', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(121, 'Y.B. Dato\' Dr. Abdullah bin Md Zin', NULL, 'P.033', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(124, 'Y.B. Tuan  Mohd Abdul Wahid Endut', NULL, 'P.036', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(126, 'Y.B. Tuan Haji Mohd Nor bin Othman', NULL, 'P.038', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(127, 'Y.B. Tuan Matulidi bin Jusoh', NULL, 'P.039', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(128, 'YB TUAN CHE ALIAS BIN HAMID', NULL, 'P.040', NULL, 0, 'p.040-kemaman.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(129, 'Y.A.B. Abdullah bin Haji Ahmad Badawi', NULL, 'P.041', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(130, 'Y.B. Tan Sri Nor Mohamed Yakcop', NULL, 'P.042', NULL, 1, NULL, 'AP', '', NULL, '2013-05-05', NULL, 0, NULL, NULL),
(131, 'YB TUAN LIM GUAN ENG', NULL, 'P.043', NULL, 0, 'p.043-bagan.png', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(133, 'Y.B. Puan Chong Eng', NULL, 'P.045', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(134, 'Y.B. Prof. Dr. P. Ramasamy a/l Palanisamy', NULL, 'P.046', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(135, 'Y.B. Tuan Tan Tee Beng', NULL, 'P.047', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(136, 'Y.B. Tuan Liew Chin Tong', NULL, 'P.048', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(137, 'Y.B. Tuan Chow Kon Yeow', NULL, 'P.049', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(138, 'YB TUAN SANISVARA NETHAJI RAYER A/L RAJAJI', NULL, 'P.050', NULL, 0, 'p.050-jelutong.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(139, 'YB TUAN RAMKARPAL SINGH A/L KARPAL SINGH', NULL, 'P.051', NULL, 0, 'p.051-bukit_gelugor.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(141, 'Y.B. Tuan Mohd Yusmadi bin Mohd Yusoff', NULL, 'P.053', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(145, 'YB DATO\' DR MUJAHID YUSOF RAWA', NULL, 'P.057', NULL, 0, 'p.057-parit_buntar.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(146, 'Y.B. Tuan Mohsin Fadzli bin Haji Samsuri', NULL, 'P.058', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(147, 'Y.B. Tuan Roslan bin Shaharum', NULL, 'P.059', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(148, 'YB TUAN TEH KOK LIM', NULL, 'P.060', NULL, 0, 'p.060-taiping.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(150, 'YB TUAN KESAVAN A/L SUBRAMANIAM', NULL, 'P.062', NULL, 0, 'p.062-sungai_siput.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(151, 'YB TUAN AHMAD FAIZAL BIN AZUMU', NULL, 'P.063', NULL, 0, 'p.063-tambun.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(152, 'Y.B. Tuan Lim Kit Siang', NULL, 'P.064', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(153, 'YB TUAN M. KULASEGARAN', NULL, 'P.065', NULL, 0, 'p.065-ipoh_barat.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(154, 'Y.B. Puan Fong Po Kuan', NULL, 'P.066', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(155, 'Y.B. Tan Sri Rafidah binti Abd. Aziz', NULL, 'P.067', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(157, 'Y.B. Tuan Mohd Nizar bin Zakaria', NULL, 'P.069', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(158, 'Y.B. Datuk Lee Chee Leong', NULL, 'P.070', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(159, 'YB DR. LEE BOON CHYE', NULL, 'P.071', NULL, 0, 'p.071-gopeng.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(160, 'YB DATUK SERI M. SARAVANAN', NULL, 'P.072', NULL, 0, 'p.072-tapah.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(164, 'Y.B. Tuan Manogaran a/l Marimuthu', NULL, 'P.076', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(166, 'Y.B. Dato\' Devamany a/l S.Krishnasamy', NULL, 'P.078', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(167, 'Y.B. Dato\' Dr. Mohamad Shahrum bin Osman', NULL, 'P.079', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(169, 'Y.B.M. Dato\'  Tengku Azlan Ibni Almarhum Sultan Abu Bakar', NULL, 'P.081', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(170, 'Y.B. Tuan Azan bin Ismail', NULL, 'P.082', NULL, 1, NULL, 'AP', '', '2013-06-03', NULL, NULL, 0, NULL, NULL),
(171, 'YB PUAN FUZIAH BINTI SALLEH', NULL, 'P.083', NULL, 0, 'p.083-kuantan.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(172, 'YB TUAN MOHD SHAHAR BIN ABDULLAH', NULL, 'P.084', NULL, 0, 'p.084-paya_besar.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(175, 'YB DATO\' SRI DR. HAJI ISMAIL BIN HAJI MOHAMED SAID', NULL, 'P.087', NULL, 0, 'p.087-kuala_krau.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(179, 'YB DATO\' SRI HASAN BIN ARIFIN', NULL, 'P.091', NULL, 0, 'p.091-rompin.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(180, 'Y.B. Datuk Abd. Rahman bin Bakri', NULL, 'P.092', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(181, 'Y.B. noriah kasnon', NULL, 'P.093', NULL, 1, 'p093.jpg', 'AP', '', '2013-05-01', NULL, NULL, 0, NULL, NULL),
(184, 'Y.B. Dr. Haji Dzulkefly Ahmad', NULL, 'P.096', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(185, 'YB TUAN WILLIAM LEONG JEE KEEN', NULL, 'P.097', NULL, 0, 'p.097-selayang.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(186, 'YB DATO\' SERI MOHAMED AZMIN BIN ALI', NULL, 'P.098', NULL, 0, 'p.098-gombak.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(187, 'YB PUAN HJJH ZURAIDA BINTI KAMARUDDIN ', NULL, 'P.099', NULL, 0, 'p.099-ampang.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(189, 'YB USTAZ HAJI HASANUDDIN BIN MOHD YUNUS', NULL, 'P.101', NULL, 0, 'p.101-hulu_langat.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(190, 'Y.B. Puan Teo Nie Ching', NULL, 'P.102', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(191, 'YB TUAN GOBIND SINGH DEO', NULL, 'P.103', NULL, 0, 'p.103-puchong.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(192, 'Y.B. Tuan Gwo-Burne Loh', NULL, 'P.104', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(193, 'YB PUAN MARIA CHIN BINTI ABDULLAH', NULL, 'P.105', NULL, 0, 'p.105-petaling_jaya.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(194, 'YB TUAN TONY PUA KIAM WEE', NULL, 'P.106', NULL, 0, 'p.106-damansara.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(195, 'YB TUAN SIVARASA RASIAH', NULL, 'P.107', NULL, 0, 'p.107-sungai_buloh.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(196, 'YB TUAN KHALID BIN ABD SAMAD', NULL, 'P.108', NULL, 0, 'p.108-shah_alam.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(197, 'Y.B. Tuan Manikavasagam a/l Sundaram', NULL, 'P.109', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(198, 'Y.B. Charles Anthony Santiago', NULL, 'P.110', NULL, 0, 'p110.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(199, 'Y. B. Hajah Siti Mariah binti Mahmud', NULL, 'P.111', NULL, 0, 'p111-kotaraja.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(200, 'Y.B. Abdullah Sani bin Abdul Hamid', NULL, 'P.112', NULL, 0, 'p112.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(202, 'Y. B. Dr. Tan Seng Giaw', NULL, 'P.114', NULL, 0, 'p114.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(203, 'Y.B. Chua Tian Chang @ Tian Chua', NULL, 'P.115', NULL, 0, 'p115.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(204, 'Y.B. Tuan Wee Choo Keong', NULL, 'P.116', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(205, 'Y. B. Lim Lip Eng', NULL, 'P.117', NULL, 0, 'p117.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(207, 'Y.B. Dr. Lo\' Lo\' binti Hj Mohamad Ghazali', NULL, 'P.119', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(208, 'Y.B. Fong Kui Lun', NULL, 'P.120', NULL, 0, 'p120.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(209, 'Y.B. Puan Nurul Izzah binti Anwar', NULL, 'P.121', NULL, 0, 'p121.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(210, 'Y. B. Puan Teresa Kok Suh Sim', NULL, 'P.122', NULL, 0, 'p122.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(211, 'Y. B. Tan Kok Wai', NULL, 'P.123', NULL, 0, 'p123.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(212, ' Y.B. Tan Sri Dato\' Seri Abd Khalid bin Ibrahim', NULL, 'P.124', NULL, 0, 'p124.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(213, 'Y.B. Datuk Seri Tengku Adnan bin Tengku Mansor', NULL, 'P.125', NULL, 0, 'p125.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(216, 'Y.B Tuan John a/l Fernandez', NULL, 'P.128', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(218, 'Y.B. Tuan Loke Siew Fook', NULL, 'P.130', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(219, 'Y. B. Khairy Jamaluddin', NULL, 'P.131', NULL, 0, 'p131.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(222, 'Y.B. Datuk Wira Abu Seman bin Haji Yusop', NULL, 'P.134', NULL, 1, NULL, 'AP', '', NULL, '2013-05-05', NULL, 0, NULL, NULL),
(224, 'Y.B. Datuk Ir. Haji Idris bin Haji Haron', NULL, 'P.136', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(225, 'Y.B. Datuk Md Sirat bin Abu', NULL, 'P.137', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(226, 'Y. B. Sim Tong Him', NULL, 'P.138', NULL, 0, 'p138.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(227, 'Y.B. Datuk Wira Haji Ahmad bin Hamzah', NULL, 'P.139', NULL, 0, 'p139.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(228, 'Y. B. Dato\' Seri Dr. S. Subramaniam', NULL, 'P.140', NULL, 0, 'p140.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(229, 'Y.B. Datuk Haji Baharum bin Haji Mohamed', NULL, 'P.141', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(230, 'Y.B. Datuk Chua Tee Yong', NULL, 'P.142', NULL, 0, 'p142.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(231, 'Y.A.B. Tan Sri Dato\' Haji Muhyiddin bin Mohd. Yassin', NULL, 'P.143', NULL, 0, 'p143.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(232, 'Y.B. Datuk Ir. Haji Hamim bin Samuri', NULL, 'P.144', NULL, 0, 'p144.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(233, 'Y.B. Er Teck Hwa', NULL, 'P.145', NULL, 0, 'p145.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(236, 'Y. B. Datuk Ir. Dr. Wee Ka Siong', NULL, 'P.148', NULL, 0, 'p148.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(237, 'Y.B. Datuk Haji Mohamad bin Haji Aziz', NULL, 'P.149', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(238, 'Y.B. Dr. Mohd Puad bin Zarkashi', NULL, 'P.150', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(239, 'Y.B. Liang Teck Meng', NULL, 'P.151', NULL, 0, 'p151.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(240, 'Y.B. Dr. Hou Kok Chung', NULL, 'P.152', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(243, 'Y.B. Datuk Halimah binti Mohd Sadique', NULL, 'P.155', NULL, 0, 'p155.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(244, 'Y.B. Datuk Seri Syed Hamid bin Syed Jaafar Albar', NULL, 'P.156', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(246, 'Y.B. Tuan Teng Boon Soon', NULL, 'P.158', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(249, 'Y.B. Datuk Nur Jazlan bin Mohamed', NULL, 'P.161', NULL, 0, 'p161.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(250, 'Y.B. Puan Tan Ah Eng', NULL, 'P.162', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(252, 'Y.B. Datuk Haji Ahmad bin Haji Maslan', NULL, 'P.164', NULL, 0, 'p164.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(253, 'Y.B. Datuk Wee Jeck Seng', NULL, 'P.165', NULL, 0, 'p165.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(254, 'Y.B. Datuk Haji Yussof bin Haji Mahal', NULL, 'P.166', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(256, 'Y.B. Datuk Seri Panglima Dr. Maximus Johnity Ongkili', NULL, 'P.168', NULL, 0, 'p168.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(258, 'Y.B. Datuk Seri Panglima Mojilip bin Bumburing @ Wilfred', NULL, 'P.170', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(259, 'Y.B. Datuk Enchin bin Majimbun @ Eric', NULL, 'P.171', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(260, 'Y.B. Tuan Hiew King Cheu', NULL, 'P.172', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(261, 'Y.B. Datuk Dr. Makin @ Makcus Mojigoh', NULL, 'P.173', NULL, 0, 'p173.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(262, 'Y.B. Tan Sri Bernard Giluk Dompok', NULL, 'P.174', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(263, 'Y. B. Datuk Rosnah binti Haji Abdul Rashid Shirlin', NULL, 'P.175', NULL, 0, 'p175.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(265, 'Y.B. Datuk Seri Panglima Haji Lajim bin Haji Ukin', NULL, 'P.177', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(266, 'Y.B. Datuk Sapawi bin Haji Amat Wasali @ Ahmad', NULL, 'P.178', NULL, 0, 'p178.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(267, 'Y.B. Datuk Siringan bin Gubat', NULL, 'P.179', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(268, 'Y.B. Tan Sri Datuk Seri Panglima Joseph Pairin Kitingan', NULL, 'P.180', NULL, 0, 'p180.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(269, 'Y. B. Datuk Raime bin Unggi', NULL, 'P.181', NULL, 0, 'p181.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(270, 'Y.B. Tan Sri Datuk Seri Panglima Joseph Kurup', NULL, 'P.182', NULL, 0, 'p182.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(271, 'Y. B. Datuk Ronald Kiandee', NULL, 'P.183', NULL, 0, 'p183.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(272, 'Y.B. Datuk Juslie Bin Ajirol', NULL, 'P.184', NULL, 0, 'p184.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(273, 'Y.B. Datuk Ir. Edmund Chong Ket Wah @ Chong Ket Fah', NULL, 'P.185', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(274, 'Y.B. Datuk Liew Vui Keong', NULL, 'P.186', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(276, 'Y.B. Tuan Haji Salleh bin Kalbi', NULL, 'P.188', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(279, 'Y.B. Datuk Seri Panglima Haji Abdul Ghapur bin Salleh', NULL, 'P.191', NULL, 0, 'p191.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(280, 'Y.B. Datuk Dr. Tekhee @Tiki anak Lafe', NULL, 'P.192', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(281, 'Y.B. Datuk Dr. Wan Junaidi bin Tuanku Jaafar', NULL, 'P.193', NULL, 0, 'p193.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(282, 'Y.B. Datuk Haji Fadillah Bin Haji Yusof', NULL, 'P.194', NULL, 0, 'p194.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(283, 'Y.B. Tuan Chong Chieng Jen', NULL, 'P.195', NULL, 0, 'p195.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(286, 'Y.B. Dato\' Dr. James Dawos Mamit', NULL, 'P.198', NULL, 0, 'p198.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(287, 'Y. B. Datuk Richard Riot  Anak Jaem', NULL, 'P.199', NULL, 0, 'p199.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(288, 'Y.B. Hajah Nancy binti  Shukri', NULL, 'P.200', NULL, 0, 'p200.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(289, 'Y. B. Datuk Hajah Rohani binti Haji Abd. Karim', NULL, 'P.201', NULL, 0, 'p201.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(290, 'Y. B. Masir Anak Kujat', NULL, 'P.202', NULL, 0, 'p202.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(291, 'Y. B.  William @ Nyallau Anak Badak', NULL, 'P.203', NULL, 0, 'p203.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(293, 'Y.B. Tuan Jelaing Anak Mersat', NULL, 'P.205', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(294, 'Y.B. Datuk Hajah Norah binti Abdul Rahman', NULL, 'P.206', NULL, 0, 'p206.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(295, 'Y.B. Datuk Abdul Wahab bin Dolah', NULL, 'P.207', NULL, 0, 'p207.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(296, 'Y.B. Tuan Ding Kuong Hiing', NULL, 'P.208', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(298, 'Y.B. Tuan Ago Anak Dagang', NULL, 'P.210', NULL, 1, NULL, 'AP', '', '2013-06-24', '2013-06-22', NULL, 0, NULL, NULL),
(299, 'Y.B. Tuan Tiong Thai King', NULL, 'P.211', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(300, 'Y.B. Datuk Robert Lau Hoi Chew', NULL, 'P.212', NULL, 1, NULL, 'AP', '', NULL, NULL, NULL, 0, NULL, NULL),
(302, 'Y.B. Datuk Joseph Entulu Anak Belaun', NULL, 'P.214', NULL, 0, 'p214.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(303, 'Y.B. Datuk Alexander Nanta Linggi', NULL, 'P.215', NULL, 0, 'p215.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(304, 'Y.B. Tuan Abit Joo', NULL, 'P.216', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(305, 'Y. B. Dato\' Seri Tiong King Sing', NULL, 'P.217', NULL, 0, 'p217.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(306, 'Y.B. Tuan Haji Ahmad Lai bin Bujang', NULL, 'P.218', NULL, 0, 'p218.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(307, 'Y.B. Datuk Peter Chin Fah Kui', NULL, 'P.219', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(309, 'Y.B. Tuan Haji Hasbi bin Habibollah', NULL, 'P.221', NULL, 0, 'p221.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(310, 'Y.B. Dato\' Henry Sum Agong', NULL, 'P.222', NULL, 0, 'p222.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(311, 'Y.B. Sen. Tuan A. Kohilan Pillay a/l G. Appu ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-GERAKAN', 0, 'akohilan.jpg', 'AD', '12.02.2011 - 11.02.2014', NULL, NULL, NULL, 0, NULL, NULL),
(312, 'Y.B. Sen. Tan Sri Dato\' Seri Dr. Abdul Hamid bin Pawanteh ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-UMNO', 0, NULL, 'AD', '12-08-2018 - 20-02-2020', NULL, NULL, NULL, 0, NULL, NULL),
(313, 'Y.B. Sen. Dato\' Haji Abdul Rahman bin Bakar ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong', 0, 'abd_rahman_bakar.jpg', 'AD', '18.07.2011-17.07.2014', NULL, NULL, NULL, 0, NULL, NULL),
(314, 'Y.B. Sen. Dato\' Haji Abdul Rashid Bin Ngah ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-UMNO', 1, NULL, 'AD', '', NULL, '2020-03-19', NULL, 0, '1', '2020-03-19 20:29:17'),
(315, 'Y.B. Sen. Tuan Haji Ahamat @ Ahamad bin Yusop ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong', 0, 'ahamat_yusop.jpg', 'AD', '04.07.2011 - 03.07.2014', NULL, NULL, NULL, 0, NULL, NULL),
(316, 'Y.B. Sen. Tuan Ahmad Bin Hussin .', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-UMNO', 0, 'ahmad_husin.jpg', 'AD', '25.04.2009 - 24.04.2012', NULL, NULL, NULL, 0, NULL, NULL),
(317, 'Y.B. Sen. Dato\' Ahmad Rusli Bin Hj. Iberahim ', NULL, NULL, 'Dipilih Oleh DUN Negeri Kelantan  - PAS', 0, 'ahmad_rusli.jpg', 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(318, 'Y.B. Sen. Datuk Akbar bin Ali ', NULL, NULL, 'Dipilih Oleh DUN Negeri Melaka  - BN-UMNO', 0, 'akbar_ali.jpg', 'AD', '06.08.2008 - 05.08.2011', NULL, NULL, NULL, 0, NULL, NULL),
(319, 'Y.B. Sen. Tan Sri Amirsham A. Aziz ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-UMNO', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(320, 'Y.B. Sen. Datuk Armani binti Haji Mahiruddin ', NULL, NULL, 'Dipilih Oleh DUN Negeri Sabah  - BN-UMNO', 0, 'armani_mahiruddin.jpg', 'AD', '21.12.2008-20.12.2011', NULL, NULL, NULL, 0, NULL, NULL),
(321, 'Y.B. Sen. Dato\' Azian bin Osman ', NULL, NULL, 'Dipilih Oleh DUN Negeri Perak  - BN-UMNO', 0, 'azianosman.jpg', 'AD', '22.08.2009 - 21.08.2012', NULL, NULL, NULL, 0, NULL, NULL),
(322, 'Y.B. Sen. Datuk Hajah Azizah binti Abd. Samad ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-UMNO', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(323, 'Y.B. Sen. Datuk Chandrasekar Suppiah ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-MIC', 0, 'chandra_sekar.jpg', 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(324, 'Y.B. Sen. Datuk Chew Vun Ming ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-MCA', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(325, 'Y.B. Sen. Daljit Singh a/l Gurdev Singh ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-MIC', 0, 'daljit_singh.jpg', 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(328, 'Y.B. Sen. Puan Heng Seai Kie ', NULL, NULL, 'Dipilih Oleh DUN Negeri Perak  - BN-MCA', 0, 'heng_seai_kie.jpg', 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(329, 'Y.B. Sen. Dato\' Ir. Hiang A Li ', NULL, NULL, 'Dipilih Oleh DUN Negeri Pahang  - BN-MCA', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(330, 'Y.B. Sen. Dato\' Haji Idris bin Buang ', NULL, NULL, 'Dipilih Oleh DUN Negeri Sarawak  - BN-PBB', 0, 'idris_buang.jpg', 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(331, 'Y.B. Sen. Dato\' Ikhwan Salim bin Dato\' Haji Sujak ', NULL, NULL, 'Dipilih Oleh DUN Negeri Selangor  - BN-UMNO', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(332, 'Y.B. Sen. Prof. Datuk Dr Ismail bin Md Salleh ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-UMNO', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(333, 'Y.B. Sen. Dato\' Kamarudin bin Ambok ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-UMNO', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(334, 'Y.B. Sen. Tuan Khoo Soo Seang ', NULL, NULL, 'Dipilih Oleh DUN Negeri Johor  - BN-MCA', 0, 'khoo_soo_seang.jpg', 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(335, 'Y.B. Sen. Tuan Krishnan a/l Tan Sri Dato N.S Maniam ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-MIC', 0, 'ramakrishnan-w.jpg', 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(336, 'Y.B. Sen. Tuan Lee Chee Keong ', NULL, NULL, 'Dipilih Oleh DUN Negeri Sembilan  - BN-MCA', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(337, 'Y.B. Sen. Dato\' Lee Sing Chooi ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-MCA', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(338, 'Y.B. Sen. Puan Loga Chitra a/p M. Govindasamy ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-MIC', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(339, 'Y.B. Sen. Datuk Maijol bin Mahap ', NULL, NULL, 'Dipilih Oleh DUN Negeri Sabah  - BN-UPKO', 0, 'maijol_mahap.jpg', 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(340, 'Y.B. Senator Dato\' Dr. Mashitah binti Ibrahim ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong', 0, 'mashitah.jpg', 'AD', '18.3.2011 - 17.3.2014', NULL, NULL, NULL, 0, NULL, NULL),
(341, 'YB Senator Dato\' Maznah binti Mazlan ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong', 0, 'maznah.jpg', 'AD', '18.04.2011 - 17.04.2014', NULL, NULL, NULL, 0, NULL, NULL),
(342, 'Y.B. Sen. Tan Sri Datuk Dr. Mohamed Jin bin Samsudin @ Jins Shamsudin ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-UMNO', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(343, 'Y.B. Sen. Dato Sri Mohd Effendi bin Norwawi ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-PBB', 0, 'mohd_effendi.jpg', 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(344, 'YB Senator Tuan Haji Muhamad Yusof bin Husin', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri Kedah', 0, 'muhammadyusof.jpg', 'AD', '21.05.2011 - 20.05.2014', NULL, NULL, NULL, 0, NULL, NULL),
(345, 'Y.B. Sen. Tan Sri Dato\' Seri Muhammad bin Muhammad Taib ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-UMNO', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(346, 'Y.B. Sen. Puan Hajah Mumtaz Binti Md Nawi ', NULL, NULL, 'Dipilih Oleh DUN Negeri Kelantan  - PAS', 0, 'mumtaz..jpg', 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(347, 'Y.B. Sen. Tuan Murugiah a/l Thopasamy ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-PPP', 0, 'murugiah.jpg', 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(348, 'Y.B. Sen. Dato\' Musa Bin Haji Sheikh Fadzir ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-UMNO', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(349, 'Y.B. Sen. Datin Paduka Datuk Nor Hayati Binti Tan Sri Dato\' Seri Onn ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-UMNO', 0, 'nor_hayati2.jpg', 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(350, 'Y.B. Sen. Puan Nordiana binti Datuk Shafie ', NULL, NULL, 'Dipilih Oleh Dun Negeri Terengganu  - BN-UMNO', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(351, 'Y.B. Sen. Dato\' Omar bin Faudzar ', NULL, NULL, 'Dipilih Oleh DUN Negeri Pulau Pinang  - BN-UMNO', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(352, 'Y.B. Sen. Tuan Osman bin Bungsu ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - WAKIL ORANG ASLI', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(353, 'YB Senator Datuk Pau Chiong Ung', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, 'pau_chiong_ung.jpg', 'AD', '13.12.2010 - 12.12.2013', NULL, NULL, NULL, 0, NULL, NULL),
(354, 'Y.B. Sen. Tuan Rawisandran a/l Narayanan ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-MIC', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(355, 'Y.B. Sen. Datuk Haji Rizuan bin Abd Hamid ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-UMNO', 0, 'hj_rizuan_(1).jpg', 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(356, 'Y.B. Sen. Datuk Haji Roslan Bin Awang Chik ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-UMNO', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(358, 'Y.B. Sen. Dato\' Hajah Saripah Aminah binti Haji Syed Mohamed ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-UMNO', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(359, 'Y.B. Sen. Tuan Haji Shamsudin bin Mehat ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-UMNO', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(360, 'Y.B. Sen. Puan Hajah Sharifah Azizah binti Dato\' Syed Zain ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-UMNO', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(361, 'Y.B. Sen. Datuk Sim Kheng Hui ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-SUPP', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(363, 'Y.B. Sen. Puan Siw Chun a/p Eam ', NULL, NULL, 'Dipilih Oleh DUN Negeri Pahang  - WAKIL MASYARAKAT THAI', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(364, 'Y.B. Sen. Datuk Soon Tian Szu ', NULL, NULL, 'Dipilih Oleh DUN Negeri Melaka  - BN-MCA', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(365, 'Y.B. Sen. Datuk Wira Syed Ali bin Tan Sri Syed Abbas Alhabshee ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-UMNO', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(366, 'Y.B. Sen. Tan Sri Tee Hock Seng ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-MCA', 0, 'tee_hock_seng.jpg', 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(367, 'Y.B. Sen. Puan Usha Nandhini a/p S. Jayaram ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-MIC', 0, 'usha_nandhini.jpg', 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(369, 'Y.B. Sen. Puan Hajah Wan Hazani binti Wan Mohd Nor ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-UMNO', 0, 'wan_hazani.jpg', 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(370, 'Y.B. Sen. Dato\' Wan Nordin Bin Che Murat ', NULL, NULL, 'Dipilih Oleh DUN Negeri Perlis  - BN-UMNO', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(371, 'Y.B. Sen. Puan Hajah Wan Ramlah binti Wan Ahmad ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-UMNO', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(373, 'Y.B. Sen Dato\' Wong Siong Hwee ', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong  - BN-MCA', 0, NULL, 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(375, 'Y.B. Sen. Tuan  Zamri bin Yusuf ', NULL, NULL, 'Dipilih Oleh DUN Negeri Kedah  - PKR', 0, 'zamriyusof.jpg', 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(378, 'YB Senator Dr. Ramakrishnan a/l Suppiah', NULL, NULL, 'Dipilih oleh DUN Selangor - DAP', 0, 'ramakrishnan-w.jpg', 'AD', '', NULL, NULL, NULL, 0, NULL, NULL),
(379, 'YB Senator Dato\' Dr. Firdaus bin Haji Abdullah', NULL, NULL, 'Dilantik oleh Yang Dipertuan Agong ', 0, 'firdaus_abdullah.jpg', 'AD', '26.01.2012 - 25.01.2015', NULL, NULL, NULL, 0, NULL, NULL),
(380, 'YB Senator Dr. Syed Husin Ali', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri Selangor', 0, 'syed_husin_ali-w.jpg', 'AD', '17.12.2012 - 16.12.2015', NULL, NULL, NULL, 0, NULL, NULL),
(381, 'YB Senator Datuk Doris Sophia Ak Brodi', NULL, NULL, 'Dilantik oleh Yang di-Pertuan Agong', 0, 'doris_sophia.jpg', 'AD', '12.03.2013 - 11.03.2016', NULL, NULL, NULL, 0, NULL, NULL),
(382, 'YB Sen. Puan HajahZainun binti A. Bakar, ', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri Terengganu', 0, 'zainun-w.jpg', 'AD', '15.04.2009 - 14.04.2012', NULL, NULL, NULL, 0, NULL, NULL),
(387, 'YB Dato\' Abidin bin Osman (Meninggal)', NULL, 'P.094', NULL, 1, NULL, 'AP', '', NULL, NULL, NULL, 0, NULL, NULL),
(388, 'YB PUAN JUNE LEOW HSIAD HUI', NULL, 'P.094', NULL, 0, 'p.094-hulu_selangor.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(389, 'YB USTAZ HAJI AHMAD MARZUK BIN SHAARY ', NULL, 'P.020', NULL, 0, 'p.020-pengkalan_chepa.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(390, 'YB Dato\' Lilah bin Yasin', NULL, 'P.127', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(391, 'Y.B. Datuk Bung Moktar bin Radin', NULL, 'P.187', NULL, 0, 'p187.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(392, 'YB DATO\' DR. SHAMSUL ANUAR BIN NASARAH', NULL, 'P.055', NULL, 0, 'p.055-lenggong.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(393, 'Y.B. Dato\' Noraini binti Ahmad', NULL, 'P.147', NULL, 0, 'p147.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(394, 'YB Dato\' Ismail bin Kasim', NULL, 'P.003', NULL, 1, 'p003-arau[1].jpg', 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(395, 'YB Tuan Wong Ho Leng', NULL, 'P.212', NULL, 1, 'wong%20ho%20leng-w[1].jpg', 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(396, 'YB Dato\' Haji Wan Abd. Rahim bin Wan Abdullah', NULL, 'P.021', NULL, 1, 'p021-kotabharu[1].jpg', 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(397, 'YB DATO\' SRI DR HJ ISMAIL BIN HJ ABD MUTTALIB', NULL, 'P.086', NULL, 0, 'p086.jpg', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(398, 'YB Senator Dato\' Haji Abdul Rahim bin Abdul Rahman', NULL, NULL, 'Dilantik oleh YDP Agong', 0, 'abdul_rahim-w.jpg', 'AD', '3.5.2010 hingga 2.5.2013', NULL, NULL, NULL, 0, NULL, NULL),
(399, 'YB Senator Tan Sri Abu Zahar bin Dato Nika Ujang', NULL, NULL, 'Dilantik oleh Yang Di-Pertuan Agong (Yang di-Pertua Dewan Negara)', 0, 'abu_zahar.jpg', 'AD', '26.4.2010 hingga 25.4.2013', NULL, NULL, NULL, 0, NULL, NULL),
(400, 'YB Senator Puan Hajah Dayang Madinah binti Tun Abang Haji Openg', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri Sarawak', 0, 'dayang_madinah-w.jpg', 'AD', '19.07.2010 - 18.07.2013', NULL, NULL, NULL, 0, NULL, NULL),
(401, 'YB Datuk Hajah Fatimah binti Hamat', NULL, NULL, 'Dilantik oleh Dewan Undangan Negeri Terengganu', 0, 'fatimah_hamat.jpg', 'AD', '23.12.2008 - 22.12.2011', NULL, NULL, NULL, 0, NULL, NULL),
(402, 'YB Dato\' Haji Kamarudin bin Haji Ambok', NULL, NULL, 'Dilantik oleh Yang di-Pertuan Agong', 0, 'kamarudin%20ambok[1][1].jpg', 'AD', '26.8.2007 - 25.8.2010', NULL, NULL, NULL, 0, NULL, NULL),
(403, 'YB Senator Datuk Paul Kong Sing Chu', NULL, NULL, 'Dilantik oleh Yang di-Pertuan Agong', 0, 'paul_kong_sing_chu-w.jpg', 'AD', '9.12.2009 - 8.12.2012', NULL, NULL, NULL, 0, NULL, NULL),
(404, 'YB Senator Dato\' Muhammad Olian Bin Abdullah', NULL, NULL, 'Dilantik oleh Yang di-Pertuan Agong', 0, 'muhammad_olian-w.jpg', 'AD', '10.12.2012 - 09.12.2015', NULL, NULL, NULL, 0, NULL, NULL),
(405, 'Y.B. Dato\' Sri Azalina binti Othman Said', NULL, 'P.157', NULL, 0, 'p157.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(406, 'YB Sen. Dato\' Gooi Hoe Hin', NULL, NULL, 'Dilantik oleh Dewan Undangan Negeri Pulau Pinang', 0, 'image015.jpg', 'AD', '30.5.2006 - 29.5.2009', NULL, NULL, NULL, 0, NULL, NULL),
(407, 'YB DATO\' DR. MOHD KHAIRUDDIN BIN AMAN RAZALI', NULL, 'P.035', NULL, 0, 'p.035-kuala_nerus.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(408, 'YB Dato\' Hajah Siti Rokiah binti Mohd Zabidin', NULL, NULL, 'Dilantik oleh Yang DiPertuan Agong', 0, '000555.bmp', 'AD', '23.12.2005 - 22.12.2008', NULL, NULL, NULL, 0, NULL, NULL),
(409, 'YB Dato\' Seri Empiang Jabu', NULL, NULL, 'Dilantik oleh DUN', 0, '000555.bmp', 'AD', '14.10.2005 - 13.10.2008', NULL, NULL, NULL, 0, NULL, NULL),
(410, 'Y.B. Dato\' Haji Abdul Rahman bin Haji Dahlan', NULL, 'P.169', NULL, 0, 'p169.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(411, 'YB Dato\' Paduka Bakar bin Taib', NULL, 'P.004', NULL, 1, 'p004-langkawi.jpg', 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(412, 'YB DATO\' NGEH KOO HAM', NULL, 'P.068', NULL, 0, 'p.068-beruas.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(413, 'Y.B. Dato Sri Dr. Muhammad Leo Michael Toyad Abdullah', NULL, 'P.213', NULL, 0, 'p213.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(414, 'YB Dato\' Sri Ir. Mohd Zin bin Mohamed', NULL, 'P.113', NULL, 1, '0609pod05.jpg', 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(415, 'Y.B. Dato\' Kamarul Baharin bin Abbas', NULL, 'P.132', NULL, 0, 'p132.jpg', 'AP', '', '2013-05-05', NULL, NULL, 0, NULL, NULL),
(416, 'YB Dato\' Ibrahim bin Ali', NULL, 'P.022', NULL, 1, '0609pod05.jpg', 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(418, 'YB Sen. Ir. Haji Zamri bin Haji Yusuf', NULL, NULL, 'PKR', 0, 'zamriyusof.jpg', 'AD', '20.5.2008 - 19.5.2011', NULL, NULL, NULL, 0, NULL, NULL),
(419, 'YB DATO\' SERI HAJI ABDUL HADI AWANG', NULL, 'P.037', NULL, 0, 'p.037-marang.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(420, 'YB Senator Puan Hajah Mariany binti Mohammad Yit ', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, 'mariany.jpg', 'AD', '15.12.2010 - 14.12.2013', NULL, NULL, NULL, 0, NULL, NULL),
(421, ' Y.B. Sen. Dato\' Hajah Zaitun Binti Mat', NULL, NULL, 'BN - UMNO', 1, 'zaitun-w.jpg', 'AD', '27.04.2009 - 26.04.2012', NULL, NULL, NULL, 0, NULL, '2016-03-01 12:45:54'),
(422, ' YB Senator Dato\' Syed Ibrahim bin Kader', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, 'syed_ibrahim.jpg', 'AD', '30.05.2011 - 29.05.2014', NULL, NULL, NULL, 0, NULL, NULL),
(424, 'YB Senator Datuk Haji Yunus bin Haji Kurus', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, 'yunus_kurus.jpg', 'AD', '30.05.2011 - 29.05.2014', NULL, NULL, NULL, 0, NULL, NULL),
(425, 'Y.B. Sen. Dato\' Mohammed Najeeb Bin Abdullah', NULL, NULL, 'BN - UMNO', 0, 'mohammed_najeeb_w.jpg', 'AD', '26.04.2010 - 25.04.2013', NULL, NULL, NULL, 0, NULL, NULL),
(426, 'Y.B. Sen. Tan Sri Abu Zahar Bin Dato\' Nika Ujang', NULL, NULL, 'Yang Dipertua Dewan Negara', 0, 'abu_zahar.jpg', 'AD', '26.04.2010 - 25.04.2013', NULL, NULL, NULL, 0, NULL, NULL),
(427, 'Y.B Datuk Dr Awang Adek Bin Hussein', NULL, NULL, 'BN - UMNO,Timbalan Menteri Kewangan', 0, 'awang_adek-latest-w.jpg', 'AD', '09.04.2009-08.04.2012Kementerian Kewangan Aras 11,', NULL, NULL, NULL, 0, NULL, NULL),
(428, 'Y.B. Dato\' Zahrain Mohamed Hashim', NULL, 'P.052', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(429, 'Y.B. Dato\' Seri Haji Azmi Bin Khalid', NULL, 'P.001', NULL, 1, NULL, 'AP', '', '2020-09-01', NULL, NULL, 0, NULL, NULL),
(430, 'Y.B. Dato\' Seri Mohammad Nizar bin Jamaluddin', NULL, 'P.059', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(431, 'Y.B. Sen. Dato\' Mustafa Kamal bin Mohd. Yusoff', NULL, NULL, 'PKR', 0, '', 'AD', '31.05.2009-30.05.2012', NULL, NULL, NULL, 0, NULL, NULL),
(432, 'Y.B Dato\' Seri Mohd Radzi Bin Sheikh Ahmad', NULL, 'P.002', NULL, 1, NULL, 'AP', '', NULL, '2013-05-04', NULL, 0, NULL, NULL),
(433, 'YB Datuk Seri Chor Chee Heung', NULL, 'P.009', NULL, 1, NULL, 'AP', '', '2008-03-03', '2013-05-04', NULL, 0, NULL, NULL),
(434, 'YB DATO\' HAJI AMIRUDDIN BIN HAMZAH', NULL, 'P.006', NULL, 0, 'p.006-kubang_pasu.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(435, 'Y.B. Sen. Puan Hajah Noriah Binti Mahat', NULL, NULL, 'BN-UMNO', 0, '', 'AD', '03.05.2010-02.05.2013', NULL, NULL, NULL, 0, NULL, NULL),
(436, 'YB DATO\' SRI HAJI TAJUDDIN BIN ABDUL RAHMAN', NULL, 'P.073', NULL, 0, 'p.073-pasir_salak.png', 'AP', '', '2018-07-16', NULL, NULL, 0, NULL, NULL),
(437, 'YB Senator Dato\' Dr Johari bin Mat', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri Kelantan', 0, '', 'AD', '07.07.2011 - 06.07.2014', NULL, NULL, NULL, 0, NULL, NULL),
(439, 'Y.B. Sen. Tuan Haji Abdul Shukor bin P A Mohd Sultan', NULL, NULL, 'Dilantik Oleh Yang Dipertuan Agong', 0, '', 'AD', '25.04.2012-24.04.2015', NULL, NULL, NULL, 0, NULL, NULL),
(440, 'YB Senator Tuan Mohd Khalid bin Ahmad', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri Perlis', 0, '', 'AD', '25.04.2012 - 24.04.2015', NULL, NULL, NULL, 0, NULL, NULL),
(441, 'YB Senator Puan Hajah Rohani binti Abdullah', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri Terengganu', 0, '', 'AD', '26.01.2012 - 25.01.2015', NULL, NULL, NULL, 0, NULL, NULL),
(443, 'Y.B. Sen. Dr. Ariffin bin S.M. Omar', NULL, NULL, 'Dilantik oleh Yang Di-Pertua Agong', 0, '', 'AD', '1.6.2012 - 31.5.2015', NULL, NULL, NULL, 0, NULL, NULL),
(445, 'Y.B.Sen. Tuan Baharudin bin Hj Abu Bakar', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, '', 'AD', '06.09.2011- 05.09.2014', NULL, NULL, NULL, 0, NULL, NULL),
(446, 'Y.B.Sen. Dato\' Boon Som a/l Inong', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, '', 'AD', '15.12.2010 - 14.12.2013', NULL, NULL, NULL, 0, NULL, NULL),
(447, 'YB Senator Puan Chew Lee Giok', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, '', 'AD', '13.12.2010-12.12.2013', NULL, NULL, NULL, 0, NULL, NULL),
(448, 'YB Senator Tuan Chiew Lian Keng', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, '', 'AD', '2.11.2011 - 1.11.2014', NULL, NULL, NULL, 0, NULL, NULL),
(450, 'YB Senator Dato\' Sri Abdul Wahid bin Omar', NULL, NULL, 'Yang di-Pertuan Agong', 0, '', 'AD', '05.06.2013 - 04.06.2016', NULL, NULL, NULL, 0, NULL, NULL),
(451, 'YB Senator Dato\' Paduka Ahmad Bashah bin Md Hanipah', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, '', 'AD', '15.05.2013 - 14.05.2016', NULL, NULL, NULL, 0, NULL, NULL),
(452, 'YB Senator Tuan Chandra Mohan a/l S. Thambirajah', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri', 0, '', 'AD', '17.12.2012 - 16.12.2015', NULL, NULL, NULL, 0, NULL, NULL),
(453, 'YB Senator Datuk Chin Su Phin', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, '', 'AD', '30.05.2011 - 29.05.2014', NULL, NULL, NULL, 0, NULL, NULL),
(454, 'YB Senator Datuk Chiw Tiang Chai', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, '', 'AD', '22.08.2011 - 21.08.2014', NULL, NULL, NULL, 0, NULL, NULL),
(455, 'YB Senator Dato\' Sri Idris Jala', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, '', 'AD', '03.09.2012 - 2.09.2015', NULL, NULL, NULL, 0, NULL, NULL),
(456, 'YB Senator Datuk Jamilah@Halimah binti Sulaiman', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, '', 'AD', '07.11.2012 - 06.11.2015', NULL, NULL, NULL, 0, NULL, NULL),
(457, 'YB Senator Dato\' Jaspal Singh a/l Gurbakhes Singh', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, '', 'AD', '02.11.2011 - 01.11.2014', NULL, NULL, NULL, 0, NULL, NULL),
(458, 'YB Senator Datuk Kadzim bin M.Yahya', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri Sabah', 0, '', 'AD', '22.12.2011 - 21.12.2014', NULL, NULL, NULL, 0, NULL, NULL),
(459, 'YB Senator Puan Hajah Khairiah binti Mohamed', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri Kelantan', 0, '', 'AD', '30.06.2012 - 29.06.2015', NULL, NULL, NULL, 0, NULL, NULL),
(460, 'YB Senator Tan Sri Dr Koh Tsu Koon', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, '', 'AD', '09.04.2012 - 08.04.2015', NULL, NULL, NULL, 0, NULL, NULL),
(461, 'YB Senator Tuan Lihan Jok', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri Sarawak', 0, '', 'AD', '07.12.2011 - 06.12.2014', NULL, NULL, NULL, 0, NULL, NULL),
(462, 'YB Senator Dato\' Lim Nget Yoon', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri Pahang', 0, '', 'AD', '22.05.2012 - 21.05.2015', NULL, NULL, NULL, 0, NULL, NULL),
(463, 'YB Senator Dato\' Dr Loga Bala Mohan a/l Jaganathan', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, '', 'AD', '15.05.2013 - 14.05.2016', NULL, NULL, NULL, 0, NULL, NULL),
(464, 'YB Senator Dr. Lucas bin Umbul', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri Sabah', 0, '', 'AD', '10.12.2012 - 09.12.2015', NULL, NULL, NULL, 0, NULL, NULL),
(465, 'YB Senator Dato\' Nallakaruppan a/l Solaimalai', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, '', 'AD', '02.11.2011 - 01.11.2014', NULL, NULL, NULL, 0, NULL, NULL),
(466, 'YB Senator Puan Norliza binti Abdul Rahim', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, '', 'AD', '30.05.2011 - 29.05.2014', NULL, NULL, NULL, 0, NULL, NULL),
(467, 'YB Senator Datuk Paul Low Seng Kuan', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, '', 'AD', '15.05.2013 - 14.05.2016', NULL, NULL, NULL, 0, NULL, NULL),
(468, 'YB Senator Datuk Raja Ropiaah binti Raja Abdullah', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, '', 'AD', '09.04.2012 - 08.04.2015', NULL, NULL, NULL, 0, NULL, NULL),
(469, 'YB Senator Puan Roslin binti Hj. Abdul Rahman', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri Pahang', 0, '', 'AD', '22.05.2012 - 21.05.2015', NULL, NULL, NULL, 0, NULL, NULL),
(470, 'YB Senator Puan S. Bagiam a/p Ayem Perumal', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, '', 'AD', '22.08.2011 - 21.08.2014', NULL, NULL, NULL, 0, NULL, NULL),
(471, 'YB Senator Datuk Hj Saat bin Hj Abu', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri Melaka', 0, '', 'AD', '15.11.2011 - 14.11.2014', NULL, NULL, NULL, 0, NULL, NULL),
(472, 'YB Senator Tuan Saiful Izham bin Ramli', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri Kedah', 0, '', 'AD', '21.05.2011 - 20.05.2014', NULL, NULL, NULL, 0, NULL, NULL),
(473, 'YB Senator Datuk Subramaniam a/l Veruthasalam', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, '', 'AD', '22.08.2011 - 21.08.2014', NULL, NULL, NULL, 0, NULL, NULL),
(474, 'YB Senator Tuan Syed Shahir bin Syed Mohamud', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri Pulau Pinang', 0, '', 'AD', '01.06.2012 - 31.05.2015', NULL, NULL, NULL, 0, NULL, NULL),
(475, 'YB Senator Tuan Waytha Moorthy Ponnusamy', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, '', 'AD', '05.06.2013 - 04.06.2016', NULL, NULL, NULL, 0, NULL, NULL),
(476, 'YB Senator To\' Puan Zaitun binti Mat Amin', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri Terengganu', 0, '', 'AD', '08.06.2012 - 07.06.2015', NULL, NULL, NULL, 0, NULL, NULL),
(477, 'YB DATO\' SAIFUDDIN ABDULLAH', NULL, 'P.082', NULL, 0, 'p.082-indera_mahkota.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(479, 'Y.B. Datuk Aaron Ago anak Dagang', NULL, 'P.210', NULL, 0, 'p210.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(480, 'Y.B. Datuk Ab. Aziz bin Kaprawi', NULL, 'P.149', NULL, 0, 'p149.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(481, 'YB DATO\' SAIFUDDIN NASUTION BIN ISMAIL', NULL, 'P.018', NULL, 0, 'p.018-kulim_bandar_baru.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(482, 'Y.B. Datuk Abd Rahim Bin Bakri', NULL, 'P.167', NULL, 0, 'p167.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(483, 'Y.B. Datuk Dr. Haji Abd. Latiff Bin Ahmad', NULL, 'P.154', NULL, 0, 'p154.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(484, 'YB DATUK SERI PANGLIMA ABDUL AZEEZ BIN ABDUL RAHIM', NULL, 'P.016', NULL, 0, 'p.016-baling.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(485, 'YB DATOâ€™ HJ ABDUL RAHMAN BIN MOHAMAD', NULL, 'P.079', NULL, 0, 'p.079-lipis.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(486, 'Y.B. Datuk Dr. Abu Bakar Bin Mohamad Diah', NULL, 'P.136', NULL, 0, 'p136.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(487, 'YB DATO\' TUAN IBRAHIM BIN TUAN MAN', NULL, 'P.024', NULL, 0, 'p.024-kubang_kerian.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(488, 'Y.B. Dato\' Ahmad Fauzi Bin Zahari', NULL, 'P.118', NULL, 0, 'p118.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(489, 'YB DATUK AHMAD JAZLAN BIN YAAKUB', NULL, 'P.029', NULL, 0, 'p.029-machang.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(490, 'YB TUAN NIK MOHAMAD ABDUH BIN NIK ABDUL AZIZ', NULL, 'P.025', NULL, 0, 'p.025-bachok.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(491, 'YB DATO\' HJ AHMAD NAZLAN BIN IDRIS', NULL, 'P.081', NULL, 0, 'p.081-jerantut.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(492, 'YB DATO\' SERI DR. AHMAD ZAHID BIN HAMIDI', NULL, 'P.075', NULL, 0, 'p075.jpg', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(493, 'Y.B. Alice Lau Kiong Yieng', NULL, 'P.211', NULL, 0, 'p211.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(494, 'Y.B. Dato\' Sri Anifah bin Haji Aman', NULL, 'P.176', NULL, 0, 'p176.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(495, 'YB TAN SRI DATUK SERI PANGLIMA HAJI ANNUAR BIN HAJI MUSA', NULL, 'P.026', NULL, 0, 'p.026-ketereh.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(496, 'Y.B. Anuar Bin Abd. Manap', NULL, 'P.141', NULL, 0, 'p141.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(497, 'YB PUAN NURUL IZZAH BINTI ANWAR', NULL, 'P.044', NULL, 0, 'p.044-permatang_pauh.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(498, 'Y.B. Anyi Ngau', NULL, 'P.220', NULL, 0, 'p220.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(499, 'Y.B. Datuk Hajah Azizah Binti Datuk Seri Panglima Mohd. Dun', NULL, 'P.177', NULL, 0, 'p177.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(500, 'YB DR. AZMAN BIN ISMAIL', NULL, 'P.010', NULL, 0, 'p.010-kuala_kedah.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(501, 'YB TUAN SHAHARIZUKIRNAIN BIN ABD KADIR', NULL, 'P.034', NULL, 0, 'p.034-setiu.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(502, 'Y.B. Datuk Datu Nasrun Bin Datu Mansur', NULL, 'P.188', NULL, 0, 'p188.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(503, 'Y.B. Dato\' Sri Douglas Uggah Embas', NULL, 'P.204', NULL, 0, 'p204.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(504, 'Y.B. Datuk Dr. Ewon Ebin', NULL, 'P.179', NULL, 0, 'p179.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(505, 'YB TUAN CHAN MING KAI', NULL, 'P.009', NULL, 0, 'p.009-alor_setar.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(506, 'YB DATO\' SERI HAMZAH BIN ZAINUDIN', NULL, 'P.056', NULL, 0, 'p.056-larut.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(507, 'Y.B. Dato\' Hasan bin Malek', NULL, 'P.129', NULL, 0, 'p129.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(508, 'YB DATO\' HASBULLAH BIN OSMAN', NULL, 'P.054', NULL, 0, 'p.054-gerik.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(509, 'YB TUAN MUHAMMAD BAKHTIAR BIN WAN CHIK', NULL, 'P.053', NULL, 0, 'p.053-balik_pulau.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(510, 'Y.B. Dato\' Seri Hishammuddin bin Tun Hussein', NULL, 'P.153', NULL, 0, 'p153.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(511, 'YB DATO\' SYED ABU HUSSIN BIN HAFIZ SYED ABDUL FASAL', NULL, 'P.059', NULL, 0, 'p.059-bukit_gantang.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(512, 'YB DATO\' SERI HAJI IDRIS BIN JUSOH', NULL, 'P.033', NULL, 0, 'p.033-besut.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL);
INSERT INTO `ahliparlimen` (`id_ap`, `nama_ap`, `no_kp_ap`, `kod_kaw_ap`, `kawasan_ap`, `status_ap`, `gambar`, `type`, `tempoh`, `tkh_mula`, `tkh_tamat`, `parti`, `is_deleted`, `delete_by`, `delete_dt`) VALUES
(513, 'Y.B. Ignatius Dorell Leiking', NULL, 'P.174', NULL, 0, 'p174.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(514, 'YB DATO\' SRI IKMAL HISHAM BIN ABDUL AZIZ', NULL, 'P.027', NULL, 0, 'p.027-tanah_merah.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(515, 'YB DR. HAJI DZULKEFLY BIN AHMAD', NULL, 'P.096', NULL, 0, 'p.096-kuala_sleangor.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(516, 'YB PUAN NOR AZRINA BINTI SURIP', NULL, 'P.014', NULL, 0, 'p.014-merbok.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(517, 'YB DATO\' SERI HAJI MUKHRIZ TUN DR. MAHATHIR', NULL, 'P.005', NULL, 0, 'p.005-jerlun.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(518, 'YB. Datuk Zahidi Bin Zainul Abidin', NULL, 'P.001', NULL, 1, 'person.jpg', 'AP', NULL, '2018-07-16', '2020-03-19', NULL, 0, '1', '2020-03-19 17:23:24'),
(519, 'YB DATO\' SRI ISMAIL SABRI BIN YAAKOB', NULL, 'P.090', NULL, 0, 'p.090-bera.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(520, 'YB DATO\' HAJI CHE ABDULLAH BIN MAT NAWI', NULL, 'P.019', NULL, 0, 'p.019-tumpat.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(521, 'YB DATO\' SRI MUSTAPA BIN MOHAMED', NULL, 'P.030', NULL, 0, 'p.030-jeli.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(522, 'YB DATO\' SERI MOHAMED NAZRI BIN ABDUL AZIZ', NULL, 'P.061', NULL, 0, 'p.061-padang_rengas.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(523, 'YB DR. MOHD HATTA BIN MD RAMLI', NULL, 'P.074', NULL, 0, 'p.074-lumut.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(524, 'YB TUAN CHANG LIH KANG', NULL, 'P.077', NULL, 0, 'p.077-tanjong_malim.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(525, 'YB TENGKU ZULPURI SHAH BIN RAJA PUJI', NULL, 'P.080', NULL, 0, 'p.080-raub.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(526, 'YB DATO\' SRI MOHD NAJIB BIN TUN ABD RAZAK', NULL, 'P.085', NULL, 0, 'p.085-pekan.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(527, 'YB TUAN HAJI MOHD. ANNUAR MOHD. TAHIR', NULL, 'P.088', NULL, 0, 'p.088-temerloh.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(528, 'YB TUAN WONG TACK', NULL, 'P.089', NULL, 0, 'p.089-bentong.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(529, 'YB TAN SRI NOH BIN HAJI OMAR', NULL, 'P.095', NULL, 0, 'p095.jpg', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(530, 'YAB DATO\' SERI DR WAN AZIZAH WAN ISMAIL', NULL, 'P.100', NULL, 0, 'p.100-ampang.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(531, 'Y.B. Haji Zainudin Bin Haji Ismail', NULL, 'P.126', NULL, 0, 'p126.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(532, 'Y.B. Datuk Seri Shaziman Abu Mansor', NULL, 'P.133', NULL, 0, 'p133.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(533, 'Y.B. Datuk Koh Nai Kwong', NULL, 'P.135', NULL, 0, 'p135.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(534, 'Y.B. Dato\' Razali Ibrahim', NULL, 'P.146', NULL, 0, 'p146.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(535, 'Y.B. Normala Binti Abdul Samad', NULL, 'P.159', NULL, 0, 'p159.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(536, 'Y.B. Tan Sri Datuk Seri Utama Shahrir bin Abdul Samad', NULL, 'P.160', NULL, 0, 'p160.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(537, 'Y.B. Teo Nie Ching', NULL, 'P.163', NULL, 0, 'p163.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(538, 'Y.B. Dato\' Seri Haji Mohd. Shafie bin Haji Apdal', NULL, 'P.189', NULL, 0, 'p189.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(539, 'Y.B. Datuk Yap Kain Ching @ Mary Yap Ken Jin', NULL, 'P.190', NULL, 0, 'p190.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(540, 'Y.B. Julian Tan Kok Ping', NULL, 'P.196', NULL, 0, 'p196.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(541, 'Y.B. Rubiah Binti Haji Wang', NULL, 'P.197', NULL, 0, 'p197.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(542, 'Y.B. Datuk Joseph Salang Gandum', NULL, 'P.209', NULL, 0, 'p209.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(543, 'YB DATIN MASTURA BINTI MOHD YAZID', NULL, 'P.067', NULL, 0, 'p.067-kuala_kangsar.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(544, 'YB DATO\' ROSOL BIN WAHID', NULL, 'P.038', NULL, 0, 'p.038-hulu_terengganu.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(545, ' YB TUAN SABRI BIN AZIT', NULL, 'P.012', NULL, 0, 'p.012-jerai.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(546, 'Y.B. Datuk Johari bin Abdul Ghani', NULL, 'P.119', NULL, 0, 'p119.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(547, 'Y.B. Datuk Jumat Haji Idris', NULL, 'P.171', NULL, 0, 'p171.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(548, 'YB PUAN KASTHURIRAANI A/P PATTO', NULL, 'P.046', NULL, 0, 'p.046-batu_kawan.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(549, 'Y.B. Khoo Soo Seang', NULL, 'P.158', NULL, 0, 'p158.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(550, 'YB TUAN SU KEONG SIONG', NULL, 'P.070', NULL, 0, 'p.070-kampar.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(551, 'Y.B. Liew Chin Tong', NULL, 'P.152', NULL, 0, 'p152.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(552, 'Y.B. Lim Kit Siang', NULL, 'P.162', NULL, 0, 'p162.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(553, 'Y.B. Datin Linda Tsen Thau Lin', NULL, 'P.185', NULL, 0, 'p185.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(554, 'Y.B. Loke Siew Fook', NULL, 'P.128', NULL, 0, 'p128.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(555, 'Y.B. Datuk Madius Tangau', NULL, 'P.170', NULL, 0, 'p170.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(556, 'YB DATO\' SERI MAHDZIR BIN KHALID', NULL, 'P.007', NULL, 0, 'p.007-padang_terap.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(557, 'YB DATO\' ABDULLAH SANI BIN ABDUL HAMID', NULL, 'P.109', NULL, 0, 'p.109-kapar.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(558, 'YB TUAN AHMAD TARMIZI BIN SULAIMAN', NULL, 'P.013', NULL, 0, 'p.013-sik.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(559, 'YB DATO\' MANSOR BIN OTHMAN', NULL, 'P.047', NULL, 0, 'p.047-nibong_tebal.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(560, 'Y.B. Mas Ermieyati Binti Samsudin', NULL, 'P.134', NULL, 0, 'p134.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(561, 'Y.B. Dr. Michael Teo Yu Keng', NULL, 'P.219', NULL, 0, 'p219.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(562, 'Y.B. Mohamed Hanipa Maidin', NULL, 'P.113', NULL, 0, 'p113.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(563, 'YB DATO\' HAJI MOHD FASIAH BIN MOHD FAKEH', NULL, 'P.092', NULL, 0, 'p.092-sabak_bernam.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(564, 'Y.B. Datuk Mohd Idris Bin Jusi', NULL, 'P.150', NULL, 0, 'p150.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(565, 'Y.B. Tan Sri Mohd Isa Bin Abdul Samad', NULL, 'P.127', NULL, 0, 'p127.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(566, 'YB DATO\' MOHD NIZAR BIN HAJI ZAKARIA', NULL, 'P.069', NULL, 0, 'p.069-parit.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(567, 'YB TUAN KARUPAIYA A/L MUTUSAMI', NULL, 'P.017', NULL, 0, 'p.017-padang_serai.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(568, 'YAB Tun Dr. Mahathir bin Mohamad', NULL, 'P.004', NULL, 0, 'p.004-langkawi.png', 'AP', NULL, '2018-07-16', NULL, 'PEJUANG', 0, NULL, NULL),
(569, 'YB TUAN CHOW KON YEOW', NULL, 'P.049', NULL, 0, 'p.049-tanjong.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(570, 'YB TUAN AHMAD FADHLI BIN SHAARI', NULL, 'P.022', NULL, 0, 'p.022-pasir_mas.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(571, 'Y.B. Nogeh Anak Gumbek', NULL, 'P.192', NULL, 0, 'p192.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(572, 'YB DATO\' DR HAJI NOOR AZMI BIN GHAZALI', NULL, 'P.058', NULL, 0, 'p058.jpg', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(573, 'Y.B. Datuk Noor Ehsanuddin Mohd Harun Narrashid', NULL, 'P.156', NULL, 0, 'p156.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(574, 'YB DR. ONG KIAN MING', NULL, 'P.102', NULL, 0, 'p.102-bangi.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(575, 'Y.B. Oscar Ling Chai Yew', NULL, 'P.212', NULL, 0, 'p212.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(576, 'YB TUAN HAJI AWANG BIN HASHIM', NULL, 'P.011', NULL, 0, 'p.011-pendang.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(577, 'YB DATO\' SIVARRAAJH CHANDRAN', NULL, 'P.078', NULL, 0, 'p.078-cameron_highland.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(578, 'YB HAJI AHMAD AMZAD BIN MOHAMED @ HASHIM', NULL, 'P.036', NULL, 0, 'p.036-kuala_terengganu.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(579, 'YB DATO\' SRI REEZAL MERICAN BIN NAINA MERICAN', NULL, 'P.041', NULL, 0, 'p.041-kepala_batas.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(580, 'Y.B. Rozman Isli', NULL, 'P.166', NULL, 0, 'p166.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(581, 'YB TUAN NGA KOR MING', NULL, 'P.076', NULL, 0, 'p.076-teluk_intan.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(582, 'YB DATUK HAJI SHABUDIN YAHAYA', NULL, 'P.042', NULL, 0, 'p042.jpg', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(583, 'YB Tuan Noor Amin bin Ahmad', NULL, 'P.002', NULL, 1, 'p.002-kangar.png', 'AP', NULL, '2018-07-16', NULL, NULL, 1, '1', '2020-10-15 21:11:30'),
(584, 'YB Dato\' Seri Dr. Shahidan Bin Kassim', NULL, 'P.003', NULL, 0, 'p003.jpg', 'AP', NULL, '2018-07-16', NULL, 'BN', 0, NULL, NULL),
(585, 'Y.B. Shamsul Iskandar @ Yusre Bin Mohd Akin', NULL, 'P.137', NULL, 0, 'p137.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(586, 'YB TUAN SIM CHEE KEONG', NULL, 'P.045', NULL, 0, 'p.045-bukit_mertajam.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(587, 'YB TUAN SIM TZE TZIN', NULL, 'P.052', NULL, 0, 'p.052-bayan_baru.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(588, 'YB TUAN SIVAKUMAR VARATHARAJU NAIDU', NULL, 'P.066', NULL, 0, 'p.066-batu_gajah.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(589, 'YB TUAN WONG KAH WOH', NULL, 'P.064', NULL, 0, 'p.064-ipoh_timur.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(590, 'YB DATO\' TAKIYUDDIN BIN HASSAN', NULL, 'P.021', NULL, 0, 'p021.jpg', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(591, 'Y.B. Dato\' Dr. Tan Kee Kwong', NULL, 'P.116', NULL, 0, 'p116.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(592, 'Y.B. Teo Kok Seong', NULL, 'P.130', NULL, 0, 'p130.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(593, 'YB TUAN HAJI WAN HASSAN BIN MOHD RAMLI', NULL, 'P.039', NULL, 0, 'p039.jpg', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(594, 'Y.B. Tan Sri William Mawan Ikom', NULL, 'P.205', NULL, 0, 'p205.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(595, 'Y.B. Wilson Ugak Anak Kumbong', NULL, 'P.216', NULL, 0, 'p216.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(596, 'YB TUAN WONG CHEN', NULL, 'P.104', NULL, 0, 'p.104-subang.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(597, 'Y.B. Wong Ling Biu', NULL, 'P.208', NULL, 0, 'p208.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(598, 'Y. B. Wong Sze Phin@ Jimmy', NULL, 'P.172', NULL, 0, 'p172.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(599, 'Y.B. Wong Tien Fatt @ Wong Nyuk Foh', NULL, 'P.186', NULL, 0, 'p186.jpg', 'AP', NULL, '2013-05-05', NULL, NULL, 0, NULL, NULL),
(600, 'YB TUAN WONG HON WAI', NULL, 'P.048', NULL, 0, 'p.048-bukit_bendera.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(601, 'Y.B. Senator Datin Rahimah binti Haji Mahamad', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, '', 'AD', '31.03.2014 - 30.03.2017', NULL, NULL, NULL, 0, NULL, NULL),
(602, 'YB Senator Dato\' Adam bin Abdul Hamid', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri', 0, '', 'AD', '20.02.2014 - 19.02.2017', NULL, NULL, NULL, 0, NULL, NULL),
(603, 'YB Megat Zulkarnain bin Tan Sri Datuk Wira Haji Omardin, YB Senator Datuk Haji', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, '', 'AD', '07.10.2013 - 06.10.2016', NULL, NULL, NULL, 0, NULL, NULL),
(604, 'Mohd Ali bin Mohd Rustam, YB Senator Tan Sri', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri', 0, '', 'AD', '02.10.2013 - 01.10.2016', NULL, NULL, NULL, 0, NULL, NULL),
(605, 'Ramli Bin Shariff, YB Senator Tuan', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri', 0, '', 'AD', '25.04.2015 - 24.04.2018', NULL, NULL, NULL, 0, NULL, NULL),
(606, 'Chia Song Cheng, YB Senator Tuan', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri', 0, '', 'AD', '20.11.2014 - 19.11.2017', NULL, NULL, NULL, 0, NULL, NULL),
(607, 'Engku Naimah Binti Engku Taib, YB Senator Y.M.', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri', 0, '', 'AD', '06.11.2015 - 05.11.2018', NULL, NULL, NULL, 0, NULL, NULL),
(608, 'Abdullah Bin Mat Yasim, YB Senator Datuk', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, '', 'AD', '07.12.2015 - 06.12.2018', NULL, NULL, NULL, 0, NULL, NULL),
(609, 'Abdul Rahman Bin Mat Yasin, YB Senator Dato\' Haji', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri', 0, '', 'AD', '22.06.2015 - 21.06.2018', NULL, NULL, NULL, 0, NULL, NULL),
(610, 'Mohd Nor Bin Haji Monutty, YB Senator Dr.', NULL, NULL, 'Dipilih oleh Dewan Undangan Negeri', 0, 'dr_nor_senator.jpg', 'AD', '17.12.2015 - 16.12.2018', NULL, NULL, NULL, 0, NULL, NULL),
(611, 'Rahemah Binti Idris, YB Senator Puan Hajah', NULL, NULL, 'Dilantik Yang di-Pertuan Agong', 0, 'rahemah.jpg', 'AD', '07.12.2016 - 06.12.2019', NULL, NULL, NULL, 0, NULL, NULL),
(612, 'YB TUAN MUSLIMIN BIN YAHAYA', NULL, 'P.093', NULL, 0, 'p.093-sungai_besar.png', 'AP', NULL, '2018-07-16', NULL, NULL, 0, NULL, NULL),
(613, 'YB SENATOR TUAN HAJI MUHAMMA MUSTAPHA', NULL, NULL, 'ADUN KELANTAN', 0, '', 'AD', '2017 - 2019', NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auditrail`
--

CREATE TABLE `auditrail` (
  `aid` bigint(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `log_user` varchar(32) DEFAULT NULL,
  `ip` varchar(32) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `trans_date` datetime DEFAULT NULL,
  `actions` varchar(64) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `doc_rujukan`
--

CREATE TABLE `doc_rujukan` (
  `doc_id` varchar(32) NOT NULL DEFAULT '',
  `dokumen_tajuk` varchar(255) NOT NULL DEFAULT '',
  `dokumen` text DEFAULT NULL,
  `doc_status` varchar(10) DEFAULT NULL,
  `doc_type` varchar(5) DEFAULT 'DOC',
  `tarikh` date DEFAULT NULL,
  `create_dt` datetime DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL,
  `search_updm_dt` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0,
  `delete_dt` datetime DEFAULT NULL,
  `delete_by` varchar(32) DEFAULT NULL,
  `is_doc` tinyint(1) DEFAULT 0,
  `file_name` varchar(255) DEFAULT NULL,
  `file_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadual_tugas`
--

CREATE TABLE `jadual_tugas` (
  `jad_id` bigint(20) NOT NULL,
  `id_sidang` bigint(20) NOT NULL,
  `num_week` smallint(6) DEFAULT NULL,
  `jad_tkh` date DEFAULT NULL,
  `dewan` varchar(32) DEFAULT NULL,
  `jad_status` tinyint(4) DEFAULT 0,
  `urusetia_bhg` int(5) DEFAULT NULL,
  `urusetia` int(11) DEFAULT NULL,
  `pemandu_bhg` int(5) DEFAULT NULL,
  `pemandu` int(11) DEFAULT NULL,
  `pegawai1_bhg` int(5) DEFAULT NULL,
  `pegawai1` int(11) DEFAULT NULL,
  `pegawai2_bhg` int(5) DEFAULT NULL,
  `pegawai2` int(11) DEFAULT NULL,
  `pegawai3_bhg` int(5) DEFAULT NULL,
  `pegawai3` int(11) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `create_dt` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadual_tugas`
--

INSERT INTO `jadual_tugas` (`jad_id`, `id_sidang`, `num_week`, `jad_tkh`, `dewan`, `jad_status`, `urusetia_bhg`, `urusetia`, `pemandu_bhg`, `pemandu`, `pegawai1_bhg`, `pegawai1`, `pegawai2_bhg`, `pegawai2`, `pegawai3_bhg`, `pegawai3`, `catatan`, `create_dt`, `create_by`, `update_dt`, `update_by`, `is_deleted`) VALUES
(1, 93, NULL, '2020-11-02', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, 2, 3, 2, 5, NULL, 0, NULL, '2020-11-03 20:33:06', 1, '2020-11-15 16:39:43', 1, 0),
(2, 93, NULL, '2020-11-03', 'Dewan Rakyat', 0, 2, 3, 1, 4, 2, 5, NULL, 0, NULL, 0, NULL, '2020-11-03 20:33:06', 1, '2020-11-03 20:33:06', 1, 0),
(3, 93, NULL, '2020-11-04', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-03 20:33:06', 1, '2020-11-03 20:33:06', 1, 0),
(4, 93, NULL, '2020-11-05', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-03 20:33:06', 1, '2020-11-03 20:33:06', 1, 0),
(5, 93, NULL, '2020-11-06', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-03 20:33:06', 1, '2020-11-03 20:33:06', 1, 0),
(6, 93, NULL, '2020-11-07', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-03 20:33:06', 1, '2020-11-03 20:33:06', 1, 0),
(7, 93, NULL, '2020-11-08', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-03 20:33:06', 1, '2020-11-03 20:33:06', 1, 0),
(8, 93, NULL, '2020-11-09', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-03 20:33:06', 1, '2020-11-03 20:33:06', 1, 0),
(9, 93, NULL, '2020-11-10', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-03 20:33:06', 1, '2020-11-03 20:33:06', 1, 0),
(10, 93, NULL, '2020-11-11', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-03 20:33:06', 1, '2020-11-03 20:33:06', 1, 0),
(11, 93, NULL, '2020-11-12', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-03 20:33:06', 1, '2020-11-03 20:33:06', 1, 0),
(12, 93, NULL, '2020-11-13', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-03 20:33:06', 1, '2020-11-03 20:33:06', 1, 0),
(13, 93, NULL, '2020-11-14', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-03 20:33:06', 1, '2020-11-03 20:33:06', 1, 0),
(14, 93, NULL, '2020-11-15', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-03 20:33:06', 1, '2020-11-03 20:33:06', 1, 0),
(15, 93, NULL, '2020-11-16', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-03 20:33:07', 1, '2020-11-03 20:33:07', 1, 0),
(16, 93, NULL, '2020-11-17', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-03 20:33:07', 1, '2020-11-03 20:33:07', 1, 0),
(17, 93, NULL, '2020-11-18', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-03 20:33:07', 1, '2020-11-03 20:33:07', 1, 0),
(18, 93, NULL, '2020-11-19', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-03 20:33:07', 1, '2020-11-03 20:33:07', 1, 0),
(19, 93, NULL, '2020-11-20', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-03 20:33:07', 1, '2020-11-03 20:33:07', 1, 1),
(20, 94, NULL, '2020-11-02', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-04 13:10:07', 1, '2020-11-04 13:10:07', 1, 0),
(21, 94, NULL, '2020-11-03', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-04 13:10:07', 1, '2020-11-04 13:10:07', 1, 0),
(22, 94, NULL, '2020-11-04', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-04 13:10:07', 1, '2020-11-04 13:10:07', 1, 0),
(23, 94, NULL, '2020-11-05', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-04 13:10:08', 1, '2020-11-04 13:10:08', 1, 0),
(24, 94, NULL, '2020-11-06', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-04 13:10:08', 1, '2020-11-04 13:10:08', 1, 0),
(25, 94, NULL, '2020-11-07', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-04 13:10:08', 1, '2020-11-04 13:10:08', 1, 0),
(26, 94, NULL, '2020-11-08', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-04 13:10:08', 1, '2020-11-04 13:10:08', 1, 0),
(27, 94, NULL, '2020-11-09', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-04 13:10:08', 1, '2020-11-04 13:10:08', 1, 0),
(28, 94, NULL, '2020-11-10', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-04 13:10:08', 1, '2020-11-04 13:10:08', 1, 0),
(29, 94, NULL, '2020-11-11', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-04 13:10:08', 1, '2020-11-04 13:10:08', 1, 0),
(30, 94, NULL, '2020-11-12', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-04 13:10:08', 1, '2020-11-04 13:10:08', 1, 0),
(31, 94, NULL, '2020-11-13', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-04 13:10:08', 1, '2020-11-04 13:10:08', 1, 0),
(32, 94, NULL, '2020-11-14', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-04 13:10:08', 1, '2020-11-04 13:10:08', 1, 0),
(33, 94, NULL, '2020-11-15', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-04 13:10:08', 1, '2020-11-04 13:10:08', 1, 0),
(34, 94, NULL, '2020-11-16', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-04 13:10:08', 1, '2020-11-04 13:10:08', 1, 0),
(35, 94, NULL, '2020-11-17', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-04 13:10:08', 1, '2020-11-04 13:10:08', 1, 0),
(36, 94, NULL, '2020-11-18', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-04 13:10:08', 1, '2020-11-04 13:10:08', 1, 0),
(37, 94, NULL, '2020-11-19', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-04 13:10:08', 1, '2020-11-04 13:10:08', 1, 0),
(38, 94, NULL, '2020-11-20', 'Dewan Rakyat', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, '2020-11-04 13:10:08', 1, '2020-11-04 13:10:08', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kakitangan`
--

CREATE TABLE `kakitangan` (
  `id_kakitangan` int(11) NOT NULL,
  `nama_kakitangan` varchar(100) NOT NULL,
  `no_kp_kakitangan` bigint(15) DEFAULT NULL,
  `jawatan_kakitangan` varchar(100) DEFAULT NULL,
  `no_telefon` varchar(15) DEFAULT NULL,
  `no_hp` varchar(32) DEFAULT NULL,
  `id_bahagian` int(5) DEFAULT NULL,
  `id_unit` int(11) DEFAULT 0,
  `gred` varchar(12) DEFAULT NULL,
  `type` char(1) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `user_level` varchar(1) DEFAULT NULL,
  `is_semak` tinyint(1) DEFAULT 0,
  `is_lulus` tinyint(1) DEFAULT 0,
  `is_delete` tinyint(1) DEFAULT 0,
  `is_deletedt` datetime DEFAULT NULL,
  `is_deleteby` varchar(32) DEFAULT NULL,
  `fldupdate_dt` datetime DEFAULT NULL,
  `fldupdate_by` int(11) DEFAULT NULL,
  `status` varchar(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kakitangan`
--

INSERT INTO `kakitangan` (`id_kakitangan`, `nama_kakitangan`, `no_kp_kakitangan`, `jawatan_kakitangan`, `no_telefon`, `no_hp`, `id_bahagian`, `id_unit`, `gred`, `type`, `userid`, `pass`, `email`, `user_level`, `is_semak`, `is_lulus`, `is_delete`, `is_deletedt`, `is_deleteby`, `fldupdate_dt`, `fldupdate_by`, `status`) VALUES
(1, 'administrator', 999999999999, NULL, NULL, NULL, 1, NULL, NULL, 'A', 'admin', '62dd12662bfe1d6dd343ed5f578895e5', NULL, NULL, 1, 1, 0, NULL, NULL, '2016-03-01 14:44:01', 2147483647, '0'),
(2, 'Pegawai 1', 123456789012, 'Penolong Pengarah', '091283129', '21039813', 1, 0, 'M52', 'U', '123456789012', '3417973cd67f37b077e56b82f0cc306f', 'a@b.c', NULL, 1, 1, 0, NULL, NULL, '2020-11-03 15:49:05', 1, '0'),
(3, 'Pegawai 2', 98765432109, 'Penolong Pengarah', '12478978080', '29471920890808', 2, 0, 'F48', 'P', '098765432109', 'b2e1267417f8c5665bf8b0db9f66d619', 'b@c.d', NULL, 0, 0, 0, NULL, NULL, '2020-11-03 15:50:09', 1, '0'),
(4, 'Pegawai 3', 111111111111, 'Pemandu', '2141212213142', '42114312414412', 1, 0, 'N19', 'D', '111111111111', '593c9b4a9390551d53e5cacf28ebd638', 'a@c.d', NULL, 0, 0, 0, NULL, NULL, '2020-11-03 15:51:15', 1, '0'),
(5, 'Pegawai 4', 222222222222, 'Penolong Pegawai', '31245124512312', '34124125312421', 2, 0, 'F41', 'P', '222222222222', '4d18e2c96bb0f39c6d6dc690542b0bdc', 'c@a.b', NULL, 0, 0, 0, NULL, NULL, '2020-11-03 15:52:04', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `kod_bahagian`
--

CREATE TABLE `kod_bahagian` (
  `id_bahagian` int(2) NOT NULL,
  `kod_bahagian` varchar(12) DEFAULT NULL,
  `nama_bahagian` varchar(100) DEFAULT NULL,
  `status` varchar(8) DEFAULT NULL,
  `pegawai_sub` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kod_bahagian`
--

INSERT INTO `kod_bahagian` (`id_bahagian`, `kod_bahagian`, `nama_bahagian`, `status`, `pegawai_sub`) VALUES
(1, 'BPSM', 'Bahagian Pengurusan Sumber Manusia', '0', NULL),
(2, 'BPM', 'Bahagian Pengurusan Maklumat', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kod_dewan`
--

CREATE TABLE `kod_dewan` (
  `j_dewan` int(4) NOT NULL,
  `dewan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kod_dewan`
--

INSERT INTO `kod_dewan` (`j_dewan`, `dewan`) VALUES
(1, 'Dewan Rakyat'),
(2, 'Dewan Negara');

-- --------------------------------------------------------

--
-- Table structure for table `kod_grpmenu`
--

CREATE TABLE `kod_grpmenu` (
  `grp_id` smallint(6) NOT NULL,
  `grp_name` varchar(64) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kod_grpmenu`
--

INSERT INTO `kod_grpmenu` (`grp_id`, `grp_name`, `status`) VALUES
(1, 'Soalan', 0),
(2, 'Jawapan', 0),
(3, 'Pegawai Bertugas', 0),
(4, 'Utiliti', 0),
(5, 'Laporan', 0),
(6, 'Lain Lain', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kod_jawatan`
--

CREATE TABLE `kod_jawatan` (
  `jaw_id` int(11) NOT NULL,
  `jawatan` varchar(128) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kod_jawatan`
--

INSERT INTO `kod_jawatan` (`jaw_id`, `jawatan`, `status`) VALUES
(1, 'YB Menteri', 0),
(2, 'YB Timbalan Menteri', 0),
(3, 'YB Setiausaha Kementerian', 0),
(4, 'Timbalan Setiausaha Kementerian', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kod_kategori`
--

CREATE TABLE `kod_kategori` (
  `id_kategori` int(2) NOT NULL,
  `kod_kategori` varchar(3) DEFAULT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL,
  `status` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kod_kategori`
--

INSERT INTO `kod_kategori` (`id_kategori`, `kod_kategori`, `nama_kategori`, `status`) VALUES
(1, NULL, 'Seni', '0'),
(2, NULL, 'Budaya', '0'),
(3, NULL, 'Keusahawanan', '0');

-- --------------------------------------------------------

--
-- Table structure for table `kod_kategori_sub`
--

CREATE TABLE `kod_kategori_sub` (
  `idsub_kategori` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_sub_kategori` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kod_parlimen`
--

CREATE TABLE `kod_parlimen` (
  `p_kod` varchar(5) NOT NULL DEFAULT '',
  `p_nama` varchar(64) DEFAULT NULL,
  `p_ahli` varchar(100) DEFAULT NULL,
  `p_status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kod_parlimen`
--

INSERT INTO `kod_parlimen` (`p_kod`, `p_nama`, `p_ahli`, `p_status`) VALUES
('P.001', 'Padang Besar', 'Y.B. Dato\' Seri Haji Azmi bin Khalid', 0),
('P.002', 'Kangar', 'Y.B. Dato\' Seri Mohd Radzi bin Sheikh Ahmad', 0),
('P.003', 'Arau', 'Y.B. Dato\' Ismail Bin Kasim', 0),
('P.004', 'Langkawi', 'Y.B. Dato\' Paduka Abu Bakar bin Taib', 0),
('P.005', 'Jerlun', 'Y.B. Dato\' Mukhriz bin Tun Mahathir', 0),
('P.006', 'Kubang Pasu', 'Y.B. Dato\' Wira Mohd Johari bin Baharum', 0),
('P.007', 'Padang Terap', 'Y.B. Tuan Mohd Nasir bin Zakaria', 0),
('P.008', 'Pokok Sena', 'Y.B. Tuan Haji Mahfuz bin Haji Omar', 0),
('P.009', 'Alor Star', 'Y.B. Dato\' Wira Chor Chee Heung', 0),
('P.010', 'Kuala Kedah', 'Y.B. Tuan Haji Ahmad bin Kasim', 0),
('P.011', 'Pendang', 'Y.B. Dr. Haji Mohd Hayati bin Othman', 0),
('P.012', 'Jerai', 'Y.B. Tuan Mohd Firdaus bin Jaafar', 0),
('P.013', 'Sik', 'Y.B. Tuan Che Uda bin Che Nik', 0),
('P.014', 'Merbok', 'Y.B. Dato\' Rashid bin Din', 0),
('P.015', 'Sungai Petani', 'Y.B. Tuan Johari bin Abdul', 0),
('P.016', 'Baling', 'Y.B. Tuan Taib Azamudden bin Md Taib', 0),
('P.017', 'Padang Serai', 'Y.B. Tuan Gobalakrishnan a/l Nagapan', 0),
('P.018', 'Kulim-Bandar Baharu', 'Y.B. Tuan Zulkifli bin Noordin', 0),
('P.019', 'Tumpat', 'Y.B. Dato\' Haji Kamarudin bin Jaffar', 0),
('P.020', 'Pengkalan Chepa', 'Y.B. Datuk Ab. Halim bin Ab. Rahman', 0),
('P.021', 'Kota Bharu', 'Y.B. Dato\' Haji Wan Abd. Rahim bin Wan Abdullah', 0),
('P.022', 'Pasir Mas', 'Y.B. Dato\' Ibrahim Ali', 0),
('P.023', 'Rantau Panjang', 'Y.B. Puan Siti Zailah binti Mohd Yusoff', 0),
('P.024', 'Kubang Kerian', 'Y.B. Tuan Salahuddin bin Haji Ayub', 0),
('P.025', 'Bachok', 'Y.B. Tuan Haji Nasharudin bin Mat Isa', 0),
('P.026', 'Ketereh', 'Y.B. Tuan Haji Ab Aziz bin Ab Kadir', 0),
('P.027', 'Tanah Merah', 'Y.B. Tuan Amran bin Ab Ghani', 0),
('P.028', 'Pasir Puteh', 'Y.B. Tuan Muhammad bin Husain', 0),
('P.029', 'Machang', 'Y.B. Tuan Saifuddin Nasution bin Ismail', 0),
('P.030', 'Jeli', 'Y.B. Dato\' Mustapa bin Mohamed', 0),
('P.031', 'Kuala Krai', 'Y.B. Dr. Mohd Hatta bin Md Ramli', 0),
('P.032', 'Gua Musang', 'Y.B.M. Tan Sri Tengku Razaleigh bin Tengku Hamzah', 0),
('P.033', 'Besut', 'Y.B. Dato\' Dr. Abdullah bin Md Zin', 0),
('P.034', 'Setiu', 'Y.B. Dato\' Mohd Jidin bin Shafee', 0),
('P.035', 'Kuala Nerus', 'Y.B. Dato\' Mohd Nasir bin Ibrahim Fikri', 0),
('P.036', 'Kuala Terengganu', 'Y.B. Tuan  Mohd Abdul Wahid Endut', 0),
('P.037', 'Marang', 'Y.B. Dato\' Seri Haji Abd. Hadi bin Awang', 0),
('P.038', 'Hulu Terengganu', 'Y.B. Tuan Haji Mohd Nor bin Othman', 0),
('P.039', 'Dungun', 'Y.B. Tuan Matulidi bin Jusoh', 0),
('P.040', 'Kemaman', 'Y.B. Dato\' Ahmad Shabery bin Cheek', 0),
('P.041', 'Kepala Batas', 'Y.A.B. Abdullah bin Haji Ahmad Badawi', 0),
('P.042', 'Tasek Gelugor', 'Y.B. Tan Sri Nor Mohamed Yakcop', 0),
('P.043', 'Bagan', 'Y.B. Tuan Lim Guan Eng', 0),
('P.044', 'Permatang Pauh', 'Y.B. Dato\' Seri Anwar bin Ibrahim', 0),
('P.045', 'Bukit Mertajam', 'Y.B. Puan Chong Eng', 0),
('P.046', 'Batu Kawan', 'Y.B. Prof. Dr. P. Ramasamy a/l Palanisamy', 0),
('P.047', 'Nibong Tebal', 'Y.B. Tuan Tan Tee Beng', 0),
('P.048', 'Bukit Bendera', 'Y.B. Tuan Liew Chin Tong', 0),
('P.049', 'Tanjong', 'Y.B. Tuan Chow Kon Yeow', 0),
('P.050', 'Jelutong', 'Y.B. Tuan Ooi Chuan Aun', 0),
('P.051', 'Bukit Gelugor', 'Y.B. Tuan Karpal Singh a/l Ram Singh', 0),
('P.052', 'Bayan Baru', 'Y.B. Dato\' Zahrain Mohamed Hashim', 0),
('P.053', 'Balik Pulau', 'Y.B. Tuan Mohd Yusmadi bin Mohd Yusoff', 0),
('P.054', 'Gerik', 'Y.B. Dato\' Tan Lian Hoe', 0),
('P.055', 'Lenggong', 'Y.B. Dato\' Shamsul Anuar bin Nasarah', 0),
('P.056', 'Larut', 'Y.B. Dato\' Hamzah Zainudin', 0),
('P.057', 'Parit Buntar', 'Y.B. Dr. Mujahid Yusof Rawa', 0),
('P.058', 'Bagan Serai', 'Y.B. Tuan Mohsin Fadzli bin Haji Samsuri', 0),
('P.059', 'Bukit Gantang', 'Y.B. Tuan Roslan bin Shaharum', 0),
('P.060', 'Taiping', 'Y.B. Tuan Nga Kor Ming', 0),
('P.061', 'Padang Rengas', 'Y.B. Dato\' Seri Mohamed Nazri bin Tan Sri Abdul Aziz', 0),
('P.062', 'Sungai Siput', 'Y.B. Dr. Micheal Jeyakumar Devaraj', 0),
('P.063', 'Tambun', 'Y.B. Ahmad Husni bin Mohamad Hanadzlah', 0),
('P.064', 'Ipoh Timor', 'Y.B. Tuan Lim Kit Siang', 0),
('P.065', 'Ipoh Barat', 'Y.B. Tuan M. Kulasegaran', 0),
('P.066', 'Batu Gajah', 'Y.B. Puan Fong Po Kuan', 0),
('P.067', 'Kuala Kangsar', 'Y.B. Tan Sri Rafidah binti Abd. Aziz', 0),
('P.068', 'Beruas', 'Y.B. Dato\' Ngeh Koo Ham', 0),
('P.069', 'Parit', 'Y.B. Tuan Mohd Nizar bin Zakaria', 0),
('P.070', 'Kampar', 'Y.B. Datuk Lee Chee Leong', 0),
('P.071', 'Gopeng', 'Y.B. Dr. Lee Boon Chye', 0),
('P.072', 'Tapah', 'Y.B. Datuk M. Saravanan', 0),
('P.073', 'Pasir Salak', 'Y.B. Dato\' Haji Tajuddin bin Abdul Rahman', 0),
('P.074', 'Lumut', 'Y.B. Dato\' Kong Cho Ha', 0),
('P.075', 'Bagan Datok', 'Y.B. Dato\' Seri Dr. Ahmad Zahid bin Hamidi', 0),
('P.076', 'Telok Intan', 'Y.B. Tuan Manogaran a/l Marimuthu', 0),
('P.077', 'Tanjong Malim', 'Y.B. Dato\' Seri Ong Ka Chuan', 0),
('P.078', 'Cameron Highlands', 'Y.B. Dato\' Devamany a/l S.Krishnasamy', 0),
('P.079', 'Lipis', 'Y.B. Dato\' Dr. Mohamad Shahrum bin Osman', 0),
('P.080', 'Raub', 'Y.B. Dato\' Sri Dr. Ng Yen Yen', 0),
('P.081', 'Jerantut', 'Y.B.M. Dato\'  Tengku Azlan Ibni Almarhum Sultan Abu Bakar', 0),
('P.082', 'Indera Mahkota', 'Y.B. Tuan Azan bin Ismail', 0),
('P.083', 'Kuantan', 'Y.B. Puan Hajah Fuziah binti Salleh', 0),
('P.084', 'Paya Besar', 'Y.B. Dato\' Abdul Manan bin Ismail', 0),
('P.085', 'Pekan', 'Y.B. Dato\' Sri Mohd Najib bin Tun Abdul Razak', 0),
('P.086', 'Maran', 'Y.B. Dato\' Haji Ismail bin Haji Abd Muttalib', 0),
('P.087', 'Kuala Krau', 'Y.B. Tuan Haji Ismail bin Haji Mohamed Said', 0),
('P.088', 'Temerloh', 'Y.B. Dato\' Saifuddin bin Abdullah', 0),
('P.089', 'Bentong', 'Y.B. Dato\' Liow Tiong Lai', 0),
('P.090', 'Bera', 'Y.B. Dato\' Sri Ismail Sabri bin Ab Yaakob', 0),
('P.091', 'Rompin', 'Y.B. Datuk Seri Dr. Haji Jamaludin bin Dato\' Mohd Jarjis', 0),
('P.092', 'Sabak Bernam', 'Y.B. Tuan Abd. Rahman bin Bakri', 0),
('P.093', 'Sungai Besar', 'Y.B. Puan Noriah binti Kasnon', 0),
('P.094', 'Hulu Selangor', 'Y.B. Dato\' Dr. Zainal Abidin bin Ahmad', 0),
('P.095', 'Tanjong Karang', 'Y.B. Dato\' Noh bin Haji Omar', 0),
('P.096', 'Kuala Selangor', 'Y.B. Dr. Haji Dzulkefly Ahmad', 0),
('P.097', 'Selayang', 'Y.B. Tuan William Leong Jee Keen', 0),
('P.098', 'Gombak', 'Y.B. Tuan Mohamed Azmin bin Ali', 0),
('P.099', 'Ampang', 'Y.B. Puan Hajah Zuraida binti Kamaruddin', 0),
('P.100', 'Pandan', 'Y.B. Dato\' Sri Ong Tee Keat', 0),
('P.101', 'Hulu Langat', 'Y.B. Dr. Che Rosli bin Che Mat', 0),
('P.102', 'Serdang', 'Y.B. Puan Teo Nie Ching', 0),
('P.103', 'Puchong', 'Y.B. Tuan Gobind Singh Deo', 0),
('P.104', 'Kelana Jaya', 'Y.B. Tuan Gwo-Burne Loh', 0),
('P.105', 'Petaling Jaya Selatan', 'Y.B. Tuan Hee Loy Sian', 0),
('P.106', 'Petaling Jaya Utara', 'Y.B. Tuan Tony Pua Kiam Wee', 0),
('P.107', 'Subang', 'Y.B. Tuan Sivarasa a/l K. Rasiah', 0),
('P.108', 'Shah Alam', 'Y.B. Tuan Khalid bin Abd Samad', 0),
('P.109', 'Kapar', 'Y.B. Tuan Manikavasagam a/l Sundaram', 0),
('P.110', 'Klang', 'Y.B. Tuan Charles Anthony a/l R. Santiago', 0),
('P.111', 'Kota Raja', 'Y.B. Dr. Hajah Siti Mariah binti Mahmud', 0),
('P.112', 'Kuala Langat', 'Y.B.  Tuan Abdullah Sani bin Abdul Hamid', 0),
('P.113', 'Sepang', 'Y.B. Dato\' Ir. Mohd Zin bin Mohamed', 0),
('P.114', 'Kepong', 'Y.B. Dr. Tan Seng Giaw', 0),
('P.115', 'Batu', 'Y.B. Tuan Chua Tian Chang', 0),
('P.116', 'Wangsa Maju', 'Y.B. Tuan Wee Choo Keong', 0),
('P.117', 'Segambut', 'Y.B. Tuan Lim Lip Eng', 0),
('P.118', 'Setiawangsa', 'Y.B. Dato\' Sri Haji Zulhasnan bin Rafique', 0),
('P.119', 'Titiwangsa', 'Y.B. Dr. Lo\' Lo\' binti Hj Mohamad Ghazali', 0),
('P.120', 'Bukit Bintang', 'Y.B. Tuan Fong Kui Lun', 0),
('P.121', 'Lembah Pantai', 'Y.B. Puan Nurul Izzah binti Anwar', 0),
('P.122', 'Seputeh', 'Y.B. Puan Teresa Kok Suh Sim', 0),
('P.123', 'Cheras', 'Y.B. Tuan Tan Kok Wai', 0),
('P.124', 'Bandar Tun Razak', 'Y.B. Tan Sri Dato\' Abd Khalid bin Ibrahim', 0),
('P.125', 'Putrajaya', 'Y.B. Datuk Seri Tengku Adnan bin Tengku Mansor', 0),
('P.126', 'Jelebu', 'Y.B. Dato\' Seri Utama Dr. Rais Yatim', 0),
('P.127', 'Jempol', 'Y.B. Dato\' Lilah bin Yasin', 0),
('P.128', 'Seremban', 'Y.B Tuan John a/l Fernandez', 0),
('P.129', 'Kuala Pilah', 'Y.B. Dato\' Haji Hasan bin Malek', 0),
('P.130', 'Rasah', 'Y.B. Tuan Loke Siew Fook', 0),
('P.131', 'Rembau', 'Y.B. Tuan Khairy Jamaluddin', 0),
('P.132', 'Telok Kemang', 'Y.B. Dato\' Kamarul Baharin bin Abbas', 0),
('P.133', 'Tampin', 'Y.B. Dato\' Shaziman bin Abu Mansor', 0),
('P.134', 'Masjid Tanah', 'Y.B. Datuk Wira Abu Seman bin Haji Yusop', 0),
('P.135', 'Alor Gajah', 'Y.B. Dato\' Seri Dr. Fong Chan Onn', 0),
('P.136', 'Tangga Batu', 'Y.B. Datuk Ir. Haji Idris bin Haji Haron', 0),
('P.137', 'Bukit Katil', 'Y.B. Datuk Md Sirat bin Abu', 0),
('P.138', 'Kota Melaka', 'Y.B. Tuan Sim Tong Him', 0),
('P.139', 'Jasin', 'Y.B. Datuk Wira Ahmad bin Hamzah', 0),
('P.140', 'Segamat', 'Y.B. Datuk Dr. S. Subramaniam', 0),
('P.141', 'Sekijang', 'Y.B. Datuk Haji Baharum bin Haji Mohamed', 0),
('P.142', 'Labis', 'Y.B. Tuan Chua Tee Yong', 0),
('P.143', 'Pagoh', 'Y.B. Tan Sri Dato\' Haji Muhyiddin bin Mohd. Yassin', 0),
('P.144', 'Ledang', 'Y.B. Tuan Ir. Haji Hamim bin Samuri', 0),
('P.145', 'Bakri', 'Y.B. Tuan Er Teck Hwa', 0),
('P.146', 'Muar', 'Y.B. Dato\' Razali bin Ibrahim', 0),
('P.147', 'Parit Sulong', 'Y.B. Dato\' Noraini binti Ahmad', 0),
('P.148', 'Ayer Hitam', 'Y.B. Datuk Ir. Dr. Wee Ka Siong', 0),
('P.149', 'Sri Gading', 'Y.B. Datuk Haji Mohamad bin Haji Aziz', 0),
('P.150', 'Batu Pahat', 'Y.B. Dr. Mohd Puad bin Zarkashi', 0),
('P.151', 'Simpang Renggam', 'Y.B. Tuan Liang Teck Meng', 0),
('P.152', 'Kluang', 'Y.B. Dr. Hou Kok Chung', 0),
('P.153', 'Sembrong', 'Y.B. Dato\' Seri Hishammuddin bin Tun Hussein', 0),
('P.154', 'Mersing', 'Y.B. Datuk Dr. Haji Abdul Latif bin Ahmad', 0),
('P.155', 'Tenggara', 'Y.B. Datuk Halimah binti Mohd Sadique', 0),
('P.156', 'Kota Tinggi', 'Y.B. Datuk Seri Syed Hamid bin Syed Jaafar Albar', 0),
('P.157', 'Pengerang', 'Y.B. Dato\' Seri Azalina Dato\' Othman Said', 0),
('P.158', 'Tebrau', 'Y.B. Tuan Teng Boon Soon', 0),
('P.159', 'Pasir Gudang', 'Y.B. Dato\' Seri Mohamed Khaled bin Haji Nordin', 0),
('P.160', 'Johor Bahru', 'Y.B. Dato\' Shahrir bin Abdul Samad', 0),
('P.161', 'Pulai', 'Y.B. Datuk Nur Jazlan bin Mohamad', 0),
('P.162', 'Gelang Patah', 'Y.B. Puan Tan Ah Eng', 0),
('P.163', 'Kulai', 'Y.B. Dato\' Seri Ong Ka Ting', 0),
('P.164', 'Pontian', 'Y.B. Tuan Haji Ahmad bin Maslan', 0),
('P.165', 'Tanjong Piai', 'Y.B. Tuan Wee Jeck Seng', 0),
('P.166', 'Labuan', 'Y.B. Datuk Haji Yussof bin Haji Mahal', 0),
('P.167', 'Kudat', 'Y.B. Datuk Abdul Rahim bin Bakri', 0),
('P.168', 'Kota Marudu', 'Y.B. Datuk Dr. Maximus @ Johnity Ongkili', 0),
('P.169', 'Kota Belud', 'Y.B. Dato\' Haji Abdul Rahman bin Haji Dahlan', 0),
('P.170', 'Tuaran', 'Y.B. Datuk Seri Panglima Mojilip bin Bumburing @ Wilfred', 0),
('P.171', 'Sepanggar', 'Y.B. Datuk Enchin bin Majimbun @ Eric', 0),
('P.172', 'Kota Kinabalu', 'Y.B. Tuan Hiew King Cheu', 0),
('P.173', 'Putatan', 'Y.B. Datuk Dr. Makin @ Makcus Mojigoh', 0),
('P.174', 'Penampang', 'Y.B. Tan Sri Bernard Giluk Dompok', 0),
('P.175', 'Papar', 'Y.B. Datuk Rosnah binti Haji Abdul Rashid Shirlin', 0),
('P.176', 'Kimanis', 'Y.B. Datuk Anifah bin Haji Aman @ Haniff Amman', 0),
('P.177', 'Beaufort', 'Y.B. Datuk Seri Panglima Haji Lajim bin Haji Ukin', 0),
('P.178', 'Sipitang', 'Y.B. Datuk Sapawi bin Haji Amat Wasali @ Ahmad', 0),
('P.179', 'Ranau', 'Y.B. Datuk Siringan bin Gubat', 0),
('P.180', 'Keningau', 'Y.B. Datuk Seri Joseph Pairin Kitingan', 0),
('P.181', 'Tenom', 'Y.B. Tuan Raime Unggi', 0),
('P.182', 'Pensiangan', 'Y.B. Tan Sri Datuk Seri Panglima Joseph Kurup', 0),
('P.183', 'Beluran', 'Y.B. Datuk Ronald Kiandee', 0),
('P.184', 'Libaran', 'Y.B. Datuk Juslie Ajirol', 0),
('P.185', 'Batu Sapi', 'Y.B. Datuk Ir. Edmund Chong Ket Wah @ Chong Ket Fah', 0),
('P.186', 'Sandakan', 'Y.B. Datuk Liew Vui Keong', 0),
('P.187', 'Kinabatangan', 'Y.B. Datuk Bung Moktar bin Radin', 0),
('P.188', 'Silam', 'Y.B. Tuan Haji Salleh bin Kalbi', 0),
('P.189', 'Semporna', 'Y.B. Dato\' Seri Hj. Mohd Shafie bin Hj. Apdal', 0),
('P.190', 'Tawau', 'Y.B. Datuk Chua Soon Bui', 0),
('P.191', 'Kalabakan', 'Y.B. Datuk Seri Haji Abdul Ghapur bin Salleh', 0),
('P.192', 'Mas Gading', 'Y.B. Datuk Dr. Tekhee @Tiki anak Lafe', 0),
('P.193', 'Santubong', 'Y.B. Datuk Dr. Wan Junaidi bin Tuanku Jaafar', 0),
('P.194', 'Petra Jaya', 'Y.B. Tuan Haji Fadillah bin Haji Yusof', 0),
('P.195', 'Bandar Kuching', 'Y.B. Tuan Chong Chieng Jen', 0),
('P.196', 'Stampin', 'Y.B. Dato\' Yong Khoon Seng', 0),
('P.197', 'Kota Samarahan', 'Y.B. Dato\' Sri Sulaiman Abdul Rahman Taib', 0),
('P.198', 'Mambong', 'Y.B. Dato\' Dr. James Dawos Mamit', 0),
('P.199', 'Serian', 'Y.B. Datuk Richard Riot Anak Jaem', 0),
('P.200', 'Batang Sadong', 'Y.B. Puan Hajah Nancy binti Haji Shukri', 0),
('P.201', 'Batang Lupar', 'Y.B. Datuk Hajah Rohani binti Haji Abd. Karim', 0),
('P.202', 'Sri Aman', 'Y.B. Tuan Masir Anak Kujat', 0),
('P.203', 'Lubok Antu', 'Y.B. Tuan William @ Nyallau Anak Badak', 0),
('P.204', 'Betong', 'Y.B. Datuk Douglas Uggah Embas', 0),
('P.205', 'Saratok', 'Y.B. Tuan Jelaing Anak Mersat', 0),
('P.206', 'Tanjong Manis', 'Y.B. Puan Norah binti Abdul Rahman', 0),
('P.207', 'Igan', 'Y.B. Datuk Haji Abdul Wahab bin Haji Dolah', 0),
('P.208', 'Sarikei', 'Y.B. Tuan Ding Kuong Hiing', 0),
('P.209', 'Julau', 'Y.B. Dato\' Joseph Salang Anak Gandum', 0),
('P.210', 'Kanowit', 'Y.B. Tuan Ago Anak Dagang', 0),
('P.211', 'Lanang', 'Y.B. Tuan Tiong Thai King', 0),
('P.212', 'Sibu', 'Y.B. Datuk Robert Lau Hoi Chew', 0),
('P.213', 'Mukah', 'Y.B. Dato\' Sri Dr. Muhammad Leo Micheal Toyad Abdullah', 0),
('P.214', 'Selangau', 'Y.B. Datuk Joseph Entulu Anak Belaun', 0),
('P.215', 'Kapit', 'Y.B. Tuan Alexander Nanta Linggi', 0),
('P.216', 'Hulu Rajang', 'Y.B. Tuan Abit Joo', 0),
('P.217', 'Bintulu', 'Y.B. Datuk Seri Tiong King Sing', 0),
('P.218', 'Sibuti', 'Y.B. Tuan Haji Ahmad Lai bin Bujang', 0),
('P.219', 'Miri', 'Y.B. Datuk Peter Chin Fah Kui', 0),
('P.220', 'Baram', 'Y.B. Dato\' Jacob Dungau Sagan', 0),
('P.221', 'Limbang', 'Y.B. Tuan Haji Hasbi bin Habibollah', 0),
('P.222', 'Lawas', 'Y.B. Tuan Henry Sum Agong', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kod_parti`
--

CREATE TABLE `kod_parti` (
  `id` int(11) NOT NULL,
  `kod_parti` varchar(16) NOT NULL,
  `nama_parti` varchar(64) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kod_parti`
--

INSERT INTO `kod_parti` (`id`, `kod_parti`, `nama_parti`, `status`, `is_deleted`) VALUES
(1, 'UMNO', 'Pertubuhan Kebangsaan Melayu Bersatu', 0, 0),
(2, 'BN', 'Barisan Nasional', 0, 0),
(3, 'PAS', 'Persatuan Islam Se-Malaysia', 0, 0),
(4, 'PEJUANG', 'PEJUANG', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kod_pertanyaan`
--

CREATE TABLE `kod_pertanyaan` (
  `j_tanya` int(11) NOT NULL,
  `pertanyaan` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kod_pertanyaan`
--

INSERT INTO `kod_pertanyaan` (`j_tanya`, `pertanyaan`) VALUES
(1, 'Bukan Lisan'),
(2, 'Lisan');

-- --------------------------------------------------------

--
-- Table structure for table `kod_sidang`
--

CREATE TABLE `kod_sidang` (
  `id_sidang` bigint(20) NOT NULL,
  `j_dewan` int(11) DEFAULT NULL,
  `persidangan` varchar(254) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `start_dt` date DEFAULT NULL,
  `end_dt` date DEFAULT NULL,
  `create_dt` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_by` varchar(32) DEFAULT NULL,
  `deleted_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kod_sidang`
--

INSERT INTO `kod_sidang` (`id_sidang`, `j_dewan`, `persidangan`, `status`, `tahun`, `start_dt`, `end_dt`, `create_dt`, `create_by`, `update_dt`, `update_by`, `is_deleted`, `deleted_by`, `deleted_dt`) VALUES
(1, 1, 'MESYUARAT KETIGA, PENGGAL PERTAMA, PARLIMEN KEDUA BELAS', 1, 2008, '2008-10-01', '2008-12-30', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(2, 1, 'MESYUARAT PERTAMA, PENGGAL KEDUA,PARLIMEN KEDUA BELAS', 1, 2009, '2009-01-01', '2009-04-30', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(10, 1, 'MESYUARAT KEDUA,PENGGAL KEDUA,PARLIMEN KEDUA BELAS ', 1, 2009, '2009-06-15', '2009-07-02', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(11, 2, 'MESYUARAT KEDUA,PENGGAL KEDUA,PARLIMEN KEDUA BELAS', 1, 2009, '2009-07-06', '2009-07-14', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(12, 1, 'MESYUARAT KETIGA, PENGGAL KEDUA, PARLIMEN KEDUA BELAS TAHUN 2009', 1, 2009, '2009-10-19', '2009-12-15', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(13, 2, 'MESYUARAT KETIGA, PENGGAL KEDUA, PARLIMEN KEDUA BELAS TAHUN 2009', 1, 2009, '2009-12-09', '2009-12-22', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(15, 1, 'MESYUARAT KETIGA, PENGGAL KEDUA, PARLIMEN KEDUA BELAS TAHUN 2009 (PERTAMBAHAN HARI)', 1, 2009, '2009-12-16', '2009-12-17', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(16, 1, 'MESYUARAT PERTAMA, PENGGAL KETIGA, PARLIMEN KEDUA BELAS TAHUN 2010 ', 1, 2010, '2010-03-15', '2010-04-15', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(17, 2, 'MESYUARAT PERTAMA, PENGGAL KETIGA, PARLIMEN KEDUA BELAS', 1, 2010, '2010-04-26', '2010-05-06', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(18, 1, 'MESYUARAT PERTAMA, PENGGAL KETIGA, PARLIMEN KEDUA BELAS (PERTAMBAHAN HARI)', 1, 2010, '2010-04-19', '2010-04-22', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(20, 1, 'MESYUARAT KEDUA PENGGAL KETIGA PARLIMEN KEDUA BELAS TAHUN 2010', 1, 2010, '2010-06-07', '2010-07-15', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(21, 2, 'MESYUARAT KEDUA PENGGAL KETIGA PARLIMEN KEDUA BELAS TAHUN 2010', 1, 2010, '2010-07-19', '2010-08-03', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(22, 1, 'MESYUARAT KEDUA PENGGAL PERTAMA PARLIMEN KEDUA BELAS TAHUN 2008', 1, 2008, '2008-06-23', '2008-07-15', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(23, 1, 'MESYUARAT PERTAMA PENGGAL PERTAMA PARLIMEN KEDUA BELAS TAHUN 2008', 1, 2008, '2008-04-14', '2008-05-19', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(24, 2, 'MESYUARAT KEDUA PENGGAL PERTAMA PARLIMEN KEDUA BELAS TAHUN 2008', 1, 2008, '2008-07-15', '2008-07-24', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(25, 2, 'MESYUARAT PERTAMA PENGGAL PERTAMA PARLIMEN KEDUA BELAS TAHUN 2008', 1, 2008, '2008-02-11', '2008-03-21', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(27, 2, 'MESYUARAT KETIGA PENGGAL PERTAMA PARLIMEN KEDUA BELAS TAHUN 2008', 1, 2008, '2008-08-13', '2008-12-23', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(28, 1, 'MESYUARAT KETIGA PENGGAL KETIGA PARLIMEN KEDUA BELAS TAHUN 2010', 1, 2010, '2010-10-11', '2010-12-15', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(29, 2, 'MESYUARAT KETIGA, PENGGAL KETIGA, PARLIMEN KEDUABELAS, DEWAN NEGARA TAHUN 2010', 1, 2010, '2010-12-13', '2010-12-22', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(30, 1, 'MESYUARAT KETIGA PENGGAL KETIGA PARLIMEN KEDUA BELAS TAHUN 2010 (PERTAMBAHAN HARI)', 1, 2010, '2010-12-16', '2010-12-16', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(32, 1, 'MESYUARAT PERTAMA, PENGGAL KEEMPAT, PARLIMEN KEDUABELAS, DEWAN RAKYAT TAHUN 2011', 1, 2011, '2011-03-07', '2011-04-07', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(33, 2, 'MESYUARAT PERTAMA,PENGGAL KEEMPAT ,PARLIMEN KEDUA BELAS,DEWAN NEGARA 2011', 1, 2011, '2011-04-18', '2011-04-28', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(34, 1, 'MESYUARAT KEDUA,PENGGAL KEEMPAT,PARLIMEN KEDUA BELAS,DEWAN RAKYAT 2011', 1, 2011, '2011-06-13', '2011-06-28', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(35, 2, 'MESYUARAT KEDUA,PENGGAL KEEMPAT,PARLIMEN KEDUA BELAS DEWAN NEGARA 2011', 1, 2011, '2011-07-04', '2011-07-12', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(36, 1, 'MESYUARAT KETIGA(BAJET),PENGGAL KEEMPAT,PARLIMEN KEDUA BELAS,DEWAN RAKYAT 2011', 1, 2011, '2011-10-03', '2011-12-07', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(37, 2, 'MESYUARAT KETIGA(BAJET),PENGGAL KEEMPAT,PARLIMEN KEDUA BELAS,DEWAN NEGARA 2011', 1, 2011, '2011-12-06', '2011-12-15', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(38, 1, 'MESYUARAT PERTAMA PENGGAL KELIMA PARLIMEN KEDUA BELAS (TAHUN 2012)', 1, 2012, '2012-03-12', '2012-04-12', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(39, 2, 'MESYUARAT PERTAMA PENGGAL KELIMA PARLIMEN KEDUA BELAS(TAHUN 2012)', 1, 2012, '2012-04-23', '2012-05-10', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(40, 1, 'MESYUARAT KEDUA PENGGAL KELIMA PARLIMEN KEDUA BELAS (TAHUN 2012)', 1, 2012, '2012-06-11', '2012-06-28', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(41, 2, 'MESYUARAT KEDUA PENGGAL KELIMA PARLIMEN KEDUA BELAS (TAHUN 2012)', 1, 2012, '2012-07-09', '2012-07-17', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(42, 1, 'MESYUARAT KETIGA PENGGAL KELIMA PARLIMEN KEDUA BELAS(BELANJAWAN NEGARA) (TAHUN 2012)', 0, 2012, '2012-09-24', '2012-11-27', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(43, 2, 'MESYUARAT KETIGA PENGGAL KELIMA PARLIMEN KEDUA BELAS (TAHUN 2012)BELANJAWAN NEGARA', 1, 2012, '2012-12-03', '2012-12-20', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(45, 1, 'MESYUARAT PERTAMA PENGGAL PERTAMA PARLIMEN KE-TIGABELAS (2013)\r\n', 0, 2013, '2013-06-24', '2013-07-18', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(46, 2, 'MESYUARAT PERTAMA PENGGAL PERTAMA PARLIMEN KETIGA BELAS ', 0, 2013, '2013-07-22', '2013-08-01', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(47, 1, 'MESYUARAT KEDUA DEWAN RAKYAT PENGGAL PERTAMA PARLIMEN KETIGA BELAS (2013)', 0, 2013, '2013-09-23', '2013-10-03', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(48, 2, 'MESYUARAT KEDUA PENGGAL PERTAMA PARLIMEN KETIGA BELAS(2013)', 0, 2013, '2013-10-07', '2013-10-10', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(49, 1, 'MESYUARAT KETIGA PENGGAL PERTAMA PARLIMEN KETIGA BELAS', 0, 2013, '2013-10-21', '2013-12-05', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(50, 2, 'MESYUARAT KETIGA PENGGAL PERTAMA PARLIMEN KETIGA BELAS', 0, 2013, '2013-12-09', '2013-12-19', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(51, 1, 'MESYUARAT PERTAMA, PENGGAL KEDUA, PARLIMEN KE TIGA BELAS (2014)', 0, 2014, '2014-03-10', '2014-04-10', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(52, 2, 'MESYUARAT KEDUA, PENGGAL KEDUA, PARLIMEN KETIGA BELAS (2014)', 0, 2014, '2014-04-21', '2014-05-06', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(53, 1, 'MESYUARAT KEDUA PENGGAL KEDUA PARLIMEN KETIGA BELAS ', 0, 2014, '2014-06-09', '2014-06-19', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(54, 2, 'MESYUARAT KEDUA, PENGGAL KEDUA, PARLIMEN KETIGA BELAS ', 0, 2014, '2014-06-23', '2014-07-01', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(55, 1, 'MESYUARAT KETIGA, PENGGAL KEDUA, PARLIMEN KETIGA BELAS', 0, 2014, '2014-10-07', '2014-11-27', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(56, 2, 'MESYUARAT KETIGA PENGGAL KEDUA PARLIMEN KETIGA BELAS', 0, 2014, '2014-12-01', '2014-12-18', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(57, 1, 'MESYUARAT PERTAMA, PENGGAL KETIGA, PARLIMEN KETIGA BELAS (2015)', 0, 2015, '2015-03-09', '2015-04-09', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(58, 2, 'MESYUARAT PERTAMA, PENGGAL KETIGA, PARLIMEN KETIGA BELAS (2015)', 0, 2015, '2015-04-13', '2015-04-28', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(59, 1, 'MESYUARAT KEDUA, PENGGAL KETIGA, PARLIMEN KETIGA BELAS (2015)', 0, 2015, '2015-05-18', '2015-06-18', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(60, 2, 'MESYUARAT KEDUA, PENGGAL KETIGA, PARLIMEN KETIGA BELAS (2015)', 0, 2015, '2015-06-22', '2015-07-07', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(61, 1, 'MESYUARAT KETIGA, PENGGAL KETIGA, PARLIMEN KETIGA BELAS (2015)', 0, 2015, '2015-10-19', '2015-12-03', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(62, 2, 'MESYUARAT KETIGA, PENGGAL KETIGA, PARLIMEN KETIGA BELAS (2015)', 0, 2015, '2015-12-07', '2015-12-22', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(63, 1, 'MESYUARAT PERTAMA, PENGGAL KEEMPAT, PARLIMEN KETIGA BELAS (2016)', 0, 2016, '2016-03-07', '2016-04-07', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(64, 2, 'MESYUARAT PERTAMA, PENGGAL KEEMPAT, PARLIMEN KETIGA BELAS (2016)', 0, 2016, '2016-04-18', '2016-05-04', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(65, 1, 'MESYUARAT KEDUA, PENGGAL KEEMPAT, PARLIMEN KETIGA BELAS (2016)', 0, 2016, '2016-05-16', '2016-05-26', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(66, 2, 'MESYUARAT KEDUA, PENGGAL KEEMPAT, PARLIMEN KETIGA BELAS (2016)', 0, 2016, '2016-06-13', '2016-06-21', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(67, 1, 'MESYUARAT KETIGA, PENGGAL KEEMPAT, PARLIMEN KETIGA BELAS (2016)', 0, 2016, '2016-10-17', '2016-11-24', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(68, 2, 'MESYUARAT KETIGA, PENGGAL KEEMPAT, PARLIMEN KETIGA BELAS (2016)', 0, 2016, '2016-12-05', '2016-12-21', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(69, 1, 'MESYUARAT KHAS, PARLIMEN KETIGA BELAS PENGGAL KETIGA', 0, 2016, '2016-01-26', '2016-01-27', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(70, 2, 'MESYUARAT KHAS, PARLIMEN KETIGA BELAS PENGGAL KETIGA', 0, 2016, '2016-01-28', '2016-01-28', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(71, 1, 'MESYUARAT PERTAMA PENGGAL KELIMA, PARLIMEN KETIGA BELAS (2017)', 0, 2017, '2017-03-06', '2017-04-06', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(75, 2, 'MESYUARAT PERTAMA PENGGAL KELIMA, PARLIMEN KETIGA BELAS (2017)', 0, 2017, '2017-04-17', '2017-04-27', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(76, 1, 'MESYUARAT KEDUA,PENGGAL KELIMA, PARLIMEN KETIGA BELAS', 0, 2017, '2017-07-24', '2017-08-10', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(77, 2, 'MESYUARAT KEDUA, PENGGAL KELIMA, PARLIMEN KETIGA BELAS', 0, 2017, '2017-08-14', '2017-08-22', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(78, 1, 'MESYUARAT KETIGA PENGGAL KELIMA, PARLIMEN KETIGA BELAS (2017)', 0, 2017, '2017-10-23', '2017-11-30', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(79, 2, 'MESYUARAT KETIGA PENGGAL KELIMA, PARLIMEN KETIGA BELAS (2017)', 0, 2017, '2017-12-04', '2017-12-19', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(80, 1, 'MESYUARAT PERTAMA PENGGAL KEENAM, PARLIMEN KETIGA BELAS (2018)', 0, 2018, '2018-03-05', '2018-04-05', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(81, 2, 'MESYUARAT PERTAMA PENGGAL KEENAM, PARLIMEN KETIGA BELAS (2018)', 0, 2018, '2018-03-26', '2018-04-05', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(82, 1, 'MESYUARAT PERTAMA, PENGGAL PERTAMA, PARLIMEN KE EMPAT BELAS (2018) ', 0, 2018, '2018-07-16', '2018-08-16', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(83, 2, 'MESYUARAT PERTAMA PENGGAL PERTAMA, PARLIMEN KEEMPAT BELAS (2018)', 0, 2018, '2018-08-27', '2018-09-13', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(84, 1, 'MESYUARAT KEDUA PENGGAL PERTAMA, PARLIMEN KEEMPAT BELAS (2018)', 0, 2018, '2018-10-15', '2018-12-11', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(85, 2, 'MESYUARAT KEDUA PENGGAL PERTAMA, PARLIMEN KEEMPAT BELAS (2018)', 0, 2018, '2018-12-03', '2018-12-20', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(86, 1, 'MESYUARAT PERTAMA PENGGAL KEDUA PARLIMEN KEEMPAT BELAS (2019)', 0, 2019, '2019-03-11', '2019-04-11', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(87, 1, 'MESYUARAT KEDUA PENGGAL KEDUA PARLIMEN KEEMPAT BELAS (2019)', 0, 2019, '2019-07-01', '2019-07-18', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(88, 2, 'MESYUARAT PERTAMA PENGGAL KEDUA PARLIMEN KEEMPAT BELAS (2019)', 0, 2019, '2019-04-22', '2019-05-09', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(89, 2, 'MESYUARAT KEDUA PENGGAL KEDUA PARLIMEN KEEMPAT BELAS (2019)', 0, 2019, '2019-07-22', '2019-07-31', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(90, 1, 'wqewqewq asdsadsads', 0, 2020, '2020-03-03', '2020-03-29', NULL, NULL, NULL, NULL, 1, '1', '2020-10-02 17:03:49'),
(91, 1, 'test julai', 0, 2020, '2020-07-13', '2020-08-06', NULL, NULL, NULL, NULL, 1, '1', '2020-10-02 17:03:39'),
(93, 1, 'MESYUARAT KETIGA PENGGAL KETIGA', 0, 2020, '2020-11-02', '2020-11-20', NULL, NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kod_unit`
--

CREATE TABLE `kod_unit` (
  `id_unit` int(11) NOT NULL,
  `id_bahagian` int(11) DEFAULT NULL,
  `nama_unit` varchar(64) DEFAULT NULL,
  `status_unit` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_p_lampiran1`
--

CREATE TABLE `laporan_p_lampiran1` (
  `lp_id` bigint(20) NOT NULL,
  `id_laporan` bigint(20) NOT NULL,
  `oleh_id` bigint(20) NOT NULL DEFAULT 0,
  `ahli_parlimen` varchar(128) DEFAULT NULL,
  `kawasan_parlimen` varchar(128) DEFAULT NULL,
  `tarikh` date DEFAULT NULL,
  `masa` varchar(20) DEFAULT NULL,
  `soalan` text DEFAULT NULL,
  `tindakan` text CHARACTER SET utf8 DEFAULT NULL,
  `create_dt` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_dt` datetime NOT NULL,
  `update_by` int(11) NOT NULL,
  `type` varchar(1) NOT NULL DEFAULT 'L'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_p_lampiran1`
--

INSERT INTO `laporan_p_lampiran1` (`lp_id`, `id_laporan`, `oleh_id`, `ahli_parlimen`, `kawasan_parlimen`, `tarikh`, `masa`, `soalan`, `tindakan`, `create_dt`, `create_by`, `update_dt`, `update_by`, `type`) VALUES
(1, 2, 584, 'YB Dato\' Seri Dr. Shahidan Bin Kassim', 'P.003 : Arau', '2020-11-03', '09:12', 'gffff', NULL, '2020-11-04 10:08:17', 1, '0000-00-00 00:00:00', 0, 'L');

-- --------------------------------------------------------

--
-- Table structure for table `search_table`
--

CREATE TABLE `search_table` (
  `type` varchar(10) DEFAULT NULL,
  `doc_title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `link` varchar(128) DEFAULT NULL,
  `ref_id` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL,
  `kod_bahagian` int(11) DEFAULT NULL,
  `id_sidang` int(11) DEFAULT NULL,
  `j_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soalan_input`
--

CREATE TABLE `soalan_input` (
  `input_id` int(11) NOT NULL,
  `soalan_id` varchar(32) DEFAULT NULL,
  `bahagian_id` int(11) DEFAULT NULL,
  `jawapan_input` text DEFAULT NULL,
  `tkh_sasaran` date DEFAULT NULL,
  `create_dt` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `is_email` tinyint(11) DEFAULT 0,
  `is_delete` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soalan_input`
--

INSERT INTO `soalan_input` (`input_id`, `soalan_id`, `bahagian_id`, `jawapan_input`, `tkh_sasaran`, `create_dt`, `create_by`, `update_dt`, `update_by`, `is_email`, `is_delete`) VALUES
(1, '20201104-5fa2128de2d42', 1, NULL, '2020-11-18', '2020-11-15 20:16:39', 1, '2020-11-15 20:16:39', 1, 1, 1),
(2, '20201104-5fa2128de2d42', 2, NULL, '2020-11-19', '2020-11-16 15:07:12', 1, '2020-11-16 15:07:12', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `soalan_parlimen`
--

CREATE TABLE `soalan_parlimen` (
  `soalan_id` varchar(32) NOT NULL DEFAULT '',
  `no_soalan` varchar(10) DEFAULT NULL,
  `type_soalan` varchar(64) DEFAULT NULL,
  `id_sidang` bigint(20) NOT NULL DEFAULT 0,
  `tkh_soalan` date DEFAULT NULL,
  `tkh_sasaran` date DEFAULT NULL,
  `tkh_agihan` date DEFAULT NULL,
  `tkh_dikembalikan` date DEFAULT NULL,
  `tkh_dedline` date DEFAULT NULL,
  `tkh_jwb_parlimen` date DEFAULT NULL,
  `j_tanya` int(11) DEFAULT 0,
  `j_tanya_det` varchar(12) DEFAULT NULL,
  `j_dewan` int(11) DEFAULT 0,
  `j_kategori` int(11) DEFAULT 0,
  `kod_bahagian` int(11) DEFAULT 0,
  `kod_unit` int(11) DEFAULT NULL,
  `peg_id` int(11) DEFAULT NULL,
  `parti` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `s_oleh` int(11) DEFAULT 0,
  `soalan_oleh` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `soalan_kawasan` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `menteri` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `soalan` text CHARACTER SET utf8 DEFAULT NULL,
  `jawapan` text CHARACTER SET utf8 DEFAULT NULL,
  `tkh_jawab_soalan` date DEFAULT NULL,
  `jawapan_menteri` text CHARACTER SET utf8 DEFAULT NULL,
  `sedia_oleh` int(11) DEFAULT NULL,
  `sedia_nama` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `sedia_jawatan` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `sedia_bahagian` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `sedia_tel` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `semak_oleh` int(11) DEFAULT NULL,
  `semak_nama` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `semak_jawatan` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `semak_bahagian` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `semak_tel` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `lulus_oleh` int(11) DEFAULT NULL,
  `lulus_nama` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `lulus_jawatan` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `lulus_bahagian` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `lulus_tel` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `maklumat_tambah` text CHARACTER SET utf8 DEFAULT NULL,
  `attach_1` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `attach_2` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `is_semak` tinyint(1) DEFAULT 0,
  `is_sah` tinyint(1) DEFAULT 0,
  `create_dt` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT NULL,
  `deleted_dt` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `search_upd_dt` datetime DEFAULT NULL,
  `search_updj_dt` datetime DEFAULT NULL,
  `search_updm_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soalan_parlimen`
--

INSERT INTO `soalan_parlimen` (`soalan_id`, `no_soalan`, `type_soalan`, `id_sidang`, `tkh_soalan`, `tkh_sasaran`, `tkh_agihan`, `tkh_dikembalikan`, `tkh_dedline`, `tkh_jwb_parlimen`, `j_tanya`, `j_tanya_det`, `j_dewan`, `j_kategori`, `kod_bahagian`, `kod_unit`, `peg_id`, `parti`, `s_oleh`, `soalan_oleh`, `soalan_kawasan`, `menteri`, `soalan`, `jawapan`, `tkh_jawab_soalan`, `jawapan_menteri`, `sedia_oleh`, `sedia_nama`, `sedia_jawatan`, `sedia_bahagian`, `sedia_tel`, `semak_oleh`, `semak_nama`, `semak_jawatan`, `semak_bahagian`, `semak_tel`, `lulus_oleh`, `lulus_nama`, `lulus_jawatan`, `lulus_bahagian`, `lulus_tel`, `maklumat_tambah`, `attach_1`, `attach_2`, `is_semak`, `is_sah`, `create_dt`, `create_by`, `update_dt`, `update_by`, `is_deleted`, `deleted_dt`, `deleted_by`, `status`, `search_upd_dt`, `search_updj_dt`, `search_updm_dt`) VALUES
('20201104-5fa211e001307', '286', NULL, 93, '2020-11-04', NULL, '2020-11-04', NULL, '2020-11-18', '2020-11-18', 1, NULL, 1, 1, 1, NULL, 2, NULL, 517, 'YB DATO\' SERI HAJI MUKHRIZ TUN DR. MAHATHIR', 'P.005 : Jerlun', 'YB Menteri', '<p>dasdsada</p>', '<p>Tuan Yang di-Pertua,<br />\r\nsfsaefasfsaf</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>fsaasfqwfsafas</p>', NULL, NULL, 0, 0, '2020-11-04 10:28:48', 1, '2020-11-04 10:28:48', 1, 0, NULL, NULL, 2, NULL, NULL, NULL),
('20201104-5fa2128de2d42', '989', NULL, 93, '2020-11-02', NULL, '2020-11-11', NULL, '2020-11-03', NULL, 1, NULL, 1, 1, 1, NULL, 2, NULL, 576, 'YB TUAN HAJI AWANG BIN HASHIM', 'P.011 : Pendang', 'YB Menteri', '<p>jjbhjbhjhj samkldnaw,dnmw,fn,ans,fnilqknfa,msnfjkshdkamsnfmbaskf<br />\r\nAflaslknfasklfhlas</p>\r\n\r\n<p>fsafkjsanfsalknflknaslf</p>\r\n\r\n<p>afkkjasnfkansfknasklfnlasflasflkasjfklasjflksjfljaskfjalskjfoiwqkfn,aniwklfnqfioaslkjfas</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2020-11-04 10:31:41', 1, '2020-11-18 09:29:13', 1, 0, NULL, NULL, 1, NULL, NULL, NULL),
('20201118-5fb47f1b23a69', '12', 'B', 91, '2020-06-09', NULL, NULL, NULL, NULL, '2020-06-15', 1, NULL, 1, 2, 0, NULL, NULL, NULL, 113, 'Y.B. Tuan Haji Nasharudin bin Mat Isa (null)', 'P.025 : Bachok', 'YB Menteri', '<p>testing from soalan backlog/ arkiv</p>\r\n\r\n<p>soalan yang dikemukakan adalah daripada backlog yang sebelum ini</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2020-11-18 09:55:39', 1, '2020-11-18 09:55:39', 1, 0, NULL, NULL, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `soalan_pukal`
--

CREATE TABLE `soalan_pukal` (
  `pukal_id` varchar(32) NOT NULL,
  `id_dewan` smallint(6) NOT NULL,
  `id_sidang` int(11) NOT NULL,
  `tarikh_soalan` date NOT NULL,
  `tarikh_sasaran` date DEFAULT NULL,
  `menteri` varchar(32) DEFAULT NULL,
  `tkh_dedline` date DEFAULT NULL,
  `tkh_jwb_parlimen` date DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0,
  `create_dt` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `pukal_status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `soalan_pukal_detail`
--

CREATE TABLE `soalan_pukal_detail` (
  `sp_id` int(11) NOT NULL,
  `pukal_id` varchar(32) NOT NULL,
  `soalan_id` varchar(32) NOT NULL,
  `create_dt` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_dt` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `soalan_semakan`
--

CREATE TABLE `soalan_semakan` (
  `semakan_id` int(11) NOT NULL,
  `soalan_id` varchar(32) DEFAULT NULL,
  `semakan_jenis` varchar(12) DEFAULT NULL,
  `tkh_buka` datetime DEFAULT NULL,
  `tkh_hantar` datetime DEFAULT NULL,
  `tkh_kemaskini` datetime DEFAULT NULL,
  `kenyataan` text DEFAULT NULL,
  `semakan_status` tinyint(1) DEFAULT 0,
  `semakan_oleh` varchar(32) DEFAULT NULL,
  `semakan_ip` varchar(24) DEFAULT NULL,
  `tkh_serah` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbllaporantugasan`
--

CREATE TABLE `tbllaporantugasan` (
  `id` int(11) NOT NULL,
  `jad_id` bigint(20) NOT NULL,
  `id_sidang` int(11) NOT NULL DEFAULT 0,
  `dewan` varchar(20) DEFAULT NULL,
  `tarikh` date DEFAULT NULL,
  `hari` varchar(15) DEFAULT NULL,
  `pegawai1` varchar(60) DEFAULT NULL,
  `pegawai1_unit` varchar(60) DEFAULT NULL,
  `pegawai1_bhgn` varchar(60) DEFAULT NULL,
  `pegawai1_telpej` varchar(11) DEFAULT NULL,
  `pegawai1_telhp` varchar(11) DEFAULT NULL,
  `pegawai2` varchar(60) DEFAULT NULL,
  `pegawai2_unit` varchar(60) DEFAULT NULL,
  `pegawai2_bhgn` varchar(60) DEFAULT NULL,
  `pegawai2_telpej` varchar(11) DEFAULT NULL,
  `pegawai2_telhp` varchar(11) DEFAULT NULL,
  `pegawai3` varchar(64) DEFAULT NULL,
  `soalan1` varchar(10) DEFAULT NULL,
  `soalan2` varchar(10) DEFAULT NULL,
  `soalan3` varchar(10) DEFAULT NULL,
  `soalan3a` varchar(10) DEFAULT NULL,
  `soalan4` varchar(10) DEFAULT NULL,
  `soalan4a` varchar(10) DEFAULT NULL,
  `soalan5` varchar(10) DEFAULT NULL,
  `soalan6` varchar(10) DEFAULT NULL,
  `soalan7` text DEFAULT NULL,
  `soalan8_1` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `soalan8_2` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `soalan8_3` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `soalan8_4` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `soalan8_5` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `soalan9` varchar(10) DEFAULT NULL,
  `soalan10_1` varchar(20) DEFAULT NULL,
  `soalan10_1a` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `soalan10_2` varchar(20) DEFAULT NULL,
  `soalan10_2a` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `soalan10_3` varchar(20) DEFAULT NULL,
  `soalan10_3a` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `soalan10_4` varchar(20) DEFAULT NULL,
  `soalan10_4a` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `soalan10_5` varchar(20) DEFAULT NULL,
  `soalan10_5a` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `soalan11_1` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `soalan11_2` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `soalan11_3` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `soalan11_4` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `soalan11_5` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `dewan_tangguh` varchar(10) DEFAULT NULL,
  `sidang_sambung` varchar(10) DEFAULT NULL,
  `reporter_nama` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `reporter_nama2` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllaporantugasan`
--

INSERT INTO `tbllaporantugasan` (`id`, `jad_id`, `id_sidang`, `dewan`, `tarikh`, `hari`, `pegawai1`, `pegawai1_unit`, `pegawai1_bhgn`, `pegawai1_telpej`, `pegawai1_telhp`, `pegawai2`, `pegawai2_unit`, `pegawai2_bhgn`, `pegawai2_telpej`, `pegawai2_telhp`, `pegawai3`, `soalan1`, `soalan2`, `soalan3`, `soalan3a`, `soalan4`, `soalan4a`, `soalan5`, `soalan6`, `soalan7`, `soalan8_1`, `soalan8_2`, `soalan8_3`, `soalan8_4`, `soalan8_5`, `soalan9`, `soalan10_1`, `soalan10_1a`, `soalan10_2`, `soalan10_2a`, `soalan10_3`, `soalan10_3a`, `soalan10_4`, `soalan10_4a`, `soalan10_5`, `soalan10_5a`, `soalan11_1`, `soalan11_2`, `soalan11_3`, `soalan11_4`, `soalan11_5`, `dewan_tangguh`, `sidang_sambung`, `reporter_nama`, `reporter_nama2`, `update_dt`) VALUES
(1, 1, 93, 'DEWAN RAKYAT', '2020-11-02', 'Isnin', 'Pegawai 2', NULL, NULL, NULL, NULL, 'Pegawai 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ada', NULL, 'Ada', NULL, 'Ada', 'Ada', NULL, NULL, NULL, 'dasdasdasda', 'dasdasdas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 93, 'DEWAN RAKYAT', '2020-11-03', 'Selasa', 'Pegawai 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ghhgh', 'fgfgf', 'gfgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attachment`
--

CREATE TABLE `tbl_attachment` (
  `attach_id` bigint(20) NOT NULL,
  `soalan_id` varchar(32) DEFAULT NULL,
  `file_tajuk` varchar(128) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT '',
  `file_type` varchar(5) DEFAULT '',
  `update_dt` datetime DEFAULT NULL,
  `search_upd_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attachment`
--

INSERT INTO `tbl_attachment` (`attach_id`, `soalan_id`, `file_tajuk`, `file_name`, `file_type`, `update_dt`, `search_upd_dt`) VALUES
(2, '20201104-5fa2128de2d42', 'Second FIle', 'DITU_3964_DIPLOMA_PROJECT_2021_v1.pdf', 'pdf', '2020-11-15 22:28:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `menu_id` int(11) NOT NULL,
  `grp_id` int(11) NOT NULL DEFAULT 0,
  `menu_name` varchar(64) DEFAULT NULL,
  `menu_link` varchar(128) DEFAULT NULL,
  `menu_status` tinyint(1) DEFAULT NULL,
  `sort` smallint(6) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_urusetia` tinyint(1) NOT NULL DEFAULT 0,
  `is_bahagian` tinyint(1) NOT NULL DEFAULT 0,
  `is_pegawai` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`menu_id`, `grp_id`, `menu_name`, `menu_link`, `menu_status`, `sort`, `is_admin`, `is_urusetia`, `is_bahagian`, `is_pegawai`) VALUES
(1, 1, 'Daftar Soalan Dewan Rakyat', 'soalan/daftar_form_dr.php', 0, 2, 0, 0, 0, 1),
(2, 1, 'Daftar Soalan - Pukal', 'soalan/daftar_pukal.php', 1, 1, 0, 0, 0, 1),
(3, 2, 'Kemasukan Jawapan', 'soalan/jawapan.php', 0, 2, 0, 0, 0, 1),
(4, 2, 'Ulasan KP/TKPD', 'soalan/jawapan_menteri.php', 1, 5, 0, 0, 0, 1),
(5, 1, 'Carian Soalan', 'soalan/carian.php', 1, 6, 0, 0, 0, 1),
(6, 3, 'Daftar Pegawai Bertugas', 'peg_bertugas/cal_view.php', 0, 1, 0, 0, 0, 1),
(7, 3, 'Laporan Pegawai Bertugas', 'peg_bertugas/laporan.php', 0, 2, 0, 0, 0, 0),
(8, 3, 'Senarai Pegawai Bertugas', 'peg_bertugas/senarai.php', 0, 3, 0, 0, 0, 0),
(9, 4, 'Daftar Kakitangan', 'utiliti/kakitangan.php', 0, 1, 0, 0, 0, 1),
(10, 4, 'Daftar Ahli Dewan Rakyat', 'utiliti/ap.php', 0, 2, 0, 0, 0, 1),
(11, 4, 'Daftar Kategori', 'utiliti/kategori.php', 0, 3, 0, 0, 0, 1),
(12, 3, 'Senarai Agensi', 'utiliti/agensi.php', 1, 4, 0, 0, 0, 1),
(13, 4, 'Senarai Bahagian', 'utiliti/bahagian.php', 0, 5, 0, 0, 0, 1),
(14, 4, 'Senarai Unit/Bahagian', 'utiliti/unit.php', 1, 6, 0, 0, 0, 1),
(15, 4, 'Daftar Maklumat Persidangan', 'utiliti/sidang.php', 0, 7, 0, 0, 0, 1),
(16, 5, 'Laporan', 'laporan/laporan_pertanyaan.php', 0, 1, 0, 0, 0, 1),
(17, 5, 'Laporan Bahagian', 'laporan/laporan_bahagian.php', 1, 2, 0, 0, 0, 1),
(18, 4, 'Dokumen Rujukan', 'utiliti/doc_rujukan.php', 0, 0, 0, 0, 0, 1),
(19, 2, 'Senarai Jawapan', 'soalan/jawapan_senarai.php', 0, 3, 0, 0, 0, 1),
(20, 3, 'Cetak Jadual Pegawai Bertugas', 'peg_bertugas/cetak_peg.php', 0, 4, 0, 0, 0, 0),
(21, 1, 'Senarai Soalan', 'soalan/daftar.php', 0, 3, 0, 0, 0, 1),
(22, 4, 'Daftar Ahli Dewan Negara', 'utiliti/adewan.php', 0, 2, 0, 0, 0, 1),
(23, 3, 'Senarai Laporan Bertugas', 'peg_bertugas/senarai_laporan_peg.php', 0, 2, 0, 0, 0, 0),
(24, 1, 'Daftar Soalan Dewan Negara', 'soalan/daftar_form_dn.php', 0, 2, 0, 0, 0, 1),
(25, 4, 'Proses Semula Maklumat Carian', 'carian/pro_update.php', 0, 8, 0, 0, 0, 1),
(26, 6, 'Pengulungan Perbahasan', 'pengulungan/pg_senarai.php', 0, 0, 0, 0, 0, 1),
(27, 4, 'Daftar Kakitangan Tidak Aktif', 'utiliti/kakitangan_ta.php', 0, 9, 0, 0, 0, 1),
(28, 4, 'Daftar Ahli Dewan Rakyat Tidak Aktif', 'utiliti/ap_ta.php', 0, 10, 0, 0, 0, 1),
(29, 2, 'Semakan Jawapan', 'soalan/jawapan_semakan.php', 0, 5, 0, 0, 0, 1),
(30, 2, 'Pengesahan Jawapan', 'soalan/jawapan_kelulusan.php', 0, 6, 0, 0, 0, 1),
(31, 4, 'Daftar Sub-Kategori', 'utiliti/sub_kategori.php', 0, 4, 0, 0, 0, 1),
(32, 2, 'Backlog/Arkiv', 'soalan/jawapan_backlog.php', 0, 8, 0, 0, 0, 1),
(33, 2, 'Jawapan Input', 'soalan/jawapan_input.php', 0, 4, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu1`
--

CREATE TABLE `tbl_menu1` (
  `menu_id` int(11) NOT NULL,
  `grp_id` int(11) NOT NULL DEFAULT 0,
  `menu_name` varchar(64) DEFAULT NULL,
  `menu_link` varchar(128) DEFAULT NULL,
  `menu_status` tinyint(1) NOT NULL DEFAULT 0,
  `sort` smallint(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu1`
--

INSERT INTO `tbl_menu1` (`menu_id`, `grp_id`, `menu_name`, `menu_link`, `menu_status`, `sort`) VALUES
(1, 1, 'Daftar Soalan Dewan Rakyat', '1;soalan/daftar_form_dr.php', 0, 1),
(3, 2, 'Kemasukan Jawapan', '2;soalan/jawapan.php', 0, 3),
(4, 2, 'Kemasukan Komen Ketua Pengarah', '2;soalan/jawapan_menteri.php', 0, 5),
(5, 1, 'Carian Soalan', '1;soalan/carian.php', 1, 6),
(6, 3, 'Daftar Pegawai Bertugas', '3;peg_bertugas/cal_view.php', 0, 1),
(7, 3, 'Laporan Pegawai Bertugas', '3;peg_bertugas/laporan.php', 0, 2),
(8, 3, 'Senarai Pegawai Bertugas', '3;peg_bertugas/senarai.php', 0, 3),
(9, 4, 'Daftar Kakitangan', '4;utiliti/kakitangan.php', 0, 1),
(10, 4, 'Daftar Ahli Dewan Rakyat', '4;utiliti/ap.php', 0, 2),
(11, 4, 'Daftar Kategori', '4;utiliti/kategori.php', 0, 3),
(12, 3, 'Senarai Agensi', '3;utiliti/agensi.php', 1, 4),
(13, 4, 'Senarai Bahagian', '4;utiliti/bahagian.php', 0, 5),
(14, 4, 'Senarai Unit/Bahagian', '4;utiliti/unit.php', 0, 6),
(15, 4, 'Daftar Maklumat Persidangan', '4;utiliti/sidang.php', 0, 7),
(16, 5, 'Laporan', '5;laporan/laporan_pertanyaan.php', 0, 1),
(17, 5, 'Laporan Bahagian', '5;laporan/laporan_bahagian.php', 1, 2),
(18, 4, 'Dokumen Rujukan', '4;utiliti/doc_rujukan.php', 0, 0),
(19, 2, 'Senarai Jawapan', '2;soalan/jawapan_senarai.php', 0, 4),
(20, 3, 'Cetak Jadual Bertugas', '3;peg_bertugas/cetak_peg.php', 0, 4),
(21, 1, 'Senarai Soalan', '1;soalan/daftar.php', 0, 2),
(22, 4, 'Daftar Ahli Dewan Negara', '4;utiliti/adewan.php', 0, 2),
(23, 3, 'Senarai Laporan Bertugas', '3;peg_bertugas/senarai_laporan_peg.php', 0, 2),
(24, 1, 'Daftar Soalan Dewan Negara', '1;soalan/daftar_form_dn.php', 0, 1),
(25, 4, 'Proses Semula Maklumat Carian', '4;carian/pro_update.php', 0, 8),
(26, 6, 'Pengulungan Perbahasan', '6;pengulungan/pg_senarai.php', 0, 0),
(27, 4, 'Daftar Kakitangan Tidak Aktif', '4;utiliti/kakitangan_ta.php', 0, 9),
(28, 4, 'Daftar Ahli Dewan Rakyat Tidak Aktif', '4;utiliti/ap_ta.php', 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_user`
--

CREATE TABLE `tbl_menu_user` (
  `menu_uid` bigint(20) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `id_kakitangan` int(11) NOT NULL,
  `is_add` tinyint(1) DEFAULT NULL,
  `is_upd` tinyint(1) DEFAULT NULL,
  `is_del` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_menu_user`
--

INSERT INTO `tbl_menu_user` (`menu_uid`, `menu_id`, `id_kakitangan`, `is_add`, `is_upd`, `is_del`) VALUES
(1, 3, 1, 1, 1, 1),
(2, 19, 1, 1, 1, 1),
(3, 4, 1, 1, 1, 1),
(4, 6, 1, 0, 0, 0),
(5, 7, 1, 0, 0, 0),
(6, 23, 1, 0, 0, 0),
(7, 8, 1, 0, 0, 0),
(8, 20, 1, 0, 0, 0),
(9, 18, 1, 1, 1, 1),
(10, 9, 1, 1, 1, 1),
(11, 10, 1, 1, 1, 1),
(12, 22, 1, 1, 1, 1),
(13, 11, 1, 1, 1, 1),
(14, 13, 1, 1, 1, 1),
(15, 14, 1, 1, 1, 1),
(16, 15, 1, 1, 1, 1),
(17, 25, 1, 1, 1, 1),
(18, 27, 1, 1, 1, 1),
(19, 28, 1, 1, 1, 1),
(20, 16, 1, 0, 0, 0),
(21, 26, 1, 1, 1, 1),
(22, 29, 1, 1, 1, 1),
(23, 30, 1, 1, 1, 1),
(24, 1, 1, 1, 1, 1),
(25, 24, 1, 1, 1, 1),
(26, 21, 1, 1, 1, 1),
(27, 2, 1, 1, 1, 1),
(28, 31, 1, 1, 1, 1),
(29, 33, 1, 1, 1, 1),
(30, 32, 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ahliparlimen`
--
ALTER TABLE `ahliparlimen`
  ADD PRIMARY KEY (`id_ap`),
  ADD KEY `nama_ap` (`nama_ap`,`no_kp_ap`);

--
-- Indexes for table `auditrail`
--
ALTER TABLE `auditrail`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `doc_rujukan`
--
ALTER TABLE `doc_rujukan`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `jadual_tugas`
--
ALTER TABLE `jadual_tugas`
  ADD PRIMARY KEY (`jad_id`),
  ADD KEY `id_sidang` (`id_sidang`,`jad_tkh`);

--
-- Indexes for table `kakitangan`
--
ALTER TABLE `kakitangan`
  ADD PRIMARY KEY (`id_kakitangan`),
  ADD KEY `nama_kakitangan` (`nama_kakitangan`,`no_kp_kakitangan`);

--
-- Indexes for table `kod_bahagian`
--
ALTER TABLE `kod_bahagian`
  ADD PRIMARY KEY (`id_bahagian`);

--
-- Indexes for table `kod_dewan`
--
ALTER TABLE `kod_dewan`
  ADD PRIMARY KEY (`j_dewan`);

--
-- Indexes for table `kod_grpmenu`
--
ALTER TABLE `kod_grpmenu`
  ADD PRIMARY KEY (`grp_id`);

--
-- Indexes for table `kod_jawatan`
--
ALTER TABLE `kod_jawatan`
  ADD PRIMARY KEY (`jaw_id`);

--
-- Indexes for table `kod_kategori`
--
ALTER TABLE `kod_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kod_kategori_sub`
--
ALTER TABLE `kod_kategori_sub`
  ADD PRIMARY KEY (`idsub_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kod_parlimen`
--
ALTER TABLE `kod_parlimen`
  ADD PRIMARY KEY (`p_kod`);

--
-- Indexes for table `kod_parti`
--
ALTER TABLE `kod_parti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kod_pertanyaan`
--
ALTER TABLE `kod_pertanyaan`
  ADD PRIMARY KEY (`j_tanya`);

--
-- Indexes for table `kod_sidang`
--
ALTER TABLE `kod_sidang`
  ADD PRIMARY KEY (`id_sidang`),
  ADD KEY `persidangan` (`persidangan`);

--
-- Indexes for table `kod_unit`
--
ALTER TABLE `kod_unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `laporan_p_lampiran1`
--
ALTER TABLE `laporan_p_lampiran1`
  ADD PRIMARY KEY (`lp_id`);

--
-- Indexes for table `search_table`
--
ALTER TABLE `search_table`
  ADD KEY `doc_title` (`doc_title`),
  ADD KEY `ref_id` (`ref_id`),
  ADD KEY `link` (`link`),
  ADD KEY `type` (`type`),
  ADD KEY `doc_title_2` (`doc_title`);

--
-- Indexes for table `soalan_input`
--
ALTER TABLE `soalan_input`
  ADD PRIMARY KEY (`input_id`);

--
-- Indexes for table `soalan_parlimen`
--
ALTER TABLE `soalan_parlimen`
  ADD PRIMARY KEY (`soalan_id`),
  ADD KEY `j_tanya` (`j_tanya`,`j_dewan`,`j_kategori`,`kod_bahagian`);

--
-- Indexes for table `soalan_pukal`
--
ALTER TABLE `soalan_pukal`
  ADD PRIMARY KEY (`pukal_id`),
  ADD KEY `id_dewan` (`id_dewan`),
  ADD KEY `id_sidang` (`id_sidang`);

--
-- Indexes for table `soalan_pukal_detail`
--
ALTER TABLE `soalan_pukal_detail`
  ADD PRIMARY KEY (`sp_id`),
  ADD KEY `pukal_id` (`pukal_id`),
  ADD KEY `soalan_id` (`soalan_id`);

--
-- Indexes for table `soalan_semakan`
--
ALTER TABLE `soalan_semakan`
  ADD PRIMARY KEY (`semakan_id`);

--
-- Indexes for table `tbllaporantugasan`
--
ALTER TABLE `tbllaporantugasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jad_id` (`jad_id`,`id_sidang`);

--
-- Indexes for table `tbl_attachment`
--
ALTER TABLE `tbl_attachment`
  ADD PRIMARY KEY (`attach_id`),
  ADD KEY `soalan_id` (`soalan_id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `grp_id` (`grp_id`);

--
-- Indexes for table `tbl_menu1`
--
ALTER TABLE `tbl_menu1`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `grp_id` (`grp_id`);

--
-- Indexes for table `tbl_menu_user`
--
ALTER TABLE `tbl_menu_user`
  ADD PRIMARY KEY (`menu_uid`),
  ADD KEY `id_kakitangan` (`id_kakitangan`,`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ahliparlimen`
--
ALTER TABLE `ahliparlimen`
  MODIFY `id_ap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=620;

--
-- AUTO_INCREMENT for table `auditrail`
--
ALTER TABLE `auditrail`
  MODIFY `aid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadual_tugas`
--
ALTER TABLE `jadual_tugas`
  MODIFY `jad_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `kakitangan`
--
ALTER TABLE `kakitangan`
  MODIFY `id_kakitangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kod_bahagian`
--
ALTER TABLE `kod_bahagian`
  MODIFY `id_bahagian` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kod_dewan`
--
ALTER TABLE `kod_dewan`
  MODIFY `j_dewan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kod_kategori`
--
ALTER TABLE `kod_kategori`
  MODIFY `id_kategori` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kod_kategori_sub`
--
ALTER TABLE `kod_kategori_sub`
  MODIFY `idsub_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kod_parti`
--
ALTER TABLE `kod_parti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kod_pertanyaan`
--
ALTER TABLE `kod_pertanyaan`
  MODIFY `j_tanya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kod_sidang`
--
ALTER TABLE `kod_sidang`
  MODIFY `id_sidang` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `kod_unit`
--
ALTER TABLE `kod_unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_p_lampiran1`
--
ALTER TABLE `laporan_p_lampiran1`
  MODIFY `lp_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `soalan_input`
--
ALTER TABLE `soalan_input`
  MODIFY `input_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `soalan_pukal_detail`
--
ALTER TABLE `soalan_pukal_detail`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soalan_semakan`
--
ALTER TABLE `soalan_semakan`
  MODIFY `semakan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbllaporantugasan`
--
ALTER TABLE `tbllaporantugasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_attachment`
--
ALTER TABLE `tbl_attachment`
  MODIFY `attach_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_menu1`
--
ALTER TABLE `tbl_menu1`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_menu_user`
--
ALTER TABLE `tbl_menu_user`
  MODIFY `menu_uid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
