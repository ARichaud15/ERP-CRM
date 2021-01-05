<?php
	include('connect.php');

	$id = $_POST['id'];
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

	$query = "UPDATE productos SET 
				Proveedor_productos = '$proveedor', 
				Codigo_productos =  $codigo, 
				Nombre_productos = '$nombre', 
				Marca_productos = '$marca', 
				Cantidad_productos = $cantidad, 
				Presentacion_productos = '$unidad', 
				Precio_proveedor_productos = '$precio_p', 
				Precio_venta_productos = '$precio_v', 
				Ganancia_productos = '$ganancia', 
				Fecha_registro_productos = '$fecha' 
			WHERE ID_productos = $id";
	
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