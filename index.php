<?php session_name("SICH"); session_start(); 
  //Inicio de la sesión, ubicados antes que cualquier salida HTML

  require_once("global.php"); //ARCHIVO BÁSICO GLOBAL DE CONFIGURACIÓN
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
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <?php
          echo "<script src='".__JS_PATH."jquery-3.2.1.min.js' type='text/javascript'></script>"."\n";
          echo "<script src='".__JS_PATH."materialize.min.js' type='text/javascript'></script>"."\n";
          echo "<script src='".__JS_PATH."funciones.js' type='text/javascript'></script>"."\n";
          echo "<link type='text/css' href='" . __CSS_PATH . "materialize.css' rel='stylesheet' />"."\n";
          echo "<link type='text/css' href='" . __CSS_PATH . "style.css' rel='stylesheet' />"."\n";
      ?>
    <title>SICH</title>
  </head>

  <body>

    <div id="main_box">
      <?php
             
       if(isset($_SESSION['SICH'])){
           if($_SESSION['SICH']!="YES"){
            include_once(__VWS_PATH . "login.php");
           }else{
            include_once(__VWS_PATH . "home.php");
           }
        }else{
            include_once(__VWS_PATH . "login.php");     
        }

      ?>
    </div>
    
  </body>

</html>
<?php 

  /*
  Funcionalidad de cada uno de los enlaces o llamados a nuestras vistas.
  Primero crear los input submit y despues cada uno de estos if para los
  botones y llamar la vista respectiva y ocultando el main tag con el id vistas.
  Sin embargo aqui solo se oculta vistas, para llamarlas se debe hacer el include 
  dentro del div home en la vista principal o vista home.
  */

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


  if(isset($_POST['link_registarEmpleado'])){ 
        //include_once(__VWS_PATH . "registrarHoras.php");
        echo "<script type='text/javascript'>$('#vistas').css('display','none');</script>";
  }

  if(isset($_POST['link_consultarEmpleado'])){ 
    echo "<script type='text/javascript'>$('#vistas').css('display','none');</script>";
  }

  if(isset($_POST['link_mantenimientoEmpleado'])){ 
    echo "<script type='text/javascript'>$('#vistas').css('display','none');</script>";
  }

  if(isset($_POST['link_asignarTareasEmpleado'])){ 
    echo "<script type='text/javascript'>$('#vistas').css('display','none');</script>";
  }

  if(isset($_POST['link_actualizarTareasEmpleado'])){ 
    echo "<script type='text/javascript'>$('#vistas').css('display','none');</script>";
  }

  if(isset($_POST['link_luces'])){ 
    echo "<script type='text/javascript'>$('#vistas').css('display','none');</script>";
  }

  if(isset($_POST['link_registrarAlimentos'])){ 
    echo "<script type='text/javascript'>$('#vistas').css('display','none');</script>";
  }

   if(isset($_POST['link_consultarAlimentos'])){ 
    echo "<script type='text/javascript'>$('#vistas').css('display','none');</script>";
  }

  if(isset($_POST['link_mantenimientoAlimentos'])){ 
    echo "<script type='text/javascript'>$('#vistas').css('display','none');</script>";
  }

  if(isset($_POST['link_consultar_tareas'])){ 
    echo "<script type='text/javascript'>$('#vistas').css('display','none');</script>";
  }

  if(isset($_POST['btn_aja2'])){ 
        //include_once(__VWS_PATH . "registrarHoras.php");
        echo "<script type='text/javascript'>$('#vistas').css('display','none');</script>";
  }
  
?>