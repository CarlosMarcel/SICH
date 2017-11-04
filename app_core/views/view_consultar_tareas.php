<?php ?>
<div class="container">
	<div class="row">
		<div id="caja" class="z-depth-1">
			<div class="row nombre_form">
				<h5 class="center-align">FORMULARIO CONSULTAR TAREAS</h5>
			</div>
			
			<div class="row">
				<form class="col s12" name="frm_registro_tareas" method="post">
					<div class="row">
						<table class="striped">
					        <thead>
					          <tr>
					              <th>Fecha</th>
					              <th>Nombre</th>
					              <th>Primer Apellido</th>
					              <th>Segundo Apellido</th>
					              <th>Descripcion</th>
					              <th>Estado de la Tarea</th>
					          </tr>
					        </thead>
					        <tbody id="grid_tareas">
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
listar_tareas();
});
</script>

<?php ?>