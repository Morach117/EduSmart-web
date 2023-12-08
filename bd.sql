-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for edusmart_v2
CREATE DATABASE IF NOT EXISTS `edusmart_v2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `edusmart_v2`;

-- Dumping structure for table edusmart_v2.alumnos
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(50) NOT NULL DEFAULT '',
  `⁯id_institucion` int(11) DEFAULT NULL,
  `id_docente` int(11) DEFAULT NULL,
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
  KEY `FK_alumnos_docentes` (`id_docente`),
  CONSTRAINT `FK_alumnos_docentes` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id_docente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_alumnos_institucion` FOREIGN KEY (`⁯id_institucion`) REFERENCES `institucion` (`id_institucion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3810 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table edusmart_v2.calificaciones
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

-- Data exporting was unselected.

-- Dumping structure for table edusmart_v2.contenido_tematico
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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table edusmart_v2.docentes
CREATE TABLE IF NOT EXISTS `docentes` (
  `id_docente` int(11) NOT NULL AUTO_INCREMENT,
  `id_institucion` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `app` varchar(50) DEFAULT NULL,
  `apm` varchar(50) DEFAULT NULL,
  `correo_electronico` varchar(100) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_docente`),
  KEY `FK_docentes_institucion` (`id_institucion`),
  CONSTRAINT `FK_docentes_institucion` FOREIGN KEY (`id_institucion`) REFERENCES `institucion` (`id_institucion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table edusmart_v2.equipos
CREATE TABLE IF NOT EXISTS `equipos` (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `id_docente` int(11) DEFAULT NULL,
  `nombre_equipo` varchar(100) DEFAULT NULL,
  `numero_integrantes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_equipo`),
  KEY `FK_equipos_docentes` (`id_docente`),
  CONSTRAINT `FK_equipos_docentes` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id_docente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table edusmart_v2.equipoxalumno
CREATE TABLE IF NOT EXISTS `equipoxalumno` (
  `id_alumno` int(11) DEFAULT NULL,
  `id_equipo` int(11) DEFAULT NULL,
  `id_docente` int(11) DEFAULT NULL,
  KEY `FK_equipoxalumno_alumnos` (`id_alumno`),
  KEY `FK_equipoxalumno_equipos` (`id_equipo`),
  KEY `FK_equipoxalumno_docentes` (`id_docente`),
  CONSTRAINT `FK_equipoxalumno_alumnos` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_equipoxalumno_docentes` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id_docente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_equipoxalumno_equipos` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table edusmart_v2.examenes
CREATE TABLE IF NOT EXISTS `examenes` (
  `id_examen` int(11) NOT NULL AUTO_INCREMENT,
  `id_docente` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `id_unidad` int(11) DEFAULT NULL,
  `tipo_examen` enum('Individual','Equipo') DEFAULT NULL,
  `fecha_examen` date DEFAULT NULL,
  `activo` enum('true','false') DEFAULT 'false',
  PRIMARY KEY (`id_examen`),
  KEY `FK_examenes_unidades_tematicas` (`id_unidad`),
  KEY `FK_examenes_docentes` (`id_docente`),
  KEY `FK_examenes_materias` (`id_materia`),
  CONSTRAINT `FK_examenes_docentes` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id_docente`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_examenes_materias` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_examenes_unidades_tematicas` FOREIGN KEY (`id_unidad`) REFERENCES `unidades_tematicas` (`id_unidad`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table edusmart_v2.gamificacion
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

-- Data exporting was unselected.

-- Dumping structure for table edusmart_v2.gamificacion_equipos
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

-- Data exporting was unselected.

-- Dumping structure for table edusmart_v2.institucion
CREATE TABLE IF NOT EXISTS `institucion` (
  `id_institucion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_institucion`),
  KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table edusmart_v2.materias
CREATE TABLE IF NOT EXISTS `materias` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_materia` varchar(100) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `id_docente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_materia`),
  KEY `FK_materias_docentes` (`id_docente`),
  CONSTRAINT `FK_materias_docentes` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id_docente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table edusmart_v2.materiaxalumno
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
) ENGINE=InnoDB AUTO_INCREMENT=3806 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table edusmart_v2.planes_pago
CREATE TABLE IF NOT EXISTS `planes_pago` (
  `id_plan` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `precio` decimal(20,6) DEFAULT NULL,
  PRIMARY KEY (`id_plan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table edusmart_v2.preguntas
CREATE TABLE IF NOT EXISTS `preguntas` (
  `id_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `id_examen` int(11) DEFAULT NULL,
  `id_unidad` int(11) DEFAULT NULL,
  `tiempo_respuesta` time DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table edusmart_v2.respuesta
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

-- Data exporting was unselected.

-- Dumping structure for table edusmart_v2.subtemas
CREATE TABLE IF NOT EXISTS `subtemas` (
  `id_subtema` int(11) NOT NULL AUTO_INCREMENT,
  `id_tema` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_subtema`),
  KEY `FK_subtemas_tema` (`id_tema`),
  CONSTRAINT `FK_subtemas_tema` FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id_tema`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table edusmart_v2.tema
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table edusmart_v2.unidades_tematicas
CREATE TABLE IF NOT EXISTS `unidades_tematicas` (
  `id_unidad` int(11) NOT NULL AUTO_INCREMENT,
  `id_materia` int(11) DEFAULT NULL,
  `nombre_unidad` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_unidad`),
  KEY `FK_unidades_tematicas_materias` (`id_materia`),
  CONSTRAINT `FK_unidades_tematicas_materias` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
