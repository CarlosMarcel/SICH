<?php
//Llamado de su respectivo controlador.
require(__CTR_PATH . "ctr_login.php");
$ctr_Login=new ctr_Login();
?>

<main>

    <nav>
        <div class="nav-wrapper blue">
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <div class="container">
                <div class="col s12 m12 l12">
                    <a href="#!" class="brand-logo"><i class="material-icons left">home</i>SICH</a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="app_core/views/consultarHorasEstudiante.php" id="btn_consulta" name="btn_consulta"><i class="material-icons left">date_range</i>Ver mis horas</a></li>
                    </ul>
                    <ul class="side-nav" id="mobile-demo">
                        <li><a href="app_core/views/consultarHorasEstudiante.php" id="btn_consulta" name="btn_consulta"><i class="material-icons left">date_range</i>Ver mis horas</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
      <div class="row">
        <div class="col s12 m12 l12">
          <div class="container">
            <div class="widget-box z-depth-1">
                <div class="center" id="logo_una"><img src="app_design/img/loginCasa.png" alt="" id="imagenlogo" width="20%" height="20%">
                
                </div>
                <b class="center">Iniciar Sesion</b>
                <div>

                  <div class="row">
                    <form class="col s12" name="frm_login" method="post">
                      <div class="row"> 
                        <div class="input-field col s12">
                          <i class="material-icons prefix">account_circle</i>
                          <input type="text" id="txt_user" name="txt_user" class="validate" required="">
                          <label for="txt_user">Usuario</label>
                      </div>
                      <div class="input-field col s12">
                        <i class="material-icons prefix">https</i>
                        <input type="password" id="txt_pssw" name="txt_pssw" class="validate" required="">
                        <label for="txt_pssw">Contraseña</label>
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