-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 Jun 2025 pada 15.42
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_telepon`, `created_at`) VALUES
(1, 'Bayu', 'Kutabumi, pasarkemis', '0818181818', '2025-06-06 10:09:38'),
(2, 'YUCUP YUCUP', 'Bugel', '0988384884', '2025-06-07 20:23:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `kode_produk`, `harga`, `stok`, `created_at`) VALUES
(1, 'Televisi', 'TV1', 1000000, 2, '2025-06-06 09:58:30'),
(2, 'Setrika', 'SS1', 200000, 29, '2025-06-06 17:29:18'),
(3, 'AC', 'AC1', 3000000, 30, '2025-06-12 13:29:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales`
--

CREATE TABLE `sales` (
  `id_sales` int(11) NOT NULL,
  `nama_sales` varchar(100) NOT NULL,
  `id_sales_person` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sales`
--

INSERT INTO `sales` (`id_sales`, `nama_sales`, `id_sales_person`) VALUES
(6, 'Bayu', 'BY1'),
(7, 'majid', 'SB2'),
(8, 'bayupasrt2', 'BY22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_order`
--

CREATE TABLE `sales_order` (
  `id_order` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_sales` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_total` decimal(12,2) NOT NULL,
  `status` enum('draft','dikirim','selesai','dibatalkan') DEFAULT 'draft',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sales_order`
--

INSERT INTO `sales_order` (`id_order`, `id_pelanggan`, `id_produk`, `id_sales`, `jumlah`, `harga_total`, `status`, `created_at`) VALUES
(9, 1, 1, 6, 1, '1000000.00', 'selesai', '2025-06-07 14:40:51'),
(10, 1, 1, 6, 10, '10000000.00', 'selesai', '2025-06-07 14:56:11'),
(11, 1, 1, 7, 3, '3000000.00', 'selesai', '2025-06-07 15:23:10'),
(12, 2, 1, 6, 2, '2000000.00', 'selesai', '2025-06-08 09:36:12'),
(14, 2, 2, 7, 1, '200000.00', 'draft', '2025-06-08 09:43:17'),
(15, 1, 1, 6, 1, '1000000.00', 'draft', '2025-06-08 11:52:36'),
(16, 2, 1, 6, 1, '1000000.00', 'selesai', '2025-06-12 08:27:42'),
(17, 1, 1, 7, 1, '1000000.00', 'selesai', '2025-06-12 08:28:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','sales','manager') NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'bayuadmin', '$2y$10$6GCjJcTcrUlYaFxfgxISOuF7WNmNBPAoSKLaxptpCT9K4AkdQES1C', 'admin', '2025-06-06 09:42:41'),
(5, 'admin5', '$2y$10$JkUL9jTVYG7YnOu2BNkBdOLC64t88.BOVbMeta2kdmB433RZOqrR2', 'admin', '2025-06-06 15:00:51'),
(6, 'bayu', '$2y$10$tYhSK2US1mOkOhkKBTN2/O1grX4cZXlzmo0oyLQK8QN6pioBWrNSG', 'sales', '2025-06-06 20:17:02'),
(7, 'majid', '$2y$10$xlzM4RTcbPiFUT4PoVHmoe8Fz/o4OvzGVW8wjZrKZfrG4iQ68yNNW', 'sales', '2025-06-06 20:48:10'),
(8, 'bayubayu', '$2y$10$a48qqWs9USfmP6v0QcaUCOUhyNhf3MYeEuSzOMJ5EpEDUOM9gw/Tu', 'sales', '2025-06-08 01:16:13'),
(9, 'Bayumanajer', '$2y$10$JApYagbvQANyGrUADusTmOrsY2SqhYna44mOpup6rK/FbfWn/WE9m', 'manager', '2025-06-08 18:36:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sales`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id_sales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
