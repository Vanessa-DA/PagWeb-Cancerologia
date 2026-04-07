CREATE TABLE pacientes (
    id               SERIAL PRIMARY KEY,
    nombre           VARCHAR(100) NOT NULL,
    cedula           VARCHAR(20)  NOT NULL UNIQUE,
    tipo_cancer      VARCHAR(50)  NOT NULL,
    estado_paciente  VARCHAR(30)  NOT NULL,
    fecha_registro   TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO pacientes (nombre, cedula, tipo_cancer, estado_paciente) VALUES
('María Torres Gómez',    '1012345678', 'Mama',      'En tratamiento'),
('Carlos Ruiz Peña',      '1098765432', 'Pulmón',    'Seguimiento'),
('Ana Lucía Martínez',    '1023456789', 'Leucemia',  'En tratamiento'),
('Jorge Hernández López', '1045678901', 'Colon',     'Alta médica'),
('Sandra Moreno Díaz',    '1067890123', 'Linfoma',   'Urgencia');