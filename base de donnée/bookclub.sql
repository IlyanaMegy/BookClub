-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 23 déc. 2021 à 16:03
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bookclub`
--

-- --------------------------------------------------------

--
-- Structure de la table `bib_perso`
--

CREATE TABLE `bib_perso` (
  `id_bib` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `note` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bib_perso`
--

INSERT INTO `bib_perso` (`id_bib`, `id_livre`, `id_membre`, `statut`, `note`) VALUES
(1, 4, 1, 'plan_to_read', NULL),
(4, 4, 1, 'plan_to_read', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

CREATE TABLE `billet` (
  `id_com` int(11) NOT NULL,
  `titre_com` varchar(255) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `date_creation` date NOT NULL,
  `pseudo_membre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `id_livre` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `editeur` varchar(255) NOT NULL,
  `resume` text NOT NULL,
  `date_parrution` date NOT NULL,
  `date_ajout` date NOT NULL,
  `date_last_update` date DEFAULT NULL,
  `id_last_update` int(11) DEFAULT NULL,
  `note` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id_livre`, `photo`, `titre`, `auteur`, `genre`, `editeur`, `resume`, `date_parrution`, `date_ajout`, `date_last_update`, `id_last_update`, `note`) VALUES
(1, '../css/images/book.jpg', 'Harry Potter à l\'école des sorciers', 'J.K. Rowling', 'non renseigné', 'Gallimard jeunesse', 'Harry Potter est un garçon ordinaire. Mais le jour de ses onze ans, son existence bascule : un géant vient le chercher pour l\'emmener dans une école de sorciers. Quel mystère entoure donc sa naissance et qui est l\'effroyable V..., le mage dont personne n\'ose prononcer le nom ? Voler à cheval sur des balais, jeter des sorts, combattre les Trolls : Harry Potter se révèle un sorcier vraiment doué. Quand il décide, avec ses amis, d\'explorer les moindres recoins de son école, il va se trouver entraîné dans d\'extraordinaires aventures. (www.payot.ch).', '2016-10-03', '2020-12-22', NULL, NULL, 0),
(2, '../css/images/book.jpg', 'Harry Potter et la Coupe de Feu', 'J.K. Rowling', 'non renseigné', 'Pottermore Publishing', '&lt;p&gt;Harry Potter a quatorze ans et entre en quatrième année au collège de Poudlard. Une grande nouvelle attend Harry, Ron et Hermione à leur arrivée : la tenue d’un tournoi de magie exceptionnel entre les plus célèbres écoles de sorcellerie. Déjà les délégations étrangères font leur entrée. Harry se réjouit... Trop vite. Il va se trouver plongé au coeur des événements les plus dramatiques qu’il ait jamais eu à affronter. Dans ce quatrième tome bouleversant, drôle, fascinant, qui révèle la richesse des enjeux en cours, Harry Potter doitfaire face et relever d’immenses défis.&lt;/p&gt;', '2015-12-08', '2020-12-22', NULL, NULL, 0),
(3, '../css/images/book.jpg', 'Harry Potter et la chambre des secrets (Serpentard)', 'J.K. Rowling', 'non renseigné', 'Editions Gallimard', 'undefined', '2019-02-07', '2022-01-01', NULL, NULL, 0),
(4, '../css/images/book.jpg', 'V pour Vendetta', '. Ygrec', 'non renseigné', 'BoD - Books on Demand', 'V pour Vendetta Vi Veri Veniversum Vivus Vici « V pour Vendetta » est un film politique, comme l’est le roman graphique dont il est tiré. Il met en scène la plus ancienne, et la plus efficace des méthodes de gouvernement : faire régner la peur. À la fois violent et drôle, « V » nous pousse à la réflexion. Ses réparties nous donneront l’occasion de nous interroger sur ce que nous sommes, sur ce que nous vivons et sur ce que nous acceptons, mais aussi sur la façon de percevoir nos traumatismes. La collection « De l’œil à l’Être » Les ouvrages de la collection ; De l’œil à l’Être sont des outils de développement personnel. Ygrec s’appuie sur les scènes et les personnages du film pour guider le lecteur dans sa quête de Sens, tout en posant un regard critique sur notre société. En devenant un support pour notre apprentissage, l\'œuvre choisie nous aide à franchir les étapes de notre cheminement intérieur.', '2016-02-08', '2022-01-15', NULL, NULL, 0),
(5, '../css/images/book.jpg', 'Capture total Matrix : Mythologie de la cyberculture', 'Michaël La Chance', 'non renseigné', 'Presses de l\'Université Laval', 'A partir de quelques films cultes du cinéma de science-fiction et des jeux vidéo, à partir d\'une réflexion philosophique sur la contestation de la réalité par les nouveaux régimes de l\'image, Capture totale : Matrix, mythologie de la cyberculture observe l\'émergence d\'une mystique du calcul qui se transforme en cauchemar eugénique. La technologie, d\'abord instrument de surveillance et de contrôle, devient une religion lorsque la recherche de la réalité nous fait plonger dans de nouveaux imaginaires de la connectivité. Lorsque le réel est devenu un cinéma permanent dont les cerveaux sont les écrans, il semble que la seule issue possible soit la dissolution dans le flux numérique. Autre issue envisageable : un cyberterrorisme qui cible les grandes corporations, une rébellion tous azimuts contre l\'Etat dénoncé comme illusion. Chaque génération aura posé la question à sa façon, à l\'occasion d\'un ouvrage philosophique ou d\'un roman : et si notre réalité n\'était qu\'une illusion? Aujourd\'hui nous rencontrons cette interrogation au cinéma et dans les productions de la cyberculture (jeux vidéo, arts technologiques, etc.). En prenant appui tout particulièrement sur la trilogie Matrix, cet ouvrage dessine les contours de la nouvelle mythologie de notre temps, celle qui relie nos expériences de la simulation et une connectivité infinie.', '2017-02-03', '2022-05-15', NULL, NULL, 0),
(6, '../css/images/book.jpg', 'Hobbit - Un Voyage Inattendu. Le Monde Des Hobbits(le)', 'Paddy Kempshall', 'non renseigné', 'Editions de la Martinière', 'undefined', '0000-00-00', '2002-05-15', NULL, NULL, 0),
(7, '../css/images/book.jpg', 'Le Seigneur des anneaux', 'John Ronald Reuel Tolkien', 'non renseigné', 'Pocket', 'La 4e de couverture indique : &quot;Frodo et ses compagnons se sont engagés à détruire l’Anneau de Pouvoir dont Sauron cherche à s’emparer pour asservir tous les peuples de la Terre habitée : Elfes et Nains, Hommes et Hobbits. L’entreprise est audacieuse et les forces du Seigneur Sombre se dressent contre eux. Bientôt, pour survivre, il va leur falloir se disperser et affronter tous les dangers.&quot;', '0000-00-00', '2012-05-15', NULL, NULL, 0),
(8, '../css/images/book.jpg', 'Les ailes d\'Alexanne', 'Anne Robillard', 'non renseigné', 'Michel Lafon Poche', '&quot;A la mort de ses parents, Alexanne Kalinovsky est confiée à sa tante Tatiana, dont elle ignorait jusqu\'alors l\'existence. Rapidement, la jeune fille constate que cette dame qui vit dans un immense manoir n\'est pas une personne ordinaire. Alexanne découvre peu à peu l\'histoire de ses origines et ses dons particuliers.&quot; (www.electre.com).', '2014-06-05', '2050-05-15', NULL, NULL, 0),
(9, '../css/images/book.jpg', 'Les animaux fantastiques', 'J.K. Rowling', 'non renseigné', 'Editions Gallimard', 'Le fabuleux bestiaire du magizoologiste Norbert Dragonneau. Cet ouvrage rassemble plus de quatre-vingts espèces fantastiques et dévoile les six animaux restés secrets depuis le voyage aux Etats-Unis de l\'explorateur. Le Boursouf, l\'Oiseau-Tonnerre ou le Womatou n\'auront plus aucun secret pour les Moldus!', '2020-01-23', '2010-12-23', NULL, NULL, 0),
(10, '../css/images/book.jpg', 'L Ickabog', 'J.K. Rowling', 'non renseigné', 'Gallimard Jeunesse', '&quot;En héritant du pouvoir de son père Richard le Droit, Fred Sans Effroi est promis à un règne facile, car dans le royaume de Cornucopia, les villes sont magnifiques et la pauvreté n\'existe pas. Ainsi, le roi vaniteux peut se contenter de sourire aux foules en laissant travailler ses conseillers et en s\'intéressant exclusivement à ses parties de chasse. Or, lorsqu\'il doit aller à la rencontre d\'un monarque, Fred demande à la meilleure couturière du royaume de lui confectionner un habit. Il entend vaguement dire que la femme est mal en point, mais il ne s\'en soucie pas. Après quelques jours de travail acharné, Mrs Doisel décède d\'épuisement. Dans les heures qui suivent, les rencontres du roi avec ses conseillers le poussent à commettre quelques maladresses liées à son embarras, mais cela suffit à diviser les opinions à son sujet. Alors que les villes du royaume adorent les nouvelles et les commérages, la rumeur d\'un monstre tueur vivant dans les marécages du nord oblige le roi Fred à se charger de cette affaire. Néanmoins, dans un monde où le monarque doit bien déléguer des tâches à des sujets, comment peut-on s\'assurer que les hommes de main seront toujours fiables? Quand un nouvel impôt garantissant une protection contre l\'Ickabog vient appauvrir les villageois, des doutes s\'installent dans l\'esprit des gens. Quatre adolescents partiront à l\'aventure afin de démêler le vrai du faux.&quot;--', '2020-01-22', '2000-12-23', NULL, NULL, 0),
(11, '../css/images/book.jpg', 'Une place à prendre', 'J.K. Rowling', 'non renseigné', 'Grasset', '&lt;p&gt;Bienvenue à Pagford, petite bourgade en apparence idyllique. Un notable meurt. Sa place est à prendre...&lt;br&gt;Comédie de mœurs, tragédie teintée d’humour noir, satire féroce de nos hypocrisies sociales et intimes, ce premier roman pour adultes révèle sous un jour inattendu un écrivain prodige.&lt;/p&gt;', '2012-09-28', '2020-12-23', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id_membre` int(11) NOT NULL,
  `pseudo_membre` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `mail_membre` varchar(255) NOT NULL,
  `mdp_membre` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id_membre`, `pseudo_membre`, `role`, `mail_membre`, `mdp_membre`, `pays`, `sex`, `age`, `date_creation`, `photo`, `bio`) VALUES
(1, 'ily', 'Membre', 'ilyana.megy@ynov.com', 'omiluk', 'FRance', 'F', 20, '2021-12-22', 'ily/ily.png', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `root`
--

CREATE TABLE `root` (
  `id_root` int(11) NOT NULL,
  `pseudo_root` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `mail_root` varchar(255) NOT NULL,
  `mdp_root` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `root`
--

INSERT INTO `root` (`id_root`, `pseudo_root`, `role`, `mail_root`, `mdp_root`, `pays`, `sex`, `age`, `date_creation`, `photo`, `bio`) VALUES
(1, 'ily_root', 'admin', 'ilyanamegy7@gmail.com', 'omiluk', 'France', 'F', 20, '2021-12-23', 'ily_root/ily_root.jpg', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bib_perso`
--
ALTER TABLE `bib_perso`
  ADD PRIMARY KEY (`id_bib`),
  ADD KEY `id_membre` (`id_membre`),
  ADD KEY `id_livre` (`id_livre`);

--
-- Index pour la table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`id_com`);

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`id_livre`),
  ADD KEY `id_last_update` (`id_last_update`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `root`
--
ALTER TABLE `root`
  ADD PRIMARY KEY (`id_root`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bib_perso`
--
ALTER TABLE `bib_perso`
  MODIFY `id_bib` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `billet`
--
ALTER TABLE `billet`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `id_livre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `root`
--
ALTER TABLE `root`
  MODIFY `id_root` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bib_perso`
--
ALTER TABLE `bib_perso`
  ADD CONSTRAINT `bib_perso_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id_membre`),
  ADD CONSTRAINT `bib_perso_ibfk_2` FOREIGN KEY (`id_livre`) REFERENCES `livres` (`id_livre`);

--
-- Contraintes pour la table `livres`
--
ALTER TABLE `livres`
  ADD CONSTRAINT `livres_ibfk_1` FOREIGN KEY (`id_last_update`) REFERENCES `root` (`id_root`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
