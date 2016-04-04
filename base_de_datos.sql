drop database proyecto;
create database proyecto;

use  proyecto;
create table genero(
cod_genero int primary key auto_increment,
nombre varchar(100)


);
create table ciudad(

codigo INT primary key auto_increment ,
nombre VARCHAR(150) ,
provincia varchar (150) 
);




create table Usuario(
codigo_usuario int primary key auto_increment,
nombre_usu varchar(50) ,
pass VARCHAR(100) ,
correo VARCHAR(50) ,
imagen varchar(255) ,
tipo int,
edad int,
descripcion_musico varchar(255),

direccion varchar(250),
nombre_fan varchar(100),
ciudad_fan varchar(100),
genero_fan int,
fecha_nacimiento date,
nombre_grupo varchar(100),
genero_musico int,
telefono varchar(9),
persona_contacto varchar(100),
cod_ciudad int,
descripcion_local varchar(20),
    FOREIGN KEY (genero_musico)
    REFERENCES genero (cod_genero),

    FOREIGN KEY (genero_fan)
    REFERENCES genero (cod_genero),

    FOREIGN KEY (cod_ciudad)
    REFERENCES ciudad (codigo)


);
create table Concierto(
codigo INT primary key auto_increment,
nombre_concierto varchar(250),
estado int ,
fecha date ,
cod_genero int,
cod_local int,
    FOREIGN KEY (cod_genero)
    REFERENCES genero (cod_genero),
  
    FOREIGN KEY (cod_local)
    REFERENCES usuario (codigo_usuario)



);






create table votacion_concierto(
codigov int auto_increment,
cod_fan int ,
cod_concierto int ,
puntuacion int,
primary key (codigov,cod_fan,cod_concierto) ,
foreign key (cod_fan) references usuario(codigo_usuario),
foreign key (cod_concierto) references concierto(codigo)
);


create table votacion_local(
cod_fan int ,
cod_local int,
primary key(cod_local,cod_fan),
puntuacion int,
foreign key (cod_fan) references usuario(codigo_usuario),
foreign key (cod_local) references usuario(codigo_usuario));

create table votacion_conciertos(
cod_fan int ,
cod_conciertos int,
primary key(cod_fan,cod_conciertos),
puntuacion int,
foreign key (cod_conciertos) references concierto(codigo),
foreign key (cod_fan) references usuario(codigo_usuario));

create table votacion_musico(
cod_fan int ,
cod_musico int,
primary key(cod_fan,cod_musico),
puntuacion int,
foreign key (cod_fan) references usuario(codigo_usuario),
foreign key (cod_musico) references usuario(codigo_usuario));
select * from usuario,ciudad where  tipo=1 and cod_ciudad=codigo   ;
select nombre_fan from usuario,ciudad where  tipo=2 and codigo_usuario=codigo  and codigo=1 ;
select * from usuario ;
select cod_fan from votacion_concierto v ,concierto c,usuario u where v.cod_concierto=3 and puntuacion=2 and u.codigo_usuario=v.cod_fan;

INSERT INTO `ciudad` ( `nombre`) VALUES( 'A Coruña'),( 'Alava'),( 'Albacete'),( 'Alicante'),( 'Almería'),( 'Asturias'),( 'Avila'),( 'Badajoz'),( 'Baleares'),( 'Barcelona'),( 'Bizkaia'),( 'Burgos'),( 'Cáceres'),( 'Cádiz'),( 'Cantabria'),( 'Castellón'),( 'Ceuta'),( 'Ciudad Real'),( 'Córdoba'),( 'Cuenca'),('Guipuzkoa'),( 'Girona'),( 'Granada'),( 'Guadalajara'),( 'Huelva'),( 'Huesca'),( 'Jaén'),( 'La Rioja'),( 'Las Palmas'),( 'León'),( 'Lugo'),( 'Lleida'),( 'Madrid'),( 'Málaga'),( 'Melilla'),( 'Murcia'),( 'Navarra'),( 'Ourense'),( 'Palencia'),('Pontevedra'),( 'Salamanca'),( 'Segovia'),( 'Sevilla'),( 'Soria'),( 'Tarragona'),( 'Tenerife'),( 'Teruel'),( 'Toledo'),( 'Valencia'),( 'Valladolid'),( 'Zamora'),( 'Zaragoza'); 
INSERT INTO  genero (nombre) values ('rock'),('pop'),('jazz'),('rap');