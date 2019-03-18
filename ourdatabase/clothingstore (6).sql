-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 18 mars 2019 kl 12:37
-- Serverversion: 10.1.37-MariaDB
-- PHP-version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `clothingstore`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `adressbok`
--

CREATE TABLE `adressbok` (
  `AdressID` int(68) NOT NULL,
  `Gata` varchar(68) NOT NULL,
  `Stad` varchar(68) NOT NULL,
  `Land` varchar(68) NOT NULL,
  `Postnummer` varchar(68) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `adressbok`
--

INSERT INTO `adressbok` (`AdressID`, `Gata`, `Stad`, `Land`, `Postnummer`) VALUES
(1, 'hej1§23', 'göteborg', 'sverige', '44531');

-- --------------------------------------------------------

--
-- Tabellstruktur `category`
--

CREATE TABLE `category` (
  `categoryID` int(68) NOT NULL,
  `categoryName` varchar(68) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`) VALUES
(1, 'asdasdfsa'),
(2, 'SHOE'),
(3, 'Accesories'),
(4, 'Clothes');

-- --------------------------------------------------------

--
-- Tabellstruktur `courier`
--

CREATE TABLE `courier` (
  `CourierName` varchar(68) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `courier`
--

INSERT INTO `courier` (`CourierName`) VALUES
('DHL'),
('FedEx');

-- --------------------------------------------------------

--
-- Tabellstruktur `image`
--

CREATE TABLE `image` (
  `imageID` int(68) NOT NULL,
  `imageName` varchar(68) NOT NULL,
  `imageSrc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `image`
--

INSERT INTO `image` (`imageID`, `imageName`, `imageSrc`) VALUES
(21, 'White Shirt', 'clothes1.jpg'),
(22, 'Yellow Shirt', 'clothes2.jpg'),
(23, 'Black Jumper', 'clothes3.jpg'),
(24, 'Black Strips Shirt', 'clothes4.jpg'),
(25, 'Greem Shirt', 'clothes5.jpg'),
(26, 'Black Keps', 'keps1.jpg'),
(27, 'Black 2 Keps', 'keps2.jpg'),
(28, 'Black 3 keps', 'keps3.jpg'),
(29, 'Black Keps4', 'keps4.jpg'),
(30, 'OrangeKeps', 'keps5.jpg'),
(31, 'Black Shoe', 'shoe1.jpg'),
(32, 'White Shoe', 'shoe2.jpg'),
(33, 'White 2 Shoe', 'shoe3.jpg'),
(34, 'Black 2 shoe ', 'shoe4.jpg'),
(35, 'Black and white Shoe', 'shoe5.jpg');

-- --------------------------------------------------------

--
-- Tabellstruktur `newsletter`
--

CREATE TABLE `newsletter` (
  `signupID` int(68) NOT NULL,
  `email` varchar(68) NOT NULL,
  `userID` int(68) DEFAULT NULL,
  `name` varchar(68) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `newsletter`
--

INSERT INTO `newsletter` (`signupID`, `email`, `userID`, `name`) VALUES
(3, '.sebben.97@hotmail.com.', NULL, '.Sebastian.');

-- --------------------------------------------------------

--
-- Tabellstruktur `orderrow`
--

CREATE TABLE `orderrow` (
  `orderId` int(68) NOT NULL,
  `productId` int(68) NOT NULL,
  `numberOfProducts` int(68) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `orderrow`
--

INSERT INTO `orderrow` (`orderId`, `productId`, `numberOfProducts`) VALUES
(1, 24, 3),
(33, 30, 1),
(33, 31, 2),
(34, 21, 2),
(35, 32, 1),
(35, 33, 2),
(36, 25, 1),
(36, 28, 2),
(36, 29, 1),
(41, 23, 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `orders`
--

CREATE TABLE `orders` (
  `orderID` int(68) NOT NULL,
  `courierName` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `UserID` int(68) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `orders`
--

INSERT INTO `orders` (`orderID`, `courierName`, `adress`, `UserID`) VALUES
(1, '1', '1', 2),
(6, 'DHL', 'Sweden', 11),
(29, 'DHL', 'Sweden', 11),
(32, 'FedEx', '', 11),
(33, 'FedEx', 'Sweden', 11),
(34, 'DHL', 'Sweden', 11),
(35, 'DHL', 'Austria', 11),
(36, 'FedEx', 'Kenya', 11),
(37, 'FedEx', 'Empty', 11),
(38, 'DHL', 'Hello', 11),
(39, 'DHL', 'asdsad', 11),
(40, 'FedEx', 'ggsdgf', 11),
(41, 'DHL', '12312', 11);

-- --------------------------------------------------------

--
-- Tabellstruktur `products`
--

CREATE TABLE `products` (
  `productId` int(68) NOT NULL,
  `name` varchar(68) NOT NULL,
  `price` int(68) NOT NULL,
  `imageId` int(68) NOT NULL,
  `categoryId` int(68) NOT NULL,
  `unitsInStock` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `products`
--

INSERT INTO `products` (`productId`, `name`, `price`, `imageId`, `categoryId`, `unitsInStock`) VALUES
(21, 'White Jumper', 499, 21, 4, 98),
(22, 'Yellow Shirt', 899, 22, 4, 98),
(23, 'Black Jumper', 1899, 23, 4, 96),
(24, 'Green Shirt', 1299, 25, 4, 100),
(25, 'Keps - Black ', 499, 26, 3, 99),
(26, 'Keps - Black Nice', 299, 27, 3, 100),
(27, 'Keps - Black Cool', 299, 28, 3, 100),
(28, 'Keps - Black New York', 899, 29, 3, 98),
(29, 'Keps - Orange COC', 799, 30, 3, 99),
(30, 'Black Shoe', 499, 31, 2, 100),
(31, 'White Shoe', 1299, 32, 2, 100),
(32, 'Shoe White White', 499, 33, 2, 99),
(33, 'Black Shoe 12', 488, 34, 2, 98),
(34, 'Black and White Shoe', 1299, 35, 2, 100);

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `password`) VALUES
(1, 'hodhod212', 'hodhod212@yahoo.com', 'user', '1eec054aa8edc2b73effd8d64866f66f'),
(2, 'aliezadkhaha', 'aliezadkhaha@gmail.com', 'admin', 'c048aac154299fb79eebe1106d78e967'),
(3, 'Test', 'test@email.se', 'admin', 'test'),
(4, 'Test', 'poturovic_anel@hotmail.se', 'admin', '0cbc6611f5540bd0809a388dc95a615b'),
(5, 'Test2', 'test2@gmail.com', 'user', 'ad0234829205b9033196ba818f7a872b'),
(6, 'amooor', 'amor@poturovic.com', 'admin', '202cb962ac59075b964b07152d234b70'),
(10, 'sebastian', 'sebben.97@hotmail.com', 'user', 'bfd59291e825b5f2bbf1eb76569f8fe7'),
(11, 'hencr33k', 'test@mail.com', 'user', '4297f44b13955235245b2497399d7a93'),
(12, 'TestUser', 'test@test.se', 'user', '202cb962ac59075b964b07152d234b70');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `adressbok`
--
ALTER TABLE `adressbok`
  ADD PRIMARY KEY (`AdressID`);

--
-- Index för tabell `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Index för tabell `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`CourierName`);

--
-- Index för tabell `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`imageID`);

--
-- Index för tabell `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`signupID`),
  ADD KEY `userID` (`userID`);

--
-- Index för tabell `orderrow`
--
ALTER TABLE `orderrow`
  ADD PRIMARY KEY (`orderId`,`productId`),
  ADD KEY `productId` (`productId`),
  ADD KEY `orderId` (`orderId`);

--
-- Index för tabell `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `courierId` (`courierName`),
  ADD KEY `adressID` (`adress`),
  ADD KEY `UserID` (`UserID`);

--
-- Index för tabell `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `imageId` (`imageId`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(68) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT för tabell `image`
--
ALTER TABLE `image`
  MODIFY `imageID` int(68) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT för tabell `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `signupID` int(68) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(68) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT för tabell `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(68) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `newsletter`
--
ALTER TABLE `newsletter`
  ADD CONSTRAINT `signUpnewsletter_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Restriktioner för tabell `orderrow`
--
ALTER TABLE `orderrow`
  ADD CONSTRAINT `orderRow_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderID`);

--
-- Restriktioner för tabell `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);

--
-- Restriktioner för tabell `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `Products_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryID`),
  ADD CONSTRAINT `Products_ibfk_2` FOREIGN KEY (`imageId`) REFERENCES `image` (`imageID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
