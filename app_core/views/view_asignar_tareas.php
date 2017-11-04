<?php ?>
<div class="container">
	<div class="row">
		<div id="cajas" class="z-depth-1">
			<div class="row head">
				<h5 class="center-align">FORMULARIO ASIGNAR TAREAS</h5>
			</div>
			
			<div class="row">
				<form class="col s12">
					<div class="row">
						<div class="input-field col s12 m12 l12">
							<select id="combo_empleados" onchange="">
								<option value="0" disabled selected>Empleados</option>
							</select>
							<label>Nombre del Empleado</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">content_paste</i>
							<input placeholder="Descripción de la tarea" id="txt_descripcion_tarea" type="text" class="validate">
							<label class="active" for="txt_descripcion_tarea">Descripción Tarea</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">insert_invitation</i>
							<input placeholder="Fecha de la Tarea" type="text" class="datepicker" id="dtp_fecha_tarea">
							<label for="dtp_fecha_tarea">Fecha Tarea</label>
						</div>
					</div>
					<div class="row right">
						<button class="btn-large waves-effect waves-light" type="button" name="btn_asignarTarea" id="btn_asignarTarea" onclick="registarTareaEmpleado()">ASIGNAR TAREA<i class="material-icons right">send</i></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
   		$('select').material_select();
    	cargarCmbEmpleados();
    	Materialize.updateTextFields();
  	});
</script>

<?php ?>