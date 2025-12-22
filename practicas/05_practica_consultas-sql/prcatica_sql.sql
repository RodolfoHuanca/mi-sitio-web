-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 22-12-2025 a las 00:18:08
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practica_sql`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `credito` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `nombre`, `credito`) VALUES
(1, 'Ingenieria de Sistemas', 5),
(2, 'Matematica Basica', 4),
(3, 'Fisica I', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `fechanac` date DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `cursoId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `nombres`, `apellidos`, `fechanac`, `edad`, `cursoId`) VALUES
(1, 'Juan', 'Condori', '2000-05-15', 23, 1),
(2, 'Maria', 'Gomez', '2005-08-20', 18, 1),
(3, 'Carlos', 'Ruiz', '1999-01-10', 25, 2),
(4, 'Ana', 'Torres', '2006-12-01', 17, 1),
(6, 'Luisa', 'Quispe', '2012-07-07', 11, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
