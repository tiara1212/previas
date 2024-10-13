-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-10-2024 a las 13:13:35
-- Versión del servidor: 8.3.0
-- Versión de PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `previas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `dni` int NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_año` int NOT NULL,
  `contraseña` int NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`dni`, `nombre`, `apellido`, `correo`, `id_año`, `contraseña`) VALUES
(1, 'A', 'A', 'A', 6, 0),
(2, 'a', 'a', 'a', 2, 121221),
(12, 'regre', 'rgregre', 'gregerg', 6, 1),
(1212, 'nkhk', 'knkjb', 'khuibu', 1, 111),
(212112, 'gthtrh', 'htsrhtr', 'htrhrth', 3, 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `año`
--

DROP TABLE IF EXISTS `año`;
CREATE TABLE IF NOT EXISTS `año` (
  `id_año` int NOT NULL AUTO_INCREMENT,
  `año` varchar(3) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_año`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `año`
--

INSERT INTO `año` (`id_año`, `año`) VALUES
(1, '1ro'),
(2, '2do'),
(3, '3ro'),
(4, '4to'),
(5, '5to'),
(6, '6to');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

DROP TABLE IF EXISTS `calificaciones`;
CREATE TABLE IF NOT EXISTS `calificaciones` (
  `id_calificaciones` int NOT NULL,
  `dni_alumno` int NOT NULL,
  `id_materia` int NOT NULL,
  `calificacion` float NOT NULL,
  PRIMARY KEY (`id_calificaciones`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosexamen`
--

DROP TABLE IF EXISTS `datosexamen`;
CREATE TABLE IF NOT EXISTS `datosexamen` (
  `id_dato` int NOT NULL AUTO_INCREMENT,
  `nombre-profe` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_materia` int NOT NULL,
  `id_año` int NOT NULL,
  `temario` varchar(12) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_mesas` int NOT NULL,
  PRIMARY KEY (`id_dato`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

DROP TABLE IF EXISTS `inscripciones`;
CREATE TABLE IF NOT EXISTS `inscripciones` (
  `id_inscripciones` int NOT NULL,
  `dni_alumno` int NOT NULL,
  `id_materia` int NOT NULL,
  `id_mesas` int NOT NULL,
  PRIMARY KEY (`id_inscripciones`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

DROP TABLE IF EXISTS `materia`;
CREATE TABLE IF NOT EXISTS `materia` (
  `id_materia` int NOT NULL AUTO_INCREMENT,
  `materia` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_año` int NOT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `materia`, `id_año`) VALUES
(1, 'Educacion fisica', 6),
(2, 'Ingles', 6),
(3, 'Marco juridico', 6),
(4, 'Proyecto', 6),
(5, 'Sistema operativo de red', 6),
(6, 'Pasantias', 6),
(7, 'Diseño Multimedial', 6),
(8, 'Aplicaciones en redes', 6),
(9, 'Redes III', 6),
(10, 'Mantenimiento de software', 6),
(11, 'Probabilidad y estadistica', 6),
(12, 'Microemprendimiento', 6),
(13, 'Mantenimiento de hardware', 6),
(14, 'Programacion web', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

DROP TABLE IF EXISTS `mesas`;
CREATE TABLE IF NOT EXISTS `mesas` (
  `id_mesas` int NOT NULL,
  `informacion` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_mes` int NOT NULL,
  `id_materia` int NOT NULL,
  `dia` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `horario` time NOT NULL,
  PRIMARY KEY (`id_mesas`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id_mesas`, `informacion`, `id_mes`, `id_materia`, `dia`, `fecha`, `horario`) VALUES
(0, 'Para poder presentarse en la mesa de examen debe rendir a su preceptor/a de turno el permiso de examen.', 1, 2, 'mRTES', '2024-02-24', '15:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meses`
--

DROP TABLE IF EXISTS `meses`;
CREATE TABLE IF NOT EXISTS `meses` (
  `id_mes` int NOT NULL AUTO_INCREMENT,
  `mes` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_mes`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `meses`
--

INSERT INTO `meses` (`id_mes`, `mes`) VALUES
(2, 'Febrero'),
(3, 'Marzo'),
(4, 'Abril'),
(5, 'Mayo'),
(6, 'Junio'),
(7, 'Julio'),
(8, 'Agosto'),
(9, 'Septiempre'),
(10, 'Octubre'),
(11, 'Noviembre'),
(12, 'Diciembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preceptores`
--

DROP TABLE IF EXISTS `preceptores`;
CREATE TABLE IF NOT EXISTS `preceptores` (
  `dni` int NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contraseña` int NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `preceptores`
--

INSERT INTO `preceptores` (`dni`, `nombre`, `apellido`, `correo`, `contraseña`) VALUES
(21, 'sasa', 'sasa', 'sasa', 123),
(11, 'ffbg', 'brtbrs', 'rtbrb', 11),
(2121, 'jbhuyv', 'jhyu', 'kjhugyf', 112233),
(212121, 'vfbb', 'bhrtbst', 'gbhtrgbs', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

DROP TABLE IF EXISTS `profesores`;
CREATE TABLE IF NOT EXISTS `profesores` (
  `dni` int NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contraseña` int NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`dni`, `nombre`, `apellido`, `correo`, `contraseña`) VALUES
(1, 'sasa', 'sasa', 'sasa', 1234),
(121221, 'jhgyfvj', 'jjhugvu', 'jihug7yf', 12122112),
(12, 'FGRG', 'THRTHT', 'HTRHRTH', 1),
(111, 'htrhtr', 'thtrh', 'trhrth', 111);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
