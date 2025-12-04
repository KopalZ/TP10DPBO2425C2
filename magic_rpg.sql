-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Des 2025 pada 15.26
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magic_rpg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `grimoires`
--

CREATE TABLE `grimoires` (
  `id` int(11) NOT NULL,
  `nama_buku` varchar(100) NOT NULL,
  `magic_power` int(11) NOT NULL,
  `id_wizard` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `grimoires`
--

INSERT INTO `grimoires` (`id`, `nama_buku`, `magic_power`, `id_wizard`) VALUES
(1, 'Four Leaf Clover', 9500, 1),
(2, 'Five Leaf Clover', 9999, 2),
(3, 'Valkyrie Wand', 8800, 3),
(4, 'Salamander Spirit', 9200, 4),
(5, 'Briar Whip', 8500, 5),
(6, 'Death Scythe', 8700, 6),
(7, 'Glamour World', 9100, 7),
(10, 'Kitab Hukum', 9999, 11),
(11, 'Magic Crystal', 10000, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guilds`
--

CREATE TABLE `guilds` (
  `id` int(11) NOT NULL,
  `nama_guild` varchar(100) NOT NULL,
  `base_region` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `guilds`
--

INSERT INTO `guilds` (`id`, `nama_guild`, `base_region`, `deskripsi`) VALUES
(1, 'Golden Dawn', 'Capital City', 'Pasukan pelindung kerajaan terkuat.'),
(2, 'Black Bulls', 'Forest Edge', 'Kumpulan penyihir buangan yang solid.'),
(3, 'Silver Eagles', 'Highlands', 'Kaum bangsawan pengendali perak.'),
(4, 'Crimson Lion', 'Volcano Zone', 'Petarung api yang sangat disiplin.'),
(5, 'Blue Rose', 'Rose Garden', 'Didominasi oleh penyihir wanita.'),
(6, 'Green Mantis', 'Deep Jungle', 'Spesialis penyusupan dan racun.'),
(7, 'Coral Peacock', 'Bandung', 'Ahli ilusi dan sihir mimpi, ahli manipulasi'),
(8, 'Purple Orca', 'Trade Town', 'Pedagang sihir dan bisnis.'),
(9, 'Azure Deer', 'Windy Valley', 'Fokus pada kecepatan dan angin.'),
(11, 'The Phoenix', 'Jakarta', 'Pasukan Revolusi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `potions`
--

CREATE TABLE `potions` (
  `id` int(11) NOT NULL,
  `nama_potion` varchar(100) NOT NULL,
  `efek` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `potions`
--

INSERT INTO `potions` (`id`, `nama_potion`, `efek`, `harga`) VALUES
(1, 'Health Potion S', 'Heal 50 HP', 100),
(2, 'Health Potion L', 'Heal 200 HP', 350),
(3, 'Mana Elixir', 'Restore 50 MP', 150),
(4, 'High Elixir', 'Restore 100 MP', 400),
(5, 'Antidote', 'Cure Poison', 50),
(6, 'Phoenix Down', 'Revive Character', 1000),
(7, 'Speed Up', 'Agility +10', 250),
(8, 'Power Up', 'Strength +10', 250),
(10, 'Invisibility Oil', 'Menghilang 30s', 600),
(11, 'Elixir of Honest', 'Membuat orang jadi jujur', 99);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wizards`
--

CREATE TABLE `wizards` (
  `id` int(11) NOT NULL,
  `nama_wizard` varchar(100) NOT NULL,
  `elemen` varchar(50) NOT NULL,
  `level` int(11) DEFAULT 1,
  `id_guild` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `wizards`
--

INSERT INTO `wizards` (`id`, `nama_wizard`, `elemen`, `level`, `id_guild`) VALUES
(1, 'Yuno', 'Angin', 95, 1),
(2, 'Asta (MC)', 'Anti-Magic, kasian', 90, 2),
(3, 'Noelle Silva', 'Air', 88, 3),
(4, 'Fuegoleon', 'Api', 92, 4),
(5, 'Charlotte', 'Mawar Berduri', 89, 5),
(6, 'Jack', 'Pemotong', 87, 6),
(7, 'Dorothy', 'Mimpi', 91, 7),
(9, 'Rill', 'Lukisan', 84, 9),
(10, 'Mars', 'Kristal', 80, 2),
(11, 'Harry Potter', 'Air', 99, 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `grimoires`
--
ALTER TABLE `grimoires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_wizard` (`id_wizard`);

--
-- Indeks untuk tabel `guilds`
--
ALTER TABLE `guilds`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `potions`
--
ALTER TABLE `potions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wizards`
--
ALTER TABLE `wizards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_guild` (`id_guild`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `grimoires`
--
ALTER TABLE `grimoires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `guilds`
--
ALTER TABLE `guilds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `potions`
--
ALTER TABLE `potions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `wizards`
--
ALTER TABLE `wizards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `grimoires`
--
ALTER TABLE `grimoires`
  ADD CONSTRAINT `grimoires_ibfk_1` FOREIGN KEY (`id_wizard`) REFERENCES `wizards` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wizards`
--
ALTER TABLE `wizards`
  ADD CONSTRAINT `wizards_ibfk_1` FOREIGN KEY (`id_guild`) REFERENCES `guilds` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
