DROP DATABASE IF EXISTS nasa_explorer;
CREATE DATABASE nasa_explorer;

DROP USER IF EXISTS nasa_explorer;
CREATE USER 'nasa_explorer'@'%' IDENTIFIED BY '@admin';

GRANT ALL PRIVILEGES ON nasa_explorer.* TO nasa_explorer;

USE nasa_explorer;

CREATE TABLE usuarios (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(120) NOT NULL,
    username VARCHAR(32) UNIQUE NOT NULL,
    correo VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE favoritos(
    id_favorito INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT,
    tipo VARCHAR(50),
    referencia VARCHAR(255),
    titulo VARCHAR(255),
    url TEXT,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP(),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) 
    ON DELETE CASCADE 
    ON UPDATE CASCADE
);