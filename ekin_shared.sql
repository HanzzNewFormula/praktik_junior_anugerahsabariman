/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ekin_shared

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-06 08:58:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `absensi`
-- ----------------------------
DROP TABLE IF EXISTS `absensi`;
CREATE TABLE `absensi` (
  `id_absensi` int(10) NOT NULL AUTO_INCREMENT,
  `nip` varchar(10) NOT NULL,
  `tanggal_absen` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `status_masuk` enum('Y','N') NOT NULL DEFAULT 'N',
  `status_keluar` enum('Y','N') NOT NULL DEFAULT 'N',
  `ket` char(2) NOT NULL DEFAULT 'NA',
  `terlambat` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_absensi`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of absensi
-- ----------------------------

-- ----------------------------
-- Table structure for `bagian`
-- ----------------------------
DROP TABLE IF EXISTS `bagian`;
CREATE TABLE `bagian` (
  `id_bag` varchar(4) NOT NULL,
  `n_bag` varchar(25) NOT NULL,
  `id_shift` varchar(30) NOT NULL,
  `id_skpd` varchar(10) NOT NULL,
  `id_ukpd` varchar(10) NOT NULL,
  PRIMARY KEY (`id_bag`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bagian
-- ----------------------------

-- ----------------------------
-- Table structure for `disiplin`
-- ----------------------------
DROP TABLE IF EXISTS `disiplin`;
CREATE TABLE `disiplin` (
  `id_disiplin` varchar(8) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `k_diri` int(8) NOT NULL,
  `k_penampilan` int(8) NOT NULL,
  `k_seragam` int(8) NOT NULL,
  `k_alat` int(8) NOT NULL,
  `k_ruangan` int(8) NOT NULL,
  `k_sarana` int(8) NOT NULL,
  `point` int(8) NOT NULL,
  PRIMARY KEY (`id_disiplin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of disiplin
-- ----------------------------

-- ----------------------------
-- Table structure for `honor_shift`
-- ----------------------------
DROP TABLE IF EXISTS `honor_shift`;
CREATE TABLE `honor_shift` (
  `id_shift` varchar(8) NOT NULL,
  `petugas` varchar(25) NOT NULL,
  `hks` int(11) NOT NULL,
  `hkm` int(11) NOT NULL,
  `hlp` int(15) NOT NULL,
  `hls` int(15) NOT NULL,
  `hlm` int(15) NOT NULL,
  `hrp` int(15) NOT NULL,
  `hrs` int(15) NOT NULL,
  `hrm` int(15) NOT NULL,
  PRIMARY KEY (`id_shift`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of honor_shift
-- ----------------------------
INSERT INTO `honor_shift` VALUES ('SHF00001', 'MEDIS', '100000', '125000', '125000', '125000', '150000', '150000', '150000', '175000');
INSERT INTO `honor_shift` VALUES ('SHF00002', 'PARAMEDIS', '10000', '15000', '15000', '20000', '25000', '30000', '40000', '50000');
INSERT INTO `honor_shift` VALUES ('SHF00003', 'NON MEDIS', '10000', '15000', '15000', '20000', '25000', '30000', '40000', '50000');

-- ----------------------------
-- Table structure for `hukuman`
-- ----------------------------
DROP TABLE IF EXISTS `hukuman`;
CREATE TABLE `hukuman` (
  `id_hukuman` varchar(8) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `aktif` date NOT NULL,
  `n_sp` varchar(15) NOT NULL,
  `nilai` varchar(8) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id_hukuman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of hukuman
-- ----------------------------

-- ----------------------------
-- Table structure for `h_jabatan`
-- ----------------------------
DROP TABLE IF EXISTS `h_jabatan`;
CREATE TABLE `h_jabatan` (
  `idh` int(11) NOT NULL AUTO_INCREMENT,
  `idkjb` varchar(4) NOT NULL,
  `jab_old` varchar(20) NOT NULL,
  `tgl_ajb` date NOT NULL,
  `jabatan_baru` varchar(20) NOT NULL,
  `tgl_kjb` date NOT NULL,
  PRIMARY KEY (`idh`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of h_jabatan
-- ----------------------------

-- ----------------------------
-- Table structure for `jabatan`
-- ----------------------------
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan` (
  `id_jab` varchar(4) NOT NULL,
  `id_skpd` varchar(10) NOT NULL,
  `id_ukpd` varchar(10) NOT NULL,
  `n_jab` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jab`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jabatan
-- ----------------------------

-- ----------------------------
-- Table structure for `kinerja`
-- ----------------------------
DROP TABLE IF EXISTS `kinerja`;
CREATE TABLE `kinerja` (
  `id_kinerja` varchar(8) NOT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `kd_skp` varchar(8) DEFAULT NULL,
  `waktu_e` varchar(8) DEFAULT NULL,
  `uraian` varchar(150) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_akhir` time DEFAULT NULL,
  `jumlah` int(8) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `point` int(8) DEFAULT NULL,
  `keterangan` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_kinerja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kinerja
-- ----------------------------

-- ----------------------------
-- Table structure for `kinerja_t`
-- ----------------------------
DROP TABLE IF EXISTS `kinerja_t`;
CREATE TABLE `kinerja_t` (
  `id_kinerja_t` varchar(8) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `wm` time NOT NULL,
  `wa` time NOT NULL,
  `jumlah` int(8) NOT NULL,
  `aktifitas` varchar(60) NOT NULL,
  `uraian` varchar(150) NOT NULL,
  `keterangan` varchar(25) NOT NULL,
  `point` int(8) NOT NULL,
  PRIMARY KEY (`id_kinerja_t`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kinerja_t
-- ----------------------------

-- ----------------------------
-- Table structure for `kompetensi`
-- ----------------------------
DROP TABLE IF EXISTS `kompetensi`;
CREATE TABLE `kompetensi` (
  `id_kompetensi` varchar(8) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `menganalisa1` int(8) NOT NULL,
  `menganalisa2` int(8) NOT NULL,
  `komunikasi1` int(8) NOT NULL,
  `komunikasi2` int(8) NOT NULL,
  `kerjasama1` int(8) NOT NULL,
  `kerjasama2` int(8) NOT NULL,
  `kecerdasan1` int(8) NOT NULL,
  `kecerdasan2` int(8) NOT NULL,
  `kecerdasan3` int(8) NOT NULL,
  `fokus1` int(8) NOT NULL,
  `fokus2` int(8) NOT NULL,
  `fokus3` int(8) NOT NULL,
  `tanggung1` int(8) NOT NULL,
  `tanggung2` int(8) NOT NULL,
  `tanggung3` int(8) NOT NULL,
  `tanggung4` int(8) NOT NULL,
  `orientasi_k1` int(8) NOT NULL,
  `orientasi_k2` int(8) NOT NULL,
  `inisiatif1` int(8) NOT NULL,
  `inisiatif2` int(8) NOT NULL,
  `disiplin1` int(8) NOT NULL,
  `disiplin2` int(8) NOT NULL,
  `disiplin3` int(8) NOT NULL,
  `orientasi_p1` int(8) NOT NULL,
  `orientasi_p2` int(8) NOT NULL,
  `orientasi_p3` int(8) NOT NULL,
  `point` varchar(8) NOT NULL,
  PRIMARY KEY (`id_kompetensi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kompetensi
-- ----------------------------

-- ----------------------------
-- Table structure for `kreatifitas`
-- ----------------------------
DROP TABLE IF EXISTS `kreatifitas`;
CREATE TABLE `kreatifitas` (
  `id_kreatifitas` varchar(8) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `wm_k` time NOT NULL,
  `wa_k` time NOT NULL,
  `jumlah` int(8) NOT NULL,
  `kreatifitas` varchar(60) NOT NULL,
  `uraian` varchar(150) NOT NULL,
  `keterangan` varchar(25) NOT NULL,
  `point` int(8) NOT NULL,
  PRIMARY KEY (`id_kreatifitas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kreatifitas
-- ----------------------------

-- ----------------------------
-- Table structure for `k_jabatan`
-- ----------------------------
DROP TABLE IF EXISTS `k_jabatan`;
CREATE TABLE `k_jabatan` (
  `idkjb` varchar(4) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `masa_kerja` int(10) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`idkjb`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of k_jabatan
-- ----------------------------

-- ----------------------------
-- Table structure for `pajak`
-- ----------------------------
DROP TABLE IF EXISTS `pajak`;
CREATE TABLE `pajak` (
  `id_pajak` varchar(8) NOT NULL,
  `id_ukpd` varchar(8) NOT NULL,
  `n_pajak` varchar(5) NOT NULL,
  `ptkp` int(15) NOT NULL,
  PRIMARY KEY (`id_pajak`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pajak
-- ----------------------------
INSERT INTO `pajak` VALUES ('P0000001', '1.02.065', 'TK/0', '54000000');
INSERT INTO `pajak` VALUES ('P0000002', '1.02.065', 'K/0', '58500000');
INSERT INTO `pajak` VALUES ('P0000003', '1.02.065', 'K/1', '63000000');
INSERT INTO `pajak` VALUES ('P0000004', '1.02.065', 'K/2', '67500000');
INSERT INTO `pajak` VALUES ('P0000005', '1.02.065', 'K/3', '72000000');
INSERT INTO `pajak` VALUES ('P0000006', '1.02.065', 'TK/1', '58500000');
INSERT INTO `pajak` VALUES ('P0000007', '1.02.065', 'TK/2', '63000000');
INSERT INTO `pajak` VALUES ('P0000008', '1.02.065', 'TK/3', '67500000');

-- ----------------------------
-- Table structure for `pegawai`
-- ----------------------------
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `nip` varchar(30) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `tmpt_lahir` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `npwp` varchar(25) NOT NULL,
  `norek` varchar(25) NOT NULL,
  `id_status` varchar(15) NOT NULL,
  `status` varchar(8) NOT NULL,
  `id_pendidikan` varchar(8) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_rumpun` varchar(8) NOT NULL,
  `id_pajak` varchar(8) NOT NULL,
  `id_bag` varchar(4) NOT NULL,
  `id_jab` varchar(4) NOT NULL,
  `id_skpd` varchar(10) NOT NULL,
  `id_ukpd` varchar(10) NOT NULL,
  `id_hukuman` varchar(8) NOT NULL,
  `bpjsks` varchar(8) NOT NULL,
  `bpjsjkk` varchar(8) NOT NULL,
  `bpjsijht` varchar(8) NOT NULL,
  `bpjsjp` varchar(8) NOT NULL,
  `kasatpel` varchar(30) NOT NULL,
  `kasie` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pegawai
-- ----------------------------

-- ----------------------------
-- Table structure for `pelatihan`
-- ----------------------------
DROP TABLE IF EXISTS `pelatihan`;
CREATE TABLE `pelatihan` (
  `id_pelatihan` int(4) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) NOT NULL,
  `tgl_pelatihan` date NOT NULL,
  `topik_pelatihan` varchar(100) NOT NULL,
  `penyelenggara` text NOT NULL,
  `hasil_pelatihan` int(10) NOT NULL,
  PRIMARY KEY (`id_pelatihan`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pelatihan
-- ----------------------------

-- ----------------------------
-- Table structure for `pencapaian`
-- ----------------------------
DROP TABLE IF EXISTS `pencapaian`;
CREATE TABLE `pencapaian` (
  `id_pencapaian` varchar(8) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `id_bag` varchar(8) NOT NULL,
  `id_jab` varchar(8) NOT NULL,
  `id_status` varchar(8) NOT NULL,
  `id_skpd` varchar(10) NOT NULL,
  `id_ukpd` varchar(10) NOT NULL,
  `id_penyerapan` varchar(20) NOT NULL,
  `id_shift` varchar(8) NOT NULL,
  `id_pajak` varchar(8) NOT NULL,
  `id_hukuman` varchar(8) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `tanggal` date NOT NULL,
  `penilai` varchar(30) NOT NULL,
  `nskp` int(5) NOT NULL,
  `nprilaku` int(5) NOT NULL,
  `masa_kerja` varchar(25) NOT NULL,
  `rumpun` varchar(45) NOT NULL,
  `bruto` int(25) NOT NULL,
  `tunjangan` int(25) NOT NULL,
  `gapok` int(12) NOT NULL,
  PRIMARY KEY (`id_pencapaian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pencapaian
-- ----------------------------

-- ----------------------------
-- Table structure for `pendidikan`
-- ----------------------------
DROP TABLE IF EXISTS `pendidikan`;
CREATE TABLE `pendidikan` (
  `idp` int(4) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) NOT NULL,
  `t_pdk` varchar(20) NOT NULL,
  `d_pdk` text NOT NULL,
  PRIMARY KEY (`idp`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pendidikan
-- ----------------------------

-- ----------------------------
-- Table structure for `pendidikan_t`
-- ----------------------------
DROP TABLE IF EXISTS `pendidikan_t`;
CREATE TABLE `pendidikan_t` (
  `id_pendidikan` varchar(8) NOT NULL,
  `id_skpd` varchar(10) NOT NULL,
  `id_ukpd` varchar(10) NOT NULL,
  `n_pendidikan` varchar(45) NOT NULL,
  PRIMARY KEY (`id_pendidikan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pendidikan_t
-- ----------------------------

-- ----------------------------
-- Table structure for `pengalaman_kerja`
-- ----------------------------
DROP TABLE IF EXISTS `pengalaman_kerja`;
CREATE TABLE `pengalaman_kerja` (
  `id_peker` int(4) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) NOT NULL,
  `nm_pekerjaan` varchar(50) NOT NULL,
  `d_pekerjaan` text NOT NULL,
  PRIMARY KEY (`id_peker`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pengalaman_kerja
-- ----------------------------

-- ----------------------------
-- Table structure for `pengukuran`
-- ----------------------------
DROP TABLE IF EXISTS `pengukuran`;
CREATE TABLE `pengukuran` (
  `id_pengukuran` varchar(8) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `nilai_utama` int(8) NOT NULL,
  `nilai_tambahan` int(8) NOT NULL,
  `nilai_kreatifitas` int(8) NOT NULL,
  `jumlah` int(8) NOT NULL,
  `hari` int(8) NOT NULL,
  `max_waktu` int(8) NOT NULL,
  `point` varchar(8) NOT NULL,
  PRIMARY KEY (`id_pengukuran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pengukuran
-- ----------------------------

-- ----------------------------
-- Table structure for `penyerapan`
-- ----------------------------
DROP TABLE IF EXISTS `penyerapan`;
CREATE TABLE `penyerapan` (
  `id_penyerapan` varchar(8) NOT NULL,
  `id_skpd` varchar(10) NOT NULL,
  `id_ukpd` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nilai` int(8) NOT NULL,
  PRIMARY KEY (`id_penyerapan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of penyerapan
-- ----------------------------

-- ----------------------------
-- Table structure for `rumpun`
-- ----------------------------
DROP TABLE IF EXISTS `rumpun`;
CREATE TABLE `rumpun` (
  `id_rumpun` varchar(8) NOT NULL,
  `n_rumpun` varchar(35) NOT NULL,
  `nilai` varchar(8) NOT NULL,
  `id_skpd` varchar(10) NOT NULL,
  `id_ukpd` varchar(10) NOT NULL,
  PRIMARY KEY (`id_rumpun`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rumpun
-- ----------------------------

-- ----------------------------
-- Table structure for `sanksi`
-- ----------------------------
DROP TABLE IF EXISTS `sanksi`;
CREATE TABLE `sanksi` (
  `id_sanksi` varchar(8) NOT NULL,
  `n_sanksi` varchar(30) NOT NULL,
  `nilai` varchar(8) NOT NULL,
  `id_ukpd` varchar(8) NOT NULL,
  PRIMARY KEY (`id_sanksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of sanksi
-- ----------------------------

-- ----------------------------
-- Table structure for `setting`
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id_setting` varchar(4) NOT NULL,
  `pj` int(1) NOT NULL,
  `management` int(1) NOT NULL,
  `kinerja` int(1) NOT NULL,
  `validasi` int(1) NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES ('ST01', '1', '1', '1', '1');

-- ----------------------------
-- Table structure for `set_user`
-- ----------------------------
DROP TABLE IF EXISTS `set_user`;
CREATE TABLE `set_user` (
  `id` int(50) NOT NULL,
  `ket` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of set_user
-- ----------------------------
INSERT INTO `set_user` VALUES ('2', 'Administrator');
INSERT INTO `set_user` VALUES ('3', 'PJ');
INSERT INTO `set_user` VALUES ('4', 'Kepegawaian');
INSERT INTO `set_user` VALUES ('5', 'Diklat');
INSERT INTO `set_user` VALUES ('6', 'Keuangan');
INSERT INTO `set_user` VALUES ('7', 'user');
INSERT INTO `set_user` VALUES ('8', 'Kasatpel');
INSERT INTO `set_user` VALUES ('9', 'Kasie');
INSERT INTO `set_user` VALUES ('10', 'Direktur');

-- ----------------------------
-- Table structure for `skp`
-- ----------------------------
DROP TABLE IF EXISTS `skp`;
CREATE TABLE `skp` (
  `kd_skp` varchar(8) NOT NULL,
  `skp` varchar(160) NOT NULL,
  `waktu` varchar(5) NOT NULL,
  PRIMARY KEY (`kd_skp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of skp
-- ----------------------------
INSERT INTO `skp` VALUES ('SKP00001', 'Analisis pasar Barang/Jasa', '270');
INSERT INTO `skp` VALUES ('SKP00002', 'Berkoordinasi dan menyelesaikan TL LHP BPK', '360');
INSERT INTO `skp` VALUES ('SKP00003', 'Berperan aktif sebagai anggota organisasi profesi, setiap tahun pada organisasi Daerah Provinsi/Kabupaten/Kota/Kementrian/LPNK', '360');
INSERT INTO `skp` VALUES ('SKP00004', 'Berperan aktif sebagai anggota organisasi profesi, setiap tahun pada organisasi Internasional', '360');
INSERT INTO `skp` VALUES ('SKP00005', 'Berperan aktif sebagai anggota organisasi profesi, setiap tahun pada organisasi Nasional', '360');
INSERT INTO `skp` VALUES ('SKP00006', 'Berperan serta dalam ekspose Pengadaan Barang/Jasa', '240');
INSERT INTO `skp` VALUES ('SKP00007', 'Evaluasi Dokumen Kualifikasi Pengadaan Barang', '120');
INSERT INTO `skp` VALUES ('SKP00008', 'Evaluasi Dokumen Kualifikasi Pengadaan Barang (lelang ulang)', '120');
INSERT INTO `skp` VALUES ('SKP00009', 'Evaluasi Dokumen Kualifikasi Pengadaan Jasa Konsultasi', '240');
INSERT INTO `skp` VALUES ('SKP00010', 'Evaluasi Dokumen Kualifikasi Pengadaan Jasa Konsultasi (lelang ulang)', '240');
INSERT INTO `skp` VALUES ('SKP00011', 'Evaluasi Dokumen Kualifikasi Pengadaan Jasa Lainnya', '120');
INSERT INTO `skp` VALUES ('SKP00012', 'Evaluasi Dokumen Kualifikasi Pengadaan Jasa Lainnya (lelang ulang)', '120');
INSERT INTO `skp` VALUES ('SKP00013', 'Evaluasi Dokumen Kualifikasi Pengadaan Jasa Konstruksi', '240');
INSERT INTO `skp` VALUES ('SKP00014', 'Evaluasi Dokumen Kualifikasi Pengadaan Jasa Konstruksi (lelang ulang)', '240');
INSERT INTO `skp` VALUES ('SKP00015', 'Evaluasi Dokumen Penawaran Pengadaan Barang', '120');
INSERT INTO `skp` VALUES ('SKP00016', 'Evaluasi Dokumen Penawaran Pengadaan Barang (lelang ulang)', '120');
INSERT INTO `skp` VALUES ('SKP00017', 'Evaluasi Dokumen Penawaran Pengadaan Jasa Konsultasi', '240');
INSERT INTO `skp` VALUES ('SKP00018', 'Evaluasi Dokumen Penawaran Pengadaan Jasa Konsultasi (lelang ulang)', '240');
INSERT INTO `skp` VALUES ('SKP00019', 'Evaluasi Dokumen Penawaran Pengadaan Jasa Lainnya', '120');
INSERT INTO `skp` VALUES ('SKP00020', 'Evaluasi Dokumen Penawaran Pengadaan Jasa Lainnya (lelang ulang)', '120');
INSERT INTO `skp` VALUES ('SKP00021', 'Evaluasi Dokumen Penawaran Pengadaan Jasa Konstruksi', '240');
INSERT INTO `skp` VALUES ('SKP00022', 'Evaluasi Dokumen Penawaran Pengadaan Jasa Konstruksi (lelang ulang)', '240');
INSERT INTO `skp` VALUES ('SKP00023', 'Evaluasi kinerja Pengadaan Barang/Jasa untuk Tahap Manajemen Informasi Aset', '180');
INSERT INTO `skp` VALUES ('SKP00024', 'Evaluasi kinerja Pengadaan Barang/Jasa untuk Tahap Perencanaan', '360');
INSERT INTO `skp` VALUES ('SKP00025', 'Evaluasi kinerja Pengadaan Barang/Jasa untuk Tahap Manajemen Kontrak', '360');
INSERT INTO `skp` VALUES ('SKP00026', 'Evaluasi kinerja Pengadaan Barang/Jasa untuk Tahap Pemilihan Penyedia', '360');
INSERT INTO `skp` VALUES ('SKP00027', 'Input keterangan absensi pegawai melalui media elektronik', '60');
INSERT INTO `skp` VALUES ('SKP00028', 'Input Rencana Kerja dan Anggaran Per Kegiatan melalui sistem e-planning', '300');
INSERT INTO `skp` VALUES ('SKP00029', 'Inventarisasi Kebutuhan Aset dalam rangka Pengadaan Barang/Jasa', '120');
INSERT INTO `skp` VALUES ('SKP00030', 'Inventarisasi permasalahan terkait penyusunan Naskah Akademis', '180');
INSERT INTO `skp` VALUES ('SKP00031', 'Inventarisasi permasalahan terkait penyusunan Ranperda', '180');
INSERT INTO `skp` VALUES ('SKP00032', 'Inventarisasi permasalahan terkait penyusunan Ranpergub', '180');
INSERT INTO `skp` VALUES ('SKP00033', 'Klarifikasi dan negoisasi penawaran Penyedia Barang/Jasa', '60');
INSERT INTO `skp` VALUES ('SKP00034', 'Komunikasi dan Koordinasi Pengadaan Barang/Jasa tahap Perencanaan', '360');
INSERT INTO `skp` VALUES ('SKP00035', 'Komunikasi dan Koordinasi Pengadaan Barang/Jasa tahap Manajemen Informasi Aset', '180');
INSERT INTO `skp` VALUES ('SKP00036', 'Komunikasi dan Koordinasi Pengadaan Barang/Jasa tahap Manajemen Kontrak', '180');
INSERT INTO `skp` VALUES ('SKP00037', 'Komunikasi dan Koordinasi Pengadaan Barang/Jasa tahap Pemilihan Penyedia', '360');
INSERT INTO `skp` VALUES ('SKP00038', 'Konsolidasi Naskah Perbal Dinas', '15');
INSERT INTO `skp` VALUES ('SKP00039', 'Koordinasi Teknis Penatausahaan Keuangan', '360');
INSERT INTO `skp` VALUES ('SKP00040', 'Melaksanakan tugas sebagai pembaca doa (1X acara/event)', '15');
INSERT INTO `skp` VALUES ('SKP00041', 'Melaksanakan analisa dan tindak lanjut rekomendasi LKPJ', '300');
INSERT INTO `skp` VALUES ('SKP00042', 'Melaksanakan audit internal (Per SOP)', '120');
INSERT INTO `skp` VALUES ('SKP00043', 'Melaksanakan bimbingan teknis', '120');
INSERT INTO `skp` VALUES ('SKP00044', 'Melaksanakan bimbingan teknis Penatausahaan Brang Milik Daerah', '120');
INSERT INTO `skp` VALUES ('SKP00045', 'Melaksanakan dokumen pelaksanaan anggaran PPKP', '15');
INSERT INTO `skp` VALUES ('SKP00046', 'Melaksanakan DPA SKPD/UKPD', '180');
INSERT INTO `skp` VALUES ('SKP00047', 'Melaksanakan evaluasi hasil kegiatan', '120');
INSERT INTO `skp` VALUES ('SKP00048', 'Melaksanakan fungsi rujukan', '30');
INSERT INTO `skp` VALUES ('SKP00049', 'Melaksanakan imunisasi, vaksinasi, feed additive, multimineral dan multivitamin', '240');
INSERT INTO `skp` VALUES ('SKP00050', 'Melaksanakan input rencana aksi dan capaian target kebijakan nasional pada website kantor staf kepresidenan (KSP)', '180');
INSERT INTO `skp` VALUES ('SKP00051', 'Melaksanakan kegiatan apel', '30');
INSERT INTO `skp` VALUES ('SKP00052', 'Melaksanakan kegiatan evaluasi', '240');
INSERT INTO `skp` VALUES ('SKP00053', 'Melaksanakan kegiatan monitoring', '150');
INSERT INTO `skp` VALUES ('SKP00054', 'Melaksanakan kegiatan penyuluhan kesehatan terhadap pegawai', '45');
INSERT INTO `skp` VALUES ('SKP00055', 'Melaksanakan konfirmasi dengan BPK', '360');
INSERT INTO `skp` VALUES ('SKP00056', 'Melaksanakan konsultasi individu', '60');
INSERT INTO `skp` VALUES ('SKP00057', 'Melaksanakan lomba-lomba (O2SN, FLS2N, OSN) Tingkat Kecamatan, Kota, Provinsi, Nasional', '120');
INSERT INTO `skp` VALUES ('SKP00058', 'Melaksanakan menanam (per lokasi)', '60');
INSERT INTO `skp` VALUES ('SKP00059', 'Melaksanakan/mengikuti expose hasil pemeriksaan', '120');
INSERT INTO `skp` VALUES ('SKP00060', 'Melaksanakan monitoring kegiatan', '120');
INSERT INTO `skp` VALUES ('SKP00061', 'Melaksanakan monitoring, pembinaan, pengendalian, pengembangan dan pelaporan kinerja dan disiplin pegawai', '120');
INSERT INTO `skp` VALUES ('SKP00062', 'Melaksanakan monitoring, supervisi dan evaluasi teknis pelaksanaan kegiatan', '60');
INSERT INTO `skp` VALUES ('SKP00063', 'Melaksanakan operasional pertunjukkan', '60');
INSERT INTO `skp` VALUES ('SKP00064', 'Melaksanakan panen tanaman (per lokasi)', '60');
INSERT INTO `skp` VALUES ('SKP00065', 'Melaksanakan pelatihan per kegiatan', '45');
INSERT INTO `skp` VALUES ('SKP00066', 'Melaksanakan pelayanan klinis umum, spesialis, giji kerja dan produktivitas kerja', '60');
INSERT INTO `skp` VALUES ('SKP00067', 'Melaksanakan pemberantasan sarang nyamuk', '120');
INSERT INTO `skp` VALUES ('SKP00068', 'Melaksanakan pembibitan tanaman (per lokasi)', '240');
INSERT INTO `skp` VALUES ('SKP00069', 'Melaksanakan Pembinaan, Sosialisasi dan kegiatan pencegahan lainnya', '120');
INSERT INTO `skp` VALUES ('SKP00070', 'Melaksanakan pemeliharaan peralatan teknis dan peralatan kantor', '60');
INSERT INTO `skp` VALUES ('SKP00071', 'Melaksanakan pemeliharaan tanaman (per lokasi)', '60');
INSERT INTO `skp` VALUES ('SKP00072', 'Melaksanakan pemeriksaan ante mortem dan post mortem (per titik)', '180');
INSERT INTO `skp` VALUES ('SKP00073', 'Melaksanakan pemeriksaan kasus (Berita acara pemeriksaan atas kasus tertentu)', '150');
INSERT INTO `skp` VALUES ('SKP00074', 'Melaksanakan pemeriksaan laboratorium (per objek)', '60');
INSERT INTO `skp` VALUES ('SKP00075', 'Melaksanakan pemeriksaan penunjang layanan kesehatan', '15');
INSERT INTO `skp` VALUES ('SKP00076', 'Melaksanakan pemeriksaan penunjang layanan kesehatan olahraga dan kebugaran medical check up pegawai', '90');
INSERT INTO `skp` VALUES ('SKP00077', 'Melaksanakan pemeriksaan umum medical check up (MCU) kesehatan pegawai', '120');
INSERT INTO `skp` VALUES ('SKP00078', 'Melaksanakan pemusnahan dokumen/barang (per dokumen/barang)', '60');
INSERT INTO `skp` VALUES ('SKP00079', 'Melaksanakan penagihan pada penyewa (per 100 unit)', '120');
INSERT INTO `skp` VALUES ('SKP00080', 'Melaksanakan penanganan keadaan darurat', '480');
INSERT INTO `skp` VALUES ('SKP00081', 'Melaksanakan penanganan keadaan darurat', '60');
INSERT INTO `skp` VALUES ('SKP00082', 'Melaksanakan Pendampingan Implementasi Kurikulum', '60');
INSERT INTO `skp` VALUES ('SKP00083', 'Melaksanakan Pendampingan persiapan akreditasi sekolah', '120');
INSERT INTO `skp` VALUES ('SKP00084', 'Melaksanakan Pendampingan teknis pelaksanaan kegiatan', '120');
INSERT INTO `skp` VALUES ('SKP00085', 'Melaksanakan Penertiban (per titik/per objek)', '180');
INSERT INTO `skp` VALUES ('SKP00086', 'Melaksanakan pengamanan tertutup (per kegiatan)', '240');
INSERT INTO `skp` VALUES ('SKP00087', 'Melaksanakan pengawasan absensi peserta pelatihan', '120');
INSERT INTO `skp` VALUES ('SKP00088', 'Melaksanakan pengawasan pemeliharaan jalan dan lingkungan', '180');
INSERT INTO `skp` VALUES ('SKP00089', 'Melaksanakan pengawasan ujian peserta pelatihan', '60');
INSERT INTO `skp` VALUES ('SKP00090', 'Melaksanakan pengolahan dokumen rekam medis', '30');
INSERT INTO `skp` VALUES ('SKP00091', 'Melaksanakan pengukuran tanah <1000m2 (per lokasi)', '30');
INSERT INTO `skp` VALUES ('SKP00092', 'Melaksanakan pengukuran tanah >1000m2 (per lokasi)', '90');
INSERT INTO `skp` VALUES ('SKP00093', 'Melaksanakan Penilaian Kinerja Guru', '360');
INSERT INTO `skp` VALUES ('SKP00094', 'Melaksanakan Penilaian Kinerja Kepala Sekolah/Pengawas Sekolah', '240');
INSERT INTO `skp` VALUES ('SKP00095', 'Melaksanakan peninjauan lapangan', '180');
INSERT INTO `skp` VALUES ('SKP00096', 'Melaksanakan penjurian (per hari per kegiatan)', '180');
INSERT INTO `skp` VALUES ('SKP00097', 'Melaksanakan penyidikan (per hari per kasus)', '120');
INSERT INTO `skp` VALUES ('SKP00098', 'Melaksanakan Penyusunan Evaluasi Penyelenggaraan Daerah', '180');
INSERT INTO `skp` VALUES ('SKP00099', 'Melaksanakan penyusunan rencana kebutuhan penyediaan, pemeliharaan, dan perawatan peralatan teknis kedokteran, laboratorium dan penunjang layanan kesehatan', '45');
INSERT INTO `skp` VALUES ('SKP00100', 'Melaksanakan perbaikan objek kerja setelah koreksi pimpinan', '30');
INSERT INTO `skp` VALUES ('SKP00101', 'Melaksanakan Pra-Rakorbid/Rakorbid/Rakorwil Perencanaan', '180');
INSERT INTO `skp` VALUES ('SKP00102', 'Melaksanakan rekonsiliasi data penyusun formasi kebutuhan formasi', '45');
INSERT INTO `skp` VALUES ('SKP00103', 'Melaksanakan rekonsiliasi dengan BPK', '360');
INSERT INTO `skp` VALUES ('SKP00104', 'Melaksanakan reviu', '360');
INSERT INTO `skp` VALUES ('SKP00105', 'Melaksanakan RKA dan DPA', '360');
INSERT INTO `skp` VALUES ('SKP00106', 'Melaksanakan sanitasi kandang', '120');
INSERT INTO `skp` VALUES ('SKP00107', 'Melaksanakan sidang kelompok Munresbang tingkat Provinsi', '180');
INSERT INTO `skp` VALUES ('SKP00108', 'Melaksanakan sosialisasi aplikasi (per lokasi)', '60');
INSERT INTO `skp` VALUES ('SKP00109', 'Melaksanakan supervisi akademik', '30');
INSERT INTO `skp` VALUES ('SKP00110', 'Melaksanakan supervisi managerial', '100');
INSERT INTO `skp` VALUES ('SKP00111', 'Melaksanakan supervisi rencana kerja SKPD/UKPD', '180');
INSERT INTO `skp` VALUES ('SKP00112', 'Melaksanakan survey lingkungan', '360');
INSERT INTO `skp` VALUES ('SKP00113', 'Melaksanakan survey (per lokasi)', '120');
INSERT INTO `skp` VALUES ('SKP00114', 'Melaksanakan tera ulang terhadap alat ukur (per alat ukur)', '30');
INSERT INTO `skp` VALUES ('SKP00115', 'Melaksanakan tindakan pengendalian penyakit hewan (per hewan)', '180');
INSERT INTO `skp` VALUES ('SKP00116', 'Melaksanakan tindakan pengobatan (per objek)', '60');
INSERT INTO `skp` VALUES ('SKP00117', 'Melaksanakan tindakan pengobatan sedang', '30');
INSERT INTO `skp` VALUES ('SKP00118', 'Melaksanakan tindakan perawatan', '120');
INSERT INTO `skp` VALUES ('SKP00119', 'Melaksanakan tugas kedinasan lain yang diperintahkan pimpinan baik tertulis maupun lisan', '90');
INSERT INTO `skp` VALUES ('SKP00120', 'Melaksanakan tugas koordinasi atas perintah pimpinan', '20');
INSERT INTO `skp` VALUES ('SKP00121', 'Melaksanakan tugas piket', '120');
INSERT INTO `skp` VALUES ('SKP00122', 'Melaksanakan tugas piket', '360');
INSERT INTO `skp` VALUES ('SKP00123', 'Melaksanakan tugas sebagai fasilitator (1X acara)', '180');
INSERT INTO `skp` VALUES ('SKP00124', 'Melaksanakan tugas visitasi dan verifikasi akreditasi sekolah', '300');
INSERT INTO `skp` VALUES ('SKP00125', 'Melaksanakan uji laboratorium', '120');
INSERT INTO `skp` VALUES ('SKP00126', 'Melaksanakan penanganan keadaan darurat', '450');
INSERT INTO `skp` VALUES ('SKP00127', 'Melakukan analisa atas saran dan masukan Rencana Strategis per Inspektorat Pembantu Provinsi', '90');
INSERT INTO `skp` VALUES ('SKP00128', 'Melakukan audit', '120');
INSERT INTO `skp` VALUES ('SKP00129', 'Melakukan evaluasi hasil pelaksanaan kegiatan', '360');
INSERT INTO `skp` VALUES ('SKP00130', 'Melaksanakan evaluasi kinerja PTT/PPPK', '10');
INSERT INTO `skp` VALUES ('SKP00131', 'Melakukan evaluasi Sistem Akuntabilitas Kinerja Instansi Pemerintah per 1 SKPD', '240');
INSERT INTO `skp` VALUES ('SKP00132', 'Melakukan identifikasi aset', '120');
INSERT INTO `skp` VALUES ('SKP00133', 'Melakukan inventarisasi data formasi jabatan', '60');
INSERT INTO `skp` VALUES ('SKP00134', 'Melakukan inventarisasi data nama jabatan/analisa jabatan/analisa beban kerja/evaluasi jabatan', '60');
INSERT INTO `skp` VALUES ('SKP00135', 'Melakukan kegiatan administrasi (menerima surat, fax, telepon dan mengirim surat dan fax)', '15');
INSERT INTO `skp` VALUES ('SKP00136', 'Melakukan kegiatan pelayanan (menerima, memverifikasi, dan mencatan berkas/surat/dokumen dan atau memberi penjelasan)', '15');
INSERT INTO `skp` VALUES ('SKP00137', 'Melakukan kegiatan surat menyurat', '15');
INSERT INTO `skp` VALUES ('SKP00138', 'Melakukan klarifikasi objek kerja', '120');
INSERT INTO `skp` VALUES ('SKP00139', 'Melakukan konfirmasi gaji dan tunjangan lainnya sebagai data bahan belanja pegawai SKPD', '60');
INSERT INTO `skp` VALUES ('SKP00140', 'Melakukan koordinasi dengan pihak ketiga dalam rangka pemeliharaan/perawatan sarana/prasarana', '15');
INSERT INTO `skp` VALUES ('SKP00141', 'Melakukan koordinasi dengan Pusat/Provinsi', '120');
INSERT INTO `skp` VALUES ('SKP00142', 'Melakukan koordinasi dengan SKPD', '30');
INSERT INTO `skp` VALUES ('SKP00143', 'Melakukan koordinasi internal dengan unit/bidang/sub bagian', '30');
INSERT INTO `skp` VALUES ('SKP00144', 'Melakukan koordinasi melalui media elektronik', '15');
INSERT INTO `skp` VALUES ('SKP00145', 'Melakukan kunjungan kerja', '240');
INSERT INTO `skp` VALUES ('SKP00146', 'Melakukan monitoring atas perkembangan perbal Peraturan Perundang-undangan', '10');
INSERT INTO `skp` VALUES ('SKP00147', 'Melakukan monitoring kegiatan kebersihan', '60');
INSERT INTO `skp` VALUES ('SKP00148', 'Melakukan monitoring kerja bakti', '60');
INSERT INTO `skp` VALUES ('SKP00149', 'Melakukan monitoring terhadap penginputan jurnal SPJ', '30');
INSERT INTO `skp` VALUES ('SKP00150', 'Melakukan negosiasi unjuk rasa (per kejadian)', '60');
INSERT INTO `skp` VALUES ('SKP00151', 'Melakukan pelayanan keluarga berencana', '25');
INSERT INTO `skp` VALUES ('SKP00152', 'Melakukan pelayanan kesehatan ibu hamil', '45');
INSERT INTO `skp` VALUES ('SKP00153', 'Melakukan pelayanan kesehatan sesuai standard pelayanan minimal lab. Klinik', '15');
INSERT INTO `skp` VALUES ('SKP00154', 'Melakukan pelayanan kesehatan wanita', '30');
INSERT INTO `skp` VALUES ('SKP00155', 'Melakukan pelayanan medik gigi dan mulut umum rawat jalan tingkat pertama', '30');
INSERT INTO `skp` VALUES ('SKP00156', 'Melakukan pelayanan Pap Smear', '25');
INSERT INTO `skp` VALUES ('SKP00157', 'Melakukan pelayanan Pimpinan', '60');
INSERT INTO `skp` VALUES ('SKP00158', 'Melakukan pembinaan/penilaian pegawai', '15');
INSERT INTO `skp` VALUES ('SKP00159', 'Melakukan pemeliharaan kandang (per lokasi)', '120');
INSERT INTO `skp` VALUES ('SKP00160', 'Melakukan pemeriksaan kasus disiplin pegawai', '60');
INSERT INTO `skp` VALUES ('SKP00161', 'Melakukan pemeriksaan pasien', '5');
INSERT INTO `skp` VALUES ('SKP00162', 'Melakukan pemeriksaan terhadap alat-alat bukti', '10');
INSERT INTO `skp` VALUES ('SKP00163', 'Melakukan pemungutan/penyetoran pajak', '100');
INSERT INTO `skp` VALUES ('SKP00164', 'Melakukan penanaman jalan dan nomor bangunan (per lokasi)', '60');
INSERT INTO `skp` VALUES ('SKP00165', 'Melakukan pencatatan, pelaporan, kegiatan lab', '30');
INSERT INTO `skp` VALUES ('SKP00166', 'Melakukan pendampingan penyusunan analisa jabatan, analisa beban kerja dan evaluasi jabatan', '120');
INSERT INTO `skp` VALUES ('SKP00167', 'Melakukan pendampingan penyusunan SOP', '90');
INSERT INTO `skp` VALUES ('SKP00168', 'Melakukan pendampingan reses (per lokasi)', '240');
INSERT INTO `skp` VALUES ('SKP00169', 'Melakukan pendampingan sidak (per lokasi sidak)', '120');
INSERT INTO `skp` VALUES ('SKP00170', 'Melakukan pendistribusian angka hasil reviu', '30');
INSERT INTO `skp` VALUES ('SKP00171', 'Melakukan pengamatan dan penggambaran terhadap target operasi', '180');
INSERT INTO `skp` VALUES ('SKP00172', 'Melakukan pengambilan darah/sampling ke pasien', '5');
INSERT INTO `skp` VALUES ('SKP00173', 'Melakukan pengawasan atas pembinaan pelaksanaan urusan pilihan melalui analisis, evaluasi, pengujian/penilaian terhadap RPJMD', '300');
INSERT INTO `skp` VALUES ('SKP00174', 'Melakukan pengawasan kebijakan keuangan daerah/negara', '360');
INSERT INTO `skp` VALUES ('SKP00175', 'Melaksanakan pengawasan kemampuan kelembagaan', '300');
INSERT INTO `skp` VALUES ('SKP00176', 'Melakukan pengawasan pelaksanaan urusan pilihan bidang', '120');
INSERT INTO `skp` VALUES ('SKP00177', 'Melakukan pengawasan pelaksanaan urusan wajib', '300');
INSERT INTO `skp` VALUES ('SKP00178', 'Melakukan pengawasan umum penerapan Standar Pelayanan Minimal (SPM)/Norma, Standar,  Prosedur dan Kriteria (NSPK) melalui Analisis, Evaluasi, Pengujian/Penilaia', '300');
INSERT INTO `skp` VALUES ('SKP00179', 'Melakukan pengawasan umum penerapan Standar Pelayanan Minimal (SPM)/Norma, Standar,  Prosedur dan Kriteria (NSPK) melalui Analisis, Evaluasi, Pengujian/Penilaia', '360');
INSERT INTO `skp` VALUES ('SKP00180', 'Melakukan pengecekan mutasi aset', '360');
INSERT INTO `skp` VALUES ('SKP00181', 'Melakukan pengelolaan peralatan suatu objek kerja', '25');
INSERT INTO `skp` VALUES ('SKP00182', 'Melakukan pengkodean aplikasi dan database (penambahan modul)', '360');
INSERT INTO `skp` VALUES ('SKP00183', 'Melakukan pengolahan tanaman (per objek tanaman)', '120');
INSERT INTO `skp` VALUES ('SKP00184', 'Melakukan penjilidan dan pendistribusian laporan keuangan', '60');
INSERT INTO `skp` VALUES ('SKP00185', 'Melakukan penyuluhan kesehatan', '90');
INSERT INTO `skp` VALUES ('SKP00186', 'Melakukan perawatan peralatan', '180');
INSERT INTO `skp` VALUES ('SKP00187', 'Melakukan pointing arah antena (per lokasi)', '60');
INSERT INTO `skp` VALUES ('SKP00188', 'Melakukan proses pengadaan Barang/Jasa per kegiatan', '360');
INSERT INTO `skp` VALUES ('SKP00189', 'Melakukan QC, kalibrasi, persiapan reagen masing-masing alat kimia, hematologi, urinalisa, imunologi', '20');
INSERT INTO `skp` VALUES ('SKP00190', 'Melakukan rapat rekonsiliasi dengan para bendahara pengeluaran', '120');
INSERT INTO `skp` VALUES ('SKP00191', 'Melakukan rapat rekonsiliasi dengan para PPTK yang memiliki tagihan utang pada pihak ketiga', '120');
INSERT INTO `skp` VALUES ('SKP00192', 'Melakukan rapat rekonsiliasi dengan para pengurus atau penyimpan barang', '120');
INSERT INTO `skp` VALUES ('SKP00193', 'Melakukan rekonsiliasi aset tetap', '360');
INSERT INTO `skp` VALUES ('SKP00194', 'Melakukan rekonsiliasi angka selain aset tetap', '120');
INSERT INTO `skp` VALUES ('SKP00195', 'Melakukan rekonsiliasi belanja', '360');
INSERT INTO `skp` VALUES ('SKP00196', 'Melakukan rekonsiliasi Laporan Keuangan', '60');
INSERT INTO `skp` VALUES ('SKP00197', 'Melakukan rujukan', '20');
INSERT INTO `skp` VALUES ('SKP00198', 'Melakukan Stock Opname', '120');
INSERT INTO `skp` VALUES ('SKP00199', 'Melakukan terapi pada kasus gangguan jiwa/psikososial tingkat rendah kelompok interaksi sosial', '60');
INSERT INTO `skp` VALUES ('SKP00200', 'Melakukan terapi pada kasus gangguan jiwa/psikososial tingkat sedang kelompok relaksasi', '60');
INSERT INTO `skp` VALUES ('SKP00201', 'Melakukan tindakan pengobatan kompleks', '60');
INSERT INTO `skp` VALUES ('SKP00202', 'Melakukan tindakan pengobatan sederhana', '30');
INSERT INTO `skp` VALUES ('SKP00203', 'Melakukan tindakan processing film', '15');
INSERT INTO `skp` VALUES ('SKP00204', 'Melakukan tindakan proteksi radiasi/kalibrasi', '200');
INSERT INTO `skp` VALUES ('SKP00205', 'Melakukan tindakan teknik pemeriksaan radiologi USG', '30');
INSERT INTO `skp` VALUES ('SKP00206', 'Melakukan tinjauan lapangan melalui pengajuan teknis bersama instansi teknis terkait', '180');
INSERT INTO `skp` VALUES ('SKP00207', 'Melakukan usulan komponen per kode rekening kegiatan', '20');
INSERT INTO `skp` VALUES ('SKP00208', 'Melakukan validasi anggaran per kode rekening kegiatan', '50');
INSERT INTO `skp` VALUES ('SKP00209', 'Melakukan validasi Data Kepesertaan Jaminan Kesehatan', '45');
INSERT INTO `skp` VALUES ('SKP00210', 'Melakukan validasi/verifikasi Analisa Jabatan/Analisa Beban Kerja/Evaluasi Jabatan SKPD/UKPD', '90');
INSERT INTO `skp` VALUES ('SKP00211', 'Melakukan validasi/verifikasi Formasi Jabatan Fungsional tertentu SKPD/UKPD', '120');
INSERT INTO `skp` VALUES ('SKP00212', 'Melakukan validasi/verifikasi Formasi Jabatan SKPD/UKPD', '120');
INSERT INTO `skp` VALUES ('SKP00213', 'Melakukan validasi/verifikasi Formasi/Nama Jabatan', '120');
INSERT INTO `skp` VALUES ('SKP00214', 'Melakukan validasi/verifikasi Kelas Jabatan', '120');
INSERT INTO `skp` VALUES ('SKP00215', 'Melakukan validasi/verifikasi Nama Jabatan SKPD/UKPD', '90');
INSERT INTO `skp` VALUES ('SKP00216', 'Melakukan validasi/verifikasi Peta Jabatan SKPD/UKPD', '30');
INSERT INTO `skp` VALUES ('SKP00217', 'Melakukan verifikasi dan/atau validasi data/informasi dalam rangka keterbukaan data', '120');
INSERT INTO `skp` VALUES ('SKP00218', 'Melakukan verifikasi formulir penyusunan formasi', '45');
INSERT INTO `skp` VALUES ('SKP00219', 'Melakukan verifikasi gambar perencanan', '60');
INSERT INTO `skp` VALUES ('SKP00220', 'Melakukan verifikasi kelengkapan dan kebenaran berkas', '5');
INSERT INTO `skp` VALUES ('SKP00221', 'Melakukan verifikasi konsep keputusan', '30');
INSERT INTO `skp` VALUES ('SKP00222', 'Melaporkan dan mempertanggungjawabkan pelaksanaan tugas', '30');
INSERT INTO `skp` VALUES ('SKP00223', 'Melaporkan dan mempertanggungjawabkan pengeluaran anggaran APBD/APBN paling lambat tanggal 10 bulan berikutnya ke BPKAD, Inspektorat dan Kementrian Keuangan', '45');
INSERT INTO `skp` VALUES ('SKP00224', 'Melaporkan hasil kegiatan', '10');
INSERT INTO `skp` VALUES ('SKP00225', 'Melaporkan hasil temuan pemeriksaan pertanggung jawaban kepada atasan untuk memperoleh tindak lanjut sebagai bahan pertimbangan pimpinan', '15');
INSERT INTO `skp` VALUES ('SKP00226', 'Melaporkan pelaksanaan kegiatan kepada atasan langsung dan hasil sebagai bahan evaluasi pertanggung jawaban', '15');
INSERT INTO `skp` VALUES ('SKP00227', 'Melaporkan pelaksanaan tugas satpel kesor', '45');
INSERT INTO `skp` VALUES ('SKP00228', 'Melaksanakan pendampingan Evaluasi Diri Sekolah (EDS)', '120');
INSERT INTO `skp` VALUES ('SKP00229', 'Melayani objek kerja', '15');
INSERT INTO `skp` VALUES ('SKP00230', 'Memantau Perbal', '10');
INSERT INTO `skp` VALUES ('SKP00231', 'Memaraf Perbal', '5');
INSERT INTO `skp` VALUES ('SKP00232', 'Memaraf SK Petikan', '5');
INSERT INTO `skp` VALUES ('SKP00233', 'Memaraf Surat', '5');
INSERT INTO `skp` VALUES ('SKP00234', 'Memasang alat KB', '30');
INSERT INTO `skp` VALUES ('SKP00235', 'Memasukkan data ke software data lainnya (per jenis data)', '30');
INSERT INTO `skp` VALUES ('SKP00236', 'Memasukkan hasil data ujian peserta pelatihan', '180');
INSERT INTO `skp` VALUES ('SKP00237', 'Memasukkan data ke software anggaran (per 1 kegiatan)', '90');
INSERT INTO `skp` VALUES ('SKP00238', 'Memasukkan data ke software data lainnya (per jenis data)', '2');
INSERT INTO `skp` VALUES ('SKP00239', 'Memasukkan data ke software kepegawaian (per 10 nama pegawai)', '20');
INSERT INTO `skp` VALUES ('SKP00240', 'Memasukkan data ke software keuangan (per transaksi)', '2');
INSERT INTO `skp` VALUES ('SKP00241', 'Membagi tugas kepada bawahan', '60');
INSERT INTO `skp` VALUES ('SKP00242', 'Membahas RAPBD dengan Pemerintah Pusat', '180');
INSERT INTO `skp` VALUES ('SKP00243', 'Membawakan acara (per kegiatan)', '60');
INSERT INTO `skp` VALUES ('SKP00244', 'Membayarkan anggaran kegiatan ke pelaksana', '30');
INSERT INTO `skp` VALUES ('SKP00245', 'Memberi arahan', '30');
INSERT INTO `skp` VALUES ('SKP00246', 'Memberikan bimbingan dan konsultasi teknis penyusunan laporan dan bahan pertanggung jawaban keuangan terhadap unit kerja', '360');
INSERT INTO `skp` VALUES ('SKP00247', 'Memberikan home program bagi pasien yang telah selesai terapi', '15');
INSERT INTO `skp` VALUES ('SKP00248', 'Memberikan informasi terkait hasil verifikasi berkas perijinan dan non perijinan', '5');
INSERT INTO `skp` VALUES ('SKP00249', 'Memberikan konsultasi teknis laporan terhadap unit kerja inspektorat', '60');
INSERT INTO `skp` VALUES ('SKP00250', 'Memberikan pengarahan teknis', '30');
INSERT INTO `skp` VALUES ('SKP00251', 'Memberi lembar pengantar pada surat', '5');
INSERT INTO `skp` VALUES ('SKP00252', 'Memberi paparan', '120');
INSERT INTO `skp` VALUES ('SKP00253', 'Memberi penjelasan terkait permasalahan (konseling) per permasalahan', '120');
INSERT INTO `skp` VALUES ('SKP00254', 'Memberi routing slip/check list persyaratan pada berkas perijinan dan non perijinan', '5');
INSERT INTO `skp` VALUES ('SKP00255', 'Membersihkan dan memelihara lingkungan tempat kerja', '120');
INSERT INTO `skp` VALUES ('SKP00256', 'Membimbing pelaksanaan Pelayanan kesehatan olahraga dan kebugaran pada ruang kebugaran serta satuan pelaksana kesehatan olahraga di lingkungan PPKP', '350');
INSERT INTO `skp` VALUES ('SKP00257', 'Membuat administrasi kepegawaian', '30');
INSERT INTO `skp` VALUES ('SKP00258', 'Membuat administrasi peralatan kantor', '30');
INSERT INTO `skp` VALUES ('SKP00259', 'Membuat analisa media', '60');
INSERT INTO `skp` VALUES ('SKP00260', 'Membuat analisa pengamanan', '120');
INSERT INTO `skp` VALUES ('SKP00261', 'Membuat bahan Laporan Penyelenggaraan Pemerintah Daerah (LPPD)', '360');
INSERT INTO `skp` VALUES ('SKP00262', 'Membuat berita acara', '60');
INSERT INTO `skp` VALUES ('SKP00263', 'Membuat bukti pemotongan pajak', '5');
INSERT INTO `skp` VALUES ('SKP00264', 'Membuat catatan medik', '5');
INSERT INTO `skp` VALUES ('SKP00265', 'Membuat daftar gaji dan merekap absensi pendayagunaan PHL', '60');
INSERT INTO `skp` VALUES ('SKP00266', 'Membuat daftar gaji per 50 pegawai (terkait gaji pegawai)', '60');
INSERT INTO `skp` VALUES ('SKP00267', 'Membuat daftar gaji per 50 pegawai (terkait uang air)', '30');
INSERT INTO `skp` VALUES ('SKP00268', 'Membuat daftar urut kepangkatan', '60');
INSERT INTO `skp` VALUES ('SKP00269', 'Membuat dan melaporkan SPT setiap bulan kepada kantor pelayanan pajak', '180');
INSERT INTO `skp` VALUES ('SKP00270', 'Membuat data kunjungan mancanegara', '45');
INSERT INTO `skp` VALUES ('SKP00271', 'Membuat disposisi', '10');
INSERT INTO `skp` VALUES ('SKP00272', 'Membuat file PDF Perda', '5');
INSERT INTO `skp` VALUES ('SKP00273', 'Membuat file PDF Pergub', '5');
INSERT INTO `skp` VALUES ('SKP00274', 'Membuat gambar perencanaan', '120');
INSERT INTO `skp` VALUES ('SKP00275', 'Membuat Instruksi Gubernur', '120');
INSERT INTO `skp` VALUES ('SKP00276', 'Membuat jadwal kegiatan', '60');
INSERT INTO `skp` VALUES ('SKP00277', 'Membuat jadwal kegiatan pengadaan barang/jasa', '20');
INSERT INTO `skp` VALUES ('SKP00278', 'Membuat jadwal pelatihan', '15');
INSERT INTO `skp` VALUES ('SKP00279', 'Membuat jawaban/replik/duplik/akta bukti/kesimpulan untuk persidangan di pengadilan', '180');
INSERT INTO `skp` VALUES ('SKP00280', 'Membuat Kartu Inventari Ruangan (KIR)', '15');
INSERT INTO `skp` VALUES ('SKP00281', 'Membuat Kartu Inventari Barang (KIB)', '30');
INSERT INTO `skp` VALUES ('SKP00282', 'Membuat kegiatan administrasi', '125');
INSERT INTO `skp` VALUES ('SKP00283', 'Membuat kliping berita', '30');
INSERT INTO `skp` VALUES ('SKP00284', 'Membuat konsep algoritma aplikasi', '120');
INSERT INTO `skp` VALUES ('SKP00285', 'Membuat konsep dokumen kontrak/SPK', '180');
INSERT INTO `skp` VALUES ('SKP00286', 'Membuat konsep flowchart aplikasi', '120');
INSERT INTO `skp` VALUES ('SKP00287', 'Membuat konsep keputusan gubernur kenaikan gaji berkala/pangkat/pensiun/PNS/CPNS/mutasi', '20');
INSERT INTO `skp` VALUES ('SKP00288', 'Membuat konsep kronologis kasus', '180');
INSERT INTO `skp` VALUES ('SKP00289', 'Membuat konsep Lakip Kota (asumsi bahan lengkap)', '2100');
INSERT INTO `skp` VALUES ('SKP00290', 'Membuat konsep Lakip SKPD (asumsi bahan lengkap)', '1260');
INSERT INTO `skp` VALUES ('SKP00291', 'Membuat konsep MoU/Perjanjian kerjasama', '120');
INSERT INTO `skp` VALUES ('SKP00292', 'Membuat konsep perumusan rancangan Undang-undang', '300');
INSERT INTO `skp` VALUES ('SKP00293', 'Membuat Konsep Program kerja pengawasan tahunan bidang', '120');
INSERT INTO `skp` VALUES ('SKP00294', 'Membuat Konsep RAB/OE', '120');
INSERT INTO `skp` VALUES ('SKP00295', 'Membuat Konsep rencana kerja (Renja)', '1260');
INSERT INTO `skp` VALUES ('SKP00296', 'Membuat Konsep rencana strategik (Renstra)', '1260');
INSERT INTO `skp` VALUES ('SKP00297', 'Membuat Konsep surat dinas/nota dinas', '15');
INSERT INTO `skp` VALUES ('SKP00298', 'Membuat Konsep surat edaran Gubernur', '60');
INSERT INTO `skp` VALUES ('SKP00299', 'Membuat Konsep surat edaran Sekda', '180');
INSERT INTO `skp` VALUES ('SKP00300', 'Membuat Konsep surat keputusan/penetapan', '60');
INSERT INTO `skp` VALUES ('SKP00301', 'Membuat Konsep surat panggilan', '30');
INSERT INTO `skp` VALUES ('SKP00302', 'Membuat Konsep surat perintah', '15');
INSERT INTO `skp` VALUES ('SKP00303', 'Membuat Konsep surat tugas', '15');
INSERT INTO `skp` VALUES ('SKP00304', 'Membuat Konsep surat undangan', '90');
INSERT INTO `skp` VALUES ('SKP00305', 'Membuat Konsep telaahan staf', '240');
INSERT INTO `skp` VALUES ('SKP00306', 'Membuat Konsep terkait permasalahan hukum', '240');
INSERT INTO `skp` VALUES ('SKP00307', 'Membuat Konsep TOR atau KAK', '360');
INSERT INTO `skp` VALUES ('SKP00308', 'Membuat laporan dalam rangka pemeriksaan', '120');
INSERT INTO `skp` VALUES ('SKP00309', 'Membuat laporan hasil proses Pengadaan Barang/Jasa', '60');
INSERT INTO `skp` VALUES ('SKP00310', 'Membuat laporan kegiatan', '120');
INSERT INTO `skp` VALUES ('SKP00311', 'Membuat laporan penggunaan barang pakai habis (ATK, Obat, Alkes)', '30');
INSERT INTO `skp` VALUES ('SKP00312', 'Membuat Realisasi Keuangan', '125');
INSERT INTO `skp` VALUES ('SKP00313', 'Membuat/menyiapkan bahan paparan', '120');
INSERT INTO `skp` VALUES ('SKP00314', 'Membuat nota penolakan teknis untuk berkas yang tidak sesuai dengan persyaratan teknis', '15');
INSERT INTO `skp` VALUES ('SKP00315', 'Membuat notulen rapat', '30');
INSERT INTO `skp` VALUES ('SKP00316', 'Membuat Pakta Integritas', '5');
INSERT INTO `skp` VALUES ('SKP00317', 'Membuat pedoman penyelenggaraan diklat teknis', '60');
INSERT INTO `skp` VALUES ('SKP00318', 'Membuat pembahasan rancangan undang-undang', '300');
INSERT INTO `skp` VALUES ('SKP00319', 'Membuat penatausahaan keuangan oleh bendahara dan PPK SKPD', '15');
INSERT INTO `skp` VALUES ('SKP00320', 'Membuat pengajuan panjar kegiatan (pembantu bendahara)', '30');
INSERT INTO `skp` VALUES ('SKP00321', 'Membuat pengajuan panjar kegiatan SKPD (bendahara pengeluaran)', '30');
INSERT INTO `skp` VALUES ('SKP00322', 'Membuat pengajuan SPP dan SPM', '30');
INSERT INTO `skp` VALUES ('SKP00323', 'Membuat perbaikan SK petikan jabatan', '5');
INSERT INTO `skp` VALUES ('SKP00324', 'Membuat perbal Peraturan Gubernur', '20');
INSERT INTO `skp` VALUES ('SKP00325', 'Membuat persetujuan teknis berdasarkan hasil rapat pembahasan pengujian teknis lapangan dan rapat pra-perijinan', '30');
INSERT INTO `skp` VALUES ('SKP00326', 'Membuat persetujuan teknis untuk berkas sudah diverivikasi persyaratan dan kebenarannya', '15');
INSERT INTO `skp` VALUES ('SKP00327', 'Membuat pointer rapat', '20');
INSERT INTO `skp` VALUES ('SKP00328', 'Membuat program fisioterapi', '320');
INSERT INTO `skp` VALUES ('SKP00329', 'Membuat rancangan instruksi gubernur', '120');
INSERT INTO `skp` VALUES ('SKP00330', 'Membuat rancangan keputusan gubernur', '300');
INSERT INTO `skp` VALUES ('SKP00331', 'Membuat rancangan peraturan daerah', '2100');
INSERT INTO `skp` VALUES ('SKP00332', 'Membuat rancangan peraturan gubernur selain SOTK', '300');
INSERT INTO `skp` VALUES ('SKP00333', 'Membuat rancangan peraturan gubernur tentang organisasi dan tata kerja SKPD', '360');
INSERT INTO `skp` VALUES ('SKP00334', 'Membuat rancangan peraturan gubernur tentang organisasi dan tata kerja UKPD', '360');
INSERT INTO `skp` VALUES ('SKP00335', 'Membuat registrasi produk hukum', '15');
INSERT INTO `skp` VALUES ('SKP00336', 'Membuat rekapitulasi absensi pegawai per bulan', '30');
INSERT INTO `skp` VALUES ('SKP00337', 'Membuat rekapitulasi absensi pegawai per hari', '30');
INSERT INTO `skp` VALUES ('SKP00338', 'Membuat rekapituasi penyerapan kegiatan', '15');
INSERT INTO `skp` VALUES ('SKP00339', 'Membuat sambutan/pidato pejabat', '90');
INSERT INTO `skp` VALUES ('SKP00340', 'Membuat silabi (per kegiatan/event)', '120');
INSERT INTO `skp` VALUES ('SKP00341', 'Membuat SOP', '180');
INSERT INTO `skp` VALUES ('SKP00342', 'Membuat SPD', '30');
INSERT INTO `skp` VALUES ('SKP00343', 'Membuat SPD revisi', '30');
INSERT INTO `skp` VALUES ('SKP00344', 'Membuat Surat Perintah Membayar (SPM)', '15');
INSERT INTO `skp` VALUES ('SKP00345', 'Membuat Surat Perinta Pencairan (SPP)', '30');
INSERT INTO `skp` VALUES ('SKP00346', 'Membuat SPT Pajak Tahunan Pegawai', '15');
INSERT INTO `skp` VALUES ('SKP00347', 'Membuat Surat Setoran Pajak (SSP)', '10');
INSERT INTO `skp` VALUES ('SKP00348', 'Membuat Surat Tanda Setoran (STS)', '10');
INSERT INTO `skp` VALUES ('SKP00349', 'Membuat surat evaluasi', '60');
INSERT INTO `skp` VALUES ('SKP00350', 'Membuat surat gugatan/memori atau kontra memori', '300');
INSERT INTO `skp` VALUES ('SKP00351', 'Membuat surat jawaban atas pengaduan masyarakat', '60');
INSERT INTO `skp` VALUES ('SKP00352', 'Membuat surat kuasa', '30');
INSERT INTO `skp` VALUES ('SKP00353', 'Membuat surat pengantar rekomendasi teknis ke instansi terkait sesuai dengan bidang perijinan', '30');
INSERT INTO `skp` VALUES ('SKP00354', 'Membuat surat pernyataan pelantikan', '5');
INSERT INTO `skp` VALUES ('SKP00355', 'Membuat surat teguran', '5');
INSERT INTO `skp` VALUES ('SKP00356', 'Membuat transkrip nilai peserta pelatihan per kegiatan', '230');
INSERT INTO `skp` VALUES ('SKP00357', 'Memelihara arsip', '20');
INSERT INTO `skp` VALUES ('SKP00358', 'Memelihara arsip/dokumen kuno (per 1 dus dokumen arsip)', '60');
INSERT INTO `skp` VALUES ('SKP00359', 'Memelihara komputer (per PC)', '180');
INSERT INTO `skp` VALUES ('SKP00360', 'Memelihara peralatan operasional truck/bis/kendaraan lain', '60');
INSERT INTO `skp` VALUES ('SKP00361', 'Memelihara Server (per PC)', '180');
INSERT INTO `skp` VALUES ('SKP00362', 'Memelihara sistem jaringan (per PC)', '60');
INSERT INTO `skp` VALUES ('SKP00363', 'Memeriksa barang/pekerjaan', '20');
INSERT INTO `skp` VALUES ('SKP00364', 'Memeriksa dan mengklarifikasi bahan dan data objek kerja', '10');
INSERT INTO `skp` VALUES ('SKP00365', 'Memeriksa kelengkapan dokumen SPP untuk proses pembuatan SPM', '10');
INSERT INTO `skp` VALUES ('SKP00366', 'Memeriksa/meneliti hasil kegiatan/kerja', '45');
INSERT INTO `skp` VALUES ('SKP00367', 'Memimpin Rapat Teknis', '120');
INSERT INTO `skp` VALUES ('SKP00368', 'Memonitor dan menyiapkan bahan evaluasi pelaksanaan anggaran', '360');
INSERT INTO `skp` VALUES ('SKP00369', 'Mempelajari laporan masyarakat', '60');
INSERT INTO `skp` VALUES ('SKP00370', 'Mempelajari objek kerja sesuai dengan prosedur dan ketentuan', '30');
INSERT INTO `skp` VALUES ('SKP00371', 'Mempelajari peraturan', '60');
INSERT INTO `skp` VALUES ('SKP00372', 'Memperbaiki/validasi perbal Pergub/Kepgub', '60');
INSERT INTO `skp` VALUES ('SKP00373', 'Mempersiapkan acara seremonial', '60');
INSERT INTO `skp` VALUES ('SKP00374', 'Mempersiapkan alat/modalitas fisioterapi', '30');
INSERT INTO `skp` VALUES ('SKP00375', 'Mempersiapkan operasional teater bintang', '30');
INSERT INTO `skp` VALUES ('SKP00376', 'Memvalidasi SPD', '5');
INSERT INTO `skp` VALUES ('SKP00377', 'Memverifikasi Penatausahaan Keuangan oleh bendahara dan PPK SKPD', '20');
INSERT INTO `skp` VALUES ('SKP00378', 'Memverifikasi penetapan angka kredit (PAK) jabatan fungsional tertentu', '15');
INSERT INTO `skp` VALUES ('SKP00379', 'Memverifikasi usulan SSH/ASB (per 2 SSH)', '10');
INSERT INTO `skp` VALUES ('SKP00380', 'Menaklik Tiknet Perbal Naskah Dinas', '60');
INSERT INTO `skp` VALUES ('SKP00381', 'Menambah kode rekening berdasarkan usulan SKPD/UKPD (per 10 kode rekening)', '20');
INSERT INTO `skp` VALUES ('SKP00382', 'Menandatangani surat/dokumen/berkas', '5');
INSERT INTO `skp` VALUES ('SKP00383', 'Menata objek kerja sesuai dengan prosedur dan ketentuan', '15');
INSERT INTO `skp` VALUES ('SKP00384', 'Mencatat BKU (per 10 transaksi)', '20');
INSERT INTO `skp` VALUES ('SKP00385', 'Mencatan dan membukukan Buku Kas Umum (BKU) dan buku Pembantu lainnya', '5');
INSERT INTO `skp` VALUES ('SKP00386', 'Mencatat jadwal kegiatan pimpinan', '10');
INSERT INTO `skp` VALUES ('SKP00387', 'Mencatat perkembangan kegiatan dan permasalahan data yang terjadi', '25');
INSERT INTO `skp` VALUES ('SKP00388', 'Mencetak Dokumen Pelaksanaan Anggaran (DPA) Per Kegiatan', '15');
INSERT INTO `skp` VALUES ('SKP00389', 'Mencetak Perda sebagai bahan APBD/APBD Perubahan', '10');
INSERT INTO `skp` VALUES ('SKP00390', 'Mencetak Pergub sebagai bahan APBD/APBD Perubahan', '10');
INSERT INTO `skp` VALUES ('SKP00391', 'Mencetak SK Petikan', '5');
INSERT INTO `skp` VALUES ('SKP00392', 'Menandatangani SK Petikan', '5');
INSERT INTO `skp` VALUES ('SKP00393', 'Mendesain sertifikat, spanduk dan piagam', '60');
INSERT INTO `skp` VALUES ('SKP00394', 'Mendistribusikan alat kantor di luar kantor (per 1X pengiriman per SKPD)', '180');
INSERT INTO `skp` VALUES ('SKP00395', 'Mendistribusikan bahan logistik dll (ke SKPD lain per lokasi)', '60');
INSERT INTO `skp` VALUES ('SKP00396', 'Mendistribusikan BAST', '30');
INSERT INTO `skp` VALUES ('SKP00397', 'Mendistribusikan hasil audit BPK (temuan sementara dan jurnal)', '60');
INSERT INTO `skp` VALUES ('SKP00398', 'Mendokumentasikan dokumen penting', '10');
INSERT INTO `skp` VALUES ('SKP00399', 'Mendokumentasikan surat', '5');
INSERT INTO `skp` VALUES ('SKP00400', 'Meneliti BAST', '60');
INSERT INTO `skp` VALUES ('SKP00401', 'Meneliti dan memeriksa objek kerja', '30');
INSERT INTO `skp` VALUES ('SKP00402', 'Meneliti dan memverifikasi ASB/HSPK (per 18 item)', '180');
INSERT INTO `skp` VALUES ('SKP00403', 'Meneliti dan memverifikasi RKA/DPA', '120');
INSERT INTO `skp` VALUES ('SKP00404', 'Meneliti dan memverifikasi SSH/Kode rekening (per 10 item)', '30');
INSERT INTO `skp` VALUES ('SKP00405', 'Meneliti dan mencocokkan bukti-bukti pengeluaran dan penerimaan dengan laporan realisasi keuangan dan buku kas', '15');
INSERT INTO `skp` VALUES ('SKP00406', 'Meneliti dan memverifikasi formasi kebutuhan PPPK per SKPD/UKPD', '45');
INSERT INTO `skp` VALUES ('SKP00407', 'Meneliti dan memverifikasi formasi ijin belajar per SKPD/UKPD', '45');
INSERT INTO `skp` VALUES ('SKP00408', 'Meneliti dan memverifikasi formasi kebutuhan PNS per SKPD/UKPD', '45');
INSERT INTO `skp` VALUES ('SKP00409', 'Meneliti dan memverifikasi formasi tugas belajar per SKPD/UKPD', '45');
INSERT INTO `skp` VALUES ('SKP00410', 'Meneliti dan memverifikasi usulan kebutuhan PNS', '90');
INSERT INTO `skp` VALUES ('SKP00411', 'Meneliti dan memverifikasi usulan kebutuhan PPPK', '90');
INSERT INTO `skp` VALUES ('SKP00412', 'Meneliti data dan informasi dalam rangka penyusunan laporan evaluasi penyelenggaraan daerah', '180');
INSERT INTO `skp` VALUES ('SKP00413', 'Meneliti data entri gaji dan tunjangan lainnya sebagai bahan konfirmasi belanja pegawai dengan SKPD', '30');
INSERT INTO `skp` VALUES ('SKP00414', 'Meneliti Laporan Keuangan', '280');
INSERT INTO `skp` VALUES ('SKP00415', 'Menentukan problem fisioterapi pada pasien rujukan', '20');
INSERT INTO `skp` VALUES ('SKP00416', 'Menerima audiensi', '180');
INSERT INTO `skp` VALUES ('SKP00417', 'Menerima berkas/surat/dokumen adminstrasi', '15');
INSERT INTO `skp` VALUES ('SKP00418', 'Menerima dan mencatat bahan dan data objek kerja', '10');
INSERT INTO `skp` VALUES ('SKP00419', 'Menerima dan meneliti kebenaran data berdasarkan bahan yang masuk', '25');
INSERT INTO `skp` VALUES ('SKP00420', 'Menerima dan menyampaikan berita lewat Rig/HT', '240');
INSERT INTO `skp` VALUES ('SKP00421', 'Menerima dan menyetor retribusi', '20');
INSERT INTO `skp` VALUES ('SKP00422', 'Menerima dan menyortir bukti-bukti pengeluaran dan penerimaan serta buku kas', '15');
INSERT INTO `skp` VALUES ('SKP00423', 'Menerima konsultasi terkait peraturan', '60');
INSERT INTO `skp` VALUES ('SKP00424', 'Menerima kunjungan kerja', '120');
INSERT INTO `skp` VALUES ('SKP00425', 'Menerima/memeriksa objek kerja sesuai dengan prosedur dan ketentuan', '30');
INSERT INTO `skp` VALUES ('SKP00426', 'Menerima satwa yang baru datang/sakit', '30');
INSERT INTO `skp` VALUES ('SKP00427', 'Menerima surat masuk, meminta tandatangan Ka.UPT memberi lembar disposisi 3 surat', '20');
INSERT INTO `skp` VALUES ('SKP00428', 'Menerima tamu dan mencatat keperluannya', '5');
INSERT INTO `skp` VALUES ('SKP00429', 'Menerjemahkan bahasa (1X kunjungan)', '60');
INSERT INTO `skp` VALUES ('SKP00430', 'Menerjemahkan/menyadur di bidang Pengadaan Barang/Jasa yang tidak dipublikasikan', '120');
INSERT INTO `skp` VALUES ('SKP00431', 'Mengajarkan senam hamil', '100');
INSERT INTO `skp` VALUES ('SKP00432', 'Mengajar/melatih diklat pengadaan barang/jasa', '90');
INSERT INTO `skp` VALUES ('SKP00433', 'Mengajukan Surat Perintah Membayar (SPM) ke Kas Daerah', '30');
INSERT INTO `skp` VALUES ('SKP00434', 'Mengajukan anggaran sesuai jadwal', '60');
INSERT INTO `skp` VALUES ('SKP00435', 'Mengajukan gugatan/banding/kasasi/peninjauan kembali/memori/kontra memori ke pengadilan', '120');
INSERT INTO `skp` VALUES ('SKP00436', 'Mengambil dokumen/surat', '120');
INSERT INTO `skp` VALUES ('SKP00437', 'Menganalisa formasi Ijin Belajar', '60');
INSERT INTO `skp` VALUES ('SKP00438', 'Menganalisa formasi Tugas Belajar', '60');
INSERT INTO `skp` VALUES ('SKP00439', 'Menganalisa network sistem/mendesain/kajian (per 1 kajian)', '120');
INSERT INTO `skp` VALUES ('SKP00440', 'Menganalisa surat pengaduan/panggilan sidang/permohonan kajian/perbal', '360');
INSERT INTO `skp` VALUES ('SKP00441', 'Menganalisis hasil identifikasi penyelenggaraan program PAUDNI (JFT Pamong Belajar Madya)', '180');
INSERT INTO `skp` VALUES ('SKP00442', 'Menganalisis Perbal Naskah Dinas', '180');
INSERT INTO `skp` VALUES ('SKP00443', 'Mengantar dokumen/surat', '120');
INSERT INTO `skp` VALUES ('SKP00444', 'Mengawasi pelaksanaan pekerjaan fisik konstruksi (per objek/lokasi)', '120');
INSERT INTO `skp` VALUES ('SKP00445', 'Mengawasi pelaksanaan pemeliharaan', '240');
INSERT INTO `skp` VALUES ('SKP00446', 'Mengawasi Ujian (per kegiatan)', '240');
INSERT INTO `skp` VALUES ('SKP00447', 'Mengawasi Ujian (per kegiatan)', '120');
INSERT INTO `skp` VALUES ('SKP00448', 'Mengawasi Ujian (per kegiatan)', '30');
INSERT INTO `skp` VALUES ('SKP00449', 'Mengecek konsep pengumuman lelang (pertahap lelang)', '10');
INSERT INTO `skp` VALUES ('SKP00450', 'Mengelola administrasi kepegawaian', '60');
INSERT INTO `skp` VALUES ('SKP00451', 'Mengelola surat (per 10 surat)', '30');
INSERT INTO `skp` VALUES ('SKP00452', 'Mengelola surat (per 10 surat)', '120');
INSERT INTO `skp` VALUES ('SKP00453', 'Mengelompokkan surat atau dokumen menurut jenis dan sifatnya', '10');
INSERT INTO `skp` VALUES ('SKP00454', 'Mengemudi kendaraan operasional dalam kota (per tujuan)', '90');
INSERT INTO `skp` VALUES ('SKP00455', 'Mengemudi kendaraan operasional dalam kota (per tujuan)', '60');
INSERT INTO `skp` VALUES ('SKP00456', 'Mengendalikan pelaksanaan pelayanan kesehatan kedokteran olahraga pada satpelkes kesor sesuai standard dan prosedur', '60');
INSERT INTO `skp` VALUES ('SKP00457', 'Mengestimasi pendapatan (per tagihan)', '15');
INSERT INTO `skp` VALUES ('SKP00458', 'Mengetik jawaban/penjelasan atas kunjungan tamu gubernur', '90');
INSERT INTO `skp` VALUES ('SKP00459', 'Mengetik surat', '5');
INSERT INTO `skp` VALUES ('SKP00460', 'Mengevaluasi aplikasi/software (per kegiatan)', '30');
INSERT INTO `skp` VALUES ('SKP00461', 'Mengevaluasi/meneliti hasil konfirmasi gaji dan tunjangan lainnya dengan SKPD', '30');
INSERT INTO `skp` VALUES ('SKP00462', 'Mengevaluasi pelaksanaan pelayanan kesehatan kedokteran olahraga pada satpelkes kesor sesuai standard dan prosedur', '120');
INSERT INTO `skp` VALUES ('SKP00463', 'Mengevaluasi pelaksanaan penataan objek kerja', '15');
INSERT INTO `skp` VALUES ('SKP00464', 'Menggambar/sketsa (per lokasi)', '10');
INSERT INTO `skp` VALUES ('SKP00465', 'Menggambar/sketsa (per lokasi)', '180');
INSERT INTO `skp` VALUES ('SKP00466', 'Menggandakan bahan kerja', '60');
INSERT INTO `skp` VALUES ('SKP00467', 'Menggandakan dan memberikan cap stempel naskah dinas', '5');
INSERT INTO `skp` VALUES ('SKP00468', 'Menghadiri acara ceremonial', '120');
INSERT INTO `skp` VALUES ('SKP00469', 'Menghadiri acara ceremonial', '30');
INSERT INTO `skp` VALUES ('SKP00470', 'Menghadiri dan menjawab pertanyaan disidang ajudikasi di komisi Informasi', '240');
INSERT INTO `skp` VALUES ('SKP00471', 'Menghadiri/mendampingi di persidangan', '120');
INSERT INTO `skp` VALUES ('SKP00472', 'Menghadiri sidang di pengadilan', '260');
INSERT INTO `skp` VALUES ('SKP00473', 'Menghadirkan saksi-saksi dan bukti-bukti untuk persidangan di pengadilan', '300');
INSERT INTO `skp` VALUES ('SKP00474', 'Menghimpun, mencocokkan dan meneliti tagihan penyediaan jasa TALI dan IPAL', '60');
INSERT INTO `skp` VALUES ('SKP00475', 'Menghimpun, mengolah, menyajikan dan memelihara data informasi serta dokumen kepegawaian pegawai termasuk SKP dan DUK (Daftar Urut Kepangkatan) Pegawai', '360');
INSERT INTO `skp` VALUES ('SKP00476', 'Menghitung pemakaian barang habis pakai', '90');
INSERT INTO `skp` VALUES ('SKP00477', 'Mengidentifikasi dan memverifikasi data', '90');
INSERT INTO `skp` VALUES ('SKP00478', 'Mengidentifikasi dan memverifikasi data', '45');
INSERT INTO `skp` VALUES ('SKP00479', 'Mengidentifikasi dan memverifikasi data', '30');
INSERT INTO `skp` VALUES ('SKP00480', 'Mengidentifikasi dan menganalisa kebutuhan aset bidang', '120');
INSERT INTO `skp` VALUES ('SKP00481', 'Mengidentifikasi dan menganalisa kebutuhan aset SKPD', '180');
INSERT INTO `skp` VALUES ('SKP00482', 'Mengidentifikasi kondisi barang, menyiapkan dan membuat usulan penghapusan barang', '180');
INSERT INTO `skp` VALUES ('SKP00483', 'Mengikuti bimbingan teknis', '300');
INSERT INTO `skp` VALUES ('SKP00484', 'Mengikuti bimbingan teknis penatausahaan barang milik daerah', '300');
INSERT INTO `skp` VALUES ('SKP00485', 'Mengikuti bimbingan teknis penatausahaan keuangan', '360');
INSERT INTO `skp` VALUES ('SKP00486', 'Mengikuti kegiatan kerja bakti', '90');
INSERT INTO `skp` VALUES ('SKP00487', 'Mengikuti kegiatan kerja bakti', '60');
INSERT INTO `skp` VALUES ('SKP00488', 'Mengikuti kegiatan kerja bakti', '45');
INSERT INTO `skp` VALUES ('SKP00489', 'Mengikuti kegiatan rapat kerja nasional/rembug nasional', '360');
INSERT INTO `skp` VALUES ('SKP00490', 'Mengikuti kegiatan sosialisasi tingkat nasional/provinsi/kota', '360');
INSERT INTO `skp` VALUES ('SKP00491', 'Mengikuti pelatihan input/supervisi e-musrenbang', '120');
INSERT INTO `skp` VALUES ('SKP00492', 'Mengikuti pembahasan RUU', '300');
INSERT INTO `skp` VALUES ('SKP00493', 'Mengikuti pendidikan dan pelatihan (per jam pelajaran)', '45');
INSERT INTO `skp` VALUES ('SKP00494', 'Mengikuti pendidikan dan pelatihan (per jam pelajaran)', '60');
INSERT INTO `skp` VALUES ('SKP00495', 'Mengikuti pendidikan dan pelatihan (per jam pelajaran)', '180');
INSERT INTO `skp` VALUES ('SKP00496', 'Mengikuti rapat koordinasi (Morning Report) 60', '60');
INSERT INTO `skp` VALUES ('SKP00497', 'Mengikuti rapat koordinasi', '180');
INSERT INTO `skp` VALUES ('SKP00498', 'Mengikuti rapat teknis', '120');
INSERT INTO `skp` VALUES ('SKP00499', 'Mengikuti rapat teknis', '30');
INSERT INTO `skp` VALUES ('SKP00500', 'Mengikuti rapat teknis', '180');
INSERT INTO `skp` VALUES ('SKP00501', 'Mengikuti rapim gubernur', '240');
INSERT INTO `skp` VALUES ('SKP00502', 'Mengikuti seminar/lokakarya', '75');
INSERT INTO `skp` VALUES ('SKP00503', 'Menginput arsip penggandaan ', '5');
INSERT INTO `skp` VALUES ('SKP00504', 'Menginventarisasi hasil reses DPRD', '180');
INSERT INTO `skp` VALUES ('SKP00505', 'Menginventarisasi surat usulan dari SKPD/UKPD masalah penganggaran', '15');
INSERT INTO `skp` VALUES ('SKP00506', 'Menginventarisir barang milik negara', '50');
INSERT INTO `skp` VALUES ('SKP00507', 'Menginventarisir daftar pajak terutang', '120');
INSERT INTO `skp` VALUES ('SKP00508', 'Menginventarisir data tunggakan tagihan TALI', '60');
INSERT INTO `skp` VALUES ('SKP00509', 'Menginventarisir pendapatan jasa giro', '30');
INSERT INTO `skp` VALUES ('SKP00510', 'Menginventarisir tagihan utang pada pihak ketiga', '360');
INSERT INTO `skp` VALUES ('SKP00511', 'Mengirimkan berkas data rekonsiliasi aset tetap ke inspektorat', '30');
INSERT INTO `skp` VALUES ('SKP00512', 'Mengirimkan berkas data rekonsiliasi belanja ke inspektorat', '30');
INSERT INTO `skp` VALUES ('SKP00513', 'Mengirimkan surat/dokumen', '30');
INSERT INTO `skp` VALUES ('SKP00514', 'Mengirimkan surat/dokumen', '15');
INSERT INTO `skp` VALUES ('SKP00515', 'Mengisi buku induk siswa', '30');
INSERT INTO `skp` VALUES ('SKP00516', 'Mengkaji dan menelaah bahan dan data objek kerja', '15');
INSERT INTO `skp` VALUES ('SKP00517', 'Mengkonsultasikan dan mengevaluasi proses penataan objek kerja sesuai dengan ketentuan dan prosedur yang berlaku', '30');
INSERT INTO `skp` VALUES ('SKP00518', 'Mengkonsultasikan kendala proses penataan objek kerja', '10');
INSERT INTO `skp` VALUES ('SKP00519', 'Mengkoordinasikan hasil rakorwasdanas dengan inspektorat pembantu provinsi/wilayah', '120');
INSERT INTO `skp` VALUES ('SKP00520', 'Mengkoordinir kegiatan pelatihan', '120');
INSERT INTO `skp` VALUES ('SKP00521', 'Mengkoordinir pelaksanaan tugas jaga di unit 24 jam', '20');
INSERT INTO `skp` VALUES ('SKP00522', 'Mengkoordinir pendataan peserta pelatihan per wilayah', '120');
INSERT INTO `skp` VALUES ('SKP00523', 'Mengkoordinir penyusunan standard prosedur pelayanan kesehatan olahraga dan kebugaran pegawai dan rujukan pada satpel kesor', '120');
INSERT INTO `skp` VALUES ('SKP00524', 'Mengkoreksi hasil test peserta pelatihan', '120');
INSERT INTO `skp` VALUES ('SKP00525', 'Mengolah dan menyajian data', '120');
INSERT INTO `skp` VALUES ('SKP00526', 'Mengolah data jabatan', '90');
INSERT INTO `skp` VALUES ('SKP00527', 'Mengolah data perencanaan dan anggaran', '90');
INSERT INTO `skp` VALUES ('SKP00528', 'Mengolah data sertifikasi', '10');
INSERT INTO `skp` VALUES ('SKP00529', 'Mengolah, memelihara, menyajikan dan mengembangkan data base dan informasi keuangan', '240');
INSERT INTO `skp` VALUES ('SKP00530', 'Mengontrol keamanan gedung dan lingkungan kantor pada malam hari', '60');
INSERT INTO `skp` VALUES ('SKP00531', 'Menguji kesehatan', '120');
INSERT INTO `skp` VALUES ('SKP00532', 'Mengumpulkan bahan kerja', '30');
INSERT INTO `skp` VALUES ('SKP00533', 'Mengumpulkan bahan penyusunan kamus jabatan', '60');
INSERT INTO `skp` VALUES ('SKP00534', 'Mengumpulkan BAST', '30');
INSERT INTO `skp` VALUES ('SKP00535', 'Mengumpulkan berita acara rekonsiliasi aset tetap', '30');
INSERT INTO `skp` VALUES ('SKP00536', 'Mengumpulkan berkas daftar aset tetap', '60');
INSERT INTO `skp` VALUES ('SKP00537', 'Mengumpulkan berkas data rekonsiliasi belanja', '30');
INSERT INTO `skp` VALUES ('SKP00538', 'Mengumpulkan berkas permohonan dari para PPTK yang memiliki tagihan utang pada pihak ketiga', '120');
INSERT INTO `skp` VALUES ('SKP00539', 'Mengumpulkan dan memilah data/informasi dalam rangka keterbukaan data', '60');
INSERT INTO `skp` VALUES ('SKP00540', 'Mengumpulkan dan meneliti berkas daftar persediaan', '30');
INSERT INTO `skp` VALUES ('SKP00541', 'Mengumpulkan data-data kepegawaian terkait dengan kenaikan pangkat (per pegawai)', '30');
INSERT INTO `skp` VALUES ('SKP00542', 'Mengumpulkan data-data kepegawaian terkait dengan kenaikan pangkat (per pegawai)', '90');
INSERT INTO `skp` VALUES ('SKP00543', 'Mengumpulkan laporan keuangan', '30');
INSERT INTO `skp` VALUES ('SKP00544', 'Mengumumkan hasil pengadaan langsung melalui media elektronik', '20');
INSERT INTO `skp` VALUES ('SKP00545', 'Mengurus kelengkapan kendaraan bermotor (per dokumen)', '30');
INSERT INTO `skp` VALUES ('SKP00546', 'Mengurus kelengkapan kendaraan bermotor (per dokumen)', '60');
INSERT INTO `skp` VALUES ('SKP00547', 'Menjadi anggota mitra bestari (peer review), setiap keputusan', '360');
INSERT INTO `skp` VALUES ('SKP00548', 'Menjadi anggota tim penilai jabatan fungsional pengelola pengadaan barang/jasa secara aktif, setiap DUPAK', '120');
INSERT INTO `skp` VALUES ('SKP00549', 'Menjadi moderator (1X acara)', '90');
INSERT INTO `skp` VALUES ('SKP00550', 'Menjadi moderator (1X acara)', '30');
INSERT INTO `skp` VALUES ('SKP00551', 'Menjadi narasumber', '180');
INSERT INTO `skp` VALUES ('SKP00552', 'Menjadi petugas upacara/apel', '60');
INSERT INTO `skp` VALUES ('SKP00553', 'Menjadi saksi (per 1X panggilan)', '120');
INSERT INTO `skp` VALUES ('SKP00554', 'Menyelenggarakan event kegiatan', '60');
INSERT INTO `skp` VALUES ('SKP00555', 'Menyempurnakan panduan rembug rw', '120');
INSERT INTO `skp` VALUES ('SKP00556', 'Menyetting router/switch multiplayer/radio wireless/kamera/cctv (per objek)', '15');
INSERT INTO `skp` VALUES ('SKP00557', 'Menyetujui hasil validasi teknis', '15');
INSERT INTO `skp` VALUES ('SKP00558', 'Menyiapkan alat dan sarana kelengkapan yang diperlukan', '10');
INSERT INTO `skp` VALUES ('SKP00559', 'Menyiapkan bahan laporan pusat pelayanan kesehatan pegawai yang terkait dengan tugas pengolah satuan pelaksana kesehatan kerja', '30');
INSERT INTO `skp` VALUES ('SKP00560', 'Menyiapkan bahan untuk kegiatan monitoring keuangan bulanan', '25');
INSERT INTO `skp` VALUES ('SKP00561', 'Menyiapkan bahan yang dibutuhkan oleh lembaga pemeriksa', '120');
INSERT INTO `skp` VALUES ('SKP00562', 'Menyiapkan data asuransi dibayar dimuka untuk laporan keuangan', '60');
INSERT INTO `skp` VALUES ('SKP00563', 'Menyiapkan data belanja pegawai sebagai bahan konfirmasi belanja pegawai dengan SKPD', '15');
INSERT INTO `skp` VALUES ('SKP00564', 'Menyiapkan laporan pertanggungjawaban bulanan dan melaporkannya ke bidang akuntansi', '60');
INSERT INTO `skp` VALUES ('SKP00565', 'Menyiapkan rapat/daftar hadir/snack', '30');
INSERT INTO `skp` VALUES ('SKP00566', 'Menyiapkan rapat/diklat (per 1 kegiatan)', '15');
INSERT INTO `skp` VALUES ('SKP00567', 'Menyiapkan rapat/diklat (per 1 kegiatan)', '30');
INSERT INTO `skp` VALUES ('SKP00568', 'Menyusun tabel manual anggaran per kegiatan tahun anggaran', '120');
INSERT INTO `skp` VALUES ('SKP00569', 'Menyusun agenda surat', '15');
INSERT INTO `skp` VALUES ('SKP00570', 'Menyusun agenda surat', '1');
INSERT INTO `skp` VALUES ('SKP00571', 'Menyusun analisa beban kerja', '75');
INSERT INTO `skp` VALUES ('SKP00572', 'Menyusun analisa jabatan', '120');
INSERT INTO `skp` VALUES ('SKP00573', 'Menyusun angka konsolidasi aset tetap', '360');
INSERT INTO `skp` VALUES ('SKP00574', 'Menyusun angka konsolidasi selain aset tetap', '180');
INSERT INTO `skp` VALUES ('SKP00575', 'Menyusun angka matriks mutasi aset tetap', '360');
INSERT INTO `skp` VALUES ('SKP00576', 'Menyusun daftar pajak terutang beserta fotocopy SSP', '150');
INSERT INTO `skp` VALUES ('SKP00577', 'Menyusun dan mengerjakan SPJ LS (per paket)', '60');
INSERT INTO `skp` VALUES ('SKP00578', 'Menyusun dan mengusulkan rancang bangun sistem keuangan', '300');
INSERT INTO `skp` VALUES ('SKP00579', 'Menyusun data fotocopy BKU pengeluaran', '30');
INSERT INTO `skp` VALUES ('SKP00580', 'Menyusun data fotocopy rekening koran', '30');
INSERT INTO `skp` VALUES ('SKP00581', 'Menyusun data jabatan SKPD/UKPD', '90');
INSERT INTO `skp` VALUES ('SKP00582', 'Menyusun data laporan jurnal SPJ', '30');
INSERT INTO `skp` VALUES ('SKP00583', 'Menyusun data realisasi belanja', '120');
INSERT INTO `skp` VALUES ('SKP00584', 'Menyusun data rekonsiliasi belanja', '360');
INSERT INTO `skp` VALUES ('SKP00585', 'Menyusun data setoran SP2D LS', '300');
INSERT INTO `skp` VALUES ('SKP00586', 'Menyusun data setoran SP2D UP', '300');
INSERT INTO `skp` VALUES ('SKP00587', 'Menyusun data tagihan utang pada pihak ketiga', '120');
INSERT INTO `skp` VALUES ('SKP00588', 'Menyusun data tunggakan tagihan TALI beserta fotocopy tagihan', '60');
INSERT INTO `skp` VALUES ('SKP00589', 'Menyusun dokumen KUA', '180');
INSERT INTO `skp` VALUES ('SKP00590', 'Menyusun dokumen pengadaan barang/jasa', '60');
INSERT INTO `skp` VALUES ('SKP00591', 'Menyusun dokumen PPAS', '180');
INSERT INTO `skp` VALUES ('SKP00592', 'Menyusun dokumen RKPD', '180');
INSERT INTO `skp` VALUES ('SKP00593', 'Menyusun dokumen RPJMD', '180');
INSERT INTO `skp` VALUES ('SKP00594', 'Menyusun dokumen RPJPD', '180');
INSERT INTO `skp` VALUES ('SKP00595', 'Menyusun draft CaLK', '360');
INSERT INTO `skp` VALUES ('SKP00596', 'Menyusun draft laporan prognosis untuk bidang akuntansi', '90');
INSERT INTO `skp` VALUES ('SKP00597', 'Menyusun draft LRA', '120');
INSERT INTO `skp` VALUES ('SKP00598', 'Menyusun draft Neraca', '120');
INSERT INTO `skp` VALUES ('SKP00599', 'Menyusun draft program kerja pengawasan tahunan', '120');
INSERT INTO `skp` VALUES ('SKP00600', 'Menyusun evaluasi jabatan/kelas jabatan', '120');
INSERT INTO `skp` VALUES ('SKP00601', 'Menyusun formasi jabatan fungsional umum', '120');
INSERT INTO `skp` VALUES ('SKP00602', 'Menyusun formasi jabatan/SKPD JFT', '120');
INSERT INTO `skp` VALUES ('SKP00603', 'Menyusun indikator perjanjian kinerja SKPD/UKPD', '180');
INSERT INTO `skp` VALUES ('SKP00604', 'Menyusun jadwal anggaran per kegiatan dalam aplikasi sistem e-planning', '120');
INSERT INTO `skp` VALUES ('SKP00605', 'Menyusun kamus jabatan', '120');
INSERT INTO `skp` VALUES ('SKP00606', 'Menyusun kebutuhan formasi PNS', '85');
INSERT INTO `skp` VALUES ('SKP00607', 'Menyusun konsep penyiapan objek kerja', '30');
INSERT INTO `skp` VALUES ('SKP00608', 'Menyusun konsep rincian anggaran bagian', '90');
INSERT INTO `skp` VALUES ('SKP00609', 'Menyusun kronologis penyusunan dokumen perencanaan', '60');
INSERT INTO `skp` VALUES ('SKP00610', 'Menyusun kurikulum/buku/diktat/modul berkaitan dengan pelatihan pengadaan barang/jasa', '120');
INSERT INTO `skp` VALUES ('SKP00611', 'Menyusun laporan jurnal SP2D', '30');
INSERT INTO `skp` VALUES ('SKP00612', 'Menyusun laporan pendapatan jasa giro', '30');
INSERT INTO `skp` VALUES ('SKP00613', 'Menyusun laporan pertanggungjawaban keuangan (bendahara pengeluaran)', '30');
INSERT INTO `skp` VALUES ('SKP00614', 'Menyusun laporan realisasi anggaran', '30');
INSERT INTO `skp` VALUES ('SKP00615', 'Menyusun LKPJ (Laporan Kinerja Pertanggungjawaban Gubernur)', '300');
INSERT INTO `skp` VALUES ('SKP00616', 'Menyusun map pegawai', '60');
INSERT INTO `skp` VALUES ('SKP00617', 'Menyusun/membuat peta jabatan', '90');
INSERT INTO `skp` VALUES ('SKP00618', 'Menyusun/menyiapkan bahan paparan pimpinan', '60');
INSERT INTO `skp` VALUES ('SKP00619', 'Menyusun modul siklus pengelolaan keuangan', '300');
INSERT INTO `skp` VALUES ('SKP00620', 'Menyusun nota keuangan', '180');
INSERT INTO `skp` VALUES ('SKP00621', 'Menyusun perencanaan anggaran (per kegiatan)', '240');
INSERT INTO `skp` VALUES ('SKP00622', 'Menyusun perencanaan kebutuhan pegawai', '60');
INSERT INTO `skp` VALUES ('SKP00623', 'Menyusun rancangan APBD', '180');
INSERT INTO `skp` VALUES ('SKP00624', 'Menyusun rekapitulasi pajak', '60');
INSERT INTO `skp` VALUES ('SKP00625', 'Menyusun rencana kegiatan/anggaran bagian', '120');
INSERT INTO `skp` VALUES ('SKP00626', 'Menyusun rincian usulan formasi kebutuhan pegawai', '300');
INSERT INTO `skp` VALUES ('SKP00627', 'Menyusun ringkasan surat masuk gubernur (resume)', '15');
INSERT INTO `skp` VALUES ('SKP00628', 'Menyusun RKA dan DPA', '120');
INSERT INTO `skp` VALUES ('SKP00629', 'Menyusun Sasaran kerja pegawai (SKP) SKPD/UKPD', '60');
INSERT INTO `skp` VALUES ('SKP00630', 'Menyusun standar dan prosedur pelayanan kesehatan pegawai, pimpinan dan anggota DPRD', '60');
INSERT INTO `skp` VALUES ('SKP00631', 'Menyusun usulan kegiatan tahun jamak', '180');
INSERT INTO `skp` VALUES ('SKP00632', 'Menyusun usulan rencana kerja', '60');
INSERT INTO `skp` VALUES ('SKP00633', 'Merawat bayi satwa', '60');
INSERT INTO `skp` VALUES ('SKP00634', 'Merencanakan penyelenggaraan pelayanan radiologi', '30');
INSERT INTO `skp` VALUES ('SKP00635', 'Merevisi Rencana kerja dan anggaran per kegiatan', '120');
INSERT INTO `skp` VALUES ('SKP00636', 'Merevisi usulan Rencana kerja dan anggaran sesuai hasil koordinasi', '90');
INSERT INTO `skp` VALUES ('SKP00637', 'Monitoring kehadiran pegawai', '30');
INSERT INTO `skp` VALUES ('SKP00638', 'Monitoring kehadiran pegawai pada upacara hari besar nasional', '60');
INSERT INTO `skp` VALUES ('SKP00639', 'Monitoring pelaksanaan DPA', '60');
INSERT INTO `skp` VALUES ('SKP00640', 'Monitoring pelaksanaan kegiatan pelayanan kesehatan olahraga dan kebugaran pegawai di ruang kebugaran', '60');
INSERT INTO `skp` VALUES ('SKP00641', 'Monitoring penerimaan kas ke Bank DKI', '30');
INSERT INTO `skp` VALUES ('SKP00642', 'Narator pertunjukkan teater bintang', '60');
INSERT INTO `skp` VALUES ('SKP00643', 'Pelaksanaan kegiatan intelijen dan surveillance', '300');
INSERT INTO `skp` VALUES ('SKP00644', 'Pelaksanaan pengadaan barang/jasa secara swakelola', '60');
INSERT INTO `skp` VALUES ('SKP00645', 'Pelaksanaan penugasan/pengawasan/pemeriksaan pelaksanaan program pencegahan dan pemberantasan tindak pidana korupsi diantaranya unit pengendalian gratifikasi', '300');
INSERT INTO `skp` VALUES ('SKP00646', 'Pelaporan hasil pengawasan terhadap penyelenggaraan urusan pemerintahan dan aparatur', '300');
INSERT INTO `skp` VALUES ('SKP00647', 'Pemantauan unjuk rasa', '180');
INSERT INTO `skp` VALUES ('SKP00648', 'Pemasangan nomor peserta ujian nasional', '30');
INSERT INTO `skp` VALUES ('SKP00649', 'Pembahasan konsep naskah akademis', '120');
INSERT INTO `skp` VALUES ('SKP00650', 'Pembahasan RAPBD dengan DPRD', '300');
INSERT INTO `skp` VALUES ('SKP00651', 'Pemberian keterangan ahli/pendampingan/saran rekomendasi/tindakan koreksi', '360');
INSERT INTO `skp` VALUES ('SKP00652', 'Pemberian sertifikat peserta pelatihan', '15');
INSERT INTO `skp` VALUES ('SKP00653', 'Pembuatan album foto peserta ujian nasional', '60');
INSERT INTO `skp` VALUES ('SKP00654', 'Pembuatan karya tulis/karya ilmiah di bidang pengadaan barang/jasa dalam bentuk buku yang dipublikasikan internasional', '360');
INSERT INTO `skp` VALUES ('SKP00655', 'Pembuatan karya tulis/karya ilmiah di bidang pengadaan barang/jasa dalam bentuk buku yang dipublikasikan nasional', '360');
INSERT INTO `skp` VALUES ('SKP00656', 'Pembuatan karya tulis/karya ilmiah di bidang pengadaan barang/jasa dalam bentuk makalah di majalah dan media massa nasional yang di akui instansi pembina (jurna', '360');
INSERT INTO `skp` VALUES ('SKP00657', 'Pembuatan karya tulis/karya ilmiah di bidang pengadaan barang/jasa dalam bentuk makalah di majalah ilmiah internasional', '360');
INSERT INTO `skp` VALUES ('SKP00658', 'Pembuatan karya tulis/karya ilmiah di bidang pengadaan barang/jasa dalam bentuk makalah yang dipresentasikan pada pertemuan ilmiah yang tidak dipublikasikan', '360');
INSERT INTO `skp` VALUES ('SKP00659', 'Pembuatan laporan pelaksanaan pengadaan barang/jasa', '120');
INSERT INTO `skp` VALUES ('SKP00660', 'Pembuatan pengumuman pelaksanaan pengadaan', '15');
INSERT INTO `skp` VALUES ('SKP00661', 'Pembuatan perubahan dokumen kontrak pengadaan barang/jasa', '120');
INSERT INTO `skp` VALUES ('SKP00662', 'Pembuatan rancangan kontrak pengadaan barang/jasa', '60');
INSERT INTO `skp` VALUES ('SKP00663', 'Pemeriksaan dokumen spesifikasi barang', '60');
INSERT INTO `skp` VALUES ('SKP00664', 'Pemeriksaan dokumen spesifikasi jasa konsultasi', '180');
INSERT INTO `skp` VALUES ('SKP00665', 'Pemeriksaan dokumen spesifikasi jasa lainnya', '60');
INSERT INTO `skp` VALUES ('SKP00666', 'Pemeriksaan dokumen spesifikasi konstruksi', '300');
INSERT INTO `skp` VALUES ('SKP00667', 'Pemutakhiran data aset tetap SKPD/UKPD tahun 2015 dalam kertas kerja', '360');
INSERT INTO `skp` VALUES ('SKP00668', 'Pemutusan pelaksanaan kontrak pengadaan barang/jasa', '120');
INSERT INTO `skp` VALUES ('SKP00669', 'Penanganan kegagalan teknis pelaksanaan kontrak pengadaan barang/jasa', '150');
INSERT INTO `skp` VALUES ('SKP00670', 'Pencacahan aset barang milik daerah', '10');
INSERT INTO `skp` VALUES ('SKP00671', 'Pencacahan aset barang tidak bergerak milik daerah (gedung dan bangunan)', '120');
INSERT INTO `skp` VALUES ('SKP00672', 'Pencacahan aset barang tidak bergerak milik daerah (tanah)', '10');
INSERT INTO `skp` VALUES ('SKP00673', 'Pencairan SPM ke Kantor Kas Daerah', '60');
INSERT INTO `skp` VALUES ('SKP00674', 'Pencegahan penyakit joonosis', '120');
INSERT INTO `skp` VALUES ('SKP00675', 'Pencetakan barcode aset tetap SKPD/UKPD', '5');
INSERT INTO `skp` VALUES ('SKP00676', 'Pendampingan Pencacahan aset barang milik daerah', '10');
INSERT INTO `skp` VALUES ('SKP00677', 'Pendampingan Pencacahan aset barang tidak bergerak milik daerah (gedung dan bangunan)', '120');
INSERT INTO `skp` VALUES ('SKP00678', 'Pendampingan Pencacahan aset barang tidak bergerak milik daerah (tanah)', '150');
INSERT INTO `skp` VALUES ('SKP00679', 'Penelitian berkas permohonan perijinan (teknis)', '30');
INSERT INTO `skp` VALUES ('SKP00680', 'Penempelan barcode aset tetap SKPD/UKPD', '5');
INSERT INTO `skp` VALUES ('SKP00681', 'Penerimaan hasil pengadaan barang/jasa', '150');
INSERT INTO `skp` VALUES ('SKP00682', 'Penerjemahan/penyaduran buku dan bahan lain di bidang pengadaan barang/jasa', '360');
INSERT INTO `skp` VALUES ('SKP00683', 'Penetapan dan pengumuman pemenang pemilihan penyedia barang/jasa', '120');
INSERT INTO `skp` VALUES ('SKP00684', 'Penetapan strategi pengadaan barang/jasa', '240');
INSERT INTO `skp` VALUES ('SKP00685', 'Pengadaan barang dengan sistem e-purchasing', '75');
INSERT INTO `skp` VALUES ('SKP00686', 'Pengadaan barang/jasa dengan sistem e-procurement', '165');
INSERT INTO `skp` VALUES ('SKP00687', 'Pengarahan dan pembagian SK PTT', '180');
INSERT INTO `skp` VALUES ('SKP00688', 'Pengarahan/penugasan pimpinan', '60');
INSERT INTO `skp` VALUES ('SKP00689', 'Pengarsipan surat pertanggungjawaban', '5');
INSERT INTO `skp` VALUES ('SKP00690', 'Pengawasan dan evaluasi pelaksanaan pengadaan barang/jasa swakelola', '120');
INSERT INTO `skp` VALUES ('SKP00691', 'Pengawasan/pelaksanaan kegiatan teknis pengawasan/melaksanakan tugas-tugas pengawasan dengan kompleksitas tinggi dalam audit khusus/investigasi/berindikasi tind', '300');
INSERT INTO `skp` VALUES ('SKP00692', 'Pengawasan/pelaksanaan kegiatan teknis pengawasan/melaksanakan tugas-tugas pengawasan dengan kompleksitas tinggi dalam audit kinerja', '300');
INSERT INTO `skp` VALUES ('SKP00693', 'Pengawasan/pelaksanaan kegiatan teknis pengawasan/melaksanakan tugas-tugas pengawasan dengan kompleksitas tinggi dalam kegiatan pemantauan', '300');
INSERT INTO `skp` VALUES ('SKP00694', 'Pengawasan/pelaksanaan kegiatan teknis pengawasan/melaksanakan tugas-tugas pengawasan dengan kompleksitas tinggi dalam pengawasan lain', '300');
INSERT INTO `skp` VALUES ('SKP00695', 'Pengawasan/pelaksanaan kegiatan teknis pengawasan/melaksanakan tugas-tugas pengawasan dengan kompleksitas tinggi dalam kegiatan reviu', '300');
INSERT INTO `skp` VALUES ('SKP00696', 'Pengawasan/pelaksanaan kegiatan teknis pengawasan/mendampingi/memberikan keterangan ahli dalam proses penyidikan dan/atau peradilan kasus hasil pengawasan per p', '300');
INSERT INTO `skp` VALUES ('SKP00697', 'Pengecatan kantin/tembok', '120');
INSERT INTO `skp` VALUES ('SKP00698', 'Pengelolaan data dan informasi pengadaan barang/jasa untuk tahap manajemen informasi aset', '180');
INSERT INTO `skp` VALUES ('SKP00699', 'Pengelolaan data dan informasi pengadaan barang/jasa untuk tahap perencanaan', '360');
INSERT INTO `skp` VALUES ('SKP00700', 'Pengelolaan data dan informasi pengadaan barang/jasa untuk tahap manajemen kontrak', '360');
INSERT INTO `skp` VALUES ('SKP00701', 'Pengelolaan data dan informasi pengadaan barang/jasa untuk tahap pemilihan penyedia', '360');
INSERT INTO `skp` VALUES ('SKP00702', 'Pengelolaan jaminan kontrak pengadaan barang/jasa', '105');
INSERT INTO `skp` VALUES ('SKP00703', 'Pengelolaan/penataan dokumen pengadaan barang/jasa untuk tahap manajemen informasi aset', '180');
INSERT INTO `skp` VALUES ('SKP00704', 'Pengelolaan/penataan dokumen pengadaan barang/jasa untuk tahap perencanaan', '360');
INSERT INTO `skp` VALUES ('SKP00705', 'Pengelolaan/penataan dokumen pengadaan barang/jasa untuk tahap manajemen kontrak', '360');
INSERT INTO `skp` VALUES ('SKP00706', 'Pengelolaan/penataan dokumen pengadaan barang/jasa untuk tahap pemilihan penyedia', '360');
INSERT INTO `skp` VALUES ('SKP00707', 'Pengelolaan program manajemen mutu pengadaan barang/jasa', '240');
INSERT INTO `skp` VALUES ('SKP00708', 'Pengelolaan program manajemen resiko pengadaan barang/jasa', '330');
INSERT INTO `skp` VALUES ('SKP00709', 'Pengelolaan sanggahan peserta pemilihan pengadaan barang/jasa', '30');
INSERT INTO `skp` VALUES ('SKP00710', 'Pengendalian dan pengawasan pelaksanaan kontrak pengadaan barang/jasa', '60');
INSERT INTO `skp` VALUES ('SKP00711', 'Pengendalian keuangan pelaksanaan pekerjaan pengadaan barang/jasa', '240');
INSERT INTO `skp` VALUES ('SKP00712', 'Pengetikan laporan kegiatan', '30');
INSERT INTO `skp` VALUES ('SKP00713', 'Penggalangan dalam rangka mendukung kebijakan Pemerintah Provinsi DKI Jakarta', '180');
INSERT INTO `skp` VALUES ('SKP00714', 'Penggandaan berkas/dokumen', '10');
INSERT INTO `skp` VALUES ('SKP00715', 'Penggandaan soal', '120');
INSERT INTO `skp` VALUES ('SKP00716', 'Penginputan data aset tetap kedalam sistem informasi aset daerah', '10');
INSERT INTO `skp` VALUES ('SKP00717', 'Pengiriman perbal naskah dinas', '15');
INSERT INTO `skp` VALUES ('SKP00718', 'Pengumuman rencana umum pengadaan barang/jasa', '30');
INSERT INTO `skp` VALUES ('SKP00719', 'Pengurusan hak, kesejahteraan, penghargaan dan cuti pegawai', '60');
INSERT INTO `skp` VALUES ('SKP00720', 'Penilaian prestasi pelaksanaan pekerjaan pengadaan barang/jasa', '120');
INSERT INTO `skp` VALUES ('SKP00721', 'Penjelasan dokumen pengadaan barang/jasa', '120');
INSERT INTO `skp` VALUES ('SKP00722', 'Penomoran naskah dinas', '5');
INSERT INTO `skp` VALUES ('SKP00723', 'Penunjang/menjadi anggota tim penilai angka kredit auditor secara aktif, setiap DUPAK', '120');
INSERT INTO `skp` VALUES ('SKP00724', 'Penunjang/peran serta dalam seminar/lokakarya di bidang pengawasan/mengikuti seminar/lokakarya dan berperan sebagai moderator', '120');
INSERT INTO `skp` VALUES ('SKP00725', 'Penunjang/peran serta dalam seminar/lokakarya di bidang pengawasan/mengikuti seminar/lokakarya dan berperan sebagai pemrasaran', '120');
INSERT INTO `skp` VALUES ('SKP00726', 'Penunjukkan penyedia barang/jasa', '15');
INSERT INTO `skp` VALUES ('SKP00727', 'Penyampaian informasi aset hasil pengadaan barang/jasa kegiatan', '120');
INSERT INTO `skp` VALUES ('SKP00728', 'Penyelesaian dokumen pertanggungjawaban belanja (SPJ)', '60');
INSERT INTO `skp` VALUES ('SKP00729', 'Penyelesaian perbedaan/perselisihan pelaksanaan kontrak pengadaan barang/jasa', '180');
INSERT INTO `skp` VALUES ('SKP00730', 'Penyiapan bahan program kerja pengawasan tahunan terhadap penyelenggaraan urusan pemerintah dan aparatur', '300');
INSERT INTO `skp` VALUES ('SKP00731', 'Penyusunan berita acara hasil evaluasi penatausahaan barang milik daerah (BMD)', '60');
INSERT INTO `skp` VALUES ('SKP00732', 'Penyusunan dokumen pengadaan barang/jasa', '195');
INSERT INTO `skp` VALUES ('SKP00733', 'Penyusunan dokumen rencana kebutuhan barang/jasa', '240');
INSERT INTO `skp` VALUES ('SKP00734', 'Penyusunan dokumen rencana umum pengadaan barang/jasa', '150');
INSERT INTO `skp` VALUES ('SKP00735', 'Penyusunan harga perkiraan sendiri (HPS) barang/jasa', '45');
INSERT INTO `skp` VALUES ('SKP00736', 'Penyusunan organisasi pelaksanaan pengadaan barang/jasa', '120');
INSERT INTO `skp` VALUES ('SKP00737', 'Penyusunan petunjuk pelaksanaan, petunjuk teknis pengelolaan pengadaan barang/jasa', '360');
INSERT INTO `skp` VALUES ('SKP00738', 'Penyusunan RAB pengadaan barang', '120');
INSERT INTO `skp` VALUES ('SKP00739', 'Penyusunan RAB pengadaan jasa konsultasi', '120');
INSERT INTO `skp` VALUES ('SKP00740', 'Penyusunan RAB pengadaan jasa lainnya', '120');
INSERT INTO `skp` VALUES ('SKP00741', 'Penyusunan RAB pengadaan konstruksi', '360');
INSERT INTO `skp` VALUES ('SKP00742', 'Penyusunan rencana pelaksanaan pengadaan barang/jasa melalui penyedia barang/jasa', '120');
INSERT INTO `skp` VALUES ('SKP00743', 'Penyusunan rencana pelaksanaan pengadaan barang/jasa secara swakelola', '360');
INSERT INTO `skp` VALUES ('SKP00744', 'Penyusunan rencana pemaketan pengadaan barang/jasa', '120');
INSERT INTO `skp` VALUES ('SKP00745', 'Penyusunan rencana pemilihan pengadaan barang/jasa', '105');
INSERT INTO `skp` VALUES ('SKP00746', 'Peran serta dalam seminar/lokakarya/konferensi di bidang pengadaan barang/jasa (menjadi moderator/pembahas/narasumber)', '360');
INSERT INTO `skp` VALUES ('SKP00747', 'Peran serta dalam seminar/lokakarya/konferensi di bidang pengadaan barang/jasa (menjadi pemrasaran)', '360');
INSERT INTO `skp` VALUES ('SKP00748', 'Peran serta dalam seminar/lokakarya/konferensi di bidang pengadaan barang/jasa (menjadi peserta)', '360');
INSERT INTO `skp` VALUES ('SKP00749', 'Persiapan pelaksanaan kontrak pengadaan barang/jasa', '360');
INSERT INTO `skp` VALUES ('SKP00750', 'Perubahan KUA-PPAS bersama DPRD', '300');
INSERT INTO `skp` VALUES ('SKP00751', 'Piket perbal naskah dinas', '60');
INSERT INTO `skp` VALUES ('SKP00752', 'Rapat koordinasi', '180');
INSERT INTO `skp` VALUES ('SKP00753', 'Rekonsiliasi laporan keuangan', '120');
INSERT INTO `skp` VALUES ('SKP00754', 'Review laporan keuangan', '360');
INSERT INTO `skp` VALUES ('SKP00755', 'Senam kebugaran karyawan', '90');
INSERT INTO `skp` VALUES ('SKP00756', 'Setor sisa uang kegiatan', '60');
INSERT INTO `skp` VALUES ('SKP00757', 'Supervisi penatausahaan keuangan pada suku dinas, UPT dan puskesmas', '300');
INSERT INTO `skp` VALUES ('SKP00758', 'Upacara bendera', '45');
INSERT INTO `skp` VALUES ('SKP00759', 'Updating data PTT/PPPK', '25');
INSERT INTO `skp` VALUES ('SKP00760', 'Upload data aset tetap SKPD/UKPD kedalam sistem informasi aset daerah', '90');
INSERT INTO `skp` VALUES ('SKP00761', 'Validasi perbal naskah dinas', '30');
INSERT INTO `skp` VALUES ('SKP00762', 'Verifikasi berkas perijinan dan non perijinan serta kelengkapannya', '10');
INSERT INTO `skp` VALUES ('SKP00763', 'Verifikasi buku kas umum (BKU) dan buku pembantu lainnya', '60');
INSERT INTO `skp` VALUES ('SKP00764', 'Verifikasi daftar gaji dan daftar TKD', '60');
INSERT INTO `skp` VALUES ('SKP00765', 'Verifikasi data SIM PTK online', '10');
INSERT INTO `skp` VALUES ('SKP00766', 'Verifikasi dokumen kontrak pengadaan barang/jasa', '180');
INSERT INTO `skp` VALUES ('SKP00767', 'Verifikasi peserta tunjangan profesi guru', '15');
INSERT INTO `skp` VALUES ('SKP00768', 'Verifikasi SPJ', '30');
INSERT INTO `skp` VALUES ('SKP00769', 'Verifikasi surat/dokumen/data dan kelengkapannya (per 1 berkas)', '15');
INSERT INTO `skp` VALUES ('SKP00770', 'Verifikasi surat/dokumen/data dan kelengkapannya (per 1 berkas)', '20');
INSERT INTO `skp` VALUES ('SKP00771', 'Verifikasi Surat Perintah Pembayaran (SPP)', '20');
INSERT INTO `skp` VALUES ('SKP00772', 'Verifikasi/validasi kegiatan', '30');
INSERT INTO `skp` VALUES ('SKP00773', 'Menerbitkan Surat Eligibilitas Peserta', '7');
INSERT INTO `skp` VALUES ('SKP00774', 'Melaksanakan Pengolahan Dokumen Rekam Medis', '30');
INSERT INTO `skp` VALUES ('SKP00775', 'Mengecek Kelengkapan Berkas Klaim BPJS', '5');
INSERT INTO `skp` VALUES ('SKP00776', 'Membuat Perincian Harga Pasien JKN', '5');
INSERT INTO `skp` VALUES ('SKP00777', 'Merekap Data Diri, Diagnosa dan Tujuan Rujukan Pasien JKN (Per orang)', '3');
INSERT INTO `skp` VALUES ('SKP00778', 'Melakukan Pengklaiman (Tagihan yang telah di verifikasi) Kepada BPJS', '120');
INSERT INTO `skp` VALUES ('SKP00779', 'Mengirimkan Berkas Klaim (yang akan di verifikasi) ke Kantor BPJS', '120');
INSERT INTO `skp` VALUES ('SKP00780', 'Memberikan Penjelasan Pelayanan JKN di Loket', '15');
INSERT INTO `skp` VALUES ('SKP00781', 'Menginput INACBG (Input Harga dan Diagnosa per orang)', '7');
INSERT INTO `skp` VALUES ('SKP00782', 'Update Tgl Pulang Pasien Ranap Surat Eligibilitas Peserta (per orang)', '5');
INSERT INTO `skp` VALUES ('SKP00783', 'Pencabutan Gigi dengan Penyulit', '60');
INSERT INTO `skp` VALUES ('SKP00784', 'Splinting Gigi Goyang', '45');
INSERT INTO `skp` VALUES ('SKP00785', 'Odontectomy M3 klas IA (ringan)', '90');
INSERT INTO `skp` VALUES ('SKP00786', 'Menganamnesis pasien', '5');
INSERT INTO `skp` VALUES ('SKP00787', 'Melakukan pemeriksaan fisik', '5');
INSERT INTO `skp` VALUES ('SKP00788', 'Melakukan konseling, informasi dan edukasi kepada pasien dan keluarga pasien', '5');
INSERT INTO `skp` VALUES ('SKP00789', 'Menyiapkan alat dan sarana yang diperlukan', '10');
INSERT INTO `skp` VALUES ('SKP00790', 'Memberikan pengantar pemeriksaan penunjang', '5');
INSERT INTO `skp` VALUES ('SKP00791', 'Mengintepretasikan pemeriksaan penunjang', '10');
INSERT INTO `skp` VALUES ('SKP00792', 'Melakukan tindakan medis', '30');
INSERT INTO `skp` VALUES ('SKP00793', 'Memberikan terapi dan menulis resep ', '10');
INSERT INTO `skp` VALUES ('SKP00794', 'Melakukan konsultasi medik kepada spesialis', '30');
INSERT INTO `skp` VALUES ('SKP00795', 'Menulis pencatatan dan resume rekamedis pasien', '30');
INSERT INTO `skp` VALUES ('SKP00796', 'Melakukan operan', '15');
INSERT INTO `skp` VALUES ('SKP00797', 'Mendampingi dokter spesialis visite', '60');
INSERT INTO `skp` VALUES ('SKP00798', 'Membuat jadwal kerja PNS (membuat jadwal kegiatan)', '60');
INSERT INTO `skp` VALUES ('SKP00799', 'Melaksanakan Rekrutment Pegawai/ mengawasi ujian', '120');
INSERT INTO `skp` VALUES ('SKP00800', 'Melakukan Pemantauan Pembuangan Sampah', '60');
INSERT INTO `skp` VALUES ('SKP00801', 'Mengawasi Kinerja Cleaning Service', '120');
INSERT INTO `skp` VALUES ('SKP00802', 'Melakukan pemantauan Instalansi Pembuangan Air Limbah ( IPAL )', '90');
INSERT INTO `skp` VALUES ('SKP00803', 'Melakukan Penataan Lingkungan RSUK Kemayoran', '120');
INSERT INTO `skp` VALUES ('SKP00804', 'Melakukan psn ( pemberantasan sarang nyamuk )', '120');
INSERT INTO `skp` VALUES ('SKP00805', 'Melakukan Supervisi dan pengawasan terhadap pihak ketiga', '120');
INSERT INTO `skp` VALUES ('SKP00806', 'Melakukan pemeriksaan ke BPLHD/Laboratorium', '120');
INSERT INTO `skp` VALUES ('SKP00807', 'Memantau/sosialisasi potensi bahaya kerja', '60');
INSERT INTO `skp` VALUES ('SKP00808', 'Menilai Kinerja Bulanan Staff Pelaksana (per orang)', '60');
INSERT INTO `skp` VALUES ('SKP00809', 'Quality Control Harian', '60');
INSERT INTO `skp` VALUES ('SKP00810', 'Mengambil spesimen/ sampel dengan tindakan sederhana', '5');
INSERT INTO `skp` VALUES ('SKP00811', 'Melakukan pengolahan spesimen/sampel dengan tindakan sederhana', '20');
INSERT INTO `skp` VALUES ('SKP00812', 'Melakukan pemeriksaan sederhana (Rapid Test dan stik)', '5');
INSERT INTO `skp` VALUES ('SKP00813', 'Melakukan pemeriksaan dengan alat penghitung sel automatic', '5');
INSERT INTO `skp` VALUES ('SKP00814', 'Melakukan pemeriksaan dengan alat penghitung fotometri', '15');
INSERT INTO `skp` VALUES ('SKP00815', 'Melakukan pemeriksaan sediaan khusus secara mikroskopik (BTA)', '30');
INSERT INTO `skp` VALUES ('SKP00816', 'Melakukan Pemeriksaan Sediaan Secara Mikroskopik dan Makroskopik (Urine, Feses)', '10');
INSERT INTO `skp` VALUES ('SKP00817', 'Validasi Hasil Pemeriksaan', '5');
INSERT INTO `skp` VALUES ('SKP00818', 'Membuat Administrasi pengadaan bahan Laboratorium', '15');
INSERT INTO `skp` VALUES ('SKP00819', 'Follow Up ke penyedia bahan lab', '10');
INSERT INTO `skp` VALUES ('SKP00820', 'Mengantarkan Status Ke Poli dan IGD', '2');
INSERT INTO `skp` VALUES ('SKP00821', 'Penerimaan dan Pendaftaran Pasien Rawat Inap', '25');
INSERT INTO `skp` VALUES ('SKP00822', 'Input Data Pasien untuk database SIMRS', '5');
INSERT INTO `skp` VALUES ('SKP00823', 'Input Dashboard Bed Pasien untuk JSC', '15');
INSERT INTO `skp` VALUES ('SKP00824', 'Mengisi Ulang Oksigen', '120');
INSERT INTO `skp` VALUES ('SKP00825', 'Mengantar Karyawan/Dirut', '180');
INSERT INTO `skp` VALUES ('SKP00826', 'Melaksanakan tindakan keperawatan dasar ', '60');
INSERT INTO `skp` VALUES ('SKP00827', 'Melaksanakan tindakan keperawatan lanjutan', '30');
INSERT INTO `skp` VALUES ('SKP00828', 'Melakukan operan jaga setiap pergantian shift', '15');
INSERT INTO `skp` VALUES ('SKP00829', 'Kolaborasi dengan medis dan tenaga kesehatan lainnya', '20');
INSERT INTO `skp` VALUES ('SKP00830', 'Mempersiapkan proses pemulangan / Discharge planning pasien', '15');
INSERT INTO `skp` VALUES ('SKP00831', 'Pencatatan dalam buku register data rekam medis pasien pulang ', '30');
INSERT INTO `skp` VALUES ('SKP00832', 'Asembling rekam medis pulang', '30');
INSERT INTO `skp` VALUES ('SKP00833', 'Cek list kelengkapan klaim BPJS', '30');
INSERT INTO `skp` VALUES ('SKP00834', 'Rapat Koordinasi', '60');
INSERT INTO `skp` VALUES ('SKP00835', 'Melakukan pengkodean aplikasi dan database', '360');
INSERT INTO `skp` VALUES ('SKP00836', 'Pembuatan Draft SK (Surat Keputusan)', '90');
INSERT INTO `skp` VALUES ('SKP00837', 'Pembuatan Laporan Survei Kepuasan Pasien ', '180');
INSERT INTO `skp` VALUES ('SKP00838', 'Penyusunan Dokumen Klaim Asuransi  Pihak ke 3', '180');
INSERT INTO `skp` VALUES ('SKP00839', 'Penyusunan Pedoman/ Panduan', '180');
INSERT INTO `skp` VALUES ('SKP00840', 'Pembuatan draft teks sambutan/pidato', '90');
INSERT INTO `skp` VALUES ('SKP00841', 'Observasi kepuasan pelanggan', '60');

-- ----------------------------
-- Table structure for `skpd`
-- ----------------------------
DROP TABLE IF EXISTS `skpd`;
CREATE TABLE `skpd` (
  `id_skpd` varchar(8) NOT NULL,
  `n_skpd` varchar(50) NOT NULL,
  PRIMARY KEY (`id_skpd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of skpd
-- ----------------------------

-- ----------------------------
-- Table structure for `skptahunan`
-- ----------------------------
DROP TABLE IF EXISTS `skptahunan`;
CREATE TABLE `skptahunan` (
  `id_skptahunan` varchar(8) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `kd_skp` varchar(160) NOT NULL,
  `id_bag` varchar(25) NOT NULL,
  `kuant` varchar(5) NOT NULL,
  `kual` varchar(5) NOT NULL,
  `waktu` varchar(8) NOT NULL,
  `t_buat` varchar(8) NOT NULL,
  `t_edit` varchar(8) NOT NULL,
  `waktu_e` int(8) NOT NULL,
  PRIMARY KEY (`id_skptahunan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of skptahunan
-- ----------------------------

-- ----------------------------
-- Table structure for `status`
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id_status` varchar(8) NOT NULL,
  `n_status` varchar(25) NOT NULL,
  `nilai` varchar(8) NOT NULL,
  `ptkp` int(15) NOT NULL,
  `id_skpd` varchar(10) NOT NULL,
  `id_ukpd` varchar(10) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of status
-- ----------------------------

-- ----------------------------
-- Table structure for `ukpd`
-- ----------------------------
DROP TABLE IF EXISTS `ukpd`;
CREATE TABLE `ukpd` (
  `id_ukpd` varchar(8) NOT NULL,
  `n_ukpd` varchar(30) NOT NULL,
  PRIMARY KEY (`id_ukpd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ukpd
-- ----------------------------

-- ----------------------------
-- Table structure for `user_id`
-- ----------------------------
DROP TABLE IF EXISTS `user_id`;
CREATE TABLE `user_id` (
  `userid` varchar(50) NOT NULL,
  `passid` varchar(50) NOT NULL,
  `level_user` varchar(25) NOT NULL,
  `id_skpd` varchar(10) NOT NULL,
  `id_ukpd` varchar(10) NOT NULL,
  `id_bag` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_id
-- ----------------------------
INSERT INTO `user_id` VALUES ('admin1234', 'admin1234', '11', '', '', '', '');

-- ----------------------------
-- Table structure for `validasi`
-- ----------------------------
DROP TABLE IF EXISTS `validasi`;
CREATE TABLE `validasi` (
  `id_validasi` varchar(8) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `jabatan` int(30) NOT NULL,
  `n_skp` int(8) NOT NULL,
  `n_anggaran` int(8) NOT NULL,
  `n_prilaku` int(11) NOT NULL,
  `hasil` varchar(8) NOT NULL,
  PRIMARY KEY (`id_validasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of validasi
-- ----------------------------

-- ----------------------------
-- Table structure for `waktu_k`
-- ----------------------------
DROP TABLE IF EXISTS `waktu_k`;
CREATE TABLE `waktu_k` (
  `id_waktu_k` varchar(8) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `sakit1` int(8) NOT NULL,
  `sakit2` int(8) NOT NULL,
  `alpha` int(8) NOT NULL,
  `telat` int(8) NOT NULL,
  `c_sakit_k` int(8) NOT NULL,
  `c_alasan_k` int(8) NOT NULL,
  `c_persalinan_k` int(8) NOT NULL,
  `c_besar_k` int(8) NOT NULL,
  `izin` int(8) NOT NULL,
  `izin_s` int(8) NOT NULL,
  `meninggal` int(8) NOT NULL,
  `tanggal` date NOT NULL,
  `t_waktu_k` int(8) NOT NULL,
  PRIMARY KEY (`id_waktu_k`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of waktu_k
-- ----------------------------

-- ----------------------------
-- Table structure for `waktu_kerja`
-- ----------------------------
DROP TABLE IF EXISTS `waktu_kerja`;
CREATE TABLE `waktu_kerja` (
  `id_waktu` varchar(8) NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(8) NOT NULL,
  `id_skpd` varchar(10) NOT NULL,
  `id_ukpd` varchar(10) NOT NULL,
  PRIMARY KEY (`id_waktu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of waktu_kerja
-- ----------------------------

-- ----------------------------
-- Table structure for `waktu_s`
-- ----------------------------
DROP TABLE IF EXISTS `waktu_s`;
CREATE TABLE `waktu_s` (
  `id_waktu_s` varchar(8) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `j_hks` int(8) NOT NULL,
  `j_hkm` int(8) NOT NULL,
  `j_hlp` int(8) NOT NULL,
  `j_hls` int(8) NOT NULL,
  `j_hlm` int(8) NOT NULL,
  `j_hrp` int(8) NOT NULL,
  `j_hrs` int(8) NOT NULL,
  `j_hrm` int(8) NOT NULL,
  `j_ns` int(8) NOT NULL,
  `j_hk` int(8) NOT NULL,
  PRIMARY KEY (`id_waktu_s`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of waktu_s
-- ----------------------------

-- ----------------------------
-- Table structure for `waktu_t`
-- ----------------------------
DROP TABLE IF EXISTS `waktu_t`;
CREATE TABLE `waktu_t` (
  `id_waktu_t` varchar(8) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `c_sakit_t` int(8) NOT NULL,
  `c_alasan_t` int(8) NOT NULL,
  `c_tahunan_t` int(8) NOT NULL,
  `diklat` int(8) NOT NULL,
  `spd` int(8) NOT NULL,
  `haji` int(8) NOT NULL,
  `tanggal` date NOT NULL,
  `t_waktu_t` int(8) NOT NULL,
  PRIMARY KEY (`id_waktu_t`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of waktu_t
-- ----------------------------
