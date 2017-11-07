<?php ?>
<div class="container">
	<div class="row">
		<div id="caja" class="z-depth-1">
			<div class="row nombre_form">
				<h5 class="center-align">FORMULARIO MANTENIMIENTO AUTORIZADOS</h5>
			</div>
			
			<div class="row">
				<form class="col s12" name="frm_mantenimiento_autorizados" method="post">
					<div class="row">
						 <div class="input-field col s12 m12 l12">
						    <select id="combo_personas" onchange="cargarDatosPersona()">
						    	<option value="0" disabled selected>Personas</option>
						    </select>
						    <label>Nombre del Autorizado</label>
						  </div>
					</div>

					<div class="row">
						<h5 class="center-align">DATOS DE LA PERSONA AUTORIZADA</h5>
					</div>
					<div class="row">
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">account_circle</i>
							<input placeholder="Nombre" id="txt_nombre_upd" type="text" class="validate">
							<label for="txt_nombre_upd">Nombre</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">account_circle</i>
							<input placeholder="Primer Apellido" id="txt_apellido1_upd" type="text" class="validate">
							<label for="txt_apellido1_upd">Apellido</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">account_circle</i>
							<input placeholder="Segundo Apellido" id="txt_apellido2_upd" type="text" class="validate">
							<label for="txt_apellido2_upd">Apellido2</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">phone</i>
							<input placeholder="Teléfono" id="txt_telefono_upd" type="text" class="validate">
							<label for="txt_telefono_upd">Teléfono</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">email</i>
							<input placeholder="Correo" id="txt_correo_upd" type="text" class="validate">
							<label for="txt_correo_upd">Correo</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">date_range</i>
							<input placeholder="Fecha Nacimiento" type="text" class="datepicker" id="dtp_fecha_nacimiento_upd">
							<label for="dtp_fecha_nacimiento_upd">Fecha Nacimiento</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">home</i>
							<input placeholder="Dirección" id="txt_direccion_upd" type="text" class="validate">
							<label for="txt_direccion_upd">Dirección</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">fiber_pin</i>
							<input placeholder="Código Acceso" id="txt_codigo_acceso_upd" type="text" class="validate">
							<label for="txt_codigo_acceso_upd">Código Acceso</label>
						</div>
					</div>
					<div class="row">
						<div class="col s6 m6 l6 center">
							<button class="btn-large waves-effect waves-light" type="button" name="btn_actualizarAutorizado" id="btn_actualizarAutorizado" onclick="actualizar_autorizado()">ACTUALIZAR<i class="material-icons right">send</i></button>
						</div>
						<div class="col s6 m6 l6 center">
							<button class="btn-large waves-effect waves-light red modal-trigger" type="button" href="#modal_autorizado" name="btn_eliminarAutorizado" id="btn_eliminarAutorizado">ELIMINAR<i class="material-icons right">delete</i></button>

							
						</div>
                	</div>

                	<!-- Modal Structure -->
					<div id="modal_autorizado" class="modal">
						<div class="modal-content">
							<h4 class="center">Eliminar Persona Autorizada</h4>
							<p class="center-align">¿Realmente desea eliminarle el acceso?</p>
						</div>
						<div class="modal-footer">
							<button class="btn waves-effect waves-light red btn modal-trigger" href="#modal_autorizado" type="button" name="btn_inactivarAutorizado" id="btn_inactivarAutorizado" onclick="eliminar_persona()">Eliminar<i class="material-icons right">delete</i></button>
	
							<button class="btn waves-effect waves-light blue btn modal-action modal-close" href="#modal_autorizado" type="button" name="btn_cancelar" id="btn_cancelar" onclick="">Cancelar<i class="material-icons right">reply</i></button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('select').material_select();
    cargarCmbPersonas();
    Materialize.updateTextFields();
  });
  
</script>

<?php ?>