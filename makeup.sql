-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2025 at 12:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makeup`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `c_id` int(11) NOT NULL,
  `c_slug` varchar(50) NOT NULL,
  `c_nom` varchar(50) NOT NULL,
  `c_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`c_id`, `c_slug`, `c_nom`, `c_description`) VALUES
(1, 'teint', 'teint', 'Produits pour le teint'),
(3, 'blush', 'blush', 'Produits Blush'),
(4, 'highlighter', 'highlighter', 'Produits Highlighter'),
(5, 'bronzer', 'bronzer', 'Produits Bronzer'),
(6, 'fards-paupieres', 'fards à paupières', 'Produits fards à paupières uniques et palettes de fards à paupières'),
(7, 'eyeliner', 'eyeliner', 'Produits eyeliner'),
(8, 'mascara', 'mascara', 'Produits mascara'),
(9, 'sourcils', 'sourcils', 'Produits pour les sourcils'),
(10, 'levres', 'lèvres', 'Produits pour les lèvres');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `cl_id` int(11) NOT NULL,
  `cl_nom` varchar(50) NOT NULL,
  `cl_prenom` varchar(50) NOT NULL,
  `cl_email` varchar(200) NOT NULL,
  `cl_facturation` text NOT NULL,
  `cl_livraison` text NOT NULL,
  `cl_newsletter` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `i_id_photo` int(11) NOT NULL,
  `i_nom` varchar(200) NOT NULL,
  `i_FK_produit` int(11) NOT NULL,
  `i_img_principal` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `p_id` int(11) NOT NULL,
  `p_nom` varchar(50) NOT NULL,
  `p_slug` varchar(50) NOT NULL,
  `p_prix` decimal(10,2) NOT NULL,
  `p_quantite` int(11) NOT NULL,
  `p_marque` varchar(50) NOT NULL,
  `p_FK_categorie` int(11) NOT NULL,
  `p_bestsellers` tinyint(1) NOT NULL,
  `p_description` text NOT NULL,
  `p_utilisation` text NOT NULL,
  `p_photo1` varchar(100) NOT NULL,
  `p_photo2` varchar(100) NOT NULL,
  `p_photo3` varchar(100) NOT NULL,
  `p_photo4` varchar(100) NOT NULL,
  `p_photo5` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`p_id`, `p_nom`, `p_slug`, `p_prix`, `p_quantite`, `p_marque`, `p_FK_categorie`, `p_bestsellers`, `p_description`, `p_utilisation`, `p_photo1`, `p_photo2`, `p_photo3`, `p_photo4`, `p_photo5`) VALUES
(1, 'Huile à lèvres', 'huile-levres', 6.65, 0, 'Nyx', 10, 1, 'Chouchoutez vos lèvres avec cette huile Lip Oil de NYX, une formule décadente enrichie en huile d\'amande,pour un effet glossy assuré. L\'arôme de vanille et de fleur de cerisier rend cette huile pour les lèvres totalement irrésistible !', '', 'huile-levres.jpg', '', '', '', ''),
(2, 'Palette d\'ombres à paupières Forever Flawless', 'forever-flawless', 9.95, 10, 'Revolution Beauty', 6, 0, 'HAUTEMENT PIGMENTEE Cette palette d\'ombres à paupières contient 18 nuances pour créer vos plus beaux looks ! VÉGÉTALIEN ET SANS CRUAUTÉ : Ne contient aucun ingrédient d’origine  animale Approuvé par PETA comme étant exempt de tests sur les animaux', '', 'palette-principale.jpg', 'shades.jpg', 'swatches.jpg', 'open-closed.jpg', 'open.jpg'),
(3, 'Poudre matifiante', 'poudre-matifiante', 8.95, 12, 'Nyx', 1, 1, 'La poudre matifiante Can\'t Stop Won\'t Stop laisse instantanément la peau ultra-mate et minimise l\'apparence d\'huile et de brillance. Cette formule légère offre une finition lisse et mate toute la journée sans paraître sèche, pâteuse ou cendrée pour une peau impeccable.\r\nLes nuances translucides mais modulables se mélangent facilement sans se déposer en ridules pour une finition uniforme et lisse.\r\nCette poudre matifiante ralentit l\'usure du maquillage et donne un fini mat au fond de teint sans bavures. Cette poudre minimise l\'apparence de l\'huile et de la brillance toute la journée pour un fini ultra-mat qui n\'a pas besoin de retouches toute la journée.', 'Appliquez ce produit sous ou sur votre maquillage avec un pinceau poudre ou un beauty blender.', 'poudre.jpg', '', '', '', ''),
(4, 'Lash Sensational Sky High', 'lash-sensational', 9.95, 15, 'Maybelline', 8, 1, 'Lash Sensational Sky High mascara de Maybelline New York donne à vos cils full volume et une longueur illimitée. Sa brosse ultra flexible à picots attrape tous les cils de la racine jusqu\'aux pointes pour encore plus de longueur. Formule infusée en fibres et en extrait de bamboo pour une longueur illimitée. Convient aux yeux sensibles et aux porteurs de lentilles de contact. S\'enlève facilement.', 'Utilisez la courbe intérieure pour atteindre la racine des cils. Balayez les cils de la racine à la pointe. Ne laissez pas sécher le mascara entre les couches. \r\n\r\n', 'mascara.jpg', '', '', '', ''),
(5, 'Blush reloaded', 'blush-reloaded', 3.95, 10, 'Revolution Beauty', 3, 0, 'A super-soft blusher. Find your perfect shade of blush with the Revolution Blusher Reloaded. Each finely milled compact gives a strong, buildable wash of colour to the cheeks for a natural, flushed vibe or a more standout look. Available in a wide range of shades to suit all skin types, pick up your favourite for the perfect natural blush. Cruelty free\r\n\r\n', 'Using your favourite blsuher brush, sweep the products across the cheeks.', 'blush-1.jpg', '', '', '', ''),
(6, 'Don\'t Hold Back Highlighter', 'dont-hold-back-highlighter', 6.95, 10, 'Revolution Beauty', 4, 0, 'BRONZER ET ÉCLAIRCIR : Cette palette compacte contient quatre plateaux de bronzeurs et d\'illuminateurs qui vous permettent de bronzer et d\'éclaircir votre peau en une seule fois !\r\nHAUTEMENT PIGMENTEES : Chaque nuance est hautement pigmentée et possède une texture soyeuse, qui glisse sans problème sur la peau. ', 'MODE D\'EMPLOI : Utilisez-le individuellement pour définir, contourner et mettre en valeur les pommettes et les tempes ou faites tourner votre pinceau autour de tout le compact pour obtenir un éclat sain sur toute la surface du visage. ', 'palette-highlight.jpg', '', '', '', ''),
(7, 'the ROSE edition palette fards à paupières', 'essence-rose-edition-palette', 4.49, 10, 'Essence', 6, 0, 'Exprimez toute votre personnalité avec cette palette de maquillage pour les yeux. Vous recherchez des teintes nude ? Ou des nuances de rose de différentes intensités ? Cette palette contient des fards à paupières aux teintes incontournables, longue tenue, hautement pigmentés, aux effets mats et métallisés.', '', 'palette-essence.jpg', '', '', '', ''),
(8, 'baby got blush', 'essence-baby-got-blush', 2.99, 10, 'Essence', 3, 1, 'Stick blush et bronzeur formule crémeuse. Facile à appliquer et à estomper grâce à sa douce formule crème. Son format pratique lui permet de se glisser dans tous les sacs à main. Toujours prêt, où que vous soyez ! Pour une touche de fraîcheur instantanée.', 'Blush en stick. Formule soyeuse et facile à estomper. Pour un teint naturellement frais.', 'blush-essence.jpg', '', '', '', ''),
(9, 'Palette Fards à Paupières - Ultimate Shadow', 'nyx-ultimate-shadow', 19.95, 15, 'Nyx', 6, 1, ' Palette de 16 fards à paupières haute qualité dans des teintes modulables et avec un fini pailleté, mat, satiné ou métallique, Couleurs ultra-pigmentées et longue tenue pour un look tendance de jour comme de nuit\r\nRésultat : Des looks intenses en couleur et personnalisés, des combinaisons créatives et uniques de tons mats, satinés, pailletés et métalliques avec une tenue longue-durée ', 'Application : Un maquillage des yeux facile à réaliser grâce à une texture veloutée hautement pigmentée et facile à estomper ', 'palette-nyx.jpg', '', '', '', ''),
(10, 'Makeup Revolution The True Icon Bronze Eyeshadow P', 'revolution-true-icon-bronze', 8.99, 10, 'Revolution Beauty', 6, 0, 'Voici la dernière innovation de Revolution : quatre palettes de fards à paupières CULTE, aux finis crémeux, mats et irisés. Des petites palettes de 12 fards pour une infinité de looks… Discrétion ou audace, ces fards luxueux se dégradent facilement.', 'Préparez vos paupières : appliquez l\'un des fards crème sur vos paupières pour intensifier la pigmentation !\r\nTeintes phares : des fards mats pour un look multidimensionnel, ou des fards irisés pour des paupières à l\'éclat subtil.\r\nPolyvalent : utilisez les fards crémeux comme base, superposez les fards mats et terminez votre look avec les fards irisés.', 'palette-revolution-beauty.jpg', '', '', '', ''),
(11, 'coucou', 'coucou', 5.00, 15, 'Nyx', 10, 0, 'Ceci est une Description', 'Ceci est un Conseils d&#039;utilisation', '', '', '', '', ''),
(12, 'gloss', 'gloss', 3.00, 20, 'Essence', 10, 0, 'Ceci est un gloss pour homme', 'A utiliser sur les hommes! &lt;3', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `u_id` int(11) NOT NULL,
  `u_nom` varchar(50) NOT NULL,
  `u_prenom` varchar(50) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`u_id`, `u_nom`, `u_prenom`, `u_email`, `u_password`) VALUES
(1, 'Demaret', 'Olivia', 'oliviadtqb@gmail.com', '$2y$10$XTbz1vn5M/MLyQKV9P0qn.mr25vPfQL.ajrT4pyeJZYMqFiKHdpky');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_slug` (`c_slug`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`cl_id`),
  ADD UNIQUE KEY `cl_email` (`cl_email`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`i_id_photo`),
  ADD UNIQUE KEY `i_nom` (`i_nom`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_slug` (`p_slug`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_email` (`u_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `cl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `i_id_photo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
