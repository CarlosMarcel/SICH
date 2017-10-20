<?php
  require(__CTR_PATH . "ctr_login.php"); //Agregamos la referencia al controlador respectivo
  $ctr_Login = new ctr_Login(); //variable del Controlador


    if(isset($_POST['btn_logout'])){ 
        $ctr_Login->btn_logout_click();
    }

?>
    <main>
      <!--Barra-->
      <nav class="navegacion_menu" id="navegacion_menu">
          <div class="nav-wrapper blue">
            <div class="container">
              <div class="col s12 m12 l12">
                <a href="" class="brand-logo">SISTEMA HORAS COLABORACIÓN</a>
            </div>
        </div>
    </div>
    </nav>

    <!--Contenedor-->
    <div class="container" id="menu_principal">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="widget-box-menu z-depth-1">
                    <div>
                        <h5 class="center-align">Bienvenido <?php echo $_SESSION['USERNAME']."!";?></h5>
                    </div>
                    
                </div>
                <div class="widget-box-menu z-depth-1">
                    <div class="row">
                        <form class="col s12" name="frm_app" method="post">
                            <div class="row">
                                <div class="col s12 center">
                                    <button class="btn-large col s12 waves-effect waves light blue" name="btn_registrarHoras" id="btn_registrarHoras" type="submit">Registrar Horas<i class="material-icons right">access_time</i></button>
                                </div>                            
                            </div>
                            <div class="row">
                                <div class="col s12 center">
                                    <button class="btn-large col s12 waves-effect waves light blue" name="btn_consultarHoras" id="btn_consultarHoras" type="submit">Consultar Horas<i class="material-icons right">date_range</i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 center">
                                    <button class="btn-large col s12 waves-effect waves light blue" name="btn_registrarEstudiantes" id="btn_registrarEstudiantes" type="submit">Registrar Estudiante<i class="material-icons right">account_circle</i></button>
                                </div>
                            </div>
                            <!--Cerrar Session-->
                            <div class="row">
                                <div class="col s12 center">
                                    <button class="btn-large waves-effect waves light blue" name="btn_logout" id="btn_logout" type="submit">Salir<i class="material-icons right">exit_to_app</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>