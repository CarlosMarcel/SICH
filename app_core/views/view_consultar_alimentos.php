<?php ?>
<div class="container">
	<div class="row">
		<div id="caja" class="z-depth-1">
			<div class="row nombre_form">
				<h5 class="center-align">FORMULARIO CONSULTAR ALIMENTOS</h5>
			</div>
			
			<div class="row">
				<form class="col s12" name="frm_registro_empleado" method="post">
					<div class="row">
						<table class="striped">
					        <thead>
					          <tr>
					              <th>Nombre</th>
					              <th>Peso</th>
					              <th>Cantidad minima</th>
					              <th>Cantidad Actual</th>
					              <th>Tipo de Medida</th>
					          </tr>
					        </thead>
					        <tbody id="grid_alimentos">
					        </tbody>
					      </table>
					</div>
					<div class="row">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
listar_alimentos();
});
</script>

<?php ?>