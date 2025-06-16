-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 26 avr. 2025 à 10:38
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sust_agr`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(200) NOT NULL,
  `admin_file` varchar(200) NOT NULL,
  `poste_id` bigint(255) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_phone` bigint(100) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `status` bigint(1) NOT NULL,
  `date_debut` datetime NOT NULL,
  `last_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `admin_name`, `admin_file`, `poste_id`, `admin_email`, `admin_phone`, `admin_pass`, `status`, `date_debut`, `last_date`) VALUES
(1, 'TAKOUTCHOUP', 'admin.jpg', 1, 'takoubrice0@gmail.com', 654356782, '$2y$10$am9tCl7.Hf7.bBE/X9QMq.Nr9hP9RgkVAQhuKGofv5qQT8lwwmczy', 1, '2025-01-07 23:57:42', '2025-04-15 16:20:19');

-- --------------------------------------------------------

--
-- Structure de la table `admin_notify`
--

DROP TABLE IF EXISTS `admin_notify`;
CREATE TABLE IF NOT EXISTS `admin_notify` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` varchar(100) NOT NULL,
  `link` int(50) NOT NULL,
  `date_start` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `adnotify_see`
--

DROP TABLE IF EXISTS `adnotify_see`;
CREATE TABLE IF NOT EXISTS `adnotify_see` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `notify_id` bigint(255) NOT NULL,
  `admin_id` bigint(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `category` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'légumes'),
(2, 'fruits'),
(3, 'viandes'),
(4, 'boisons');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `id_commande` varchar(50) NOT NULL,
  `user_id` bigint(255) NOT NULL,
  `localite` varchar(200) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `totale_prix` bigint(255) NOT NULL,
  `count_produit` bigint(200) NOT NULL,
  `statut` varchar(50) NOT NULL DEFAULT 'Pas livré',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `detail_commande`
--

DROP TABLE IF EXISTS `detail_commande`;
CREATE TABLE IF NOT EXISTS `detail_commande` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `id_commande` varchar(50) NOT NULL,
  `produit_id` bigint(255) NOT NULL,
  `quantite` bigint(255) NOT NULL,
  `prix` bigint(255) NOT NULL,
  `total` bigint(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_commande` (`id_commande`),
  KEY `produit_id` (`produit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fonctions`
--

DROP TABLE IF EXISTS `fonctions`;
CREATE TABLE IF NOT EXISTS `fonctions` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `poste` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fonctions`
--

INSERT INTO `fonctions` (`id`, `poste`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `produit` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `locality` varchar(200) NOT NULL,
  `categorie_id` bigint(255) NOT NULL,
  `price` bigint(255) NOT NULL,
  `files` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stock` bigint(255) NOT NULL,
  `date_debut` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `categorie_id` (`categorie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`id`, `produit`, `username`, `locality`, `categorie_id`, `price`, `files`, `description`, `stock`, `date_debut`) VALUES
(1, 'poivrons', 'jullien', 'bafoussam', 1, 100, 'thumb-1_20250226.jpg', 'légumes 1, frais', 0, '2025-02-26 00:15:15'),
(2, 'condiments', 'steven', 'pk10', 1, 100, 'thumb-2_20250226.jpg', 'légumes 2, frais', 0, '2025-02-26 00:19:58'),
(3, 'banane', 'jordan', 'ndokoti', 2, 200, 'product-2_20250226.jpg', 'fruit 1, frais', 0, '2025-02-26 00:30:30'),
(4, 'pommes de france', 'jordan', 'ndokoti', 2, 500, 'product-8_20250226.jpg', 'fruit 2, frais', 0, '2025-02-26 00:32:36'),
(5, 'mangue', 'jordan', 'ndokoti', 2, 500, 'product-6_20250226.jpg', 'fruit 3, frais', 0, '2025-02-26 00:33:47'),
(6, 'poulet', 'user1', 'pk14', 3, 1000, 'product-10_20250226.jpg', 'bonne viande 1', 0, '2025-02-26 00:35:37'),
(7, 'viande de porc', 'user1', 'pk14', 3, 1500, 'product-1_20250226.jpg', 'bonne viande 2', 0, '2025-02-26 00:37:05'),
(8, 'jus de resin', 'user2', 'ange Raphaël', 4, 2500, 'product-9_20250109_20250226.jpg', 'jus 1, frais', 0, '2025-02-26 00:39:48'),
(9, 'jus  oranges', 'user2', 'ange Raphaël', 1, 2500, 'product-11_20250109_20250226.jpg', 'jus 2 ,frais', 0, '2025-02-26 00:40:54');

-- --------------------------------------------------------

--
-- Structure de la table `items_love`
--

DROP TABLE IF EXISTS `items_love`;
CREATE TABLE IF NOT EXISTS `items_love` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(255) NOT NULL,
  `produit_id` bigint(255) NOT NULL,
  `statut` bigint(1) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_phone` (`user_id`),
  KEY `produit_id` (`produit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `phone` bigint(14) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` bigint(1) NOT NULL,
  `abonner` bigint(1) NOT NULL,
  `date_start` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `phone`, `password`, `status`, `abonner`, `date_start`, `last_date`) VALUES
(1, 'TAKOUTCHOUP BRICE', 654356782, '$2y$10$18QuXFrI.1nfYP5lHC/.tuzrg3GrN3lplskw0mOVMe4fRbAKUprYi', 0, 0, '2025-02-27 06:59:58', '2025-04-24 13:51:12');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `detail_commande`
--
ALTER TABLE `detail_commande`
  ADD CONSTRAINT `detail_commande_ibfk_1` FOREIGN KEY (`produit_id`) REFERENCES `items` (`id`);

--
-- Contraintes pour la table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `items_love`
--
ALTER TABLE `items_love`
  ADD CONSTRAINT `items_love_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `items_love_ibfk_2` FOREIGN KEY (`produit_id`) REFERENCES `items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
