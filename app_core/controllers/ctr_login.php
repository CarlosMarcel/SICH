<?php

	require_once(__MDL_PATH . "mdl_login.php");

	class ctr_Login {
		private $login_exec;

		public function __construct(){
			$this->login_exec = new mdl_Login();
		}

		function btn_login_click(){
			$username = trim($_POST['txt_user']);
			$password = trim($_POST['txt_pssw']);

			$this->login_exec->login($username, $password);

			if($this->login_exec->conn_status){
				$_SESSION['MYAPP']="YES";
				$_SESSION['USERNAME']=$this->login_exec->get_username();
				$_SESSION['USERCEDULA']= $this->login_exec->get_usercedula();

				echo "<script>$('#login').css('display','none');location.href='';</script>";
			}else{
				$_SESSION['MYAPP']="NO";
			}
		}

		function btn_logout_click(){
			if(isset($_POST['btn_logout'])){
				$this->login_exec->logout();
				echo "<script>location.href='';</script>";
			}
		}

	}
?>