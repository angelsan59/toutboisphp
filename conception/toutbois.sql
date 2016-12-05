-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 21 Novembre 2016 à 15:30
-- Version du serveur :  10.1.16-MariaDB
-- Version de PHP :  5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `toutbois`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `idcli` int(11) NOT NULL,
  `actif` char(25) NOT NULL,
  `nomens` varchar(25) NOT NULL,
  `siret` varchar(14) NOT NULL,
  `dateder` date NOT NULL,
  `adresse1` varchar(255) NOT NULL,
  `adresse2` varchar(255) NOT NULL,
  `cp` varchar(11) NOT NULL,
  `ville` varchar(25) NOT NULL,
  `pays` varchar(25) NOT NULL,
  `nomcont` varchar(25) NOT NULL,
  `prenomcont` varchar(25) NOT NULL,
  `telfixe` int(11) NOT NULL,
  `telport` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `nbcommandes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`idcli`, `actif`, `nomens`, `siret`, `dateder`, `adresse1`, `adresse2`, `cp`, `ville`, `pays`, `nomcont`, `prenomcont`, `telfixe`, `telport`, `email`, `nbcommandes`) VALUES
(1, 'oui', 'Ikea', '31588402300013', '2016-10-10', '5 rue du Grand But', 'CC Carrefour', '59160', 'Lomme', 'France', 'Alfred', 'Musset', 969362006, 12548, 'amusset@ikea.fr', 10),
(2, 'oui', 'Conforama', '41481940900023', '2014-02-12', 'CC des Verdiers', 'complément ddresse', '59390', 'Lys Les Lannoy', 'France', 'Dessailly', 'Marcel', 826081012, 32547, 'mdessailly@confo.fr', 20),
(3, 'oui', 'Alinea', '34519755200093', '2015-12-24', 'Rue Mal De Lattre De Tassigny', 'complément dadresse', '59170', 'Croix', 'France', 'Alexis', 'Mulliez', 139313400, 156, 'dg@gt.vo', 0),
(4, 'oui', 'Habitat', '38938954500341', '2016-10-20', '36-40 rue Esquermoise', 'complément adresse', '59000', 'Lille', 'France', 'Zemmour', 'Eric', 320148200, 156, 'ezem@habitat.com', 5),
(5, 'oui', 'Blue cargo', '80076531500018', '2016-03-15', '40,42 rue du général de Gaulle', '', '59110', 'La Madeleine', 'France', 'Emmanuel', 'Petit', 320154789, 0, 'epetit@bcargo.net', 12);

-- --------------------------------------------------------

--
-- Structure de la table `entete_commande`
--

CREATE TABLE `entete_commande` (
  `id_com` int(11) NOT NULL,
  `date_com` date DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `qte` int(11) DEFAULT NULL,
  `id_com` int(11) NOT NULL,
  `code_prod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `id_user` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `code_prod` int(11) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `pu` double DEFAULT NULL,
  `remise` float DEFAULT NULL,
  `qte_stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `prospects`
--

CREATE TABLE `prospects` (
  `idpro` int(11) NOT NULL,
  `actif` char(25) NOT NULL,
  `nomens` varchar(25) NOT NULL,
  `siret` varchar(25) NOT NULL,
  `dateder` date NOT NULL,
  `adresse1` varchar(25) NOT NULL,
  `adresse2` varchar(25) DEFAULT NULL,
  `cp` varchar(25) NOT NULL,
  `ville` varchar(25) NOT NULL,
  `pays` varchar(25) NOT NULL,
  `nomcont` varchar(25) NOT NULL,
  `prenomcont` varchar(25) NOT NULL,
  `telfixe` int(11) NOT NULL,
  `telport` int(11) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `prospects`
--

INSERT INTO `prospects` (`idpro`, `actif`, `nomens`, `siret`, `dateder`, `adresse1`, `adresse2`, `cp`, `ville`, `pays`, `nomcont`, `prenomcont`, `telfixe`, `telport`, `email`) VALUES
(1, 'oui', 'Intermarché', '123548', '2015-10-20', 'rue de la Mackellerie', 'complément adresse', '594512', 'Roubaix', 'France', 'Peabody', 'James', 12354, 12485, 'f@gt.gt'),
(2, 'oui', 'Conforama', '123245789', '2016-09-14', 'Heron parc', '', '597415', 'Villeneuve', 'France', 'Domenech', 'Paymond', 124578, 154532, 'rayray@confo.fr');

-- --------------------------------------------------------

--
-- Structure de la table `representants`
--

CREATE TABLE `representants` (
  `id_rep` int(11) NOT NULL,
  `actif` char(25) NOT NULL,
  `nomrep` varchar(25) NOT NULL,
  `prenomrep` varchar(25) NOT NULL,
  `salaire` float NOT NULL,
  `txcommission` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `representants`
--

INSERT INTO `representants` (`id_rep`, `actif`, `nomrep`, `prenomrep`, `salaire`, `txcommission`) VALUES
(1, 'oui', 'Hollande', 'Francois', 30000, 10),
(2, 'oui', 'Ibraimovich', 'Zlatan', 300000, 10),
(3, 'oui', 'Cisse', 'Loukakou', 20000, 5),
(4, 'oui', 'Valbuena', 'Mathieu', 20000, 3),
(5, 'non', 'sdfhy', 'fgh', 1235, 12),
(6, 'oui', 'dsqfg', 'dfg', 1436, 5),
(7, 'oui', 'cvnb', 'cxwvb', 123, 1),
(8, 'oui', 'dwgfh', 'qzas', 10147, 2),
(9, 'oui', 'dzsf', 'SQDF', 12, 1),
(10, 'non', 'moi', 'etremoi', 100000, 1),
(11, 'non', 'ergt', 'qdfg', 147, 1),
(12, 'oui', 'test', 'moi', 45754, 10),
(13, 'oui', 'Pogba', 'Paul', 25420, 4),
(14, 'oui', 'Wilkinson', 'Johnny', 4500, 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`idcli`);

--
-- Index pour la table `entete_commande`
--
ALTER TABLE `entete_commande`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `FK_entete_commande_id_user` (`id_user`);

--
-- Index pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`id_com`,`code_prod`),
  ADD KEY `FK_contenir_code_prod` (`code_prod`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`code_prod`);

--
-- Index pour la table `prospects`
--
ALTER TABLE `prospects`
  ADD PRIMARY KEY (`idpro`);

--
-- Index pour la table `representants`
--
ALTER TABLE `representants`
  ADD PRIMARY KEY (`id_rep`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `idcli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `entete_commande`
--
ALTER TABLE `entete_commande`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `code_prod` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `prospects`
--
ALTER TABLE `prospects`
  MODIFY `idpro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `representants`
--
ALTER TABLE `representants`
  MODIFY `id_rep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `entete_commande`
--
ALTER TABLE `entete_commande`
  ADD CONSTRAINT `FK_entete_commande_id_user` FOREIGN KEY (`id_user`) REFERENCES `login` (`id_user`);

--
-- Contraintes pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD CONSTRAINT `FK_contenir_code_prod` FOREIGN KEY (`code_prod`) REFERENCES `produit` (`code_prod`),
  ADD CONSTRAINT `FK_contenir_id_com` FOREIGN KEY (`id_com`) REFERENCES `entete_commande` (`id_com`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
