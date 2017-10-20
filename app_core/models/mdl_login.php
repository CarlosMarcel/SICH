<?php
	require_once(__MDL_PATH . "mdl_conexion.php");

	class mdl_Login{
		var $conexion;
		var $conn_status;
		var $username;
		var $usercedula;
		var $userid;

		function __construct(){
			$this->conexion = new mdl_Conexion();
		}

		function get_username(){
			return $this->username;
		}

		function get_usercedula(){
			return $this->usercedula;
		}

		public function login($user, $pssw){
			$this->conexion->consulta("SELECT tbltutores.tutorCedula,tbltutores.tutorNombre FROM tbltutores WHERE tutorCedula = '". $user ."' AND tutorPassword = md5('". $pssw ."')");

			$fila = $this->conexion->extraer_registro();

			if(count($fila)>1){
				$this->conn_status = true;
				$this->usercedula = $fila[0];
				$this->username = $fila[1];
			}else{
				$this->conn_status = false;
			}
		}

		public function logout(){
			unset($this->conexion);
			$this->conn_status= false;
			unset($_SESSION['MYAPP']);
		}
	}
?>