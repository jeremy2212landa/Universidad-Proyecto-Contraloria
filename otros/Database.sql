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

#insertando datos para users

INSERT INTO users (user_name, user_email, user_pass, role) VALUES
    ('jeremy2212', 'jeremy2212landa@gmail.com', MD5('1234'), 'Admin'),
    ('test', 'test@testing.com', MD5('test'), 'User');



#insertando datos para cursos

INSERT INTO cursos (curso_name, curso_description, curso_contralor, curso_fecha) values
    ('curso de prueba1', 'probando la aplicacion con mvc para ver que tan bien o mal está', 'Jeremy Landa', '2021-09-27'),
    ('Curso de analisis', 'Analizando el estado actual de mi aplicacion web', 'Daniel Muñoz', '2021-09-27'),
    ('Curso Test', 'Testeando lo que se puede hacer aca en esta vaina', 'Jeremy Landa', '2021-09-27');



#insertando datos para participantes

INSERT INTO participantes (nombre, apellido, cedula, correo, direccion) VALUES
    ('Jeremy', 'Landa', 28463395, 'jeremy2212landa@gmail.com', 'programacion'),
    ('Daniel', 'Muñoz', 28111222, 'danieljaja@hotmail.com', 'analisis'),
    ('Yusneilit', 'Gomez', 28222333, 'nasyeka@gmail.com', 'recursos humanos'),
    ('Gerardo', 'Medina', 28333444, 'gerarjos@gmail.com', 'programacion');



#insertando datos para instructores

INSERT INTO intructores (nombre, apellido, cedula, correo, instituto, cargo) VALUES
    ('Jorge','Perez','11000000','jorgeisgay@gmail.com','batallagallo','rapero');


#insertando datos para curso_instructor

INSERT INTO curso_instructor (ci_id, ci_curso, ci_instructor) VALUES
        (0, 2, 1)
        (0, 1, 1)
        (0, 3, 1);



#insertando datos para curso_participante

INSERT INTO curso_participante (cp_id, cp_curso, ci_participante) VALUES
        (0, 2, 1)
        (0, 2, 4)
        (0, 2, 3)
        (0, 2, 2)
        (0, 3, 4)
        (0, 3, 1)
        (0, 1, 3)
        (0, 1, 1);
