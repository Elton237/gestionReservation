-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 19 déc. 2024 à 21:07
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reservationchambre`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL,
  `nomCategorie` varchar(255) DEFAULT NULL,
  `montant` int(11) DEFAULT NULL,
  `nombreLit` int(11) NOT NULL,
  `nombreToillete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nomCategorie`, `montant`, `nombreLit`, `nombreToillete`) VALUES
(1, 'vip', 500000, 3, 2),
(2, 'classique', 1000, 1, 1),
(3, 'suite presidentiel', 1000000, 5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `idChambre` int(11) NOT NULL,
  `numeroChambre` int(11) DEFAULT NULL,
  `imageChambre` text NOT NULL,
  `idCategorie` int(11) DEFAULT NULL,
  `idEtage` int(11) DEFAULT NULL,
  `statutChambre` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`idChambre`, `numeroChambre`, `imageChambre`, `idCategorie`, `idEtage`, `statutChambre`) VALUES
(1, 4, 'assets/img/room-3.jpg', NULL, NULL, 0),
(4, 3, 'assets/img/room-3.jpg', 1, 1, 0),
(5, 10, 'assets/img/room-2.jpg', 2, 1, 0),
(7, 20, 'assets/img/room-1.jpg', 2, 1, 0),
(8, 50, 'assets/img/suite1.jpg', 3, 1, 0),
(9, 7, 'assets/img/c1.jpg', 2, 1, 0),
(10, 45, 'assets/img/c2.jpg', 3, 1, 0),
(11, 46, 'assets/img/c9.jpg', 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idClient` int(11) NOT NULL,
  `nomClient` varchar(255) DEFAULT NULL,
  `prenomClient` varchar(255) DEFAULT NULL,
  `emailClient` varchar(255) DEFAULT NULL,
  `numeroClient` int(11) DEFAULT NULL,
  `suClient` int(11) NOT NULL DEFAULT 0,
  `matriculeClient` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `nomClient`, `prenomClient`, `emailClient`, `numeroClient`, `suClient`, `matriculeClient`) VALUES
(1, 'test1', 'test1', 'test1@gmail.com', 8783783, 0, '01'),
(2, 'pagning', 'elton', 'jayou35@hotmail.com', 6565656, 0, ''),
(3, 'client1', 'client1', 'client1client1@gmail.com', 0, 0, '123456789'),
(13, 'client2', 'client2', 'client2client2@gmail.com', 0, 0, '123456789'),
(14, 'DJOMO KAMGA', 'HONORE', 'honoredjomokamga5@gmail.com', 694350372, 0, 'honore23');

-- --------------------------------------------------------

--
-- Structure de la table `etage`
--

CREATE TABLE `etage` (
  `idEtage` int(11) NOT NULL,
  `nomEtage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `etage`
--

INSERT INTO `etage` (`idEtage`, `nomEtage`) VALUES
(1, 'premier etage'),
(2, 'deuxieme etage'),
(3, 'troisieme etage');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE `personnel` (
  `idPersonnel` int(11) NOT NULL,
  `nomPersonnel` varchar(255) DEFAULT NULL,
  `prenomPersonnel` varchar(255) DEFAULT NULL,
  `emailPersonnel` text DEFAULT NULL,
  `matriculePersonnel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`idPersonnel`, `nomPersonnel`, `prenomPersonnel`, `emailPersonnel`, `matriculePersonnel`) VALUES
(1, 'pagning', 'elton', 'elton@gmail.com', 'elton123');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `idReservation` int(11) NOT NULL,
  `dateReservation` timestamp NULL DEFAULT current_timestamp(),
  `dateFin` timestamp NOT NULL DEFAULT current_timestamp(),
  `statutReservation` varchar(255) DEFAULT 'en cours de validation',
  `nombreChambre` int(11) DEFAULT NULL,
  `idClient` int(11) DEFAULT NULL,
  `idChambre` int(11) NOT NULL,
  `supReservation` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idReservation`, `dateReservation`, `dateFin`, `statutReservation`, `nombreChambre`, `idClient`, `idChambre`, `supReservation`) VALUES
(20, '2024-12-19 14:10:00', '2024-12-20 14:10:00', 'valider', NULL, 13, 5, 0),
(21, '2024-12-19 19:11:00', '2024-12-19 19:11:00', 'en cours de validation', NULL, 14, 4, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`idChambre`),
  ADD KEY `idCategorie` (`idCategorie`),
  ADD KEY `idEtage` (`idEtage`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `etage`
--
ALTER TABLE `etage`
  ADD PRIMARY KEY (`idEtage`);

--
-- Index pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`idPersonnel`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idReservation`),
  ADD KEY `idClient` (`idClient`),
  ADD KEY `idChambre` (`idChambre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `idChambre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `etage`
--
ALTER TABLE `etage`
  MODIFY `idEtage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `idPersonnel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idReservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `chambre_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`),
  ADD CONSTRAINT `chambre_ibfk_2` FOREIGN KEY (`idEtage`) REFERENCES `etage` (`idEtage`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `idChambre` FOREIGN KEY (`idChambre`) REFERENCES `chambre` (`idChambre`),
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
