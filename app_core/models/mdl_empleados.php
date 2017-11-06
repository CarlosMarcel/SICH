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

		public function actualizar_empleado($cedula,$nombre,$ap1,$ap2,$tel,$correo,$fechaNacimiento,$direccion,$codigoAcceso,$puesto,$salario,$fechaIngreso,$horario){
			$this->conexion->consulta("CALL modificarEmpleado('".$cedula."','".$nombre."','".$ap1."','".$ap2."','".$tel."','".$correo."','".$fechaNacimiento."','".$direccion."','".$codigoAcceso."','Empleado','".$puesto."','".$salario."','".$fechaIngreso."','".$horario."')");
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

		public function listar_empleados(){
			$this->conexion->consulta("CALL consultarEmpleado");
			$datos="";
			$listaDatos = array();

			while ($fila = $this->conexion->extraer_registro()) {
				$datos.= "<tr><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td><td>$fila[5]</td><td>$fila[6]</td></tr>";
			}

			$listaDatos['tabla']=$datos;
			echo json_encode($listaDatos);
		}

		public function listar_tareas(){
			$this->conexion->consulta("CALL consultarTareas");
			$datos="";
			$listaDatos = array();

			while ($fila = $this->conexion->extraer_registro()) {
				$datos.= "<tr><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td><td>$fila[5]</td></tr>";
			}

			$listaDatos['tabla']=$datos;
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

		public function cargar_empleados(){
			$this->conexion->consulta("CALL cargarCmbTareas");
			$datos="";
			$listaDatos = array();

			while ($fila = $this->conexion->extraer_registro()) {
				$datos .= "<option value='".$fila[0]."'>".$fila[1].' '.$fila[2].' '.$fila[3]."</option>";
			}

			$listaDatos['combo']=$datos;
			echo json_encode($listaDatos);
		}

		public function asignar_tareas($cedula,$descripcion,$fechaTarea){
			$this->conexion->consulta("CALL insertarTarea('".$cedula."','".$descripcion."','".$fechaTarea."')");
		}

		public function obtener_tareas_hoy($cedula){
			$this->conexion->consulta("CALL consultaTareaXFechayEmpleado('".$cedula."')");
			$datos = "";
			$listaDatos = array();
			$listaDatos['numeroTareas'] = 0;
			while($fila = $this->conexion->extraer_registro()){
				$listaDatos['numeroTareas'] = 1;

				if($fila[3]=="Completa"){
					$datos .= "<tr><td><input type='checkbox' id='$fila[1]' onclick='eventoCheckBoxTarea($fila[1], this)' class='filled-in' checked='checked' /><label  for='$fila[1]'></label></td><td>$fila[2]</td><td>$fila[3]</td></tr>";
				}else{
					$datos .= "<tr><td><input type='checkbox' id='$fila[1]' onclick='eventoCheckBoxTarea($fila[1], this)' class='filled-in' /><label  for='$fila[1]'></label></td><td>$fila[2]</td><td>$fila[3]</td></tr>";
				}
				
			}

			$listaDatos['tabla']=$datos;


			echo json_encode($listaDatos);
		}

		public function actualizar_tarea_C($id){
			$this->conexion->consulta("UPDATE tbl_tareas SET estadoTarea = 'Completa' WHERE tbl_tareas.tareas_id = ". $id);
		}

		public function actualizar_tarea_I($id){
			$this->conexion->consulta("UPDATE tbl_tareas SET estadoTarea = 'Incompleta' WHERE tbl_tareas.tareas_id = ". $id);
		}

	}

?>