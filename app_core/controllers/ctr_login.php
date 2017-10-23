<?php

	require_once(__MDL_PATH . "mdl_login.php");

	class ctr_Login {
		private $login_exec;

		public function __construct(){
			$this->login_exec = new mdl_Login();
		}

		function btn_login_click(){
			$cedula = trim($_POST['txt_cedula']);
			$password = trim($_POST['txt_pass']);

			$this->login_exec->login($cedula, $password);

			if($this->login_exec->conn_status){
				$_SESSION['SICH']="YES";
				$_SESSION['CEDULA']=$this->login_exec->get_cedula();
				$_SESSION['NOMBRE']= $this->login_exec->get_nombre();
				$_SESSION['APELLIDO1']= $this->login_exec->get_apellido1();
				$_SESSION['APELLIDO2']= $this->login_exec->get_apellido2();
				$_SESSION['CORREO']= $this->login_exec->get_correo();
				$_SESSION['TELEFONO']= $this->login_exec->get_telefono();
				$_SESSION['DIRECCION']= $this->login_exec->get_direccion();
				$_SESSION['TIPOROL']= $this->login_exec->get_tipoRol();


				//Aqui se oculta el login que es el id del div o main que tiene cada view.
				//Y se retorna al inicio para que ya teniendo la session lista permita entrar.
				echo "<script>$('#login').css('display','none');location.href='';</script>";
			}else{
				$_SESSION['SICH']="NO";
				echo "<script>Materialize.toast('Datos incorrectos!', 4000);</script>";
			}
		}

		function btn_login_home_click(){
			$cedula = trim($_POST['txt_cedula']);
			$pin = trim($_POST['txt_pin']);

			$this->login_exec->login_hogar($cedula, $pin);

			if($this->login_exec->conn_status){
				$_SESSION['SICH_HOGAR']="YES";
				$_SESSION['CEDULA']=$this->login_exec->get_cedula();
				$_SESSION['NOMBRE']= $this->login_exec->get_nombre();
				$_SESSION['APELLIDO1']= $this->login_exec->get_apellido1();
				$_SESSION['APELLIDO2']= $this->login_exec->get_apellido2();
				$_SESSION['TIPOROL']= $this->login_exec->get_tipoRol();


				//Aqui se oculta el login que es el id del div o main que tiene cada view.
				//Y se retorna al inicio para que ya teniendo la session lista permita entrar.
				echo "<script>$('#login_hogar').css('display','none');location.href='';</script>";
				echo "<script>Materialize.toast('Acceso Completado!', 4000);</script>";
			}else{
				$_SESSION['SICH_HOGAR']="NO";
				echo "<script>Materialize.toast('Datos incorrectos!', 4000);</script>";
			}
		}

		function btn_logout_click(){
			if(isset($_POST['btn_logout'])){
				$this->login_exec->logout();
				echo "<script>location.href='';</script>";
			}
		}

		function btn_logout_hogar_click(){
			if(isset($_POST['btn_logout'])){
				$this->login_exec->logout_hogar();
				echo "<script>location.href='';</script>";
			}
		}

	}
?>