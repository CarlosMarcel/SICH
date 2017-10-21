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
		INSERT INTO tbl_persona(cedulaPersona, nombre, apellido, apellido2,
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
		 WHERE tbl_persona.cedulaPersona = ApersonaCedula;
	END |
DELIMITER ;
---------------------------------------------------------
DROP PROCEDURE if exists inactivarPersona;
DELIMITER |
	CREATE PROCEDURE inactivarPersona(
    	personaCedula int(11))
	BEGIN		
		UPDATE tbl_persona set estado = 'I' WHERE tbl_persona.cedulaPersona = personaCedula;
	END |
DELIMITER ;
---------------------------------------------------------------
DROP PROCEDURE if exists personasXcedula;
DELIMITER |
	CREATE PROCEDURE personasXcedula(
		personaCedula int(11),
		personaNombre varchar(45),
		personaApellido varchar(45),
		personaApellido2 varchar(45))
	BEGIN		
		SELECT *
        FROM tbl_persona 
        WHERE estado='A' AND tbl_persona.cedulaPersona = personaCedula group by personaCedula;
	
    END |
DELIMITER ;
-- --------------------------------------------
-- Procedimientos almacenados para Empleado
-- --------------------------------------------

DROP PROCEDURE if exists insertarEmpleado;
DELIMITER |
	CREATE PROCEDURE insertarEmpleado(
		empleadocedulaPersona int(11),
		empleadoPuesto varchar(45),
		empleadoSalario varchar(45),
		empleadoFechaIngreso date,
		empleadoHorario varchar(45))
	BEGIN		
		INSERT INTO tbl_empleado(cedulaPersona,puesto,salario,fechaIngreso,horario,estado)
		VALUES(empleadocedulaPersona,empleadoPuesto,empleadoSalario,empleadoFechaIngreso,empleadoHorario,'A');
	END |
DELIMITER ;
------------------------------------------------------
DROP PROCEDURE if exists modificarEmpleado;
DELIMITER |
	CREATE PROCEDURE modificarEmpleado(
	    actualiza_empleadocedulaPersona int(11),
		actualiza_empleadoPuesto varchar(45),
		actualiza_empleadoSalario varchar(45),
		actualiza_empleadoFechaIngreso date,
		actualiza_empleadoHorario varchar(45))
	BEGIN		
		UPDATE tbl_empleado set puesto = actualiza_empleadoPuesto, salario = actualiza_empleadoSalario, fechaIngreso = actualiza_empleadoFechaIngreso,
		horario = actualiza_empleadoHorario
		 WHERE tbl_empleado.cedulaPersona = actualiza_empleadocedulaPersona;
	END |
DELIMITER ;
---------------------------------------------------------
DROP PROCEDURE if exists consultarEmpleado;
DELIMITER |
	CREATE PROCEDURE consultarEmpleado()
  
	BEGIN		
		SELECT tbl_persona.cedulaPersona , tbl_persona.nombre , tbl_persona.apellido , tbl_persona.apellido2 , puesto, salario
		FROM tbl_persona inner join tbl_empleado on tbl_persona.cedulaPersona = tbl_empleado.cedulaPersona 
		WHERE tbl_empleado.estado = 'A' AND tbl_persona.cedulaPersona = tbl_empleado.cedulaPersona GROUP BY tbl_persona.cedulaPersona;
	END |
DELIMITER ;
---------------------------------------------------------
DROP PROCEDURE if exists inactivarEmpleado;
DELIMITER |
	CREATE PROCEDURE inactivarEmpleado(
    	empleadocedulaPersona int(11))
	BEGIN		
		UPDATE tbl_empleado set estado = 'I' WHERE tbl_empleado.cedulaPersona = empleadocedulaPersona;
	END |
DELIMITER ;
-- --------------------------------------------
-- Procedimientos almacenados para Tareas
-- --------------------------------------------
DROP PROCEDURE if exists insertarTarea;
DELIMITER |
	CREATE PROCEDURE insertarTarea(
		tareacedulaPersona int(11),
		tareaDescripcion varchar(45),
		tareaFecha date)
	BEGIN		
		INSERT INTO tbl_tareas(cedulaPersona,descripcion,fecha,estadoTarea,estado)
		VALUES(tareacedulaPersona,tareaDescripcion,tareaFecha,'Incompleta','A');
	END |
DELIMITER ;
------------------------------------------------------------
DROP PROCEDURE if exists modificarTareas;
DELIMITER |
	CREATE PROCEDURE modificarTareas(
	    actualiza_tareacedulaPersona int(11),
		actualiza_tareaDescripcion varchar(45),
		actualiza_tareaFecha date,
		actualiza_tareaEstadoTarea enum('Completa','Incompleta'))
	BEGIN		
		UPDATE tbl_tareas set descripcion = actualiza_tareaDescripcion, fecha = actualiza_tareaFecha, estadoTarea = actualiza_tareaEstadoTarea
		 WHERE tbl_tareas.cedulaPersona = actualiza_tareacedulaPersona;
	END |
DELIMITER ;
---------------------------------------------------------------
DROP PROCEDURE if exists inactivarTareas;
DELIMITER |
	CREATE PROCEDURE inactivarTareas(
    	tareacedulaPersona int(11))
	BEGIN		
		UPDATE tbl_tareas set estado = 'I' WHERE tbl_tareas.cedulaPersona = tareacedulaPersona;
	END |
DELIMITER ;
---------------------------------------------------------------------
DROP PROCEDURE if exists consultarTareas;
DELIMITER |
	CREATE PROCEDURE consultarTareas()
  
	BEGIN		
		SELECT cedulaPersona, descripcion, fecha, estadoTarea
		FROM tbl_tareas;
	END |
DELIMITER ;
---------------------------------------------------------------
DROP PROCEDURE if exists consultaTareaXempleado;
DELIMITER |
	CREATE PROCEDURE consultaTareaXempleado(
		tareacedulaPersona int (11))
	BEGIN		
		SELECT tbl_empleado.cedulaPersona, descripcion, estadoTarea, fecha
        FROM tbl_tareas inner join tbl_empleado on tbl_tareas.cedulaPersona = tbl_empleado.cedulaPersona 
        WHERE tbl_tareas.estado ='A' AND tbl_tareas.cedulaPersona = tareacedulaPersona GROUP BY fecha;
    END |
DELIMITER ;
----------------------------------------------------------------
DROP PROCEDURE if exists insertarAdministrador;
DELIMITER |
	CREATE PROCEDURE insertarAdministrador(
		administradorCedulaPersona int(11),
		administradorRolFamiliar varchar (45)
		)
	BEGIN		
		INSERT INTO tbl_administrador(cedulaPersona,rolFamilia,estado)
		VALUES(administradorCedulaPersona,administradorRolFamiliar,'A');
	END |
DELIMITER ;
---------------------------------------------------------------------

DROP PROCEDURE if exists loginSICH;
DELIMITER |
	CREATE PROCEDURE loginSICH(
		loginCedulaPersona int (11),
		loginpass char (128))
	BEGIN		
		SELECT tbl_persona.cedulaPersona, tbl_persona.nombre, tbl_persona.apellido, tbl_persona.apellido2, tbl_persona.correo,
		tbl_persona.telefono, tbl_persona.direccion, tbl_persona.tipoRol
        FROM tbl_persona inner join tbl_login on tbl_persona.cedulaPersona= tbl_login.cedulaPersona 
        WHERE tbl_persona.estado ='A' AND tbl_login.cedulaPersona = loginCedulaPersona AND tbl_login.pass = md5(loginpass);
    END |
DELIMITER ;







