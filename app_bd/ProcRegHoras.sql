use registrohorascolaboracion;

-- --------------------------------------------
-- Procedimientos almacenados para Estudiante--
-- --------------------------------------------
DROP PROCEDURE if exists insertarEstudiante;
DELIMITER |
	CREATE PROCEDURE insertarEstudiante(
		estudianteCedula char(11),
	    estudianteNombre char(25),
	    estudianteApellido1 char(25),
	    estudianteApellido2 char(25))
	BEGIN		
		INSERT INTO tblEstudiantes(estudianteCedula, estudianteNombre, estudianteApellido1, estudianteApellido2, estudianteEstado)
		VALUES(estudianteCedula, estudianteNombre, estudianteApellido1, estudianteApellido2 ,'A');
	END |
DELIMITER ;

DROP PROCEDURE if exists inactivarEstudiante;
DELIMITER |
	CREATE PROCEDURE inactivarEstudiante(
    	estudianteCedula int)
	BEGIN		
		UPDATE tblEstudiantes set estudianteEstado = 'I' WHERE tblEstudiantes.estudianteCedula = estudianteCedula;
	END |
DELIMITER ;

DROP PROCEDURE if exists modificarEstudiante;
DELIMITER |
	CREATE PROCEDURE modificarEstudiante(
    	PestudianteCedula char(11),
	    PestudianteNombre char(25),
	    PestudianteApellido1 char(25),
	    PestudianteApellido2 char(25))
	BEGIN		
		UPDATE tblEstudiantes set estudianteNombre = PestudianteNombre, estudianteApellido1 = PestudianteApellido1, estudianteApellido2 = PestudianteApellido2 WHERE tblEstudiantes.estudianteCedula = estudianteCedula;
	END |
DELIMITER ;

DROP PROCEDURE if exists estudiantesXCedula;
DELIMITER |
	CREATE PROCEDURE estudiantesXCedula(
		estudianteCedula CHAR (11))
	BEGIN		
		SELECT estudianteCedula,estudianteNombre, estudianteApellido1, estudianteApellido2
        FROM tblestudiantes
        WHERE estudianteEstado='A' AND tblestudiantes.estudianteCedula = estudianteCedula group by estudianteCedula;
	
    END |
DELIMITER ;
-- ---------------------------------------
-- Procedimientos almacenados para Tutor--
-- ---------------------------------------
DROP PROCEDURE if exists insertarTutor;
DELIMITER |
	CREATE PROCEDURE insertarTutor(
		tutorCedula char(11),
	    tutorNombre char(25),
	    tutorApellido1 char(25),
	    tutorApellido2 char(25),
	    tutorCelular int,
	    tutorPassword char(10))
	BEGIN		
		INSERT INTO tblTutores(tutorCedula, tutorNombre, tutorApellido1, tutorApellido2, tutorCelular, tutorPassword, tutorEstado)
		VALUES(tutorCedula, tutorNombre, tutorApellido1, tutorApellido2, tutorCelular, tutorPassword, 'A');
	END |
DELIMITER ;

DROP PROCEDURE if exists inactivarTutor;
DELIMITER |
	CREATE PROCEDURE inactivarTutor(
    	tutorCedula char(11))
	BEGIN		
		UPDATE tblTutores set tutorEstado = 'I' WHERE tbltutores.tutorCedula = tutorCedula;
	END |
DELIMITER ;

DROP PROCEDURE if exists modificarTutor;
DELIMITER |
	CREATE PROCEDURE modificarTutor(
    	PtutorCedula char(11),
	    PtutorNombre char(25),
	    PtutorApellido1 char(25),
	    PtutorApellido2 char(25),
	    PtutorCelular int)
	BEGIN		
		UPDATE tbltutores set tutorNombre = PtutorNombre, tutorApellido1 = PtutorApellido1, tutorApellido2 = PtutorApellido2, tutorCelular = PtutorCelular WHERE tbltutores.tutorCedula = tutorCedula;
	END |
DELIMITER ;
-- ----------------------------------------
-- Procedimientos almacenados para Taller--
-- ----------------------------------------
DROP PROCEDURE if exists insertarTaller;
DELIMITER |
	CREATE PROCEDURE insertarTaller(
		tallerNombre char(25),
		tallerTutorId char(11),
		tallerDia char(10),
		tallerHoraInicio time,
		tallerHoraFinal time)
	BEGIN		
		INSERT INTO tbltalleres(tallerNombre, tallerTutorId, tallerDia, tallerHoraInicio, tallerHoraFinal, tallerEstado)
		VALUES(tallerNombre, tallerTutorId, tallerDia, tallerHoraInicio, tallerHoraFinal, 'A');
	END |
DELIMITER ;

DROP PROCEDURE if exists inactivarTaller;
DELIMITER |
	CREATE PROCEDURE inactivarTaller(
    	tallerId int)
	BEGIN		
		UPDATE tbltalleres set tallerEstado = 'I' WHERE tbltalleres.tallerId = tallerId;
	END |
DELIMITER ;

DROP PROCEDURE if exists modificarTaller;
DELIMITER |
	CREATE PROCEDURE modificarTaller(
		PtallerId int,
    	PtallerTutorId char(11),
	    PtallerDia char(10),
	    PtallerHoraInicio time,
	    PtallerHoraFinal time)
	BEGIN		
		UPDATE tbltalleres set tallerTutorId = PtallerTutorId, tallerDia = PtallerDia, tallerHoraInicio = PtallerHoraInicio, tallerHoraFinal = PtallerHoraFinal  WHERE tbltalleres.tallerId = PtallerId;
	END |
DELIMITER ;

DROP PROCEDURE if exists talleresXTutor;
DELIMITER |
	CREATE PROCEDURE talleresXTutor(
    	PtallerTutorId char(11))
	BEGIN		
		SELECT tallerId, tallerDia
        FROM tbltalleres
        WHERE tallerEstado = 'A' AND tbltalleres.tallerTutorId = PtallerTutorId;
	END |
DELIMITER ;

DROP PROCEDURE if exists diasXTutor;
DELIMITER |
	CREATE PROCEDURE diasXTutor(
    	PtallerTutorId char(11))
	BEGIN		
		SELECT tallerDia
        FROM tbltalleres
        WHERE tallerEstado = 'A' AND tbltalleres.tallerTutorId = PtallerTutorId;
	END |
DELIMITER ;

DROP PROCEDURE if exists talleresXEstudiante;
DELIMITER |
	CREATE PROCEDURE talleresXEstudiante(
    	estudianteCedula char(11))
	BEGIN
        SELECT `tutorCedula`,`tallerNombre`FROM `tbltalleres` inner join tblregistro on tbltalleres.tallerTutorId = tblregistro.registroTutorId inner join tbltutores on tbltalleres.tallerTutorId = tbltutores.tutorcedula 
        WHERE tblregistro.registroEstudianteCedula = estudianteCedula AND tblregistro.registroEstado = 'A' group by tbltalleres.tallerNombre;
	END |
DELIMITER ;
-- ----------------------------------------
-- Procedimientos almacenados para Enlace--
-- ----------------------------------------
DROP PROCEDURE if exists insertarEnlace;
DELIMITER |
	CREATE PROCEDURE insertarEnlace(
    	enlaceEstudianteCedula int,
    	enlaceTallerId int)
	BEGIN		
		INSERT INTO tblEnlaces(enlaceEstudianteCedula, enlaceTallerId, enlaceEstado)
		VALUES(enlaceEstudianteCedula, enlaceTallerId, 'A');
	END |
DELIMITER ;

DROP PROCEDURE if exists inactivarEnlace;
DELIMITER |
	CREATE PROCEDURE inactivarEnlace(
    	enlaceId int)
	BEGIN		
		UPDATE tblEnlaces set enlaceEstado = 'I' WHERE tblenlaces.enlaceId = enlaceId;
	END |
DELIMITER ;

DROP PROCEDURE if exists enlacesXTaller;
DELIMITER |
	CREATE PROCEDURE enlacesXTaller(
		PtallerId int)
	BEGIN		
		SELECT estudianteCedula,estudianteNombre, estudianteApellido1, estudianteApellido2
        FROM tbltalleres, tblestudiantes, tblenlaces
        WHERE estudianteEstado='A' AND tblestudiantes.estudianteCedula = tblenlaces.enlaceEstudianteCedula AND tblenlaces.enlaceTallerId = PtallerId AND tblenlaces.enlaceTallerId = tbltalleres.tallerId;
	
    END |
DELIMITER ;
-- -------------------------------------------
-- Procedimientos almacenados para Resgistro --
-- -------------------------------------------
DROP PROCEDURE if exists insertarRegistro;
DELIMITER |
	CREATE PROCEDURE insertarRegistro(
    	registroEstudianteCedula char(11),
		registroTutorId char(11),
	    registroFecha date)
	BEGIN		
		INSERT INTO tblRegistro(registroEstudianteCedula, registroTutorId, registroFecha, registroEstado)
		VALUES(registroEstudianteCedula, registroTutorId, registroFecha, 'A');
	END |
DELIMITER ;

DROP PROCEDURE if exists registroXCedulaXTaller;
DELIMITER |
	CREATE PROCEDURE registroXCedulaXTaller(
		estudianteTallerId int,
		estudianteCedula char(11))
	BEGIN		
		SELECT estudianteCedula, estudianteNombre, estudianteApellido1, estudianteApellido2, registroFecha, tallerNombre, TIMESTAMPDIFF(HOUR, tbltalleres.tallerHoraInicio, tbltalleres.tallerHoraFinal) as Horas, tallerHoraInicio, tallerHoraFinal
        FROM tblestudiantes inner join tblregistro on tblestudiantes.estudianteCedula = tblregistro.registroEstudianteCedula inner join tbltalleres on tblregistro.registroTutorId = tbltalleres.tallerTutorId
        WHERE registroEstado='A' AND estudianteEstado= 'A'  AND tblregistro.registroEstudianteCedula = estudianteCedula AND tblregistro.registroTutorId = estudianteTallerId group by tblregistro.registroFecha;
    END |
DELIMITER ;

DROP PROCEDURE if exists registroXCedula;
DELIMITER |
	CREATE PROCEDURE registroXCedula(
		estudianteCedula char(11))
	BEGIN		
		SELECT estudianteCedula, estudianteNombre, estudianteApellido1, estudianteApellido2, registroFecha, tallerNombre, TIMESTAMPDIFF(HOUR, tbltalleres.tallerHoraInicio, tbltalleres.tallerHoraFinal) as Horas, tallerHoraInicio, tallerHoraFinal
        FROM tblestudiantes inner join tblregistro on tblestudiantes.estudianteCedula = tblregistro.registroEstudianteCedula inner join tbltalleres on tblregistro.registroTutorId = tbltalleres.tallerTutorId
        WHERE registroEstado='A' AND estudianteEstado= 'A' AND tblregistro.registroEstudianteCedula = estudianteCedula group by tblregistro.registroFecha;
    END |
DELIMITER ;

DROP PROCEDURE if exists registroXFechas;
DELIMITER |
	CREATE PROCEDURE registroXFechas(
		estudianteCedula char(11),
		fechaInicio date,
        fechaFin date,
        estudianteTallerId int)
	BEGIN		
		SELECT estudianteCedula, estudianteNombre, estudianteApellido1, estudianteApellido2, registroFecha, tallerNombre, hour(SEC_TO_TIME(SUM(TIME_TO_SEC(timediff(tbltalleres.tallerHoraFinal, tbltalleres.tallerHoraInicio))))) as Horas, tallerHoraInicio, tallerHoraFinal
        FROM tblestudiantes inner join tblregistro on tblestudiantes.estudianteCedula = tblregistro.registroEstudianteCedula inner join tbltalleres on tblregistro.registroTallerId = tbltalleres.tallerId
        WHERE registroEstado='A' AND estudianteEstado= 'A' AND tblregistro.registroEstudianteCedula = estudianteCedula AND tblregistro.registroTallerId = estudianteTallerId AND DATE(tblregistro.registroFecha) BETWEEN fechaInicio AND fechaFin group by tblregistro.registroFecha;
    END |
DELIMITER ;

DROP PROCEDURE if exists inactivaRegistro;
DELIMITER |
	CREATE PROCEDURE inactivaRegistro(
    	cedEstudiante char(11),
        cedTutor char(11),
        fecha date)
	BEGIN		
		UPDATE tblregistro set registroEstado = 'I' WHERE tblregistro.registroEstudianteCedula = cedEstudiante AND tblregistro.registroTutorId = cedTutor AND tblregistro.registroFecha = fecha;
	END |
DELIMITER ;