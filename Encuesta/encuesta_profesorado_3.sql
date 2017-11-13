-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2017 a las 09:45:44
-- Versión del servidor: 5.7.14
-- Versión de PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `encuesta_profesorado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `encuestas` (
  `id` int(11) NOT NULL,
  `nombre` tinytext NOT NULL,
  `descripcion` text NOT NULL,
  `id_Estudio` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`id`, `nombre`, `descripcion`, `id_Estudio`) VALUES
(1, 'Pasaje del terror 2017', 'Nos gustaría conocer vuestra opinión sobre el pasaje del terror que hemos realizado este año. \r\n', 3),
(2, 'encuesta prueba', '', 3),
(3, 'Profesorado UCA', '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios`
--

CREATE TABLE `estudios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudios`
--

INSERT INTO `estudios` (`id`, `nombre`) VALUES
(1, 'Web Masters'),
(2, 'UCA'),
(3, 'Puppets'),
(5, 'Ayuntamiento de Cádiz'),
(6, 'San Fernando'),
(7, 'Mi Casa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes`
--

CREATE TABLE `participantes` (
  `id_participacion` int(100) NOT NULL,
  `id_usuario` int(100) NOT NULL,
  `id_encuesta` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `id_Seccion` int(11) NOT NULL,
  `tipo_pregunta` varchar(50) NOT NULL,
  `pregunta` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `id_Seccion`, `tipo_pregunta`, `pregunta`) VALUES
(1, 1, 'number', 'CÃ³digo de la TitulaciÃ³n'),
(2, 1, 'number', 'CÃ³digo de la Asignatura'),
(3, 1, 'number', 'CÃ³digo del Grupo'),
(4, 1, 'text', 'Profesor 1'),
(5, 1, 'text', 'Profesor 2'),
(6, 1, 'text', 'Profesor 3'),
(7, 3, 'radio', 'Edad(aÃ±os)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `radio_respuestas`
--

CREATE TABLE `radio_respuestas` (
  `id` int(32) NOT NULL,
  `id_Pregunta` int(32) NOT NULL,
  `texto` tinytext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `id_Preguntas` int(11) NOT NULL,
  `id_Encuestas` int(11) NOT NULL,
  `respuesta` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` int(11) NOT NULL,
  `id_Encuesta` int(32) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `id_Encuesta`, `nombre`) VALUES
(1, 3, 'CÃ³digo Asignatura'),
(4, 3, 'InformaciÃ³n Personal y AcadÃ©mica de los Estudiantes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(32) NOT NULL,
  `id_Estudio` int(100) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_Estudio`, `nombre`, `email`, `password`, `admin`) VALUES
(1, 1, 'admin', 'admin@prueba_web.es', 'admin', 1),
(2, 2, 'Administrador UCA', 'administrador@uca.es', '$2y$10$qQZ7zlJZlbq6HJ.lrENgUO.NWdbjWfJ8svdmZvFydQV/X9f1f5U.2', 1),
(9, 6, 'santi', 'santi@santi@es', '$2y$10$xR8wpJUPBxa2ee.Usfcb9.oMf1YYxQLOW/0SbXiP3nRyXNuHjAQnm', 0),
(7, 3, 'Jesus', 'jesus@jesus.es', '$2y$10$3byAclACzs/J7GT5zAcMoejRk0A3wB3MMoe.aP5YmijZIvr4IR8GC', 1),
(10, 7, 'yo', 'smudalamo@gmail.com', '$2y$10$ExiFnymzDfl//4t5aLvR2O8oxZ6qSiMoTtR9yHHhBULN./.d9ndzK', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Estudios` (`id_Estudio`);

--
-- Indices de la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`id_participacion`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Secciones` (`id_Seccion`);

--
-- Indices de la tabla `radio_respuestas`
--
ALTER TABLE `radio_respuestas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Preguntas` (`id_Preguntas`),
  ADD KEY `id_Encuestas` (`id_Encuestas`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `estudios`
--
ALTER TABLE `estudios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `participantes`
--
ALTER TABLE `participantes`
  MODIFY `id_participacion` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
