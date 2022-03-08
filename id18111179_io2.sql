-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 08 Mar 2022, 19:16
-- Wersja serwera: 10.5.12-MariaDB
-- Wersja PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `id18111179_io2`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `savedSets`
--

CREATE TABLE `savedSets` (
  `id` int(11) NOT NULL,
  `user_saved_set` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `setname` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `savedSets`
--

INSERT INTO `savedSets` (`id`, `user_saved_set`, `username`, `setname`) VALUES
(13, 'admin', 'mrys', 'Sport');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sets`
--

CREATE TABLE `sets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `set_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `word` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `translation` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `sets`
--

INSERT INTO `sets` (`id`, `user_id`, `set_name`, `word`, `translation`) VALUES
(64, 1, 'Sport', 'run', 'bieg'),
(65, 1, 'Sport', 'goalkeeper', 'bramkarz'),
(66, 1, 'Sport', 'team', 'drużyna'),
(67, 1, 'Sport', 'supporter', 'kibic'),
(68, 1, 'Sport', 'coach', 'trener'),
(69, 1, 'Sport', 'spectator', 'widz'),
(70, 1, 'Sport', 'basketball', 'koszykówka');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `setname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `answer2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `answer3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `answer4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `goodanswer` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `tests`
--

INSERT INTO `tests` (`id`, `username`, `setname`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `goodanswer`) VALUES
(7, 'mrys', 'Budynki', 'Pytanie testowe 1', 'Odp1', 'Odp2', 'Odp3', 'Odp4', 'Odp1'),
(8, 'mrys', 'Budynki', 'Pytanie testowe 2', 'Odp1', 'Odp2', 'Odp3', 'Odp4', 'Odp4'),
(9, 'mrys', 'Budynki', 'Bardzo bardzo bardzo bardzo bardzo długie pytanie testowe 3 ...............', 'Odp1Odp1Odp1Odp1Odp1Odp1Odp1Odp1Odp1Odp1Odp1Odp1Odp1', 'Odp2', 'Odp3Odp3Odp3Odp3Odp3Odp3Odp3Odp3Odp3Odp3Odp3Odp3', 'Odp4', 'Odp2'),
(10, 'mrys', 'Sport', 'They have got three ___.', 'childs', 'childrens', 'children', 'child', 'children'),
(11, 'mrys', 'Sport', 'There is __ pencil on the table.', 'a', 'two', 'some', 'an', 'a'),
(12, 'mrys', 'Sport', '___ are you from?', 'Where', 'What', 'When', 'Who', 'Where');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin` int(1) NOT NULL,
  `login` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `admin`, `login`) VALUES
(1, 'mrys', 'qwertyuiop', 'mrys@test.pl', 1, NULL),
(2, 'test', 'test', 'test@test', 0, 1),
(3, 'test1', 'qwertyuiop', 'test@test', 0, NULL),
(6, 'Testowy', 'qwertyuiop', 'testowy@o2.pl', 0, NULL),
(7, 'JanKowalski1', 'qwertyuiop', 'jan.kowalski@gmail.com', 0, NULL),
(8, 'JanKowalski', 'qwertyuiop', 'jankowalski@o2.pl', 0, NULL),
(9, 'admin', 'admin', 'asd@asd.pl', 1, NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `savedSets`
--
ALTER TABLE `savedSets`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `sets`
--
ALTER TABLE `sets`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `savedSets`
--
ALTER TABLE `savedSets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `sets`
--
ALTER TABLE `sets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT dla tabeli `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
