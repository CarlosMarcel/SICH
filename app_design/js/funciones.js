$(document).ready(function(){

});


/*Funciones de Seguridad*/
//REGISTRAR USUARIOS
function registrar_autorizado(){
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
	}else{
		$.ajax({
			type: 'GET',
			dataType: "json",
			url: 'app_core/controllers/ctr_seguridad.php',
			data: {comprobar_persona: $('#txt_cedula').val()}
		}).done(function(datos){
			var resultado = datos.valor;
			if (resultado == 1) {
				Materialize.toast('Ya existe esta persona!', 4000);
			}else{
				$.ajax({
					type: 'POST',
					url: 'app_core/controllers/ctr_seguridad.php',
					data: {key: 'registrar_persona', ced:cedula,nombre:nombre,ap1:ap1,
					ap2:ap2, tel:tel, correo:correo, fechaNacimiento:fechaNacimiento,
					direccion:direccion, codigoAcceso:codigoAcceso}
				}).done(function(datos){
					Materialize.toast('El registro se realizó exitosamente!', 4000);
					$('#txt_cedula').val("");
					$('#txt_nombre').val("");
					$('#txt_apellido1').val("");
					$('#txt_apellido2').val("");
					$('#txt_telefono').val("");
					$('#txt_correo').val("");
					$('#dtp_fecha_nacimiento').val("");
					$('#txt_direccion').val("");
					$('#txt_codigo_acceso').val("");
				}).fail(function(jqXHR, textStatus, errorThrown){
					Materialize.toast('Error al intentar registrar el usuario!', 4000);
				});
			}
		}).fail(function(jqXHR, textStatus, errorThrown){
			//Error y notificacion.
		});
	}
}

//CONSULTAR USUARIOS
function listar_autorizados(){
	$.ajax({
		type: 'GET',
		dataType: "json",
		url: 'app_core/controllers/ctr_seguridad.php',
		data: {listar_autorizados: "info"}
	}).done(function(datos){
		$("#grid_autorizados").html(datos.tabla); //Carga los datos en la tabla.

	}).fail(function(jqXHR, textStatus, errorThrown){
		//Error y notificacion.
	});
}
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

function cargarCmbEmpleados(){
	$.ajax({
		type: 'GET',
		dataType: "json",
		url: 'app_core/controllers/ctr_empleados.php',
		data: {cargarcmbEmpleados: "info"}
	}).done(function(datos){
		$("#combo_empleados").html(datos.combo);
		$("#combo_empleados").change();
		$('select').material_select();
	}).fail(function(jqXHR, textStatus, errorThrown){
		//Error y notificacion.
		Materialize.toast('Error al intentar cargar el combo de empleados!', 4000);
	});
}

//Funcion para registrar las tareas de los empleados
function registarTareaEmpleado(){
	
	Materialize.updateTextFields();
	var descripcion = document.getElementById("txt_descripcion_tarea").value;
	var fechaTarea = document.getElementById("dtp_fecha_tarea").value;

	var idEmpleado = document.getElementById("combo_empleados");
	var selectedID = idEmpleado.options[idEmpleado.selectedIndex].value;

	if (descripcion == "") {
		Materialize.toast('Ingrese la descripción de la tarea!', 4000);
		$('#txt_descripcion_tarea').focus();
	}else if (fechaTarea == "") {
		Materialize.toast('Seleccione la fecha para asignar la tarea', 4000);
		$('#dtp_fecha_tarea').focus();
	}else{
		$.ajax({
			type: 'POST',
			url: 'app_core/controllers/ctr_empleados.php',
			data: {key: 'asignar_tareas', tarea_empleado_id:selectedID,tarea_empleado_descripcion:descripcion,tarea_empleado_fecha:fechaTarea}
		}).done(function(datos){
			Materialize.toast('Se ha registrado la nueva tarea exitosamente!', 4000);
			//Variables para el registro del empleado
			$('#txt_descripcion_tarea').val("");
			$('#dtp_fecha_tarea').val("");
			$("#combo_empleados").change();
			$('select').material_select();
		}).fail(function(jqXHR, textStatus, errorThrown){
			Materialize.toast('Error al intentar actualizar el alimento!', 4000);
		});
	}
}

function cargar_mis_tareas_hoy(){
	var cedula = $('#empleado_cedula').text();
	if(cedula == ""){
		Materialize.toast('Se ha producido un error, imposible cargar tareas del empleado', 4000);
	}else{
		$.ajax({
		type: 'GET',
		dataType: "json",
		url: 'app_core/controllers/ctr_empleados.php',
		data: {cargarMisTareas: cedula}
		}).done(function(datos){
			if(datos.numeroTareas > 0){
				$('#tabla_tareas').empty();
				$("#tabla_tareas").html(datos.tabla); //Carga los datos en la tabla.
			}else{
				Materialize.toast("Usted no tiene tareas para el día de Hoy!", 4000);
			}
			
		}).fail(function(jqXHR, textStatus, errorThrown){
			//Error y notificacion.
			Materialize.toast('Error al intentar cargar las tareas del empleado!', 4000);
		});
	}
}

function eventoCheckBoxTarea(id, check){
	if (check.checked) {
		actualizar_estado_tarea_C(id);
	}else{
		actualizar_estado_tarea_I(id);
	}

	
}

function actualizar_estado_tarea_C(id){
	$.ajax({
		type: 'POST',
		url: 'app_core/controllers/ctr_empleados.php',
		data: {key: 'update_tarea_C', ID: id}
	}).done(function(datos){
		Materialize.toast('La tarea se ha actualizado exitosamente!', 2000);
		cargar_mis_tareas_hoy();
	}).fail(function(jqXHR, textStatus, errorThrown){
		//Error y notificacion.
	});
}

function actualizar_estado_tarea_I(id){
	$.ajax({
		type: 'POST',
		url: 'app_core/controllers/ctr_empleados.php',
		data: {key: 'update_tarea_I', ID: id}
	}).done(function(datos){
		Materialize.toast('La tarea se ha actualizado exitosamente!', 2000);
		cargar_mis_tareas_hoy();
	}).fail(function(jqXHR, textStatus, errorThrown){
		//Error y notificacion.
	});
}

function registrar_alimento(){
	//Variables para el registro del alimento
	var nombre = $('#txt_nombreAlimento').val();
	var puntoReorden = $('#txt_puntoReorden').val();
	var cantidad = $('#txt_cantidad').val();
	var cantidadPedido = $('#txt_cantidadPedido').val();
	var tipoMedida = $('#txt_tipoMedida').val();

	if ($('#txt_nombreAlimento').val().trim() == "") {
		Materialize.toast('Ingrese el nombre de alimento!', 4000);
		$('#txt_nombreAlimento').focus();
	}else if ($('#txt_puntoReorden').val().trim() == "") {
		Materialize.toast('Ingrese el punto de reorden!', 4000);
		$('#txt_puntoReorden').focus();
	}else if ($('#txt_cantidad').val().trim() == "") {
		Materialize.toast('Ingrese la cantidad!', 4000);
		$('#txt_cantidad').focus();
	}else if ($('#txt_cantidadPedido').val().trim() == "") {
		Materialize.toast('Ingrese la cantidad del Pedido!', 4000);
		$('#txt_cantidadPedido').focus();
	}else if($('#txt_tipoMedida').val().trim() == ""){
		Materialize.toast('Ingrese el Tipo de medida!', 4000);
		$('#txt_tipoMedida').focus();
	}else{
		$.ajax({
			type: 'POST',
			url: 'app_core/controllers/ctr_alimentos.php',
			data: {key: 'registrar_alimento', alimento_nombre:nombre,alimento_puntoReorden:puntoReorden,
			alimento_cantidad:cantidad,alimento_cantidadPedido: cantidadPedido, alimento_tipoMedida:tipoMedida}
		}).done(function(datos){
			Materialize.toast('Registro Alimento Exitoso!', 4000);
			//Variables para el registro del empleado
			$('#txt_nombreAlimento').val("");
			$('#txt_puntoReorden').val("");
			$('#txt_cantidad').val("");
			$('#txt_cantidadPedido').val("");
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
		data: {listar_alimentos: "info"}
	}).done(function(datos){
		$("#grid_alimentos").html(datos.tabla);
	}).fail(function(jqXHR, textStatus, errorThrown){
		//Error y notificacion.
	});
}
function listar_tareas(){
	$.ajax({
		type: 'GET',
		dataType: "json",
		url: 'app_core/controllers/ctr_empleados.php',
		data: {listar_tareas: "info"}
	}).done(function(datos){
		$("#grid_tareas").html(datos.tabla);
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
		$("#combo_alimentos").html(datos.combo);
		$("#combo_alimentos").change();
		$('select').material_select();
	}).fail(function(jqXHR, textStatus, errorThrown){
		//Error y notificacion.
		Materialize.toast('Error al intentar cargar el combo de alimentos!', 4000);
	});
}

function cargarDatosAlimentos(){
	var idAlimento = document.getElementById("combo_alimentos");
	var selectedID = idAlimento.options[idAlimento.selectedIndex].value;
	$.ajax({
		type: 'GET',
		dataType: "json",
		url: 'app_core/controllers/ctr_alimentos.php',
		data: {cargarDatosAlimentos: selectedID}
	}).done(function(datos){
		$('#txt_nombre_upd').val(datos.nombre);
		$('#txt_puntoReorden_upd').val(datos.puntoReorden);
		$('#txt_cantidad_upd').val(datos.cantidad);
		$('#txt_cantidadPedido_upd').val(datos.cantidadPedido);
		$('#txt_tipoMedida_upd').val(datos.tipoMedida);
		$('select').material_select();
	}).fail(function(jqXHR, textStatus, errorThrown){
		//Error y notificacion.
		Materialize.toast('Error al intentar cargar el combo de alimentos!', 4000);
	});
}

//Funcion de Actualizar Alimentos
function actualizar_alimentos(){
	//Variables para actualizar los alimentos
	Materialize.updateTextFields();
	var nombre = document.getElementById("txt_nombre_upd").value;
	var puntoReorden = parseInt(document.getElementById("txt_puntoReorden_upd").value,10);
	var cantidad = parseInt(document.getElementById("txt_cantidad_upd").value,10);
	var cantidadPedido = parseInt(document.getElementById("txt_cantidadPedido_upd").value,10);
	var tipoMedida = document.getElementById("txt_tipoMedida_upd").value;

	var idAlimento = document.getElementById("combo_alimentos");
	var selectedID = idAlimento.options[idAlimento.selectedIndex].value;

	if (nombre == "") {
		Materialize.toast('Ingrese el nombre de alimento!', 4000);
		$('#txt_nombre_upd').focus();
	}else if (puntoReorden == "") {
		Materialize.toast('Ingrese el punto de reorden!', 4000);
		$('#txt_puntoReorden_upd').focus();
	}else if (cantidad == "") {
		Materialize.toast('Ingrese la cantidad!', 4000);
		$('#txt_cantidad_upd').focus();
	}else if (cantidadPedido == "") {
		Materialize.toast('Ingrese la cantidad del Pedido!', 4000);
		$('#txt_cantidadPedido_upd').focus();
	}else if(tipoMedida == ""){
		Materialize.toast('Ingrese el Tipo de medida!', 4000);
		$('#txt_tipoMedida_upd').focus();
		Materialize.updateTextFields();
	}else if(puntoReorden == 0){
		Materialize.toast('El punto de reorden no puede ser cero!', 4000);
		$('#txt_puntoReorden_upd').focus();
		Materialize.updateTextFields();
	}else if(cantidadPedido == 0){
		Materialize.toast('La cantidad del pedido debe ser mayor a cero!', 4000);
		$('#txt_cantidadPedido_upd').focus();
		Materialize.updateTextFields();
	}else if(cantidadPedido <= puntoReorden){
		Materialize.toast('La cantidad del pedido debe ser mayor al del Punto de Reorden!', 4000);
		$('#txt_cantidadPedido_upd').focus();
		Materialize.updateTextFields();
	}else{

		if(cantidad <= puntoReorden)
		{
			cantidad = cantidadPedido;
			Materialize.toast('Se ha realizado el pedido del producto al supermercado!', 4000);
		}

		$.ajax({
			type: 'POST',
			url: 'app_core/controllers/ctr_alimentos.php',
			data: {key: 'actualizar_alimento', alimento_id:selectedID,alimento_nombre:nombre,alimento_puntoReorden:puntoReorden,
			alimento_cantidad:cantidad, alimento_cantidadPedido: cantidadPedido, alimento_tipoMedida:tipoMedida}
		}).done(function(datos){
			Materialize.toast('Se ha actualizado el producto exitosamente!', 8000);
			//Variables para el registro del empleado
			$('#txt_nombre_upd').val("");
			$('#txt_puntoReorden_upd').val("");
			$('#txt_cantidad_upd').val("");
			$('#txt_cantidadPedido_upd').val("");
			$('#txt_tipoMedida_upd').val("");
			$("#combo_alimentos").change();
			$('select').material_select();
		}).fail(function(jqXHR, textStatus, errorThrown){
			Materialize.toast('Error al intentar actualizar el alimento!', 4000);
		});
	}
}

function eliminar_alimento(){
	var idAlimento = document.getElementById("combo_alimentos");
	var selectedID = idAlimento.options[idAlimento.selectedIndex].value;

	$.ajax({
		type: 'POST',
		url: 'app_core/controllers/ctr_alimentos.php',
		data: {key: 'eliminar_alimento', alimento_id:selectedID}
	}).done(function(datos){
		Materialize.toast('Se ha eliminado el producto exitosamente!', 4000);
		cargarCmbAlimentos();
		$("#combo_alimentos").change();
		$('select').material_select();
		$('#modal2').modal('close');
		$('#txt_nombre_upd').val("");
		$('#txt_peso_upd').val("");
		$('#txt_puntoReorden_upd').val("");
		$('#txt_cantidad_upd').val("");
		$('#txt_cantidadPedido_upd').val("");
		$('#txt_tipoMedida_upd').val("");
	}).fail(function(jqXHR, textStatus, errorThrown){
		Materialize.toast('Error al intentar eliminar el producto!', 4000);
	});
}