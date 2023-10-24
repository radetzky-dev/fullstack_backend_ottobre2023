1a
 SELECT film.title as TITOLO, film.description as DESCRIZIONE, language.name AS LINGUA, film.length as DURATA, film.release_year as "Anno di uscita" from film  INNER JOIN language ON film.language_id = language.language_id where film.release_year > 2000 limit 20;

  SELECT film.title as TITOLO, film.description as DESCRIZIONE, language.name AS LINGUA, film.length as DURATA, film.release_year as "Anno di uscita" from film  INNER JOIN language ON film.language_id = language.language_id where length > 90 order by film.length limit 20;

2a

SELECT first_name as NOME, last_name AS COGNOME, title AS TITOLO, description AS DESCRIZIONE from actor as actorTbl  INNER JOIN film_actor as filmactorTbl ON actorTbl.actor_id = filmactorTbl.actor_id  INNER JOIN film as filmTbl ON filmactorTbl.film_id= filmTbl.film_id where title like "%din%" and last_name like "%Cruz%" limit 20;

SELECT first_name as NOME, last_name AS COGNOME, title AS TITOLO, description AS DESCRIZIONE from actor as actorTbl  INNER JOIN film_actor as filmactorTbl ON actorTbl.actor_id = filmactorTbl.actor_id  INNER JOIN film as filmTbl ON filmactorTbl.film_id= filmTbl.film_id where title like "%ANAC%" and last_name like "%M%" limit 20;

SELECT first_name as NOME, last_name AS COGNOME, title AS TITOLO, description AS DESCRIZIONE from actor as actorTbl  INNER JOIN film_actor as filmactorTbl ON actorTbl.actor_id = filmactorTbl.actor_id  INNER JOIN film as filmTbl ON filmactorTbl.film_id= filmTbl.film_id where description like "%mad%" limit 20;

SELECT first_name as NOME, last_name AS COGNOME, title AS TITOLO, description AS DESCRIZIONE from actor as actorTbl  INNER JOIN film_actor as filmactorTbl ON actorTbl.actor_id = filmactorTbl.actor_id  INNER JOIN film as filmTbl ON filmactorTbl.film_id= filmTbl.film_id where (last_name="CRUZ" or last_name="DAVIS") and description like "%dentist%" limit 30;


SELECT first_name as NOME, last_name AS COGNOME, title AS TITOLO, description AS DESCRIZIONE, filmTbl.release_year as "ANNO USCITA" from actor as actorTbl  INNER JOIN film_actor as filmactorTbl ON actorTbl.actor_id = filmactorTbl.actor_id  INNER JOIN film as filmTbl ON filmactorTbl.film_id= filmTbl.film_id where (last_name="CRUZ" or last_name="DAVIS") and description like "%mad%";

3a
SELECT first_name as NOME, last_name AS COGNOME, title AS TITOLO, description AS DESCRIZIONE, catTbl.name as CATEGORIA  from actor as actorTbl 
INNER JOIN film_actor as filmactorTbl ON actorTbl.actor_id = filmactorTbl.actor_id 
INNER JOIN film as filmTbl ON filmactorTbl.film_id= filmTbl.film_id
INNER JOIN film_category as filmCatTbl ON filmTbl.film_id= filmCatTbl.film_id
INNER JOIN category as catTbl ON filmCatTbl.category_id = catTbl.category_id
where catTbl.name != "Action"
limit 20;

SELECT first_name as NOME, last_name AS COGNOME, title AS TITOLO, description AS DESCRIZIONE, catTbl.name as CATEGORIA  from actor as actorTbl  INNER JOIN film_actor as filmactorTbl ON actorTbl.actor_id = filmactorTbl.actor_id  INNER JOIN film as filmTbl ON filmactorTbl.film_id= filmTbl.film_id INNER JOIN film_category as filmCatTbl ON filmTbl.film_id= filmCatTbl.film_id INNER JOIN category as catTbl ON filmCatTbl.category_id = catTbl.category_id where catTbl.name != "Action" and catTbl.name !="Animation"  limit 30;

SELECT first_name as NOME, last_name AS COGNOME, title AS TITOLO, description AS DESCRIZIONE, catTbl.name as CATEGORIA  from actor as actorTbl  INNER JOIN film_actor as filmactorTbl ON actorTbl.actor_id = filmactorTbl.actor_id  INNER JOIN film as filmTbl ON filmactorTbl.film_id= filmTbl.film_id INNER JOIN film_category as filmCatTbl ON filmTbl.film_id= filmCatTbl.film_id INNER JOIN category as catTbl ON filmCatTbl.category_id = catTbl.category_id where catTbl.name IN ( "Action","Animation", "Children") and description like "%Canadian%" limit 50;

SELECT DISTINCT title AS TITOLO, description AS DESCRIZIONE, catTbl.name as CATEGORIA  from actor as actorTbl  INNER JOIN film_actor as filmactorTbl ON actorTbl.actor_id = filmactorTbl.actor_id  INNER JOIN film as filmTbl ON filmactorTbl.film_id= filmTbl.film_id INNER JOIN film_category as filmCatTbl ON filmTbl.film_id= filmCatTbl.film_id INNER JOIN category as catTbl ON filmCatTbl.category_id = catTbl.category_id where catTbl.name IN ( "Action","Animation", "Children") and description like "%Canadian%" limit 50;


4a

SELECT first_name as NOME, last_name AS COGNOME, city as CITTA, country as PAESE from customer as custTBL INNER JOIN address as custaddress ON custTBL.address_id = custaddress.address_id INNER JOIN city as cityTBL ON custaddress.city_id = cityTBL.city_id
INNER JOIN country as countryTBL ON cityTBL.country_id= countryTBL.country_id limit 20;

SELECT first_name as NOME, last_name AS COGNOME, custaddress.address as INDIRIZZO, city as CITTA, custaddress.district as STATO, country as NAZIONE from customer as custTBL INNER JOIN address as custaddress ON custTBL.address_id = custaddress.address_id INNER JOIN city as cityTBL ON custaddress.city_id = cityTBL.city_id
INNER JOIN country as countryTBL ON cityTBL.country_id= countryTBL.country_id limit 20;

SELECT first_name as NOME, last_name AS COGNOME, custaddress.address as INDIRIZZO, city as CITTA, custaddress.district as STATO, country as NAZIONE from customer as custTBL INNER JOIN address as custaddress ON custTBL.address_id = custaddress.address_id INNER JOIN city as cityTBL ON custaddress.city_id = cityTBL.city_id
INNER JOIN country as countryTBL ON cityTBL.country_id= countryTBL.country_id 
where custaddress.district like "%california%" or city like "York"
limit 20;

EXPLAIN
SELECT first_name as NOME, last_name AS COGNOME, custaddress.address as INDIRIZZO, city as CITTA, custaddress.district as STATO, country as NAZIONE from customer as custTBL INNER JOIN address as custaddress ON custTBL.address_id = custaddress.address_id INNER JOIN city as cityTBL ON custaddress.city_id = cityTBL.city_id
INNER JOIN country as countryTBL ON cityTBL.country_id= countryTBL.country_id 
where custaddress.district like "%england%" and custTBL.active =1 and custTBL.customer_id !=477
limit 20;

EXPLAIN

EXPLAIN
SELECT first_name as NOME, last_name AS COGNOME, city as CITTA, country as PAESE from customer as custTBL INNER JOIN address as custaddress ON custTBL.address_id = custaddress.address_id INNER JOIN city as cityTBL ON custaddress.city_id = cityTBL.city_id INNER JOIN country as countryTBL ON cityTBL.country_id= countryTBL.country_id where countryTBL.country_id = 34;


Esercizio


StudentTBL (studenti)
PK id 1022
name ecc
advisor_id -> FK id_advisor (-> Advisor name ecc )
class1 -> FK id_classes (->room)
class2 -> FK id_classes (->room)
class3 -> FK id_classes (->room)

AdvisorTBL (Professori)
PK id
advisor Jones
adv_room ->FK id_room

RoomsTBL (Sale professori)
PK id_room 412

ClassesTBL (Aule)
PK id
room 101-07

Comandi da lanciare:
create database students;

use students;

create table classes (id INT PRIMARY KEY AUTO_INCREMENT, room varchar(10));

create table rooms (id INT PRIMARY KEY AUTO_INCREMENT);

create table advisor (id INT PRIMARY KEY AUTO_INCREMENT, advisor_name varchar(30), adv_room INT NOT NULL,
  CONSTRAINT `fk_advisor_rooms`
    FOREIGN KEY (adv_room) REFERENCES rooms (id)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
);

create table student 
(
    id INT PRIMARY KEY AUTO_INCREMENT, 
    name varchar(30), 
    advisor_id INT NOT NULL,
    class1 INT NOT NULL,
    class2 INT NOT NULL,
    class3 INT NOT NULL,
  CONSTRAINT `fk_student_advisor`
    FOREIGN KEY (advisor_id) REFERENCES advisor (id)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
      CONSTRAINT `fk_student_class1`
    FOREIGN KEY (class1) REFERENCES classes (id)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
          CONSTRAINT `fk_student_class2`
    FOREIGN KEY (class2) REFERENCES classes (id)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
          CONSTRAINT `fk_student_class3`
    FOREIGN KEY (class3) REFERENCES classes (id)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
);


**** Disegno nostro DB ****
categories - le categorie (chitarre, batterie...)
brands
products (elenco prodotti)
city
address

customers (clienti)
orders (ordini)
admin (login /può inserire e cancellare prodotti DELETE - inserimenti non vengono mostrati agli altri)

COMANDI
create database JsonMusicMarket;
use JsonMusicMarket;

create table categories (id INT PRIMARY KEY AUTO_INCREMENT, name varchar(35));

ALTER table categories MODIFY name varchar(35) NOT NULL;

create table brands (id INT PRIMARY KEY AUTO_INCREMENT, name varchar(50));

ALTER table brands MODIFY name varchar(50) NOT NULL;

create table products(
id INT PRIMARY KEY AUTO_INCREMENT,
name varchar(50) NOT NULL,
price decimal(10,2) NOT NULL,
quantity tinyint(3) NOT NULL,
description varchar(200),
photo varchar(200),
category_id INT NOT NULL,
brand_id INT NOT NULL,
last_update timestamp ON UPDATE CURRENT_TIMESTAMP(),
  CONSTRAINT `fk_products_categories`
    FOREIGN KEY (category_id) REFERENCES categories (id)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
     CONSTRAINT `fk_products_brands`
    FOREIGN KEY (brand_id) REFERENCES brands (id)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
);


create table cities (id INT PRIMARY KEY AUTO_INCREMENT, name varchar(50) NOT NULL);

create table addresses (
    id INT PRIMARY KEY AUTO_INCREMENT, 
    indirizzo varchar(100) NOT NULL,
    city_id INT,
    phone varchar(20),
    email varchar(40),
         CONSTRAINT `fk_adresses_cities`
    FOREIGN KEY (city_id) REFERENCES cities (id)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
    );

ALTER table addresses MODIFY city_id INT NOT NULL;

    create table customers (
    id INT PRIMARY KEY AUTO_INCREMENT, 
    name varchar(30) NOT NULL,
    surname varchar(50) NOT NULL,
    address_id INT NOT NULL,

         CONSTRAINT `fk_customers_addresses`
    FOREIGN KEY (address_id) REFERENCES addresses (id)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
    );


    create table orders (
         id INT PRIMARY KEY AUTO_INCREMENT, 
         date DATETIME NOT NULL,
         customer_id INT NOT NULL
    )

    create table order_details(
        id INT PRIMARY KEY AUTO_INCREMENT, 
        product_id INT NOT NULL,
        quantity tinyint(3) NOT NULL,
        price decimal(10,2) NOT NULL,
        order_id INT NOT NULL,
        last_update timestamp ON UPDATE CURRENT_TIMESTAMP(),
             CONSTRAINT `fk_orderdetails_brands`
    FOREIGN KEY (product_id) REFERENCES products (id)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
                 CONSTRAINT `fk_orderdetails_orders`
    FOREIGN KEY (order_id) REFERENCES orders (id)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
    );



    