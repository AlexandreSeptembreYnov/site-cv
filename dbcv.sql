-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 01 juil. 2019 à 04:49
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbcv`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

DROP TABLE IF EXISTS `administrateurs`;
CREATE TABLE IF NOT EXISTS `administrateurs` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `mdp` varchar(500) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=3549 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administrateurs`
--admin, admin

INSERT INTO `administrateurs` (`id_admin`, `nom`, `mdp`) VALUES
(3548, 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec');

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

DROP TABLE IF EXISTS `competences`;
CREATE TABLE IF NOT EXISTS `competences` (
  `id_comp` int(11) NOT NULL AUTO_INCREMENT,
  `comp` varchar(50) NOT NULL,
  `niveau` int(11) NOT NULL,
  PRIMARY KEY (`id_comp`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`id_comp`, `comp`, `niveau`) VALUES
(1, 'Python', 4),
(2, 'C', 4),
(3, 'PHP', 4),
(4, 'HTML/CSS', 3),
(5, 'Js', 3);

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

DROP TABLE IF EXISTS `experiences`;
CREATE TABLE IF NOT EXISTS `experiences` (
  `id_exp` int(11) NOT NULL AUTO_INCREMENT,
  `exp` varchar(50) NOT NULL,
  `description` varchar(8000) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date DEFAULT NULL,
  `nomEntreprise` varchar(50) NOT NULL,
  PRIMARY KEY (`id_exp`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `experiences`
--

INSERT INTO `experiences` (`id_exp`, `exp`, `description`, `dateDebut`, `dateFin`, `nomEntreprise`) VALUES
(12, 'Développeur fullstack ', 'Président et développeur dans l\'association CreatiWeb13 mes missions sont différente selon les clients ', '2019-01-21', '2019-08-31', 'CreatiWeb13');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `objet` varchar(50) NOT NULL,
  `contenu` varchar(1000) NOT NULL,
  `name_sender` varchar(50) DEFAULT NULL,
  `email_source_message` varchar(100) NOT NULL,
  `dateEnvoi` datetime NOT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_message`, `objet`, `contenu`, `name_sender`, `email_source_message`, `dateEnvoi`) VALUES
(11, 'offre de stage ', 'ceci est un test de message', 'Septembre', 'smarks2432@gmail.com', '2019-07-01 03:59:35');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

DROP TABLE IF EXISTS `projet`;
CREATE TABLE IF NOT EXISTS `projet` (
  `id_projet` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `texte` varchar(8000) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `lien` varchar(60) NOT NULL,
  `dateAjout` datetime NOT NULL,
  PRIMARY KEY (`id_projet`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `titre`, `texte`, `image`, `lien`, `dateAjout`) VALUES
(2, 'Site-Web', 'Dans le cadre de mon parcours scolaire j\'ai développé se site web pour me présenter et montrer mes compétences.', '../image/site-web.jpg', 'https://github.com/AlexandreSeptembreYnov/site-cv', '2019-07-01 06:47:04');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
