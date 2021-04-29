-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 30. Apr 2021 um 01:17
-- Server-Version: 10.4.18-MariaDB
-- PHP-Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `findmysong`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp(),
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `comments`
--

INSERT INTO `comments` (`id`, `comment`, `username`, `post_date`, `post_id`) VALUES
(56, 'klingt nach green day aber voll vergessen wie der song heisst....', 'testuser', '2021-04-30 01:03:30', 56),
(57, 'Klingt nach Avril Lavigne... hoffe das hilf weiter...!', 'testuser', '2021-04-30 01:07:24', 57);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `genre` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `audio_filename` varchar(255) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp(),
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `posts`
--

INSERT INTO `posts` (`id`, `description`, `genre`, `language`, `audio_filename`, `post_date`, `username`) VALUES
(55, 'Es fängt mit \"tüüü tü tü tüüü tü tü tüüü tü tü tüüüü\" an und klingt wie so ein Anfang von einem Boxkampf', 'Rock', 'Englisch', '', '2021-04-30 00:53:49', 'testuser'),
(56, 'Keine Beschreibung', 'Punk Rock', 'Englisch', 'uploads/81c8fdb2e23f3641cdc335dfb526a18b.wav', '2021-04-30 01:01:58', 'boo'),
(57, 'Suche den Song schon so lange!! :( Pls help!!!', 'Unbekannt', 'Unbekannt', 'uploads/779c5b2f2f67fa19b7b5044adc61e984.wav', '2021-04-30 01:06:18', 'pikachu'),
(58, 'habe es im Urlaub gehört und kann mich nur noch an den Satz erinnern \"Now, when did you last let your heart decide?\"', 'Unbekannt', 'Unbekannt', '', '2021-04-30 01:09:17', 'testuser');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `proposals`
--

CREATE TABLE `proposals` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `artist` varchar(255) NOT NULL,
  `song` varchar(255) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp(),
  `post_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `proposals`
--

INSERT INTO `proposals` (`id`, `url`, `artist`, `song`, `post_date`, `post_id`, `username`) VALUES
(9, 'https://audio-ssl.itunes.apple.com/itunes-assets/AudioPreview71/v4/0e/ca/a0/0ecaa0b9-c7e3-9655-7998-cd3505eb11ca/mzaf_3615256647530526561.plus.aac.p.m4a', 'Survivor', 'Eye of the Tiger', '2021-04-30 00:55:42', 55, 'boo'),
(12, 'https://audio-ssl.itunes.apple.com/itunes-assets/AudioPreview114/v4/61/53/05/61530595-70b0-5c19-126f-4834556d2f45/mzaf_894083590429469910.plus.aac.p.m4a', 'Avril Lavigne', 'Smile', '2021-04-30 01:07:46', 57, 'pikachu'),
(13, 'https://audio-ssl.itunes.apple.com/itunes-assets/AudioPreview113/v4/5a/25/5f/5a255f69-e40a-e8b7-5b71-9d703f661a11/mzaf_16973331908316222454.plus.aac.p.m4a', 'Geek Music', 'Aladdin: A Whole New World', '2021-04-30 01:10:38', 58, 'pikachu');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(21, 'pikachu', 'rocking-dude@hotmail.com', '$2y$10$BnKz9nX.MBwegC8YTuMUQ.3YzhpUBE1RO4ykFOtVqKsjnq6QwFTcC'),
(22, 'testuser', 'testuser@test.com', '$2y$10$TnWWxH1GZFU/7XaxfHzW3OIMfXjgU85rn8P7hO9BUAT4sDiWme1BC'),
(23, 'boo', 'boo@boo.com', '$2y$10$JNK0x739/kDQ0Ov7hmqkl.ayQjZkVcq3l2bVCeRv9xs80i2ym.zUu');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT für Tabelle `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT für Tabelle `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
