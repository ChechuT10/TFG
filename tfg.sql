
--
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
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nombreUser` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `peso` int(11) NOT NULL,
  `edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
--
ALTER TABLE `cena`
  ADD PRIMARY KEY (`idCena`),
  ADD KEY `alimento_idx` (`idAlimento`),
  ADD KEY `userCn_idx` (`idUser`);

--
-- Indices de la tabla `comida`
--
ALTER TABLE `comida`
  ADD PRIMARY KEY (`idComida`),
  ADD KEY `alimentos_idx` (`idAlimento`),
  ADD KEY `user_idx` (`idUser`);

--
-- Indices de la tabla `desayuno`
--
ALTER TABLE `desayuno`
  ADD PRIMARY KEY (`idDesayuno`),
  ADD KEY `comida_idx` (`idAlimento`),
  ADD KEY `user_idx` (`idUser`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `iduser_UNIQUE` (`iduser`),
  ADD UNIQUE KEY `nombreUser_UNIQUE` (`nombreUser`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `idalimentos` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cena`
--
ALTER TABLE `cena`
  ADD CONSTRAINT `alimentoCn` FOREIGN KEY (`idAlimento`) REFERENCES `alimentos` (`idalimentos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `userCn` FOREIGN KEY (`idUser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comida`
--
ALTER TABLE `comida`
  ADD CONSTRAINT `aliemntoC` FOREIGN KEY (`idAlimento`) REFERENCES `alimentos` (`idalimentos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `userC` FOREIGN KEY (`idUser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `desayuno`
--
ALTER TABLE `desayuno`
  ADD CONSTRAINT `alimentoD` FOREIGN KEY (`idAlimento`) REFERENCES `alimentos` (`idalimentos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `userD` FOREIGN KEY (`idUser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
