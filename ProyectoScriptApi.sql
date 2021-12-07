drop database cines;

create database cines;
use cines;


create table actor(
	clave varchar(3) not null,
    nombre varchar(30),
    edad smallint,
    sexo varchar(20),
    constraint actorPK primary key (clave)
);


create table rol(
	clave varchar(3) not null,
    descripcion varchar(20),
    constraint rolPK primary key (clave)
);


create table personaje(
	clave varchar(3) not null,
	nombre varchar (30),
    claveActor varchar(3) not null,
    claveRol varchar(3) not null,
    constraint personajePK primary key (clave),
    constraint personajeFK1 foreign key (claveActor) references actor(clave),
    constraint personajeFK2 foreign key (claveRol) references rol(clave)
);

create table productora(
	clave varchar(3) not null,
    nombre varchar(30),
    constraint productoraPK primary key (clave)
);


create table director(
	clave varchar(3) not null,
    nombre varchar(30),
    edad smallint,
    sexo varchar(20),
    constraint directorPK primary key (clave)
);


create table pais(
	clave varchar(3) not null,
    nombre varchar(30),
    constraint paisPK primary key (clave)
);


create table genero(
	clave varchar(3) not null,
    descripcion varchar(20),
    constraint generoPK primary key (clave)
);

create table pelicula(
	clave varchar(3),
    nombre varchar(30),
    fechaEstreno date,
    claveProductora varchar(3) not null,
    claveDirector varchar(3) not null,
    clavePais varchar(3) not null,
    claveGenero varchar(3) not null,
    constraint peliculaPK primary key (clave),
    constraint peliculaFK1 foreign key (claveProductora) references productora(clave),
    constraint peliculaFK2 foreign key (claveDirector) references director(clave),
    constraint peliculaFK3 foreign key (clavePais) references pais(clave),
    constraint peliculaFK4 foreign key (claveGenero) references genero(clave)
);


create table reparto(
	clavePersonaje varchar(3) not null,
    clavePelicula varchar(3) not null,
    constraint repartoPK primary key (clavePersonaje, clavePelicula),
    constraint repartoFK1 foreign key (clavePersonaje) references personaje(clave),
    constraint repartoFK2 foreign key (clavePelicula) references pelicula(clave)
);


create table tipoEntrada(
	clave varchar(3) not null,
    descripcion varchar(30),
    precio decimal,
    constraint tipoEntradaPK primary key (clave)
);


create table horario(
	clave varchar(3) not null,
    primeraFuncion time,
    ultimaFuncion time,
    duracionPublicidad decimal,
    constraint horarioPK primary key (clave)
);


create table cine(
	clave varchar(3) not null,
    nombre varchar(30),
    direccion varchar(100),
    claveHorario varchar(3) not null,
    constraint  cinePK primary key (clave),
	constraint cineFK1 foreign key (claveHorario) references horario(clave)
);


create table programacion(
	clave varchar(3) not null,
    fechaInicio date,
    fechaFin date,
    claveCine varchar(3) not null,
    constraint programacionPK primary key (clave),
	constraint programacionFK1 foreign key (claveCine) references cine(clave)
);


create table sala(
	clave varchar(3) not null,
    capacidad smallint,
    claveCine varchar(3) not null,
    constraint salaPK primary key (clave),
	constraint salaFK1 foreign key (claveCine) references cine(clave)
);


create table funcion(
	clave varchar(3) not null,
    fecha date,
    duracion integer,
    horaInicio time,
    clavePelicula varchar(3) not null,
    claveProgramacion varchar(3) not null,
    claveSala varchar(3) not null,
    constraint funcionPK primary key (clave),
	constraint funcionFK1 foreign key (clavePelicula) references pelicula(clave),
    constraint funcionFK2 foreign key (claveProgramacion) references programacion(clave),
    constraint funcionFK3 foreign key (claveSala) references sala(clave)
);


create table entrada(
	numero integer not null,
    asiento varchar(3),
    claveFuncion varchar(3) not null,
    claveTipoEntrada varchar(3) not null,
    constraint entradaPK primary key (numero, claveFuncion),
	constraint entradaFK1 foreign key (claveFuncion) references funcion(clave),
	constraint entradaFK2 foreign key (claveTipoEntrada) references tipoEntrada(clave)
);

/*actor*/
insert into actor (clave, nombre, edad, sexo) values
('TH1','Tom Holland',25,'H'),
('WD1','Willem Dafoe',66,'H'),
('TM1','Tobey Maguire',46,'H'),
('LD1','Leonardo Dicaprio',47,'H'),
('CH1','Clint Heastwood',91,'H');

/*rol*/
insert into rol (clave, descripcion) values
('PRO','Protagonista'),
('ANT','Antagonista'),
('DEU','Deuteangonista'),
('TRI','Tritagonista');

/*personaje*/
insert into personaje (clave, nombre, claveActor, claveRol) values
('SP1','Spiderman','TH1','PRO'),
('HN1','El hombre sin nombre','CH1','DEU'),
('DV1','Duende verde','WD1','ANT'),
('SP2','Spiderman','TM1','PRO'),
('JD1','Jack Dawson','LD1','PRO');

/*productora*/
insert into productora (clave, nombre) values
('MRV','Marvel studios'),
('IE1','Imperative entertainment'),
('SP1','Sony pictures'),
('20C','20th Century Studios');

/*director*/
insert into director (clave, nombre, edad, sexo) values
('JW1','Jon Watts',40,'H'),
('CH1','Clint Heastwood',91,'H'),
('JC1','James Cameron',67,'H'),
('MW1','Marc Webb',47,'H');

/*pais*/
insert into pais (clave, nombre) values
('USA','Estados Unidos');

/*genero*/
insert into genero (clave, descripcion) values
('ACT','Accion'),
('AVT','Aventura'),
('CFC','Ciencia Ficcion'),
('CMD','Comedia'),
('DRM','Drama'),
('FTS','Fantasia'),
('MSC','Musical'),
('SPS','Suspenso'),
('TRR','Terror');

/*pelicula*/
insert into pelicula (clave, nombre,fechaEstreno, claveProductora, claveDirector, clavePais, claveGenero) values
('SPN','Spiderman: No Way Home','2021-12-15','MRV','JW1','USA','ACT'),
('MUL','The Mule','2018-12-14','IE1','CH1','USA','AVT'),
('TIC','Titanic','1998-01-01','20C','JC1','USA','DRM'),
('TAS','The amazing Spiderman', '2012-07-06','SP1', 'MW1','USA','ACT');

/*reparto*/
insert into reparto (clavePersonaje, clavePelicula) values
('SP1','SPN'),
('HN1','MUL'),
('DV1','SPN'),
('SP2','TAS'),
('JD1','TIC');

/*tipoEntrada*/
insert into tipoEntrada (clave, descripcion, precio) values
('SUA','Subtitulada adulto',80),
('SUN','Subtitulada nino',70),
('3DA','3d subtitulada adulto',90),
('3DN','3d subtitulada nino',80),
('DOA','Doblada adulto',80),
('DON','Doblada nino',70);

/*horario*/
insert into horario(clave, primeraFuncion, ultimaFuncion, duracionPublicidad) values
('AA1','11:00:00', '1:00:00', 5);

/*cine*/
insert into cine(clave, nombre, direccion, claveHorario) values
('C01','Cinepolis Parque Celaya', 'AV El Sauz 801, Celaya GTO', 'AA1'),
('C02','Cinepolis Galerias', 'Eje Vial Luis Donaldo Colosio 200 Magno, Celaya GTO', 'AA1');

/*programacion*/
insert into programacion(clave, fechaInicio, fechaFin, claveCine) values
('001','2021-12-15','2022-01-20','C01'),
('002','2021-11-25','2021-12-25','C02'),
('003','2021-12-02','2022-01-10','C02');


/*sala*/
insert into sala(clave, capacidad, claveCine) values
('001',100,'C01'),
('002',70,'C02'),
('003',80,'C02'),
('004',50,'C01'),
('005',60,'C02'),
('006',50,'C02');

/*funcion*/
insert into funcion(clave, fecha, duracion, horaInicio, clavePelicula, claveProgramacion, claveSala) values
('001','2021-12-16', 110,'12:00:00','SPN','001','001'),
('002','2021-12-16', 85,'17:00:00','TIC','003','001'),
('003','2021-12-17', 110,'17:30:30','SPN','001','005'),
('004','2021-12-28', 96,'12:00:00','TIC','003','003'),
('005','2021-12-28', 96,'13:30:00','SPN','001','002'),
('006','2022-01-02', 85,'13:30:00','SPN','001','003');

/*entrada*/
insert into entrada(numero, asiento, claveFuncion, claveTipoEntrada) values
('001','A12','001','SUA'),
('002','B12','001','SUA'),
('003','A11','002','DOA'),
('004','A13','001','SUN'),
('006','C15','003','3DA');

select * from actor;
select * from rol;

/*Pelicula con actores*/
select p.nombre, p.fechaEstreno, pr.nombre, d.nombre, pa.nombre, g.descripcion, a.nombre, pe.nombre, r.descripcion from pelicula p
inner join productora pr on p.claveProductora = pr.clave
inner join director d on p.claveDirector = d.clave
inner join pais pa on p.clavePais = pa.clave
inner join genero g on p.claveGenero = g.clave
inner join reparto re on re.clavePelicula = p.clave
inner join personaje pe on re.clavePersonaje = pe.clave
inner join rol r on pe.claveRol = r.clave
inner join actor a on pe.claveActor = a.clave ;

/*Peliculas*/
select p.nombre, p.fechaEstreno, pr.nombre as nombreProd, 
d.nombre as nombreDir, pa.nombre as nombrePais, g.descripcion from pelicula p
inner join productora pr on p.claveProductora = pr.clave
inner join director d on p.claveDirector = d.clave
inner join pais pa on p.clavePais = pa.clave
inner join genero g on p.claveGenero = g.clave;

/*Solo actores y sus roles */
select a.nombre, pe.nombre as nombrePel, r.descripcion from actor a
inner join personaje pe on a.clave = pe.claveActor
inner join rol r on pe.claveRol = r.clave
inner join reparto re on re.clavePersonaje = pe.clave
inner join pelicula p on re.clavePelicula = p.clave;

/*Boletos*/
select e.asiento, t.descripcion, t.precio, f.fecha, f.horaInicio, p.nombre, s.clave, c.nombre as nombreCine from entrada e
inner join tipoEntrada t on e.claveTipoEntrada = t.clave
inner join funcion f on e.claveFuncion = f.clave
inner join pelicula p on f.clavePelicula = p.clave
inner join sala s on f.claveSala = s.clave
inner join cine c on s.claveCine = c.clave;

/*Cine horarios*/
select c.nombre, c.direccion, h.primeraFuncion, h.ultimaFuncion, h.duracionPublicidad from cine c
inner join horario h on c.claveHorario = h.clave;

/*Funciones*/
select p.nombre, c.nombre as nombreCine, c.direccion, f.fecha, f.duracion, f.horaInicio, pr.fechaInicio, pr.fechaFin, s.clave from funcion f
inner join pelicula p on f.clavePelicula = p.clave
inner join programacion pr on f.claveProgramacion = pr.clave
inner join sala s on f.claveSala = s.clave
inner join cine c on s.claveCine = c.clave;

/*Funciones no programadas*/
select p.nombre, c.nombre as nombreCine, c.direccion, f.fecha, f.duracion, f.horaInicio, s.clave from funcion f
inner join pelicula p on f.clavePelicula = p.clave
inner join sala s on f.claveSala = s.clave
inner join cine c on s.claveCine = c.clave
inner join programacion pr on f.claveProgramacion = pr.clave
where f.claveProgramacion is null;
