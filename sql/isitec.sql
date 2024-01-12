CREATE DATABASE isitec;
USE isitec;

CREATE TABLE IF NOT EXISTS users(
    iduser INTEGER PRIMARY KEY AUTO_INCREMENT,
    mail Varchar(40) UNIQUE,
    username Varchar(16) UNIQUE,
    passHash Varchar(60),
    userFirstName Varchar(60),
    userLastName Varchar(120),
    creationDate Datetime,
    removeDate Datetime,
    lastSignIn Datetime,
    active TinyInt(1)
    
);

INSERT INTO users (mail, username, passHash, userFirstName, userLastName, creationDate, removeDate, lastSignIn, active)
VALUES
('jgarcia@example.com', 'jgarcia', 'hash1', 'Juan', 'García', '2024-01-12 12:00:00', NULL, NULL, 1),
('mrodriguez@example.com', 'mrodriguez', 'hash2', 'María', 'Rodríguez', '2024-01-12 12:15:00', NULL, NULL, 1),
('rmartinez@example.com', 'rmartinez', 'hash3', 'Roberto', 'Martínez', '2024-01-12 12:30:00', NULL, NULL, 1),
('llopez@example.com', 'llopez', 'hash4', 'Laura', 'López', '2024-01-12 13:00:00', NULL, NULL, 1),
('csanchez@example.com', 'csanchez', 'hash5', 'Carlos', 'Sánchez', '2024-01-12 13:15:00', NULL, NULL, 1),
('aperez@example.com', 'aperez', 'hash6', 'Ana', 'Pérez', '2024-01-12 13:30:00', NULL, NULL, 1),
('dramirez@example.com', 'dramirez', 'hash7', 'Diego', 'Ramírez', '2024-01-12 13:45:00', NULL, NULL, 1),
('agonzalez@example.com', 'agonzalez', 'hash8', 'Andrea', 'González', '2024-01-12 14:15:00', NULL, NULL, 1),
('jfernandez@example.com', 'jfernandez', 'hash9', 'Javier', 'Fernández', '2024-01-12 14:30:00', NULL, NULL, 1),
('sdiaz@example.com', 'sdiaz', 'hash10', 'Sofía', 'Díaz', '2024-01-12 14:00:00', NULL, NULL, 1),
('mruiz@example.com', 'mruiz', 'hash11', 'Miguel', 'Ruiz', '2024-01-12 15:00:00', NULL, NULL, 1),
('pcastro@example.com', 'pcastro', 'hash12', 'Paula', 'Castro', '2024-01-12 15:15:00', NULL, NULL, 1),
('atorres@example.com', 'atorres', 'hash13', 'Alejandro', 'Torres', '2024-01-12 15:30:00', NULL, NULL, 1),
('vmorales@example.com', 'vmorales', 'hash14', 'Valeria', 'Morales', '2024-01-12 15:45:00', NULL, NULL, 1),
('dherrera@example.com', 'dherrera', 'hash15', 'Daniel', 'Herrera', '2024-01-12 16:00:00', NULL, NULL, 1);