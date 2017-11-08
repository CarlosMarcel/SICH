<?php
  require_once("../models/mdl_seguridad.php");

  class ctr_Seguridad {
    private $postdata;

    public function __construct(){
      $this->postdata = new mdl_Seguridad();
    }

    public function comprobar_persona($ced){
      return $this->postdata->comprobar_persona($ced);
    }

    public function registrar_persona($cedula,$nombre,$ap1,$ap2,$tel,$correo,$fechaNacimiento,$direccion,$codigoAcceso){
      return $this->postdata->insertar_persona($cedula,$nombre,$ap1,$ap2,$tel,$correo,$fechaNacimiento,$direccion,$codigoAcceso);
    }

     public function actualizar_persona($cedula,$nombre,$ap1,$ap2,$tel,$correo,$fechaNacimiento,$direccion,$codigoAcceso){
      return $this->postdata->actualizar_persona($cedula,$nombre,$ap1,$ap2,$tel,$correo,$fechaNacimiento,$direccion,$codigoAcceso);
    }

    public function listar_autorizados(){
        return $this->postdata->listar_autorizados();
    }

    public function listar_bitacora(){
        return $this->postdata->listar_bitacora();
    }

    public function listar_llamadas(){
        return $this->postdata->listar_llamadas();
    }
    
    public function cargar_cmb_personas(){
        return $this->postdata->cargar_cmb_personas();
    }

    public function cargar_datos_autorizado($ced){
        return $this->postdata->cargar_datos_autorizado($ced);
    }

     public function eliminar_persona($id){
        return $this->postdata->eliminar_persona($id);
    }

    public function comprobar_usuario($ced,$pin){
        return $this->postdata->comprobar_usuario($ced,$pin);
    }

    public function registrar_bitacora($cedula){
        return $this->postdata->registrar_bitacora($cedula);
    }

    public function registrar_llamadas(){
        return $this->postdata->registrar_llamadas();
    }
  }

  $ctr_Seguridad = new ctr_Seguridad();
  //keys de los distintos eventos GET.

  if (isset($_GET['comprobar_persona'])) {
    $ctr_Seguridad->comprobar_persona($_GET['comprobar_persona']);
  }

  if (isset($_GET['listar_autorizados'])) {
    $ctr_Seguridad->listar_autorizados();
  }

  if (isset($_GET['listar_bitacora'])) {
    $ctr_Seguridad->listar_bitacora();
  }

  if (isset($_GET['listar_llamadas'])) {
    $ctr_Seguridad->listar_llamadas();
  }

  if (isset($_GET['cargarCmbPersonas'])) {
    $ctr_Seguridad->cargar_cmb_personas();
  }

  if (isset($_GET['cargarDatosAutorizado'])) {
    $ctr_Seguridad->cargar_datos_autorizado($_GET['cargarDatosAutorizado']);
  }

  if (isset($_GET['comprobar_usuario']) AND isset($_GET['PIN'])) {
    $ctr_Seguridad->comprobar_usuario($_GET['comprobar_usuario'],$_GET['PIN']);
  }

  //Keys de los distintos eventos POST.
  if(isset($_POST['key'])){

    if($_POST['key']=='registrar_persona'){
      $cedula = $_POST['ced'];
      $nombre = $_POST['nombre'];
      $ap1 = $_POST['ap1'];
      $ap2 = $_POST['ap2'];
      $tel = $_POST['tel'];
      $correo = $_POST['correo'];
      $fechaNacimiento = $_POST['fechaNacimiento'];
      $direccion = $_POST['direccion'];
      $codigoAcceso = $_POST['codigoAcceso'];
      $ctr_Seguridad->registrar_persona($cedula,$nombre,$ap1,$ap2,$tel,$correo,$fechaNacimiento,$direccion,$codigoAcceso);
    }

    if($_POST['key']=='actualizar_persona'){
      $cedula = $_POST['ced'];
      $nombre = $_POST['nombre'];
      $ap1 = $_POST['ap1'];
      $ap2 = $_POST['ap2'];
      $tel = $_POST['tel'];
      $correo = $_POST['correo'];
      $fechaNacimiento = $_POST['fechaNacimiento'];
      $direccion = $_POST['direccion'];
      $codigoAcceso = $_POST['codigoAcceso'];
      $ctr_Seguridad->actualizar_persona($cedula,$nombre,$ap1,$ap2,$tel,$correo,$fechaNacimiento,$direccion,$codigoAcceso);
    }

    if($_POST['key']=='eliminar_persona'){
      $id = $_POST['id'];
      $ctr_Seguridad->eliminar_persona($id);
    }

     if($_POST['key']=='registrar_bitacora'){
      $cedula = $_POST['ced'];
      $ctr_Seguridad->registrar_bitacora($cedula);
    }

     if($_POST['key']=='registrar_llamadas'){
      $ctr_Seguridad->registrar_llamadas();
    }
  }
?>