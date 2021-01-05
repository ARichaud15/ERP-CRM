<?php
	include('connect.php');

	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$telefono = $_POST['telefono'];
	$puesto = $_POST['puesto'];
	$contraseña = $_POST['password'];
	
	$query = "UPDATE usuarios SET 
				Nombre_usuarios = '$nombre', 
				Cargo_usuarios = '$puesto',
				Telefono_usuarios = '$telefono',
				Correo_usuarios =  '$correo', 
				Password_usuarios = '$contraseña'
			WHERE Id_usuarios = $id";

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