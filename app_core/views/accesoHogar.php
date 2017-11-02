<?php
require_once("global.php"); //ARCHIVO BÁSICO GLOBAL DE CONFIGURACIÓN
 require(__CTR_PATH . "ctr_login.php");
    //variable del Controlador
  $ctr_Login = new ctr_Login(); 

  if(isset($_POST['btn_logout'])){ 
      $ctr_Login->btn_logout_hogar_click();
  }
  ?>

  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <?php
  echo "<script src='".__JS_PATH."jquery-3.2.1.min.js' type='text/javascript'></script>"."\n";
  echo "<script src='".__JS_PATH."materialize.min.js' type='text/javascript'></script>"."\n";
 // echo "<script src='".__JS_PATH."funciones.js' type='text/javascript'></script>"."\n";
  echo "<link type='text/css' href='" . __CSS_PATH . "materialize.css' rel='stylesheet' media='screen' />"."\n";
  echo "<link type='text/css' href='" . __CSS_PATH . "style.css' rel='stylesheet' media='screen' />"."\n";
  ?>


  <div id="login">

  <nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo">SICH</a>
    </div>
  </nav>

  <div class="container_login" id="form_login">
    <div class="row">
      <div id="caja">
        <div class="row">
          <h5 class="center">Bienvenido al Hogar</h5> 
            <hr></hr><br>
          <h5 class="center"><?php echo $_SESSION['NOMBRE'] ." ". $_SESSION['APELLIDO1'] ." ". $_SESSION['APELLIDO2'] ?>
            <br><br>
            <?php echo $_SESSION['TIPOROL'];?>
          </h5>
            <form class="col s12" name="frm_login" method="post">            
            <div class="row"> 
              <div class="input-field col s12">
              </div>
              <div class="center">
                <button class="btn  waves-effect waves light blue" name="btn_logout" id="btn_logout" type="submit">Aceptar<i class="material-icons right">check</i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>

  <?php
  //Eventos click de los botones de acciÃ³n
  if(isset($_POST['btn_login'])){
  	$ctr_Login->btn_login_click();
  }
  ?>