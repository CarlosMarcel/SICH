<?php ?>
<div class="container">
	<div class="row">
		<div id="cajas" class="z-depth-1">
			<div class="row head">
				<h5 class="center-align">FORMULARIO REGISTRO PERSONAS AUTORIZADAS</h5>
			</div>
			
			<div class="row">
				<form class="col s12" name="frm_registro_autorizados" method="post">
					<div class="row">
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">person</i>
							<input placeholder="Cédula" id="txt_cedula" type="text" class="validate">
							<label for="txt_cedula">Cédula</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">account_circle</i>
							<input placeholder="Nombre" id="txt_nombre" type="text" class="validate">
							<label for="txt_nombre">Nombre</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">account_circle</i>
							<input placeholder="Primer Apellido" id="txt_apellido1" type="text" class="validate">
							<label for="txt_apellido1">Apellido</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">account_circle</i>
							<input placeholder="Segundo Apellido" id="txt_apellido2" type="text" class="validate">
							<label for="txt_apellido2">Apellido2</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">phone</i>
							<input placeholder="Teléfono" id="txt_telefono" type="text" class="validate">
							<label for="txt_telefono">Teléfono</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">email</i>
							<input placeholder="Correo" id="txt_correo" type="text" class="validate">
							<label for="txt_correo">Correo</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">date_range</i>
							<input placeholder="Fecha Nacimiento" type="text" class="datepicker" id="dtp_fecha_nacimiento">
							<label for="dtp_fecha_nacimiento">Fecha Nacimiento</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">home</i>
							<input placeholder="Dirección" id="txt_direccion" type="text" class="validate">
							<label for="txt_direccion">Dirección</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">fiber_pin</i>
							<input placeholder="Código Acceso" id="txt_codigo_acceso" type="text" class="validate">
							<label for="txt_codigo_acceso">Código Acceso</label>
						</div>
					</div>
                	<div class="row">
						<div class="col s12 m12 l12 center">
							<button class="btn-large waves-effect waves-light" type="button" name="btn_registrarAutorizado" id="btn_registrarAutorizado" onclick="registrar_autorizado();">REGISTRAR<i class="material-icons right">send</i></button>
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