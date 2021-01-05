<?php
	//Start session
	session_start();
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESION_ID_USUARIO']) || (trim($_SESSION['SESION_ID_USUARIO']) == '')) {
		header("location: ../index.php");
		exit();
	}
?>