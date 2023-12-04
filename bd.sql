-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.28-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para edusmart_v2
CREATE DATABASE IF NOT EXISTS `edusmart_v2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `edusmart_v2`;

-- Volcando estructura para tabla edusmart_v2.alumnos
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(50) NOT NULL DEFAULT '',
  `⁯id_institucion` int(11) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `app` varchar(50) DEFAULT NULL,
  `apm` varchar(50) DEFAULT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(200) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) NOT NULL DEFAULT '',
  `sexo` enum('F','M') DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  PRIMARY KEY (`id_alumno`) USING BTREE,
  UNIQUE KEY `matricula` (`matricula`),
  KEY `FK_alumnos_institucion` (`⁯id_institucion`),
  KEY `matricula2` (`matricula`),
  CONSTRAINT `FK_alumnos_institucion` FOREIGN KEY (`⁯id_institucion`) REFERENCES `institucion` (`id_institucion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=816 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.alumnos: ~101 rows (aproximadamente)
INSERT INTO `alumnos` (`id_alumno`, `matricula`, `⁯id_institucion`, `nombre`, `app`, `apm`, `correo`, `contrasena`, `foto`, `telefono`, `sexo`, `fecha_nac`) VALUES
	(715, '92010513', NULL, 'Hola mundo', ' mundo!&quot;&quot;);&quot;', 'Garcia', 'Caballero', '$2y$10$I6T1/0M/JWCTKgk/d0z6eutaOSNsU5h/gDNRx86jVb1adJBHEMrt.', NULL, '123', '', '2023-12-01'),
	(716, '37552221', NULL, 'Luis', 'Perez', 'Sanchez', 'luis472@example.com', '$2y$10$oJg.Y7vZ58YQuunsnuHZauHmezoIqV2z21dtqz/5FMzp85GHUuNse', NULL, '919225054', 'F', '2003-12-02'),
	(717, '14960380', NULL, 'Ana', 'Lopez', 'Molina', 'ana544@example.com', '$2y$10$2Ha4zN8tIY8sY18vTXFoy.mfZEWEgEP3UcNQinzMNCJ2Jrz0mM1Em', NULL, '920787707', 'F', '2001-12-02'),
	(718, '99290727', NULL, 'Luis', 'Perez', 'Gomez', 'luis664@example.com', '$2y$10$1Lqga6jH7Gkf2MO4876wc.ROxFGiVTVf3o1DIct5equ2uPYqVw436', NULL, '967565956', 'F', '1999-12-02'),
	(719, '79653069', NULL, 'Luis', 'Lopez', 'Sanchez', 'luis554@example.com', '$2y$10$XOF9qf01XAed3e1vjNf89.LAAMXyLwl6Z8D2Ag.MrAP/oodbtXFhe', NULL, '924443616', 'M', '2002-12-02'),
	(720, '68630107', NULL, 'Carlos', 'Rodriguez', 'Vargas', 'carlos774@example.com', '$2y$10$pG6Ouo1iodST211XWUm9iunhnQUaPL1QwYj0AkaJUuqRfUh9KAsay', NULL, '918289097', 'M', '1999-12-02'),
	(721, '25595630', NULL, 'Sofia', 'Fernandez', 'Sanchez', 'sofia675@example.com', '$2y$10$og.XXgcHnN./q5aZP8wyR.kZMIugoWBZ8XW1oVcW32XrFdlFBMIYa', NULL, '913545136', 'F', '2003-12-02'),
	(722, '49530522', NULL, 'Pedro', 'Garcia', 'Torres', 'pedro643@example.com', '$2y$10$rGwKZ1EpCiMjt6xjKwj.wedDvu2ZIhlnIJfNV2iVFZBf1sjuulBCS', NULL, '965656287', 'F', '1998-12-02'),
	(723, '87182590', NULL, 'Carlos', 'Martinez', 'Torres', 'carlos427@example.com', '$2y$10$ACz/jCf/jvlpyMWVSKx/g.F/ZAVdFH2V05/rjL0gzG29n8fMhOsGa', NULL, '959150695', 'F', '2005-12-02'),
	(724, '98545553', NULL, 'Maria', 'Martinez', 'Diaz', 'maria855@example.com', '$2y$10$SAc9wBQ6q7/hRlG.1pMLr.smu48sB6HlRs6Qmy/G3plh.Asb6r9we', NULL, '955114098', 'M', '2001-12-02'),
	(725, '20808088', NULL, 'Ana', 'Martinez', 'Molina', 'ana200@example.com', '$2y$10$OOr0tPQNIHeYG9lDqroxSuUGkPFHGFcSAurraWZSbrErUO1Qvza0i', NULL, '939967990', 'M', '2004-12-02'),
	(726, '70862343', NULL, 'Pedro', 'Rodriguez', 'Molina', 'pedro296@example.com', '$2y$10$7QFfVq2c2H/bruwD02arr.6WU/pp6x3rdjVQ5kdrZYOD2F9RL07am', NULL, '954177913', 'F', '1998-12-02'),
	(727, '14083217', NULL, 'Juan', 'Garcia', 'Diaz', 'juan262@example.com', '$2y$10$GBQyZ/Qr/FH9XtvXvNBc4ue9fn8RFMRh7zdtXqf3QlNrM3Ct79bYa', NULL, '962779273', 'F', '2002-12-02'),
	(728, '50974672', NULL, 'Ana', 'Fernandez', 'Molina', 'ana689@example.com', '$2y$10$Sy7ru1cDkx/2cP7hwsVggu4wsJPx9Ki3eJTU/.fehFr4nzfoTEERa', NULL, '917085325', 'M', '2000-12-02'),
	(729, '31900482', NULL, 'Maria', 'Rodriguez', 'Vargas', 'maria461@example.com', '$2y$10$7r.skHgxQSJkBZPMGwHkdevpE9EGqysxExb255015yZiRh1ZlyY.O', NULL, '951911045', 'F', '2000-12-02'),
	(730, '31407492', NULL, 'Ana', 'Fernandez', 'Sanchez', 'ana932@example.com', '$2y$10$YCqdYYW.J1whKsJcYzBcyOBCgx7i6E4by//7BzuqL9ENeqENQ7o9.', NULL, '978645588', 'M', '2002-12-02'),
	(731, '56713333', NULL, 'Ana', 'Martinez', 'Torres', 'ana700@example.com', '$2y$10$7bhkMyz/PTETIGKA0atwF.NyojKxHVNSk6xcY4Wjsz011T3Pb4axu', NULL, '966683292', 'M', '2000-12-02'),
	(732, '37739759', NULL, 'Luis', 'Rodriguez', 'Torres', 'luis311@example.com', '$2y$10$UJcXA1NJD52gMLlmB0Bw7egyOtpsCD/gMT4gHnM1dC.NuhyZFmBaG', NULL, '977099742', 'M', '1998-12-02'),
	(733, '21089802', NULL, 'Luis', 'Rodriguez', 'Vargas', 'luis781@example.com', '$2y$10$DVJFGHat23ExAbt95wifjutjrz8lR/.QdUO9XrbjYvresGsUiOBCi', NULL, '949668904', 'F', '2000-12-02'),
	(734, '93372880', NULL, 'Juan', 'Lopez', 'Torres', 'juan911@example.com', '$2y$10$iztQ/oMvY/CoTpFu.iVw0erAdma7bs/TEnElb/gK6jVYXCtuonCZu', NULL, '965174967', 'F', '1998-12-02'),
	(735, '34089909', NULL, 'Maria', 'Fernandez', 'Vargas', 'maria691@example.com', '$2y$10$0BDh.Jckl63/WGVKjCgZ2eKZET0fAsdfwRBRNea5kCmxcolllTb0C', NULL, '981634648', 'F', '2001-12-02'),
	(736, '92612375', NULL, 'Maria', 'Lopez', 'Sanchez', 'maria465@example.com', '$2y$10$deUAgVl5UbPmcUcOolwrBuLV7lbG3t2J04Pje8/IaQxinVg0oB3tm', NULL, '917529992', 'F', '2000-12-02'),
	(737, '66246404', NULL, 'Juan', 'Martinez', 'Sanchez', 'juan102@example.com', '$2y$10$56t.jPNtXhOVLpUC5QT5DueCQC8wCBqwdjoTWNNmMGyApVvrn1GRW', NULL, '929949346', 'F', '2003-12-02'),
	(738, '66004811', NULL, 'Pedro', 'Garcia', 'Molina', 'pedro877@example.com', '$2y$10$eQnqICxDk7pGmZRPkvR58usYGDUJCNyW3PdtvbEpIWX3/h9e6Msgu', NULL, '998947827', 'M', '2004-12-02'),
	(739, '86095020', NULL, 'Carlos', 'Martinez', 'Diaz', 'carlos915@example.com', '$2y$10$.6ylKrcpksXohFob6sCgjusTNm2YbSQzml0/YQ4V/QxBpaTEMXt1S', NULL, '915817991', 'F', '2001-12-02'),
	(740, '33777498', NULL, 'Carlos', 'Perez', 'Molina', 'carlos581@example.com', '$2y$10$bmR9MhcyrVeatOYqU3QE9.eJvQrk.SJo/xrEzDvDUIgCwGgkCNAu6', NULL, '985062996', 'F', '2001-12-02'),
	(741, '53116350', NULL, 'Ana', 'Lopez', 'Gomez', 'ana670@example.com', '$2y$10$f2cXRieaeDvyK029yrfLvOALzKZpnFU3s5Q2/EVgEC0Sv4A9vJ3Qa', NULL, '998024292', 'F', '2002-12-02'),
	(742, '29399310', NULL, 'Pedro', 'Rodriguez', 'Diaz', 'pedro183@example.com', '$2y$10$yINmeD9wW1iUZ8eA84gDxe4JSuAwaaxP4t3QOfMdlGYmQvcro2TlC', NULL, '964828133', 'M', '2003-12-02'),
	(743, '90933002', NULL, 'Laura', 'Garcia', 'Vargas', 'laura169@example.com', '$2y$10$DFYjJMBeRYSULSnIphrU5O9xBxS/Bvks1PKC5ICfNONkwMKu.zeoK', NULL, '956380771', 'M', '1998-12-02'),
	(744, '26465770', NULL, 'Carlos', 'Fernandez', 'Sanchez', 'carlos912@example.com', '$2y$10$yRw8RC4ARfiFb9YzILu2ve9Abjx5fPn5ot9VLEZmcX/CA/KWsJjv2', NULL, '928199429', 'F', '2002-12-02'),
	(745, '90822198', NULL, 'Laura', 'Rodriguez', 'Vargas', 'laura127@example.com', '$2y$10$HKWsxAmw0v5cucWzHcWv..Q5FWW73FdwlElNeN04dtAxvZkBaRY1u', NULL, '934374558', 'M', '2004-12-02'),
	(746, '99172707', NULL, 'Laura', 'Martinez', 'Vargas', 'laura588@example.com', '$2y$10$RE2NAYNoCCDGmARK6r5lNuljfUge9TC0C2Rwd02/2pR2b59rOYvFq', NULL, '982970911', 'F', '2001-12-02'),
	(747, '29504952', NULL, 'Carlos', 'Rodriguez', 'Gomez', 'carlos972@example.com', '$2y$10$PijFQXGDgLjfY4Mxj2ZXRO0oR1.CtfRx0//pCQHos0GPAon2i1vVW', NULL, '997484423', 'M', '2005-12-02'),
	(748, '65127938', NULL, 'Juan', 'Martinez', 'Vargas', 'juan623@example.com', '$2y$10$F42/5Z6y12JLc7R2SREIoeW2cNnsdfv07V7YFPe.lAHLLzJc8jQ.e', NULL, '995417753', 'M', '2003-12-02'),
	(749, '49560446', NULL, 'Sofia', 'Martinez', 'Gomez', 'sofia505@example.com', '$2y$10$7McD2TKPCE4EmJqw3g.PaOnUQF0qnE4OinUm1YqJvN32oQufHrAZa', NULL, '949347615', 'M', '2004-12-02'),
	(750, '25988081', NULL, 'Laura', 'Perez', 'Sanchez', 'laura764@example.com', '$2y$10$rUgY26egLCd5xfo93uCMpeXg7ZKaRRY.Jk9rx3vo6Tayb2xY2iJMC', NULL, '930620220', 'F', '2003-12-02'),
	(751, '34441973', NULL, 'Carlos', 'Perez', 'Sanchez', 'carlos766@example.com', '$2y$10$KileWHiJKlcH9jqA.734m.AX8CJo4ZDKbq2XCNkZdjLItCi5EKTxi', NULL, '946476761', 'M', '2003-12-02'),
	(752, '80431750', NULL, 'Luis', 'Fernandez', 'Sanchez', 'luis942@example.com', '$2y$10$BUl9p1khb0tGc7pyAPrg1OR5RH6XS/Pv3DOyhZHQXDNwrfR0FCZG6', NULL, '975575139', 'M', '2005-12-02'),
	(753, '93638113', NULL, 'Sofia', 'Rodriguez', 'Sanchez', 'sofia642@example.com', '$2y$10$2BwF4QNJu3kWc1tvrLrDjOBjlWxuvSkVBC.dZDjYD3jxiB7s.f18y', NULL, '997579571', 'M', '1999-12-02'),
	(754, '86820850', NULL, 'Maria', 'Fernandez', 'Diaz', 'maria725@example.com', '$2y$10$7o4FkNCM8lyOgCRfrHUw1u.nMi32Yy4YYebpmVYi.gvuly0mi2RB2', NULL, '942072426', 'F', '2005-12-02'),
	(755, '69478352', NULL, 'Pedro', 'Lopez', 'Torres', 'pedro622@example.com', '$2y$10$qmQfYYiGOez5XiuD8Azic.n8uSKLQ0PcZnaCuzzsXTFmHsISBgbXW', NULL, '920951195', 'M', '2005-12-02'),
	(756, '73484203', NULL, 'Luis', 'Lopez', 'Vargas', 'luis337@example.com', '$2y$10$qq6cVhVTYUMYAvTYrTvjdeh0VNdDJbdJz5KCFQRrYZ/yaIpknqiIW', NULL, '934796689', 'M', '1998-12-02'),
	(757, '99318506', NULL, 'Pedro', 'Rodriguez', 'Diaz', 'pedro302@example.com', '$2y$10$lSPxogghp5aZTFFLMD8D6OKp8fTmD0.j50UqW97G8P7vc9yrt5x66', NULL, '992878833', 'M', '1998-12-02'),
	(758, '74674796', NULL, 'Sofia', 'Martinez', 'Torres', 'sofia185@example.com', '$2y$10$S/2901TuPZ//8t2wYljbW.0n1AdFVbI/Ohc2bRc1CwnOZPuqesJ8m', NULL, '910602609', 'F', '2003-12-02'),
	(759, '94575167', NULL, 'Laura', 'Lopez', 'Diaz', 'laura835@example.com', '$2y$10$DK/fkI6CCdkGDSzHbLNi0.0JRFYCiujiRlgIqA7XC5Qtkjk7QvZqC', NULL, '917677373', 'M', '2003-12-02'),
	(760, '76617501', NULL, 'Juan', 'Perez', 'Gomez', 'juan524@example.com', '$2y$10$f/9udB6OL3BL8eDxDwAUj.3Zk8x3P7f9Q8F53bFiTIrVgH8Bn3lhi', NULL, '930395067', 'M', '2003-12-02'),
	(761, '28463441', NULL, 'Carlos', 'Garcia', 'Vargas', 'carlos566@example.com', '$2y$10$XLvjOmzJl7M0p8GaeXqAc.Ho2xjhJcKC2huyZ4tvcHyWzt1XTMpVi', NULL, '936403772', 'M', '2004-12-02'),
	(762, '75001476', NULL, 'Laura', 'Rodriguez', 'Molina', 'laura331@example.com', '$2y$10$ST6tgcsbbjogzek/0g43KeGx.QmFGTscF3Ac4DtJHafQwyHzuCyGi', NULL, '968610901', 'F', '2005-12-02'),
	(763, '19401603', NULL, 'Laura', 'Garcia', 'Molina', 'laura869@example.com', '$2y$10$Vd527fkz8tauUcs28KObt.0DEQPvVGJK1YFon.IJ7rf7tqiKraazK', NULL, '980171885', 'M', '1999-12-02'),
	(764, '37223780', NULL, 'Ana', 'Lopez', 'Gomez', 'ana347@example.com', '$2y$10$lIiK/5isenDUymJFSgTtXeVRJ4TOtYQWX3KpYZRHSm40P8PSTkZwi', NULL, '945017290', 'F', '2003-12-02'),
	(765, '55183134', NULL, 'Carlos', 'Perez', 'Sanchez', 'carlos617@example.com', '$2y$10$Key1NbkppFys6.EpcIBdPe9ITAyKzu9asm8DmgDVmiZKku1nSd34a', NULL, '968028410', 'F', '2001-12-02'),
	(766, '87786790', NULL, 'Juan', 'Lopez', 'Gomez', 'juan626@example.com', '$2y$10$Ju78u9MNwplk5aEJpa7FZO2g2KHSs.bDREyYItPKTB9/b7ilMYgEC', NULL, '983461461', 'F', '1999-12-02'),
	(767, '21201018', NULL, 'Maria', 'Lopez', 'Molina', 'maria456@example.com', '$2y$10$dPHBaw20WP3XR19cQQJPierdvV1DfE3rkQxBtTaGlvzeFT8dUl33i', NULL, '977353170', 'F', '1999-12-02'),
	(768, '58870458', NULL, 'Juan', 'Garcia', 'Torres', 'juan896@example.com', '$2y$10$V06kWK6T24MW7s5giUwMvOWulRbTGVOYDKDE8WT20Z4lA6IdM8lDm', NULL, '977712510', 'F', '2002-12-02'),
	(769, '44362425', NULL, 'Juan', 'Fernandez', 'Molina', 'juan104@example.com', '$2y$10$bjtqWAzqzOiZKsIx1Xg9GucEaIP3f2Rw2Uv.k..ax8LhO.trNKUAy', NULL, '969414705', 'F', '2005-12-02'),
	(770, '31938696', NULL, 'Pedro', 'Martinez', 'Diaz', 'pedro897@example.com', '$2y$10$vAmmxG6KUSSC6KExm7NOJ.daX/9opXHos7HiWJKzsfl3V/RzsDisG', NULL, '991313265', 'M', '1998-12-02'),
	(771, '68243607', NULL, 'Luis', 'Fernandez', 'Sanchez', 'luis112@example.com', '$2y$10$WfyO3..Bm4qUP/CyUoj.We23hfi54aBu3IEH1NZy1yaTZkzLavHBO', NULL, '997146431', 'F', '2001-12-02'),
	(772, '46578549', NULL, 'Carlos', 'Martinez', 'Vargas', 'carlos204@example.com', '$2y$10$8OOErlnR0wBwjwX1AzCcNuBHW7Nwn5xJOKmFItPPL27ybV2msj6iu', NULL, '996414997', 'F', '1999-12-02'),
	(773, '44241998', NULL, 'Pedro', 'Martinez', 'Torres', 'pedro477@example.com', '$2y$10$rLFC2GY37FYh6OWb6Zesw.1kSx/MnIIwbxNo5RN9eSY/h82JgRwvO', NULL, '938374353', 'M', '2005-12-02'),
	(774, '10008708', NULL, 'Ana xd xd xd xd xd', 'Fernandez', 'Diaz', 'ana640@example.com', '$2y$10$qLFMMWNgYDjefeexbDnEZOw8.PaLgpaSjtkkTsbZy.rnTfssloX0C', NULL, '912289513', 'F', '2005-12-02'),
	(775, '30115197', NULL, 'Pedro', 'Martinez', 'Sanchez', 'pedro739@example.com', '$2y$10$Rvg2rx.B069XigoN6QkMAOHRfvDbihx7XT5.hD91A3fiJy/dGw55K', NULL, '926361675', 'M', '1999-12-02'),
	(776, '28855468', NULL, 'Maria', 'Rodriguez', 'Vargas', 'maria729@example.com', '$2y$10$pEk7fzSORx.kTc4cnuxf2.mg8LhVLkVIr8ilsu/L7WHEAqFIWCXL.', NULL, '966196103', 'F', '1999-12-02'),
	(777, '48488152', NULL, 'Sofia', 'Lopez', 'Gomez', 'sofia492@example.com', '$2y$10$WNThBTuIBnAkc3ESeKVttOohSo3cQ/ShVKvhVSsE4eWac48CJuHZS', NULL, '962970054', 'M', '1998-12-02'),
	(778, '55479346', NULL, 'Laura', 'Fernandez', 'Torres', 'laura468@example.com', '$2y$10$gBOYmYrUQU/Ni/68xlnB9ufgOmfwF20SwLkhEJLZVYpiLvjercKom', NULL, '938185571', 'F', '2002-12-02'),
	(779, '39207380', NULL, 'Ana', 'Fernandez', 'Molina', 'ana545@example.com', '$2y$10$aYyd3jHcSIynG7lycS6b7ea7fdo7xKQDrVPmW7yiFzWjTZWWrw7fe', NULL, '939970514', 'M', '2000-12-02'),
	(780, '38923822', NULL, 'Pedro', 'Martinez', 'Molina', 'pedro443@example.com', '$2y$10$tgWJWHuFnlTraWWtnpGAmOlChY1hqDp.rnBKcFgzAaG0sj2ESNKJy', NULL, '929910680', 'M', '2002-12-02'),
	(781, '99579528', NULL, 'Carlos', 'Garcia', 'Molina', 'carlos483@example.com', '$2y$10$dpuXMjnddbB9ow372DYQNOtmvzlPBhA9uFxEfveqVeO.QHdcjj5ae', NULL, '980545354', 'M', '2001-12-02'),
	(782, '67085799', NULL, 'Ana', 'Rodriguez', 'Gomez', 'ana127@example.com', '$2y$10$BldDeL6SwUlyVgUEjKTv3eQak2IFessx9MJAkth8jw2epwpQCbjO2', NULL, '931994269', 'M', '2003-12-02'),
	(783, '12013178', NULL, 'Maria', 'Lopez', 'Molina', 'maria984@example.com', '$2y$10$mVqvFPArMyaLfgwi0Eq12.DYjzBgUtkxU0xd8J4aXSOmzbZhB83qe', NULL, '999370969', 'F', '2002-12-02'),
	(784, '74610627', NULL, 'Maria', 'Rodriguez', 'Sanchez', 'maria828@example.com', '$2y$10$PiNHO2g//KLstN3kUh8qJO5U6Zv9P/M1LTSB0YZCR8RaTftuxLAaG', NULL, '941910156', 'M', '2003-12-02'),
	(785, '22046346', NULL, 'Luis', 'Rodriguez', 'Sanchez', 'luis456@example.com', '$2y$10$04SOW6Xp1EPU1fpUI32DPuLXc.WJ28z/lrYVzhFoXexCqwKTZalza', NULL, '998254949', 'F', '2002-12-02'),
	(786, '42956357', NULL, 'Laura', 'Lopez', 'Gomez', 'laura170@example.com', '$2y$10$mVI5iIV801Vq0MFnCzCguOLKUqzIkjeMe72Na/xb.MTIdmvZoDr6K', NULL, '950272994', 'F', '2003-12-02'),
	(787, '89026148', NULL, 'Maria', 'Rodriguez', 'Diaz', 'maria872@example.com', '$2y$10$KhtbmAd0KKE5pJ15M6xnLOaUf2P1omlMCmudnjnMXkCM0NJUMsoj6', NULL, '987391035', 'M', '2004-12-02'),
	(788, '19403186', NULL, 'Laura', 'Rodriguez', 'Sanchez', 'laura848@example.com', '$2y$10$UyXoJpL9oKW0wdh/WBq2/..AyLXwhprKYbSy6kp5mny107dwYVICW', NULL, '952165500', 'F', '2002-12-02'),
	(789, '56140683', NULL, 'Carlos', 'Rodriguez', 'Sanchez', 'carlos849@example.com', '$2y$10$WvJqfHuwzx1Lr4Rt2lLx3ufPawWfxFGan8PZPiU9K0z08bDMxQzAq', NULL, '934228627', 'M', '1999-12-02'),
	(790, '40200959', NULL, 'Maria', 'Fernandez', 'Sanchez', 'maria783@example.com', '$2y$10$loYi3SYf8lAnRVEg.ojo9.EzRO1FlCz4nibeYaESrLT5wrrpeRXe.', NULL, '979687793', 'M', '2001-12-02'),
	(791, '10997011', NULL, 'alert(&quot;Hola, mundo!&quot;);', 'Garcia', 'Sanchez', 'sofia316@example.com', '$2y$10$LcHCMTS/aOuFFbgs/3slmOhit4DUyRfJAsgoA4/lZI..GSEN36.1m', NULL, '945230779', 'F', '2003-12-02'),
	(792, '43768883', NULL, 'Juan', 'Rodriguez', 'Torres', 'juan213@example.com', '$2y$10$z0UcZliK0WkwoM3me9gCxOOYmXZa8J.KFvjwAXQF4uyDAKgnbHCCm', NULL, '945866233', 'M', '2002-12-02'),
	(793, '75012424', NULL, 'Maria', 'Perez', 'Vargas', 'maria894@example.com', '$2y$10$cuzk8IRLl9vmb2zcvK47pOIWniD/Z7FtWfnyZsIcAXqNfCc85vsRe', NULL, '973205460', 'M', '1999-12-02'),
	(794, '59143766', NULL, 'Maria', 'Fernandez', 'Gomez', 'maria297@example.com', '$2y$10$1AYiMN1FMOGZqSlmrsrqd.mUVjIXqK6DES7uoGVONkT/RnPVHkP9m', NULL, '911429291', 'M', '2004-12-02'),
	(795, '98392289', NULL, 'Juan', 'Martinez', 'Sanchez', 'juan542@example.com', '$2y$10$YkASBxRxwXPRti6UqTvlr.ubHWGhqFoKZQAfJwHtp5C/8VDwEsTEW', NULL, '945764770', 'M', '1998-12-02'),
	(796, '63607676', NULL, 'Juan', 'Garcia', 'Gomez', 'juan486@example.com', '$2y$10$YIQ7NGY3dGsd/8ab.WaNt./61mxF2bLJWH3qyBKiyrzVtveDv8YWq', NULL, '956184940', 'F', '2001-12-02'),
	(797, '56655152', NULL, 'Pedro', 'Garcia', 'Sanchez', 'pedro576@example.com', '$2y$10$YG.Rw3V6SsDHDfOmorV8oeRqnR435ld0.UdNiK71rL8NkPvVMmyt.', NULL, '974329649', 'M', '2002-12-02'),
	(798, '91321069', NULL, 'Laura', 'Garcia', 'Sanchez', 'laura698@example.com', '$2y$10$wSNi0elX7uA23Hny8lbHoOcd2FxMw0Thp3g243mH3yOhiEJlhM13K', NULL, '955841523', 'M', '1998-12-02'),
	(799, '81466688', NULL, 'Sofia', 'Martinez', 'Molina', 'sofia685@example.com', '$2y$10$cKfWZinq0L.agrmZ87jYzO9Yb3J.bFgMu1FMT11Y0WmCjbvK2cnOq', NULL, '979740801', 'F', '2001-12-02'),
	(800, '94006850', NULL, 'Ana', 'Perez', 'Gomez', 'ana190@example.com', '$2y$10$nkvp6qTGSURmJfwjy5.E0ONMIAXLeVK1TiBZR95cMaIW7G.vf2Zum', NULL, '969503015', 'F', '2003-12-02'),
	(801, '53914027', NULL, 'Laura', 'Rodriguez', 'Gomez', 'laura331@example.com', '$2y$10$O9tUobNxFbk2lNAlOj7SMOSvOeX0OSsMKyEQctW/EsZf7NC1tUjiy', NULL, '955243839', 'F', '2001-12-02'),
	(802, '10937097', NULL, 'Laura xd xd', 'Fernandez', 'Vargas', 'laura786@example.com', '$2y$10$TcoKkCJDdGe3lxJY0cX5VOt.dQyKhCMOwq43UloTiqDCIlhEavIyW', NULL, '913790082', 'F', '2000-12-02'),
	(803, '31482876', NULL, 'Maria', 'Rodriguez', 'Vargas', 'maria751@example.com', '$2y$10$KMh94TgamqF9inGlaJxq7.2k/39xMbK5/UQR2ind8WIgXVs6EBVOy', NULL, '990984587', 'M', '2000-12-02'),
	(804, '12567719', NULL, 'Juan', 'Lopez', 'Vargas', 'juan627@example.com', '$2y$10$7OOlwldeC6OqGojVsoUOiOR0mEHszVMiwoEtY6uinfhjsgBOC06rG', NULL, '925756666', 'F', '2002-12-02'),
	(805, '42848326', NULL, 'Luis', 'Rodriguez', 'Sanchez', 'luis318@example.com', '$2y$10$0lxya0VBKggaJDiwFttMtOB4/LPXgRogDwqqPdvZ4Xt416HLuU6ky', NULL, '992562217', 'M', '2005-12-02'),
	(806, '75865358', NULL, 'Juan', 'Perez', 'Molina', 'juan838@example.com', '$2y$10$MRmv0Ncqm67xCNM85/ntQuK6SOLntU4ojkLn/kJ3.FVQ1u9HR095e', NULL, '979475031', 'M', '2003-12-02'),
	(807, '54467613', NULL, 'Pedro', 'Lopez', 'Vargas', 'pedro297@example.com', '$2y$10$iUZGP6IVsf7cT5UYCGnIQe1e9tT3NQ7xaXRsN0vFCWgJm6/t6rF.6', NULL, '917858853', 'F', '2005-12-02'),
	(808, '85021858', NULL, 'Luis', 'Rodriguez', 'Sanchez', 'luis671@example.com', '$2y$10$18b7p5ApZaa5KOHGwZJJl.Epn7XrQTY.78Nt2PVmprPZdJcHCNtR6', NULL, '943442213', 'F', '1999-12-02'),
	(809, '11603529', NULL, 'Sofia', 'Lopez', 'Diaz', 'sofia916@example.com', '$2y$10$qXyphA/.KiVGJbpvtTbyl.2TqC9Wpffzz8YryAid6Y7tXHegrqKjG', NULL, '926613170', 'F', '2002-12-02'),
	(810, '36153292', NULL, 'Maria', 'Martinez', 'Sanchez', 'maria471@example.com', '$2y$10$uWr6Q97gEsQZyOekAZRfLuJ/dO6ceiy4T2hm44M3Po51g0NrJtypC', NULL, '994182740', 'M', '2004-12-02'),
	(811, '69348074', NULL, 'Laura', 'Martinez', 'Gomez', 'laura725@example.com', '$2y$10$mrgxrA7lmIFwcCDW1alkYOGv/sRv6HJo9QJ6nrhmTjEmLoibhiCqq', NULL, '914331769', 'M', '2005-12-02'),
	(812, '83209587', NULL, 'Pedro', 'Martinez', 'Torres', 'pedro123@example.com', '$2y$10$7lqgGZcgsxRwngr8KxtxHOWFYMcNbtwJEJfgl4hEgiWnpHwPAuftC', NULL, '995161042', 'M', '2003-12-02'),
	(813, '99926397', NULL, 'Pedro', 'Garcia', 'Sanchez', 'pedro353@example.com', '$2y$10$SHxRrcTQB203rz3q2Ifnleha/VtA6UgKoAk5k101O6b4Vjuw49FvG', NULL, '948121670', 'F', '1998-12-02'),
	(814, '53403910', NULL, 'Sofia', 'Garcia', 'Torres', 'sofia248@example.com', '$2y$10$XHPiawiOrPVjIjGedKS5pueNrxB0oh1yRHKkUWzyVyEgomnTmgJbm', NULL, '929351230', 'M', '2001-12-02'),
	(815, '23665410', NULL, 'Ana', 'Lopez', 'Molina', 'ana450@example.com', '$2y$10$hrHjRmx8/mt5Rf5ynB3.EeeZ8.84KF9GDcNvGrmz72jAIAieFkBp2', NULL, '922097587', 'M', '2002-12-02');

-- Volcando estructura para tabla edusmart_v2.calificaciones
CREATE TABLE IF NOT EXISTS `calificaciones` (
  `id_calificacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) DEFAULT NULL,
  `id_examen` int(11) DEFAULT NULL,
  `matricula` varchar(50) DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `tipo` enum('Individual','Equipo') DEFAULT NULL,
  PRIMARY KEY (`id_calificacion`),
  KEY `matricula` (`matricula`),
  KEY `FK_calificaciones_examenes` (`id_examen`),
  KEY `FK_calificaciones_alumnos` (`id_alumno`),
  CONSTRAINT `FK_calificaciones_alumnos` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.calificaciones: ~0 rows (aproximadamente)

-- Volcando estructura para tabla edusmart_v2.contenido_tematico
CREATE TABLE IF NOT EXISTS `contenido_tematico` (
  `id_contenido` int(11) NOT NULL AUTO_INCREMENT,
  `id_subtema` int(11) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `nombre_archivo` varchar(100) DEFAULT NULL,
  `tipo` enum('Video','infografia') DEFAULT NULL,
  PRIMARY KEY (`id_contenido`),
  KEY `FK_contenido_tematico_unidades_tematicas` (`id_subtema`) USING BTREE,
  CONSTRAINT `FK_contenido_tematico_subtemas` FOREIGN KEY (`id_subtema`) REFERENCES `subtemas` (`id_subtema`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.contenido_tematico: ~0 rows (aproximadamente)

-- Volcando estructura para tabla edusmart_v2.docentes
CREATE TABLE IF NOT EXISTS `docentes` (
  `id_docente` int(11) NOT NULL AUTO_INCREMENT,
  `id_institucion` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `app` varchar(50) DEFAULT NULL,
  `apm` varchar(50) DEFAULT NULL,
  `correo_electronico` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_docente`),
  KEY `FK_docentes_institucion` (`id_institucion`),
  CONSTRAINT `FK_docentes_institucion` FOREIGN KEY (`id_institucion`) REFERENCES `institucion` (`id_institucion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.docentes: ~0 rows (aproximadamente)
INSERT INTO `docentes` (`id_docente`, `id_institucion`, `nombre`, `app`, `apm`, `correo_electronico`, `password`) VALUES
	(14, 1, 'Jesus', 'Garcia', 'Caballero', 'garciacaballerojesus285@gmail.com', '1886ec9f735e3ef2801fbfd213864fbb2a76926b7072f5919f522654e09afe4c');

-- Volcando estructura para tabla edusmart_v2.equipos
CREATE TABLE IF NOT EXISTS `equipos` (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_equipo` varchar(100) DEFAULT NULL,
  `numero_integrantes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_equipo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.equipos: ~3 rows (aproximadamente)
INSERT INTO `equipos` (`id_equipo`, `nombre_equipo`, `numero_integrantes`) VALUES
	(4, 'Equipo 1', 5),
	(5, '', 0),
	(6, 'idk', 5),
	(7, 'Tu puta madre', 8);

-- Volcando estructura para tabla edusmart_v2.equipoxalumno
CREATE TABLE IF NOT EXISTS `equipoxalumno` (
  `id_alumno` int(11) DEFAULT NULL,
  `id_equipo` int(11) DEFAULT NULL,
  KEY `FK_equipoxalumno_alumnos` (`id_alumno`),
  KEY `FK_equipoxalumno_equipos` (`id_equipo`),
  CONSTRAINT `FK_equipoxalumno_alumnos` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_equipoxalumno_equipos` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.equipoxalumno: ~1 rows (aproximadamente)
INSERT INTO `equipoxalumno` (`id_alumno`, `id_equipo`) VALUES
	(802, 4);

-- Volcando estructura para tabla edusmart_v2.examenes
CREATE TABLE IF NOT EXISTS `examenes` (
  `id_examen` int(11) NOT NULL AUTO_INCREMENT,
  `id_docente` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `id_unidad` int(11) DEFAULT NULL,
  `tipo_examen` enum('Individual','Equipo') DEFAULT NULL,
  `fecha_examen` date DEFAULT NULL,
  PRIMARY KEY (`id_examen`),
  KEY `FK_examenes_unidades_tematicas` (`id_unidad`),
  KEY `FK_examenes_docentes` (`id_docente`),
  KEY `FK_examenes_materias` (`id_materia`),
  CONSTRAINT `FK_examenes_docentes` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id_docente`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_examenes_materias` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_examenes_unidades_tematicas` FOREIGN KEY (`id_unidad`) REFERENCES `unidades_tematicas` (`id_unidad`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.examenes: ~2 rows (aproximadamente)
INSERT INTO `examenes` (`id_examen`, `id_docente`, `id_materia`, `id_unidad`, `tipo_examen`, `fecha_examen`) VALUES
	(16, 14, 45, 10, 'Individual', '2023-12-14'),
	(17, 14, 46, 10, 'Equipo', '2023-12-03');

-- Volcando estructura para tabla edusmart_v2.gamificacion
CREATE TABLE IF NOT EXISTS `gamificacion` (
  `id_ranking` int(11) NOT NULL AUTO_INCREMENT,
  `id_examen` int(11) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `puntaje` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ranking`),
  KEY `FK_gamificacion_examenes` (`id_examen`),
  KEY `FK_gamificacion_alumnos` (`id_alumno`),
  KEY `FK_gamificacion_materias` (`id_materia`),
  CONSTRAINT `FK_gamificacion_alumnos` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_gamificacion_examenes` FOREIGN KEY (`id_examen`) REFERENCES `examenes` (`id_examen`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_gamificacion_materias` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.gamificacion: ~0 rows (aproximadamente)

-- Volcando estructura para tabla edusmart_v2.gamificacion_equipos
CREATE TABLE IF NOT EXISTS `gamificacion_equipos` (
  `id_ranking` int(11) NOT NULL AUTO_INCREMENT,
  `id_examen` int(11) DEFAULT NULL,
  `id_equipo` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `puntaje` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ranking`),
  KEY `FK_gamificacion_equipos_examenes` (`id_examen`),
  KEY `FK_gamificacion_equipos_equipos` (`id_equipo`),
  KEY `FK_gamificacion_equipos_materias` (`id_materia`),
  CONSTRAINT `FK_gamificacion_equipos_equipos` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_gamificacion_equipos_examenes` FOREIGN KEY (`id_examen`) REFERENCES `examenes` (`id_examen`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_gamificacion_equipos_materias` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.gamificacion_equipos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla edusmart_v2.institucion
CREATE TABLE IF NOT EXISTS `institucion` (
  `id_institucion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_institucion`),
  KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.institucion: ~0 rows (aproximadamente)
INSERT INTO `institucion` (`id_institucion`, `nombre`, `tipo`, `correo`) VALUES
	(1, 'UTS', 'Universidad Tecnologica', 'uts@uts');

-- Volcando estructura para tabla edusmart_v2.materias
CREATE TABLE IF NOT EXISTS `materias` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_materia` varchar(100) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `id_docente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_materia`),
  KEY `FK_materias_docentes` (`id_docente`),
  CONSTRAINT `FK_materias_docentes` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id_docente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.materias: ~4 rows (aproximadamente)
INSERT INTO `materias` (`id_materia`, `nombre_materia`, `img`, `id_docente`) VALUES
	(45, 'Base de datos', '../../files/uploads/cover_656be0407bcba6.20907492_linecons_e0214_256.png', 14),
	(46, 'Desarrollo web responsivo', '../../files/uploads/cover_656be0be29b692.42473748_WEB.png', 14),
	(47, 'Negociación empresarial', '../../files/uploads/cover_656be199d7c423.71144257_download.png', 14),
	(49, 'Metodologías para el desarrollo de proyectos', '../../files/uploads/cover_656bea96e7d793.57922793_xd.png', 14);

-- Volcando estructura para tabla edusmart_v2.materiaxalumno
CREATE TABLE IF NOT EXISTS `materiaxalumno` (
  `id_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `id_materia` int(11) DEFAULT NULL,
  `id_docente` int(11) DEFAULT NULL,
  KEY `FK_materiaxalumno_materias` (`id_materia`),
  KEY `FK_materiaxalumno_docentes` (`id_docente`),
  KEY `FK_materiaxalumno_alumnos` (`id_alumno`),
  CONSTRAINT `FK_materiaxalumno_alumnos` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE CASCADE,
  CONSTRAINT `FK_materiaxalumno_docentes` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id_docente`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_materiaxalumno_materias` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.materiaxalumno: ~0 rows (aproximadamente)

-- Volcando estructura para tabla edusmart_v2.planes_pago
CREATE TABLE IF NOT EXISTS `planes_pago` (
  `id_plan` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `precio` decimal(20,6) DEFAULT NULL,
  PRIMARY KEY (`id_plan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.planes_pago: ~0 rows (aproximadamente)

-- Volcando estructura para tabla edusmart_v2.preguntas
CREATE TABLE IF NOT EXISTS `preguntas` (
  `id_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `id_examen` int(11) DEFAULT NULL,
  `id_unidad` int(11) DEFAULT NULL,
  `tiempo_respuesta` varchar(50) DEFAULT NULL,
  `enunciado` varchar(255) DEFAULT NULL,
  `inciso_a` varchar(255) DEFAULT NULL,
  `inciso_b` varchar(255) DEFAULT NULL,
  `inciso_c` varchar(255) DEFAULT NULL,
  `inciso_d` varchar(255) DEFAULT NULL,
  `respuesta` varchar(255) DEFAULT NULL,
  `multimedia` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pregunta`),
  KEY `FK_preguntas_examenes` (`id_examen`),
  KEY `FK_preguntas_unidades_tematicas` (`id_unidad`),
  CONSTRAINT `FK_preguntas_examenes` FOREIGN KEY (`id_examen`) REFERENCES `examenes` (`id_examen`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_preguntas_unidades_tematicas` FOREIGN KEY (`id_unidad`) REFERENCES `unidades_tematicas` (`id_unidad`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.preguntas: ~2 rows (aproximadamente)
INSERT INTO `preguntas` (`id_pregunta`, `id_examen`, `id_unidad`, `tiempo_respuesta`, `enunciado`, `inciso_a`, `inciso_b`, `inciso_c`, `inciso_d`, `respuesta`, `multimedia`) VALUES
	(7, 16, 10, '20:28:05', 'a', NULL, NULL, NULL, NULL, NULL, NULL),
	(8, 17, 10, NULL, 's', NULL, NULL, NULL, NULL, NULL, NULL);

-- Volcando estructura para tabla edusmart_v2.respuesta
CREATE TABLE IF NOT EXISTS `respuesta` (
  `id_respuesta` int(11) NOT NULL AUTO_INCREMENT,
  `id_pregunta` int(11) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_equipo` int(11) DEFAULT NULL,
  `respuestas` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_respuesta`),
  KEY `FK_respuesta_preguntas` (`id_pregunta`),
  CONSTRAINT `FK_respuesta_preguntas` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.respuesta: ~0 rows (aproximadamente)

-- Volcando estructura para tabla edusmart_v2.subtemas
CREATE TABLE IF NOT EXISTS `subtemas` (
  `id_subtema` int(11) NOT NULL AUTO_INCREMENT,
  `id_tema` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_subtema`),
  KEY `FK_subtemas_tema` (`id_tema`),
  CONSTRAINT `FK_subtemas_tema` FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id_tema`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.subtemas: ~6 rows (aproximadamente)
INSERT INTO `subtemas` (`id_subtema`, `id_tema`, `nombre`) VALUES
	(14, 8, '123'),
	(15, 8, '123'),
	(16, 9, '123'),
	(17, NULL, '123'),
	(18, NULL, '123123'),
	(19, NULL, '12313');

-- Volcando estructura para tabla edusmart_v2.tema
CREATE TABLE IF NOT EXISTS `tema` (
  `id_tema` int(11) NOT NULL AUTO_INCREMENT,
  `id_unidad` int(11) DEFAULT NULL,
  `materia` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_tema`),
  KEY `FK_tema_unidades_tematicas` (`id_unidad`),
  KEY `FK_tema_materias` (`materia`),
  CONSTRAINT `FK_tema_materias` FOREIGN KEY (`materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tema_unidades_tematicas` FOREIGN KEY (`id_unidad`) REFERENCES `unidades_tematicas` (`id_unidad`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.tema: ~2 rows (aproximadamente)
INSERT INTO `tema` (`id_tema`, `id_unidad`, `materia`, `nombre`) VALUES
	(8, 10, 45, 'a'),
	(9, 10, 46, 'xd');

-- Volcando estructura para tabla edusmart_v2.unidades_tematicas
CREATE TABLE IF NOT EXISTS `unidades_tematicas` (
  `id_unidad` int(11) NOT NULL AUTO_INCREMENT,
  `id_materia` int(11) DEFAULT NULL,
  `nombre_unidad` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_unidad`),
  KEY `FK_unidades_tematicas_materias` (`id_materia`),
  CONSTRAINT `FK_unidades_tematicas_materias` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla edusmart_v2.unidades_tematicas: ~0 rows (aproximadamente)
INSERT INTO `unidades_tematicas` (`id_unidad`, `id_materia`, `nombre_unidad`) VALUES
	(10, 45, 'xd');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
