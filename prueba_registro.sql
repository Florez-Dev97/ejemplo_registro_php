create database prueba_registro;
use prueba_registro;

create table usuar105(
	id_usuario int(11) AUTO_INCREMENT,
    documento varchar(32),
    nombre varchar(64),
    email varchar(64),
    username varchar(64),
    clave varchar(32),
    
    PRIMARY KEY(id_usuario)
);