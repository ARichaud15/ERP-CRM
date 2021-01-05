<?php
	include('connect.php');
	
	$id_ticket=$_GET['id'];
	$invoice=$_GET['invoice'];
	$cantidad=$_GET['cantidad'];
	$id_producto=$_GET['producto'];
	
	$sql = "UPDATE productos SET Cantidad_productos = Cantidad_productos + $cantidad WHERE ID_productos = $id_producto";
	
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

	$result = $db->query("DELETE FROM ticket WHERE Id_ticket = $id_ticket");
	
	$db -> autocommit(FALSE);
	$db -> begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
			
	if( !$con = $db -> query($result) ) 
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
	header("location: ventas.php?invoice=$invoice");
?>