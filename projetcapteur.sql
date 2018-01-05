-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 05 jan. 2018 à 15:09
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetcapteur`
--

-- --------------------------------------------------------

--
-- Structure de la table `capteur esiee`
--

DROP TABLE IF EXISTS `capteur esiee`;
CREATE TABLE IF NOT EXISTS `capteur esiee` (
  `IdCapteur` int(11) NOT NULL AUTO_INCREMENT,
  `IdPasserelle` int(11) NOT NULL,
  `Localisation` varchar(25) NOT NULL,
  `Date` datetime NOT NULL,
  `TypesMesures` varchar(25) NOT NULL,
  `ConsoVeille` int(11) NOT NULL,
  `ConsoMarche` int(11) NOT NULL,
  PRIMARY KEY (`IdCapteur`),
  KEY `idcapteur` (`IdPasserelle`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `capteur esiee`
--

INSERT INTO `capteur esiee` (`IdCapteur`, `IdPasserelle`, `Localisation`, `Date`, `TypesMesures`, `ConsoVeille`, `ConsoMarche`) VALUES
(4, 18, '4005', '2017-12-18 04:20:16', 'Humidité', 11, 15),
(5, 19, '6405', '2017-12-05 07:18:00', 'Humidité', 11, 14),
(6, 19, '6305', '2017-12-15 00:00:00', 'Temperature', 11, 12);

-- --------------------------------------------------------

--
-- Structure de la table `donnees`
--

DROP TABLE IF EXISTS `donnees`;
CREATE TABLE IF NOT EXISTS `donnees` (
  `IDDonnees` int(11) NOT NULL AUTO_INCREMENT,
  `IDCapteur` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `TypeData` char(25) NOT NULL,
  `ValeurData` int(11) NOT NULL,
  PRIMARY KEY (`IDDonnees`),
  KEY `Foreign Key` (`IDCapteur`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `donnees`
--

INSERT INTO `donnees` (`IDDonnees`, `IDCapteur`, `Date`, `TypeData`, `ValeurData`) VALUES
(9, 4, '2017-12-13 07:19:32', 'Humidité', 15),
(10, 6, '2017-12-07 00:00:00', 'Temperature', 14),
(11, 4, '2017-12-17 10:13:13', 'Temperature', 21),
(12, 5, '2017-12-17 08:23:00', 'Humidité', 32);

-- --------------------------------------------------------

--
-- Structure de la table `passerelle`
--

DROP TABLE IF EXISTS `passerelle`;
CREATE TABLE IF NOT EXISTS `passerelle` (
  `IDPasserelle` int(11) NOT NULL AUTO_INCREMENT,
  `Localisation` char(25) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`IDPasserelle`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `passerelle`
--

INSERT INTO `passerelle` (`IDPasserelle`, `Localisation`, `date`) VALUES
(18, 'Epi 5', '2017-12-06'),
(19, 'Epi 6', '2017-12-14'),
(20, 'Epi 6', '2017-12-13');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `capteur esiee`
--
ALTER TABLE `capteur esiee`
  ADD CONSTRAINT `idcapteur` FOREIGN KEY (`IdPasserelle`) REFERENCES `passerelle` (`IDPasserelle`);

--
-- Contraintes pour la table `donnees`
--
ALTER TABLE `donnees`
  ADD CONSTRAINT `Foreign Key` FOREIGN KEY (`IDCapteur`) REFERENCES `capteur esiee` (`IdCapteur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
