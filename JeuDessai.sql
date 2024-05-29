-- Insertions pour la table Medecin
INSERT INTO Medecin VALUES(1, 'Dupont', 'Jean', '123 rue du parc', '0123456789', 'Cardiologue', 75);
INSERT INTO Medecin VALUES(2, 'Martin', 'Marie', '456 avenue de la république', '0123456790', 'Neurologue', 78);
INSERT INTO Medecin VALUES(3, 'Durand', 'Paul', '789 boulevard des fleurs', '0123456781', 'Orthopédiste', 77);
INSERT INTO Medecin VALUES(4, 'Leclerc', 'Sophie', '101 rue des tulipes', '0123456782', 'Radiologue', 91);
INSERT INTO Medecin VALUES(5, 'Moreau', 'Pierre', '102 avenue des lilas', '0123456783', 'Dermatologue', 93);
INSERT INTO Medecin VALUES(6, 'Perrin', 'Lucie', '103 boulevard du marché', '0123456784', 'Rhumatologue', 92);
INSERT INTO Medecin VALUES(7, 'Simon', 'Jacques', '104 rue de la gare', '0123456785', 'Ophtalmologue', 95);
INSERT INTO Medecin VALUES(8, 'Leroy', 'Camille', '105 avenue du port', '0123456786', 'Pédiatre', 94);
INSERT INTO Medecin VALUES(9, 'Roux', 'Nicolas', '106 boulevard des champs', '0123456787', 'Chirurgien', 76);
INSERT INTO Medecin VALUES(10, 'Bertrand', 'Julie', '107 rue des roses', '0123456788', 'Endocrinologue', 89);

-- Insertions pour la table Visiteur
INSERT INTO Visiteur VALUES(1, 'Girard', 'François', 'fgirard', 'password123', '201 rue des étoiles', '75001', 'Paris', '2022-01-01');
INSERT INTO Visiteur VALUES(2, 'Petit', 'Nathalie', 'npetit', 'password456', '202 avenue de la plage', '75002', 'Paris', '2022-02-01');
INSERT INTO Visiteur VALUES(3, 'Brun', 'Olivier', 'obrun', 'password789', '203 boulevard du soleil', '75003', 'Paris', '2022-03-01');
INSERT INTO Visiteur VALUES(4, 'Blanc', 'Isabelle', 'iblanc', 'password012', '204 rue de la montagne', '75004', 'Paris', '2022-04-01');
INSERT INTO Visiteur VALUES(5, 'Noir', 'Christophe', 'cnoir', 'password345', '205 avenue du vent', '75005', 'Paris', '2022-05-01');
INSERT INTO Visiteur VALUES(6, 'Rouge', 'Valérie', 'vrouge', 'password678', '206 boulevard de la mer', '75006', 'Paris', '2022-06-01');
INSERT INTO Visiteur VALUES(7, 'Vert', 'David', 'dvert', 'password901', '207 rue du ciel', '75007', 'Paris', '2022-07-01');
INSERT INTO Visiteur VALUES(8, 'Bleu', 'Sylvie', 'sbleu', 'password234', '208 avenue des oiseaux', '75008', 'Paris', '2022-08-01');
INSERT INTO Visiteur VALUES(9, 'Jaune', 'Philippe', 'pjaune', 'password567', '209 boulevard des nuages', '75009', 'Paris', '2022-09-01');
INSERT INTO Visiteur VALUES(10, 'Rose', 'Catherine', 'crose', 'password890', '210 rue des rêves', '75010', 'Paris', '2022-10-01');

-- Insertions pour la table Rapport
INSERT INTO Rapport VALUES(1, '2023-09-01', 'Consultation régulière', 'Tout va bien', 1, 1);
INSERT INTO Rapport VALUES(2, '2023-09-02', 'Douleurs au dos', 'Prescription de médicaments', 2, 2);
INSERT INTO Rapport VALUES(3, '2023-09-03', 'Migraines', 'Consultation à suivre', 3, 3);
INSERT INTO Rapport VALUES(4, '2023-09-04', 'Visite annuelle', 'Rien à signaler', 4, 4);
INSERT INTO Rapport VALUES(5, '2023-09-05', 'Allergies', "Prescription d'antihistaminiques", 5, 5);
INSERT INTO Rapport VALUES(6, '2023-09-06', 'Consultation régulière', 'Tout va bien', 6, 6);
INSERT INTO Rapport VALUES(7, '2023-09-07', 'Douleurs aux genoux', 'Prescription de médicaments', 7, 7);
INSERT INTO Rapport VALUES(8, '2023-09-08', 'Toux persistante', "Prescription d'antitussifs", 8, 8);
INSERT INTO Rapport VALUES(9, '2023-09-09', 'Visite annuelle', 'Rien à signaler', 9, 9);
INSERT INTO Rapport VALUES(10, '2023-09-10', 'Problèmes de peau', 'Consultation dermatologique à venir', 10, 10);

-- Insertions pour la table Famille
INSERT INTO Famille VALUES(1, 'Antalgiques');
INSERT INTO Famille VALUES(2, 'Antibiotiques');
INSERT INTO Famille VALUES(3, 'Antiviraux');
INSERT INTO Famille VALUES(4, 'Antihistaminiques');
INSERT INTO Famille VALUES(5, 'Anti-inflammatoires');
INSERT INTO Famille VALUES(6, 'Antitussifs');
INSERT INTO Famille VALUES(7, 'Antipsychotiques');
INSERT INTO Famille VALUES(8, 'Antidépresseurs');
INSERT INTO Famille VALUES(9, 'Antidiabétiques');
INSERT INTO Famille VALUES(10, 'Anxiolytiques');

-- Insertions pour la table Medicament
INSERT INTO Medicament VALUES(1, 'Doliprane', 'Paracétamol', 'Soulage la douleur', 'Allergie au paracétamol', 1);
INSERT INTO Medicament VALUES(2, 'Amoxicilline', 'Amoxicilline', 'Antibiotique à large spectre', "Allergie à l'amoxicilline", 2);
INSERT INTO Medicament VALUES(3, 'Tamiflu', 'Oseltamivir', 'Traite la grippe', 'Réactions allergiques rares', 3);
INSERT INTO Medicament VALUES(4, 'Clarityne', 'Loratadine', 'Réduit les symptômes allergiques', 'Hypersensibilité à la loratadine', 4);
INSERT INTO Medicament VALUES(5, 'Ibuprofène', 'Ibuprofène', 'Anti-inflammatoire et antalgique', 'Ulcères gastriques', 5);
INSERT INTO Medicament VALUES(6, 'Tussidane', 'Codéine', 'Antitussif', 'Dépendance à la codéine', 6);
INSERT INTO Medicament VALUES(7, 'Risperdal', 'Rispéridone', 'Antipsychotique', 'Allergies à la rispéridone', 7);
INSERT INTO Medicament VALUES(8, 'Prozac', 'Fluoxétine', 'Antidépresseur', 'Interactions médicamenteuses', 8);
INSERT INTO Medicament VALUES(9, 'Metformine', 'Metformine', 'Antidiabétique', 'Insuffisance rénale', 9);
INSERT INTO Medicament VALUES(10, 'Xanax', 'Alprazolam', 'Anxiolytique', "Dépendance à l'alprazolam", 10);

-- Insertions pour la table Offrir
INSERT INTO Offrir VALUES(1, 1, 10);
INSERT INTO Offrir VALUES(1, 2, 20);
INSERT INTO Offrir VALUES(2, 3, 5);
INSERT INTO Offrir VALUES(2, 4, 15);
INSERT INTO Offrir VALUES(3, 5, 7);
INSERT INTO Offrir VALUES(3, 6, 30);
INSERT INTO Offrir VALUES(4, 7, 40);
INSERT INTO Offrir VALUES(4, 8, 25);
INSERT INTO Offrir VALUES(5, 9, 50);
INSERT INTO Offrir VALUES(5, 10, 60);
