CREATE TABLE Estudios (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre tinytext NOT NULL
);

CREATE TABLE Encuestas (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_Estudios int NOT NULL,
  FOREIGN KEY (id_Estudios) REFERENCES Estudios(id)
);

CREATE TABLE Secciones (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre tinytext NOT NULL
);

CREATE TABLE Preguntas (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_Secciones int NOT NULL,
  tipo_pregunta int NOT NULL,
  pregunta text NOT NULL,
  descripcion text,
  FOREIGN KEY (id_Secciones) REFERENCES Secciones(id)
);

CREATE TABLE Respuestas (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_Preguntas int NOT NULL,
  id_Encuestas int NOT NULL,
  respuesta int NOT NULL,
  FOREIGN KEY (id_Preguntas) REFERENCES Dimensiones(id),
  FOREIGN KEY (id_Encuestas) REFERENCES Dimensiones(id)
);

CREATE TABLE `usuarios` (
  `id` int(32) NOT NULL,
  `nombre` tinytext NOT NULL,
  `password` varchar(20) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`(50));
