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