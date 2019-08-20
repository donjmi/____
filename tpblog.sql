CREATE DATABASE tpblog CHARACTER SET utf8;

-- Needs to be replaced in Production with the db name of the online server
USE tpblog;
-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_post` tinyint(3) UNSIGNED DEFAULT NULL,
  `author` varchar(250) NOT NULL,
  `comment` text NOT NULL,
  `date_comment` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `id_post`, `author`, `comment`, `date_comment`) VALUES
(1, 1, 'Durant', 'c\'est une super affaire', '2019-06-30 22:00:00'),
(2, 8, 'Jordan', 'Mickael jordan tres belle paire', '2019-06-30 22:01:01'),
(3, 5, 'Williams', 'j\'adore', '2019-06-30 22:02:00'),
(4, 5, 'Jordan', 'A qd le prchain model', '2019-06-30 22:03:01'),
(5, 8, 'Durant', 'c\'est une super affaire', '2019-06-30 22:04:00'),
(6, 1, 'Jordan', 'Mickael jordan tres belle paire', '2019-06-30 22:05:01'),
(7, 8, 'Williams', 'j\'adore ce style', '2019-06-30 22:06:00'),
(8, 7, 'Jordan', 'je compte acheter la new htmlspecialchars', '2019-06-30 22:07:01'),
(9, 8, 'j', 'jj', '2019-07-28 20:03:06'),
(10, 8, 'marvin', 'doucelette', '2019-07-28 20:03:29'),
(11, 8, 'jimmy', 'arghhh', '2019-07-31 23:18:15'),
(12, 6, 'jim', 'rien à dire', '2019-07-31 23:24:10'),
(13, 8, 'serena', 'abandonne le match', '2019-08-17 01:13:29'),
(14, 8, 'serena', 'abandonne le match', '2019-08-17 15:10:59'),
(15, 7, 'marvin', 'vas y', '2019-08-17 15:48:55'),
(16, NULL, 'marvin', 'test envoi données', '2019-08-17 15:49:16'),
(17, 8, 'marvin', 'test envoi données', '2019-08-17 15:49:53'),
(18, 6, 'marvin', 'joueur de caractère j\'adore', '2019-08-17 16:03:37'),
(19, 6, 'jimmy', 'excellent match', '2019-08-18 16:51:49'),
(20, 6, 'serena', 'yes', '2019-08-18 19:10:52'),
(21, 6, 'serena', 'yes', '2019-08-18 19:24:26'),
(22, 6, 'sabine', 'test envoi', '2019-08-18 19:24:35'),
(23, 7, 'psg', 'en attente ', '2019-08-18 19:25:33'),
(24, 8, 'marvin', 'abandonne le match', '2019-08-18 21:58:44'),
(25, 8, 'marvin', 'abandonne le match', '2019-08-18 23:27:51'),
(26, 8, 'marvin', 'abandonne le match', '2019-08-18 23:27:55'),
(27, 8, 'marvin', 'abandonne le match', '2019-08-18 23:28:07'),
(28, 8, 'sabine', 'vas y', '2019-08-20 23:04:05'),
(29, 7, 'serena', 'test envoi données', '2019-08-20 23:05:57'),
(30, 7, 'serena', 'test envoi données', '2019-08-20 23:17:29'),
(31, 7, 'jimmy', 'test envoi données', '2019-08-20 23:17:35');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` varchar(250) NOT NULL,
  `date_creation` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `date_creation`) VALUES
(1, 'Sujet n°1', 'que pensez vous de PHP', '2019-06-29 22:00:00'),
(2, 'Sujet n°2', 'Openclassroom  - les cours', '2019-06-29 22:01:01'),
(3, 'Sujet n°3', 'Installation de twig', '2019-06-29 22:02:00'),
(4, 'Sujet n°4', 'Les Vacances en Martinique', '2019-06-29 22:03:01'),
(5, 'Sujet n°5', 'Les vacances en guadeloupe', '2019-06-29 22:04:00'),
(6, 'Sujet n°6', 'Nick KYRIOS joueur de tennis', '2019-06-29 22:05:01'),
(7, 'Sujet n°7', 'Ligue 1 conforama, les débuts', '2019-06-29 22:06:00'),
(8, 'Sujet n°8', 'WTA tennis, qu\'elle joueuse est la meilleure du moment', '2019-06-29 22:07:01');


-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_post` (`id_post`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_id_post` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`);
COMMIT;
