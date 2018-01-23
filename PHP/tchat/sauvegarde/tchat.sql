-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 23 Janvier 2018 à 09:48
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tchat`
--

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(3) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `statut` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='tchat membre ';

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `email`, `photo`, `statut`) VALUES
(1, 'Juju', 'soleil', 'johanmoreiradasilva@gmail.com', '', '1'),
(2, 'Juju', 'soleil', 'johanmoreiradasilva@gmail.com', '', '1'),
(3, 'Juju', 'soleil', 'johanmoreiradasilva@gmail.com', 'default.jpg', '1'),
(4, 'sebastien', 'sebastien', 'sebastien.miatti@live.fr', '1513340751_2749 _ index.jpg', '1'),
(5, 'admin', 'admin', 'sebastien@gmail.com', '1513340778_154 _ ordi.jpg', '1'),
(6, 'sebastien', 'sebastien', 'miatti@lepoles.com', '1513340824_4090 _ SebLogo.jpg', '1');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_message` int(3) NOT NULL,
  `id_membre` int(3) NOT NULL,
  `content` text NOT NULL,
  `date_enregistrement` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='message utilisateurs ';

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id_message`, `id_membre`, `content`, `date_enregistrement`) VALUES
(1, 5, 'bonjour', '2017-12-15 13:26:33'),
(2, 4, 'tu vas bien', '2017-12-15 13:27:24'),
(3, 5, 'oui et toi ?', '2018-01-23 09:46:17');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
