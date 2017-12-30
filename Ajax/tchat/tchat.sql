-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 25 sep. 2017 à 15:35
-- Version du serveur :  10.1.22-MariaDB
-- Version de PHP :  7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `email`, `photo`, `statut`) VALUES
(1, 'Juju', 'soleil', 'johanmoreiradasilva@gmail.com', '', '1'),
(2, 'Juju', 'soleil', 'johanmoreiradasilva@gmail.com', '', '1'),
(3, 'Juju', 'soleil', 'johanmoreiradasilva@gmail.com', 'default.jpg', '1');

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
-- Index pour les tables déchargées
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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(3) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
