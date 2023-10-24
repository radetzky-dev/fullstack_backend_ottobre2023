1a
 SELECT film.title as TITOLO, film.description as DESCRIZIONE, language.name AS LINGUA, film.length as DURATA, film.release_year as "Anno di uscita" from film  INNER JOIN language ON film.language_id = language.language_id where film.release_year > 2000 limit 20;

  SELECT film.title as TITOLO, film.description as DESCRIZIONE, language.name AS LINGUA, film.length as DURATA, film.release_year as "Anno di uscita" from film  INNER JOIN language ON film.language_id = language.language_id where length > 90 order by film.length limit 20;

2a

SELECT first_name as NOME, last_name AS COGNOME, title AS TITOLO, description AS DESCRIZIONE from actor as actorTbl  INNER JOIN film_actor as filmactorTbl ON actorTbl.actor_id = filmactorTbl.actor_id  INNER JOIN film as filmTbl ON filmactorTbl.film_id= filmTbl.film_id where title like "%din%" and last_name like "%Cruz%" limit 20;

SELECT first_name as NOME, last_name AS COGNOME, title AS TITOLO, description AS DESCRIZIONE from actor as actorTbl  INNER JOIN film_actor as filmactorTbl ON actorTbl.actor_id = filmactorTbl.actor_id  INNER JOIN film as filmTbl ON filmactorTbl.film_id= filmTbl.film_id where title like "%ANAC%" and last_name like "%M%" limit 20;