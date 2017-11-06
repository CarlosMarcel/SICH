<?php

   require_once("mdl_conexion.php");

	class mdl_Alimentos { 
	
		private $conexion;
		 	 
		public function __construct(){
			$this->conexion = new mdl_Conexion();	   
		}

		public function insertar_alimento($nombre,$puntoReorden,$cantidad,$cantidadPedido,$tipoMedida){
			$this->conexion->consulta("CALL insertarAlimento('".$nombre."','".$puntoReorden."','".$cantidad."','".$cantidadPedido."','".$tipoMedida."')");
		}

		public function actualizar_alimento($id,$nombre,$puntoReorden,$cantidad,$cantidadPedido,$tipoMedida){
			$this->conexion->consulta("CALL modificarAlimento('".$id."','".$nombre."','".$puntoReorden."','".$cantidad."','".$cantidadPedido."','".$tipoMedida."')");
		}

		public function cargar_datos_alimentos($id){
			$this->conexion->consulta("CALL consultarAlimentoXid('".$id."')");
			$listaDatos = array();
			while($fila = $this->conexion->extraer_registro()){
				$listaDatos['nombre'] = $fila[0];
				$listaDatos['puntoReorden'] = $fila[1];
				$listaDatos['cantidad'] = $fila[2];
				$listaDatos['cantidadPedido'] = $fila[3];
				$listaDatos['tipoMedida'] = $fila[4];
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
				$datos .= "<option value='".$fila[0]."'>".$fila[1]."</option>";
			}

			$listaDatos['combo']=$datos;
			echo json_encode($listaDatos);
		}

		public function eliminar_alimento($id){
			$this->conexion->consulta("CALL inactivarAlimento('".$id."')");
		}
	}

?>