-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2023 a las 18:50:59
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reserveit`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `edificio` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`id`, `nombre`, `descripcion`, `edificio`) VALUES
(1, 'Laboratorio de Gestion', 'Laboratorio compartido de gestión y sistemas', 'Edificio D'),
(3, 'Laboratorio de redes', 'Laboratorio de redes a cargo de Richard', 'Edificio E'),
(4, 'Redes', 'Nuevo laboratorio', 'Edificio E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `id` int(11) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `edificio` varchar(50) NOT NULL,
  `reporta` varchar(50) NOT NULL,
  `laboratorio` varchar(60) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`id`, `titulo`, `edificio`, `reporta`, `laboratorio`, `descripcion`, `fecha`) VALUES
(5, 'limpieza', 'Edificio E', 'Paola Sánches Medina', 'Laboratorio de Gestion', 'Mesas y sillas se encuentran muy sucias', '2023-04-18'),
(6, 'Necesito pruebas', 'Edificio E', 'Jesús', 'Laboratorio de Gestion', 'La aula se encuentra muy sucia por lo que necesito reportes de prueba', '2023-05-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` text NOT NULL,
  `rol` varchar(28) NOT NULL DEFAULT 'Alumno'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `correo`, `usuario`, `clave`, `rol`) VALUES
(13, 'Paola Sánches Medina', 'paola@gmail.com', 'Pao16', '123457', 'Alumno'),
(14, 'Jesús', 'l18141049@queretaro.tecnm.mx', 'jesush', 'contraseña', 'Alumno'),
(15, 'Adrian', 'l18141029@queretaro.tecnm.mx', 'adrian', 'adrian', 'Administrador'),
(16, 'Guadaluper Martínez Moreno', 'l1814145029@queretaro.tecnm.mx', 'lalupe', 'lalupe', 'Alumno');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
