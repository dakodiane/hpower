-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 07 nov. 2023 à 09:34
-- Version du serveur : 10.4.27-MariaDB
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

CREATE TABLE `camions` (
  `cam_id` int(11) NOT NULL,
  `num_bordereau` varchar(255) NOT NULL,
  `num_immatriculation` varchar(255) NOT NULL,
  `cam_nomchauf` varchar(255) NOT NULL,
  `type_produit` varchar(255) NOT NULL,
  `heure_depart` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `heure_arrive` timestamp NULL DEFAULT NULL,
  `observation` text DEFAULT NULL,
  `poids_vide` int(11) DEFAULT NULL,
  `poids_charge` int(11) DEFAULT NULL,
  `poids_net` int(11) DEFAULT NULL,
  `prix_CIPI` int(11) DEFAULT NULL,
  `prix_HPG` int(11) DEFAULT NULL,
  `avance_recue` varchar(255) DEFAULT NULL,
  `solde` varchar(255) DEFAULT NULL,
  `cam_photo` varchar(255) NOT NULL,
  `provenance` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `util_id` int(11) DEFAULT NULL,
  `statut_dechargement` tinyint(1) DEFAULT NULL,
  `nombre_sac` int(11) DEFAULT NULL,
  `statut_paiement` varchar(255) DEFAULT 'En attente',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ville_arrive` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `camions`
--

INSERT INTO `camions` (`cam_id`, `num_bordereau`, `num_immatriculation`, `cam_nomchauf`, `type_produit`, `heure_depart`, `heure_arrive`, `observation`, `poids_vide`, `poids_charge`, `poids_net`, `prix_CIPI`, `prix_HPG`, `avance_recue`, `solde`, `cam_photo`, `provenance`, `destination`, `util_id`, `statut_dechargement`, `nombre_sac`, `statut_paiement`, `created_at`, `updated_at`, `ville_arrive`) VALUES
(1, 'HP0001', '0', 'ALIDOU alidou', 'Soja', '2023-11-03 10:44:44', '2023-11-03 10:44:44', 'Bien recu', 2, 25, 34, 200000, 150000, '100.000', '75000', '-', 'Parakou', 'Cotonou', 2, 0, 18, 'En attente', '2023-11-03 09:49:48', '2023-11-03 09:49:48', 'Cotonou'),
(2, 'HP0002', 'BA3344', 'Fawazer', 'Cajou', '2023-11-11 23:00:00', NULL, 'eeee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'public/photo_immat/t8zbD9e8idVPhIxnW1JY4KIew87utOciFsb6OXBZ.png', NULL, 'Parakou', NULL, NULL, NULL, NULL, '2023-11-05 11:19:03', '2023-11-05 11:19:03', NULL),
(3, 'HP0003', 'BA3344', 'Fawazer', 'Soja', '2023-11-03 23:00:00', NULL, 'frf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'actualite/085d8pl580EpurPoX3mHQlsqAzzY1wi0JyLpUB2l.png', NULL, 'Cotonou', NULL, NULL, NULL, NULL, '2023-11-06 06:37:41', '2023-11-06 06:37:41', NULL),
(4, 'HP0004', 'BA3344', 'vh jhbh', 'Soja', '2023-11-14 23:00:00', NULL, 'rr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'photo_immat/PfMyNCoDiYdsdtMYpdtJQ3HLt4Eln7YumE69YKU1.png', NULL, 'Cotonou', NULL, NULL, NULL, NULL, '2023-11-06 06:38:41', '2023-11-06 06:38:41', NULL),
(6, 'HP0005', 'BE23', 'Julio', 'Cajou', '2023-11-06 12:06:00', NULL, 'hh', 3, 46, 456, NULL, NULL, NULL, NULL, 'photo_immat/GD6Jo1JU1r059lFZNywmGZXmv8KE3W7pDMHPBDzC.jpg', 'Parakou', NULL, NULL, NULL, NULL, 'En attente', '2023-11-06 11:02:47', '2023-11-06 11:02:47', NULL),
(7, 'HP0006', 'BE23', 'Julio', 'Cajou', '2023-11-25 12:08:00', NULL, NULL, 45, 45, 88, NULL, NULL, NULL, NULL, 'photo_immat/TBk6cCS3G8OewUGuvCw2ULfnB81hHJ2sagenXMf6.jpg', 'Parakou', NULL, NULL, NULL, NULL, 'En attente', '2023-11-06 11:08:36', '2023-11-06 11:08:36', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

CREATE TABLE `paiements` (
  `paie_id` int(11) NOT NULL,
  `prix_unit` int(11) NOT NULL,
  `qte_totale` int(11) NOT NULL,
  `prix_total` int(11) NOT NULL,
  `util_id` int(11) NOT NULL,
  `cam_id` int(11) NOT NULL,
  `date_paiement` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `prod_id` int(11) NOT NULL,
  `prod_nom` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`prod_id`, `prod_nom`, `created_at`, `updated_at`) VALUES
(1, 'Soja', '2023-11-03 09:44:41', '2023-11-03 09:44:41'),
(2, 'Cajou', '2023-11-03 09:44:41', '2023-11-03 09:44:41');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `telephone`, `role`, `password`, `ville`, `statut`, `created_at`, `updated_at`) VALUES
(1, 'COCOU cocou', 'cocou@gmail.com', 56798656, 'Rapporteur', 'dakodiane', 'Cotonou', 1, '2023-11-03 09:39:58', '2023-11-03 09:39:58'),
(2, 'ANAN anan', 'anan@gmail.com', 32232323, 'Fournisseur', 'dakodiane', 'Parakou', 0, '2023-11-03 09:39:58', '2023-11-03 09:39:58');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `camions`
--
ALTER TABLE `camions`
  ADD PRIMARY KEY (`cam_id`);

--
-- Index pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`paie_id`),
  ADD KEY `fk_idutil` (`util_id`),
  ADD KEY `cam_id` (`cam_id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`prod_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `camions`
--
ALTER TABLE `camions`
  MODIFY `cam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `paie_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
