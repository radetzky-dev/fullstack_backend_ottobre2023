QUERY

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

 delete from country where country_id=112;
 delete from country where country_id>112 and country_id<114;

 delete from rooms where id=501;
