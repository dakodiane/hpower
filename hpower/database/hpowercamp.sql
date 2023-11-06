-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 03 nov. 2023 à 09:08
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hpowercamp`
--

-- --------------------------------------------------------

--
-- Structure de la table `camions`
--

DROP TABLE IF EXISTS `camions`;
CREATE TABLE IF NOT EXISTS `camions` (
  `cam_id` int NOT NULL AUTO_INCREMENT,
  `num_bordereau` varchar(255) NOT NULL,
  `cam_nomchauf` varchar(255) NOT NULL,
  `type_produit` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `heure_depart` timestamp NOT NULL,
  `heure_arrive` timestamp NOT NULL,
  `observation` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `poids_vide` int DEFAULT NULL,
  `poids_charge` int DEFAULT NULL,
  `poids_net` int DEFAULT NULL,
  `prix_CIPI` int DEFAULT NULL,
  `prix_HPG` int DEFAULT NULL,
  `avance_recue` varchar(255) DEFAULT NULL,
  `solde` varchar(255) DEFAULT NULL,
  `cam_photo` varchar(255) NOT NULL,
  `provenance` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `util_id` int NOT NULL,
  `statut_dechargement` tinyint(1) DEFAULT NULL,
  `nombre_sac` int DEFAULT NULL,
  `statut_paiement` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

DROP TABLE IF EXISTS `paiements`;
CREATE TABLE IF NOT EXISTS `paiements` (
  `paie_id` int NOT NULL AUTO_INCREMENT,
  `prix_unit` int NOT NULL,
  `qte_totale` int NOT NULL,
  `prix_total` int NOT NULL,
  `util_id` int NOT NULL,
  `cam_id` int NOT NULL,
  `date_paiement` date NOT NULL,
  PRIMARY KEY (`paie_id`),
  KEY `fk_idutil` (`util_id`),
  KEY `cam_id` (`cam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `prod_id` int NOT NULL AUTO_INCREMENT,
  `prod_nom` varchar(255) NOT NULL,
  `prod_condition` varchar(255) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `telephone` int NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD CONSTRAINT `fk_iduser` FOREIGN KEY (`util_id`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `fk_idutil` FOREIGN KEY (`util_id`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
