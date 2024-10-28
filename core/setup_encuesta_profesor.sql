

-- Crear la tabla profesores
CREATE TABLE IF NOT EXISTS profesores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

-- Crear la tabla criterios
CREATE TABLE IF NOT EXISTS criterios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descripcion VARCHAR(255) NOT NULL
);

-- Crear la tabla usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    provincia VARCHAR(100),
    ciudad VARCHAR(100),
    telefono VARCHAR(20),
    dni VARCHAR(20) NOT NULL UNIQUE,
    contraseña VARCHAR(255) NOT NULL
);

-- Crear la tabla respuestas
CREATE TABLE IF NOT EXISTS respuestas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    profesor_id INT NOT NULL,
    criterio_id INT NOT NULL,
    respuesta INT NOT NULL,
    comentario TEXT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (profesor_id) REFERENCES profesores(id) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (criterio_id) REFERENCES criterios(id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Crear la tabla profesor_caracteristicas
CREATE TABLE IF NOT EXISTS profesor_caracteristicas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    profesor_id INT NOT NULL,
    experiencia INT NOT NULL, -- Años de experiencia
    educacion INT NOT NULL, -- Nivel educativo (por ejemplo, 1 para bachillerato, 2 para licenciatura, etc.)
    FOREIGN KEY (profesor_id) REFERENCES profesores(id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Insertar datos en la tabla profesores
INSERT INTO profesores (nombre) VALUES 
('Profesor 1'),
('Profesor 2'),
('Profesor 3');

-- Insertar datos en la tabla criterios
INSERT INTO criterios (descripcion) VALUES 
('Claridad en la explicación'),
('Atención a los alumnos'),
('Conocimiento del tema');

-- Insertar datos en la tabla usuarios
INSERT INTO usuarios (nombre, correo, provincia, ciudad, telefono, dni, contraseña) VALUES 
('Usuario 1', 'usuario1@example.com', 'Provincia 1', 'Ciudad 1', '123456789', 'DNI1', 'pass1'),
('Usuario 2', 'usuario2@example.com', 'Provincia 2', 'Ciudad 2', '987654321', 'DNI2', 'pass2');

-- Insertar datos en la tabla respuestas
INSERT INTO respuestas (usuario_id, profesor_id, criterio_id, respuesta, comentario) VALUES 
(1, 1, 1, 5, 'Excelente explicación.'),
(1, 2, 2, 4, 'Atención buena, pero podría mejorar.'),
(2, 3, 3, 3, 'Conocimiento del tema regular.');

-- Insertar datos en la tabla profesor_caracteristicas
INSERT INTO profesor_caracteristicas (profesor_id, experiencia, educacion) VALUES
(1, 5, 2),  -- Profesor 1
(2, 10, 3), -- Profesor 2
(3, 2, 1);  -- Profesor 3
