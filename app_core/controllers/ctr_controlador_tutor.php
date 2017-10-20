<?php
  require_once("../models/mdl_modulo_tutor.php");

  class ctr_Tutor {
    private $postdata;

    public function __construct(){
      $this->postdata = new mdl_Wall();
    }

    public function buscar_por_cedula($cedulaTutor,$cedula){
      return $this->postdata->obtener_horas($cedulaTutor,$cedula);
    }

    public function buscar_por_cedula_Estudiante($cedula){
      return $this->postdata->obtener_mis_horas($cedula);
    }

    public function registrar_estudiante($cedula,$nombre,$ap1,$ap2){
      return $this->postdata->insertar_estudiante($cedula,$nombre,$ap1,$ap2);
    }   

    public function cargar_combo_taller($cedula){
      return $this->postdata->obtener_dias_taller($cedula);
    }

    public function Comprobar_Estudiante($cedula){
      return $this->postdata->buscar_Estudiante($cedula);
    }

    public function cargar_est($tallerId){
      return $this->postdata->obtener_estudiantes_por_dia($tallerId);
    }

    public function registrar_horasEstudiante($cedulaEstudiante,$cedulaTutor,$FechaRegistro){
      return $this->postdata->registrar_horas($cedulaEstudiante,$cedulaTutor,$FechaRegistro);
    }

    public function inactivar_horasEstudiante($cedulaEstudiante,$cedulaTutor,$FechaRegistro){
      return $this->postdata->inactivar_horas($cedulaEstudiante,$cedulaTutor,$FechaRegistro);
    }

    public function cargar_combo_talleres_Estudiante($cedula){
      return $this->postdata->obtener_talleres_Estudiante($cedula);
    }

    public function crear_enlace($cedulaEstudiante,$cedulaTutor){
      return $this->postdata->registrar_enlace($cedulaEstudiante,$cedulaTutor);
    }
  }

  $ctr_Tutor = new ctr_Tutor();

  if(isset($_GET['cedulaEstudiante']) && isset($_GET['tutor'])){
    $ctr_Tutor->buscar_por_cedula($_GET['tutor'],$_GET['cedulaEstudiante']);
  }

  if(isset($_GET['cedulaTutor'])){
    $ctr_Tutor->cargar_combo_taller($_GET['cedulaTutor']);
  }
  
  if(isset($_GET['tallerId'])){
    $ctr_Tutor->cargar_est($_GET['tallerId']);
  }

  if(isset($_GET['cedEstudiante'])){
    $ctr_Tutor->buscar_por_cedula_Estudiante($_GET['cedEstudiante']);
  }

  //Cargar Talleres de Estudiante
  if(isset($_GET['cargarTalleresE'])){
    $ctr_Tutor->cargar_combo_talleres_Estudiante($_GET['cargarTalleresE']);
  }

  if(isset($_GET['cedEstudianteFiltro']) && isset($_GET['tutorID'])){
    $ctr_Tutor->buscar_por_cedula($_GET['tutorID'],$_GET['cedEstudianteFiltro']);
  }

  if(isset($_GET['verificarEst'])){
    $ctr_Tutor->Comprobar_Estudiante($_GET['verificarEst']);
  }


  if(isset($_POST['key'])){

    if($_POST['key']=='registrarEstudiante'){
      $cedula = $_POST['cedulaE'];
      $nombre = $_POST['nombreE'];
      $ap1 = $_POST['ap1E'];
      $ap2 = $_POST['ap2E'];
      $ctr_Tutor->registrar_estudiante($cedula,$nombre,$ap1,$ap2);
    }

    if ($_POST['key']=='registrarAsistencia') {
    	$cedulaEstudiante = $_POST['cedulaE'];
    	$cedulaTutor = $_POST['cedulaTutor'];
    	$FechaRegistro = $_POST['fechaRegistro'];
    	$ctr_Tutor->registrar_horasEstudiante($cedulaEstudiante,$cedulaTutor,$FechaRegistro);
    }

    if ($_POST['key']=='inactivarAsistencia') {
    	$cedulaEstudiante = $_POST['cedulaE'];
    	$cedulaTutor = $_POST['cedulaTutor'];
    	$FechaRegistro = $_POST['fechaRegistro'];
    	$ctr_Tutor->inactivar_horasEstudiante($cedulaEstudiante,$cedulaTutor,$FechaRegistro);
    }
    if ($_POST['key']=='crearEnlace') {
      $cedulaEstudiante = $_POST['cedulaE'];
      $cedulaTutor = $_POST['cedulaTutor'];
      $ctr_Tutor->crear_enlace($cedulaEstudiante,$cedulaTutor);
    }
  }
?>