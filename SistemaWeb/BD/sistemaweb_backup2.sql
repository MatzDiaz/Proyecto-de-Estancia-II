-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2023 a las 16:07:36
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `idAlum` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Correo` varchar(45) NOT NULL,
  `Contra` varchar(75) NOT NULL,
  `FechaNa` date NOT NULL,
  `Genero` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idAlum`, `Nombre`, `Apellido`, `Correo`, `Contra`, `FechaNa`, `Genero`) VALUES
(1, 'Maximiliano', 'Diaz', 'max@gmail.com', '$2y$10$BY6aDNwjOneJsSXDRMf0.epF8AfwZ70GMLYW2Ef69pwtRRv9tkDGa', '2000-05-20', 'Masculino'),
(4, 'Alondra', 'Portillo', 'alondra@gmail.com', '$2y$10$.jb/ZQz.HrIhdHpcgYxM9.D2VxeTD.wzB1.Q7eAkt3.fJqtlxCL0m', '2012-02-20', 'Masculino'),
(6, 'Eduardo', 'Real', 'Elopez@mail.com', '$2y$10$VerfiaDfPJ.xzxwweO9b4O9j86GrCNQevWFGbBq4lLQA12BkJ7aPu', '2001-01-01', 'Masculino'),
(9, ' Pedro', 'Diaz', 'pedro@gmail.com', '$2y$10$aM.7HzaO9L1JsxqNR8KNmOQlz2jBmpoMz99E1XgBYJWuAy16rq5am', '2003-08-30', 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar`
--

CREATE TABLE `asignar` (
  `idAsig` int(11) NOT NULL,
  `FechaEn` date NOT NULL,
  `idAlum` int(11) DEFAULT NULL,
  `idEnc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignar`
--

INSERT INTO `asignar` (`idAsig`, `FechaEn`, `idAlum`, `idEnc`) VALUES
(1, '2023-11-20', 1, 1),
(2, '2023-11-20', 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idCom` int(11) NOT NULL,
  `Comentario` text DEFAULT NULL,
  `Calificacion` int(11) DEFAULT NULL,
  `idRec` int(11) DEFAULT NULL,
  `idAlum` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`idCom`, `Comentario`, `Calificacion`, `idRec`, `idAlum`) VALUES
(1, 'Bueno', 5, NULL, 1),
(2, 'Excelente!!', 5, 2, 4),
(3, 'Buena ', NULL, 2, 6),
(4, 'Nice', NULL, 2, 6),
(5, 'Nice', NULL, NULL, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordinador`
--

CREATE TABLE `coordinador` (
  `idCoor` int(11) NOT NULL,
  `Nom` varchar(45) NOT NULL,
  `Ape` varchar(45) NOT NULL,
  `Cor` varchar(45) NOT NULL,
  `Password` varchar(75) NOT NULL,
  `Fecha` date NOT NULL,
  `Sexo` varchar(45) NOT NULL,
  `Estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `coordinador`
--

INSERT INTO `coordinador` (`idCoor`, `Nom`, `Ape`, `Cor`, `Password`, `Fecha`, `Sexo`, `Estatus`) VALUES
(1, 'Sonia Paloma', 'Chvez', 'CSonia@gmail.com', '$2y$10$jvWswxOyKrU78gdFelocQ.5UXjOFQgbuPR7Ayx', '2002-02-12', 'Masculino', 0),
(2, 'Lucia', 'Mojica', 'GLucia@emial.com', '$2y$10$aIWuCcLvIPYKyy.0SEL1kevPWpT.Ewa9blaOuVZX8OMY6sCLpJLgu', '2000-12-12', 'Masculino', 0),
(3, 'jose', 'Vargad', 'Jose\"gmail.com', '$2y$10$6smNDUQlECoYP6v3AMRYWOsERFLLABz4as6Cnb', '2000-05-12', 'Masculino', 0),
(4, 'Jose', 'Vargas', 'Jose@gmail.com', '$2y$10$6smNDUQlECoYP6v3AMRYWOsERFLLABz4as6Cnb', '2000-05-12', 'Masculino', 0),
(5, 'Alondra ', 'Torres', 'alondra@gmail.com', '$2y$10$etO3h9DK.RuBqCxglgyQU.GbVroiqrjEJFyHDP', '2000-02-12', 'Masculino', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `idEnc` int(11) NOT NULL,
  `Pregunta` int(45) NOT NULL,
  `Pregunta2` int(25) NOT NULL,
  `Pregunta3` int(25) NOT NULL,
  `Pregunta4` int(25) NOT NULL,
  `Pregunta5` int(25) NOT NULL,
  `Comentarios` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `encuesta`
--

INSERT INTO `encuesta` (`idEnc`, `Pregunta`, `Pregunta2`, `Pregunta3`, `Pregunta4`, `Pregunta5`, `Comentarios`) VALUES
(1, 5, 4, 5, 1, 1, ''),
(2, 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `idRec` int(11) NOT NULL,
  `Titulo` varchar(45) NOT NULL,
  `Contenido` text NOT NULL,
  `Multimedia` text DEFAULT NULL,
  `FechaPub` datetime NOT NULL,
  `Estatus` int(11) DEFAULT NULL,
  `idAlum` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`idRec`, `Titulo`, `Contenido`, `Multimedia`, `FechaPub`, `Estatus`, `idAlum`) VALUES
(1, 'Papas con queso', 'Ingredientes <br>\n\nPapas', '../../../IMG/papas.jpg', '2023-11-09 12:25:15', 1, 1),
(2, 'Enchiladas de mole', 'Ingredientes<br>\n\nnull 4 1/2 tazas de caldo de pollo<br>\n\n1 taza de aceite vegetal<br>\n\n12 tortillas<br>\n\n2 tazas de pollo cocido y deshebrado<br>\n\n1 taza de crema', '../../../IMG/enmoladas.jpg', '2023-11-12 21:59:20', 0, 4),
(17, 'Costillas a la BBQ', 'Ingredientes:<br />\r\nCostillas<br />\r\nSalsa BBQ<br />\r\nCominos<br />\r\nAjo', '../../../IMG/costillas.jpg', '2023-11-19 23:22:28', 0, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `idRes` int(11) NOT NULL,
  `Resultado` int(45) NOT NULL DEFAULT 0,
  `idAsig` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`idRes`, `Resultado`, `idAsig`) VALUES
(1, 1, 1),
(2, 0, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`idAlum`);

--
-- Indices de la tabla `asignar`
--
ALTER TABLE `asignar`
  ADD PRIMARY KEY (`idAsig`),
  ADD KEY `idEnc` (`idEnc`),
  ADD KEY `idAlum` (`idAlum`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idCom`),
  ADD KEY `idRec` (`idRec`),
  ADD KEY `idAlum` (`idAlum`);

--
-- Indices de la tabla `coordinador`
--
ALTER TABLE `coordinador`
  ADD PRIMARY KEY (`idCoor`);

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`idEnc`);

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`idRec`),
  ADD KEY `idAlum` (`idAlum`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`idRes`),
  ADD KEY `idAsig` (`idAsig`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `idAlum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `asignar`
--
ALTER TABLE `asignar`
  MODIFY `idAsig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idCom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `coordinador`
--
ALTER TABLE `coordinador`
  MODIFY `idCoor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `idRec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `idRes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignar`
--
ALTER TABLE `asignar`
  ADD CONSTRAINT `asignar_ibfk_1` FOREIGN KEY (`idEnc`) REFERENCES `encuesta` (`idEnc`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `asignar_ibfk_2` FOREIGN KEY (`idAlum`) REFERENCES `alumno` (`idAlum`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`idRec`) REFERENCES `receta` (`idRec`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`idAlum`) REFERENCES `alumno` (`idAlum`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `receta_ibfk_1` FOREIGN KEY (`idAlum`) REFERENCES `alumno` (`idAlum`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `respuesta_ibfk_1` FOREIGN KEY (`idAsig`) REFERENCES `asignar` (`idAsig`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
