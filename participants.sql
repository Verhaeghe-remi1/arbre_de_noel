```
create database arbre_de_noel;

use arbre_de_noel; 

drop table if exists participants;
create table participants (
    id int PRIMARY KEY not null auto_increment,
    nom  varchar(30) UNIQUE
);

insert into participants ( nom ) values
("Bouchra"      ),
("Alexis"       ),
("Hanane"       ),
("Mehdi"        ),
("Olivier"      ),
("Remi"         ),
("Karim"        ),
("Nelly"        ),
("Xavier"       ),
("vincent"      ), 
("benoit"       ), 
("samuel"       ), 
("baptiste"     ), 
("yacine"       ), 
("messaoud"     ), 
("ahmed"        ), 
("gaetan"       ), 
("simon"        )
;




select pseudo from participants ;

create table jeux (
    id int PRIMARY KEY not null auto_increment,
    pseudo  varchar(30)
);

