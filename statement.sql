CREATE DATABASE etaste;

USE etaste;

CREATE TABLE worker(
    id INT NOT NULL AUTO_INCREMENT,
    user_id VARCHAR(255),
    user_pwd VARCHAR(255),
    user_email VARCHAR(255) UNIQUE,
    PRIMARY KEY(id)
);

CREATE TABLE admin_site(
    id INT NOT NULL AUTO_INCREMENT,
    user_id VARCHAR(255),
    user_pwd VARCHAR(255),
    user_email VARCHAR(255) UNIQUE,
    PRIMARY KEY(id)
);
INSERT INTO admin_site (user_id, user_pwd, user_email)
VALUES ('LeoVerhoeven', 'admin', 'leoverhoeven@info.nl'); 

CREATE TABLE reserveer(
    id INT NOT NULL AUTO_INCREMENT,
    klantnaam VARCHAR(255) NOT NULL,
    datum DATE NOT NULL,
    tijd VARCHAR(255) NOT NULL,
    telefoon VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE,
    aantal INT NOT NULL,
    tafel VARCHAR(255) NOT NULL,
    jarig VARCHAR(255) NOT NULL, 
    opmerking VARCHAR(255) NOT NULL, 
    allergien VARCHAR(255) NOT NULL, 
    PRIMARY KEY(id)
);

CREATE TABLE eten(
    id INT NOT NULL AUTO_INCREMENT,
    eten VARCHAR(255) NOT NULL,
    prijs_eten VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
);
 
INSERT INTO eten (eten, prijs_eten)
VALUES 
('Bitter balletjes met mosterd', '5,20'),
('Salade met geitenkaas', '3,15'),
('Bonengerecht met diverse groen', '12,50'),
('Dame Blanche', '4,00');

CREATE TABLE drank(
    id INT NOT NULL AUTO_INCREMENT,
    drank VARCHAR(255) NOT NULL,
    prijs_drank VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO drank (drank, prijs_drank)
VALUES 
('Pilsner', '3,10'),
('Tonic', '3.00'),
('koffie', '1,50'),
('Fles wijn', '10,00');

CREATE TABLE besteling(
    id INT NOT NULL AUTO_INCREMENT,
    product_eten VARCHAR(255) NOT NULL,
    product_drank VARCHAR(255) NOT NULL,
    aantal_eten INT NOT NULL,
    aantal_drank INT NOT NULL,
    tafel VARCHAR(255),
    prijs VARCHAR(255),
    PRIMARY KEY(id)
);

CREATE TABLE vooraad(
    id INT NOT NULL AUTO_INCREMENT,
    product VARCHAR(255) NOT NULL,
    aantal INT NOT NULL,
    besteling_datum TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
);

INSERT INTO vooraad (product, aantal, besteling_datum)
VALUES 
('Brood', '30', CURRENT_TIMESTAMP),
('Salade', '20', CURRENT_TIMESTAMP),
('Hambuger', '50', CURRENT_TIMESTAMP),
('Fles wijn', '15', CURRENT_TIMESTAMP);