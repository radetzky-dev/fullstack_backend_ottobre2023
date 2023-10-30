//Specifiche

mappatura di link per contare gli accessi e i dati dei utenti


tracciare prodotti
utente -> da me (scrivo i suoi dati) -> redirigo sul prodotto che vuole
p.e. wwww.miosito.it/prodotti?prodotto=tastiera;

pagina statistiche dove posso consultare i dati

REQUIRE LIB:
composer require ua-parser/uap-php
https://github.com/ua-parser/uap-php

composer require mobiledetect/mobiledetectlib
https://github.com/serbanghita/Mobile-Detect

Creare tabelle

CREATE TABLE `books` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `title` varchar(255) NOT NULL,
  `booklink` varchar(255) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT current_timestamp() COMMENT 'Create Time',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE stats( id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key', book_id int NOT NULL, browser VARCHAR(30) NOT NULL, browser_v VARCHAR(10) NOT NULL, so VARCHAR(30) NOT NULL, so_v VARCHAR(10) NOT NULL, c_type VARCHAR(30) NULL, device_type VARCHAR(30) NULL, ip VARCHAR(20) NULL, refer TEXT NULL, qstring TEXT NULL, stat_date DATE DEFAULT CURDATE(), stat_time TIME DEFAULT CURRENT_TIME(), create_time DATETIME COMMENT 'Create Time', CONSTRAINT `fk_stats_books` FOREIGN KEY (book_id) REFERENCES books (id) ON DELETE CASCADE ON UPDATE RESTRICT ) COMMENT ''
