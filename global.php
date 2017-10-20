<?php
/*
--------------------------------------------
ARCHIVO DE CONFIGURACIÓN GLOBAL.
--------------------------------------------
*/
// ------ Variables que definen el nombre actual del hosting -------
  $myhost="http://localhost:8080";
  $myproject="SICH";
  $mysite=$myhost . "/" . $myproject;

  date_default_timezone_set('America/Costa_Rica');

   // ------ Variables estáticas que definen las rutas absolutas del proyecto -------
  define('__ROOT__', $_SERVER["DOCUMENT_ROOT"]);
  define('__SITE_PATH', $mysite);

  define('__MDL_PATH', __ROOT__ . "/" . $myproject . "/app_core/models/");
  define('__CTR_PATH', __ROOT__ . "/" . $myproject . "/app_core/controllers/");
  define('__VWS_PATH', __ROOT__ . "/" . $myproject . "/app_core/views/");
  define('__VWS_HOST_PATH', $mysite . "/app_core/views/");
  define('__CTR_HOST_PATH', $mysite . "/app_core/controllers/");

  define('__RSC_PATH', __ROOT__ . "/app_core/resources/");
  define('__RSC_HOST_PATH', $mysite . "/app_core/resources/");
  define('__RSC_PHO_HOST_PATH', $mysite . "/app_core/resources/photos/");
  define('__RSC_FLE_HOST_PATH', $mysite . "/app_core/resources/files/");
  define('__RSC_TBN_HOST_PATH', $mysite . "/app_core/resources/thumbnails/");
  define('__RSC_IMG_HOST_PATH', $mysite . "/app_core/resources/images/");

  define('__JS_PATH', $mysite . "/app_design/js/");
  define('__CSS_PATH', $mysite . "/app_design/css/");
  define('__IMG_PATH', $mysite . "/app_design/img/");


// ************************* GLOBAL FUNCTIONS *********************** //

  set_error_handler("my_error_handler", E_ALL);

 // require_once(__MDL_PATH . "mdl_message.php");

  /*my_error_handler: Maneja globalmente los warnings y excepciones de PHP y los muestra en
  un message box personalizado.*/

  function my_error_handler($errno, $errstr, $errfile, $errline, $errcontext)
  {
	   try{
      	$MSSG = new mdl_Message();
			  throw new Exception($errstr);
	   }catch(Exception $e){
		   	$MSSG->show_message("Error: " . $errstr . " <br> File: " . $errfile . "  <br> Line: " . $errline, "error", "");
	   }
  }
  
?>