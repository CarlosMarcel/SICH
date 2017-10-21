<?php
require_once("../../global.php"); //ARCHIVO BÁSICO GLOBAL DE CONFIGURACIÓN
 //$ctr_Login = new ctr_Login(); //variable del Controlador

  /*if(isset($_POST['btn_logout'])){ 
      $ctr_Login->btn_logout_click();
  }
*/
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="title" content="Sistema Registro" />
    <meta name="description" content="Sistema Horas Colaboracion" />
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="Network, HTML5, PHP, MySQL, jquery" />
    <meta name="language" content="es" />
    <link rel="shortcut icon" href="favicon.ico"/>
    
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <?php
    echo "<script src='".__JS_PATH."jquery-3.2.1.min.js' type='text/javascript'></script>"."\n";
    echo "<script src='".__JS_PATH."materialize.min.js' type='text/javascript'></script>"."\n";
    echo "<script src='".__JS_PATH."funciones.js' type='text/javascript'></script>"."\n";
    echo "<link type='text/css' href='" . __CSS_PATH . "materialize.css' rel='stylesheet' media='screen' />"."\n";
    echo "<link type='text/css' href='" . __CSS_PATH . "style.css' rel='stylesheet' media='screen' />"."\n";
    ?>
    <title>Sistema Registro</title>
  </head>
  <body>
    <main>
      <nav>
        <div class="nav-wrapper blue">
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <div class="container">
            <div class="col s12 m12 l12">
              <a href="" class="brand-logo">CONSULTA DE HORAS</a>
              <ul class="right hide-on-med-and-down">
                <li><a href="../../"><i class="material-icons left">undo</i>Regresar</a></li>
              </ul>
              <ul class="side-nav" id="mobile-demo">
                <li><a href="../../"><i class="material-icons left">undo</i>Regresar</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>

      <div class="container">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="widget-box z-depth-1">
              <b class="center">Consultar Horas</b>
              <div class="row">
                <form class="col s12">
                  <div class="row"> 

                    <div class="input-field col s6">
                      <i class="material-icons prefix">account_box</i>
                      <input type="text" id="ced" class="validate" required="">
                      <label for="ced">Cédula</label>
                    </div>
                    <div class="center col s6">
                      <button class="btn waves-effect waves light blue" name="btn_buscarHorasEstudiante" id="btn_buscarHoras" type="button" onclick="cargar_horas_Estudiante_cedula(ced.value)">Buscar<i class="material-icons right">search</i></button>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                      <select id="tipoBusqueda" onchange="cargarTalleresEstudiante(ced.value)">
                        <option value="1">Todas</option>
                        <option value="2">Taller</option>
                      </select>
                    </div>
                    <div class="input-field col s6">
                      <select id="talleresEstudiante" onchange="cargar_horas_Estudiante_cedula_x_taller(ced.value)">
                        <option value="0" disabled selected>Talleres</option>
                      </select>
                    </div>
                  </div>
                </form>
              </div>
              
              <b class="center">Datos Estudiante</b>
              <div class="row center">
                <div class="col s3">
                  <span id="cedula">Cédula</span>
                </div>
                <div class="col s3">
                  <span id="nombre">Nombre</span>
                </div>
                <div class="col s3">
                  <span id="ap1">Apellido 1°</span>
                </div>
                <div class="col s3">
                  <span id="ap2">Apellido 2°</span>
                </div>
              </div>
              <hr>
              <br>
      
              <b class="center">Datos Busqueda</b>
        <table class="centered bordered">
                <thead>
                  <tr>
                    <th>Taller</th>
                    <th>Fecha</th>
                    <th>Hora Inicio</th>
                    <th>Hora Fin</th>
                    <th>Horas</th>
                  </tr>
                </thead>
                <tbody id="gridEstudiantes">
                </tbody>
              </table>
        <div class="row">
          <div class="total col s3">
            <span>Horas a Cumplir:</span>
          </div>
          <div class="total col s1">
            <span id="">54</span>
          </div>

          <div class="total col s3">
            <span>Horas Totales:</span>
          </div>
          <div class="total col s1">
            <span id="totalHoras"></span>
          </div>

          <div class="total col s3">
            <span>Horas Faltantes:</span>
          </div>
          <div class="total col s1">
            <span id="faltanteHoras"></span>
          </div>

        </div>

            </div>

          </div>
        </div>
      </div>

    </main>
    <footer class="page-footer grey darken-1">
      <div class="footer-copyright">
        <div class="container">
          © 2016 Designed By Tec-Solutions
        </div>
      </div>
    </footer>

    <script type="text/javascript">
      $(document).ready(function(){
        $(".button-collapse").sideNav();
      });
      $('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 15 // Creates a dropdown of 15 years to control year
    }); 
  </script>

</body>
</html>
<?php

?>