QUERY

INSERT
use students;
insert into rooms VALUES (500);
insert into rooms (id) VALUES (502);

insert into advisor (advisor_name,adv_room) VALUES ("Musa prof",502);

use sakila;
insert into actor (first_name, last_name) VALUES ("Roberto", "Niro");
insert into actor (first_name, last_name) VALUES ("Giulia", "Robert");

insert into country  VALUES (NULL,"Uruguay", DEFAULT);
select * from country order by country;

insert into country SET country="Bulgaria";
insert into country SET country="Bulgaria", last_update=NOW();

DELETE

 delete from country where country_id=112;
 delete from country where country_id>112 and country_id<114;

use students;
 delete from rooms where id=501;

 TRUNCATE

 create table prova (ID INT, NAME VARCHAR(30));
 insert into prova (ID,NAME) VALUES (1,"a");
 insert into prova (ID,NAME) VALUES (3,"c");

 TRUNCATE prova;


UPDATE

update student SET name="Mario" where name="Jimmy";
 update student SET name="Maria" where name LIKE "%Deb%";
 update student SET name="Kosa" where class1=2 and class2=4;

use sakila;
update actor SET last_name= UPPER("Cruso") where first_name = "RALPH" and last_name like "%cruz";

ESERCIZIO

INSERT INTO `film`( `title`, `description`, `release_year`, `language_id`, `original_language_id`, `rental_duration`, `rental_rate`, `length`, `replacement_cost`, `rating`, `special_features`) VALUES('NON CI RESTA CHE PIANGERE',"As student at the United States Navy's","1986","1","1","6","4.9","110",20.99,"G","Trailers,Commentaries");

 insert into film_category (film_id,category_id) VALUES (1004,1);
 insert into film_category (film_id,category_id) VALUES (1004,7);
 select title,category from film_list where title like "%NON%";

 REPLACE

 replace into advisor VALUES (1, "Gino Verdi", 400);

 insert into advisor (id,advisor_name,adv_room) values (3,"Mario Rossi",502) ON DUPLICATE KEY UPDATE advisor_name="Mario Rossi";

 LOAD file

CREATE TABLE t1 (a int, b int, c int, d int, PRIMARY KEY (a));
 LOAD DATA LOCAL INFILE '/Users/radeschi/Downloads/carica.dat' INTO TABLE t1 FIELDS TERMINATED BY ',' (a,b) SET c=a+b;


 EXPORT

 select *  INTO OUTFILE '/Users/radeschi/Downloads/export.dat' FIELDS TERMINATED BY ',' FROM t1;


 VISTA

 insert into student (name,advisor_id,class1,class2,class3) VALUES ('Jimmy',3,4,3,2);

CREATE VIEW classi_studenti_professori AS 
   SELECT student.name as STUDENTE, advisor.advisor_name AS PROFESSORE, classes.room as CLASSE1 from student  
   INNER JOIN advisor ON student.advisor_id = advisor.id 
   INNER JOIN classes ON student.class1 = classes.id; 

   select * from classi_studenti_professori;


   //JSONMUSICAMARKET

   update products SET last_update =NOW() where id=2;


     SELECT orders.date as DATA, UCASE(CONCAT (customers.name,' ',customers.surname)) as CLIENTE , orders.id AS "NUMERO ORDINE", addresses.indirizzo AS INDIRIZZO, cities.name AS CITTA
    ->       from orders  
    ->    INNER JOIN customers ON orders.customer_id = customers.id
    ->       INNER JOIN addresses ON customers.address_id = addresses.id
    ->     INNER JOIN cities ON addresses.city_id = cities.id
    ->    ;

CREATE VIEW totale_ordini_list AS 
      SELECT DISTINCT orders.id AS "NUMERO ORDINE", orders.date as DATA, UCASE(CONCAT (customers.name,' ',customers.surname)) as CLIENTE , addresses.indirizzo AS INDIRIZZO, cities.name AS CITTA, (select sum(price) from order_details where order_id=orders.id) AS TOTALE
      from orders  
   INNER JOIN customers ON orders.customer_id = customers.id
      INNER JOIN addresses ON customers.address_id = addresses.id
    INNER JOIN cities ON addresses.city_id = cities.id
    INNER JOIN order_details ON orders.id = order_details.order_id;

     insert into order_details (product_id,quantity, price, order_id,last_update) VALUES (3,2,100.4,2,NOW());