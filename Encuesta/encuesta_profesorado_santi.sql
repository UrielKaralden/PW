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

CREATE TABLE Usuarios (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre tinytext NOT NULL UNIQUE,
  password tinytext NOT NULL,
  admin int NOT NULL,
);
