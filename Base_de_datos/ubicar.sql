drop database if exists ubicar;
create database ubicar;
use ubicar;

create table Personas(
ID_persona int(10) not null primary key auto_increment,
Usuario varchar(20),
Password varchar(20) not null,
Nombre varchar(40) not null,
Ap_mat varchar(20) not null,
Ap_pat varchar(20) not null,
Sexo varchar(1) not null,
Fecha_Nacimiento DATE not null,
Activo bit not null,#Definira si su sesión se encuentra activa o no
Suspendido bit not null,#Definira si el usuario ha sido desactivado
Tipo mediumint(2) not null#Definira si es cliente o trabajador
)DEFAULT CHARSET= latin1;

create table Modelos(
ID_modelo int(10) not null primary key auto_increment,
Modelo varchar(20) not null
)DEFAULT CHARSET= latin1;

create table Marcas(
ID_marca int(10) not null primary key auto_increment,
Marca varchar(20) not null
)DEFAULT CHARSET= latin1;

create table Tipos(
ID_tipo int(10) not null primary key auto_increment,
Tipo varchar(20) not null
)DEFAULT CHARSET= latin1;

create table Dispositivos(
ID_dispositivo int(10) not null primary key auto_increment,
Identificador varchar(20) not null,
Activo bit not null
)DEFAULT CHARSET= latin1;

create table Tipos_Documento(
ID_tipo int(10) not null primary key auto_increment,
Tipo varchar(20) not null
)DEFAULT CHARSET= latin1;

create table Estados(
ID_estado int(10) not null primary key auto_increment,
Estado varchar(25)
)DEFAULT CHARSET= latin1;

create table Municipios(
ID_municipio int(10) not null primary key auto_increment,
Municipio varchar(40)
)DEFAULT CHARSET= latin1;

create table Colonias(
ID_colonia int(10) not null primary key auto_increment,
Colonia varchar(40)
)DEFAULT CHARSET= latin1;

create table Clientes(
ID_cliente int(10) not null primary key auto_increment,
ID_persona int(10) not null
)DEFAULT CHARSET= latin1;

create table Roles(
ID_rol int(10) not null primary key auto_increment,
Tipo varchar(20) not null
)DEFAULT CHARSET= latin1;

create table Direcciones(
ID_direccion int(10) not null primary key auto_increment,
ID_persona int(10) not null,
ID_Estado int(10) not null,
ID_Municipio int(10) not null,
ID_Colonia int(10) not null,
CP int(6) not null,
Calle varchar(35) not null,
Numero mediumint(6) not null,
FOREIGN KEY (ID_persona) REFERENCES Personas(ID_persona),
FOREIGN KEY (ID_Estado) REFERENCES Estados(ID_Estado),
FOREIGN KEY (ID_Municipio) REFERENCES Municipios(ID_Municipio),
FOREIGN KEY (ID_Colonia) REFERENCES Colonias(ID_Colonia)
) DEFAULT CHARSET= latin1;

create table Correos(
ID_correo int(10) not null primary key auto_increment,
ID_persona int(10) not null,
Correo varchar(35) not null,
FOREIGN KEY (ID_persona) REFERENCES Personas(ID_persona)
)DEFAULT CHARSET= latin1;

create table Telefonos(
ID_telefono int(10) not null primary key auto_increment,
ID_persona int(10) not null,
Telefono varchar(14) not null,
FOREIGN KEY (ID_persona) REFERENCES Personas(ID_persona)
)DEFAULT CHARSET= latin1;

create table Trabajadores(
ID_trabajador int(10) not null primary key auto_increment,
ID_persona int(10) not null,
ID_rol int(10) not null,#Definira el nivel del administrador dentro del sistema
FOREIGN KEY (ID_rol) REFERENCES Roles(ID_rol)
)DEFAULT CHARSET= latin1;

create table Automoviles(
ID_automovil int(10) not null primary key auto_increment,
ID_modelo int(10) not null,
ID_marca int(10) not null,
ID_tipo int(10) not null,
Placa varchar(12) not null,
Clase varchar(20) not null,
Color varchar(15) not null,
NIV varchar(20) not null,
FOREIGN KEY (ID_modelo) REFERENCES Modelos(ID_modelo),
FOREIGN KEY (ID_marca) REFERENCES Marcas(ID_marca),
FOREIGN KEY (ID_tipo) REFERENCES Tipos(ID_tipo)
)DEFAULT CHARSET= latin1;

create table Contratos(
ID_contrato int(10) not null primary key auto_increment,
ID_persona int(10) not null,
ID_trabajador int(10) not null,
ID_automovil int(10) not null,
FOREIGN KEY (ID_persona) REFERENCES Personas(ID_persona),
FOREIGN KEY (ID_trabajador) REFERENCES Trabajadores(ID_trabajador),
FOREIGN KEY (ID_automovil) REFERENCES Automoviles(ID_automovil)
)DEFAULT CHARSET= latin1;

create table Documentos(
ID_documento int(10) not null primary key auto_increment,
ID_tipo int(10) not null,
FOREIGN KEY (ID_tipo) REFERENCES Tipos_Documento(ID_tipo)
)DEFAULT CHARSET= latin1;

create table Detalles_Contrato(
ID_detalle int(10) not null primary key auto_increment,
ID_dispositivo int(10) not null,
ID_contrato int(10) not null,
ID_documento int(10) not null,
FOREIGN KEY (ID_dispositivo) REFERENCES Dispositivos(ID_dispositivo),
FOREIGN KEY (ID_contrato) REFERENCES Contratos(ID_contrato),
FOREIGN KEY (ID_documento) REFERENCES Documentos(ID_documento)
)DEFAULT CHARSET= latin1;
