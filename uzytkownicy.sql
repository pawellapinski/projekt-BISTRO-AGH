-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 23 Lis 2017, 12:33
-- Wersja serwera: 10.1.21-MariaDB
-- Wersja PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bistro`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `telefon` int(11) NOT NULL,
  `Adres` text COLLATE utf8_polish_ci NOT NULL,
  `Numer domu` int(11) NOT NULL,
  `Numer mieszkania` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `user`, `pass`, `email`, `Nazwisko`, `telefon`, `Adres`, `Numer domu`, `Numer mieszkania`) VALUES
(27, 'Lukas', '$2y$10$JBWS5QLR.f5YLXB3qB1NQuR3h4zacqxQbCoFYFArwaGrA9LQ5xQ9W', 'lukasz22@wp.pl', 'Lukasz Konikowski', 45678321, 'ul. Prosta', 34, 2),
(28, 'Paulina97', '$2y$10$2CYIHiGf.3TcZbxB7/BRUeN6.W/IBiJbjSjLP3ZZIwbzUgcnIbaFK', 'paulina@gmail.com', 'Paulina Nowak', 507666798, 'Fajna', 34, 5),
(29, 'Janusz', '$2y$10$XF4//hwEQtlNL5N7bcZ0p.W9eF5creQIYKRDywJht8J3eRQ4vF/jO', 'janusz@fgf.pl', 'Janusz Internetu', 234567865, 'Os. Kolorowe', 5, 40),
(30, 'Sebek', '$2y$10$R3JL14hQU8BeiyZrmL2Xv.czFe66q8Tl./iKk8l3YvBxD2cBK62HS', 'sebix@we.pl', 'Sebastian ', 12345678, 'ul. Jana', 34, 5),
(22, 'Mati', '$2y$10$WCCGZdtVKGWQpA5mV2tjwOxu1bHov2JhhhLONQza/KZK5ya/ws5ZK', 'mati@gmail.com', 'Mateusz Kalinowski', 507666799, '', 0, 0),
(24, 'Bronek', '$2y$10$QiALy4FFGvjP.pdceTXLYumMOSgTe9oQp5sknSNyCU/sZnpDgQTsC', 'bronek@ddfl.pl', 'Bronek Matula', 507666798, 'ul. Polaczkowa', 0, 0),
(25, 'Angelika', '$2y$10$woLkARPge4QIiAzXBuanIeuKmqpAshhp11dfVQiI0G72HbApNdfVq', 'angela@gh.pl', 'Angelika Pirowska', 45678432, 'Zielone', 9, 60),
(31, 'Administrator', '$2y$10$PI6ZxVQXLd/StCqR2JLwGe9.zZJNPsrk8SEYmL6.0fB0PbZtD7pOW', 'administartor@bistro-agh.pl', 'Administrator Admin', 111111111, 'Internet', 1, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
