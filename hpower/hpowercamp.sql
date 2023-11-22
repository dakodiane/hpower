-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 12 nov. 2023 à 12:57
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
  `ville_arrive` varchar(255) DEFAULT NULL,
  `tel_conducteur` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `camions`
--

INSERT INTO `camions` (`cam_id`, `num_bordereau`, `num_immatriculation`, `cam_nomchauf`, `type_produit`, `heure_depart`, `heure_arrive`, `observation`, `poids_vide`, `poids_charge`, `poids_net`, `avance_recue`, `solde`, `cam_photo`, `provenance`, `destination`, `util_id`, `statut_dechargement`, `nombre_sac`, `statut_paiement`, `created_at`, `updated_at`, `ville_arrive`, `tel_conducteur`) VALUES
(1, 'HP0001', '0', 'ALIDOU alidou', 'Soja', '2023-11-03 10:44:44', '2023-11-03 10:44:44', 'Bien recu', 2, 25, 34, '100.000', '75000', '-', 'Parakou', 'Cotonou', 2, 0, 18, 'En attente', '2023-11-03 09:49:48', '2023-11-03 09:49:48', 'Cotonou', ''),
(2, 'HP0002', 'BA3344', 'Fawazer', 'Cajou', '2023-11-11 23:00:00', NULL, 'eeee', NULL, NULL, NULL, NULL, NULL, 'public/photo_immat/t8zbD9e8idVPhIxnW1JY4KIew87utOciFsb6OXBZ.png', NULL, 'Parakou', NULL, NULL, NULL, NULL, '2023-11-05 11:19:03', '2023-11-05 11:19:03', NULL, ''),
(3, 'HP0003', 'BA3344', 'Fawazer', 'Soja', '2023-11-03 23:00:00', NULL, 'frf', NULL, NULL, NULL, NULL, NULL, 'actualite/085d8pl580EpurPoX3mHQlsqAzzY1wi0JyLpUB2l.png', NULL, 'Cotonou', NULL, NULL, NULL, NULL, '2023-11-06 06:37:41', '2023-11-06 06:37:41', NULL, ''),
(4, 'HP0004', 'BA3344', 'vh jhbh', 'Soja', '2023-11-14 23:00:00', NULL, 'rr', NULL, NULL, NULL, NULL, NULL, 'photo_immat/PfMyNCoDiYdsdtMYpdtJQ3HLt4Eln7YumE69YKU1.png', NULL, 'Cotonou', NULL, NULL, NULL, NULL, '2023-11-06 06:38:41', '2023-11-06 06:38:41', NULL, ''),
(6, 'HP0005', 'BE23', 'Julio', 'Cajou', '2023-11-06 12:06:00', NULL, 'hh', 3, 46, 456, NULL, NULL, 'photo_immat/GD6Jo1JU1r059lFZNywmGZXmv8KE3W7pDMHPBDzC.jpg', 'Parakou', NULL, NULL, NULL, NULL, 'En attente', '2023-11-06 11:02:47', '2023-11-06 11:02:47', NULL, ''),
(7, 'HP0006', 'BE23', 'Julio', 'Cajou', '2023-11-25 12:08:00', NULL, NULL, 45, 45, 88, NULL, NULL, 'photo_immat/TBk6cCS3G8OewUGuvCw2ULfnB81hHJ2sagenXMf6.jpg', 'Parakou', NULL, NULL, NULL, NULL, 'En attente', '2023-11-06 11:08:36', '2023-11-06 11:08:36', NULL, ''),
(8, 'HP0007', 'BE23', 'Julio', 'Cajou', '2023-11-17 10:39:00', NULL, NULL, 6, 54, 100, NULL, NULL, 'photo_immat/0AvjSyXX3K8Tj6EPS2Z7KaszUhvMj9cRu209Hu8O.jpg', 'Cotonou', NULL, NULL, NULL, NULL, 'En attente', '2023-11-07 09:39:25', '2023-11-07 09:39:25', NULL, ''),
(9, 'HP0008', 'BE23', 'Didi la grande soeur', 'Cajou', '2023-11-23 14:21:00', NULL, 'Olalalalala', 4, 56, 52, NULL, NULL, 'photo_immat/cmjiVIB10KzEia9RQm4ypv70F2NkkriRUvw6TA0n.jpg', 'Cotonou', NULL, NULL, NULL, NULL, 'En attente', '2023-11-07 13:22:07', '2023-11-07 13:22:07', NULL, ''),
(10, 'HP0009', 'B5056', 'RETT', 'Cajou', '2023-11-19 15:02:00', NULL, NULL, 56, 58, 2, NULL, NULL, 'photo_immat/EOsy2KpwA6q4bGIElcLiddKFN2pJ9ERSZyKXvEZH.jpg', 'Banikoara', NULL, NULL, NULL, NULL, 'En attente', '2023-11-07 14:02:34', '2023-11-07 14:02:34', NULL, ''),
(11, 'HP0010', 'BE587', 'Didi la grands soeur de 1m50', 'Soja', '2023-11-17 15:11:00', NULL, NULL, 5, 6, 1, NULL, NULL, 'photo_immat/9A0F4cAS8ON7W25mucac67BDAMLj4OKYwaBt7rxC.jpg', 'Parakou', NULL, NULL, NULL, NULL, 'En attente', '2023-11-07 14:12:20', '2023-11-07 14:12:20', NULL, ''),
(12, 'HP0011', 'B50566', 'Didi la grands soeur de 1m50', 'Cajou', '2023-11-24 15:21:00', NULL, 'voila elle dit 1m60', 45, 33, -12, NULL, NULL, 'photo_immat/oWhLII3Yo4WXsuJLn9V5PjHNixfJs9oLka3QYc3M.png', 'Banikoara', NULL, NULL, NULL, 303033, 'En attente', '2023-11-07 14:22:27', '2023-11-07 14:22:27', NULL, ''),
(13, 'HP0012', '6665bj', 'rt3', 'Cajou', '2023-11-19 15:24:00', NULL, 'opPO', 56, 96, 40, NULL, NULL, 'photo_immat/bmUJAiRWEI27EiamnnvIHErBzx8QAyPF7bun6796.jpg', 'Parakou', NULL, NULL, NULL, 52, 'En attente', '2023-11-07 14:25:14', '2023-11-07 14:25:14', NULL, ''),
(14, 'HP0013', 'B50566', 'Julio', 'Soja', '2023-11-11 15:28:00', NULL, 'PPPP8888P8P', 56, 96, 40, NULL, NULL, 'photo_immat/DXM0MYbcAUtrfg5nNKVHt83JGBXBtp6ET3DJK6RI.jpg', 'Parakou', NULL, NULL, NULL, 599, 'En attente', '2023-11-07 14:30:30', '2023-11-07 14:30:30', NULL, ''),
(15, 'HP0014', 'BE', 'RETT', 'Cajou', '2023-11-19 15:32:00', NULL, 'JLJ', 56, 96, 40, NULL, NULL, 'photo_immat/4oRgcUDzN3LVRcj2E0Fnqfqpvi9Xl1zet7liBzvp.jpg', 'Parakou', NULL, NULL, NULL, 5, 'En attente', '2023-11-07 14:34:22', '2023-11-07 14:34:22', NULL, ''),
(16, 'HP0015', 'B50566', 'rt31', 'Cajou', '2023-12-03 18:35:00', NULL, '5645353213133l353b', 63, 4556, 4493, NULL, NULL, 'photo_immat/XhyxjzUinnj4rFi46qo54C39Sd8A6qJnloGkMnyc.jpg', 'Parakou', NULL, NULL, 1, 56, 'En attente', '2023-11-07 14:35:49', '2023-11-07 14:35:49', NULL, ''),
(17, 'HP0016', 'Jer', 'Jerrys', 'Cajou', '2023-11-19 07:48:00', NULL, 'voila', 25, 68, 43, NULL, NULL, 'photo_immat/MoA561hhvcVzUDNTPb1LQPdU6VdzU26GMtZkyjrW.jpg', 'Cotonou', NULL, NULL, 1, 100, 'En attente', '2023-11-08 06:49:11', '2023-11-08 06:49:11', NULL, ''),
(18, 'HP0017', 'Frid', 'Frida', 'Cajou', '2023-11-18 07:56:00', NULL, 'Photo enrégistrer', 99999, 5555, -94444, NULL, NULL, 'photo_immat/MlQ605HodXtwV7kHo9W7Z3i44iElBV8yX9r2eZ0M.jpg', 'Cotonou', NULL, NULL, 1, 110000, 'En attente', '2023-11-08 06:56:51', '2023-11-08 06:56:51', NULL, ''),
(19, 'HP0018', 'OLa', 'Olé', 'Soja', '2023-11-24 07:59:00', NULL, 'jzlz', 55354, 577, -54777, NULL, NULL, 'photo_immat/0GwXzIwJBlUK8xmkPcgkIq6Q3MlFqwEjyBsyQsc0.png', 'Parakou', NULL, NULL, 1, 756, 'En attente', '2023-11-08 06:59:19', '2023-11-08 06:59:19', NULL, ''),
(20, 'HP0019', 'B50566', 'Julio', 'Soja', '2023-11-16 08:00:00', NULL, 'ds', 5, 96, 91, NULL, NULL, 'photo_immat/KWIBqaDDTAOk1OCvP1R5WnzNSKjGtJws8stdFtD4.jpg', NULL, 'Banikoara', NULL, NULL, NULL, 'En attente', '2023-11-08 07:00:25', '2023-11-08 07:00:25', NULL, ''),
(21, 'HP0020', 'ESPVOILA', 'Frida', 'Cajou', '2023-11-26 08:20:00', NULL, 'AKAL', 5, 96, 91, NULL, NULL, 'photo_immat/Oz4QjbfSTZO3Vm6nHeTgee2M3TXypuaXgJPvA0rk.jpg', 'Parakou', NULL, NULL, 0, 500, 'En attente', '2023-11-08 07:20:53', '2023-11-08 07:20:53', NULL, ''),
(22, 'HP0021', '856FOP', 'Papi JO', 'Cajou', '2023-11-25 13:50:00', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'photo_immat/76znt0lJJOhmOLbQ3t2xWbHGxhQf7Y0oIdP4tPq9.jpg', 'Parakou', NULL, NULL, 0, 96, 'En attente', '2023-11-08 12:50:37', '2023-11-08 12:50:37', NULL, '96869756'),
(23, 'HP0022', 'BIZO', 'sisi', 'Cajou', '2023-11-30 09:07:00', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'photo_immat/j9GJKwLpkwroYIotHbK1TYE0lmKLpMF1e1MJacdB.jpg', 'Cotonou', NULL, NULL, 0, 568, 'En attente', '2023-11-10 08:08:39', '2023-11-10 08:08:39', NULL, '96585625'),
(24, 'HP0023', 'B50566', 'koko', 'Soja', '2023-11-17 09:16:00', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'photo_immat/7XSWTAQ58yVeGag9F85QG5QxgYh5voH7KkUda2na.jpg', 'Parakou', NULL, NULL, 1, 966, 'En attente', '2023-11-10 08:18:20', '2023-11-10 08:18:20', NULL, '96565796');

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

CREATE TABLE `paiements` (
  `paie_id` int(11) NOT NULL,
  `prix_unit` int(11) DEFAULT NULL,
  `qte_totale` int(11) DEFAULT NULL,
  `util_id` int(11) NOT NULL,
  `cam_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `prix_tp` int(11) DEFAULT NULL,
  `prix_HPG` int(11) DEFAULT NULL,
  `montant_tp` int(11) DEFAULT NULL,
  `montant_HPG` int(11) DEFAULT NULL,
  `recette_HPG` int(11) DEFAULT NULL
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
  MODIFY `cam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
