-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Lun 05 Septembre 2016 à 16:18
-- Version du serveur :  5.7.14
-- Version de PHP :  5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `PokeEvol`
--

-- --------------------------------------------------------

--
-- Structure de la table `pokemon`
--

CREATE TABLE `pokemon` (
  `id` int(11) NOT NULL,
  `numeroPokedex` int(11) NOT NULL,
  `NomPokemon` varchar(255) NOT NULL,
  `NbBonbonEvol` int(11) NOT NULL,
  `NomBonbonEvol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pokemon`
--

INSERT INTO `pokemon` (`id`, `numeroPokedex`, `NomPokemon`, `NbBonbonEvol`, `NomBonbonEvol`) VALUES
(1, 1, 'Bulbizarre', 25, 'Bulbizarre'),
(2, 2, 'Herbizarre', 50, 'Bulbizarre'),
(3, 3, 'Florizarre', 0, 'Bulbizarre'),
(4, 4, 'Salameche', 25, 'Salameche'),
(5, 5, 'Reptincel', 100, 'Salameche'),
(6, 6, 'Dracaufeu', 0, 'Salameche'),
(7, 7, 'Carapuce', 25, 'Carapuce'),
(8, 8, 'Carabaffe', 100, 'Carapuce'),
(9, 9, 'Tortank', 0, 'Carapuce'),
(10, 10, 'Chenipan', 12, 'Chenipan'),
(11, 11, 'Chrysacier', 50, 'Chenipan'),
(12, 12, 'Papillusion', 0, 'Chenipan'),
(13, 13, 'Aspicot', 12, 'Aspicot'),
(14, 14, 'Coconfort', 50, 'Aspicot'),
(15, 15, 'Dardargnan', 0, 'Aspicot'),
(16, 16, 'Roucool', 12, 'Roucool'),
(17, 17, 'Roucoups', 50, ' Roucool'),
(18, 18, 'Roucarnage', 0, ' Roucool'),
(19, 19, 'Rattata', 25, 'Rattata'),
(20, 20, 'Rattatac', 0, 'Rattata'),
(21, 21, 'Piafabec', 50, 'Piafabec'),
(22, 22, 'Rapasdepic', 0, 'Piafabec'),
(23, 23, 'Abo', 50, ' Abo'),
(24, 24, 'Arbok', 0, ' Abo'),
(25, 25, 'Pikachu', 50, ' Pikachu'),
(26, 26, 'Raichu', 0, ' Pikachu'),
(27, 27, 'Sabelette', 50, 'Sabelette'),
(28, 28, 'Sablaireau', 0, 'Sabelette'),
(29, 29, 'NidoranF', 25, 'NidoranF'),
(30, 30, 'Nidorina', 100, 'NidoranF'),
(31, 31, 'Nidoqueen', 0, 'NidoranF'),
(32, 32, 'NidoranM', 25, 'NidoranM'),
(33, 33, 'Nidorino', 100, 'NidoranM'),
(34, 34, 'Nidoking', 0, 'NidoranM'),
(35, 35, 'Melofee', 50, 'Melofee'),
(36, 36, 'Melodelfe', 0, 'Melofee'),
(37, 37, 'Goupix', 50, 'Goupix'),
(38, 38, 'Feunard', 0, 'Goupix'),
(39, 39, 'Rondoudou', 50, 'Rondoudou'),
(40, 40, 'Grodoudou', 0, 'Rondoudou'),
(41, 41, 'Nosferapti', 50, 'Nosferapti'),
(42, 42, 'Nosferalto', 0, 'Nosferapti'),
(43, 43, 'Mystherbe', 25, 'Mystherbe'),
(44, 44, 'Ortide', 100, 'Mystherbe'),
(45, 45, 'Rafflesia', 0, 'Mystherbe'),
(46, 46, 'Paras', 50, 'Paras'),
(47, 47, 'Parasect', 0, 'Paras'),
(48, 48, 'Mimitoss', 50, 'Mimitoss'),
(49, 49, 'Aeromite', 0, 'Mimitoss'),
(50, 50, 'Taupiqueur', 50, 'Taupiqueur'),
(51, 51, 'Triopikeur', 0, 'Taupiqueur'),
(52, 52, 'Miaouss', 50, 'Miaouss'),
(53, 53, 'Persian', 0, 'Miaouss'),
(54, 54, 'Psykokwak', 50, 'Psykokwak'),
(55, 55, 'Akwakwak', 0, 'Psykokwak'),
(56, 56, 'Ferosinge', 50, 'Ferosinge'),
(57, 57, 'Colossinge', 0, 'Ferosinge'),
(58, 58, 'Caninos', 50, 'Caninos'),
(59, 59, 'Arcanin', 0, 'Caninos'),
(60, 60, 'Ptitard', 25, 'Ptitard'),
(61, 61, 'Tetarte', 100, 'Ptitard'),
(62, 62, 'Tartard', 0, 'Ptitard'),
(63, 63, 'Abra', 25, 'Abra'),
(64, 64, 'Kadabra', 100, 'Abra'),
(65, 65, 'Alakazam', 0, 'Abra'),
(66, 66, 'Machoc', 25, 'Machoc'),
(67, 67, 'Machopeur', 100, 'Machoc'),
(68, 68, 'Mackogneur', 0, 'Machoc'),
(69, 69, 'Chetiflor', 25, 'Chetiflor'),
(70, 70, 'Boustiflor', 100, 'Chetiflor'),
(71, 71, 'Empiflor', 0, 'Chetiflor'),
(72, 72, 'Tentacool', 50, 'Tentacool'),
(73, 73, 'Tentacruel', 0, 'Tentacool'),
(74, 74, 'Racaillou', 25, 'Racaillou'),
(75, 75, 'Gravalanch', 100, 'Racaillou'),
(76, 76, 'Grolem', 0, 'Racaillou'),
(77, 77, 'Ponyta', 50, 'Ponyta'),
(78, 78, 'Galopa', 0, 'Ponyta'),
(79, 79, 'Ramoloss', 50, 'Ramoloss'),
(80, 80, 'Flagadoss', 0, 'Ramoloss'),
(81, 81, 'Magneti', 50, 'Magneti'),
(82, 82, 'Magneton', 0, 'Magneti'),
(83, 83, 'Canarticho', 0, 'Canarticho'),
(84, 84, 'Doduo', 50, 'Doduo'),
(85, 85, 'Dodrio', 0, 'Doduo'),
(86, 86, 'Otaria', 50, 'Otaria'),
(87, 87, 'Lamantine', 0, 'Otaria'),
(88, 88, 'Tadmorv', 50, 'Tadmorv'),
(89, 89, 'Grotadmorv', 0, 'Tadmorv'),
(90, 90, 'Kokiyas', 50, 'Kokiyas'),
(91, 91, 'Crustabri', 0, 'Kokiyas'),
(92, 92, 'Fantominus', 25, 'Fantominus'),
(93, 93, 'Spectrum', 100, 'Fantominus'),
(94, 94, 'Ectoplasma', 0, 'Fantominus'),
(95, 95, 'Onix', 0, 'Onix'),
(96, 96, 'Soporifik', 50, 'Soporifik'),
(97, 97, 'Hypnomade', 0, 'Soporifik'),
(98, 98, 'Kraby', 50, 'Kraby'),
(99, 99, 'Krabboss', 0, 'Kraby'),
(100, 100, 'Voltorbe', 50, 'Voltorbe'),
(101, 101, 'Electrode', 0, 'Voltorbe'),
(102, 102, 'Noeunoeuf', 50, 'Noeunoeuf'),
(103, 103, 'Noadkoko', 0, 'Noadkoko'),
(104, 104, 'Osselait', 50, 'Osselait'),
(105, 105, 'Ossatueur', 0, 'Osselait'),
(106, 106, 'Kicklee', 0, 'Kicklee'),
(107, 107, 'Tygnon', 0, 'Tygnon'),
(108, 108, 'Excelangue', 0, 'Excelangue'),
(109, 109, 'Smogo', 50, 'Smogo'),
(110, 110, 'Smogogo', 0, 'Smogo'),
(111, 111, 'Rhinocorne', 50, 'Rhinocorne'),
(112, 112, 'Rhinoferos', 0, 'Rhinocorne'),
(113, 113, 'Leveinard', 0, 'Leveinard'),
(114, 114, 'Saquedeneu', 0, 'Saquedeneu'),
(115, 115, 'Kangourex', 0, 'Kangourex'),
(116, 116, 'Hypotrempe', 50, 'Hypotrempe'),
(117, 117, 'Hypocean', 0, 'Hypotrempe'),
(118, 118, 'Poissirene', 50, 'Poissirene'),
(119, 119, 'Poissoroy', 0, 'Poissirene'),
(120, 120, 'Stari', 50, 'Stari'),
(121, 121, 'Staross', 0, 'Stari'),
(122, 122, 'M. Mime', 0, 'M. Mime'),
(123, 123, 'Insecateur', 0, 'Insecateur'),
(124, 124, 'Lippoutou', 0, 'Lippoutou'),
(125, 125, 'Elektek', 0, 'Elektek'),
(126, 126, 'Magmar', 0, 'Magmar'),
(127, 127, 'Scarabrute', 0, 'Scarabrute'),
(128, 128, 'Tauros', 0, 'Tauros'),
(129, 129, 'Magicarpe', 400, 'Magicarpe'),
(130, 130, 'Leviator', 0, 'Magicarpe'),
(131, 131, 'Lokhlass', 0, 'Lokhlass'),
(132, 132, 'Metamorph', 0, 'Metamorph'),
(133, 133, 'Evoli', 25, 'Evoli'),
(134, 134, ' Aquali', 0, 'Evoli'),
(135, 135, ' Voltali', 0, 'Evoli'),
(136, 136, 'Pyroli', 0, 'Evoli'),
(137, 137, 'Porygon', 0, 'Porygon'),
(138, 138, 'Amonita', 50, 'Amonita'),
(139, 139, 'Amonistar', 0, 'Amonita'),
(140, 140, 'Kabuto', 50, 'Kabuto'),
(141, 141, 'Kabutops', 0, 'Kabuto'),
(142, 142, 'Ptera', 0, 'Ptera'),
(143, 143, 'Ronflex', 0, 'Ronflex'),
(144, 144, 'Artikodin', 0, 'Artikodin'),
(145, 145, 'Electhor', 0, 'Electhor'),
(146, 146, 'Sulfura', 0, 'Sulfura'),
(147, 147, 'Minidraco', 25, 'Minidraco'),
(148, 148, 'Draco', 100, 'Minidraco'),
(149, 149, 'Dracolosse', 0, 'Minidraco'),
(150, 150, 'Mewtwo', 0, 'Mewtwo'),
(151, 151, 'Mew', 0, 'Mew');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
