-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 01 okt 2018 om 21:46
-- Serverversie: 10.1.31-MariaDB
-- PHP-versie: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project7`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `aandoeningen`
--

CREATE TABLE `aandoeningen` (
  `aandoening_id` int(3) NOT NULL,
  `BSN` varchar(10) NOT NULL,
  `type` varchar(30) NOT NULL,
  `aandoening` varchar(30) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `aandoeningen`
--

INSERT INTO `aandoeningen` (`aandoening_id`, `BSN`, `type`, `aandoening`, `datum`) VALUES
(1, '123987456', 'botbreuk', 'gebroken been', '2018-04-16'),
(4, '321987456', 'botbreuk', 'gebroken arm', '2018-04-16'),
(5, '123987456', 'botbreuk', 'gebroken neus', '2018-04-16'),
(6, '546123789', 'maagklacht', 'te weinig maagzuur', '2018-04-18'),
(7, '147852369', 'maagklacht', 'test', '2018-04-18'),
(8, '321987456', 'Gebroken oor', '', '2018-04-18');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `afspraken`
--

CREATE TABLE `afspraken` (
  `BSN` varchar(10) NOT NULL,
  `afspraak` varchar(30) NOT NULL,
  `afspraak_id` int(11) NOT NULL,
  `startdatum` datetime NOT NULL,
  `einddatum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `afspraken`
--

INSERT INTO `afspraken` (`BSN`, `afspraak`, `afspraak_id`, `startdatum`, `einddatum`) VALUES
('123987456', 'Consult', 1, '2018-06-19 00:00:00', '2018-06-19 00:00:00'),
('123987456', 'Operatie', 2, '2018-06-21 00:00:00', '2018-06-21 00:00:00'),
('147852369', 'Consult', 4, '2018-06-20 00:00:00', '2018-06-20 00:00:00'),
('147852369', 'Koorts', 5, '2018-06-27 00:00:00', '2018-06-27 00:00:00'),
('321987456', 'Operatie', 6, '2018-06-29 00:00:00', '2018-06-29 00:00:00'),
('123987456', 'Dagopname', 7, '2018-06-27 00:00:00', '2018-06-27 00:00:00'),
('123987456', 'Koorts', 8, '2018-09-05 00:00:00', '2018-09-05 00:00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `functie`
--

CREATE TABLE `functie` (
  `functie_id` int(3) NOT NULL,
  `functie` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `functie`
--

INSERT INTO `functie` (`functie_id`, `functie`) VALUES
(1, 'patient'),
(2, 'huisarts'),
(3, 'ziekenhuis'),
(4, 'specialist'),
(5, 'apotheek'),
(6, 'admin'),
(7, 'verzekeringsmaatschappij');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `gebruikers_id` int(3) NOT NULL,
  `BSN` varchar(15) NOT NULL,
  `naam` varchar(25) NOT NULL,
  `wachtwoord` varchar(70) NOT NULL,
  `functie` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`gebruikers_id`, `BSN`, `naam`, `wachtwoord`, `functie`) VALUES
(1, '123456789', 'Hans Rietveld', '568719801EFC2CFD162F157C5EFB3829', 'admin'),
(2, '987654321', 'Sander Moerman', '568719801EFC2CFD162F157C5EFB3829', 'admin'),
(3, '123789456', 'Piet Paaltjes', '568719801EFC2CFD162F157C5EFB3829', 'huisarts'),
(4, '123987456', 'Hendrik Haan', '568719801EFC2CFD162F157C5EFB3829', 'patient'),
(6, '789654123', 'Luuk Lariekoek', '568719801EFC2CFD162F157C5EFB3829', 'specialist'),
(7, '321987456', 'Karel Kanarie', '568719801EFC2CFD162F157C5EFB3829', 'patient'),
(8, '456789321', 'Sander Spaarpot', '568719801EFC2CFD162F157C5EFB3829', 'apotheek'),
(9, '147258369', 'Albert Schijtster', '568719801EFC2CFD162F157C5EFB3829', 'ziekenhuis'),
(10, '741852963', 'BNS', '568719801EFC2CFD162F157C5EFB3829', 'verzekeringsmaatschappij'),
(12, '147852369', 'Xander Xylofoon', '568719801EFC2CFD162F157C5EFB3829', 'patient'),
(13, '258741369', 'KDA', '568719801efc2cfd162f157c5efb3829', 'verzekeringsmaatschappij'),
(14, '842675319', 'Dokter Bibber', '568719801EFC2CFD162F157C5EFB3829', 'huisarts'),
(15, '546123789', 'Mark Mand', '568719801EFC2CFD162F157C5EFB3829', 'patient');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medicatie`
--

CREATE TABLE `medicatie` (
  `medicatie_id` int(11) NOT NULL,
  `BSN` varchar(10) NOT NULL,
  `type` varchar(30) NOT NULL,
  `beschrijving` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `medicatie`
--

INSERT INTO `medicatie` (`medicatie_id`, `BSN`, `type`, `beschrijving`) VALUES
(1, '123987456', 'paracetamol', 'voor de pijn in zijn been'),
(2, '546123789', 'ibuprofen', 'voor de hoofdpijn');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(3) NOT NULL,
  `BSN` varchar(10) NOT NULL,
  `naam` varchar(25) NOT NULL,
  `adres` varchar(50) NOT NULL,
  `woonplaats` varchar(50) NOT NULL,
  `bloedgroep` varchar(4) NOT NULL,
  `huisarts` varchar(30) NOT NULL,
  `verzekeringsmaatschappij` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `patient`
--

INSERT INTO `patient` (`patient_id`, `BSN`, `naam`, `adres`, `woonplaats`, `bloedgroep`, `huisarts`, `verzekeringsmaatschappij`) VALUES
(1, '123987456', 'Hendrik Haan', 'Sportlaan 43', 'Ridderkerk', 'A+', 'Piet Paaltjes', 'BNS'),
(2, '321987456', 'Karel Kanarie', 'Kanarielaan 721', 'Koekkoeksdorp', 'B-', 'Piet Paaltjes', 'BNS'),
(4, '147852369', 'Xander Xylofoon', 'Taarsstraat 41', 'Waterloo', '0+', 'Piet Paaltjes', 'BNS'),
(5, '546123789', 'Mark Mand', 'Hordijk 74', 'Rotterdam', 'A-', 'Dokter Bibber', 'KDA');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `typeaandoening`
--

CREATE TABLE `typeaandoening` (
  `type_id` int(3) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `typeaandoening`
--

INSERT INTO `typeaandoening` (`type_id`, `type`) VALUES
(1, 'botbreuk'),
(2, 'maagklacht'),
(3, 'Gebroken oor');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `typemedicatie`
--

CREATE TABLE `typemedicatie` (
  `type_id` int(3) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `typemedicatie`
--

INSERT INTO `typemedicatie` (`type_id`, `type`) VALUES
(1, 'paracetamol'),
(2, 'ibuprofen');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `aandoeningen`
--
ALTER TABLE `aandoeningen`
  ADD PRIMARY KEY (`aandoening_id`);

--
-- Indexen voor tabel `afspraken`
--
ALTER TABLE `afspraken`
  ADD PRIMARY KEY (`afspraak_id`);

--
-- Indexen voor tabel `functie`
--
ALTER TABLE `functie`
  ADD PRIMARY KEY (`functie_id`);

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`gebruikers_id`);

--
-- Indexen voor tabel `medicatie`
--
ALTER TABLE `medicatie`
  ADD PRIMARY KEY (`medicatie_id`);

--
-- Indexen voor tabel `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexen voor tabel `typeaandoening`
--
ALTER TABLE `typeaandoening`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexen voor tabel `typemedicatie`
--
ALTER TABLE `typemedicatie`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `aandoeningen`
--
ALTER TABLE `aandoeningen`
  MODIFY `aandoening_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `afspraken`
--
ALTER TABLE `afspraken`
  MODIFY `afspraak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `functie`
--
ALTER TABLE `functie`
  MODIFY `functie_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `gebruikers_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT voor een tabel `medicatie`
--
ALTER TABLE `medicatie`
  MODIFY `medicatie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `typeaandoening`
--
ALTER TABLE `typeaandoening`
  MODIFY `type_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `typemedicatie`
--
ALTER TABLE `typemedicatie`
  MODIFY `type_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
