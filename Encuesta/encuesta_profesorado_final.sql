-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2017 a las 00:38:47
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
(7, 2, 'number', 'Edad(aÃ±os)'),
(8, 2, 'radio', 'Sexo'),
(9, 2, 'radio', 'Curso mÃ¡s alto en el que estÃ¡ matriculado'),
(10, 2, 'radio', 'Curso mÃ¡s bajo en el que estÃ¡ matriculado'),
(11, 2, 'radio', 'Veces que se ha matriculado en esta asignatura'),
(12, 2, 'radio', 'Veces que se ha examinado en esta asignatura'),
(13, 2, 'radio', 'La asignatura le interesa'),
(14, 2, 'radio', 'Hace uso de las tutorÃ­as'),
(15, 2, 'radio', 'Dificultad de la asignatura'),
(16, 2, 'radio', 'CalificaciÃ³n esperada'),
(17, 2, 'radio', 'Asistencia a clase (% de horas lectivas)'),
(18, 3, 'radio', 'EL/LA PROFESOR/A INFORMA SOBRE LOS DISTINTOS <br>ASPECTOS DE LA GUÃA DOCENTE O PROGRAMA <br>DE LA ASIGNATURA (OBJETIVOS, ACTIVIDADES, <br>CONTENIDOS DEL TEMARIO, METODOLOGÃA, BIBLIOGRAFÃA, SISTEMAS DE EVALUACIÃ“N, ETC.)'),
(19, 4, 'radio', 'Imparte las clases en el horario fijado'),
(20, 4, 'radio', 'Asiste regularmente a clase'),
(21, 4, 'radio', 'Cumple adecuadamente su labor de tutorÃ­a'),
(22, 4, 'radio', 'Se ajusta a la planificaciÃ³n de la asignatura'),
(23, 4, 'radio', 'Se han coordinado las actividades teÃ³ricas y prÃ¡cticas previstas'),
(24, 4, 'radio', 'Se ajusta a los sistemas de evaluaciÃ³n <br> especificados en la guÃ­a docente/programa <br> de la asignatura'),
(25, 4, 'radio', 'La bibliografÃ­a y otras fuentes de informaciÃ³n <br> recomendadas en el programa son <br> Ãºtiles para el aprendizaje <br> de la asignatura'),
(26, 4, 'radio', 'El/la profesor/a organiza bien las actividades <br> que se realizan en clase'),
(27, 4, 'radio', 'Utiliza recursos didÃ¡cticos (pizarra, transparencias, <br> medios audiovisuales, material de apoyo en red virtual) <br> que facilitan el aprendizaje'),
(28, 4, 'radio', 'Explica con claridad y resalta los contenidos <br> importantes de la asignatura'),
(29, 4, 'radio', 'Se interesa por el grado de comprensiÃ³n de sus explicaciones'),
(30, 4, 'radio', 'Expone ejemplos en los que se ponen en prÃ¡ctica <br> los contenidos de la asignatura'),
(31, 4, 'radio', 'Explica los contenidos con seguridad'),
(32, 4, 'radio', 'Resuelve las dudas que se le plantean '),
(33, 4, 'radio', 'Fomenta un clima de trabajo y participaciÃ³n'),
(34, 4, 'radio', 'Propicia una comunicaciÃ³n fluida y espontÃ¡nea '),
(35, 4, 'radio', 'Motiva a los/as estudiantes para que se interesen por la asignatura'),
(36, 4, 'radio', 'Es respetuoso/a en el trato con los/as estudiantes'),
(37, 4, 'radio', 'Tengo claro lo que se me va a exigir para superar esta asignatura'),
(38, 4, 'radio', 'Los criterios y sistemas de evaluaciÃ³n me parecen <br> adecuados en el contexto de la asignatura'),
(39, 5, 'radio', 'Las actividades desarrolladas (teÃ³ricas, prÃ¡cticas, <br> de trabajo indicidual, en grupo, etc.) contribuyen a <br> alcanzar los objetivos de la asignatura'),
(40, 5, 'radio', 'Estoy satisfecho/a con la labor docente de este/a profesor/a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `radio_respuestas`
--

CREATE TABLE `radio_respuestas` (
  `id` int(11) NOT NULL,
  `id_Pregunta` int(32) NOT NULL,
  `texto` tinytext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `radio_respuestas`
--

INSERT INTO `radio_respuestas` (`id`, `id_Pregunta`, `texto`) VALUES
(1, 8, 'Hombre'),
(2, 8, 'Mujer'),
(3, 8, 'Otro'),
(4, 9, '1Âº'),
(5, 9, '2Âº'),
(6, 9, '3Âº'),
(7, 9, '4Âº'),
(8, 9, '5Âº'),
(9, 9, '6Âº'),
(10, 10, '1Âº'),
(11, 10, '2Âº'),
(12, 10, '3Âº'),
(13, 10, '4Âº'),
(14, 10, '5Âº'),
(15, 10, '6Âº'),
(16, 11, '1'),
(17, 11, '2'),
(18, 11, '3'),
(19, 11, '>3'),
(20, 12, '1'),
(21, 12, '2'),
(22, 12, '3'),
(23, 12, '>3'),
(24, 13, 'Nada'),
(25, 13, 'Algo'),
(26, 13, 'Bastante'),
(27, 13, 'Mucho'),
(28, 14, 'Nada'),
(29, 14, 'Algo'),
(30, 14, 'Bastante'),
(31, 14, 'Mucho'),
(32, 15, 'Baja'),
(33, 15, 'Media'),
(34, 15, 'Alta'),
(35, 15, 'Muy Alta'),
(36, 16, 'N.P.'),
(37, 16, 'Suspenso'),
(38, 16, 'Aprobado'),
(39, 16, 'Notable'),
(40, 16, 'Sobresaliente'),
(41, 16, 'MatrÃ­cula de Honor'),
(42, 17, '< 50%'),
(43, 17, '50% - 80%'),
(44, 17, '> 80%'),
(45, 18, 'NS/NC'),
(46, 18, '1'),
(47, 18, '2'),
(48, 18, '3'),
(49, 18, '4'),
(50, 18, '5'),
(51, 19, 'NS/NC'),
(52, 19, '1'),
(53, 19, '2'),
(54, 19, '3'),
(55, 19, '4'),
(56, 19, '5'),
(57, 20, 'NS/NC'),
(58, 20, '1'),
(59, 20, '2'),
(60, 20, '3'),
(61, 20, '4'),
(62, 20, '5'),
(63, 21, 'NS/NC'),
(64, 21, '1'),
(65, 21, '2'),
(66, 21, '3'),
(67, 21, '4'),
(68, 21, '5'),
(69, 22, 'NS/NC'),
(70, 22, '1'),
(71, 22, '2'),
(72, 22, '3'),
(73, 22, '4'),
(74, 22, '5'),
(75, 23, 'NS/NC'),
(76, 23, '1'),
(77, 23, '2'),
(78, 23, '3'),
(79, 23, '4'),
(80, 23, '5'),
(81, 24, 'NS/NC'),
(82, 24, '1'),
(83, 24, '2'),
(84, 24, '3'),
(85, 24, '4'),
(86, 24, '5'),
(87, 25, 'NS/NC'),
(88, 25, '1'),
(89, 25, '2'),
(90, 25, '3'),
(91, 25, '4'),
(92, 25, '5'),
(93, 26, 'NS/NC'),
(94, 26, '1'),
(95, 26, '2'),
(96, 26, '3'),
(97, 26, '4'),
(98, 26, '5'),
(99, 27, 'NS/NC'),
(100, 27, '1'),
(101, 27, '2'),
(102, 27, '3'),
(103, 27, '4'),
(104, 27, '5'),
(105, 28, 'NS/NC'),
(106, 28, '1'),
(107, 28, '2'),
(108, 28, '3'),
(109, 28, '4'),
(110, 28, '5'),
(111, 29, 'NS/NC'),
(112, 29, '1'),
(113, 29, '2'),
(114, 29, '3'),
(115, 29, '4'),
(116, 29, '5'),
(117, 30, 'NS/NC'),
(118, 31, '1'),
(119, 31, '2'),
(120, 31, '3'),
(121, 31, '4'),
(122, 31, '5'),
(123, 32, 'NS/NC'),
(124, 32, '1'),
(125, 32, '2'),
(126, 32, '3'),
(127, 32, '4'),
(128, 32, '5'),
(129, 33, 'NS/NC'),
(130, 33, '1'),
(131, 33, '2'),
(132, 33, '3'),
(133, 33, '4'),
(134, 33, '5'),
(135, 34, 'NS/NC'),
(136, 34, '1'),
(137, 34, '2'),
(138, 34, '3'),
(139, 34, '4'),
(140, 34, '5'),
(141, 35, 'NS/NC'),
(142, 35, '1'),
(143, 35, '2'),
(144, 35, '3'),
(145, 35, '4'),
(146, 35, '5'),
(147, 36, 'NS/NC'),
(148, 36, '1'),
(149, 36, '2'),
(150, 36, '3'),
(151, 36, '4'),
(152, 36, '5'),
(153, 37, 'NS/NC'),
(154, 37, '1'),
(155, 37, '2'),
(156, 37, '3'),
(157, 37, '4'),
(158, 37, '5'),
(159, 38, 'NS/NC'),
(160, 38, '1'),
(161, 38, '2'),
(162, 38, '3'),
(163, 38, '4'),
(164, 38, '5'),
(165, 39, 'NS/NC'),
(166, 39, '1'),
(167, 39, '2'),
(168, 39, '3'),
(169, 39, '4'),
(170, 39, '5'),
(171, 40, 'NS/NC'),
(172, 40, '1'),
(173, 40, '2'),
(174, 40, '3'),
(175, 40, '4'),
(176, 40, '5'),
(177, 41, 'NS/NC'),
(178, 41, '1'),
(179, 41, '2'),
(180, 41, '3'),
(181, 41, '4'),
(182, 41, '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `id_Pregunta` int(11) NOT NULL,
  `id_Encuesta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `respuesta` varchar(50) NOT NULL
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
(2, 3, 'InformaciÃ³n Personal y AcadÃ©mica de los Estudiantes'),
(3, 3, 'PlanificaciÃ³n de la enseÃ±anza y aprendizaje'),
(4, 3, 'Desarrollo de la docencia'),
(5, 3, 'Resultados');

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
  ADD KEY `id_Pregunta` (`id_Pregunta`),
  ADD KEY `id_Encuestas` (`id_Encuesta`);

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
  MODIFY `id_participacion` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de la tabla `radio_respuestas`
--
ALTER TABLE `radio_respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;
--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
