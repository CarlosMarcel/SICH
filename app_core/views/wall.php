<?php
  require_once(__MDL_PATH . "mdl_html.php");
  require(__CTR_PATH . "ctr_login.php"); //Agregamos la referencia al controlador respectivo

  $HTML = new mdl_Html();
  $ctr_Login = new ctr_Login(); //variable del Controlador

  if(isset($_POST['btn_logout'])){ 
      $ctr_Login->btn_logout_click();
  }

?>

<div id="panel_app">

  <div id="user_box">
      <?php echo $HTML->html_img_tag(__RSC_PHO_HOST_PATH. $_SESSION['USERPHOTO'], 
        "photo_profile", "imguser", "photo", "width=50") . "<span>" . $_SESSION['USERNAME'] . "</span>" ;?>
      <div id="logout">
          <?php echo $HTML->html_form_tag("frm_app", "","","post"); ?>
          <?php echo $HTML->html_input_button("submit","btn_logout","btn_logout","boton","X",3,"",""); ?>
          <?php echo $HTML->html_form_end(); ?>
      </div>
  </div>

  <div id="post_box">
      <?php echo $HTML->html_form_tag("frm_service", "","","post"); ?>
      <?php echo $HTML->html_input_text("txt_post","txt_post","cajatexto",64,"","","Escribe algo!",1,"","placeholder='¿Qué sucede?'","required"); ?>
      <?php echo $HTML->html_input_button("button","btn_save","btn_save","boton","Publicar",2,"","onclick=\"pusherAjax('".$_SESSION['USERID']."','".$_SESSION['USERNAME']."', 'chat.php');\""); ?>
      <?php echo $HTML->html_form_end(); ?>
  </div>

  <div id="main_panel">
     <?php include(__VWS_PATH . "chatbox.php"); ?>
  </div>

</div>




