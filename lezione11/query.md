QUERY DA LANCIARE SU SAKILA

FILM

- costano fra 2,99 e < 4,99
- rating G
- ordinati per titoli
- durata fra 60 e 90 minuti
- special_feature = trailer

 select title,rental_rate, rating, length, special_features from film where (rental_rate >= 2.99 and rental_rate <= 4.99) and (length > 60 and length < 90) and rating like '%G%' and special_features like '%trailers%' order by title;

 ALTRA QUERY

select ac.actor_id, ac.last_name as cognome, fl.title as titolo from actor as AC inner join film_actor as fa USING (actor_id) INNER JOIN film as fl USING (film_id) where fl.title like "%AFFAIR%";


SOLUZIONI ESERCITAZIONE SLIDE 31

select name from category;

select customer_id, first_name, last_name from customer where customer_id = 101;

select customer_id, first_name, last_name from customer where first_name ='victoria' and last_name = 'gibson';

select title, release_year, rental_rate from film where title like 'B%' order by rental_rate;

SELECT
first_name as Nome,
last_name as Cognome,
email as Email,
(SELECT SUM(amount) FROM payment WHERE customer_id = c.customer_id GROUP BY customer_id) as total_amount
FROM customer as c;


select first_name as nome, last_name as cognome, fm.title as titolo from actor as a 
inner join film_actor f ON a.actor_id = f.actor_id 
inner join film fm ON f.film_id  = fm.film_id 
limit 20;

esercizio finale

select name,address,city from customer_list limit 10;

select actorTbl.actor_id,first_name, last_name, count(*) as film  from actor AS actorTbl INNER JOIN film_actor AS filmActorTbl ON actorTbl.actor_id = filmActorTbl.actor_id;


select actorTbl.actor_id,first_name, last_name, count(filmActorTbl.film_id) as conto  from actor AS actorTbl INNER JOIN film_actor AS filmActorTbl ON actorTbl.actor_id = filmActorTbl.actor_id;

select count(*) from film_actor where actor_id=1;

select actorTbl.first_name AS Nome, actorTbl.last_name AS Cognome, filmTbl.title as TITOLO, filmTbl.description AS TRAMA from actor AS actorTbl INNER JOIN film_actor AS filmActorTbl ON actorTbl.actor_id = filmActorTbl.actor_id INNER JOIN film AS filmTbl ON filmActorTbl.film_id = filmTbl.film_id where last_name="CRUZ" and first_name="PENELOPE";

select actorTbl.first_name AS Nome, actorTbl.last_name AS Cognome, filmTbl.title as TITOLO from actor AS actorTbl INNER JOIN film_actor AS filmActorTbl ON actorTbl.actor_id = filmActorTbl.actor_id INNER JOIN film AS filmTbl ON filmActorTbl.film_id = filmTbl.film_id where last_name="CRUZ" and first_name="PENELOPE";




