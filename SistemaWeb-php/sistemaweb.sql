-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2016 a las 18:10:24
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fabrica`
--

CREATE TABLE `fabrica` (
  `IdFabrica` int(11) NOT NULL,
  `NombreFabrica` varchar(80) NOT NULL,
  `Ubicacion` varchar(100) NOT NULL,
  `Lider` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fabrica`
--

INSERT INTO `fabrica` (`IdFabrica`, `NombreFabrica`, `Ubicacion`, `Lider`) VALUES
(1, 'Fabrica001', 'Ubicacion001', 'User001'),
(2, 'Fabrica002', 'Ubicacion002', 'User002'),
(3, 'Fabrica003', 'Ubicacion003', 'User003'),
(4, 'Fabrica004', 'Ubicacion004', 'User004');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hibernate_sequence`
--

CREATE TABLE `hibernate_sequence` (
  `next_val` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hibernate_sequence`
--

INSERT INTO `hibernate_sequence` (`next_val`) VALUES
(1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `IdPunto` int(11) NOT NULL,
  `IdFabrica` int(11) NOT NULL,
  `NombrePunto` varchar(80) NOT NULL,
  `Ubicacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`IdPunto`, `IdFabrica`, `NombrePunto`, `Ubicacion`) VALUES
(1, 1, 'Sucursal001', 'Ubicacion001'),
(2, 1, 'Sucursal002', 'Ubicacion002'),
(3, 1, 'Sucursal003', 'Ubicacion003'),
(4, 2, 'Sucursal001', 'Ubicacion001'),
(5, 2, 'Sucursal002', 'Ubicacion002'),
(6, 2, 'Sucursal003', 'Ubicacion003'),
(7, 3, 'Sucursal001', 'Ubicacion001'),
(8, 3, 'Sucursal002', 'Ubicacion002'),
(9, 3, 'Sucursal003', 'Ubicacion003'),
(10, 4, 'Sucursal001', 'Ubicacion001'),
(11, 4, 'Sucursal002', 'Ubicacion002'),
(12, 4, 'Sucursal003', 'Ubicacion003');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `Usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `Pass`, `Usuario`) VALUES
(1, '11111', 'Admin123'),
(2, '22222', 'User001'),
(3, '33333', 'User002'),
(4, '44444', 'User003'),
(5, '55555', 'User004');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `IdVenta` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Fecha` varchar(20) NOT NULL,
  `IdFabrica` int(11) NOT NULL,
  `IdPunto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`IdVenta`, `Cantidad`, `Fecha`, `IdFabrica`, `IdPunto`) VALUES
(1, 8900, '2016-10-15', 1, 1),
(2, 7800, '2016-10-15', 1, 2),
(3, 8800, '2016-10-15', 1, 3),
(4, 9400, '2016-10-15', 2, 4),
(5, 8100, '2016-10-15', 2, 5),
(6, 9200, '2016-10-15', 2, 6),
(7, 8900, '2016-10-15', 3, 7),
(8, 9200, '2016-10-15', 3, 8),
(9, 8900, '2016-10-15', 3, 9),
(10, 9500, '2016-10-15', 4, 10),
(11, 9300, '2016-10-15', 4, 11),
(12, 9100, '2016-10-15', 4, 12);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fabrica`
--
ALTER TABLE `fabrica`
  ADD PRIMARY KEY (`IdFabrica`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`IdPunto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`IdVenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fabrica`
--
ALTER TABLE `fabrica`
  MODIFY `IdFabrica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `IdPunto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `IdVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
