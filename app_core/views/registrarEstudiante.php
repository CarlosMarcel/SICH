<?php
  //require_once(__MDL_PATH . "mdl_html.php");
  //require(__CTR_PATH . "ctr_login.php"); //Agregamos la referencia al controlador respectivo

 // $HTML = new mdl_Html();
  //$ctr_Login = new ctr_Login(); //variable del Controlador

  /*if(isset($_POST['btn_logout'])){ 
    $ctr_Login->btn_logout_click();
  }*/
?>
    <!--Contenedor-->
    <div class="container">
      <div class="row" id="menu_principal">
        <div class="col s12 m12 l12">
          <div class="widget-box-menu z-depth-1">
            <div class="row">
            <div>
              <span id="user_cedula"><?php echo $_SESSION['USERCEDULA'];?></span>
              <h5 class="center-align">Datos del Estudiante</h5>
            </div>
              <form class="col s12" name="frm_registroEstudiantes" method="post">
                <div class="row">
                  <div class="input-field col s12 m6 l3">
                    <input class="input" id="CedulaEstudiante" type="text" class="validate">
                    <label for="CedulaEstudiante">Cédula</label>
                  </div>
                  <div class="input-field col s12 m6 l3" id="txt_NombreEst">
                    <input class="input" id="NombreEstudiante" type="text" class="validate">
                    <label for="NombreEstudiante">Nombre</label>
                  </div>
                  <div class="input-field col s12 m6 l3" id="txt_Ap1Est">
                    <input class="input txts" id="Apellido1Estudiante" type="text" class="validate">
                    <label for="Apellido1Estudiante">Primer Apellido</label>
                  </div>
                  <div class="input-field col s12 m6 l3" id="txt_Ap2Est">
                    <input class="input" id="Apellido2Estudiante" type="text" class="validate">
                    <label for="Apellido2Estudiante">Segundo Apellido</label>
                  </div>
                </div>
                <div class="row">
                <div class="input-field col s12 m6 l2 center">
                    <span>Dias de taller</span>
                  </div>
                  <div class="input-field col s12 m6 l3">
                    <select id="combo_dias" onchange="">
                      
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col s6 center">
                    <button class="btn-large col s12 waves-effect waves light blue" name="btn_registrarEstudiante" id="btn_registrarEstudiante" type="button" onclick="comprobarEstudiante();">Registrar<i class="material-icons right">send</i></button>
                  </div>  
                  <div class="col s6 center">
                    <button class="btn-large col s12 waves-effect waves light blue" name="btn_registrarAtras" id="btn_registrarAtras" type="submit">Atras<i class="material-icons right">undo</i></button>
                  </div> 
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php 

 ?>