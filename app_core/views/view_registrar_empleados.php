<?php ?>
<div class="container">
	<div class="row">
		<div id="caja" class="z-depth-1">
			<div class="row nombre_form">
				<h5 class="center-align">FORMULARIO REGISTRO EMPLEADOS</h5>
			</div>
			
			<div class="row">
				<form class="col s12" name="frm_registro_empleado" method="post">
					<div class="row">
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">person</i>
							<input id="txt_cedula" type="text" class="validate">
							<label for="txt_cedula">Cédula</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">account_circle</i>
							<input id="txt_nombre" type="text" class="validate">
							<label for="txt_nombre">Nombre</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">account_circle</i>
							<input id="txt_apellido1" type="text" class="validate">
							<label for="txt_apellido1">Apellido</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">account_circle</i>
							<input id="txt_apellido2" type="text" class="validate">
							<label for="txt_apellido2">Apellido2</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">phone</i>
							<input id="txt_telefono" type="text" class="validate">
							<label for="txt_telefono">Teléfono</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">email</i>
							<input id="txt_correo" type="text" class="validate">
							<label for="txt_correo">Correo</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">date_range</i>
							<input type="text" class="datepicker" id="dtp_fecha_nacimiento">
							<label for="dtp_fecha_nacimiento">Fecha Nacimiento</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">home</i>
							<input id="txt_direccion" type="text" class="validate">
							<label for="txt_direccion">Dirección</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">fiber_pin</i>
							<input id="txt_codigo_acceso" type="text" class="validate">
							<label for="txt_codigo_acceso">Código Acceso</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">work</i>
							<input id="txt_puesto" type="text" class="validate">
							<label for="txt_puesto">Puesto</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">monetization_on</i>
							<input id="txt_salario" type="text" class="validate">
							<label for="txt_salario">Salario</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">insert_invitation</i>
							<input type="text" class="datepicker" id="dtp_fecha_ingreso">
							<label for="dtp_fecha_ingreso">Fecha Ingreso</label>
						</div>
						<div class="input-field col s12 m12 l12">
							<i class="material-icons prefix">schedule</i>
							<input id="txt_horario" type="text" class="validate">
							<label for="txt_horario">Horario</label>
						</div>
					</div>
					<div class="row">
						<div class="col s12 m12 l12 center">
							<button class="btn-large waves-effect waves-light" type="button" name="btn_registrarEmpleado" id="btn_registrarEmpleado" onclick="registrar_empleado();">REGISTRAR<i class="material-icons right">send</i></button>
						</div>
                	</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

</script>

<?php ?>