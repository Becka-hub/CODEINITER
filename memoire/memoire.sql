-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 24 nov. 2021 à 18:56
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `memoire`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

CREATE TABLE `achat` (
  `IDACHAT` bigint(10) NOT NULL,
  `IDPHARMACIE` bigint(10) DEFAULT NULL,
  `IDPATIENT` bigint(10) DEFAULT NULL,
  `MEDICAMENTACHAT` char(255) NOT NULL,
  `TOTALACHAT` int(11) NOT NULL,
  `ORDONANCE` char(255) NOT NULL,
  `ADRESSELIVRAISON` char(255) NOT NULL,
  `VALIDATIONACHAT` char(255) NOT NULL,
  `REPONSENONVALIDER` varchar(255) NOT NULL,
  `REFERENCEPAYEMENT` char(255) NOT NULL,
  `OPERATEURPAYEMENT` varchar(255) NOT NULL,
  `NUMEROENVOYEREFERENCE` varchar(255) NOT NULL,
  `VALIDATIONREFERENCE` char(255) NOT NULL,
  `REPONSEREFERENCEACCEPTER` varchar(255) NOT NULL,
  `REPONSENONREFERENCE` varchar(255) NOT NULL,
  `FRAISLIVRAISON` int(11) NOT NULL,
  `RECUEACHAT` char(255) NOT NULL,
  `DATEACHAT` char(255) NOT NULL,
  `STATUSACHAT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `agenda`
--

CREATE TABLE `agenda` (
  `IDAGENDA` bigint(10) NOT NULL,
  `IDCLINIQUE` bigint(10) NOT NULL,
  `DATEAGENDA` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `agenda`
--

INSERT INTO `agenda` (`IDAGENDA`, `IDCLINIQUE`, `DATEAGENDA`) VALUES
(33, 1, '2021-08-11'),
(38, 1, '2021-08-14'),
(42, 1, '2021-10-12'),
(43, 1, '2021-10-28');

-- --------------------------------------------------------

--
-- Structure de la table `clinique`
--

CREATE TABLE `clinique` (
  `IDCLINIQUE` bigint(10) NOT NULL,
  `NOMPROPRIETAIRECLINIQUE` char(255) NOT NULL,
  `PRENOMPROPRIETAIRECLINIQUE` char(255) NOT NULL,
  `ADRESSEPROPRIETAIRECLINIQUE` char(255) NOT NULL,
  `TELEPHONEPROPRIETAIRECLINIQUE` char(255) NOT NULL,
  `MAILPROPRIETAIRECLINIQUE` char(255) NOT NULL,
  `CINPROPRIETAIRECLINIQUE` char(255) NOT NULL,
  `NOMCLINIQUE` char(255) NOT NULL,
  `ADRESSECLINIQUE` char(255) NOT NULL,
  `TELEPHONECLINIQUE` char(255) NOT NULL,
  `MAILCLINIQUE` char(255) NOT NULL,
  `SPECIALISECLINIQUE` char(255) NOT NULL,
  `HEUREOUVERTURECLINIQUE` char(255) NOT NULL,
  `JOUROUVERTURECLINIQUE` char(255) NOT NULL,
  `PROVINCECLINIQUE` char(255) NOT NULL,
  `REGIONCLINIQUE` char(255) NOT NULL,
  `DISTRICTCLINIQUE` char(255) NOT NULL,
  `COMMUNECLINIQUE` char(255) NOT NULL,
  `LOGOCLINIQUE` char(255) NOT NULL,
  `MDPCLINIQUE` char(255) NOT NULL,
  `STATUSCLINIQUE` char(255) NOT NULL,
  `CODECLINIQUE` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clinique`
--

INSERT INTO `clinique` (`IDCLINIQUE`, `NOMPROPRIETAIRECLINIQUE`, `PRENOMPROPRIETAIRECLINIQUE`, `ADRESSEPROPRIETAIRECLINIQUE`, `TELEPHONEPROPRIETAIRECLINIQUE`, `MAILPROPRIETAIRECLINIQUE`, `CINPROPRIETAIRECLINIQUE`, `NOMCLINIQUE`, `ADRESSECLINIQUE`, `TELEPHONECLINIQUE`, `MAILCLINIQUE`, `SPECIALISECLINIQUE`, `HEUREOUVERTURECLINIQUE`, `JOUROUVERTURECLINIQUE`, `PROVINCECLINIQUE`, `REGIONCLINIQUE`, `DISTRICTCLINIQUE`, `COMMUNECLINIQUE`, `LOGOCLINIQUE`, `MDPCLINIQUE`, `STATUSCLINIQUE`, `CODECLINIQUE`) VALUES
(1, 'RAZAKAMALALA', 'Benja Harivelo', 'Lot TX Anosivavaka Itaosy', '03265658985', 'Benja@mail.com', '123 456 123 122', 'Dispensaire Mahomby', 'Andohalo Vr 2B', '0344545686', 'DispensaireMahomby@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '08h 00 à 16 h 30min', '7 jour / 7 jour', '1', '1', '114', '1552', 'prise-rendez-vous-smartphone-homme_23-21485763841.jpg', '27223d31f2a0e246d659447f65319b2d', 'actif', 'benja10');

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE `commune` (
  `IDCOMMUNE` bigint(10) NOT NULL,
  `NOMCOMMUNE` varchar(255) NOT NULL,
  `IDDISTRICT` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commune`
--

INSERT INTO `commune` (`IDCOMMUNE`, `NOMCOMMUNE`, `IDDISTRICT`) VALUES
(1, 'Alarobia Vatosola', 1),
(2, 'Alatsinainy Bakaro', 1),
(3, 'Ambohimiadana', 1),
(4, 'Andohariana', 1),
(5, 'Andramasina', 1),
(6, 'Anosibe Trimoloharano', 1),
(7, 'Antotohazo', 1),
(8, 'Fitsinjovana Bakaro', 1),
(9, 'Mandrosoa', 1),
(10, 'Sabotsy Ambohitromby', 1),
(11, 'Sabotsy Manjakavahoaka', 1),
(12, 'Tankafatra', 1),
(13, 'Ambato', 2),
(14, 'Ambatolampy Tsimahafotsy', 2),
(15, 'Ambohidratrimo', 2),
(16, 'Ambohimanjaka', 2),
(17, 'Ambohimpihaonana', 2),
(18, 'Ambohitrimanjaka', 2),
(19, 'Ampangabe', 2),
(20, 'Ampanotokana', 2),
(21, 'Anjanadoria', 2),
(22, 'Anosiala', 2),
(23, 'Antanetibe', 2),
(24, 'Antehiroka', 2),
(25, 'Antsahafilo', 2),
(26, 'Avaratsena', 2),
(27, 'Fiadanana', 2),
(28, 'Iarinarivo', 2),
(29, 'Ivato Aeroport', 2),
(30, 'Ivato Firaisana', 2),
(31, 'Mahabo', 2),
(32, 'Mahereza', 2),
(33, 'Mahitsy', 2),
(34, 'Mananjara', 2),
(35, 'Manjakavaradrano', 2),
(36, 'Merimandroso', 2),
(37, 'Talatamaty', 2),
(38, 'Alakamisy', 3),
(39, 'Ambatomanoina', 3),
(40, 'Amboasary', 3),
(41, 'Ambohibary', 3),
(42, 'Ambohimanarina Marovazaha', 3),
(43, 'Ambohimirary', 3),
(44, 'Ambongamarina', 3),
(45, 'Amparatanjona', 3),
(46, 'Analaroa', 3),
(47, 'Anjozorobe', 3),
(48, 'Antanetibe', 3),
(49, 'Belanitra', 3),
(50, 'Beronono', 3),
(51, 'Betatao', 3),
(52, 'Mangamila', 3),
(53, 'Marotsipoy', 3),
(54, 'Tsarasaotra Andona', 3),
(55, 'Androvakely', 3),
(56, 'Ambohitromby', 4),
(57, 'Ambolotarakely', 4),
(58, 'Ankazobe', 4),
(59, 'Antakavana', 4),
(60, 'Antotohazo', 4),
(61, 'Fiadanana', 4),
(62, 'Fihaonana', 4),
(63, 'Kiangara', 4),
(64, 'Mahavelona', 4),
(65, 'Marondry', 4),
(66, 'Miantso', 4),
(67, 'Talata-Angavo', 4),
(68, 'Tsaramasoandro', 4),
(69, 'Alakamisy Fenoarivo', 5),
(70, 'Alatsinainy Ambazaha', 5),
(71, 'Ambalavao', 5),
(72, 'Ambatofahavalo', 5),
(73, 'Ambavahaditokana', 5),
(74, 'Ambohidrapeto', 5),
(75, 'Ambohijanaka', 5),
(76, 'Ampahitrosy', 5),
(77, 'Ampanefy', 5),
(78, 'Ampitatafika', 5),
(79, 'Andoharanofotsy', 5),
(80, 'Andranonahoatra', 5),
(81, 'Androhibe', 5),
(82, 'Ankadimanga', 5),
(83, 'Ankaraobato', 5),
(84, 'Anosizato Andrefana', 5),
(85, 'Antanetikely', 5),
(86, 'Bemasoandro', 5),
(87, 'Bongatsara', 5),
(88, 'Fenoarivo', 5),
(89, 'Fiombonana', 5),
(90, 'Itaosy', 5),
(91, 'Soalandy', 5),
(92, 'Soavina', 5),
(93, 'Tanjombato', 5),
(94, 'Tsiafahy', 5),
(95, 'Alasora', 6),
(96, 'Ambohimalaza Miray', 6),
(97, 'Ambohimanambola', 6),
(98, 'Ambohimanga Rova', 6),
(99, 'Ambohimangakely', 6),
(100, 'Anjeva Gara', 6),
(101, 'Ankadikely Ilafy', 6),
(102, 'Ankadinandriana', 6),
(103, 'Fieferana', 6),
(104, 'Manandriana', 6),
(105, 'Masindray', 6),
(106, 'Sabotsy Namehana', 6),
(107, 'Talata Volonondry', 6),
(108, 'Viliahazo', 6),
(109, 'Alarobia', 7),
(110, 'Ambanitsena', 7),
(111, 'Ambatolaona', 7),
(112, 'Ambatomanga', 7),
(113, 'Ambatomena', 7),
(114, 'Ambohibao Sud', 7),
(115, 'Ambohibary', 7),
(116, 'Ambohitrandriamanitra', 7),
(117, 'Ambohitrolomahitsy', 7),
(118, 'Ambohitrony', 7),
(119, 'Ambohitseheno', 7),
(120, 'Ampaneva', 7),
(121, 'Anjepy', 7),
(122, 'Anjoma Betoho', 7),
(123, 'Ankazodandy', 7),
(124, 'Antsahalalina', 7),
(125, 'Manjakandriana', 7),
(126, 'Mantasoa', 7),
(127, 'Merikanjaka', 7),
(128, 'Miadanandriana', 7),
(129, 'Nandihizana Carion', 7),
(130, 'Ranovao', 7),
(131, 'Sadabe', 7),
(132, 'Sambaina', 7),
(133, 'Soavinandriana', 7),
(134, 'Ambatomainty Sud', 8),
(135, 'Ambohitromby', 8),
(136, 'Fenoarivo-Be', 8),
(137, 'Firavahana', 8),
(138, 'Kiranomena', 8),
(139, 'Mahajeby', 8),
(140, 'Morarano Maritampona', 8),
(141, 'Tsinjoarivo 22', 8),
(142, 'Ambalanirana', 9),
(143, 'Ambararatabe', 9),
(144, 'Ambatolampy', 9),
(145, 'Ankadinondry Sakay', 9),
(146, 'Ankerana Nord', 9),
(147, 'Anosy', 9),
(148, 'Belobaka', 9),
(149, 'Bemahatazana', 9),
(150, 'Bevato', 9),
(151, 'Fierenana', 9),
(152, 'Mahasolo', 9),
(153, 'Maroharona', 9),
(154, 'Maritampona', 9),
(155, 'Miandrarivo', 9),
(156, 'Soanierana', 9),
(157, 'Tsinjoarivo-Imanga', 9),
(158, 'Tsiroamandidy Fihaonana', 9),
(159, 'Tsiroamandidy Ville', 9),
(160, 'Alakamisikely', 10),
(161, 'Ambatomanga', 10),
(162, 'Ambatomirahavavy', 10),
(163, 'Amboanana', 10),
(164, 'Ambohimandry', 10),
(165, 'Ambohimasina', 10),
(166, 'Ambohipandrano', 10),
(167, 'Ambohitrambo', 10),
(168, 'Ampahimanga', 10),
(169, 'Andranomiely', 10),
(170, 'Antambolo', 10),
(171, 'Antenimbe', 10),
(172, 'Arivonimamo', 10),
(173, 'Arivonimamo Ii', 10),
(174, 'Imerintsiatosika', 10),
(175, 'Mahatsinjo Est', 10),
(176, 'Manalalondo', 10),
(177, 'Marofangady', 10),
(178, 'Miandrandra', 10),
(179, 'Miantsoarivo', 10),
(180, 'Morafeno', 10),
(181, 'Morarano', 10),
(182, 'Alatsinainikely', 11),
(183, 'Ambatomanjaka', 11),
(184, 'Analavory', 11),
(185, 'Andolofotsy', 11),
(186, 'Anosibe-Ifanja', 11),
(187, 'Antoby Est', 11),
(188, 'Manazary', 11),
(189, 'Mandiavato', 11),
(190, 'Miarinarivo', 11),
(191, 'Miarinarivo II', 11),
(192, 'Sarobaratra', 11),
(193, 'Soamahamanina', 11),
(194, 'Soavimbazaha', 11),
(195, 'Zoma Bealoka', 11),
(196, 'Ambatoasana Centre', 12),
(197, 'Amberomanga', 12),
(198, 'Amparaky', 12),
(199, 'Amparibohitra', 12),
(200, 'Ampary', 12),
(201, 'Ampefy', 12),
(202, 'Ankaranana', 12),
(203, 'Ankisabe', 12),
(204, 'Antanetibe', 12),
(205, 'Dondona', 12),
(206, 'Mahavelona', 12),
(207, 'Mananasy', 12),
(208, 'Masindray', 12),
(209, 'Soavinandriana', 12),
(210, 'Tamponala', 12),
(211, 'Ambatolampy', 13),
(212, 'Ambatondrakalavao', 13),
(213, 'Ambodifarihy Fenomanana', 13),
(214, 'Ambohimpihaonana', 13),
(215, 'Andranovelona', 13),
(216, 'Andravola Vohipeno', 13),
(217, 'Andriambilany', 13),
(218, 'Antakasina', 13),
(219, 'Antanamalaza', 13),
(220, 'Antanimasaka', 13),
(221, 'Antsampandrano', 13),
(222, 'Behenjy', 13),
(223, 'Belambo Firaisana', 13),
(224, 'Manjakatompo', 13),
(225, 'Morarano', 13),
(226, 'Sabotsy Namotana', 13),
(227, 'Tsiafajavona Ankaratra', 13),
(228, 'Tsinjoarivo', 13),
(229, 'Ambatolahy', 14),
(230, 'Ambatomiady', 14),
(231, 'Ambatotsipihana', 14),
(232, 'Ambodiarina', 14),
(233, 'Ambohimandroso', 14),
(234, 'Ambohitompoina', 14),
(235, 'Ampitatafika', 14),
(236, 'Andranofito', 14),
(237, 'Antanifotsy', 14),
(238, 'Antsahalava', 14),
(239, 'Antsampandrano', 14),
(240, 'Belanitra', 14),
(241, 'CU Antsirabe', 15),
(242, 'Alakamisy', 16),
(243, 'Alatsinainy Ibity', 16),
(244, 'Ambano', 16),
(245, 'Ambatomena', 16),
(246, 'Ambohibary', 16),
(247, 'Ambohidranandriana', 16),
(248, 'Ambohimiarivo', 16),
(249, 'Ambohitsimanova', 16),
(250, 'Andranomanelatra', 16),
(251, 'Antanambao', 16),
(252, 'Antanimandry', 16),
(253, 'Antsoantany', 16),
(254, 'Belazao', 16),
(255, 'Mandrosohasina', 16),
(256, 'Mangarano', 16),
(257, 'Sahanivotry Manandona', 16),
(258, 'Soanindrariny', 16),
(259, 'Tsarahonenana Sahanivotry', 16),
(260, 'Vinanikarena', 16),
(261, 'Manandona', 16),
(262, 'Alakamisy Anativato', 17),
(263, 'Alakamisy Marososona', 17),
(264, 'Alarobia Bemaha', 17),
(265, 'Ambatonikolahy', 17),
(266, 'Ambohimanambola', 17),
(267, 'Ambohimasina', 17),
(268, 'Andranomafana', 17),
(269, 'Andrembesoa', 17),
(270, 'Anosiarivo Manapa', 17),
(271, 'Antohobe', 17),
(272, 'Antsoso', 17),
(273, 'Betafo', 17),
(274, 'Inanantonana', 17),
(275, 'Mahaiza', 17),
(276, 'Mandritsara', 17),
(277, 'Manohisoa', 17),
(278, 'Soavina', 17),
(279, 'Tritriva', 17),
(280, 'Anjoma Ramartina', 18),
(281, 'Ankazomiriotra', 18),
(282, 'Antanambao Ambary', 18),
(283, 'Betsohana', 18),
(284, 'Fidirana', 18),
(285, 'Mandoto', 18),
(286, 'Vasiana', 18),
(287, 'Vinany', 18),
(288, 'Ambohiborona', 19),
(289, 'Andranomiady', 19),
(290, 'Antsampanimahazo', 19),
(291, 'Faratsiho', 19),
(292, 'Miandrarivo', 19),
(293, 'Ramainandro', 19),
(294, 'Valabetokana', 19),
(295, 'Faravohitra', 19),
(296, 'Vinaninony Sud', 19),
(297, 'Ambalahonko', 20),
(298, 'Ambodimanga Ramena', 20),
(299, 'Ambohimarina', 20),
(300, 'Ambohimena', 20),
(301, 'Anorotsangana', 20),
(302, 'Antsirabe', 20),
(303, 'Bemanevika Haut Sambirano', 20),
(304, 'Marovato', 20),
(305, 'Ankingameloka', 20),
(306, 'Ambaliha', 20),
(307, 'Ambohitrandriana', 20),
(308, 'Ankatafa', 20),
(309, 'Antafiambotry', 20),
(310, 'Antranonkarany', 20),
(311, 'Antsakoamanondro', 20),
(312, 'Antsatsaka', 20),
(313, 'Bemanevika Ouest', 20),
(314, 'Benavony', 20),
(315, 'CU Ambanja', 20),
(316, 'Djangoa', 20),
(317, 'Maevatanana', 20),
(318, 'Maherivaratra', 20),
(319, 'Marotaolana', 20),
(320, 'Anaborano Ifasy', 21),
(321, 'Antsaravibe', 21),
(322, 'Manambato', 21),
(323, 'Ambakirano', 21),
(324, 'Ambarakaraka', 21),
(325, 'Ambatoben\'anjavy', 21),
(326, 'Ambodiboanara', 21),
(327, 'Ampondralava', 21),
(328, 'Anjiabe Haut', 21),
(329, 'Antsohimbondrona', 21),
(330, 'Beramanja', 21),
(331, 'Betsiaka', 21),
(332, 'CU Ambilobe', 21),
(333, 'Mantaly', 21),
(334, 'Tanambao Marivorahona', 21),
(335, 'CU Antsiranana', 22),
(336, 'Ambondrona', 23),
(337, 'Andrafiabe', 23),
(338, 'Andranofanjava', 23),
(339, 'Andranovondronina', 23),
(340, 'Anivorano Nord', 23),
(341, 'Ankarongona', 23),
(342, 'Anketrakabe', 23),
(343, 'Antanamitarana', 23),
(344, 'Antsahampano', 23),
(345, 'Antsalaka', 23),
(346, 'Antsoha', 23),
(347, 'Bobakilandy', 23),
(348, 'Bobasakoa', 23),
(349, 'Joffre Ville', 23),
(350, 'Mahalina', 23),
(351, 'Mahavanona', 23),
(352, 'Mangaoko', 23),
(353, 'Mosorolava', 23),
(354, 'Ramena', 23),
(355, 'Sadjoavato', 23),
(356, 'Sakaramy', 23),
(357, 'CU Nosy Be', 113),
(358, 'Ambalamanasy II', 24),
(359, 'Ambodiangezoka', 24),
(360, 'Ambodimanga I', 24),
(361, 'Andapa', 24),
(362, 'Andrakata', 24),
(363, 'Andranomena', 24),
(364, 'Anjialavabe', 24),
(365, 'Ankiakabe Nord', 24),
(366, 'Anoviara', 24),
(367, 'Antsahamena', 24),
(368, 'Bealampona', 24),
(369, 'Belaoka Lokoho', 24),
(370, 'Belaoka Marovato', 24),
(371, 'Betsakotsako', 24),
(372, 'Doany', 24),
(373, 'Marovato', 24),
(374, 'Matsohely', 24),
(375, 'Tanandava', 24),
(376, 'Ambalabe', 25),
(377, 'Ambinanifaho', 25),
(378, 'Ambohitralanana', 25),
(379, 'Ampahana', 25),
(380, 'Ampanavoana', 25),
(381, 'Ampohibe', 25),
(382, 'Andampy', 25),
(383, 'Antalaha', 25),
(384, 'Antananambo', 25),
(385, 'Antombana', 25),
(386, 'Antsahanoro', 25),
(387, 'Antsambalahy', 25),
(388, 'Lanjarivo', 25),
(389, 'Marofinaritra', 25),
(390, 'Manakambahiny', 25),
(391, 'Sarahandrano', 25),
(392, 'Vinanivao', 25),
(393, 'Ambatoafo', 26),
(394, 'Amboangibe', 26),
(395, 'Ambodiampana', 26),
(396, 'Ambodivoara', 26),
(397, 'Ambohimalaza', 26),
(398, 'Ambohimitsinjo', 26),
(399, 'Analamaho', 26),
(400, 'Andrahanjo', 26),
(401, 'Andratamarina', 26),
(402, 'Andrembona', 26),
(403, 'Anjangoveratra', 26),
(404, 'Anjialava', 26),
(405, 'Anjinjaomby', 26),
(406, 'Antindra', 26),
(407, 'Antsahavaribe', 26),
(408, 'Antsambaharo', 26),
(409, 'Bemanevika', 26),
(410, 'Bevonotra', 26),
(411, 'Farahalana', 26),
(412, 'Maroambihy', 26),
(413, 'Marogaona', 26),
(414, 'Marojala', 26),
(415, 'Morafeno', 26),
(416, 'Nosiarina', 26),
(417, 'CU Sambava', 26),
(418, 'Tanambao Daoud', 26),
(419, 'Ambalasatrana', 27),
(420, 'Ambinan\'andravory', 27),
(421, 'Ambodisambalahy', 27),
(422, 'Amboriala', 27),
(423, 'Ampanefena', 27),
(424, 'Ampisikina', 27),
(425, 'Ampondra', 27),
(426, 'Andrafainkona', 27),
(427, 'Andravory', 27),
(428, 'Antsirabe Nord', 27),
(429, 'Belambo', 27),
(430, 'Bobakindro', 27),
(431, 'Daraina', 27),
(432, 'Fanambana', 27),
(433, 'Maromokotra Loky', 27),
(434, 'Milanoa', 27),
(435, 'Nosibe', 27),
(436, 'Tsarabaria', 27),
(437, 'Vohemar', 27),
(438, 'Ambalavao', 28),
(439, 'Ambinanindovoka', 28),
(440, 'Ambinaniroa', 28),
(441, 'Ambohimahamasina', 28),
(442, 'Ambohimandroso', 28),
(443, 'Andrainjato', 28),
(444, 'Anjoma', 28),
(445, 'Ankaramena', 28),
(446, 'Besoa', 28),
(447, 'Fenoarivo', 28),
(448, 'Iarintsena', 28),
(449, 'Kirano', 28),
(450, 'Mahazony', 28),
(451, 'Manamisoa', 28),
(452, 'Miarinarivo', 28),
(453, 'Sendrisoa', 28),
(454, 'Vohitsaoka', 28),
(455, 'Ambalakindresy', 29),
(456, 'Ambatosoa', 29),
(457, 'Ambohimahasoa', 29),
(458, 'Ambohinamboarina', 29),
(459, 'Ampitana', 29),
(460, 'Ankafina Tsarafidy', 29),
(461, 'Ankerana', 29),
(462, 'Befeta', 29),
(463, 'Camp Robin', 29),
(464, 'Fiadanana', 29),
(465, 'Isaka', 29),
(466, 'Kalalao', 29),
(467, 'Manandroy', 29),
(468, 'Morafeno', 29),
(469, 'Sahatona', 29),
(470, 'Sahave', 29),
(471, 'Vohiposa', 29),
(472, 'Vohitrarivo', 29),
(473, 'CU Fianarantsoa', 30),
(474, 'Ambatomainty', 31),
(475, 'Fitampito', 31),
(476, 'Ikalamavony', 31),
(477, 'Mangind.Y', 31),
(478, 'Solila', 31),
(479, 'Tanamarina Bekisopa', 31),
(480, 'Tananamarina Sakay', 31),
(481, 'Tsitondroina', 31),
(482, 'Alakamisy Ambohimaha', 32),
(483, 'Alatsinainy Ialamarina', 32),
(484, 'Ambalakely', 32),
(485, 'Ambalamahasoa', 32),
(486, 'Andrainjato Centre', 32),
(487, 'Andrainjato Est', 32),
(488, 'Androy', 32),
(489, 'Fandradava', 32),
(490, 'Ialananindro', 32),
(491, 'Ivoamba', 32),
(492, 'Mahatsinjony', 32),
(493, 'Sahambavy', 32),
(494, 'Taindambo', 32),
(495, 'Ambalamindera II', 33),
(496, 'Ambondrona', 33),
(497, 'Andoharanomaintso', 33),
(498, 'Anjoma Itsara', 33),
(499, 'Ankarinarivo Manirisoa', 33),
(500, 'Fanjakana', 33),
(501, 'Isorana', 33),
(502, 'Mahazoarivo', 33),
(503, 'Nasandratrony', 33),
(504, 'Soatanana', 33),
(505, 'Vohibola', 33),
(506, 'Alakamisy Itenina', 34),
(507, 'Andranomind.Itra', 34),
(508, 'Andranovorivato', 34),
(509, 'Ankaromalaza Mifanasoa', 34),
(510, 'Ihazoara', 34),
(511, 'Mahaditra', 34),
(512, 'Mahasoabe', 34),
(513, 'Maneva', 34),
(514, 'Soaindrana', 34),
(515, 'Talata Ampano', 34),
(516, 'Vinanitelo', 34),
(517, 'Vohibato Ouest', 34),
(518, 'Vohimarina Lamosina', 34),
(519, 'Vohitrafeno', 34),
(520, 'Ambatomifangoa', 35),
(521, 'Ambondromisotra', 35),
(522, 'Amborompotsy', 35),
(523, 'Ambotofinandrahana', 35),
(524, 'Fenoarivo', 35),
(525, 'Itremo', 35),
(526, 'Mandrosonoro', 35),
(527, 'Mangataboahangy', 35),
(528, 'Soavina', 35),
(529, 'Alakamisy Ambohijatovo', 36),
(530, 'Ambalamanakana', 36),
(531, 'Ambatofitorahana', 36),
(532, 'Ambinaninandro', 36),
(533, 'Ambohimitombo I', 36),
(534, 'Ambohimitombo II', 36),
(535, 'CU Ambositra', 36),
(536, 'Ambositra II', 36),
(537, 'Andina', 36),
(538, 'Ankazoambo', 36),
(539, 'Antoetra', 36),
(540, 'Fahizay', 36),
(541, 'Ihadilanana', 36),
(542, 'Ilaka Centre', 36),
(543, 'Imerina Imady', 36),
(544, 'Ivato Centre', 36),
(545, 'Ivony Miara-Miasa', 36),
(546, 'Kianjandrakefina', 36),
(547, 'Mahazina Ambohipierenana', 36),
(548, 'Marosoa', 36),
(549, 'Sahatsiho Ambohimanjaka', 36),
(550, 'Tsarasaotra', 36),
(551, 'Vohidahy', 36),
(552, 'Alakamisy Ambohimahazo', 37),
(553, 'Ankarinoro', 37),
(554, 'Betsimisotra', 37),
(555, 'Fandriana', 37),
(556, 'Fiadanana', 37),
(557, 'Imito', 37),
(558, 'Mahazoarivo', 37),
(559, 'Miarinavaratra', 37),
(560, 'Milamina', 37),
(561, 'Sahamadio', 37),
(562, 'Sandrandahy', 37),
(563, 'Tatamalaza', 37),
(564, 'Tsarazaza', 37),
(565, 'Ambatomarina', 38),
(566, 'Ambohimahazo', 38),
(567, 'Ambohimilanja', 38),
(568, 'Ambohipo', 38),
(569, 'Ambovombe Centre', 38),
(570, 'Andakatany', 38),
(571, 'Anjoma Nandihizana', 38),
(572, 'Anjoman’ankona', 38),
(573, 'Talata Vohimena', 38),
(574, 'Vinany Andakantanikely', 38),
(575, 'Begogo', 39),
(576, 'Iakora', 39),
(577, 'Ranotsara Nord', 39),
(578, 'Ambatolahy', 40),
(579, 'Ambia', 40),
(580, 'Analaliry', 40),
(581, 'Analavoka', 40),
(582, 'Andioalava', 40),
(583, 'Ankily', 40),
(584, 'Antsoha', 40),
(585, 'CU Ihosy', 40),
(586, 'Ilakaka', 40),
(587, 'Irina', 40),
(588, 'Mahasoa', 40),
(589, 'Menamaty Iloto', 40),
(590, 'Ranohira', 40),
(591, 'Sahambano', 40),
(592, 'Sakalalina', 40),
(593, 'Satrokala', 40),
(594, 'Soamatasy', 40),
(595, 'Tolohomiady', 40),
(596, 'Zazafotsy', 40),
(597, 'Antambohobe', 41),
(598, 'Ivohibe', 41),
(599, 'Ivongo', 41),
(600, 'Maropaika', 41),
(601, 'Antaninarenina', 42),
(602, 'Antondabe', 42),
(603, 'Befotaka Sud', 42),
(604, 'Beharena', 42),
(605, 'Bekofafa Sud', 42),
(606, 'Marovitsika Sud', 42),
(607, 'Ranotsara Sud', 42),
(608, 'Ambalatany', 43),
(609, 'Ambalavato Antevato', 43),
(610, 'Ambalavato Nord', 43),
(611, 'Ambohigogo', 43),
(612, 'Ambohimandroso', 43),
(613, 'Amporoforo', 43),
(614, 'Ankarana', 43),
(615, 'Anosivelo', 43),
(616, 'Anosy Tsararafa', 43),
(617, 'Antsiranambe', 43),
(618, 'Bevoay Beretra', 43),
(619, 'Efatsy', 43),
(620, 'Etrotroka', 43),
(621, 'Evato', 43),
(622, 'CU Farafangana', 43),
(623, 'Fenoarivo', 43),
(624, 'Iabohazo', 43),
(625, 'Ihorombe', 43),
(626, 'Ivandrika', 43),
(627, 'Mahabo Mananivo', 43),
(628, 'Mahafasa', 43),
(629, 'Mahavelo', 43),
(630, 'Maheriraty', 43),
(631, 'Manambotra Sud', 43),
(632, 'Marovandrika', 43),
(633, 'Namohora Iaborano', 43),
(634, 'Sahamadio', 43),
(635, 'Tangainony', 43),
(636, 'Tovona', 43),
(637, 'Vohilengo', 43),
(638, 'Vohimasy', 43),
(639, 'Vohitromby', 43),
(640, 'Andranolalina', 44),
(641, 'Ankazovelo', 44),
(642, 'Ivondro', 44),
(643, 'Maliorano', 44),
(644, 'Soakibany', 44),
(645, 'Nosifeno', 44),
(646, 'Ambatolava', 45),
(647, 'Ambongo', 45),
(648, 'Amparihy Est', 45),
(649, 'Ampasimalemy', 45),
(650, 'Ampataka', 45),
(651, 'Anilobe', 45),
(652, 'Bekaraoky', 45),
(653, 'Bema', 45),
(654, 'Bevata', 45),
(655, 'Fenoambany', 45),
(656, 'Iara', 45),
(657, 'Isahara', 45),
(658, 'Karimbary', 45),
(659, 'Lohafary', 45),
(660, 'Lopary', 45),
(661, 'Manambondro', 45),
(662, 'Marokibo', 45),
(663, 'Masianaka', 45),
(664, 'Matanga', 45),
(665, 'Ranomena', 45),
(666, 'Sandravinany', 45),
(667, 'Soamanova', 45),
(668, 'Tsianofana', 45),
(669, 'Tsiately', 45),
(670, 'CU Vangaindrano', 45),
(671, 'Vatanato', 45),
(672, 'Vohimalaza', 45),
(673, 'Vohipaho', 45),
(674, 'Vohitrambo', 45),
(675, 'Ambohimanana', 46),
(676, 'Anandravy', 46),
(677, 'Andakana', 46),
(678, 'Antokonala', 46),
(679, 'Iamonta', 46),
(680, 'Ivato', 46),
(681, 'Karianga', 46),
(682, 'Mahatsinjo', 46),
(683, 'Mahavelo', 46),
(684, 'Mahazoarivo', 46),
(685, 'Manambidala', 46),
(686, 'Manato', 46),
(687, 'Maroteza', 46),
(688, 'Vohiboreka', 46),
(689, 'Vohimary', 46),
(690, 'Vondrozo', 46),
(691, 'Ambohimanga Sud', 47),
(692, 'Ambohimiera', 47),
(693, 'Analampasina', 47),
(694, 'Androrangavola', 47),
(695, 'Antaretra', 47),
(696, 'Antsindra', 47),
(697, 'Fasintsara', 47),
(698, 'Ifanadiana', 47),
(699, 'Kelilalina', 47),
(700, 'Maroharatra', 47),
(701, 'Marotoko', 47),
(702, 'Ranomafana', 47),
(703, 'Tsaratanana', 47),
(704, 'Ambatofotsy', 48),
(705, 'Ambinanitromby', 48),
(706, 'Ambohimisafy', 48),
(707, 'Ambolomadinika', 48),
(708, 'Ankarimbelo', 48),
(709, 'Antondinga', 48),
(710, 'Belemoka', 48),
(711, 'Ifanirea', 48),
(712, 'Ikongo', 48),
(713, 'Kalafotsy', 48),
(714, 'Manampatrana', 48),
(715, 'Maromiandra', 48),
(716, 'Maromiandra', 48),
(717, 'Sahalanona', 48),
(718, 'Tanakamba', 48),
(719, 'Tolongoina', 48),
(720, 'Ambahatrazo', 49),
(721, 'Ambahive', 49),
(722, 'Ambalaroka', 49),
(723, 'Ambalavero', 49),
(724, 'Ambandrika', 49),
(725, 'Ambila', 49),
(726, 'Amboanjo', 49),
(727, 'Ambohitsara M', 49),
(728, 'Amborondra', 49),
(729, 'Ambotaka', 49),
(730, 'Ampasimanjeva', 49),
(731, 'Ampasimboraka', 49),
(732, 'Ampasimpotsy Sud', 49),
(733, 'Analavory', 49),
(734, 'Anorombato', 49),
(735, 'Anteza', 49),
(736, 'Bekatra', 49),
(737, 'Betampona', 49),
(738, 'Fenomby', 49),
(739, 'Kianjanomby', 49),
(740, 'Lokomby', 49),
(741, 'Mahabako', 49),
(742, 'Mahamaibe', 49),
(743, 'Cu Manakara', 49),
(744, 'Mangatsiotra', 49),
(745, 'Marofarihy', 49),
(746, 'Mavorano', 49),
(747, 'Mitanty', 49),
(748, 'Mizilo', 49),
(749, 'Nihaonana', 49),
(750, 'Nosiala', 49),
(751, 'Onilahy', 49),
(752, 'Sahanambohitra', 49),
(753, 'Saharefo', 49),
(754, 'Sahasinaka', 49),
(755, 'Sakoana', 49),
(756, 'Sorombo', 49),
(757, 'Tataho', 49),
(758, 'Vatana', 49),
(759, 'Vinanitelo', 49),
(760, 'Vohilava', 49),
(761, 'Vohimanitra', 49),
(762, 'Vohimasina Nord', 49),
(763, 'Vohimasina Sud', 49),
(764, 'Vohimasy', 49),
(765, 'Ambalahosy Nord', 50),
(766, 'Ambodinonoka', 50),
(767, 'Ambohimiarina II', 50),
(768, 'Ambohinihaonana', 50),
(769, 'Ambohitsara Est', 50),
(770, 'Andonabe', 50),
(771, 'Andragnambolava', 50),
(772, 'Andranomavo', 50),
(773, 'Ankatafana', 50),
(774, 'Anosimparihy', 50),
(775, 'Antaretra', 50),
(776, 'Antsenavolo', 50),
(777, 'Kianjavato', 50),
(778, 'Mahatsara Iefaka', 50),
(779, 'Mahatsara Sud', 50),
(780, 'Mahavoky Nord', 50),
(781, 'Mahela', 50),
(782, 'Manakana Nord', 50),
(783, 'Mananjary', 50),
(784, 'Marofototra', 50),
(785, 'Marokarima', 50),
(786, 'Marosangy', 50),
(787, 'Morafeno', 50),
(788, 'Namorona', 50),
(789, 'Sandrohy', 50),
(790, 'Tsaravary', 50),
(791, 'Tsiatosika', 50),
(792, 'Vatohandrina', 50),
(793, 'Vohilava', 50),
(794, 'Ambahy', 51),
(795, 'Ambakobe', 51),
(796, 'Ambodiara', 51),
(797, 'Ambodilafa', 51),
(798, 'Ambodirian\'i Sahafary', 51),
(799, 'Ampasinambo', 51),
(800, 'Andara', 51),
(801, 'Androrangavola', 51),
(802, 'Angodongodona', 51),
(803, 'Antanambao', 51),
(804, 'Befody', 51),
(805, 'Fiadanana', 51),
(806, 'Nosy Varika', 51),
(807, 'Sahavato', 51),
(808, 'Soavina', 51),
(809, 'Vohidroa', 51),
(810, 'Vohilava', 51),
(811, 'Vohitrandriana', 51),
(812, 'Andemaka', 52),
(813, 'Ankarimbary', 52),
(814, 'Anoloka', 52),
(815, 'Antananabo', 52),
(816, 'Ifatsy', 52),
(817, 'Ilakatra', 52),
(818, 'Ivato', 52),
(819, 'Lanivo', 52),
(820, 'Mahabo', 52),
(821, 'Mahasoabe', 52),
(822, 'Mahazoarivo', 52),
(823, 'Nato', 52),
(824, 'Onjatsy', 52),
(825, 'Sahalava', 52),
(826, 'Savana', 52),
(827, 'Vohilany', 52),
(828, 'Vohindava', 52),
(829, 'Vohipeno', 52),
(830, 'Vohitrindry', 52),
(831, 'Ambato Ambarimay', 53),
(832, 'Ambondromamy', 53),
(833, 'Andranofasika', 53),
(834, 'Andranomamy', 53),
(835, 'Anjiajia', 53),
(836, 'Ankijabe', 53),
(837, 'Ankirihitra', 53),
(838, 'Madirovalo', 53),
(839, 'Manerinerina', 53),
(840, 'Sitampiky', 53),
(841, 'Tsaramandroso', 53),
(842, 'CU Mahajanga', 54),
(843, 'Ambalabe Befanjava', 55),
(844, 'Ambalakida', 55),
(845, 'Andranoboboka', 55),
(846, 'Bekobay Centre', 55),
(847, 'Belobaka', 55),
(848, 'Betsako', 55),
(849, 'Boanamary', 55),
(850, 'Mahajamba Usine', 55),
(851, 'Mariarano', 55),
(852, 'Ambolomoty', 56),
(853, 'Ankaraobato', 56),
(854, 'Ankazomborona', 56),
(855, 'Anosinalainolona', 56),
(856, 'Antanambao Andranolava', 56),
(857, 'Antanimasaka', 56),
(858, 'Bemaharivo', 56),
(859, 'Manaratsandry', 56),
(860, 'Marosakoa', 56),
(861, 'Marovoay Banlieue', 56),
(862, 'CU Marovoay', 56),
(863, 'Tsararano', 56),
(864, 'Ambarimaninga', 57),
(865, 'Antongomena Bevary', 57),
(866, 'Antseza', 57),
(867, 'Bekipay', 57),
(868, 'Katsepy', 57),
(869, 'Matsaka Banja', 57),
(870, 'Mitsinjo', 57),
(871, 'Ambohipaky', 58),
(872, 'Andranomavo', 58),
(873, 'Soalala', 58),
(874, 'Ambaliha', 59),
(875, 'Andasibe', 59),
(876, 'Antanimbaribe', 59),
(877, 'Behazomaty', 59),
(878, 'Betaimboay', 59),
(879, 'Kandreho', 59),
(880, 'Ambalajia', 60),
(881, 'Ambalanjanakomby', 60),
(882, 'Andriba', 60),
(883, 'Antanimbary', 60),
(884, 'Antsiafabositra', 60),
(885, 'Bemokotra', 60),
(886, 'Beratsimanina', 60),
(887, 'Madiromirafy', 60),
(888, 'Maevatanana I', 60),
(889, 'Maevatanana II', 60),
(890, 'Mahatsinjo', 60),
(891, 'Mahazoma', 60),
(892, 'Mangabe', 60),
(893, 'Maria', 60),
(894, 'Marokoro', 60),
(895, 'Morafeno', 60),
(896, 'Tsararano', 60),
(897, 'Ambakireny', 61),
(898, 'Ampandrana', 61),
(899, 'Andriamena', 61),
(900, 'Bekapaika', 61),
(901, 'Betrandraka', 61),
(902, 'Brieville', 61),
(903, 'Keliloha', 61),
(904, 'Manakana', 61),
(905, 'Sakoamadinika', 61),
(906, 'Sarobaratra', 61),
(907, 'Tsararova', 61),
(908, 'Tsaratanana', 61),
(909, 'Ambatomainty', 62),
(910, 'Bemarivo', 62),
(911, 'Marotsialeha', 62),
(912, 'Sarodrano', 62),
(913, 'Antsalova', 63),
(914, 'Bekopaka', 63),
(915, 'Masoarivo', 63),
(916, 'Soahany', 63),
(917, 'Trangahy', 63),
(918, 'Ambolodia Sud', 64),
(919, 'Ampako', 64),
(920, 'Ankasakasa', 64),
(921, 'Bekodoka', 64),
(922, 'Besalampy', 64),
(923, 'Mahabe', 64),
(924, 'Marovoay Sud', 64),
(925, 'Soanenga', 64),
(926, 'Andabotoka', 65),
(927, 'Andranovao', 65),
(928, 'Andrea', 65),
(929, 'Ankisatra', 65),
(930, 'Antsaidoha Bebao', 65),
(931, 'Antsondrondava', 65),
(932, 'Bebaboka Sud', 65),
(933, 'Belitsaky', 65),
(934, 'Bemokotra', 65),
(935, 'Berevo Ranobe', 65),
(936, 'Betanatanana', 65),
(937, 'Mafaijijo', 65),
(938, 'Maintirano Cu', 65),
(939, 'Marohazo', 65),
(940, 'Maromavo', 65),
(941, 'Tambohorano', 65),
(942, 'Veromanga', 65),
(943, 'Andramy', 66),
(944, 'Beravina', 66),
(945, 'Morafenobe', 66),
(946, 'Ambaliha', 67),
(947, 'Ambarijeby Sud', 67),
(948, 'Ambolobozo', 67),
(949, 'Analalava', 67),
(950, 'Andribavontsina', 67),
(951, 'Angoaka Sud', 67),
(952, 'Ankaramy', 67),
(953, 'Antonibe', 67),
(954, 'Befotaka Nord', 67),
(955, 'Mahadrodroka', 67),
(956, 'Maromandia', 67),
(957, 'Marovantaza', 67),
(958, 'Marovatolena', 67),
(959, 'Ambodimadiro', 68),
(960, 'Ambodimanary', 68),
(961, 'Ambodimandresy', 68),
(962, 'Ampandriakilandy', 68),
(963, 'Anahidrano', 68),
(964, 'Andreba', 68),
(965, 'Anjalazala', 68),
(966, 'Anjiamangirana', 68),
(967, 'Ankerika', 68),
(968, 'Antsahabe', 68),
(969, 'Antsohihy', 68),
(970, 'Maroala', 68),
(971, 'Ambalaromba', 69),
(972, 'Ambararata Sofia', 69),
(973, 'Ambararatabe Nord', 69),
(974, 'Ambatoriha Est', 69),
(975, 'Ambatosia', 69),
(976, 'Ambodiadabo M', 69),
(977, 'Ambodiampana', 69),
(978, 'Ambodisikidy', 69),
(979, 'Ambovonomby', 69),
(980, 'Analila', 69),
(981, 'Anjoromadosy', 69),
(982, 'Ankazotokana', 69),
(983, 'Antananarivo Haut', 69),
(984, 'Antsamaka', 69),
(985, 'Bealanana', 69),
(986, 'Beandrarezona', 69),
(987, 'Mangindrano', 69),
(988, 'Marotolana', 69),
(989, 'Ambararata', 70),
(990, 'Ambodimotso Sud', 70),
(991, 'Ambolidibe Est', 70),
(992, 'Ankarongana', 70),
(993, 'Antsakabary', 70),
(994, 'Antsakanalabe', 70),
(995, 'Befandriana Nord', 70),
(996, 'Maroamalona', 70),
(997, 'Matsondakana', 70),
(998, 'Morafeno', 70),
(999, 'Tsarahonenana', 70),
(1000, 'Tsiamalao', 70),
(1001, 'Ambodihazoambo', 71),
(1002, 'Ambohitoaka', 71),
(1003, 'Ampasimatera', 71),
(1004, 'Ankiririky', 71),
(1005, 'Bekoratsaka', 71),
(1006, 'Betaramahamay', 71),
(1007, 'Komajia', 71),
(1008, 'Malakialina', 71),
(1009, 'Mampikony', 71),
(1010, 'Mampikony II', 71),
(1011, 'Ambalakirajy', 72),
(1012, 'Ambarikorano', 72),
(1013, 'Ambaripaika', 72),
(1014, 'Ambilombe', 72),
(1015, 'Amboaboa', 72),
(1016, 'Ambodiadabo', 72),
(1017, 'Ambodiamontana Kianga', 72),
(1018, 'Ambohisoa', 72),
(1019, 'Amborondolo', 72),
(1020, 'Ampatakamaroreny', 72),
(1021, 'Andohajango', 72),
(1022, 'Andratamarina', 72),
(1023, 'Anjiabe', 72),
(1024, 'Ankiabe Salohy', 72),
(1025, 'Ankiakabe Fonoko', 72),
(1026, 'Antanambaon\'amberina', 72),
(1027, 'Antanandava', 72),
(1028, 'Antsatramidola', 72),
(1029, 'Antsiatsiaka', 72),
(1030, 'Antsirabe Centre', 72),
(1031, 'Antsoha', 72),
(1032, 'Kalandy', 72),
(1033, 'Manampaneva', 72),
(1034, 'Mandritsara', 72),
(1035, 'Marotandrano', 72),
(1036, 'Pont Sofia', 72),
(1037, 'Tsarajomoko', 72),
(1038, 'Tsaratanana', 72),
(1039, 'Ambanjabe', 73),
(1040, 'Ambodimahabibo', 73),
(1041, 'Ambodisakoana', 73),
(1042, 'Ambodivongo', 73),
(1043, 'Amparihy', 73),
(1044, 'Andranomeva', 73),
(1045, 'Leanja', 73),
(1046, 'Mahevaranohely', 73),
(1047, 'Marovato', 73),
(1048, 'Port Berge I', 73),
(1049, 'Port-Berge II', 73),
(1050, 'Tsarahasina', 73),
(1051, 'Tsaratanana I', 73),
(1052, 'Tsiningia', 73),
(1053, 'Tsinjomitondraka', 73),
(1054, 'Antanambao Manampotsy', 74),
(1055, 'Antanandehibe', 74),
(1056, 'Mahela', 74),
(1057, 'Manakana', 74),
(1058, 'Saivaza', 74),
(1059, 'Ambalarondra', 75),
(1060, 'Ambinaninony', 75),
(1061, 'Ambohimanana', 75),
(1062, 'Ampasimbe', 75),
(1063, 'Andekaleka', 75),
(1064, 'Andevoranto', 75),
(1065, 'Anivorano Est', 75),
(1066, 'Anjahamana', 75),
(1067, 'Brickaville', 75),
(1068, 'Fanasana', 75),
(1069, 'Fetraomby', 75),
(1070, 'Lohariandava', 75),
(1071, 'Mahatsara', 75),
(1072, 'Maroseranana', 75),
(1073, 'Ranomafana Est', 75),
(1074, 'Razanaka', 75),
(1075, 'Vohitranivona', 75),
(1076, 'Ambinanidilana', 76),
(1077, 'Ambinanindrano', 76),
(1078, 'Ambodiboanara', 76),
(1079, 'Ambodiharina', 76),
(1080, 'Ankazotsifantatra', 76),
(1081, 'Befotaka', 76),
(1082, 'Betsizaraina', 76),
(1083, 'Mahanoro', 76),
(1084, 'Manjakandriana', 76),
(1085, 'Masomeloka', 76),
(1086, 'Tsaravinany', 76),
(1087, 'Ambalapaiso II', 77),
(1088, 'Ambatofisaka II', 77),
(1089, 'Amboasary', 77),
(1090, 'Ambodinonoka', 77),
(1091, 'Ambodivoahangy', 77),
(1092, 'Ambohimilanja', 77),
(1093, 'Andodabe Sud', 77),
(1094, 'Androrangavola', 77),
(1095, 'Anosiarivo', 77),
(1096, 'Betampona', 77),
(1097, 'Lohavanana', 77),
(1098, 'Marolambo', 77),
(1099, 'Sahakevo', 77),
(1100, 'Tanambao Rabemanana', 77),
(1101, 'CU Toamasina', 78),
(1102, 'Ambodilazana', 79),
(1103, 'Ambodiriana', 79),
(1104, 'Amboditandroho', 79),
(1105, 'Ampasimadinika', 79),
(1106, 'Ampasimbe Onibe', 79),
(1107, 'Ampisokiana', 79),
(1108, 'Amporoforo', 79),
(1109, 'Andondabe', 79),
(1110, 'Andranobolaha', 79),
(1111, 'Antenina', 79),
(1112, 'Antetezambaro', 79),
(1113, 'Fanandrana', 79),
(1114, 'Fito', 79),
(1115, 'Foulpointe', 79),
(1116, 'Mangabe', 79),
(1117, 'Sahambala', 79),
(1118, 'Toamasina Suburbaine', 79),
(1119, 'Ambalabe', 80),
(1120, 'Ambalavolo', 80),
(1121, 'Amboditavolo', 80),
(1122, 'Ambodivoananto', 80),
(1123, 'Ampasimadinika', 80),
(1124, 'Ampasimazava', 80),
(1125, 'Antanambao Mahatsara', 80),
(1126, 'Iamborano', 80),
(1127, 'Ifasina I', 80),
(1128, 'Ifasina II', 80),
(1129, 'Ilaka Est', 80),
(1130, 'Maintinandry', 80),
(1131, 'Niarovana Caroline', 80),
(1132, 'Niherenana', 80),
(1133, 'Sahamatevina', 80),
(1134, 'Tanambao Vahatrakaka', 80),
(1135, 'Tsarasambo', 80),
(1136, 'Tsivangiana', 80),
(1137, 'CU Vatomandry', 80),
(1138, 'Ambatoharanana', 81),
(1139, 'Ambodimanga II', 81),
(1140, 'Ampasimbe Manantsantrana', 81),
(1141, 'Ampasina Maningoro', 81),
(1142, 'Antsiatsiaka', 81),
(1143, 'Fenerive Ville', 81),
(1144, 'Mahambo', 81),
(1145, 'Mahanoro', 81),
(1146, 'Miorimivalana', 81),
(1147, 'Saranambana', 81),
(1148, 'Vohilengo', 81),
(1149, 'Vohipeno', 81),
(1150, 'Ambatoharanana', 82),
(1151, 'Ambodiampana', 82),
(1152, 'Ambodivoanio', 82),
(1153, 'Andasibe', 82),
(1154, 'Antanambaobe', 82),
(1155, 'Antanambe', 82),
(1156, 'Antananivo', 82),
(1157, 'Imorona', 82),
(1158, 'Manambolosy', 82),
(1159, 'Mananara Nord', 82),
(1160, 'Sandrakatsy', 82),
(1161, 'Saromaona', 82),
(1162, 'Tanibe', 82),
(1163, 'Vanono', 82),
(1164, 'Ambanizana', 83),
(1165, 'Ambinanitelo', 83),
(1166, 'Ambodimanga Rantabe', 83),
(1167, 'Anandrivola', 83),
(1168, 'Andranofotsy', 83),
(1169, 'Androndrona', 83),
(1170, 'Anjahana', 83),
(1171, 'Anjanazana', 83),
(1172, 'Ankofa', 83),
(1173, 'Ankofabe', 83),
(1174, 'Antakotako', 83),
(1175, 'Antsirabe Sahatany', 83),
(1176, 'Mahavelona', 83),
(1177, 'Manambolo', 83),
(1178, 'Maroantsetra', 83),
(1179, 'Morafeno', 83),
(1180, 'Rantabe', 83),
(1181, 'Voloina', 83),
(1182, 'CU Sainta-Marie', 84),
(1183, 'Ambahoambe', 85),
(1184, 'Ambodiampana', 85),
(1185, 'Andapafito', 85),
(1186, 'Antanifotsy', 85),
(1187, 'Antenina', 85),
(1188, 'Fotsialanana', 85),
(1189, 'Manompana', 85),
(1190, 'Soanierana Ivongo', 85),
(1191, 'Ambatoharanana', 86),
(1192, 'Ambodimangavalo', 86),
(1193, 'Ambohibe', 86),
(1194, 'Ampasimazava', 86),
(1195, 'Andasibe', 86),
(1196, 'Anjahambe', 86),
(1197, 'Maromitety', 86),
(1198, 'Miarinarivo', 86),
(1199, 'Sahatavy', 86),
(1200, 'Vavatenina', 86),
(1201, 'Ambandrika', 87),
(1202, 'Ambatondrazaka', 87),
(1203, 'Ambatondrazaka Suburbaine', 87),
(1204, 'Ambatosoratra', 87),
(1205, 'Ambohitsilaozana', 87),
(1206, 'Amparihintsokatra', 87),
(1207, 'Ampitatsimo', 87),
(1208, 'Andilanatoby', 87),
(1209, 'Andromba', 87),
(1210, 'Antanandava', 87),
(1211, 'Antsangasanga', 87),
(1212, 'Bejofo', 87),
(1213, 'Didy', 87),
(1214, 'Feramanga Nord', 87),
(1215, 'Ilafy', 87),
(1216, 'Imerimandroso', 87),
(1217, 'Manakambahiny Est', 87),
(1218, 'Manakambahiny Ouest', 87),
(1219, 'Soalazaina', 87),
(1220, 'Tanambao Besakay', 87),
(1221, 'Ambatomainty', 88),
(1222, 'Amboavory', 88),
(1223, 'Ambodimanga', 88),
(1224, 'Ambohijanahary', 88),
(1225, 'Ambohimandroso I', 88),
(1226, 'Ambohitrarivo', 88),
(1227, 'Amparafaravola', 88),
(1228, 'Ampasikely', 88),
(1229, 'Andilana Nord', 88),
(1230, 'Andrebakely Sud', 88),
(1231, 'Andrebakely Nord', 88),
(1232, 'Anororo', 88),
(1233, 'Beanana', 88),
(1234, 'Bedidy', 88),
(1235, 'Morarano Chrome', 88),
(1236, 'Ranomainty', 88),
(1237, 'Sahamamy', 88),
(1238, 'Tanambe', 88),
(1239, 'Vohimena', 88),
(1240, 'Vohitsara', 88),
(1241, 'Andilamena', 89),
(1242, 'Antanimenabaka', 89),
(1243, 'Bemaintso', 89),
(1244, 'Maitsokely', 89),
(1245, 'Maroadabo', 89),
(1246, 'Marovato', 89),
(1247, 'Miarinarivo', 89),
(1248, 'Tanananifololahy', 89),
(1249, 'Ambalaomby', 90),
(1250, 'Ambatoharanana', 90),
(1251, 'Ampandroantraka', 90),
(1252, 'Ampasimaneva', 90),
(1253, 'Anosibe An\'ala', 90),
(1254, 'Antandrokomby', 90),
(1255, 'Longozabe', 90),
(1256, 'Niarovana', 90),
(1257, 'Tratramarina', 90),
(1258, 'Tsaravinany', 90),
(1259, 'Ambatovola', 91),
(1260, 'Amboasary', 91),
(1261, 'Ambohibary', 91),
(1262, 'Ambohidronono', 91),
(1263, 'Ampasimpotsy Gare', 91),
(1264, 'Ampasimpotsy Mandialaza', 91),
(1265, 'Andaingo', 91),
(1266, 'Andasibe', 91),
(1267, 'Anosibe Ifody', 91),
(1268, 'Antanandava', 91),
(1269, 'Antaniditra', 91),
(1270, 'Beforona', 91),
(1271, 'Belavabary', 91),
(1272, 'Beparasy Mangarivotra', 91),
(1273, 'Fierenana', 91),
(1274, 'Lakato', 91),
(1275, 'Mandialaza', 91),
(1276, 'Moramanga', 91),
(1277, 'Morarano Gare', 91),
(1278, 'Sabotsy Anjiro', 91),
(1279, 'Vodiriana', 91),
(1280, 'Amboropotsy', 92),
(1281, 'Ampanihy Centre', 92),
(1282, 'Androka', 92),
(1283, 'Ankiliabo', 92),
(1284, 'Ankilimivory', 92),
(1285, 'Ankilizato', 92),
(1286, 'Antaly', 92),
(1287, 'Beahitse', 92),
(1288, 'Belafike Haut', 92),
(1289, 'Beroy Sud', 92),
(1290, 'Ejeda', 92),
(1291, 'Fotadrevo', 92),
(1292, 'Gogogogo', 92),
(1293, 'Itampolo', 92),
(1294, 'Maniry', 92),
(1295, 'Vohitany', 92),
(1296, 'Ankazoabo Sud', 93),
(1297, 'Berenty', 93),
(1298, 'Andranomafana', 93),
(1299, 'Fotivolo', 93),
(1300, 'Ilemby', 93),
(1301, 'Tandrano', 93),
(1302, 'Ambalavato', 94),
(1303, 'Benenitra', 94),
(1304, 'Ehara', 94),
(1305, 'Ianapera', 94),
(1306, 'Behisatsy', 95),
(1307, 'Bemavo', 95),
(1308, 'Beroroha', 95),
(1309, 'Fanjakana', 95),
(1310, 'Mandronarivo', 95),
(1311, 'Marerano', 95),
(1312, 'Sakena', 95),
(1313, 'Tanamary', 95),
(1314, 'Ambatry Mitsinjo', 96),
(1315, 'Andranomangatsiaka', 96),
(1316, 'Ankazomanga Ouest', 96),
(1317, 'Ankazombalala', 96),
(1318, 'Ankilivalo', 96),
(1319, 'Antohabato', 96),
(1320, 'Antsavoa', 96),
(1321, 'Beantake', 96),
(1322, 'Belamoty', 96),
(1323, 'Besely', 96),
(1324, 'Betioky Sud', 96),
(1325, 'Bezaha', 96),
(1326, 'Fenoandala', 96),
(1327, 'Lazarivo', 96),
(1328, 'Manalobe', 96),
(1329, 'Maroarivo Ankazomanga', 96),
(1330, 'Marosavoa', 96),
(1331, 'Masiaboay', 96),
(1332, 'Montifeno', 96),
(1333, 'Sakamasay', 96),
(1334, 'Salobe', 96),
(1335, 'Soamanonga', 96),
(1336, 'Soaserana', 96),
(1337, 'Tanambao Haut', 96),
(1338, 'Temeantsoa', 96),
(1339, 'Tongobory', 96),
(1340, 'Vatolatsaka', 96),
(1341, 'Ambahikily', 97),
(1342, 'Antanimieva', 97),
(1343, 'Antongo Vaovao', 97),
(1344, 'Basibasy', 97),
(1345, 'Befandeha', 97),
(1346, 'Befandriana Sud', 97),
(1347, 'Morombe', 97),
(1348, 'Nosy Ambositra', 97),
(1349, 'Ambinany', 98),
(1350, 'Amboronabo', 98),
(1351, 'Andamasiny Vineta', 98),
(1352, 'Andranolava', 98),
(1353, 'Beraketa', 98),
(1354, 'Mahaboboka', 98),
(1355, 'Mihary Lamatihy', 98),
(1356, 'Mihary Teheza', 98),
(1357, 'Mihavatsy', 98),
(1358, 'Mikoboka', 98),
(1359, 'Mitsinjo', 98),
(1360, 'Sakaraha', 98),
(1361, 'CU Toliara', 99),
(1362, 'Ambohimahavelona', 100),
(1363, 'Ambolofoty', 100),
(1364, 'Anakao', 100),
(1365, 'Analamisampy', 100),
(1366, 'Andranohinaly', 100),
(1367, 'Andranovory', 100),
(1368, 'Ankililoaka', 100),
(1369, 'Ankilimalinika', 100),
(1370, 'Antanimena Onilahy', 100),
(1371, 'Behelokay', 100),
(1372, 'Behompy', 100),
(1373, 'Belalanda', 100),
(1374, 'Betsinjaka', 100),
(1375, 'Manombo Sud', 100),
(1376, 'Manorofify', 100),
(1377, 'Marofoty', 100),
(1378, 'Maromiandra', 100),
(1379, 'Miary', 100),
(1380, 'Milenaka', 100),
(1381, 'Mitsinjo Betanimena', 100),
(1382, 'Saint Augustin', 100),
(1383, 'Soalara Sud', 100),
(1384, 'Tsianisiha', 100),
(1385, 'Amboasary Sud', 101),
(1386, 'Behara', 101),
(1387, 'Ebelo', 101),
(1388, 'Elonty', 101),
(1389, 'Esira', 101),
(1390, 'Ifotaka', 101),
(1391, 'Mahaly', 101),
(1392, 'Manevy', 101),
(1393, 'Maromby', 101),
(1394, 'Marotsiraka', 101),
(1395, 'Ranobe', 101),
(1396, 'Sampona', 101),
(1397, 'Tanandava Sud', 101),
(1398, 'Tomboarivo', 101),
(1399, 'Tranomaro', 101),
(1400, 'Tsivory', 101),
(1401, 'Ambalasoa', 102),
(1402, 'Ambatomivary', 102),
(1403, 'Analamary', 102),
(1404, 'Andriandampy', 102),
(1405, 'Beampombo I', 102),
(1406, 'Beampombo II', 102),
(1407, 'Bekorobo', 102),
(1408, 'Benato Toby', 102),
(1409, 'Betroka', 102),
(1410, 'Iaborotra', 102),
(1411, 'Ianabinda', 102),
(1412, 'Ianakafy', 102),
(1413, 'Isoanala', 102),
(1414, 'Ivahona', 102),
(1415, 'Jangany', 102),
(1416, 'Mahabo', 102),
(1417, 'Mahasoa Est', 102),
(1418, 'Nanarena Besakoa', 102),
(1419, 'Naninora', 102),
(1420, 'Sakamahily', 102),
(1421, 'Tsaraitso', 102),
(1422, 'Ambatoabo', 103),
(1423, 'Ampasimena', 103),
(1424, 'Ampasy Nahampoana', 103),
(1425, 'Analamary', 103),
(1426, 'Analapatsy', 103),
(1427, 'Andranobory', 103),
(1428, 'Ankaramena', 103),
(1429, 'Ankariera', 103),
(1430, 'Bevoay', 103),
(1431, 'Emagnobo', 103),
(1432, 'Enakara Haut', 103),
(1433, 'Enaniliha', 103),
(1434, 'Fenoevo Efita', 103),
(1435, 'Iaboakoho', 103),
(1436, 'Ifarantsa', 103),
(1437, 'Isaka Ivondro', 103),
(1438, 'Mahatalaky', 103),
(1439, 'Manambaro', 103),
(1440, 'Manantenina', 103),
(1441, 'Mandiso', 103),
(1442, 'Mandromodromotra', 103),
(1443, 'Ranomafana Sud', 103),
(1444, 'Ranopiso', 103),
(1445, 'Sarisambo', 103),
(1446, 'Soanierana', 103),
(1447, 'Soavary', 103),
(1448, 'CU Taolagnaro', 103),
(1449, 'Ambanisarika', 104),
(1450, 'Ambazoa', 104),
(1451, 'Ambohimalaza', 104),
(1452, 'Ambonaivo', 104),
(1453, 'Ambondro', 104),
(1454, 'CU Ambovombe Androy', 104),
(1455, 'Ampamanta', 104),
(1456, 'Analamary', 104),
(1457, 'Andalatanosy', 104),
(1458, 'Anjeky Ankilikira', 104),
(1459, 'Antanimora Sud', 104),
(1460, 'Erada', 104),
(1461, 'Imanombo', 104),
(1462, 'Jafaro', 104),
(1463, 'Maroalomainte', 104),
(1464, 'Maroalopoty', 104),
(1465, 'Marovato Befeno', 104),
(1466, 'Sihanamaro', 104),
(1467, 'Tsimanada', 104),
(1468, 'Ambahita', 105),
(1469, 'Ambatosola', 105),
(1470, 'Anivorano Mitsinjo', 105),
(1471, 'Anja Nord', 105),
(1472, 'Ankaranabo Nord', 105),
(1473, 'Antsakoamaro', 105),
(1474, 'Bekitro', 105),
(1475, 'Belindo Mahasoa', 105),
(1476, 'Beraketa', 105),
(1477, 'Besakoa', 105),
(1478, 'Beteza', 105),
(1479, 'Bevitiky', 105),
(1480, 'Manakompy', 105),
(1481, 'Maroviro', 105),
(1482, 'Morafeno', 105),
(1483, 'Tanandava', 105),
(1484, 'Tsikolaky', 105),
(1485, 'Tsirandrany', 105),
(1486, 'Vohimanga', 105),
(1487, 'Behabobo', 106),
(1488, 'Beloha Androy', 106),
(1489, 'Kopoky', 106),
(1490, 'Marolinta', 106),
(1491, 'Tranoroa', 106),
(1492, 'Tranovaho', 106),
(1493, 'Anjampaly', 107),
(1494, 'Antaritarika', 107),
(1495, 'Faux Cap', 107),
(1496, 'Imongy', 107),
(1497, 'Marovato', 107),
(1498, 'Nikoly', 107),
(1499, 'Tsihombe', 107),
(1500, 'Ambiky', 108),
(1501, 'Amboalimena', 108),
(1502, 'Andimaky Manambolo', 108),
(1503, 'Ankalalobe', 108),
(1504, 'Ankororoky', 108),
(1505, 'Antsoha', 108),
(1506, 'Belinta', 108),
(1507, 'Belo Sur Tsiribihina', 108),
(1508, 'Bemarivo Ankirondro', 108),
(1509, 'Berevo', 108),
(1510, 'Beroboka', 108),
(1511, 'Masoarivo', 108),
(1512, 'Tsaraotana', 108),
(1513, 'Tsimafana', 108),
(1514, 'Ambia', 109),
(1515, 'Ampanihy', 109),
(1516, 'Analamitsivala', 109),
(1517, 'Ankilivalo', 109),
(1518, 'Ankilizato', 109),
(1519, 'Befotaka', 109),
(1520, 'Beronono', 109),
(1521, 'Mahabo', 109),
(1522, 'Malaimbandy', 109),
(1523, 'Mandabe', 109),
(1524, 'Tsimazava', 109),
(1525, 'Andranopasy', 110),
(1526, 'Ankiliabo', 110),
(1527, 'Anontsibe Centre', 110),
(1528, 'Beharona', 110),
(1529, 'Manja', 110),
(1530, 'Soaserana', 110),
(1531, 'Ambatolahy', 111),
(1532, 'Ampanihy', 111),
(1533, 'Ankavandra', 111),
(1534, 'Ankondromena', 111),
(1535, 'Ankorofotsy', 111),
(1536, 'Anosimena', 111),
(1537, 'Bemahatazana', 111),
(1538, 'Betsipolitra', 111),
(1539, 'Dabolava', 111),
(1540, 'Isalo', 111),
(1541, 'Itondy', 111),
(1542, 'Manambina', 111),
(1543, 'Manandaza', 111),
(1544, 'Miandrivazo', 111),
(1545, 'Soaloka', 111),
(1546, 'Analaiva', 112),
(1547, 'Befasy', 112),
(1548, 'Belo Sur Mer', 112),
(1549, 'Bemanonga', 112),
(1550, 'Morondava', 112),
(1551, '1ER Arrondissement', 114),
(1552, '2E Arrondissement', 114),
(1553, '3E Arrondissement', 114),
(1554, '4E Arrondissement', 114),
(1555, '5E Arrondissement', 114),
(1556, '6E Arrondissement', 114);

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

CREATE TABLE `consultation` (
  `IDCONSULTATION` bigint(10) NOT NULL,
  `IDDOCTEUR` bigint(10) DEFAULT NULL,
  `IDPATIENT` bigint(10) NOT NULL,
  `MESSAGECONSULTATION` varchar(1000) NOT NULL,
  `REPONSECONSULTATION` varchar(1000) NOT NULL,
  `ORDONANCE` char(255) NOT NULL,
  `DATECONSULTATION` char(255) NOT NULL,
  `STATUSCONSULTATION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `consultation`
--

INSERT INTO `consultation` (`IDCONSULTATION`, `IDDOCTEUR`, `IDPATIENT`, `MESSAGECONSULTATION`, `REPONSECONSULTATION`, `ORDONANCE`, `DATECONSULTATION`, `STATUSCONSULTATION`) VALUES
(18, 8, 6, 'Bonjour', 'Bonjour', '', '2021/10/16 - 12:31 am', '1'),
(19, 8, 6, 'Bonjour', 'Bonjour,ca va', '', '2021/10/21 - 01:18 pm', '1');

-- --------------------------------------------------------

--
-- Structure de la table `discuter`
--

CREATE TABLE `discuter` (
  `IDDOCTEUR` bigint(10) NOT NULL,
  `IDFORUM` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `district`
--

CREATE TABLE `district` (
  `IDDISTRICT` bigint(10) NOT NULL,
  `NOMDISTRICT` varchar(255) NOT NULL,
  `IDREGION` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `district`
--

INSERT INTO `district` (`IDDISTRICT`, `NOMDISTRICT`, `IDREGION`) VALUES
(1, 'Andramasina', 1),
(2, 'Ambohidratrimo', 1),
(3, 'Anjozorobe', 1),
(4, 'Ankazobe', 1),
(5, 'Antananarivo-Atsimondrano', 1),
(6, 'Antananarivo-Avaradrano', 1),
(7, 'Manjakandriana', 1),
(8, 'Fenoarivobe', 2),
(9, 'Tsiroanomandidy', 2),
(10, 'Arivonimamo', 3),
(11, 'Miarinarivo', 3),
(12, 'Soavinandriana', 3),
(13, 'Ambatolampy', 4),
(14, 'Antanifotsy', 4),
(15, 'Antsirabe I', 4),
(16, 'Antsirabe II', 4),
(17, 'Betafo', 4),
(18, 'Mandoto', 4),
(19, 'Faratsiho', 4),
(20, 'Ambanja', 6),
(21, 'Ambilobe', 6),
(22, 'Antsiranana I', 6),
(23, 'Antsiranana II', 6),
(24, 'Andapa', 7),
(25, 'Antalaha', 7),
(26, 'Sambava', 7),
(27, 'Vohémar', 7),
(28, 'Ambalavao', 8),
(29, 'Ambohimahasoa', 8),
(30, 'Fianarantsoa I', 8),
(31, 'Ikalamavony', 8),
(32, 'Lalangina', 8),
(33, 'Isandra', 8),
(34, 'Vohibato', 8),
(35, 'Ambatofinandrahana', 9),
(36, 'Ambositra', 9),
(37, 'Fandriana', 9),
(38, 'Manandriana', 9),
(39, 'Iakora', 10),
(40, 'Ihosy', 10),
(41, 'Ivohibe', 10),
(42, 'Befotaka-Sud', 11),
(43, 'Farafangana', 11),
(44, 'Midongy du Sud', 11),
(45, 'Vangaindrano', 11),
(46, 'Vondrozo', 11),
(47, 'Ifanadiana', 12),
(48, 'Ikongo', 12),
(49, 'Manakara', 12),
(50, 'Mananjary', 12),
(51, 'Nosy Varika', 12),
(52, 'Vohipeno', 12),
(53, 'Ambato Boeny', 13),
(54, 'Mahajanga I', 13),
(55, 'Mahajanga II', 13),
(56, 'Marovoay', 13),
(57, 'Mitsinjo', 13),
(58, 'Soalala', 13),
(59, 'Kandreho', 14),
(60, 'Maevatanana', 14),
(61, 'Tsaratanana', 14),
(62, 'Ambatomainty', 15),
(63, 'Antsalova', 15),
(64, 'Besalampy', 15),
(65, 'Maintirano', 15),
(66, 'Morafenobe', 15),
(67, 'Analalava', 16),
(68, 'Antsohihy', 16),
(69, 'Bealanana', 16),
(70, 'Befandriana Nord', 16),
(71, 'Mampikony', 16),
(72, 'Mandritsara', 16),
(73, 'Port Berger', 16),
(74, 'Antanambao Manampotsy', 17),
(75, 'Brickaville', 17),
(76, 'Mahanoro', 17),
(77, 'Marolambo', 17),
(78, 'Toamasina I', 17),
(79, 'Toamasina II', 17),
(80, 'Vatomandry', 17),
(81, 'Fenerive-Est', 18),
(82, 'Mananara Nord', 18),
(83, 'Maroantsetra', 18),
(84, 'Sainte-Marie', 18),
(85, 'Soanierana Ivongo', 18),
(86, 'Vavatenina', 18),
(87, 'Ambatondrazaka', 19),
(88, 'Amparafaravola', 19),
(89, 'Andilamena', 19),
(90, 'Anosibe An’ala', 19),
(91, 'Moramanga', 19),
(92, 'Ampanihy Ouest', 20),
(93, 'Ankazoabo-Sud', 20),
(94, 'Benenitra', 20),
(95, 'Beroroha', 20),
(96, 'Betioky-Sud', 20),
(97, 'Morombe', 20),
(98, 'Sakaraha', 20),
(99, 'Toliara I', 20),
(100, 'Toliara II', 20),
(101, 'Amboasary Sud', 21),
(102, 'Betroka', 21),
(103, 'Tolagnaro', 21),
(104, 'Ambovombe Androy', 22),
(105, 'Bekily', 22),
(106, 'Beloha', 22),
(107, 'Tsihombe', 22),
(108, 'Belo sur Tsiribihina', 23),
(109, 'Mahabo', 23),
(110, 'Manja', 23),
(111, 'Miandrivazo', 23),
(112, 'Morondava', 23),
(113, 'Nosy-Be', 6),
(114, 'Antananarivo Renivohitra', 1);

-- --------------------------------------------------------

--
-- Structure de la table `docteur`
--

CREATE TABLE `docteur` (
  `IDDOCTEUR` bigint(10) NOT NULL,
  `NOMDOCTEUR` char(255) NOT NULL,
  `PRENOMDOCTEUR` char(255) NOT NULL,
  `ADRESSEDOCTEUR` char(255) NOT NULL,
  `TELEPHONEDOCTEUR` char(255) NOT NULL,
  `MAILDOCTEUR` char(255) NOT NULL,
  `CINDOCTEUR` char(255) NOT NULL,
  `SPECIALISEDOCTEUR` char(255) NOT NULL,
  `PHOTODOCTEUR` char(255) NOT NULL,
  `CLINIQUEDOCTEUR` char(255) NOT NULL,
  `ADRESSECLINIQUEDOCTEUR` char(255) NOT NULL,
  `PROVINCEDOCTEUR` char(255) NOT NULL,
  `REGIONDOCTEUR` char(255) NOT NULL,
  `DISTRICTDOCTEUR` char(255) NOT NULL,
  `COMMUNEDOCTEUR` char(255) NOT NULL,
  `MDPDOCTEUR` char(255) NOT NULL,
  `STATUSDOCTEUR` char(255) NOT NULL,
  `CODEDOCTEUR` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `docteur`
--

INSERT INTO `docteur` (`IDDOCTEUR`, `NOMDOCTEUR`, `PRENOMDOCTEUR`, `ADRESSEDOCTEUR`, `TELEPHONEDOCTEUR`, `MAILDOCTEUR`, `CINDOCTEUR`, `SPECIALISEDOCTEUR`, `PHOTODOCTEUR`, `CLINIQUEDOCTEUR`, `ADRESSECLINIQUEDOCTEUR`, `PROVINCEDOCTEUR`, `REGIONDOCTEUR`, `DISTRICTDOCTEUR`, `COMMUNEDOCTEUR`, `MDPDOCTEUR`, `STATUSDOCTEUR`, `CODEDOCTEUR`) VALUES
(8, 'RAFANJAMALALA', 'Lora', 'Lot VV P8 Ter', '0326598574', 'Lora@gmail.com', '121 123 456 789', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'docteur.jpg', 'HJRA', 'Anosy', '1', '1', '114', '1551', 'bdd600f7f3a13f97fda648a2f6dd5fee', 'inactif', 'lora2020'),
(9, 'RAMARO', 'Tsiky Mala', 'Lot Xt Mahamasina', '0334578956', 'Tsiky@gmail.com', '121 122 223 120', 'Duis aute irure dolor in reprehenderit Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis,necessitatibus optio ad corporis..', 'depositphotos_14779771-stock-photo-portrait-of-confident-young-doctor.jpg', 'Befalatanana', 'Mahamasina', '1', '2', '8', '136', 'cea00d7d2d1335c4a3983e83affc0a25', 'inactif', 'tsiky2020');

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `IDFORUM` bigint(10) NOT NULL,
  `MESSAGEFORUM` char(255) NOT NULL,
  `DATEMESSAGEFORUM` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `heureagenda`
--

CREATE TABLE `heureagenda` (
  `IDHEUREAGENDA` bigint(10) NOT NULL,
  `IDAGENDA` bigint(10) DEFAULT NULL,
  `HEUREAGENDA` char(255) NOT NULL,
  `STATUSHEUREAGENDA` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `heureagenda`
--

INSERT INTO `heureagenda` (`IDHEUREAGENDA`, `IDAGENDA`, `HEUREAGENDA`, `STATUSHEUREAGENDA`) VALUES
(56, 15, '7h à 8h', 'activer'),
(57, 15, '8h à 9h', 'activer'),
(58, 15, '9h à 10h', 'activer'),
(59, 15, '10h à 11h', 'activer'),
(60, 15, '11h à 12h', 'activer'),
(61, 15, '13h à 14h', 'activer'),
(62, 15, '14h à 15h', 'activer'),
(63, 15, '15h à 16h', 'activer'),
(64, 16, '8h à 10h', 'activer'),
(65, 16, '10h à 12h', 'activer'),
(66, 17, '', 'activer'),
(67, 17, '', 'activer'),
(68, 17, '', 'activer'),
(69, 17, '', 'activer'),
(70, 18, '', 'activer'),
(71, 18, '', 'activer'),
(72, 18, '', 'activer'),
(73, 18, '', 'activer'),
(74, 18, '', 'activer'),
(75, 19, '', 'activer'),
(76, 19, '', 'activer'),
(77, 20, '', 'activer'),
(78, 20, '', 'activer'),
(79, 20, '', 'activer'),
(80, 20, '', 'activer'),
(81, 20, '', 'activer'),
(82, 21, '7h à 8h', 'activer'),
(83, 21, '8h à 9h', 'activer'),
(84, 21, '9h à 10h', 'activer'),
(85, 21, '10h à 11h', 'activer'),
(86, 21, '11h à 12h', 'activer'),
(87, 21, '13h à 14h', 'activer'),
(88, 21, '14h à 15h', 'activer'),
(89, 21, '15h à 16h', 'activer'),
(90, 21, '16h à 17h', 'activer'),
(91, 22, '', 'activer'),
(92, 22, '', 'activer'),
(93, 22, '', 'activer'),
(94, 22, '', 'activer'),
(95, 21, '', 'activer'),
(96, 21, '', 'activer'),
(97, 21, '', 'activer'),
(98, 21, '', 'activer'),
(99, 21, '', 'activer'),
(100, 21, '', 'activer'),
(101, 24, '9h à 12h', 'activer'),
(102, 24, '12h à 15h', 'activer'),
(103, 24, '', 'activer'),
(104, 24, '', 'activer'),
(105, 26, '6h à 7h', 'activer'),
(106, 26, '7h à 8h', 'activer'),
(107, 26, '8h à 9h', 'activer'),
(108, 26, '9h à 10h', 'activer'),
(109, 26, '10h à 11h', 'activer'),
(110, 26, '11h à 12h', 'activer'),
(111, 26, '13h à 14h', 'activer'),
(112, 26, '14h à 15h', 'activer'),
(113, 26, '15h à 16h', 'activer'),
(114, 26, '16h à 17h', 'activer'),
(115, 26, '17h à 18h', 'activer'),
(116, 27, '', 'activer'),
(117, 27, '', 'activer'),
(118, 27, '', 'activer'),
(119, 27, '', 'activer'),
(120, 27, '', 'activer'),
(121, 27, '', 'activer'),
(122, 28, '', 'activer'),
(123, 28, '', 'activer'),
(124, 28, '', 'activer'),
(125, 28, '', 'activer'),
(126, 29, '7h à 8h', 'activer'),
(127, 29, '8h à 9h', 'activer'),
(128, 30, '7h à 8h', 'activer'),
(129, 30, '8h à 9h', 'activer'),
(130, 31, '7h à 8h', 'desactiver'),
(131, 31, '8h à 9h', 'activer'),
(132, 31, '9h à 10h', 'activer'),
(133, 31, '10h à 11h', 'activer'),
(134, 31, '11h à 12h', 'activer'),
(135, 31, '13h à 14h', 'activer'),
(136, 31, '14h à 15h', 'activer'),
(137, 31, '15h à 16h', 'activer'),
(138, 31, '16h à 17h', 'activer'),
(139, 32, '7h à 8h', 'activer'),
(140, 32, '8h à 9h', 'activer'),
(141, 32, '9h à 10h', 'activer'),
(142, 32, '10h à 11h', 'activer'),
(143, 32, '11h à 12h', 'desactiver'),
(144, 33, '13h à 14h', 'desactiver'),
(145, 33, '14h à 15h', 'desactiver'),
(146, 33, '15h à 16h', 'activer'),
(147, 33, '16h à 17h', 'activer'),
(148, 34, '', 'activer'),
(149, 34, '', 'activer'),
(150, 35, '6h à 11h', 'activer'),
(151, 35, '13h à 16h', 'activer'),
(152, 36, '6h à 8h', 'activer'),
(153, 36, '8h à 10h', 'activer'),
(154, 36, '10h à 12h', 'activer'),
(155, 36, '12h à 14h', 'activer'),
(156, 37, '13h à 16h', 'activer'),
(157, 38, '6h à 7h', 'activer'),
(158, 38, '7h à 8h', 'activer'),
(159, 38, '8h à 9h', 'activer'),
(161, 40, '', 'activer'),
(162, 40, '', 'activer'),
(163, 40, '', 'activer'),
(164, 40, '', 'activer'),
(165, 40, '', 'activer'),
(166, 40, '', 'activer'),
(167, 40, '', 'activer'),
(168, 40, '', 'activer'),
(169, 40, '', 'activer'),
(170, 40, '', 'activer'),
(171, 41, '6h à 7h', 'activer'),
(172, 41, '7h à 8h', 'activer'),
(173, 41, '8h à 9h', 'activer'),
(174, 41, '9h à 10h', 'activer'),
(175, 41, '10h à 11h', 'activer'),
(176, 41, '11h à 12h', 'activer'),
(177, 41, '13h à 14h', 'activer'),
(178, 41, '14h à 15h', 'activer'),
(179, 41, '15h à 16h', 'activer'),
(180, 41, '16h à 17h', 'activer'),
(182, 42, '6h à 7h', 'activer'),
(183, 42, '7h à 8h', 'activer'),
(184, 42, '8h à 9h', 'activer'),
(185, 42, '9h à 10h', 'activer'),
(186, 42, '10h à 11h', 'activer'),
(187, 42, '11h à 12h', 'activer'),
(188, 42, '13h à 14h', 'activer'),
(189, 42, '14h à 15h', 'activer'),
(190, 42, '15h à 16h', 'activer'),
(191, 42, '16h à 17h', 'activer'),
(192, 42, '17h à 18h', 'activer'),
(193, 43, '6h à 8h', 'activer'),
(194, 43, '10h à 12h', 'activer');

-- --------------------------------------------------------

--
-- Structure de la table `loyerboxe`
--

CREATE TABLE `loyerboxe` (
  `IDLOYERBOXE` bigint(10) NOT NULL,
  `OPERATEURLOYERBOXE` char(255) NOT NULL,
  `APARTENANCELOYERBOXE` char(255) NOT NULL,
  `NUMEROLOYERBOXE` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `loyerboxe`
--

INSERT INTO `loyerboxe` (`IDLOYERBOXE`, `OPERATEURLOYERBOXE`, `APARTENANCELOYERBOXE`, `NUMEROLOYERBOXE`) VALUES
(5, 'orangeMoney', 'Rakotondratsimba maminiaina', '0326865274'),
(7, 'airtelMoney', 'Rabarijaona rakoto', '0345678945');

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

CREATE TABLE `medicament` (
  `IDMEDICAMENT` bigint(10) NOT NULL,
  `IDPHARMACIE` bigint(10) DEFAULT NULL,
  `NOMMEDICAMENT` char(255) NOT NULL,
  `PRIXMEDICAMENT` int(11) NOT NULL,
  `QUANTITEMEDICAMENT` char(255) NOT NULL,
  `ARTICLEMEDICAMENT` char(255) NOT NULL,
  `PHOTOMEDICAMENT` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `medicament`
--

INSERT INTO `medicament` (`IDMEDICAMENT`, `IDPHARMACIE`, `NOMMEDICAMENT`, `PRIXMEDICAMENT`, `QUANTITEMEDICAMENT`, `ARTICLEMEDICAMENT`, `PHOTOMEDICAMENT`) VALUES
(10, 1, 'Paracétamole', 2000, '1 Boite', 'C\'est un médicament pour le mot de tête et le fievre jaune', 'pharmacie1.jpg'),
(11, 1, 'Pile', 3000, '1 claquêtte', 'C\'est un médicament médicinale dont tous le monde a besion', '20-mg-label-blister-pack-2085122.jpg'),
(13, 1, 'Cotrime', 8000, '10 Boites', 'C\'est un médicament contre la gripe est le pludisme forte,est aussi un remède contre la tuberculose', 'drug_ad7f8253.jpg'),
(15, 2, 'Glicerince', 1000, '1 Bouteile', 'Un Huile provenant de la France contre le malaise est le fatige générale,soin de corps et du visage.', 'Mediacamen.png'),
(16, 2, 'Proteine', 20000, '500 g', 'Un aliment complet pour le prise de masse et la musculation pour les sportife et les fitnesse.', 'flickr-marco-verch.jpg'),
(17, 2, 'Paracétamole', 100, '1 claquêtte', 'Médicament contre le mot de tête est le fievre grave.', 'dd.jpg'),
(18, 1, 'Glicerince', 1000, '1 Bouteile', 'Médicament pour la peau et les cicatrice', 'depositphotos_7611419-stock-photo-blister-pack-of-pills-remedy.jpg'),
(19, 2, 'Glucide', 5000, '2 Bouteilles', 'Médicament proteine ,conçu pour le developpement des muscle et des grèces.Fait pour le sport ,augmentation des neuron et de l\'energie interne.', 'medicaments.jpg'),
(20, 1, 'Odikakana', 8000, '1 Boite', 'dgfdgfdgdfgfdgdfgdfgfdgfgdgdfg', '870x489_maxnewsfrfour026919.jpg'),
(22, 1, 'Nivakinina', 2000, '1 claquette', 'c\'est medicament utiliser dentaire', 'flickr-marco-verch1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `notifboxe`
--

CREATE TABLE `notifboxe` (
  `IDNOTIFBOXE` bigint(10) NOT NULL,
  `NOTIFBOXE` char(255) NOT NULL,
  `TYPEBOXE` char(255) NOT NULL,
  `DATENOTIFBOXE` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `notifboxe`
--

INSERT INTO `notifboxe` (`IDNOTIFBOXE`, `NOTIFBOXE`, `TYPEBOXE`, `DATENOTIFBOXE`) VALUES
(1, 'Manaona dooly ry noom ah', 'pharmacie', '2021/06/23 - 07:02 pm');

-- --------------------------------------------------------

--
-- Structure de la table `notifclinique`
--

CREATE TABLE `notifclinique` (
  `IDNOTIFCLINIQUE` bigint(10) NOT NULL,
  `NOTIFCLINIQUE` char(255) NOT NULL,
  `DATENOTIFCLINIQUE` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `notifdocteur`
--

CREATE TABLE `notifdocteur` (
  `IDNOTIFDOCTEUR` bigint(10) NOT NULL,
  `NOTIFDOCTEUR` char(255) NOT NULL,
  `DATENOTIFDOCTEUR` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `notifpatient`
--

CREATE TABLE `notifpatient` (
  `IDNOTIFPATIENT` bigint(10) NOT NULL,
  `TYPENOTIFPATIENT` char(255) NOT NULL,
  `NOTIFPATIENT` char(255) NOT NULL,
  `ENVOYEURNOTIFPATIENT` char(255) NOT NULL,
  `DATENOTIFPATIENT` char(255) NOT NULL,
  `NOMENVOYEURNOTIFPATIENT` char(255) NOT NULL,
  `PHOTOENVOTEURNOTIFPATIENT` char(255) NOT NULL,
  `STATUSNOTIFPATIENT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `notifpatient`
--

INSERT INTO `notifpatient` (`IDNOTIFPATIENT`, `TYPENOTIFPATIENT`, `NOTIFPATIENT`, `ENVOYEURNOTIFPATIENT`, `DATENOTIFPATIENT`, `NOMENVOYEURNOTIFPATIENT`, `PHOTOENVOTEURNOTIFPATIENT`, `STATUSNOTIFPATIENT`) VALUES
(29, 'message', 'kakana', 'docteur', '2021/07/22 - 07:11 pm', 'Dr Fanja', '1554051775056.jpg', '1'),
(30, 'avertissement', 'Tsy mahazo manao anzany a', 'docteur', '2021/07/22 - 07:11 pm', 'Dr Fanja', '1554051775056.jpg', '1'),
(31, 'message', 'D aona one e?', 'pharmacie', '2021/07/22 - 07:15 pm', 'Pharmacie Mahavoky', 'pharmacie3.jpg', '1'),
(32, 'averstissement', 'Maty enao ah!!!', 'pharmacie', '2021/07/22 - 07:16 pm', 'Pharmacie Mahavoky', 'pharmacie3.jpg', '1'),
(33, 'averstissement', 'fdsdfdffsdfs', 'pharmacie', '2021/07/22 - 07:19 pm', 'Pharmacie Mahavoky', 'pharmacie3.jpg', '1'),
(34, 'averstissement', 'to mety', 'pharmacie', '2021/07/22 - 07:24 pm', 'Pharmacie Mahavoky', 'pharmacie3.jpg', '1'),
(35, 'message', 'kez kez', 'pharmacie', '2021/07/22 - 07:24 pm', 'Pharmacie Mahavoky', 'pharmacie3.jpg', '1'),
(36, 'averstissement', 'D aona ony e', 'pharmacie', '2021/07/22 - 07:27 pm', 'Pharmacie Mahavoky', 'pharmacie3.jpg', '1'),
(37, 'message', 'mety ka', 'pharmacie', '2021/07/22 - 07:27 pm', 'Pharmacie Mahavoky', 'pharmacie3.jpg', '1'),
(38, 'message', 'marary enao', 'docteur', '2021/07/22 - 07:28 pm', 'Dr Fanja', '1554051775056.jpg', '1'),
(39, 'avertissement', 'Fa aona?', 'docteur', '2021/07/22 - 07:29 pm', 'Dr Fanja', '1554051775056.jpg', '1'),
(40, 'avertissement', 'azagdgdfg', 'docteur', '2021/07/28 - 10:41 am', 'Dr Fanja', '1554051775056.jpg', '1'),
(41, 'message', 'dttrtezrtztzttzte', 'pharmacie', '2021/07/28 - 10:52 am', 'Pharmacie Mahavoky', 'pharmacie3.jpg', '1'),
(42, 'message', 'Merci pour achat', 'pharmacie', '2021/07/29 - 11:25 pm', 'Pharmacie Itokiana', 'drugstore-icon.png', '0'),
(43, 'message', 'Merci pour votre achat !!!', 'pharmacie', '2021/07/29 - 11:26 pm', 'Pharmacie Itokiana', 'drugstore-icon.png', '1'),
(44, 'message', 'Manaona fa clinique ihany ito', 'clinique', '2021/08/12 - 11:22 pm', 'Dispensaire Mahomby', 'prise-rendez-vous-smartphone-homme_23-21485763841.jpg', '1'),
(45, 'averstissement', 'Tsy maditra wa', 'clinique', '2021/08/12 - 11:23 pm', 'Dispensaire Mahomby', 'prise-rendez-vous-smartphone-homme_23-21485763841.jpg', '1'),
(46, 'averstissement', 'Tsy mahazo maditra', 'pharmacie', '2021/08/12 - 11:53 pm', 'Pharmacie Itokiana', 'drugstore-icon.png', '1'),
(47, 'averstissement', 'Tsy maditra wa a', 'clinique', '2021/08/18 - 10:16 pm', 'Dispensaire Mahomby', 'prise-rendez-vous-smartphone-homme_23-21485763841.jpg', '1'),
(48, 'message', 'est ce vous evez suiver l\'exercice', 'docteur', '2021/08/22 - 08:16 pm', 'Dr Haja', 'BeautyPlus_20201212093245573_save.jpg', '0'),
(49, 'message', 'est ce que vous avez suivie les ordre du jour', 'docteur', '2021/08/22 - 08:17 pm', 'Dr Haja', 'BeautyPlus_20201212093245573_save.jpg', '1'),
(50, 'avertissement', 'ne fait pas ca', 'docteur', '2021/08/22 - 08:18 pm', 'Dr Haja', 'BeautyPlus_20201212093245573_save.jpg', '1'),
(51, 'message', 'Est ce votre livraison est livré', 'pharmacie', '2021/08/22 - 08:36 pm', 'Pharmacie Mahavoky', 'pharmacie3.jpg', '0'),
(52, 'message', 'fgdfgdgds', 'pharmacie', '2021/08/22 - 08:36 pm', 'Pharmacie Mahavoky', 'pharmacie3.jpg', '1'),
(53, 'message', 'salut bienvenue', 'docteur', '2021/10/10 - 11:18 pm', 'Dr Haja', 'BeautyPlus_20201212093245573_save.jpg', '1'),
(54, 'averstissement', 'Ne fait  pas de betise', 'clinique', '2021/10/10 - 11:28 pm', 'Dispensaire Mahomby', 'prise-rendez-vous-smartphone-homme_23-21485763841.jpg', '1'),
(55, 'message', 'Salut beckas', 'docteur', '2021/10/21 - 01:20 pm', 'Dr Lora', 'docteur.jpg', '1'),
(56, 'avertissement', 'Ne fait pas ca', 'docteur', '2021/10/21 - 01:21 pm', 'Dr Lora', 'docteur.jpg', '1');

-- --------------------------------------------------------

--
-- Structure de la table `notifpharmacie`
--

CREATE TABLE `notifpharmacie` (
  `IDNOTIFPHARMACIE` bigint(10) NOT NULL,
  `NOTIFPHARMACIE` char(255) NOT NULL,
  `DATENOTIFPHARMACIE` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `obtenir1`
--

CREATE TABLE `obtenir1` (
  `IDPATIENT` bigint(10) NOT NULL,
  `IDNOTIFPATIENT` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `obtenir1`
--

INSERT INTO `obtenir1` (`IDPATIENT`, `IDNOTIFPATIENT`) VALUES
(6, 55),
(6, 56);

-- --------------------------------------------------------

--
-- Structure de la table `obtenir2`
--

CREATE TABLE `obtenir2` (
  `IDDOCTEUR` bigint(10) NOT NULL,
  `IDNOTIFDOCTEUR` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `obtenir3`
--

CREATE TABLE `obtenir3` (
  `IDPHARMACIE` bigint(10) NOT NULL,
  `IDNOTIFPHARMACIE` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `obtenir4`
--

CREATE TABLE `obtenir4` (
  `IDCLINIQUE` bigint(10) NOT NULL,
  `IDNOTIFCLINIQUE` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `IDPANIER` bigint(10) NOT NULL,
  `IDPATIENT` bigint(10) NOT NULL,
  `IDMEDICAMENT` bigint(10) NOT NULL,
  `NOMMEDICAMENT` char(255) NOT NULL,
  `PRIXMEDICAMENT` char(255) NOT NULL,
  `QUANTITEMEDICAMENT` char(255) NOT NULL,
  `PHOTOMEDICAMENT` varchar(255) NOT NULL,
  `NOMBREMEDICAMENT` bigint(10) NOT NULL,
  `IDPHARMACIE` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`IDPANIER`, `IDPATIENT`, `IDMEDICAMENT`, `NOMMEDICAMENT`, `PRIXMEDICAMENT`, `QUANTITEMEDICAMENT`, `PHOTOMEDICAMENT`, `NOMBREMEDICAMENT`, `IDPHARMACIE`) VALUES
(12, 6, 16, 'Proteine', '20000', '500 g', 'flickr-marco-verch.jpg', 2, 2),
(13, 6, 17, 'Paracétamole', '100', '1 claquêtte', 'dd.jpg', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `panieragenda`
--

CREATE TABLE `panieragenda` (
  `IDPANIERAGENDA` bigint(10) NOT NULL,
  `IDPATIENT` bigint(10) DEFAULT NULL,
  `DATEAGENDA` char(255) NOT NULL,
  `HEUREAGENDA` char(255) NOT NULL,
  `IDCLINIQUE` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `passageadmine`
--

CREATE TABLE `passageadmine` (
  `IDPASSAGEADMIN` bigint(10) NOT NULL,
  `MAILADMIN` char(255) NOT NULL,
  `CLEADMIN` char(255) NOT NULL,
  `TYPEADMIN` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `passageadmine`
--

INSERT INTO `passageadmine` (`IDPASSAGEADMIN`, `MAILADMIN`, `CLEADMIN`, `TYPEADMIN`) VALUES
(1, 'doctopharme@gmail.com', '123456789', 'admine'),
(2, 'DrHaja@gmail.com', 'haja123123', 'docteur'),
(3, 'DrFanja@gmail.com', 'fanja123123', 'docteur'),
(4, 'DrHaingo@gmail.com', 'haingo123123', 'docteur'),
(5, 'DrFaly@gmail.com', 'faly123123', 'docteur'),
(6, 'DrTsiry@gmail.com', 'tsiry123123', 'docteur'),
(7, 'DrLolo@gmail.com', 'lolo123123', 'docteur'),
(8, 'Roberto@gmail.com', 'roberto35', 'pharmacie'),
(9, 'Fano@gmail.com', 'fano35', 'pharmacie'),
(10, 'Benja@gmail.com', 'benja10', 'clinique'),
(11, 'Lora@gmail.com', 'lora2020', 'docteur'),
(12, 'Tsiky@gmail.com', 'tsiky2020', 'docteur');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `IDPATIENT` bigint(10) NOT NULL,
  `NOMPATIENT` char(255) NOT NULL,
  `PRENOMPATIENT` char(255) NOT NULL,
  `ADRESSEPATIENT` char(255) NOT NULL,
  `MAILPATIENT` char(255) NOT NULL,
  `TELEPHONEPATIENT` char(255) NOT NULL,
  `SEXEPATIENT` char(255) NOT NULL,
  `CINPATIENT` char(255) NOT NULL,
  `DATENAISSANCEPATIENT` char(255) NOT NULL,
  `PROFESSIONPATIENT` char(255) NOT NULL,
  `PROVINCEPATIENT` char(255) NOT NULL,
  `REGIONPATIENT` char(255) NOT NULL,
  `DISTRICTPATIENT` char(255) NOT NULL,
  `COMMUNEPATIENT` char(255) NOT NULL,
  `PHOTOPATIENT` char(255) NOT NULL,
  `MDPPATIENT` char(255) NOT NULL,
  `STATUSPATIENT` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`IDPATIENT`, `NOMPATIENT`, `PRENOMPATIENT`, `ADRESSEPATIENT`, `MAILPATIENT`, `TELEPHONEPATIENT`, `SEXEPATIENT`, `CINPATIENT`, `DATENAISSANCEPATIENT`, `PROFESSIONPATIENT`, `PROVINCEPATIENT`, `REGIONPATIENT`, `DISTRICTPATIENT`, `COMMUNEPATIENT`, `PHOTOPATIENT`, `MDPPATIENT`, `STATUSPATIENT`) VALUES
(6, 'RAKOTONDRATSIMBA', 'Maminiaina', 'Lot VV 93Bis Manakambahiny', 'MAMINIAINAZAIN@gmail.com', '0326865274', 'Home', '123 456 788 120', '2021-10-08', 'Dévéloppeur', '1', '1', '114', '1551', '20526058_1736731126620274_2253807241471732977_ns.jpg', 'e10adc3949ba59abbe56e057f20f883e', 'inactif');

-- --------------------------------------------------------

--
-- Structure de la table `payementloyer`
--

CREATE TABLE `payementloyer` (
  `IDPAYEMENTLOYER` bigint(10) NOT NULL,
  `IDCLINIQUE` bigint(10) NOT NULL,
  `IDPHARMACIE` bigint(10) NOT NULL,
  `OPERATEURPAYEMENTLOYER` char(255) NOT NULL,
  `REFERENCEPAYEMENTLOYER` char(255) NOT NULL,
  `MOISPAYEMENTLOYER` char(255) NOT NULL,
  `VALIDATIONPAYEMENTLOYER` char(255) NOT NULL,
  `TYPEBOXE` char(255) NOT NULL,
  `DATEPAYEMENTLOYER` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `payementpharmacie`
--

CREATE TABLE `payementpharmacie` (
  `IDPAYEMENTPHARMACIE` bigint(10) NOT NULL,
  `IDPHARMACIE` bigint(10) DEFAULT NULL,
  `OPERATEURPAYEMENT` varchar(255) NOT NULL,
  `APARTENANCEPAYEMENT` char(255) NOT NULL,
  `NUMERO` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `payementpharmacie`
--

INSERT INTO `payementpharmacie` (`IDPAYEMENTPHARMACIE`, `IDPHARMACIE`, `OPERATEURPAYEMENT`, `APARTENANCEPAYEMENT`, `NUMERO`) VALUES
(3, 1, 'Mvola', 'RAKOTOBE Roberto', '0345465285'),
(4, 1, 'Airtel Money', 'RAKOTOBE Roberto', '0334698596'),
(5, 2, 'Orange Money', 'RAFANJAMANDIMBY Fano Mitsiry', '0326865174'),
(6, 2, 'Mvola', 'RAFANJAMANDIMBY Fano Mitsiry', '0346598596');

-- --------------------------------------------------------

--
-- Structure de la table `pharmacie`
--

CREATE TABLE `pharmacie` (
  `IDPHARMACIE` bigint(10) NOT NULL,
  `NOMPROPRIETAIREPHARMACIE` char(255) NOT NULL,
  `PRENOMPROPRIETAIREPHARMACIE` char(255) NOT NULL,
  `ADRESSEPROPRIETAIREPHARMACIE` char(255) NOT NULL,
  `TELEPHONEPROPRIETAIREPHARMACIE` char(255) NOT NULL,
  `MAILPROPRIETAIREPHARMACIE` char(255) NOT NULL,
  `CINPROPRIETAIREPHARMACIE` char(255) NOT NULL,
  `NOMPHARMACIE` char(255) NOT NULL,
  `ADRESSEPHARMACIE` char(255) NOT NULL,
  `TELEPHONEPHARMACIE` char(255) NOT NULL,
  `MAILPHARMACIE` char(255) NOT NULL,
  `LOGOPHAMACIE` char(255) NOT NULL,
  `TYPEPHARMACIE` char(255) NOT NULL,
  `JOUROUVERTUREPHARMACIE` char(255) NOT NULL,
  `HEUREOUVERTUREPHARMACIE` char(255) NOT NULL,
  `PROVINCEPHARMACIE` char(255) NOT NULL,
  `REGIONPHARMACIE` char(255) NOT NULL,
  `DISTRICTPHARMACIE` char(255) NOT NULL,
  `COMMUNEPHARMACIE` char(255) NOT NULL,
  `MDPPHARMACIE` char(255) NOT NULL,
  `STATUSPHARMACIE` char(255) NOT NULL,
  `CODEPHARMACIE` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pharmacie`
--

INSERT INTO `pharmacie` (`IDPHARMACIE`, `NOMPROPRIETAIREPHARMACIE`, `PRENOMPROPRIETAIREPHARMACIE`, `ADRESSEPROPRIETAIREPHARMACIE`, `TELEPHONEPROPRIETAIREPHARMACIE`, `MAILPROPRIETAIREPHARMACIE`, `CINPROPRIETAIREPHARMACIE`, `NOMPHARMACIE`, `ADRESSEPHARMACIE`, `TELEPHONEPHARMACIE`, `MAILPHARMACIE`, `LOGOPHAMACIE`, `TYPEPHARMACIE`, `JOUROUVERTUREPHARMACIE`, `HEUREOUVERTUREPHARMACIE`, `PROVINCEPHARMACIE`, `REGIONPHARMACIE`, `DISTRICTPHARMACIE`, `COMMUNEPHARMACIE`, `MDPPHARMACIE`, `STATUSPHARMACIE`, `CODEPHARMACIE`) VALUES
(1, 'RAKOTOBE', 'Roberto', 'Lot 5V Ambanidia', '0326565298', 'Roberto@gmail.com', '122 123 125 123', 'Mahavoky', 'Lot V5 Ambanidia', '0326468956', 'Mahavoky@gmail.com', 'pharmacie3.jpg', 'Garde', '7 jours / 7 Jours', '20h -16h 30min', '1', '1', '114', '1552', '9cd074b177e4ba6a0e10a7fcd7867c24', 'inactif', 'roberto35'),
(2, 'RAFANJAMANDIMBY', 'Fano Mitsiry', 'Lot WW 5 Ankorahotra', '0335569685', 'Fano@gmail.com', '111 111 122 111', 'Itokiana', 'Lot WW 5 Ankorahotra', '0334847896', 'Itokiana@gmail.com', 'drugstore-icon.png', 'Garde', '5 jours / 7 jours', '7h 30min - 16h', '1', '1', '114', '1551', '184968e9e297513ad01d48db1a239344', 'inactif', 'fano35');

-- --------------------------------------------------------

--
-- Structure de la table `province`
--

CREATE TABLE `province` (
  `IDPROVINCE` bigint(10) NOT NULL,
  `NOMPROVINCE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `province`
--

INSERT INTO `province` (`IDPROVINCE`, `NOMPROVINCE`) VALUES
(1, 'Antananarivo'),
(2, 'Antsiranana'),
(3, 'Fianarantsoa'),
(4, 'Mahajanga'),
(5, 'Toamasina'),
(6, 'Toliara');

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

CREATE TABLE `region` (
  `IDREGION` bigint(10) NOT NULL,
  `NOMREGION` varchar(255) NOT NULL,
  `IDPROVINCE` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`IDREGION`, `NOMREGION`, `IDPROVINCE`) VALUES
(1, 'Analamanga', 1),
(2, 'Bongolava', 1),
(3, 'Itasy', 1),
(4, 'Vakinankaratra', 1),
(6, 'Diana', 2),
(7, 'Sava', 2),
(8, 'Haute Matsiatra', 3),
(9, 'Amoron\'i Mania', 3),
(10, 'Ihorombe', 3),
(11, 'Atsimo Atsinanana', 3),
(12, 'Vatovavy Fitovinany', 3),
(13, 'Boeny', 4),
(14, 'Betsiboka', 4),
(15, 'Melaky', 4),
(16, 'Sofia', 4),
(17, 'Atsinanana', 5),
(18, 'Analanjirofo', 5),
(19, 'Alaotra Mangoro', 5),
(20, 'Atsimo Andrefana', 6),
(21, 'Anosy', 6),
(22, 'Androy', 6),
(23, 'Menabe', 6);

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

CREATE TABLE `rendezvous` (
  `IDRENDEZVOUS` bigint(10) NOT NULL,
  `IDCLINIQUE` bigint(10) NOT NULL,
  `DATERENDEZVOUS` char(255) NOT NULL,
  `HEURERENDEZVOUS` char(255) NOT NULL,
  `STATUSRENDEZVOUS` char(255) NOT NULL,
  `IDPATIENT` bigint(10) NOT NULL,
  `ANNE` varchar(255) NOT NULL,
  `MOIS` varchar(255) NOT NULL,
  `CREATED_AT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rendezvous`
--

INSERT INTO `rendezvous` (`IDRENDEZVOUS`, `IDCLINIQUE`, `DATERENDEZVOUS`, `HEURERENDEZVOUS`, `STATUSRENDEZVOUS`, `IDPATIENT`, `ANNE`, `MOIS`, `CREATED_AT`) VALUES
(11, 1, '2021-08-11', '14h à 15h', 'nonPasser', 6, '2021', '10', '21');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `IDRESERVATION` bigint(10) NOT NULL,
  `IDPATIENT` bigint(10) DEFAULT NULL,
  `IDCLINIQUE` bigint(10) NOT NULL,
  `DATEPRISE` char(255) NOT NULL,
  `HEUREPRISE` char(255) NOT NULL,
  `TICKET` char(255) NOT NULL,
  `VALIDATIONRESERVATION` char(255) NOT NULL,
  `REPONSEACCEPTER` varchar(255) NOT NULL,
  `REPONSEREFUSER` varchar(255) NOT NULL,
  `STATUSRESERVATION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`IDRESERVATION`, `IDPATIENT`, `IDCLINIQUE`, `DATEPRISE`, `HEUREPRISE`, `TICKET`, `VALIDATIONRESERVATION`, `REPONSEACCEPTER`, `REPONSEREFUSER`, `STATUSRESERVATION`) VALUES
(15, 6, 1, '2021-08-11', '14h à 15h', 'mpdf_(1)2.pdf', 'accepter', 'rzetjfdgjhkghj;', '', '1');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE `vente` (
  `IDVENTE` bigint(10) NOT NULL,
  `IDPHARMACIE` bigint(10) DEFAULT NULL,
  `MEDICAMENTVENTE` char(255) NOT NULL,
  `PRIXVENTE` int(11) NOT NULL,
  `FRAISLIVRAISON` int(11) NOT NULL,
  `ORDONANCE` char(255) NOT NULL,
  `IDPATIENT` bigint(10) NOT NULL,
  `ANNE` varchar(255) NOT NULL,
  `MOIS` varchar(255) NOT NULL,
  `CREATED_AT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`IDVENTE`, `IDPHARMACIE`, `MEDICAMENTVENTE`, `PRIXVENTE`, `FRAISLIVRAISON`, `ORDONANCE`, `IDPATIENT`, `ANNE`, `MOIS`, `CREATED_AT`) VALUES
(8, 2, 'Glicerince(1) : 1000.00 Ar x 1 = 1000.00 Ar,Proteine(1) : 20000.00 Ar x 1 = 20000.00 Ar,', 21000, 21000, '', 6, '2021', '10', '2021/10/21 - 01:27 pm');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`IDACHAT`),
  ADD KEY `I_FK_ACHAT_PHARMACIE` (`IDPHARMACIE`),
  ADD KEY `I_FK_ACHAT_PATIENT` (`IDPATIENT`);

--
-- Index pour la table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`IDAGENDA`),
  ADD KEY `I_FK_AGENDA_CLINIQUE` (`IDCLINIQUE`);

--
-- Index pour la table `clinique`
--
ALTER TABLE `clinique`
  ADD PRIMARY KEY (`IDCLINIQUE`);

--
-- Index pour la table `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`IDCOMMUNE`),
  ADD KEY `fk_commune_district` (`IDDISTRICT`);

--
-- Index pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`IDCONSULTATION`),
  ADD KEY `I_FK_CONSULTATION_DOCTEUR` (`IDDOCTEUR`),
  ADD KEY `I_FK_CONSULTATION_PATIENT` (`IDPATIENT`);

--
-- Index pour la table `discuter`
--
ALTER TABLE `discuter`
  ADD PRIMARY KEY (`IDDOCTEUR`,`IDFORUM`),
  ADD KEY `I_FK_DISCUTER_DOCTEUR` (`IDDOCTEUR`),
  ADD KEY `I_FK_DISCUTER_FORUM` (`IDFORUM`);

--
-- Index pour la table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`IDDISTRICT`),
  ADD KEY `fk_district_region` (`IDREGION`);

--
-- Index pour la table `docteur`
--
ALTER TABLE `docteur`
  ADD PRIMARY KEY (`IDDOCTEUR`);

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`IDFORUM`);

--
-- Index pour la table `heureagenda`
--
ALTER TABLE `heureagenda`
  ADD PRIMARY KEY (`IDHEUREAGENDA`),
  ADD KEY `I_FK_HEUREAGENDA_AGENDA` (`IDAGENDA`);

--
-- Index pour la table `loyerboxe`
--
ALTER TABLE `loyerboxe`
  ADD PRIMARY KEY (`IDLOYERBOXE`);

--
-- Index pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD PRIMARY KEY (`IDMEDICAMENT`);

--
-- Index pour la table `notifboxe`
--
ALTER TABLE `notifboxe`
  ADD PRIMARY KEY (`IDNOTIFBOXE`);

--
-- Index pour la table `notifclinique`
--
ALTER TABLE `notifclinique`
  ADD PRIMARY KEY (`IDNOTIFCLINIQUE`);

--
-- Index pour la table `notifdocteur`
--
ALTER TABLE `notifdocteur`
  ADD PRIMARY KEY (`IDNOTIFDOCTEUR`);

--
-- Index pour la table `notifpatient`
--
ALTER TABLE `notifpatient`
  ADD PRIMARY KEY (`IDNOTIFPATIENT`);

--
-- Index pour la table `notifpharmacie`
--
ALTER TABLE `notifpharmacie`
  ADD PRIMARY KEY (`IDNOTIFPHARMACIE`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`IDPANIER`);

--
-- Index pour la table `panieragenda`
--
ALTER TABLE `panieragenda`
  ADD PRIMARY KEY (`IDPANIERAGENDA`);

--
-- Index pour la table `passageadmine`
--
ALTER TABLE `passageadmine`
  ADD PRIMARY KEY (`IDPASSAGEADMIN`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`IDPATIENT`);

--
-- Index pour la table `payementloyer`
--
ALTER TABLE `payementloyer`
  ADD PRIMARY KEY (`IDPAYEMENTLOYER`);

--
-- Index pour la table `payementpharmacie`
--
ALTER TABLE `payementpharmacie`
  ADD PRIMARY KEY (`IDPAYEMENTPHARMACIE`);

--
-- Index pour la table `pharmacie`
--
ALTER TABLE `pharmacie`
  ADD PRIMARY KEY (`IDPHARMACIE`);

--
-- Index pour la table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`IDPROVINCE`);

--
-- Index pour la table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`IDREGION`);

--
-- Index pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD PRIMARY KEY (`IDRENDEZVOUS`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`IDRESERVATION`);

--
-- Index pour la table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`IDVENTE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `achat`
--
ALTER TABLE `achat`
  MODIFY `IDACHAT` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `IDAGENDA` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `clinique`
--
ALTER TABLE `clinique`
  MODIFY `IDCLINIQUE` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `commune`
--
ALTER TABLE `commune`
  MODIFY `IDCOMMUNE` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1557;

--
-- AUTO_INCREMENT pour la table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `IDCONSULTATION` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `district`
--
ALTER TABLE `district`
  MODIFY `IDDISTRICT` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT pour la table `docteur`
--
ALTER TABLE `docteur`
  MODIFY `IDDOCTEUR` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `IDFORUM` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `heureagenda`
--
ALTER TABLE `heureagenda`
  MODIFY `IDHEUREAGENDA` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT pour la table `loyerboxe`
--
ALTER TABLE `loyerboxe`
  MODIFY `IDLOYERBOXE` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `medicament`
--
ALTER TABLE `medicament`
  MODIFY `IDMEDICAMENT` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `notifboxe`
--
ALTER TABLE `notifboxe`
  MODIFY `IDNOTIFBOXE` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `notifclinique`
--
ALTER TABLE `notifclinique`
  MODIFY `IDNOTIFCLINIQUE` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `notifdocteur`
--
ALTER TABLE `notifdocteur`
  MODIFY `IDNOTIFDOCTEUR` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `notifpatient`
--
ALTER TABLE `notifpatient`
  MODIFY `IDNOTIFPATIENT` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `notifpharmacie`
--
ALTER TABLE `notifpharmacie`
  MODIFY `IDNOTIFPHARMACIE` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `IDPANIER` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `panieragenda`
--
ALTER TABLE `panieragenda`
  MODIFY `IDPANIERAGENDA` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `passageadmine`
--
ALTER TABLE `passageadmine`
  MODIFY `IDPASSAGEADMIN` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `IDPATIENT` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `payementloyer`
--
ALTER TABLE `payementloyer`
  MODIFY `IDPAYEMENTLOYER` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `payementpharmacie`
--
ALTER TABLE `payementpharmacie`
  MODIFY `IDPAYEMENTPHARMACIE` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `pharmacie`
--
ALTER TABLE `pharmacie`
  MODIFY `IDPHARMACIE` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `province`
--
ALTER TABLE `province`
  MODIFY `IDPROVINCE` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `region`
--
ALTER TABLE `region`
  MODIFY `IDREGION` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  MODIFY `IDRENDEZVOUS` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `IDRESERVATION` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `vente`
--
ALTER TABLE `vente`
  MODIFY `IDVENTE` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
