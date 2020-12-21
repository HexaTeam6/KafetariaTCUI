/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.21-MariaDB : Database - kafetaria
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kafetaria` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `kasir` */

DROP TABLE IF EXISTS `kasir`;

CREATE TABLE `kasir` (
  `id_kasir` int(11) NOT NULL AUTO_INCREMENT,
  `id_login` int(11) NOT NULL,
  `nama_kasir` varchar(50) NOT NULL,
  `telp_kasir` varchar(14) DEFAULT NULL,
  `alamat_kasir` varchar(100) DEFAULT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  PRIMARY KEY (`id_kasir`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `kasir` */

insert  into `kasir`(`id_kasir`,`id_login`,`nama_kasir`,`telp_kasir`,`alamat_kasir`,`jenis_kelamin`) values (2,10,'Ratna','0812345678','Jl. Pandegiling 4/5','P'),(3,12,'rofita','081212121','Jl. Pandegiling 4/5','P');

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`nama_kategori`) values (1,'Makanan'),(2,'Minuman'),(3,'Jajan');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` char(1) NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`id_login`,`nama`,`username`,`password`,`role`) values (1,'Admin','admin1999','21232f297a57a5a743894a0e4a801fc3','A'),(9,'Siti','penjual1','08634230004f9098ef63bfabef63a407','P'),(10,'Ratna','kasir1','c7911af3adbd12a035b289556d96470a','K'),(11,'Anggun','penjual2','08634230004f9098ef63bfabef63a407','P'),(12,'rofita','kasir2','c7911af3adbd12a035b289556d96470a','K'),(13,'Wahed','wahed123','21232f297a57a5a743894a0e4a801fc3','U'),(14,'Abdur Rachman Wahed','05111840000004','b883d068ea38e503730295c6546d59d7','U'),(15,'Siti','penjual3','08634230004f9098ef63bfabef63a407','P');

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`id_menu`,`id_kategori`,`id_penjual`,`nama_menu`,`harga_menu`,`stok`) values (2,2,2,'Jus Apel',8000,10),(4,1,2,'Bakso',10000,25),(5,3,2,'Ciki',1000,100);

/*Table structure for table `pembeli` */

DROP TABLE IF EXISTS `pembeli`;

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL AUTO_INCREMENT,
  `id_login` int(11) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `telp_pembeli` varchar(14) DEFAULT NULL,
  `email_pembeli` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pembeli`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `pembeli` */

insert  into `pembeli`(`id_pembeli`,`id_login`,`nama_pembeli`,`telp_pembeli`,`email_pembeli`) values (1,13,'Wahed','123123','asdasd'),(2,14,'Abdur Rachman Wahed','0812323935','abdurrachmanwahed@gmail.com');

/*Table structure for table `penjual` */

DROP TABLE IF EXISTS `penjual`;

CREATE TABLE `penjual` (
  `id_penjual` int(11) NOT NULL AUTO_INCREMENT,
  `id_login` int(11) NOT NULL,
  `nama_penjual` varchar(50) NOT NULL,
  `telp_penjual` varchar(14) DEFAULT NULL,
  `alamat_penjual` varchar(100) DEFAULT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  PRIMARY KEY (`id_penjual`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `penjual` */

insert  into `penjual`(`id_penjual`,`id_login`,`nama_penjual`,`telp_penjual`,`alamat_penjual`,`jenis_kelamin`) values (2,9,'Siti','0812345678','Jl. Simo Kerto 1/45','P'),(3,11,'Anggun','08111111','Jl. Simo Kerto 1/44','P'),(4,15,'Siti','1923123','asdasd','P');

/*Table structure for table `pesanan` */

DROP TABLE IF EXISTS `pesanan`;

CREATE TABLE `pesanan` (
  `id_pesanan` char(16) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_kasir` int(11) DEFAULT NULL,
  `status_pesanan` char(1) NOT NULL COMMENT '1=menunggu, 2=diproses, 3=selesai, 4=diambil',
  `waktu_pesan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_bayar` int(11) DEFAULT NULL,
  `jenis_bayar` char(1) DEFAULT NULL COMMENT 'C=cash, O=ovo',
  `keterangan` text,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pesanan` */

insert  into `pesanan`(`id_pesanan`,`id_pembeli`,`id_kasir`,`status_pesanan`,`waktu_pesan`,`total_bayar`,`jenis_bayar`,`keterangan`) values ('20201208-14-2300',2,NULL,'1','2020-12-08 14:59:12',16000,'C',NULL),('20201208-14-5152',2,NULL,'1','2020-12-08 16:55:15',26000,'C',NULL),('20201208-14-5661',2,NULL,'1','2020-12-08 15:13:53',24000,'O',NULL);

/*Table structure for table `pesanan_detail` */

DROP TABLE IF EXISTS `pesanan_detail`;

CREATE TABLE `pesanan_detail` (
  `id_pesanan` char(16) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah_beli` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pesanan_detail` */

insert  into `pesanan_detail`(`id_pesanan`,`id_menu`,`jumlah_beli`,`total_bayar`,`keterangan`) values ('20201208-14-2300',2,2,16000,NULL),('20201208-14-5661',2,3,24000,NULL),('20201208-14-5152',2,2,16000,NULL),('20201208-14-5152',4,1,10000,NULL);

/*Table structure for table `review` */

DROP TABLE IF EXISTS `review`;

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `waktu_review` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `review` text NOT NULL,
  PRIMARY KEY (`id_review`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `review` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
