<?php
    require_once(__MDL_PATH . "mdl_html.php");
    
    class mdl_Message {

        function __construct(){
        }

        public function show_message($text,$type,$reason){

            $ident = rand(1,1000); //identificador unico para cada MSSGBOX
            $message="<div class='msg_box ". $type ."' id='msg_" . $ident . "' ><span>" . mdl_Message::messages($reason,$text) . "</span></div>";

            //Message Box Animation with JQUERY
            /*<div id='msg_box_container'></div> es el contenedor principal de los mensajes.
            Este elemento es añadido a las páginas que necesita mostrar mensajes al usuario*/  
            //agregamos el MSSBOX al contenedor 

        	  echo "<script>
                    $('#msg_box_container').append(" . json_encode($message) . "); 
        	          $('#msg_".$ident."').fadeOut(0).fadeIn(500).fadeOut(7000);
        	        </script>";
        }

        public function messages($reason,$text){
        	  $message="";
        	  
           switch($reason){
           	 case "success_insert":
           	   $message="La información ha sido ingresada correctamente";
           	 break;
           	 case "success_update":
           	   $message="La información ha sido actualizada correctamente";
           	 break;
           	 case "success_delete":
           	   $message="La información ha sido eliminada correctamente";
           	 break;
           	 case "fail_auth":
           	   $message="El Usuario o Password suministrados son incorrectos";
           	 break;
           	 case "expired_session":
           	   $message="Su sesión ha expirado, por favor vuelva a ingresar sus datos de autentificación.";
           	 break;
           	 case "":
           	   $message=$text;
           	 break;
           } 
           return $message;       
        }

    }

?>