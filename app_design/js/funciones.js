$(document).ready(function(){

});

/*Funciones de Empleado*/

function registrar_empleado(){
	//Variables para el registro del empleado
	var cedula = $('#txt_cedula').val();
	var nombre = $('#txt_nombre').val();
	var ap1 = $('#txt_apellido1').val();
	var ap2 = $('#txt_apellido2').val();
	var tel = $('#txt_telefono').val();
	var correo = $('#txt_correo').val();
	var fechaNacimiento = $('#dtp_fecha_nacimiento').val();
	var direccion = $('#txt_direccion').val();
	var codigoAcceso = $('#txt_codigo_acceso').val();
	var puesto = $('#txt_puesto').val();
	var salario = $('#txt_salario').val();
	var fechaIngreso = $('#dtp_fecha_ingreso').val();
	var horario = $('#txt_horario').val();

	if ($('#txt_cedula').val().trim() == "") {
		Materialize.toast('Ingrese la cédula!', 4000);
		$('#txt_cedula').focus();
	}else if ($('#txt_nombre').val().trim() == "") {
		Materialize.toast('Ingrese el Nombre!', 4000);
		$('#txt_nombre').focus();
	}else if ($('#txt_apellido1').val().trim() == "") {
		Materialize.toast('Ingrese el primer apellido!', 4000);
		$('#txt_apellido1').focus();
	}else if ($('#txt_apellido2').val().trim() == "") {
		Materialize.toast('Ingrese el segundo apellido!', 4000);
		$('#txt_apellido2').focus();
	}else if($('#txt_telefono').val().trim() == ""){
		Materialize.toast('Ingrese el Teléfono!', 4000);
		$('#txt_telefono').focus();
	}else if($('#txt_correo').val().trim() == ""){
		Materialize.toast('Ingrese el Correo!', 4000);
		$('#txt_correo').focus();
	}else if($('#dtp_fecha_nacimiento').val().trim() == ""){
		Materialize.toast('Ingrese la Fceha de Nacimiento!', 4000);
		$('#dtp_fecha_nacimiento').focus();
	}else if($('#txt_direccion').val().trim() == ""){
		Materialize.toast('Ingrese la dirección!', 4000);
		$('#txt_direccion').focus();
	}else if($('#txt_codigo_acceso').val().trim() == ""){
		Materialize.toast('Ingrese el código de acceso para el empleado!', 4000);
		$('#txt_codigo_acceso').focus();
	}else if($('#txt_puesto').val().trim() == ""){
		Materialize.toast('Ingrese el puesto!', 4000);
		$('#txt_puesto').focus();
	}else if($('#txt_salario').val().trim() == ""){
		Materialize.toast('Ingrese el salario!', 4000);
		$('#txt_salario').focus();
	}else if($('#dtp_fecha_ingreso').val().trim() == ""){
		Materialize.toast('Ingrese la fecha de ingreso!', 4000);
		$('#dtp_fecha_ingreso').focus();
	}else if($('#txt_horario').val().trim() == ""){
		Materialize.toast('Ingrese el horario!', 4000);
		$('#txt_horario').focus();
	}else{
		$.ajax({
			type: 'GET',
			dataType: "json",
			url: 'app_core/controllers/ctr_empleados.php',
			data: {comprobar_empleado: $('#txt_cedula').val()}
		}).done(function(datos){
			var resultado = datos.valor;
			if (resultado == 1) {
				Materialize.toast('Ya existe el empleado!', 4000);
			}else{
				$.ajax({
					type: 'POST',
					url: 'app_core/controllers/ctr_empleados.php',
					data: {key: 'registrar_empleado', empleado_ced:cedula,empleado_nombre:nombre,empleado_ap1:ap1,
					empleado_ap2:ap2, empleado_tel:tel, empleado_correo:correo, empleado_fechaNacimiento:fechaNacimiento,
					empleado_direccion:direccion, empleado_codigoAcceso:codigoAcceso, empleado_puesto:puesto,
					empleado_salario:salario, empleado_fechaIngreso:fechaIngreso, empleado_horario:horario}
				}).done(function(datos){
					Materialize.toast('Registro Empleado Exitoso!', 4000);
					//Variables para el registro del empleado
					$('#txt_cedula').val("");
					$('#txt_nombre').val("");
					$('#txt_apellido1').val("");
					$('#txt_apellido2').val("");
					$('#txt_telefono').val("");
					$('#txt_correo').val("");
					$('#dtp_fecha_nacimiento').val("");
					$('#txt_direccion').val("");
					$('#txt_codigo_acceso').val("");
					$('#txt_puesto').val("");
					$('#txt_salario').val("");
					$('#dtp_fecha_ingreso').val("");
					$('#txt_horario').val("");
				}).fail(function(jqXHR, textStatus, errorThrown){
					Materialize.toast('Error al intentar registrar el empleado!', 4000);
				});
			}
		}).fail(function(jqXHR, textStatus, errorThrown){
			//Error y notificacion.
		});
	}
}

//Actualizar empleado
function actualizar_empleado(){
	//Variables para el registro del empleado
	var cedula = $('#txt_cedula_buscar').val();
	var nombre = $('#txt_nombre_upd').val();
	var ap1 = $('#txt_apellido1_upd').val();
	var ap2 = $('#txt_apellido2_upd').val();
	var tel = $('#txt_telefono_upd').val();
	var correo = $('#txt_correo_upd').val();
	var fechaNacimiento = $('#dtp_fecha_nacimiento_upd').val();
	var direccion = $('#txt_direccion_upd').val();
	var codigoAcceso = $('#txt_codigo_acceso_upd').val();
	var puesto = $('#txt_puesto_upd').val();
	var salario = $('#txt_salario_upd').val();
	var fechaIngreso = $('#dtp_fecha_ingreso_upd').val();
	var horario = $('#txt_horario_upd').val();

	if ($('#txt_cedula_buscar').val().trim() == "") {
		Materialize.toast('Ingrese la cédula!', 4000);
		$('#txt_cedula_buscar').focus();
	}else if ($('#txt_nombre_upd').val().trim() == "") {
		Materialize.toast('Ingrese el Nombre!', 4000);
		$('#txt_nombre_upd').focus();
	}else if ($('#txt_apellido1_upd').val().trim() == "") {
		Materialize.toast('Ingrese el primer apellido!', 4000);
		$('#txt_apellido1_upd').focus();
	}else if ($('#txt_apellido2_upd').val().trim() == "") {
		Materialize.toast('Ingrese el segundo apellido!', 4000);
		$('#txt_apellido2_upd').focus();
	}else if($('#txt_telefono_upd').val().trim() == ""){
		Materialize.toast('Ingrese el Teléfono!', 4000);
		$('#txt_telefono_upd').focus();
	}else if($('#txt_correo_upd').val().trim() == ""){
		Materialize.toast('Ingrese el Correo!', 4000);
		$('#txt_correo_upd').focus();
	}else if($('#dtp_fecha_nacimiento_upd').val().trim() == ""){
		Materialize.toast('Ingrese la Fceha de Nacimiento!', 4000);
		$('#dtp_fecha_nacimiento_upd').focus();
	}else if($('#txt_direccion_upd').val().trim() == ""){
		Materialize.toast('Ingrese la dirección!', 4000);
		$('#txt_direccion_upd').focus();
	}else if($('#txt_codigo_acceso_upd').val().trim() == ""){
		Materialize.toast('Ingrese el código de acceso para el empleado!', 4000);
		$('#txt_codigo_acceso_upd').focus();
	}else if($('#txt_puesto_upd').val().trim() == ""){
		Materialize.toast('Ingrese el puesto!', 4000);
		$('#txt_puesto_upd').focus();
	}else if($('#txt_salario_upd').val().trim() == ""){
		Materialize.toast('Ingrese el salario!', 4000);
		$('#txt_salario_upd').focus();
	}else if($('#dtp_fecha_ingreso_upd').val().trim() == ""){
		Materialize.toast('Ingrese la fecha de ingreso!', 4000);
		$('#dtp_fecha_ingreso_upd').focus();
	}else if($('#txt_horario_upd').val().trim() == ""){
		Materialize.toast('Ingrese el horario!', 4000);
		$('#txt_horario_upd').focus();
	}else{

		$.ajax({
			type: 'POST',
			url: 'app_core/controllers/ctr_empleados.php',
			data: {key: 'actualizar_empleado', empleado_ced:cedula,empleado_nombre:nombre,empleado_ap1:ap1,
			empleado_ap2:ap2, empleado_tel:tel, empleado_correo:correo, empleado_fechaNacimiento:fechaNacimiento,
			empleado_direccion:direccion, empleado_codigoAcceso:codigoAcceso, empleado_puesto:puesto,
			empleado_salario:salario, empleado_fechaIngreso:fechaIngreso, empleado_horario:horario}
		}).done(function(datos){
			Materialize.toast(' Empleado Actualizado!', 4000);
					//Variables para el registro del empleado
					$('#txt_cedula_buscar').val("");
					$('#txt_nombre_upd').val("");
					$('#txt_apellido1_upd').val("");
					$('#txt_apellido2_upd').val("");
					$('#txt_telefono_upd').val("");
					$('#txt_correo_upd').val("");
					$('#dtp_fecha_nacimiento_upd').val("");
					$('#txt_direccion_upd').val("");
					$('#txt_codigo_acceso_upd').val("");
					$('#txt_puesto_upd').val("");
					$('#txt_salario_upd').val("");
					$('#dtp_fecha_ingreso_upd').val("");
					$('#txt_horario_upd').val("");
				}).fail(function(jqXHR, textStatus, errorThrown){
					Materialize.toast('Error al intentar actualizar el empleado!', 4000);
				});

			}
		}


//Buscar Empleado por cedula y cargar datos
function buscar_empleado(){
	
	if($('#txt_cedula_buscar').val().trim() == "")
	{
		Materialize.toast('Debe ingrear una cédula antes de realizar una busqueda!', 4000);
	}
	else
	{
		var buscar_cedula = $('#txt_cedula_buscar').val();
		$.ajax({
			type: 'GET',
			dataType: "json",
			url: 'app_core/controllers/ctr_empleados.php',
			data: {cargar_empleado: buscar_cedula}
		}).done(function(datos){
			var existe = datos.existe;
			if (existe == 1) {
				Materialize.toast('Datos cargados correctamente!', 4000);
				$('#txt_cedula_upd').val(datos.cedula);
				$('#txt_nombre_upd').val(datos.nombre);
				$('#txt_apellido1_upd').val(datos.ap1);
				$('#txt_apellido2_upd').val(datos.ap2);
				$('#txt_telefono_upd').val(datos.telefono);
				$('#txt_correo_upd').val(datos.correo);
				$('#dtp_fecha_nacimiento_upd').val(datos.fechaNacimiento);
				$('#txt_direccion_upd').val(datos.direccion);
				$('#txt_codigo_acceso_upd').val(datos.codigoAcceso);
				$('#txt_puesto_upd').val(datos.puesto);
				$('#txt_salario_upd').val(datos.salario);
				$('#dtp_fecha_ingreso_upd').val(datos.fechaIngreso);
				$('#txt_horario_upd').val(datos.horario);
			}
			else
			{
				Materialize.toast('No se ha encontrado coincidencias!', 4000);
			}

		}).fail(function(jqXHR, textStatus, errorThrown){
			//Error y notificacion.
		});
	}
	
}

//Vista de consultar todos los empleados en la tabla
function listar_empleados(){
	$.ajax({
		type: 'GET',
		dataType: "json",
		url: 'app_core/controllers/ctr_empleados.php',
		data: {listar_empleados: "lol"}
	}).done(function(datos){
		$("#grid_empleados").html(datos.tabla); //Carga los datos en la tabla.

	}).fail(function(jqXHR, textStatus, errorThrown){
		//Error y notificacion.
	});
}

//Funcion de eliminar Empleado
function desactivar_empleado(cedula){
	if($('#txt_cedula_buscar').val().trim() == "")
	{
		Materialize.toast('Debe ingrear realizar una busqueda antes de eliminar!', 4000);
	}
	else
	{
		$.ajax({
			type: 'POST',
			url: 'app_core/controllers/ctr_empleados.php',
			data: {key: 'desactivar_empleado', cedula_empleado:cedula }
		}).done(function(datos){
			Materialize.toast('Empleado eliminado exitosamente!', 4000);
			$('#modal1').modal('close');
			$('#txt_cedula_buscar').val("");
			$('#txt_nombre_upd').val("");
			$('#txt_apellido1_upd').val("");
			$('#txt_apellido2_upd').val("");
			$('#txt_telefono_upd').val("");
			$('#txt_correo_upd').val("");
			$('#dtp_fecha_nacimiento_upd').val("");
			$('#txt_direccion_upd').val("");
			$('#txt_codigo_acceso_upd').val("");
			$('#txt_puesto_upd').val("");
			$('#txt_salario_upd').val("");
			$('#dtp_fecha_ingreso_upd').val("");
			$('#txt_horario_upd').val("");
		}).fail(function(jqXHR, textStatus, errorThrown){
			Materialize.toast('Error al intentar eliminar el empleado!', 4000);
		});
	}
}

function registrar_alimento(){
	//Variables para el registro del alimento
	var nombre = $('#txt_nombreAlimento').val();
	var peso = $('#txt_peso').val();
	var puntoReorden = $('#txt_puntoReorden').val();
	var cantidad = $('#txt_cantidad').val();
	var tipoMedida = $('#txt_tipoMedida').val();

	if ($('#txt_nombreAlimento').val().trim() == "") {
		Materialize.toast('Ingrese el nombre de alimento!', 4000);
		$('#txt_nombreAlimento').focus();
	}else if ($('#txt_peso').val().trim() == "") {
		Materialize.toast('Ingrese el peso!', 4000);
		$('#txt_peso').focus();
	}else if ($('#txt_puntoReorden').val().trim() == "") {
		Materialize.toast('Ingrese el punto de reorden!', 4000);
		$('#txt_puntoReorden').focus();
	}else if ($('#txt_cantidad').val().trim() == "") {
		Materialize.toast('Ingrese la cantidad!', 4000);
		$('#txt_cantidad').focus();
	}else if($('#txt_tipoMedida').val().trim() == ""){
		Materialize.toast('Ingrese el Tipo de medida!', 4000);
		$('#txt_tipoMedida').focus();
	}else{
		$.ajax({
			type: 'POST',
			url: 'app_core/controllers/ctr_alimentos.php',
			data: {key: 'registrar_alimento', alimento_nombre:nombre,alimento_peso:peso,alimento_puntoReorden:puntoReorden,
			alimento_cantidad:cantidad, alimento_tipoMedida:tipoMedida}
		}).done(function(datos){
			Materialize.toast('Registro Alimento Exitoso!', 4000);
					//Variables para el registro del empleado
					$('#txt_nombreAlimento').val("");
					$('#txt_peso').val("");
					$('#txt_puntoReorden').val("");
					$('#txt_cantidad').val("");
					$('#txt_tipoMedida').val("");
				}).fail(function(jqXHR, textStatus, errorThrown){
					Materialize.toast('Error al intentar registrar el nuevo alimento!', 4000);
				});
			}
		}

function listar_alimentos(){
	$.ajax({
		type: 'GET',
		dataType: "json",
		url: 'app_core/controllers/ctr_alimentos.php',
		data: {listar_alimentos: "lol"}
	}).done(function(datos){
		$("#grid_alimentos").html(datos.tabla); //Carga los datos en la tabla.

	}).fail(function(jqXHR, textStatus, errorThrown){
		//Error y notificacion.
	});
}

function cargarCmbAlimentos(){
	$.ajax({
			type: 'GET',
			dataType: "json",
			url: 'app_core/controllers/ctr_alimentos.php',
			data: {cargarcmbAlimentos: "lol"}
		}).done(function(datos){
			//Cargar Talleres de Estudiante
			Materialize.toast('Combo cargado correctamente!', 4000);
			$("#combo_alimentos").html(datos.combo); //Carga los datos en el combo.
			//Cargar Datos de Estudiante
			$("#combo_alimentos").change();

			$('select').material_select();
		}).fail(function(jqXHR, textStatus, errorThrown){
			//Error y notificacion.
			Materialize.toast('Error al intentar cargar el combo de alimentos!', 4000);
		});
}

		/* Funciones de ---*/


		function cargar_dias_taller(cedula){
			$.ajax({
				type: 'GET',
				dataType: "json",
				url: 'app_core/controllers/ctr_controlador_tutor.php',
				data: {cedulaTutor: cedula}
			}).done(function(datos){
		$("#combo_dias").html(datos.combo); //Carga los datos en el combo.
		//Cargar Datos de Estudiante
		$("#combo_dias").change();
		
	}).fail(function(jqXHR, textStatus, errorThrown){
		//Error y notificacion.
	});
}

function cagar_Estudiantes_Dia(){
	$.ajax({
		type: 'GET',
		url: 'app_core/controllers/ctr_controlador_tutor.php',
		data: {tallerId: $("#combo_dias").val()}
	}).done(function(datos){
		$("#tabla_estudiantes").html(datos); //Carga los datos en la tabla.
		Materialize.toast("Datos cargados Correctamente", 4000);
	}).fail(function(jqXHR, textStatus, errorThrown){
		//Error y notificacion.
	});
}


function cargar_horas_cedula(cedula){
	$.ajax({
		type: 'GET',
		dataType: "json",
		url: 'app_core/controllers/ctr_controlador_tutor.php',
		data: {cedulaEstudiante: cedula, tutor: $("#tutor_cedula").text()}
	}).done(function(datos){
		$("#grid").html(datos.tabla); //Carga los datos en la tabla.
		//Cargar Datos de Estudiante
		document.getElementById("cedula").innerHTML = datos.cedula;
		document.getElementById("nombre").innerHTML = datos.nombre;
		document.getElementById("ap1").innerHTML = datos.ap1;
		document.getElementById("ap2").innerHTML = datos.ap2;
		document.getElementById("totalHoras").innerHTML = datos.total;
		Materialize.toast('Busqueda Exitosa!', 4000);
	}).fail(function(jqXHR, textStatus, errorThrown){
		//Error y notificacion.
	});
}

function cargar_horas_Estudiante_cedula(cedula){
	$.ajax({
		type: 'GET',
		dataType: "json",
		url: '../controllers/ctr_controlador_tutor.php',
		data: {cedEstudiante: cedula}
	}).done(function(datos){
		$("#gridEstudiantes").html(datos.tabla); //Carga los datos en la tabla.
		//Cargar Datos de Estudiante
		document.getElementById("cedula").innerHTML = datos.cedula;
		document.getElementById("nombre").innerHTML = datos.nombre;
		document.getElementById("ap1").innerHTML = datos.ap1;
		document.getElementById("ap2").innerHTML = datos.ap2;
		document.getElementById("totalHoras").innerHTML = datos.total;
		document.getElementById("faltanteHoras").innerHTML = datos.faltantes;
		Materialize.toast('Busqueda Exitosa!', 4000);
		$('#talleresEstudiante').empty();
		$("#tipoBusqueda").val($("#tipoBusqueda option:first").val());



	}).fail(function(jqXHR, textStatus, errorThrown){
		//Error y notificacion.
	});
}

function guardar_estudiante(cedula,nombre,ap1,ap2){
	$.ajax({
		type: 'POST',
		url: 'app_core/controllers/ctr_controlador_tutor.php',
		data: {key: 'registrarEstudiante', cedulaE:cedula,nombreE:nombre,ap1E:ap1,ap2E:ap2}
	}).done(function(datos){
		Materialize.toast('Registro Estudiante Exitoso!', 4000);
	}).fail(function(jqXHR, textStatus, errorThrown){
		Materialize.toast('Error al intentar registrar el estudiante!', 4000);
	});
}

function mostrar_lista_estudiantes(idTaller){
	$.ajax({
		type: 'GET',
		dataType: "json",
		url: 'app_core/controllers/ctr_controlador_tutor.php',
		data: {cedulaEstudiante: cedula}
	}).done(function(datos){
		$("#grid").html(datos.tabla); //Carga los datos en la tabla.
		//Cargar Datos de Estudiante
		document.getElementById("cedula").innerHTML = datos.cedula;
		document.getElementById("nombre").innerHTML = datos.nombre;
		document.getElementById("ap1").innerHTML = datos.ap1;
		document.getElementById("ap2").innerHTML = datos.ap2;
		document.getElementById("totalHoras").innerHTML = datos.total;
		Materialize.toast('Busqueda Exitosa!', 4000);
	}).fail(function(jqXHR, textStatus, errorThrown){
		//Error y notificacion.
	});
}

function eventoCheckBox(ced, check){
	if (check.checked) {
		insertarAsistencia(ced);
	}else{
		inactivarAsistencia(ced)
	}
}

function insertarAsistencia(ced){
	$.ajax({
		type: 'POST',
		url: 'app_core/controllers/ctr_controlador_tutor.php',
		data: {key: 'registrarAsistencia', cedulaE: ced, cedulaTutor: $('#user_cedula').text(), fechaRegistro: $('#fecha_actual').text()}
	}).done(function(datos){
		Materialize.toast('Registrado', 4000);
	}).fail(function(jqXHR, textStatus, errorThrown){
		//Error y notificacion.
	});
}

function inactivarAsistencia(ced){
	$.ajax({
		type: 'POST',
		url: 'app_core/controllers/ctr_controlador_tutor.php',
		data: {key: 'inactivarAsistencia', cedulaE: ced, cedulaTutor: $('#user_cedula').text(), fechaRegistro: $('#fecha_actual').text()}
	}).done(function(datos){
		Materialize.toast('Desactivado', 4000);
	}).fail(function(jqXHR, textStatus, errorThrown){
		//Error y notificacion.
	});
}

function cargar_horas_Estudiante_cedula_x_taller(cedula){
	var tallerFiltrado = document.getElementById("talleresEstudiante").value;
	
	$.ajax({
		type: 'GET',
		dataType: "json",
		url: '../controllers/ctr_controlador_tutor.php',
		data: {cedEstudianteFiltro: cedula, tutorID: tallerFiltrado}
	}).done(function(datos){
		$("#gridEstudiantes").html(datos.tabla); //Carga los datos en la tabla.
		//Cargar Datos de Estudiante
		document.getElementById("cedula").innerHTML = datos.cedula;
		document.getElementById("nombre").innerHTML = datos.nombre;
		document.getElementById("ap1").innerHTML = datos.ap1;
		document.getElementById("ap2").innerHTML = datos.ap2;
		document.getElementById("totalHoras").innerHTML = datos.total;
		document.getElementById("faltanteHoras").innerHTML = datos.faltantes;

		Materialize.toast('Busqueda Exitosa!', 4000);
	}).fail(function(jqXHR, textStatus, errorThrown){
		//Error y notificacion.
	});
}


function cargarTalleresEstudiante(cedulaEstudiante){
	var filtro = document.getElementById("tipoBusqueda").value;
	if(filtro != 1){
		//document.getElementById("talleresEstudiante").setAttribute("disabled", false);
		$.ajax({
			type: 'GET',
			dataType: "json",
			url: '../controllers/ctr_controlador_tutor.php',
			data: {cargarTalleresE: cedulaEstudiante}
		}).done(function(datos){
			//Cargar Talleres de Estudiante
			$("#talleresEstudiante").html(datos.combo); //Carga los datos en el combo.
			//Cargar Datos de Estudiante
			$("#talleresEstudiante").change();
		}).fail(function(jqXHR, textStatus, errorThrown){
			//Error y notificacion.
		});
	}else{
		
		$.ajax({
			type: 'GET',
			dataType: "json",
			url: '../controllers/ctr_controlador_tutor.php',
			data: {cedEstudiante: cedulaEstudiante}
		}).done(function(datos){
		$("#gridEstudiantes").html(datos.tabla); //Carga los datos en la tabla.
		//Cargar Datos de Estudiante
		document.getElementById("cedula").innerHTML = datos.cedula;
		document.getElementById("nombre").innerHTML = datos.nombre;
		document.getElementById("ap1").innerHTML = datos.ap1;
		document.getElementById("ap2").innerHTML = datos.ap2;
		document.getElementById("totalHoras").innerHTML = datos.total;
		document.getElementById("faltanteHoras").innerHTML = datos.faltantes;
		Materialize.toast('Busqueda Exitosa!', 4000);
		$('#talleresEstudiante').empty();
		$("#tipoBusqueda").val($("#tipoBusqueda option:first").val());



	}).fail(function(jqXHR, textStatus, errorThrown){
		//Error y notificacion.
	});
}
}

function comprobarEstudiante(){
	if ($('#CedulaEstudiante').val().trim() == "") {
		Materialize.toast('Ingrese la cedula!', 4000);
	}else if ($('#NombreEstudiante').val().trim() == "") {
		Materialize.toast('Ingrese el nombre!', 4000);
	}else if ($('#Apellido1Estudiante').val().trim() == "") {
		Materialize.toast('Ingrese el primer apellido!', 4000);
	}else if ($('#Apellido2Estudiante').val().trim() == "") {
		Materialize.toast('Ingrese el segundo apellido!', 4000);
	}else{
		$.ajax({
			type: 'GET',
			dataType: "json",
			url: 'app_core/controllers/ctr_controlador_tutor.php',
			data: {verificarEst: $('#CedulaEstudiante').val()}
		}).done(function(datos){
			var ced = $('#CedulaEstudiante').val();
			var nom = $('#NombreEstudiante').val();
			var ap1 = $('#Apellido1Estudiante').val();
			var ap2 = $('#Apellido2Estudiante').val();
			var resultado = datos.valor;
			if (resultado == 1) {
				Materialize.toast('Ya existe el estudiante!', 4000);
			}else{
				guardar_estudiante(ced, nom, ap1, ap2);
			}
			enlaceTallerEstudiante(ced);
			//$("#btn_registrarAtras").click();
			$('#CedulaEstudiante').val("");
			$('#NombreEstudiante').val("");
			$('#Apellido1Estudiante').val("");
			$('#Apellido2Estudiante').val("");
		}).fail(function(jqXHR, textStatus, errorThrown){
			//Error y notificacion.
		});
	}
}

function enlaceTallerEstudiante(ced){
	$.ajax({
		type: 'POST',
		url: 'app_core/controllers/ctr_controlador_tutor.php',
		data: {key: 'crearEnlace', cedulaE: ced, cedulaTutor: $("#combo_dias").val()}
	}).done(function(datos){
		Materialize.toast('Registrado en el taller', 4000);
	}).fail(function(jqXHR, textStatus, errorThrown){
		Materialize.toast(errorThrown.toString(), 4000);
	});
}