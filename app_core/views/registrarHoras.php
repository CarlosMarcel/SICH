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
                <h5 class="center-align">Registrar Horas Colaboración</h5>
              </div>
              <form class="col s12" name="frm_registroEstudiantes" method="post">
                <div class="row">
                  <div class="input-field col s6">
                    <select id="combo_dias" onchange="cagar_Estudiantes_Dia()">
                      
                    </select>
                  </div>
                  <div class="input-field col s6 center">
                    <label id="fecha_actual"></label>
                  </div>
                </div>


                <div class="row">
                  <b class="center">Registrar Asistencia Taller</b>
                  <table class="centered bordered">
                    <thead>
                      <tr>
                        <th>Asistencia</th>
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>1° Apellido</th>
                        <th>2° Apellido</th>
                      </tr>
                    </thead>
                    <tbody id="tabla_estudiantes">
                      <tr>
                      <td><input type="checkbox" id="myCheckbox" class="filled-in" /><label  for="myCheckbox"></label></td>
                        <td>604280310</td>
                        <td>Carlos</td>
                        <td>Candanedo</td>
                        <td>Quesada</td>
                      </tr>
                    </tbody>
                  </table>
                </div>



                <div class="row"> 
                  <div class="col s6 center">
                    <button class="btn-large col s12 waves-effect waves light blue" name="btn_registrarEstudiante" id="btn_registrarEstudiante" type="submit">Atras<i class="material-icons right">undo</i></button>
                  </div> 
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  <script type="text/javascript">
    var f = new Date();
    n = f.getFullYear() + "-" + (f.getMonth() +1) + "-"+f.getDate();
    document.getElementById('fecha_actual').innerHTML = n;

  </script>