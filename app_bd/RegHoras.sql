drop database if exists registrohorascolaboracion;
create database registrohorascolaboracion;

use registrohorascolaboracion;

drop table if exists tblEstudiantes;
create table tblEstudiantes(
	estudianteCedula char(11),
    estudianteNombre char(25),
    estudianteApellido1 char(25),
    estudianteApellido2 char(25),
    estudianteEstado ENUM('A','I'),
    PRIMARY KEY (estudianteCedula)
);
drop table if exists tblTutores;
create table tblTutores(
	tutorCedula char(11),
    tutorNombre char(25),
    tutorApellido1 char(25),
    tutorApellido2 char(25),
    tutorCelular int,
    tutorPassword varchar(128),
    tutorEstado ENUM('A','I'),
    PRIMARY KEY (tutorCedula)
);
drop table if exists tblTalleres;
create table tblTalleres(
	tallerId int auto_increment not null,
    tallerNombre char(25),
    tallerTutorId char(11),
    tallerDia char(10),
    tallerHoraInicio time,
    tallerHoraFinal time,
    tallerEstado ENUM('A','I'),
    PRIMARY KEY (tallerId),
	FOREIGN KEY (tallerTutorId) REFERENCES tblTutores (tutorCedula)
);
drop table if exists tblEnlaces;
create table tblEnlaces(
	-- enlaceId int auto_increment not null,
    enlaceEstudianteCedula char(11),
    enlaceTallerId int,
    enlaceEstado ENUM('A','I'),
    PRIMARY KEY (enlaceEstudianteCedula, enlaceTallerId),
	FOREIGN KEY (enlaceEstudianteCedula) REFERENCES tblEstudiantes (estudianteCedula),
    FOREIGN KEY (enlaceTallerId) REFERENCES tblTalleres (tallerId)
);
drop table if exists tblRegistro;
create table tblRegistro(
	registroId int auto_increment not null,
	registroEstudianteCedula char(11),
    registroTutorId char(11),
    registroFecha date,
    registroEstado ENUM('A','I'),
	PRIMARY KEY (registroId),
	FOREIGN KEY (registroEstudianteCedula) REFERENCES tblEstudiantes (estudianteCedula),
    FOREIGN KEY (registroTutorId) REFERENCES tbltutores (tutorCedula)
);