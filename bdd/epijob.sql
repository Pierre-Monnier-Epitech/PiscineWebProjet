-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 22 oct. 2023 à 21:37
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `epijob`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `ann_ID` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `heure` date NOT NULL,
  `vehicule` enum('oui','non') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `prix` float(11,2) DEFAULT NULL,
  `statue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `ville` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`ann_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`ann_ID`, `titre`, `description`, `heure`, `vehicule`, `prix`, `statue`, `ville`) VALUES
(1, 'Ingénieur en informatique cherche opportunités', 'Ingénieur en informatique spécialisé en développement logiciel, recherche de nouvelles opportunités passionnantes.', '2023-10-10', 'non', 1800.00, 'En attente', 'lille'),
(2, 'Assistant administratif en quête de nouvelles missions', 'Assistant administratif polyvalent avec une grande expérience dans la gestion de bureau, recherche des missions intéressantes.', '2023-10-11', 'non', NULL, 'Disponible', 'lyon'),
(4, 'Consultant en marketing à la recherche de projets', 'Consultant en marketing digital avec une solide expertise, cherche des projets stimulants pour aider les entreprises à se développer.', '2023-10-13', 'non', NULL, 'En attente', 'paris'),
(5, 'Graphiste créatif en quête de collaborations', 'Graphiste talentueux avec une passion pour la création visuelle, à la recherche de projets créatifs et d\'opportunités de collaboration.', '2023-10-14', 'non', NULL, 'Disponible', 'vendée'),
(6, 'Infirmière expérimentée cherche poste dans le secteur médical', 'Infirmière agréée avec 8 ans d\'expérience dans divers domaines médicaux, recherche un poste pour mettre en pratique mes compétences et ma compassion.', '2023-10-15', 'non', NULL, 'En attente', 'tourcoing'),
(42, 'plongeur', 'dbfsjkd,vdfh', '2023-10-21', 'non', 14785.00, 'disponible ', 'canada'),
(43, 'test', 'lol', '2023-10-22', 'non', 1785.00, 'disponible', 'pole nord');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `ent_ID` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `ville` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `adresse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`ent_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`ent_ID`, `nom`, `titre`, `ville`, `adresse`, `description`) VALUES
(1, 'TechCo', 'Société de développement logiciel', 'Paris', '123 Rue de la République, 75001 Paris', 'Spécialisée dans le développement de logiciels sur mesure.'),
(2, 'DesignLab', 'Agence de design créatif', 'Lyon', '456 Avenue de la Créativité, 69002 Lyon', 'Offre des services de design créatif pour les entreprises.'),
(3, 'JurisConsult', 'Cabinet d\'avocats spécialisé en droit des affaires', 'Marseille', '789 Boulevard des Entreprises, 13008 Marseille', 'Cabinet d\'avocats offrant des conseils juridiques aux entreprises dans le domaine du droit des affaires.'),
(4, 'DigitalMinds', 'Agence de marketing digital', 'Toulouse', '987 Rue du Marketing, 31000 Toulouse', 'Fournit des services de marketing digital pour optimiser la visibilité en ligne des entreprises.'),
(5, 'EcoTech Solutions', 'Fournisseur de solutions écologiques', 'Paris', '234 Avenue de l\'Environnement, 75002 Paris', 'Propose des solutions technologiques respectueuses de l\'environnement.'),
(6, 'Innovatech', 'Société d\'innovation technologique', 'Lyon', '567 Boulevard de l\'Innovation, 69003 Lyon', 'Axée sur la recherche et le développement de nouvelles technologies.'),
(7, 'BioPharma', 'Société pharmaceutique biotechnologique', 'Marseille', '890 Rue de la Santé, 13010 Marseille', 'Spécialisée dans la recherche et la production de médicaments biotechnologiques.'),
(8, 'EnergySolutions', 'Fournisseur de solutions énergétiques', 'Toulouse', '345 Avenue de l\'Énergie, 31001 Toulouse', 'Fournit des solutions énergétiques durables et innovantes.'),
(9, 'FoodTech Express', 'Plateforme de livraison alimentaire', 'Paris', '456 Avenue de la Gastronomie, 75003 Paris', 'Permet aux restaurants de proposer des livraisons de repas en ligne.'),
(10, 'Consultis', 'Cabinet de conseil en gestion', 'Lyon', '678 Rue de la Stratégie, 69004 Lyon', 'Fournit des conseils stratégiques aux entreprises pour améliorer leurs performances.'),
(11, 'TourismGroup', 'Agence de voyages et tourisme', 'Marseille', '901 Boulevard du Tourisme, 13012 Marseille', 'Propose des services touristiques et de voyage pour les particuliers et les entreprises.'),
(12, 'GreenTech Solutions', 'Société de technologies environnementales', 'Toulouse', '123 Rue de l\'Écologie, 31002 Toulouse', 'Développe des technologies pour promouvoir la durabilité et l\'écologie.'),
(13, 'AeroTech', 'Société d\'ingénierie aérospatiale', 'Paris', '234 Avenue de l\'Aéronautique, 75004 Paris', 'Spécialisée dans la conception et la fabrication de composants aérospatiaux.'),
(14, 'MediHealth', 'Fournisseur de solutions de santé', 'Lyon', '567 Avenue de la Santé, 69005 Lyon', 'Fournit des solutions technologiques pour améliorer les soins de santé.'),
(46, 'jbk', 'dev', 'lille', '42 rue fleurs', 'angular\r\n'),
(47, 'test', 'test', 'test', 'test', 'test\r\n'),
(48, 'test2', 'test', '2test', '2test2', '25896\r\n'),
(49, 'Kartoffen', 'Medeci', 'marquette', '42 rue des fleurs ', 'qui nous simmes\r\n'),
(50, 'dessinaateur', 'dessin', 'lille', 'poule 147', 'dessin sur autocad');

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

DROP TABLE IF EXISTS `information`;
CREATE TABLE IF NOT EXISTS `information` (
  `inf_ID` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `age` int NOT NULL,
  `tel` int NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `vehicule` enum('oui','non') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `CV` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `ult_ID` int DEFAULT NULL,
  PRIMARY KEY (`inf_ID`),
  KEY `fk_utilisateur_info` (`ult_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `information`
--

INSERT INTO `information` (`inf_ID`, `nom`, `prenom`, `age`, `tel`, `description`, `vehicule`, `CV`, `ult_ID`) VALUES
(1, 'test', 'poule', 40, 123456788, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'oui', 'CV.pdf', 1),
(2, 'Smith', 'Amy', 35, 987654321, 'Description de Amy Smith', 'non', 'cv_amysmith.pdf', 2),
(3, 'Jones', 'Mike', 25, 555555555, 'Description de Mike Jones', 'oui', 'cv_mikejones.pdf', 3),
(4, 'Jones', 'Sara', 40, 777777777, 'Description de Sara Jones', 'non', 'cv_sarajones.pdf', 4),
(5, 'User', 'Example', 28, 888888888, 'Description de Example User', 'oui', 'cv_exampleuser.pdf', 5),
(6, 'User', 'Test', 45, 999999999, 'Description de Test User', 'non', 'cv_testuser.pdf', 6),
(7, 'User', 'Random', 33, 666666666, 'Description de Random User', 'oui', 'cv_randomuser.pdf', 7),
(8, 'User', 'New', 29, 444444444, 'Description de New User', 'non', 'cv_newuser.pdf', 8),
(9, 'User', 'Old', 37, 222222222, 'Description de Old User', 'oui', 'cv_olduser.pdf', 9),
(10, 'Customer', 'New', 50, 111111111, 'Description de New Customer', 'non', 'cv_newcustomer.pdf', 10),
(11, 'Customer', 'Client', 31, 555444333, 'Description de Client Customer', 'oui', 'cv_clientcustomer.pdf', 11),
(12, 'Doe', 'Jane', 29, 123123123, 'Description de Jane Doe', 'non', 'cv_janedoe.pdf', 12),
(13, 'User', 'TwentySix', 26, 456456456, 'Description de User TwentySix', 'oui', 'cv_usertwentysix.pdf', 13),
(14, 'User', 'TwentySeven', 27, 789789789, 'Description de User TwentySeven', 'non', 'cv_usertwentyseven.pdf', 14),
(15, 'User', 'TwentyEight', 28, 321321321, 'Description de User TwentyEight', 'oui', 'cv_usertwentyeight.pdf', 15),
(16, 'User', 'TwentyNine', 29, 654654654, 'Description de User TwentyNine', 'non', 'cv_usertwentynine.pdf', 16),
(17, 'User', 'Thirty', 30, 987987987, 'Description de User Thirty', 'oui', 'cv_userthirty.pdf', 17),
(18, 'User', 'ThirtyOne', 31, 654123987, 'Description de User ThirtyOne', 'non', 'cv_userthirtyone.pdf', 18),
(19, 'User', 'ThirtyTwo', 32, 789321654, 'Description de User ThirtyTwo', 'oui', 'cv_userthirtytwo.pdf', 19),
(20, 'User', 'ThirtyThree', 33, 159159159, 'Description de User ThirtyThree', 'non', 'cv_userthirtythree.pdf', 20),
(21, 'User', 'ThirtyFour', 34, 753159456, 'Description de User ThirtyFour', 'oui', 'cv_userthirtyfour.pdf', 21),
(22, 'User', 'ThirtyFive', 35, 357951357, 'Description de User ThirtyFive', 'non', 'cv_userthirtyfive.pdf', 22),
(23, 'User', 'ThirtySix', 36, 951753159, 'Description de User ThirtySix', 'oui', 'cv_userthirtysix.pdf', 23),
(70, 'lol', 'lol', 14, 147852369, 'lol', 'non', 'CV.pdf', 95),
(71, 'lol', 'lol', 14, 147852369, 'lol', 'non', 'CV.pdf', 95),
(72, 'lol', 'lol', 14, 147852369, 'lol', 'non', 'CV.pdf', 95),
(73, 'lol', 'lol', 78, 147852369, 'kvnjhgfgkf', 'oui', 'CV.pdf', 96),
(74, 'Monnier', 'pierre', 21, 669731032, 'je suis en informatique en plein pisicne', 'oui', 'CV.pdf', 97),
(75, 'lou', 'lou', 17, 147852369, 'loulou', 'oui', 'CV.pdf', 98),
(76, 'monnier', 'camille', 15, 147852369, 'je suis belle avec les cheveux frisé', 'non', 'CV.pdf', 99),
(77, 'monnier', 'eric', 51, 147852369, 'j\'ai fait le saut en parachute', 'oui', NULL, 100),
(78, 'est', 'rfef', 4, 14, 'fdjgfds', 'oui', 'CV.pdf', 101);

-- --------------------------------------------------------

--
-- Structure de la table `requete`
--

DROP TABLE IF EXISTS `requete`;
CREATE TABLE IF NOT EXISTS `requete` (
  `type` int NOT NULL,
  `ann_ID` int DEFAULT NULL,
  `ult_ID` int DEFAULT NULL,
  `motivation` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `datePostule` date DEFAULT NULL,
  KEY `fk_annonce_requete` (`ann_ID`),
  KEY `fk_utilisateur_requete` (`ult_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `requete`
--

INSERT INTO `requete` (`type`, `ann_ID`, `ult_ID`, `motivation`, `datePostule`) VALUES
(1, 2, 1, '', NULL),
(1, 6, 98, 'motivé', NULL),
(1, 2, 98, 'mon copain et la famille et l\'argent!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!', NULL),
(2, 42, 99, NULL, NULL),
(1, 4, 99, 'lol', NULL),
(1, 5, 99, 'lol\r\n', '2023-10-22'),
(2, 43, 99, NULL, '2023-10-22'),
(1, 6, 100, 'test', '2023-10-22');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ult_ID` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `mdp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `ent_ID` int DEFAULT NULL,
  PRIMARY KEY (`ult_ID`),
  KEY `fk_utilisateur_entreprise` (`ent_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ult_ID`, `mail`, `mdp`, `role`, `ent_ID`) VALUES
(1, 'user6@example.com', 'password123', 'admin', 5),
(2, 'amy.smith@example.com', 'pass456', 'employer', 4),
(3, 'mike.jones@example.com', 'qwerty123', 'employer', 4),
(4, 'sara.jones@example.com', 'password789', 'employer', 5),
(5, 'example.user@example.com', 'securepass', 'employer', 5),
(6, 'test.user@example.com', 'testpass', 'employer', 6),
(7, 'random.user@example.com', 'randompass', 'employer', 6),
(8, 'new.user@example.com', 'newpass', 'employer', 7),
(9, 'old.user@example.com', 'oldpass', 'employer', 7),
(10, 'customer@example.com', 'customerpass', 'employer', 8),
(11, 'new.customer@example.com', 'newcustomerpass', 'employer', 8),
(12, 'client@example.com', 'clientpass', 'employer', 9),
(13, 'johndoe@example.com', 'johnspassword', 'employer', 9),
(14, 'janedoe@example.com', 'janespassword', 'employer', 10),
(15, 'user26@example.com', 'user26pass', 'employer', 10),
(16, 'user27@example.com', 'user27pass', 'employer', 11),
(17, 'user28@example.com', 'user28pass', 'employer', 11),
(18, 'user29@example.com', 'user29pass', 'employer', 12),
(19, 'user30@example.com', 'user30pass', 'employer', 12),
(20, 'user31@example.com', 'user31pass', 'employer', 13),
(21, 'user32@example.com', 'user32pass', 'employer', 13),
(22, 'user33@example.com', 'user33pass', 'employer', 14),
(23, 'user34@example.com', 'user34pass', 'employer', 14),
(24, 'user35@example.com', 'user35pass', 'employer', 11),
(25, 'user36@example.com', 'user36pass', 'employer', 5),
(95, 'lol@lol.lol', 'lol', 'client', NULL),
(96, 'loba@loba.loba', 'loba', 'admin', NULL),
(97, 'pierremonnier@example.com', 'pierre', 'employer', 48),
(98, 'louanne@gmail.com', 'lou', 'employer', 7),
(99, 'camille@gmail.com', 'lol', 'employer', 49),
(100, 'eric@example.com', 'eric', 'employer', 50),
(101, 'camille@example.com', 'poule', 'employer', 6);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `fk_information_utilisateur` FOREIGN KEY (`ult_ID`) REFERENCES `utilisateur` (`ult_ID`);

--
-- Contraintes pour la table `requete`
--
ALTER TABLE `requete`
  ADD CONSTRAINT `fk_annonce_requete` FOREIGN KEY (`ann_ID`) REFERENCES `annonce` (`ann_ID`),
  ADD CONSTRAINT `fk_utilisateur_requete` FOREIGN KEY (`ult_ID`) REFERENCES `utilisateur` (`ult_ID`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_utilisateur_entreprise` FOREIGN KEY (`ent_ID`) REFERENCES `entreprise` (`ent_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
