-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2025 at 04:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kecamatan_tigaraksa`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id_about` int(11) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `visi` longtext NOT NULL,
  `misi` longtext NOT NULL,
  `gambar_about` varchar(255) NOT NULL,
  `bagan_organisasi` varchar(255) NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id_about`, `id_wilayah`, `visi`, `misi`, `gambar_about`, `bagan_organisasi`, `updated_by`, `updated_at`) VALUES
(1, 13, '<p><strong>Visi Kecamatan</strong> Tigaraksa bertujuan memberikan arah strategis bagi pembangunan daerah yang berkelanjutan sebagai berikut:s</p>\r\n\r\n<p>&quot;Terwujudnya kehidupan masyarakat Kecamatan Tigaraksa yang cerdas, religius, dan berwawasan kemandirian&quot;</p>\r\n\r\n<ul>\r\n	<li>Cerdas: Masyarakat memiliki wawasan, keterampilan, serta pendidikan yang mendukung kualitas hidup</li>\r\n	<li>Religius: Nilai-nilai agama menjadi landasan dalam kehidupan masyarakat dan kebijakan pemerintah</li>\r\n	<li>Berwawasan Kemandirian: Masyarakat mampu berpikir kreatif, inovatif, serta mandiri dalam menghadapi tantangan</li>\r\n</ul>\r\n\r\n<p>Visi ini menjadi pedoman dalam menyusun program prioritas dan kegiatan pembangunan di Kecamatan Tigaraksa</p>', '<ul>\r\n<li>Meningkatkan fasilitas pendidikan dan layanan kesehatan masyarakat</li>\r\n<li>Mendorong pertumbuhan ekonomi berbasis UMKM sesuai potensi wilayah</li>\r\n<li>Mewujudkan kesejahteraan sosial dengan nilai-nilai religius dalam pemerintahan</li>\r\n<li>Mempercepat pembangunan infrastruktur jalan, jembatan, dan fasilitas umum</li>\r\n<li>Meningkatkan ketertiban dan keamanan melalui koordinasi yang efektif</li>\r\n<li>Mengembangkan kapasitas aparatur kecamatan, desa, dan kelurahan dalam pelayanan publik</li>\r\n</ul>\r\n<p>Misi ini menjadi pedoman utama dalam merancang kebijakan dan program pembangunan di Kecamatan Tigaraksa, Tangerang</p>', 'about_us/tentang-kami.jpg', 'bagan_organisasi/tigaraksa.jpg', 1, '2025-04-08 23:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`) VALUES
(1, 'Katolik'),
(2, 'Kristen'),
(3, 'Islam'),
(4, 'Buddha'),
(5, 'Hindu'),
(6, 'Kong Hu Cu'),
(7, 'Kepercayaan Terhadap Tuhan YME/Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` longtext NOT NULL,
  `konten_berita` longtext NOT NULL,
  `gambar_berita` varchar(255) NOT NULL,
  `penulis_berita` varchar(255) NOT NULL,
  `tanggal_berita` date NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `konten_berita`, `gambar_berita`, `penulis_berita`, `tanggal_berita`, `id_wilayah`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Festival Budaya Tigaraksa 2024', 'Pemerintah Kecamatan Tigaraksa mengadakan festival budaya tahunan dengan berbagai pertunjukan seni dan kuliner khas daerah.', 'berita/festival_tigaraksa.jpg', 'Dinas Pariwisata Tigaraksa', '2024-03-01', 1, 1, '2025-03-24 03:20:23', 1, '2025-03-24 03:20:23'),
(2, 'Pembangunan Infrastruktur di Desa Pasir Nangka', 'Proyek pembangunan jalan desa di Pasir Nangka mulai dikerjakan untuk meningkatkan aksesibilitas warga.', 'berita/jalan_pasir_nangka.jpg', 'Dinas PUPR Tigaraksa', '2024-02-20', 2, 1, '2025-03-24 03:20:23', 1, '2025-03-24 03:20:23'),
(3, 'Lomba Kebersihan Antar Desa', 'Dalam rangka memperingati Hari Peduli Sampah Nasional, Kecamatan Tigaraksa menggelar lomba kebersihan antar desa.', 'berita/lomba_kebersihan.jpg', 'Pemuda Karang Taruna Tigaraksa', '2024-02-25', 3, 1, '2025-03-24 03:20:23', 1, '2025-03-24 03:20:23'),
(4, 'Sosialisasi Pertanian Organik di Desa Tapos', 'Petani di Desa Tapos diberikan pelatihan tentang pertanian organik untuk meningkatkan hasil panen yang lebih sehat.', 'berita/pelatihan_pertanian.jpg', 'Dinas Pertanian Tigaraksa', '2024-02-15', 4, 1, '2025-03-24 03:20:23', 1, '2025-03-24 03:20:23'),
(5, 'Pengobatan Gratis di Desa Sodong', 'Puskesmas Tigaraksa mengadakan program pengobatan gratis untuk warga Desa Sodong.', 'berita/pengobatan_gratis.jpg', 'Puskesmas Tigaraksa', '2024-03-03', 5, 1, '2025-03-24 03:20:23', 1, '2025-03-24 03:20:23'),
(6, 'Peringatan Hari Kemerdekaan di Desa Cileless', '<p>Pemerintah Kecamatan Tigaraksa mengadakan festival budaya tahunan dengan berbagai pertunjukan seni dan kuliner khas daerah.</p>', 'berita/hari_kemerdekaan_cileles.jpg', 'Panitia HUT RI Tigaraksa', '2024-08-17', 9, 1, '2025-03-24 03:20:23', 1, '2025-03-24 01:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `hubungan_keluarga`
--

CREATE TABLE `hubungan_keluarga` (
  `id_hubungan` int(11) NOT NULL,
  `hubungan_keluarga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hubungan_keluarga`
--

INSERT INTO `hubungan_keluarga` (`id_hubungan`, `hubungan_keluarga`) VALUES
(1, 'Kepala Keluarga'),
(2, 'Suami'),
(3, 'Istri'),
(4, 'Anak'),
(5, 'Menantu'),
(6, 'Cucu'),
(7, 'Orang Tua'),
(8, 'Mertua'),
(9, 'Famili Lain'),
(10, 'Pembantu'),
(11, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kegiatan`
--

CREATE TABLE `jenis_kegiatan` (
  `id_jenis_kegiatan` int(11) NOT NULL,
  `nama_jenis_kegiatan` varchar(50) NOT NULL,
  `gambar_jenis_kegiatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_kegiatan`
--

INSERT INTO `jenis_kegiatan` (`id_jenis_kegiatan`, `nama_jenis_kegiatan`, `gambar_jenis_kegiatan`) VALUES
(1, 'Rapat Koordinasi', 'jenis_kegiatan/rapat-koordinasi.jpeg'),
(2, 'Posyandu', 'jenis_kegiatan/posyandu.png'),
(3, 'Ulang Tahun Desa', 'jenis_kegiatan/ultah-desa.jpg'),
(4, 'Kesehatan', 'jenis_kegiatan/kesehatan.jpg'),
(5, 'Lomba', 'jenis_kegiatan/lomba-desa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_umkm`
--

CREATE TABLE `jenis_umkm` (
  `id_jenis_umkm` int(11) NOT NULL,
  `jenis_umkm` varchar(255) NOT NULL,
  `keterangan` longtext NOT NULL,
  `gambar_jenis_umkm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_umkm`
--

INSERT INTO `jenis_umkm` (`id_jenis_umkm`, `jenis_umkm`, `keterangan`, `gambar_jenis_umkm`) VALUES
(1, 'Jajanan Pasar', 'Aneka jajanan pasar khas daerah dengan cita rasa tradisional', 'jenis_umkm/jajananPasar.jpg'),
(2, 'Kerajinan Rotan', 'Kerajinan tangan khas daerah dari bahan alami', 'jenis_umkm/kerajinanRotan.jpg'),
(3, 'Kue Tradisional', 'Aneka kue tradisional yang lezat dan khas', 'jenis_umkm/kueTradisional.jpg'),
(4, 'Oleh-oleh Khas Daerah', 'Berbagai oleh-oleh khas daerah yang bisa dibawa pulang', 'jenis_umkm/olehOleh.jpg'),
(5, 'Anyaman', 'Produk anyaman dari bahan alami berkualitas tinggi', 'jenis_umkm/anyaman.jpg'),
(6, 'Gorengan', 'Berbagai macam gorengan unik dengan rasa yang unik dan khas', 'jenis_umkm/gorengan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `keterangan` longtext DEFAULT NULL,
  `gambar_kegiatan` varchar(255) DEFAULT NULL,
  `id_wilayah` int(11) NOT NULL,
  `id_jenis_kegiatan` int(11) NOT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `nama_kegiatan`, `keterangan`, `gambar_kegiatan`, `id_wilayah`, `id_jenis_kegiatan`, `tanggal_kegiatan`, `updated_by`, `updated_at`) VALUES
(1, 'Rapat Koordinasi Pembangunan', 'Rapat koordinasi untuk membahas pembangunan infrastruktur di desa.', 'kegiatan/rapat1.jpg', 1, 1, '2025-03-01', NULL, NULL),
(2, 'Posyandu Balita Desa Cisereh', 'Kegiatan posyandu rutin untuk pemeriksaan kesehatan balita.', 'kegiatan/posyandu1.jpg', 2, 2, '2025-03-05', NULL, NULL),
(3, 'Perayaan HUT Desa Pasir Nangka', 'Acara perayaan ulang tahun desa dengan berbagai kegiatan budaya.', 'kegiatan/ultah-desa1.jpg', 3, 3, '2025-04-10', NULL, NULL),
(4, 'Pemeriksaan Kesehatan Gratis', 'Program pemeriksaan kesehatan gratis untuk warga desa.', 'kegiatan/kesehatan1.jpg', 4, 4, '2025-02-25', NULL, NULL),
(5, 'Lomba Kebersihan Antar RT', 'Lomba kebersihan untuk meningkatkan kesadaran warga tentang kebersihan lingkungan.', 'kegiatan/lomba1.jpg', 5, 5, '2025-03-12', NULL, NULL),
(6, 'Rapat Evaluasi Program Desa', 'Evaluasi program desa yang telah berjalan selama setahun.', 'kegiatan/rapat2.jpg', 6, 1, '2025-03-20', NULL, NULL),
(7, 'Posyandu Lansia Desa Mata Gara', 'Kegiatan posyandu untuk pemeriksaan kesehatan lansia.', 'kegiatan/posyandu2.jpg', 7, 2, '2025-04-02', NULL, NULL),
(8, 'Festival Budaya Desa Marga Sari', 'Festival budaya tahunan dengan berbagai pertunjukan seni.', 'kegiatan/ultah-desa2.jpeg', 8, 3, '2025-05-15', NULL, NULL),
(9, 'Sosialisasi Kesehatan Ibu dan Anak', 'Sosialisasi pentingnya kesehatan ibu dan anak di Desa Sodong.', 'kegiatan/kesehatan2.jpeg', 9, 4, '2025-02-18', NULL, NULL),
(10, 'Turnamen Olahraga Desa Tapos', 'Lomba olahraga antar warga desa untuk mempererat persaudaraan.', 'kegiatan/lomba2.jpg', 10, 5, '2025-06-01', NULL, NULL),
(11, 'Musyawarah Desa Bantar Panjang', 'Musyawarah desa terkait rencana pembangunan desa tahun depan.', 'kegiatan/rapat3.jpg', 11, 1, '2025-02-28', NULL, NULL),
(12, 'Pemeriksaan Kesehatan Cileles', 'Pemeriksaan kesehatan gratis untuk warga desa.', 'kegiatan/kesehatan3.jpg', 12, 4, '2025-03-07', NULL, NULL),
(13, 'Lomba Mewarnai Anak Tigaraksa', 'Lomba mewarnai tingkat anak-anak dalam rangka memperingati Hari Anak.', 'kegiatan/lomba3.jpg', 13, 5, '2025-03-22', NULL, NULL),
(14, 'Posyandu Bayi Kelurahan Kadu Agung', 'Pelayanan posyandu untuk bayi dan balita.', 'kegiatan/posyandu3.jpg', 14, 2, '2025-04-05', NULL, NULL),
(15, 'Rapat Perencanaan Kelurahan Tigaraksa', 'Rapat membahas perencanaan program kelurahan.', 'kegiatan/rapat3.jpg', 15, 1, '2025-04-15', 1, '2025-03-21 01:37:27');

-- --------------------------------------------------------

--
-- Table structure for table `kelahiran_penduduk`
--

CREATE TABLE `kelahiran_penduduk` (
  `id_kelahiran` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `no_akta` varchar(50) NOT NULL,
  `waktu_lahir` time DEFAULT NULL,
  `tempat_dilahirkan` varchar(255) NOT NULL,
  `anak_ke` int(11) NOT NULL,
  `berat_lahir` int(11) NOT NULL,
  `tinggi_lahir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelahiran_penduduk`
--

INSERT INTO `kelahiran_penduduk` (`id_kelahiran`, `id_penduduk`, `no_akta`, `waktu_lahir`, `tempat_dilahirkan`, `anak_ke`, `berat_lahir`, `tinggi_lahir`) VALUES
(1, 1, '3578-LU-01012001-0020', '01:01:01', 'RSUD MNO', 2, 3950, 70),
(2, 2, '3578-LU-01041995-0018', '01:42:58', 'RSUD KLM', 1, 2999, 55),
(3, 3, '3578-LU-11102009-0020', '00:14:51', 'Rumah Sakit BCD', 3, 2500, 50),
(4, 4, '3578-LU-28112012-0018', '09:14:51', 'Rumah Sakit ABC', 2, 3000, 60),
(7, 8, '123123123123123', '10:10:00', 'RSUD Bhayangkara', 1, 3432, 57),
(8, 9, '623864237', '10:10:00', 'RSUD Sintang Jaya', 4, 4643, 56),
(9, 10, 'h327842389', '01:59:00', 'RSUD Sehati Jaya', 1, 3453, 69),
(10, 11, 'asdja12132123', '19:12:00', 'RSUD Denpasar', 1, 6546, 54),
(11, 12, '53534g34353', '23:11:00', 'RSUD Samarinda Abadi', 1, 4563, 42),
(12, 13, 'ndsjfn098340932', '02:32:00', 'RSUD Lampung', 1, 3654, 53),
(13, 14, 'n239048284', '00:12:00', 'RSUD Cianjurrrrr', 2, 4534, 43),
(14, 15, 'nds873482374', '06:06:00', 'RSUD Singkawang', 7, 2445, 45),
(15, 16, 'b72943928742', '03:01:00', 'RSUD Sabang Sampai Merauke', 1, 2344, 53),
(16, 17, '23847823974', '20:08:00', 'RSUD Durian Runtuh', 1, 9999, 99);

-- --------------------------------------------------------

--
-- Table structure for table `keluarga_penduduk`
--

CREATE TABLE `keluarga_penduduk` (
  `id_keluarga` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `no_kk` bigint(16) NOT NULL,
  `hub_keluarga` int(11) NOT NULL,
  `nik_ayah` bigint(16) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `nik_ibu` bigint(16) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keluarga_penduduk`
--

INSERT INTO `keluarga_penduduk` (`id_keluarga`, `id_penduduk`, `no_kk`, `hub_keluarga`, `nik_ayah`, `nama_ayah`, `nik_ibu`, `nama_ibu`) VALUES
(3, 8, 1321231231231211, 1, 1231313212312313, 'In Dho Mie', 4545645644564564, 'Sa Ri Mie'),
(4, 9, 3423456456464553, 4, 3475345389458397, 'Asep Pranoto', 3209482384238420, 'Ng En Cok'),
(5, 10, 1782319823817231, 2, 2389472834289349, 'Budiman Cahyono', 2834234298742893, 'Siti Wahyu'),
(6, 11, 4823409234239423, 4, 8473589374534857, 'Bang Jack', 4987248723847238, 'Intan Permata'),
(7, 12, 5645635252564567, 4, 3095834583485304, 'Joko Anwar', 4564565464564564, 'Anin Damari'),
(8, 13, 8056856985968904, 4, 9823648248972348, 'Jhon Thor', 2307482374923749, 'Phe Dhas Ma Nis'),
(9, 14, 8324782934782748, 4, 8749832748374892, 'Po Thong Be Bhek Ang Sha', 7482349827489237, 'Ma Shak Di Khua Li'),
(10, 15, 9834805830498535, 4, 3495873857398759, 'Anwar Mahmudi Asepudi', 3482842394234823, 'Ho Chi Ming'),
(11, 16, 8430539458390859, 4, 3458309458935394, 'Ih Wi Bhu', 1485930450353984, 'Lusayang Luna'),
(12, 17, 2093482034242348, 4, 9327482342342947, 'Pu Shing Ke Pha La', 3498538745389475, 'Su Ka Su Ka Deh');

-- --------------------------------------------------------

--
-- Table structure for table `kesehatan_penduduk`
--

CREATE TABLE `kesehatan_penduduk` (
  `id` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `golongan_darah` varchar(10) NOT NULL,
  `riwayat_penyakit` longtext NOT NULL,
  `asuransi_kesehatan` varchar(100) DEFAULT NULL,
  `no_asuransi` bigint(20) DEFAULT NULL,
  `no_bpjs_naker` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kesehatan_penduduk`
--

INSERT INTO `kesehatan_penduduk` (`id`, `id_penduduk`, `golongan_darah`, `riwayat_penyakit`, `asuransi_kesehatan`, `no_asuransi`, `no_bpjs_naker`) VALUES
(2, 8, 'B-', 'aaaaaa', 'Prudential', 12312312313, 12312312312),
(3, 9, 'O', '-', 'Allianz', 2342344, 76886868686),
(4, 10, 'O+', 'Pneumonia', 'Vision', 203482903, 83905830948),
(5, 11, 'A+', 'Mental Disorder', 'Prudential', 38945345, 90823420394),
(6, 12, 'O', 'Gerd', 'Prudential', 345345, 43534534535),
(7, 13, 'AB-', 'Demam Berdarah', 'Allianz', 234234, NULL),
(8, 14, 'B-', 'Hidung Pesek', 'Allianz', 4324234, 32423432324),
(9, 15, 'O-', 'Kebanyakan Makan', 'Vision', 234234234, 82342342343),
(10, 16, '-', 'Kecanduan nasi goreng', 'Prudential', 234243242, 83092423842),
(11, 17, 'B', 'Minta tolong mulu', 'Vision', 23874, 28374298347);

-- --------------------------------------------------------

--
-- Table structure for table `kewarganegaraan_penduduk`
--

CREATE TABLE `kewarganegaraan_penduduk` (
  `id_kewarganegaraan` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `status_wn` varchar(5) NOT NULL,
  `no_paspor` varchar(10) DEFAULT NULL,
  `tanggal_paspor` date DEFAULT NULL,
  `no_kitas_kitap` int(11) DEFAULT NULL,
  `negara_asal` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kewarganegaraan_penduduk`
--

INSERT INTO `kewarganegaraan_penduduk` (`id_kewarganegaraan`, `id_penduduk`, `status_wn`, `no_paspor`, `tanggal_paspor`, `no_kitas_kitap`, `negara_asal`) VALUES
(1, 1, 'WNI', NULL, NULL, NULL, NULL),
(2, 2, 'WNI', NULL, NULL, NULL, NULL),
(3, 3, 'WNI', NULL, NULL, NULL, NULL),
(4, 4, 'WNI', NULL, NULL, NULL, NULL),
(7, 8, 'WNI', NULL, NULL, NULL, NULL),
(8, 9, 'WNI', NULL, NULL, NULL, NULL),
(9, 10, 'WNI', NULL, NULL, NULL, NULL),
(10, 11, 'WNI', NULL, NULL, NULL, NULL),
(11, 12, 'WNI', NULL, NULL, NULL, NULL),
(12, 13, 'WNI', NULL, NULL, NULL, NULL),
(13, 14, 'WNI', NULL, NULL, NULL, NULL),
(14, 15, 'WNI', NULL, NULL, NULL, NULL),
(15, 16, 'WNI', NULL, NULL, NULL, NULL),
(16, 17, 'WNI', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `pekerjaan`) VALUES
(1, 'Tidak/Belum Bekerja\r\n'),
(2, 'Mengurus Rumah Tangga\r\n'),
(3, 'Petani'),
(4, 'Nelayan'),
(5, 'Dokter'),
(6, 'Perawat'),
(7, 'Karyawan Swasta'),
(8, 'Wirausaha'),
(9, 'Kepolisian RI (Polri)'),
(10, 'Pelajar/Mahasiswa\r\n'),
(11, 'Peternak'),
(12, 'Sopir');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `tingkat_pendidikan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `tingkat_pendidikan`) VALUES
(1, 'Tidak/Belum Sekolah'),
(2, 'TK/Sederajat'),
(3, 'SD/Sederajat'),
(4, 'SMP/Sederajat'),
(5, 'SMA/Sederajat'),
(6, 'Diploma'),
(7, 'Strata');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `id_penduduk` int(11) NOT NULL,
  `NIK` bigint(16) DEFAULT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `gambar_biodata` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `suku_etnis` varchar(255) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `id_agama` int(11) NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `id_pekerjaan` int(11) NOT NULL,
  `tanggal_terdaftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id_penduduk`, `NIK`, `nama_lengkap`, `gambar_biodata`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `suku_etnis`, `no_telepon`, `email`, `id_wilayah`, `id_agama`, `id_pendidikan`, `id_pekerjaan`, `tanggal_terdaftar`, `updated_by`, `updated_at`) VALUES
(1, 1234567890123456, 'Asep Pranoto', 'gambar_biodata/asep-pranoto.jpg', 'Laki-Laki', 'Palangkaraya', '2003-05-06', 'Jalan Sehat Ga Sakit No. 10', 'Suku Badui', '08125605988', 'darderdor@gmail.com', 5, 6, 2, 2, '2025-04-15 02:57:10', 1, '2025-04-22 05:33:23'),
(2, 6171050312040503, 'Darren Donovan', 'gambar_biodata/darren-donovan.jpg', 'Laki-Laki', 'Pontianak', '2004-12-03', 'Jalan Kenangan Pahit No.1', 'Suku Asmat', '089699714677', 'donodondonder@gmail.com', 11, 4, 7, 1, '2025-04-15 02:46:31', 1, '2025-04-22 05:33:23'),
(3, 6181231231231234, 'Siti Nurbayo', 'gambar_biodata/siti-nurbayo.jpg', 'Perempuan', 'Semarang', '1995-04-10', 'Jalan Ditempat No. 1A', 'Suku Madura', '0812345678901', 'sititinunur@gmail.com', 2, 3, 6, 2, '2025-04-21 21:40:40', 1, '2025-04-22 05:33:23'),
(4, 6181234564561234, 'Dedeng Sari', 'gambar_biodata/dedeng-sari.jpg', 'Perempuan', 'Pamulang', '2000-04-11', 'Jalan Setapak No. 12', 'Suku Dayak', '0896999999999', 'deredengsariri@gmail.com', 3, 2, 7, 5, '2025-04-21 21:40:40', 1, '2025-04-22 05:33:23'),
(8, 1231231312313211, 'Donovan Derens', 'gambar_biodata/9aWT0Qd7j5ZCkhbO7KMnCoxJQOKiSPqMdXQiQxHL.jpg', 'Laki-Laki', 'Manado', '2001-10-10', 'Jalan Apel No. 1B', 'Suku Dayak', '083112121231', 'dondondon@gmail.com', 14, 1, 7, 9, '2025-04-28 07:29:08', 2, '2025-04-28 00:29:08'),
(9, 1231238458348539, 'Muhammad Evans', 'gambar_biodata/e6uxHbFboi3VnSaDNoSQl3LL8jOQDFzcAbyA4uKy.jpg', 'Laki-Laki', 'Sintang', '2006-05-31', 'Jalan Perintis Kemerdekaan No. 20', 'Suku Jawa', '08909090909090', 'panpanpan@gmail.com', 7, 4, 5, 11, '2025-04-27 21:44:36', NULL, '2025-04-28 04:44:36'),
(10, 7498538453847534, 'Budi Anton', 'gambar_biodata/BPLVmMpLhWvtBVaALgfmI23qTYHp5PeF7MeWhIwD.jpg', 'Laki-Laki', 'Tangerang', '1992-11-18', 'Jalan Perkasa No. 50', 'Suku Batak', '089234234234', 'antontontonbudi@gmail.com', 1, 7, 4, 8, '2025-04-28 19:45:46', NULL, '2025-04-29 02:45:46'),
(11, NULL, 'Clara Utomo', 'gambar_biodata/x2kQc8OG7MrJCVjIpinqMBjsjjXaCf6SSwFAx7fj.jpg', 'Perempuan', 'Denpasar', '2010-03-29', 'Jalan Anggur No. 15', 'Suku Badui', '081237127362', 'clartomo@gmail.com', 4, 4, 7, 5, '2025-04-28 20:07:04', NULL, '2025-04-29 03:07:04'),
(12, NULL, 'Dinda Felicia', 'gambar_biodata/kRi6IhOM9xJCH3jqALfXfy9eaSp9zczhXfCY1VRt.jpg', 'Perempuan', 'Samarinda', '2009-04-04', 'Jalan Pegangsaan Timur Gang Barat No. 2A', 'Tionghua', '0834875638746', 'dindindindinfel@gmail.com', 6, 3, 4, 6, '2025-04-28 20:42:14', NULL, '2025-04-29 03:42:14'),
(13, 6723478234792873, 'Karina Mahmud Setiawan', 'gambar_biodata/wBxvxjXG61McvVJUZqew5ql2mhzDQ7UxecGIeonq.jpg', 'Perempuan', 'Lampung', '2004-02-06', 'Jalan Balonku Ada Lima No. 7', 'Tionghua', '081287847234', 'karinamahmud@gmail.com', 8, 1, 7, 6, '2025-04-28 21:03:14', NULL, '2025-04-29 04:03:14'),
(14, 7482394238742374, 'Hi Dhung Phe Shek', 'gambar_biodata/BpRsVVXss1IlzCYwpfJddyIlDW1t81EqevgDSVvo.jpg', 'Laki-Laki', 'Cianjur', '1999-08-31', 'Jalan Pengangguran No. 1', 'Tionghua', '08743682634', 'peseknyahidung@gmail.com', 9, 4, 5, 3, '2025-04-28 21:09:52', NULL, '2025-04-29 04:09:52'),
(15, NULL, 'Mak A Khu Ma Shuk Tipi', 'gambar_biodata/YM34sMsaALRQ5drNTe6UTnFW7GPXjgLGdFrp2FeV.jpg', 'Laki-Laki', 'Singkawang', '2006-05-31', 'Jalan Mom Push Cow No. 50', 'Tionghua', '087162873468724', 'makakumasuktipi@gmail.com', 10, 6, 5, 7, '2025-04-28 21:13:50', NULL, '2025-04-29 04:13:50'),
(16, 7893457834759238, 'Mak Mu Hi Jhau', 'gambar_biodata/tlZQgy0YyOXx0vERCrYdkfpyEBbRK42641I3YaSF.jpg', 'Perempuan', 'Sabang', '2003-06-06', 'Jalan Hitam Gelap Gulita No. 8B', 'Suku Aztec', '08328764234', 'ntahlah@gmail.com', 12, 5, 3, 4, '2025-04-28 21:32:11', NULL, '2025-04-29 04:32:11'),
(17, 4893843589379587, 'Dit To Long In Dit', 'gambar_biodata/xDSWq7wIsxpRAT2gas1fXBZnhLPH4DySwWvqeYPO.jpg', 'Laki-Laki', 'Desa Durian Runtuh', '2001-11-01', 'Jalan Kesenjangan Sosial No. 1', 'Suku Ambalabu', '0887236428764', 'dittolongindit@gmail.com', 15, 6, 6, 8, '2025-04-28 21:39:23', NULL, '2025-04-29 04:39:23');

-- --------------------------------------------------------

--
-- Table structure for table `perangkat_kecamatan`
--

CREATE TABLE `perangkat_kecamatan` (
  `id_perangkat` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `link_facebook` varchar(255) DEFAULT NULL,
  `link_instagram` varchar(255) DEFAULT NULL,
  `link_tiktok` varchar(255) DEFAULT NULL,
  `id_wilayah` int(11) DEFAULT NULL,
  `gambar_perangkat` varchar(255) NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perangkat_kecamatan`
--

INSERT INTO `perangkat_kecamatan` (`id_perangkat`, `nama`, `jabatan`, `link_facebook`, `link_instagram`, `link_tiktok`, `id_wilayah`, `gambar_perangkat`, `updated_by`, `updated_at`) VALUES
(1, 'Ahmad Setiawan', 'Camat', 'https://facebook.com/ahmadsetiawan', 'https://instagram.com/ahmadsetiawan', 'https://tiktok.com/@ahmadsetiawan', NULL, 'perangkat_kecamatan/camat_ahmad.jpg', NULL, NULL),
(2, 'Budi Santoso', 'Sekretaris Kecamatan', 'https://facebook.com/budisantoso', 'https://instagram.com/budisantoso', 'https://tiktok.com/@budisantoso', NULL, 'perangkat_kecamatan/sekretaris_budi.jpg', NULL, NULL),
(3, 'Citra Dewi', 'Kasi Pemerintahan', 'https://facebook.com/citradewi', 'https://instagram.com/citrapemerintahan', 'https://tiktok.com/@citradewi', NULL, 'perangkat_kecamatan/kasi_pemerintahan.jpg', NULL, NULL),
(4, 'Dedi Prasetyo', 'Kasi Pembangunan dan Perekonomian', 'https://facebook.com/dediprasetyo', 'https://instagram.com/dediprasetyo', 'https://tiktok.com/@dediprasetyo', NULL, 'perangkat_kecamatan/kasi_pembangunan.jpg', NULL, NULL),
(5, 'Eka Sari', 'Kasi Kesejahteraan Sosial', NULL, NULL, NULL, NULL, 'perangkat_kecamatan/kasi_kesejahteraan.jpg', 1, '2025-03-21 01:26:03'),
(6, 'Farhan Hakim', 'Kasi Ketenteraman dan Ketertiban Umum', 'https://facebook.com/farhanhakim', 'https://instagram.com/farhanhakim', 'https://tiktok.com/@farhanhakim', NULL, 'perangkat_kecamatan/kasi_ketertiban.jpg', NULL, NULL),
(7, 'Gina Lestari', 'Kasi Pelayanan Umum', 'https://facebook.com/ginalestari', 'https://instagram.com/ginalestari', 'https://tiktok.com/@ginalestari', NULL, 'perangkat_kecamatan/kasi_pelayanan.jpg', NULL, NULL),
(8, 'Hendra Wijaya', 'Kepala Desa Pasir Nangka', 'https://facebook.com/hendrawijaya', 'https://instagram.com/hendrawijaya', 'https://tiktok.com/@hendrawijaya', 3, 'perangkat_kecamatan/kepala_pasirnangka.jpg', NULL, NULL),
(9, 'Indah Permata', 'Kepala Desa Margasari', 'https://facebook.com/indahpermata', 'https://instagram.com/indahpermata', 'https://tiktok.com/@indahpermata', 8, 'perangkat_kecamatan/kepala_margasari.jpg', NULL, NULL),
(11, 'Kartika Dewi', 'Kepala Desa Matagara', 'https://facebook.com/kartikadewi', 'https://instagram.com/kartikadewi', 'https://tiktok.com/@kartikadewi', 7, 'perangkat_kecamatan/kepala_matagara.jpg', NULL, NULL),
(13, 'Mulyadi Saputra', 'Kepala Desa Pasir Bolang', 'https://facebook.com/mulyadisp', 'https://instagram.com/mulyadisp', 'https://tiktok.com/@mulyadisp', 1, 'perangkat_kecamatan/kepala_pasirbolang.jpg', NULL, NULL),
(14, 'Rina Astuti', 'Kepala Desa Cisereh', 'https://facebook.com/rinaastuti', 'https://instagram.com/rinaastuti', 'https://tiktok.com/@rinaastuti', 2, 'perangkat_kecamatan/kepala_cisereh.jpg', NULL, NULL),
(15, 'Samsul Bahri', 'Kepala Desa Pematang', 'https://facebook.com/samsulbahri', 'https://instagram.com/samsulbahri', 'https://tiktok.com/@samsulbahri', 4, 'perangkat_kecamatan/kepala_pematang.jpg', NULL, NULL),
(16, 'Nurul Hidayah', 'Kepala Desa Pete', 'https://facebook.com/nurulhidayah', 'https://instagram.com/nurulhidayah', 'https://tiktok.com/@nurulhidayah', 5, 'perangkat_kecamatan/kepala_pete.jpg', NULL, NULL),
(17, 'Herman Wijaya', 'Kepala Desa Tegalsari', 'https://facebook.com/hermanwijaya', 'https://instagram.com/hermanwijaya', 'https://tiktok.com/@hermanwijaya', 6, 'perangkat_kecamatan/kepala_tegalsari.jpg', NULL, NULL),
(18, 'Sri Lestari', 'Kepala Desa Sodong', 'https://facebook.com/srilestari', 'https://instagram.com/srilestari', 'https://tiktok.com/@srilestari', 9, 'perangkat_kecamatan/kepala_sodong.jpg', NULL, NULL),
(19, 'Wahyu Prasetyo', 'Kepala Desa Tapos', 'https://facebook.com/wahyuprasetyo', 'https://instagram.com/wahyuprasetyo', 'https://tiktok.com/@wahyuprasetyo', 10, 'perangkat_kecamatan/kepala_tapos.jpg', NULL, NULL),
(20, 'Yulianto Kusuma', 'Kepala Desa Bantar Panjang', 'https://facebook.com/yuliantokusuma', 'https://instagram.com/yuliantokusuma', 'https://tiktok.com/@yuliantokusuma', 11, 'perangkat_kecamatan/kepala_bantarpanjang.jpg', NULL, NULL),
(21, 'Dewi Kartikasari', 'Kepala Kelurahan Kadu Agung', 'https://facebook.com/dewikartikasari', 'https://instagram.com/dewikartikasari', 'https://tiktok.com/@dewikartikasari', 14, 'perangkat_kecamatan/kepala_kaduagung.jpg', NULL, NULL),
(22, 'Arif Ramadhan', 'Kepala Kelurahan Tigaraksa', 'https://facebook.com/ariframadhan', 'https://instagram.com/ariframadhan', 'https://tiktok.com/@ariframadhan', 15, 'perangkat_kecamatan/kepala_tigaraksa.jpg', NULL, NULL),
(23, 'Adi Makmur Sejahtra', 'Kepala Desa Cileles', NULL, NULL, NULL, 12, 'perangkat_kecamatan/kepala_cileles.jpg', 1, '2025-03-24 06:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `pernikahan_penduduk`
--

CREATE TABLE `pernikahan_penduduk` (
  `id` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `no_akta_nikah` varchar(20) DEFAULT NULL,
  `tanggal_nikah` date DEFAULT NULL,
  `tanggal_cerai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pernikahan_penduduk`
--

INSERT INTO `pernikahan_penduduk` (`id`, `id_penduduk`, `id_status`, `no_akta_nikah`, `tanggal_nikah`, `tanggal_cerai`) VALUES
(2, 8, 1, NULL, NULL, NULL),
(3, 9, 1, NULL, NULL, NULL),
(4, 10, 1, NULL, NULL, NULL),
(5, 11, 1, NULL, NULL, NULL),
(6, 12, 1, NULL, NULL, NULL),
(7, 13, 1, NULL, NULL, NULL),
(8, 14, 1, NULL, NULL, NULL),
(9, 15, 1, NULL, NULL, NULL),
(10, 16, 1, NULL, NULL, NULL),
(11, 17, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_nikah`
--

CREATE TABLE `status_nikah` (
  `id_status` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_nikah`
--

INSERT INTO `status_nikah` (`id_status`, `status`) VALUES
(1, 'Tidak/Belum Menikah'),
(2, 'Menikah'),
(3, 'Cerai Hidup'),
(4, 'Cerai Mati');

-- --------------------------------------------------------

--
-- Table structure for table `umkm`
--

CREATE TABLE `umkm` (
  `id_umkm` int(11) NOT NULL,
  `nama_umkm` varchar(255) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `keterangan` longtext NOT NULL,
  `gambar_umkm` varchar(255) NOT NULL,
  `id_jenis_umkm` int(11) NOT NULL,
  `latitude` decimal(20,17) NOT NULL,
  `longitude` decimal(20,17) NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `id_wilayah` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `id_wilayah`) VALUES
(1, 'superadmin', 'superadmin@admin.com', NULL, '$2y$10$ZQWfYXlXjMePzcNX18KBxOMlu/Kj9Kk98wYhffpWMN9BeI2t58LhG', NULL, '2025-03-02 22:51:28', '2025-03-02 22:51:28', 'superadmin', 13),
(2, 'Admin 1', 'admin1@admin.com', NULL, '$2y$10$NAwL18jSYuiCTHFaiuR/yOXa7IQ5IXX7uDLe4X1ix76CoRW6kDZF6', NULL, '2025-03-17 22:28:08', '2025-03-17 22:28:08', 'admin', 5),
(3, 'admin2', 'admin2@admin.com', NULL, '$2y$10$Wj3tTXbuKDjLZ7gRn9D5D.elaDGfo5VecB44YXyDy9r2bHWqEMZLC', NULL, '2025-03-18 23:12:47', '2025-03-18 23:12:47', 'admin', 12);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `id_log` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `action` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id_log`, `user_id`, `email`, `action`, `time`) VALUES
(1, 1, 'superadmin@admin.com', 'login', '2025-03-20 21:55:33'),
(2, 1, 'superadmin@admin.com', 'logout', '2025-03-20 21:57:54'),
(3, 2, 'admin1@admin.com', 'login', '2025-03-20 21:58:56'),
(4, 1, 'superadmin@admin.com', 'login', '2025-03-21 00:45:29'),
(5, 1, 'superadmin@admin.com', 'login', '2025-03-21 01:17:42'),
(6, 1, 'superadmin@admin.com', 'login', '2025-03-23 20:23:29'),
(7, 1, 'superadmin@admin.com', 'logout', '2025-03-23 20:29:23'),
(8, 2, 'admin1@admin.com', 'login', '2025-03-23 20:29:32'),
(9, 2, 'admin1@admin.com', 'logout', '2025-03-23 20:32:28'),
(10, 1, 'superadmin@admin.com', 'login', '2025-03-23 20:32:56'),
(11, 1, 'superadmin@admin.com', 'logout', '2025-03-23 22:57:00'),
(12, 2, 'admin1@admin.com', 'login', '2025-03-23 22:57:09'),
(13, 2, 'admin1@admin.com', 'logout', '2025-03-23 22:59:04'),
(14, 3, 'admin2@admin.com', 'login', '2025-03-23 22:59:13'),
(15, 3, 'admin2@admin.com', 'logout', '2025-03-24 00:35:41'),
(16, 1, 'superadmin@admin.com', 'login', '2025-03-24 00:35:50'),
(17, 1, 'superadmin@admin.com', 'logout', '2025-03-24 01:03:25'),
(18, 1, 'superadmin@admin.com', 'login', '2025-03-24 20:58:09'),
(19, 2, 'admin1@admin.com', 'login', '2025-03-24 23:29:12'),
(20, 2, 'admin1@admin.com', 'logout', '2025-03-25 01:05:20'),
(21, 1, 'superadmin@admin.com', 'login', '2025-03-25 01:05:25'),
(22, 1, 'superadmin@admin.com', 'login', '2025-03-25 20:19:34'),
(23, 1, 'superadmin@admin.com', 'logout', '2025-03-25 23:09:43'),
(24, 2, 'admin1@admin.com', 'login', '2025-03-25 23:09:52'),
(25, 2, 'admin1@admin.com', 'logout', '2025-03-25 23:10:12'),
(26, 1, 'superadmin@admin.com', 'login', '2025-03-27 01:41:20'),
(27, 1, 'superadmin@admin.com', 'login', '2025-04-06 21:36:03'),
(28, 1, 'superadmin@admin.com', 'login', '2025-04-06 21:41:42'),
(29, 1, 'superadmin@admin.com', 'login', '2025-04-06 21:44:02'),
(30, 1, 'superadmin@admin.com', 'logout', '2025-04-06 21:44:08'),
(31, 1, 'superadmin@admin.com', 'login', '2025-04-06 21:44:12'),
(32, 1, 'superadmin@admin.com', 'login', '2025-04-07 06:59:33'),
(33, 1, 'superadmin@admin.com', 'logout', '2025-04-07 07:06:09'),
(34, 1, 'superadmin@admin.com', 'login', '2025-04-07 07:06:13'),
(35, 1, 'superadmin@admin.com', 'login', '2025-04-07 07:07:53'),
(36, 1, 'superadmin@admin.com', 'login', '2025-04-07 07:08:07'),
(37, 1, 'superadmin@admin.com', 'login', '2025-04-07 18:53:30'),
(38, 1, 'superadmin@admin.com', 'login', '2025-04-07 19:58:28'),
(39, 1, 'superadmin@admin.com', 'login', '2025-04-07 20:56:17'),
(40, 1, 'superadmin@admin.com', 'login', '2025-04-07 21:42:16'),
(41, 1, 'superadmin@admin.com', 'logout', '2025-04-07 22:33:27'),
(42, 2, 'admin1@admin.com', 'login', '2025-04-07 22:33:34'),
(43, 2, 'admin1@admin.com', 'logout', '2025-04-08 00:00:23'),
(44, 1, 'superadmin@admin.com', 'login', '2025-04-08 00:00:27'),
(45, 1, 'superadmin@admin.com', 'login', '2025-04-08 18:59:19'),
(46, 1, 'superadmin@admin.com', 'login', '2025-04-08 22:35:01'),
(47, 1, 'superadmin@admin.com', 'login', '2025-04-09 21:10:47'),
(48, 1, 'superadmin@admin.com', 'login', '2025-04-13 20:30:21'),
(49, 1, 'superadmin@admin.com', 'logout', '2025-04-13 20:30:42'),
(50, 2, 'admin1@admin.com', 'login', '2025-04-13 20:30:52'),
(51, 1, 'superadmin@admin.com', 'login', '2025-04-14 19:19:29'),
(52, 1, 'superadmin@admin.com', 'login', '2025-04-14 23:09:36'),
(53, 1, 'superadmin@admin.com', 'login', '2025-04-15 23:35:18'),
(54, 1, 'superadmin@admin.com', 'login', '2025-04-16 00:06:45'),
(55, 1, 'superadmin@admin.com', 'logout', '2025-04-16 00:43:28'),
(56, 1, 'superadmin@admin.com', 'login', '2025-04-16 00:56:29'),
(57, 1, 'superadmin@admin.com', 'login', '2025-04-16 18:44:09'),
(58, 1, 'superadmin@admin.com', 'logout', '2025-04-16 19:55:21'),
(59, 1, 'superadmin@admin.com', 'login', '2025-04-16 20:03:45'),
(60, 1, 'superadmin@admin.com', 'login', '2025-04-20 22:41:33'),
(61, 1, 'superadmin@admin.com', 'logout', '2025-04-20 23:17:57'),
(62, 1, 'superadmin@admin.com', 'login', '2025-04-20 23:22:40'),
(63, 1, 'superadmin@admin.com', 'logout', '2025-04-20 23:27:24'),
(64, 1, 'superadmin@admin.com', 'login', '2025-04-20 23:30:03'),
(65, 1, 'superadmin@admin.com', 'login', '2025-04-21 18:48:07'),
(66, 1, 'superadmin@admin.com', 'logout', '2025-04-21 20:03:46'),
(67, 1, 'superadmin@admin.com', 'login', '2025-04-21 20:04:52'),
(68, 1, 'superadmin@admin.com', 'login', '2025-04-21 22:19:37'),
(69, 1, 'superadmin@admin.com', 'login', '2025-04-22 20:09:46'),
(70, 1, 'superadmin@admin.com', 'login', '2025-04-22 20:10:52'),
(71, 1, 'superadmin@admin.com', 'login', '2025-04-22 21:47:43'),
(72, 1, 'superadmin@admin.com', 'login', '2025-04-23 19:14:48'),
(73, 1, 'superadmin@admin.com', 'login', '2025-04-23 21:30:09'),
(74, 1, 'superadmin@admin.com', 'login', '2025-04-24 18:54:48'),
(75, 1, 'superadmin@admin.com', 'login', '2025-04-24 23:03:26'),
(76, 1, 'superadmin@admin.com', 'logout', '2025-04-24 23:04:42'),
(77, 2, 'admin1@admin.com', 'login', '2025-04-24 23:04:50'),
(78, 2, 'admin1@admin.com', 'logout', '2025-04-24 23:05:07'),
(79, 1, 'superadmin@admin.com', 'login', '2025-04-24 23:11:22'),
(80, 1, 'superadmin@admin.com', 'logout', '2025-04-24 23:16:27'),
(81, 2, 'admin1@admin.com', 'login', '2025-04-24 23:16:37'),
(82, 2, 'admin1@admin.com', 'logout', '2025-04-24 23:16:48'),
(83, 1, 'superadmin@admin.com', 'login', '2025-04-24 23:16:58'),
(84, 1, 'superadmin@admin.com', 'login', '2025-04-25 01:45:32'),
(85, 1, 'superadmin@admin.com', 'login', '2025-04-25 02:06:19'),
(86, 1, 'superadmin@admin.com', 'login', '2025-04-25 05:11:02'),
(87, 1, 'superadmin@admin.com', 'login', '2025-04-27 19:03:14'),
(88, 1, 'superadmin@admin.com', 'logout', '2025-04-27 21:54:12'),
(89, 2, 'admin1@admin.com', 'login', '2025-04-27 21:54:29'),
(90, 2, 'admin1@admin.com', 'logout', '2025-04-27 22:36:20'),
(91, 1, 'superadmin@admin.com', 'login', '2025-04-27 23:45:31'),
(92, 1, 'superadmin@admin.com', 'logout', '2025-04-27 23:45:46'),
(93, 2, 'admin1@admin.com', 'login', '2025-04-27 23:45:51'),
(94, 2, 'admin1@admin.com', 'logout', '2025-04-27 23:46:00'),
(95, 1, 'superadmin@admin.com', 'login', '2025-04-27 23:46:06'),
(96, 1, 'superadmin@admin.com', 'logout', '2025-04-27 23:55:07'),
(97, 1, 'superadmin@admin.com', 'login', '2025-04-27 23:55:20'),
(98, 1, 'superadmin@admin.com', 'logout', '2025-04-28 00:27:53'),
(99, 2, 'admin1@admin.com', 'login', '2025-04-28 00:27:59'),
(100, 1, 'superadmin@admin.com', 'login', '2025-04-28 19:25:36'),
(101, 1, 'superadmin@admin.com', 'logout', '2025-04-28 19:49:41'),
(102, 1, 'superadmin@admin.com', 'login', '2025-04-28 19:50:21'),
(103, 1, 'superadmin@admin.com', 'logout', '2025-04-28 21:53:36'),
(104, 2, 'admin1@admin.com', 'login', '2025-04-28 21:53:41'),
(105, 2, 'admin1@admin.com', 'logout', '2025-04-28 21:54:06'),
(106, 3, 'admin2@admin.com', 'login', '2025-04-28 21:54:11'),
(107, 3, 'admin2@admin.com', 'logout', '2025-04-28 21:54:23'),
(108, 1, 'superadmin@admin.com', 'login', '2025-04-28 21:54:32'),
(109, 1, 'superadmin@admin.com', 'logout', '2025-04-28 22:21:41'),
(110, 1, 'superadmin@admin.com', 'login', '2025-04-28 22:36:25'),
(111, 1, 'superadmin@admin.com', 'logout', '2025-04-28 23:26:33'),
(112, 2, 'admin1@admin.com', 'login', '2025-04-28 23:26:38'),
(113, 2, 'admin1@admin.com', 'logout', '2025-04-28 23:34:37'),
(114, 1, 'superadmin@admin.com', 'login', '2025-04-29 19:27:13');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `nama_wilayah` varchar(255) NOT NULL,
  `jenis_wilayah` varchar(50) NOT NULL,
  `luas_wilayah` int(11) NOT NULL,
  `latitude` decimal(20,17) NOT NULL,
  `longitude` decimal(20,17) NOT NULL,
  `batas_utara` varchar(255) NOT NULL,
  `batas_timur` varchar(255) NOT NULL,
  `batas_barat` varchar(255) NOT NULL,
  `batas_selatan` varchar(255) NOT NULL,
  `gambar_wilayah` varchar(255) NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `nama_wilayah`, `jenis_wilayah`, `luas_wilayah`, `latitude`, `longitude`, `batas_utara`, `batas_timur`, `batas_barat`, `batas_selatan`, `gambar_wilayah`, `updated_by`, `updated_at`) VALUES
(1, 'Desa Pasir Bolang', 'Desa', 429, -6.22647991797654200, 106.47184220102415000, '', '', '', '', 'profilwilayah/petakecamatan.png', NULL, NULL),
(2, 'Desa Cisereh', 'Desa', 318, -6.23258393623556000, 106.45836800354205000, '', '', '', '', 'profilwilayah/petakecamatan.png', NULL, NULL),
(3, 'Desa Pasir Nangka', 'Desa', 392, -6.25222566486495700, 106.47206608878156000, '', '', '', '', 'profilwilayah/petakecamatan.png', NULL, NULL),
(4, 'Desa Pematang', 'Desa', 268, -6.25070022721644800, 106.46269611260229000, '', '', '', '', 'profilwilayah/petakecamatan.png', NULL, NULL),
(5, 'Desa Pete', 'Desa', 404, -6.25517574675986050, 106.46014819401702000, '', '', '', '', 'profilwilayah/petakecamatan.png', NULL, NULL),
(6, 'Desa Tegalsari', 'Desa', 356, -6.25950871858672100, 106.44606958089086000, '', '', '', '', 'profilwilayah/petakecamatan.png', NULL, NULL),
(7, 'Desa Mata Gara', 'Desa', 390, -6.25105207832220700, 106.48871237640144000, '', '', '', '', 'profilwilayah/petakecamatan.png', NULL, NULL),
(8, 'Desa Marga Sari', 'Desa', 350, -6.28606598874702700, 106.49771244628573000, '', '', '', '', 'profilwilayah/petakecamatan.png', NULL, NULL),
(9, 'Desa Sodong', 'Desa', 410, -6.28278867934972200, 106.46819138548888000, '', '', '', '', 'profilwilayah/petakecamatan.png', NULL, NULL),
(10, 'Desa Tapos', 'Desa', 355, -6.29491710259832500, 106.47231257584326000, '', '', '', '', 'profilwilayah/petakecamatan.png', NULL, NULL),
(11, 'Desa Bantar Panjang', 'Desa', 578, -6.29560118492594800, 106.45126923990308000, '', '', '', '', 'profilwilayah/petakecamatan.png', NULL, NULL),
(12, 'Desa Cileles', 'Desa', 434, -6.32024263025774100, 106.43198249092904000, '', '', '', '', 'profilwilayah/petakecamatan.png', NULL, NULL),
(13, 'Kecamatan Tigaraksa', 'Kecamatan', 5279, 0.00000000000000000, 0.00000000000000000, '', '', '', '', 'profilwilayah/petakecamatan.png', NULL, NULL),
(14, 'Kelurahan Kadu Agung', 'Kelurahan', 284, -6.26903958048301800, 106.49774425197550000, '', '', '', '', 'profilwilayah/petakecamatan.png', NULL, NULL),
(15, 'Kelurahan Tigaraksa', 'Kelurahan', 311, -6.26416190920571000, 106.43198249092904000, '', '', '', '', 'profilwilayah/petakecamatan.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` int(11) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `nama_tempat` varchar(255) NOT NULL,
  `keterangan` longtext NOT NULL,
  `gambar_wisata` varchar(255) DEFAULT NULL,
  `latitude` decimal(20,17) DEFAULT NULL,
  `longitude` decimal(20,17) DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `id_wilayah`, `nama_tempat`, `keterangan`, `gambar_wisata`, `latitude`, `longitude`, `updated_by`, `updated_at`) VALUES
(1, 8, 'Hutan Kota Tigaraksa', 'Hutan Kota Tigaraksa adalah ruang hijau yang terletak di pusat Pemerintahan Kabupaten Tangerang. Hutan kota ini menawarkan pemandangan alam yang asri dan menjadi tempat yang ideal untuk rekreasi dan bersantai. Pengunjung dapat menikmati berjalan-jalan di tengah pepohonan rindang, area piknik, serta berbagai fasilitas olahraga yang disediakan. Hutan Kota Tigaraksa juga berfungsi sebagai paru-paru kota, menyediakan udara segar bagi warga sekitar.', 'wisata/HutanKotaTigaraksa.jpg', -6.27653176143692450, 106.48042897326377000, NULL, NULL),
(2, 11, 'Makam Syekh Mubarok', 'Makan Syekh Mubarok telah dijadikan sebagai destinasi wisata religi oleh Pemerintah Desa Tegalsari, Kecamatan Tigaraksa. Langkah ini diambil untuk memanfaatkan potensi ziarah yang sudah berlangsung sejak lama dan meningkatkan perekonomian masyarakat setempat.', 'wisata/MakamSyekhMubarok.jpg', -6.24639994718182000, 106.44647806188415000, 1, '2025-03-25 21:25:13'),
(3, 15, 'Taman ide ', 'Taman Ide adalah sebuah kafe dengan konsep taman yang unik, terletak di Perumahan Triraksa Village 2, Kecamatan Tigaraksa, Kabupaten Tangerang. \r\nTempat ini menawarkan suasana outdoor yang asri dengan berbagai spot foto Instagramable, menjadikannya destinasi favorit bagi kaum milenial dan pecinta fotografi. \r\n', 'wisata/TamanIde.jpg', -6.26361653365111300, 106.45856173337036000, NULL, NULL),
(4, 14, 'Tigaraksa Waterboom', 'Tigaraksa Waterboom adalah destinasi wisata air yang populer di Kabupaten Tangerang. Tempat ini menawarkan berbagai wahana air yang menyenangkan untuk keluarga, termasuk kolam renang, perosotan, ember tumpah, dan kolam arus mini. Fasilitas yang tersedia di sini meliputi kamar bilas, toilet, kantin, mushola, dan area parkir yang luas. Tigaraksa Waterboom juga memiliki lifeguard yang berjaga di beberapa titik untuk memastikan keamanan pengunjung, terutama anak-anak. Tiket masuknya terjangkau, dengan harga Rp 25.000 pada hari biasa dan Rp 30.000 pada akhir pekan.', 'wisata/TigaraksaWaterboom.jpg', -6.26238036130619900, 106.49107417326361000, NULL, NULL),
(5, 14, 'Monumen Tigaraksa\r\n\r\n', 'Monumen Tigaraksa adalah tugu yang dibangun untuk mengenang jasa tiga perwira dari Kesultanan Banten. Monumen ini berbentuk tiga orang yang berdiri, terbuat dari material stainless steel dan tembaga, memberikan kesan modern namun tetap sarat dengan nilai sejarah. Monumen ini menjadi simbol perjuangan tiga ksatria yang bernama Aria Yudanegara, Aria Wangsakerta, dan Aria Santika, yang bertugas menyusun baris pertahanan dan perlawanan terhadap penjajah pada masa Kesultanan Banten\r\n\r\n', 'wisata/MonumenTigaraksa.jpg', -6.26207196130332800, 106.48139347326357000, NULL, NULL),
(6, 14, 'Alun Alun Tigaraksa \r\n', 'Alun-Alun Tigaraksa adalah area terbuka yang luas dan menjadi pusat kegiatan masyarakat sekitar. Letaknya tidak jauh dari kantor Pemda Kabupaten Tangerang. Alun-alun ini sering digunakan untuk berbagai kegiatan seperti olahraga, acara komunitas, dan rekreasi keluarga. Pengunjung dapat menikmati suasana yang nyaman dengan berbagai fasilitas seperti area bermain anak, jogging track, dan tempat duduk yang nyaman. Selain itu, alun-alun ini juga menjadi pusat kuliner dengan banyak pedagang yang menjual aneka makanan dan minuman.\r\n', 'wisata/AlunTigaraksa.jpg', -6.27435746141683200, 106.48275507326376000, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id_about`),
  ADD KEY `FK_wilayah` (`id_wilayah`),
  ADD KEY `FK_id_user_updated_by` (`updated_by`);

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `FK_id_wilayah` (`id_wilayah`),
  ADD KEY `FK_berita_id_user_updated` (`updated_by`),
  ADD KEY `FK_berita_id_user_created` (`created_by`);

--
-- Indexes for table `hubungan_keluarga`
--
ALTER TABLE `hubungan_keluarga`
  ADD PRIMARY KEY (`id_hubungan`);

--
-- Indexes for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  ADD PRIMARY KEY (`id_jenis_kegiatan`);

--
-- Indexes for table `jenis_umkm`
--
ALTER TABLE `jenis_umkm`
  ADD PRIMARY KEY (`id_jenis_umkm`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_wilayah` (`id_wilayah`),
  ADD KEY `id_jenis_kegiatan` (`id_jenis_kegiatan`),
  ADD KEY `fk_kegiatan_updated_by` (`updated_by`);

--
-- Indexes for table `kelahiran_penduduk`
--
ALTER TABLE `kelahiran_penduduk`
  ADD PRIMARY KEY (`id_kelahiran`),
  ADD KEY `FK_kelahiran_id_penduduk` (`id_penduduk`);

--
-- Indexes for table `keluarga_penduduk`
--
ALTER TABLE `keluarga_penduduk`
  ADD PRIMARY KEY (`id_keluarga`),
  ADD KEY `FK_keluarga_id_penduduk` (`id_penduduk`),
  ADD KEY `FK_hub_keluarga_penduduk` (`hub_keluarga`);

--
-- Indexes for table `kesehatan_penduduk`
--
ALTER TABLE `kesehatan_penduduk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_kesehatan_id_penduduk` (`id_penduduk`);

--
-- Indexes for table `kewarganegaraan_penduduk`
--
ALTER TABLE `kewarganegaraan_penduduk`
  ADD PRIMARY KEY (`id_kewarganegaraan`),
  ADD KEY `FK_kewarganegaraan_id_penduduk` (`id_penduduk`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id_penduduk`),
  ADD UNIQUE KEY `NIK` (`NIK`),
  ADD KEY `FK_penduduk_id_wilayah` (`id_wilayah`),
  ADD KEY `FK_penduduk_id_agama` (`id_agama`),
  ADD KEY `FK_penduduk_id_pendidikan` (`id_pendidikan`),
  ADD KEY `FK_penduduk_id_pekerjaan` (`id_pekerjaan`),
  ADD KEY `FK_penduduk_updated_by` (`updated_by`);

--
-- Indexes for table `perangkat_kecamatan`
--
ALTER TABLE `perangkat_kecamatan`
  ADD PRIMARY KEY (`id_perangkat`),
  ADD KEY `FK_wilayah_perangkat_kec` (`id_wilayah`),
  ADD KEY `FK_perangkat_updated` (`updated_by`);

--
-- Indexes for table `pernikahan_penduduk`
--
ALTER TABLE `pernikahan_penduduk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_nikah_id_penduduk` (`id_penduduk`),
  ADD KEY `FK_nikah_id_status` (`id_status`);

--
-- Indexes for table `status_nikah`
--
ALTER TABLE `status_nikah`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`id_umkm`),
  ADD KEY `FK_id_jenis_umkm` (`id_jenis_umkm`),
  ADD KEY `FK_updated_by_umkm` (`updated_by`),
  ADD KEY `FK_id_wilayah_umkm` (`id_wilayah`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `FK_User_id_log` (`user_id`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`),
  ADD KEY `FK_wilayah_updated` (`updated_by`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`),
  ADD KEY `FK_wisata_id_wilayah` (`id_wilayah`),
  ADD KEY `FK_wisata_updated` (`updated_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hubungan_keluarga`
--
ALTER TABLE `hubungan_keluarga`
  MODIFY `id_hubungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  MODIFY `id_jenis_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenis_umkm`
--
ALTER TABLE `jenis_umkm`
  MODIFY `id_jenis_umkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kelahiran_penduduk`
--
ALTER TABLE `kelahiran_penduduk`
  MODIFY `id_kelahiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `keluarga_penduduk`
--
ALTER TABLE `keluarga_penduduk`
  MODIFY `id_keluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kesehatan_penduduk`
--
ALTER TABLE `kesehatan_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kewarganegaraan_penduduk`
--
ALTER TABLE `kewarganegaraan_penduduk`
  MODIFY `id_kewarganegaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `perangkat_kecamatan`
--
ALTER TABLE `perangkat_kecamatan`
  MODIFY `id_perangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pernikahan_penduduk`
--
ALTER TABLE `pernikahan_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `status_nikah`
--
ALTER TABLE `status_nikah`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `umkm`
--
ALTER TABLE `umkm`
  MODIFY `id_umkm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_us`
--
ALTER TABLE `about_us`
  ADD CONSTRAINT `FK_id_user_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_wilayah` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id_wilayah`);

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `FK_berita_id_user_created` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_berita_id_user_updated` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_id_wilayah` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id_wilayah`);

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `fk_kegiatan_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id_wilayah`) ON DELETE CASCADE,
  ADD CONSTRAINT `kegiatan_ibfk_2` FOREIGN KEY (`id_jenis_kegiatan`) REFERENCES `jenis_kegiatan` (`id_jenis_kegiatan`) ON DELETE CASCADE;

--
-- Constraints for table `kelahiran_penduduk`
--
ALTER TABLE `kelahiran_penduduk`
  ADD CONSTRAINT `FK_kelahiran_id_penduduk` FOREIGN KEY (`id_penduduk`) REFERENCES `penduduk` (`id_penduduk`);

--
-- Constraints for table `keluarga_penduduk`
--
ALTER TABLE `keluarga_penduduk`
  ADD CONSTRAINT `FK_hub_keluarga_penduduk` FOREIGN KEY (`hub_keluarga`) REFERENCES `hubungan_keluarga` (`id_hubungan`),
  ADD CONSTRAINT `FK_keluarga_id_penduduk` FOREIGN KEY (`id_penduduk`) REFERENCES `penduduk` (`id_penduduk`);

--
-- Constraints for table `kesehatan_penduduk`
--
ALTER TABLE `kesehatan_penduduk`
  ADD CONSTRAINT `FK_kesehatan_id_penduduk` FOREIGN KEY (`id_penduduk`) REFERENCES `penduduk` (`id_penduduk`);

--
-- Constraints for table `kewarganegaraan_penduduk`
--
ALTER TABLE `kewarganegaraan_penduduk`
  ADD CONSTRAINT `FK_kewarganegaraan_id_penduduk` FOREIGN KEY (`id_penduduk`) REFERENCES `penduduk` (`id_penduduk`);

--
-- Constraints for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD CONSTRAINT `FK_penduduk_id_agama` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`),
  ADD CONSTRAINT `FK_penduduk_id_pekerjaan` FOREIGN KEY (`id_pekerjaan`) REFERENCES `pekerjaan` (`id_pekerjaan`),
  ADD CONSTRAINT `FK_penduduk_id_pendidikan` FOREIGN KEY (`id_pendidikan`) REFERENCES `pendidikan` (`id_pendidikan`),
  ADD CONSTRAINT `FK_penduduk_id_wilayah` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id_wilayah`),
  ADD CONSTRAINT `FK_penduduk_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `perangkat_kecamatan`
--
ALTER TABLE `perangkat_kecamatan`
  ADD CONSTRAINT `FK_perangkat_updated` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_wilayah_perangkat_kec` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id_wilayah`);

--
-- Constraints for table `pernikahan_penduduk`
--
ALTER TABLE `pernikahan_penduduk`
  ADD CONSTRAINT `FK_nikah_id_penduduk` FOREIGN KEY (`id_penduduk`) REFERENCES `penduduk` (`id_penduduk`),
  ADD CONSTRAINT `FK_nikah_id_status` FOREIGN KEY (`id_status`) REFERENCES `status_nikah` (`id_status`);

--
-- Constraints for table `umkm`
--
ALTER TABLE `umkm`
  ADD CONSTRAINT `FK_id_jenis_umkm` FOREIGN KEY (`id_jenis_umkm`) REFERENCES `jenis_umkm` (`id_jenis_umkm`),
  ADD CONSTRAINT `FK_id_wilayah_umkm` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id_wilayah`),
  ADD CONSTRAINT `FK_updated_by_umkm` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_log`
--
ALTER TABLE `user_log`
  ADD CONSTRAINT `FK_User_id_log` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD CONSTRAINT `FK_wilayah_updated` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `wisata`
--
ALTER TABLE `wisata`
  ADD CONSTRAINT `FK_wisata_id_wilayah` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id_wilayah`),
  ADD CONSTRAINT `FK_wisata_updated` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
