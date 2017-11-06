<?php ?>
<div class="container">
	<div class="row">
		<div id="caja" class="z-depth-1">
			<div class="row nombre_form">
				<h5 class="center-align">FORMULARIO MANTENIMIENTO ALIMENTOS</h5>
			</div>
			
			<div class="row">
				<form class="col s12" name="frm_mantenimiento_alimentos" method="post">
					<div class="row">
						 <div class="input-field col s12 m12 l12">
						    <select id="combo_alimentos" onchange="cargarDatosAlimentos()">
						    	<option value="0" disabled selected>Alimentos</option>
						    </select>
						    <label>Nombre del Alimento</label>
						  </div>
					</div>

					<div class="row">
						<h5 class="center-align">DATOS DEL PRODUCTO</h5>
					</div>
					<div class="row">
						<div class="input-field col s12 m12 l12">
							<i class="material-icons prefix">content_paste</i>
							<input placeholder="Nombre" id="txt_nombre_upd" type="text" class="validate">
							<label class="active" for="txt_nombre_upd">Nombre</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">replay_10</i>
							<input placeholder="Punto Reorden" id="txt_puntoReorden_upd" type="text" class="validate">
							<label for="txt_puntoReorden_upd">Punto Reorden</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">exposure</i>
							<input placeholder="Cantidad" id="txt_cantidad_upd" type="text" class="validate">
							<label for="txt_cantidad_upd">Cantidad</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">exposure</i>
							<input placeholder="Cantidad Pedido" id="txt_cantidadPedido_upd" type="text" class="validate">
							<label for="txt_cantidadPedido_upd">Cantidad Pedido</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">straighten</i>
							<input placeholder="Medida" id="txt_tipoMedida_upd" type="text" class="validate">
							<label for="txt_tipoMedida_upd">Tipo de Medida</label>
						</div>
					</div>
					<div class="row">
						<div class="col s6 m6 l6 center">
							<button class="btn-large waves-effect waves-light" type="button" name="btn_actualizarAlimento" id="btn_actualizarAlimento" onclick="actualizar_alimentos();">ACTUALIZAR<i class="material-icons right">send</i></button>
						</div>
						<div class="col s6 m6 l6 center">
							<button class="btn-large waves-effect waves-light red modal-trigger" type="button" href="#modal2" name="btn_eliminarProducto" id="btn_eliminarProducto">ELIMINAR<i class="material-icons right">delete</i></button>

							
						</div>
                	</div>

                	<!-- Modal Structure -->
					<div id="modal2" class="modal">
						<div class="modal-content">
							<h4 class="center">Eliminar Alimento</h4>
							<p class="center-align">¿Realmente desea eliminar el producto?</p>
						</div>
						<div class="modal-footer">
							<button class="btn waves-effect waves-light red btn modal-trigger" href="#modal2" type="button" name="btn_inactivarProducto" id="btn_inactivarProducto" onclick="eliminar_alimento()">Eliminar<i class="material-icons right">delete</i></button>
	
							<button class="btn waves-effect waves-light blue btn modal-action modal-close" href="#modal2" type="button" name="btn_cancelar" id="btn_cancelar" onclick="">Cancelar<i class="material-icons right">reply</i></button>
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
    cargarCmbAlimentos();
    Materialize.updateTextFields();
  });
  
</script>

<?php ?>