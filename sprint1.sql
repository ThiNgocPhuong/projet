CREATE TABLE Utilisateur
(
    nom VARCHAR(25),
    prenom VARCHAR(25),
    email VARCHAR(25),
    mdp VARCHAR(30),
    CONSTRAINT pk_utilisateur PRIMARY KEY(email)
);

CREATE TABLE Gerant
(
    email VARCHAR(25),
    CONSTRAINT pk_utilisateur PRIMARY KEY(email),
    CONSTRAINT fk_utilisateur_gerant FOREIGN KEY(email) REFERENCES Utilisateur(email)
);

CREATE TABLE Participant
(
    email VARCHAR(25),
    CONSTRAINT pk_email PRIMARY KEY(email),
    CONSTRAINT fk_utilisateur_participant FOREIGN KEY(email) REFERENCES Utilisateur(email)
);

CREATE TABLE Realisation
(
    id_realisation INTEGER,
    photo VARCHAR(45),
    titre_realisation VARCHAR(20),
    date_debut_realisation DATE,
    date_fin_realisation DATE,
    description_realisation VARCHAR(100),
    date_participation DATE,
    email VARCHAR(25),
    CONSTRAINT pk_id_realisation PRIMARY KEY(id_realisation),
    CONSTRAINT fk_utilisatuer_realisation FOREIGN KEY (email) REFERENCES Utilisateur(email)
);

CREATE TABLE Parametre_Concours
(
    participation_debut DATE,
    participation_fin DATE
);

INSERT INTO Utilisateur (
    email, nom, prenom, mdp
)
VALUES
('noble@gmail.com', 'Criquet', 'Jean-Michel', 'Mabeaute=monintelligence'),
('salle.danse@gmail.com','Antonova', 'Mihaela','Jesuisunepisseuse'),
('jardin@gmail.com', 'Sam', 'Caroline','jesuis@ccroausucre'),
('salle.bain@gmail.com', 'Bouba', 'Pingu', 'jesuisunminiNicolaen+beau'),
('fetedelasaucice@gmail.com', 'Saucisse', 'Saucisse','Jesuisunebonnes@ucice');

INSERT INTO Parametre_Concours (participation_debut,participation_fin)
VALUES('2023-01-09','2023-02-12');

INSERT INTO Gerant(email)
VALUES('fetedelasaucice@gmail.com');

INSERT INTO Participant(email)
VALUES
('noble@gmail.com'),
('salle.danse@gmail.com'),
('jardin@gmail.com'),
('salle.bain@gmail.com');

INSERT INTO Realisation(id_realisation, photo, date_debut_realisation, date_fin_realisation, date_participation, email)
VALUES
(01,'C:\Users\SAM\photos_projet','2023-01-10','2023-01-30', '2023-02-01','noble@gmail.com'),
(02,'C:\Users\SAM\photos_projet','2023-01-10','2023-01-20', '2023-01-30','salle.danse@gmail.com'),
(03,'C:\Users\SAM\photos_projet','2023-01-01','2023-01-20', '2023-01-29','jardin@gmail.com'),
(04,'C:\Users\SAM\photos_projet','2023-01-03','2023-01-26', '2023-02-09','salle.bain@gmail.com');
