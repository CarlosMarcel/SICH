<?php
  require_once("../models/mdl_luces.php");

  class ctr_luces {
    private $postdata;

    public function __construct(){
      $this->postdata = new mdl_luces();
    }
  }

  $ctr_Empleados = new ctr_Empleados();
  //keys de los distintos eventos GET.
   

  //Keys de los distintos eventos POST.
  
?>