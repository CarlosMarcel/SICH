-- --------------------------------------------
-- Procedimientos almacenados para Persona
-- --------------------------------------------
DROP PROCEDURE if exists insertarPersona;
DELIMITER |
	CREATE PROCEDURE insertarPersona(
		personaCedula int(11),
		personaNombre varchar(45),
		personaApellido varchar(45),
		personaApellido2 varchar(45),
		personaTelefono int(8),
		personaCorreo varchar(50),
		personaFechaNacimiento date,
		personaDireccion varchar(45),
		personaTipoRol enum('Administrador','Usuarios','Empleado'),
		personaCodigoAcceso int(11))
	BEGIN		
		INSERT INTO tbl_persona(cedula, nombre, apellido, apellido2,
								telefono, correo, fechaNacimiento, direccion, codigoAcceso, 
								tipoRol, estado)
		VALUES(personaCedula, personaNombre, personaApellido , personaApellido2,personaTelefono,
								personaCorreo, personaFechaNacimiento,personaDireccion,personaCodigoAcceso,personaTipoRol
								,'A');
	END |
DELIMITER ;

------------------------------------------------------
DROP PROCEDURE if exists modificarPersona;
DELIMITER |
	CREATE PROCEDURE modificarPersona(
	    ApersonaCedula int(11),
		ApersonaNombre varchar(45),
		ApersonaApellido varchar(45),
		ApersonaApellido2 varchar(45),
		ApersonaTelefono int(8),
		ApersonaCorreo varchar(50),
		ApersonaFechaNacimiento date,
		ApersonaDireccion varchar(45),
		ApersonaTipoRol enum('Administrador','Usuarios','Empleado'),
		ApersonaCodigoAcceso int(11))
	BEGIN		
		UPDATE tbl_persona set nombre = ApersonaNombre, apellido = ApersonaApellido, apellido2 = ApersonaApellido2,
		telefono = ApersonaTelefono, correo = ApersonaCorreo, fechaNacimiento = ApersonaFechaNacimiento,
		direccion = ApersonaDireccion, codigoAcceso = ApersonaCodigoAcceso, tipoRol = ApersonaTipoRol
		 WHERE tbl_persona.cedula = ApersonaCedula;
	END |
DELIMITER ;
---------------------------------------------------------
DROP PROCEDURE if exists inactivarPersona;
DELIMITER |
	CREATE PROCEDURE inactivarPersona(
    	personaCedula int(11))
	BEGIN		
		UPDATE tbl_persona set personaEstado = 'I' WHERE tbl_persona.personaCedula = personaCedula;
	END |
DELIMITER ;
---------------------------------------------------------------
DROP PROCEDURE if exists personasXcedula;
DELIMITER |
	CREATE PROCEDURE personasXcedula(
		personaCedula int(11))
	BEGIN		
		SELECT personaCedula,personaNombre, personaApellido, personaApellido2
        FROM tblestudiantes
        WHERE estudianteEstado='A' AND tblestudiantes.estudianteCedula = estudianteCedula group by personaCedula;
	
    END |
DELIMITER ;