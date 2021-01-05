<?php
	include('connect.php');

	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$telefono = $_POST['telefono'];
	
	$query = "UPDATE clientes SET 
				Nombre_clientes = '$nombre', 
				Correo_clientes =  '$correo', 
				Telefono_clientes = '$telefono'
			WHERE Numero_clientes = $id";

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
	
	header("location: clientes.php");
?>