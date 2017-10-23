$(document).ready(function(){
    //cargar_dias_taller($('#user_cedula').text());
});


//Codigo de la aplicacion AJAX

function registrar_empleado(){
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
	else if($('#txt_apellido2').val().trim() == ""){

		
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

//


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