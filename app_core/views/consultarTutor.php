<?php 

 ?>

      <div class="container">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="widget-box z-depth-1">
              <span id="tutor_cedula"><?php echo $_SESSION['USERCEDULA'];?></span>
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
                      <button class="btn waves-effect waves light blue" name="btn_buscar" id="btn_buscar" type="button" onclick="cargar_horas_cedula(ced.value)">Buscar<i class="material-icons right">search</i></button>
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
                <tbody id="grid">
                </tbody>
              </table>
              <div class="row">
                <div class="total col s3">
                  <span>Horas Totales:</span>
                </div>
                <div class="total col s1">
                  <span id="totalHoras">0</span>
                </div>
              </div>
              <div class="row">
                <form method="post">
                  <div class="center col s12">
                      <button class="btn waves-effect waves light blue" name="btn_buscar" id="btn_buscar" type="submit">Atras<i class="material-icons right">undo</i></button>
                    </div>
                </form>
              </div>
            
            
            </div>

          </div>
        </div>
      </div>