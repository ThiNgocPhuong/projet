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
    CONSTRAINT fk_utilisatuer_realisation FOREIGN KEY (email) REFERENCES Utilisateur(email)
);