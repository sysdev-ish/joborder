/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.5.43 : Database - ish_catalog
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ish_catalog` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ish_catalog`;

/*Table structure for table `job_area` */

DROP TABLE IF EXISTS `job_area`;

CREATE TABLE `job_area` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `namaarea` varchar(50) DEFAULT NULL,
  `flag` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `job_area` */

insert  into `job_area`(`id`,`namaarea`,`flag`,`status`) values (1,'Jakarta',1,1),(2,'Surabaya',1,1),(5,'Bandung',1,1),(6,'Medan',1,1),(7,'Makasar',1,1);

/*Table structure for table `job_category` */

DROP TABLE IF EXISTS `job_category`;

CREATE TABLE `job_category` (
  `id_cat` int(10) NOT NULL AUTO_INCREMENT,
  `job_category` char(50) DEFAULT NULL,
  `job_subcategory` char(50) DEFAULT NULL,
  `flag` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `job_category` */

insert  into `job_category`(`id_cat`,`job_category`,`job_subcategory`,`flag`,`status`) values (1,'CRM','Agent',0,1),(2,'CRM','Team Leader',1,1),(5,'CRM','Supervisor',1,1),(6,'CRM','Koordinator',1,1),(7,'CRM','Manager',1,1);

/*Table structure for table `job_component` */

DROP TABLE IF EXISTS `job_component`;

CREATE TABLE `job_component` (
  `idcom` int(5) NOT NULL AUTO_INCREMENT,
  `component` char(50) DEFAULT NULL,
  `subcomponent` char(100) DEFAULT NULL,
  `upd` char(20) DEFAULT NULL,
  `lup` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcom`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `job_component` */

insert  into `job_component`(`idcom`,`component`,`subcomponent`,`upd`,`lup`) values (1,'Fixed Cost','Gaji Pokok','admin','2015-04-11 07:51:41'),(2,'Fixed Cost','Tunjangan Keahlian','admin','2015-04-11 07:51:41'),(3,'Variable','Tunjangan Makan','admin','2015-04-11 07:51:41'),(4,'Variable','Tunjangan Transport','admin','2015-04-11 07:51:41'),(5,'Variable','Tunjangan Produktifitas','admin','2015-04-11 07:51:41'),(6,'Variable','Tunjangan Prestasi','admin','2015-04-11 07:51:41'),(7,'Tunjangan','Jaminan Kecelakaan Kerja (JKK)','admin','2015-04-11 07:51:41'),(8,'Tunjangan','Jaminan Hari Tua (JHT)','admin','2015-04-11 07:51:42'),(9,'Tunjangan','Jaminan Kematian (JKM)','admin','2015-04-11 07:51:42'),(10,'Tunjangan','Jaminan Pemeliharaan Kesehatan (BPJS)','admin','2015-04-11 07:51:42'),(11,'Tunjangan','PPH21','admin','2015-04-11 07:51:42'),(12,'Tunjangan','Asuransi','admin','2015-04-11 07:51:42'),(13,'Tunjangan','Biaya lain - lain','admin','2015-04-11 07:51:42'),(14,'Lain - lain (Reimburst)','THR','admin','2015-04-11 07:51:42'),(15,'Lain - lain (Reimburst)','Tunjangan Akhir Kontrak','admin','2015-04-11 07:51:42'),(16,'Lain - lain (Reimburst)','Tunjangan Cuti','admin','2015-04-11 07:51:42'),(17,'Lain - lain (Reimburst)','Biaya ID Card','admin','2015-04-11 07:51:42'),(18,'Lain - lain (Reimburst)','Recrutment','admin','2015-04-11 07:51:42'),(19,'Lain - lain (Reimburst)','Fasilitas Kerja','admin','2015-04-11 07:51:42'),(20,'Lain - lain (Reimburst)','Saur dan Buka Puasa','admin','2015-04-11 07:51:42'),(21,'Lain - lain (Reimburst)','Seragam','admin','2015-04-11 07:51:42'),(22,'Lain - lain (Reimburst)','Training','admin','2015-04-11 07:51:42');

/*Table structure for table `job_level` */

DROP TABLE IF EXISTS `job_level`;

CREATE TABLE `job_level` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `namalevel` char(50) DEFAULT NULL,
  `flag` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `job_level` */

insert  into `job_level`(`id`,`namalevel`,`flag`,`status`) values (1,'Basic',1,1),(2,'Intermediate',1,1),(3,'Expert',1,1);

/*Table structure for table `logs_login` */

DROP TABLE IF EXISTS `logs_login`;

CREATE TABLE `logs_login` (
  `uid` char(50) NOT NULL,
  `username` char(50) NOT NULL,
  `logs_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` char(10) NOT NULL,
  PRIMARY KEY (`uid`,`username`,`description`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `logs_login` */

insert  into `logs_login`(`uid`,`username`,`logs_date`,`description`) values ('1077820652','admin','2015-09-07 21:59:31','Login'),('1255621149','admin','2015-04-28 11:45:51','Login'),('1255621149','admin','2015-04-28 12:04:41','Logout'),('1298581240','admin','2015-04-12 10:45:37','Login'),('1303081859','admin','2015-04-11 04:45:03','Login'),('1458807961','admin','2015-05-15 10:17:46','Login'),('1512768347','admin','2015-08-18 15:25:27','Login'),('1597251574','admin','2015-05-19 20:50:16','Login'),('1618862535','admin','2015-04-12 12:53:56','Login'),('1664172730','admin','2015-08-26 17:57:53','Login'),('1831273771','admin','2015-04-24 22:00:36','Login'),('1966131963','admin','2015-04-10 21:55:05','Login'),('2125666614','admin','2015-04-10 19:00:01','Login'),('2158254827','admin','2015-04-27 13:49:49','Login'),('2863597362','admin','2015-05-28 10:52:04','Login'),('4383444269','admin','2015-04-28 18:46:47','Login'),('5592842445','admin','2015-05-19 12:36:34','Login'),('6414726782','admin','2015-09-08 09:22:17','Login'),('7153850274','admin','2015-05-04 17:35:37','Login'),('8628239043','admin','2015-04-11 08:30:44','Login');

/*Table structure for table `m_approval` */

DROP TABLE IF EXISTS `m_approval`;

CREATE TABLE `m_approval` (
  `id` int(50) DEFAULT NULL,
  `userid` char(50) DEFAULT NULL,
  `approval` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `m_approval` */

/*Table structure for table `m_jabatan` */

DROP TABLE IF EXISTS `m_jabatan`;

CREATE TABLE `m_jabatan` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `jabatan` char(50) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `tggjawab` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `m_jabatan` */

insert  into `m_jabatan`(`id`,`jabatan`,`status`,`tggjawab`) values (2,'Agent',1,0),(3,'Administrasi',1,0),(4,'Team Leader',1,1),(5,'Supervisor',1,1),(6,'HR Support',1,0),(7,'Infratel',1,0),(8,'Quality Assurance',1,0),(9,'Quality Control',1,0),(10,'Direktur',0,1),(11,'General Manager',0,1),(12,'Manager',0,1),(13,'Koordinator',1,1);

/*Table structure for table `m_kontrak` */

DROP TABLE IF EXISTS `m_kontrak`;

CREATE TABLE `m_kontrak` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `jenis` char(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `m_kontrak` */

insert  into `m_kontrak`(`id`,`jenis`,`status`) values (1,'PKWT',1),(2,'Kemitraan',1),(3,'Magang',1),(4,'Part Time',1);

/*Table structure for table `m_login` */

DROP TABLE IF EXISTS `m_login`;

CREATE TABLE `m_login` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` char(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `level` char(50) DEFAULT NULL,
  `area` char(50) DEFAULT NULL,
  `layanan` char(50) DEFAULT NULL,
  `upd` char(20) DEFAULT NULL,
  `lup` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `m_login` */

insert  into `m_login`(`id`,`username`,`password`,`nama`,`level`,`area`,`layanan`,`upd`,`lup`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','Administrator','Administrator','0','1','admin','2015-04-10 18:58:40'),(2,'brahma','1cd8ef4fc35be954238d41e14b890594','Brahma Linggadityo','PM',NULL,NULL,NULL,NULL),(3,'mimbar','1cd8ef4fc35be954238d41e14b890594','Mimbar','Approval',NULL,NULL,NULL,NULL);

/*Table structure for table `m_lokasi` */

DROP TABLE IF EXISTS `m_lokasi`;

CREATE TABLE `m_lokasi` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `kota` char(50) DEFAULT NULL,
  `area` char(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `upd` char(50) DEFAULT NULL,
  `lup` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `m_lokasi` */

insert  into `m_lokasi`(`id`,`kota`,`area`,`status`,`upd`,`lup`) values (1,'Jakarta','Mampang',1,'admin','2015-11-15 10:49:13'),(2,'Jakarta','Tendean',1,'admin','2015-11-15 10:49:14');

/*Table structure for table `m_menu` */

DROP TABLE IF EXISTS `m_menu`;

CREATE TABLE `m_menu` (
  `menuid` int(10) NOT NULL AUTO_INCREMENT,
  `namamenu` varchar(250) DEFAULT NULL,
  `expanded` varchar(5) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `logs_by` char(50) DEFAULT NULL,
  `logs_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`menuid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `m_menu` */

insert  into `m_menu`(`menuid`,`namamenu`,`expanded`,`level`,`status`,`logs_by`,`logs_date`) values (1,'Job Order','false','1',1,'admin','2015-04-10 18:50:09'),(2,'Catalog','false','1',1,'admin','2015-04-10 19:02:10');

/*Table structure for table `m_submenu` */

DROP TABLE IF EXISTS `m_submenu`;

CREATE TABLE `m_submenu` (
  `submenuid` int(10) NOT NULL AUTO_INCREMENT,
  `idmenu` int(10) DEFAULT NULL,
  `href` text,
  `namasubmenu` varchar(250) DEFAULT NULL,
  `id` varchar(250) DEFAULT NULL,
  `leaf` char(6) DEFAULT NULL,
  `level` char(5) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `logs_by` char(50) DEFAULT NULL,
  `logs_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`submenuid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `m_submenu` */

insert  into `m_submenu`(`submenuid`,`idmenu`,`href`,`namasubmenu`,`id`,`leaf`,`level`,`status`,`logs_by`,`logs_date`) values (1,1,'forms/jo/','Form JO','Form JO','true','1',1,'admin','2015-04-10 19:05:44'),(2,2,'forms/catalog/','Catalog Schema','Catalog Schema','true','1',1,'admin','2015-04-10 19:16:23'),(3,2,'forms/component/','Component','Component','true','1',1,'admin',NULL);

/*Table structure for table `m_um` */

DROP TABLE IF EXISTS `m_um`;

CREATE TABLE `m_um` (
  `idum` int(5) NOT NULL AUTO_INCREMENT,
  `area` char(25) DEFAULT NULL,
  `um` int(10) DEFAULT NULL,
  `tahun` decimal(4,0) DEFAULT NULL,
  `upd` char(20) DEFAULT NULL,
  `lup` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `m_um` */

/*Table structure for table `trans_catalog` */

DROP TABLE IF EXISTS `trans_catalog`;

CREATE TABLE `trans_catalog` (
  `id_trans_cat` int(10) NOT NULL AUTO_INCREMENT,
  `area` int(10) DEFAULT NULL,
  `job_category` int(10) DEFAULT NULL,
  `job_level` int(10) DEFAULT NULL,
  `job_component` int(10) DEFAULT NULL,
  `job_value` int(20) DEFAULT NULL,
  `upd` char(20) DEFAULT NULL,
  `lup` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_trans_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `trans_catalog` */

insert  into `trans_catalog`(`id_trans_cat`,`area`,`job_category`,`job_level`,`job_component`,`job_value`,`upd`,`lup`) values (2,1,1,1,1,2400000,'admin','2015-04-29 02:00:41'),(3,1,1,1,2,500000,'admin','2015-04-29 02:00:41'),(4,1,1,1,3,0,'admin','2015-04-29 02:00:41'),(5,1,1,1,4,0,'admin','2015-04-29 02:00:41'),(6,1,1,1,5,0,'admin','2015-04-29 02:00:41'),(7,1,1,1,6,500000,'admin','2015-04-29 02:00:41'),(8,1,1,1,7,100000,'admin','2015-04-29 02:00:41'),(9,1,1,1,8,100000,'admin','2015-04-29 02:00:41'),(10,1,1,1,9,100000,'admin','2015-04-29 02:00:41'),(11,1,1,1,10,100000,'admin','2015-04-29 02:00:41'),(12,1,1,1,11,100000,'admin','2015-04-29 02:00:41'),(13,1,1,1,12,100000,'admin','2015-04-29 02:00:41'),(14,1,1,1,13,0,'admin','2015-04-29 02:00:41'),(15,1,1,1,14,100000,'admin','2015-04-29 02:00:41'),(16,1,1,1,15,100000,'admin','2015-04-29 02:00:41'),(17,1,1,1,16,0,'admin','2015-04-29 02:00:41'),(18,1,1,1,17,10000,'admin','2015-04-29 02:00:41'),(19,1,1,1,18,10000,'admin','2015-04-29 02:00:41'),(20,1,1,1,19,0,'admin','2015-04-29 02:00:41'),(21,1,1,1,20,100000,'admin','2015-04-29 02:00:41'),(22,1,1,1,21,100000,'admin','2015-04-29 02:00:41'),(23,1,1,1,22,0,'admin','2015-04-29 02:00:41');

/*Table structure for table `trans_jo` */

DROP TABLE IF EXISTS `trans_jo`;

CREATE TABLE `trans_jo` (
  `nojo` char(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `project` char(100) DEFAULT NULL,
  `syarat` char(50) DEFAULT NULL,
  `deskripsi` char(50) DEFAULT NULL,
  `lama` char(50) DEFAULT NULL,
  `latihan` date DEFAULT NULL,
  `bekerja` char(50) DEFAULT NULL,
  `komponen` char(50) DEFAULT NULL,
  `type_jo` char(10) DEFAULT NULL,
  `approval` int(5) DEFAULT NULL,
  `upd` char(20) DEFAULT NULL,
  `lup` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`nojo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trans_jo` */

insert  into `trans_jo`(`nojo`,`tanggal`,`project`,`syarat`,`deskripsi`,`lama`,`latihan`,`bekerja`,`komponen`,`type_jo`,`approval`,`upd`,`lup`) values ('000001/ISH/01010107/2015','2015-11-03','Avenger I','pokok','bisa','12','2015-11-10','2015-11-17','export.XLSX','New',0,'Administrator','2015-11-18 17:57:48'),('000002/ISH/01010107/2015','2015-11-04','Avenger II','pokoknya','bisalah','6','2015-11-18','2015-11-18','wulang.XLS','New',0,'Administrator','2015-11-18 17:59:16');

/*Table structure for table `trans_jo_copy` */

DROP TABLE IF EXISTS `trans_jo_copy`;

CREATE TABLE `trans_jo_copy` (
  `nojo` char(50) NOT NULL,
  `project` char(100) DEFAULT NULL,
  `require` int(5) DEFAULT NULL,
  `tggjwb` int(5) DEFAULT NULL,
  `waktu` int(5) DEFAULT NULL,
  `lokasi` int(5) DEFAULT NULL,
  `paket` int(1) DEFAULT NULL,
  `upd` char(20) DEFAULT NULL,
  `lup` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`nojo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trans_jo_copy` */

insert  into `trans_jo_copy`(`nojo`,`project`,`require`,`tggjwb`,`waktu`,`lokasi`,`paket`,`upd`,`lup`) values ('000001/ISH/01010107/2015','avenger',NULL,6,1,NULL,1,'admin','2015-04-24 22:01:35'),('000002/ISH/01010107/2015','okay',NULL,2,1,NULL,1,'admin','2015-05-19 13:19:56');

/*Table structure for table `trans_komponen` */

DROP TABLE IF EXISTS `trans_komponen`;

CREATE TABLE `trans_komponen` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nojo` char(50) DEFAULT NULL,
  `komponen` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trans_komponen` */

/*Table structure for table `trans_rekrut` */

DROP TABLE IF EXISTS `trans_rekrut`;

CREATE TABLE `trans_rekrut` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nojo` char(50) DEFAULT NULL,
  `jabatan` int(10) DEFAULT NULL,
  `area` int(10) DEFAULT NULL,
  `level` int(10) DEFAULT NULL,
  `nama` varchar(250) DEFAULT '0',
  `upd` char(10) DEFAULT NULL,
  `lup` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trans_rekrut` */

/*Table structure for table `trans_req` */

DROP TABLE IF EXISTS `trans_req`;

CREATE TABLE `trans_req` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nojo` char(50) DEFAULT NULL,
  `jabatan` int(10) DEFAULT NULL,
  `area` int(10) DEFAULT NULL,
  `level` int(10) DEFAULT NULL,
  `jml` int(10) DEFAULT NULL,
  `upd` char(10) DEFAULT NULL,
  `lup` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trans_req` */

/*Table structure for table `trans_rincian` */

DROP TABLE IF EXISTS `trans_rincian`;

CREATE TABLE `trans_rincian` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nojo` char(50) DEFAULT NULL,
  `jabatan` char(50) DEFAULT NULL,
  `gender` char(50) DEFAULT NULL,
  `lokasi` char(50) DEFAULT NULL,
  `atasan` char(50) DEFAULT NULL,
  `kontrak` char(50) DEFAULT NULL,
  `waktu` char(50) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `upd` char(10) DEFAULT NULL,
  `lup` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=259 DEFAULT CHARSET=latin1;

/*Data for the table `trans_rincian` */

insert  into `trans_rincian`(`id`,`nojo`,`jabatan`,`gender`,`lokasi`,`atasan`,`kontrak`,`waktu`,`jumlah`,`upd`,`lup`) values (256,'000001/ISH/01010107/2015','Agent','Pria','Jakarta - Mampang','Team Leader','Part','Shifting',12,'Administra','2015-11-18 17:57:48'),(257,'000002/ISH/01010107/2015','Agent','Pria','Jakarta - Mampang','Team Leader','Part','Shifting',4,'Administra','2015-11-18 17:59:16'),(258,'000002/ISH/01010107/2015','Agent','Wanita','Jakarta - Mampang','Team Leader','Part','Shifting',6,'Administra','2015-11-18 17:59:16');

/*Table structure for table `trans_upload` */

DROP TABLE IF EXISTS `trans_upload`;

CREATE TABLE `trans_upload` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nojo` char(50) DEFAULT NULL,
  `filename` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trans_upload` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
