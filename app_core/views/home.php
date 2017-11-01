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
		<nav>
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
						<img class="responsive-img" src="app_design/img/panel.jpg">
						<div class="card-title">
							<span class="name"><?php echo $_SESSION['NOMBRE']." ".$_SESSION['APELLIDO1']." ".$_SESSION['APELLIDO2'];?></span>
							<span class="email"><?php echo $_SESSION['CORREO'];?></span>
						</div>
					</div>
				</div>
			</li>

			<div class="row">
				<form action="" name="frm_link" method="post">
					<li class="no-padding">
						<ul class="collapsible collapsible-accordion">
							<li class="bold"><a class="collapsible-header  waves-effect waves-teal">Hogar<i class="material-icons left">home</i></a>
								<div class="collapsible-body">
									<ul>
										<li><a href=""><input name="" id="" class="boton_link transparent" value="-NOMRE VISTA-" tabindex="" type="submit"></a></li>
									</ul>
								</div>
							</li>
							<li class="bold"><a class="collapsible-header  waves-effect waves-teal">Seguridad<i class="material-icons">security</i></a>
								<div class="collapsible-body">
									<ul>
										<li><a href=""><input name="link_luces" id="link_luces" class="boton_link transparent" value="Luces" tabindex="" type="submit"></a></li>
									</ul>
								</div>
							</li>
							<li class="bold"><a class="collapsible-header active waves-effect waves-teal">Empleados<i class="material-icons">people</i></a>
								<div class="collapsible-body">
									<ul>
										<li><a href=""><input name="link_registarEmpleado" id="link_registarEmpleado" class="boton_link transparent" value="Registar Empleados" tabindex="" type="submit"></a></li>
										<li><a href=""><input name="link_consultarEmpleado" id="link_consultarEmpleado" class="boton_link transparent" value="Consultar Empleados" tabindex="" type="submit"></a></li>
										<li><a href=""><input name="link_mantenimientoEmpleado" id="link_mantenimientoEmpleado" class="boton_link transparent" value="Mantenimiento Empleados" tabindex="" type="submit"></a></li>
									</ul>
								</div>
							</li>
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
		if(isset($_POST['btn_aja2'])){ 
    		include_once(__VWS_PATH . "registrarHoras.php");
  		}

  		if(isset($_POST['link_registarEmpleado'])){ 
    		include_once(__VWS_PATH . "view_registrar_empleados.php");
  		}

  		if(isset($_POST['link_consultarEmpleado'])){ 
    		include_once(__VWS_PATH . "view_consultar_empleados.php");
  		}

  		if(isset($_POST['link_mantenimientoEmpleado'])){ 
    		include_once(__VWS_PATH . "view_mantenimiento_empleados.php");
  		}

  		if(isset($_POST['link_luces'])){ 
    		include_once(__VWS_PATH . "view_luces.php");
  		}
	?>
	<div id="vistas">
		<div class="container">
			<div class="row">
				<div id="cajas" class="z-depth-1">
					<div class="row">
						<h5 class="center-align">FORMULARIO REGISTRO USUARIOS</h5>
						<form class="col s12">
							<div class="row">
								<div class="input-field col s12 m12 l6">
									<i class="material-icons prefix">account_circle</i>
									<input id="icon_prefix" type="text" class="validate">
									<label for="icon_prefix">Nombre</label>
								</div>
								<div class="input-field col s12 m12 l6">
									<i class="material-icons prefix">date_range</i>
									<input type="text" class="datepicker" id="fecha">
									<label for="fecha">Fecha</label>
								</div>
								<div class="input-field col s12 m12 l6">
									<i class="material-icons prefix">account_circle</i>
									<input id="icon_telephone" type="tel" class="validate">
									<label for="icon_telephone">Apellido</label>
								</div>

								<div class="input-field col s12 m12 l6">
									<i class="material-icons prefix">home</i>
									<input id="icon_prefix" type="text" class="validate">
									<label for="icon_prefix">Dirección</label>
								</div>
								<div class="input-field col s12 m12 l6">
									<i class="material-icons prefix">phone</i>
									<input id="icon_telephone" type="tel" class="validate">
									<label for="icon_telephone">Teléfono</label>
								</div>

								<div class="input-field col s12 m12 l6">
									<i class="material-icons prefix">email</i>
									<input id="icon_prefix" type="text" class="validate">
									<label for="icon_prefix">Correo</label>
								</div>
								<div class="input-field col s12 m12 l6">
									<i class="material-icons prefix">link</i>
									<input id="icon_telephone" type="tel" class="validate">
									<label for="icon_telephone">Sitio Web</label>
								</div>
							</div>
							<div class="row center">
								<div class="col s12 m12 l2">
									<a class="waves-effect waves-teal btn-flat grey">DEFAULT</a>
								</div>
								<div class="col s12 m12 l2">
									<a class="waves-effect waves-light btn">PRIMARY</a>
								</div>
								<div class="col s12 m12 l2">
									<a class="waves-effect waves-light btn green">SUCCES</a>
								</div>
								<div class="col s12 m12 l2">
									<a class="waves-effect waves-light btn cyan">INFO</a>
								</div>
								<div class="col s12 m12 l2">
									<a class="waves-effect waves-light btn orange">WARNING</a>
								</div>
								<div class="col s12 m12 l2">
									<a class="waves-effect waves-light btn red">DANGER</a>
								</div>
							</div>
						</form>
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
		    selectYears: 15, // Crea combo con de años con la cantidad especificada,
		    today: 'Today',
		    clear: 'Clear',
		    close: 'Ok',
		    format: 'yyyy-mm-dd', //Formato del componente
		    closeOnSelect: true // Cerrar el componente una vez seleccionada la fecha
		});
		 $('.modal').modal();
	});
</script>

<?php ?>