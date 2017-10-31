<?php ?>
<div class="container">
	<div class="row">
		<div id="caja" class="z-depth-1">
			<div class="row nombre_form">
				<h5 class="center-align">FORMULARIO MANTENIMIENTO EMPLEADOS</h5>
			</div>
			
			<div class="row">
				<form class="col s12" name="frm_mantenimiento_empleado" method="post">
					<div class="row">
						<div class="input-field col s9 m9 l9">
							<input placeholder="Ingrese la Cédula" id="txt_cedula_buscar" type="text" class="validate">
							<label for="txt_cedula_buscar">Cédula</label>
						</div>
						<div class="input-field col s3 m3 l3">
							<button class="btn waves-effect waves-light" type="button" name="btn_buscarEmpleado" id="btn_buscarEmpleado" onclick="buscar_empleado();">BUSCAR<i class="material-icons right">search</i></button>
						</div>
					</div>

					<div class="row">
						<h5 class="center-align">DATOS DEL EMPLEADO</h5>
					</div>
					<div class="row">
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">account_circle</i>
							<input value=" " id="txt_nombre_upd" type="text" class="validate">
							<label class="active" for="txt_nombre_upd">Nombre</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">account_circle</i>
							<input value=" " id="txt_apellido1_upd" type="text" class="validate">
							<label class="active" for="txt_apellido1_upd">Apellido</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">account_circle</i>
							<input value=" " id="txt_apellido2_upd" type="text" class="validate">
							<label for="txt_apellido2_upd">Apellido2</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">phone</i>
							<input value=" " id="txt_telefono_upd" type="text" class="validate">
							<label for="txt_telefono_upd">Teléfono</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">email</i>
							<input value=" " id="txt_correo_upd" type="text" class="validate">
							<label for="txt_correo_upd">Correo</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">date_range</i>
							<input value=" " type="text" class="datepicker" id="dtp_fecha_nacimiento_upd">
							<label for="dtp_fecha_nacimiento_upd">Fecha Nacimiento</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">home</i>
							<input value=" " id="txt_direccion_upd" type="text" class="validate">
							<label for="txt_direccion_upd">Dirección</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">fiber_pin</i>
							<input value=" " id="txt_codigo_acceso_upd" type="text" class="validate">
							<label for="txt_codigo_acceso_upd">Código Acceso</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">work</i>
							<input value=" " id="txt_puesto_upd" type="text" class="validate">
							<label for="txt_puesto_upd">Puesto</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">monetization_on</i>
							<input value=" " id="txt_salario_upd" type="text" class="validate">
							<label for="txt_salario_upd">Salario</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">insert_invitation</i>
							<input value=" " type="text" class="datepicker" id="dtp_fecha_ingreso_upd">
							<label for="dtp_fecha_ingreso_upd">Fecha Ingreso</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">schedule</i>
							<input value=" " id="txt_horario_upd" type="text" class="validate">
							<label for="txt_horario_upd">Horario</label>
						</div>
					</div>
					<div class="row">
						<div class="col s6 m6 l6 center">
							<button class="btn-large waves-effect waves-light" type="button" name="btn_actualizarEmpleado" id="btn_actualizarEmpleado" onclick="actualizar_empleado();">ACTUALIZAR<i class="material-icons right">send</i></button>
						</div>
						<div class="col s6 m6 l6 center">
							<button class="btn-large waves-effect waves-light red modal-trigger" type="button" name="btn_eliminarEmpleado" href="#modal1" id="btn_eliminarEmpleado">ELIMINAR<i class="material-icons right">delete</i></button>

							
						</div>
                	</div>

                	<!-- Modal Structure -->
					<div id="modal1" class="modal">
						<div class="modal-content">
							<h4 class="center">Eliminar Empleado</h4>
							<p class="center-align">¿Realmente desea eliminar el empleado?</p>
						</div>
						<div class="modal-footer">
							<button class="btn waves-effect waves-light red btn modal-trigger" href="#modal1" type="button" name="btn_registrarEmpleado" id="btn_registrarEmpleado" onclick="desactivar_empleado(txt_cedula_buscar.value)">Eliminar<i class="material-icons right">delete</i></button>
	
							<button class="btn waves-effect waves-light blue btn modal-action modal-close" href="#modal1" type="button" name="btn_registrarEmpleado" id="btn_registrarEmpleado" onclick="">Cancelar<i class="material-icons right">reply</i></button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    Materialize.updateTextFields();
  });
</script>

<?php ?>