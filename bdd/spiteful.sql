-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 11 Mars 2021 à 19:53
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `spiteful`
--

-- --------------------------------------------------------

--
-- Structure de la table `animaux`
--

CREATE TABLE IF NOT EXISTS `animaux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomanim_1` varchar(255) NOT NULL,
  `nomanim_2` varchar(255) NOT NULL,
  `habitat_1` varchar(255) NOT NULL,
  `habitat_2` varchar(255) NOT NULL,
  `peptide` varchar(255) NOT NULL,
  `probleme` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `animaux`
--

INSERT INTO `animaux` (`id`, `nomanim_1`, `nomanim_2`, `habitat_1`, `habitat_2`, `peptide`, `probleme`) VALUES
(1, 'Dendroapspis angusticeps', 'Squamates', 'Afrique de l''Est', '+/- 20m2', 'La mambaquarétine', 'Les polykystoses rénales');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `mess` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `mail`, `mess`, `date`) VALUES
(1, 'Durieu', 'Marie', 'email@gmail.com', 'Bonjour, je voudrais...', '2021-03-11');

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `medocs`
--

CREATE TABLE IF NOT EXISTS `medocs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomedoc` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `pourc` varchar(255) NOT NULL,
  `maladie` varchar(255) NOT NULL,
  `imagemed` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nompho` varchar(255) NOT NULL,
  `slidepho` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `photos`
--

INSERT INTO `photos` (`id`, `nompho`, `slidepho`, `image`) VALUES
(1, 'Mambav', '\r\nslideAnim', 'Black_Mamba');

-- --------------------------------------------------------

--
-- Structure de la table `sci`
--

CREATE TABLE IF NOT EXISTS `sci` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomsci` varchar(255) NOT NULL,
  `prenomsci` varchar(255) NOT NULL,
  `textsci` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `sci`
--

INSERT INTO `sci` (`id`, `nomsci`, `prenomsci`, `textsci`) VALUES
(2, 'Felice Gaspard Ferdinando', 'FONTANA', 'Felice Gaspard Ferdinando Fontana est un physicien et naturaliste italien né le 15 avril 1730 à Pomarolo dans le Tyrol et est décédé le 10 mars 1805 à Florence.');

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomvid` varchar(255) NOT NULL,
  `slidevid` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
