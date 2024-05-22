-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Bulan Mei 2024 pada 06.10
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffe_valley`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bean`
--

CREATE TABLE `bean` (
  `Bean_ID` int(11) NOT NULL,
  `bean` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bean`
--

INSERT INTO `bean` (`Bean_ID`, `bean`, `Description`, `Price`) VALUES
(4, 'Cubita', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat fugit quam voluptatibus accusantium asperiores esse! Tempore illum nostrum reiciendis odio quibusdam magnam nemo? Nulla maxime quas harum, at facere tempore!', 12.00),
(5, 'Colombian Supremo', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat dicta, minus ea doloremque voluptate quam aperiam consequatur perspiciatis earum quae sapiente dolores consectetur quisquam rem veniam non, sit atque odio!', 13.50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dailybean`
--

CREATE TABLE `dailybean` (
  `ID` int(11) NOT NULL,
  `Bean_ID` int(11) NOT NULL,
  `Sale_Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dailybean`
--

INSERT INTO `dailybean` (`ID`, `Bean_ID`, `Sale_Price`) VALUES
(5, 4, 11.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `distributor`
--

CREATE TABLE `distributor` (
  `Distributor_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `distributor`
--

INSERT INTO `distributor` (`Distributor_ID`, `name`, `city`, `state`, `country`, `phone`, `email`) VALUES
(1, 'Okrafaldino', 'PADANG', 'SUMATERA BARAT', 'Australia', '089560372799', 'okrafaldino@gmail.com'),
(2, 'Ahmad Khomsi', 'PADANG', 'SUMATERA BARAT', 'Singapura', '0895603727976', 'ahmad@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `logins`
--

INSERT INTO `logins` (`id`, `username`, `password`) VALUES
(1, 'okra', 'okra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `upload`
--

CREATE TABLE `upload` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `Filename` varchar(255) NOT NULL,
  `Path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `upload`
--

INSERT INTO `upload` (`ID`, `title`, `author`, `Filename`, `Path`) VALUES
(3, 'Kdd', 'Okrafaldino', 'kdd.png', 'uploads/kdd.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bean`
--
ALTER TABLE `bean`
  ADD PRIMARY KEY (`Bean_ID`);

--
-- Indeks untuk tabel `dailybean`
--
ALTER TABLE `dailybean`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Bean_ID` (`Bean_ID`);

--
-- Indeks untuk tabel `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`Distributor_ID`);

--
-- Indeks untuk tabel `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bean`
--
ALTER TABLE `bean`
  MODIFY `Bean_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `dailybean`
--
ALTER TABLE `dailybean`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `distributor`
--
ALTER TABLE `distributor`
  MODIFY `Distributor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `upload`
--
ALTER TABLE `upload`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dailybean`
--
ALTER TABLE `dailybean`
  ADD CONSTRAINT `dailybean_ibfk_1` FOREIGN KEY (`Bean_ID`) REFERENCES `bean` (`Bean_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
