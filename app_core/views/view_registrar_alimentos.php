<?php ?>
<div class="container">
	<div class="row">
		<div id="caja" class="z-depth-1">
			<div class="row nombre_form">
				<h5 class="center-align">FORMULARIO REGISTRO ALIMENTOS</h5>
			</div>
			
			<div class="row">
				<form class="col s12" name="frm_registro_alimento" method="post">
					<div class="row">
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">content_paste</i>
							<input id="txt_nombreAlimento" type="text" class="validate">
							<label for="txt_nombreAlimento">Nombre Alimento</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">slow_motion_video</i>
							<input id="txt_peso" type="text" class="validate">
							<label for="txt_peso">Peso</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">replay_10</i>
							<input id="txt_puntoReorden" type="text" class="validate">
							<label for="txt_puntoReorden">Punto Reorden</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">exposure</i>
							<input id="txt_cantidad" type="text" class="validate">
							<label for="txt_cantidad">Cantidad</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">exposure</i>
							<input  id="txt_cantidadPedido" type="text" class="validate">
							<label for="txt_cantidadPedido">Cantidad Pedido</label>
						</div>
						<div class="input-field col s12 m12 l6">
							<i class="material-icons prefix">straighten</i>
							<input id="txt_tipoMedida" type="text" class="validate">
							<label for="txt_tipoMedida">Tipo de Medida</label>
						</div>
					</div>
					<div class="row">
						<div class="col s12 m12 l12 center">
							<button class="btn-large waves-effect waves-light" type="button" name="btn_registrarAlimento" id="btn_registrarAlimento" onclick="registrar_alimento();">REGISTRAR<i class="material-icons right">send</i></button>
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