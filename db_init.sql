-- SQL mínimo para inicializar SIGEDU (tobar2)
-- Ajustar nombres/definiciones según tu instancia MySQL

CREATE DATABASE IF NOT EXISTS idukaye1_tobar CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE idukaye1_tobar;

-- Tabla ajustes (banderas y fechas del ciclo)
CREATE TABLE IF NOT EXISTS ajustes (
  id INT PRIMARY KEY,
  cuatrimestre VARCHAR(20) DEFAULT '1er',
  `1_fecha_inicio` DATE NULL,
  `1_fecha_fin` DATE NULL,
  `2_fecha_inicio` DATE NULL,
  `2_fecha_fin` DATE NULL,
  `1examenes_i` DATE NULL,
  `1examenes_f` DATE NULL,
  `2examenes_i` DATE NULL,
  `2examenes_f` DATE NULL,
  materias_i DATE NULL,
  materias_f DATE NULL,
  h_materias TINYINT DEFAULT 0,
  h_ccarrera TINYINT DEFAULT 0,
  h_examenes TINYINT DEFAULT 0,
  mto TINYINT DEFAULT 0,
  exa_estado TINYINT DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO ajustes (id, cuatrimestre, `1_fecha_inicio`, `1_fecha_fin`, `2_fecha_inicio`, `2_fecha_fin`, `1examenes_i`, `1examenes_f`, `2examenes_i`, `2examenes_f`, materias_i, materias_f, h_materias, h_ccarrera, h_examenes, mto, exa_estado)
VALUES (1,'1er',CURDATE(),CURDATE(),CURDATE(),CURDATE(),CURDATE(),CURDATE(),CURDATE(),CURDATE(),CURDATE(),CURDATE(),0,0,0,0,0)
ON DUPLICATE KEY UPDATE id=id;

-- Tabla carreras
CREATE TABLE IF NOT EXISTS carreras (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre TEXT,
  nom_corto TEXT,
  plan TEXT,
  turno TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Usuarios
CREATE TABLE IF NOT EXISTS usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  libreta VARCHAR(50) UNIQUE,
  clave VARCHAR(100),
  apellido TEXT,
  nombre TEXT,
  id_carrera INT DEFAULT 0,
  rol VARCHAR(30) DEFAULT 'Estudiante',
  fecha DATE NULL,
  fechanac DATE NULL,
  direccion TEXT,
  telefono TEXT,
  correo TEXT,
  pais TEXT,
  secundaria TEXT,
  dni TEXT,
  cohorte TEXT,
  estado TEXT,
  lugarnac TEXT,
  cuit VARCHAR(50),
  c_carre TINYINT DEFAULT 0,
  usu TINYINT DEFAULT 1,
  FOREIGN KEY (id_carrera) REFERENCES carreras(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Libretas (referenciado por el código)
CREATE TABLE IF NOT EXISTS libretas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_alumno INT,
  libreta TEXT,
  cambio TINYINT DEFAULT 0,
  FOREIGN KEY (id_alumno) REFERENCES usuarios(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Materias (mínimo para navegar)
CREATE TABLE IF NOT EXISTS materias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_carrera INT,
  codigo VARCHAR(20),
  nombre TEXT,
  grado INT,
  tipo TEXT,
  programa TEXT,
  rc1 INT DEFAULT 0, rc2 INT DEFAULT 0, rc3 INT DEFAULT 0, rc4 INT DEFAULT 0, rc5 INT DEFAULT 0, rc6 INT DEFAULT 0,
  ac1 INT DEFAULT 0, ac2 INT DEFAULT 0, ac3 INT DEFAULT 0, ac4 INT DEFAULT 0, ac5 INT DEFAULT 0, ac6 INT DEFAULT 0, ac7 INT DEFAULT 0,
  FOREIGN KEY (id_carrera) REFERENCES carreras(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Comisiones básicas
CREATE TABLE IF NOT EXISTS comisiones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre TEXT,
  carreras TEXT,
  anio INT,
  id_materia INT,
  c_maxima INT DEFAULT 40,
  numero INT,
  dias TEXT,
  horario TEXT,
  id_usuario INT,
  enviado INT DEFAULT 0,
  turno TEXT,
  FOREIGN KEY (id_materia) REFERENCES materias(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Inscripciones a materias
CREATE TABLE IF NOT EXISTS insc_materias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_materia INT,
  id_alumno INT,
  id_comision INT,
  apellido TEXT,
  orden INT,
  FOREIGN KEY (id_materia) REFERENCES materias(id),
  FOREIGN KEY (id_alumno) REFERENCES usuarios(id),
  FOREIGN KEY (id_comision) REFERENCES comisiones(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Notas de materias (estructura mínima usada por el código)
CREATE TABLE IF NOT EXISTS notas_m (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_alumno INT,
  libreta TEXT,
  id_materia INT,
  estado TEXT,
  profesor TEXT,
  fecha_r DATE,
  nota_regular TEXT,
  comisionc INT,
  matec INT,
  folio TEXT,
  libro TEXT,
  llamado INT,
  estado_final TEXT,
  profesor_final TEXT,
  fecha DATE,
  nota_final TEXT,
  FOREIGN KEY (id_alumno) REFERENCES usuarios(id),
  FOREIGN KEY (id_materia) REFERENCES materias(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exámenes mínimos
CREATE TABLE IF NOT EXISTS examenes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_carrera INT,
  id_materia INT,
  estado TEXT,
  aula TEXT,
  profesor TEXT,
  hora TEXT,
  fecha DATE,
  id_comision INT,
  orden_dia INT,
  turno TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Usuario administrador por defecto
INSERT INTO usuarios (libreta, clave, apellido, nombre, id_carrera, rol, usu)
VALUES ('admin','admin','Admin','General',0,'Administrador',1)
ON DUPLICATE KEY UPDATE libreta=libreta;
