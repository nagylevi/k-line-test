-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Sze 23. 19:50
-- Kiszolgáló verziója: 10.1.38-MariaDB
-- PHP verzió: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `k-line-test2`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `billing_address`
--

CREATE TABLE `billing_address` (
  `billing_address_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tax_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `delivery_address`
--

CREATE TABLE `delivery_address` (
  `delivery_address_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jnct_billing_user`
--

CREATE TABLE `jnct_billing_user` (
  `jnct_billing_user_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `billing_address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jnct_delivery_user`
--

CREATE TABLE `jnct_delivery_user` (
  `jnct_delivery_user_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivery_address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`user_id`, `name`, `password`, `email`) VALUES
(2, 'Nagy Levente', '202cb962ac59075b964b07152d234b70', 'lebbencs13@gmail.com');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `billing_address`
--
ALTER TABLE `billing_address`
  ADD PRIMARY KEY (`billing_address_id`);

--
-- A tábla indexei `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD PRIMARY KEY (`delivery_address_id`);

--
-- A tábla indexei `jnct_billing_user`
--
ALTER TABLE `jnct_billing_user`
  ADD PRIMARY KEY (`jnct_billing_user_id`),
  ADD KEY `billing-user` (`billing_address_id`),
  ADD KEY `user-billing` (`user_id`);

--
-- A tábla indexei `jnct_delivery_user`
--
ALTER TABLE `jnct_delivery_user`
  ADD PRIMARY KEY (`jnct_delivery_user_id`),
  ADD KEY `user-delivery` (`user_id`),
  ADD KEY `delivery-user` (`delivery_address_id`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `billing_address`
--
ALTER TABLE `billing_address`
  MODIFY `billing_address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `delivery_address`
--
ALTER TABLE `delivery_address`
  MODIFY `delivery_address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT a táblához `jnct_billing_user`
--
ALTER TABLE `jnct_billing_user`
  MODIFY `jnct_billing_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `jnct_delivery_user`
--
ALTER TABLE `jnct_delivery_user`
  MODIFY `jnct_delivery_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `jnct_billing_user`
--
ALTER TABLE `jnct_billing_user`
  ADD CONSTRAINT `billing-user` FOREIGN KEY (`billing_address_id`) REFERENCES `billing_address` (`billing_address_id`),
  ADD CONSTRAINT `user-billing` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Megkötések a táblához `jnct_delivery_user`
--
ALTER TABLE `jnct_delivery_user`
  ADD CONSTRAINT `delivery-user` FOREIGN KEY (`delivery_address_id`) REFERENCES `delivery_address` (`delivery_address_id`),
  ADD CONSTRAINT `user-delivery` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
