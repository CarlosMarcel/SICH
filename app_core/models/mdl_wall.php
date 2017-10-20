<?php

   require_once(__MDL_PATH . "mdl_conexion.php");
   require_once(__MDL_PATH . "mdl_message.php"); 

	class mdl_Wall { 
	
		private $conexion;
		 	 
		public function __construct(){
			$this->conexion = new mdl_Conexion();	   
		} 	

	    public function obtener_posts(){ 

			$this->conexion->consulta("SELECT tbl_posts.id, tbl_posts.post, tbl_posts.date,tbl_users.usuario,tbl_posts.user_id FROM tbl_posts INNER JOIN tbl_users ON tbl_posts.user_id = tbl_users.id ORDER BY tbl_posts.id DESC");

			$posts=array(); //matriz
			$num_fila=0;

			while ($fila = $this->conexion->extraer_registro()) {
		          $posts[$num_fila][0] = $fila[0]; //id
		          $posts[$num_fila][1] = $fila[1]; //detalle del post
		          $posts[$num_fila][2] = $fila[2]; //fecha
		          $posts[$num_fila][3] = $fila[3]; //id del usuario
		          $posts[$num_fila][4] = $fila[4]; //nombre del usuario
		          $num_fila++;
			}

			return $posts;
		}

	    public function insertar_post($datospost = array()){ 
	    	
			$this->conexion->consulta("INSERT INTO tbl_posts (post, date, user_id) 
									   VALUES ('" . $datospost[0] . "','" . 
									   		   date('Y-m-d H:i:s') . "'," . $datospost[1] . ")");                
	    }

	    public function obtener_usuarios($uid){ 
	    	//Obtiene todos los nombres de usuario del sistema excepto el mismo
			$this->conexion->consulta("SELECT tbl_users.usuario FROM tbl_users
										WHERE tbl_users.id != " . $uid);

			$users=array(); //matriz
			$num_fila=0;

			while ($fila = $this->conexion->extraer_registro()) {
		          $users[$num_fila][0] = $fila[0]; //nombre del usuario
		          $num_fila++;
			}

			return $users;
		}
	}
?>

