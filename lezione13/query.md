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