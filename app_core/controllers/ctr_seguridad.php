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

    public function listar_autorizados(){
        return $this->postdata->listar_autorizados();
    }
  }

  $ctr_Seguridad = new ctr_Seguridad();
  //keys de los distintos eventos GET.

  if (isset($_GET['comprobar_persona'])) {
    $ctr_Empleados->comprobar_persona($_GET['comprobar_persona']);
  }

  if (isset($_GET['listar_autorizados'])) {
    $ctr_Seguridad->listar_autorizados();
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
  }
?>