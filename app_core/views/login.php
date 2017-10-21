<?php
//Llamado de su respectivo controlador.
require(__CTR_PATH . "ctr_login.php");
$ctr_Login=new ctr_Login();
?>

<main id="login">

  <nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo">SICH</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#!"><i class="material-icons left" id="btn_login_hogar" name="btn_login_hogar">home</i>LOGIN HOGAR</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="#!"><i class="material-icons left" id="btn_login_hogar" name="btn_login_hogar">home</i>LOGIN HOGAR</a></li>
      </ul>
    </div>
  </nav>

  <div class="container_login" id="form_login">
    <div class="row">
      <div id="caja">
        <div class="row">
          <h5 class="center">INICIAR SESSION</h5>          
          <form class="col s12" name="frm_login" method="post">            
            <div class="row"> 
              <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" id="txt_cedula" name="txt_cedula" class="validate" required="">
                <label for="txt_cedula">Cédula</label>
              </div>
              <div class="input-field col s12">
                <i class="material-icons prefix">https</i>
                <input type="password" id="txt_pass" name="txt_pass" class="validate" required="">
                <label for="txt_pass">Contraseña</label>
              </div>
              <div class="center">
                <button class="btn-large waves-effect waves light blue" name="btn_login" id="btn_login" type="submit">Login<i class="material-icons right">lock_open</i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</main>

<script type="text/javascript">
  $(document).ready(function(){
    $(".button-collapse").sideNav();
  });
</script>

<?php
  //Eventos click de los botones de acciÃ³n
if(isset($_POST['btn_login'])){
  $ctr_Login->btn_login_click();
}
?>