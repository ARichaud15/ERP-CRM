<?php
	
	session_start();
	
	if(trim($_SESSION['SESION_CARGO_USUARIO']) == 'Cajero') 
	{
		header("location: ../cajero/panel.php");
		exit();
	}
	else if(trim($_SESSION['SESION_CARGO_USUARIO']) == 'Administrador') 
	{
		header("location: ../admnistrador/panel.php");
		exit();
	}
	else
	{
		header("location: ../index.php");
		exit();
	}
?>