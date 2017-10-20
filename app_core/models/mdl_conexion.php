<?php

	class mdl_Conexion
	{
		private $servidor;
		private $usuario;
		private $clave;
		private $base_datos;
		private $conexion;
		private $resultado;

		function __construct()
		{
			/*$this->servidor = "mysql.hostinger.es";
			$this->usuario = "u947677759_cmcq";
			$this->clave = "123456";
			$this->base_datos = "u947677759_ccq";*/

			$this->servidor = "localhost";
			$this->usuario = "root";
			$this->clave = "";
			$this->base_datos = "sich";
			$this->conectar_base_datos();
		}

		private function conectar_base_datos()
		{
			$this->conexion = mysqli_connect($this->servidor,$this->usuario,$this->clave);
			mysqli_select_db($this->conexion, $this->base_datos) or die (mysqli_error($this->conexion));
            mysqli_query ($this->conexion, "SET NAMES 'utf8'");

            return $this->conexion;
		}

		public function consulta($consulta)
		{
			$this->resultado = mysqli_query($this->conexion, $consulta);

			echo mysqli_error($this->conexion);
		}

		public function extraer_registro ()
		{
			if ($fila = mysqli_fetch_row($this->resultado)){
				return $fila;
			} else {
				return false;
			}

			echo mysqli_error($this->conexion);
		}
	}
?>



