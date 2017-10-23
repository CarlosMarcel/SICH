<?php

   require_once("mdl_conexion.php");

	class mdl_Empleados { 
	
		private $conexion;
		 	 
		public function __construct(){
			$this->conexion = new mdl_Conexion();	   
		}

		public function insertar_empleado($cedula,$nombre,$ap1,$ap2,$tel,$correo,$fechaNacimiento,$direccion,$codigoAcceso,$puesto,$salario,$fechaIngreso,$horario){
			$this->conexion->consulta("CALL insertarEstudiante('".$cedula."','".$nombre."','".$ap1."','".$ap2."')");
		}
	}
?>