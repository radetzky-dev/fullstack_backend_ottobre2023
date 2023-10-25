-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Ott 25, 2023 alle 14:22
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `JsonMusicMarket`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `indirizzo` varchar(100) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `addresses`
--

INSERT INTO `addresses` (`id`, `indirizzo`, `city_id`) VALUES
(1, 'via del campo,7', 2),
(2, 'piazza del duomo, 5', 1),
(3, 'via del tramonto,11', 3),
(4, 'piazza cisterna, 5', 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'nessuno'),
(2, 'gibson'),
(3, 'roland'),
(4, 'sony'),
(5, 'eko'),
(6, 'korg');

-- --------------------------------------------------------

--
-- Struttura della tabella `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'chitarre'),
(2, 'batterie'),
(3, 'tastiere'),
(4, 'bassi');

-- --------------------------------------------------------

--
-- Struttura della tabella `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(1, 'Milano'),
(2, 'Roma'),
(3, 'Napoli'),
(4, 'Torino');

-- --------------------------------------------------------

--
-- Struttura della tabella `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `customers`
--

INSERT INTO `customers` (`id`, `name`, `surname`, `address_id`) VALUES
(1, 'mario', 'rossi', 4),
(2, 'diego maria', 'verdi', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `orders`
--

INSERT INTO `orders` (`id`, `date`, `customer_id`) VALUES
(1, '2023-10-24 14:22:05', 2),
(2, '2023-10-24 14:22:05', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` tinyint(3) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `order_id` int(11) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `order_details`
--

INSERT INTO `order_details` (`id`, `product_id`, `quantity`, `price`, `order_id`, `last_update`) VALUES
(1, 2, 2, '22.99', 1, '2023-10-25 12:00:58'),
(2, 1, 3, '222.80', 2, '2023-10-25 12:01:00'),
(3, 3, 1, '500.00', 1, '2023-10-25 12:01:03'),
(4, 3, 2, '100.40', 2, '2023-10-25 12:20:58');

-- --------------------------------------------------------

--
-- Struttura della tabella `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` tinyint(3) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `description`, `photo`, `category_id`, `brand_id`, `last_update`) VALUES
(1, 'chitarra elettrica', '199.50', 3, 'chitarra elettrica doppia tripla', NULL, 1, 2, '2023-10-25 11:59:19'),
(2, 'basso elettrico', '225.70', 3, 'bassossssssso', NULL, 4, 1, '2023-10-25 11:59:25'),
(3, 'tastiera nuova', '450.50', 6, 'tastiera da competizione', NULL, 3, 3, '2023-10-25 11:59:28');

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `totale_ordini_list`
-- (Vedi sotto per la vista effettiva)
--
CREATE TABLE `totale_ordini_list` (
`NUMERO ORDINE` int(11)
,`DATA` datetime
,`CLIENTE` varchar(81)
,`INDIRIZZO` varchar(100)
,`CITTA` varchar(50)
,`TOTALE` decimal(32,2)
);

-- --------------------------------------------------------

--
-- Struttura per vista `totale_ordini_list`
--
DROP TABLE IF EXISTS `totale_ordini_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jsonmusicmarket`.`totale_ordini_list`  AS SELECT DISTINCT `jsonmusicmarket`.`orders`.`id` AS `NUMERO ORDINE`, `jsonmusicmarket`.`orders`.`date` AS `DATA`, ucase(concat(`jsonmusicmarket`.`customers`.`name`,' ',`jsonmusicmarket`.`customers`.`surname`)) AS `CLIENTE`, `jsonmusicmarket`.`addresses`.`indirizzo` AS `INDIRIZZO`, `jsonmusicmarket`.`cities`.`name` AS `CITTA`, (select sum(`jsonmusicmarket`.`order_details`.`price`) from `jsonmusicmarket`.`order_details` where `jsonmusicmarket`.`order_details`.`order_id` = `jsonmusicmarket`.`orders`.`id`) AS `TOTALE` FROM ((((`jsonmusicmarket`.`orders` join `jsonmusicmarket`.`customers` on(`jsonmusicmarket`.`orders`.`customer_id` = `jsonmusicmarket`.`customers`.`id`)) join `jsonmusicmarket`.`addresses` on(`jsonmusicmarket`.`customers`.`address_id` = `jsonmusicmarket`.`addresses`.`id`)) join `jsonmusicmarket`.`cities` on(`jsonmusicmarket`.`addresses`.`city_id` = `jsonmusicmarket`.`cities`.`id`)) join `jsonmusicmarket`.`order_details` on(`jsonmusicmarket`.`orders`.`id` = `jsonmusicmarket`.`order_details`.`order_id`))  ;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_adresses_cities` (`city_id`);

--
-- Indici per le tabelle `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customers_addresses` (`address_id`);

--
-- Indici per le tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_customers` (`customer_id`);

--
-- Indici per le tabelle `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orderdetails_brands` (`product_id`),
  ADD KEY `fk_orderdetails_orders` (`order_id`);

--
-- Indici per le tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_categories` (`category_id`),
  ADD KEY `fk_products_brands` (`brand_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `fk_adresses_cities` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `fk_customers_addresses` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_customers` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_orderdetails_brands` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_orderdetails_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_brands` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_products_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
