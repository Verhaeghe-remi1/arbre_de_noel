```
create database arbre_de_noel;

use arbre_de_noel; 

drop table if exists users;
create table users (
    id int PRIMARY KEY not null auto_increment,
    nom  varchar(30), 
    pw varchar(30)
);

insert into users ( nom, pw ) values
("Bouchra", "bb")
;




select pseudo from participants ;

create table jeux (
    id int PRIMARY KEY not null auto_increment,
    pseudo  varchar(30)
);

