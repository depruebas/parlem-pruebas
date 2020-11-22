-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-11-2020 a las 10:35:45
-- Versión del servidor: 8.0.22-0ubuntu0.20.04.2
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `PARLEM`
--
CREATE DATABASE IF NOT EXISTS `PARLEM` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `PARLEM`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Customers`
--

CREATE TABLE `Customers` (
  `id` int NOT NULL,
  `docType` varchar(4) DEFAULT NULL,
  `docNum` varchar(10) NOT NULL,
  `email` varchar(250) NOT NULL,
  `givenName` varchar(100) NOT NULL,
  `familyName` varchar(100) NOT NULL,
  `phone` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `enabled` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Customers`
--

INSERT INTO `Customers` (`id`, `docType`, `docNum`, `email`, `givenName`, `familyName`, `phone`, `created_at`, `enabled`) VALUES
(1, 'NIF', '39985005B', 'alex@dominio.com', 'Alex', 'AlexDisplay', 555666777, '2020-11-20 18:47:36', 1),
(2, 'NIF', '81699843W', 'juan@dominio.com', 'Juan', 'JuanDisplay', 777888999, '2020-11-20 18:47:36', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Products`
--

CREATE TABLE `Products` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `productName` varchar(200) NOT NULL,
  `productTypeName` varchar(100) NOT NULL,
  `terminalNumber` int NOT NULL,
  `sold_at` datetime NOT NULL,
  `enabled` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Products`
--

INSERT INTO `Products` (`id`, `customer_id`, `productName`, `productTypeName`, `terminalNumber`, `sold_at`, `enabled`, `created_at`) VALUES
(1, 1, 'FIRBA+MOVIL 20G', 'fibraMobil', 111222333, '2020-04-10 00:00:00', 1, '2020-11-20 18:49:21'),
(2, 1, 'MOVIL 5G', 'movil', 333444555, '2020-08-10 00:00:00', 1, '2020-11-20 18:49:21'),
(3, 2, 'FIBRA + MOVIL 600G', 'fibraMovil', 999888777, '2020-06-10 00:00:00', 1, '2020-11-20 18:50:16'),
(4, 2, 'FIBRA 300G', 'fibra', 999888999, '2020-11-03 00:00:00', 1, '2020-11-20 18:50:16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Customers`
--
ALTER TABLE `Customers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Customers`
--
ALTER TABLE `Customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Products`
--
ALTER TABLE `Products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
