-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-07-04 02:26:10
-- サーバのバージョン： 10.4.24-MariaDB
-- PHP のバージョン: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `autooffer`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `supplier`
--

CREATE TABLE `supplier` (
  `id` int(12) NOT NULL,
  `companyName` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HQ` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plant` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `port` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personName` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailAddress` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lpw` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ex1` int(6) NOT NULL,
  `Ex2` int(6) NOT NULL,
  `Ex3` int(6) NOT NULL,
  `Ex4` int(6) NOT NULL,
  `Ex5` int(6) NOT NULL,
  `Ex6` int(6) NOT NULL,
  `Ex7` int(6) NOT NULL,
  `Ex8` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `supplier`
--

INSERT INTO `supplier` (`id`, `companyName`, `HQ`, `plant`, `country`, `port`, `personName`, `phoneNumber`, `emailAddress`, `lpw`, `Ex1`, `Ex2`, `Ex3`, `Ex4`, `Ex5`, `Ex6`, `Ex7`, `Ex8`) VALUES
(1, 'Kamiya', 'Tokyo', 'Tokyo', 'Japan', 'Yokohama', 'Kamiya', '03', 'MO@com', 'kamiya', 50, 50, 50, 50, 50, 50, 50, 50);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
