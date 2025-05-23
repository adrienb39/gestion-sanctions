CREATE TABLE enseignants
(
    id_enseignant INT NOT NULL AUTO_INCREMENT,
    code_enseignant INT NOT NULL UNIQUE,
    nom_enseignant varchar(50) NOT NULL,
    prenom_enseignant varchar(50) NOT NULL,
    CONSTRAINT PK_ENSEIGNANTS PRIMARY KEY(id_enseignant)
)

ALTER TABLE sanctions
ADD COLUMN id_enseignant INT NOT NULL,
ADD CONSTRAINT FK_SANCTIONS_ENSEIGNANTS FOREIGN KEY(id_enseignant) REFERENCES enseignants(id_enseignant)