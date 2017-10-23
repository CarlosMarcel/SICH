<?php

   require_once("mdl_conexion.php");

	class mdl_Empleados { 
	
		private $conexion;
		 	 
		public function __construct(){
			$this->conexion = new mdl_Conexion();	   
		}

		public function insertar_empleado($cedula,$nombre,$ap1,$ap2,$tel,$correo,$fechaNacimiento,$direccion,$codigoAcceso,$puesto,$salario,$fechaIngreso,$horario){
			$this->conexion->consulta("CALL insertarEmpleado('".$cedula."','".$nombre."','".$ap1."','".$ap2."','".$tel."','".$correo."','".$fechaNacimiento."','".$direccion."','".$codigoAcceso."','Empleado','".$puesto."','".$salario."','".$fechaIngreso."','".$horario."')");
		}

		public function comprobar_Empleado($ced){
			$this->conexion->consulta("SELECT cedulaPersona FROM tbl_persona WHERE cedulaPersona = ". $ced);
			$listaDatos = array();
			$listaDatos['valor'] = 0;
			while($fila = $this->conexion->extraer_registro()){
				$listaDatos['valor'] = 1;
			}
			echo json_encode($listaDatos);
		}
	}

?>