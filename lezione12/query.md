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

SELECT first_name as NOME, last_name AS COGNOME, custaddress.address as INDIRIZZO, city as CITTA, custaddress.district as STATO, country as NAZIONE from customer as custTBL INNER JOIN address as custaddress ON custTBL.address_id = custaddress.address_id INNER JOIN city as cityTBL ON custaddress.city_id = cityTBL.city_id
INNER JOIN country as countryTBL ON cityTBL.country_id= countryTBL.country_id 
where custaddress.district like "%england%" and custTBL.active =1 and custTBL.customer_id !=477
limit 20;