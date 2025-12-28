CREATE DATABASE assadvzoo;
use assadvzoo;


CREATE TABLE habitats (
    id_habitat INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR (50) NOT NULL,
    typeclimat VARCHAR (50) NOT NULL,
    description VARCHAR (250) NOT NULL,
    zonezoo VARCHAR (50) NOT NULL
);



CREATE TABLE animaux (
    id_animal INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR (50) NOT NULL,
    espece VARCHAR (50) NOT NULL ,
    alimentation VARCHAR (50) NOT NULL,
    image VARCHAR (255) NOT NULL, 
    paysOrigine VARCHAR (50) NOT NULL, 
    descriptionCourte VARCHAR (255),
    id_habitat INT,
    FOREIGN KEY (id_habitat) REFERENCES habitats(habitat_id)
);

CREATE TABLE utilisateurs(
    id_user INT AUTO_INCREMENT PRIMARY KEY ,
    nom VARCHAR (50) NOT NULL,
    email VARCHAR (100) NOT NULL,
    role VARCHAR (50) NOT NULL,
    password_hash VARCHAR (250) NOT NULL
);

CREATE TABLE visitesguidees (
    id_visite INT AUTO_INCREMENT PRIMARY KEY ,
    titre VARCHAR (50) NOT NULL ,
    dateHeure DATETIME NOT NULL,
    langue VARCHAR (50) NOT NULL,
    capaciteMax INT NOT NULL,
    statut VARCHAR (100) DEFAULT "OFFLINE",
    duree INT NOT NULL,
    prix FLOAT NOT NULL
);
CREATE TABLE etapesvisite(
    id_etape INT AUTO_INCREMENT PRIMARY KEY,
    titreetape VARCHAR (250) NOT NULL,
    descriptionetape VARCHAR (250),
    ordreetape INT NOT NULL,
    id_visite INT,
    FOREIGN KEY (id_visite) REFERENCES visitesguidees (id_visite)    
);
CREATE TABLE reservations (
    id_reserve INT AUTO_INCREMENT PRIMARY KEY,
    idVisite INT,
    idUtilisateur INT,
    nbPersonnes INT NOT NULL,
    dateReservation DATETIME NOT NULL,
    FOREIGN KEY (idVisite) REFERENCES visitesguidees(id_visite),
    FOREIGN KEY (idUtilisateur) REFERENCES utilisateurs (id_user)
);



INSERT INTO animaux (nom, espece, alimentation, image, paysOrigine, descriptionCourte, id_habitat)
VALUES('Simba', 'Panthera leo', 'Carnivore', 'https://images.unsplash.com/photo-1543946207-39bd91e70ca7', 'Kenya', 'Le roi de la jungle. Simba aime se reposer au soleil et rugir à la tombée de la nuit.',1);



INSERT INTO habitats( nom, typeClimat, description, zoneZoo) VALUES
('Volière', 'Climat tropical tempéré', ' La volière est un espace ouvert permettant aux oiseaux de voler librement dans un environnement sécurisé','Zone E');