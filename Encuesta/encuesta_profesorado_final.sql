-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2017 a las 00:16:47
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
(11, 2, 'radio', 'Curso mÃ¡s bajo en el que estÃ¡ matriculado'),
(13, 2, 'radio', 'Veces que se ha matriculado en esta asignatura'),
(15, 2, 'radio', 'Veces que se ha examinado en esta asignatura'),
(17, 2, 'radio', 'La asignatura le interesa'),
(19, 2, 'radio', 'Hace uso de las tutorÃ­as'),
(21, 2, 'radio', 'Dificultad de la asignatura'),
(23, 2, 'radio', 'CalificaciÃ³n esperada'),
(25, 2, 'radio', 'Asistencia a clase (% de horas lectivas)'),
(26, 3, 'radio', 'EL/LA PROFESOR/A INFORMA SOBRE LOS DISTINTOS <br>ASPECTOS DE LA GUÃA DOCENTE O PROGRAMA <br>DE LA ASIGNATURA (OBJETIVOS, ACTIVIDADES, <br>CONTENIDOS DEL TEMARIO, METODOLOGÃA, BIBLIOGRAFÃA, SISTEMAS DE EVALUACIÃ“N, ETC.)'),
(27, 4, 'radio', 'Imparte las clases en el horario fijado'),
(28, 4, 'radio', 'Asiste regularmente a clase'),
(29, 4, 'radio', 'Cumple adecuadamente su labor de tutorÃ­a'),
(30, 4, 'radio', 'Se ajusta a la planificaciÃ³n de la asignatura'),
(31, 4, 'radio', 'Se han coordinado las actividades teÃ³ricas y prÃ¡cticas previstas'),
(32, 4, 'radio', 'Se ajusta a los sistemas de evaluaciÃ³n <br> especificados en la guÃ­a docente/programa <br> de la asignatura'),
(33, 4, 'radio', 'La bibliografÃ­a y otras fuentes de informaciÃ³n <br> recomendadas en el programa son <br> Ãºtiles para el aprendizaje <br> de la asignatura'),
(34, 4, 'radio', 'El/la profesor/a organiza bien las actividades <br> que se realizan en clase'),
(35, 4, 'radio', 'Utiliza recursos didÃ¡cticos (pizarra, transparencias, <br> medios audiovisuales, material de apoyo en red virtual) <br> que facilitan el aprendizaje'),
(36, 4, 'radio', 'Explica con claridad y resalta los contenidos <br> importantes de la asignatura'),
(37, 4, 'radio', 'Se interesa por el grado de comprensiÃ³n de sus explicaciones'),
(38, 4, 'radio', 'Expone ejemplos en los que se ponen en prÃ¡ctica <br> los contenidos de la asignatura'),
(39, 4, 'radio', 'Explica los contenidos con seguridad'),
(40, 4, 'radio', 'Resuelve las dudas que se le plantean '),
(41, 4, 'radio', 'Fomenta un clima de trabajo y participaciÃ³n'),
(42, 4, 'radio', 'Propicia una comunicaciÃ³n fluida y espontÃ¡nea '),
(43, 4, 'radio', 'Motiva a los/as estudiantes para que se interesen por la asignatura'),
(44, 4, 'radio', 'Es respetuoso/a en el trato con los/as estudiantes'),
(45, 4, 'radio', 'Tengo claro lo que se me va a exigir para superar esta asignatura'),
(46, 4, 'radio', 'Los criterios y sistemas de evaluaciÃ³n me parecen <br> adecuados en el contexto de la asignatura'),
(47, 5, 'radio', 'Las actividades desarrolladas (teÃ³ricas, prÃ¡cticas, <br> de trabajo indicidual, en grupo, etc.) contribuyen a <br> alcanzar los objetivos de la asignatura'),
(48, 5, 'radio', 'Estoy satisfecho/a con la labor docente de este/a profesor/a');

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
(10, 11, '1Âº'),
(11, 11, '2Âº'),
(12, 11, '3Âº'),
(13, 11, '4Âº'),
(14, 11, '5Âº'),
(15, 11, '6Âº'),
(16, 13, '1'),
(17, 13, '2'),
(18, 13, '3'),
(19, 13, '>3'),
(20, 15, '1'),
(21, 15, '2'),
(22, 15, '3'),
(23, 15, '>3'),
(24, 17, 'Nada'),
(25, 17, 'Algo'),
(26, 17, 'Bastante'),
(27, 17, 'Mucho'),
(28, 19, 'Nada'),
(29, 19, 'Algo'),
(30, 19, 'Bastante'),
(31, 19, 'Mucho'),
(32, 21, 'Baja'),
(33, 21, 'Media'),
(34, 21, 'Alta'),
(35, 21, 'Muy Alta'),
(36, 23, 'N.P.'),
(37, 23, 'Suspenso'),
(38, 23, 'Aprobado'),
(39, 23, 'Notable'),
(40, 23, 'Sobresaliente'),
(41, 23, 'MatrÃ­cula de Honor'),
(42, 25, '< 50%'),
(43, 25, '50% - 80%'),
(44, 25, '> 80%'),
(45, 26, 'NS/NC'),
(46, 26, '1'),
(47, 26, '2'),
(48, 26, '3'),
(49, 26, '4'),
(50, 26, '5'),
(51, 27, 'NS/NC'),
(52, 27, '1'),
(53, 27, '2'),
(54, 27, '3'),
(55, 27, '4'),
(56, 27, '5'),
(57, 28, 'NS/NC'),
(58, 28, '1'),
(59, 28, '2'),
(60, 28, '3'),
(61, 28, '4'),
(62, 28, '5'),
(63, 29, 'NS/NC'),
(64, 29, '1'),
(65, 29, '2'),
(66, 29, '3'),
(67, 29, '4'),
(68, 29, '5'),
(69, 30, 'NS/NC'),
(70, 30, '1'),
(71, 30, '2'),
(72, 30, '3'),
(73, 30, '4'),
(74, 30, '5'),
(75, 31, 'NS/NC'),
(76, 31, '1'),
(77, 31, '2'),
(78, 31, '3'),
(79, 31, '4'),
(80, 31, '5'),
(81, 32, 'NS/NC'),
(82, 32, '1'),
(83, 32, '2'),
(84, 32, '3'),
(85, 32, '4'),
(86, 32, '5'),
(87, 33, 'NS/NC'),
(88, 33, '1'),
(89, 33, '2'),
(90, 33, '3'),
(91, 33, '4'),
(92, 33, '5'),
(93, 34, 'NS/NC'),
(94, 34, '1'),
(95, 34, '2'),
(96, 34, '3'),
(97, 34, '4'),
(98, 34, '5'),
(99, 35, 'NS/NC'),
(100, 35, '1'),
(101, 35, '2'),
(102, 35, '3'),
(103, 35, '4'),
(104, 35, '5'),
(105, 36, 'NS/NC'),
(106, 36, '1'),
(107, 36, '2'),
(108, 36, '3'),
(109, 36, '4'),
(110, 36, '5'),
(111, 37, 'NS/NC'),
(112, 37, '1'),
(113, 37, '2'),
(114, 37, '3'),
(115, 37, '4'),
(116, 37, '5'),
(117, 38, 'NS/NC'),
(118, 38, '1'),
(119, 38, '2'),
(120, 38, '3'),
(121, 38, '4'),
(122, 38, '5'),
(123, 39, 'NS/NC'),
(124, 39, '1'),
(125, 39, '2'),
(126, 39, '3'),
(127, 39, '4'),
(128, 39, '5'),
(129, 40, 'NS/NC'),
(130, 40, '1'),
(131, 40, '2'),
(132, 40, '3'),
(133, 40, '4'),
(134, 40, '5'),
(135, 41, 'NS/NC'),
(136, 41, '1'),
(137, 41, '2'),
(138, 41, '3'),
(139, 41, '4'),
(140, 41, '5'),
(141, 42, 'NS/NC'),
(142, 42, '1'),
(143, 42, '2'),
(144, 42, '3'),
(145, 42, '4'),
(146, 42, '5'),
(147, 43, 'NS/NC'),
(148, 43, '1'),
(149, 43, '2'),
(150, 43, '3'),
(151, 43, '4'),
(152, 43, '5'),
(153, 44, 'NS/NC'),
(154, 44, '1'),
(155, 44, '2'),
(156, 44, '3'),
(157, 44, '4'),
(158, 44, '5'),
(159, 45, 'NS/NC'),
(160, 45, '1'),
(161, 45, '2'),
(162, 45, '3'),
(163, 45, '4'),
(164, 45, '5'),
(165, 46, 'NS/NC'),
(166, 46, '1'),
(167, 46, '2'),
(168, 46, '3'),
(169, 46, '4'),
(170, 46, '5'),
(171, 47, 'NS/NC'),
(172, 47, '1'),
(173, 47, '2'),
(174, 47, '3'),
(175, 47, '4'),
(176, 47, '5'),
(177, 48, 'NS/NC'),
(178, 48, '1'),
(179, 48, '2'),
(180, 48, '3'),
(181, 48, '4'),
(182, 48, '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `id_Pregunta` int(11) NOT NULL,
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
