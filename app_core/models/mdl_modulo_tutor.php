<?php

   require_once("mdl_conexion.php");

	class mdl_Wall { 
	
		private $conexion;
		 	 
		public function __construct(){
			$this->conexion = new mdl_Conexion();	   
		}

		public function obtener_horas($cedulaTutor,$cedula){
			$this->conexion->consulta("CALL `registroXCedulaXTaller`('".$cedulaTutor."','".$cedula."')");
			$datos = "";
			$totalHoras = 0;
			$listaDatos=array(); //matriz

			while($fila = $this->conexion->extraer_registro()){
				$datos.= "<tr><td>$fila[5]</td><td>$fila[4]</td><td>$fila[7]</td><td>$fila[8]</td><td>$fila[6]</td></tr>";
				$listaDatos['cedula'] = $fila[0]; //id
				$listaDatos['nombre'] = $fila[1]; //id
				$listaDatos['ap1'] = $fila[2]; //id
				$listaDatos['ap2'] = $fila[3]; //id
				$totalHoras += (int) $fila[6]; 

			}

			if($totalHoras<54){
				$listaDatos['faltantes'] = 54 - $totalHoras;
			}else{
				$listaDatos['faltantes'] = 0;
			}
			
			$listaDatos['tabla'] = $datos;
			$listaDatos['total'] = $totalHoras;
			echo json_encode($listaDatos);
		}

		public function obtener_mis_horas($cedula){
			$this->conexion->consulta("CALL `registroXCedula`('".$cedula."')");
			$datos = "";
			$totalHoras = 0;
			$listaDatos=array(); //matriz

			while($fila = $this->conexion->extraer_registro()){
				$datos.= "<tr><td>$fila[5]</td><td>$fila[4]</td><td>$fila[7]</td><td>$fila[8]</td><td>$fila[6]</td></tr>";
				$listaDatos['cedula'] = $fila[0]; //id
				$listaDatos['nombre'] = $fila[1]; //id
				$listaDatos['ap1'] = $fila[2]; //id
				$listaDatos['ap2'] = $fila[3]; //id
				$totalHoras += (int) $fila[6]; 

			}

			if($totalHoras<54){
				$listaDatos['faltantes'] = 54 - $totalHoras;
			}else{
				$listaDatos['faltantes'] = 0;
			}


			$listaDatos['tabla'] = $datos;
			$listaDatos['total'] = $totalHoras;
			 
			echo json_encode($listaDatos);
		}


		

		public function insertar_estudiante($cedula,$nombre,$ap1,$ap2){
			$this->conexion->consulta("CALL insertarEstudiante('".$cedula."','".$nombre."','".$ap1."','".$ap2."')");
		}

		public function obtener_dias_taller($cedula){
			$this->conexion->consulta("CALL `talleresXTutor`('".$cedula."')");
			$listaDatos = array();
			$datos = "";
			while($fila = $this->conexion->extraer_registro()){
				$datos .= "<option value='".$fila[0]."'>".$fila[1]."</option>";
			}
			$listaDatos['combo'] = $datos;
			//"<option value=2>Jueves"
			echo json_encode($listaDatos);
		}

		public function obtener_talleres_Estudiante($cedula){
			$this->conexion->consulta("CALL `talleresXEstudiante`('".$cedula."')");
			$listaDatos = array();
			$datos = "";
			while($fila = $this->conexion->extraer_registro()){
				$datos .= "<option value='".$fila[0]."'>".$fila[1]."</option>";
			}
			$listaDatos['combo'] = $datos;
			//"<option value=2>Jueves"
			echo json_encode($listaDatos);
		}
		
		public function obtener_estudiantes_por_dia($tallerId){
			$this->conexion->consulta("CALL `enlacesXTaller`('".$tallerId."')");
			$datos = "";
			while($fila = $this->conexion->extraer_registro()){
				$datos .= "<tr><td><input type='checkbox' id='$fila[0]' onclick='eventoCheckBox($fila[0], this)' class='filled-in' /><label  for='$fila[0]'></label></td><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td></tr>";
			}
			echo $datos;
		}

		public function registrar_horas($cedulaEstudiante,$cedulaTutor,$FechaRegistro){
			$this->conexion->consulta("CALL `insertarRegistro`('".$cedulaEstudiante."', '".$cedulaTutor."', '".$FechaRegistro."')");
			$datos = true;
			echo $datos;
		}

		public function inactivar_horas($cedulaEstudiante,$cedulaTutor,$FechaRegistro){
			$this->conexion->consulta("CALL `inactivaRegistro`('".$cedulaEstudiante."', '".$cedulaTutor."', '".$FechaRegistro."')");
			$datos = true;
			echo $datos;
		}

		public function registrar_enlace($cedulaEstudiante,$cedulaTutor){
			$this->conexion->consulta("CALL `insertarEnlace`('".$cedulaEstudiante."', '".$cedulaTutor."')");
			$datos = true;
			echo $datos;
		}

		public function buscar_Estudiante($cedulaEstudiante){
			$this->conexion->consulta("SELECT estudianteCedula FROM tblEstudiantes WHERE estudianteCedula = ". $cedulaEstudiante);
			$listaDatos = array();
			$listaDatos['valor'] = 0;
			while($fila = $this->conexion->extraer_registro()){
				$listaDatos['valor'] = 1;
			}
			echo json_encode($listaDatos);
		}
	}?>