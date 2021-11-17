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
  curso_fecha DATE NOT NULL,
  curso_horas INT (3),
  FULLTEXT KEY search(curso_name, curso_contralor)
);

CREATE TABLE participantes(
  cedula INT(9) PRIMARY KEY,
  nombre VARCHAR(30) NOT NULL,
  apellido VARCHAR(30),
  correo VARCHAR(30),
  direccion VARCHAR(50),
  FULLTEXT KEY searchparticipantes(nombre, apellido, correo, direccion)
);

CREATE TABLE instructores(
  cedula int(9) PRIMARY KEY,
  nombre VARCHAR(30) NOT NULL,
  apellido VARCHAR(30),
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
  FOREIGN KEY (cp_participante) REFERENCES participantes(cedula)
    ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE curso_instructor(
  ci_id INT(9) PRIMARY KEY AUTO_INCREMENT,
  ci_curso INT(9),
  ci_instructor INT(9),
  FOREIGN KEY (ci_curso) REFERENCES cursos(curso_id)
    ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY (ci_instructor) REFERENCES instructores(cedula)
    ON DELETE RESTRICT ON UPDATE CASCADE
);

#insertando datos para users

INSERT INTO users (user_name, user_email, user_pass, role) VALUES
    ('jeremy2212', 'jeremy2212landa@gmail.com', MD5('1234'), 'Admin'),
    ('test', 'test@testing.com', MD5('test'), 'User');



#insertando datos para cursos

INSERT INTO cursos (curso_name, curso_description, curso_contralor, curso_fecha, curso_horas) values
    ('curso de prueba1', 'probando la aplicacion con mvc para ver que tan bien o mal está', 'Jeremy Landa', '2021-09-27', 5),
    ('Curso de analisis', 'Analizando el estado actual de mi aplicacion web', 'Daniel Muñoz', '2021-09-27', 3),
    ('Curso Test', 'Testeando lo que se puede hacer aca en esta vaina', 'Jeremy Landa', '2021-09-27', 12);



#insertando datos para participantes

INSERT INTO participantes (nombre, apellido, cedula, correo, direccion) VALUES
    ('Jeremy', 'Landa', 28463395, 'jeremy2212landa@gmail.com', 'programacion'),
    ('Daniel', 'Muñoz', 28111222, 'danieljaja@hotmail.com', 'analisis'),
    ('Yusneilit', 'Gomez', 28222333, 'nasyeka@gmail.com', 'recursos humanos'),
    ('Gerardo', 'Medina', 28333444, 'gerarjos@gmail.com', 'programacion');



#insertando datos para instructores

INSERT INTO instructores (nombre, apellido, cedula, correo, instituto, cargo) VALUES
    ('Jorge','Perez',13727163,'jorgeisgay@gmail.com','batallagallo','rapero');


#insertando datos para curso_instructor

INSERT INTO curso_instructor (ci_curso, ci_instructor) VALUES
        (2, 13727163),
        (1, 13727163),
        (3, 13727163);



#insertando datos para curso_participante

INSERT INTO curso_participante (cp_curso, cp_participante) VALUES
        (2, 28463395),
        (2, 28333444),
        (2, 28222333),
        (2, 28111222),
        (3, 28333444),
        (3, 28463395),
        (1, 28222333),
        (1, 28463395);
