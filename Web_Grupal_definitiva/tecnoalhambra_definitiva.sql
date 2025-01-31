-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2025 a las 08:57:35
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tecnoalhambra_definitiva`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `ID` int(11) NOT NULL,
  `remitente` varchar(50) NOT NULL,
  `texto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`ID`, `remitente`, `texto`) VALUES
(1, 'Mario', 'hola buenas'),
(2, 'Mario', 'hola buenas'),
(3, 'jjj', 'hhhhh'),
(4, 'jjj', 'hhhhh'),
(5, 'Mario', 'eeeee');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `descuento` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `foto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`, `foto`) VALUES
(1, 'HP Pavilion Gaming', 'Ryzen 5 4600H / GeForce GTX 1650 4GB / 8GB DDR4 / 512GB SSD', 799, 10, 50, '1.png'),
(2, 'Dell Alienware m15', 'Intel Core i7-10750H / GeForce RTX 3060 6GB / 16GB DDR4 / 1TB SSD', 1499, 15, 30, '2.png'),
(3, 'Asus ROG Strix G15', 'AMD Ryzen 7 5800H / GeForce RTX 3070 8GB / 16GB DDR4 / 1TB SSD', 1799, 5, 20, '3.png'),
(4, 'Lenovo Legion 5', 'AMD Ryzen 5 5600H / GeForce GTX 1650 4GB / 8GB DDR4 / 512GB SSD', 949, 20, 40, '4.png\r\n'),
(5, 'MSI GE66 Raider', 'Intel Core i9-11980HK / GeForce RTX 3080 16GB / 32GB DDR4 / 1TB SSD', 2399, 10, 25, '5.png\r\n'),
(6, 'Acer Predator Helios 300', 'Intel Core i7-11800H / GeForce RTX 3070 8GB / 16GB DDR4 / 1TB SSD', 1699, 12, 35, '7.png\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `orden` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `usuario`, `password`) VALUES
(4, 'admin', 'accesobackend');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
