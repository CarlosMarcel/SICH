<?php
	require_once(__MDL_PATH . "mdl_conexion.php");

	class mdl_Login{
		var $conexion;
		var $conn_status;
		var $cedula;
		var $nombre;
		var $apellido1;
		var $apellido2;
		var $correo;
		var $telefono;
		var $direccion;
		var $tipoRol;

		function __construct(){
			$this->conexion = new mdl_Conexion();
		}

		function get_cedula(){
			return $this->cedula;
		}

		function get_nombre(){
			return $this->nombre;
		}

		function get_apellido1(){
			return $this->apellido1;
		}

		function get_apellido2(){
			return $this->apellido2;
		}

		function get_correo(){
			return $this->correo;
		}

		function get_telefono(){
			return $this->telefono;
		}

		function get_direccion(){
			return $this->direccion;
		}

		function get_tipoRol(){
			return $this->tipoRol;
		}

		public function login($ced, $pass){
			$this->conexion->consulta("CALL `loginSICH`('".$ced."','".$pass."')");

			$fila = $this->conexion->extraer_registro();

			if(count($fila)>1){
				$this->conn_status = true;
				$this->cedula = $fila[0];
				$this->nombre = $fila[1];
				$this->apellido1 = $fila[2];
				$this->apellido2 = $fila[3];
				$this->correo = $fila[4];
				$this->telefono = $fila[5];
				$this->direccion = $fila[6];
				$this->tipoRol = $fila[7];
			}else{
				$this->conn_status = false;
			}
		}

		public function login_hogar($ced, $pin){
			$this->conexion->consulta("CALL `loginCodigoAccesoSICH`('".$ced."','".$pin."')");

			$fila = $this->conexion->extraer_registro();

			if(count($fila)>1){
				$this->conn_status = true;
				$this->cedula = $fila[0];
				$this->nombre = $fila[1];
				$this->apellido1 = $fila[2];
				$this->apellido2 = $fila[3];
				$this->tipoRol = $fila[4];
			}else{
				$this->conn_status = false;
			}
		}

		public function logout(){
			unset($this->conexion);
			$this->conn_status= false;
			unset($_SESSION['SICH']);
		}

		public function logout_hogar(){
			unset($this->conexion);
			$this->conn_status= false;
			unset($_SESSION['SICH_HOGAR']);
		}
	}
?>