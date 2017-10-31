<?php ?>
<div class="container">
	<div class="row">
		<div id="caja" class="z-depth-1">
			<div class="row nombre_form">
				<h5 class="center-align">FORMULARIO MANTENIMIENTO EMPLEADOS</h5>
			</div>
			
			<div class="row">
				<form class="col s12" name="frm_registro_empleado" method="post">
					<div class="row">
						<div class="input-field col s6 m6 l6">
							<input placeholder="Ingrese la Cédula" id="txt_cedula" type="text" class="validate">
							<label for="txt_cedula">Cédula</label>
						</div>
						<div class="input-field col s3 m3 l3">
							<button class="btn waves-effect waves-light" type="button" name="btn_registrarEmpleado" id="btn_registrarEmpleado" onclick="registrar_empleado();">BUSCAR<i class="material-icons right">search</i></button>
						</div>
						<div class="input-field col s3 m3 l3">
							<button class="btn waves-effect waves-light red" type="button" name="btn_registrarEmpleado" id="btn_registrarEmpleado" onclick="registrar_empleado();"><i class="material-icons">delete</i></button>
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