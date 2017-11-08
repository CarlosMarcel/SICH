<?php ?>
<div class="container">
	<div class="row">
		<div id="caja" class="z-depth-1">
			<div class="row nombre_form">
				<h5 class="center-align">FORMULARIO CONSULTAR REGISTROS DE LUCES</h5>
			</div>
			
			<div class="row">
				<form class="col s12" name="frm_consultar_alimentos" method="post">
					<div class="row">
						<table class="responsive-table striped">
					        <thead>
					          <tr>
					              <th>Ubicacion</th>
					          </tr>
					        </thead>
					        <tbody id="grid_luces">
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
listar_registrosLuces();
});
</script>

<?php ?>