-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 21 nov. 2022 à 11:40
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `saintotresor`
--

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE `member` (
  `ID` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pswd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `member`
--

INSERT INTO `member` (`ID`, `user`, `email`, `pswd`) VALUES
(1, 'florian', 'f.darques@hotmail.fr', '$2y$12$Ciz.mgPzshRv3JLqwgEkS./Lx06FO2IW6bc.LyuUM1qJglmWumm/2'),
(2, 'florian', 'florian.darques@hotmail.fr', '$2y$12$Ds7TARuuJO20jB1FNGd6uOGGa8Rg7mUN/yC5T.VAFxCYGJCuBKDW2'),
(3, 'florian', 'flo.darques@hotmail.fr', '$2y$12$5hLBexm4eq3mvfJhuWODLuc0IdQca9IyJGvBQSt4b1JHE8HKA21Kq');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
