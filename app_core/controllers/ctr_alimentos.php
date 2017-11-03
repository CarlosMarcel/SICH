<?php
  require_once("../models/mdl_alimentos.php");

  class ctr_Alimentos {
    private $postdata;

    public function __construct(){
      $this->postdata = new mdl_alimentos();
    }

    public function registrar_alimento($nombre,$peso,$puntoReorden,$cantidad,$tipoMedida){
      return $this->postdata->insertar_alimento($nombre,$peso,$puntoReorden,$cantidad,$tipoMedida);
    }
    public function comprobar_alimento($nom){
      return $this->postdata->comprobar_Alimento($nom);
    }

    public function listar_alimentos(){
        return $this->postdata->listar_alimentos();
    }
    public function cargar_alimentos(){
        return $this->postdata->cargar_alimentos();
    }

    public function actualizar_alimento($nombre,$peso,$puntoReorden,$cantidad,$tipoMedida){
        return $this->postdata->actualizar_alimento($nombre,$peso,$puntoReorden,$cantidad,$tipoMedida);
    }

    public function buscar_empleado($ced){
        return $this->postdata->buscar_empleado($ced);
    }

    public function desactivar_empleado($ced){
        return $this->postdata->desactivar_empleado($ced);
    }
  }

  $ctr_Alimentos = new ctr_Alimentos();
  //keys de los distintos eventos GET.
 if (isset($_GET['listar_alimentos'])) {
      $ctr_Alimentos->listar_alimentos();
    }

   if (isset($_GET['cargarcmbAlimentos'])) {
      $ctr_Alimentos->cargar_alimentos();
    }
  //Keys de los distintos eventos POST.
  if(isset($_POST['key'])){

    if($_POST['key']=='registrar_alimento'){
      $nombre = $_POST['alimento_nombre'];
      $peso = $_POST['alimento_peso'];
      $puntoReorden = $_POST['alimento_puntoReorden'];
      $cantidad = $_POST['alimento_cantidad'];
      $tipoMedida = $_POST['alimento_tipoMedida'];
      $ctr_Alimentos->registrar_alimento($nombre,$peso,$puntoReorden,$cantidad,$tipoMedida);
    }
  }
?>