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

	<div class="navbar-fixed ">
		<nav class="">
			<div class="container">
				<div class=""><a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a></div>
				<div class="nav-wrapper">
					<img class="brand-logo" src="img/logo.png" alt="" height="56">
					<ul class="right hide-on-med-and-down">
						<li><a href="#">Perfil</a></li>
						<li>
							<form action="" name="frm_app" method="post">
								<button class="btn-large waves-effect waves black" name="btn_logout" id="btn_logout" type="submit">Salir<i class="material-icons right">exit_to_app</i></button> 	
							</form>
						</li>
					</ul>
				</div>

			</div>
		</nav>
	</div>

	<ul id="nav-mobile" class="side-nav fixed">
		<li>
			<div class="card">
				<div class="card-image">
					<img class="responsive-img" src="https://4.bp.blogspot.com/-N1cRoZUPc7c/VYUhHQuhtyI/AAAAAAABoeU/TWnDBdrat6Y/s690/Dark_Material_Design_uhd.jpg">
					<div class="card-title">
						<span class="name">Marcel Carlos Quesada</span>
						<span class="email">carlos.strike.quesada@gmail.com</span>
					</div>
				</div>
			</div>
		</li>

		<div class="row">
			<li class="no-padding">
				<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header active waves-effect waves-teal">Inicio<i class="material-icons left">home</i></a>
						<div class="collapsible-body">
							<ul>
								<li><a href="#">Administrar Inventario</a></li>
								<li><a href="#">Administrar Luces</a></li>
								<li><a href="#">Administrar Empleados</a></li>
								<li><a href="#">Administrar Inventario</a></li>
								<li><a href="#">Administrar Luces</a></li>
								<li><a href="#">Administrar Empleados</a></li>
								<li><a href="#">Reportes</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</li>
		</div>
	</ul>
</header>

<main class="home" id="home">
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
							<div class="input-field col s6 m6 l6">
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
</main>

<script type="text/javascript">
	$( document ).ready(function(){
		$(".button-collapse").sideNav();
		$(".dropdown-button").dropdown();

		$('.datepicker').pickadate({
		    selectMonths: true, // Creates a dropdown to control month
		    selectYears: 15, // Creates a dropdown of 15 years to control year,
		    today: 'Today',
		    clear: 'Clear',
		    close: 'Ok',
		    closeOnSelect: false // Close upon selecting a date,
		});

		$("#fecha").val('23/01/2015');
	});
</script>

<?php

?>