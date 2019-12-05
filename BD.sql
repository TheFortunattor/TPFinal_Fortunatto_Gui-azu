drop database if exists motorG;
create database motorG;
use motorG;
create table usuarios(
    id int primary key auto_increment,
    correo varchar(30),
    nombre varchar(20),
    contrasenna varchar(20)
 );
 insert into usuarios values
 ("","axeloti@hotmail.com.ar","admin","admin");

create table motos(
    id int primary key auto_increment,
    titulo varchar(40),
    marca varchar(40),
    anno varchar(40),
    precio int,
    imagen varchar(60)
);


insert into motos values
(1,"Honda XR","250cc","2019",266800,"./img/Honda_xr_250.jpg"),
(2,"Yamaha XTZ","125cc","2019",100000,"./img/Yamaha_xtz_125.jpg"),
(3,"Suzuki GIXXER","150cc","2019",138900,"./img/Suzuki_gixxer_150.jpg");