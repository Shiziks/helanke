-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 21, 2019 at 07:33 AM
-- Server version: 10.3.13-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id9026790_helanke`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketaodgovori`
--

CREATE TABLE `anketaodgovori` (
  `idodgovor` int(100) NOT NULL,
  `odgvoor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `aktivno` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anketaodgovori`
--

INSERT INTO `anketaodgovori` (`idodgovor`, `odgvoor`, `aktivno`) VALUES
(5, 'Izuzetno', 1),
(6, 'Delimično', 1),
(7, 'Nemam mišljenje', 1),
(8, 'Nisam zadovoljan/zadovoljna', 1);

-- --------------------------------------------------------

--
-- Table structure for table `anketapitanja`
--

CREATE TABLE `anketapitanja` (
  `idpitanja` int(50) NOT NULL,
  `pitanje` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `aktivno` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anketapitanja`
--

INSERT INTO `anketapitanja` (`idpitanja`, `pitanje`, `aktivno`) VALUES
(1, 'Zadovoljni našim proizvodima', 1),
(2, 'Zadovoljni našim našinom dostave', 1),
(3, 'Zadovoljni našom službom za podršku', 1);

-- --------------------------------------------------------

--
-- Table structure for table `anketapitanjaodgovori`
--

CREATE TABLE `anketapitanjaodgovori` (
  `idpitanjeodgovor` int(100) NOT NULL,
  `idpitanje` int(100) NOT NULL,
  `idodgovor` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `anketapitanjaodgovori`
--

INSERT INTO `anketapitanjaodgovori` (`idpitanjeodgovor`, `idpitanje`, `idodgovor`) VALUES
(1, 1, 5),
(2, 1, 6),
(3, 1, 7),
(4, 1, 8),
(5, 2, 5),
(6, 2, 6),
(7, 2, 7),
(8, 2, 8),
(9, 3, 5),
(10, 3, 6),
(11, 3, 7),
(12, 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `anketarezultati`
--

CREATE TABLE `anketarezultati` (
  `idrezultati` int(11) NOT NULL,
  `idpitanje` int(11) NOT NULL,
  `idodgovor` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `boje`
--

CREATE TABLE `boje` (
  `idboja` int(20) NOT NULL,
  `nazivboje` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `boje`
--

INSERT INTO `boje` (`idboja`, `nazivboje`) VALUES
(1, 'roze'),
(2, 'plava'),
(3, 'zelena'),
(4, 'žuta'),
(5, 'crna'),
(6, 'bela'),
(7, 'braon'),
(8, 'siva'),
(9, 'crvena');

-- --------------------------------------------------------

--
-- Table structure for table `cena`
--

CREATE TABLE `cena` (
  `idcena` int(200) NOT NULL,
  `cena` decimal(50,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cena`
--

INSERT INTO `cena` (`idcena`, `cena`) VALUES
(5, 1500),
(6, 1999),
(2, 2500),
(4, 2999),
(3, 3200),
(1, 3500);

-- --------------------------------------------------------

--
-- Table structure for table `gradovi`
--

CREATE TABLE `gradovi` (
  `idgrad` int(50) NOT NULL,
  `nazivgrada` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gradovi`
--

INSERT INTO `gradovi` (`idgrad`, `nazivgrada`) VALUES
(1, 'Beograd'),
(2, 'Novi Sad'),
(3, 'Niš'),
(4, 'Kraljevo');

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `idkategorija` int(3) NOT NULL,
  `nazivkategorije` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`idkategorija`, `nazivkategorije`) VALUES
(1, 'dugačke'),
(2, 'midi'),
(3, 'šorc');

-- --------------------------------------------------------

--
-- Table structure for table `kategorijeostalihslika`
--

CREATE TABLE `kategorijeostalihslika` (
  `idkategorije` int(2) NOT NULL,
  `nazivkategorije` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorijeostalihslika`
--

INSERT INTO `kategorijeostalihslika` (`idkategorije`, `nazivkategorije`) VALUES
(2, 'baner'),
(1, 'slider');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `idkorisnika` int(100) NOT NULL,
  `ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `idgrad` int(100) NOT NULL,
  `iduloga` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`idkorisnika`, `ime`, `prezime`, `email`, `password`, `idgrad`, `iduloga`) VALUES
(28, 'Mika', 'Mikic', 'mika@gmail.com', '01a13089d289faceeb2fbd9b3bf4a35e', 1, 16),
(29, 'Laza', 'Lazic', 'laza@gmail.com', 'de2c6f05a369a10303b43e209a4677c9', 2, 16),
(30, 'Pera', 'Peric', 'pera@gmail.com', '553148df669e13da2bd454efbbe37200', 4, 16),
(34, 'Ivan', 'Ivic', 'ivan@gmail.com', '509168e1ba2691ce3488128e08f81efa', 2, 16),
(35, 'Milica', 'Milic', 'milica@gmail.com', 'da2229e0bf8c6851dc5a0272ff159f02', 1, 16),
(36, 'Leka', 'Lekic', 'leka@hotmail.com', '40a830ce2e34afee61f1ca920dce7ce6', 4, 16),
(37, 'Ivana', 'Ivanic', 'ivana@hotmail.com', '8a35c6eed4aa40511d142250e4a17e64', 4, 16);

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `idmeni` int(20) NOT NULL,
  `stavka` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `glavnimeni` tinyint(1) NOT NULL,
  `bocnimeni` tinyint(1) NOT NULL,
  `podmeni` tinyint(1) NOT NULL,
  `indeks` int(20) NOT NULL,
  `bocnimeniindeks` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`idmeni`, `stavka`, `link`, `glavnimeni`, `bocnimeni`, `podmeni`, `indeks`, `bocnimeniindeks`) VALUES
(18, 'Početna', '/index.php', 1, 0, 0, 1, 0),
(19, 'Proizvodi', '/prodavnica/prodavnica.php', 1, 0, 0, 2, 0),
(20, 'Kategorije', '/prodavnica/kategorije.php', 1, 0, 1, 3, 0),
(21, 'Nova Kolekcija', '/prodavnica/novakolekcija.php', 1, 1, 0, 4, 4),
(22, 'Sniženje', '/prodavnica/snizenje.php', 1, 1, 0, 5, 5),
(23, 'O Autoru', '/autor.php', 1, 0, 0, 6, 0),
(24, 'Anketa', '/anketa.php', 1, 0, 0, 7, 0),
(25, 'Logovanje', '/korisnik/logovanje.php', 1, 0, 0, 8, 0),
(26, 'Dugačke Helanke', '/prodanica/kategorije.php?idk=1', 0, 1, 0, 0, 1),
(27, 'Midi Helanke', '/prodavnica/kategorije.php?idk=2', 0, 1, 0, 0, 2),
(28, 'Šorcevi', '/prodavnica/kategorije.php?idk=3', 0, 1, 0, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ostaleslike`
--

CREATE TABLE `ostaleslike` (
  `idostaleslike` int(20) NOT NULL,
  `nazivslike` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `naslov1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `naslov2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tekst` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `putanja` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `markersignup` tinyint(1) NOT NULL,
  `idkategorija` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ostaleslike`
--

INSERT INTO `ostaleslike` (`idostaleslike`, `nazivslike`, `naslov1`, `naslov2`, `tekst`, `putanja`, `link`, `markersignup`, `idkategorija`) VALUES
(1, 'slider1', 'Proleće 2019', 'Nova Kolekcija', 'Pogledaj', '/slike/ostale/slider1.jpg', '', 0, 1),
(2, 'slider2', 'Samo Za Vas', 'Svi Proizvodi', 'Pogledaj', '/slike/ostale/slider2.jpg', '', 0, 1),
(3, 'slider3', 'Najbolja Ponuda', 'Sniženje', 'Pogledaj', '/slike/ostale/slider3.jpg', '', 0, 1),
(4, 'slika1', 'Dugačke', '', 'dugačke helanke', '/slike/ostale/slika1.jpg', '', 0, 2),
(5, 'slika2', 'Sniženje', '', 'proizvodi na popustu', '/slike/ostale/slika2.jpg', '', 0, 2),
(6, 'slika3', 'Midi', '', 'midi helanke', '/slike/ostale/slika3.jpg', '', 0, 2),
(7, 'slika4', 'Kolekcija', '', 'svi proizvodi', '/slike/ostale/slika4.jpg', '', 0, 2),
(8, 'slika5', 'Šorcevi', '', 'šorcevi', '/slike/ostale/slika5.jpg', '', 0, 2),
(9, 'slika6', 'Prijavi Se', '', 'Prijavi se i dobićeš 20% popusta', '/slike/ostale/slika6.jpg', '', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `podmeni`
--

CREATE TABLE `podmeni` (
  `idpodmeni` int(100) NOT NULL,
  `stavka` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idmeni` int(11) NOT NULL,
  `indekspodmeni` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `podmeni`
--

INSERT INTO `podmeni` (`idpodmeni`, `stavka`, `link`, `idmeni`, `indekspodmeni`) VALUES
(1, 'Dugačke Helanke', 'prodavnica/kategorije.php?idk=1', 20, 1),
(2, 'Midi Helanke', 'prodavnica/kategorije.php?idk=2', 20, 1),
(3, 'Šorcevi', 'prodavnica/kategorije.php?idk=3', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `idproizvod` int(100) NOT NULL,
  `nazivproizvoda` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `popust` tinyint(1) NOT NULL,
  `popust50` tinyint(1) NOT NULL,
  `popust25` tinyint(1) NOT NULL,
  `popust10` tinyint(1) NOT NULL,
  `novakolekcija` tinyint(1) NOT NULL,
  `idkategorija` int(3) NOT NULL,
  `idcena` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`idproizvod`, `nazivproizvoda`, `link`, `opis`, `popust`, `popust50`, `popust25`, `popust10`, `novakolekcija`, `idkategorija`, `idcena`) VALUES
(3, 'Leopard Visoki Struk', '', 'Naš najprepoznatljiviji dizajn koji možete nositi za svaku priliku. Univerzalan i idealan za svakodnevne aktivnosti.', 0, 0, 0, 0, 0, 1, 3),
(4, 'Mermerno Plavo', '', 'Nežan dizajn u bojama koje svima stoje. Helanke sa visokim dtrukom idealne za sportske aktivnosti.', 0, 0, 0, 0, 0, 1, 3),
(5, 'Military Roze', '', 'Dezen roze boje za sve dame koje se osećaju nežno. Idealan kako za sportske aktivnosti tako i za svakodnevne prilike.', 0, 0, 0, 0, 1, 1, 1),
(6, 'Roze Sazvežđe', '', 'Sazvežđe je jedan od naših najpopularnijih dezena koji možete nositi u svakoj prilici. ', 1, 0, 1, 0, 0, 1, 3),
(7, 'Mermerno Sive', '', 'Boje ovog dezena su neutralne zbog čega se on savršeno slaže sa drugim bojama. Lako ćete ge uklopiti sa svim odevnim kombinacijama.', 0, 0, 0, 0, 0, 1, 1),
(8, 'Zmijina Koža ', '', 'Elegantnan dezen koji možete nositi kako za sportske aktivnosti tako i u svakodnevnom životu.', 1, 1, 0, 0, 0, 1, 4),
(9, 'Čipkani Detalji', '', 'Helanke sa čipkanim detaljima koje su savršene za nošenje u svakodnevnom životu. Materijal od kog su napravljene u toku sportskih aktivnosti dozvoljava vašoj koži da diše.', 1, 0, 0, 1, 0, 2, 4),
(10, 'Mrežasti Detalji', '', 'Helanke sa mrežastim detaljima će vam se uklopiti sa svim odevnim kombinacijama. U toku sportskih aktivnosti ovaj materijal dozvoljava vašoj koži da diše.', 0, 0, 0, 0, 0, 2, 2),
(11, 'Roze Leopard', '', 'Nas najprodavaniji print od sada i u roze boji. ', 0, 0, 0, 0, 1, 2, 2),
(12, 'Crveni Cvetni Print', '', 'Smeli dezen crvene boje za sve one koji se osećaju jedinstveno.', 1, 1, 0, 0, 0, 2, 2),
(13, 'Tropski Print', '', 'Tropski print koji će obogatiti vaše prolećne odevne kombinacije.', 0, 0, 0, 0, 0, 2, 6),
(14, 'Plavi Zodijak ', '', 'Naš novi print savršene boje idealan za sve prilike.', 0, 0, 0, 0, 1, 2, 4),
(15, 'Prolećni Cvetovi', '', 'Spremni dočekajte leto u cvetnom dezenu.', 0, 0, 0, 0, 1, 3, 2),
(16, 'Senf Žuto Cveće', '', 'Senf boja koju svi vole u kombinaciji sa sivim svećem, nikoga neće ostaviti ravnodušnim.', 0, 0, 0, 0, 0, 3, 6),
(17, 'Crne Tufne', '', 'Šorc sa crnim tufnama koji je idealan za plažu ali i za vrele letnje dane.', 0, 0, 0, 0, 1, 3, 2),
(18, 'Crni Volani', '', 'Šorc od našeg najnovijeg platna koji će vam savršeno stajati.', 1, 0, 1, 0, 0, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `proizvodiboje`
--

CREATE TABLE `proizvodiboje` (
  `idproizvodiboje` int(20) NOT NULL,
  `idboja` int(20) NOT NULL,
  `idproizvod` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvodiboje`
--

INSERT INTO `proizvodiboje` (`idproizvodiboje`, `idboja`, `idproizvod`) VALUES
(1, 5, 9),
(2, 6, 17),
(3, 5, 18),
(4, 1, 5),
(5, 7, 3),
(6, 2, 4),
(7, 7, 10),
(8, 2, 14),
(9, 6, 15),
(10, 1, 11),
(11, 1, 6),
(12, 4, 16),
(13, 3, 13),
(14, 2, 8),
(15, 9, 12),
(16, 8, 7);

-- --------------------------------------------------------

--
-- Table structure for table `proizvodivelicine`
--

CREATE TABLE `proizvodivelicine` (
  `idproizvodvelicina` int(3) NOT NULL,
  `idproizvod` int(3) NOT NULL,
  `idvelicina` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvodivelicine`
--

INSERT INTO `proizvodivelicine` (`idproizvodvelicina`, `idproizvod`, `idvelicina`) VALUES
(1, 17, 1),
(2, 17, 3),
(3, 17, 4),
(4, 17, 5),
(5, 18, 1),
(6, 18, 3),
(7, 18, 2),
(8, 18, 4),
(9, 12, 2),
(10, 12, 3),
(11, 12, 5),
(12, 3, 1),
(13, 3, 2),
(14, 3, 3),
(15, 3, 4),
(16, 4, 2),
(17, 4, 3),
(18, 4, 4),
(19, 4, 5),
(20, 4, 6),
(21, 7, 5),
(22, 7, 4),
(23, 7, 6),
(24, 7, 2),
(25, 7, 1),
(26, 5, 1),
(27, 5, 2),
(28, 5, 3),
(29, 5, 4),
(30, 5, 5),
(31, 5, 6),
(32, 10, 1),
(33, 10, 3),
(34, 10, 5),
(35, 14, 1),
(36, 14, 2),
(37, 14, 3),
(38, 14, 4),
(39, 14, 5),
(40, 14, 6),
(41, 15, 5),
(42, 15, 4),
(43, 15, 3),
(44, 11, 1),
(45, 11, 2),
(46, 11, 3),
(47, 11, 4),
(48, 11, 5),
(49, 11, 6),
(50, 6, 5),
(51, 6, 4),
(52, 6, 3),
(53, 16, 1),
(54, 16, 2),
(55, 16, 3),
(56, 16, 4),
(57, 16, 5),
(58, 16, 6),
(59, 13, 1),
(60, 13, 2),
(61, 13, 3),
(62, 13, 4),
(63, 13, 5),
(64, 13, 6),
(65, 8, 5),
(66, 8, 3),
(67, 8, 6),
(68, 9, 1),
(69, 9, 3),
(70, 9, 4),
(71, 9, 6);

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

CREATE TABLE `slike` (
  `idslike` int(30) NOT NULL,
  `nazivslike` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `putanja` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `idproizvod` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slike`
--

INSERT INTO `slike` (`idslike`, `nazivslike`, `alt`, `putanja`, `idproizvod`) VALUES
(1, 'leopard1', 'dugačke helanke leopard print napred', '/slike/dugacke/leopard1.jpg', 3),
(2, 'leopard2', 'dugačke helanke leopard print strana', '/slike/dugacke/leopard2.jpg', 3),
(3, 'leopard3', 'dugačke helanke leopard print nazad', '/slike/dugacke/leopard3.jpg', 3),
(4, 'mermer1', 'Dugačke mermerno plave helanke spreda', '/slike/dugacke/mermer1.jpg', 4),
(5, 'mermer2', 'Dugačke mermerno plave helanke strana', '/slike/dugacke/mermer2.jpg', 4),
(6, 'mermer3', 'Dugačke mermerno plave helanke nazad', '/slike/dugacke/mermer3.jpg', 4),
(7, 'pinkmilitary1', 'Dugačke helanke Military roze napred', '/slike/dugacke/pinkmilitary1.jpg', 5),
(8, 'pinkmilitary2', 'Dugačke helanke Military roze strana', '/slike/dugacke/pinkmilitary2.jpg', 5),
(9, 'pinkmilitary3', 'Dugačke helanke Military roze nazad', '/slike/dugacke/pinkmilitary3.jpg', 5),
(10, 'sazvezdje1', 'dugačke helanke sa roze zvezdama napred', '/slike/dugacke/sazvezdje1.jpg', 6),
(11, 'sazvezdje2', 'dugačke helanke sa roze zvezdama strana', '/slike/dugacke/sazvezdje2.jpg', 6),
(12, 'sazvezdje3', 'dugačke helanke sa roze zvezdama nazad', '/slike/dugacke/sazvezdje3.jpg', 6),
(16, 'svetlimermer1', 'dugačke helanke mermernog dezena napred', '/slike/dugacke/svetlimermer1.jpg', 7),
(17, 'svetlimermer2', 'dugačke helanke mermernog dezena strana', '/slike/dugacke/svetlimermer2.jpg', 7),
(18, 'svetlimermer3', 'dugačke helanke mermernog dezena nazad', '/slike/dugacke/svetlimermer3.jpg', 7),
(19, 'zmija1', 'dugačke helanke dezena zmijine kože napred', '/slike/dugacke/zmija1.jpg', 8),
(20, 'zmija2', 'dugačke helanke dezena zmijine kože strana', '/slike/dugacke/zmija2.jpg', 8),
(21, 'zmija3', 'dugačke helanke dezena zmijine kože nazad', '/slike/dugacke/zmija3.jpg', 8),
(22, 'cipka1', 'midi helanke sa čipkanim detaljima napred', '/slike/midi/cipka1.jpg', 9),
(23, 'cipka2', 'midi helanke sa čipkanim detaljima strana', '/slike/midi/cipka2.jpg', 9),
(24, 'cipka3', 'midi helanke sa čipkanim detaljima nazad', '/slike/midi/cipka3.jpg', 9),
(28, 'mreza1', 'midi helanke sa detaljima od mreže napred', '/slike/midi/mreza1.jpg', 10),
(29, 'mreza2', 'midi helanke sa detaljima od mreže strana', '/slike/midi/mreza2.jpg', 10),
(30, 'mreza3', 'midi helanke sa detaljima od mreže nazad', '/slike/midi/mreza3.jpg', 10),
(31, 'pinkleopard1', 'midi helanke pink leopard dezena napred', '/slike/midi/pinkleopard1.jpg', 11),
(32, 'pinkleopard2', 'midi helanke pink leopard dezena strana', '/slike/midi/pinkleopard2.jpg', 11),
(33, 'pinkleopard3', 'midi helanke pink leopard dezena nazad', '/slike/midi/pinkleopard3.jpg', 11),
(34, 'ruza1', 'midi helanke sa crvenim cvetovima napred', '/slike/midi/ruza1.jpg', 12),
(35, 'ruza2', 'midi helanke sa crvenim cvetovima strana', '/slike/midi/ruza2.jpg', 12),
(36, 'ruza3', 'midi helanke sa crvenim cvetovima nazad', '/slike/midi/ruza3.jpg', 12),
(37, 'tropical1', 'midi helanke tropski print napred', '/slike/midi/tropical1.jpg', 13),
(38, 'tropical2', 'midi helanke tropski print strana', '/slike/midi/tropical2.jpg', 13),
(39, 'tropical3', 'midi helanke tropski print nazad', '/slike/midi/tropical3.jpg', 13),
(40, 'zodijak1', 'midi helanke sa znacima zodijaka napred', '/slike/midi/zodijak1.jpg', 14),
(41, 'zodijak2', 'midi helanke sa znacima zodijaka strana', '/slike/midi/zodijak2.jpg', 14),
(42, 'zodijak3', 'midi helanke sa znacima zodijaka nazad', '/slike/midi/zodijak3.jpg', 14),
(43, 'cvetovi1', 'šorc cvetnog dezena napred', '/slike/sorc/cvetovi1.jpg', 15),
(44, 'cvetovi2', 'šorc cvetnog dezena strana', '/slike/sorc/cvetovi2.jpg', 15),
(45, 'cvetovi3', 'šorc cvetnog dezena nazad', '/slike/sorc/cvetovi3.jpg', 15),
(46, '', 'šorc žutog cvetnog dezena napred', '/slike/sorc/suncano1.jpg', 16),
(47, 'suncano2', 'šorc žutog cvetnog dezena strana', '/slike/sorc/suncano2.jpg', 16),
(48, 'suncano3', 'šorc žutog cvetnog dezena nazad', '/slike/sorc/suncano3.jpg', 16),
(49, 'tufne1', 'šorc sa crnim tufnama napred', '/slike/sorc/tufne1.jpg', 17),
(50, 'tufne2', 'šorc sa crnim tufnama strana', '/slike/sorc/tufne2.jpg', 17),
(51, 'tufne3', 'šorc sa crnim tufnama nazad', '/slike/sorc/tufne3.jpg', 17),
(52, 'volani1', 'šorc sa volanima napred', '/slike/sorc/volani1.jpg', 18),
(53, 'volani2', 'šorc sa volanima strana', '/slike/sorc/volani2.jpg', 18),
(54, 'volani3', 'šorc sa volanima nazad', '/slike/sorc/volani3.jpg', 18);

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE `uloge` (
  `iduloge` int(1) NOT NULL,
  `nazivuloge` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloge`
--

INSERT INTO `uloge` (`iduloge`, `nazivuloge`) VALUES
(14, 'administrator'),
(16, 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `velicine`
--

CREATE TABLE `velicine` (
  `idvelicine` int(3) NOT NULL,
  `nazivvelicine` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `velicine`
--

INSERT INTO `velicine` (`idvelicine`, `nazivvelicine`) VALUES
(1, 'XXS'),
(2, 'XS'),
(3, 'S'),
(4, 'M'),
(5, 'L'),
(6, 'XL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketaodgovori`
--
ALTER TABLE `anketaodgovori`
  ADD PRIMARY KEY (`idodgovor`);

--
-- Indexes for table `anketapitanja`
--
ALTER TABLE `anketapitanja`
  ADD PRIMARY KEY (`idpitanja`);

--
-- Indexes for table `anketapitanjaodgovori`
--
ALTER TABLE `anketapitanjaodgovori`
  ADD PRIMARY KEY (`idpitanjeodgovor`),
  ADD KEY `idpitanje` (`idpitanje`),
  ADD KEY `idodgovor` (`idodgovor`);

--
-- Indexes for table `anketarezultati`
--
ALTER TABLE `anketarezultati`
  ADD PRIMARY KEY (`idrezultati`),
  ADD KEY `idodgovor` (`idodgovor`),
  ADD KEY `idpitanje` (`idpitanje`);

--
-- Indexes for table `boje`
--
ALTER TABLE `boje`
  ADD PRIMARY KEY (`idboja`);

--
-- Indexes for table `cena`
--
ALTER TABLE `cena`
  ADD PRIMARY KEY (`idcena`),
  ADD UNIQUE KEY `cena` (`cena`);

--
-- Indexes for table `gradovi`
--
ALTER TABLE `gradovi`
  ADD PRIMARY KEY (`idgrad`);

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`idkategorija`);

--
-- Indexes for table `kategorijeostalihslika`
--
ALTER TABLE `kategorijeostalihslika`
  ADD PRIMARY KEY (`idkategorije`),
  ADD UNIQUE KEY `nazivkategorije` (`nazivkategorije`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`idkorisnika`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idgrad` (`idgrad`),
  ADD KEY `iduloga` (`iduloga`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`idmeni`),
  ADD UNIQUE KEY `stavka` (`stavka`);

--
-- Indexes for table `ostaleslike`
--
ALTER TABLE `ostaleslike`
  ADD PRIMARY KEY (`idostaleslike`),
  ADD UNIQUE KEY `nazivSlike` (`nazivslike`),
  ADD UNIQUE KEY `putanja` (`putanja`),
  ADD KEY `idkategorija` (`idkategorija`);

--
-- Indexes for table `podmeni`
--
ALTER TABLE `podmeni`
  ADD PRIMARY KEY (`idpodmeni`),
  ADD KEY `idmeni` (`idmeni`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`idproizvod`),
  ADD KEY `idkategorija` (`idkategorija`),
  ADD KEY `idcena` (`idcena`);

--
-- Indexes for table `proizvodiboje`
--
ALTER TABLE `proizvodiboje`
  ADD PRIMARY KEY (`idproizvodiboje`),
  ADD KEY `idboja` (`idboja`),
  ADD KEY `idproizvod` (`idproizvod`);

--
-- Indexes for table `proizvodivelicine`
--
ALTER TABLE `proizvodivelicine`
  ADD PRIMARY KEY (`idproizvodvelicina`),
  ADD KEY `idproizvod` (`idproizvod`),
  ADD KEY `idvelicina` (`idvelicina`);

--
-- Indexes for table `slike`
--
ALTER TABLE `slike`
  ADD PRIMARY KEY (`idslike`),
  ADD UNIQUE KEY `putanja` (`putanja`),
  ADD KEY `idproizvod` (`idproizvod`);

--
-- Indexes for table `uloge`
--
ALTER TABLE `uloge`
  ADD PRIMARY KEY (`iduloge`);

--
-- Indexes for table `velicine`
--
ALTER TABLE `velicine`
  ADD PRIMARY KEY (`idvelicine`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketaodgovori`
--
ALTER TABLE `anketaodgovori`
  MODIFY `idodgovor` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `anketapitanja`
--
ALTER TABLE `anketapitanja`
  MODIFY `idpitanja` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `anketapitanjaodgovori`
--
ALTER TABLE `anketapitanjaodgovori`
  MODIFY `idpitanjeodgovor` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `anketarezultati`
--
ALTER TABLE `anketarezultati`
  MODIFY `idrezultati` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `boje`
--
ALTER TABLE `boje`
  MODIFY `idboja` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cena`
--
ALTER TABLE `cena`
  MODIFY `idcena` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gradovi`
--
ALTER TABLE `gradovi`
  MODIFY `idgrad` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `idkategorija` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategorijeostalihslika`
--
ALTER TABLE `kategorijeostalihslika`
  MODIFY `idkategorije` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `idkorisnika` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `idmeni` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `ostaleslike`
--
ALTER TABLE `ostaleslike`
  MODIFY `idostaleslike` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `podmeni`
--
ALTER TABLE `podmeni`
  MODIFY `idpodmeni` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `idproizvod` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `proizvodiboje`
--
ALTER TABLE `proizvodiboje`
  MODIFY `idproizvodiboje` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `proizvodivelicine`
--
ALTER TABLE `proizvodivelicine`
  MODIFY `idproizvodvelicina` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `slike`
--
ALTER TABLE `slike`
  MODIFY `idslike` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `uloge`
--
ALTER TABLE `uloge`
  MODIFY `iduloge` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `velicine`
--
ALTER TABLE `velicine`
  MODIFY `idvelicine` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anketapitanjaodgovori`
--
ALTER TABLE `anketapitanjaodgovori`
  ADD CONSTRAINT `anketapitanjaodgovori_ibfk_1` FOREIGN KEY (`idodgovor`) REFERENCES `anketaodgovori` (`idodgovor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anketapitanjaodgovori_ibfk_2` FOREIGN KEY (`idpitanje`) REFERENCES `anketapitanja` (`idpitanja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `anketarezultati`
--
ALTER TABLE `anketarezultati`
  ADD CONSTRAINT `anketarezultati_ibfk_1` FOREIGN KEY (`idodgovor`) REFERENCES `anketaodgovori` (`idodgovor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anketarezultati_ibfk_2` FOREIGN KEY (`idpitanje`) REFERENCES `anketapitanja` (`idpitanja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD CONSTRAINT `korisnici_ibfk_1` FOREIGN KEY (`idgrad`) REFERENCES `gradovi` (`idgrad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `korisnici_ibfk_2` FOREIGN KEY (`iduloga`) REFERENCES `uloge` (`iduloge`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ostaleslike`
--
ALTER TABLE `ostaleslike`
  ADD CONSTRAINT `ostaleslike_ibfk_1` FOREIGN KEY (`idkategorija`) REFERENCES `kategorijeostalihslika` (`idkategorije`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `podmeni`
--
ALTER TABLE `podmeni`
  ADD CONSTRAINT `podmeni_ibfk_1` FOREIGN KEY (`idmeni`) REFERENCES `meni` (`idmeni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD CONSTRAINT `proizvodi_ibfk_1` FOREIGN KEY (`idkategorija`) REFERENCES `kategorije` (`idkategorija`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proizvodi_ibfk_2` FOREIGN KEY (`idcena`) REFERENCES `cena` (`idcena`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proizvodiboje`
--
ALTER TABLE `proizvodiboje`
  ADD CONSTRAINT `proizvodiboje_ibfk_1` FOREIGN KEY (`idproizvod`) REFERENCES `proizvodi` (`idproizvod`),
  ADD CONSTRAINT `proizvodiboje_ibfk_2` FOREIGN KEY (`idboja`) REFERENCES `boje` (`idboja`);

--
-- Constraints for table `proizvodivelicine`
--
ALTER TABLE `proizvodivelicine`
  ADD CONSTRAINT `proizvodivelicine_ibfk_1` FOREIGN KEY (`idproizvod`) REFERENCES `proizvodi` (`idproizvod`),
  ADD CONSTRAINT `proizvodivelicine_ibfk_2` FOREIGN KEY (`idvelicina`) REFERENCES `velicine` (`idvelicine`);

--
-- Constraints for table `slike`
--
ALTER TABLE `slike`
  ADD CONSTRAINT `slike_ibfk_1` FOREIGN KEY (`idproizvod`) REFERENCES `proizvodi` (`idproizvod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
