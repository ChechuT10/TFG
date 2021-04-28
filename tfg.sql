-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
<<<<<<< HEAD
-- Tiempo de generación: 28-04-2021 a las 11:46:42
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11
=======
-- Tiempo de generación: 26-04-2021 a las 16:21:10
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.15
>>>>>>> 07332963087269dc283a479aecbf7d5ff7652dda

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
<<<<<<< HEAD
-- Estructura de tabla para la tabla `alimentos`
--

CREATE TABLE `alimentos` (
  `idalimentos` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `calorias` int(11) NOT NULL,
  `hidratos` int(11) NOT NULL,
  `proteinas` int(11) NOT NULL,
  `grasas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alimentos`
--

INSERT INTO `alimentos` (`idalimentos`, `nombre`, `calorias`, `hidratos`, `proteinas`, `grasas`) VALUES
(1, 'Aceitunas', 23, 34, 34, 34),
(2, 'aceite', 234, 324, 324, 234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cena`
--

CREATE TABLE `cena` (
  `idCena` int(11) NOT NULL,
  `idAlimento` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comida`
--

CREATE TABLE `comida` (
  `idComida` int(11) NOT NULL,
  `idAlimento` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desayuno`
--

CREATE TABLE `desayuno` (
  `idDesayuno` int(11) NOT NULL,
  `idAlimento` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `useraux`
--

CREATE TABLE `useraux` (
  `edad` int(11) NOT NULL,
  `altura` double NOT NULL,
  `peso` int(11) NOT NULL,
  `pesoIdeal` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `apellidos` varchar(128) NOT NULL,
  `nombreUser` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `userPswd` varchar(128) NOT NULL,
  `auxForm` set('S','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUser`, `nombre`, `apellidos`, `nombreUser`, `email`, `userPswd`, `auxForm`) VALUES
(1, 'Carlos', 'Tipan dsaasd', 'prueba', 'carlos@gmail.com', '$2y$10$KnhIArMvyEptkLXjlAtN7.EjFEC3Iha2W0HxrUoaiEtmvjuTz2hu6', 'S');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`idalimentos`),
  ADD UNIQUE KEY `idalimentos_UNIQUE` (`idalimentos`);

--
-- Indices de la tabla `cena`
=======
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nombreUser` varchar(100) NOT NULL,
  `pswdUser` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `peso` int(11) NOT NULL,
  `edad` int(11) NOT NULL,
  `altura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
>>>>>>> 07332963087269dc283a479aecbf7d5ff7652dda
--

INSERT INTO `user` (`iduser`, `nombreUser`, `pswdUser`, `nombre`, `apellidos`, `email`, `peso`, `edad`, `altura`) VALUES
(1, 'jorge', 'jorge', 'jorge', 'tarpero pinero', 'jorgetrapero@gmail.com', 75, 21, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `useraux`
--
ALTER TABLE `useraux`
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
<<<<<<< HEAD
-- AUTO_INCREMENT de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `idalimentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cena`
--
ALTER TABLE `cena`
  MODIFY `idCena` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comida`
--
ALTER TABLE `comida`
  MODIFY `idComida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `desayuno`
--
ALTER TABLE `desayuno`
  MODIFY `idDesayuno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cena`
--
ALTER TABLE `cena`
  ADD CONSTRAINT `alimentoCn` FOREIGN KEY (`idAlimento`) REFERENCES `alimentos` (`idalimentos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `userCn` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comida`
--
ALTER TABLE `comida`
  ADD CONSTRAINT `aliemntoC` FOREIGN KEY (`idAlimento`) REFERENCES `alimentos` (`idalimentos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `userC` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `desayuno`
--
ALTER TABLE `desayuno`
  ADD CONSTRAINT `alimentoD` FOREIGN KEY (`idAlimento`) REFERENCES `alimentos` (`idalimentos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `userD` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `useraux`
--
ALTER TABLE `useraux`
  ADD CONSTRAINT `useraux_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE;
=======
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
>>>>>>> 07332963087269dc283a479aecbf7d5ff7652dda
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
