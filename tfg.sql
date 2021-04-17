-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2021 a las 19:30:09
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tfg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almuerzo`
--

CREATE TABLE `almuerzo` (
  `idAlmuerzo` int(11) NOT NULL,
  `relComida` varchar(125) NOT NULL,
  `relUser` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cena`
--

CREATE TABLE `cena` (
  `idcena` int(11) NOT NULL,
  `relComida` varchar(128) NOT NULL,
  `relUsuario` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comida`
--

CREATE TABLE `comida` (
  `alimento` varchar(128) NOT NULL,
  `Kcal` int(11) NOT NULL,
  `hidratos` int(11) NOT NULL,
  `grasas` int(11) NOT NULL,
  `proteinas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desalluno`
--

CREATE TABLE `desalluno` (
  `idDesalluno` int(11) NOT NULL,
  `relComida` varchar(125) NOT NULL,
  `relUsuario` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `iduser` varchar(128) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `peso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almuerzo`
--
ALTER TABLE `almuerzo`
  ADD PRIMARY KEY (`idAlmuerzo`),
  ADD KEY `relComida_idx` (`relComida`),
  ADD KEY `reUser_idx` (`relUser`);

--
-- Indices de la tabla `cena`
--
ALTER TABLE `cena`
  ADD PRIMARY KEY (`idcena`),
  ADD KEY `reComida_idx` (`relComida`),
  ADD KEY `relUsuario_idx` (`relUsuario`);

--
-- Indices de la tabla `comida`
--
ALTER TABLE `comida`
  ADD PRIMARY KEY (`alimento`),
  ADD UNIQUE KEY `alimento_UNIQUE` (`alimento`);

--
-- Indices de la tabla `desalluno`
--
ALTER TABLE `desalluno`
  ADD PRIMARY KEY (`idDesalluno`),
  ADD KEY `comida_idx` (`relComida`),
  ADD KEY `relUsuario_idx` (`relUsuario`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `iduser_UNIQUE` (`iduser`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almuerzo`
--
ALTER TABLE `almuerzo`
  MODIFY `idAlmuerzo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cena`
--
ALTER TABLE `cena`
  MODIFY `idcena` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `desalluno`
--
ALTER TABLE `desalluno`
  MODIFY `idDesalluno` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almuerzo`
--
ALTER TABLE `almuerzo`
  ADD CONSTRAINT `reUser` FOREIGN KEY (`relUser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `relComida` FOREIGN KEY (`relComida`) REFERENCES `comida` (`alimento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cena`
--
ALTER TABLE `cena`
  ADD CONSTRAINT `relComida1` FOREIGN KEY (`relComida`) REFERENCES `comida` (`alimento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `relUsuario1` FOREIGN KEY (`relUsuario`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `desalluno`
--
ALTER TABLE `desalluno`
  ADD CONSTRAINT `comida` FOREIGN KEY (`relComida`) REFERENCES `comida` (`alimento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `relUsuario` FOREIGN KEY (`relUsuario`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
