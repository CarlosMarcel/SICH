<?php
require_once("../../global.php"); //ARCHIVO BÁSICO GLOBAL DE CONFIGURACIÓN
 //$ctr_Login = new ctr_Login(); //variable del Controlador

  /*if(isset($_POST['btn_logout'])){ 
      $ctr_Login->btn_logout_click();
  }
*/
  ?>

  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <?php
  echo "<script src='".__JS_PATH."jquery-3.2.1.min.js' type='text/javascript'></script>"."\n";
  echo "<script src='".__JS_PATH."materialize.min.js' type='text/javascript'></script>"."\n";
  echo "<script src='".__JS_PATH."funciones.js' type='text/javascript'></script>"."\n";
  echo "<link type='text/css' href='" . __CSS_PATH . "materialize.css' rel='stylesheet' media='screen' />"."\n";
  echo "<link type='text/css' href='" . __CSS_PATH . "style.css' rel='stylesheet' media='screen' />"."\n";
  ?>


  <main id="login">

  <nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo">SICH</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="app_core/views/accesoHogar.php"><i class="material-icons left" id="btn_login_hogar" name="btn_login_hogar">home</i>LOGIN HOGAR</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="app_core/views/accesoHogar.php"><i class="material-icons left" id="btn_login_hogar" name="btn_login_hogar">home</i>LOGIN HOGAR</a></li>
      </ul>
    </div>
  </nav>

  <div class="container_login" id="form_login">
    <div class="row">
      <div id="caja">
        <div class="row">
          <h5 class="center">Digite el código de acceso</h5>          
          <form class="col s12" name="frm_login" method="post">            
            <div class="row"> 
              <div class="input-field col s12">
                <i class="material-icons prefix">https</i>
                <input type="password" id="txt_pass" name="txt_pass" class="validate" required="">
                <label for="txt_pass">Pin</label>
              </div>
              <div class="center">
                <button class="btn  waves-effect waves light blue" name="btn_login" id="btn_login" type="submit">Entrar<i class="material-icons right">vpn_key</i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</main>

  <?php
  //Eventos click de los botones de acciÃ³n
  if(isset($_POST['btn_login'])){
  	$ctr_Login->btn_login_click();
  }
  ?>