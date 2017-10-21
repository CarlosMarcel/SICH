<?php
require_once("../../global.php"); //ARCHIVO BÁSICO GLOBAL DE CONFIGURACIÓN
 //$ctr_Login = new ctr_Login(); //variable del Controlador

  /*if(isset($_POST['btn_logout'])){ 
      $ctr_Login->btn_logout_click();
  }
*/
  ?>
<?php
    echo "<script src='".__JS_PATH."jquery-3.2.1.min.js' type='text/javascript'></script>"."\n";
    echo "<script src='".__JS_PATH."materialize.min.js' type='text/javascript'></script>"."\n";
    echo "<script src='".__JS_PATH."funciones.js' type='text/javascript'></script>"."\n";
    echo "<link type='text/css' href='" . __CSS_PATH . "materialize.css' rel='stylesheet' media='screen' />"."\n";
    echo "<link type='text/css' href='" . __CSS_PATH . "style.css' rel='stylesheet' media='screen' />"."\n";
    ?>
<main>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <nav>
        <div class="nav-wrapper blue">
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <div class="container">
                <div class="col s12 m12 l12">
                    <a href="#!" class="brand-logo"><i class="material-icons left">home</i>SICH</a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="../../" id="btn_consulta" name="btn_consulta"><i class="material-icons left">arrow_back</i>Login</a></li>
                    </ul>
                    <ul class="side-nav" id="mobile-demo">
                        <li><a href="../../" id="btn_consulta" name="btn_consulta"><i class="material-icons left">arrow_back</i>Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
      <div class="row">
        <div class="col s12 m12 l12">
          <div class="container">
            <div class="widget-box z-depth-1" style="    margin-top: 60px;">
                <div class="center" id="logo_una"><img src="app_design/img/pin.png" alt="" id="imagenlogo" ">
                
                </div>
                <b class="center">Digite el codigo de acceso al Hogar</b>
                <div>

                  <div class="row">
                    <form class="col s12" name="frm_login" method="post">
                      <div class="row"> 
                       
                      <div class="input-field col s12">
                        <i class="material-icons prefix">https</i>
                        <input type="password" id="txt_pssw" name="txt_pssw" class="validate" required="">
                        <label for="txt_pssw">Código Acceso</label>
                    </div>
                    <div class="center">
                        <button class="btn-large waves-effect waves light blue" name="btn_login" id="btn_login" type="submit">Entrar<i class="material-icons right">vpn_key</i></button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>  
</div>
</div>
</div>
</div>
</div>
</main>

 <script type="text/javascript">
      $(document).ready(function(){
        $(".button-collapse").sideNav();
      });
      $('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 15 // Creates a dropdown of 15 years to control year
    }); 
  </script>
<?php

?>