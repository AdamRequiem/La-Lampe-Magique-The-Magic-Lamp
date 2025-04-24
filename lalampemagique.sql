-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 14 avr. 2025 à 19:49
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lalampemagique`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `ID_CATEGORIE` int(11) NOT NULL,
  `NOM_CATEGORIE` varchar(100) DEFAULT NULL,
  `DESCRIPTION_CATEGORIE` text DEFAULT NULL,
  `image` varchar(25) NOT NULL,
  `couleur` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`ID_CATEGORIE`, `NOM_CATEGORIE`, `DESCRIPTION_CATEGORIE`, `image`, `couleur`) VALUES
(1, 'Boucherie', ' Découvrez notre sélection de viandes savoureuses : bœuf, agneau, volaille et charcuterie artisanale. Préparées sur commande et livrées dans le respect de la chaîne du froid.', 'boucherie.png', '9F353A'),
(4, 'Fruits et légumes', 'Découvrez notre sélection de fruits et légumes frais, de saison et de qualité. Récoltés avec soin et livrés pour garantir fraîcheur et saveur.\r\n', 'fruits-legumes.png', '8EA84B'),
(5, 'Alimentation générale', 'Retrouvez tous vos produits du quotidien : épicerie, conserves, produits laitiers et bien plus. Une sélection variée pour répondre à tous vos besoins.\r\n', 'alimentation-generale.png', 'BADBFF'),
(6, 'Nettoyage', 'Découvrez notre gamme de produits de nettoyage efficaces et sûrs. Pour un intérieur propre et frais, tout en respectant votre environnement.', 'nettoyage.png', '6C9589'),
(7, 'Beauté et hygiène ', 'Prenez soin de vous avec notre sélection de produits de beauté et d’hygiène. Des soins adaptés à toute la famille pour une routine bien-être au quotidien.', 'beaute-hygiene.png', 'EA97A5'),
(8, 'Patisserie', 'Savourez nos délicieux pains, viennoiseries, gâteaux et tartes, préparés avec soin pour satisfaire toutes vos envies sucrées. Des produits frais et gourmands à découvrir !', 'patisserie.png', 'AA8774'),
(9, 'Epices', 'Découvrez notre sélection d’épices authentiques pour relever vos plats et sublimer vos recettes. Des saveurs du monde entier pour une cuisine riche en goût.', 'epices.png', 'FF9933');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `ID_CLIENT` int(11) NOT NULL,
  `NOM_CLIENT` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(150) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `TELEPHONE` varchar(15) DEFAULT NULL,
  `ADDRESSE` text DEFAULT NULL,
  `TYPE_COMPTE` varchar(10) DEFAULT 'client'
) ;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`ID_CLIENT`, `NOM_CLIENT`, `EMAIL`, `password`, `TELEPHONE`, `ADDRESSE`, `TYPE_COMPTE`) VALUES
(2, 'test1', 'test@gmail.com', '$2y$10$KXiQuw/WoZ9xpf91fk', NULL, NULL, 'admin'),
(3, 'test2', 'test2@gmail.com', '$2y$10$bqpS836ZcI7QsDZPRE', NULL, NULL, 'client'),
(4, 'test3', 'test3@gmail.com', '$2y$10$zTfKRtHiaRi2o6ahA6', NULL, NULL, 'client'),
(5, 'test123', 'test123@gmail.com', '$2y$10$j3LsxyrZVm12Wvt6cs79LOJO/p96Z7UYslWZQtfrHWCmBnwH/7snG', NULL, NULL, 'admin'),
(6, 'Admin1', 'admin1@gmail.com', 'azerty123', NULL, NULL, 'admin'),
(7, 'test1', 'test1@gmail.com', '$2y$10$Il4LGFc9HBeT374NnEWeaOgz595K1HqloueR4.uiAdSCzhTW6..8S', NULL, NULL, 'client'),
(8, 'elabid2', 'elabid3@gmail.com', '$2y$10$xtounqGQSzu9Y8GeyE2wqeAzilSjOimfKnJ8Y2g1hr6zCXa/4Q1h.', NULL, NULL, 'client'),
(9, 'testeur123', 'testeur@gmail.com', '$2y$10$zL76cOzpB0VH0hONIRBo3u/BRKMYxJJVWllALlOPFxLdzM.E4739C', NULL, NULL, 'client');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `ID_COMMANDE` int(11) NOT NULL,
  `ID_CLIENT` int(11) DEFAULT NULL,
  `DATE` date DEFAULT NULL,
  `TOTAL` float DEFAULT NULL,
  `STATUT` varchar(25) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Structure de la table `commande_produit`
--

CREATE TABLE `commande_produit` (
  `ID_COMMANDE` int(11) NOT NULL,
  `ID_PRODUIT` int(11) NOT NULL,
  `QUANTITE` int(11) DEFAULT NULL,
  `PRIX_UNITAIRE` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `ID_PRODUIT` int(11) NOT NULL,
  `ID_SOUS_CATEGORIE` int(11) DEFAULT NULL,
  `NOM_PRODUIT` varchar(100) DEFAULT NULL,
  `DESCRIPTION_PRODUIT` text DEFAULT NULL,
  `PRIX` float(8,2) DEFAULT NULL,
  `STOCK` int(11) DEFAULT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`ID_PRODUIT`, `ID_SOUS_CATEGORIE`, `NOM_PRODUIT`, `DESCRIPTION_PRODUIT`, `PRIX`, `STOCK`, `photo`) VALUES
(3, 4, 'Pomme', NULL, 22.50, 102, 'image/pomme.jpg'),
(4, 4, 'Orange', NULL, 7.50, 99, 'image/orange.jpg'),
(5, 4, 'Fraise', NULL, 11.90, 89, 'image/fraise.jpg'),
(6, 4, 'Ananas', NULL, 32.50, 95, 'image/ananas.jpg'),
(7, 4, 'Kiwi', NULL, 19.90, 85, 'image/kiwi.jpg'),
(8, 4, 'Framboise', NULL, 15.90, 70, 'image/framboise.jpg'),
(9, 5, 'Pomme de terre', NULL, 9.90, 103, 'image/pommede terre.jpg'),
(10, 5, 'Carotte', NULL, 6.50, 89, 'image/carotte.jpg'),
(11, 5, 'Tomate', NULL, 8.90, 85, 'image/tomate.jpg'),
(12, 5, 'Oignon ', NULL, 8.90, 99, 'image/oignon.jpg '),
(13, 5, 'Ail', NULL, 12.50, 95, 'image/ail.jpg'),
(14, 5, 'Concombre ', NULL, 8.50, 70, 'image/cocombre.jpg'),
(15, 5, 'Poivron', NULL, 11.90, 85, 'image/poivron.jpg'),
(16, 7, 'Navet', NULL, 11.00, 65, 'image/navet.jpg'),
(17, 7, 'Panais', NULL, 13.25, 56, 'image/pannais.jpg'),
(18, 7, 'Cerfeuil tubéreux', NULL, 13.00, 85, 'image/cerfeuil tubéreux.jpg'),
(19, 2, 'Poulet entier environ 1,25Kg', NULL, 56.00, 40, 'image/poulet1.jpg'),
(20, 2, 'Poulet fermier entier environ 1,3 Kg', NULL, 89.90, 55, 'image/poulet2.jpg'),
(21, 2, 'Coquelet x2 environ 800g', NULL, 59.50, NULL, 'image/poulet3.jpg'),
(22, 2, 'Pilons de poulet mariné 250g', NULL, 15.90, 70, 'image/poulet4.jpg'),
(23, 2, 'Filet de poulet 250g', NULL, 23.90, 75, 'image/poulet.jpg'),
(25, 1, 'Viande hachée maigre de bœuf 500g', NULL, 67.45, 65, 'image/boeuf1.jpg'),
(26, 1, 'Viande hachée de bœuf 500g', NULL, 54.95, 55, 'image/boeuf2.jpg'),
(27, 1, 'Deux steacks hachés de boeuf maigre 250g ', NULL, 37.35, 58, 'image/boeuf3.jpg'),
(28, 1, 'Jarret de bœuf avec os 500g ', NULL, 79.50, 55, 'image/boeuf4.jpg'),
(29, 1, 'Faux filet de bœuf 250g ', NULL, 38.73, 85, 'image/boeuf.jpg'),
(30, 1, 'Epaule de veau avec os 500g', NULL, 67.45, 54, 'image/Epaule.jpg'),
(31, 1, 'Gigot d\'agneau 1Kg', NULL, 149.00, 44, 'image/Gigot.jpg'),
(32, 2, 'Boulette de poulet farcie 200g', NULL, 19.90, 45, 'image/Boulette.jpg'),
(33, 2, 'Saucisse poulet piquant 250g', NULL, 20.90, 37, 'image/Saucissep.jpg'),
(34, 3, 'Foie et cœur de bœuf 250g', NULL, 49.90, 44, 'image/Foie.jpg'),
(35, 3, 'Ris de bœuf 250g', NULL, 27.90, 56, 'image/Ris.jpg'),
(36, 3, 'Cervelle d\'agneau à la pièce', NULL, 54.95, 32, 'image/Cervelle.jpg'),
(37, 3, 'Tête d\'agneau à la pièce', NULL, 69.95, 5, 'image/Tête.jpg'),
(38, 3, 'Brochettes de bœuf 500g ', NULL, 70.95, 22, 'image/Brochettesb.jpg'),
(39, 3, 'Saucisses de boeuf douces 500g', NULL, 54.50, 24, 'image/Saucissesb.jpg'),
(40, 31, 'Pain au chocolat pur beurre x10 unités', NULL, 49.50, 22, 'image/product2.jpg\r\n'),
(41, 31, 'Mini croissant 200g (environ 10 pièces)', NULL, 21.90, 21, 'image/product3.jpg'),
(42, 31, 'Croissant pur beurre x6 unités x55g', NULL, 33.39, 27, 'image/product3.jpg'),
(43, 31, 'Pain suisse aux pépites de chocolat noir grand modèle x1 unité', NULL, 12.90, 22, 'image/product6.jpg'),
(44, 31, 'Torsade aux pépites de chocolat noir x2 unités', NULL, 23.90, 19, 'image/Torsade.jpg'),
(45, 31, 'Donut fourré à la vanille x1 unité', NULL, 15.90, 16, 'image/Donut.jpg'),
(46, 30, 'Mini galette 100% complet x6 unités', NULL, 6.90, 99, 'image/galette.jpg'),
(47, 30, 'Baguette beldi 200g', NULL, 1.95, 89, 'image/Baguette.jpg'),
(48, 30, 'Baguette aux olives 250g', NULL, 4.90, 65, 'image/Baguetteolives.jpg'),
(49, 30, 'Pain de campagne 400g', NULL, 11.90, 55, 'image/Paincampagne.jpg'),
(50, 30, 'Pain rond normal x5 unités', NULL, 5.95, 75, 'image/Painnormal.jpg'),
(51, 30, 'Pain de mie complet x20 tranches 480g ', NULL, 15.90, 70, 'image/Painmie.jpg'),
(52, 32, 'Tartelettes variées x5 unités', NULL, 38.95, 34, 'image/Tartelettesvariée.jpg'),
(53, 32, 'Délice cardinal pour 8 personnes', NULL, 165.50, 15, 'image/Délicecardinal.jpg '),
(54, 32, 'Bûche rocher 20cm', NULL, 79.95, 10, 'image/Bûcherocher.jpg'),
(55, 32, 'Gâteau roulé caramel 30cm', NULL, 47.45, 30, 'image/Gâteauroulé.jpg'),
(56, 32, 'Assortiment petits gâteaux x5 unités', NULL, 44.90, 40, 'image/Assortiment.jpg'),
(57, 32, 'Mille feuilles café x2 unités', NULL, 22.95, NULL, 'image/Millefeuillescafé.jpg'),
(58, 29, 'Sidi Ali Eau minérale 1,5L', NULL, 4.75, 95, 'image/eau1.jpg'),
(59, 29, 'Sidi Ali Eau minérale Pack 4x2L', NULL, 23.80, 89, 'image/eau2.jpg'),
(60, 29, 'Sidi Ali Eau minérale 50cl', NULL, 2.50, 95, 'image/eau3.jpg'),
(61, 29, 'Pack Sidi Ali Eau minérale 12 x 50cl', NULL, 31.50, 89, 'image/eau3.jpg'),
(62, 29, 'Coca Cola 1L', NULL, 7.50, 85, 'image/coca1.jpg'),
(63, 29, 'Hawaï tropical 1L', NULL, 8.50, 89, 'image/hawai1.jpg'),
(64, 29, 'Pack Coca Cola canettes slim 6x25cl', NULL, 24.50, 75, 'image/canettes.jpg'),
(65, 29, 'Fanta orange 1,3L', NULL, 6.65, 70, 'image/fanta.jpg'),
(66, 27, 'Lait entier naturel stérilisé UHT 6x1L - JAOUDA', NULL, 57.95, 75, 'image/lait1.jpg'),
(67, 27, 'Yaourt brassé nature sucré Tendre 8x110g - JAOUDA', NULL, 17.75, 56, 'image/danone1.jpg'),
(68, 29, 'Yaourt brassé cerise 0% mg 105g - DANONE', NULL, 3.00, 95, 'image/danone.jpg'),
(69, 27, 'Fromage Edam boule environ 900g - KROON', NULL, 114.90, 40, 'image/fromage.jpg'),
(70, 27, 'Fromage fondu 64 portions - CŒUR DE LAIT', NULL, 47.95, 75, 'image/fromagepain.jpg'),
(71, 27, 'Margarine en barquette 3x250g 2+1 gratuit - LA', NULL, 26.95, 56, 'image/beurre.jpg'),
(72, 27, 'Œufs frais moyen calibre x 30 environ 1,730 Kg - NATUR\'ŒUF', NULL, 53.50, 65, 'image/oeuf.png'),
(73, 27, 'Lben aux probiotiques 440g - JAOUDA', NULL, 5.50, 70, 'image/lben.jpg'),
(74, 25, 'Filets de thon à l\'huile végétale 125g - GARCIA', NULL, 17.95, 75, 'image/thon.jpg'),
(75, 25, 'Ketchup 310g + mayonnaise 280g + thon 1/10 + vinaigre citron 50cl - STAR', NULL, 37.95, 55, 'image/sauce.jpg'),
(76, 25, 'Sauce biggy tasty goût fumé 290g -10% OFF - STAR', NULL, 18.95, 65, 'image/sauce2.jpg'),
(77, 25, 'Coulis de tomate 3x350g - OLLA', NULL, 21.95, 55, 'image/ola.jpg'),
(79, 25, 'Champignons coupe 1/2 - MADIS', NULL, 17.50, 38, 'image/champoing.jpg'),
(80, 28, 'Huile de tournesol 5L- HUILOR', NULL, 97.40, 65, 'image/huile.jpg'),
(81, 28, 'Vinaigre de table blanc 0,5L - PIKAROME', NULL, 6.65, 70, 'image/vinaigre.jpg'),
(82, 28, 'Vinaigre de table coloré 50cl - DESSEAUX', NULL, 3.00, 85, 'image/vinaigre2.jpg'),
(83, 28, 'Huile de table 1L - HALA', NULL, 17.50, 70, 'image/huilehala.jpg'),
(84, 15, 'Gel enrichi en beurre de cacao 100ml - VASELINE', NULL, 20.95, 40, 'image/vasline.jpg'),
(85, 15, 'Masque hydrate 1 minute skin detox 75ml - NIVEA', NULL, 50.95, 55, 'image/nivea.jpg'),
(86, 15, 'Ghassoul au miel 100% naturel 200g - ARGAPUR', NULL, 37.95, 65, 'image/ghassoul.jpg'),
(87, 15, 'Fleur de douche 2 en 1 M24', NULL, 24.95, NULL, 'image/douche.jpg'),
(88, 15, 'Nila en poudre 100g - ARGAPUR', NULL, 37.95, 65, 'image/nila.jpg'),
(89, 15, 'Lait hydratant pour le corps 120ml - HYDERMA', NULL, 7.50, 42, 'image/hyderma.jpg'),
(90, 14, 'Shampoing hydratant lait d\'amande nourricier 200 ml - ULTRA DOUX', NULL, 26.00, 60, 'image/ultradoux.jpg'),
(91, 14, 'Shampoing à l\'Huile d\'Argan 380ml - CADUM', NULL, 23.95, 70, 'image/cadum.jpg'),
(92, 14, 'Shampoing nutrition éclat huile extraordinaire 600ml -', NULL, 71.50, 75, 'image/elseve.jpg'),
(93, 14, 'Après shampoing à l\'eau de riz et à l\'amidon 200ml - ULTRA DOUX', NULL, 40.00, 56, 'image/eauriz.jpg'),
(94, 14, 'Après-Shampoing au lait d\'amande bio 200ml -', NULL, 40.00, 75, 'image/laitdamande.jpg'),
(95, 14, 'Lot Shampoing Anti-Chute 700ml + Soin 3 minutes miracle 275ml - PANTENE', NULL, 70.95, 56, 'image/pantene.jpg'),
(96, 18, 'Rasoir jetable Skinguard pour peaux sensibles 4+1 -', NULL, 55.95, 65, 'image/gillette.jpg'),
(97, 18, 'Déodorant carbon protect 4 en 1 150ml - L\'OREAL MEN EXPERT', NULL, 41.50, 60, 'image/deodorant.jpg'),
(98, 18, 'Nettoyant 3 en1 barbe visage cheveux BarberClub 200ml - L\'ORÉAL MEN EXPERT', NULL, 84.50, 85, 'image/barbevisage.jpg '),
(99, 18, 'Eau de toilette après rasage musk 100ml - BRUT', NULL, 84.95, 55, 'image/eaudetoilette.jpg '),
(100, 17, 'Highlighter so bright baked 01 snowy glowy light - CALLISTA', NULL, 95.00, 40, 'image/Highlighter.jpg'),
(101, 17, 'Crayon à sourcils brow star 02 brown - CALLISTA', NULL, 35.00, 70, 'image/crayon.jpg'),
(102, 17, 'Fond de teint magic matte foundation 01 30ml - SYN AND ZYN', NULL, 89.00, 65, 'image/Fonddeteint.jpg'),
(103, 17, 'Vernis à ongle color up nail polish 001 clear water - CALLSITA', NULL, 16.90, 55, 'image/vernis.jpg'),
(104, 17, 'Dipliner line extend 01 noir - CALLISTA', NULL, 43.95, 85, 'image/Diplinerline.jpg '),
(105, 17, 'Crayon à lèvres lip candy 08 pomegranate - CALLISTA', NULL, 33.00, 55, 'image/Crayonàlèvres.jpg'),
(106, 16, 'Dentifrice 0 à 3 ans fraise 50ml - SIGNAL', NULL, 34.95, 65, 'image/dentifrice.jpg'),
(107, 16, 'Brosse à dents ultrathin sensitive noir 0,01mm - ORAL-B', NULL, 223.50, 56, 'image/brosse.jpg'),
(108, 16, 'Bain de bouche 6 en 1 menthe Total Care 500ml - LISTERINE', NULL, 56.95, 20, 'image/beaindebouch.jpg'),
(109, 16, 'Lot dentifrices Signal Miswak 120ml 2+1 gratuit', NULL, 29.35, 56, 'image/miswak.jpg'),
(110, 13, 'THE ORDINARY Acide Hyaluronique 2% + B5 Sérum Hydratant', NULL, 115.00, 31, 'image/ordinary.jpg'),
(111, 13, 'THE ORDINARY Niacinamide 10% + Zinc 1% Sérum Anti-Imperfections', NULL, 79.00, 18, 'image/ordinary.jpg'),
(112, 13, 'THE ORDINARY Solution de Peeling AHA 30% + BHA 2% Soin Exfoliant 30 ml', NULL, 130.00, 27, 'image/ordinary1.jpg'),
(113, 13, 'Skin Therapy Eye - Crème yeux multi-perfectrice', NULL, 399.00, 14, 'image/Skin.jpg'),
(114, 13, 'Pout Preserve Lip Treatment - Soin des lèvres hydratant & anti-âge aux peptides', NULL, 209.00, 18, 'image/Pout.jpg'),
(115, 13, 'Abeille Royale - Sérum Huile-en-Eau Jeunesse', NULL, 589.00, 21, 'image/Abeille.jpg'),
(116, 13, 'Lift & Firm - Crème de Nuit', NULL, 189.00, 44, 'image/Lift.jpg'),
(117, 21, 'Lave-Vaisselle Concentré Power Gel Citron Finish (80 Lavages) 0.4L', NULL, 39.90, 65, 'image/lavevaissel.jpg'),
(118, 21, 'Liquide Vaisselle Original Fairy 900ml', NULL, 25.95, 55, 'image/fairy.jpg'),
(119, 21, 'Liquide Vaisselle Max Power Antibactérien Fairy 660 ml', NULL, 47.25, 40, 'image/maxpower.jpg'),
(120, 21, '42 Tablettes pour Lave-vaisselle Platinum Citron Fairy', NULL, 140.43, 56, 'image/platinumcitron.jpg'),
(121, 21, '40 Pastilles pour Lave Vaisselle Finish PowerBall Classic', NULL, 133.93, 75, 'image/powerballfinish.jpg'),
(122, 21, 'Gel Express Power Lave-Vaisselle Glanz Meister 1L', NULL, 68.44, 56, 'image/glanz.jpg'),
(123, 22, 'Liquide linge Life XXL- Lavande – 5L', NULL, 159.78, 40, 'image/liquidelinge.jpg'),
(124, 22, 'ARIEL\r\nLessive liquide Matic Downy 3L - ARIEL', NULL, 105.99, 56, 'image/ariel.jpg'),
(125, 22, 'ARIEL\r\nCapsules lessive Matic All in 1 Pods Original x15 - ARIEL', NULL, 66.00, 75, 'image/capssuleariel.jpg'),
(126, 22, 'ARIEL\r\nLessive en poudre Matic 3 en 1 350g - ARIEL', NULL, 11.90, 56, 'image/lessiveenpoudre.jpg'),
(127, 22, 'OMO\r\nCapsules de lessive 3 en 1 x30 unités - OMO', NULL, 67.45, 85, 'image/omocapssule.jpg'),
(128, 22, 'NORIT\r\nLessive liquide pour linge délicat 1,12L - NORIT', NULL, 45.98, 89, 'image/noritliquide.jpg'),
(129, 23, 'Tampon à récurer en inox en spirale Glitzi 2+1 gratuit ', NULL, 7.50, 40, 'image/spiraleinox.jpg'),
(130, 23, 'Eponges grattantes Tip Top 3 unités+2 gratuites ', NULL, 23.90, 75, 'image/eponge.jpg'),
(131, 23, 'Abrasifs Bobbi 5 x5 unités - CORAZZI', NULL, 22.50, 56, 'image/abbrassifbobbi'),
(132, 23, 'Gouttelette de détergent avec brosse - PAREX', NULL, 24.50, 75, 'image/gouttelette.jpg'),
(133, 23, 'Rouleaux de sacs poubelle 3x10 35L 2+1 gratuit ', NULL, 22.50, 89, 'image/poubelle.jpg'),
(134, 24, 'Insecticide pour insectes volants parfum citron 400ml', NULL, 37.95, 40, 'image/insecticide.jpg'),
(135, 24, 'Aérosol insecticide volant 5 en 1 300ml - RAID', NULL, 45.98, 89, 'image/raid.jpg'),
(136, 24, 'Nettoyant désinfactant sols et surfaces fraîcheur 1 L', NULL, 23.90, 85, 'image/netdesinfactant.jpg'),
(137, 24, 'Déboucheur liquide 1 L - ECONET', NULL, 22.50, 55, 'image/deboucheur.jpg'),
(138, 24, 'Nettoyant désinfactant sols et surfaces citron 1 L - SANYTOL', NULL, 67.45, 40, 'image/desinfectantcitron.jpg'),
(139, 24, 'Nettoyant vitres 3 en 1 recharge 750ml - CASINO', NULL, 17.50, 70, 'image/netvitre.jpg'),
(140, 24, 'Gel désinfectant 4 en 1 1Kg - ONITOL', NULL, 19.90, 99, 'image/onitol.jpg'),
(141, 24, 'Nettoyant ménager cerisier en fleurs fête des fleurs', NULL, 22.50, 102, 'image/ménagercerisier.jpg'),
(142, 10, 'Poivre de Kampot IGP', NULL, 5.00, 40, 'image/poivre.jpg'),
(143, 10, 'Curcuma', NULL, 6.65, 55, 'image/Curcuma.jpg'),
(144, 10, 'Cannelle de Ceylan bio', NULL, 7.50, 95, 'image/cannelle.jpg'),
(145, 10, 'Cumin en poudre', NULL, 11.90, 55, 'image/cumin.jpg'),
(146, 10, 'Moutarde (graines)', NULL, 17.50, 75, 'image/moutarde.jpg'),
(147, 10, 'sel', NULL, 0.98, 56, 'image/sel.jpg'),
(148, 12, 'Zaatar (mélange Libanais)', NULL, 23.90, 40, 'image/zaatarli.jpg'),
(149, 12, 'Aromates pizza\r\n', NULL, 22.50, 55, 'image/aropizza.jpg'),
(150, 12, 'Aromates poisson', NULL, 19.90, 75, 'image/aropoisson.jpg'),
(151, 12, 'Epices barbecue', NULL, 22.50, 56, 'image/barbecue.jpg'),
(152, 12, 'Epices couscous Royal', NULL, 23.90, 65, 'image/couscous.jpg'),
(153, 12, 'Épices pour paella au safran', NULL, 56.45, 89, 'image/paela.jpg'),
(154, 11, 'Centella Asiatica', NULL, 67.45, 40, 'image/centella.jpg'),
(155, 11, 'Kinkeliba', NULL, 78.50, 89, 'image/kinkeliba.jpg'),
(156, 11, 'Ashwagandha BIO', NULL, 37.95, 40, 'image/ashwagandha.jpg'),
(157, 11, 'Neem BIO', NULL, 22.50, 89, 'image/neem.jpg'),
(158, 11, 'Moringa Oleifera BIO', NULL, 67.45, 75, 'image/moringa.jpg'),
(159, 11, 'Trèfle rouge', NULL, 76.98, 89, 'image/trèfle.jpg'),
(160, 34, 'Petits gâteaux aux noisettes', NULL, 101.56, 45, 'image/ferrero.jpg'),
(161, 34, 'Ferrero Rocher Barres de Noisettes au Chocolat Noir, 8 Paquets, Enveloppées Individuellement', NULL, 45.60, 52, 'image/tablette.jpg'),
(162, 34, 'NESTLE Kitkat Valentine (Card Inside) Dessert Delight Rich Chocolate ', NULL, 45.36, 45, 'image/kitkat.jpg'),
(163, 34, 'Les 20 secrets du chocolat', NULL, 170.30, 24, 'image/chocolata.jpg'),
(164, 34, 'Boîte de chocolats fins - Choco Chocolat - Chocolaterie artisanale', NULL, 78.99, 45, 'image/cho.jpg'),
(165, 34, 'Chocolats MIX BOITE', NULL, 190.30, 24, 'image/boites.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `ID_PROMOTION` int(11) NOT NULL,
  `ID_PRODUIT` int(11) DEFAULT NULL,
  `DESCRIPTION_PROMOTION` text DEFAULT NULL,
  `POURCENTAGE` float DEFAULT NULL,
  `DATE_DEBUT` date DEFAULT NULL,
  `DATE_FIN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sous_categorie`
--

CREATE TABLE `sous_categorie` (
  `ID_SOUS_CATEGORIE` int(11) NOT NULL,
  `ID_CATEGORIE` int(11) DEFAULT NULL,
  `NOM_SOUS_CATEGORIE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sous_categorie`
--

INSERT INTO `sous_categorie` (`ID_SOUS_CATEGORIE`, `ID_CATEGORIE`, `NOM_SOUS_CATEGORIE`) VALUES
(1, 1, 'Boeuf'),
(2, 1, 'Poulet'),
(3, 1, 'Abats'),
(4, 4, 'Fruits frais'),
(5, 4, 'Légumes frais'),
(7, 4, 'Légumes racines'),
(8, 4, 'Salades et herbes'),
(9, 4, 'Champignons'),
(10, 9, 'Epices de base'),
(11, 9, 'Epices exotiques'),
(12, 9, 'Mélange d épices'),
(13, 7, 'Soins du visage'),
(14, 7, 'Soins capillaires'),
(15, 7, 'Soins du corps'),
(16, 7, 'Hygiène bucco-dentaire'),
(17, 7, 'Maquillage'),
(18, 7, 'Produits pour homme'),
(21, 6, 'Produits vaisselles'),
(22, 6, 'Produits linge'),
(23, 6, 'Acessoires nettoyage'),
(24, 6, 'Produits sols'),
(25, 5, 'Conserves'),
(27, 5, 'Produits laitiers'),
(28, 5, 'Huiles et vinaigres'),
(29, 5, 'Boissons'),
(30, 8, 'Pains'),
(31, 8, 'Viennoiseries'),
(32, 8, 'Gateaux et tartes'),
(34, 8, 'Chocolat');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`ID_CATEGORIE`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID_CLIENT`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`ID_COMMANDE`),
  ADD KEY `FK_RELATION_1` (`ID_CLIENT`);

--
-- Index pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD PRIMARY KEY (`ID_COMMANDE`,`ID_PRODUIT`),
  ADD KEY `FK_COMMANDE_PRODUIT` (`ID_PRODUIT`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`ID_PRODUIT`),
  ADD KEY `FK_RELATION_2` (`ID_SOUS_CATEGORIE`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`ID_PROMOTION`),
  ADD KEY `FK_RELATION_4` (`ID_PRODUIT`);

--
-- Index pour la table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  ADD PRIMARY KEY (`ID_SOUS_CATEGORIE`),
  ADD KEY `FK_RELATION_3` (`ID_CATEGORIE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `ID_CATEGORIE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `ID_CLIENT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `ID_COMMANDE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `ID_PRODUIT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT pour la table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  MODIFY `ID_SOUS_CATEGORIE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_RELATION_1` FOREIGN KEY (`ID_CLIENT`) REFERENCES `client` (`ID_CLIENT`);

--
-- Contraintes pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD CONSTRAINT `FK_COMMANDE_PRODUIT` FOREIGN KEY (`ID_PRODUIT`) REFERENCES `produit` (`ID_PRODUIT`),
  ADD CONSTRAINT `FK_COMMANDE_PRODUIT2` FOREIGN KEY (`ID_COMMANDE`) REFERENCES `commande` (`ID_COMMANDE`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_RELATION_2` FOREIGN KEY (`ID_SOUS_CATEGORIE`) REFERENCES `sous_categorie` (`ID_SOUS_CATEGORIE`);

--
-- Contraintes pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `FK_RELATION_4` FOREIGN KEY (`ID_PRODUIT`) REFERENCES `produit` (`ID_PRODUIT`);

--
-- Contraintes pour la table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  ADD CONSTRAINT `FK_RELATION_3` FOREIGN KEY (`ID_CATEGORIE`) REFERENCES `categorie` (`ID_CATEGORIE`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
