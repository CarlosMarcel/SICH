c-- --------------------------------------------
-- Procedimiento almacenado para LOGIN 
-- --------------------------------------------
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

-- --------------------------------------------
-- Procedimiento almacenado para LOGIN CODIGO ACCESO
-- --------------------------------------------
DROP PROCEDURE if exists loginCodigoAccesoSICH;
DELIMITER |
	CREATE PROCEDURE loginCodigoAccesoSICH(
		loginCedulaPersona int (11),
		loginCodigoAcceso int (11))
	BEGIN		
		SELECT tbl_persona.cedulaPersona, tbl_persona.nombre, tbl_persona.apellido, tbl_persona.apellido2, tbl_persona.tipoRol
        FROM tbl_persona 
        WHERE tbl_persona.estado ='A' AND tbl_persona.cedulaPersona = loginCedulaPersona AND tbl_persona.codigoAcceso = loginCodigoAcceso;
    END |
DELIMITER ;



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
-----------------------------------------------------------
DROP PROCEDURE if exists personasXcedula;
DELIMITER |
	CREATE PROCEDURE personasXcedula(
		personaCedula int(11))
	BEGIN		
		SELECT nombre, apellido, apellido2, telefono, correo, fechaNacimiento, codigoAcceso
        FROM tbl_persona 
        WHERE estado='A' and tbl_persona.cedulaPersona = personaCedula;
	
    END |
DELIMITER ;
----------------------------------------------------------
DROP PROCEDURE if exists consultarPersonasUsuarios;
DELIMITER |
	CREATE PROCEDURE consultarPersonasUsuarios()
  
	BEGIN		
		SELECT cedulaPersona, nombre, apellido, apellido2, telefono, correo, fechaNacimiento, direccion, codigoAcceso
		FROM tbl_persona 
		WHERE tbl_persona.estado ='A' and tbl_persona.tipoRol = 'Usuarios'  GROUP BY nombre ;
	END |
DELIMITER ;
-------------------------------------------------------------

DROP PROCEDURE if exists cargarCmbPersonasUsuarios;
DELIMITER |
	CREATE PROCEDURE cargarCmbPersonasUsuarios()
  
	BEGIN		
		SELECT tbl_persona.cedulaPersona , tbl_persona.nombre, tbl_persona.apellido, tbl_persona.apellido2
		FROM tbl_persona  
		WHERE tbl_persona.estado = 'A' and tbl_persona.tipoRol = 'Usuarios' ;
	END |
DELIMITER ;





-- --------------------------------------------
-- Procedimientos almacenados para Empleado
-- --------------------------------------------
DROP PROCEDURE if exists insertarEmpleado;
DELIMITER //
CREATE PROCEDURE insertarEmpleado(
  cedulaPersona int(11), nombre varchar(45), apellido varchar(45), apellido2 varchar(45),
  telefono int(8), correo varchar(50), fechaNacimiento date, direccion varchar(45),
  codigoAcceso int(11), tipoRol enum('Administrador','Usuarios','Empleado'), 
  puesto varchar(45), salario varchar(45), fechaIngreso date, horario varchar(45))
BEGIN
START TRANSACTION;
   INSERT INTO tbl_persona(cedulaPersona, nombre, apellido, apellido2, telefono,
   						   correo, fechaNacimiento, direccion, codigoAcceso, tipoRol,
   						   estado)
   VALUES(cedulaPersona, nombre, apellido,apellido2,telefono,
   						   correo, fechaNacimiento, direccion, codigoAcceso, tipoRol,
   						   'A');
   INSERT INTO tbl_empleado (cedulaPersona,puesto, salario, fechaIngreso, horario,estado) 
   VALUES(cedulaPersona,puesto,salario,fechaIngreso,horario,'A');
COMMIT;
END//
DELIMITER ;
------------------------------------------------------
DROP PROCEDURE if exists modificarEmpleado;
DELIMITER //
CREATE PROCEDURE modificarEmpleado(
  cedulaPersona int(11), nombre varchar(45), apellido varchar(45), apellido2 varchar(45),
  telefono int(8), correo varchar(50), fechaNacimiento date, direccion varchar(45),
  codigoAcceso int(11), tipoRol enum('Administrador','Usuarios','Empleado'), 
  puesto varchar(45), salario varchar(45), fechaIngreso date, horario varchar(45))
BEGIN
START TRANSACTION;
   UPDATE tbl_persona set nombre = nombre, apellido = apellido, apellido2 = apellido2,
    telefono = telefono, correo = correo, fechaNacimiento = fechaNacimiento,
    direccion = direccion, codigoAcceso = codigoAcceso, tipoRol = tipoRol
     WHERE tbl_persona.cedulaPersona = cedulaPersona;

   UPDATE tbl_empleado set puesto = puesto, salario = salario, fechaIngreso = fechaIngreso,
    horario = horario
     WHERE tbl_empleado.cedulaPersona = cedulaPersona;

COMMIT;
END//
DELIMITER ;
---------------------------------------------------------

DROP PROCEDURE if exists consultarEmpleado;
DELIMITER |
	CREATE PROCEDURE consultarEmpleado()
  
	BEGIN		
		SELECT tbl_persona.cedulaPersona , tbl_persona.nombre , tbl_persona.apellido , tbl_persona.apellido2,tbl_persona.telefono , puesto, salario
		FROM tbl_persona inner join tbl_empleado on tbl_persona.cedulaPersona = tbl_empleado.cedulaPersona 
		WHERE tbl_empleado.estado = 'A' AND tbl_persona.cedulaPersona = tbl_empleado.cedulaPersona GROUP BY tbl_persona.cedulaPersona;
	END |
DELIMITER ;

---------------------------------------------------------
DROP PROCEDURE if exists empleadoXcedula;
DELIMITER |
	CREATE PROCEDURE empleadoXcedula(
		empleadoCedula int(11))
	BEGIN		
		SELECT tbl_persona.cedulaPersona, tbl_persona.nombre, tbl_persona.apellido, tbl_persona.apellido2,  tbl_persona.telefono, tbl_persona.correo , tbl_persona.fechaNacimiento , tbl_persona.direccion , tbl_persona.codigoAcceso , tbl_persona.tipoRol , tbl_empleado.puesto, tbl_empleado.salario, tbl_empleado.fechaIngreso, tbl_empleado.horario
        FROM tbl_empleado inner join tbl_persona on tbl_empleado.cedulaPersona = tbl_persona.cedulaPersona
        WHERE tbl_empleado.estado='A' AND tbl_empleado.cedulaPersona = empleadoCedula group by empleadoCedula;
	
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
		SELECT tbl_tareas.fecha, tbl_persona.nombre, tbl_persona.apellido, tbl_persona.apellido2,tbl_tareas.descripcion,tbl_tareas.estadoTarea
		FROM tbl_persona inner join tbl_tareas on tbl_tareas.cedulaPersona = tbl_persona.cedulaPersona
		WHERE tbl_tareas.estado ='A'  ORDER BY fecha ASC;
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
-------------------------------------------------------------
DROP PROCEDURE if exists consultaTareaXFechayEmpleado;
DELIMITER |
	CREATE PROCEDURE consultaTareaXFechayEmpleado(
		tareacedulaPersona int (11))
	BEGIN		
		SELECT tbl_empleado.cedulaPersona, descripcion, estadoTarea, fecha
        FROM tbl_tareas inner join tbl_empleado on tbl_tareas.cedulaPersona = tbl_empleado.cedulaPersona 
        WHERE tbl_tareas.estado ='A' AND tbl_tareas.cedulaPersona = tareacedulaPersona AND tbl_tareas.fecha = CURDATE() GROUP BY fecha;
    END |
DELIMITER ;
-------------------------------------------------------------
DROP PROCEDURE if exists cargarCmbTareas;
DELIMITER |
	CREATE PROCEDURE cargarCmbTareas()
  
	BEGIN		
		SELECT tbl_persona.cedulaPersona , tbl_persona.nombre, tbl_persona.apellido, tbl_persona.apellido2
		FROM tbl_persona inner join tbl_tareas on tbl_tareas.cedulaPersona = tbl_persona.cedulaPersona 
		WHERE tbl_tareas.estado = 'A'  GROUP BY tbl_tareas.fecha;
	END |
DELIMITER ;


-- --------------------------------------------
-- Procedimientos almacenados para Administrador
-- --------------------------------------------


DROP PROCEDURE if exists insertarAdministrador;
DELIMITER //
CREATE PROCEDURE insertarAdministrador(
  cedulaPersona int(11), nombre varchar(45), apellido varchar(45), apellido2 varchar(45),
  telefono int(8), correo varchar(50), fechaNacimiento date, direccion varchar(45),
  codigoAcceso int(11), tipoRol enum('Administrador','Usuarios','Empleado'), 
  rolFamilia varchar(45))
BEGIN
START TRANSACTION;
   INSERT INTO tbl_persona(cedulaPersona, nombre, apellido, apellido2, telefono,
   						   correo, fechaNacimiento, direccion, codigoAcceso, tipoRol,
   						   estado)
   VALUES(cedulaPersona, nombre, apellido,apellido2,telefono,
   						   correo, fechaNacimiento, direccion, codigoAcceso, tipoRol,
   						   'A');
   INSERT INTO tbl_administrador (cedulaPersona,rolFamilia,estado) 
   VALUES(cedulaPersona,rolFamilia,'A');
COMMIT;
END//
DELIMITER ;
---------------------------------------------------------------------


DROP PROCEDURE if exists modificarAdministrador;
DELIMITER //
CREATE PROCEDURE modificarAdministrador(
  cedulaPersona int(11), nombre varchar(45), apellido varchar(45), apellido2 varchar(45),
  telefono int(8), correo varchar(50), fechaNacimiento date, direccion varchar(45),
  codigoAcceso int(11), tipoRol enum('Administrador','Usuarios','Empleado'), 
  rolFamilia varchar(45))
BEGIN
START TRANSACTION;
   UPDATE tbl_persona set nombre = nombre, apellido = apellido, apellido2 = apellido2,
    telefono = telefono, correo = correo, fechaNacimiento = fechaNacimiento,
    direccion = direccion, codigoAcceso = codigoAcceso, tipoRol = tipoRol
     WHERE tbl_persona.cedulaPersona = cedulaPersona;

   UPDATE tbl_administrador set rolFamilia = rolFamilia
     WHERE tbl_administrador.cedulaPersona = cedulaPersona;

COMMIT;
END//
DELIMITER ;

------------------------------------------------------------------------

DROP PROCEDURE if exists inactivarAdministrador;
DELIMITER |
	CREATE PROCEDURE inactivarAdministrador(
    	admincedulaPersona int(11))
	BEGIN		
		UPDATE tbl_administrador set estado = 'I' WHERE tbl_administrador.cedulaPersona = admincedulaPersona;
	END |
DELIMITER ;
-- --------------------------------------------
-- Procedimientos almacenados para Bitacora
-- --------------------------------------------

DROP PROCEDURE if exists insertarPersonaBitacora;
DELIMITER |
	CREATE PROCEDURE insertarPersonaBitacora(
		codigoAcceso int(11))
	BEGIN		
		INSERT INTO tbl_bitacora(cedulaPersona, fecha, hora, estado)
		VALUES(codigoAcceso, CURDATE(), CURTIME(), 'A');
	END |
DELIMITER ;

------------------------------------------------------------------------

DROP PROCEDURE if exists consultarBitacora;
DELIMITER |
	CREATE PROCEDURE consultarBitacora()
	BEGIN
		SELECT tbl_persona.cedulaPersona, tbl_persona.nombre, tbl_persona.apellido,tbl_persona.apellido2, fecha, hora
        FROM tbl_persona inner join tbl_bitacora on tbl_persona.cedulaPersona = tbl_bitacora.cedulaPersona 
        WHERE tbl_bitacora.estado ='A'  GROUP BY fecha;
    END |
    DELIMITER ;

-----------------------------------------------------------------

DROP PROCEDURE if exists inactivarPersonaBitacora;
DELIMITER |
	CREATE PROCEDURE inactivarPersonaBitacora(
    	BitacoraCedulaPersona int(11))
	BEGIN		
		UPDATE tbl_bitacora set estado = 'I' WHERE tbl_bitacora.cedulaPersona = BitacoraCedulaPersona;
	END |
DELIMITER ;
-- --------------------------------------------
-- Procedimientos almacenados para Llamas a La Policia
-- --------------------------------------------

DROP PROCEDURE if exists insertarLlamadaPolicia;
DELIMITER |
	CREATE PROCEDURE insertarLlamadaPolicia()
	BEGIN		
		INSERT INTO tbl_llamadaspolicia(fecha, hora, estado)
		VALUES(CURDATE(), CURTIME(), 'A');
	END |
DELIMITER ;
---------------------------------------------------

DROP PROCEDURE if exists consultarLlamadaspolicia;
DELIMITER |
	CREATE PROCEDURE consultarLlamadaspolicia()
	BEGIN
		SELECT fecha, hora
        FROM tbl_llamadaspolicia
        WHERE estado ='A'  GROUP BY fecha;
    END |
    DELIMITER ;
-----------------------------------------------------
DROP PROCEDURE if exists inactivarLLamadaPolicia;
DELIMITER |
	CREATE PROCEDURE inactivarLlamadaPolicia()
	BEGIN		
		UPDATE tbl_llamadaspolicia set estado = 'I';
	END |
DELIMITER ;

-- --------------------------------------------
-- Procedimientos almacenados para Bitacora
-- --------------------------------------------

DROP PROCEDURE if exists insertarHoraLuz;
DELIMITER |
	CREATE PROCEDURE insertarHoraLuz(
		ubicacionDeLuz varchar (45),
		horaEncendido time,
		horaApagado time)
	BEGIN		
		INSERT INTO tbl_luces(ubicacionDeLuz, horaEncendido, horaApagado, estado)
		VALUES(ubicacionDeLuz,horaEncendido,horaApagado, 'A');
	END |
DELIMITER ;
-------------------------------------------------
DROP PROCEDURE if exists inactivarLuz;
DELIMITER |
	CREATE PROCEDURE inactivarLuz(
		ubicacionDeLuz varchar(45))
	BEGIN		
		UPDATE tbl_luces set estado = 'I' WHERE tbl_luces.ubicacionDeLuz = ubicacionDeLuz;
	END |
DELIMITER ;
---------------------------------------------------

DROP PROCEDURE if exists modificarLuz;
DELIMITER |
	CREATE PROCEDURE modificarluz(
	    actualiza_ubicacionDeLuz varchar(45),
		actualiza_horaEncendido varchar(45),
		actualiza_horaApagado varchar(45))
	BEGIN		
		UPDATE tbl_luces set ubicacionDeLuz = actualiza_ubicacionDeLuz, horaEncendido = actualiza_horaEncendido, horaApagado = actualiza_horaApagado
		 WHERE tbl_luces.ubicacionDeLuz = actualiza_ubicacionDeLuz;
	END |
DELIMITER ;

------------------------------------------------------

DROP PROCEDURE if exists consultarlucesApagadas;
DELIMITER |
	CREATE PROCEDURE consultarlucesApagadas()
	BEGIN
		SELECT ubicacionDeLuz, horaApagado
        FROM tbl_luces
        WHERE estado ='A';
    END |
    DELIMITER ;
-------------------------------------------------------

DROP PROCEDURE if exists consultarlucesEncendidas;
DELIMITER |
	CREATE PROCEDURE consultarlucesEncendidas()
	BEGIN
		SELECT ubicacionDeLuz, horaEncendido
        FROM tbl_luces
        WHERE estado ='A' ;
    END |
    DELIMITER ;

-- --------------------------------------------
-- Procedimientos almacenados para Alimentos
-- --------------------------------------------

------------------Insertar Alimento------------
DROP PROCEDURE if exists insertarAlimento;
DELIMITER |
	CREATE PROCEDURE insertarAlimento(
		alimentoNombre varchar(45),
		alimentoPeso varchar(45),
		alimentoPuntoReorden varchar(45),
		alimentoCantidad int(11),
		alimentoCantidadPedido int(11),
		alimentoTipoMedida varchar(45))
	BEGIN		
		INSERT INTO tbl_alimentos(Nombre, peso, puntoReorden, cantidad,cantidadPedido,tipoMedida, Estado)
		VALUES(alimentoNombre, alimentoPeso,alimentoPuntoReorden, alimentoCantidad,alimentoCantidadPedido,alimentoTipoMedida, 'A');
	END |
DELIMITER ;

------------------Consultar Alimento------------
DROP PROCEDURE if exists consultarAlimento;
DELIMITER |
	CREATE PROCEDURE consultarAlimento()
  
	BEGIN		
		SELECT Nombre, peso, puntoReorden, cantidad as Cantidad_Existente, cantidadPedido, tipoMedida
		FROM tbl_alimentos 
		WHERE tbl_alimentos.estado = 'A'  GROUP BY Nombre;
	END |
DELIMITER ;

-----------------Modificar Alimento---------------------
DROP PROCEDURE if exists modificarAlimento;
DELIMITER |
	CREATE PROCEDURE modificarAlimento(
		actualiza_alimentoID int(11),
	    actualiza_alimentoNombre varchar(45),
		actualiza_alimentoPeso varchar(45),
		actualiza_alimentoPuntoReorden int(11),
		actualiza_alimentoCantidad int(11),
		actualiza_alimentoCantidadPedido int(11),
		actualiza_alimentotipoMedida varchar(45))
	BEGIN		
		UPDATE tbl_alimentos set Nombre = actualiza_alimentoNombre, peso = actualiza_alimentoPeso, puntoReorden = actualiza_alimentoPuntoReorden, cantidad = actualiza_alimentoCantidad, cantidadPedido = actualiza_alimentoCantidadPedido,  tipoMedida = actualiza_alimentotipoMedida
		 WHERE tbl_alimentos.idAlimentos = actualiza_alimentoID;
	END |
DELIMITER ;

------------------Consultar Alimento------------

DROP PROCEDURE if exists consultarNombresAlimentos;
DELIMITER |
	CREATE PROCEDURE consultarNombresAlimentos()
  
	BEGIN		
		SELECT idAlimentos, Nombre
		FROM tbl_alimentos 
		WHERE tbl_alimentos.estado = 'A'  GROUP BY Nombre;
	END |
DELIMITER ;
------------------Consultar AlimentoxID------------

DROP PROCEDURE if exists consultarAlimentoXid;
DELIMITER |
	CREATE PROCEDURE consultarAlimentoXid(actualiza_alimentoID varchar(45))
  
	BEGIN		
		SELECT  Nombre, peso, puntoReorden, cantidad, cantidadPedido, tipoMedida
		FROM tbl_alimentos 
		WHERE tbl_alimentos.estado = 'A' AND tbl_alimentos.idAlimentos = actualiza_alimentoID GROUP BY Nombre;
	END |
DELIMITER ;

------------------Inactivar AlimentoxID------------

DROP PROCEDURE if exists inactivarAlimento;
DELIMITER |
	CREATE PROCEDURE inactivarAlimento(
		eliminar_idAlimentos int(11))
	BEGIN		
		UPDATE tbl_alimentos set estado = 'I' WHERE tbl_alimentos.idAlimentos = eliminar_idAlimentos;
	END |
DELIMITER ;
--------------------------------------------------