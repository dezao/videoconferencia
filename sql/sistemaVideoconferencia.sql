
create database videoconferencia DEFAULT character set UTF8 default collate utf8_general_ci;

use videoconferencia;

CREATE TABLE usuarios (
id int NOT NULL auto_increment,
nome varchar(30) NOT NULL,
login varchar(30) NOT NULL,
senha varchar(30) NOT NULL,
primary key (id)
)DEFAULT CHARSET = UTF8;

insert into usuarios values (DEFAULT, 'andré', 'cs300370', '123');
select * from usuarios;
drop table videoconferencias;

CREATE TABLE videoconferencias (
id int NOT NULL auto_increment,
ticket int NOT NULL,
unidades varchar(50) NOT NULL,
salas varchar(50) NOT NULL,
dataEHora DATETIME NOT NULL,
pin int NOT NULL,
primary key (id)
)DEFAULT CHARSET = UTF8;

insert into videoconferencias values (DEFAULT,'123456','Curitiba e CAR','Sala Conselho e Sala 2','1987-10-28 12:40','123456');
select * from videoconferencias;

DROP TABLE videoconferencia;