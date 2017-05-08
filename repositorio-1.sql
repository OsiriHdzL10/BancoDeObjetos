-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-03-2017 a las 02:19:55
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `repositorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areaconocimiento`
--

CREATE TABLE IF NOT EXISTS `areaconocimiento` (
  `IDArea` int(11) NOT NULL,
  `NombreArea` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `areaconocimiento`
--

INSERT INTO `areaconocimiento` (`IDArea`, `NombreArea`) VALUES
(1, 'FIS'),
(2, 'IS'),
(3, 'GPS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `IDComentario` int(11) NOT NULL,
  `Comentario` varchar(200) COLLATE utf8_bin NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_bin NOT NULL,
  `IDObjeto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta`
--

CREATE TABLE IF NOT EXISTS `etiqueta` (
  `IDEtiqueta` int(11) NOT NULL,
  `Palabra` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metadatos`
--

CREATE TABLE IF NOT EXISTS `metadatos` (
  `IDObjeto` int(11) NOT NULL,
  `IDEtiqueta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetoaprendizaje`
--

CREATE TABLE IF NOT EXISTS `objetoaprendizaje` (
  `IDObjeto` int(11) NOT NULL,
  `NombreObjeto` varchar(30) COLLATE utf8_bin NOT NULL,
  `MatriculaUsuario` varchar(30) COLLATE utf8_bin NOT NULL,
  `url` varchar(200) COLLATE utf8_bin NOT NULL,
  `Descripcion` varchar(200) COLLATE utf8_bin NOT NULL,
  `IDArea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `IDObjeto` int(11) NOT NULL,
  `Fecha` int(11) NOT NULL,
  `Tipo` varchar(20) NOT NULL,
  `Contador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE IF NOT EXISTS `tipousuario` (
  `IDTipo` int(11) NOT NULL,
  `Nombre` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`IDTipo`, `Nombre`) VALUES
(1, 'Administrador'),
(2, 'Profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `Matricula` varchar(30) COLLATE utf8_bin NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_bin NOT NULL,
  `Contrasena` varchar(255) COLLATE utf8_bin NOT NULL,
  `ApPaterno` varchar(30) COLLATE utf8_bin NOT NULL,
  `ApMaterno` varchar(30) COLLATE utf8_bin NOT NULL,
  `Departamento` varchar(100) COLLATE utf8_bin NOT NULL,
  `Telefono` int(15) NOT NULL,
  `Email` varchar(40) COLLATE utf8_bin NOT NULL,
  `TipoUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Matricula`, `Nombre`, `Contrasena`, `ApPaterno`, `ApMaterno`, `Departamento`, `Telefono`, `Email`, `TipoUsuario`) VALUES
('12', 'luis', '123456', 't', 'p', '123456', 2147483647, 'hola@gmail.com', 2),
('123456789', 'José Alfredo', '123456', 'Tapia', 'Pérez', 'ADMINISTRADOR', 44985663, 'jose_tapper@hotmail.com', 1),
('hola7896', 'Adriana2', '123', 'a', 'a', 'sistemas', 44456521, 'adri@gmail.com', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areaconocimiento`
--
ALTER TABLE `areaconocimiento`
  ADD PRIMARY KEY (`IDArea`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`IDComentario`),
  ADD UNIQUE KEY `IDObjeto` (`IDObjeto`);

--
-- Indices de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  ADD PRIMARY KEY (`IDEtiqueta`);

--
-- Indices de la tabla `metadatos`
--
ALTER TABLE `metadatos`
  ADD PRIMARY KEY (`IDObjeto`,`IDEtiqueta`),
  ADD KEY `IDEtiqueta` (`IDEtiqueta`);

--
-- Indices de la tabla `objetoaprendizaje`
--
ALTER TABLE `objetoaprendizaje`
  ADD PRIMARY KEY (`IDObjeto`),
  ADD KEY `matuser` (`MatriculaUsuario`),
  ADD KEY `objetoaprendizaje` (`IDArea`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`IDObjeto`,`Fecha`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`IDTipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Matricula`),
  ADD KEY `TipoUsuario` (`TipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areaconocimiento`
--
ALTER TABLE `areaconocimiento`
  MODIFY `IDArea` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `IDComentario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  MODIFY `IDEtiqueta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `objetoaprendizaje`
--
ALTER TABLE `objetoaprendizaje`
  MODIFY `IDObjeto` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`IDObjeto`) REFERENCES `objetoaprendizaje` (`IDObjeto`);

--
-- Filtros para la tabla `metadatos`
--
ALTER TABLE `metadatos`
  ADD CONSTRAINT `metadatos_ibfk_1` FOREIGN KEY (`IDObjeto`) REFERENCES `objetoaprendizaje` (`IDObjeto`),
  ADD CONSTRAINT `metadatos_ibfk_2` FOREIGN KEY (`IDEtiqueta`) REFERENCES `etiqueta` (`IDEtiqueta`);

--
-- Filtros para la tabla `objetoaprendizaje`
--
ALTER TABLE `objetoaprendizaje`
  ADD CONSTRAINT `objetoaprendizaje_ibfk_1` FOREIGN KEY (`IDArea`) REFERENCES `areaconocimiento` (`IDArea`),
  ADD CONSTRAINT `objetoaprendizaje_ibfk_2` FOREIGN KEY (`MatriculaUsuario`) REFERENCES `usuario` (`Matricula`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`TipoUsuario`) REFERENCES `tipousuario` (`IDTipo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
