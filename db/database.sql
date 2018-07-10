CREATE DATABASE IF NOT EXISTS socketservice CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE socketservice;

CREATE TABLE IF NOT EXISTS direcciones (
    id INT NOT NULL AUTO_INCREMENT,
    calle VARCHAR(100) NOT NULL,
    ciudad VARCHAR(100) NOT NULL,
    provincia VARCHAR(100) NOT NULL,
    pais VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
) ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    edad INT NOT NULL,
    email VARCHAR(150) NOT NULL,
    direccion_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    CONSTRAINT direcciones_usuarios_fk FOREIGN KEY(direccion_id) REFERENCES direcciones(id)
) ENGINE = INNODB;


-- USE socketservice;

-- ALTER TABLE usuarios ADD created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;
-- ALTER TABLE usuarios ADD updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

-- ALTER TABLE direcciones ADD created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;
-- ALTER TABLE direcciones ADD updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

USE socketservice;
-- DESCRIBE usuarios;
-- Select rows from a Table or View 'usuarios' in schema 'socketservice'
USE socketservice;
SELECT * FROM usuarios LEFT JOIN direcciones
    ON usuarios.direccion_id = direcciones.id;


-- BORRAR UN FOREIGN KEY
-- USE socketservice;

-- ALTER TABLE usuarios DROP FOREIGN KEY direcciones_usuarios_fk; MYSQL
-- ALTER TABLE usuarios DROP CONSTRAINT direcciones_usuarios_fk; ORACLE MSSQL

-- TRUNCATE TABLE direcciones;
-- TRUNCATE TABLE usuarios;

-- ALTER TABLE usuarios ADD CONSTRAINT direcciones_usuarios_fk FOREIGN KEY(direccion_id) REFERENCES direcciones(id)
-- ON DELETE CASCADE