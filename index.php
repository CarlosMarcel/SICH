<?php session_name("MYAPP"); session_start(); 
  //Inicio de la sesión, ubicados antes que cualquier salida HTML

  require_once("global.php"); //ARCHIVO BÁSICO GLOBAL DE CONFIGURACIÓN
  require_once(__MDL_PATH . "mdl_html.php");
  $HTML = new mdl_Html();
?>

<!DOCTYPE HTML>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="title" content="Sistema de Control al Hogar" />
    <meta name="description" content="Sistema de domótica" />
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="Network, HTML5, PHP, MySQL, jquery" />
    <meta name="language" content="es" />
    <link rel="shortcut icon" href="house.ico"/>
    
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <?php
          echo $HTML->html_js_header(__JS_PATH . "jquery-3.2.1.min.js");
          echo $HTML->html_js_header(__JS_PATH . "materialize.min.js");
          echo $HTML->html_js_header(__JS_PATH . "funciones.js");
          echo $HTML->html_css_header(__CSS_PATH . "materialize.css","screen");
          echo $HTML->html_css_header(__CSS_PATH . "style.css","screen");
      ?>
    <title>SICH</title>
  </head>

  <body>

    <div id="main_box">
      <?php
             
       if(isset($_SESSION['MYAPP'])){
           if($_SESSION['MYAPP']!="YES"){
            include_once(__VWS_PATH . "login.php");
           }else{
            include_once(__VWS_PATH . "menuPrincipal.php");
           }
        }else{
            include_once(__VWS_PATH . "login.php");     
        }

      ?>
    </div>
</script>
    
  </body>

</html>
<?php 

  if(isset($_POST['btn_registrarEstudiantes'])){ 
      include_once(__VWS_PATH . "registrarEstudiante.php");
      echo "<script>$('#menu_principal').css('display','none');</script>";
  }

  if(isset($_POST['btn_consultarHoras'])){ 
    include_once(__VWS_PATH . "consultarTutor.php");
    echo "<script>$('#menu_principal').css('display','none');</script>";
  }

  if(isset($_POST['btn_registrarHoras'])){ 
    include_once(__VWS_PATH . "registrarHoras.php");
    echo "<script>$('#menu_principal').css('display','none');</script>";
  }
?>