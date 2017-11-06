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
						<h5 class="center-align" id="fecha_actual"></h5><br>
						<h5 class="center-align" id="empleado_cedula"><?php echo $_SESSION['CEDULA'];?></h5>
						<table class="centered bordered">
							<thead>
								<tr>
									<th>Estado</th>
									<th>Descripción Tarea</th>
									<th>Estado</th>
								</tr>
							</thead>
							<tbody id="tabla_tareas">
								
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

    cargar_mis_tareas_hoy();
</script>

<?php ?>