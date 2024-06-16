create database if not exists NutriSmart;
use NutriSmart;

create table if not exists nutricionista
(num_colegiado int,
user_nutri varchar(50) not null,
pass_nutri varchar(50) not null,
nombre_completo varchar(50) not null,
constraint pk_nutri primary key (num_colegiado));

create table if not exists paciente
(id_paciente int auto_increment,
id_nutri int not null,
user_paciente varchar(50) not null,
pass_paciente varchar(255) not null,
nombre_completo varchar(50) not null,
fecha_nac date not null,
altura int(50) not null,
peso decimal(10,1) not null,
direccion varchar(50) not null,
email varchar(50) not null,
telefono int not null, 
constraint pk_paciente primary key (id_paciente),
constraint fk_paciente foreign key (id_nutri) references nutricionista(num_colegiado));

create table if not exists datos
(id_peso int auto_increment,
id_paciente int not null,
fecha date not null,
peso decimal(10,1) not null,
constraint pk_datos primary key (id_peso),
constraint fk_datos foreign key (id_paciente) references paciente(id_paciente));

create table if not exists fichero
(id_fichero int auto_increment,
id_nutri int not null,
id_paciente int not null,
nombre_fichero varchar(50) not null,
fecha date not null,
constraint pk_ficheros primary key (id_fichero),
constraint fk_fichero_nutri foreign key (id_nutri) references nutricionista(num_colegiado),
constraint fk_fichero_paciente foreign key (id_paciente) references paciente(id_paciente));

create table if not exists mensaje
(id_mensaje int auto_increment,
id_nutri int not null,
id_paciente int not null,
contenido varchar(50) not null,
fecha date not null,
constraint pk_mensaje primary key (id_mensaje),
constraint fk_mensaje_nutri foreign key (id_nutri) references nutricionista(num_colegiado),
constraint kf_mensaje_paciente foreign key (id_paciente) references paciente(id_paciente));

INSERT INTO nutricionista VALUES (12345,'carmen_fraga', 'abc123.', 'Carmen Fraga López');