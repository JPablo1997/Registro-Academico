DROP DATABASE IF EXISTS `registro`;
CREATE DATABASE `registro`;
USE `registro`;

CREATE TABLE `mat_materia` (
    mat_id INTEGER(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    mat_nombre VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `grd_grado` (
    grd_id INTEGER(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    grd_nombre VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `mxg_materiasxgrado` (
    mxg_id INTEGER(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    mxg_id_grd INTEGER(10) NOT NULL,
    mxg_id_mat INTEGER(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `alm_alumno` (
    alm_id INTEGER(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    alm_nombre VARCHAR(300) NOT NULL,
    alm_edad INTEGER(10) NOT NULL,
    alm_sexo VARCHAR(100) NOT NULL,
    alm_id_grd INTEGER(10) NOT NULL,
    alm_observacion VARCHAR(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8; 

ALTER TABLE `alm_alumno` ADD FOREIGN KEY (alm_id_grd) REFERENCES grd_grado(grd_id); 
ALTER TABLE `mxg_materiasxgrado` ADD FOREIGN KEY (mxg_id_grd) REFERENCES grd_grado(grd_id); 
ALTER TABLE `mxg_materiasxgrado` ADD FOREIGN KEY (mxg_id_mat) REFERENCES mat_materia(mat_id); 

INSERT INTO `mat_materia`(mat_id, mat_nombre) VALUES (1, 'Lenguaje 1');
INSERT INTO `mat_materia`(mat_id, mat_nombre) VALUES (2, 'Ciencias 1');
INSERT INTO `mat_materia`(mat_id, mat_nombre) VALUES (3, 'Matematicas 1');
INSERT INTO `mat_materia`(mat_id, mat_nombre) VALUES (4, 'Lenguaje 2');
INSERT INTO `mat_materia`(mat_id, mat_nombre) VALUES (5, 'Ciencias 2');
INSERT INTO `mat_materia`(mat_id, mat_nombre) VALUES (6, 'Matematicas 2');
INSERT INTO `mat_materia`(mat_id, mat_nombre) VALUES (7, 'Lenguaje 3');
INSERT INTO `mat_materia`(mat_id, mat_nombre) VALUES (8, 'Ciencias 3');
INSERT INTO `mat_materia`(mat_id, mat_nombre) VALUES (9, 'Matematicas 3');

INSERT INTO `grd_grado`(grd_id, grd_nombre) VALUES (1 , 'Primer grado');
INSERT INTO `grd_grado`(grd_id, grd_nombre) VALUES (2 , 'Segundo grado');
INSERT INTO `grd_grado`(grd_id, grd_nombre) VALUES (3 , 'Tercer grado');

INSERT INTO `mxg_materiasxgrado`(mxg_id, mxg_id_grd, mxg_id_mat) VALUES (1, 1, 1);
INSERT INTO `mxg_materiasxgrado`(mxg_id, mxg_id_grd, mxg_id_mat) VALUES (2, 1, 2);
INSERT INTO `mxg_materiasxgrado`(mxg_id, mxg_id_grd, mxg_id_mat) VALUES (3, 1, 3);

INSERT INTO `mxg_materiasxgrado`(mxg_id, mxg_id_grd, mxg_id_mat) VALUES (4, 2, 4);
INSERT INTO `mxg_materiasxgrado`(mxg_id, mxg_id_grd, mxg_id_mat) VALUES (5, 2, 5);
INSERT INTO `mxg_materiasxgrado`(mxg_id, mxg_id_grd, mxg_id_mat) VALUES (6, 2, 6);

INSERT INTO `mxg_materiasxgrado`(mxg_id, mxg_id_grd, mxg_id_mat) VALUES (7, 3, 7);
INSERT INTO `mxg_materiasxgrado`(mxg_id, mxg_id_grd, mxg_id_mat) VALUES (8, 3, 8);
INSERT INTO `mxg_materiasxgrado`(mxg_id, mxg_id_grd, mxg_id_mat) VALUES (9, 3, 9);

INSERT INTO `alm_alumno`(alm_id, alm_nombre, alm_edad, alm_sexo, alm_id_grd, alm_observacion) 
VALUES (1, 'Carlos Alejando Alvarez', 18, 'Masculino', 1, 'Alumno que cursa primer grado.');
INSERT INTO `alm_alumno`(alm_id, alm_nombre, alm_edad, alm_sexo, alm_id_grd, alm_observacion) 
VALUES (2, 'Francisco Alexis Mendoza', 19, 'Masculino', 2, 'Alumno que cursa segundo grado.');
INSERT INTO `alm_alumno`(alm_id, alm_nombre, alm_edad, alm_sexo, alm_id_grd, alm_observacion) 
VALUES (3, 'Evelyn Marisol Diaz', 20, 'Femenino', 3, 'Alumna que cursa tercer grado.');