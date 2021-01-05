<?php
	include 'connect.php';
	
	session_start();
	
	$correo = $_POST['correo'];
	$password = $_POST['password'];
	$array_mensaje = array();
	$array_mensaje[] = 'Correo y/o contraseña incorrectos';
	
	
	$consulta = $db -> query( "SELECT * FROM usuarios WHERE Correo_usuarios='$correo' AND Password_usuarios='$password'" );
	$nfilas = $consulta -> num_rows;
	
	if($nfilas == 1)
	{
		$fila = $consulta -> fetch_row();
			
		$_SESSION['loggedin'] = true;
		$_SESSION['SESION_ID_USUARIO'] = $fila[0];
		$_SESSION['SESION_NOMBRE_USUARIO'] = $fila[1];
		$_SESSION['SESION_CARGO_USUARIO'] = $fila[2];
		$_SESSION['SESION_CORREO_USUARIO'] = $fila[4];
		$_SESSION['RS'] = ' ';
		//$_SESSION['SESS_PRO_PIC'] = $member['profImage'];
		session_write_close();
		header("location: Cargo.php");
		exit();
	}
	else
	{
		$_SESSION['Mensaje_error'] = $array_mensaje;
		session_write_close();
		header("location: ../index.php");
		exit();
	}
?>