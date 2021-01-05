<?php
	include('connect.php');
	
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$telefono = $_POST['telefono'];
	$puesto = $_POST['puesto'];
	$contraseña = $_POST['password'];
	

	$query = "INSERT INTO usuarios (Id_usuarios, Nombre_usuarios, Cargo_usuarios, Telefono_usuarios, Correo_usuarios, Password_usuarios) VALUES (NULL, '$nombre', '$puesto','$telefono', '$correo', '$contraseña')";

	$db -> autocommit(FALSE);
	$db -> begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
			
	if( !$con = $db -> query($query) ) 
	{
		echo "A ocurrido un error al registrar los datos";
		$db ->rollback();
	}
	else
	{
		$db -> commit();
		echo "Registro exitoso";
	}	
			
	$db -> close();
	header("location: usuarios.php");
?>