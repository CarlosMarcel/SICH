<?php
  	//Agregamos la referencia al controlador respectivo
require(__CTR_PATH . "ctr_login.php");
  	//variable del Controlador
$ctr_Login = new ctr_Login(); 


if(isset($_POST['btn_logout'])){ 
	$ctr_Login->btn_logout_click();
}
?>

<header>
	<!-- Barra de Navegacion -->
	<div class="navbar-fixed ">
		<nav class="gradient-45deg-indigo-blue">
			<div class="container">
				<div class=""><a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a></div>
				<div class="nav-wrapper">
					<a href="#" class="brand-logo">SICH</a>
					<form action="" name="frm_app" method="post">
						<ul class="right hide-on-med-and-down">
							<li>
								<a href="">
									<input name="btn_logout" id="btn_logout" class="boton transparent" value="Salir" tabindex="3" type="submit">
								</a>
							</li>
						</ul>
					</form>
				</div>
			</div>
		</nav>
	</div>
	<!-- Barra de Navegacion lateral y movil -->
	<div id="side-nav-home">
		<ul id="nav-mobile" class="side-nav fixed">
			<li>
				<div class="card">
					<div class="card-image">
						<img class="responsive-img" src="app_design/img/panel-3.jpg">
						<div class="card-title">
							<span class="name"><?php echo $_SESSION['NOMBRE']." ".$_SESSION['APELLIDO1']." ".$_SESSION['APELLIDO2'];?></span><br>
							<span class="email"><?php echo $_SESSION['CORREO'];?></span>
						</div>
					</div>
				</div>
			</li>

			<div class="row">
				<form action="" name="frm_link" method="post">
					<li class="no-padding">
						<ul class="collapsible collapsible-accordion">

							<?php if($_SESSION['TIPOROL'] == 'Administrador') : ?>
								<li class="bold"><a class="collapsible-header  waves-effect waves-teal">Hogar<i class="material-icons left">home</i></a>
									<div class="collapsible-body" type="submit">
										<ul>
											<li><a href=""><input name="" id="" class="boton_link transparent" value="Inicio" tabindex="" type="submit"></a></li>
										</ul>
									</div> 
								</li>
								<li class="bold"><a class="collapsible-header  waves-effect waves-teal">Alimentos<i class="material-icons">kitchen</i></a>
									<div class="collapsible-body">
										<ul>
											<li><a href=""><input name="link_registrarAlimentos" id="link_registrarAlimentos" class="boton_link transparent" value="Registrar Alimentos" tabindex="" type="submit"></a></li>
											<li><a href=""><input name="link_consultarAlimentos" id="link_consultarAlimentos" class="boton_link transparent" value="Consultar Alimentos" tabindex="" type="submit"></a></li>
											<li><a href=""><input name="link_mantenimientoAlimentos" id="link_mantenimientoAlimentos" class="boton_link transparent" value="Gestionar Alimentos" tabindex="" type="submit"></a></li>
										</ul>
									</div>
								</li>
								<li class="bold"><a class="collapsible-header  waves-effect waves-teal">Seguridad<i class="material-icons">security</i></a>
									<div class="collapsible-body">
										<ul>
											<li><a href=""><input name="link_registrarAutorizados" id="link_registrarAutorizados" class="boton_link transparent" value="Registrar Personas Autorizadas" tabindex="" type="submit"></a></li>
											<li><a href=""><input name="link_gestionarAutorizados" id="link_gestionarAutorizados" class="boton_link transparent" value="Gestionar Personas Autorizadas" tabindex="" type="submit"></a></li>
											<li><a href=""><input name="link_consultarAutorizados" id="link_consultarAutorizados" class="boton_link transparent" value="Consultar Personas Autorizadas" tabindex="" type="submit"></a></li>
											<li><div class="divider"></div></li>
											<li><a href=""><input name="link_gestionarLuces" id="link_gestionarLuces" class="boton_link transparent" value="Gestionar Luces" tabindex="" type="submit"></a></li>
											<li><a href=""><input name="link_consultarLuces" id="link_consultarLuces" class="boton_link transparent" value="Consultar Luces" tabindex="" type="submit"></a></li>
											<li><div class="divider"></div></li>
											<li><a href=""><input name="link_consultarBitacora" id="link_consultarBitacora" class="boton_link transparent" value="Consultar Bitácora Hogar" tabindex="" type="submit"></a></li>
											
										</ul>
									</div>
								</li>
								<li class="bold"><a class="collapsible-header  waves-effect waves-teal">Empleados<i class="material-icons">people</i></a>
									<div class="collapsible-body">
										<ul>
											<li><a href=""><input name="link_registarEmpleado" id="link_registarEmpleado" class="boton_link transparent" value="Registar Empleados" tabindex="" type="submit"></a></li>
											<li><a href=""><input name="link_consultarEmpleado" id="link_consultarEmpleado" class="boton_link transparent" value="Consultar Empleados" tabindex="" type="submit"></a></li>
											<li><a href=""><input name="link_mantenimientoEmpleado" id="link_mantenimientoEmpleado" class="boton_link transparent" value="Mantenimiento Empleados" tabindex="" type="submit"></a></li>
											<li><div class="divider"></div></li>
											<li><a href=""><input name="link_asignarTareasEmpleado" id="link_asignarTareasEmpleado" class="boton_link transparent" value="Asignar Tareas" tabindex="" type="submit"></a></li>
											<li><a href=""><input name="link_consultar_tareas" id="link_consultar_tareas" class="boton_link transparent" value="Consultar Tareas" tabindex="" type="submit"></a></li>
										</ul>
									</div>
								</li>
							<?php else : ?>
								<li class="bold"><a class="collapsible-header  waves-effect waves-teal">Mis Tareas<i class="material-icons"><i class="material-icons">assignment</i></i></a>
									<div class="collapsible-body">
										<ul>
											<li><a href=""><input name="link_actualizarTareasEmpleado" id="link_actualizarTareasEmpleado" class="boton_link transparent" value="Actualizar Tareas" tabindex="" type="submit"></a></li>
										</ul>
									</div>
								</li>
							<?php endif; ?>


							
							
							<li><div class="divider"></div></li>
							<li>
								<a class="collapsible-header  waves-effect waves-teal"><input name="btn_logout" id="btn_logout" class="boton_link_logout transparent" value="Cerrar Sesión" tabindex="3" type="submit">
								</a>
							</li>
						</ul>
					</li>
				</form>
			</div>
		</ul>	
	</div>
</header>

<main class="home" id="home">
	<?php 
		//Hacer aqui los llamados a las vistas y recordar ocultar todo en el index
	if(isset($_POST['link_registarEmpleado'])){ 
		include_once(__VWS_PATH . "view_registrar_empleados.php");
	}

	if(isset($_POST['link_consultarEmpleado'])){ 
		include_once(__VWS_PATH . "view_consultar_empleados.php");
	}

	if(isset($_POST['link_mantenimientoEmpleado'])){ 
		include_once(__VWS_PATH . "view_mantenimiento_empleados.php");
	}

	if(isset($_POST['link_asignarTareasEmpleado'])){ 
		include_once(__VWS_PATH . "view_asignar_tareas.php");
	}

	if(isset($_POST['link_actualizarTareasEmpleado'])){ 
		include_once(__VWS_PATH . "view_actualizar_tareas.php");
	}

	//MODULO DE SEGURIDAD
	if(isset($_POST['link_registrarAutorizados'])){ 
		include_once(__VWS_PATH . "view_registrar_autorizados.php");
	}

	if(isset($_POST['link_gestionarAutorizados'])){ 
		include_once(__VWS_PATH . "view_mantenimiento_autorizados.php");
	}

	if(isset($_POST['link_consultarAutorizados'])){ 
		include_once(__VWS_PATH . "view_consultar_autorizados.php");
	}

	if(isset($_POST['link_gestionarLuces'])){ 
		include_once(__VWS_PATH . "view_mantenimiento_luces.php");
	}

	if(isset($_POST['link_consultarLuces'])){ 
		include_once(__VWS_PATH . "view_consultar_luces.php");
	}

	if(isset($_POST['link_consultarBitacora'])){ 
		include_once(__VWS_PATH . "view_consultar_bitacora.php");
	}
	
	//MODULO DE ALIMENTOS
	if(isset($_POST['link_registrarAlimentos'])){ 
		include_once(__VWS_PATH . "view_registrar_alimentos.php");
	}

	if(isset($_POST['link_consultarAlimentos'])){ 
		include_once(__VWS_PATH . "view_consultar_alimentos.php");
	}

	if(isset($_POST['link_mantenimientoAlimentos'])){ 
		include_once(__VWS_PATH . "view_mantenimiento_alimentos.php");
	}
	if(isset($_POST['link_consultar_tareas'])){ 
		include_once(__VWS_PATH . "view_consultar_tareas.php");
	}

	?>
	<div id="vistas">
		<div class="container">
			<div class="row">
				<div class="row center-align">
					<div class="col s12 l6 m6 ">
						<div class="card-panel-widget gradient-45deg-indigo-light-blue z-depth-1">
							<div class="wrap">
								<div class="widget">
									<div class="fecha">
										<p id="diaSemana" class="diaSemana"></p>
										<p id="dia" class="dia"></p>
										<p>de </p>
										<p id="mes" class="mes"></p>
										<p>del </p>
										<p id="year" class="year"></p>
									</div>
									<div class="reloj">
										<p id="horas" class="horas"></p>
										<p>:</p>
										<p id="minutos" class="minutos"></p>
										<p>:</p>
										<div class="caja-segundos">
											<p id="ampm" class="ampm"></p>
											<p id="segundos" class="segundos"></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col s12 m6 l6 ">
						<div class="card-panel">
							<div class="wrap">
								<div class="widget">
									<div class="row">
										<div class="col s12 m12">
											<div class="card-panel weather-card-static blue-grey lighten-1 white-text">
												<div class="row">
													<div class="temp col s7">-3°C <span class="alt">27°F</span></div>
													<div class="city col s5"><i class="fa fa-map-marker"></i> Costa Rica</div>
												</div>
												<div class="icon"><i class="wi wi-cloud"></i></div>cloud
												<div class="currently">Cloudy</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col s12 m12 l4 ">
						<div class="card-panel">
							<div class="wrap">
								<div class="widget">
									<div class="row">
										<div class="col s12 m12 ">
											<div class="card card-info">
												<div class="card-image">
													<div id="icon" class="center-align">
														<i class="material-icons center-align" >kitchen</i>
													</div>
												</div>
												<div class="card-action">
													<div class="card-title center-align" id="title_card">
														<p >Alimentos</p>
													</div><br>

													<p class="center-align">Este módulo permite la gestión del consumo de los alimentos existentes, realizar pedidos de alimentos que se acerquen al rango minínimo y ver los alimentos existentes.</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col s12 m12 l4 ">
						<div class="card-panel">
							<div class="wrap">
								<div class="widget">
									<div class="row">
										<div class="col s12 m12 ">
											<div class="card card-info">
												<div class="card-image">
													<div id="icon" class="center-align">
														<i class="material-icons center-align" >security</i>
													</div>
												</div>
												<div class="card-action">
													<div class="card-title center-align" id="title_card">
														<p>Seguridad</p>
													</div><br>
													<p class="center-align">Este modulo permite gestionar registros de personas autorizadas a ingresar, asi como la administracion de las horas de encendido y apagado de luces al hogar.</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col s12 m12 l4 ">
						<div class="card-panel">
							<div class="wrap">
								<div class="widget">
									<div class="row">
										<div class="col s12 m12 ">
											<div class="card card-info">
												<div class="card-image">
													<div id="icon" class="center-align">
														<i class="material-icons center-align" >people</i>
													</div>
												</div>
												<div class="card-action">
													<div class="card-title center-align" id="title_card">
														<p >Empleados</p>
													</div><br>
													<p class="center-align">Este modulo permite el manejo del personal de limpieza y mantenimiento del hogar, y la asignación de sus respectivas tareas para su posterior consulta.</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</main>

	<!-- Scripts -->
	<script type="text/javascript">

		$( document ).ready(function(){
			$(".button-collapse").sideNav();
			$(".dropdown-button").dropdown();

			$('.datepicker').pickadate({
		    selectMonths: true, // Crea combo de meses
		    selectYears: 20, // Crea combo con de años con la cantidad especificada,
		    today: 'Today',
		    clear: 'Clear',
		    close: 'Ok',
		    format: 'yyyy-mm-dd', //Formato del componente
		    closeOnSelect: true // Cerrar el componente una vez seleccionada la fecha
		});
			$('.modal').modal();
		});

		(function(){
			var actualizarHora = function(){
				var fecha = new Date(),
				horas = fecha.getHours(),
				ampm,
				minutos = fecha.getMinutes(),
				segundos = fecha.getSeconds(),
				diaSemana = fecha.getDay(),
				dia = fecha.getDate(),
				mes = fecha.getMonth(),
				year = fecha.getFullYear();

				var pHoras = document.getElementById('horas'),
				pAMPM = document.getElementById('ampm'),
				pMinutos = document.getElementById('minutos'),
				pSegundos = document.getElementById('segundos'),
				pDiaSemana = document.getElementById('diaSemana'),
				pDia = document.getElementById('dia'),
				pMes = document.getElementById('mes'),
				pYear = document.getElementById('year');

				var semana = ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sabado']
				pDiaSemana.textContent = semana[diaSemana];

				pDia.textContent = dia;

				var meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
				pMes.textContent = meses[mes];

				pYear.textContent = year;

				if(horas >= 12) {
					horas = horas - 12;
					ampm = 'PM';
				} else {
					ampm = 'AM';
				}

				if (horas == 0) {
					horas = 12;
				}
				if (horas < 10) {
					horas = "0" + horas;
				}

				if (minutos < 10) {
					minutos = "0" + minutos;
				}

				if (segundos < 10) {
					segundos = "0" + segundos;
				}

				pHoras.textContent = horas;
				pAMPM.textContent = ampm;
				pMinutos.textContent = minutos;
				pSegundos.textContent = segundos;

			};



			actualizarHora();

			var intervalo = setInterval(actualizarHora, 1000);
		}())
	</script>

	<?php ?>