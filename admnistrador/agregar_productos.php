<?php
	include('connect.php');
	
	$codigo = $_POST['codigo'];
	$proveedor = $_POST['proveedor'];
	$nombre = $_POST['producto'];
	$marca = $_POST['marca'];
	$cantidad = $_POST['cantidad'];
	$unidad = $_POST['unidad'];
	$precio_p = $_POST['precio_p'];
	$precio_v = $_POST['precio_v'];
	$ganancia = $_POST['ganancia'];
	$fecha = date('Y-m-d');

	$query = "INSERT INTO productos (ID_productos, Proveedor_productos, Codigo_productos, Nombre_productos, Marca_productos, Cantidad_productos, Presentacion_productos, Precio_proveedor_productos, Precio_venta_productos, Ganancia_productos, Fecha_registro_productos) VALUES (NULL, '$proveedor', $codigo, '$nombre', '$marca', $cantidad, '$unidad', '$precio_p', '$precio_v', '$ganancia', '$fecha')";

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

	header("location: productos.php");
?>