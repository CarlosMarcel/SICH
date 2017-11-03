<?php

   require_once("mdl_conexion.php");

	class mdl_Alimentos { 
	
		private $conexion;
		 	 
		public function __construct(){
			$this->conexion = new mdl_Conexion();	   
		}

		public function insertar_alimento($nombre,$peso,$puntoReorden,$cantidad,$tipoMedida){
			$this->conexion->consulta("CALL insertarAlimento('".$nombre."','".$peso."','".$puntoReorden."','".$cantidad."','".$tipoMedida."')");
		}

		public function actualizar_alimento($nombre,$peso,$puntoReorden,$cantidad,$tipoMedida){
			$this->conexion->consulta("CALL consultarAlimentoXid('".$nombre."','".$peso."','".$puntoReorden."','".$cantidad."','".$tipoMedida."')");
		}
		public function comprobar_Alimento($ced){
			$this->conexion->consulta("SELECT nombre FROM tbl_alimentos WHERE nombre = ". $ced);
			$listaDatos = array();
			$listaDatos['valor'] = 0;
			while($fila = $this->conexion->extraer_registro()){
				$listaDatos['valor'] = 1;
			}
			echo json_encode($listaDatos);
		}

		public function listar_alimentos(){
			$this->conexion->consulta("CALL consultarAlimento");
			$datos="";
			$listaDatos = array();

			while ($fila = $this->conexion->extraer_registro()) {
				$datos.= "<tr><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td></tr>";
			}

			$listaDatos['tabla']=$datos;
			echo json_encode($listaDatos);
		}
		public function cargar_alimentos(){
			$this->conexion->consulta("CALL consultarNombresAlimentos");
			$datos="";
			$listaDatos = array();

			while ($fila = $this->conexion->extraer_registro()) {
				$datos.= "<option value='" .$fila[0]."'>".$fila[1]."</option>";
			}

			$listaDatos['combo']=$datos;
			echo json_encode($listaDatos);
		}

		public function buscar_empleado($cedula){
			$this->conexion->consulta("CALL `empleadoXcedula`('".$cedula."')");
			$listaDatos=array(); //matriz
			$listaDatos['existe'] = 0;

			while($fila = $this->conexion->extraer_registro()){
				$listaDatos['cedula'] = $fila[0];
				$listaDatos['nombre'] = $fila[1];
				$listaDatos['ap1'] = $fila[2];
				$listaDatos['ap2'] = $fila[3];
				$listaDatos['telefono'] = $fila[4];
				$listaDatos['correo'] = $fila[5];
				$listaDatos['fechaNacimiento'] = $fila[6];
				$listaDatos['direccion'] = $fila[7];
				$listaDatos['codigoAcceso'] = $fila[8];
				$listaDatos['tipoRol'] = $fila[9];
				$listaDatos['puesto'] = $fila[10];
				$listaDatos['salario'] = $fila[11];
				$listaDatos['fechaIngreso'] = $fila[12];
				$listaDatos['horario'] = $fila[13];
				$listaDatos['existe'] = 1;
			}
			 
			echo json_encode($listaDatos);
		}

		public function desactivar_empleado($cedula){
			$this->conexion->consulta("CALL inactivarEmpleado('".$cedula."')");
		}
	}

?>