-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 07. Apr 2020 um 16:51
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `/webdev-project-haudenmaulwurf`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `address`
--

CREATE TABLE `address` (
  `id` int(10) UNSIGNED NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `address`
--

INSERT INTO `address` (`id`, `userId`, `firstname`, `lastname`, `street`, `zip`, `city`, `email`) VALUES
(1, 5, 'Anton', 'Himbeer', 'Andreas-Hofer-Straße 7', '6330', 'Kufstein', ''),
(2, 5, 'Georg', 'Erdbeer', 'Salzburger Straße 32', '6300', 'Wörgl', ''),
(3, 5, 'Josef', 'Brombeer', 'Oskar Pirlo-Straße 7', '6330', 'Kufstein', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `score`
--

CREATE TABLE `score` (
  `id` int(10) UNSIGNED NOT NULL,
  `points` int(11) NOT NULL,
  `tmsp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `score`
--

INSERT INTO `score` (`id`, `points`, `tmsp`, `user_id`) VALUES
(1, 25, '2020-04-02 10:31:15', 11),
(2, 50, '2020-04-02 10:31:15', 11),
(3, 60, '2020-04-02 10:31:31', 11),
(4, 65, '2020-04-02 10:31:31', 11),
(5, 40, '2020-04-02 10:31:48', 5),
(6, 45, '2020-04-02 10:31:48', 5),
(7, 70, '2020-04-02 10:32:10', 6),
(8, 80, '2020-04-02 10:32:10', 6),
(9, 15, '2020-04-04 15:43:04', 11);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `name`, `password`) VALUES
(1, 'Jason', '$2y$10$sbWJ77.MBJXg0ad95GVKgukoz6yHiwOoaL2N4eLR7OaiOOgc/PRNa'),
(2, 'Julia', '$2y$10$j13lwPCSUihW7Z15LVrSGOf5uoZmQhUntLNkNXnBYYidPZSbuC9B2'),
(3, 'Hans', '$2y$10$mkhCAoQYHVcFXYBKPIFTUuvOwu/CDeiFXInX8K0fL9XkDDC9LEqpO'),
(4, 'Dorie', '$2y$10$7lE/IB7FtsLch76Eqzc4Oe/5nfGbZNsKFm1w21eaNlKuGHVi7..Di'),
(5, 'test', '$2y$10$7Z3Iq0Zl.WIiNH7t8bk39OYVp3T6ICb2dF7yYAhhEaUMiFKbh3apq'),
(6, 'Sabine', '$2y$10$U8fdL8E8AITNMSnC9dKQkuQGiSaDfWBjt8a1hYTwXG2JdQkTVTtfW'),
(7, 'versuch', '$2y$10$tpqsC6rSu86NYkIzP/rJ0OJh5xwqaLAKut9nBQRtaruVfNVaUUUvG'),
(8, 'qwertzui', '$2y$10$5RDNAjO/lZqkTC9zazcA6uG.PFdVUENm0UBPAmJHolnjgl8sn8.5i'),
(9, 'asdfghjkl', '$2y$10$mOZzxMjiqRtDbBoNtCmgVOQWhuj4pKX104mAxJLqhjrDFymQptnPq'),
(10, 'test2', '$2y$10$t7MaTFECfNle8TxSlBve/eCNrR7jlMIOKSLUv74BzYfG1qbdqXXiK'),
(11, 'Claudia', '$2y$10$csrqudV2zOpQApB4DFaZgeUlARKExAX20j0pHHIPeQ8.3ijo4kJny');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indizes für die Tabelle `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `address`
--
ALTER TABLE `address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `score`
--
ALTER TABLE `score`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
