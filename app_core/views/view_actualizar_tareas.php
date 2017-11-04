<?php ?>
<div class="container">
	<div class="row">
		<div id="cajas" class="z-depth-1">
			<div class="row head">
				<h5 class="center-align">FORMULARIO ACTUALIZAR TAREAS</h5>
			</div>
			
			<div class="row">
				<form class="col s12">
					<div class="row">
						<h5 class="center-align" id="fecha_actual"></h5>
						<table class="centered bordered">
							<thead>
								<tr>
									<th>Estado</th>
									<th>Descripción Tarea</th>
								</tr>
							</thead>
							<tbody id="tabla_estudiantes">
								<tr>
									<td><input type="checkbox" id="myCheckbox" class="filled-in" /><label  for="myCheckbox"></label></td>
									<td>sbfhsdhfbshdbfhbfdbshfsdbdf</td>
								</tr>
							</tbody>
						</table>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var f = new Date();
    n = "FECHA " + f.getFullYear() + "-" + (f.getMonth() +1) + "-"+f.getDate();
    document.getElementById('fecha_actual').innerHTML = n;
</script>

<?php ?>