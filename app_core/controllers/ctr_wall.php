<?php

   /* Archivo controlador que contiene los llamados a las 
   acciones de la vista (ADD,SEARCH) */
   
   require_once(__MDL_PATH . "mdl_wall.php"); 
   require_once(__MDL_PATH . "mdl_message.php");
   require_once(__MDL_PATH . "mdl_mail.php");
     
   class ctr_Wall {
   	
   	private $postdata;
   	var $MSSG;
    var $mail;
      
       public function __construct() //CONSTRUCTOR
	   {
         $this->postdata=new mdl_Wall();
         $this->MSSG = new mdl_Message();
         $this->mail = new mdl_Mail();
	   }
	   
	   public function get_posts()
	   {
			return $this->postdata->obtener_posts();
	   }    
	    
     	//Si se presiona el botón Publicar 
	   function btn_save_click() 
	   {    
          $postinfo=array();
          //Sustituimos espacios y comillas simples por dobles para evitar SQL INJECTION
          $postinfo[0]= trim(str_replace("'", "\"", $_POST['message']));
          $postinfo[1]= $_POST['user_id'];
          $postinfo[2]= $_POST['user_name'];

          $this->postdata->insertar_post($postinfo);

          //************************************************
          //Enviamos un e-mail a todos los usuarios
          $users=array();
          $users=$this->postdata->obtener_usuarios($postinfo[1]);

          foreach ($users as $value){
            /*Envio de email dirigido a los usuarios del sistema
            Para alertarle de un nuevo mensaje del usuario actual*/
            $this->mail->create_Mail($value[0],'noreply@unknownhost.net',
                      'Nuevo Mensaje desde MY_NETWORK', 'Hola soy: ' 
                      . $postinfo[2] . "<br><br>" .  $postinfo[0]);
            $this->mail->send_Mail();
          }
          //************************************************

          $this->MSSG->show_message("","success","success_insert");

    }

  }
?>

