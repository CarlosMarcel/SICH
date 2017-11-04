<?php
  require_once("../models/mdl_empleados.php");

  class ctr_Empleados {
    private $postdata;

    public function __construct(){
      $this->postdata = new mdl_Empleados();
    }

    public function registrar_empleado($cedula,$nombre,$ap1,$ap2,$tel,$correo,$fechaNacimiento,$direccion,$codigoAcceso,$puesto,$salario,$fechaIngreso,$horario){
      return $this->postdata->insertar_empleado($cedula,$nombre,$ap1,$ap2,$tel,$correo,$fechaNacimiento,$direccion,$codigoAcceso,$puesto,$salario,$fechaIngreso,$horario);
    }
    public function comprobar_empleado($ced){
      return $this->postdata->comprobar_Empleado($ced);
    }

    public function listar_empleados(){
        return $this->postdata->listar_empleados();
    }

    public function actualizar_empleado($cedula,$nombre,$ap1,$ap2,$tel,$correo,$fechaNacimiento,$direccion,$codigoAcceso,$puesto,$salario,$fechaIngreso,$horario){
        return $this->postdata->actualizar_empleado($cedula,$nombre,$ap1,$ap2,$tel,$correo,$fechaNacimiento,$direccion,$codigoAcceso,$puesto,$salario,$fechaIngreso,$horario);
    }

    public function buscar_empleado($ced){
        return $this->postdata->buscar_empleado($ced);
    }

    public function desactivar_empleado($ced){
        return $this->postdata->desactivar_empleado($ced);
    }

    public function cargar_empleados(){
        return $this->postdata->cargar_empleados();
    }

    public function asignar_tareas($cedula,$descripcion,$fechaTarea){
      return $this->postdata->asignar_tareas($cedula,$descripcion,$fechaTarea);
    }
  }

  $ctr_Empleados = new ctr_Empleados();
  //keys de los distintos eventos GET.
    if (isset($_GET['comprobar_empleado'])) {
      $ctr_Empleados->comprobar_empleado($_GET['comprobar_empleado']);
    }

    if (isset($_GET['listar_empleados'])) {
      $ctr_Empleados->listar_empleados();
    }

    if (isset($_GET['cargar_empleado'])) {
      $ctr_Empleados->buscar_empleado($_GET['cargar_empleado']);
    }

    if (isset($_GET['cargarcmbEmpleados'])) {
      $ctr_Empleados->cargar_empleados();
    }

  //Keys de los distintos eventos POST.
  if(isset($_POST['key'])){

    if($_POST['key']=='registrar_empleado'){
      $cedula = $_POST['empleado_ced'];
      $nombre = $_POST['empleado_nombre'];
      $ap1 = $_POST['empleado_ap1'];
      $ap2 = $_POST['empleado_ap2'];
      $tel = $_POST['empleado_tel'];
      $correo = $_POST['empleado_correo'];
      $fechaNacimiento = $_POST['empleado_fechaNacimiento'];
      $direccion = $_POST['empleado_direccion'];
      $codigoAcceso = $_POST['empleado_codigoAcceso'];
      $puesto = $_POST['empleado_puesto'];
      $salario = $_POST['empleado_salario'];
      $fechaIngreso = $_POST['empleado_fechaIngreso'];
      $horario = $_POST['empleado_horario'];
      $ctr_Empleados->registrar_empleado($cedula,$nombre,$ap1,$ap2,$tel,$correo,$fechaNacimiento,$direccion,$codigoAcceso,$puesto,$salario,$fechaIngreso,$horario);
    }

    if($_POST['key']=='actualizar_empleado'){
      $cedula = $_POST['empleado_ced'];
      $nombre = $_POST['empleado_nombre'];
      $ap1 = $_POST['empleado_ap1'];
      $ap2 = $_POST['empleado_ap2'];
      $tel = $_POST['empleado_tel'];
      $correo = $_POST['empleado_correo'];
      $fechaNacimiento = $_POST['empleado_fechaNacimiento'];
      $direccion = $_POST['empleado_direccion'];
      $codigoAcceso = $_POST['empleado_codigoAcceso'];
      $puesto = $_POST['empleado_puesto'];
      $salario = $_POST['empleado_salario'];
      $fechaIngreso = $_POST['empleado_fechaIngreso'];
      $horario = $_POST['empleado_horario'];
      $ctr_Empleados->actualizar_empleado($cedula,$nombre,$ap1,$ap2,$tel,$correo,$fechaNacimiento,$direccion,$codigoAcceso,$puesto,$salario,$fechaIngreso,$horario);
    }

    if($_POST['key']=='desactivar_empleado'){
      $cedula = $_POST['cedula_empleado'];
      $ctr_Empleados->desactivar_empleado($cedula);
    }

    if($_POST['key']=='asignar_tareas'){
      $cedula = $_POST['tarea_empleado_id'];
      $descripcion = $_POST['tarea_empleado_descripcion'];
      $fechaTarea = $_POST['tarea_empleado_fecha'];
      $ctr_Empleados->asignar_tareas($cedula,$descripcion,$fechaTarea);
    }
  }
?>