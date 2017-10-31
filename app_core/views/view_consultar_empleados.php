<?php ?>
<div class="container">
	<div class="row">
		<div id="caja" class="z-depth-1">
			<div class="row nombre_form">
				<h5 class="center-align">FORMULARIO CONSULTAR EMPLEADOS</h5>
			</div>
			
			<div class="row">
				<form class="col s12" name="frm_registro_empleado" method="post">
					<div class="row">
						<table class="striped">
					        <thead>
					          <tr>
					              <th>Cedula</th>
					              <th>Nombre</th>
					              <th>Primer Apellido</th>
					              <th>Segundo Apellido</th>
					              <th>Telefono</th>
					              <th>Puesto</th>
					              <th>Salario</th>
					          </tr>
					        </thead>
					        <tbody id="grid_empleados">
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
listar_empleados();
});
</script>

<?php ?>