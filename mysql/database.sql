/*
QUERY - CREATE


CREATE DATABASE webprogramming;

USE webprogramming;

CREATE TABLE users (
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) PRIMARY KEY NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE segnalazioni (
    id VARCHAR(9) PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    descrizione TEXT NOT NULL,
    stato VARCHAR(50) DEFAULT 'attesa',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (email) REFERENCES users(email)
);

CREATE TABLE prenotazioni (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data DATE NOT NULL,
    id_orario INT NOT NULL,
    descrizione VARCHAR(500),
    FOREIGN KEY (id_orario) REFERENCES orari(id),
    UNIQUE (data, id_orario)
);


CREATE TABLE orari (
    id INT AUTO_INCREMENT PRIMARY KEY,
    orario TIME NOT NULL
);


INSERT INTO orari (orario) VALUES
('08:00:00'),
('08:30:00'),
('09:00:00'),
('09:30:00'),
('10:00:00'),
('10:30:00'),
('11:00:00'),
('11:30:00'),
('12:00:00'),
('12:30:00'),
('13:00:00'),
('13:30:00'),
('14:00:00'),
('14:30:00'),
('15:00:00'),
('15:30:00'),
('16:00:00'),
('16:30:00'),
('17:00:00'),
('17:30:00'),
('18:00:00'),
('18:30:00'),
('19:00:00'),
('19:30:00');


CREATE TABLE RicambiTelefoni (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_ricambio VARCHAR(100) NOT NULL,
    modello_telefono VARCHAR(100) NOT NULL,
    costo DECIMAL(10, 2) NOT NULL
);

*/