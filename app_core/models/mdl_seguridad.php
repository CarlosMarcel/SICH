<?php

   require_once("mdl_conexion.php");

	class mdl_Seguridad { 
	
		private $conexion;
		 	 
		public function __construct(){
			$this->conexion = new mdl_Conexion();	   
		}

		public function comprobar_persona($ced){
			$this->conexion->consulta("SELECT cedulaPersona FROM tbl_persona WHERE cedulaPersona = ". $ced);
			$listaDatos = array();
			$listaDatos['valor'] = 0;
			while($fila = $this->conexion->extraer_registro()){
				$listaDatos['valor'] = 1;
			}
			echo json_encode($listaDatos);
		}

		public function insertar_persona($cedula,$nombre,$ap1,$ap2,$tel,$correo,$fechaNacimiento,$direccion,$codigoAcceso){
			$this->conexion->consulta("CALL insertarPersona('".$cedula."','".$nombre."','".$ap1."','".$ap2."','".$tel."','".$correo."','".$fechaNacimiento."','".$direccion."','".$codigoAcceso."','Usuarios')");
		}

		public function actualizar_persona($cedula,$nombre,$ap1,$ap2,$tel,$correo,$fechaNacimiento,$direccion,$codigoAcceso){
			$this->conexion->consulta("CALL modificarPersona('".$cedula."','".$nombre."','".$ap1."','".$ap2."','".$tel."','".$correo."','".$fechaNacimiento."','".$direccion."','".$codigoAcceso."','Usuarios')");
		}

		public function listar_autorizados(){
			$this->conexion->consulta("CALL consultarPersonasUsuarios");
			$datos="";
			$listaDatos = array();

			while ($fila = $this->conexion->extraer_registro()) {
				$datos.= "<tr><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td><td>$fila[5]</td><td>$fila[6]</td><td>$fila[7]</td></tr>";
			}

			$listaDatos['tabla']=$datos;
			echo json_encode($listaDatos);
		}

		public function cargar_cmb_personas(){
			$this->conexion->consulta("CALL cargarCmbPersonasUsuarios");
			$datos="";
			$listaDatos = array();

			while ($fila = $this->conexion->extraer_registro()) {
				$datos .= "<option value='".$fila[0]."'>".$fila[1].' '.$fila[2].' '.$fila[3]."</option>";
			}

			$listaDatos['combo']=$datos;
			echo json_encode($listaDatos);
		}

		public function cargar_datos_autorizado($ced){
			$this->conexion->consulta("CALL personasXcedula('".$ced."')");
			$listaDatos = array();
			while($fila = $this->conexion->extraer_registro()){
				$listaDatos['nombre'] = $fila[0];
				$listaDatos['ap1'] = $fila[1];
				$listaDatos['ap2'] = $fila[2];
				$listaDatos['telefono'] = $fila[3];
				$listaDatos['correo'] = $fila[4];
				$listaDatos['fechaNacimiento'] = $fila[5];
				$listaDatos['direccion'] = $fila[6];
				$listaDatos['codigoAcceso'] = $fila[7];
			}
			echo json_encode($listaDatos);
		}

		public function eliminar_persona($id){
			$this->conexion->consulta("CALL inactivarPersona('".$id."')");
		}
	}

?>