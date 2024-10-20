-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 19-10-2024 a las 00:47:38
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
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `contraseña` int NOT NULL,
  `usuario` text COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `contraseña`, `usuario`) VALUES
(1, 1232024, 'admin previas');

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
  `contraseña` int NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`dni`, `nombre`, `apellido`, `correo`, `contraseña`) VALUES
(46852794, 'Tiara Guadalupe', 'Bneitez', 'tiarasb689@gmail.com', 46852794);

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
-- Estructura de tabla para la tabla `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id_cursos` int NOT NULL AUTO_INCREMENT,
  `id_nivel` int NOT NULL,
  `dni_alumno` int NOT NULL,
  PRIMARY KEY (`id_cursos`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_cursos`, `id_nivel`, `dni_alumno`) VALUES
(2, 6, 46852794);

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
  PRIMARY KEY (`id_dato`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `division`
--

DROP TABLE IF EXISTS `division`;
CREATE TABLE IF NOT EXISTS `division` (
  `id_division` int NOT NULL AUTO_INCREMENT,
  `division` varchar(1) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_division`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `division`
--

INSERT INTO `division` (`id_division`, `division`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'F'),
(7, 'G'),
(8, 'H'),
(9, 'I');

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
-- Estructura de tabla para la tabla `instancia`
--

DROP TABLE IF EXISTS `instancia`;
CREATE TABLE IF NOT EXISTS `instancia` (
  `id_instancia` int NOT NULL AUTO_INCREMENT,
  `id_meses` int NOT NULL,
  `anio` int NOT NULL,
  PRIMARY KEY (`id_instancia`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `instancia`
--

INSERT INTO `instancia` (`id_instancia`, `id_meses`, `anio`) VALUES
(1, 7, 2024),
(2, 7, 2024),
(3, 12, 2024),
(4, 2, 2025);

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
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

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
(14, 'Programacion web', 6),
(16, 'Lengua', 1),
(17, 'Dibujo tecnico I', 1),
(18, 'Biologia', 1),
(19, 'Formacion etica y Ciud', 1),
(20, 'Matematica', 1),
(21, 'Tecnologia', 1),
(22, 'educacion fisica', 1),
(23, 'Historia', 1),
(24, 'Geografia', 1),
(25, 'Educacion fisica ', 5),
(26, 'Programacion II', 5),
(27, 'Psicologia', 5),
(28, 'Laboratorio de software III', 5),
(29, 'Matematica', 5),
(30, 'Redes II', 5),
(31, 'Seguridad informatica', 5),
(32, 'Laboratorio de hardware III', 5),
(33, 'Bases de datos II', 5),
(34, 'Economia', 5),
(35, 'Tecnicas digitales', 5),
(36, 'Lengua', 5),
(37, 'Ingles', 5),
(38, 'Sistema de informacion contable', 5),
(39, 'Educacion fisica', 5),
(40, 'Practica', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

DROP TABLE IF EXISTS `mesas`;
CREATE TABLE IF NOT EXISTS `mesas` (
  `id_mesas` int NOT NULL AUTO_INCREMENT,
  `id_materia` int NOT NULL,
  `fecha` date NOT NULL,
  `horario` time NOT NULL,
  `id_instancia` int NOT NULL,
  PRIMARY KEY (`id_mesas`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id_mesas`, `id_materia`, `fecha`, `horario`, `id_instancia`) VALUES
(1, 2, '2024-02-24', '15:30:00', 0),
(2, 2, '2024-10-09', '22:10:00', 0),
(3, 1, '2024-10-07', '18:20:00', 0),
(4, 7, '2024-10-18', '07:00:00', 2),
(5, 9, '2024-10-18', '07:00:00', 2),
(6, 7, '2024-10-18', '07:00:00', 3),
(7, 9, '2024-10-18', '07:00:00', 3),
(8, 9, '2024-10-07', '07:00:00', 3),
(9, 11, '2025-02-03', '07:00:00', 4),
(11, 13, '2024-10-09', '17:01:33', 2);

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
-- Estructura de tabla para la tabla `nivel`
--

DROP TABLE IF EXISTS `nivel`;
CREATE TABLE IF NOT EXISTS `nivel` (
  `id_nivel` int NOT NULL AUTO_INCREMENT,
  `nivel` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_division` int NOT NULL,
  PRIMARY KEY (`id_nivel`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`id_nivel`, `nivel`, `id_division`) VALUES
(1, '1ro', 1),
(2, '2do', 1),
(3, '3ro', 1),
(4, '4to', 1),
(5, '5to', 1),
(6, '6to', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preceptores`
--

DROP TABLE IF EXISTS `preceptores`;
CREATE TABLE IF NOT EXISTS `preceptores` (
  `id_preces` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contraseña` int NOT NULL,
  PRIMARY KEY (`id_preces`)
) ENGINE=MyISAM AUTO_INCREMENT=212125 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `preceptores`
--

INSERT INTO `preceptores` (`id_preces`, `nombre`, `apellido`, `correo`, `contraseña`) VALUES
(1, 'Analia', 'Apellido', 'analia@gmail.com', 223344);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `previas`
--

DROP TABLE IF EXISTS `previas`;
CREATE TABLE IF NOT EXISTS `previas` (
  `id_previas` int NOT NULL AUTO_INCREMENT,
  `dni_alumnos` int NOT NULL,
  `id_materia` int NOT NULL,
  PRIMARY KEY (`id_previas`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `previas`
--

INSERT INTO `previas` (`id_previas`, `dni_alumnos`, `id_materia`) VALUES
(2, 46852794, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

DROP TABLE IF EXISTS `profesores`;
CREATE TABLE IF NOT EXISTS `profesores` (
  `id_profes` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contraseña` int NOT NULL,
  PRIMARY KEY (`id_profes`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_profes`, `nombre`, `apellido`, `correo`, `contraseña`) VALUES
(2, 'Luis', 'Galeano', 'luis.eduardo.galeano@gmail.com', 112233);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talleres`
--

DROP TABLE IF EXISTS `talleres`;
CREATE TABLE IF NOT EXISTS `talleres` (
  `id_talleres` int NOT NULL AUTO_INCREMENT,
  `id_año` int NOT NULL,
  `talleres` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_talleres`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `talleres`
--

INSERT INTO `talleres` (`id_talleres`, `id_año`, `talleres`) VALUES
(1, 1, 'Hojalateria'),
(2, 1, 'Carpinteria'),
(3, 1, 'Higiene y seguridad'),
(4, 1, 'Ajuste Mecanico'),
(5, 1, 'Electricidad'),
(6, 1, 'Informatica'),
(7, 2, 'Carpinteria II'),
(8, 2, 'Ajuste Mecanico II'),
(9, 2, 'Herreria y soldadura'),
(10, 2, 'Higiene y seguridad II'),
(11, 2, 'Elecctricidad II'),
(12, 2, 'Informatica II');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

DROP TABLE IF EXISTS `turno`;
CREATE TABLE IF NOT EXISTS `turno` (
  `id_turno` int NOT NULL AUTO_INCREMENT,
  `turno` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_turno`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`id_turno`, `turno`) VALUES
(1, 'Mañana'),
(2, 'Tarde');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
