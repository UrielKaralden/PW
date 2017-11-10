-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2017 a las 17:27:27
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
  `id_Estudios` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios`
--

CREATE TABLE `estudios` (
  `id` int(11) NOT NULL,
  `nombre` tinytext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudios`
--

INSERT INTO `estudios` (`id`, `nombre`) VALUES
(1, 'Mi Casa'),
(2, 'Mi Casa'),
(3, 'Mi Casa'),
(4, ''),
(5, 'lucia'),
(6, 'UCA');

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
  `id_Secciones` int(11) NOT NULL,
  `tipo_pregunta` varchar(50) NOT NULL,
  `pregunta` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `id_Secciones`, `tipo_pregunta`, `pregunta`) VALUES
(1, 0, 'number', 'Código de la titulación a la que está adscrito'),
(2, 0, 'number', 'Código de la asignatura que está evaluando'),
(3, 0, 'number', 'Grupo de la asignatura al que pertenece'),
(5, 1, 'number', 'Edad (Años)'),
(6, 1, 'radio', 'Sexo'),
(7, 1, 'radio', 'Curso más alto en el que está matriculado'),
(8, 1, 'radio', 'Curso más bajo en el que está matriculado'),
(9, 1, 'radio', 'Veces que se ha matriculado en esta asignatura'),
(10, 1, 'radio', 'Veces que se ha examinado en esta asignatura'),
(11, 1, 'radio', 'Nivel de interés personal por la asignatura'),
(12, 1, 'radio', 'Nivel de uso de las tutorías'),
(13, 1, 'radio', 'Dificultad de esta asignatura'),
(14, 1, 'radio', 'Calificación esperada en esta asignatura'),
(15, 1, 'radio', 'Nivel de asistencia a clase (% de horas lectivas)'),
(16, 2, 'radio', 'El/la profesor/a informa sobre los distintos aspectos de la guía docente o programa de la asignatura (objetivos, actividades, contenidos del temario, metodología, bibliografía, sistemas de evaluación, etc)'),
(4, 0, 'number', 'Código del profesor que va a evaluar'),
(17, 3, 'radio', 'Imparte las clases en el horario fijado'),
(18, 3, 'radio', 'Asiste regularmente a clase'),
(19, 3, 'radio', 'Cumple adecuadamente su labor de tutoría (presencial o virtual)'),
(20, 3, 'radio', 'Se ajusta a la planificación de la asignatura'),
(21, 3, 'radio', 'Se han coordinado las actividades teóricas y prácticas'),
(22, 3, 'radio', 'Se ajusta a los sistemas de evaluación especificados en la guia docente/programa de la asignatura'),
(23, 3, 'radio', 'La bibliografía y otras fuentes de información recomendadas en el programa son útiles para el aprendizaje de la asignatura'),
(24, 3, 'radio', 'El/la profesor/a organiza bien las actividades que se realizan en clase'),
(25, 3, 'radio', 'Utiliza recursos didácticos(pizarra, transparencias, medios audiovisuales, material de apoyo en red virtual, etc) que facilitan el aprendizaje'),
(26, 3, 'radio', 'Explica con claridad y resalta los contenidos importantes'),
(27, 3, 'radio', 'Se interesa por el grado de comprensión de sus explicaciones'),
(28, 3, 'radio', 'Expone ejemplos en los que se ponen en práctica los contenidos de la asignatura'),
(29, 3, 'radio', 'Explica los contenidos con seguridad'),
(30, 3, 'radio', 'Resuelve las dudas que se le plantean'),
(31, 3, 'radio', 'Fomenta un clima de trabajo y participación'),
(32, 3, 'radio', 'Propicia una comunicación fluida y espontánea'),
(33, 3, 'radio', 'Motiva a los/as estudiantes para que se interesen por la asignatura'),
(34, 3, 'radio', 'Es respetuoso/a en el trato con los/las estudiantes'),
(35, 3, 'radio', 'Tengo claro lo que se me va a exigir para superar esta asignatura'),
(36, 3, 'radio', 'Los criterios y sistemas de evaluación me parecen adecuados, en el contexto de la asignatura'),
(37, 4, 'radio', 'Las actividades desarrolladas (teóricas, prácticas, de trabajo individual, en grupo, etc) contribuyen a alcanzar los objetivos de la asignatura'),
(38, 4, 'radio', 'Estoy satisfecho/a con la labor docente de este profesor/a');

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
  `id` int(32) NOT NULL,
  `id_Encuesta` int(32) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `id_Encuesta`, `nombre`) VALUES
(3, 1, 'PLANIFICACIÓN DE LA ENSEÑANZA Y APRENDIZAJE'),
(4, 1, 'DESARROLLO DE LA DOCENCIA'),
(2, 1, 'INFORMACIÓN PERSONAL Y ACADÉMICA DE LOS ESTUDIANTES'),
(1, 1, 'CÓDIGO ASIGNATURA'),
(5, 1, 'RESULTADOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(32) NOT NULL,
  `id_Estudio` int(100) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `admin` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_Estudio`, `nombre`, `email`, `password`, `admin`) VALUES
(1, 1, '0', 'admin@admin.es', '0', 1),
(2, 1, '$name', '$email', '$pswd', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Estudios` (`id_Estudios`);

--
-- Indices de la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `id_Secciones` (`id_Secciones`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estudios`
--
ALTER TABLE `estudios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `participantes`
--
ALTER TABLE `participantes`
  MODIFY `id_participacion` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
