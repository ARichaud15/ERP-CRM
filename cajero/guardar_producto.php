<?php
	include('connect.php');
	
	$invoice = $_POST['invoice'];
	$id_producto = $_POST['producto'];
	$cantidad = $_POST['cantidad'];
	$fecha = date('Y-m-d');

	$result = $db->query("SELECT * FROM productos WHERE Id_productos = $id_producto");
	$nfilas = $result -> num_rows;
									
	for($F=0; $F < $nfilas; $F++)
	{
		$fila = $result -> fetch_row();
		
		$codigo_producto = $fila[2];
		$nombre_producto = $fila[3];
		$marca_producto = $fila[4];
		$cantidad_producto = $fila[5];
		$precio_p_producto = $fila[7];
		$precio_v_producto = $fila[8]; 
	}

	if($cantidad_producto >= $cantidad)
	{
		$sql = "UPDATE productos SET Cantidad_productos = Cantidad_productos - $cantidad WHERE ID_productos = $id_producto";
	
		$db -> autocommit(FALSE);
		$db -> begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
				
		if( !$con = $db -> query($sql) ) 
		{
			echo "A ocurrido un error al registrar los datos1";
			$db ->rollback();
		}
		else
		{
			$db -> commit();
			echo "Registro exitoso";
		}

		$total_precio_p = $precio_p_producto * $cantidad;
		$total_precio_v = $precio_v_producto * $cantidad;
		$ganancia = $total_precio_v - $total_precio_p;

		$sql = "INSERT INTO ticket (Id_ticket, Numero_venta_ticket, Id_producto_ticket, Codigo_producto_ticket, Nombre_producto_ticket, Marca_producto_ticket, Cantidad_producto_ticket, Precio_venta_ticket, Monto_total_ticket, Ganancia_ticket, Fecha_ticket) VALUES (NULL, '$invoice', $id_producto, $codigo_producto, '$nombre_producto', '$marca_producto', $cantidad, '$precio_v_producto', '$total_precio_v', '$ganancia', '$fecha')";

		$db -> autocommit(FALSE);
		$db -> begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
				
		if( !$con = $db -> query($sql) ) 
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
	}
	else
	{
		echo"Hola";

?>		<script type="text/javascript">
			alert("Hola");

					
			
		</script>
<?php
	}

	header("location: ventas.php?id=$pt&invoice=$invoice");
?>