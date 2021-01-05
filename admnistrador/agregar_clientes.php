<?php
	include('connect.php');
	
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$telefono = $_POST['telefono'];
	$fecha = date('Y-m-d');

	$query = "INSERT INTO clientes (Numero_clientes, Nombre_clientes, Correo_clientes, Telefono_clientes, Fecha_registro_clientes, Numero_compras_clientes) VALUES (NULL, '$nombre', '$correo', '$telefono', '$fecha', 0)";

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