<?php
	include('connect.php');

	$id = $_POST['memi'];
	$name_prov = $_POST['name'];
	$address = $_POST['address'];
	$number_cont = $_POST['contact'];
	$email = $_POST['cperson'];
	$note = $_POST['note'];

	$query = "UPDATE proveedores SET 
				Nombre_proveedores = '$name_prov', 
				Direccion_proveedores = '$address', 
				Telefono_proveedores = '$number_cont', 
				Correo_proveedores = '$email', 
				Nota_proveedores = '$note'
			WHERE Id_proveedores = $id";
	
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

	header("location: proveedores.php");
?>