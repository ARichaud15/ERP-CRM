<?php
	
	include('connect.php');
	$name_prov = $_POST['name'];
	$address = $_POST['address'];
	$number_cont = $_POST['cperson'];
	$email = $_POST['contact'];
	$note = $_POST['note'];


	$query = "INSERT INTO proveedores(Id_proveedores, Nombre_proveedores, Direccion_proveedores, Telefono_proveedores, Correo_proveedores, Nota_proveedores) VALUES (NULL, '$name_prov', '$address', '$number_cont', '$email', '$note'); ";

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