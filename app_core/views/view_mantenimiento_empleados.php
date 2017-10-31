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
							<button class="btn waves-effect waves-light red btn modal-trigger" href="#modal1" type="button" name="btn_registrarEmpleado" id="btn_registrarEmpleado" onclick=""><i class="material-icons">delete</i></button>
						</div>
						<!-- Modal Structure -->
						<div id="modal1" class="modal">
							<div class="modal-content">
								<h4 class="center">Eliminar Empleado</h4>
								<p>¿Desea eliminar el empleado consulado?</p>
							</div>
							<div class="modal-footer">
								<button class="btn waves-effect waves-light red btn modal-trigger" href="#modal1" type="button" name="btn_registrarEmpleado" id="btn_registrarEmpleado" onclick=""><i class="material-icons">delete</i>Eliminar</button>
								<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
								<button class="btn waves-effect waves-light red btn modal-action modal-close" href="#modal1" type="button" name="btn_registrarEmpleado" id="btn_registrarEmpleado" onclick=""><i class="material-icons">delete</i>Cancelar</button>
							</div>
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