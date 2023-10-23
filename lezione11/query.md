QUERY DA LANCIARE SU SAKILA

FILM

- costano fra 2,99 e < 4,99
- rating G
- ordinati per titoli
- durata fra 60 e 90 minuti
- special_feature = trailer

 select title,rental_rate, rating, length, special_features from film where (rental_rate >= 2.99 and rental_rate <= 4.99) and (length > 60 and length < 90) and rating like '%G%' and special_features like '%trailers%' order by title;
