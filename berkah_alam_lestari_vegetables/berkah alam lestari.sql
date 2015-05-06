/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.21 : Database - berkah_alam_lestari_vegetables
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`berkah_alam_lestari_vegetables` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `berkah_alam_lestari_vegetables`;

/*Table structure for table `detail_goods_receipt` */

DROP TABLE IF EXISTS `detail_goods_receipt`;

CREATE TABLE `detail_goods_receipt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gr_id` varchar(30) NOT NULL,
  `sayur_id` varchar(30) NOT NULL,
  `kuantitas` varchar(11) NOT NULL,
  `harga` float NOT NULL,
  `harga_supplier` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

/*Data for the table `detail_goods_receipt` */

insert  into `detail_goods_receipt`(`id`,`gr_id`,`sayur_id`,`kuantitas`,`harga`,`harga_supplier`) values (46,'15030400001','19','33',17000,9000),(47,'15030400001','25','11',13500,11000),(48,'15030400001','27','9',4500,4000),(49,'15030400001','24','40',125000,10000),(50,'15030400002','26','20',26000,2000),(51,'15030400002','20','100',14000,3000),(52,'15030400003','19','10',17000,9000),(53,'15030400003','25','401',13500,11000),(54,'15030400003','26','718',26000,2000),(55,'15030400003','27','471',4500,4000),(56,'15030400003','24','135',125000,10000),(57,'15030400003','20','901',14000,3000),(58,'15040400006','21','1000',125000,10000),(63,'15030400004','19','9',17000,9000);

/*Table structure for table `detail_penjualan` */

DROP TABLE IF EXISTS `detail_penjualan`;

CREATE TABLE `detail_penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `penjualan_id` varchar(30) NOT NULL,
  `sayur_id` varchar(30) NOT NULL,
  `kuantitas` varchar(11) NOT NULL,
  `harga` float NOT NULL,
  `harga_supplier` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `detail_penjualan` */

insert  into `detail_penjualan`(`id`,`penjualan_id`,`sayur_id`,`kuantitas`,`harga`,`harga_supplier`) values (18,'15030400001','19','33',17000,9000),(19,'15030400001','19','10',17000,10000),(20,'15030400001','20','11',13500,11000),(21,'15030400001','22','9',4500,4000),(22,'15030400001','24','40',125000,10000),(23,'15030400002','24','20',26000,2000),(24,'15030400002','20','100',14000,3000),(25,'15030400003','19','10',17000,9000),(26,'15030400003','22','40000',17000,10000),(27,'15030400003','21','401',13500,11000),(28,'15030400003','20','718',26000,2000),(29,'15030400003','23','471',4500,4000),(30,'15030400003','24','135',125000,10000),(31,'15030400003','20','901',14000,3000),(32,'15030400004','19','10',17000,9000),(33,'15040400005','19','9000',17000,9000),(34,'15040400006','21','1000',125000,10000),(35,'15050400007','19','13',17000,9000),(36,'15050400007','23','4',26000,2000),(37,'15050400007','21','9',125000,10000),(38,'15050400008','24','100',4500,4000),(39,'15050400009','24','100',4500,4000),(40,'15050400010','24','100',4500,4000);

/*Table structure for table `detail_tagihan` */

DROP TABLE IF EXISTS `detail_tagihan`;

CREATE TABLE `detail_tagihan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tagihan_id` varchar(30) NOT NULL,
  `sayur_id` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `harga` float NOT NULL,
  `harga_supplier` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `detail_tagihan` */

insert  into `detail_tagihan`(`id`,`tagihan_id`,`sayur_id`,`kuantitas`,`harga`,`harga_supplier`) values (1,'15030400001',19,33,17000,9000),(2,'15030400001',25,11,13500,11000),(3,'15030400001',27,9,4500,4000),(4,'15030400001',24,40,125000,10000),(7,'15030400002',26,20,26000,2000),(8,'15030400002',20,100,14000,3000),(9,'15030400003',19,10,17000,9000),(10,'15030400003',25,401,13500,11000),(11,'15030400003',26,718,26000,2000),(12,'15030400003',27,471,4500,4000),(13,'15030400003',24,135,125000,10000),(14,'15030400003',20,901,14000,3000),(15,'15040400006',21,1000,125000,10000),(16,'15030400004',19,9,17000,9000);

/*Table structure for table `foodhall` */

DROP TABLE IF EXISTS `foodhall`;

CREATE TABLE `foodhall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(70) DEFAULT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `operator` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `foodhall` */

insert  into `foodhall`(`id`,`nama`,`telp`,`operator`) values (1,'Kelapa Gading','021-4533365','Tuti'),(2,'Kelapa Gading (418)','021-4533355','-'),(3,'Pondok Indah','021-3107527','Inal'),(4,'Pondok Indah (513)','021-3107575','Gusti'),(5,'Pondok Indah','021-3107555','Devi'),(6,'Grand Indonesia','021-23580105','Njum'),(7,'Pondok Indah Mall','021-75920655','Wawan'),(8,'Pondok Indah Mall','021-96825060','Hendi'),(9,'SC','021-72781069','Sisil'),(10,'Asut','021-30449126','Iyus'),(11,'PS','021-57900055','Marni'),(12,'Villa Delima','021-27650688','-');

/*Table structure for table `goods_receipt` */

DROP TABLE IF EXISTS `goods_receipt`;

CREATE TABLE `goods_receipt` (
  `id` varchar(30) NOT NULL,
  `gr_no` varchar(30) NOT NULL,
  `foodhall_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `goods_receipt` */

insert  into `goods_receipt`(`id`,`gr_no`,`foodhall_id`,`user_id`,`tgl_masuk`) values ('15030400001','5000417745',1,1,'2015-04-03'),('15030400002','5000417746',2,1,'2015-04-03'),('15030400003','5000417747',7,1,'2015-04-03'),('15030400004','5000417744',5,1,'2015-04-06'),('15040400006','5000417747',12,1,'2015-04-04');

/*Table structure for table `jadwal` */

DROP TABLE IF EXISTS `jadwal`;

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `hari` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jadwal` */

insert  into `jadwal`(`id`,`hari`) values (1,'Senin'),(2,'Selasa'),(3,'Rabu'),(4,'Kamis'),(5,'Jumat'),(6,'Sabtu'),(7,'Minggu');

/*Table structure for table `pengguna` */

DROP TABLE IF EXISTS `pengguna`;

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `hak_akses` char(1) NOT NULL DEFAULT 'u',
  `remember_token` varchar(100) DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `pengguna` */

insert  into `pengguna`(`id`,`username`,`password`,`email`,`nama_lengkap`,`hak_akses`,`remember_token`,`status`) values (1,'admin','$2y$10$LYdZYN295gFtzlDlq9ytvesZBf8MDTxDJa3i9vTUN/4uDS5YxSLgO','berkahalamlestari@yahoo.com','Ipah Nurlatifah','a','C2cJnp1klKIZ264Msx5PHb0JpRr1BJsGksQ7xlfbwWcmHWZxB8rwXpGe7xqA','1'),(2,'user','$2y$10$/wWG/Vzr.QCWi4eIhRuCaOWXB6OiNd2V58lriPJeptbbdLTly/Xt2','user@berkahalamlestari.com','User','u','XDHFhwP25cGkoMNcw1XeesSBCojQaTZpixHMq3Zx0bWqWjPgn9gWG36gpWBZ','1');

/*Table structure for table `penjualan` */

DROP TABLE IF EXISTS `penjualan`;

CREATE TABLE `penjualan` (
  `id` varchar(30) NOT NULL,
  `foodhall_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_kirim` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penjualan` */

insert  into `penjualan`(`id`,`foodhall_id`,`user_id`,`tgl_kirim`) values ('15030400001',1,1,'2015-04-03'),('15030400002',2,1,'2015-03-22'),('15030400003',7,1,'2015-04-03'),('15030400004',5,1,'2015-04-02'),('15040400005',5,1,'2015-04-04'),('15040400006',12,1,'2015-04-04'),('15050400007',10,1,'2015-04-05'),('15050400008',12,1,'2015-04-05'),('15050400009',12,1,'2015-04-05'),('15050400010',12,1,'2015-04-05');

/*Table structure for table `sayur` */

DROP TABLE IF EXISTS `sayur`;

CREATE TABLE `sayur` (
  `id` varchar(30) NOT NULL,
  `ean` varchar(30) DEFAULT NULL,
  `mch` varchar(30) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sayur` */

insert  into `sayur`(`id`,`ean`,`mch`,`nama`,`satuan`,`harga`) values ('37169502','3716950200007','2201ORL70','Akar Alang','kg',15000),('37169503','3716950300004','2201ORL70','Beetroot','kg',35000),('37169504','3716950400001','22016RL70','Red Radish','kg',19500),('37169505','3716950500008','22016RL70','Daikon','kg',10000),('37169506','3716950600005','22012BY60','Broccoli','kg',37000),('37169510','3716951000002','22000L060','Daun Kucai','kg',25000),('37169512','3716951200006','22012LO60','Kembang Kol','kg',25000),('37169513','3716951300003','22000L060','Kol Merah','kg',36000),('37169514','3716951400000','22000L060','Kol Putih','kg',15000),('37169516','3716951600004','22001LO60','Lettuce Head','kg',25000),('37169519','3716951900005','22002LO60','Parsley/Petercely','kg',33000),('37169520','3716952000001','22000L060','Pohpohan','kg',15000),('37169521','3716952100008','22000L060','Sawi Putih','kg',15000),('37169522','3716952200005','22000L060','Baby Sawi Putih','kg',8000),('37169524','3716952400009','22011FL50','Zukini Hijau','kg',19000),('37169525','3716952500006','22000L060','Daun Bawang Besar','kg',26000),('37169526','3716952600003','22002LO60','Basil','kg',42000),('37169527','3716952700000','22000L060','Tangho','kg',26000),('37169529','3716952900004','22013FL80','Kapri','kg',42000),('37169530','3716953000000','22013EL80','Okra','kg',26000),('37169531','3716953100007','22013EL80','Kapri Manis','kg',45000),('37169532','3716953200004','22013EL80','Buncis Tw','kg',24000),('37169534','3716953400003','22010FLSO','Kentang Besar','kg',9000),('37169536','3716953600002','22011FL50','Timun Acar','kg',15000),('37169537','3716953700009','22011FL50','Timun Baby','kg',9000),('37169538','3716953800006','22011FL50','Labu Siam Acar','kg',15000),('37169539','3716953900003','22011FL50','Pare Hijau','kg',12500),('37169551','3716955100005','22011FL50','Labu Siam Besar','2 pcs',9000),('37169553','3716955300009','22011FLSO','Paprica Green','kg',41000),('37169554','3716955400006','22011FL50','Paprica Yellow','kg',75000),('37169555','3716955500003','22011FL50','Paprica Red','kg',65000),('37169557','3716955700007','22011FL50','Terong Sayur','kg',15500),('37169558','3716955800004','22011FL50','Timun Jepang','kg',16000),('37169559','3716955900001','22011FL50','Tomat Apel','kg',13000),('37169560','3716956000007','22011FL50','Tomat Tw','kg',16000),('37169561','3716956100004','22010FL50','Wortel Besar','kg',13000),('37169562','3716956200001','22011FL50','Sweet Corn','kg',11000),('37169563','3716956300008','22011FL50','Sweet Corn Peeled','kg',8000),('37169564','3716956400005','22011FL50','Jagung Acar','kg',24000),('37169565','3716956500002','22031FL50','Jeruk Limau','kg',26000),('37169566','3716956600009','22011FL50','Jeruk Nipis','kg',25000),('37169567','3716956700006','22011FL50','Kaboca Hijau','kg',24000),('37169568','3716956800003','22011FLSO','Kaboca Kuning','kg',26000),('37169569','3716956900000','22011FL50','Cabe Merah Besar','kg',40000),('37169570','3716957000006','22011FL50','Cabe Merah Keriting','kg',90000),('37169571','3716957100003','22011FL50','Cabe Rawit Hijau','kg',35000),('37169577','3716957700005','22011FL50','Labu Parang','kg',15000),('37169578','3716957800002','22011OL80','Pete Kupas','kg',125000),('37169715','3716971500001','22000L060','Daun Pandan','kg',4500),('37169800','3716980000004','22014OL80','Aparagus Super','kg',80000),('37169801','3716980100001','22013EL80','Buncis Mini','kg',26000),('37169802','3716980200008','22000L060','Wansui/Daun Ketumbar','kg',85000),('37169804','3716980400002','22000L060','Horinso','kg',33000),('37169806','3716980600006','22000L060','Kailan Baby','kg',17500),('37169807','3716980700003','22001LO60','UI Selada Merah','kg',13500),('37169808','3716980800000','2200OL060','Seledri Lokal','kg',31000),('37169809','3716980900007','22000L060','Seledri Stick','kg',31000),('37169812','3716981200007','22001LO60','Lettuce Romain','kg',32000),('37169813','3716981300004','22000L060','Packcoy Baby','kg',17000),('37169818','3716981800009','22013EL80','Edamame','kg',16500),('37169918','3716991800006','22000L060','Daun Bawang Leek','',18000),('37169919','3716991900003','22000L060','Daun Ginseng','kg',15000),('37169921','3716992100006','22000L060','Daun Katuk','kg',19000),('37169922','3716992200003','22000L060','Daun Kemangi','kg',22500),('37169923','3716992300000','22000L060','Daun Mint','kg',27000),('37169926','3716992600001','22000L060','Siomak','kg',15000),('37169928','3716992800005','22013LO60','Kacang Panjang Bangkok','kg',15000),('37169929','3716992900002','22000L060','Tespong','kg',12000),('37169934','3716993400006','2201ORL70','Ubi Jepang','ea',5000),('37169935','3716993500003','22011RL70','Nasubi/Terong Jepang','kg',31000),('37169936','3716993600000','22031FL50','Jeruk Lemon','kg',23000),('37169939','3716993900001','22011FL50','Lobak Lilin','kg',15000),('37169940','3716994000007','22000L060','Oyong','kg',16000),('37169941','3716994100004','22011FL50','Paprica Orange','kg',40000),('37169942','3716994200001','22011FL50','Tomato Cherry','kg',29000),('37169944','3716994400005','22011RL50','Terong Lalap Ijo','kg',11500),('37169945','3716994500002','22011FL50','Terong Lalap Ungu','kg',11500),('37170097','3717009700001','22000L060','Pucuk Labu','kg',20000),('37170113','3717011300001','22011FL50','Leunca','kg',9000),('37170115','3717011500005','22011FLSO','Pare Lilin','kg',17000),('37170120','3717012000009','22011FLSO','Cabe Rawit Merah','kg',85000),('37170121','3717012100006','22011LO60','Baby Zukini','kg',10500),('37170316','3717031600006','22000L060','Sawi Pahit','kg',14000),('37170363','3717036300000','22000L060','Kumek','kg',15000),('37170364','3717036400007','22011FL50','Cabe Hijau Besar','',32000),('37170380','3717038000007','22016RL70','Lobak Korea','kg',15000),('37170437','3717043700008','22000L060','Daun Dill','kg',15000),('37170441','3717044100005','22010FL50','Kentang Rendang','kg',5500),('37170470','3717047000005','22000L060','Daun Bawang Kecil','kg',22000),('37170535','3717053500001','22013EL80','Kacang Panjang Lokal','kg',18000),('37170696','3717069600009','22014LO60','Daun Bawang Son','kg',26000),('37170744','3717074400007','22011FL50','Labu Tangwe','kg',13000),('37170748','3717074800005','22002LO60','LFL Tomeo','kg',38000),('37170951','3717095100009','22010FL50','Wortel Baby','kg',15000),('37174846','3717484600004','22021LO60','Kembang Kol Organic','kg',20500),('37174850','3717485000001','22021LO60','Kol Organic','kg',12500),('37174871','3717487100006','22021RL70','Aloe Vera Organic','kg',6000),('37175076','3717507600004','22014EL80','Kacang Joglo Kupas','kg',26500),('37184145','3718414500005','22120FLSO','RL Paprica Ungu','kg',35000),('37185007','3718500700005','22013OL80','Otl Pete Papan','ea',8500),('37188109','3718810900003','22021FL50','Tomat Cherry Bulat Organik','kg',23500),('37188110','3718811000009','22021FL50','Tomat Cherry Red Organik Lonjong','kg',21750),('37188122','3718812200002','22021RF90','Cabe Rawit Merah Organik','ea',12500),('37188123','3718812300009','22021RF90','Cabe Merah Keriting Organik','ea',9500),('37195789','3719578900007','22000L060','Bayam Hijau','kg',17000),('37195790','3719579000003','22000L060','Bayam Merah','kg',18000),('37195791','3719579100000','22000L060','Caysim','kg',13500),('37195792','3719579200007','22000L060','Kangkung','kg',16500),('37195793','3719579300004','22000L060','Packcoy Hijau/Sendok','kg',16000),('37195796','3719579600005','22000L060','Selada Air','kg',17500),('37195797','3719579700002','22001LO60','Selada Keriting','kg',23000);

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `supplier` */

insert  into `supplier`(`id`,`nama`,`telp`,`alamat`) values (1,'Mas Agus','',''),(2,'Nenek',NULL,NULL),(3,'Tantan',NULL,NULL),(4,'Yudi',NULL,NULL),(5,'Enang',NULL,NULL),(6,'Asep',NULL,NULL),(7,'Ramsin',NULL,NULL),(8,'Reges',NULL,NULL),(9,'Aang',NULL,NULL),(10,'Manat',NULL,NULL),(11,'Kakek',NULL,NULL);

/*Table structure for table `tagihan` */

DROP TABLE IF EXISTS `tagihan`;

CREATE TABLE `tagihan` (
  `id` varchar(30) NOT NULL,
  `foodhall_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tagihan` */

insert  into `tagihan`(`id`,`foodhall_id`,`user_id`,`tgl_masuk`) values ('15030400001',1,1,'2015-04-03'),('15030400002',2,1,'2015-04-03'),('15030400003',7,1,'2015-04-03'),('15030400004',5,1,'2015-04-06'),('15040400006',12,1,'2015-04-04');

/*Table structure for table `tr_jadwal` */

DROP TABLE IF EXISTS `tr_jadwal`;

CREATE TABLE `tr_jadwal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jadwal_id` int(11) NOT NULL,
  `foodhall_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `tr_jadwal` */

insert  into `tr_jadwal`(`id`,`jadwal_id`,`foodhall_id`) values (2,2,1),(3,3,7),(4,4,1),(5,5,0),(6,6,10),(7,7,9),(9,1,12),(10,2,3),(11,2,6),(12,2,9),(13,3,11),(14,3,12),(15,4,3),(16,4,6),(17,4,9),(18,6,7),(19,6,11),(20,7,3),(21,7,6);

/*Table structure for table `tr_sayur` */

DROP TABLE IF EXISTS `tr_sayur`;

CREATE TABLE `tr_sayur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sayur_id` varchar(30) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `harga` float NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `tr_sayur` */

insert  into `tr_sayur`(`id`,`sayur_id`,`supplier_id`,`harga`,`deleted_at`) values (19,'37195789',3,9000,NULL),(20,'37170316',3,3000,NULL),(21,'37169578',3,10000,NULL),(22,'37195791',3,11000,NULL),(23,'37169525',3,2000,NULL),(24,'37169715',3,4000,NULL),(28,'37174871',1,11000,'2015-04-04 20:46:12'),(29,'37169800',1,11000,'2015-04-04 20:46:12'),(30,'37169514',1,11000,'2015-04-04 20:46:12');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
