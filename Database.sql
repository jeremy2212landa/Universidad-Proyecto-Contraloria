DROP DATABASE IF EXISTS contraloria;

CREATE DATABASE IF NOT EXISTS contraloria;

USE contraloria;

CREATE TABLE users(
  user_id INT(7) PRIMARY KEY AUTO_INCREMENT,
  user_name VARCHAR(30),
  user_email VARCHAR(30) NOT NULL,
  user_pass CHAR(32) NOT NULL,
  role ENUM('Admin', 'User') NOT NULL
);

CREATE TABLE cursos(
  curso_id INT(9) PRIMARY KEY AUTO_INCREMENT,
  curso_name VARCHAR(80) NOT NULL,
  curso_description TEXT,
  curso_contralor VARCHAR(30),
  curso_fecha DATE,
  FULLTEXT KEY search(curso_name, curso_contralor)
);

CREATE TABLE participantes(
  participante_id INT(9) PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(30) NOT NULL,
  apellido VARCHAR(30),
  cedula int(9) NOT NULL,
  correo VARCHAR(30),
  direccion VARCHAR(50),
  FULLTEXT KEY searchparticipantes(nombre, apellido, correo, direccion)
);

CREATE TABLE intructores(
  instructor_id int(9) PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(30) NOT NULL,
  apellido VARCHAR(30),
  cedula int(9) NOT NULL,
  correo VARCHAR(30),
  instituto VARCHAR(30),
  cargo VARCHAR(30),
  FULLTEXT KEY searchi(nombre, apellido, correo, instituto)
);

CREATE TABLE curso_participante(
  cp_id INT(9) PRIMARY KEY AUTO_INCREMENT,
  cp_curso INT(9),
  cp_participante INT(9),
  FOREIGN KEY (cp_curso) REFERENCES cursos(curso_id)
    ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY (cp_participante) REFERENCES participantes(participante_id)
    ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE curso_instructor(
  ci_id INT(9) PRIMARY KEY AUTO_INCREMENT,
  ci_curso INT(9),
  ci_instructor INT(9),
  FOREIGN KEY (ci_curso) REFERENCES cursos(curso_id)
    ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY (ci_instructor) REFERENCES intructores(instructor_id)
    ON DELETE RESTRICT ON UPDATE CASCADE
);
